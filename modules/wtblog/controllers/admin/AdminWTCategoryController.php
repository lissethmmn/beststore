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

class AdminWTCategoryController extends ModuleAdminController
{
	public function __construct()
	{
		$this->className = 'WTCategory';
		$this->table = 'wt_blog_category';
		$this->bootstrap = true;
		$this->lang = true;
		$this->edit = true;
		$this->delete = true;
		$this->allow_export = true;
		$this->multishop_context = -1;
		$this->multishop_context_group = true;
		parent::__construct();
		$this->fieldImageSettings = array(
			'name' => 'image',
			'dir' => _PS_MODULE_DIR_.'wtblog/views/img/media/categories/src'
		);
		$this->fields_list = array(
			'id_wt_blog_category' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'filter_key' => 'a!id_wt_blog_category',
				'width' => 20
			),
			'name' => array(
				'title' => $this->l('Name'), 
				'width' =>100
			),
			'category_parent' => array(
				'title' => $this->l('Category Parent'),
				'align' => 'center',
				'width' => 100,
				'search' => false,
				'callback' => 'getNameCategory',
			),
			'date_add' => array(
				'title' => $this->l('Date add'), 
				'maxlength' => 190, 
				'width' =>100
			),
			'position' => array(
				'title' => $this->l('Position'),
				'width' => 40,
				'filter_key' => 'sa!position',
				'align' => 'center',
				'position' => 'position'
			),
			'active' => array(
				'title' => $this->l('Displayed'),
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
		$id_shop_default = Configuration::get('PS_SHOP_DEFAULT');
		$this->_select = 'sa.position position';
		if (Shop::getContext() == Shop::CONTEXT_SHOP)
			$this->_join .= ' LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_shop` sa ON (a.`id_wt_blog_category` = sa.`id_wt_blog_category` AND sa.id_shop = '.(int)$this->context->shop->id.') ';
		else
			$this->_join .= ' LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_shop` sa ON (a.`id_wt_blog_category` = sa.`id_wt_blog_category` AND sa.id_shop = '.$id_shop_default.') ';
		if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
			unset($this->fields_list['position']);
		// we add restriction for shop
		if (Shop::getContext() == Shop::CONTEXT_SHOP && Shop::isFeatureActive())
			$this->_where = ' AND sa.`id_shop` = '.(int)Context::getContext()->shop->id;
		if (Tools::isSubmit('viewwt_blog_category'))
			$id_parent = Tools::getValue('id_wt_blog_category');
		else 
			$id_parent = 1;
		$this->_where .= ' AND a.category_parent = '.$id_parent.'';
	}
	public function renderCategoryTree($root = null, $selected_cat = array(), $input_name = 'categoryBox', $use_radio = false, $use_search = false, $disabled_categories = array(), $use_in_popup = false, $use_shop_context = false)
	{
		$translations = array(
			'selected' => $this->l('Selected'),
			'Collapse All' => $this->l('Collapse All'),
			'Expand All' => $this->l('Expand All')
		);
		if (Tools::isSubmit('id_shop'))
			$id_shop = Tools::getValue('id_shop');
		else
			if (Context::getContext()->shop->id)
				$id_shop = Context::getContext()->shop->id;
			else
				if (!Shop::isFeatureActive())
					$id_shop = Configuration::get('PS_SHOP_DEFAULT');
				else
					$id_shop = 0;
		$shop = new Shop($id_shop);
		$disabled_categories[] = 1; //home category
		if (!$root)
			$root = array('name' => 'home', 'id_category' => 1);
		if (!$use_radio)
			$input_name = $input_name.'[]';
		$this->context->controller->addCSS(_PS_JS_DIR_.'jquery/plugins/treeview-categories/jquery.treeview-categories.css');
		$this->context->controller->addJs(array(
			_PS_JS_DIR_.'jquery/plugins/treeview-categories/jquery.treeview-categories.js',
			_PS_JS_DIR_.'jquery/plugins/treeview-categories/jquery.treeview-categories.async.js',
			_PS_JS_DIR_.'jquery/plugins/treeview-categories/jquery.treeview-categories.edit.js',
			__PS_BASE_URI__.'modules/wtblog/views/js/admin/admin-categories-tree.js'));
		if ($use_search)
			$this->context->controller->addJs(_PS_JS_DIR_.'jquery/plugins/autocomplete/jquery.autocomplete.js');
		$html = '
		<script type="text/javascript">
			var inputName = \''.addcslashes($input_name, '\'').'\';'."\n";
		if (count($selected_cat) > 0)
			$html .= 'var selectedCat = "'.implode(',', $selected_cat).'";'."\n";
		else
			$html .= 'var selectedCat = \'\';'."\n";
		$html .= 'var selectedLabel = \''.$translations['selected'].'\';
			var home = \''.addcslashes($root['name'], '\'').'\';
			var use_radio = '.(int)$use_radio.';';
		if (!$use_in_popup)
			$html .= '
			$(document).ready(function(){
				buildTreeView('.$use_shop_context.');
			});';
		else
			$html .= 'buildTreeView('.$use_shop_context.');';
		$html .= '</script>';
		$html .= '
		<div class="category-filter tree-panel-heading-controls clearfix">
			<div class="tree-actions col-lg-12">
				<a href="#" id="collapse_all" class="btn btn-default"><i class="icon-collapse-alt"></i> '.$translations['Collapse All'].'</a>
				<a href="#" id="expand_all" class="btn btn-default"><i class="icon-expand-alt"></i> '.$translations['Expand All'].'</a>
			</div>
		</div>';
		$home_is_selected = false;
		foreach ($selected_cat as $cat)
		{
			if (is_array($cat))
			{
				$disabled = in_array($cat['id_category'], $disabled_categories);
				if ($cat['id_category'] != $root['id_category'])
					$html .= '<input '.($disabled?'disabled="disabled"':'').' type="hidden" name="'.$input_name.'" value="'.$cat['id_category'].'" >';
				else
					$home_is_selected = true;
			}
			else
			{
				$disabled = in_array($cat, $disabled_categories);
				if ($cat != $root['id_category'])
					$html .= '<input '.($disabled?'disabled="disabled"':'').' type="hidden" name="'.$input_name.'" value="'.$cat.'" >';
				else
					$home_is_selected = true;
			}
		}
		$root_input = '<input type="'.(!$use_radio ? 'checkbox' : 'radio').'" name="'
									.$input_name.'" value="'.$root['id_category'].'" '
									.($home_is_selected ? 'checked' : '').' onclick="clickOnCategoryBox($(this));" />
							<i class="icon-folder-close"></i>
							<span class="category_label">'
								.$root['name'].
							'</span>';
		$html .= '
			<ul id="categories-treeview" class="tree">
				<li id="'.$root['id_category'].'" class="hasChildren">
					<span class="folder">'.$root_input.' </span>
					<ul class="tree">
						<li class="tree-folder"><span class="placeholder tree-folder-name">&nbsp;</span></li>
					</ul>
				</li>
			</ul>';
		return $html;
	}
	public function renderForm()
	{
		$id = (int)Context::getContext()->shop->id;
		$html_image_des = '';
		$id_wt_blog_category = Tools::getValue('id_wt_blog_category');
		if ($id_wt_blog_category)
			$html_image_des .= $this->displayImage($id_wt_blog_category);	
		$tab_root = array('id_category' => 1, 'name' => 'Home');
		$selected_cat = array();
		if (isset($this->object->id))
			$selected_cat = array($this->object->category_parent);
		else 
			$selected_cat = array(1);
		$category_tree = '<div class="panel">'.$this->renderCategoryTree($tab_root, $selected_cat, 'category_parent', true, false, array(), false, true).'</div>';
		$this->fields_form = array(
			'tinymce' => true,
			'legend' => array(
				'title' => $this->l('WT Category Blog'),
				'icon' => 'icon-tags'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Name:'),
					'name' => 'name',
					'lang' => true,
					'size' => 48,
					'required' => true,
					'class' => 'copy2friendlyUrl',
					'hint' => $this->l('Invalid characters:').' <>;=#{}',
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Displayed:'),
					'name' => 'active',
					'required' => false,
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
					)
				),
				array(
					'type' => 'categories_select',
					'label' => $this->l('Catergory Parent:'),
					'category_tree' => $category_tree,
					'name' => 'category_parent',
					'lang' => true,
					'size' => 48
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Allow comment:'),
					'name' => 'allow_comment',
					'required' => false,
					'values' => array(
						array(
							'id' => 'allow_comment_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'allow_comment_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					)
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Description:'),
					'name' => 'description',
					'autoload_rte' => true,
					'lang' => true,
					'rows' => 10,
					'cols' => 100,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
				),
				array(
					'type' => 'file',
					'label' => $this->l('Image:'),
					'name' => 'image',
					'display_image' => true,
					'image' => $html_image_des,
					'delete_url' =>$this->context->link->getAdminLink('AdminModules', false).'&id_wt_blog_category='.$id_wt_blog_category.'&updatewt_blog_category&token='.$this->token.'&deleteimageCategory',
					'hint' => $this->l('Upload a category logo from your computer.'),
				), 
				array(
					'type' => 'text',
					'label' => $this->l('Meta title:'),
					'name' => 'meta_title',
					'lang' => true,
					'hint' => $this->l('Forbidden characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Meta description:'),
					'name' => 'meta_description',
					'lang' => true,
					'hint' => $this->l('Forbidden characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Meta keywords:'),
					'name' => 'meta_keywords',
					'lang' => true,
					'hint' => $this->l('Forbidden characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Friendly URL:'),
					'name' => 'link_rewrite',
					'lang' => true,
					'required' => true,
					'hint' => $this->l('Only letters and the minus (-) character are allowed.')
				),
			),
			'submit' => array(
				'title' => $this->l('Save')
			)
		);
		$this->tpl_form_vars['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');
		if (Shop::isFeatureActive())
			$this->fields_form['input'][] = array(
				'type' => 'shop',
				'label' => $this->l('Shop association:'),
				'name' => 'checkBoxShopAsso',
			);
		return parent::renderForm();
	}
	public function postProcess()
	{
		if (Tools::isSubmit('deleteimageCategory'))
		{
			$id = Tools::getValue('id_wt_blog_category');
			$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/categories/';
			if (file_exists($save_path.'src/'.$id.'.'.$this->imageType))
					unlink($save_path.'src/'.$id.'.'.$this->imageType);
			foreach (Shop::getShops() as $shop)
			{
				if (file_exists($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_category.'.$this->imageType))
					unlink($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_category.'.$this->imageType);
			}
		}
		return parent::postProcess();
	}
	public function displayImage($id_wt_blog_category)
	{
		if ($id_wt_blog_category)
		{
			$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/categories/src/'.$id_wt_blog_category;
			$url_path = '../modules/wtblog/views/img/media/categories/src/'.$id_wt_blog_category;
			if (file_exists($save_path.'.'.$this->imageType))
				$img = $url_path.'.'.$this->imageType;
			else
				$img = '';
			if ($img != '')
			{
				$html = '<img src="'.$img.'" alt="" title="View" width="100" />';
				return $html;
			}
		}	
	}
	public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
	{
		$alias = 'sa';
		parent::getList($id_lang, $alias.'.position', $order_way, $start, $limit, Context::getContext()->shop->id);
		$nb_items = count($this->_list);
		for ($i = 0; $i < $nb_items; $i++)
		{
			$item = &$this->_list[$i];
			$category_tree = WTCategory::getChildren((int)$item['id_wt_blog_category'], $this->context->language->id, true, $this->context->shop->id);
			if (!count($category_tree))
				$this->addRowActionSkipList('view', array($item['id_wt_blog_category']));
		}
	}
	public function imageResizeThumb($src_path, $des_path, $new_width, $new_height)
	{
		ImageManager::resize($src_path, $des_path, $new_width, $new_height);
	}
	public function generalImage($id)
	{
		if ($id)
		{
			$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/categories/src/'.$id;
			$url_path_general = _PS_MODULE_DIR_.'wtblog/views/img/media/categories/cache/'.$id;
			$src_path = $save_path.'.'.$this->imageType;
			foreach (Shop::getContextListShopID() as $id_shop)
			{
				
				$des_path = $url_path_general.'_'.$id_shop.'_category.'.$this->imageType;
				$this->imageResizeThumb($src_path, $des_path, Configuration::get('WT_IMG_CATEGORY_SIZE', null, null, $id_shop), Configuration::get('WT_IMG_CATEGORY_H_SIZE', null, null, $id_shop));
			}
			
		}	
	}
	public function postImage($id)
	{
		$result = parent::postImage($id);
		$this->generalImage($id);
		return $result;
	}
	protected function uploadImage($id, $name, $dir, $ext = false, $width = null, $height = null)
	{
		if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name']))
		{
			// Delete old image
			if (Validate::isLoadedObject($object = $this->loadObject()))
				$object->deleteImage();
			else
				return false;
			// Check image validity
			$max_size = isset($this->max_image_size) ? $this->max_image_size : 0;
			if ($error = ImageManager::validateUpload($_FILES[$name], Tools::getMaxUploadSize($max_size)))
				$this->errors[] = $error;
			$tmp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
			if (!$tmp_name)
				return false;
			if (!move_uploaded_file($_FILES[$name]['tmp_name'], $tmp_name))
				return false;
			// Evaluate the memory required to resize the image: if it's too much, you can't resize it.
			if (!ImageManager::checkImageMemoryLimit($tmp_name))
				$this->errors[] = Tools::displayError('Due to memory limit restrictions, this image cannot be loaded. Please increase your memory_limit value via your server\'s configuration settings. ');
			// Copy new image
			if (empty($this->errors) && !ImageManager::resize($tmp_name, $dir.$id.'.'.$this->imageType, (int)$width, (int)$height, ($ext ? $ext : $this->imageType)))
				$this->errors[] = Tools::displayError('An error occurred while uploading the image.');
			if (count($this->errors))
				return false;
			if ($this->afterImageUpload())
			{
				unlink($tmp_name);
				return true;
			}
			return false;
		}
		return true;
	}
	public function initContent()
	{
		parent::initContent();
	}
	public function renderList()
	{
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		$this->addRowAction('view');
		
		return parent::renderList();
	}
	public function initToolbar()
	{
		if ($this->display == 'view')
		{
			$this->toolbar_btn['new'] = array(
				'href' => $this->context->link->getAdminLink('AdminWTCategory', false).'&add'.$this->table.'&token='.$this->token,
				'desc' => $this->l('Add New')
			);
		}
		parent::initToolbar();
	}	
	public function renderView()
	{
		return $this->renderList();
	}
}