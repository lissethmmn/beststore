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

include_once(_PS_MODULE_DIR_.'wtverticalmegamenu/classes/WtVerticalMegamenuClass.php');
include_once(_PS_MODULE_DIR_.'wtverticalmegamenu/classes/WtVerticalMegamenuRowClass.php');
include_once(_PS_MODULE_DIR_.'wtverticalmegamenu/classes/WtVerticalMegamenuColumnClass.php');
include_once(_PS_MODULE_DIR_.'wtverticalmegamenu/classes/WtVerticalMegamenuItemClass.php');
include_once(_PS_MODULE_DIR_.'wtverticalmegamenu/sql/SampleDataVMenu.php');

class WtVerticalMegamenu extends Module implements WidgetInterface
{
	protected $config_form = false;
	private $html = '';
	private $width_boostrap = array('col-sm-2', 'col-sm-3', 'col-sm-4','col-sm-5', 'col-sm-6', 'col-sm-7', 'col-sm-8', 'col-sm-9', 'col-sm-10', 'col-sm-11', 'col-sm-12');
	
	public function __construct()
	{
		$this->name = 'wtverticalmegamenu';
		$this->tab = 'front_office_features';
		$this->version = '1.1.2';
		$this->author = 'waterthemes';
		$this->need_instance = 1;
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->getTranslator()->trans('WT Vertical Megamenu', array(), 'Modules.WTVerticalMegamenu.Admin');
		$this->description = $this->getTranslator()->trans('Show Vertical Megamenu on site', array(), 'Modules.WTVerticalMegamenu.Admin');
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
		$this->secure_key = Tools::encrypt($this->name);
	}

	public function install()
	{
		if (parent::install() &&
			$this->registerHook('header') &&
			$this->registerHook('displayOtherPage') &&
			$this->registerHook('displayLeftMenu') &&
			$this->registerHook('actionShopDataDuplication') &&
			$this->registerHook('actionObjectLanguageAddAfter'))
		{
				include(dirname(__FILE__).'/sql/install.php');
				$sample_data = new SampleDataVMenu();
				$sample_data->initData();
				return true;
		}
		return false;
	}

	public function uninstall()
	{
		include(dirname(__FILE__).'/sql/uninstall.php');
		return parent::uninstall();
	}
	
	public function getContent()
	{
		if (Tools::isSubmit('submitMenuItem') || Tools::isSubmit('delete_id_menu') || Tools::isSubmit('changeStatus') || Tools::isSubmit('removeIcon'))
		{
			$this->_postProcess();
			$this->html .= $this->renderList();
		}
		elseif ((Tools::isSubmit('buildMenu') || Tools::isSubmit('submitRow') || Tools::isSubmit('delete_row')) && Tools::isSubmit('id_wtverticalmegamenu') || Tools::isSubmit('changeStatusRow') || Tools::isSubmit('submitCol') || Tools::isSubmit('delete_col') || Tools::isSubmit('submitSubItem') || Tools::isSubmit('delete_submenu_item') || Tools::isSubmit('changeStatusSubItem'))
		{
			$this->_postProcess();
			$this->html .= $this->renderBuildMenu();
		}
		elseif (Tools::isSubmit('addMenuItem') || Tools::isSubmit('id_item'))
			$this->html .= $this->renderAddMeniItem();
		elseif (Tools::isSubmit('addCol') || Tools::isSubmit('id_column'))
			$this->html .= $this->renderAddCol();
		elseif (Tools::isSubmit('addRow') || Tools::isSubmit('id_row'))
			$this->html .= $this->renderAddRow();
		elseif (Tools::isSubmit('addMenu') || (Tools::isSubmit('id_wtverticalmegamenu') && $this->menuExists(Tools::getValue('id_wtverticalmegamenu'))))
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
		$this->context->controller->addJqueryUI('ui.sortable');
		$info_menus = $this->getMenuInfo();
		foreach ($info_menus as $key => $info_menu)
		{
			$info_menus[$key]['status'] = $this->displayStatus($info_menu['id_wtverticalmegamenu'], $info_menu['active']);
			if ($info_menu['type_link'] == 0)
			{
				$menu_info = $this->fomartLink($info_menu);
				$info_menus[$key]['title'] = $menu_info['title'];
			}
		}
		
		$this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'info_menus' => $info_menus,
				'url_base' => $this->context->shop->physical_uri.$this->context->shop->virtual_uri,
				'secure_key' => $this->secure_key
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/list.tpl');
	}
	
	public function getMenuInfo($active = null)
	{
		$this->context = Context::getContext();
		$id_shop = (int)$this->context->shop->id;
		$id_lang = (int)$this->context->language->id;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pc.*, pl.*
			FROM '._DB_PREFIX_.'wtverticalmegamenu_shop pc
			LEFT JOIN '._DB_PREFIX_.'wtverticalmegamenu_lang pl ON (pc.id_wtverticalmegamenu = pl.id_wtverticalmegamenu AND pc.`id_shop` = pl.`id_shop`)
			WHERE pl.id_shop = '.$id_shop.' AND pl.id_lang = '.$id_lang.($active ? ' AND pc.`active` = 1' : ' ').' ORDER BY pc.position ASC, pc.id_wtverticalmegamenu ASC'
		);
	}
	
	public function displayStatus($id_wtverticalmegamenu, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		
		$this->context->smarty->assign(
			array(
				'title' => $title,
				'icon' => $icon,
				'class' => $class,
				'id_wtverticalmegamenu' => $id_wtverticalmegamenu,
				'link' => AdminController::$currentIndex,
				'name' => $this->name,
				'token' => Tools::getAdminTokenLite('AdminModules'),
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/displaystatus.tpl');
	}
	
	public function displayStatusRow($id_menu, $id_row, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		$this->context->smarty->assign(
			array(
				'title' => $title,
				'icon' => $icon,
				'class' => $class,
				'id_menu' => $id_menu,
				'id_row' => $id_row,
				'link' => AdminController::$currentIndex,
				'name' => $this->name,
				'token' => Tools::getAdminTokenLite('AdminModules'),
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/displaystatusrow.tpl');
	}
	
	public function displayStatusSubItem($id_menu, $id_item, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		
		$this->context->smarty->assign(
			array(
				'title' => $title,
				'icon' => $icon,
				'class' => $class,
				'id_menu' => $id_menu,
				'id_item' => $id_item,
				'link' => AdminController::$currentIndex,
				'name' => $this->name,
				'token' => Tools::getAdminTokenLite('AdminModules'),
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/displaystatussubitem.tpl');
		
	}
	
	protected function _postProcess()
	{
		$errors = array();
		if (Tools::isSubmit('submitMenuItem'))
		{
			$this->clearCacheVMenu();
			if (Tools::getValue('id_wtverticalmegamenu'))
			{
				$menu_item = new WtVerticalMegamenuClass((int)Tools::getValue('id_wtverticalmegamenu'));
				$pos_arr = $menu_item->getPositionByMenu((int)Tools::getValue('id_wtverticalmegamenu'));
				$menu_item->position = $pos_arr['position'];
				if (!Validate::isLoadedObject($menu_item))
				{
					$this->html .= $this->displayError($this->l('Invalid id_wtverticalmegamenu'));
					return false;
				}
			}
			else
			{
				$menu_item = new WtVerticalMegamenuClass();
				$menu_item->position = (int)Tools::getValue('position', 0);
			}
				
			$menu_item->active = (int)Tools::getValue('active');
			$menu_item->type_link = Tools::getValue('type_link');
			$menu_item->dropdown = Tools::getValue('dropdown');
			$menu_item->type_icon = Tools::getValue('type_icon');
			if ($menu_item->type_icon == 1)
				$menu_item->icon = Tools::getValue('icon_font');
			else
			{
				$image_up = $menu_item->uploadImage('icon_img', $this->name.'/views/img/icons/');
				if (isset($image_up) && $image_up != '')
					$menu_item->icon = $image_up;	
			}
			$menu_item->align_sub  = Tools::getValue('align_sub');
			$menu_item->width_sub  = Tools::getValue('width_sub');
			$menu_item->class  = Tools::getValue('class');
			
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				if ($menu_item->type_link == 0) // link ps-link
				{
					$menu_item->title[$language['id_lang']] = Tools::getValue('ps_link');
					$menu_item->link[$language['id_lang']] = Tools::getValue('ps_link');
				}
				else //link custom
				{
					$menu_item->title[$language['id_lang']] = Tools::getValue('title_'.$language['id_lang']);
					$menu_item->link[$language['id_lang']] = Tools::getValue('link_'.$language['id_lang']);
				}
				
				$menu_item->subtitle[$language['id_lang']] = Tools::getValue('subtitle_'.$language['id_lang']);	
			}
			
			if (!$errors)
			{
				if (!Tools::getValue('id_wtverticalmegamenu'))
				{
					if (!$menu_item->add())
					{
						$errors[] = $this->displayError($this->l('The menu_item could not be added.'));
						
						Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
					}
				}
				else
				{
					if (!$menu_item->update())
					{
						$errors[] = $this->displayError($this->l('The menu_item could not be updated.'));
						Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
					}
				}
			}
			return $errors;
		}
		elseif (Tools::isSubmit('changeStatus') && Tools::isSubmit('id_wtverticalmegamenu'))
		{
			$this->clearCacheVMenu();
			$menu = new WtVerticalMegamenuClass((int)Tools::getValue('id_wtverticalmegamenu'));
			if ($menu->active == 0)
				$menu->active = 1;
			else
				$menu->active = 0;
			$pos_arr = $menu->getPositionByMenu((int)Tools::getValue('id_wtverticalmegamenu'));
			$menu->position = $pos_arr['position'];
			$res = $menu->update();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=6&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name);
		}
		elseif (Tools::isSubmit('removeIcon') && Tools::isSubmit('id_wtverticalmegamenu'))
		{
			$this->clearCacheVMenu();
			$menu = new WtVerticalMegamenuClass((int)Tools::getValue('id_wtverticalmegamenu'));
			$icon = $menu->icon;
			if (preg_match('/sample/', $icon) === 0)
				if ($icon && file_exists(_PS_MODULE_DIR_.'wtverticalmegamenu/views/img/icons/'.$icon))
					@unlink(_PS_MODULE_DIR_.'wtverticalmegamenu/views/img/icons/'.$icon);
			$menu->icon = '';
			$menu->update();
		}
		elseif (Tools::isSubmit('submitRow'))
		{
			$this->clearCacheVMenu();
			if (Tools::getValue('id_row'))
			{
				$row_item = new WtVerticalMegamenuRowClass(Tools::getValue('id_row'));
				if (!Validate::isLoadedObject($row_item))
				{
					$this->html .= $this->displayError($this->l('Invalid id_row'));
					return false;
				}
			}
			else
				$row_item = new WtVerticalMegamenuRowClass();
			$row_item->active = (int)Tools::getValue('active');
			$row_item->id_wtverticalmegamenu = (int)Tools::getValue('id_wtverticalmegamenu');
			$row_item->class = Tools::getValue('class');
	
			if (!$errors)
			{
				if (!Tools::getValue('id_row'))
				{
					
					if (!$row_item->add())
						$errors[] = $this->displayError($this->l('The row_item could not be added.'));
				}
				else
				{
					if (!$row_item->update())
						$errors[] = $this->displayError($this->l('The row_item could not be updated.'));
				}
			}
			return $errors;
			
		}
		elseif (Tools::isSubmit('delete_id_menu'))
		{
			$this->clearCacheVMenu();
			$menu_item = new WtVerticalMegamenuClass((int)Tools::getValue('delete_id_menu'));
			$res = $menu_item->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.Tools::getValue('id_wtverticalmegamenu'));
		}
		elseif (Tools::isSubmit('delete_row'))
		{
			$this->clearCacheVMenu();
			$row_item = new WtVerticalMegamenuRowClass((int)Tools::getValue('id_row'));
			$res = $row_item->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.Tools::getValue('id_wtverticalmegamenu').'&buildMenu=1');
		}
		elseif (Tools::isSubmit('changeStatusRow') && Tools::isSubmit('id_row'))
		{
			$this->clearCacheVMenu();
			$row = new WtVerticalMegamenuRowClass((int)Tools::getValue('id_row'));
			if ($row->active == 0)
				$row->active = 1;
			else
				$row->active = 0;
			$res = $row->update();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.Tools::getValue('id_wtverticalmegamenu').'&buildMenu=1');
		}
		elseif (Tools::isSubmit('submitCol'))
		{
			$this->clearCacheVMenu();
			if (Tools::getValue('id_column'))
			{
				$col_item = new WtVerticalMegamenuColumnClass(Tools::getValue('id_column'));
				$pos_arr = $col_item->getPositionByColumn(Tools::getValue('id_column'));
				$col_item->position = $pos_arr['position'];
				if (!Validate::isLoadedObject($col_item))
				{
					$this->html .= $this->displayError($this->l('Invalid id_column'));
					return false;
				}
			}
			else
			{
				$col_item = new WtVerticalMegamenuColumnClass();
				$col_item->position = (int)Tools::getValue('position', 0);
			}	
			$col_item->active = (int)Tools::getValue('active');
			$col_item->id_row = (int)Tools::getValue('id_row');
			$col_item->width = Tools::getValue('width');
			$col_item->class = Tools::getValue('class');
			
			if (!$errors)
			{
				if (!Tools::getValue('id_column'))
				{
					
					if (!$col_item->add())
						$errors[] = $this->displayError($this->l('The col_item could not be added.'));
				}
				else
				{
					if (!$col_item->update())
						$errors[] = $this->displayError($this->l('The col_item could not be updated.'));
				}
			}
			return $errors;
			
		}
		elseif (Tools::isSubmit('delete_col'))
		{
			$this->clearCacheVMenu();
			$col_item = new WtVerticalMegamenuColumnClass((int)Tools::getValue('id_column'));
			$res = $col_item->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.Tools::getValue('id_wtverticalmegamenu').'&buildMenu=1');
		}
		elseif (Tools::isSubmit('submitSubItem'))
		{
			$this->clearCacheVMenu();
			if (Tools::getValue('id_item'))
			{
				$sub_menu_item = new WtVerticalMegamenuItemClass(Tools::getValue('id_item'));
				$pos_arr = $sub_menu_item->getPositionByMenuItem(Tools::getValue('id_item'));
				$sub_menu_item->position = $pos_arr['position'];
				if (!Validate::isLoadedObject($sub_menu_item))
				{
					$this->html .= $this->displayError($this->l('Invalid id_item'));
					return false;
				}
			}
			else
			{
				$sub_menu_item = new WtVerticalMegamenuItemClass();
				$sub_menu_item->position = (int)Tools::getValue('position', 0);
			}
			$sub_menu_item->active = (int)Tools::getValue('active');
			$sub_menu_item->id_column = (int)Tools::getValue('id_column');
			$sub_menu_item->type_link = Tools::getValue('type_link');
			$sub_menu_item->type_item = Tools::getValue('type_item');
			$sub_menu_item->id_product = Tools::getValue('id_product');
			
			$languages = Language::getLanguages(false);
			//if (Tools::usingSecureMode())
			//$path_ssl = _PS_BASE_URL_SSL_.__PS_BASE_URI__;
			//else
			$path_ssl = _PS_BASE_URL_.__PS_BASE_URI__;
		
			foreach ($languages as $language)
			{
				if ($sub_menu_item->type_link == 1) // link ps-link
				{
					$sub_menu_item->title[$language['id_lang']] = Tools::getValue('ps_link');
					$sub_menu_item->link[$language['id_lang']] = Tools::getValue('ps_link');
				}
				else //link custom or HTML Block
				{
					$sub_menu_item->title[$language['id_lang']] = Tools::getValue('title_'.$language['id_lang']);
					$sub_menu_item->link[$language['id_lang']] = Tools::getValue('link_'.$language['id_lang']);
				}
				$temp = Tools::getValue('text_'.$language['id_lang']);
				$temp_url = '{wt_menu_v_url}';
				if (isset($temp))
				{
					$temp = str_replace($path_ssl, $temp_url, $temp);
					$sub_menu_item->text[$language['id_lang']] = $temp;
				}
			}
			
			if (!$errors)
			{
				if (!Tools::getValue('id_item'))
				{
					
					if (!$sub_menu_item->add())
						$errors[] = $this->displayError($this->l('The sub_menu_item could not be added.'));
				}
				else
				{
					if (!$sub_menu_item->update())
						$errors[] = $this->displayError($this->l('The sub_menu_item could not be updated.'));
				}
			}
			return $errors;
		}
		elseif (Tools::isSubmit('delete_submenu_item'))
		{
			$this->clearCacheVMenu();
			$submenu_item = new WtVerticalMegamenuItemClass((int)Tools::getValue('id_item'));
			$res = $submenu_item->delete();
			if (!$res)
				$this->html .= $this->displayError('Could not delete.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.Tools::getValue('id_wtverticalmegamenu').'&buildMenu=1');
		}
		elseif (Tools::isSubmit('changeStatusSubItem') && Tools::isSubmit('id_item'))
		{
			$this->clearCacheVMenu();
			$subMenu_item = new WtVerticalMegamenuItemClass((int)Tools::getValue('id_item'));
			if ($subMenu_item->active == 0)
				$subMenu_item->active = 1;
			else
				$subMenu_item->active = 0;
			$pos_arr = $subMenu_item->getPositionByMenuItem(Tools::getValue('id_item'));
			$subMenu_item->position = $pos_arr['position'];
			
			$res = $subMenu_item->update();
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', true).'&conf=1&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.Tools::getValue('id_wtverticalmegamenu').'&buildMenu=1');
		}
		
	}
	
	public function renderAddForm()
	{
		$this->context->controller->addJS($this->_path.'views/js/back.js');
		$this->context->controller->addCSS($this->_path.'views/css/back.css');
		$id_wtverticalmegamenu = Tools::getValue('id_wtverticalmegamenu');
		if (isset($id_wtverticalmegamenu))
			$menu = new WtVerticalMegamenuClass($id_wtverticalmegamenu);
		else
			$menu = new WtVerticalMegamenuClass();
		
		$languages = $this->context->controller->getLanguages();
		$this->context->smarty->assign(
			array(
				'languages' => $languages,
				'id_language' => $this->context->language->id,
				'token' => Tools::getAdminTokenLite('AdminModules'),
				'all_options' => $this->getAllDefaultLink(),
				'menu' => $menu,
				'image_baseurl' => $this->_path.'views/img/icons/',
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/menu_item.tpl');
	}
	
	public function renderAddMeniItem()
	{
		$this->context->controller->addJS($this->_path.'views/js/back.js');
		$this->context->controller->addCSS($this->_path.'views/css/back.css');
		$id_wtverticalmegamenu = Tools::getValue('id_wtverticalmegamenu');
		$id_column = Tools::getValue('id_column');
		$options = array(
		array(
			'id_option' => 1,
			'name' => $this->l('PrestaShop Link')
		),
		array(
			'id_option' => 2,
			'name' => $this->l('Custom Link')
		),
		array(
			'id_option' => 3,
			'name' => $this->l('HTML Block')
		),
		array(
			'id_option' => 4,
			'name' => $this->l('Product')
		)
		);
		$options_type_item = array(
		array(
			'id_option' => 1,
			'name' => $this->l('Group Header')
		),
		array(
			'id_option' => 2,
			'name' => $this->l('Line')
		)
		);
		
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Sub Menu Item'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'select',
						'label' => $this->l('Type Item'),
						'name' => 'type_link',
						'options' => array(
							'query' => $options,
							'id' => 'id_option',
							'name' => 'name'
						)
					),
					array(
						'type' => 'text',
						'label' => $this->l('Title'),
						'name' => 'title',
						'lang' => true
					),
					array(
						'type' => 'text',
						'label' => $this->l('Link'),
						'name' => 'link',
						'lang' => true
					),
					array(
						'type' => 'text',
						'label' => $this->l('Id Product'),
						'name' => 'id_product'
					),
					array(
						'type' => 'select_link',
						'label' => $this->l('Prestashop Link'),
						'name' => 'ps_link',
					),
					array(
					'type' => 'textarea',
					'label' => $this->l('HTML'),
					'name' => 'text',
					'lang' => true,
					'autoload_rte' => true,
					'cols' => 40,
					'rows' => 10
					),
					array(
						'type' => 'select',
						'label' => $this->l('Defined show'),
						'name' => 'type_item',
						'options' => array(
							'query' => $options_type_item,
							'id' => 'id_option',
							'name' => 'name'
						)
					),
					
					array(
						'type' => 'switch',
						'label' => $this->l('Active'),
						'name' => 'active',
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
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_wtverticalmegamenu='.$id_wtverticalmegamenu.'&buildMenu=1',
					'title' => $this->l('Cancel'),
					'icon' => 'process-icon-back'
					)
				)
			),
		);
		if (Tools::isSubmit('id_item'))
		{
			$id_lang = (int)$this->context->language->id;
			$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_item');
			$subMenu_item = new WtVerticalMegamenuItemClass(Tools::getValue('id_item'));
			$type_link = $subMenu_item->type_link;
			$ps_link_value = $subMenu_item->link[$id_lang];
		}
		else
		{
			$type_link = 1;
			$ps_link_value = 'CAT3';
		}
		$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_column');
		
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitSubItem';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.$id_wtverticalmegamenu.'&buildMenu=1';
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
			'fields_value' => $this->getAddFieldsValuesLink(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
			'all_options' => $this->getAllDefaultLink(),
			'type_link' => $type_link,
			'ps_link_value' => $ps_link_value,
		);
		$helper->override_folder = '/';
		return $helper->generateForm(array($fields_form));
	}
	
	public function getAddFieldsValuesLink()
	{
		$fields = array();
		$languages = Language::getLanguages(false);
		if (Tools::isSubmit('id_item'))
		{
			$menu_item = new WtVerticalMegamenuItemClass((int)Tools::getValue('id_item'));
			$fields['id_item'] = (int)Tools::getValue('id_item', $menu_item->id);
			$fields['id_column'] = (int)Tools::getValue('id_column', $menu_item->id);
			$fields['active'] = Tools::getValue('active', $menu_item->active);
			$fields['type_link'] = Tools::getValue('type_link', $menu_item->type_link);
			$fields['type_item'] = Tools::getValue('type_item', $menu_item->type_item);
			$fields['id_product'] = Tools::getValue('id_product', $menu_item->id_product);
			foreach ($languages as $lang)
			{
				$fields['link'][$lang['id_lang']] = Tools::getValue('link_'.(int)$lang['id_lang'], $menu_item->link[$lang['id_lang']]);
				$fields['title'][$lang['id_lang']] = Tools::getValue('title_'.(int)$lang['id_lang'], $menu_item->title[$lang['id_lang']]);
				$fields['text'][$lang['id_lang']] = Tools::getValue('text_'.(int)$lang['id_lang'], $menu_item->text[$lang['id_lang']]);
			}
		}
		else
		{
			$menu_item = new WtVerticalMegamenuItemClass();
			$fields['active'] = Tools::getValue('active', 1);
			$fields['id_column'] = Tools::getValue('id_column', 1);
			$fields['type_link'] = Tools::getValue('type_link', 1);
			$fields['type_item'] = Tools::getValue('type_item', 1);
			$fields['id_product'] = Tools::getValue('id_product', 0);
			foreach ($languages as $lang)
			{
				$fields['link'][$lang['id_lang']] = Tools::getValue('link_'.(int)$lang['id_lang'], '#');
				$fields['title'][$lang['id_lang']] = Tools::getValue('title_'.(int)$lang['id_lang'], '');
				$fields['text'][$lang['id_lang']] = Tools::getValue('text_'.(int)$lang['id_lang'], '');
			}
		}
		return $fields;
	}
	
	public function renderAddRow()
	{
		$id_wtverticalmegamenu = Tools::getValue('id_wtverticalmegamenu');
		$w_boostrap = $this->getWidthList();
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Row Item'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'text',
						'label' => $this->l('Special Class'),
						'name' => 'class',
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Active'),
						'name' => 'active',
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
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_wtverticalmegamenu='.$id_wtverticalmegamenu.'&buildMenu=1',
					'title' => $this->l('Cancel'),
					'icon' => 'process-icon-back'
					)
				)
			),
		);
		if (Tools::isSubmit('id_row'))
			$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_row');
		$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_wtverticalmegamenu');
		
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitRow';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.$id_wtverticalmegamenu.'&buildMenu=1';
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
		);
		$helper->override_folder = '/';
		return $helper->generateForm(array($fields_form));
	}
	
	public function getAddFieldsValues()
	{
		$fields = array();
		$languages = Language::getLanguages(false);
		if (Tools::isSubmit('id_row'))
		{
			$row = new WtVerticalMegamenuRowClass((int)Tools::getValue('id_row'));
			$fields['id_row'] = (int)Tools::getValue('id_row', $row->id);
			$fields['active'] = Tools::getValue('active', $row->active);
			$fields['id_wtverticalmegamenu'] = Tools::getValue('id_wtverticalmegamenu', $row->id_wtverticalmegamenu);
			$fields['class'] = Tools::getValue('class', $row->class);
		}
		else
		{
			$row = new WtVerticalMegamenuRowClass();
			$fields['active'] = Tools::getValue('active', 1);
			$fields['id_wtverticalmegamenu'] = Tools::getValue('id_wtverticalmegamenu', 1);
			$fields['class'] = Tools::getValue('class', '');
		}
		return $fields;
	}
	
	public function renderAddCol()
	{
		$id_wtverticalmegamenu = Tools::getValue('id_wtverticalmegamenu');
		$w_boostrap = $this->getWidthList();
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Column'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'select',
						'label' => $this->l('Width'),
						'name' => 'width',
						'options' => array(
							'query' => $w_boostrap,
							'id' => 'key',
							'name' => 'name'
						)
					),
					array(
						'type' => 'text',
						'label' => $this->l('Special Class'),
						'name' => 'class',
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Active'),
						'name' => 'active',
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
					'href' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_wtverticalmegamenu='.$id_wtverticalmegamenu.'&buildMenu=1',
					'title' => $this->l('Cancel'),
					'icon' => 'process-icon-back'
					)
				)
			),
		);
		if (Tools::isSubmit('id_column'))
			$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_column');
		$fields_form['form']['input'][] = array('type' => 'hidden', 'name' => 'id_row');
		
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();
		$helper->module = $this;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitCol';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&id_wtverticalmegamenu='.$id_wtverticalmegamenu.'&buildMenu=1';
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->tpl_vars = array(
			'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
			'fields_value' => $this->getAddFieldsValuesCol(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
		);
		$helper->override_folder = '/';
		return $helper->generateForm(array($fields_form));
	}
	
	public function getWidthList()
	{
		$hooks = array();
		
		foreach ($this->width_boostrap as $key => $width)
		{
			$hooks[$key]['key'] = $width;
			$hooks[$key]['name'] = $width;
		}
		return $hooks;
	}
	
	public function getAddFieldsValuesCol()
	{
		$fields = array();
		$languages = Language::getLanguages(false);
		if (Tools::isSubmit('id_column'))
		{
			$col = new WtVerticalMegamenuColumnClass((int)Tools::getValue('id_column'));
			$fields['id_column'] = (int)Tools::getValue('id_column', $col->id);
			$fields['active'] = Tools::getValue('active', $col->active);
			$fields['id_row'] = Tools::getValue('id_row', $col->id_row);
			$fields['width'] = Tools::getValue('width', $col->width);
			$fields['class'] = Tools::getValue('class', $col->class);
		}
		else
		{
			$col = new WtVerticalMegamenuColumnClass();
			$fields['active'] = Tools::getValue('active', 1);
			$fields['id_row'] = Tools::getValue('id_row', 1);
			$fields['width'] = Tools::getValue('width', 'col-sm-3');
			$fields['class'] = Tools::getValue('class', '');
		}
		return $fields;
	}
	
	public function renderBuildMenu()
	{
		$this->context->controller->addJqueryUI('ui.sortable');
		$this->context->controller->addJS($this->_path.'views/js/back.js');
		$this->context->controller->addCSS($this->_path.'views/css/back.css');
		$id_wtverticalmegamenu = Tools::getValue('id_wtverticalmegamenu', 1);
		$info_rows = $this->getRowInfo($id_wtverticalmegamenu);
		
		foreach ($info_rows as $key => $info_row)
		{
			$info_rows[$key]['status'] = $this->displayStatusRow($id_wtverticalmegamenu, $info_row['id_row'], $info_row['active']);
			$info_rows[$key]['list_col'] = $this->getColInfo($info_row['id_row']);
		}
		$this->context->smarty->assign(
			array(
				'id_wtverticalmegamenu' => $id_wtverticalmegamenu,
				'token' => Tools::getAdminTokenLite('AdminModules'),
				'info_rows' => $info_rows,
				'link' => $this->context->link,
				'url_base' => $this->context->shop->physical_uri.$this->context->shop->virtual_uri,
				'secure_key' => $this->secure_key
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/build_menu.tpl');
	}
	
	public function getRowInfo($id_menu, $active = null)
	{
		$id_shop = (int)$this->context->shop->id;
		$row_infos = array();
		$row_infos_rs = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT mr.*
			FROM '._DB_PREFIX_.'wtverticalmegamenu_row_shop mr
			WHERE mr.`id_shop` = '.$id_shop.' AND mr.id_wtverticalmegamenu = '.$id_menu.($active ? ' AND mr.`active` = 1' : ' ')
		);
		if (is_array($row_infos_rs) && count($row_infos_rs) > 0)
			$row_infos = $row_infos_rs;
		return $row_infos;
	}
	
	public function getColInfo($id_row, $active = null, $is_backend = true)
	{
		$id_lang = (int)$this->context->language->id;
		$id_shop = (int)$this->context->shop->id;
		$col_infos = array();
		
		$cols_result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT mc.*
			FROM '._DB_PREFIX_.'wtverticalmegamenu_column_shop mc
			WHERE mc.`id_shop` = '.$id_shop.' AND mc.id_row = '.$id_row.($active ? ' AND mc.`active` = 1' : '').' ORDER BY mc.position ASC, mc.id_column ASC'
		);
		
		if (is_array($cols_result) && count($cols_result) > 0)
			$col_infos = $cols_result;
		
		if (is_array($col_infos) && count($col_infos) > 0)
			foreach ($col_infos as $key => $col_info)
			{
				$sub_menu_infos = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
					SELECT smi.*,smil.*
					FROM '._DB_PREFIX_.'wtverticalmegamenu_item_shop smi
					LEFT JOIN '._DB_PREFIX_.'wtverticalmegamenu_item_lang smil ON (smi.id_item = smil.id_item AND smi.`id_shop` = smil.`id_shop`)
					WHERE smil.`id_shop` = '.$id_shop.' AND smi.id_column = '.$col_info['id_column'].' AND smil.id_lang = '.$id_lang.($active ? ' AND smi.`active` = 1' : '').' ORDER BY smi.position ASC, smi.id_item ASC');
				
				if (is_array($sub_menu_infos) && count($sub_menu_infos) > 0)
				{
					foreach ($sub_menu_infos as $key1 => $sub_menu_info)
					{
						$id_wtverticalmegamenu = Tools::getValue('id_wtverticalmegamenu', 1);
						if (isset($id_wtverticalmegamenu) && $id_wtverticalmegamenu > 0 && $is_backend)
							$sub_menu_infos[$key1]['status'] = $this->displayStatusSubItem($id_wtverticalmegamenu, $sub_menu_info['id_item'], $sub_menu_info['active']);
						if ($sub_menu_info['type_link'] == 1)
						{
							$menu_info = $this->fomartLink($sub_menu_info);
							$sub_menu_infos[$key1]['link'] = $menu_info['link'];
							$sub_menu_infos[$key1]['title'] = $menu_info['title'];
						}
						if ($sub_menu_info['type_link'] == 4)
						{
							$id_prod = (int)$sub_menu_info['id_product'];
							if (isset($id_prod) && $id_prod > 0)
							{
								$productarr = array();
								$productsImages = $this->getProductById($id_prod);
								foreach ($productsImages as $pi)
									$productarr[$pi['id_product']] = $pi;
								$sub_menu_infos[$key1]['product'] = Product::getProductsProperties($id_lang, $productarr);
							}
						}
						if ($sub_menu_info['type_link'] == 3)
						{
							$temp_url = '{wt_menu_v_url}';
							$sub_menu_infos[$key1]['text'] = str_replace($temp_url, _PS_BASE_URL_.__PS_BASE_URI__, $sub_menu_info['text']);
						}
					}
					$col_infos[$key]['list_menu_item'] = $sub_menu_infos;
				}
				else
					$col_infos[$key]['list_menu_item'] = array();
			}
		return $col_infos;
	}
	public function getProductById($id_prod)
	{
		$id_lang = (int)$this->context->language->id;
		$context = Context::getContext();
		
		 $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity,
				pl.`description_short`, pl.`available_now`, pl.`available_later`, pl.`link_rewrite`, pl.`name`,
			 image_shop.`id_image` id_image, il.`legend`, m.`name`
			'.(Combination::isFeatureActive() ? ', product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, IFNULL(product_attribute_shop.`id_product_attribute`,0) id_product_attribute' : '').'
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
				GROUP BY product_shop.id_product';
				
			$products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
			
		return $products;
	}
	
	public function getSubMenu($id_wtverticalmegamenu, $active)
	{
		$info_rows = array();
		if (is_array($this->getRowInfo($id_wtverticalmegamenu)) && count($this->getRowInfo($id_wtverticalmegamenu)) > 0)
		{
			$info_rows = $this->getRowInfo($id_wtverticalmegamenu, $active);
			foreach ($info_rows as $key => $info_row)
				$info_rows[$key]['list_col'] = $this->getColInfo($info_row['id_row'], $active, false);
		}
		return $info_rows;
	}
	
	public function menuExists($id)
	{
		$req = 'SELECT wt.`id_wtverticalmegamenu` as id_wtverticalmegamenu
				FROM `'._DB_PREFIX_.'wtverticalmegamenu` wt
				WHERE wt.`id_wtverticalmegamenu` = '.(int)$id;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);

		return ($row);
	}
	
	public function hookHeader()
	{
		$this->context->controller->addJS($this->_path.'/views/js/front.js');
		$this->context->controller->addCss($this->_path.'views/css/front.css');
	}

	public function prevHook()
	{
		$id_lang = (int)$this->context->language->id;
		$id_shop = (int)Context::getContext()->shop->id;
		$group_cat_result = array();
		
		$menu_obj = new WtVerticalMegamenuClass();
		$menus = $menu_obj->getMenus();
		$languages = Language::getLanguages();
		
		$new_menus = array();
		foreach ($menus as $menu)
		{
			if ($menu['type_link'] == 0 && $menu['dropdown'] == 1)
			{
				$type = Tools::substr($menu['link'], 0, 3);
				$id = (int)Tools::substr($menu['link'], 3, Tools::strlen($menu['link']) - 3);
				if ($menu['dropdown'] == 1 && $type == 'CAT')
				{
					$this->respMenu = '';
					$category = new Category((int)$id, $id_lang, $id_shop);
					$menu['sub_menu'] = $this->getRespCategories($id, false, false, $category->level_depth, $menu['subtitle'], $menu['type_icon'], $menu['icon'], $menu['align_sub'], $menu['class']);
				}
				else
					$menu['sub_menu'] = array();
				$menu['type'] = $type;
				$menu_info = $this->fomartLink($menu);
				$menu['link'] = $menu_info['link'];
				$menu['title'] = $menu_info['title'];
				$menu['selected_item'] = $menu_info['selected_item'];
				
			}
			else
			{
				if ($menu['type_link'] == 0)
				{
					$type = Tools::substr($menu['link'], 0, 3);
					$menu['type'] = $type;
					$menu_info = $this->fomartLink($menu);
					$menu['link'] = $menu_info['link'];
					$menu['title'] = $menu_info['title'];
					$menu['selected_item'] = $menu_info['selected_item'];
				}
				$sub_menu = $this->getSubMenu($menu['id_wtverticalmegamenu'], 1);
				if (is_array($sub_menu) && count($sub_menu) > 0)
					$menu['sub_menu'] = $sub_menu;
				else
					$menu['sub_menu'] = array();
			}
			$new_menus[] = $menu;
		}
		
		$this->context->smarty->assign(array(
				'menus' => $new_menus,
				'icon_path' => $this->_path.'views/img/icons/',
			));
	}

	
	/*public function hookDisplayLeftMenu()
	{
		if (!$this->isCached('wtverticalmegamenu_topcolumn.tpl', $this->getCacheId('wtverticalmegamenu_topcolumn')))
			$this->prevHook();
		return $this->display(__FILE__, 'wtverticalmegamenu_topcolumn.tpl', $this->getCacheId('wtverticalmegamenu_topcolumn'));
	}*/
	public function getWidgetVariables($hookName = null, array $configuration = [])
    {
		$id_lang = (int)$this->context->language->id;
		$id_shop = (int)Context::getContext()->shop->id;
		$group_cat_result = array();
		
		$menu_obj = new WtVerticalMegamenuClass();
		$menus = $menu_obj->getMenus();
		$languages = Language::getLanguages();
		
		$new_menus = array();
		foreach ($menus as $menu)
		{
			if ($menu['type_link'] == 0 && $menu['dropdown'] == 1)
			{
				$type = Tools::substr($menu['link'], 0, 3);
				$id = (int)Tools::substr($menu['link'], 3, Tools::strlen($menu['link']) - 3);
				if ($menu['dropdown'] == 1 && $type == 'CAT')
				{
					$this->respMenu = '';
					$category = new Category((int)$id, $id_lang, $id_shop);
					$menu['sub_menu'] = $this->getRespCategories($id, false, false, $category->level_depth, $menu['subtitle'], $menu['type_icon'], $menu['icon'], $menu['align_sub'], $menu['class']);
				}
				else
					$menu['sub_menu'] = array();
				$menu['type'] = $type;
				$menu_info = $this->fomartLink($menu);
				$menu['link'] = $menu_info['link'];
				$menu['title'] = $menu_info['title'];
				$menu['selected_item'] = $menu_info['selected_item'];
				
			}
			else
			{
				if ($menu['type_link'] == 0)
				{
					$type = Tools::substr($menu['link'], 0, 3);
					$menu['type'] = $type;
					$menu_info = $this->fomartLink($menu);
					$menu['link'] = $menu_info['link'];
					$menu['title'] = $menu_info['title'];
					$menu['selected_item'] = $menu_info['selected_item'];
				}
				$sub_menu = $this->getSubMenu($menu['id_wtverticalmegamenu'], 1);
				if (is_array($sub_menu) && count($sub_menu) > 0)
					$menu['sub_menu'] = $sub_menu;
				else
					$menu['sub_menu'] = array();
			}
			$new_menus[] = $menu;
		}
		
		return [
            'menus' => $new_menus,
			'icon_path' => $this->_path.'views/img/icons/',
			'_path' => $this->_path
        ];
		
	}
	
	public function renderWidget($hookName = null, array $configuration = [])
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        return $this->fetch('module:'.$this->name.'/views/templates/hook/wtverticalmegamenu_topcolumn.tpl');
    }
	
	public function hookDisplayOtherPage()
	{
		if ($this->context->smarty->tpl_vars['page_name']->value != 'index')
		{
			$this->prevHook();
			return $this->display(__FILE__, 'wtverticalmegamenu_otherpage.tpl');
		}
		
	}
	private function getAllDefaultLink($id_lang = null, $link = false)
	{
		if (is_null($id_lang)) $id_lang = (int)$this->context->language->id;
		$html = '<optgroup label="'.$this->l('Category').'">';
		$html .= $this->getCategoryOption(1, $id_lang, false, true, $link);
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Cms').'">';
		$html .= $this->getCMSOptions(0, 0, $id_lang, $link);
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Manufacturer').'">';
		$manufacturers = Manufacturer::getManufacturers(false, $id_lang);
		foreach ($manufacturers as $manufacturer)
		{
			if ($link)
				$html .= '<option value="'.$this->context->link->getManufacturerLink($manufacturer['id_manufacturer']).'">'.$manufacturer['name'].'</option>';
			else
				$html .= '<option value="MAN'.(int)$manufacturer['id_manufacturer'].'">'.$manufacturer['name'].'</option>';
		}
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Supplier').'">';
		$suppliers = Supplier::getSuppliers(false, $id_lang);
		foreach ($suppliers as $supplier)
		{
		if ($link)
			$html .= '<option value="'.$this->context->link->getSupplierLink($supplier['id_supplier']).'">'.$supplier['name'].'</option>';
		else
			$html .= '<option value="SUP'.(int)$supplier['id_supplier'].'">'.$supplier['name'].'</option>';
		}
		$html .= '</optgroup>';
		$html .= '<optgroup label="'.$this->l('Page').'">';
		$html .= $this->getPagesOption($id_lang, $link);
		$shoplink = Shop::getShops();
		if (count($shoplink) > 1)
		{
			$html .= '<optgroup label="'.$this->l('Shops').'">';
			foreach ($shoplink as $sh)
				$html .= '<option value="SHO'.(int)$sh['id_shop'].'">'.$sh['name'].'</option>';
		}
		$html .= '</optgroup>';
		return $html;
	}
	
	public function getCategoryOption($id_category = 1, $id_lang = false, $id_shop = false, $recursive = true, $link = false)
	{
		$html = '';
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
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
			$html .= '<option value="CAT'.(int)$category->id.'">'.str_repeat('&nbsp;', 3 * (int)$category->level_depth).$category->name.'</option>';
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
	
	public function getCMSOptions($parent = 0, $depth = 0, $id_lang = false, $link = false)
	{
		$html = '';
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
		$pages = $this->getCMSPages((int)$parent, false, (int)$id_lang);
		$spacer = str_repeat('&nbsp;', 3 * (int)$depth);
		foreach ($categories as $category)
			$html .= $this->getCMSOptions($category['id_cms_category'], (int)$depth + 1, (int)$id_lang, $link);
		foreach ($pages as $page)
			if ($link)
				$html .= '<option value="'.$this->context->link->getCMSLink($page['id_cms']).'">'.(isset($spacer) ? $spacer : '').$page['meta_title'].'</option>';
			else
				$html .= '<option value="CMS'.$page['id_cms'].'">'.$page['meta_title'].'</option>';
		return $html;
	}
	
	public function getCMSCategories($recursive = false, $parent = 1, $id_lang = false)
	{
		$categories = array();
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		if ($recursive === false)
		{
			$sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
				FROM `'._DB_PREFIX_.'cms_category` bcp
				INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
				ON (bcp.`id_cms_category` = cl.`id_cms_category`)
				WHERE cl.`id_lang` = '.(int)$id_lang.'
				AND bcp.`id_parent` = '.(int)$parent;
			return Db::getInstance()->executeS($sql);
		}
		else
		{
			$sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
				FROM `'._DB_PREFIX_.'cms_category` bcp
				INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
				ON (bcp.`id_cms_category` = cl.`id_cms_category`)
				WHERE cl.`id_lang` = '.(int)$id_lang.'
				AND bcp.`id_parent` = '.(int)$parent;
				$results = Db::getInstance()->executeS($sql);
			foreach ($results as $result)
			{
			$sub_categories = $this->getCMSCategories(true, $result['id_cms_category'], (int)$id_lang);
			if ($sub_categories && count($sub_categories) > 0) $result['sub_categories'] = $sub_categories;
				$categories[] = $result;
			}
			return isset($categories) ? $categories : false;
		}
	}
	
	public function getCMSPages($id_cms_category, $id_shop = false, $id_lang = false)
	{
		$id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
			FROM `'._DB_PREFIX_.'cms` c
			INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
			ON (c.`id_cms` = cs.`id_cms`)
			INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
			ON (c.`id_cms` = cl.`id_cms`  AND cs.`id_shop` = cl.`id_shop`)
			WHERE c.`id_cms_category` = '.(int)$id_cms_category.'
			AND cs.`id_shop` = '.(int)$id_shop.'
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';
		return Db::getInstance()->executeS($sql);
	}
	
	public function getPagesOption($id_lang = null, $link = false)
	{
		if (is_null($id_lang)) $id_lang = (int)$this->context->cookie->id_lang;
		$files = Meta::getMetasByIdLang($id_lang);
		$html = '';
		foreach ($files as $file)
		{
			if ($link) $html .= '<option value="'.$this->context->link->getPageLink($file['page']).'">'.(($file['title'] != '') ? $file['title'] : $file['page']).'</option>';
			else  $html .= '<option value="PAG'.$file['page'].'">'.(($file['title'] != '') ? $file['title'] :$file['page']).'</option>';
		}
		return $html;
	}
	
	public function fomartLink($item = null, $id_lang = null)
	{
		if (is_null($item)) return;
			if (!empty($this->context->controller->php_self)) $page_name = $this->context->controller->php_self;
		else
		{
			$page_name = Dispatcher::getInstance()->getController();
			$page_name = (preg_match('/^[0-9]/', $page_name) ? 'page_'.$page_name : $page_name);
		}
		$link = '';
		$selected_item = false;
		if (is_null($id_lang)) $id_lang = (int)$this->context->language->id;
		$type = Tools::substr($item['link'], 0, 3);
		$key = Tools::substr($item['link'], 3, Tools::strlen($item['link']) - 3);
		$title = '';
		switch ($type)
		{
			case 'CAT':
				if ($page_name == 'category' && (int)Tools::getValue('id_category') == (int)$key) $selected_item = true;
				$id_shop = (int)Context::getContext()->shop->id;
				$link = $this->context->link->getCategoryLink((int)$key, null, $id_lang, null, $id_shop);
				$category = new Category($key, $id_lang, $id_shop);
				$title = $category->name;
				break;
			case 'CMS':
				if ($page_name == 'cms' && (int)Tools::getValue('id_cms') == (int)$key) $selected_item = true;
				$link = $this->context->link->getCMSLink((int)$key, null, $id_lang);
				$cms = new CMS($key, $id_lang);
				$title = $cms->meta_title;
				break;
			case 'MAN':
				if ($page_name == 'manufacturer' && (int)Tools::getValue('id_manufacturer') == (int)$key) $selected_item = true;
				$man = new Manufacturer((int)$key, $id_lang);
				$link = $this->context->link->getManufacturerLink($man->id, $man->link_rewrite, $id_lang);
				$title = $man->name;
				break;
			case 'SUP':
				if ($page_name == 'supplier' && (int)Tools::getValue('id_supplier') == (int)$key) $selected_item = true;
				$sup = new Supplier((int)$key, $id_lang);
				$link = $this->context->link->getSupplierLink($sup->id, $sup->link_rewrite, $id_lang);
				$title = $sup->name;
				break;
			case 'PAG':
				$pag = Meta::getMetaByPage($key, $id_lang);
				$link = $this->context->link->getPageLink($pag['page'], true, $id_lang);
				if ($page_name == $pag['page']) $selected_item = true;
				if ($pag['page'] == 'index')
					$title = $this->l('Home');
				else
					$title = $pag['title'];
				break;
			case 'SHO':
				$shop = new Shop((int)$key);
				$link = $shop->getBaseURL();
				$title = $shop->name;
				break;
			default:
				$link = $item['link'];
				break;
		}
		return array('title' => $title, 'link' => $link, 'selected_item' => $selected_item);
	}
	
	public function getRespCategories($id_category = 1, $id_lang = false, $id_shop = false, $level_root = 1, $sub_title = '', $type_icon = 1, $icon = '', $sub_align = '', $spec_class = '')
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$category = new Category((int)$id_category, $id_lang, $id_shop);
		$icon_path = $this->_path.'views/img/icons/';
		if (is_null($category->id))
			return;
		$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
		$class = '';
		if ($level_root > 0)
		{	
			$new_level = (int)$category->level_depth - (int)$level_root + 1;
			$class .= 'level-'.$new_level.' ';
		}
		if (isset($children) && count($children) && $category->level_depth > 1)
			$class .= 'parent ';  
		if ($spec_class != '')
			$class .= $spec_class;
		
		if ($category->level_depth > 1)
			$cat_link = $category->getLink();
		else
			$cat_link = $this->context->link->getPageLink('index');
		
		$user_groups = $this->context->customer->getGroups();
		$is_intersected = array_intersect($category->getGroups(), $user_groups);
								
		if (!empty($is_intersected))
		{
			$this->respMenu .= '<li class="'.$class.'">';
			$this->respMenu .= '<a href="'.$cat_link.'">';
			if ($type_icon == 1 && $icon != '')
				$this->respMenu .= '<i class="material-icons">'.$icon.'</i>';
			elseif ($type_icon == 0 && $icon != '')
				$this->respMenu .= '<img src="'.$icon_path.$icon.'" alt=""/>';
			$this->respMenu .= '<span>'.$category->name.'</span>';
			if ($sub_title != '')
				$this->respMenu .= '<span class="menu-subtitle">'.$sub_title.'</span>';
			$this->respMenu .= '</a>';
		}
		
		if (isset($children) && count($children))
		{
			$this->respMenu .= '<span class="icon-drop-mobile"></span>';
			$this->respMenu .= '<ul class="menu-dropdown cat-drop-menu '.$sub_align.'">';
			
			foreach ($children as $child)
				$this->getRespCategories((int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'], $level_root);
			$this->respMenu .= '</ul>';
			
		}
		if (!empty($is_intersected))
			$this->respMenu .= '</li>';
		return $this->respMenu;
	}
	public function clearCacheVMenu()
	{
		$this->_clearCache('wtverticalmegamenu_topcolumn.tpl');
		$this->_clearCache('wtverticalmegamenu_page.tpl');
	}
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_shop (`id_wtverticalmegamenu`, `id_shop`, `type_link`, `dropdown`, `type_icon`, `icon`, `align_sub`, `width_sub`, `class`, `active`)
			SELECT id_wtverticalmegamenu, '.(int)$params['new_id_shop'].', type_link, dropdown, type_icon, icon, align_sub, width_sub, class, active
			FROM '._DB_PREFIX_.'wtverticalmegamenu_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_lang (`id_wtverticalmegamenu`, `id_shop`, `id_lang`, `title`, `link`, `subtitle`)
			SELECT id_wtverticalmegamenu, '.(int)$params['new_id_shop'].', id_lang, title, link, subtitle
			FROM '._DB_PREFIX_.'wtverticalmegamenu_lang
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_row_shop (`id_row`, `id_wtverticalmegamenu`, `id_shop`, `class`, `active`)
			SELECT id_row, id_wtverticalmegamenu, '.(int)$params['new_id_shop'].', class, active
			FROM '._DB_PREFIX_.'wtverticalmegamenu_row_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_column_shop (`id_column`, `id_row`, `id_shop`, `width`, `class`, `active`)
			SELECT id_column, id_row, '.(int)$params['new_id_shop'].', width, class, active
			FROM '._DB_PREFIX_.'wtverticalmegamenu_column_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_item_shop (`id_item`, `id_column`, `id_shop`, `type_link`, `type_item`, `id_product`, `active`)
			SELECT id_item, id_column, '.(int)$params['new_id_shop'].', type_link, type_item, id_product, active
			FROM '._DB_PREFIX_.'wtverticalmegamenu_item_shop
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_item_lang (`id_item`, `id_shop`, `id_lang`, `title`, `link`, `text`)
			SELECT id_item, '.(int)$params['new_id_shop'].', id_lang, title, link, text
			FROM '._DB_PREFIX_.'wtverticalmegamenu_item_lang
			WHERE id_shop = '.(int)$params['old_id_shop']
		);
	}
	public function hookActionObjectLanguageAddAfter($params)
	{
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_lang (`id_wtverticalmegamenu`, `id_shop`, `id_lang`, `title`, `link`, `subtitle`)
			SELECT id_wtverticalmegamenu, id_shop, '.(int)$params['object']->id.', title, link, subtitle
			FROM '._DB_PREFIX_.'wtverticalmegamenu_lang
			WHERE id_lang = '.(int)Configuration::get('PS_LANG_DEFAULT')
		);
		
		Db::getInstance()->execute('
			INSERT IGNORE INTO '._DB_PREFIX_.'wtverticalmegamenu_item_lang (`id_item`, `id_shop`, `id_lang`, `title`, `link`, `text`)
			SELECT id_item, id_shop, '.(int)$params['object']->id.', title, link, text
			FROM '._DB_PREFIX_.'wtverticalmegamenu_item_lang
			WHERE id_lang = '.(int)Configuration::get('PS_LANG_DEFAULT')
		);
	}
}