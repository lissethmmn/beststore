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
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class SampleDataSizeGuide
{
	public function initData()
	{
		$result = true;
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		$block1 = Tools::file_get_contents(dirname(__FILE__).'/content_size.html');
		
		$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtsizeguide` (`id_wtsizeguide`, `id_cat`, `product`, `active`) 
			VALUES
			(1, "0", "0", 1);'); 
		
		$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtsizeguide_shop` (`id_wtsizeguide`, `id_shop`, `id_cat`, `product`, `active`) 
			VALUES 
			(1,'.$id_shop.', "0", "0", 1);');
			
		foreach (Language::getLanguages(false) as $lang)
		{
			$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtsizeguide_lang` (`id_wtsizeguide`, `id_shop`, `id_lang`, `title`, `content`) 
			VALUES 
			("1", "'.$id_shop.'","'.$lang['id_lang'].'","Size Guide", \''.$block1.'\');');
		}
		return $result;
	}
}