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

class WtGroupCategoryClass extends ObjectModel
{
	public $group_cat;
	public $id_hook;
	public $type_display;
	public $num_show;
	public $use_slider;
	public $show_sub;
	public $active;
	public static $definition = array(
		'table' => 'wtgroupcategory',
		'primary' => 'id_wtgroupcategory',
		'multilang_shop' => true,
		'fields' => array(
			'group_cat' =>	array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
			'id_hook' =>	array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'required' => true),
			'type_display' =>	array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'required' => true),
			'num_show' =>	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'use_slider' =>	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'show_sub' =>	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'active' =>	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool', 'required' => true)
		)
	);

	public	function __construct($id_wtgroupcategory = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_wtgroupcategory, $id_lang, $id_shop);
		Shop::addTableAssociation('wtgroupcategory', array('type' => 'shop'));
	}

	public function add($autodate = true, $null_values = false)
	{
		$res = parent::add($autodate, $null_values);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$id_shop = Context::getContext()->shop->id;
		$cats = $this->getCategoryByIdGroupCat($this->id);
		
		if (count($cats) > 0)
		{
			foreach ($cats as $cat)
			{
				
				if (preg_match('/sample/', $cat['cat_banner']) === 0)
					if ($cat['cat_banner'] && file_exists(_PS_MODULE_DIR_.'wtproductcategory/views/img/banners/'.$cat['cat_banner']))
						$res &= @unlink(_PS_MODULE_DIR_.'wtproductcategory/views/img/banners/'.$cat['cat_banner']);
				
				if (preg_match('/sample/', $cat['cat_icon']) === 0)
					if ($cat['cat_icon'] && file_exists(_PS_MODULE_DIR_.'wtproductcategory/views/img/icons/'.$cat['cat_icon']))
						$res &= @unlink(_PS_MODULE_DIR_.'wtproductcategory/views/img/icons/'.$cat['cat_icon']);
				$cat_banner = $cat['cat_banner'];
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'wtcategory_lang`
					WHERE `id_wtcategory` = '.$cat['id_wtcategory']
				);
				
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'wtcategory_shop`
					WHERE `id_wtcategory` = '.$cat['id_wtcategory']
				);
				
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'wtcategory`
					WHERE `id_wtcategory` = '.$cat['id_wtcategory']
				);
			}
		}

		$res &= parent::delete();
		return $res;
	}
	
	public function getCategoryByIdGroupCat($id_gcat)
	{
		$this->context = Context::getContext();
		$id_shop = (int)Context::getContext()->shop->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT wc.*, wcl.*
			FROM '._DB_PREFIX_.'wtcategory_shop wc 
			LEFT JOIN '._DB_PREFIX_.'wtcategory_lang wcl ON (wcl.id_wtcategory = wc.id_wtcategory AND wc.id_shop = wcl.id_shop)
			WHERE wc.`id_wtgroupcategory` = '.$id_gcat.' AND wc.`id_shop` = '.$id_shop);
	}
	
	public function getGroupCatByHook($hook_name)
	{
		$this->context = Context::getContext();
		$id_shop = (int)Context::getContext()->shop->id;	
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT wt.*
			FROM '._DB_PREFIX_.'wtgroupcategory_shop wt
			WHERE wt.active = 1 AND wt.id_hook = "'.$hook_name.'" AND wt.id_shop = '.$id_shop);
	}
}