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


{if count($tabs) > 0}

<div class="wt_home_filter_product_tab col-xs-12 col-sm-12" id="wt_home_filter_product_tab_ssl" static_token="{$static_token|escape:'html':'UTF-8'}" url_page_cart="{$urls.pages.cart|escape:'quotes':'UTF-8'}" wt_base_ssl="{$path_ssl|escape:'html':'UTF-8'}">
<h1> {l s='Trending now' mod='wtproductfilter'}</h1>
<div id="tabs" class="sub-cat">
	<ul id="ul_tv_tab" class="title-tab sub-cat-ul">
		{$i=0}
		{foreach from=$tabs item=tab name=tabs}
			{$i=$i+1}
			<li wt-name-module="{$name_module|escape:'html':'UTF-8'}" type-tab="{$tab.product_type|escape:'html':'UTF-8'}" id-tab="{$smarty.foreach.tabs.iteration|escape:'html':'UTF-8'}" class=" {if $smarty.foreach.tabs.first}first ui-tabs-selected ui-state-active{elseif $smarty.foreach.tabs.last}last{/if} ">
				<a class="title_block" href="javascript:void(0)">
				{if isset($tab.title)}
				{$tab.title|escape:'html':'UTF-8'}
				{else}
				{l s='not title' mod='wtproductfilter'}
				{/if}
				</a>
			</li>
		{/foreach}
	</ul>

	<div class="content-tab-product">
	{foreach from=$tabs item=tab name=tabs}
		
	<div class="tabs-carousel" id="tabs-{$smarty.foreach.tabs.iteration|escape:'html':'UTF-8'}">
		{if $tab.tab_product_list->product_list && count($tab.tab_product_list->product_list)>0}
		<a id="prev{$smarty.foreach.tabs.iteration|intval}" class="button-arrow prev" href="#">&lt;</a>
		<a id="next{$smarty.foreach.tabs.iteration|intval}" class="button-arrow next" href="#">&gt;</a>
		<div class="cycleElementsContainer" id="cycle-{$smarty.foreach.tabs.iteration|escape:'html':'UTF-8'}">
			<div id="elements-{$smarty.foreach.tabs.iteration|escape:'html':'UTF-8'}">
				<div class="list_carousel responsive">
					<ul id="carousel{$smarty.foreach.tabs.iteration|intval}" class="product-list">
					{$i=0}
					{foreach from=$tab.tab_product_list->product_list item=product name=product_list}
						{$i=$i+1}
					<li class="ajax_block_product {if $smarty.foreach.product_list.first|intval}first_item{elseif $smarty.foreach.product_list.last|intval}last_item{/if} js-product-miniature" data-id-product="{$product.id_product|escape:'quotes':'UTF-8'}" data-id-product-attribute="{$product.id_product_attribute|escape:'quotes':'UTF-8'}">
					<div class="product-block wt_container_thumbnail" wt-name-module="{$name_module|escape:'html':'UTF-8'}" id-tab="{$smarty.foreach.tabs.iteration|escape:'html':'UTF-8'}" wt-data-id-product="{$product.id_product|intval}">

						<div class="product-image-container">
									<div class="div-product-image">							
									<a class="product_image" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.legend|escape:'html':'UTF-8'}">
										<img class="img-responsive wt-image lazy" data-animate="zoomIn" data-delay="30" data-original="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" src="{$path_ssl|escape:'html':'UTF-8'}modules/wtproductcategory/views/img/empty-lazy.gif" alt="{$product.legend|escape:'html':'UTF-8'}" />
										<span class="overlay"></span>
									</a>
									<!--
									{if isset($product.new) && $product.new == 1}
									<span class="new-label"><span>{l s='New' mod='wtproductfilter'}</span></span>
									{/if}-->									
									{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
									{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
											<p class="discount-percentage animated" href="{$product.link|escape:'html':'UTF-8'}">
														<span class="sale">
<!-- 														{if $product.specific_prices && $product.specific_prices.reduction_type == 'percentage'}
														-{$product.specific_prices.reduction|escape:'quotes':'UTF-8' * 100}%
														{else}
														-{$product.price_without_reduction-$product.price|floatval}
														{/if} -->
														</span>
													</p>
									{/if}
									{/if}
									<div class="thumbs-content" id="{$name_module|escape:'html':'UTF-8'}-{$smarty.foreach.tabs.iteration|escape:'html':'UTF-8'}-wt-thumbs-content-{$product.id_product|intval}"></div>
									</div>
							<div class="wt-button-container">
							{include file='catalog/_partials/customize/button-cart-2.tpl' product=$product name_module=$name_module}
							{include file='catalog/_partials/customize/button-quickview.tpl' product=$product}
							{hook h='displayProductListFunctionalButtons' product=$product}
							</div>
						</div>
						<div>
								
									<div class="review">									
											{hook h='displayProductListReviews' product=$product}
									</div>
						</div>
							
							
						<h3 class="product-name"><a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">{$product.name|truncate:50:'...'|strip_tags|escape:'html':'UTF-8'}</a></h3>
							<div class="content_price product-price-and-shipping">
									{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
										<span itemprop="price" class="price {if isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0} special-price{/if}">												
												{Tools::displayPrice($product.price|escape:'quotes':'UTF-8')}

												</span>
										{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
												<span class="old-price regular-price">
												{Tools::displayPrice($product.price_without_reduction|escape:'quotes':'UTF-8')}
												</span>
										{/if}
											{hook h="displayProductPriceBlock" product=$product type="price"}
											{hook h="displayProductPriceBlock" product=$product type="unit_price"}
									{/if}
								</div>
							
						
						
						
					</div>
					</li>
					{/foreach}
					</ul>
					<div class="cclearfix"></div>					
				</div>
		</div>
	</div>
	
	{/if}
	</div>
	{/foreach}
	
</div>

<script type="text/javascript">
	$(window).ready(function() {
		runSliderHometab();
	});

	$(window).resize(function() {
			runSliderHometab();
	});
	
	function runSliderHometab(){
	
	var item_hometab = 5;
		if(getWidthBrowser() > 1380)
		{	
			item_hometab = 8; 
		}
		else
		if(getWidthBrowser() > 1180)
		{	
			item_hometab = 5; 
		}
		else
		if(getWidthBrowser() > 991)
		{	
			item_hometab = 4; 
		}
		else
		if(getWidthBrowser() > 767)
		{	
			item_hometab = 3; 
		}		
		else
		if(getWidthBrowser() > 540)
		{	
			item_hometab = 2; 
		}
		else
		if(getWidthBrowser() > 340)
		{	
			item_hometab = 2; 
		}
/*		
		if(getWidthBrowser() <=767){
			$('#tabs div.title_tab_hide_show').show();
			
		} else {		
			$('#tabs div.title_tab_hide_show').hide();
		}*/
		
		
			{foreach from=$tabs item=tab name=tabs}
			$("#carousel{$smarty.foreach.tabs.iteration|intval} li:nth-child("+item_hometab+")").addClass("last_item");
			$('#carousel{$smarty.foreach.tabs.iteration|intval}').carouFredSel({
				responsive: true,
				width: '100%',
				prev: '#prev{$smarty.foreach.tabs.iteration|intval}',
				next: '#next{$smarty.foreach.tabs.iteration|intval}',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:260,
					visible: {
						min: 1,
						max: item_hometab
					}
				},
				scroll: {
					items:item_hometab,
					direction : 'left',    
					duration  : 1200 ,  
					onBefore: function(data) { 
						
					},
					onAfter	: function(data) {
						 $('#carousel{$smarty.foreach.tabs.iteration|intval}')
							.find('img.lazy')
							.each(function() {
							   var src = $(this).attr('data-original');
							  $(this).attr('src', src);
							});
		
						var n=5;
						n=data.items.visible.length;
						$("#carousel{$smarty.foreach.tabs.iteration|intval} li").removeClass("first_item");
						$("#carousel{$smarty.foreach.tabs.iteration|intval} li:nth-child(1)").addClass("first_item");
				   }
				}
			});
			{if $isMobile==0}
			{break}
			{/if}
			{/foreach}
	}
	


</script>
</div>
</div>
{/if}


