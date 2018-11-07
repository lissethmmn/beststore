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

include_once(dirname(__FILE__).'/classes/specialproductclass.php');
include_once(dirname(__FILE__).'/classes/SoldClass.php');

class WtSpecials extends Module
{
	private $_html;
	private $_config;
	private $_settings_default;
	protected static $cache_filter_products;
	private $wt_config_special;
	private $size_big_product = 30;
	public function __construct()
	{
		$this->name = 'wtspecials';
		$this->tab = 'front_office_features';
		$this->version = '1.1.0';
		$this->author = 'waterthemes';
		$this->module_key = '671653f7bce93c0f8e30e2d92fe1b1a6';
		$this->need_instance = 0;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->getTranslator()->trans('WT Specials Products', array(), 'Modules.WTSpecialsProducts.Admin');
		$this->description = $this->getTranslator()->trans('Show block Specials products.', array(), 'Modules.WTSpecialsProducts.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
		
		$this->wt_config_special = 'WT_CONFIG_SPECIAL';
		$this->_settings_default = array (
			'used_slider' => 1,
			'number_product_get' => 13,
			'banner' => ''
		);
		$this->getInitSettings();
	}
	public function getInitSettings()
	{
		$this->_config = (array)Tools::jsonDecode(Configuration::get($this->wt_config_special));
		$this->_config = (object)array_merge((array)$this->_settings_default, $this->_config);
	}
	public function install()
	{

		if (!parent::install() || !$this->registerHook('displayHeader') || !$this->registerHook('addproduct') || !$this->registerHook('updateproduct') || !$this->registerHook('deleteproduct') || !$this->registerHook('categoryUpdate') || !$this->registerHook('displayTopColumn') || !$this->registerHook('SoldProducts') || !$this->registerHook('displayAdminProductsExtra') || !$this->registerHook('ActionAdminProductsControllerSaveAfter'))
			return false;
		if (!$this->createTables())
	 		return false;	
		if (!$this->initData())
			return false;	
		
		if (!Configuration::hasKey($this->wt_config_special))
			Configuration::updateValue($this->wt_config_special, '');
		return true;
	}
	
		
protected function createTables()
{
		/* Menus */
		$res = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtsoldproducts` (
				`id_soldproducts` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_product` int(10) unsigned NOT NULL,
				`quantity` int(10) unsigned NULL,
				PRIMARY KEY (`id_soldproducts`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
		');

		/* Menus configuration */
		$res &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtsoldproducts_shop` (
			`id_soldproducts` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`id_shop` int(10) unsigned NOT NULL,
			`id_product` int(10) unsigned NOT NULL,
			`quantity` int(10) unsigned NULL DEFAULT \'0\',			 
			PRIMARY KEY (`id_soldproducts`, `id_shop`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
		');
		return $res;
}

public function initData()
{
	$languages = Language::getLanguages(true);
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		$q = 400;
		$result = true;
		for ($i =1; $i < 7; $i++)
		{
			$q = $q + 200;
			$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtsoldproducts` (`id_soldproducts`, `id_product`, `quantity`) 
			VALUES 
			( "'.$i.'", "'.$i.'", "'.$q.'");');
			$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtsoldproducts_shop` (`id_soldproducts`, `id_shop`, `id_product`, `quantity`) 
			VALUES 
			( "'.$i.'",  "'.$id_shop.'", "'.$i.'", "'.$q.'");');
		}
		return $result;
}
	public function getProductsPerLineList()
	{
		$products_per_line = array();
		$i = 0;
		for ($i = 1; $i <= 8; $i++)
			$products_per_line[$i]['number'] = $i;
		return $products_per_line;
	}
	public function uninstall()
	{
		$this->_clearCache('wtnewproducts.tpl');
		if (parent::uninstall() == false || !Configuration::deleteByName($this->wt_config_special))
			return false;
		if (!Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'wtsoldproducts`, `'._DB_PREFIX_.'wtsoldproducts_shop`;'))
	 		return false;
		
		return true;
	}
	public function getContent()
	{
		$this->_postProcess();
		$this->initForm();
		return $this->_html;
	}
	public function checkValidate()
	{
		$configs = Tools::getValue('config');
		$errors = array();
		foreach ($configs as $key_option => $value_option)
		{
			$pos = strpos($key_option, 'number_');
			if ($pos !== false)
				if (isset($value_option) && (!$value_option || $value_option <= 0 || !Validate::isInt($value_option)))
					$errors[] = $this->l('An invalid '.$key_option.' has been specified.');
		}
		return $errors;
	}
	public function _postProcess()
	{
		if (Tools::isSubmit('saveConfig'))
		{
			$errors = $this->checkValidate();
			
			if (isset($errors) && count($errors))
				$this->_html .= $this->displayError(implode('<br/>', $errors));
			else 
			{
				$banner = $this->uploadImage('banner', 'wtspecials/views/img/banner/');
				
				$config = Tools::jsonEncode(Tools::getValue('config'));
				if ($config)
				{
					Configuration::updateValue($this->wt_config_special, $config);
					$this->_clearCache('wtnewproducts.tpl');
					Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&successConfirmation');
				}
			}
		}
		elseif (Tools::isSubmit('deletebanner'))
		{
			$this->_clearCache('wtnewproducts.tpl');
			if (preg_match('/sample/', $this->_config->banner) === 0)
				if ($this->_config->banner && file_exists(_PS_MODULE_DIR_.'wtspecials/views/img/banner/'.$this->_config->banner))
					@unlink(_PS_MODULE_DIR_.'wtspecials/views/img/banner/'.$this->_config->banner);
			$this->_config->banner = '';
			$config = Tools::jsonEncode($this->_config);
			Configuration::updateValue($this->wt_config_special, $config);
		}
		else if (Tools::isSubmit('successConfirmation'))
			$this->_html .= $this->displayConfirmation($this->l('Your settings have been updated.'));
	}
	public function initForm()
	{
		$fields_form = array();
		include(dirname(__FILE__).'/classes/settings.php');
		$this->fields_form[0]['form'] = $fields_form;
		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		foreach (Language::getLanguages(false) as $lang)
			$helper->languages[] = array(
				'id_lang' => $lang['id_lang'],
				'iso_code' => $lang['iso_code'],
				'name' => $lang['name'],
				'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
			);
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->toolbar_scroll = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'saveConfig';
		if (Tools::getIsset('config'))
			$this->_config = (object)array_merge(Tools::getValue('config'), (array)$this->_config);
		
		foreach ($this->fields_form[0]['form']['input'] as $field)
		{
			if ($field['name'] != 'banner')
			{
				$option = str_replace('config[', '', $field['name']);
				$option = str_replace(']', '', $option);
				$helper->fields_value[''.$field['name'].''] = (isset($this->_config->$option) ? $this->_config->$option : '');
			}
		}
		$this->fields_form[0]['form']['banner'] = $this->_config->banner;
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'image_baseurl' => $this->_path.'views/img/',
		);
		$this->_html .= $helper->generateForm($this->fields_form);
	}
	public function callGetProductList()
	{
		$id_lang = (int)$this->context->language->id;
		$number_product_get = $this->_config->number_product_get;
			$temp = new SpecialProductClass();
			$specialProducts = $temp->getSpecialProductList($number_product_get);
		return $specialProducts;
	}
	public function hookDisplayHeader()
	{
		$this->context->controller->addCss($this->_path.'views/css/wtspecials.css');
			
	}

	public function hookdisplayTopColumn()
	{
		
			$id_lang = $this->context->language->id;
			$id_shop = $this->context->shop->id;
			$products = $this->callGetProductList();

			
			if ($products)
			$this->context->smarty->assign(array(
				'new_products' => $products,
				'wtconfig' => $this->_config,
				 'name_module' => $this->name,
				 '_path'			=> $this->_path,
				 'path_ssl' => $this->context->link->getBaseLink(),
				'banner_path' => $this->_path.'views/img/banner/',
			));
		
		if(Context::getContext()->isMobile())
			return $this->display(__FILE__, 'wtspecials_mobile.tpl');
		else
			return $this->display(__FILE__, 'wtspecials.tpl');
			
	}

	
	public function uploadImage($feild, $folder)
	{
		$file_up = '';
		$type = Tools::strtolower(Tools::substr(strrchr($_FILES[$feild]['name'], '.'), 1));
		$imagesize = @getimagesize($_FILES[$feild]['tmp_name']);
		if (isset($_FILES[$feild]) &&
			isset($_FILES[$feild]['tmp_name']) &&
			!empty($_FILES[$feild]['tmp_name']) &&
			!empty($imagesize) && in_array(Tools::strtolower(Tools::substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg','gif','jpeg','png')
			) && in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
		{
			$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
			$salt = Tools::substr($_FILES[$feild]['name'], strrpos($_FILES[$feild]['name'], '.') + 1);
			if ($error = ImageManager::validateUpload($_FILES[$feild]))
				return false;
			elseif (!$temp_name || !move_uploaded_file($_FILES[$feild]['tmp_name'], $temp_name))
				return false;
			elseif (!ImageManager::resize($temp_name, _PS_MODULE_DIR_.$folder.'banner_new.'.$salt, null, null, $type))
				return false;
			if (isset($temp_name))
				@unlink($temp_name);
			$file_up = 'banner_new.'.$salt;
		}
		return $file_up;
	}
	
	public function hookDisplayAdminProductsExtra($params)
{
		$this->context->controller->addJs($this->_path.'views/js/wtspecials.js');
		
	   $id_product = $params['id_product'];
	   $tam = new SoldClass();
	   $check_id = $tam->getQuantity($id_product);
	   $quantity = 0;
		if (count($check_id) > 0)
			{
				foreach($check_id as $value)
				$id_soid = $value['id_soldproducts'];
				
				$sold = new SoldClass((int)$id_soid);
				$quantity = $sold->quantity;
			}
			else
			{
				$quantity =  $id_product;
			}
			$this->context->smarty->assign(array(
				'quantity' => $quantity,
				'path_ssl' => $this->context->link->getBaseLink(),
				'id_product' => $id_product
			 ));
		 return $this->display(__FILE__, 'views/templates/admin/wtsoldproducts_admin.tpl');
}

public function SaveQtyProduct($id_product, $static_quantity_instock) 
	{
		
		$status = '';
		
		$tam = new SoldClass();
		$check_id = $tam->getQuantity($id_product);
		
		if (count($check_id) > 0)
			{
				foreach($check_id as $value)
				$id_soid = $value['id_soldproducts'];
				
				$sold = new SoldClass((int)$id_soid);
				
				
				if(!is_numeric($static_quantity_instock)){
						$status = $this->l('Please do not use the text in the instock option.');
				  
				}
				else
				{
					$sold->quantity = $static_quantity_instock;
					$sold->id_product = $id_product;
					if (!$sold->update())
						$status = $this->l('The static quantity instock could not be save.');
				}
				
				
			}
			else
			{
				$tam = new SoldClass();
				$tam->quantity = $static_quantity_instock;
				$tam->id_product = $id_product;
				
				if(!is_numeric($static_quantity_instock)){
						$status = $this->l('Please do not use the text in the instock option.');
				}
				else
				{
					if (!$tam->add())
						$status = $this->l('The static quantity instock could not be save.');
				}
				
			}
			return $status;
	}
	
}