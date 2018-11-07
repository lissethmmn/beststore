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

$res = true;
$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow` (
	  `id_wtslideshow` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `position` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `slidedelay` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `transition2d` TEXT NULL,
	  `transition3d` TEXT NULL,
	  `timeshift` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	  PRIMARY KEY (`id_wtslideshow`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');

$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow_shop` (
	  `id_wtslideshow` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_shop` int(10) unsigned NOT NULL,
	  `position` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `slidedelay` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `transition2d` TEXT NULL,
	  `transition3d` TEXT NULL,
	  `timeshift` int(10) unsigned NOT NULL DEFAULT \'0\',
	  `active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
	  PRIMARY KEY (`id_wtslideshow`,`id_shop`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');

$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow_options` (
	  `id_wtslideshow_op` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `options` text,
	  PRIMARY KEY (`id_wtslideshow_op`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');

$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow_options_shop` (
	  `id_wtslideshow_op` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_shop` int(10) unsigned NOT NULL,
	  `options` text,
	  PRIMARY KEY (`id_wtslideshow_op`,`id_shop`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');

$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow_lang` (
	  `id_wtslideshow` int(10) unsigned NOT NULL,
	  `id_lang` int(10) unsigned NOT NULL,
	  `id_shop` int(10) unsigned NOT NULL,
	  `title` varchar(255) NOT NULL,
	  `url` varchar(255) NOT NULL,
	  `image` varchar(255) NOT NULL,
	  `thumbnail` TEXT NULL,
	  PRIMARY KEY (`id_wtslideshow`,`id_lang`,`id_shop`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');

$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow_caption` (
	  `id_caption` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_wtslideshow` int(10) unsigned NOT NULL,
	  `type` int(10) unsigned NOT NULL,
	  `order` int(10) unsigned NOT NULL,
	  `params` text NOT NULL,
	  PRIMARY KEY (`id_caption`,`id_wtslideshow`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');

$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow_caption_shop` (
	  `id_caption` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `id_wtslideshow` int(10) unsigned NOT NULL,
	  `id_shop` int(10) unsigned NOT NULL,
	  `type` int(10) unsigned NOT NULL,
	  `order` int(10) unsigned NOT NULL,
	  `params` text NOT NULL,
	  PRIMARY KEY (`id_caption`,`id_wtslideshow`,`id_shop`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');

$res &= Db::getInstance()->execute('
	CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtslideshow_caption_lang` (
	  `id_caption` int(10) unsigned NOT NULL,
	  `id_shop` int(10) unsigned NOT NULL,
	  `id_lang` int(10) unsigned NOT NULL,
	  `captext` text NOT NULL,
	  `capimage` text NOT NULL,
	  `capvideo` text NOT NULL,
	  `link` text NULL,
	  PRIMARY KEY (`id_caption`,`id_shop`, `id_lang`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
');
return $res;