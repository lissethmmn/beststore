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

class WtSlideshowClass extends ObjectModel
{
	public $slidedelay;
	public $transition2d;
	public $transition3d;
	public $timeshift;
	public $title;
	public $url;
	public $image;
	public $thumbnail;
	public $active;
	public $position;
	public static $definition = array(
		'table' => 'wtslideshow',
		'primary' => 'id_wtslideshow',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			'position' =>	array('type' => self::TYPE_INT, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'slidedelay' =>	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'transition2d' =>array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'required' => false),
			'transition3d' =>array('type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'required' => false),
			'timeshift' =>	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isunsignedInt', 'required' => true),
			'active' =>	array('type' => self::TYPE_BOOL, 'shop' => true, 'validate' => 'isBool', 'required' => true),
			'title' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
			'url' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isUrl', 'required' => true, 'size' => 255),
			'image' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 255),
			'thumbnail' =>	array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml','size' => 255),
		)
	);

	public	function __construct($id_slide = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_slide, $id_lang, $id_shop);
		Shop::addTableAssociation('wtslideshow', array('type' => 'shop'));
		Shop::addTableAssociation('wtslideshow_lang', array('type' => 'fk_shop'));
		if ($this->id)
			$this->active = $this->getFieldShop('active');
	}
	
	public function getFieldShop($field)
	{
		$id_shop = (int)Context::getContext()->shop->id;
		$sql = 'SELECT wms.'.$field.' FROM '._DB_PREFIX_.'wtslideshow wm
		LEFT JOIN '._DB_PREFIX_.'wtslideshow_shop wms ON (wm.id_wtslideshow = wms.id_wtslideshow)
		WHERE wm.id_wtslideshow = '.$this->id.' AND wms.id_shop = '.$id_shop.'';
		$result = Db::getInstance()->getValue($sql);
		return $result;
	}
	
	public function add($autodate = true, $null_values = false)
	{
		$res = parent::add($autodate, $null_values);
		return $res;
	}

	public function delete()
	{
		$res = true;
		$images = $this->image;
		$id_shop = Context::getContext()->shop->id;
		
		foreach ($images as $image)
		{
			if (preg_match('/sample/', $image) === 0)
				if ($image && file_exists(dirname(__FILE__).'/img/sliderimages/'.$image))
					$res &= @unlink(dirname(__FILE__).'/img/sliderimages/'.$image);
		}
		
		$caps = $this->getCaptionsByIdSlider($this->id);
		if (count($caps) > 0)
		{
			foreach ($caps as $cap)
			{
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'wtslideshow_caption_lang`
					WHERE `id_caption` = '.$cap['id_caption']
				);	
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'wtslideshow_caption_shop`
					WHERE `id_caption` = '.$cap['id_caption']
				);	
				$res &= Db::getInstance()->execute('
					DELETE FROM `'._DB_PREFIX_.'wtslideshow_caption`
					WHERE `id_caption` = '.$cap['id_caption']
				);
			}
		}
		$res &= parent::delete();
		return $res;
	}
	
	public function getCaptionsByIdSlider($id_slide)
	{
		$this->context = Context::getContext();
		$id_shop = (int)Context::getContext()->shop->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*
			FROM '._DB_PREFIX_.'wtslideshow_caption c
			LEFT JOIN `'._DB_PREFIX_.'wtslideshow_caption_shop` cs ON (c.`id_wtslideshow` = cs.`id_wtslideshow`)
			WHERE c.`id_wtslideshow` = '.$id_slide.' AND cs.`id_shop` = '.$id_shop.' ORDER BY c.order');
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
	public function getSlideById($id_slide)
	{
		$this->context = Context::getContext();
		$id_shop = Context::getContext()->shop->id;
		$id_lang = $this->context->language->id;
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT cs.*,cl.*
			FROM '._DB_PREFIX_.'wtslideshow cs
			LEFT JOIN '._DB_PREFIX_.'wtslideshow_lang cl ON (cs.`id_wtslideshow` = cl.`id_wtslideshow`)
			WHERE cs.id_wtslideshow = '.$id_slide.' AND id_shop = '.(int)$id_shop.'
			AND cl.id_lang = '.(int)$id_lang);
	}
}