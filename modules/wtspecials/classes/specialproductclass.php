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

class SpecialProductClass extends ObjectModel

{

	public $product_list = false;

	public	function __construct($id_tab = null, $id_lang = null, $id_shop = null)

	{

	

	}



public static function getGradeByProduct($id_product, $id_lang)

{

		if (!Validate::isUnsignedId($id_product) || !Validate::isUnsignedId($id_lang))

			die(Tools::displayError());

		$validate = Configuration::get('PRODUCT_COMMENTS_MODERATE');

		return (Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('

		SELECT pc.`id_product_comment`, pcg.`grade`, pccl.`name`, pcc.`id_product_comment_criterion`

		FROM `'._DB_PREFIX_.'product_comment` pc

		LEFT JOIN `'._DB_PREFIX_.'product_comment_grade` pcg ON (pcg.`id_product_comment` = pc.`id_product_comment`)

		LEFT JOIN `'._DB_PREFIX_.'product_comment_criterion` pcc ON (pcc.`id_product_comment_criterion` = pcg.`id_product_comment_criterion`)

		LEFT JOIN `'._DB_PREFIX_.'product_comment_criterion_lang` pccl ON (pccl.`id_product_comment_criterion` = pcg.`id_product_comment_criterion`)

		WHERE pc.`id_product` = '.(int)$id_product.'

		AND pccl.`id_lang` = '.(int)$id_lang.

		($validate == '1' ? ' AND pc.`validate` = 1' : '')));

}



public static function getGradedCommentNumber($id_product)

{

		if (!Validate::isUnsignedId($id_product))

			die(Tools::displayError());

		$validate = (int)Configuration::get('PRODUCT_COMMENTS_MODERATE');



		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('

		SELECT COUNT(pc.`id_product`) AS nbr

		FROM `'._DB_PREFIX_.'product_comment` pc

		WHERE `id_product` = '.(int)($id_product).($validate == '1' ? ' AND `validate` = 1' : '').'

		AND `grade` > 0');

		return (int)($result['nbr']);

}

public static function getAveragesByProduct($id_product, $id_lang)

{
		/* Get all grades */

		$grades = SpecialProductClass::getGradeByProduct((int)$id_product, (int)$id_lang);

		$total = SpecialProductClass::getGradedCommentNumber((int)$id_product);

		if (!count($grades) || (!$total))

			return array();



		/* Addition grades for each criterion */

		$criterionsGradeTotal = array();

		$count_grades = count($grades);

		for ($i = 0; $i < $count_grades; ++$i)

			if (array_key_exists($grades[$i]['id_product_comment_criterion'], $criterionsGradeTotal) === false)

				$criterionsGradeTotal[$grades[$i]['id_product_comment_criterion']] = (int)($grades[$i]['grade']);

			else

				$criterionsGradeTotal[$grades[$i]['id_product_comment_criterion']] += (int)($grades[$i]['grade']);



		/* Finally compute the averages */

		$averages = array();

		foreach ($criterionsGradeTotal as $key => $criterionGradeTotal)

			$averages[(int)($key)] = (int)($total) ? ((int)($criterionGradeTotal) / (int)($total)) : 0;

		return $averages;
}

	/*end get ratting*/


public function getStaticQuantity($id_product)
{
	$id = 0;
	$this->context = Context::getContext();
	$id_shop = (int)$this->context->shop->id;
	
	if($id_product)
	{
	$results = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT cs.* FROM `'._DB_PREFIX_.'wtsoldproducts` c
		LEFT JOIN `'._DB_PREFIX_.'wtsoldproducts_shop` cs ON (cs.id_soldproducts = c.id_soldproducts )
			WHERE cs.`id_product` = '.$id_product.' AND cs.`id_shop` = '.$id_shop.'');
		
		if (count($results) > 0)
			foreach ($results as $key => $value)
				$id = $value['quantity'];
	}
		return $id;
}

public function getSpecialProductList($nb = 6)

{

		$id_lang = (int)Context::getContext()->language->id;

		$this->product_list = Product::getPricesDrop($id_lang, 0, $nb);

		
		if(count($this->product_list) > 0)
		{
		for ($i = 0; $i < count($this->product_list); $i++)
			{	
					$sold_quantity = 0;
					$percent = 0;
					$quantity_static = (int)SpecialProductClass::getStaticQuantity($this->product_list[$i]['id_product']);
					if ($quantity_static !=0)
					{
						$sold_quantity = $quantity_static - (int)$this->product_list[$i]['quantity'];
						$this->product_list[$i]['sold_quantity'] = $sold_quantity;
						if ($sold_quantity > 0)
						{
							$percent =(float)($sold_quantity * 100)/$quantity_static;
							$this->product_list[$i]['percent'] = $percent;
						}
					}

			}
		}	
		return $this->product_list;

	}

}



?>

