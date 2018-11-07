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

class AdminWTTagsController extends ModuleAdminController
{
	public function __construct()
	{
		$this->table = 'wt_blog_tag';
		$this->className = 'WTTag';
		$this->bootstrap = true;
		parent::__construct();
		$this->fields_list = array(
			'id_wt_blog_tag' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'width' => 25,
			),
			'lang' => array(
				'title' => $this->l('Language'),
				'filter_key' => 'l!name'
			),
			'name' => array(
				'title' => $this->l('Name'),
				'width' => 200,
				'filter_key' => 'a!name'
			),
			'posts' => array(
				'title' => $this->l('Post:'),
				'align' => 'center',
				'havingFilter' => true
			)
		);
		$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		
	}
	public function renderList()
	{
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->_select = 'l.name as lang, COUNT(pt.id_wt_blog_post) as posts';
		$this->_join = '
			LEFT JOIN `'._DB_PREFIX_.'wt_blog_post_tag` pt
				ON (a.`id_wt_blog_tag` = pt.`id_wt_blog_tag`)
			LEFT JOIN `'._DB_PREFIX_.'lang` l
				ON (l.`id_lang` = a.`id_lang`)';
		$this->_group = 'GROUP BY a.name, a.id_lang';
		return parent::renderList();
	}
	public function postProcess()
	{
		$sub_tab = Tools::getValue('submitAdd'.$this->table);
		if ($this->tabAccess['edit'] === '1' && $sub_tab)
		{
			$ide = (int)Tools::getValue($this->identifier);
			if (($id = $ide) && ($obj = new $this->className($id)) && Validate::isLoadedObject($obj))
				$obj->setPosts(Tools::getValue('posts'));
		}
		return parent::postProcess();
	}
	public function renderForm()
	{
		if (!($obj = $this->loadObject(true)))
			return;
		$this->fields_form = array(
			'legend' => array(
				'title' => $this->l('Blog Tag')
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Name:'),
					'name' => 'name',
					'required' => true
				),
				array(
					'type' => 'select',
					'label' => $this->l('Language:'),
					'name' => 'id_lang',
					'required' => true,
					'options' => array(
						'query' => Language::getLanguages(false),
						'id' => 'id_lang',
						'name' => 'name'
					)
				),
			),
			'selects' => array(
				'products' => $obj->getPosts(true),
				'products_unselected' => $obj->getPosts(false)
			),
			'submit' => array(
				'title' => $this->l('Save'),
			)
		);
		return parent::renderForm();
	}
}


