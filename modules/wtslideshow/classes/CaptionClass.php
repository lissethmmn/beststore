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

class CaptionClass extends ObjectModel
{
	public $id_wtslideshow;
	public $type;
	public $order;
	public $params;
	public $captext;
	public $capimage;
	public $capvideo;
	public $link;
	public static $definition = array(
		'table' => 'wtslideshow_caption',
		'primary' => 'id_caption',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			'id_wtslideshow' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt'),
			'type' => array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'order' => array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'params' => array('type' => self::TYPE_HTML, 'shop' => true, 'validate' => 'isString', 'required' => true),
			'captext' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString', 'required' => true),
			'capimage' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'capvideo' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'link' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString')
		)
	);

	public	function __construct($id_caption = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_caption, $id_lang, $id_shop);
		Shop::addTableAssociation('wtslideshow_caption', array('type' => 'shop'));
		Shop::addTableAssociation('wtslideshow_caption_lang', array('type' => 'fk_shop'));
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

	public function reOrderPositions()
	{
		$id_slide = $this->id;
		$context = Context::getContext();
		$id_shop = $context->shop->id;

		$max = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT MAX(hss.`position`) as position
			FROM `'._DB_PREFIX_.'wtslideshow` hss, `'._DB_PREFIX_.'homeslider` hs
			WHERE hss.`id_wtslideshow` = hs.`id_wtslideshow` AND hs.`id_shop` = '.(int)$id_shop
		);

		if ((int)$max == (int)$id_slide)
			return true;

		$rows = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT hss.`position` as position, hss.`id_wtslideshow` as id_slide
			FROM `'._DB_PREFIX_.'wtslideshow` hss
			LEFT JOIN `'._DB_PREFIX_.'homeslider` hs ON (hss.`id_wtslideshow` = hs.`id_wtslideshow`)
			WHERE hs.`id_shop` = '.(int)$id_shop.' AND hss.`position` > '.(int)$this->position
		);

		foreach ($rows as $row)
		{
			$current_slide = new HomeSlide($row['id_slide']);
			--$current_slide->position;
			$current_slide->update();
			unset($current_slide);
		}

		return true;
	}
	public function getCaptions($id_slide)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT cs.*
			FROM '._DB_PREFIX_.'wtslideshow_caption_shop cs
			WHERE cs.`id_wtslideshow` = '.$id_slide.' AND cs.`id_shop` = '.$id_shop.' ORDER BY cs.order');
	}
	public function getOrderMax($id_slide)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT MAX(cs.`order`) AS maxorder
			FROM '._DB_PREFIX_.'wtslideshow_caption_shop cs
			WHERE cs.`id_wtslideshow` = '.$id_slide.' AND cs.`id_shop` = '.$id_shop);
	}
	public function getOrders($id_slide)
	{
		$new_arr = array();
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT cs.`order`
			FROM '._DB_PREFIX_.'wtslideshow_caption_shop cs
			WHERE cs.`id_wtslideshow` = '.$id_slide.' AND cs.`id_shop` = '.$id_shop.' ORDER BY cs.order');
		if (is_array($result) && count($result) > 0)
		{
			foreach ($result as $key => $value)
				$new_arr[] = $value['order'];
			return Tools::jsonEncode($new_arr);
		}
		else
			return '';
	}
	
	public function getLayerText($id_caption)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT cl.*
			FROM '._DB_PREFIX_.'wtslideshow_caption_lang cl
			WHERE cl.`id_caption` = '.$id_caption.' AND cl.`id_shop` = '.$id_shop);
	}
	public function alldelete($id_slide)
	{
		$res = true;
		$sql1 = 'SELECT c.`id_caption` FROM '._DB_PREFIX_.'wtslideshow_caption c WHERE `id_wtslideshow`="'.$id_slide.'"';
		
		$id_caption = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql1);
		if (count($id_caption) > 0)
		{
			foreach ($id_caption as $idcap)
			{
				$id_cap = $idcap['id_caption'];
				$sql2 = 'DELETE FROM '._DB_PREFIX_.'wtslideshow_caption_lang WHERE `id_caption`="'.$id_cap.'"';
				$res &= Db::getInstance()->execute($sql2);
				$sql3 = 'DELETE FROM '._DB_PREFIX_.'wtslideshow_caption_shop WHERE `id_caption`="'.$id_cap.'"';
				$res &= Db::getInstance()->execute($sql3);
			}
			
			$sql = 'DELETE FROM '._DB_PREFIX_.'wtslideshow_caption WHERE `id_wtslideshow`="'.$id_slide.'"';
			$res &= Db::getInstance()->execute($sql);
		}
		return $res;
	}
	public function setLayerDefault($id_slide, $id_shop, $max_order)
	{	
		$id_lang = $this->context->language->id;
		
		$layer_default = '{"id_wtslideshow":"'.$id_slide.'","idshop":"'.$id_shop.'","type":"1","order":"1","params":{"style":"big_black","parallaxlevel":"0","class":"","datax":"200","datay":"200","offsetxin":"80","offsetxout":"-180","offsetyin":"0","offsetyout":"0","delayin":"'.$max_order.'","showuntil":"0","durationin":"1000","durationout":"1000","easingin":"easeInOutQuint","easingout":"easeInOutQuint","fadein":"true","fadeout":"true","rotatein":"0","rotateout":"0","rotatexin":"0","rotatexout":"0","rotateyin":"0","rotateyout":"0","scalexin":"1","scalexout":"1","scaleyin":"1","scaleyout":"1","skewxin":"0","skewxout":"0","skewyin":"0","skewyout":"0","transformoriginin":"50% 50% 0","transformoriginout":"50% 50% 0"},"captext":{"'.$id_lang.'":"Layer text"},"capimage":{"'.$id_lang.'":""},"capvideo":{"'.$id_lang.'":""},"link":{"'.$id_lang.'":"#"}}';
		return $layer_default;
	}

	public function strParams($params)
	{
		$strp = '';
		$strp .= 'parallaxlevel:'.$params['parallaxlevel'].';';
		$strp .= 'offsetxin:'.$params['offsetxin'].';';
		$strp .= 'offsetxout:'.$params['offsetxout'].';';
		$strp .= 'offsetyin:'.$params['offsetyin'].';';
		$strp .= 'offsetyout:'.$params['offsetyout'].';';
		$strp .= 'delayin:'.$params['delayin'].';';
		$strp .= 'showuntil:'.$params['showuntil'].';';
		$strp .= 'durationin:'.$params['durationin'].';';
		$strp .= 'durationout:'.$params['durationout'].';';
		$strp .= 'easingin:'.$params['easingin'].';';
		$strp .= 'easingout:'.$params['easingout'].';';
		$strp .= 'fadein:'.$params['fadein'].';';
		$strp .= 'fadeout:'.$params['fadeout'].';';
		$strp .= 'rotatein:'.$params['rotatein'].';';
		$strp .= 'rotateout:'.$params['rotateout'].';';
		$strp .= 'rotatexin:'.$params['rotatexin'].';';
		$strp .= 'rotatexout:'.$params['rotatexout'].';';
		$strp .= 'rotateyin:'.$params['rotateyin'].';';
		$strp .= 'rotateyout:'.$params['rotateyout'].';';
		$strp .= 'scalexin:'.$params['scalexin'].';';
		$strp .= 'scalexout:'.$params['scalexout'].';';
		$strp .= 'scaleyin:'.$params['scaleyin'].';';
		$strp .= 'scaleyout:'.$params['scaleyout'].';';
		$strp .= 'skewxin:'.$params['skewxin'].';';
		$strp .= 'skewxout:'.$params['skewxout'].';';
		$strp .= 'skewyin:'.$params['skewyin'].';';
		$strp .= 'skewyout:'.$params['skewyout'].';';
		$strp .= 'transformoriginin:'.$params['transformoriginin'].';';
		$strp .= 'transformoriginout:'.$params['transformoriginout'].';';
		
		return $strp;
	}
}