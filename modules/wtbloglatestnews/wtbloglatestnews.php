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
require_once (_PS_MODULE_DIR_.'wtblog/wtblog.php');
class WtBlogLatestNews extends Module
{
	public function __construct()
	{
		$this->name = 'wtbloglatestnews';
		$this->tab = 'front_office_features';
		$this->version = '2.0.1';
		$this->bootstrap = true;
		$this->author = 'waterthemes';
		$this->secure_key = Tools::encrypt($this->name);
		parent::__construct();
		$this->displayName = $this->l('WT Blog Latest News');
		$this->description = $this->l('Show Latest News From Blog');
		$this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
	}
	public function install()
	{
		if (!parent::install()
		|| !$this->registerHook('displayFooter')
		|| !$this->registerHook('actionsbdeletepost')
		|| !$this->registerHook('actionsbnewpost')
		|| !$this->registerHook('actionsbupdatepost')
		|| !$this->registerHook('actionsbtogglepost'))
			return false;
		Configuration::updateGlobalValue('wtshowhomepost', 5);
		return true;
	}
	public function uninstall()
	{
		$this->deleteCache();
		if (!parent::uninstall() || !Configuration::deleteByName('wtshowhomepost'))
			return false;
		return true;
	}
	public function getContent()
	{
		$html = '';
		if (Tools::isSubmit('save'.$this->name))
		{
			Configuration::updateValue('wtshowhomepost', Tools::getvalue('wtshowhomepost'));
			$html = $this->displayConfirmation($this->l('The settings have been updated successfully.'));
			$helper = $this->settingForm();
			$html .= $helper->generateForm($this->fields_form);
			return $html;
		}
		else
		{
			$helper = $this->settingForm();
			$html .= $helper->generateForm($this->fields_form);
			return $html;
		}
	}
	public function settingForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$this->fields_form[0]['form'] = array(
			'legend' => array(
			'title' => $this->l('General Setting'),
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Number of posts to dispay'),
					'name' => 'wtshowhomepost',
					'size' => 15,
					'required' => true
				)
			),
			'submit' => array(
				'title' => $this->l('Save'),
				'class' => 'btn btn-default pull-right'
			)
		);

		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		foreach (Language::getLanguages(false) as $lang)
			$helper->languages[] = array(
					'id_lang' => $lang['id_lang'],
					'iso_code' => $lang['iso_code'],
					'name' => $lang['name'],
					'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
			);
		$helper->toolbar_btn = array(
			'save' =>
			array(
				'desc' => $this->l('Save'),
				'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.'token='.Tools::getAdminTokenLite('AdminModules'),
			)
		);
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;
		$helper->toolbar_scroll = true;
		$helper->submit_action = 'save'.$this->name;
		$helper->fields_value['wtshowhomepost'] = Configuration::get('wtshowhomepost');
		return $helper;
	}
	public function hookDisplayFooter()
	{
		$id_lang = $this->context->language->id;
		$id_shop = $this->context->shop->id;
		if (Module::isInstalled('wtblog') != 1)
		{
			$this->smarty->assign(array(
				'wtmodname' => $this->name
			));
			return $this->display(__FILE__, 'install_required.tpl');
		}
		else
		{
			$view_data = array();
			
				$view_data['posts'] = WTBlog::getLastestPost($id_lang, $id_shop, Configuration::get('wtshowhomepost'));
				$this->smarty->assign(array(
					'view_data' => $view_data['posts'],
					'path_ssl' => $this->context->link->getBaseLink(),
				));
			
			return $this->display(__FILE__, 'wtblog_latest_news.tpl');
		}
	}	
	public function deleteCache()
	{
		$this->_clearCache('wtblog_latest_news.tpl', $this->getCacheId('wtblog_latest_news'));
	}
	public function hookactionsbdeletepost()
	{
		return $this->deleteCache();
	}
	public function hookactionsbnewpost()
	{
		return $this->deleteCache();
	}
	public function hookactionsbupdatepost()
	{
		return $this->deleteCache();
	}
	public function hookactionsbtogglepost()
	{
		return $this->deleteCache();
	}
}