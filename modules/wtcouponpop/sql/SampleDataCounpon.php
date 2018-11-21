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

class SampleDataCounpon
{
	public function initData()
	{
		$return = true;
		$languages = Language::getLanguages(true);
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtcouponpop` (`id_wtcouponpop`, `cookies_time`, `active`) VALUES 
		(1, 864000, 1);
		');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtcouponpop_shop` (`id_wtcouponpop`, `id_shop`, `cookies_time`, `active`) VALUES 
		(1, "'.$id_shop.'", 864000, 1);
		');
		
		$text = '<div class="g-banner-popup">\r\n<h3>Enjoy a 10% offer</h3>\r\n<div class="g-social"><span>Like us on</span>\r\n<ul>\r\n<li class="facebook"><a class="_blank" href="http://www.facebook.com/prestashop" target="_blank"> <span>Facebook</span> </a></li>\r\n<li class="twitter"><a class="_blank" href="http://www.twitter.com/prestashop" target="_blank"> <span>Twitter</span> </a></li>\r\n<li class="rss"><a class="_blank" href="http://www.prestashop.com/blog/en/" target="_blank"> <span>RSS</span> </a></li>\r\n<li class="google-plus"><a class="_blank" href="https://www.google.com/+prestashop" rel="publisher" target="_blank"> <span>Google Plus</span> </a></li>\r\n</ul>\r\n</div>\r\n<p>Join our mailing list and Get 10% OFF for any of our plans!</p>\r\n</div>';
		
		foreach ($languages as $language)
		{
			$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtcouponpop_lang` (`id_wtcouponpop`, `id_shop`, `id_lang`, `content`, `background`) VALUES 
			(1, "'.$id_shop.'", "'.$language['id_lang'].'", \''.$text.'\', "coupon-1-1.jpg");
			');
		}
		return $return;
	}
}
?>