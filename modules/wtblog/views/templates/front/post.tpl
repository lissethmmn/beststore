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
  <title>{$post['name']|escape:'htmlall':'UTF-8'}</title>
  <meta name="description" content="{$post['meta_description']}">
  <meta name="keywords" content="{$post['meta_keywords']}">
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
			{$post['name']|escape:'htmlall':'UTF-8'}
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
				
					{if isset($errorposts) && $errorposts}
						<div class="error">{l s='There is no post' d='Modules.WTBlog'}</div>
					{else}
					{if isset($post)}
						<div id="wt_post">
							{if $wt_imipd_show != 'none'}
								{if isset($post['image']) && $post['image'] != ''}
									<div class="blog-img">
										<img class="" src="{$post['image']|escape:'htmlall':'UTF-8'}" title="{$post['name']|escape:'html':'UTF-8'}" alt="{$post['name']|escape:'htmlall':'UTF-8'}" />
										<div class="date-view">
											<div class="post-time">
												<div class="date">{$post.date_add|date_format:"%e"|escape:'htmlall':'UTF-8'}</div>
												<div class="month">{$post.date_add|date_format:"%b"|escape:'htmlall':'UTF-8'}</div>
											</div>
											<div class="view">
												<i class="icon-comments"></i>
												<span>{$count_comment_total|intval}</span>
											</div>
										</div>
									</div>
								{/if}
							{/if}
							<div class="g-blog-content">
							<div class="blog-info">
								<span class="blog-author">{$post['author']|escape:'htmlall':'UTF-8'}</span>
								<span class="blog-cat">{$post.category->name|escape:'htmlall':'UTF-8'}</span> 
							</div>
							<h5 class="post_title">{$post['name']|escape:'htmlall':'UTF-8'}</h5>
							<p>{$post['description_short']|strip_tags|escape:'quotes':'UTF-8' nofilter}</p>
							<p>{$post['description']|escape:'quotes':'UTF-8' nofilter}</p>
							
							{if isset($wttags) && $wttags}
								<div class="tag-blog clearfix">
									<span class="title_tag_blog">{l s='Tags:' d='Modules.WTBlog'}</span>
									<div class="tag-list">
										{foreach from=$wttags item=tag name=wttags}
											<span><a href="{$tag.link|escape:'html':'UTF-8'}">{$tag.name|escape:'htmlall':'UTF-8'}{if !$smarty.foreach.wttags.last},{/if}</a></span>
										{/foreach}
									</div>
								</div>
							{/if}
						</div>
						</div>
						
						<!--related posts-->
						{if isset($related_posts) && $related_posts }
						<div class="related_posts blog_block">
							<div class="block-blog-title">
								<div class="wt-block-title"><h3>{l s='Related Articles' d='Modules.WTBlog'}</h3></div> 
							</div>
							<ul class="blog_content">
							{foreach from=$related_posts item=related_post name=related_posts}
								<li class="item-related-post">
									<strong><a href="{$WTLink->getLinkPostDetail($related_post['id_wt_blog_post'],$related_post['link_rewrite'],$related_post['id_wt_blog_category'])|escape:'htmlall':'UTF-8'}" title="{$related_post['name']|escape:'htmlall':'UTF-8'}">{$related_post['name']|escape:'htmlall':'UTF-8'}</a></strong>
								</li>
							{/foreach}
							</ul>
						</div>
						{/if}
							<!-- display comment list -->
							{if $count_comment_total>0}
							<div class="comment-list">
								<div class="block-blog-title">
									<div class="wt-block-title">
										<h3>{if $count_comment_total <= 1} {l s='Comment' d='Modules.WTBlog'}{/if}{if $count_comment_total > 1} {l s='Comments' d='Modules.WTBlog'}{/if}</h3>
									</div>
								</div>
								{foreach from=$comments item=comment name=cscomments}
									<div class="comment-item {if $smarty.foreach.cscomments.last}last{/if}">
										<h5 class="post_title">{$comment['title']|escape:'htmlall':'UTF-8'}</h5>
										<p>{$comment['content']|escape:'htmlall':'UTF-8'}</p>
										<div class="blog-info">
											<span class="blog-author">{$comment['author_name']|escape:'htmlall':'UTF-8'}</span>	
											<span class="blog-date">{$comment['date_add']|escape:'htmlall':'UTF-8'}</span>
										</div>
									</div>
								{/foreach}
								{if $count_comment_total > $count_comment_show && !isset($viewall)}
								<a href="{$WTLink->getLinkPostDetail($post['id_wt_blog_post'],$post['link_rewrite'],$post['id_wt_blog_category'])|escape:'htmlall':'UTF-8'}{if $url_rewrite == 1}?{else}&{/if}viewall">{l s='view all' d='Modules.WTBlog'}</a>
								{elseif isset($viewall)}
									<a href="{$WTLink->getLinkPostDetail($post['id_wt_blog_post'],$post['link_rewrite'],$post['id_wt_blog_category'])|escape:'htmlall':'UTF-8'}">{l s='Collapse' d='Modules.WTBlog'}</a>
								{/if}
							</div>
							{/if}
							<!-- /display comment list -->
						<!-- display form comment-->
						{if $display_form_comment == 1}
							<div class="comment_form">
								<form action="{$WTLink->getLinkPostDetail($post['id_wt_blog_post'],$post['link_rewrite'],$post['id_wt_blog_category'])|escape:'htmlall':'UTF-8'}" name="addcomment" method="post" class="std">
									<fieldset>
										<div class="block-blog-title">
											<div class="wt-block-title"><h3>{l s='Leave your comment' d='Modules.WTBlog'}</h3></div>
										</div>
										<div class="blog_content">
										<div class="out_left">
										{if isset($error)}
											<div class="alert alert-danger">
												{l s='There ' d='Modules.WTBlog'}{if $error|@count <= 1} {l s='is ' d='Modules.WTBlog'} {else} {l s='are ' d='Modules.WTBlog'}{/if}{$error|@count|intval} {if $error|@count <= 1} {l s='error ' d='Modules.WTBlog'} {else} {l s='errors ' d='Modules.WTBlog'}{/if}
												<ol>
													{if isset($error['author_name'])}<li>{$error['author_name']|escape:'htmlall':'UTF-8'}</li>{/if}
													{if isset($error['author_email'])}<li>{$error['author_email']|escape:'htmlall':'UTF-8'}</li>{/if}
													{if isset($error['title'])}<li>{$error['title']|escape:'htmlall':'UTF-8'}</li>{/if}
													{if isset($error['captcha'])}<li>{$error['captcha']|escape:'htmlall':'UTF-8'}</li>{/if}
													{if isset($error['content'])}<li>{$error['content']|escape:'htmlall':'UTF-8'}</li>{/if}
												</ol>
											</div>
										{elseif isset($success)}
											<div class="success">
												<p class="alert alert-success">
												{l s='Comment is success!' d='Modules.WTBlog'}
												</p>
											</div>
										{/if}
										
										{if isset($logged) && $logged }
												<p class="text form-group">
													<label for="name">{l s='Your Name' d='Modules.WTBlog'} <em class="pl_requie">*</em></label>
													<input class="plinput form-control" type="text" name="author_name" value="{$cookie->customer_firstname|escape:'htmlall':'UTF-8'} {$cookie->customer_lastname|escape:'htmlall':'UTF-8'}"/>
												</p>
												<p class="text form-group">
													<label for="email">{l s='Email' d='Modules.WTBlog'} <em class="pl_requie">*</em></label>
													<input class="plinput form-control" type="text" name="author_email" value="{$cookie->email|escape:'htmlall':'UTF-8'}"/> 
												</p>
										{else}
											<p class="text form-group">
												<label for="name">{l s='Your Name' d='Modules.WTBlog'} <em class="pl_requie">*</em></label>
												<input class="plinput form-control" type="text" name="author_name" value=""/>
											</p>
											<p class="text form-group">
												<label for="email">{l s='Email' d='Modules.WTBlog'} <em class="pl_requie">*</em></label>
												<input class="plinput form-control" type="text" name="author_email" value=""/> 
											</p>
										{/if}
										<input type="hidden" name="id_wt_blog_post" value="{$post['id_wt_blog_post']|escape:'htmlall':'UTF-8'}"/>
										<input type="hidden" name="id_shop" value="{$id_shop|intval}"/>
										<p class="text form-group">
												<label for="email">{l s='Title' d='Modules.WTBlog'} <em class="pl_requie">*</em></label>
												<input class="plinput form-control" type="text" name="title" value=""/> 
										</p>
										{if $using_captcha == 1}
										<p class="text captcha form-group">
												<label for="email">{l s='Enter the code' d='Modules.WTBlog'} <em class="pl_requie">*</em></label>
												<input class="plinput form-control" type="text" name="captcha"  value=""/>
										</p>
										<p>
											<img src="{$this_path_ssl|escape:'html':'UTF-8'}classes/CaptchaSecurityImages.php?width=120&height=40&characters=5" alt=""/>
										</p>
										{/if}
										</div>
										<div class="out_right">
										<input type="hidden" name="active" value="{if $validate_comment ==1}0{else}1{/if}"/>
										<p class="textarea form-group">
											<label for="comment">{l s='Comment' d='Modules.WTBlog'} <em class="pl_requie">*</em></label>
											<textarea class ="rte form-control" id="elm1" name="content" cols="60" rows="6"></textarea>
										</p>
										<input type="hidden" name="submitcomment" value="true" />
										<button  type="submit">{l s='Submit' d='Modules.WTBlog'}</button>
										</div>
										</div>
									</fieldset>
								</form>
							</div>
						{/if}<!-- end display form comment-->
					{/if}<!--end isset post-->
					{/if}
					<!--end content-->
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
