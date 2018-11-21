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

include_once(dirname(__FILE__).'/../../classes/WTCategory.php');
require_once (dirname(__FILE__).'/../../url/WTLINK.php');	
class WtBlogRssModuleFrontController extends ModuleFrontController
{
	protected $idRSS = '';
	public function init()
	{
		$this->imageType = 'jpg';
		parent::init();
	}
	public function initContent()
	{
		parent::initContent();
		$this->idRSS = Tools::getValue('idrss');
		$this->wtLINK = new WTLINK();
		$this->_display();
		$this->setTemplate('rss.tpl');
	}
	public function _display()
	{
		$id_shop = Context::getContext()->shop->id;
		$id_lang = Context::getContext()->language->id;	
		if ($this->idRSS == null)
		{
			$cat = Configuration::get('CATEGORY_RSS', null, null, $id_shop);
			/*RSS link : post page default + post page category blog*/
			$pipe = Configuration::get('PS_NAVIGATION_PIPE');
			if (empty($pipe))
				$pipe = '>';
			$path = '<a href='.$this->context->link->getModuleLink('wtblog', 'categoryPost').'>'.$this->module->l('Blog').'</a><span class="navigation-pipe">'.$pipe.'</span>'.$this->module->l('RSS').'';
			$rsss = $this->getRsss($cat, $id_shop, $id_lang);
			$this->context->smarty->assign('rsss', $rsss);
			$this->context->smarty->assign('path', $path);
		}
		else
		{
			$nb = Configuration::get('CATEGORY_RSS_NUMBER', null, null, $id_shop);
			$nChar = Configuration::get('WT_B_SUMMARY_CHARACTER_COUNT', null, null, $id_shop);
			$items = $this->getPostes($this->idRSS, $nb, $id_lang, $id_shop);
			$this->createXmlRss($items, $nChar);
			die;
		}
	}
	public function getPostes($idRss, $nb, $id_lang = null, $id_shop = null)
	{
		$orderby = (Tools::getValue('orderby') ? Tools::getValue('orderby') : 'date_add');
		$orderway = (Tools::getValue('orderway') ? Tools::getValue('orderway') : 'DESC');
		$sql = 'SELECT a.*, b.* FROM '._DB_PREFIX_.'wt_blog_post a
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_lang b
				ON (a.id_wt_blog_post= b.id_wt_blog_post AND b.id_shop = '.$id_shop.')
				LEFT JOIN '._DB_PREFIX_.'wt_blog_post_shop c
				ON (a.id_wt_blog_post= c.id_wt_blog_post)
				WHERE a.active = 1 AND b.id_lang = '.$id_lang.' AND c.id_shop = '.$id_shop.' '.(($this->idRSS != null && $this->idRSS != 'all') ? ' AND a.id_wt_blog_category='.$this->idRSS : '').'
				ORDER BY '.($orderby == 'date_add' ? 'a.' : 'b.').$orderby.' '.$orderway.'
				LIMIT 0,'.$nb.'';
		$posts = Db::getInstance()->ExecuteS($sql);
		$posts_new = array();
		foreach ($posts as $post) 
		{
			$date = new DateTime(''.$post['date_add'].'');
			$post['date_add'] = $date->format('D, j M Y');
			$author = new Employee($post['author']);
			$post['author'] = $author->firstname.' '.$author->lastname;
			$post['link'] = $this->wtLINK->getLinkPostDetail($post['id_wt_blog_post'], $post['link_rewrite'], $post['id_wt_blog_category']);
			$imep = Configuration::get('WT_IMEP_LIST_SHOW', null, null, $id_shop);
			if ($imep != 'none')
			{
				$save_path = _PS_MODULE_DIR_.'wtblog/media/posts/src/'.$post['id_wt_blog_post'];
				$url_path = __PS_BASE_URI__.'modules/wtblog/media/posts/cache/'.$post['id_wt_blog_post'].'_'.$id_shop;
				if (file_exists($save_path.'.'.$this->imageType))
					$post['image'] = $url_path.'_'.$imep.'.'.$this->imageType;
				else
					$post['image'] = '';
			}
			$posts_new[] = $post;
		}
		return $posts_new;
	}
	public function getInfoRssCat($id_cat, $id_lang)
	{
		$cat = new WTCategory($id_cat);
		$result = array();
		$result['name'] = $cat->name[$id_lang];
		$result['link'] = $this->wtLINK->getRSSLink($id_cat);
		return $result;
	}
	public function getRsss($cat, $id_shop = null, $id_lang = null)
	{
		$result = array();
		$result[0] = array('name' => $this->module->l('Post list page default'),'link' => $this->wtLINK->getRSSLink('all'));
		if ($cat != '')
		{
			$id_cat = explode(',', $cat);
			foreach ($id_cat as $key => $id)
				$result[$key + 1] = $this->getInfoRssCat($id, $id_lang);
		}
		return $result;
		die;
	}
	public function createXmlRss($items = array(), $nChar = 150)
	{
		Tools::redirect('Content-type: text/xml');
		$output = '<rss version="2.0">';
		$output .= '<channel>';
		$output .= '<title>'.$this->module->l('CS Blog').'</title>';
		$output .= '<description>'.$this->module->l('Module WTog : provide functions to manage post, categories (for post), and the block displays content related with post.').'</description>';
		$output .= '<link>http://www.yoursite.com/</link>';
		$output .= '<copyright>Your copyright details</copyright>';
		foreach ($items as $item)
		{
			if (isset($item['image']) && $item['image'] != '')
				$item['image_dis'] = '<div class="post_image"><a href="'.$item['link'].'" title="'.$item['name'].'"><img src="'.$item['image'].'" alt="'.$item['name'].'" /></a></div>';
			$output .= '<item>';
			$output .= '<title>'.$item['name'].'</title>';
			$output .= '<description><![CDATA['.(isset($item['image_dis']) ? $item['image_dis'] : '').mb_substr(strip_tags(Tools::stripslashes($item['description'])), 0, $nChar).']]></description>';
			$output .= '<link><![CDATA['.$item['link'].']]></link>';
			$output .= '<pubDate>'.$item['date_add'].'</pubDate>';
			$output .= '</item>';
		}
		$output .= '</channel>';
		$output .= '</rss>';
		echo $output;
	}
}