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

class WTBlogPostModuleFrontController extends ModuleFrontController
{
	private $blog_post;
	private $WTLink;
	private $wtTag;
	protected $imageType;
	public function __construct()
	{
		parent::__construct();

		$this->context = Context::getContext();
	}
	public function init()
	{
		$this->imageType = 'jpg';
		parent::init();
		$this->context->smarty->assign($this->getMetaTags($this->context->language->id, $this->context->shop->id));
	}
	public function initContent()
	{
		$this->WTLink = new WTLink();
		$this->wtTag = new WTTag();
		$this->id_wt_blog_post = Tools::getValue('id_wt_blog_post');
		parent::initContent();
		$this->_display();
		
		$this->setTemplate('module:wtblog/views/templates/front/post.tpl');
	}
	public function _display()
	{
		$id_lang = $this->context->language->id;
		$id_shop = $this->context->shop->id;
		/*get content detail post*/
		$image_size = 'large';
		$post = $this->getPostById($image_size, $this->id_wt_blog_post, $id_lang, $id_shop);
		$this->context->smarty->assign('WTLink', $this->WTLink); 
		$this->context->smarty->assign('capchatpath', __PS_BASE_URI__.'modules/wtblog/'); 
		$this->context->smarty->assign('this_path_ssl', Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/');
		$this->context->smarty->assign('wt_b_summary_character_count', Configuration::get('WT_B_SUMMARY_CHARACTER_COUNT')); 
		$link_main = Configuration::get('WT_MAIN_BLOG_URL');
		if ($post != null)
		{
			/*post*/
			$this->context->smarty->assign('post', $post);
			//breadcurm
			//$pipe = Configuration::get('PS_NAVIGATION_PIPE');
			//if (empty($pipe))
				$pipe = ' / ';
			$path = '<a href='.$main_blog_url = $this->WTLink->getMainBlogUrl($link_main).'>'.$this->module->l('Blog').'</a><span class="navigation-pipe">'.$pipe.'</span>';
			$id_category = Tools::getValue('category_parent');
			$cat = new WTCategory($id_category);
			$result = $cat->getParentsCategories($cat->id_wt_blog_category, $id_lang, $id_shop);
			$varPath = '<a href="'.$this->WTLink->getCategoryPostLink($cat->id_wt_blog_category, $cat->link_rewrite[$id_lang]).'">'.$cat->name[$id_lang].'</a><span class="navigation-pipe">'.$pipe.'</span>';
			$path .= $this->WTLink->getPath($result, $varPath.$post['name']);
			$this->context->smarty->assign('path', $path);
			/*tag*/
			
			$tags = $this->wtTag->getTagsForTag($this->id_wt_blog_post);
			$this->context->smarty->assign('wttags', $tags);
			
			/*related post*/
			$id_related_posts = explode('-', $post['id_related_posts']);
			$related_posts = array();
			$image_size_related_post = 'small';
			foreach ($id_related_posts as $k => $id)
			{
				if ($id !== end($id_related_posts) && $k < 5)
				{
					$item = $this->getPostById($image_size_related_post, $id, $id_lang, $id_shop);
					$related_posts[$k] = $item;
				}
			}
			$this->context->smarty->assign('related_posts', $related_posts);
			/*comment*/
			$url_rewrite = Configuration::get('PS_REWRITING_SETTINGS');
			$this->context->smarty->assign('url_rewrite', $url_rewrite);
		
			$this->context->smarty->assign('id_shop', $id_shop);
			$postObj = new WTPost($this->id_wt_blog_post, $id_lang, $id_shop);
			$nb = Configuration::get('WT_NUMBER_COMMENT_DETAIL');
			if (Tools::issubmit('viewall'))
			{
				$viewall = true;
				$this->context->smarty->assign('viewall', $viewall);
			}
			else
				$viewall = false;
			$temps = $postObj->getCommentForPost($id_lang, $id_shop, $nb, $viewall);
			$comments = array();
			foreach ($temps as $comment)
			{
				$comment['date_add'] = $postObj->formatDateAdd($comment['date_add']);
				$comments[] = $comment;
			}
			$count_comment = $postObj->getCountComment($id_lang, $id_shop);
			$this->context->smarty->assign('count_comment_total', $count_comment);
			$this->context->smarty->assign('count_comment_show', $nb);
			$this->context->smarty->assign('comments', $comments);
			$category_allow_comment = Db::getInstance()->getValue('
			SELECT allow_comment
			FROM '._DB_PREFIX_.'wt_blog_category
			WHERE id_wt_blog_category='.$post['id_wt_blog_category'].'
			');
			$post_allow_comment = $post['allow_comment'];
			if ($category_allow_comment && $post_allow_comment && $this->allowComment($id_shop)) 
			{
				$using_captcha = Configuration::get('WT_DISPLAY_CAPTCHA');
				$validate_comment = Configuration::get('WT_COMMENTS_VALIDATE');
				$this->context->smarty->assign('using_captcha', $using_captcha);
				$this->context->smarty->assign('validate_comment', $validate_comment);
				$this->context->smarty->assign('display_form_comment', 1);
				/* msg error comment */
				if (Tools::getValue('submitcomment') == 'true')
				{
					$error = $this->ProcessSubmit();
					if (is_array($error))
						$this->context->smarty->assign('error', $error);
					else
						Tools::redirect($this->WTLink->getLinkPostDetail($post['id_wt_blog_post'], $post['link_rewrite'], $post['id_wt_blog_category']).($url_rewrite == 1 ? '?' : '&').'sb');
				}
				if (Tools::issubmit('sb'))
					$this->context->smarty->assign('success', true);
			}
			else
				$this->context->smarty->assign('display_form_comment', 0);
			$this->context->smarty->assign('wt_imipd_show', Configuration::get('WT_IMIPD_SHOW'));
		}
		else 
			$this->context->smarty->assign('errorposts', 1);
	}
	public function ProcessSubmit()
	{
		if (Tools::getValue('submitcomment') == 'true')
		{
			$comment = new WTComment(Tools::getValue('id_wt_blog_comment'));
			$comment->copyFromPost();
			$using_captcha = Configuration::get('WT_DISPLAY_CAPTCHA');
			$errors = $comment->validateController($using_captcha);
			if (count($errors) <= 0)
			{
				Tools::getValue('id_wt_blog_comment') ? $comment->update() : $comment->add();
				return true;
			}
			else
				return $errors;
		}
	}
	public function getPostById($image_size, $id_wt_blog_post = null, $id_lang = null, $id_shop = null)
	{	
		$sql = 'SELECT b.*,a.* FROM '._DB_PREFIX_.'wt_blog_post a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_lang b
				ON (a.id_wt_blog_post= b.id_wt_blog_post AND b.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop c
				ON (a.id_wt_blog_post= c.id_wt_blog_post)
				WHERE (c.active=1) AND b.id_lang = '.$id_lang.' AND c.id_shop = '.$id_shop.' AND a.id_wt_blog_post = '.$id_wt_blog_post.'';
		$row = Db::getInstance()->getRow($sql);
		if ($row)
		{
			$row['date_add'] = WTPost::formatDateAdd($row['date_add']);
			$author = new Employee($row['author']);
			$row['author'] = $author->firstname.' '.$author->lastname;
			$blogCategory = new WTCategory($row['id_wt_blog_category'], $id_lang, $id_shop);
			$row['category'] = $blogCategory;
			if ($image_size != 'none')
			{
				$save_path = _PS_MODULE_DIR_.'wtblog/views/img/media/posts/src/'.$id_wt_blog_post;
				$url_path = __PS_BASE_URI__.'modules/wtblog/views/img/media/posts/cache/'.$id_wt_blog_post.'_'.$id_shop;
				if (file_exists($save_path.'.jpg'))
					$row['image'] = $url_path.'_'.$image_size.'.'.$this->imageType;
				else
					$row['image'] = __PS_BASE_URI__.'modules/wtblog/views/img/media/posts/cache/no_image'.'_'.$image_size.'.'.$this->imageType;
			}
			return $row;
		}
		return false;
	}
	public function allowComment($id_shop = null)	
	{
		$allowComment = Configuration::get('WT_ALLOW_COMMENTS_BY_GUESTS');
		if (!$allowComment && !$this->context->customer->id)
			return false;
		return true;
	}
	public function getBlogPostMetas($id_wt_blog_post, $id_lang = null, $id_shop = null)
	{
		$sql = 'SELECT `name`, `meta_title`, `meta_description`, `meta_keywords`
				FROM `'._DB_PREFIX_.'wt_blog_post` p
				LEFT JOIN `'._DB_PREFIX_.'wt_blog_post_lang` pl ON (p.`id_wt_blog_post` = pl.`id_wt_blog_post` AND pl.id_shop = '.$id_shop.')
				LEFT JOIN `'._DB_PREFIX_.'wt_blog_post_shop` ps ON (p.`id_wt_blog_post` = ps.`id_wt_blog_post`)
				WHERE pl.id_lang = '.$id_lang.' AND ps.id_shop = '.$id_shop.'
					AND pl.id_wt_blog_post = '.$id_wt_blog_post.'
					AND ps.active = 1';
		if ($row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql))
		{
			if (empty($row['meta_description']))
				$row['meta_description'] = strip_tags($row['name']);
			if (!empty($row['meta_title']))
				$row['meta_title'] = $row['meta_title'].' - '.Configuration::get('PS_SHOP_NAME');
			else
				$row['meta_title'] = $row['name'].' - '.Configuration::get('PS_SHOP_NAME');
			return $row;
		}
	}
	public function getMetaTags($id_lang, $id_shop)
	{
		if ($id_wt_blog_post = Tools::getValue('id_wt_blog_post'))
			return $this->getBlogPostMetas($id_wt_blog_post, $id_lang, $id_shop);
	}
}