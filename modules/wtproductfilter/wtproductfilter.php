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

if (!defined('_PS_VERSION_'))
exit;

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

include_once(dirname(__FILE__).'/wtproductfilterclass.php');

class WTProductFilter extends Module implements WidgetInterface
{
	private $html;
	private $product_types = array('featured_products' => 'Featured Products','special_products' => 'Special Products','topseller_products' => 'Top Seller Products','new_products' => 'New Products','choose_the_category' => 'Choose the Category...');
	
public function __construct()
{
	$this->name = 'wtproductfilter';
	$this->tab = 'others';
	$this->version = '1.0.0';
	$this->author = 'WaterThemes';
	$this->module_key = '';
	$this->secure_key = Tools::encrypt($this->name);
	$this->bootstrap = true;
	parent::__construct();
	$this->displayName = $this->getTranslator()->trans('WT Products Filter', array(), 'Modules.WTProductsFilter.Admin');
    $this->description = $this->getTranslator()->trans('Add Filter Products Tab on the homepage.', array(), 'Modules.WTProductsFilter.Admin');
	$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
}

public function add_sample_data()
{
		$languages = Language::getLanguages(false);
		for ($i = 1; $i <= 3; ++$i)
		{
			$tab = new WTProductFilterClass();
			$tab->active = 1;
			$tab->position = $i;
			if ($i == 1)
			$tab->product_type = 'choose_the_category_8';
			if ($i == 2)
			$tab->product_type = 'choose_the_category_3';
			if ($i == 3)
			$tab->product_type = 'choose_the_category_4';
			foreach ($languages as $language)
			{
				if ($i == 1)
				$tab->title[$language['id_lang']] = 'Women';
				if ($i == 2)
				$tab->title[$language['id_lang']] = 'Dress';
				if ($i == 3)
				$tab->title[$language['id_lang']] = 'Summary';
			}
			$tab->add();
		}
}
protected function createTables()
{
		/* Menus */
		$res = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtproductfilter` (
				`id_tab` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`id_shop` int(10) unsigned NOT NULL,
				PRIMARY KEY (`id_tab`, `id_shop`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
		');

		/* Menus configuration */
		$res &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtproductfilter_tabs` (
			`id_tab` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`product_type` varchar(255),
			`position` int(10) unsigned NOT NULL DEFAULT \'0\',
			`active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',			 
			PRIMARY KEY (`id_tab`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
		');

		/* Menus lang configuration */
		$res &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'wtproductfilter_tabs_lang` (
			  `id_tab` int(10) unsigned NOT NULL,
			  `id_lang` int(10) unsigned NOT NULL,
			  `title` varchar(255) NOT NULL,
			  PRIMARY KEY (`id_tab`,`id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;
		');

		return $res;
}	
public function install()
{
		Configuration::updateValue('NUM_PRO_DISPLAY', 10);
	/* Adds Module */
		if (parent::install() && $this->registerHook('displayHeader') && $this->registerHook('displayBottomHome') && $this->registerHook('displayProductListThumbnails') && $this->registerHook('displayProductListThumbnailsSpecial') && $this->registerHook('actionShopDataDuplication'))
		{
			/* Creates tables */
			$res = $this->createTables();

			/* Adds samples */
			if ($res)
				$this->add_sample_data();

			// Disable on mobiles and tablets
			//$this->disableDevice(Context::DEVICE_MOBILE);

			return (bool)$res;
		}
		return false;
}
protected function deleteTables()
{
		$tabs = $this->getTabs();
		foreach ($tabs as $tab)
		{
			$to_del = new WTProductFilterClass($tab['id_tab']);
			$to_del->delete();
		}

		return Db::getInstance()->execute('
			DROP TABLE IF EXISTS `'._DB_PREFIX_.'wtproductfilter`, `'._DB_PREFIX_.'wtproductfilter_tabs`, `'._DB_PREFIX_.'wtproductfilter_tabs_lang`;');
}
public function uninstall()
{
		Configuration::deleteByName('NUM_PRO_DISPLAY');
		/* Deletes Module */
		if (parent::uninstall())
		{
			/* Deletes tables */
			$res = $this->deleteTables();
			/* Unsets configuration */
			return (bool)$res;
		}

		return false;
}

	
public function getContent()
{
		$this->html = '<h2><img src="'.$this->_path.'logo.png" alt="" /> '.$this->displayName.'</h2>';
		
		$this->html .= $this->headerHTML();
		/* Validate & process */
		if (Tools::isSubmit('submitTab') || Tools::isSubmit('delete_id_tab') || Tools::isSubmit('submitOption') || Tools::isSubmit('changeStatus'))
		{
			if ($this->_postValidation())
			{
				$this->postProcess();
				$this->html .= $this->renderList();
				$this->html .= $this->displayFormOption();				
			}
			else
				$this->html .= $this->renderAddForm();
		}
		elseif (Tools::isSubmit('addTab') || (Tools::isSubmit('id_tab') && $this->slideExists((int)Tools::getValue('id_tab'))))
			$this->html .= $this->renderAddForm();
		else
		{
			$this->html .= $this->renderList();
			$this->html .= $this->displayFormOption();
		}

		return $this->html;
		
		
}
public function slideExists($id_tab)
{
		$req = 'SELECT t.`id_tab` as id_tab
				FROM `'._DB_PREFIX_.'wtproductfilter` t
				WHERE t.`id_tab` = '.(int)$id_tab;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);

		return ($row);
}

	private function _postValidation()
	{
		$errors = array();

		/* Validation for Menus configuration */
		if (Tools::isSubmit('submitOption'))
		{


		} /* Validation for status */
		elseif (Tools::isSubmit('changeStatus'))
		{
			if (!Validate::isInt(Tools::getValue('id_tab')))
				$errors[] = $this->l('Invalid tab');
		}
		/* Validation for Menu */
		elseif (Tools::isSubmit('submitTab'))
		{
			/* Checks state (active) */
			if (!Validate::isInt(Tools::getValue('active_tab')) || (Tools::getValue('active_tab') != 0 && Tools::getValue('active_tab') != 1))
				$errors[] = $this->l('Invalid tab state.');
			/* Checks position */
			if (!Validate::isInt(Tools::getValue('position')) || (Tools::getValue('position') < 0))
				$errors[] = $this->l('Invalid tab position.');
			
			/* If edit : checks id_menu */
			if (Tools::isSubmit('id_tab'))
			{

				//d(var_dump(Tools::getValue('id_tab')));
				if (!Validate::isInt(Tools::getValue('id_tab')) && !$this->slideExists(Tools::getValue('id_tab')))
					$errors[] = $this->l('Invalid id_tab');
			}
			/* Checks title/url/legend/description/image */
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				if (Tools::strlen(Tools::getValue('title_'.$language['id_lang'])) > 255)
					$errors[] = $this->l('The title is too long.');
			}

			/* Checks title/url/legend/description for default lang */
			$id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
			if (Tools::strlen(Tools::getValue('title_'.$id_lang_default)) == 0)
				$errors[] = $this->l('The title is not set.');
				
		} /* Validation for deletion */
		elseif (Tools::isSubmit('delete_id_tab') && (!Validate::isInt(Tools::getValue('delete_id_tab')) || !$this->slideExists((int)Tools::getValue('delete_id_tab'))))
			$errors[] = $this->l('Invalid id_tab');

		/* Display errors if needed */
		if (count($errors))
		{
			$this->html .= $this->displayError(implode('<br />', $errors));

			return false;
		}

		/* Returns if validation is ok */

		return true;
	}

private function postProcess()
{
		$errors = array();

		/* Processes Menus */
		if (Tools::isSubmit('changeStatus') && Tools::isSubmit('id_tab'))
		{
			$tab = new WTProductFilterClass((int)Tools::getValue('id_tab'));
			if ($tab->active == 0)
				$tab->active = 1;
			else
				$tab->active = 0;
			$res = $tab->update();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
		}
		/* Processes Menu */
		elseif (Tools::isSubmit('submitTab'))
		{		
			/* Sets ID if needed */
			if (Tools::getValue('id_tab'))
			{
				$tab = new WTProductFilterClass((int)Tools::getValue('id_tab'));
				if (!Validate::isLoadedObject($tab))
				{
					$this->html .= $this->displayError($this->l('Invalid id_tab'));
					return false;
				}
			}
			else
				$tab = new WTProductFilterClass();
				
				$tab->product_type_menu = Tools::getValue('id_cat');
				$tab->product_type = Tools::getValue('product_type');
				if ($tab->product_type == 'choose_the_category')
				$tab->product_type .= '_'.$tab->product_type_menu;
			/* Sets position */
			$tab->position = (int)Tools::getValue('position');
			/* Sets active */
			$tab->active = (int)Tools::getValue('active_tab');
			
			/* Sets each langue fields */
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
				$tab->title[$language['id_lang']] = Tools::getValue('title_'.$language['id_lang']);
			

			/* Processes if no errors  */
			if (!$errors)
			{
				/* Adds */
				if (!Tools::getValue('id_tab'))
				{
					if (!$tab->add())
						$errors[] = $this->displayError($this->l('The tab could not be added.'));
				}
				/* Update */
				elseif (!$tab->update())
					$errors[] = $this->displayError($this->l('The tab could not be updated.'));
			}
		} /* Deletes */
		elseif (Tools::isSubmit('delete_id_tab'))
		{
			$tab = new WTProductFilterClass((int)Tools::getValue('delete_id_tab'));
			$res = $tab->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		}
		elseif (Tools::isSubmit('submitOption'))
		{
		
			$num_pro_display = Tools::getValue('num_pro_display');
			Configuration::updateValue('NUM_PRO_DISPLAY', $num_pro_display);
			
			$this->html .= $this->displayConfirmation($this->l('Configuration updated'));		
		}
		/* Display errors if needed */
		if (count($errors))
			$this->html .= $this->displayError(implode('<br />', $errors));
		elseif (Tools::isSubmit('submitTab') && Tools::getValue('id_tab'))
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=4&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		elseif (Tools::isSubmit('submitTab'))
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=3&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);	
	
}

public function getTabs($active = null)
{
		$this->context = Context::getContext();
		$id_shop = $this->context->shop->id;
		$id_lang = $this->context->language->id;

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT t.`id_tab` as id_tab, tts.`position`, tts.`active`, tts.`product_type`, ttl.`title`
			FROM '._DB_PREFIX_.'wtproductfilter t
			LEFT JOIN '._DB_PREFIX_.'wtproductfilter_tabs tts ON (t.id_tab = tts.id_tab)
			LEFT JOIN '._DB_PREFIX_.'wtproductfilter_tabs_lang ttl ON (tts.id_tab = ttl.id_tab)
			WHERE id_shop = '.(int)$id_shop.'
			AND ttl.id_lang = '.(int)$id_lang.
			($active ? ' AND tts.`active` = 1' : ' ').'
			ORDER BY tts.position'
		);
}

public function renderList()
{
		$tabs = $this->getTabs();
		foreach ($tabs as $key => $tab)
			$tabs[$key]['status'] = $this->displayStatus($tab['id_tab'], $tab['active']);

		$this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'tabs' => $tabs,
				'path'	=> $this->_path
			)
		);
		return $this->display(__FILE__, 'list.tpl');
}

public function displayStatus($id_tab, $active)
{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		$this->context->smarty->assign(
			array(
				'title' => $title,
				'icon' => $icon,
				'class' => $class,
				'id_tab' => $id_tab,
				'link' => AdminController::$currentIndex,
				'name' => $this->name,
				'token' => Tools::getAdminTokenLite('AdminModules'),
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/displaystatus.tpl');
}


public function headerHTML()
{
		if (Tools::getValue('controller') != 'AdminModules' && Tools::getValue('configure') != $this->name)
			return;

		$this->context->controller->addJqueryUI('ui.sortable');
		$this->context->smarty->assign(
			array(
				'name_module' => $this->name,
				'secure_key' => $this->secure_key,
				'base_uri' => $this->context->shop->physical_uri.$this->context->shop->virtual_uri
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/header_admin.tpl');
}


public function displayFormOption()
{
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Option'),
					'icon' => 'icon-cogs'
				),
				'input' => array
				(
					array(
						'type' => 'text',
						'label' => $this->l('Products Displayed:'),
						'desc' => $this->l('Number of products to be displayed.'),
						'lang' => false,
						'name' => 'num_pro_display',
						'cols' => 10,
						'rows' => 10,
						'class' => 'fixed-width-xs'
					),						
				),
				'submit' => array(
					'title' => $this->l('Save'),
				)
			),
		);
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$this->fields_form = array();
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitOption';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'
		&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValuesOption()
		);
		$this->html .= '
			<legend><img src="'.$this->_path.'views/img/setting.png" alt="" title="" /> '.$this->l('Options').'</legend>';
		$this->html .= $helper->generateForm(array($fields_form));
		
}

public function getConfigFieldsValuesOption()
{
		return array(
			'num_pro_display' => Tools::getValue('num_pro_display', Configuration::get('NUM_PRO_DISPLAY'))
		);
}

public function getProductType()
{
		$productType = array();
		$i = 0;
		foreach ($this->product_types as $key => $name)
		{
			$productType[$i]['key'] = $key;
			$productType[$i]['name'] = $name;
			$i++;
		}
		return $productType;
}

public function renderAddForm()
{
		
		$ProductTypes = $this->getProductType();
		$id_tab = Tools::getValue('id_tab');
		$product_type = array('featured_products','special_products','topseller_products','new_products');
		if ($id_tab)
			$tab = new WTProductFilterClass((int)$id_tab);
		else
			$tab = new WTProductFilterClass();
		if (!in_array($tab->product_type, $product_type))
		{
			$tab->product_type = 'choose_the_category';
			$selected_categories = array($tab->product_type_menu); 
		}
		else
			$selected_categories = array();	
		$root_category = Context::getContext()->shop->getCategory();
		
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Menu informations'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
				array(
						'type' => 'text',
						'label' => $this->l('Title'),
						'name' => 'title',
						'lang' => true,
					),
					array(
					'type' => 'select',
					'label' => $this->l('Get product form'),
					'name' => 'product_type',
					'options' => array(
						'query' => $ProductTypes,
						'id' => 'key',
						'name' => 'name'
					)
				),
				array(
					'type'  => 'select_link',
					'label' => '',
					'name'  => 'id_cat',
					'show'  => $tab->product_type,
				),
				array(
						'type' => 'switch',
						'label' => $this->l('Displayed'),
						'name' => 'active_tab',
						'values' => array(
							array(
								'id' => 'display_on',
								'value' => 1,
								'label' => $this->l('Enabled')
							),
							array(
								'id' => 'display_off',
								'value' => 0,
								'label' => $this->l('Disabled')
							)
						),
					),
				),
				'submit' => array(
					'title' => $this->l('Save'),
				),
				'back'=> array(
				'title' => $this->l('Back to list'),
				),
			),
		);

		if (Tools::isSubmit('id_tab') && $this->slideExists((int)Tools::getValue('id_tab')))
		{
			$tab = new WTProductFilterClass((int)Tools::getValue('id_tab'));
			$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_tab');
			$cat_value = $tab->product_type_menu;
		}
		else
			$cat_value = 3;

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitTab';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
			'fields_value' => $this->getAddFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
			'image_baseurl' => $this->_path.'images/',
			'link' => $this->context->link,
			'cat_options' => $this->getAllCatLink(),
			'cat_value' => $cat_value
		);
		$helper->override_folder = '/';
		return $helper->generateForm(array($fields_form));
}

public function getAddFieldsValues()
{
		$fields = array();

		if (Tools::isSubmit('id_tab') && $this->slideExists((int)Tools::getValue('id_tab')))
		{
			$tab = new WTProductFilterClass((int)Tools::getValue('id_tab'));
			$fields['id_tab'] = (int)Tools::getValue('id_tab', $tab->id);
		}
		else
			$tab = new WTProductFilterClass();
			
		$product_type = array('featured_products','special_products','topseller_products','new_products');
		if (!in_array($tab->product_type, $product_type))
			{
				$tab->product_type = 'choose_the_category';
				$selected_categories = array($tab->product_type_menu); 	
			}
			else
				$selected_categories = array();	
		
		$fields['active_tab'] = Tools::getValue('active_tab', $tab->active);
			
		$fields['product_type'] = Tools::getValue('product_type', $tab->product_type);
		
		$languages = Language::getLanguages(false);

		foreach ($languages as $lang)
			$fields['title'][$lang['id_lang']] = Tools::getValue('title_'.(int)$lang['id_lang'], $tab->title[$lang['id_lang']]);
			
		return $fields;
}

	public function getAllCatLink($id_lang = null, $link = false)
	{
		if (is_null($id_lang)) $id_lang = (int)$this->context->language->id;
		$html = '<optgroup label="'.$this->l('Category').'">';
		$html .= $this->getCategoryOption(1, $id_lang, false, true, $link);
		$html .= '</optgroup>';
		return $html;
	}
	
	public function getCategoryOption($id_category = 1, $id_lang = false, $id_shop = false, $recursive = true, $link = false)
	{
		$html = '';
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$id_shop = $id_shop ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);
		if (is_null($category->id)) return;
		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
			$spacer = str_repeat('&nbsp;', 3 * (int)$category->level_depth);
		}
		$shop = (object)Shop::getShop((int)$category->getShopID());
		if (!in_array($category->id, array(Configuration::get('PS_HOME_CATEGORY'), Configuration::get('PS_ROOT_CATEGORY'))))
		{
		if ($link)
			$html .= '<option value="'.$this->context->link->getCategoryLink($category->id).'">'.(isset($spacer) ? $spacer : '').str_repeat('&nbsp;', 3 * (int)$category->level_depth).$category->name.'</option>';
		else
			$html .= '<option value="'.(int)$category->id.'">'.str_repeat('&nbsp;', 3 * (int)$category->level_depth).$category->name.'</option>';
		}
		elseif ($category->id != Configuration::get('PS_ROOT_CATEGORY'))
			$html .= '<optgroup label="'.str_repeat('&nbsp;', 3 * (int)$category->level_depth).$category->name.'">';
		if (isset($children) && count($children))
			foreach ($children as $child)
			{
				$html .= $this->getCategoryOption((int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],
				$recursive, $link);
			}
		return $html;
	}

private function getTabsDisplayFront($nb = 10, $id_shop, $id_lang)
{
		$isMobile = 0;
		
		//require_once(Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'tools/mobile_Detect/Mobile_Detect.php');
		//$/detect = new Mobile_Detect();
		//if ($detect->isMobile() && ! $detect->isTablet())
		//	$isMobile = 1;
		//else
			//$isMobile = 0;
			
		//if ($detect->isTablet())
		//$isIpad = 1;
	
		$tab_list = array();
		$tab_prod = array();
		
		$results = Db::getInstance()->ExecuteS(
					'SELECT t.`id_tab`, tts.`product_type`, ttl.`title`  FROM `'._DB_PREFIX_.'wtproductfilter` t
					LEFT JOIN `'._DB_PREFIX_.'wtproductfilter_tabs` tts ON (tts.id_tab = t.id_tab)
					LEFT JOIN `'._DB_PREFIX_.'wtproductfilter_tabs_lang` ttl ON (ttl.id_tab = tts.id_tab)
					WHERE (t.id_shop = '.(int)$id_shop.') AND ttl.id_lang = '.(int)$id_lang.'
					AND tts.`active` = 1 ORDER BY tts.`position` ASC');	
		$i = 0;
		foreach ($results as $key => $row)
		{
			$tab_product_list = new WTProductFilterClass($row['id_tab']);
			
			$i = $i+1;
			if ($isMobile == 0)
			{
				if($i == 1)
				$tab_product_list->getProductList($nb);
			}
			else
				$tab_product_list->getProductList($nb);
			
				$tab_prod['tab_product_list'] = $tab_product_list;
				$tab_prod['title'] = $row['title'];
				$tab_prod['product_type'] = $row['product_type'];
				
			$tab_list[] = $tab_prod;
		}
		 return $tab_list;
		
}

public function hookHeader()
{	
		$this->context = Context::getContext();
		$id_shop = $this->context->shop->id;
		

		$this->context->controller->addJs($this->_path.'views/js/jquery.carouFredSel-6.1.0.js');
		$this->context->controller->addJs($this->_path.'views/js/wtproductfilter.js');
		$this->context->controller->addCss($this->_path.'views/css/wtproductfilter.css');
		//$this->context->controller->addJs($this->_path.'views/js/jquery-ui-tabs.min.js');
		
		$this->context->controller->addCss($this->_path.'views/css/jquery.carouFredSel-6.1.0-packed.css');
		
}

public function getWidgetVariables($hookName = null, array $configuration = [])
{
		$isMobile = 0;
		$isIpad = 0;
		
		$this->context = Context::getContext();
		$id_shop = $this->context->shop->id;
		$id_lang = $this->context->language->id;
			
		$tabs = $this->getTabsDisplayFront(Configuration::get('NUM_PRO_DISPLAY'), $id_shop, $id_lang);
		
			return [
           'tabs' => $tabs,
			'isIpad' =>$isIpad,
			'isMobile' => $isMobile,
			'name_module' => $this->name,
			'path_ssl' => $this->context->link->getBaseLink(),
			 'path_' => $this->_path,
			];
		
}

public function renderWidget($hookName = null, array $configuration = [])
{
	if ($this->context->controller->php_self == 'index')
	{
		$this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->fetch('module:'.$this->name.'/views/templates/hook/'.$this->name.'.tpl');
	}
        
}

public function getImages($id_product, $id_lang, Context $context = null)
{
		if (!$context)
		$context = Context::getContext();
		$sql = 'SELECT image_shop.`cover`, i.`id_image`, il.`legend`, i.`position`
                FROM `'._DB_PREFIX_.'image` i
                '.Shop::addSqlAssociation('image', 'i').'
                LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
                WHERE i.`id_product` = '.(int)$id_product.'
                ORDER BY `position`';
		return Db::getInstance()->executeS($sql);
}

public function hookDisplayProductListThumbnails($params)
{
	
	if (isset($params['product']['id_product']))
	{
	$id_product = (int)$params['product']['id_product'];
	
		$images = $this->getImages($id_product, (int)$this->context->language->id);
		$ptsimages = $images;
		$this->context->smarty->assign(array(
		'wt_thumbnails' => $ptsimages,
		'product' => $params['product'],
		'wt_thumbnails_key' => rand(100, 999),
		 'path_' => $this->_path,
		 'path_ssl' => $this->context->link->getBaseLink(),
		'link' => $this->context->link));
	
	return $this->display(__FILE__, 'thumbnail_notajax.tpl');
		
	}
}
 
public function hookDisplayProductListThumbnailsSpecial($params)
{
	
	if (isset($params['product']['id_product']))
	{
	$id_product = (int)$params['product']['id_product'];
	
		$images = $this->getImages($id_product, (int)$this->context->language->id);
		$ptsimages = $images;
		$this->context->smarty->assign(array(
		'wt_thumbnails' => $ptsimages,
		'product' => $params['product'],
		'wt_thumbnails_key' => rand(100, 999),
		 'path_' => $this->_path,
		 'path_ssl' => $this->context->link->getBaseLink(),
		'link' => $this->context->link));
	
	return $this->display(__FILE__, 'thumbnail_special.tpl');
		
	}
}

public function getThumbnailImages($id_product)
{
	
		$ptsimages = $this->getImages($id_product, (int)$this->context->language->id);
		
		$id_lang = Context::getContext()->language->id;
	
		$product = $this->getProductById($id_product);
		$product_properties = Product::getProductsProperties((int)$id_lang, $product);
		
		return array('wt_thumbnails' => $ptsimages, 'wt_thumbnails_key' => rand(100, 999), 'product' => $product_properties);


}


public function getProductById($id_prod)
	{
		$id_lang = Context::getContext()->language->id;
		$context = Context::getContext();
		$productsImages = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity,
				pl.`description_short`, pl.`available_now`, pl.`available_later`, pl.`link_rewrite`, pl.`name`,
			 image_shop.`id_image` id_image, il.`legend`, m.`name`,
				DATEDIFF(
					p.`date_add`,
					DATE_SUB(
						"'.date('Y-m-d').' 00:00:00",
						INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY
					)
				) > 0 new'.(Combination::isFeatureActive() ? ', product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, IFNULL(product_attribute_shop.`id_product_attribute`,0) id_product_attribute' : '').'
				FROM '._DB_PREFIX_.'product p
				'.Shop::addSqlAssociation('product', 'p').'
				INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
				)
				'.(Combination::isFeatureActive() ? 'LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
				ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop='.(int)$context->shop->id.')':'').'
				'.Product::sqlStock('p', 0).'
				LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
				LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
					ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop='.(int)$context->shop->id.')
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
		WHERE p.id_product ='.$id_prod.'
		GROUP BY product_shop.id_product');
		return $productsImages;
	}

public function getProductsAjax($type_tab)
{
		$nb = Configuration::get('NUM_PRO_DISPLAY');
		$id_lang = (int)Context::getContext()->language->id;
		if (strpos($type_tab, 'featured_products') !== false)
		{
			$category = new Category(Context::getContext()->shop->getCategory(), (int)Context::getContext()->language->id);
			$this->product_list = $category->getProducts($id_lang, 1, $nb);
			//$link = new Link();
			//$this->view_link = $link->getCategoryLink(2);
		}
		elseif (strpos($type_tab, 'special_products') !== false)
		{
			$this->product_list = Product::getPricesDrop($id_lang, 0, $nb);
			
		}
		elseif (strpos($type_tab, 'topseller_products') !== false)
		{
			$this->product_list = ProductSale::getBestSalesLight($id_lang, 0, $nb);	
			//$link = new Link();
			//$this->view_link = $link->getPageLink('best-sales', true);
		}
		elseif (strpos($type_tab, 'new_products') !== false)
		{
			$this->product_list = Product::getNewProducts($id_lang, 0, $nb);
			//$link = new Link();
			//$this->view_link = $link->getPageLink('new-products', true);
		}
		elseif (strpos($type_tab, 'choose_the_category') !== false)
		{
			$id_cat = Tools::substr(strrchr($type_tab, "_"), 1);
			$category = new Category((int)$id_cat, $id_lang);
			$this->product_list = $category->getProducts($id_lang, 1, $nb, 'date_upd', 'DESC');
			$this->cat_desc = $category->description;
			//$link = new Link();
			//$this->view_link = $link->getCategoryLink((int)$id_cat);
		}
	return $this->product_list;
}
	
public function hookActionShopDataDuplication($params)
{
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtproductfilter (id_tab, id_shop)
			SELECT id_tab, '.(int)$params['new_id_shop'].'
			FROM '._DB_PREFIX_.'wtproductfilter
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		$this->clearCacheWTProductFilter();
}	
protected function getCacheId($name = null)
{
		parent::getCacheId($name);

		if (isset($this->context->currency->id))
			$id_currency = $this->context->currency->id;
		else
			$id_currency = Configuration::get('PS_CURRENCY_DEFAULT');
		
		$groups = implode(', ', Customer::getGroupsStatic((int)$this->context->customer->id));
		$id_lang = (int)$this->context->language->id;
		
		return $name.'|'.(int)Tools::usingSecureMode().'|'.$this->context->shop->id.'|'.$groups.'|'.$id_lang.'|'.$id_currency;
}
	
public function hookActionObjectProductAddAfter($params)
{
		$this->clearCacheWTProductFilter();
}
	
public function hookActionObjectProductUpdateAfter($params)
{
		$this->clearCacheWTProductFilter();
}
	
public function hookActionObjectProductDeleteAfter($params)
{
		$this->clearCacheWTProductFilter();
}
public function hookActionUpdateQuantity($params)
{
		$this->clearCacheWTProductFilter();
}
public function clearCacheWTProductFilter()
{
		$this->_clearCache('wtproductfilter.tpl');
		$this->_clearCache('wtproductfilter_mobile.tpl');
		$this->_clearCache('thumbnail.tpl');
}	
}
?>
