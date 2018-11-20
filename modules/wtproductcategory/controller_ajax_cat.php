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
include_once(dirname(__FILE__).'/wtproductcategory.php');
$wt_cat  = new wtproductcategory();

	$id_cat = Tools::replaceAccentedChars($_REQUEST['id_Cat']);
	$id_group = Tools::replaceAccentedChars($_REQUEST['id_Group']);
	$number_prod = Tools::replaceAccentedChars($_REQUEST['number_Prod']);
	$name_module = Tools::replaceAccentedChars($_REQUEST['name_Module']);
	$url_page_cart = Tools::replaceAccentedChars($_REQUEST['Url_Page_Cart']);
	$static_token = Tools::replaceAccentedChars($_REQUEST['Static_Token']);
	
	$productResults = $wt_cat->getProductCat($id_cat, $number_prod);

	Context::getContext()->smarty->assign(array(
			'cat_product_lists' => $productResults,
			'id_cat' => $id_cat,
			'name_module' => $name_module,
			'id_group' => $id_group,
			'url_page_cart' => $url_page_cart,
			'static_token' => $static_token,
			'link' => Context::getContext()->link
		));

echo $wt_cat->display(dirname(__FILE__).'/wtproductcategory.php', 'wtproductcategory_accordion_ajax.tpl');
