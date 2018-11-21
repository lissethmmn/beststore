{*
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}




{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<!doctype html>
<html lang="{$language.iso_code}">

  
  <head>
    
{block name='head_charset'}
  <meta charset="utf-8">
{/block}
{block name='head_ie_compatibility'}
  <meta http-equiv="x-ua-compatible" content="ie=edge">
{/block}

{block name='head_seo'}
  <title>{$wt_blog_category['name']|escape:'html':'UTF-8'}</title>
  <meta name="description" content="{$wt_blog_category['description']|escape:'html':'UTF-8'}">
  <meta name="keywords" content="{$wt_blog_category['meta_keywords']|escape:'html':'UTF-8'}">
  {if $page.meta.robots !== 'index'}
    <meta name="robots" content="{$page.meta.robots}">
  {/if}
  {if $page.canonical}
    <link rel="canonical" href="{$page.canonical}">
  {/if}
{/block}

{block name='head_viewport'}
  <meta name="viewport" content="width=device-width, initial-scale=1">
{/block}

{block name='head_icons'}
  <link rel="icon" type="image/vnd.microsoft.icon" href="{$shop.favicon}?{$shop.favicon_update_time}">
  <link rel="shortcut icon" type="image/x-icon" href="{$shop.favicon}?{$shop.favicon_update_time}">
{/block}

{block name='stylesheets'}
  {include file="_partials/stylesheets.tpl" stylesheets=$stylesheets}
{/block}

{block name='javascript_head'}
  {include file="_partials/javascript.tpl" javascript=$javascript.head vars=$js_custom_vars}
{/block}

{block name='hook_header'}
  {$HOOK_HEADER nofilter}
{/block}

{block name='hook_extra'}{/block}
  </head>

  <body id="" class="{$page.body_classes|classnames}">

    {hook h='displayAfterBodyOpeningTag'}

    <main>
      {block name='product_activation'}
        {include file='catalog/_partials/product-activation.tpl'}
      {/block}
      <header id="header">
        {block name='header'}
          {include file='_partials/header.tpl'}
        {/block}
      </header>
      {block name='notifications'}
        {include file='_partials/notifications.tpl'}
      {/block}
	  
	  
	 <div id="wrapper" class="content-breadcrumb">
	  <nav data-depth="3" class="breadcrumb">
			<h1 class="new-title-breadcrumb">
			{if isset($wt_blog_category)}
					{$wt_blog_category['name']|escape:'html':'UTF-8'}
				{else}
			{l s='Blog' d='Modules.WTBlog'}
			{/if}
			</h1>
			  <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
					  <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
					 {$path nofilter}
				  </li>
				 </ol>
			</nav>
	  
	  </div>
	  
	  
	  
	  
      <section id="wrapper">
        <div class="container">
          
          {block name="content_wrapper"}
            <div id="content-wrapper" class="left-column right-column col-md-12 col-sm-12">
             <div class="wt-blog-category">
	
						
						
						<div class="wt-blog-cat-img">
							
								<h1 class="page-heading"> 
								{if isset($wt_blog_category)}
									<span class="cat-name">{$wt_blog_category['name']|escape:'html':'UTF-8'}</span>
								{else}
									{l s='Welcome to our blog' d='Modules.WTBlog'}
								{/if}
								{if isset($wt_post_list)}<span class="heading-counter">{l s='There ' d='Modules.WTBlog'} {if {$count_blog|intval} > 1}{l s='are ' d='Modules.WTBlog'} {else}{l s='is ' d='Modules.WTBlog'} {/if}{$count_blog|intval} {if {$count_blog|intval} > 1}{l s='posts' d='Modules.WTBlog'} {else}{l s='post' d='Modules.WTBlog'} {/if}</span>{/if}
								</h1>
								{if isset($wt_blog_category)}
									{if $wt_allow_category_description == 1 && $wt_blog_category['description'] != ''}
										{if strlen($wt_blog_category['description']) > 350}
										<div id="category_description_short" class="rte">{$wt_blog_category['description']|truncate:120|escape:'html':'UTF-8'}</div>
										{else}
											<div class="rte">{$wt_blog_category['description']|escape:'html':'UTF-8' nofilter}</div>
										{/if}
									{/if}
								{/if}
							
						</div>
					</div> <!-- close div cs-category-info -->
					<!--list post-->
					{if $wt_postes_empty == 0}
						<div id="wtblogcat" class="block clearfix">
							{include file="module:wtblog/views/templates/front/post_list.tpl"}
						</div>
						{if $wt_postes_empty != 1}
						{if $start!=$stop}
						<div id="pagination_bottom" class="pagination-bottom-blog clearfix">
							<div class="bottom-pagination-content clearfix">
								
									{include file="module:wtblog/views/templates/front/pagination.tpl"}
								
							</div>
						</div>
						{/if}
						{/if}
					{/if}


					{if $wt_postes_empty == 1}
						<div class="empty">{l s='There are no posts in this category' d='Modules.WTBlog'}</div>
					{/if}

            </div>
          {/block}

          {block name="right_column"}
            <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
              {if $page.page_name == 'product'}
                {hook h='displayRightColumnProduct'}
              {else}
                {hook h="displayRightColumn"}
              {/if}
            </div>
          {/block}
        </div>
      </section>

      <footer id="footer">
        {block name="footer"}
          {include file="_partials/footer.tpl"}
        {/block}
      </footer>

    </main>

    {block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}

    {hook h='displayBeforeBodyClosingTag'}

  </body>

</html>
