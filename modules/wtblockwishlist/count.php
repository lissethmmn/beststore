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

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__).'/classes/WishList.php');
require_once(dirname(__FILE__).'/wtblockwishlist.php');


$context = Context::getContext();
$action = Tools::getValue('action');
$add = (!strcmp($action, 'add') ? 1 : 0);
$delete = (!strcmp($action, 'delete') ? 1 : 0);
$count = (!strcmp($action, 'count') ? 1 : 0);
$id_wishlist = (int)Tools::getValue('id_wishlist');
$id_product = (int)Tools::getValue('id_product');
$quantity = (int)Tools::getValue('quantity');
$id_product_attribute = (int)Tools::getValue('id_product_attribute');

// Instance of module class for translations
$module = new wtBlockWishList();

if (Configuration::get('PS_TOKEN_ENABLE') == 1 &&
	strcmp(Tools::getToken(false), Tools::getValue('token')) &&
	$context->customer->isLogged() === true
)
	echo $module->l('Invalid token', 'cart');
if ($context->customer->isLogged())
{
	if ($id_wishlist && WishList::exists($id_wishlist, $context->customer->id) === true)
		$context->cookie->id_wishlist = (int)$id_wishlist;

	if ((int)$context->cookie->id_wishlist > 0 && !WishList::exists($context->cookie->id_wishlist, $context->customer->id))
		$context->cookie->id_wishlist = '';

	if (empty($context->cookie->id_wishlist) === true || $context->cookie->id_wishlist == false)
		$context->smarty->assign('error', true);
	if (($add || $delete) && empty($id_product) === false)
	{
		if (!isset($context->cookie->id_wishlist) || $context->cookie->id_wishlist == '')
		{
			$wishlist = new WishList();
			$wishlist->id_shop = $context->shop->id;
			$wishlist->id_shop_group = $context->shop->id_shop_group;
			$wishlist->default = 1;

			$mod_wishlist = new wtBlockWishList();
			$wishlist->name = $mod_wishlist->default_wishlist_name;
			$wishlist->id_customer = (int)$context->customer->id;
			list($us, $s) = explode(' ', microtime());
			srand($s * $us);
			$wishlist->token = Tools::strtoupper(Tools::substr(sha1(uniqid(rand(), true)._COOKIE_KEY_.$context->customer->id), 0, 16));
			//$wishlist->add();
			$context->cookie->id_wishlist = (int)$wishlist->id;
			
		}
		if ($add && $quantity)
		{
			WishList::addProduct($context->cookie->id_wishlist, $context->customer->id, $id_product, $id_product_attribute, $quantity);
			
			$wt_data = array(
			'num_products' => count(WishList::getProductByIdCustomer($context->cookie->id_wishlist, $context->customer->id, $context->language->id, null, true)),
			'products' => WishList::getProductByIdCustomer($context->cookie->id_wishlist, $context->customer->id, $context->language->id, null, true),
			'link' => Context::getContext()->link
			);
			echo Tools::jsonEncode($wt_data);
			//$context->smarty->assign('products', WishList::getProductByIdCustomer($context->cookie->id_wishlist, $context->customer->id, $context->language->id, null, true));
			//$context->smarty->assign('link', Context::getContext()->link);
			//echo $module->display(dirname(__FILE__).'/wtblockwishlist.php', 'wtblockwishlist-ajax-content.tpl');
		}
		else if ($delete)
		{
			WishList::removeProduct($context->cookie->id_wishlist, $context->customer->id, $id_product, $id_product_attribute);
			$context->smarty->assign('products', WishList::getProductByIdCustomer($context->cookie->id_wishlist, $context->customer->id, $context->language->id, null, true));
			$context->smarty->assign('link', Context::getContext()->link);
			echo $module->display(dirname(__FILE__).'/wtblockwishlist.php', 'wtblockwishlist-ajax-content.tpl');
		}
	}

	$wt_data = array(
			'num_products' => count(WishList::getProductByIdCustomer($context->cookie->id_wishlist, $context->customer->id, $context->language->id, null, true)),
			//'products' => WishList::getProductByIdCustomer($id_wishlist, $context->customer->id, $context->language->id, null, true),
			'link' => Context::getContext()->link
			);
	echo Tools::jsonEncode($wt_data);
	
	
} else
	echo $module->l('You must be logged in to manage your wishlist.', 'cart');
