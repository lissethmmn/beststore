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

class SampleDataHtml
{
	public function initData()
	{
		
		$content_block1 = '<div class="banner-top-home">
								<div class="banner  col-xs-12 col-md-4">
								<div class="image"><a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/banner1.png" alt="" /></a></div>
								<div class="text">
								<div class="center">
								<h2>Sony music</h2>
								<p>completely renanoed </p>
								</div>
								<div class="bottom"><a href="#">shop now</a></div>
								</div>
								</div>
								<div class="banner  col-xs-12 col-md-4">
								<div class="image"><a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/banner2.png" alt="" /></a></div>
								<div class="text">
								<div class="center">
								<h2>modern</h2>
								<p>Smartphone</p>
								</div>
								<div class="bottom"><a href="#">shop now</a></div>
								</div>
								</div>
								<div class="banner  col-xs-12 col-md-4">
								<div class="image"><a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/banner3.png" alt="" /></a></div>
								<div class="text">
								<div class="center">
								<h2>discover</h2>
								<p>your design</p>
								</div>
								<div class="bottom"><a href="#">shop now</a></div>
								</div>
								</div>
								</div>';
		
		$content_block2 = '<p><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/logo_footer.png" alt="" /></p>';
							
									
		$content_block3 = '<div class="wt-bottom-footer">
							<p class="copyright">© 2018 ITmarket Theme by<a href="#" target="_blank"> Waterthemes</a>. All Rights Reserved.</p>
							<div class="payment">
							<a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/pay1.png" alt="" /></a> 
							<a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/pay2.png" alt="" /></a> 
							<a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/pay3.png" alt="" /></a> 
							<a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/pay4.png" alt="" /></a>
							</div>
							</div>';
	
		$content_block4 = '<div class="banner-left-column image"><a href="#"><img src="{static_block_url}themes/wt_buyonline/assets/img/cms/banner-left.jpg" alt="" /></a></div>';
		
		
								
		
		$displayNav = Hook::getIdByName('displayNav');
		$displayLeftLogo = Hook::getIdByName('displayLeftLogo');
		$displayRightLogo = Hook::getIdByName('displayRightLogo');
		$displayRightSlider = Hook::getIdByName('displayRightSlider');
		$displayTopHome = Hook::getIdByName('displayTopHome');
		$displayHome = Hook::getIdByName('displayHome');
		$displayLeftColumn = Hook::getIdByName('displayLeftColumn');
		$displayBannerCategory = Hook::getIdByName('displayBannerCategory');
		
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		
		/*install static Block*/
		$result = true;
		$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtcustomhtml` (`id_wtcustomhtml`, `hook`, `active`) 
			VALUES
			(1, "displayTopColumn", 1),
			(2, "displayLeftLogo", 1),
			(3, "displayBottomFooter", 1),
			(4, "displayLeftColumn", 1);'); 
		
		$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtcustomhtml_shop` (`id_wtcustomhtml`, `id_shop`,`active`) 
			VALUES 
			(1,'.$id_shop.', 1),
			(2,'.$id_shop.', 1),
			(3,'.$id_shop.', 1),
			(4,'.$id_shop.', 1);');
		
		foreach (Language::getLanguages(false) as $lang)
		{
			$result &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wtcustomhtml_lang` (`id_wtcustomhtml`, `id_shop`, `id_lang`, `title`, `content`) 
			VALUES 
			( "1", "'.$id_shop.'","'.$lang['id_lang'].'","Banner Top Home", \''.$content_block1.'\'),
			( "4", "'.$id_shop.'","'.$lang['id_lang'].'","Logo Footer Left", \''.$content_block2.'\'),
			( "5", "'.$id_shop.'","'.$lang['id_lang'].'","CopyRight And Payment", \''.$content_block3.'\'),
			( "6", "'.$id_shop.'","'.$lang['id_lang'].'","Banner Left Column", \''.$content_block4.'\');');
		}
		return $result;
	}
}