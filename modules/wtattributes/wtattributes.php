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

class WtAttributes extends Module
{
	public function __construct()
	{
		$this->name = 'wtattributes';
		$this->tab = 'front_office_features';
		$this->version = '1.1.0';
		$this->author = 'waterthemes';
		$this->need_instance = 0;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->getTranslator()->trans('WT Attributes Products', array(), 'Modules.WTAttributes.Admin');
		$this->description = $this->getTranslator()->trans('Show block Attributes products.', array(), 'Modules.WTAttributes.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
	}
	
	public function install()
	{
		if (!parent::install() || !$this->registerHook('displayHeader') ||  !$this->registerHook('displayProductAttributes'))
			return false;
		return true;
	}
	
	public function hookDisplayHeader()
	{
		$this->context->controller->addCss($this->_path.'views/css/wtattributes.css');
	}
	public function hookDisplayProductAttributes($params)
	{
		
			$id_lang = $this->context->language->id;
			$id_product = $params['product']['id_product'];
			$product = new Product($id_product);
			$group_attributes = $product->getAttributesGroups($id_lang);
			//$combinations = $product->getAttributeCombinations($id_lang);
			//$colorlist = $product->getAttributesColorList(null);
			
			$this->context->smarty->assign(array(
				'group_attributes' => $group_attributes
				
			));
		
		return $this->display(__FILE__, 'wtattributes.tpl');
	}
	
}