<?php
/**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class WTCategory extends ObjectModel
{
	public $id_wt_blog_category;
	public $category_parent;
	public $level_depth;
	public $date_add;
	public $active = 1;
	public $position;
	public $allow_comment = 1;
	public $id_shop_default;
	public $name;
	public $description;
	public $meta_title;
	public $meta_description;
	public $meta_keywords;
	public $link_rewrite;
	public $html;
	public static $definition = array(
		'table' => 'wt_blog_category',
		'primary' => 'id_wt_blog_category',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			'id_shop_default' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'category_parent' =>		array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isString'),
			'active'  => 		array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
			'position' =>		array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'allow_comment'  => array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
			'level_depth' =>		array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'name' =>			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
			'description' => 	array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'meta_title' => 			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'meta_description' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 255),
			'meta_keywords' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
			'link_rewrite' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isLinkRewrite', 'required' => true, 'size' => 128),
		)
	);
	public	function __construct($wt_blog_category = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($wt_blog_category, $id_lang, $id_shop);
		$this->id_shop_default = 1;
		$this->html = '';
		if ($this->id)
			$this->position = $this->getFieldShop('position');
		Shop::addTableAssociation('wt_blog_category', array('type' => 'shop'));
		Shop::addTableAssociation('wt_blog_category_lang', array('type' => 'fk_shop'));
		
	}
	public function getFieldShop($field)
	{
		$id_shop = Context::getContext()->shop->id;
		$sql = 'SELECT ss.'.$field.' FROM '._DB_PREFIX_.'wt_blog_category s
		LEFT JOIN '._DB_PREFIX_.'wt_blog_category_shop ss ON (s.id_wt_blog_category = ss.id_wt_blog_category)
		WHERE s.id_wt_blog_category = '.$this->id.' AND ss.id_shop = '.$id_shop.'';
		$result = Db::getInstance()->getValue($sql);
		return $result;
	}
	public function addPosition($position, $id_shop = null)
	{
		$return = true;
		if (is_null($id_shop))
		{
			if (Shop::getContext() != Shop::CONTEXT_SHOP)
				foreach (Shop::getContextListShopID() as $id_shop)
					$return &= Db::getInstance()->execute('
						INSERT INTO `'._DB_PREFIX_.'wt_blog_category_shop` (`id_wt_blog_category`, `id_shop`, `position`) VALUES
						('.$this->id.', '.$id_shop.', '.$position.')
						ON DUPLICATE KEY UPDATE `position` = '.$position);
			else
			{
				$id = Context::getContext()->shop->id;
				$id_shop = $id ? $id : Configuration::get('PS_SHOP_DEFAULT');
				$return &= Db::getInstance()->execute('
					INSERT INTO `'._DB_PREFIX_.'wt_blog_category_shop` (`id_wt_blog_category`, `id_shop`, `position`) VALUES
					('.$this->id.', '.$id_shop.', '.$position.')
					ON DUPLICATE KEY UPDATE `position` = '.$position);
			}
		}
		else
			$return &= Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'wt_blog_category_shop` (`id_wt_blog_category`, `id_shop`, `position`) VALUES
			('.$this->id.', '.$id_shop.', '.$position.')
			ON DUPLICATE KEY UPDATE `position` = '.$position);

		return $return;
	}
	public static function getLastPosition($id_category_parent, $id_shop)
	{
		return (Db::getInstance()->getValue('
		SELECT MAX(cs.`position`)
		FROM `'._DB_PREFIX_.'wt_blog_category` c
		LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_shop` cs
			ON (c.`id_wt_blog_category` = cs.`id_wt_blog_category` AND cs.`id_shop` = '.$id_shop.')
		WHERE c.`category_parent` = '.$id_category_parent) + 1);
	}
	public function calcLevelDepth()
	{
		/* Root category */
		if (!$this->category_parent)
			return 0;
		$parent_category = new WTCategory($this->category_parent);
		if (!Validate::isLoadedObject($parent_category))
			throw new PrestaShopException('Parent category does not exist');
		return $parent_category->level_depth + 1;
	}
	public function add($autodate = true, $null_values = false)
	{
		if (!isset($this->level_depth))
			$this->level_depth = $this->calcLevelDepth();
			
		$ret = parent::add($autodate, $null_values);
		
		if (Tools::isSubmit('checkBoxShopAsso_wt_blog_category'))
			foreach (Tools::getValue('checkBoxShopAsso_wt_blog_category') as $id_shop => $value)
			{
				$position = WTCategory::getLastPosition($this->category_parent, $id_shop);
				$this->addPosition($position, $id_shop);
			}
		else
			foreach (Shop::getShops(true) as $shop)
			{
				$position = WTCategory::getLastPosition($this->category_parent, $shop['id_shop']);
				if (!$position)
					$position = 1;
				$this->addPosition($position, $shop['id_shop']);
			}
		return $ret;
	}
	public function delete()
	{
		$result = parent::delete();
		$number = $this->getExistPlCategory();
		if ($number <= 0)
		{
			$this->deleteSubCatForPlCategory($this->id);
			$this->deleteImagesForPlCategory($this->id);
		}
		return $result;
	}
	public function getExistPlCategory()
	{
		$sql = 'SELECT * FROM '._DB_PREFIX_.'wt_blog_category_shop
				WHERE id_wt_blog_category='.$this->id.'';
		return count(Db::getInstance()->ExecuteS($sql));
	}
	public function deleteImagesForPlCategory($id)
	{
		$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/categories/';
		if (file_exists($save_path.'src/'.$id.'.jpg'))
			unlink($save_path.'src/'.$id.'.jpg');
		foreach (Shop::getContextListShopID() as $id_shop)	
			if (file_exists($save_path.'cache/'.$id.'_'.$id_shop.'_category.jpg'))
				unlink($save_path.'cache/'.$id.'_'.$id_shop.'_category.jpg');
		return;
	}
	public function deleteSubCatForPlCategory($id)
	{
		$subs = $this->getSubPlCategory($id);
		foreach ($subs as $sub)
		{
			$cat = new WTCategory($sub['id_wt_blog_category']);
			$cat->delete();
		}
	}
	public function getSubPlCategory($id_parrent)
	{
		$id_shops = implode(',', Shop::getContextListShopID());
		$sql = 'SELECT DISTINCT a.id_wt_blog_category FROM '._DB_PREFIX_.'wt_blog_category a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_shop c
				ON (a.id_wt_blog_category = c.id_wt_blog_category)
				WHERE a.category_parent = '.$id_parrent.' AND c.id_shop IN ('.$id_shops.')';
		return (Db::getInstance()->ExecuteS($sql));
	}
	public function getCategoryIdByNew()
	{
		$rows = Db::getInstance()->ExecuteS('SELECT id_wt_blog_category FROM '._DB_PREFIX_.'wt_blog_category ORDER BY id_wt_blog_category DESC LIMIT 0, 1');
		$row = $rows[0];
		return $row['id_wt_blog_category'];
	}
	public static function getChildren($id_parent, $id_lang, $active = true, $id_shop = false)
	{
		if (!Validate::isBool($active))
			die(Tools::displayError());
		$query = 'SELECT c.`id_wt_blog_category`, cl.`name`, cl.`link_rewrite`, cs.`id_shop`
		FROM `'._DB_PREFIX_.'wt_blog_category` c
		LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_lang` cl ON (c.`id_wt_blog_category` = cl.`id_wt_blog_category`)
		LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_shop` cs ON (c.`id_wt_blog_category` = cs.`id_wt_blog_category`)
		WHERE cl.`id_lang` = '.$id_lang.' AND cs.`id_shop` = '.$id_shop.'
		AND c.`category_parent` = '.$id_parent.'
		'.($active ? 'AND `active` = 1' : '').'
		GROUP BY c.`id_wt_blog_category`
		ORDER BY cs.`position` ASC';
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
	}
	public function getCategories($id_lang, $id_shop, $no_home = false)
	{
		$sql = 'SELECT bcl.*, bc.*, bcs.position FROM '._DB_PREFIX_.'wt_blog_category bc
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_lang bcl
				ON (bc.id_wt_blog_category = bcl.id_wt_blog_category AND bcl.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_shop bcs
				ON (bc.id_wt_blog_category = bcs.id_wt_blog_category AND bcs.id_shop = '.$id_shop.')
				WHERE bc.active=1 '.($no_home ? 'AND bc.id_wt_blog_category != 1 ' : '').' AND bcs.id_shop = '.($id_shop ? $id_shop : Configuration::get('PS_SHOP_DEFAULT')).' AND bcl.id_lang='.($id_lang ? $id_lang : Configuration::get('PS_LANG_DEFAULT'));
		$data = Db::getInstance()->ExecuteS($sql);
		$resultParents = array();
		$resultIds = array();
		foreach ($data as $row)
		{
			if (is_null($row['category_parent']))
				$row['category_parent'] = 0;
			$resultParents[$row['category_parent']][] = $row;
			$resultIds[$row['id_wt_blog_category']] = $row;
		}
		$blockCategTree = $this->getTree($resultParents, $resultIds, 5, 1);
		return $blockCategTree;	
	}
	public function getTree($resultParents, $resultIds, $maxDepth, $id_category = null, $currentDepth = 0)
	{
		if (is_null($id_category))
			$id_category = 1;
		$children = array();
		if (isset($resultParents[$id_category]) && count($resultParents[$id_category]) && ($maxDepth == 0 || $currentDepth < $maxDepth))
			foreach ($resultParents[$id_category] as $subcat)
				$children[] = $this->getTree($resultParents, $resultIds, $maxDepth, $subcat['id_wt_blog_category'], $currentDepth + 1);
		if (!isset($resultIds[$id_category]))
			return false;
		$return = array('id' => $id_category,
		'name' => $resultIds[$id_category]['name'],
		'children' => $children);
		return $return;
	}
	protected function saveImage($mode, $fmode, $tmp_name, $save_path, $newname, $ext)
	{
		$errors = '';
		if (!move_uploaded_file($tmp_name, $save_path.'src/'.$newname.'.'.$ext))
			$errors .= Tools::displayError('Error move uploaded file');
		else
		{
			$image_src = $save_path.'src/'.$newname.'.'.$ext;
			list($width, $height) = getimagesize($image_src);
			# Resize image
			$image_dst = $save_path.'catch/'.$newname.'.'.$ext;
			$width_dst = Configuration::get('CS_IMG_CATEGORY_SIZE');
			$height_dst = Configuration::get('CS_IMG_CATEGORY_H_SIZE');
			ImageManager::resize($image_src, $image_dst, $width_dst, $height_dst);
		}
		return $errors;
	}
	public function getIdAllCat($id_lang = null, $id_shop = null)
	{
		$sql = 'SELECT a.id_wt_blog_category FROM '._DB_PREFIX_.'wt_blog_category a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_lang b
				ON (a.id_wt_blog_category = b.id_wt_blog_category '.( $id_shop ? 'AND b.id_shop = '.$id_shop : '' ).')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_shop c
				ON (a.id_wt_blog_category = c.id_wt_blog_category)
				WHERE 1 '.( $id_shop ? 'AND c.id_shop = '.$id_shop : '' ).( $id_lang ? ' AND b.id_lang = '.$id_lang : '' );
		return (Db::getInstance()->ExecuteS($sql));
	}
	public function getParent($id_category)
	{
		$cat = new WTCategory($id_category);
		return $cat->category_parent;
	}
	public function getParentsCategories($id_category, $id_lang = null, $id_shop = null)
	{
		$cats = $this->getIdAllCat($id_lang, $id_shop);
		$resultParents = array();
		$i = null;
		foreach ($cats as $row)
		{
			if ($i == null)
				$id_parent = $this->getParent($id_category);
			else
				$id_parent = $this->getParent($i);
			foreach ($cats as $row2)
			{
				if ($row2['id_wt_blog_category'] == $id_parent && $id_parent != 1)
				{
					$resultParents[$row2['id_wt_blog_category']] = $row2;
					$i = $row2['id_wt_blog_category'];
					break;
				}
			}
		}
		return $this->getParentsCategoriesComplete($resultParents, $id_lang, $id_shop);
	}
	public function getParentsCategoriesComplete($cats = array(), $id_lang = null, $id_shop = null)
	{
		$string = '';
		foreach ($cats as $key => $cat)
		{
			if ($cat != end($cats))
				$string .= $key.',';
			else
				$string .= $key;
		}
		$result = array();
		if ($string != '')
		{
			$sql = 'SELECT a.id_wt_blog_category, b.name, b.link_rewrite FROM '._DB_PREFIX_.'wt_blog_category a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_lang b
				ON (a.id_wt_blog_category = b.id_wt_blog_category '.( $id_shop ? 'AND b.id_shop = '.$id_shop : '' ).')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_shop c
				ON (a.id_wt_blog_category = c.id_wt_blog_category)
				WHERE 1 AND a.id_wt_blog_category IN ('.$string.') '.( $id_shop ? 'AND c.id_shop = '.$id_shop : '' ).( $id_lang ? ' AND b.id_lang = '.$id_lang : '' );
			$result = Db::getInstance()->ExecuteS($sql);
		}
		return $result;
	}
	public static function getCategoriesCheckbox($id_lang = false, $id_shop = true, $no_home = false)
	{
		$sql = 'SELECT bcl.*, bc.*, bcs.position FROM '._DB_PREFIX_.'wt_blog_category bc
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_lang bcl
				ON (bc.id_wt_blog_category = bcl.id_wt_blog_category AND bcl.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_shop bcs
				ON (bc.id_wt_blog_category = bcs.id_wt_blog_category)
				WHERE bc.active=1 '.($no_home ? 'AND bc.id_wt_blog_category != 1 ' : '').' AND bcs.id_shop = '.($id_shop ? $id_shop : Configuration::get('PS_SHOP_DEFAULT')).' AND bcl.id_lang='.($id_lang ? $id_lang : Configuration::get('PS_LANG_DEFAULT'));
		$result = Db::getInstance()->ExecuteS($sql);

		$categories = array();
		foreach ($result as $row)
			$categories[$row['category_parent']][$row['id_wt_blog_category']]['infos'] = $row;
		return $categories;
	}
	public static function getChildrenWithNbSelectedSubCat($id_parent, $selected_cat, $id_lang, Shop $shop = null, $use_shop_context = true)
	{
		if (!$shop)
			$shop = Context::getContext()->shop;
		$id_shop = $shop->id ? $shop->id : Configuration::get('PS_SHOP_DEFAULT');
		$sql = 'SELECT c.`id_wt_blog_category` as id_category, c.`level_depth`, cl.`name`, 
		 if ((
						SELECT COUNT(*)
						FROM `'._DB_PREFIX_.'wt_blog_category` c2
						WHERE c2.`category_parent` = c.`id_wt_blog_category`
					) > 0, 1, 0) AS has_children
		
		, '.($selected_cat ? '(
						SELECT count(c3.`id_wt_blog_category`)
						FROM `'._DB_PREFIX_.'wt_blog_category` c3
						WHERE  c3.`category_parent` = c.id_wt_blog_category AND c3.`id_wt_blog_category` IN ('.$selected_cat.')
					)' : '0').' AS nbSelectedSubCat
		FROM `'._DB_PREFIX_.'wt_blog_category` c 
		LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_lang` cl ON (c.`id_wt_blog_category` = cl.`id_wt_blog_category` AND cl.`id_wt_blog_category` != 1 AND cl.`id_shop` = '.$id_shop.' AND cl.`id_lang` = '.$id_lang.')';
		
		$sql .= ' LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_shop` cs ON (c.`id_wt_blog_category` = cs.`id_wt_blog_category` AND cs.`id_shop` = '.$id_shop.')';
		$sql .= ' WHERE c.`id_wt_blog_category` != 1';
		$sql .= ' AND c.`category_parent` = '.$id_parent;
		if (Shop::getContext() == Shop::CONTEXT_SHOP && $use_shop_context)
			$sql .= ' AND cs.`id_shop` = '.$shop->id;
		if (!Shop::isFeatureActive() || Shop::getContext() == Shop::CONTEXT_SHOP && $use_shop_context)
			$sql .= ' ORDER BY cs.`position` ASC';
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
	}
	public static function getCategoriesSelected($id_post)
	{
		$sql = 'SELECT id_wt_blog_category FROM '._DB_PREFIX_.'wt_blog_category_post
				WHERE id_wt_blog_post = '.$id_post;
		return (Db::getInstance()->ExecuteS($sql));
	}
}