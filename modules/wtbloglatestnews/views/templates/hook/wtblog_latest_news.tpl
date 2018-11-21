{**
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
 
<div id="blog_latest_new_home">

<div class="col-xs-12 col-md-4 links">
		
		<h3 class="h3 hidden-sm-down">{l s='Latest Blog' mod='wtbloglatestnews'}</h3>

	<div class="title clearfix hidden-md-up" data-target="#wtbloglatestnews" data-toggle="collapse">
        <span class="h3">{l s='Latest Blog' mod='wtbloglatestnews'}</span>
        <span class="pull-xs-right">
          <span class="navbar-toggler collapse-icons">
            <i class="material-icons add">&#xE313;</i>
            <i class="material-icons remove">&#xE316;</i>
          </span>
        </span>
      </div>
	  
	<div id="wtbloglatestnews" class="block_content collapse">
		{if isset($view_data) AND !empty($view_data)}
			{assign var='i' value=1}
			<div class="blog-slider">
			{foreach from=$view_data item=post}
					{assign var="options" value=null}
					{$options.id_post = $post.id_wt_blog_post}
					{$options.slug = $post.link_rewrite}
					<div class="item">
						<div class="blog-img">
							<a href="{$post['link']|escape:'htmlall':'UTF-8'}" title="">
								<img alt="" class="feat_img_small" src="{$path_ssl|escape:'html':'UTF-8'}modules/wtblog/{$post.image|escape:'html':'UTF-8'}">
							</a>
						</div>
						<div class="blog-content">
							
							<!--<div class="blog-info">
								<div class="post-date">
									{$post.date_add|date_format|escape:'htmlall':'UTF-8'}
								</div>
								<span class="blog-author">{$post.author|escape:'html':'UTF-8'}</span>
							</div>-->
							
							<h5 class="post_title">
								<a href="{$post.link|escape:'html':'UTF-8'}" title="">
								{$post.name|escape:'html':'UTF-8'}
								</a>
							</h5>
							
						</div>
					</div>
				{$i=$i+1}
			{/foreach}
			</div>
		{/if}
	</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".blog-slider").owlCarousel({
					responsive: {
						0: { items: 1},
						464:{ items: 1},
						750:{ items: 1},
						974:{ items: 1},
						1170:{ items: 1}
					},
				  dots: true,
				  nav: false,
				  loop: true,
				  margin: 20,
				  slideSpeed : 500,
				paginationSpeed : 1000,
				scrollPerPage: true
				});
		});
	</script>
</div>