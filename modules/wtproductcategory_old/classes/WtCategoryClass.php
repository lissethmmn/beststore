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

class WtCategoryClass extends ObjectModel
{
	public $id_wtgroupcategory;
	public $id_cat;
	public $cat_color;
	public $cat_desc;
	public $cat_banner;
	public $cat_icon;
	public $manufacture;
	public $position;
	public $show_img;
	public $special_prod;
	public $active;
	public $temp_url = '{wt_cat_url}';
	public static $definition = array(
		'table' => 'wtcategory',
		'primary' => 'id_wtcategory',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			'id_wtgroupcategory' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'id_cat' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'cat_color' =>	array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'size' => 255),
			'position' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'active' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isBool', 'required' => true),
			'show_img' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isBool', 'required' => true),
			'special_prod' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt'),
			'cat_desc' =>	array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'cat_banner' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
			'cat_icon' =>	array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml'),
			'manufacture' =>array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'required' => false),
		)
	);

	public	function __construct($id_wtcategory = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_wtcategory, $id_lang, $id_shop);
		Shop::addTableAssociation('wtcategory', array('type' => 'shop'));
		Shop::addTableAssociation('wtcategory_lang', array('type' => 'fk_shop'));
		
		if ($this->id)
		{
			$this->active = $this->getFieldShop('active');
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				if (isset($this->cat_desc[(int)($language['id_lang'])]) && !empty($this->cat_desc[(int)($language['id_lang'])]))
				{
					$temp = str_replace($this->temp_url, _PS_BASE_URL_.__PS_BASE_URI__, $this->cat_desc[(int)($language['id_lang'])]);
					$this->cat_desc[(int)($language['id_lang'])] = $temp;
				}
			}
		}
	}
	
	public function getFieldShop($field)
	{
		$id_shop = (int)Context::getContext()->shop->id;
		$sql = 'SELECT wms.'.$field.' FROM '._DB_PREFIX_.'wtcategory wm
		LEFT JOIN '._DB_PREFIX_.'wtcategory_shop wms ON (wm.id_wtcategory = wms.id_wtcategory)
		WHERE wm.id_wtcategory = '.$this->id.' AND wms.id_shop = '.$id_shop.'';
		$result = Db::getInstance()->getValue($sql);
		return $result;
	}
	
	public function add($autodate = true, $null_values = false)
	{
		$res = parent::add($autodate, $null_values);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$cat_banner = $this->cat_banner;
		$cat_icon = $this->cat_icon;
		
		foreach ($cat_banner as $image)
		{
			if (preg_match('/sample/', $image) === 0)
				if ($image && file_exists(_PS_MODULE_DIR_.'wtproductcategory/views/img/banners/'.$image))
					$res &= @unlink(_PS_MODULE_DIR_.'wtproductcategory/views/img/banners/'.$image);
		}
		
		if (preg_match('/sample/', $cat_icon) === 0)
			if ($cat_icon && file_exists(_PS_MODULE_DIR_.'wtproductcategory/views/img/icons/'.$cat_icon))
				$res &= @unlink(_PS_MODULE_DIR_.'wtproductcategory/views/img/icons/'.$cat_icon);
		
		$res &= parent::delete();
		return $res;
	}
	
	public function deleteIcon()
	{
		$res = true;
		$cat_icon_new = '';
		$cat_icon = $this->cat_icon;
		$id_shop = (int)Context::getContext()->shop->id;
		if (preg_match('/sample/', $cat_icon) === 0)
			if ($cat_icon && file_exists(_PS_MODULE_DIR_.'wtproductcategory/views/img/icons/'.$cat_icon))
				$res &= @unlink(_PS_MODULE_DIR_.'wtproductcategory/views/img/icons/'.$cat_icon);
		$sql = 'UPDATE '._DB_PREFIX_.'wtcategory_shop SET cat_icon = "'.$cat_icon_new.'" WHERE id_wtcategory = '.$this->id.' AND id_shop = '.$id_shop;
		$sql1 = 'UPDATE '._DB_PREFIX_.'wtcategory SET cat_icon = "'.$cat_icon_new.'" WHERE id_wtcategory = '.$this->id;
		$res &= Db::getInstance(_PS_USE_SQL_SLAVE_)->execute($sql);
		$res &= Db::getInstance(_PS_USE_SQL_SLAVE_)->execute($sql1);
		return $res;
	}	
	public function deleteBanner()
	{
		$res = true;
		$banner_new = '';
		$cat_banner = $this->cat_banner;
		$id_shop = (int)Context::getContext()->shop->id;
		foreach ($cat_banner as $key => $image)
		{
			if (preg_match('/sample/', $image) === 0)
				if ($image && file_exists(_PS_MODULE_DIR_.'wtproductcategory/views/img/banners/'.$image))
					$res &= @unlink(_PS_MODULE_DIR_.'wtproductcategory/views/img/banners/'.$image);
			$sql = 'UPDATE '._DB_PREFIX_.'wtcategory_lang SET cat_banner = "'.$banner_new.'" WHERE id_wtcategory = '.$this->id.' AND id_lang = '.$key.' AND id_shop = '.$id_shop;
			$res &= Db::getInstance(_PS_USE_SQL_SLAVE_)->execute($sql);
		}
		return $res;
	}	
	public function getCatByGroupId($id_group)
	{
		$this->context = Context::getContext();
		$id_shop = (int)Context::getContext()->shop->id;
		$id_lang = (int)$this->context->language->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT wc.*,wl.*
			FROM '._DB_PREFIX_.'wtcategory_shop wc
			LEFT JOIN '._DB_PREFIX_.'wtcategory_lang wl ON (wc.`id_wtcategory` = wl.`id_wtcategory` AND wc.id_shop = wl.id_shop)
			WHERE wc.id_wtgroupcategory = '.$id_group.' AND wl.id_shop = '.$id_shop.'
			AND wl.id_lang = '.$id_lang.' AND wc.active = 1');
	}
	public function uploadImage($feild, $id_lang, $folder)
	{
		$file_up = '';
		/* Uploads image and sets cat_item */
				$type = Tools::strtolower(Tools::substr(strrchr($_FILES[$feild.$id_lang]['name'], '.'), 1));
				$imagesize = @getimagesize($_FILES[$feild.$id_lang]['tmp_name']);
				if (isset($_FILES[$feild.$id_lang]) &&
					isset($_FILES[$feild.$id_lang]['tmp_name']) &&
					!empty($_FILES[$feild.$id_lang]['tmp_name']) &&
					!empty($imagesize) && in_array(
						Tools::strtolower(Tools::substr(strrchr($imagesize['mime'], '/'), 1)), array(
							'jpg',
							'gif',
							'jpeg',
							'png'
						)
					) && in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
				{
					$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
					$salt = sha1(microtime());
					if ($error = ImageManager::validateUpload($_FILES[$feild.$id_lang]))
						return false;
					elseif (!$temp_name || !move_uploaded_file($_FILES[$feild.$id_lang]['tmp_name'], $temp_name))
						return false;
					elseif (!ImageManager::resize($temp_name, _PS_MODULE_DIR_.$folder.$salt.'_'.$_FILES[$feild.$id_lang]['name'], null, null, $type))
						return false;
					if (isset($temp_name))
						@unlink($temp_name);
					
					$file_up = $salt.'_'.$_FILES[$feild.$id_lang]['name'];
				}
			return $file_up;
	}
	
	public function uploadImage1($feild, $folder)
	{
		$file_up = '';
		/* Uploads image and sets cat_item */
				$type = Tools::strtolower(Tools::substr(strrchr($_FILES[$feild]['name'], '.'), 1));
				$imagesize = @getimagesize($_FILES[$feild]['tmp_name']);
				if (isset($_FILES[$feild]) &&
					isset($_FILES[$feild]['tmp_name']) &&
					!empty($_FILES[$feild]['tmp_name']) &&
					!empty($imagesize) &&
					in_array(
						Tools::strtolower(Tools::substr(strrchr($imagesize['mime'], '/'), 1)), array(
							'jpg',
							'gif',
							'jpeg',
							'png'
						)
					) && in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
				{
					$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
					$salt = sha1(microtime());
					if ($error = ImageManager::validateUpload($_FILES[$feild]))
						return false;
					elseif (!$temp_name || !move_uploaded_file($_FILES[$feild]['tmp_name'], $temp_name))
						return false;
					elseif (!ImageManager::resize($temp_name, _PS_MODULE_DIR_.$folder.$salt.'_'.$_FILES[$feild]['name'], null, null, $type))
						return false;
					if (isset($temp_name))
						@unlink($temp_name);
					
					$file_up = $salt.'_'.$_FILES[$feild]['name'];
				}
			return $file_up;
	}
	
}