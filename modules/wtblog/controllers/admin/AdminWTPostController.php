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

class AdminWTPostController extends ModuleAdminController
{
	protected $available_tabs_lang = array();
	protected $position_identifier = 'id_wt_blog_post';
	protected $tab_display;
	protected $available_tabs = array();
	public function __construct()
	{
		$this->className = 'WTPost';
		$this->table = 'wt_blog_post';
		$this->bootstrap = true;
		$this->lang = true;
		$this->edit = true;
		$this->delete = true;
		$this->allow_export = true;
		parent::__construct();
		$this->multishop_context = -1;
		$this->multishop_context_group = true;
		$this->fieldImageSettings = array(
			'name' => 'image',
			'dir' => _PS_MODULE_DIR_.'wtblog/views/img/media/posts/src'
		);
		if (!Tools::getValue('id_wt_blog_post'))
			$this->multishop_context_group = false;
			$this->fields_list = array(
			'id_wt_blog_post' => array(
				'title' => $this->l('ID'),
				'align' => 'center',
				'width' => 20
			),
			'name' => array(
				'title' => $this->l('Title'), 
				'filter_key' => 'b!name',
				'width' =>100
			),
			'description_short' => array(
				'title' => $this->l('Description short'), 
				'maxlength' => 190, 
				'width' => 200,
				'callback' => 'getDescriptionClean',
				'orderby' => false
			),
			'id_wt_blog_category' => array(
				'title' => $this->l('Category default'),
				'align' => 'center',
				'width' => 20,
				'search' => false,
				'callback' => 'getNameCategory',
			),
			'author' => array(
				'title' => $this->l('Author'),
				'width' => 40,
				'filter_key' => 'author',
				'align' => 'center',
				'callback' => 'getNameAuthor',
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
	public function init()
	{
		parent::init();
		$this->_select = 'sa.position position';
		if (Shop::getContext() == Shop::CONTEXT_SHOP)
			$this->_join .= ' LEFT JOIN `'._DB_PREFIX_.'wt_blog_post_shop` sa ON (a.`id_wt_blog_post` = sa.`id_wt_blog_post` AND sa.id_shop = '.(int)$this->context->shop->id.') ';
		else
			$this->_join .= ' LEFT JOIN `'._DB_PREFIX_.'wt_blog_post_shop` sa ON (a.`id_wt_blog_post` = sa.`id_wt_blog_post` AND sa.id_shop = 1) ';
		if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
			unset($this->fields_list['position']);
		// we add restriction for shop
		if (Shop::getContext() == Shop::CONTEXT_SHOP && Shop::isFeatureActive())
			$this->_where = ' AND sa.`id_shop` = '.(int)Context::getContext()->shop->id;
	}
	public function postProcess()
	{
		if (!$this->redirect_after)
			parent::postProcess();
		if (Tools::isSubmit('deleteimagePost'))
		{
			$id = Tools::getValue('id_wt_blog_post');
			$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/';
			if (file_exists($save_path.'src/'.$id.'.'.$this->imageType))
					unlink($save_path.'src/'.$id.'.'.$this->imageType);
			foreach (Shop::getShops() as $shop)
			{
				if (file_exists($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_small.'.$this->imageType))
					unlink($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_small.'.$this->imageType);
				if (file_exists($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_medium.'.$this->imageType))
					unlink($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_medium.'.$this->imageType);
				if (file_exists($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_large.'.$this->imageType))
					unlink($save_path.'cache/'.$id.'_'.$shop['id_shop'].'_large.'.$this->imageType);
			}
			return;
		}
		if ($this->display == 'edit' || $this->display == 'add')
			$this->addjQueryPlugin(array(
				'autocomplete'
			));
	}
	public function displayImage($id_wt_blog_post)
	{
		$id_s = (int)Context::getContext()->shop->id;
		$id_shop = $id_s ? $id_s: Configuration::get('PS_SHOP_DEFAULT');
		if ($id_wt_blog_post)
		{
			$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/cache/'.$id_wt_blog_post.'_'.$id_shop.'_small';
			$url_path = '../modules/wtblog/views/img/media/posts/cache/'.$id_wt_blog_post.'_'.$id_shop.'_small';
			if (file_exists($save_path.'.'.$this->imageType))
				$img = $url_path.'.'.$this->imageType;
			else
				$img = '';
			if ($img != '')
			{
				$html = '<img id="image_post" src="'.$img.'" alt="" title="View" width="100" />';
				return $html;
			}
		}	
	}
	public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
	{
		$alias = 'sa';
		parent::getList($id_lang, $alias.'.position', $order_way, $start, $limit, Context::getContext()->shop->id);
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
	public function imageResizeThumb($src_path, $des_path, $new_width, $new_height)
	{
		ImageManager::resize($src_path, $des_path, $new_width, $new_height);
	}
	public function generalImage($id)
	{
		if ($id)
		{
			$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/src/'.$id;
			$url_path_general = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/cache/'.$id;
			$src_path = $save_path.'.'.$this->imageType;
			foreach (Shop::getContextListShopID() as $id_shop)
			{
				# Small image
				$des_path = $url_path_general.'_'.$id_shop.'_small.'.$this->imageType;
				$this->imageResizeThumb($src_path, $des_path, Configuration::get('WT_IMG_SMALL_SIZE', null, null, $id_shop), Configuration::get('WT_IMG_SMALL_H_SIZE', null, null, $id_shop));
				# Medium image
				$des_path = $url_path_general.'_'.$id_shop.'_medium.'.$this->imageType;
				$this->imageResizeThumb($src_path, $des_path, Configuration::get('WT_IMG_MEDIUM_SIZE', null, null, $id_shop), Configuration::get('WT_IMG_MEDIUM_H_SIZE', null, null, $id_shop));
				# Large image
				$des_path = $url_path_general.'_'.$id_shop.'_large.'.$this->imageType;
				$this->imageResizeThumb($src_path, $des_path, Configuration::get('WT_IMG_LARGE_SIZE', null, null, $id_shop), Configuration::get('WT_IMG_LARGE_H_SIZE', null, null, $id_shop));
			}
		}	
	}
	public function postImage($id)
	{
		$result = parent::postImage($id);
		$this->generalImage($id);
		return $result;
	}
	
	public function renderCategoryTree($root = null, $selected_cat = array(), $input_name = 'categoryBox', $use_radio = false, $use_search = false, $disabled_categories = array(), $use_in_popup = false, $use_shop_context = false)
	{
		$translations = array(
			'selected' => $this->l('Selected'),
			'Collapse All' => $this->l('Collapse All'),
			'Expand All' => $this->l('Expand All'),
			'Check All' => $this->l('Check All'),
			'Uncheck All'  => $this->l('Uncheck All'),
			'search' => $this->l('Find a category')
		);

		//$top_category = Category::getTopCategory();
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
		<div class="col-lg-12">
			<a href="#" id="collapse_all" class="btn btn-default">'.$translations['Collapse All'].'</a>
			<a href="#" id="expand_all" class="btn btn-default">'.$translations['Expand All'].'</a>
			'.(!$use_radio ? '
				<a href="#" id="check_all" class="btn btn-default">'.$translations['Check All'].'</a>
				<a href="#" id="uncheck_all" class="btn btn-default">'.$translations['Uncheck All'].'</a>' : '')
		.'</div></div>';
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
	public function setMedia()
	{
		parent::setMedia();
		$this->addJqueryPlugin('tagify');
	}
	public static function getProductsLight($id_lang, $id_products, Context $context = null)
	{
		if (!$context)
			$context = Context::getContext();
		if ($id_products == '')	
			return;
		$sql = 'SELECT p.`id_product`, p.`reference`, pl.`name`
				FROM  `'._DB_PREFIX_.'product` p
				'.Shop::addSqlAssociation('product', 'p').'
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (
					p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').'
				)
				WHERE p.`id_product` IN ('.$id_products.')';

		return Db::getInstance()->executeS($sql);
	}
	public function renderForm()
	{
		$this->addJS(array(
				__PS_BASE_URI__.'modules/wtblog/views/js/admin/wtautopost.js'
		));
		$id_lang = $this->context->language->id;
		$id = $this->context->shop->id;
		$id_shop = $id ? $id: Configuration::get('PS_SHOP_DEFAULT');
		$html_image_des = '';
		$objCate = new WTCategory();
		$temp = Employee::getEmployees();
		$employees = array();
		foreach ($temp as $employee)
		{
			$employee['fullname'] = $employee['firstname'].' '.$employee['lastname'];
			$employee['id_select'] = $employee['id_employee'];
			$employees[] = $employee;
		}
		$id_wt_blog_post = Tools::getValue('id_wt_blog_post');
		if ($id_wt_blog_post)
			$html_image_des .= $this->displayImage($id_wt_blog_post);
		/*get data auto post + product*/
		$string_name = '';
		$string_name_post = '';
		$array_id_post = explode('-', $this->object->id_related_posts); 
		$array_name_post = explode('¤', $this->object->name_related_posts);
		foreach ($array_id_post as $k => $id_post)
			if ($id_post !== end($array_id_post))
				$string_name_post .= '<div class="form-control-static"><button type="button" class="delPosts btn btn-default" name="'.$id_post.'"><i class="icon-remove text-danger"></i></button>&nbsp;'.$array_name_post[$k].'</div>';
		$tab_root = array('id_category' => 1, 'name' => 'Home');
		$selected_cat = array();
		if (isset($this->object->id))
		{
			$categoriesSelected = WTCategory::getCategoriesSelected($this->object->id);
			foreach ($categoriesSelected as $k => $cat)
				foreach ($cat as $id)
					$selected_cat[$k] = $id;
		}
		$category_tree = '<div class="panel">'.$this->renderCategoryTree($tab_root, $selected_cat, 'categoryBox', false, false, array(), false, true).'</div>';
		$this->fields_form = array(
			'tinymce' => true,
			'legend' => array(
				'title' => $this->l('WT Post Blog'),
				'icon' => 'icon-tags'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Title:'),
					'name' => 'name',
					'lang' => true,
					'size' => 48,
					'required' => true,
					'class' => 'copy2friendlyUrl',
					'hint' => $this->l('Invalid characters:').' <>;=#{}',
				),
				array(
					'type' => 'categories_select',
					'label' => $this->l('Categories:'),
					'name' => 'categories',
					'category_tree' => $category_tree,
					'lang' => true,
					'size' => 48
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
					'type' => 'textarea',
					'label' => $this->l('Description short:'),
					'name' => 'description_short',
					'lang' => true,
					'autoload_rte' => true,
					'rows' => 10,
					'cols' => 100,
					'hint' => $this->l('Invalid characters:').' <>;=#{}'
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
					'type' => 'select',
					'label' => $this->l('Author :'),
					'name' => 'author',
					'required' => false,
					'options' => array(
						'query' => $employees,
						'id' => 'id_select',
						'name' => 'fullname'
					)
				),
				array(
					'type' => 'file',
					'label' => $this->l('Image:'),
					'name' => 'image',
					'display_image' => true,
					'image' =>  $html_image_des,
					'delete_url' => $this->context->link->getAdminLink('AdminWTPost', false).'&id_wt_blog_post='.$id_wt_blog_post.'&updatewt_blog_post&token='.$this->token.'&deleteimagePost',
					'hint' => $this->l('Upload a category logo from your computer.'),
				), 
				array(
					'type' => 'text',
					'label' => $this->l('Related Posts:'),
					'name' => 'related_posts',
					'id_related_posts' => $this->object->id_related_posts,
					'name_related_posts' => $this->object->name_related_posts,
					'string_name_post' => $string_name_post,
					'desc' => $this->l('Begin typing the first letters of the product name, then select the product from the drop-down list.')
				),
				array(
					'type' => 'text',
					'label' => $this->l('Tags:'),
					'name' => 'id_wt_blog_tags',
					'post' => $this->object,
					'lang' => true,
					'size' => 48
				),
				array(
					'type' => 'text',
					'label' => $this->l('Meta title:'),
					'name' => 'meta_title',
					'lang' => true,
					'size' => 48,
					'desc' => $this->l('Post page title: Leave blank to use the post name'),
					'hint' => $this->l('Forbidden characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Meta description:'),
					'name' => 'meta_description',
					'lang' => true,
					'size' => 48,
					'desc' => $this->l('A single sentence for the HTML header is needed.'),
					'hint' => $this->l('Forbidden characters:').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Meta keywords:'),
					'name' => 'meta_keywords',
					'lang' => true,
					'size' => 48,
					'hint' => $this->l('Forbidden characters:').' <>;=#{}',
					'desc' => $this->l('Keywords for HTML header, separated by commas.')
				),
				array(
					'type' => 'text',
					'label' => $this->l('Friendly URL:'),
					'name' => 'link_rewrite',
					'lang' => true,
					'size' => 48,
					'required' => true,
					'hint' => $this->l('Only letters and the minus (-) character are allowed.'),
					'desc' => $this->l('Friendly URL for this post')
				),
			),
			'submit' => array(
				'title' => $this->l('Save')
			)
		);
		$this->tpl_form_vars['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL', null, null, $id_shop);
		if (Shop::isFeatureActive())
			$this->fields_form['input'][] = array(
				'type' => 'shop',
				'label' => $this->l('Shop association:'),
				'name' => 'checkBoxShopAsso',
			);
		return parent::renderForm();
	}
	public function renderList()
	{
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		return parent::renderList();
	}
	/*function callback*/
	public static function getDescriptionClean($description)
	{
		return mb_substr(strip_tags(Tools::stripslashes($description)), 0, 130);
	}
	public static function getNameCategory($id_category)
	{
		$cat_parrent = new WTCategory($id_category);
		return $cat_parrent->name[Configuration::get('PS_LANG_DEFAULT')];
	}
	public static function getNameAuthor($id_author)
	{
		$employee = new Employee($id_author);
		return $employee->lastname.' '.$employee->firstname; 
	}
	public function processAdd()
	{
		if (!Tools::getIsset('categoryBox'))
			$this->errors[] = Tools::displayError('Category empty.');
		if (parent::processAdd())
			$this->updateTags(Language::getLanguages(false), $this->object);
	}
	public function afterUpdate($object)
	{
		if (!Tools::getIsset('categoryBox'))
			$this->errors[] = Tools::displayError('Category empty.');
		parent::afterUpdate($object);
		$this->updateTags(Language::getLanguages(false), $object);
	}
	public function updateTags($languages, $post)
	{
		$tag_success = true;
		/* Reset all tags for THIS post */
		if (!WTTag::deleteTagsForPost($post->id))
			$this->errors[] = Tools::displayError('An error occurred while attempting to delete previous tags.');
		/* Assign tags to this product */
		foreach ($languages as $language)
			if ($value = Tools::getValue('id_wt_blog_tags_'.$language['id_lang']))
				$tag_success &= WTTag::addTags($language['id_lang'], (int)$post->id, $value);
		if (!$tag_success)
			$this->errors[] = Tools::displayError('An error occurred while adding tags.');
		return $tag_success;
	}
}