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

class AdminWTCommentController extends ModuleAdminController
{
	public function __construct()
	{
		$this->className = 'WTComment';
		$this->table = 'wt_blog_comment';
		$this->lang = true;
		$this->add = false;
		$this->bootstrap = true;
		$this->allow_export = true;
		parent::__construct();
		$this->fields_list = array(
			'id_wt_blog_comment' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'width' => 20
			),
			'title' => array(
				'title' => $this->l('Title'), 
				'width' =>100
			),
			'author_name' => array(
				'title' => $this->l('Author'), 
				'width' =>100
			),
			'content' => array(
				'title' => $this->l('Content'), 
				'maxlength' => 190, 
				'width' =>200
			),
			'date_add' => array(
				'title' => $this->l('Date comment'),
				'align' => 'center',
				'width' => 20,
				'search' => false,
			),
			'active' => array(
				'title' => $this->l('Validated'),
				'active' => 'status',
				'align' => 'center',
				'type' => 'bool',
				'width' => 70,
				'orderby' => false
			)
		);
		$this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'confirm' => $this->l('Delete selected items?')));
		
		
	}
	public function setMedia()
	{
		parent::setMedia();
		$this->addJqueryUi('ui.widget');
		$this->addJqueryPlugin('tagify');
	}
	public static function getNameCategory($category_parent)
	{
		$cat_parrent = new WTCategory($category_parent);
		return $cat_parrent->name[Configuration::get('PS_LANG_DEFAULT')];
	}
	public function init()
	{
		parent::init();
		if (Shop::getContext() == Shop::CONTEXT_SHOP && Shop::isFeatureActive())
			$this->_where = ' AND a.`id_shop` = '.Context::getContext()->shop->id;
	}
	public function renderList()
	{
		$id_lang = Context::getContext()->language->id;
		if (Tools::isSubmit('viewwt_blog_comment'))
		{
			parent::renderList();
			$id_comment = Tools::getValue('id_wt_blog_comment');
			$comment = new WTComment($id_comment);
			$html = '
			<div class="panel">
			<fieldset>
					<div class="panel-heading">'.$this->l('Detail comment ').$comment->title[$id_lang].'</div>
					<div style="margin:20px 0;">
					<label>'.$this->l('Author').'</label>
					<div>'.$comment->author_name.'</div>
					</div>
					<div style="margin:20px 0;">
					<label>'.$this->l('Email').'</label>
					<div>'.$comment->author_email.'</div>
					</div>
					<div style="margin:20px 0;">
					<label>'.$this->l('Title').'</label>
					<div>'.$comment->title[$id_lang].'</div>
					</div>
					<div style="margin:20px 0;">
					<label>'.$this->l('Content').'</label>
					<div>'.$comment->content[$id_lang].'</div>
					</div>
					</fieldset>
					<div class="panel-footer">
					<a id="desc-wt_blog_category-back" class="btn btn-default" href="'.$this->context->link->getAdminLink('AdminWTComment', false).'&token='.$this->token.'">
						<i class="process-icon-back "></i> <span>Back to list</span>
					</a>
					</div></div>
					';
			return $html;
		}
		else
		{
			$this->addRowAction('delete');
			$this->addRowAction('view');
			return '<style type="text/css">#desc-wt_blog_comment-new {display:none}</style>'.parent::renderList();
		}
	}
	public function renderView()
	{
		return $this->renderList();
	}
}