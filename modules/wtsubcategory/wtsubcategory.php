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

if (!defined('_PS_VERSION_'))
	exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class WTSubCategory extends Module
{

	private $html;
	private $config;
	private $settings_default;
	private $selected_category;
	protected static $cache_filter_categories;
	private $wt_cat_feature_config;
	public function __construct()
	{
		$this->name = 'wtsubcategory';
		$this->tab = 'front_office_features';
		$this->version = '1.1.0';
		$this->author = 'waterthemes';
		$this->need_instance = 0;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->getTranslator()->trans('WT Sub Categories', array(), 'Modules.WTSubCategory.Admin');
		$this->description = $this->getTranslator()->trans('Show sub categories on product list page.', array(), 'Modules.WTSubCategory.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
	}
	
	public function install()
	{
		if (!parent::install() || !$this->registerHook('displayHeader') || !$this->registerHook('categoryUpdate') || !$this->registerHook('displaySubCategory'))
			return false;
		return true;
	}
	public function uninstall()
	{
		if (parent::uninstall() == false)
			return false;
		return true;
	}
	

	
	
	public function callGetSubCategory($id_cat)
	{
		$id_lang = (int)$this->context->language->id;
			$iso_code = $this->context->language->iso_code;
			
		
		$categories = array();
		
			$category = new Category($id_cat, $id_lang);
			
			$categories = $category->getSubCategories($id_lang);
			foreach ($categories as $key => $subcat)
			{
				if (file_exists(_PS_CAT_IMG_DIR_.$subcat['id_category'].'_thumb.jpg'))
				$categories[$key]['cat_thumb'] = 1;
				else
				$categories[$key]['cat_thumb'] = 0;
			}
			
		
		return $categories;
	}
	
	public function hookDisplayHeader()
	{
		$this->context->controller->addCSS($this->_path.'/views/css/wtsubcategory.css');
		
	}
	
public function hookDisplaySubCategory($params)
{
	
			$id_lang = (int)$this->context->language->id;
			$iso_code = $this->context->language->iso_code;
			
			$subcategories = $this->callGetSubCategory($params['id_cat']);
			
			$this->context->smarty->assign(array(
				'subcategories' => $subcategories,
				'iso_code' => $iso_code,
				'path_ssl' => $this->context->link->getBaseLink(),
				
			));
		
			return $this->display(__FILE__, 'wtsubcategory.tpl');
}

}