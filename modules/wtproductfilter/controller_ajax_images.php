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
$wt_productfilter  = new wtproductfilter();

//if (!empty($_REQUEST['id_product']))

	$id_product = Tools::replaceAccentedChars($_REQUEST['id_Product']);

$imagesResults = $wt_productfilter->getThumbnailImages($id_product);

	Context::getContext()->smarty->assign(array(
			'wt_thumbnails' => $imagesResults['wt_thumbnails'],
			'wt_thumbnails_key' => rand(100, 999),
			'products' => $imagesResults['product'],
			'link' => Context::getContext()->link
		));

echo $wt_productfilter->display(dirname(__FILE__).'/wtproductfilter.php', 'thumbnail.tpl');
