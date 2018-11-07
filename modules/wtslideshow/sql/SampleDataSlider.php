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

class SampleDataSlider
{
	public function initData()
	{
		$return = true;
		$languages = Language::getLanguages(true);
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow` (`id_wtslideshow`, `position`, `slidedelay`, `transition2d`, `transition3d`, `timeshift`, `active`) VALUES 
		(1, 0, 4000, \'["1"]\', "false", 0, 1),
		(2, 0, 4000, \'["2"]\', "false", 0, 1),
		(3, 0, 4000, \'["3"]\', "false", 0, 1);
		');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow_shop` (`id_wtslideshow`, `id_shop`, `position`, `slidedelay`, `transition2d`, `transition3d`, `timeshift`, `active`) VALUES 
		(1, "'.$id_shop.'", 0, 4000, \'["1"]\', "false", 0, 1),
		(2, "'.$id_shop.'", 0, 4000, \'["2"]\', "false", 0, 1),
		(3, "'.$id_shop.'", 0, 4000, \'["3"]\', "false", 0, 1);
		');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow_options` (`id_wtslideshow_op`, `options`) VALUES 
		(1, \'{"fullwidth":"true","width":"1920","height":"600","responsive":"true","responsiveUnder":"1920","layersContainer":"0","showmobile":"true","autoStart":"true","pauseOnHover":"true","firstSlide":"1","animateFirstSlide":"true","loops":"0","forceLoopNum":"true","towWaySlideshow":"false","randomSlideshow":"true","skin":"v5","skinsPath":"views\/css\/skins\/","globalBGColor":"transparent","globalBGImage":"false","navPrevNext":"true","navStartStop":"false","navButtons":"true","hoverPrevNext":"true","hoverBottomNav":"true","keybNav":"true","touchNav":"true","showBarTimer":"false","showCircleTimer":"false","thumbnailNavigation":"hover","tnContainerWidth":"60%","tnWidth":"100","tnHeight":"60","tnActiveOpacity":"35","tnInactiveOpacity":"100","autoPlayVideos":"true","autoPauseSlideshow":"auto","youtubePreview":"maxresdefault.jpg","imgPreload":"true","lazyLoad":"true","yourLogo":"false","yourLogoStyle":"left: -10px; top: -10px;","yourLogoLink":"false","yourLogoTarget":"_blank"}\')
		');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow_options_shop` (`id_wtslideshow_op`, `id_shop`, `options`) VALUES 
		(1, "'.$id_shop.'", \'{"fullwidth":"true","width":"1920","height":"600","responsive":"true","responsiveUnder":"1920","layersContainer":"0","showmobile":"true","autoStart":"true","pauseOnHover":"true","firstSlide":"1","animateFirstSlide":"true","loops":"0","forceLoopNum":"true","towWaySlideshow":"false","randomSlideshow":"true","skin":"v5","skinsPath":"views\/css\/skins\/","globalBGColor":"transparent","globalBGImage":"false","navPrevNext":"true","navStartStop":"false","navButtons":"true","hoverPrevNext":"true","hoverBottomNav":"true","keybNav":"true","touchNav":"true","showBarTimer":"false","showCircleTimer":"false","thumbnailNavigation":"hover","tnContainerWidth":"60%","tnWidth":"100","tnHeight":"60","tnActiveOpacity":"35","tnInactiveOpacity":"100","autoPlayVideos":"true","autoPauseSlideshow":"auto","youtubePreview":"maxresdefault.jpg","imgPreload":"true","lazyLoad":"true","yourLogo":"false","yourLogoStyle":"left: -10px; top: -10px;","yourLogoLink":"false","yourLogoTarget":"_blank"}\')
		');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow_caption` (`id_caption`, `id_wtslideshow`, `type`, `order`, `params`) VALUES 
		(10, 1, 1, 300, \'{"style":"big_black","parallaxlevel":"0","class":"","datax":"383","datay":"184","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"300","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),		
		(11, 1, 1, 900, \'{"style":"medium_grey","parallaxlevel":"0","class":"","datax":"416","datay":"254","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"900","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(12, 1, 1, 1200, \'{"style":"small_text","parallaxlevel":"0","class":"","datax":"506","datay":"362","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"1200","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(13, 2, 1, 300, \'{"style":"big_black","parallaxlevel":"0","class":"","datax":"275","datay":"199","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"1200","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),		
		(14, 2, 1, 900, \'{"style":"big_bluee","parallaxlevel":"0","class":"","datax":"276","datay":"251","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"300","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(15, 2, 1, 300, \'{"style":"small_text","parallaxlevel":"0","class":"","datax":"279","datay":"382","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"1500","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(16, 3, 1, 600, \'{"style":"very_big_white","parallaxlevel":"0","class":"","datax":"258","datay":"201","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"300","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(17, 3, 1, 1200, \'{"style":"very_big_white","parallaxlevel":"0","class":"","datax":"257","datay":"348","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"1200","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\');');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow_caption_shop` (`id_caption`, `id_wtslideshow`, `id_shop`, `type`, `order`, `params`) VALUES 
		(10, 1, "'.$id_shop.'", 1, 300, \'{"style":"big_white","parallaxlevel":"0","class":"","datax":"179","datay":"179","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"300","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(11, 1, "'.$id_shop.'", 1, 900, \'{"style":"big_bluee","parallaxlevel":"0","class":"","datax":"121","datay":"381","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"900","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(12, 1, "'.$id_shop.'", 1, 1200, \'{"style":"medium_text","parallaxlevel":"0","class":"","datax":"183","datay":"313","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"1200","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(13, 2, "'.$id_shop.'", 1, 300, \'{"style":"big_white","parallaxlevel":"0","class":"","datax":"1134","datay":"100","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"1200","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),		
		(14, 2, "'.$id_shop.'", 1, 600, \'{"style":"medium_text","parallaxlevel":"0","class":"","datax":"1198","datay":"197","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"300","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(15, 2, "'.$id_shop.'", 1, 300, \'{"style":"small_text","parallaxlevel":"0","class":"","datax":"1357","datay":"382","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"300","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(16, 3, "'.$id_shop.'", 1, 600, \'{"style":"big_black","parallaxlevel":"0","class":"","datax":"242","datay":"253","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"300","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\'),
		(17, 3, "'.$id_shop.'", 1, 900, \'{"style":"big_bluee","parallaxlevel":"0","class":"","datax":"215","datay":"323","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"1200","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0","widthv":"","heightv":"","typev":""}\');');
		
		
		foreach ($languages as $language)
		{
			$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow_lang` (`id_wtslideshow`, `id_lang`, `id_shop`, `title`, `url`, `image`, `thumbnail`) VALUES 
			(1, "'.$language['id_lang'].'", "'.$id_shop.'", "Slider title", "#", "3bad785446fe1d25af4c229eb2aba5fb4dbebf3b_slide1.png", ""),
			(2, "'.$language['id_lang'].'", "'.$id_shop.'", "Slider title", "#", "faf369da25a10a29b84db6bbc100e7ae9c1b7d0b_slide2.png", ""),
			(3, "'.$language['id_lang'].'", "'.$id_shop.'", "Slider title", "#", "14ada0a92140c6f30a3c0ab95fd3ccd99886fecd_slide3.png", "");
			');
			
			$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtslideshow_caption_lang` (`id_caption`, `id_shop`, `id_lang`, `captext`, `capimage`, `capvideo`, `link`) VALUES 
			(10, "'.$id_shop.'", "'.$language['id_lang'].'", "Asus Laptop", "Layer Image 0", "Layer Video 0", "#"),
			(11, "'.$id_shop.'", "'.$language['id_lang'].'", "Lorem Ipsum is simply dummy text of a, used in the presentation and layout for print serving Lorem Ipsum is simply dummy text of a, used in the presentation", "Layer Image 2", "Layer Video 2", "#"),
			(12, "'.$id_shop.'", "'.$language['id_lang'].'", "shop now", "Layer Image 3", "Layer Video 3", "#"),
			(13, "'.$id_shop.'", "'.$language['id_lang'].'", "Smart Keyboard ", "Layer Image 0", "Layer Video 0", "#"),
			(14, "'.$id_shop.'", "'.$language['id_lang'].'", "The Smart Keyboard combines advanced technologies to create a keyboard like no other. It is a full-size keyboard that is fully portable, and it connects to iPad Pro with the Smart Connector.", "Layer Image 1", "Layer Video 1", "#"),
			(15, "'.$id_shop.'", "'.$language['id_lang'].'", "view details", "Layer Image 0", "Layer Video 0", "#"),
			(16, "'.$id_shop.'", "'.$language['id_lang'].'", "Samsung galaxy", "Layer Video 1", "Layer Video 0", "#"),
			(17, "'.$id_shop.'", "'.$language['id_lang'].'", "shop now", "Layer Image 4", "Layer Video 4", "#");');
		}
		return $return;
	}
}
?>