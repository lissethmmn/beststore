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

class WtCountdown extends Module
{
	public function __construct()
	{
		$this->name = 'wtcountdown';
		$this->tab = 'front_office_features';
		$this->version = '1.1.0';
		$this->author = 'waterthemes';
		$this->need_instance = 0;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->getTranslator()->trans('WT Count down', array(), 'Modules.WTCountdown.Admin');
		$this->description = $this->getTranslator()->trans('Show the block count down.', array(), 'Modules.WTCountdown.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
	}
	public function install()
	{
		if (!parent::install() || !$this->registerHook('header') || !$this->registerHook('displayCountDownProduct'))
				return false;
		return true;
	}
	public function uninstall()
	{
		if (!parent::uninstall())
				return false;
		return true;
	}
	public function hookDisplayCountDownProduct($params)
	{
		$check_time = null;
		if (isset($params['product']['specific_prices']))
		{
			$product_specific_price = $params['product']['specific_prices'];
			$this->smarty->assign('time_to', $product_specific_price['to']);
			$this->smarty->assign('time_from', $product_specific_price['from']);
			$id_product = $params['product']['id_product'];
			$this->smarty->assign('check_time', $check_time);
			$this->smarty->assign('id_product', $id_product);
			$this->smarty->assign('prev_id', $params['prev_id']);
			return $this->display(__FILE__, 'wtcountdown.tpl');
		}
		else
			return false;
	
	}
	public function hookHeader()
	{
		$this->context->controller->addCss($this->_path.'views/css/wtcountdown.css');
		$this->context->controller->addJs($this->_path.'views/js/wtcountdown.js');
	}
}