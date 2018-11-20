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

class SampleDataProdCat
{
	public function initData()
	{
		$return = true;
		$languages = Language::getLanguages(true);
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtgroupcategory` (`id_wtgroupcategory`, `group_cat`, `id_hook`, `type_display`, `num_show`, `use_slider`, `show_sub`, `active`) VALUES 
		(1, "Group category 1", "displayHome", "accordion", 11, 1, 1, 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtgroupcategory_shop` (`id_wtgroupcategory`, `group_cat`, `id_shop`, `id_hook`, `type_display`, `num_show`, `use_slider`, `show_sub`, `active`) VALUES 
		(1, "Group category 1", "'.$id_shop.'", "displayHome", "accordion", 11, 1, 1, 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtcategory` (`id_wtcategory`, `id_wtgroupcategory`, `id_cat`, `cat_icon`, `cat_color`, `manufacture`, `position`, `show_img`, `special_prod`, `active`) VALUES 
		(1, 1, 8, "ef20767c5043858645a828dc68a3ca22868112f9_1.png", "#3abbe7", "false", 1, 0, 0, 1),
		(2, 1, 7, "ea48e866b1062d91cba5325afab85a55849f4106_2.png", "#42c300", "false", 1, 0, 0, 1),
		(3, 1, 3, "4081ec3d6de4097112d4d04c9281b7a86646f981_3.png", "#f5d356", "false", 1, 0, 0, 1),
		(4, 1, 2, "6091bf13fb76ae4a2e8d2ffd0af186f30cf7df81_4.png", "#d2a26e", "false", 1, 0, 0, 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtcategory_shop` (`id_wtcategory`, `id_wtgroupcategory`, `id_shop`, `id_cat`, `cat_icon`, `cat_color`, `manufacture`, `position`, `show_img`, `special_prod`, `active`) VALUES 
		(1, 1, "'.$id_shop.'", 9, "ef20767c5043858645a828dc68a3ca22868112f9_1.png", "#3abbe7", "false", 1, 0, 0, 1),
		(2, 1, "'.$id_shop.'", 7, "ea48e866b1062d91cba5325afab85a55849f4106_2.png", "#42c300", "false", 1, 0, 0, 1),
		(3, 1, "'.$id_shop.'", 3, "4081ec3d6de4097112d4d04c9281b7a86646f981_3.png", "#f5d356", "false", 1, 0, 0, 1),
		(4, 1, "'.$id_shop.'", 2, "6091bf13fb76ae4a2e8d2ffd0af186f30cf7df81_4.png", "#d2a26e", "false", 1, 0, 0, 1);');
		
		foreach ($languages as $language)
		{
			$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtcategory_lang` (`id_wtcategory`, `id_shop`, `id_lang`, `cat_desc`, `cat_banner`) VALUES 
			(1, "'.$id_shop.'", "'.$language['id_lang'].'", "<p>DSLR Cameras With Lens</p>", "44b9e158848a3485a828fe76953f67bd57eb00e3_4.1.png"),
			(2, "'.$id_shop.'", "'.$language['id_lang'].'", "<p>Imac with Retina Display</p>", "daecdb94566b57bd718da001e20cf85a18b716ad_6.1.png"),
			(3, "'.$id_shop.'", "'.$language['id_lang'].'", "<p>purpose home theater speakers</p>", "cb6625558c8f6585814d21bf873b5955a02144c5_7.1.png"),
			(4, "'.$id_shop.'", "'.$language['id_lang'].'", "<p>X940D 4K HDR with Android TV</p>", "6ecf09fc180421ae39175a6693693c4432a15480_5.1.png");');
		}
		return $return;
	}
}
?>