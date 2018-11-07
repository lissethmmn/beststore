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

class WtCouponPopClass extends ObjectModel
{
	public $id_wtcouponpop;
	public $cookies_time;
	public $background;
	public $content;
	public $active;
	
	public $temp_url = '{wtcouponpop_url}';
	public static $definition = array(
		'table' => 'wtcouponpop',
		'primary' => 'id_wtcouponpop',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			'content' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'background' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isFileName'),
			'cookies_time'  => 		array('type' => self::TYPE_INT,'shop' => true),
			'active'  => 		array('type' => self::TYPE_BOOL,'shop' => true)
		)
	);
	
	public	function __construct($id = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id, $id_lang, $id_shop);
		if ($this->id)
		{
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
				foreach ($this->fieldsValidateLang as $field => $validation)
				{	
					if (isset($this->{$field}[(int)($language['id_lang'])]))
					{
						$temp = str_replace($this->temp_url, _PS_BASE_URL_.__PS_BASE_URI__, $this->{$field}[(int)($language['id_lang'])]);
						$this->{$field}[(int)($language['id_lang'])] = $temp;
					}
				}
		}
		Shop::addTableAssociation('wtcouponpop', array('type' => 'shop'));
		Shop::addTableAssociation('wtcouponpop_lang', array('type' => 'fk_shop'));
	}
}
