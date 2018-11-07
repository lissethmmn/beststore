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

require_once(dirname(__FILE__).'/../../../config/config.inc.php');
/* Getting cookie or logout */
require_once(dirname(__FILE__).'/../../../init.php');
$query = Tools::getValue('q', false);
if (!$query || $query == '' || Tools::strlen($query) < 1)
	die();
/*
 * In the SQL request the "q" param is used entirely to match result in database.
 * In this way if string:"(ref : #ref_pattern#)" is displayed on the return list,
 * they are no return values just because string:"(ref : #ref_pattern#)"
 * is not write in the name field of the product.
 * So the ref pattern will be cut for the search request.
 */
if ($pos = Tools::strpos($query, ' (ref:'))
	$query = Tools::substr($query, 0, $pos);
$exclude_ids = Tools::getValue('exclude_ids', false);
if ($exclude_ids && $exclude_ids != 'NaN')
	$exclude_ids = implode(',', array_map('intval', explode(',', $exclude_ids)));
else
	$exclude_ids = '';
$sql = 'SELECT p.`id_wt_blog_post`, pl.name
		FROM `'._DB_PREFIX_.'wt_blog_post` p
		LEFT JOIN `'._DB_PREFIX_.'wt_blog_post_lang` pl ON (pl.id_wt_blog_post = p.id_wt_blog_post AND pl.id_lang = '.(int)Context::getContext()->language->id.Shop::addSqlRestrictionOnLang('pl').')
		WHERE p.active = 1 AND (pl.name LIKE \'%'.pSQL($query).'%\')'.
		(!empty($exclude_ids) ? ' AND p.id_wt_blog_post NOT IN ('.$exclude_ids.') ' : ' ');
$items = Db::getInstance()->executeS($sql);
if ($items)
	foreach ($items as $item)
		echo trim($item['name']).' (id - '.(int)($item['id_wt_blog_post']).')|'.(int)($item['id_wt_blog_post'])."\n";