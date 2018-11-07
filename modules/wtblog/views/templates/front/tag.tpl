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
    {block name='head'}
      {include file='_partials/head.tpl'}
    {/block}
  </head>

  <body id="{$page.page_name}" class="{$page.body_classes|classnames}">

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
			{$wt_blog_tag->name|escape:'htmlall':'UTF-8'}
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
          

          {block name="left_column"}
            <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
              {if $page.page_name == 'product'}
                {hook h='displayLeftColumnProduct'}
              {else}
                {hook h="displayLeftColumn"}
              {/if}
            </div>
          {/block}

          {block name="content_wrapper"}
            <div id="content-wrapper" class="left-column right-column col-sm-8 col-md-8">
				<h1 class="page-heading">{l s='Search: ' mod='wtblog'}<span class="lighter">{$wt_blog_tag->name|escape:'htmlall':'UTF-8'}</span>
				<span class="heading-counter">{$count|intval}{l s=' results have been found.' mod='wtblog'}</span>
				</h1>
					
					
					<!--list post-->
						{if $wt_postes_empty == 0}
							{include file="module:wtblog/views/templates/front/post_list.tpl"}
						{/if}
						{if $wt_postes_empty == 1}
							<div class="empty">{l s='There are no posts in this tag' mod='wtblog'}</div>
						{/if}
						<!--pagination-->
						<div class="content_sortPagiBar clearfix">
						{if $wt_postes_empty != 1}
							{include file="module:wtblog/views/templates/front/pagination.tpl"}
						{/if}
						</div>


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
