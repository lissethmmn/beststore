<?php
/**
* 2007-2017 PrestaShop
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
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class WTAjaxcart extends Module
{
	public function __construct()
	{
		$this->name = 'wtajaxcart';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'waterthemes';
		$this->need_instance = 0;
		//$this->controllers = array('mywishlist', 'view');
		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->trans('WT Ajax Cart');
		$this->description = $this->trans('Load the content of cart when mouse hover icon cart.');
		$this->default_wishlist_name = $this->trans('My wishlist');
		$this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
		$this->html = '';
	}

	public function install()
	{
		
		if (!parent::install() || !$this->registerHook('header'))
			return false;
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;

		return true;
	}
	public function hookDisplayHeader()
	{
		$this->context->controller->addCss($this->_path.'views/css/wtajaxcart.css');
		$this->context->controller->addJS($this->_path.'views/js/wtajaxcart.js');
		
		
		Media::addJsDef(array(
				'linkajaxcart' => $this->context->link->getModuleLink('wtajaxcart', 'loadcart'),
				'token' => Tools::getToken(false),
			));	
	}
	public function getContent()
	{
			$this->html = '<h2><img src="'.$this->_path.'logo.png" alt="" /> '.$this->displayName.'</h2>';
			
			return $this->html;
			
			
	}
	
	
}