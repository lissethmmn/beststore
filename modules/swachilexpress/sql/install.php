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

$sql = array();

$sql[] = 'ALTER TABLE `'._DB_PREFIX_.'zone` 
ADD `usebychilexpress` INT NOT NULL , ADD `id_region` VARCHAR(255) NOT NULL ;';
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'swachilexpressguide` 
( `id_swachilexpressguide` INT NOT NULL AUTO_INCREMENT , 
`codigoEstado` VARCHAR(255) NOT NULL , 
`descripcionEstado` VARCHAR(255) NOT NULL , 
`numeroOT` VARCHAR(255) NOT NULL , 
`numeroOTPadre` VARCHAR(255) NOT NULL , 
`glosaProducto` VARCHAR(255) NOT NULL , 
`glosaServicio` VARCHAR(255) NOT NULL , 
`Numeroguia` VARCHAR(255) NOT NULL , 
`imagenEtiqueta` LONGTEXT NOT NULL , 
`id_order` INT NOT NULL , 
PRIMARY KEY (`id_swachilexpressguide`) ) ENGINE = MyISAM;';
$sql[] = 'ALTER TABLE `'._DB_PREFIX_.'swachilexpressguide` 
ADD `barcode` VARCHAR(255) NOT NULL , ADD `fechaImpresion` VARCHAR(255) NOT NULL ;';

$sql[] = 'ALTER TABLE `'._DB_PREFIX_.'swachilexpressguide` CHANGE `imagenEtiqueta`
`imagenEtiqueta` LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;';

$sql[] = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."swachilexpresslog` (
`id_swachilexpress_log` int(11) NOT NULL AUTO_INCREMENT,
`date` datetime NOT NULL,
`id_order` int(11) NOT NULL,
`desc` longtext NOT NULL,
`process` varchar(255) NOT NULL,
PRIMARY KEY (`id_swachilexpress_log`)
) ENGINE=MyISAM;";

$sql[] = "ALTER TABLE `"._DB_PREFIX_."swachilexpressguide` ADD `image` LONGTEXT NOT NULL ;";

$sql[] = "ALTER TABLE `"._DB_PREFIX_."state` ADD `ship_price` VARCHAR(255) NOT NULL ;";

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
