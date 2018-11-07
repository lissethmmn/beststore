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

class WtSlideshowOption extends ObjectModel
{
	public $id_wtslideshow_op;
	public $options;
	public static $definition = array(
		'table' => 'wtslideshow_options',
		'primary' => 'id_wtslideshow_op',
		'multilang_shop' => true,
		'fields' => array(
			'options' => array('type' => self::TYPE_HTML, 'shop' => true, 'validate' => 'isString')
		)
	);

	public	function __construct($id = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id, $id_lang, $id_shop);
		Shop::addTableAssociation('wtslideshow_options', array('type' => 'shop'));
	}
	public	function getOptions()
	{
		$option_arr = array();
		$option_arr['fullwidth'] = Tools::getValue('fullwidth', 'true');
		$option_arr['width'] = Tools::getValue('width', '1200');
		$option_arr['height'] = Tools::getValue('height', '600');
		$option_arr['responsive'] = Tools::getValue('responsive', 'true');
		$option_arr['responsiveUnder'] = Tools::getValue('responsiveUnder', '0');
		$option_arr['layersContainer'] = Tools::getValue('layersContainer', '0');
		$option_arr['showmobile'] = Tools::getValue('showmobile', 'false');
		$option_arr['autoStart'] = Tools::getValue('autoStart', 'true');
		$option_arr['pauseOnHover'] = Tools::getValue('pauseOnHover', 'true');
		$option_arr['firstSlide'] = Tools::getValue('firstSlide', '1');
		$option_arr['animateFirstSlide'] = Tools::getValue('animateFirstSlide', 'true');
		$option_arr['loops'] = Tools::getValue('loops', '0');
		$option_arr['forceLoopNum'] = Tools::getValue('forceLoopNum', 'true');
		$option_arr['towWaySlideshow'] = Tools::getValue('towWaySlideshow', 'false');
		$option_arr['randomSlideshow'] = Tools::getValue('randomSlideshow', 'false');
		$option_arr['skin'] = Tools::getValue('skin', 'v5');
		$option_arr['skinsPath'] = Tools::getValue('skinsPath', 'views/css/skins/');
		$option_arr['globalBGColor'] = Tools::getValue('globalBGColor', 'transparent');
		$option_arr['globalBGImage'] = Tools::getValue('globalBGImage', 'false');
		$option_arr['navPrevNext'] = Tools::getValue('navPrevNext', 'true');
		$option_arr['navStartStop'] = Tools::getValue('navStartStop', 'true');
		$option_arr['navButtons'] = Tools::getValue('navButtons', 'true');
		$option_arr['hoverPrevNext'] = Tools::getValue('hoverPrevNext', 'true');
		$option_arr['hoverBottomNav'] = Tools::getValue('hoverBottomNav', 'false');
		$option_arr['keybNav'] = Tools::getValue('keybNav', 'true');
		$option_arr['touchNav'] = Tools::getValue('touchNav', 'true');
		$option_arr['showBarTimer'] = Tools::getValue('showBarTimer', 'false');
		$option_arr['showCircleTimer'] = Tools::getValue('showCircleTimer', 'true');
		$option_arr['thumbnailNavigation'] = Tools::getValue('thumbnailNavigation', 'hover');
		$option_arr['tnContainerWidth'] = Tools::getValue('tnContainerWidth', '60%');
		$option_arr['tnWidth'] = Tools::getValue('tnWidth', '100');
		$option_arr['tnHeight'] = Tools::getValue('tnHeight', '60');
		$option_arr['tnActiveOpacity'] = Tools::getValue('tnActiveOpacity', '35');
		$option_arr['tnInactiveOpacity'] = Tools::getValue('tnInactiveOpacity', '100');
		$option_arr['autoPlayVideos'] = Tools::getValue('autoPlayVideos', 'true');
		$option_arr['autoPauseSlideshow'] = Tools::getValue('autoPauseSlideshow', 'auto');
		$option_arr['youtubePreview'] = Tools::getValue('youtubePreview', 'hqdefault.jpg');
		$option_arr['imgPreload'] = Tools::getValue('imgPreload', 'true');
		$option_arr['lazyLoad'] = Tools::getValue('lazyLoad', 'true');
		$option_arr['yourLogo'] = Tools::getValue('yourLogo', 'false');
		$option_arr['yourLogoStyle'] = Tools::getValue('yourLogoStyle', 'left: -10px; top: -10px;');
		$option_arr['yourLogoLink'] = Tools::getValue('yourLogoLink', 'false');
		$option_arr['yourLogoTarget'] = Tools::getValue('yourLogoTarget', '_blank');
		return $option_arr;
	}
	public function getSliderOptions($id_slider)
	{
		$this->context = Context::getContext();
		$id_shop = $this->context->shop->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT cop.`options`
			FROM '._DB_PREFIX_.'wtslideshow_options_shop cop
			WHERE id_wtslideshow_op = '.$id_slider.' AND id_shop = '.(int)$id_shop
		);
	}
}
