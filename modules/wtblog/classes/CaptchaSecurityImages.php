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

$width = Tools::getIsset('width') ? Tools::getValue('width') : 120;
$height = Tools::getIsset('height') ? Tools::getValue('height') : 40;
$characters = Tools::getIsset('characters') && Tools::getValue('characters') > 1 ? Tools::getValue('characters') : 6;
$cs = new CaptchaSecurityImages();
$captcha = $cs->captchaSecurity($width, $height, $characters);

class CaptchaSecurityImages
{
	public function generateCode($characters)
	{
		$possible = '23456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters)
		{ 
			$code .= Tools::substr($possible, mt_rand(0, Tools::strlen($possible) - 1), 1);
			$i++;
		}
		return $code;
	}

	public function captchaSecurity($width = 120, $height = 40, $characters = 6)
	{
		$font = '../views/fonts/monofont.ttf';
		$code = '123654';
		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height);
		$background_color = imagecolorallocate($image, 255, 255, 255);
		$text_color = imagecolorallocate($image, 20, 40, 100);
		$noise_color = imagecolorallocate($image, 100, 120, 180);
		for ($i = 0; $i < ($width * $height) / 3; $i++)
			imagefilledellipse($image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $noise_color);
		for ($i = 0; $i < ($width * $height) / 150; $i++)
			imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $noise_color);
		$textbox = imagettfbbox($font_size, 0, $font, $code);
		$x = ($width - $textbox[4]) / 2;
		$y = ($height - $textbox[5]) / 2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $font, $code);
		imagejpeg($image);
		imagedestroy($image);
	}
}
?>