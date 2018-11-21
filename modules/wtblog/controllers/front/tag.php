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
include_once(dirname(__FILE__).'/../../classes/WTTag.php');
class WtBlogTagModuleFrontController extends ModuleFrontController
{
	protected $id_wt_blog_tag;
	protected $WTLink;
	private $imageType;
	public function init()
	{
		$this->imageType = 'jpg';
		parent::init();
	}
	public function initContent()
	{
		parent::initContent();
		$this->id_wt_blog_tag = Tools::getValue('id_wt_blog_tag');
		$this->WTLink = new WTLink();
		$this->_display();
		$this->setTemplate('module:wtblog/views/templates/front/tag.tpl');
	}
	public function _display()
	{
		$id_shop = Context::getContext()->shop->id;
		$id_lang = Context::getContext()->language->id;	
		/*get config*/
		$this->context->smarty->assign('wt_b_summary_character_count', Configuration::get('WT_B_SUMMARY_CHARACTER_COUNT', null, null, $id_shop));
		$this->context->smarty->assign('wt_imep_list_show', Configuration::get('WT_IMEP_LIST_SHOW', null, null, $id_shop));
		$this->context->smarty->assign('wt_posts_per_page', Configuration::get('WT_POSTS_PER_PAGE', null, null, $id_shop));
		$this->context->smarty->assign('wt_allow_category_image', Configuration::get('WT_ALLOW_CATEGORY_IMAGE', null, null, $id_shop));
		$this->context->smarty->assign('wt_allow_category_description', Configuration::get('WT_ALLOW_CATEGORY_DESCRIPTION', null, null, $id_shop));
		/*get blog_tag*/
		$wt_blog_tag = new WTTag($this->id_wt_blog_tag);
		$this->context->smarty->assign('meta_title', $wt_blog_tag->name.'_'.Configuration::get('PS_SHOP_NAME'));
		$this->context->smarty->assign('wt_blog_tag', $wt_blog_tag);
		//$pipe = Configuration::get('PS_NAVIGATION_PIPE');
		//if (empty($pipe))
			$pipe = ' / ';
		$path = '<a href='.$this->context->link->getModuleLink('wtblog', 'category').'>'.$this->module->l('Blog').'</a><span classes/="navigation-pipe">'.$pipe.'</span>'.$wt_blog_tag->name;
		$this->context->smarty->assign('path', $path);
		/*get post list*/
		$page = Tools::getValue('p');
		if ($page == null)
			$page = 0;
		$wt_post_list = $this->getPostes($page, $id_lang, $id_shop);
		if ($wt_post_list != null)
		{
			$this->context->smarty->assign('wt_postes_empty', 0);
			$this->context->smarty->assign('wt_post_list', $wt_post_list);
		}
		else
			$this->context->smarty->assign('wt_postes_empty', 1);
		/*sort post*/
		$this->context->smarty->assign('pl_orderby', (Tools::getValue('orderby') ? Tools::getValue('orderby') : 'post_date_create'));
		$this->context->smarty->assign('pl_orderway', (Tools::getValue('orderway') ? Tools::getValue('orderway') : 'DESC'));
		$sql = 'SELECT a.*, b.* FROM '._DB_PREFIX_.'wt_blog_post a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_lang b
				ON (a.id_wt_blog_post= b.id_wt_blog_post AND b.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop c
				ON (a.id_wt_blog_post= c.id_wt_blog_post)
				LEFt JOIN '._DB_PREFIX_.'wt_blog_post_tag pt ON (pt.id_wt_blog_post = a.id_wt_blog_post)
				WHERE a.active = 1 AND b.id_lang = '.$id_lang.' AND c.id_shop = '.$id_shop.' AND pt.id_wt_blog_tag = '.$this->id_wt_blog_tag.'';
		$count = count(Db::getInstance()->ExecuteS($sql));
		$this->_pagination($count, $id_shop);
		/* load javascript, css */
		$this->context->smarty->assign('_MODULE_DIR_', _MODULE_DIR_);
		/* -load javascript, css */
		$this->context->smarty->assign('WTLink', $this->WTLink);
		$this->context->smarty->assign('count', $count);
		$url_rewrite = Configuration::get('PS_REWRITING_SETTINGS');
		$this->context->smarty->assign('url_rewrite', $url_rewrite);
	}
	public function getPostes($page = 0, $id_lang = null, $id_shop = null)
	{
		$leng = (Tools::getValue('n') ? Tools::getValue('n') : Configuration::get('WT_POSTS_PER_PAGE', null, null, $id_shop));
		$start = $leng * ($page == 0 ? 0 : $page - 1);
		$end = $leng;
		$orderby = (Tools::getValue('orderby') ? Tools::getValue('orderby') : 'date_add');
		$orderway = (Tools::getValue('orderway') ? Tools::getValue('orderway') : 'DESC');
		$sql = 'SELECT a.*, b.* FROM '._DB_PREFIX_.'wt_blog_post a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_lang b
				ON (a.id_wt_blog_post= b.id_wt_blog_post AND b.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop c
				ON (a.id_wt_blog_post= c.id_wt_blog_post)
				LEFt JOIN '._DB_PREFIX_.'wt_blog_post_tag pt ON (pt.id_wt_blog_post = a.id_wt_blog_post)
				WHERE a.active = 1 AND b.id_lang = '.$id_lang.' AND c.id_shop = '.$id_shop.' AND pt.id_wt_blog_tag = '.$this->id_wt_blog_tag.'
				ORDER BY '.($orderby == 'date_add' ? 'a.' : 'b.').$orderby.' '.$orderway.'
				LIMIT '.$start.','.$end.'
				';
		$posts = Db::getInstance()->ExecuteS($sql);
		$posts_new = array();
		foreach ($posts as $post)
		{
			$postObj = new WTPost($post['id_wt_blog_post']);
			$post['date_add_no_format'] = $post['date_add'];
			$post['date_add'] = $postObj->formatDateAdd($post['date_add']);
			$author = new Employee($post['author']);
			$post['author'] = $author->firstname.' '.$author->lastname;
			$post['count_comment'] = $postObj->getCountComment($id_lang, $id_shop);
			$post['link'] = $this->WTLink->getLinkPostDetail($post['id_wt_blog_post'], $post['link_rewrite'], $post['id_wt_blog_category']);
			$imep = 'medium';
			if ($imep != 'none')
			{
				$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/src/'.$post['id_wt_blog_post'];
				$url_path = __PS_BASE_URI__.'modules/wtblog/views/img/media/posts/cache/'.$post['id_wt_blog_post'];
				if (file_exists($save_path.'.'.$this->imageType))
					$post['image'] = $url_path.'_'.$id_shop.'_'.$imep.'.'.$this->imageType;
				else
					$post['image'] = __PS_BASE_URI__.'modules/wtblog/views/img/media/posts/cache/no_image'.'_'.$imep.'.'.$this->imageType;
			}
			$posts_new[] = $post;
		}
		return $posts_new;
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
}