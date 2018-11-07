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

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
include_once(dirname(__FILE__).'/wtproductfilter.php');

	$wt_prod  = new wtproductfilter();

	$id_tab = Tools::replaceAccentedChars($_REQUEST['id_Tab']);
	$type_tab = Tools::replaceAccentedChars($_REQUEST['type_Tab']);
	$name_module = Tools::replaceAccentedChars($_REQUEST['name_Module']);
	$url_page_cart = Tools::replaceAccentedChars($_REQUEST['Url_Page_Cart']);
	$static_token = Tools::replaceAccentedChars($_REQUEST['Static_Token']);
	
	$productResults = $wt_prod->getProductsAjax($type_tab);
	
	Context::getContext()->smarty->assign(array(
			'products_list' => $productResults,
			'id_tab' => $id_tab,
			 'name_module' => $name_module,
			 'url_page_cart' => $url_page_cart,
			 'static_token' => $static_token,
			 'link' => Context::getContext()->link
		));

echo $wt_prod->display(dirname(__FILE__).'/wtproductfilter.php', 'wtproductfilter_ajax.tpl');
