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

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class WtPagetitle extends Module implements WidgetInterface
{
	private $temp_url = '{wtpagetitle_url}';
	private $html;
	private $settings_default;
	private $wt_manu_config;
	private $config;
	public function __construct()
	{
		$this->name = 'wtpagetitle';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'waterthemes';
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->getTranslator()->trans('WT Page Title', array(), 'Modules.WTPageTitle.Admin');
		$this->description = $this->getTranslator()->trans('Get page title', array(), 'Modules.WTPageTitle.Admin');
		 $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
	}
	public function install()
	{
		if (!parent::install() || !$this->registerHook('displayPageTitle'))
			return false;
		return true;
	}
	
	public function renderWidget($hookName = null, array $configuration = [])
    {
        
		 $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        return $this->fetch('module:'.$this->name.'/views/templates/hook/'.$this->name.'.tpl');
        
    }
	
	public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $page_title = '';
		
		$id_lang = (int)$this->context->language->id;
		$page = $this->context->controller->php_self;
		
		if (Tools::getIsset('id_category') && $page == 'category')
		{
			$id_cat = Tools::getValue('id_category');
			$category = new Category($id_cat);
			$page_title = $category->name[$id_lang];
		}
		else if (Tools::getIsset('id_product') && $page == 'product')
		{
			$id_prod = Tools::getValue('id_product');
			$product = new Product($id_prod);
			$page_title = $product->name[$id_lang];
		}
		else if (Tools::getIsset('id_cms') && $page == 'cms')
		{
			$id_cms = Tools::getValue('id_cms');
			$cms = new CMS($id_cms);
			$page_title = $cms->meta_title[$id_lang];
		}
		else if ($page == 'module-bankwire-payment')
			$page_title = $this->getTranslator()->trans('Bank-Wire Payment', array(), 'Modules.WTPageTitle.Admin');
		else if ($page == 'module-cheque-payment')
			$page_title = $this->getTranslator()->trans('Check payment', array(), 'Modules.WTPageTitle.Admin');
		else if ($page == 'module-wtblog-category')
			$page_title = $this->getTranslator()->trans('Blog Category', array(), 'Modules.WTPageTitle.Admin');
		else if ($page == 'module-wtblog-details')
			$page_title = $this->getTranslator()->trans('Blog', array(), 'Modules.WTPageTitle.Admin');
		else
		{
			$meta = Meta::getMetaByPage($page, $id_lang);
			$page_title = $meta['title'];
			//$page_title =$this->context->smarty->tpl_vars['page_title']->value;
		}
		
        return [
            'page_title' => $page_title,
        ];
    }
	
	
}