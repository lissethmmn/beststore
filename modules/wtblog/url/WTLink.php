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

class WTLink extends Link
{
	public function createMainBlogUrl($module, $controller = 'default', array $params = array(), $ssl = false, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$id_shop = Context::getContext()->shop->id;
		$url = Context::getContext()->link->getBaseLink($id_shop).$this->getLangLink($id_lang, null, $id_shop);
		//$params['module'] = $module;
		//$params['controller'] = $controller ? $controller : 'default';
		$dispatcher = Dispatcher::getInstance();
		$dispatcher->addRoute('wt_main_url', '{mainlink}.html', null, 1, array(
				'mainlink' =>			array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'mainlink')
			), array('fc' => 'module','module' => 'wtblog','controller' =>	'categoryPost'));
		
		if ($dispatcher->hasRoute('module-'.$module.'-'.$controller, $id_lang))
			return Context::getContext()->link->getPageLink('module-'.$module.'-'.$controller, $ssl, $id_lang, $params);
		else
			return $url.$dispatcher->createUrl('wt_main_url', $id_lang, $params);
	}
	public function getMainBlogUrl($mainlink)
	{
		$params = array();
		$params['mainlink'] = $mainlink;
		$id_lang = Context::getContext()->language->id;
		$url = $this->createMainBlogUrl('wtblog', 'categoryPost', $params, false, $id_lang);
		return $url;
	}
	
	public function createLinkPostDetail($module, $controller = 'default', array $params = array(), $ssl = false, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$id_shop = Context::getContext()->shop->id;
		$url = Context::getContext()->link->getBaseLink($id_shop).$this->getLangLink($id_lang, null, $id_shop);
		$params['module'] = $module;
		$params['controller'] = $controller ? $controller : 'default';
		$dispatcher = Dispatcher::getInstance();
		$dispatcher->addRoute('wt_blog_post', 'module/{module}{/:controller}/{id_wt_blog_post}-{category_parent}-{rewrite}.html', null, 1, array(
				'module' =>			array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'module'),
				'controller' =>		array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'controller'),
				'category_parent' =>		array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'category_parent'),
				'id_wt_blog_post' =>				array('regexp' => '[0-9]+', 'param' => 'id_wt_blog_post'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			), array('fc' => 'module',));
		
		// If the module has its own route ... just use it !
		if ($dispatcher->hasRoute('module-'.$module.'-'.$controller, $id_lang))
			return Context::getContext()->link->getPageLink('module-'.$module.'-'.$controller, $ssl, $id_lang, $params);
		else
			return $url.$dispatcher->createUrl('wt_blog_post', $id_lang, $params);
	}
	
	public function getLinkPostDetail($id_wt_blog_post, $link_rewrite, $category_parent)
	{
		$params = array();
		$params['id_wt_blog_post'] = $id_wt_blog_post;
		$params['rewrite'] = $link_rewrite;
		$params['category_parent'] = $category_parent;
		$url = $this->createLinkPostDetail('wtblog', 'post', $params);
		return $url;
	}
	public function createLinkCategory($module, $controller = 'default', array $params = array(), $ssl = false, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$id_shop = Context::getContext()->shop->id;
		$url = Context::getContext()->link->getBaseLink($id_shop).$this->getLangLink($id_lang, null, $id_shop);
		$params['module'] = $module;
		$params['controller'] = $controller ? $controller : 'default';
		$dispatcher = Dispatcher::getInstance();
		$dispatcher->addRoute('wt_category', 'module/{module}{/:controller}/{rewrite}-{id_wt_blog_category}.html', null, 1, array(
				'module' =>			array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'module'),
				'controller' =>		array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'controller'),
				'id_wt_blog_category' => array('regexp' => '[0-9]+', 'param' => 'id_wt_blog_category'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			), array('fc' => 'module',));
		if ($dispatcher->hasRoute('module-'.$module.'-'.$controller, $id_lang))
			return Context::getContext()->link->getPageLink('module-'.$module.'-'.$controller, $ssl, $id_lang, $params);
		else
			return $url.$dispatcher->createUrl('wt_category', $id_lang, $params);
	}
	public function getCategoryPostLink($id_wt_blog_category, $link_rewrite)
	{
		$params = array();
		$params['id_wt_blog_category'] = $id_wt_blog_category;
		$params['rewrite'] = $link_rewrite;
		$id_lang = Context::getContext()->language->id;
		$url = $this->createLinkCategory('wtblog', 'categoryPost', $params, false, $id_lang);
		return $url;
	}
	public function getTagLink($id_wt_blog_tag, $name)
	{
		$params = array();
		$params['id_wt_blog_tag'] = $id_wt_blog_tag;
		$params['name'] = str_replace(' ', '_', $name);
		$id_lang = Context::getContext()->language->id;
		$url = $this->creatLinkForTag('wtblog', 'tag', $params, false, $id_lang);
		return $url;
	}
	public function creatLinkForTag($module, $controller = 'default', array $params = array(), $ssl = false, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$id_shop = Context::getContext()->shop->id;
		$url = Context::getContext()->link->getBaseLink($id_shop).$this->getLangLink($id_lang, null, $id_shop);
		$params['module'] = $module;
		$params['controller'] = $controller ? $controller : 'default';
		$dispatcher = Dispatcher::getInstance();
		$dispatcher->addRoute('wt_tag', 'module/{module}{/:controller}/{id_wt_blog_tag}-{name}.html', null, 1, array(
				'module' =>			array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'module'),
				'controller' =>		array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'controller'),
				'id_wt_blog_tag' =>				array('regexp' => '[0-9]+', 'param' => 'id_wt_blog_tag'),
				'name' =>		array('regexp' => '[_a-zA-Z0-9_-]+'),
			), array('fc' => 'module',));
		// If the module has its own route ... just use it !
		if ($dispatcher->hasRoute('module-'.$module.'-'.$controller, $id_lang))
			return Context::getContext()->link->getPageLink('module-'.$module.'-'.$controller, $ssl, $id_lang, $params);
		else
			return $url.$dispatcher->createUrl('wt_tag', $id_lang, $params);
	}
	public function getPaginationLinkBlog($url)
	{
		if (Tools::getValue('n'))
			$url = $url.(!strstr($url, '?') ? '?' : '&amp;').'n='.(int)(Tools::getValue('n'));	
		return $url;
	}
	public function getPath($categories, $path = '')	
	{
		$pipe = Configuration::get('PS_NAVIGATION_PIPE');
		if (empty($pipe))
			$pipe = '>';
		$full_path = '';
		foreach ($categories as $category)
			$full_path .= '<a href='.$this->getCategoryPostLink($category['id_wt_blog_category'], $category['link_rewrite']).'>'.htmlentities($category['name'], ENT_NOQUOTES, 'UTF-8').'</a><span class="navigation-pipe">'.$pipe.'</span>';
		$full_path = $full_path.$path;
		return $full_path;
	}
	public function creatLinkForRSS($module, $controller = 'default', array $params = array(), $ssl = false, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
		$id_shop = Context::getContext()->shop->id;
		$url = Context::getContext()->link->getBaseLink($id_shop).$this->getLangLink($id_lang, null, $id_shop);
		$params['module'] = $module;
		$params['controller'] = $controller ? $controller : 'default';
		$dispatcher = Dispatcher::getInstance();
		$dispatcher->addRoute('wt_rss', 'module/{module}{/:controller}/{idrss}.html', null, 1, array(
				'module' =>			array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'module'),
				'controller' =>		array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'controller'),
				'idrss' =>				array('regexp' => '[_a-zA-Z0-9_-]+', 'param' => 'idrss'),
			), array('fc' => 'module',));
		if ($dispatcher->hasRoute('module-'.$module.'-'.$controller, $id_lang))
			return Context::getContext()->link->getPageLink('module-'.$module.'-'.$controller, $ssl, $id_lang, $params);
		else
			return $url.$dispatcher->createUrl('wt_rss', $id_lang, $params);
	}
	public function getRSSLink($idrss)
	{
		$params = array();
		$params['idrss'] = $idrss;
		$url = $this->creatLinkForRSS('wtblog', 'rss', $params);
		return $url;
	}
}