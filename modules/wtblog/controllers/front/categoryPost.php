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

include_once(dirname(__FILE__).'/../../classes/WTPost.php');
require_once (dirname(__FILE__).'/../../url/WTLink.php');

	
class WTBlogCategoryPostModuleFrontController extends ModuleFrontController
{
	protected $_leng_default = 10;
	protected $id_wt_blog_category;
	protected $WTLink;
	protected $imageType;
	public $display_column_left = false;
	
	public function initContent()
	{
		parent::initContent();
		$this->imageType = 'jpg';
		$this->id_wt_blog_category = Tools::getValue('id_wt_blog_category');
		$this->context->smarty->assign($this->getBlogCategoryMetas($this->id_wt_blog_category, $this->context->language->id, $this->context->shop->id));
		$this->WTLink = new WTLink();
		$this->_display();
		
		
		$this->setTemplate('module:wtblog/views/templates/front/category.tpl');
	}

	public function _display()
	{
		$id_shop = Context::getContext()->shop->id;
		$id_lang = Context::getContext()->language->id;	
		/*get config*/
		
		//$pipe = Configuration::get('PS_NAVIGATION_PIPE');
		//if (empty($pipe))
			$pipe = ' / ';
		if ($this->id_wt_blog_category != null) //diff view all
		{
			$wt_blog_category = $this->getCategoryById($this->id_wt_blog_category, $id_shop, $id_lang);
			
			$path = '<a href='.$this->context->link->getModuleLink('wtblog', 'categoryPost').'>'.$this->module->l('Blog').'</a><span class="navigation-pipe">'.$pipe.'</span>';
			//breadcrumb
			$cat = new WTCategory($this->id_wt_blog_category);
			$result = $cat->getParentsCategories($this->id_wt_blog_category, $id_lang, $id_shop);
			$path .= $this->WTLink->getPath($result, $cat->name[$id_lang]);
		}
		else
		{
			
			$path = $this->module->l('Blog');
			$wt_blog_category = null;
		}
		$this->context->smarty->assign('path', $path);
		$url_rewrite = Configuration::get('PS_REWRITING_SETTINGS');
		$this->context->smarty->assign('url_rewrite', $url_rewrite);
		$page = Tools::getValue('p');
		if ($page == null)
			$page = 0;
		$wt_post_list = $this->getPostes($page, $id_lang, $id_shop);
		
		if ($wt_post_list != null)
		{
			$wt_postes_empty = 0;
		}
		else
			$wt_postes_empty = 1;
		/*sort post*/
		$this->context->smarty->assign('pl_orderby', (Tools::getValue('orderby') ? Tools::getValue('orderby') : 'post_date_create'));
		$this->context->smarty->assign('pl_orderway', (Tools::getValue('orderway') ? Tools::getValue('orderway') : 'DESC'));
		$sql = 'SELECT * FROM '._DB_PREFIX_.'wt_blog_post a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_lang b ON (a.id_wt_blog_post= b.id_wt_blog_post AND b.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop c ON (a.id_wt_blog_post= c.id_wt_blog_post AND c.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_post d ON (a.id_wt_blog_post= d.id_wt_blog_post)
				WHERE 1'.($this->id_wt_blog_category != null ? ' AND d.id_wt_blog_category='.$this->id_wt_blog_category : ' ANd d.id_wt_blog_category=1').' AND (c.active=1) AND (b.id_lang='.$id_lang.')
				';
		$count = count(Db::getInstance()->ExecuteS($sql));
		
		$this->_pagination($count, $id_shop);
		
		

		$this->context->smarty->assign(array(
			'_MODULE_DIR_' => _MODULE_DIR_,
			'WTLink' => $this->WTLink,
			'_MODULE_DIR_' => _MODULE_DIR_,
			'count_blog' => $count,
			'wt_postes_empty' => $wt_postes_empty,
			'wt_post_list' => $wt_post_list,
			'wt_b_summary_character_count' => Configuration::get('WT_B_SUMMARY_CHARACTER_COUNT', null, null, $id_shop),
			'wt_imep_list_show' => Configuration::get('WT_IMEP_LIST_SHOW', null, null, $id_shop),
			'wt_posts_per_page' => Configuration::get('WT_POSTS_PER_PAGE', null, null, $id_shop),
			'wt_allow_category_image' => Configuration::get('WT_ALLOW_CATEGORY_IMAGE', null, null, $id_shop),
			'wt_allow_category_description' => Configuration::get('WT_ALLOW_CATEGORY_DESCRIPTION', null, null, $id_shop),
			 'wt_blog_category' => $wt_blog_category,
			'this_path' => $this->module->getPathUri(),
			'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
		));
	}
	public function _pagination($nbProducts = 10, $id_shop = null)
	{
		if (!self::$initialized)
			$this->init();
		elseif (!$this->context)
			$this->context = Context::getContext();
		$nArray = (int)Configuration::get('WT_POSTS_PER_PAGE', null, null, $id_shop) != 10 ? array((int)Configuration::get('WT_POSTS_PER_PAGE', null, null, $id_shop), 10, 20, 50) : array(10, 20, 50);
		// Clean duplicate values
		$nArray = array_unique($nArray);
		asort($nArray);
		$this->n = abs((int)(Tools::getValue('n', ((isset($this->context->cookie->nb_item_per_page) && $this->context->cookie->nb_item_per_page >= 10) ? $this->context->cookie->nb_item_per_page : (int)Configuration::get('WT_POSTS_PER_PAGE', null, null, $id_shop)))));
		$this->p = abs((int)Tools::getValue('p', 1));
		if (!is_numeric(Tools::getValue('p', 1)) || Tools::getValue('p', 1) < 0)
			Tools::redirect(self::$this->context->link->getPaginationLink(false, false, $this->n, false, 1, false));
		$current_url = tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']);
		//delete parameter page
		$current_url = preg_replace('/(\?)?(&amp;)?p=\d+/', '$1', $current_url);
		$range = 2; /* how many pages around page selected */
		if ($this->p < 0)
			$this->p = 0;
		if (isset($this->context->cookie->nb_item_per_page) && $this->n != $this->context->cookie->nb_item_per_page && in_array($this->n, $nArray))
			$this->context->cookie->nb_item_per_page = $this->n;
		$pages_nb = ceil($nbProducts / (int)$this->n);
		if ($this->p > $pages_nb && $nbProducts <> 0)
			Tools::redirect(self::$this->context->link->getPaginationLink(false, false, $this->n, false, $pages_nb, false));
		$start = (int)($this->p - $range);
		if ($start < 1)
			$start = 1;
		$stop = (int)($this->p + $range);
		if ($stop > $pages_nb)
			$stop = (int)$pages_nb;
		$this->context->smarty->assign('nb_products', $nbProducts);
		$pagination_infos = array(
			'products_per_page' => (int)Configuration::get('PS_PRODUCTS_PER_PAGE', null, null, $id_shop),
			'pages_nb' => $pages_nb,
			'p' => $this->p,
			'n' => $this->n,
			'nArray' => $nArray,
			'range' => $range,
			'start' => $start,
			'stop' => $stop,
			'current_url' => $current_url
		);
		$this->context->smarty->assign($pagination_infos);
	}
	public function getPostes($page = 0, $id_lang = null, $id_shop = null)
	{
		$leng = (Tools::getValue('n') ? Tools::getValue('n') : Configuration::get('WT_POSTS_PER_PAGE', null, null, $id_shop));
		$start = $leng * ($page == 0 ? 0 : $page - 1);
		$end = $leng;
		$orderby = (Tools::getValue('orderby') ? Tools::getValue('orderby') : 'date_add');
		$orderway = (Tools::getValue('orderway') ? Tools::getValue('orderway') : 'DESC');
		$sql = 'SELECT a.*, b.*, d.id_wt_blog_category as category_parent FROM '._DB_PREFIX_.'wt_blog_post a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_lang b
				ON (a.id_wt_blog_post= b.id_wt_blog_post AND b.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop c
				ON (a.id_wt_blog_post= c.id_wt_blog_post)
				LEFT JOIN '._DB_PREFIX_.'wt_blog_category_post d
				ON (a.id_wt_blog_post= d.id_wt_blog_post)
				WHERE a.active = 1 AND b.id_lang = '.$id_lang.' AND c.id_shop = '.$id_shop.' '.($this->id_wt_blog_category != null ? ' AND d.id_wt_blog_category='.$this->id_wt_blog_category : 'AND d.id_wt_blog_category=1').'
				ORDER BY '.($orderby == 'date_add' ? 'a.' : 'b.').$orderby.' '.$orderway.'
				LIMIT '.$start.','.$end.'
				';
		$posts = Db::getInstance()->ExecuteS($sql);
		$posts_new = array();
		foreach ($posts as $post)
		{
			$author = new Employee($post['author']);
			$post['author'] = $author->firstname.' '.$author->lastname;
			$postObj = new WTPost($post['id_wt_blog_post']);
			$post['date_add_no_format'] = $post['date_add'];
			$post['date_add'] = $postObj->formatDateAdd($post['date_add']);
			$post['count_comment'] = $postObj->getCountComment($id_lang, $id_shop);
			$post['link'] = $this->WTLink->getLinkPostDetail($post['id_wt_blog_post'], $post['link_rewrite'], $post['category_parent']);
			$imep = 'medium';
			if ($imep != 'none')
			{
					$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/src/'.$post['id_wt_blog_post'];
					$url_path = __PS_BASE_URI__.'modules/wtblog/views/img/media/posts/cache/'.$post['id_wt_blog_post'].'_'.$id_shop;
					if (file_exists($save_path.'.'.$this->imageType))
						$post['image'] = $url_path.'_'.$imep.'.'.$this->imageType;
					else
						$post['image'] = __PS_BASE_URI__.'modules/wtblog/views/img/media/posts/cache/no_image'.'_'.$imep.'.'.$this->imageType;
			}
			$posts_new[] = $post;
		}
		return $posts_new;
	}
	public function getCategoryById($id_wt_blog_category, $id_shop = null, $id_lang = null)
	{
		$cat = Db::getInstance()->getRow('
			SELECT * FROM '._DB_PREFIX_.'wt_blog_category c
			LEFT JOIN '._DB_PREFIX_.'wt_blog_category_lang cl ON (c.id_wt_blog_category = cl.id_wt_blog_category AND cl.id_lang = '.$id_lang.')
			LEFT JOIN '._DB_PREFIX_.'wt_blog_category_shop cs ON (c.id_wt_blog_category = cs.id_wt_blog_category AND cl.id_shop = '.$id_shop.')
			WHERE  cl.id_lang='.$id_lang.' AND cs.id_shop='.$id_shop.' AND c.id_wt_blog_category='.$id_wt_blog_category.'');
		if ($id_wt_blog_category)
		{
			$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/categories/src/'.$id_wt_blog_category;
			$url_path = __PS_BASE_URI__.'modules/wtblog/views/img/media/categories/cache/'.$id_wt_blog_category.'_'.$id_shop;
			if (file_exists($save_path.'.jpg'))
				$ext = '.jpg';
			else
				$ext = '';
			if ($ext != '')
				$cat['image'] = $url_path.'_category'.$ext;
		}
		return $cat;
	}
	public function getBlogCategoryMetas($id_wt_blog_category, $id_lang = null, $id_shop = null)
	{
		$sql = 'SELECT `name`, `meta_title`, `meta_description`, `meta_keywords`, bl.`description`
				FROM `'._DB_PREFIX_.'wt_blog_category` b
				LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_lang` bl ON (b.`id_wt_blog_category` = bl.`id_wt_blog_category` AND bl.id_shop = '.$id_shop.')
				LEFT JOIN `'._DB_PREFIX_.'wt_blog_category_shop` bs ON (b.`id_wt_blog_category` = bs.`id_wt_blog_category`)
				WHERE bl.id_lang = '.(int)$id_lang.' AND bs.id_shop = '.(int)$id_shop.'
					AND bl.id_wt_blog_category = '.(int)$id_wt_blog_category.'
					AND b.active = 1';
		if ($row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql))
		{
			if (empty($row['meta_description']))
				$row['meta_description'] = strip_tags($row['description']);
			if (!empty($row['meta_title']))
				$row['meta_title'] = $row['meta_title'].' - '.Configuration::get('PS_SHOP_NAME');
			else
				$row['meta_title'] = $row['name'].' - '.Configuration::get('PS_SHOP_NAME');
		}
		else
			$row = array('meta_title'=>'Blog - '.Configuration::get('PS_SHOP_NAME').'');
		return $row;
	}
}