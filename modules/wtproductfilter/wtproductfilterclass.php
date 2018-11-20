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

class WTProductFilterClass extends ObjectModel
{
	public $id_tab;
	public $product_type;
	public $position;
	public $active;
	public $title;
	public $cat_desc;
	public $product_type_menu;
	public $product_list = false;
	
public static $definition = array(
		'table' => 'wtproductfilter_tabs',
		'primary' => 'id_tab',
		'multilang' => true,
		'fields' => array(
			'product_type' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
			'position' =>		array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'active' =>			array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
			'title' =>			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
		)
);
public	function __construct($id_tab = null, $id_lang = null, $id_shop = null, Context $context = null)
{
		parent::__construct($id_tab, $id_lang, $id_shop);
		$this->product_type_menu = (int)(preg_replace('/[^0-9]/', '', $this->product_type));
}

public function add($autodate = true, $null_values = false)
{
		$context = Context::getContext();
		$id_shop = $context->shop->id;

		$res = parent::add($autodate, $null_values);
		$res &= Db::getInstance()->execute('
			INSERT INTO `'._DB_PREFIX_.'wtproductfilter` (`id_shop`, `id_tab`)
			VALUES('.(int)$id_shop.', '.(int)$this->id.')'
		);
		return $res;
}

public function delete()
{
		$res = true;
		$res &= $this->reOrderPositions();
		$res &= Db::getInstance()->execute('
			DELETE FROM `'._DB_PREFIX_.'wtproductfilter`
			WHERE `id_tab` = '.(int)$this->id
		);

		$res &= parent::delete();
		return $res;
}

public function reOrderPositions()
{
		$id_tab = $this->id;
		$context = Context::getContext();
		$id_shop = $context->shop->id;

		$max = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT MAX(tts.`position`) as position
			FROM `'._DB_PREFIX_.'wtproductfilter_tabs` tts, `'._DB_PREFIX_.'wtproductfilter` t
			WHERE tts.`id_tab` = t.`id_tab` AND t.`id_shop` = '.(int)$id_shop
		);

		if ((int)$max == (int)$id_tab)
			return true;

		$rows = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT tts.`position` as position, tts.`id_tab` as id_tab
			FROM `'._DB_PREFIX_.'wtproductfilter_tabs` tts
			LEFT JOIN `'._DB_PREFIX_.'wtproductfilter` t ON (tts.`id_tab` = t.`id_tab`)
			WHERE t.`id_shop` = '.(int)$id_shop.' AND tts.`position` > '.(int)$this->position
		);

		foreach ($rows as $row)
		{
			$current_tab = new WTProductFilterClass($row['id_tab']);
			--$current_tab->position;
			$current_tab->update();
			unset($current_tab);
		}

		return true;
}





	/*end get ratting*/

public function getProductList($nb = 10)
{
		$id_lang = (int)Context::getContext()->language->id;
		if (strpos($this->product_type, 'featured_products') !== false)
		{
			$category = new Category(Context::getContext()->shop->getCategory(), (int)Context::getContext()->language->id);
			$this->product_list = $category->getProducts($id_lang, 1, $nb);
		
			$link = new Link();
			$this->view_link = $link->getCategoryLink(2);
		}
		elseif (strpos($this->product_type, 'special_products') !== false)
		{
			$this->product_list = Product::getPricesDrop($id_lang, 0, $nb);
			
			$link = new Link();
			$this->view_link = $link->getPageLink('prices-drop', true);
		}
		elseif (strpos($this->product_type, 'topseller_products') !== false)
		{
			$this->product_list = ProductSale::getBestSalesLight($id_lang, 0, $nb);
			
			$link = new Link();
			$this->view_link = $link->getPageLink('best-sales', true);
		}
		elseif (strpos($this->product_type, 'new_products') !== false)
		{
			$this->product_list = Product::getNewProducts($id_lang, 0, $nb);
			
			$link = new Link();
			$this->view_link = $link->getPageLink('new-products', true);
		}
		elseif (strpos($this->product_type, 'choose_the_category') !== false)
		{ 
			$category = new Category((int)$this->product_type_menu, $id_lang);
			$this->product_list = $category->getProducts($id_lang, 1, $nb, 'date_add', 'DESC');
			
			$this->cat_desc = $category->description;
			$link = new Link();
			$this->view_link = $link->getCategoryLink((int)$this->product_type_menu);
			
		}		
}
}
?>
