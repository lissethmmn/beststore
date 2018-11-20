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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{$number_line = 2}
{$dem = 0}
{$id_lang = Context::getContext()->language->id}
{foreach from=$group_cat_info item=cat_info name=g_cat_info}
{$dem = $dem+1}
<div class="out-content-prod">
<div class="block-content clearfix">
	<div id="wt-prod-cat-{$cat_info.id_cat|intval}" class="row">
	
		<div class="block-products col-sm-9 col-md-9">
			
			<div class="content-product-sub-cat" id="content-product-sub-cat-{$smarty.foreach.g_cat_info.iteration|intval}">
				{if isset($cat_info.product_list) && count($cat_info.product_list) > 0}
				<div class="cycleElementsContainer" id="cycle-{$smarty.foreach.g_cat_info.iteration|escape:'html':'UTF-8'}">	
					<div id="elements-{$smarty.foreach.g_cat_info.iteration|escape:'html':'UTF-8'}">
						<div class="list_carousel responsive">
						<a id="cat-prev-{$smarty.foreach.g_cat_info.iteration|intval}" class="btn prev" href="#">&lt;</a>
						<a id="cat-next-{$smarty.foreach.g_cat_info.iteration|intval}" class="btn next" href="#">&gt;</a>
						<ul id="cat-carousel-{$smarty.foreach.g_cat_info.iteration|intval}" class="product-list-cat">
						{$i=0}
						{foreach from=$cat_info.product_list item=product name=product_list}
												
							<li class="ajax_block_product {if $smarty.foreach.product_list.first|intval}first_item{/if} {if $smarty.foreach.product_list.last|intval}last_item{/if} ">						
							
									
							{include file='./medium_item.tpl'}				

						
						
						
			
						
						
						
						
						</li>
					
						
						
						{/foreach}
						</ul>
						</div>
					</div>
				</div>
			 {else}
				<div class="item product-box no-product col-sm-12 col-md-6">
							<p class="alert alert-warning">{l s='No product at this category' d='Modules.WTProductCategory'}</p>
				</div>
			 {/if}
			</div><!-- end content product sub cat -->
		</div>
		
		
		<div class="block-banner col-sm-3 col-md-3">
			<div class="cat-banner">
				{if $cat_info.cat_banner!='' }
				<a href="{$link->getCategoryLink($cat_info.id_cat, $cat_info.link_rewrite)|escape:'html':'UTF-8'}" title="{$cat_info.cat_name|escape:'html':'UTF-8'}"><img src="{$banner_path|escape:'html':'UTF-8'}{$cat_info.cat_banner|escape:'html':'UTF-8'}" alt=""/></a>
				{/if}
				
				{if $cat_info.cat_desc!='' }
				<div class="cat-desc">
					{$cat_info.cat_desc|escape:'quotes':'UTF-8' nofilter}
				</div>
				{/if}
				<div class="cat-view-more">
					<a href="{$link->getCategoryLink($cat_info.id_cat, $cat_info.link_rewrite)|escape:'html':'UTF-8'}" title="{$cat_info.cat_name|escape:'html':'UTF-8'}">{l s='View More' d='Modules.WTProductCategory'}</a>
				</div>
			</div>
		</div>	
		
	</div>
</div>
</div>
{if $cat_info.show_img == 1 && isset($cat_info.id_image) && $cat_info.id_image > 0}
<div class="cat-img">
	<a href="{$link->getCategoryLink($cat_info.id_cat, $cat_info.link_rewrite)|escape:'html':'UTF-8'}" title="{$cat_info.cat_name|escape:'html':'UTF-8'}">
		<img src="{$link->getCatImageLink($cat_info.link_rewrite, $cat_info.id_image, 'category_default')|escape:'html':'UTF-8'}"/>
	</a>
</div>
{/if}

{/foreach}

<script type="text/javascript">
$(window).ready(function() {
		runSliderProducstCat();
	});

$(document).ajaxComplete(function(){
	runSliderProducstCat();
});
$(window).resize(function() {
			runSliderProducstCat();
});

function runSliderProducstCat()
{
	var item_sub_catpro = 7;
	var item_catpro = 5; 
	if(getWidthBrowser() > 1680)
		{	
			item_sub_catpro = 7;
			item_catpro = 5;
		}
	else		
	if(getWidthBrowser() > 1180)
		{	
			item_sub_catpro = 7;
			item_catpro = 4;
		}
		else
		if(getWidthBrowser() > 991)
		{	
			item_sub_catpro = 5;
			item_catpro = 4;			
		}
		else
		if(getWidthBrowser() > 767)
		{	
			item_sub_catpro = 3; 
			item_catpro = 3;
		}		
		else
		if(getWidthBrowser() > 540)
		{	
			item_sub_catpro = 2;
			item_catpro = 2;
		}
		else
		if(getWidthBrowser() > 340)
		{	
			item_sub_catpro = 2; 
			item_catpro = 2;
		}			
		else
		{
			item_sub_catpro = 2;
			item_catpro = 2;
		}
	{foreach from=$group_cat_info item=cat_info name=g_cat_info}
	
	/*$('#sub-cat-ul-{$smarty.foreach.g_cat_info.iteration|intval}').carouFredSel({
				responsive: true,
				width: '100%',
				height: 'variable',
				onWindowResize: 'debounce',
				prev: '#subcat-prev-{$smarty.foreach.g_cat_info.iteration|intval}',
				next: '#subcat-next-{$smarty.foreach.g_cat_info.iteration|intval}',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:60,
					height: 'auto',
					visible: {
						min: 2,
						max: item_sub_catpro
					}
				},
				scroll: {
					items:2,
					direction : 'left',    
					duration  : 500 ,  
					onBefore: function(data) {  
					},
					onAfter	: function(data) {
				   }
				}
			});*/
			
	$('#cat-carousel-{$smarty.foreach.g_cat_info.iteration|intval}').carouFredSel({
				responsive: true,
				width: '100%',
				height: 'variable',
				onWindowResize: 'debounce',
				prev: '#cat-prev-{$smarty.foreach.g_cat_info.iteration|intval}',
				next: '#cat-next-{$smarty.foreach.g_cat_info.iteration|intval}',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:150,
					height: 'auto',
					visible: {
						min: 2,
						max: item_catpro,
					}
				},
				scroll: {
					items:2,
					direction : 'left',    
					duration  : 500 ,  
					onBefore: function(data) {  
					},
					onAfter	: function(data) {
				   }
				}
			});
		{/foreach}
}	

</script>


