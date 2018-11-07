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

include_once('../../config/config.inc.php');
include_once('../../init.php');
include_once('wtslideshow.php');
$context = Context::getContext();
$wtslideshow = new WtSlideshow();

if (Tools::getValue('data'))
{
	$layer_obj = Tools::getValue('data');
	$wtslideshow->saveCaptions($layer_obj);
}
if (Tools::getValue('delete') && Tools::getValue('delete') == 1)
{
	$id_caption_del = Tools::getValue('id_caption');
	$wtslideshow->deleteCaptions($id_caption_del);
}
if (Tools::getValue('deleteall') && Tools::getValue('deleteall') == 1)
{
	$id_slide = Tools::getValue('id_slide');
	$wtslideshow->deleteAllCaptions($id_slide);
}
if (Tools::getValue('img_del') && Tools::getValue('img_del') != '')
{
	$img_del = Tools::getValue('img_del');
	$folder = Tools::getValue('folder');
	$wtslideshow->deleteImage($img_del, $folder);
}
if (Tools::getValue('action') == 'updateSlidesPosition' && Tools::getValue('slides'))
{

	$slides = Tools::getValue('slides');

	foreach ($slides as $position => $id_slide)
	{
		$res = Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'wtslideshow` SET `position` = '.(int)$position.'
			WHERE `id_wtslideshow` = '.(int)$id_slide
		);
		$res1 = Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'wtslideshow_shop` SET `position` = '.(int)$position.'
			WHERE `id_wtslideshow` = '.(int)$id_slide
		);
	}
	$wtslideshow->clearCache();
}
die;