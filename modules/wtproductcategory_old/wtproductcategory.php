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

include_once(_PS_MODULE_DIR_.'wtproductcategory/classes/WtGroupCategoryClass.php');
include_once(_PS_MODULE_DIR_.'wtproductcategory/classes/WtCategoryClass.php');
include_once(_PS_MODULE_DIR_.'wtproductcategory/sql/SampleDataProdCat.php');

class Wtproductcategory extends Module
{
	protected $config_form = false;
	private $html = '';
	private $hook_into = array('displayHome', 'displayTopColumn', 'displayTopHome', 'displayBottomHome');
	//private $type_display = array('accordion', 'tab', 'column');
	private $type_display = array('accordion');
	public function __construct()
	{
		$this->name = 'wtproductcategory';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'waterthemes';
		$this->need_instance = 1;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->getTranslator()->trans('WT Product Category', array(), 'Modules.WTProductCategory.Admin');
		$this->description = $this->getTranslator()->trans('Get product from category to display on the homepage.', array(), 'Modules.WTProductCategory.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		$res = true;
		$res &= parent::install() && $this->registerHook('header') && $this->registerHook('backOfficeHeader') && $this->registerHook('displayLeftIcon') && $this->registerHook('displayCenterHome') && $this->registerHook('addproduct') && $this->registerHook('updateproduct') && $this->registerHook('deleteproduct') && $this->registerHook('categoryUpdate') && $this->registerHook('actionShopDataDuplication') && $this->registerHook('actionObjectLanguageAddAfter');
		include(dirname(__FILE__).'/sql/install.php');
		$sampleData = new SampleDataProdCat();
		$res &= $sampleData->initData();
		return $res;
	}

	public function uninstall()
	{
		include(dirname(__FILE__).'/sql/uninstall.php');
		return parent::uninstall();
	}

	public function getContent()
	{
		if (Tools::isSubmit('submitCatProd') || Tools::isSubmit('delete_id_group_cat') || Tools::isSubmit('changeStatus'))
		{
			$this->_postProcess();
			$this->html .= $this->renderList();
		}
		elseif (Tools::isSubmit('buildCat') && Tools::isSubmit('id_wtgroupcategory'))
		{
			$this->_postProcess();
			$this->html .= $this->renderListCat();
		}
		elseif ((Tools::isSubmit('deleteicon') || Tools::isSubmit('deletebanner') || Tools::isSubmit('submitCatItem')) && Tools::isSubmit('id_wtcategory') && Tools::isSubmit('id_wtgroupcategory'))
		{
			$this->_postProcess();
			$this->html .= $this->renderAddCat();
		}
		elseif ((Tools::isSubmit('addcatitem') || Tools::isSubmit('id_wtcategory')) && Tools::isSubmit('id_wtgroupcategory'))
		{
			$this->_postProcess();
			$this->html .= $this->renderAddCat();
		}
		elseif (Tools::isSubmit('delete_cat_item') || Tools::isSubmit('changeStatusCatItem'))
			$this->_postProcess();
		elseif (Tools::isSubmit('addCat') || (Tools::isSubmit('id_wtgroupcategory') && $this->catExists(Tools::getValue('id_wtgroupcategory'))))
			$this->html .= $this->renderAddForm();
		else
		{
			$this->_postProcess();
			$this->context->smarty->assign('module_dir', $this->_path);
			$this->html .= $this->renderList();
		}
		return $this->html;
	}

	public function renderList()
	{
		$info_category = $this->getCatInfo();
		foreach ($info_category as $key => $info_cat)
			$info_category[$key]['status'] = $this->displayStatus($info_cat['id_wtgroupcategory'], $info_cat['active']);

		$this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'info_category' => $info_category
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/list.tpl');
	}
	
	public function renderListCat()
	{
		$id_lang = $this->context->language->id;
		$id_wtgroupcategory = Tools::getValue('id_wtgroupcategory');
		$info_cat_item = $this->getCatItemInfo($id_wtgroupcategory);
		
		foreach ($info_cat_item as $key => $info_cat)
		{
			$info_cat_item[$key]['status'] = $this->displayStatusCatItem($id_wtgroupcategory, $info_cat['id_wtcategory'], $info_cat['active']);
			$category = new Category($info_cat_item[$key]['id_cat'], $id_lang);
			$info_cat_item[$key]['cat_name'] = $category->name;
		}

		$this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'info_cat_item' => $info_cat_item,
				'id_wtgroupcategory' => $id_wtgroupcategory
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/list_catitem.tpl');
	}
	
	public function getCatInfo($active = null)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pc.*
			FROM '._DB_PREFIX_.'wtgroupcategory_shop pc
			WHERE pc.id_shop = '.$id_shop.($active ? ' AND pc.`active` = 1' : ' ')
		);
	}
	
	public function getCatItemInfo($id_gr, $active = null)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pc.*
			FROM '._DB_PREFIX_.'wtcategory_shop pc
			WHERE pc.id_wtgroupcategory = '.$id_gr.' AND pc.id_shop = '.$id_shop.($active ? ' AND pc.`active` = 1' : ' ')
		);
	}
	
	public function displayStatus($id_wtgroupcategory, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		
		$this->context->smarty->assign(
			array(
				'title' => $title,
				'icon' => $icon,
				'class' => $class,
				'id_wtgroupcategory' => $id_wtgroupcategory,
				'link' => AdminController::$currentIndex,
				'name' => $this->name,
				'token' => Tools::getAdminTokenLite('AdminModules'),
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/displaystatus.tpl');
		
	}
	
	public function displayStatusCatItem($id_wtgroupcategory, $id_wtcategory, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		
		$this->context->smarty->assign(
			array(
				'title' => $title,
				'icon' => $icon,
				'class' => $class,
				'id_wtgroupcategory' => $id_wtgroupcategory,
				'id_wtcategory' => $id_wtcategory,
				'link' => AdminController::$currentIndex,
				'name' => $this->name,
				'token' => Tools::getAdminTokenLite('AdminModules'),
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/displaystatuscatitem.tpl');
	}

	protected function _postProcess()
	{
		$errors = array();
		if (Tools::isSubmit('submitCatProd'))
		{
			$this->clearCacheProdCat();
			if (Tools::getValue('id_wtgroupcategory'))
			{
				$cat_group = new WtGroupCategoryClass((int)Tools::getValue('id_wtgroupcategory'));
				if (!Validate::isLoadedObject($cat_group))
				{
					$this->html .= $this->displayError($this->l('Invalid id_wtgroupcategory'));
					return false;
				}
			}
			else
				$cat_group = new WtGroupCategoryClass();
			$cat_group->active = (int)Tools::getValue('active_cat');
			$cat_group->id_hook = Tools::getValue('id_hook');
			$cat_group->type_display = Tools::getValue('type_display');
			$cat_group->num_show = Tools::getValue('num_show');
			$cat_group->use_slider = Tools::getValue('use_slider');
			$cat_group->show_sub = Tools::getValue('show_sub');
			$cat_group->group_cat = Tools::getValue('group_cat');
			
			/* Processes if no errors  */
			if (!$errors)
			{
				/* Adds */
				if (!Tools::getValue('id_wtgroupcategory'))
				{
					
					if (!$cat_group->add())
						$errors[] = $this->displayError($this->l('The cat_group could not be added.'));
				}
				else
				{
					if (!$cat_group->update())
						$errors[] = $this->displayError($this->l('The cat_group could not be updated.'));
				}
			}
			return $errors;
		}
		elseif (Tools::isSubmit('submitCatItem'))
		{
			$this->clearCacheProdCat();
			if (Tools::getValue('id_wtcategory'))
			{
				$cat_item = new WtCategoryClass(Tools::getValue('id_wtcategory'));
				if (!Validate::isLoadedObject($cat_item))
				{
					$this->html .= $this->displayError($this->l('Invalid id_wtgroupcategory'));
					return false;
				}	
			}
			else
				$cat_item = new WtCategoryClass();
			$cat_item->active = (int)Tools::getValue('active_cat_item');
			$cat_item->special_prod = (int)Tools::getValue('special_prod');
			$cat_item->show_img = (int)Tools::getValue('active_cat_img');
			$cat_item->position = 1;
			$cat_item->cat_color = Tools::getValue('cat_color');
			$cat_item->id_cat = Tools::getValue('id_cat');
			$cat_item->id_wtgroupcategory = Tools::getValue('id_wtgroupcategory');
			$manufacture_arr = Tools::getValue('manufacture');
			$cat_item->manufacture = Tools::jsonEncode($manufacture_arr);
			$icon_up = $cat_item->uploadImage1('cat_icon', 'wtproductcategory/views/img/icons/');
			if (isset($icon_up) && $icon_up != '')
				$cat_item->cat_icon = $icon_up;
			
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				$temp_url = '{wt_cat_url}';
				$temp = Tools::getValue('cat_desc_'.$language['id_lang']);
				if (isset($temp))
				{
					$temp = str_replace(_PS_BASE_URL_.__PS_BASE_URI__, $temp_url, $temp);
					$cat_item->cat_desc[$language['id_lang']] = $temp;
				}
				$image_up = $cat_item->uploadImage('cat_banner_', $language['id_lang'], 'wtproductcategory/views/img/banners/');
				
				if (isset($image_up) && $image_up != '')
					$cat_item->cat_banner[$language['id_lang']] = $image_up;
			}
			if (!$errors)
			{
				if (!Tools::getValue('id_wtcategory'))
				{
					if (!$cat_item->add())
						$errors[] = $this->displayError($this->l('The cat_item could not be added.'));
				}
				else
				{
					if (!$cat_item->update())
						$errors[] = $this->displayError($this->l('The cat_item could not be updated.'));
				}
			}
			return $errors;
			
		}
		elseif (Tools::isSubmit('changeStatus') && Tools::getValue('id_wtgroupcategory'))
		{
			$this->clearCacheProdCat();
			$group_cat = new WtGroupCategoryClass(Tools::getValue('id_wtgroupcategory'));
			if ($group_cat->active == 0)
				$group_cat->active = 1;
			else
				$group_cat->active = 0;
			$res = $group_cat->update();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		elseif (Tools::isSubmit('changeStatusCatItem') && Tools::getValue('id_wtcategory'))
		{
			$this->clearCacheProdCat();
			$cat_item = new WtCategoryClass(Tools::getValue('id_wtcategory'));
			if ($cat_item->active == 0)
				$cat_item->active = 1;
			else
				$cat_item->active = 0;
			$res = $cat_item->update();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_wtgroupcategory='.Tools::getValue('id_wtgroupcategory').'&buildCat=1');
		}
		elseif (Tools::isSubmit('delete_cat_item'))
		{
			$this->clearCacheProdCat();
			$cat_item = new WtCategoryClass((int)Tools::getValue('delete_cat_item'));
			$res = $cat_item->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtgroupcategory='.Tools::getValue('id_wtgroupcategory').'&buildCat=1');
		}
		elseif (Tools::isSubmit('delete_id_group_cat'))
		{
			$this->clearCacheProdCat();
			$group_item = new WtGroupCategoryClass((int)Tools::getValue('delete_id_group_cat'));
			$res = $group_item->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		}
		elseif (Tools::isSubmit('deleteicon'))
		{
			$cat_item_n = new WtCategoryClass((int)Tools::getValue('id_wtcategory'));
			$res = $cat_item_n->deleteIcon();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtgroupcategory='.Tools::getValue('id_wtgroupcategory').'&id_wtcategory='.Tools::getValue('id_wtcategory'));
		}
		elseif (Tools::isSubmit('deletebanner'))
		{
			$cat_item_n = new WtCategoryClass((int)Tools::getValue('id_wtcategory'));
			$res = $cat_item_n->deleteBanner();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtgroupcategory='.Tools::getValue('id_wtgroupcategory').'&id_wtcategory='.Tools::getValue('id_wtcategory'));
		}
	}
	public function getHookList()
	{
		$hooks = array();
		
		foreach ($this->hook_into as $key => $hook)
		{
			$hooks[$key]['key'] = $hook;
			$hooks[$key]['name'] = $hook;
		}
		return $hooks;
	}
	
	public function getTypeList()
	{
		$hooks = array();
		
		foreach ($this->type_display as $key => $type)
		{
			$hooks[$key]['key'] = $type;
			$hooks[$key]['name'] = $type;
		}
		return $hooks;
	}
	
	public function renderAddForm()
	{
		$selected_categories = array();
		$hook_into = $this->getHookList();
		$type = $this->getTypeList();
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Category Group'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'text',
						'label' => $this->l('group category'),
						'name' => 'group_cat',
					),
					array(
						'type' => 'select',
						'label' => $this->l('id_hook'),
						'name' => 'id_hook',
						'options' => array(
							'query' => $hook_into, 
							'id' => 'key',
							'name' => 'name'
						)
					),
					array(
						'type' => 'select',
						'label' => $this->l('Type display'),
						'desc' => $this->l(''),
						'name' => 'type_display',
						'options' => array(
							'query' => $type, 
							'id' => 'key',
							'name' => 'name'
						)
					),
					array(
						'type' => 'text',
						'label' => $this->l('number product'),
						'desc' => $this->l(''),
						'name' => 'num_show'
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Use Slider'),
						'name' => 'use_slider',
						'is_bool' => true,
						'values' => array(
							array(
								'id' => 'useslider_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'useslider_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Show SubCategories'),
						'name' => 'show_sub',
						'is_bool' => true,
						'values' => array(
							array(
								'id' => 'showsub_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'showsub_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Active'),
						'name' => 'active_cat',
						'is_bool' => true,
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
				),
				'submit' => array(
					'title' => $this->l('Save'),
				),
				'buttons' => array(
					array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
					'title' => $this->l('Back to list'),
					'icon' => 'process-icon-back'
					),
					array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_wtgroupcategory='.(int)Tools::getValue('id_wtgroupcategory').'&buildCat=1',
					'title' => $this->l('Add Category'),
					'icon' => 'process-icon-new'
					)
				)
			),
		);
		if (Tools::isSubmit('id_wtgroupcategory') && $this->catExists((int)Tools::getValue('id_wtgroupcategory')))
		{
			$slide = new WtGroupCategoryClass((int)Tools::getValue('id_wtgroupcategory'));
			$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_wtgroupcategory');
		}

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitCatProd';
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
			'id_language' => $this->context->language->id
		);
		$helper->override_folder = '/';
		return $helper->generateForm(array($fields_form));
	}
	
	public function getAddFieldsValues()
	{
		$fields = array();
		$languages = Language::getLanguages(false);
		if (Tools::isSubmit('id_wtgroupcategory') && $this->catExists((int)Tools::getValue('id_wtgroupcategory')))
		{
			$group_cat = new WtGroupCategoryClass((int)Tools::getValue('id_wtgroupcategory'));
			
			$fields['group_cat'] = Tools::getValue('group_cat', $group_cat->group_cat);
			$fields['id_wtgroupcategory'] = (int)Tools::getValue('id_wtgroupcategory', $group_cat->id);
			$fields['active_cat'] = Tools::getValue('active_cat', $group_cat->active);
			$fields['id_hook'] = Tools::getValue('id_hook', $group_cat->id_hook);
			$fields['type_display'] = Tools::getValue('type_display', $group_cat->type_display);
			$fields['num_show'] = Tools::getValue('num_show', $group_cat->num_show);
			$fields['use_slider'] = Tools::getValue('use_slider', $group_cat->use_slider);
			$fields['show_sub'] = Tools::getValue('show_sub', $group_cat->show_sub);
		}
		else
		{
			$fields['group_cat'] = Tools::getValue('group_cat', 'Group category 1');
			$fields['active_cat'] = Tools::getValue('active_cat', 1);
			$fields['id_hook'] = Tools::getValue('id_hook', 1);
			$fields['type_display'] = Tools::getValue('type_display', 1);
			$fields['num_show'] = Tools::getValue('num_show', 8);
			$fields['use_slider'] = Tools::getValue('use_slider', 1);
			$fields['show_sub'] = Tools::getValue('show_sub', 1);
		}
		return $fields;
	}
	
	public function catExists($id)
	{
		$req = 'SELECT wt.`id_wtgroupcategory` as id_wtgroupcategory
				FROM `'._DB_PREFIX_.'wtgroupcategory` wt
				WHERE wt.`id_wtgroupcategory` = '.(int)$id;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);

		return ($row);
	}
	
	public function renderAddCat()
	{
		$id_wtgroupcategory = Tools::getValue('id_wtgroupcategory');
		$manus = Manufacturer::getManufacturers();
		$root_category = $this->context->shop->getCategory();
		
		if (Tools::getValue('id_wtcategory'))
		{
			$cat_info = new WtCategoryClass(Tools::getValue('id_wtcategory'));
			$selected_categories = array($cat_info->id_cat);
		}
		else
			$selected_categories = array((int)$this->context->shop->getCategory());
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Category info'),
					'icon' => 'icon-plus'
				),
				'input' => array(
					array(
						'type' => 'select_link',
						'label' => $this->l('Cat ID'),
						'name' => 'id_cat'
					),
					array(
						'type' => 'textarea',
						'label' => $this->l('Description'),
						'desc' => $this->l(''),
						'name' => 'cat_desc',
						'lang' => true,
						'autoload_rte' => true,
						'cols' => 35,
						'rows' => 10
					),
					array(
						'type' => 'file_lang',
						'label' => $this->l('Banner'),
						'desc' => $this->l(''),
						'name' => 'cat_banner',
						'lang' => true
					),
					array(
						'type' => 'file',
						'label' => $this->l('Icon'),
						'desc' => $this->l(''),
						'name' => 'cat_icon'
					),
					array(
						'type' => 'select',
						'label' => $this->l('Manufacture'),
						'multiple' =>true,
						'name' => 'manufacture[]',
						'id' => 'manufacture',
						'options' => array(
							'query' => $manus,
							'id' => 'id_manufacturer',
							'name' => 'name'
						)
					),
					array(
						'type' => 'color',
						'label' => $this->l('Color'),
						'desc' => $this->l(''),
						'name' => 'cat_color'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Special Product ID'),
						'name' => 'special_prod'
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Show Category Image'),
						'name' => 'active_cat_img',
						'is_bool' => true,
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Active'),
						'name' => 'active_cat_item',
						'is_bool' => true,
						'values' => array(
							array(
								'id' => 'active_on',
								'value' => 1,
								'label' => $this->l('Yes')
							),
							array(
								'id' => 'active_off',
								'value' => 0,
								'label' => $this->l('No')
							)
						),
					),
				),
				'submit' => array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
					'title' => $this->l('Save'),
				),
				'buttons' => array(
					array(
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_wtgroupcategory='.$id_wtgroupcategory.'&buildCat=1',
					'title' => $this->l('Back to list'),
					'icon' => 'process-icon-back'
					)
				)
			),
		);

		if (Tools::isSubmit('id_wtcategory'))
		{
			$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_wtcategory');
			$cat_info = new WtCategoryClass((int)Tools::getValue('id_wtcategory'));
			$fields_form['form']['cat_banner'] = $cat_info->cat_banner;
			$fields_form['form']['cat_icon'] = $cat_info->cat_icon;
			$id_wtcategory = (int)Tools::getValue('id_wtcategory');
			$cat_value = $cat_info->id_cat;
		}
		else
		{
			$id_wtcategory = 1;
			$cat_value = 3;
		}
		
		$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_wtgroupcategory');
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitCatItem';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtgroupcategory='.$id_wtgroupcategory.'&buildCat=1';
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
			'fields_value' => $this->getAddFieldsValuesCat(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
			'image_baseurl' => $this->_path.'views/img/',
			'id_wtcategory' => $id_wtcategory,
			'id_wtgroupcategory' => $id_wtgroupcategory,
			'link' => $this->context->link,
			'cat_options' => $this->getAllCatLink(),
			'cat_value' => $cat_value
		);
		$helper->override_folder = '/';
		return $helper->generateForm(array($fields_form));
	}
	
	public function getAddFieldsValuesCat()
	{
		$fields = array();
		$languages = Language::getLanguages(false);
		if (Tools::isSubmit('id_wtcategory'))
		{
			$cat_info = new WtCategoryClass((int)Tools::getValue('id_wtcategory'));
			
			$fields['id_cat'] = Tools::getValue('id_cat', $cat_info->id_cat);
			$fields['id_wtcategory'] = (int)Tools::getValue('id_wtcategory', $cat_info->id);
			$fields['id_wtgroupcategory'] = (int)Tools::getValue('id_wtgroupcategory', $cat_info->id_wtgroupcategory);
			$fields['cat_color'] = Tools::getValue('cat_color', $cat_info->cat_color);
			$fields['active_cat_item'] = Tools::getValue('active_cat_item', $cat_info->active);
			$fields['active_cat_img'] = Tools::getValue('active_cat_img', $cat_info->show_img);
			$fields['special_prod'] = Tools::getValue('special_prod', $cat_info->special_prod);
			
			$manufacture_arr = Tools::jsonDecode($cat_info->manufacture);
			$fields['manufacture[]'] = Tools::getValue('manufacture', $manufacture_arr);
			$fields['cat_icon'] = Tools::getValue('cat_icon', $cat_info->cat_icon);
			foreach ($languages as $lang)
			{
				$fields['cat_desc'][$lang['id_lang']] = Tools::getValue('cat_desc_'.(int)$lang['id_lang'], $cat_info->cat_desc[$lang['id_lang']]);
				$fields['cat_banner'][$lang['id_lang']] = Tools::getValue('cat_banner_'.(int)$lang['id_lang'], $cat_info->cat_banner[$lang['id_lang']]);
			}
		}
		else
		{
			$fields['id_cat'] = Tools::getValue('id_cat', 2);
			$fields['id_wtgroupcategory'] = (int)Tools::getValue('id_wtgroupcategory', 1);
			$fields['cat_color'] = Tools::getValue('cat_color', '');
			$fields['active_cat_item'] = Tools::getValue('active_cat_item', 1);
			$fields['active_cat_img'] = Tools::getValue('active_cat_img', 1);
			$fields['special_prod'] = Tools::getValue('special_prod', 0);
			$fields['manufacture[]'] = Tools::getValue('manufacture', '');
			$fields['cat_icon'] = Tools::getValue('cat_icon', '');
			foreach ($languages as $lang)
			{
				$fields['cat_desc'][$lang['id_lang']] = Tools::getValue('cat_desc_'.(int)$lang['id_lang'], '');
				$fields['cat_banner'][$lang['id_lang']] = Tools::getValue('cat_banner_'.(int)$lang['id_lang'], '');
			}
		}
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
	
	public function hookHeader()
	{
		if ($this->context->controller->php_self == 'index')
		{
			$this->context->controller->addJS($this->_path.'/views/js/front.js');
			$this->context->controller->addJS($this->_path.'/views/js/slides.min.jquery.js');
			
			
			$this->context->controller->addJS($this->_path.'/views/js/jquery.scrollTo-1.4.2-min.js');
			$this->context->controller->addJS($this->_path.'/views/js/script.js');
		}
		$this->context->controller->addCSS($this->_path.'/views/css/front.css');	
	}

	public function getProductCat($id_cat, $number_prod)
	{
		$id_lang = $this->context->language->id;
		$category = new Category($id_cat, $id_lang);
		$product_list = $category->getProducts($id_lang, 1, $number_prod, 'date_upd', 'DESC');
		return $product_list;
	}
	public function prevHook($hook_name)
	{
		$id_lang = $this->context->language->id;
		$group_cat_result = array();
		$group_cat = new WtGroupCategoryClass();
		$group_cat_hook = $group_cat->getGroupCatByHook($hook_name);
		foreach ($group_cat_hook as $group_cat)
		{
			$number_prod = $group_cat['num_show'];
			$cat_prod = new WtCategoryClass();
			$cat_prod_group = $cat_prod->getCatByGroupId($group_cat['id_wtgroupcategory']);
			$cat_prod_result = array();
			foreach ($cat_prod_group as $cat_prod)
			{
				$id_cat = $cat_prod['id_cat'];
				$category = new Category($id_cat, $id_lang);
				$product_list = $category->getProducts($id_lang, 1, $number_prod, 'date_upd', 'DESC');
				$cat_prod['product_list'] = $product_list;
				$cat_prod['cat_name'] = $category->name;
				$cat_prod['number_prod'] = $number_prod;
				$cat_prod['id_image'] = $category->id_image;
				$cat_prod['link_rewrite'] = $category->link_rewrite;
				$cat_prod['sub_cat'] = $category->getSubCategories($id_lang);
				$temp = $cat_prod['cat_desc'];
				$temp_url = '{wt_cat_url}';
				$cat_prod['cat_desc'] = str_replace($temp_url, _PS_BASE_URL_.__PS_BASE_URI__, $temp);
				$manu_ids = Tools::jsonDecode($cat_prod['manufacture']);
				$manu_arr = array();
				if (is_array($manu_ids) && count($manu_ids) > 0)
				{
					foreach ($manu_ids as $manu_item)
					{
						$tam = new Manufacturer($manu_item, $id_lang);
						if (isset($tam))
						$manu_arr[] = new Manufacturer($manu_item, $id_lang);
						
					}
						
				}
				
				$cat_prod['manufacture'] = $manu_arr;
				
				
				$id_prod = (int)$cat_prod['special_prod'];
				if (isset($id_prod) && $id_prod > 0)
				{
					$product = new Product($id_prod);
					if ($product->active)
					{
						$product->id_image = $product->getCoverWs();
						$cat_prod['special_prod_obj'] = $product;
					}
				}
				$cat_prod_result[] = $cat_prod;
			}
			$group_cat['cat_info'] = $cat_prod_result;
			$group_cat_result[] = $group_cat;
		}
		return $group_cat_result;
	}
	
	public function prevHookIcon($hook_name)
	{
		$id_lang = $this->context->language->id;
		$group_cat_result = array();
		$group_cat = new WtGroupCategoryClass();
		$group_cat_hook = $group_cat->getGroupCatByHook($hook_name);
		foreach ($group_cat_hook as $group_cat)
		{
			$number_prod = $group_cat['num_show'];
			$cat_prod = new WtCategoryClass();
			$cat_prod_group = $cat_prod->getCatByGroupId($group_cat['id_wtgroupcategory']);
			$cat_prod_result = array();
			foreach ($cat_prod_group as $cat_prod)
			{
				$id_cat = $cat_prod['id_cat'];
				$category = new Category($id_cat, $id_lang);
				$cat_prod['cat_name'] = $category->name;
				$cat_prod['number_prod'] = $number_prod;
				$cat_prod['id_image'] = $category->id_image;
				$cat_prod['link_rewrite'] = $category->link_rewrite;
				$temp_url = '{wt_cat_url}';
				
				$cat_prod_result[] = $cat_prod;
			}
			
			$group_cat['cat_info'] = $cat_prod_result;
			$group_cat_result[] = $group_cat;
		}
		return $group_cat_result;
	}
	
	public function hookDisplayCenterHome()
	{
			$mobile = Context::getContext()->isMobile();
			
			$group_cat_result = $this->prevHook('displayHome');
			if (!isset($group_cat_result) || count($group_cat_result) <= 0)
				return false;
			$this->context->smarty->assign(array(
				'group_cat_result' => $group_cat_result,
				'banner_path' => $this->_path.'views/img/banners/',
				'name_module' => $this->name,
				'link' => $this->context->link,
				'path_ssl' => $this->context->link->getBaseLink(),
				'icon_path' => $this->_path.'views/img/icons/',
				'mobile' =>$mobile,
			));
			
			return $this->display(__FILE__, 'wtproductcategory_home.tpl');
	}
	
	public function hookDisplayLeftIcon()
	{
		$page = $this->context->controller->php_self;
		if ($page == 'index')
		{
			
			$group_cat_result = $this->prevHookIcon('displayHome');
			if (!isset($group_cat_result) || count($group_cat_result) <= 0)
				return false;
			$this->context->smarty->assign(array(
				'group_cat_result' => $group_cat_result,
				'banner_path' => $this->_path.'views/img/banners/',
				'name_module' => $this->name,
				'link' => $this->context->link,
				'path_ssl' => $this->context->link->getBaseLink(),
				'icon_path' => $this->_path.'views/img/icons/',
			));
			
			return $this->display(__FILE__, 'wtproductcategory_left_icon.tpl');
		}
	}
	
	public function hookdisplayTopColumn()
	{
		$mobile = Context::getContext()->isMobile();
		$page = $this->context->controller->php_self;
		if ($page == 'index')
		{
			
				$group_cat_result = $this->prevHook('displayTopColumn');
				if (!isset($group_cat_result) || count($group_cat_result) <= 0)
					return false;
				$this->context->smarty->assign(array(
						'group_cat_result' => $group_cat_result,
						'banner_path' => $this->_path.'views/img/banners/',
						'name_module' => $this->name,
						'path_ssl' => $this->context->link->getBaseLink(),
						'icon_path' => $this->_path.'views/img/icons/',
						'mobile' =>$mobile,
					));
			
			return $this->display(__FILE__, 'wtproductcategory_topcolumn.tpl');
		}
	}
	
	public function hookdisplayTopHome()
	{
		$mobile = Context::getContext()->isMobile();
		$page = $this->context->controller->php_self;
		if ($page == 'index')
		{
			
				$group_cat_result = $this->prevHook('displayTopHome');
				if (!isset($group_cat_result) || count($group_cat_result) <= 0)
					return false;
				$this->context->smarty->assign(array(
					'group_cat_result' => $group_cat_result,
					'banner_path' => $this->_path.'views/img/banners/',
					'icon_path' => $this->_path.'views/img/icons/',
					'mobile' =>$mobile,
				));
			
			return $this->display(__FILE__, 'wtproductcategory_tophome.tpl');
		}
	}
	
	public function hookdisplayBottomHome()
	{
		$page = $this->context->controller->php_self;
		if ($page == 'index')
		{
			
				$group_cat_result = $this->prevHook('displayBottomHome');
				if (!isset($group_cat_result) || count($group_cat_result) <= 0)
					return false;
				$this->context->smarty->assign(array(
					'group_cat_result' => $group_cat_result,
					'banner_path' => $this->_path.'views/img/banners/',
					'icon_path' => $this->_path.'views/img/icons/',
				));
			
			return $this->display(__FILE__, 'wtproductcategory_bottomhome.tpl');
		}
	}
	
	public function hookAddProduct()
	{
		$this->clearCacheProdCat();
	}
	public function hookUpdateProduct()
	{
		$this->clearCacheProdCat();
	}
	public function hookDeleteProduct()
	{
		$this->clearCacheProdCat();
	}
	public function hookCategoryUpdate()
	{
		$this->clearCacheProdCat();
	}
	public function clearCacheProdCat()
	{
		$this->_clearCache('wtproductcategory_bottomhome.tpl');
		$this->_clearCache('wtproductcategory_tophome.tpl');
		$this->_clearCache('wtproductcategory_topcolumn.tpl');
		$this->_clearCache('wtproductcategory_home.tpl');
	}
	
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtgroupcategory_shop (`id_wtgroupcategory`, `group_cat`, `id_shop`, `id_hook`, `type_display`, `num_show`, `use_slider`, `show_sub`, `active`)
			SELECT `id_wtgroupcategory`, `group_cat`, '.(int)$params['new_id_shop'].', `id_hook`, `type_display`, `num_show`, `use_slider`, `show_sub`, `active`
			FROM '._DB_PREFIX_.'wtgroupcategory_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtcategory_shop (`id_wtcategory`, `id_wtgroupcategory`, `id_shop`, `id_cat`, `cat_icon`, `cat_color`, `manufacture`, `position`, `show_img`, `special_prod`, `active`)
			SELECT `id_wtcategory`, `id_wtgroupcategory`, '.(int)$params['new_id_shop'].', `id_cat`, `cat_icon`, `cat_color`, `manufacture`, `position`, `show_img`, `special_prod`, `active`
			FROM '._DB_PREFIX_.'wtcategory_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtcategory_lang (`id_wtcategory`, `id_shop`, `id_lang`, `cat_desc`, `cat_banner`)
			SELECT id_wtcategory, '.(int)$params['new_id_shop'].', `id_lang`, `cat_desc`, `cat_banner`
			FROM '._DB_PREFIX_.'wtcategory_lang
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
	}
	public function hookActionObjectLanguageAddAfter($params)
	{
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtcategory_lang (`id_wtcategory`, `id_shop`, `id_lang`, `cat_desc`, `cat_banner`)
			SELECT `id_wtcategory`, `id_shop`, '.(int)$params['object']->id.', `cat_desc`, `cat_banner`
			FROM '._DB_PREFIX_.'wtcategory_lang
			WHERE id_lang = '.(int)Configuration::get('PS_LANG_DEFAULT')
		);
	}
}