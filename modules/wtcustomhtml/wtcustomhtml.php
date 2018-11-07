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

include_once(dirname(__FILE__).'/classes/CustomHtmlClass.php');
include_once(dirname(__FILE__).'/sql/SampleDataHtml.php');
class WTCustomHTML extends Module
{
	protected $error = false;
	private $_html;
	private $myHook = array('displayNav', 'displayNav1', 'displayNav2', 'displayLeftLogo', 'displayRightLogo', 'displayTop','displayTopColumn', 'displayRightSlider', 'displayRightHome', 'displayBanner','displayLeftColumn','displayRightColumn','displayFooter','displayHome', 'displayTopHome', 'displayCenterHome', 'displayTopHomeRight', 'displayBottomHome', 'displayAfterMenu', 'displayBottomFooter', 'displayBannerCategory');
	public function __construct()
	{
		$this->name = 'wtcustomhtml';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'waterthemes';
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->l('WT Custom Html');
		$this->description = $this->l('Adds Html blocks to hook');
		$this->confirmUninstall = $this->l('Are you sure that you want to delete your HTML blocks?');
	}
	
	public function install()
	{	
		if (parent::install() == false || !$this->registerHook('header') || !$this->registerHook('actionShopDataDuplication') || !$this->registerHook('actionObjectLanguageAddAfter'))
			return false;
		foreach ($this->myHook as $hook)
			if (!$this->registerHook($hook))
				return false;
		include(dirname(__FILE__).'/sql/install.php');
		$sample_data = new SampleDataHtml();
		$base_url = _PS_BASE_URL_.__PS_BASE_URI__;
		$sample_data->initData($base_url);
		return true;
	}
	public function uninstall()
	{
		include(dirname(__FILE__).'/sql/uninstall.php');
		if (parent::uninstall() == false)
			return false;
		return true;
	}
	public function getContent()
	{
		if (Tools::isSubmit('changeStatus') || Tools::isSubmit('delete_cat_block'))
		{
			$this->_postProcess();
			$this->_html .= $this->renderList();
		}
		elseif (Tools::isSubmit('addblock') || Tools::isSubmit('id_wtcustomhtml') || Tools::isSubmit('saveBlock'))
		{
			$this->_postProcess();
			$this->renderAddForm();
		}
		else
		{
			$this->_postProcess();
			$this->_html .= $this->renderList();
		}
		return $this->_html;
	}
	private function _postProcess()
	{
		$errors = array();
		if (Tools::isSubmit('saveBlock'))
		{
			$block = new CustomHtmlClass(Tools::getValue('id_wtcustomhtml'));
			$block->copyFromPost();
			$errors = $block->validateController();		
			if (count($errors))
				$this->_html .= $this->displayError(implode('<br />', $errors));
			else
			{
				Tools::getValue('id_wtcustomhtml') ? $block->update() : $block->add();
				$this->clearCacheBlock(Tools::getValue('hook'));
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&saveBlockConfirmation');
			}
		}
		elseif (Tools::isSubmit('changeStatus') && Tools::getValue('id_wtcustomhtml'))
		{
			$block = new CustomHtmlClass(Tools::getValue('id_wtcustomhtml'));
			if ($block->active == 0)
				$block->active = 1;
			else
				$block->active = 0;
			$res = $block->update();
			$this->clearCacheBlock(Tools::getValue('hook'));
			$this->html .= ($res ? $this->displayConfirmation($this->l('Configuration updated')) : $this->displayError($this->l('The configuration could not be updated.')));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		elseif (Tools::isSubmit('delete_id_block'))
		{
			$block = new CustomHtmlClass(Tools::getValue('delete_id_block'));
			$block->delete();
			$this->clearCacheBlock(Tools::getValue('hook'));
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&deleteBlockConfirmation');
		}
		elseif (Tools::isSubmit('saveBlockConfirmation'))
			$this->_html = $this->displayConfirmation($this->l('Static block has been saved successfully'));
		elseif (Tools::isSubmit('deleteBlockConfirmation'))
			$this->_html = $this->displayConfirmation($this->l('Static block deleted successfully'));
	}
	private function clearCacheBlock($hook)
	{
		$this->_clearCache('wtcustomhtml_'.Tools::strtolower($this->getHookName($hook)).'.tpl');
	}
	private function getHookName($id_hook, $name = false)
	{
		if (!$result = Db::getInstance()->getRow('
		SELECT `name`,`title`
		FROM `'._DB_PREFIX_.'hook` 
		WHERE `id_hook` = '.(int)($id_hook)))
			return false;
		return $result['name'];
	}
	private function getBlocks()
	{
		$this->context = Context::getContext();
		$id_lang = $this->context->language->id;
		$id_shop = $this->context->shop->id;
		if (!$result = Db::getInstance()->ExecuteS(
			'SELECT b.id_wtcustomhtml, b.hook, bs.active, bl.`title`, bl.`content` 
			FROM `'._DB_PREFIX_.'wtcustomhtml` b 
			LEFT JOIN `'._DB_PREFIX_.'wtcustomhtml_shop` bs ON (b.`id_wtcustomhtml` = bs.`id_wtcustomhtml` )
			LEFT JOIN `'._DB_PREFIX_.'wtcustomhtml_lang` bl ON (b.`id_wtcustomhtml` = bl.`id_wtcustomhtml`'.( $id_shop ? 'AND bl.`id_shop` = '.$id_shop : ' ' ).') 
			WHERE bl.id_lang = '.(int)$id_lang.
			( $id_shop ? ' AND bs.`id_shop` = '.$id_shop : ' ' )))
			return false;
		return $result;
	}
	
	public function getHookTitle($id_hook, $name = false)
	{
		if (!$result = Db::getInstance()->getRow('
			SELECT `name`,`title`
			FROM `'._DB_PREFIX_.'hook` 
			WHERE `id_hook` = '.(int)($id_hook)))
			return false;
		return (($result['title'] != '' && $name) ? $result['title'] : $result['name']);
	}
	public function renderList()
	{
		$blocks = array();
		if ($this->getBlocks() && count($this->getBlocks()) > 0)
		{
			$blocks = $this->getBlocks();
			foreach ($blocks as $key => $block)
				$blocks[$key]['status'] = $this->displayStatus($block['id_wtcustomhtml'], $block['active']);
		}
		$this->context->smarty->assign(
			array(
				'link' => $this->context->link,
				'blocks' => $blocks
			)
		);
		return $this->display(__FILE__, 'views/templates/admin/list.tpl');
	}
	public function getHookList()
	{
		$hooks = array();
		
		foreach ($this->myHook as $key => $hook)
		{
			$hooks[$key]['key'] = $hook;
			$hooks[$key]['name'] = $hook;
		}
		return $hooks;
	}
	public function renderAddForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$hooks = $this->getHookList();
		$this->fields_form[0]['form'] = array(
					'tinymce' => true,
					'legend' => array(
					'title' => $this->l('Block item'),
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Title'),
					'lang' => true,
					'name' => 'title',
					'cols' => 40,
					'rows' => 10
					
				),
				array(
					'type' => 'select',
					'label' => $this->l('Hook'),
					'name' => 'hook',
					'options' => array(
						'query' => $hooks, 
						'id' => 'key',
						'name' => 'name'
					)
					
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('HTML'),
					'name' => 'content',
					'lang' => true,
					'autoload_rte' => true,
					'cols' => 40,
					'rows' => 10
				),
				array(
						'type' => 'switch',
						'label' => $this->l('Displayed'),
						'name' => 'active',
						'values' => array(
									array(
										'id' => 'active_on',
										'value' => 1,
										'label' => $this->l('Enabled')
									),
									array(
										'id' => 'active_off',
										'value' => 0,
										'label' => $this->l('Disabled')
									)
						),
				)
			),
			'submit' => array(
				'title' => $this->l('Save'),
			)
		);
		
		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = 'wtcustomhtml';
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->show_cancel_button = true;
		$helper->back_url = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules');
		foreach (Language::getLanguages(false) as $lang)
			$helper->languages[] = array(
				'id_lang' => $lang['id_lang'],
				'iso_code' => $lang['iso_code'],
				'name' => $lang['name'],
				'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
			);

		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name;
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->toolbar_scroll = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'saveBlock';
		$helper->toolbar_btn = array(
			'save' =>
			array(
				'desc' => $this->l('Save'),
				'href' => $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&save'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			),
			'back' =>
			array(
				'href' => $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
				'desc' => $this->l('Back to list')
			)
		);
		
		$id_wtcustomhtml = Tools::getValue('id_wtcustomhtml');
		if (Tools::isSubmit('id_wtcustomhtml') && $id_wtcustomhtml)
		{
			$block = new CustomHtmlClass((int)$id_wtcustomhtml);
			$this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_wtcustomhtml');
			$helper->fields_value['id_wtcustomhtml'] = (int)Tools::getValue('id_wtcustomhtml', $block->id_wtcustomhtml);
			$helper->fields_value['active'] = Tools::getValue('active', $block->active);
			$helper->fields_value['hook'] = Tools::getValue('hook', $block->hook);
		}
		else
		{
			$block = new CustomHtmlClass();
			$helper->fields_value['active'] = Tools::getValue('active', 1);
			$helper->fields_value['hook'] = Tools::getValue('hook', 9);
		}
		foreach (Language::getLanguages(false) as $lang)
		{
			$helper->fields_value['title'][(int)$lang['id_lang']] = Tools::getValue('title_'.(int)$lang['id_lang'], $block->title[(int)$lang['id_lang']]);
			$helper->fields_value['content'][(int)$lang['id_lang']] = Tools::getValue('content_'.(int)$lang['id_lang'], $block->content[(int)$lang['id_lang']]);
		}
		
		$this->_html .= $helper->generateForm($this->fields_form);
	}
	public function displayStatus($id_wtcustomhtml, $active)
	{
		$title = ((int)$active == 0 ? $this->l('Disabled') : $this->l('Enabled'));
		$icon = ((int)$active == 0 ? 'icon-remove' : 'icon-check');
		$class = ((int)$active == 0 ? 'btn-danger' : 'btn-success');
		
		$this->context->smarty->assign(
			array(
				'title' => $title,
				'icon' => $icon,
				'class' => $class,
				'id_wtcustomhtml' => $id_wtcustomhtml,
				'link' => AdminController::$currentIndex,
				'name' => $this->name,
				'token' => Tools::getAdminTokenLite('AdminModules'),
			)
		);
		
		return $this->display(__FILE__, 'views/templates/admin/displaystatus.tpl');
	}
	
	private function getBlockFromHook($hook_name)
	{
		$block_list = array();
		$this->context = Context::getContext();
		$id_shop = $this->context->shop->id;
		$id_lang = $this->context->language->id;
		
		$results = Db::getInstance()->ExecuteS('SELECT b.`id_wtcustomhtml`, bl.`content` FROM `'._DB_PREFIX_.'wtcustomhtml` b
		LEFT JOIN `'._DB_PREFIX_.'wtcustomhtml_shop` bs ON (b.id_wtcustomhtml = bs.id_wtcustomhtml)
		LEFT JOIN `'._DB_PREFIX_.'wtcustomhtml_lang` bl ON (bl.id_wtcustomhtml = bs.id_wtcustomhtml)
		WHERE bs.active = 1 AND bl.id_lang = '.(int)$id_lang.' AND (bs.id_shop = '.(int)$id_shop.') AND b.`hook` = "'.$hook_name.'"');
	
		if (Tools::usingSecureMode())
			$path_ssl = _PS_BASE_URL_SSL_.__PS_BASE_URI__;
		else
			$path_ssl = _PS_BASE_URL_.__PS_BASE_URI__;
		 //$block_list = [];
		  foreach ($results as $result) {
			  $temp = str_replace('{static_block_url}', $path_ssl, $result['content']);
            $block_list[$result['id_wtcustomhtml']]['content'] = $temp;
        }
		return $block_list;
	}
	public function hookDisplayNav()
	{
		
			$block_list = $this->getBlockFromHook('displayNav');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaynav.tpl');
	}
	public function hookDisplayNav1()
	{
		
			$block_list = $this->getBlockFromHook('displayNav1');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaynav1.tpl');
	}
	public function hookDisplayNav2()
	{
		
			$block_list = $this->getBlockFromHook('displayNav2');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaynav.tpl');
	}
	public function hookDisplayTop()
	{
		
			$block_list = $this->getBlockFromHook('displayTop');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self,
				'path_ssl' => $this->context->link->getBaseLink()
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_top.tpl');
	}
	public function hookDisplayLeftLogo()
	{
		
			$block_list = $this->getBlockFromHook('displayLeftLogo');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_leftlogo.tpl');
	}
	public function hookDisplayRightLogo()
	{
		
			$block_list = $this->getBlockFromHook('displayRightLogo');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_rightlogo.tpl');
	}
	public function hookDisplayRightHome()
	{
			$block_list = $this->getBlockFromHook('displayRightHome');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self,
				'path_ssl' => $this->context->link->getBaseLink(),
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_righthome.tpl');
	}
	public function hookDisplayRightSlider()
	{
		
			$block_list = $this->getBlockFromHook('displayRightSlider');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self,
				'path_ssl' => $this->context->link->getBaseLink(),
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_rightslider.tpl');
	}
	public function hookDisplayTopColumn()
	{
		if ($this->context->smarty->tpl_vars['page_name']->value == 'index')
		{
			
				$block_list = $this->getBlockFromHook('displayTopColumn');
				
				$this->context->smarty->assign(array(
					'block_list' => $block_list,
					'page_name' => $this->context->controller->php_self,
					'path_ssl' => $this->context->link->getBaseLink(),
				));
			
		return $this->display(__FILE__, 'wtcustomhtml_topcolumn.tpl');
		}
	}
	
	public function hookDisplayLeftColumn()
	{
		
			$block_list = $this->getBlockFromHook('displayLeftColumn');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self,
				'path_ssl' => $this->context->link->getBaseLink(),
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_leftcolumn.tpl');
	}
	
	public function hookDisplayRightColumn()
	{
		
			$block_list = $this->getBlockFromHook('displayRightColumn');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_rightcolumn.tpl');
	}
	
	public function hookDisplayFooter()
	{
		
			$block_list = $this->getBlockFromHook('displayFooter');
			
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self,
				'path_ssl' => $this->context->link->getBaseLink(),
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_footer.tpl');
	}
	
	public function hookDisplayHome()
	{
		
			$block_list = $this->getBlockFromHook('displayHome');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		return $this->display(__FILE__, 'wtcustomhtml_home.tpl');
	}
	public function hookDisplayTopHome()
	{
		
			$block_list = $this->getBlockFromHook('displayTopHome');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaytophome.tpl');
	}
	public function hookDisplayCenterHome()
	{
		
			$block_list = $this->getBlockFromHook('displayCenterHome');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaycenterhome.tpl');
	}
	
	public function hookDisplayTopHomeRight()
	{
		
			$block_list = $this->getBlockFromHook('displayTopHomeRight');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaytophomeright.tpl');
	}
	public function hookDisplayBottomHome()
	{
		
			$block_list = $this->getBlockFromHook('displayBottomHome');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaybottomhome.tpl');
	}
	public function hookDisplayBannerCategory()
	{
		
			$block_list = $this->getBlockFromHook('displayBannerCategory');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaybannercategory.tpl');
	}
	public function hookDisplayAfterMenu()
	{
		
			$block_list = $this->getBlockFromHook('displayAfterMenu');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displayaftermenu.tpl');
	}

	
	public function hookDisplayBottomFooter()
	{
		
			$block_list = $this->getBlockFromHook('displayBottomFooter');
			$this->context->smarty->assign(array(
				'block_list' => $block_list,
				'page_name' => $this->context->controller->php_self
			));
		
		return $this->display(__FILE__, 'wtcustomhtml_displaybottomfooter.tpl');
	}
	public function hookHeader($params)
	{
		$this->context->controller->addCss($this->_path.'views/css/wtcustomhtml.css');
	}
	public function hookActionShopDataDuplication($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'wtcustomhtml_shop (id_wtcustomhtml, id_shop, active)
		SELECT id_wtcustomhtml, '.(int)$params['new_id_shop'].', active
		FROM '._DB_PREFIX_.'wtcustomhtml_shop
		WHERE id_shop = '.(int)$params['old_id_shop']);
		
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'wtcustomhtml_lang (id_wtcustomhtml, id_lang, id_shop, title, content)
		SELECT id_wtcustomhtml, id_lang, '.(int)$params['new_id_shop'].', title, content
		FROM '._DB_PREFIX_.'wtcustomhtml_lang
		WHERE id_shop = '.(int)$params['old_id_shop']);
	}
	public function hookActionObjectLanguageAddAfter($params)
	{
		Db::getInstance()->execute('
		INSERT IGNORE INTO '._DB_PREFIX_.'wtcustomhtml_lang (id_wtcustomhtml, id_lang, id_shop, title, content)
		SELECT id_wtcustomhtml, '.(int)$params['object']->id.', id_shop, title, content
		FROM '._DB_PREFIX_.'wtcustomhtml_lang
		WHERE id_lang = '.(int)Configuration::get('PS_LANG_DEFAULT'));	
	}
}
?>
