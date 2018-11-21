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

class WTPost extends ObjectModel
{
	public $id_wt_blog_post;
	public $id_wt_blog_category;
	public $date_add;
	public $allow_comment = 1;
	public $active = 1;
	public $position;
	public $author;
	public $id_related_posts;
	public $name_related_posts;
	public $name;
	public $description_short;
	public $description;
	public $meta_title;
	public $meta_description;
	public $meta_keywords; 
	public $link_rewrite;
	public static $definition = array(
		'table' => 'wt_blog_post',
		'primary' => 'id_wt_blog_post',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			'id_shop_default' => 	array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'date_add' => 			array('type' => self::TYPE_DATE, 'validate' => 'isString','shop' => true),
			'allow_comment'  => array('type' => self::TYPE_BOOL,'validate' => 'isBool'),
			'id_related_posts'  => array('type' => self::TYPE_STRING,'validate' => 'isCleanHtml'),
			'name_related_posts'  => array('type' => self::TYPE_STRING,'validate' => 'isCleanHtml'),
			'author'  => array('type' => self::TYPE_STRING,'validate' => 'isCleanHtml'),
			'id_wt_blog_category' =>		array('type' => self::TYPE_INT,'shop' => true, 'validate' => 'isInt','required' => true),
			'active'  => 		array('type' => self::TYPE_BOOL,'shop' => true,'validate' => 'isBool'),
			'position' =>		array('type' => self::TYPE_INT,'shop' => true, 'validate' => 'isunsignedInt'),
			'name' =>			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
			'description_short' => 	array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
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
		$this->id_shop_default = Configuration::get('PS_SHOP_DEFAULT');
		if ($this->id)
		{
			$this->active = $this->getFieldShop('active');
			$this->position = $this->getFieldShop('position');
		}
		Shop::addTableAssociation('wt_blog_post', array('type' => 'shop'));
		Shop::addTableAssociation('wt_blog_post_lang', array('type' => 'fk_shop'));
	}
	public function getFieldShop($field)
	{
		$id_shop = (int)Context::getContext()->shop->id;
		$sql = 'SELECT ss.'.$field.' FROM '._DB_PREFIX_.'wt_blog_post s
		LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop ss ON (s.id_wt_blog_post = ss.id_wt_blog_post)
		WHERE s.id_wt_blog_post = '.$this->id.' AND ss.id_shop = '.$id_shop.'';
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
						INSERT INTO `'._DB_PREFIX_.'wt_blog_post_shop` (`id_wt_blog_post`, `id_shop`, `position`) VALUES
						('.(int)$this->id.', '.(int)$id_shop.', '.(int)$position.')
						ON DUPLICATE KEY UPDATE `position` = '.(int)$position);
			else
			{
				$id = Context::getContext()->shop->id;
				$id_shop = $id ? $id : Configuration::get('PS_SHOP_DEFAULT');
				$return &= Db::getInstance()->execute('
					INSERT INTO `'._DB_PREFIX_.'wt_blog_post_shop` (`id_wt_blog_post`, `id_shop`, `position`) VALUES
					('.(int)$this->id.', '.(int)$id_shop.', '.(int)$position.')
					ON DUPLICATE KEY UPDATE `position` = '.(int)$position);
			}
		}
		else
			$return &= Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'wt_blog_post_shop` (`id_wt_blog_post`, `id_shop`, `position`) VALUES
			('.(int)$this->id.', '.(int)$id_shop.', '.(int)$position.')
			ON DUPLICATE KEY UPDATE `position` = '.(int)$position);

		return $return;
	}
	public static function getLastPosition($id_shop)
	{
		return (int)(Db::getInstance()->getValue('
		SELECT MAX(cs.`position`)
		FROM `'._DB_PREFIX_.'wt_blog_post` c
		LEFT JOIN `'._DB_PREFIX_.'wt_blog_post_shop` cs
			ON (c.`id_wt_blog_category` = cs.`id_wt_blog_post` AND cs.`id_shop` = '.(int)$id_shop.')') + 1);
	}
	
	public function update($null_values = false)
	{
		$cat_box = Tools::getValue('categoryBox');
		if (isset($cat_box))
		{
			$this->id_wt_blog_category = min($cat_box);
			$ret = parent::update($null_values);
			if ($ret)
				$this->insertCategoryPost($cat_box);
			return $ret;
		}
	}
	public function add($autodate = true, $null_values = false)
	{
		$cat_box = Tools::getValue('categoryBox');
		if (isset($cat_box))
		{
			$this->id_wt_blog_category = min($cat_box);
			$ret = parent::add($autodate, $null_values);
		$this->insertCategoryPost($cat_box);
		if (Tools::isSubmit('checkBoxShopAsso_category'))
			foreach (Tools::getValue('checkBoxShopAsso_category') as $id_shop => $value)
			{
				$position = WTPost::getLastPosition($id_shop);
				$this->addPosition($position, $id_shop);
			}
		else
			foreach (Shop::getShops(true) as $shop)
			{
				$position = WTPost::getLastPosition($shop['id_shop']);
				if (!$position)
					$position = 1;
				$this->addPosition($position, $shop['id_shop']);
			}
		
		return $ret;
		}
	}
	public function delete()
	{
		$result = parent::delete();
		$number = $this->getExistPost();
		if ($number <= 0)
		{
			$this->deleteTagsForPost($this->id);
			$this->deleteImagesForPost($this->id);
		}
		$this->deleteCommentsForPost($this->id);
		$this->deleteCategoryPost($this->id);
		return $result;
	}
	public function getExistPost()
	{
		$sql = 'SELECT * FROM '._DB_PREFIX_.'wt_blog_post_shop
				WHERE id_wt_blog_post='.$this->id.'';
		return count(Db::getInstance()->ExecuteS($sql));
	}
	public function insertCategoryPost($catList)
	{
		$this->deleteCategoryPost($this->id);
		foreach ($catList as $catId)
		{
			$sql = ' INSERT INTO '._DB_PREFIX_.'wt_blog_category_post(id_wt_blog_category, id_wt_blog_post) VALUES('.$catId.','.$this->id.') ';
			Db::getInstance()->execute($sql);
		}
	}
	public function deleteTagsForPost($id_wt_blog_post)
	{
		return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'wt_blog_post_tag` WHERE `id_wt_blog_post` = '.(int)$id_wt_blog_post);
	}
	public function deleteCategoryPost($id_wt_blog_post)
	{
		return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'wt_blog_category_post` WHERE `id_wt_blog_post` = '.(int)$id_wt_blog_post);
	}
	public function deleteImagesForPost($id_wt_blog_post)
	{
		$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/';
		if (file_exists($save_path.'src/'.$id_wt_blog_post.'.jpg'))
			unlink($save_path.'src/'.$id_wt_blog_post.'.jpg');
		foreach (Shop::getContextListShopID() as $id_shop)
		{
			if (file_exists($save_path.'cache/'.$id_wt_blog_post.'_'.$id_shop.'_small.jpg'))
				unlink($save_path.'cache/'.$id_wt_blog_post.'_'.$id_shop.'_small.jpg');
			if (file_exists($save_path.'cache/'.$id_wt_blog_post.'_'.$id_shop.'_medium.jpg'))
				unlink($save_path.'cache/'.$id_wt_blog_post.'_'.$id_shop.'_medium.jpg');
			if (file_exists($save_path.'cache/'.$id_wt_blog_post.'_'.$id_shop.'_large.jpg'))
				unlink($save_path.'cache/'.$id_wt_blog_post.'_'.$id_shop.'_large.jpg');
		}
		return;
	}
	public function deleteCommentsForPost($id_wt_blog_post)
	{
		$id_shops = implode(',', Shop::getContextListShopID());
		$id_comments = Db::getInstance()->ExecuteS('SELECT id_wt_blog_comment FROM `'._DB_PREFIX_.'wt_blog_comment` WHERE id_wt_blog_post = '.$id_wt_blog_post.' AND `id_shop` IN ('.$id_shops.')');
		$result = true;
		foreach ($id_comments as $id_comment)
			$result &= Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'wt_blog_comment_lang` WHERE `id_wt_blog_comment` = '.$id_comment['id_wt_blog_comment']).'';
			$result &= Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'wt_blog_comment` WHERE   `id_wt_blog_post` = '.$id_wt_blog_post.' AND `id_shop` IN ('.$id_shops.')');
		return $result;
	}
	public function getCountComment($id_lang = null, $id_shop = null)
	{
		$sql = 'SELECT * FROM '._DB_PREFIX_.'wt_blog_comment a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_comment_lang b
				ON (a.id_wt_blog_comment = b.id_wt_blog_comment AND b.id_lang = '.$id_lang.') 
				WHERE a.id_shop = '.$id_shop.' AND b.id_lang='.($id_lang ? $id_lang : Configuration::get('PS_LANG_DEFAULT')).' AND '.' (a.active = 1) AND (a.id_wt_blog_post='.$this->id_wt_blog_post.')
				ORDER BY a.date_add DESC
				';
		return count(Db::getInstance()->ExecuteS($sql));
	}
	public function getCommentForPost($id_lang = null, $id_shop = null, $nb = 5, $viewall = false)
	{
		$sql = 'SELECT * FROM '._DB_PREFIX_.'wt_blog_comment a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_comment_lang b
				ON (a.id_wt_blog_comment = b.id_wt_blog_comment AND b.id_lang = '.$id_lang.') 
				WHERE a.id_shop = '.$id_shop.' AND b.id_lang='.($id_lang ? $id_lang : Configuration::get('PS_LANG_DEFAULT')).' AND '.' (a.active = 1) AND (a.id_wt_blog_post='.$this->id_wt_blog_post.')
				ORDER BY a.date_add DESC '.($viewall ? '' : 'LIMIT 0, '.$nb.'');
		return (Db::getInstance()->ExecuteS($sql));
	}
	public function getIdAllPost($id_lang = null, $id_shop = null)
	{
		$sql = 'SELECT a.id_wt_blog_post FROM '._DB_PREFIX_.'wt_blog_post a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_lang b
				ON (a.id_wt_blog_post = b.id_wt_blog_post '.( $id_shop ? 'AND b.id_shop = '.$id_shop : '' ).')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop c
				ON (a.id_wt_blog_post = c.id_wt_blog_post)
				WHERE 1 '.( $id_shop ? 'AND c.id_shop = '.$id_shop : '' ).( $id_lang ? ' AND b.id_lang = '.$id_lang : '' );
		return (Db::getInstance()->ExecuteS($sql));
	}
	public function getTags($id_lang)
	{
		$tags = WTTag::getPostTags($this->id);
		if (!($tags && key_exists($id_lang, $tags)))
			return '';
		$result = '';
		foreach ($tags[$id_lang] as $tag_name)
			$result .= $tag_name.', ';
		return rtrim($result, ', ');
	}
	public static function formatDateAdd($date)
	{
		$date = new DateTime(''.$date.'');
		return $date->format('M d, Y');
	}
}