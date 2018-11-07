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

class SoldClass extends ObjectModel
{
	public $quantity;
	public $id_product;
	public static $definition = array(
		'table' => 'wtsoldproducts',
		'primary' => 'id_soldproducts',
		'multilang' => false,
		'multilang_shop' => true,
		'fields' => array(
			'id_product' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt'),
			'quantity' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt')
		)
	);

	public	function __construct($id_soldproducts = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_soldproducts, $id_lang, $id_shop);
		Shop::addTableAssociation('wtsoldproducts', array('type' => 'shop'));
	}

	public function add($autodate = true, $null_values = false)
	{
		$res = parent::add($autodate, $null_values);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$res &= parent::delete();
		return $res;
	}

	
	public function getQuantity($id_product)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT cs.*
			FROM '._DB_PREFIX_.'wtsoldproducts c
			LEFT JOIN `'._DB_PREFIX_.'wtsoldproducts_shop` cs ON (cs.id_soldproducts = c.id_soldproducts )
			WHERE cs.`id_product` = '.$id_product.' AND cs.`id_shop` = '.$id_shop.'');
	}


}