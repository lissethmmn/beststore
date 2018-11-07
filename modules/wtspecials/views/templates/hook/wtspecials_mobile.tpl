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

{$number_line = 1}
<div id="wt-special-products" class="wt-special-products col-xs-12">
	<div class="title-block">
	<h2><a href="{$link->getPageLink('prices-drop')|escape:'html':'UTF-8'}" title="{l s='Hot Deals' mod='wtspecials'}"><span>{l s='Daily Deals!' mod='wtspecials'}</span> {l s='Get our best price' mod='wtspecials'}</a>
	</h2>
	</div>
			<div class="block_content">
			
			<a id="prev_wt_special_product" class="button-arrow prev" href="#">&lt;</a>
			<a id="next_wt_special_product" class="button-arrow next" href="#">&lt;</a>

			
				{if isset($new_products) && count($new_products) > 0}
						<ul id="wt_special_product" class="product-list">
						{$i=0}
						{foreach from=$new_products item=product name=products}	
						{$i=$i+1}	
					<li class="ajax_block_product {if $smarty.foreach.product_list.first|intval}first_item{elseif $smarty.foreach.product_list.last|intval}last_item{/if} js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}">
					<div class="product-block wt_container_thumbnail" wt-name-module="{$name_module|escape:'html':'UTF-8'}" id-tab="1" wt-data-id-product="{$product.id_product|intval}">
						
						<div class="product-image-container">
						<h3 class="product-name"><a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">{$product.name|truncate:50:'...'|strip_tags|escape:'html':'UTF-8'}</a></h3>
									<div class="div-product-image">							
									<a class="product_image" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.legend|escape:'html':'UTF-8'}">
										<img class="img-responsive wt-image" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{$product.legend|escape:'html':'UTF-8'}" />
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
														{if $product.specific_prices && $product.specific_prices.reduction_type == 'percentage'}
														-{$product.specific_prices.reduction|escape:'quotes':'UTF-8' * 100}%
														{else}
														-{$product.price_without_reduction-$product.price|floatval}
														{/if}
														</span>
													</p>
									{/if}
									{/if}
									<div class="thumbs-content" id="{$name_module|escape:'html':'UTF-8'}-1-wt-thumbs-content-{$product.id_product|intval}"></div>
									</div>
									<div>
								
									<div class="review">									
											{hook h='displayProductListReviews' product=$product}
									</div>
							</div>
						</div>
						
						
						
								<div class="content_price product-price-and-shipping">
									{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
										<span itemprop="price" class="price {if isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0} special-price{/if}">												
												{Tools::displayPrice($product.price)}

												</span>
										{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
												<span class="old-price regular-price">
												{Tools::displayPrice($product.price_without_reduction)}
												</span>
										{/if}
											{hook h="displayProductPriceBlock" product=$product type="price"}
											{hook h="displayProductPriceBlock" product=$product type="unit_price"}
									{/if}
								</div>
						
						<div class="wt-button-container wt_hide_text_button">
						{include file='catalog/_partials/customize/button-cart.tpl' product=$product name_module=$name_module}
						{include file='catalog/_partials/customize/button-quickview.tpl' product=$product}
						</div>
						
					</div>
					</li>
							
						{/foreach}
						</ul>
					</div>
					{else}
						<p class="alert alert-warning">{l s='No product at this time' mod='wtspecials'}</p>
					{/if}
						
						
						<script type="text/javascript">
						
						function runSliderSpecial(){
						var item_special = 4;							
								if(getWidthBrowser() > 991)
								{	
									item_special = 4; 
								}
								else
								if(getWidthBrowser() > 767)
								{	
									item_special = 4; 
								}		
								else
								if(getWidthBrowser() > 540)
								{	
									item_special = 2; 
								}
								else
								if(getWidthBrowser() > 340)
								{	
									item_special = 2; 
								}
							$("ul#wt_special_product").carouFredSel({
									auto: false,
									responsive: true,
										width: '100%',
										prev: '#prev_wt_special_product',
										next: '#next_wt_special_product',
										swipe: {
											onMouse: false,
											onTouch: true,
											},
										items: {
											width: 162,
											visible: {
												min: 1,
												max: item_special
											}
										},
										scroll: {
											items : 1 ,       
											direction : 'left',   
											duration  : 300,   
												onBefore: function(data) { 
						
												},
												onAfter	: function(data) {
													 $('ul#wt_special_product')
														.find('img.lazy')
														.each(function() {
														  var src = $(this).attr('data-original');
														  $(this).attr('src', src);
														});
									
													
											   }
										}

								});
						}
							$(document).ready(function() {
								runSliderSpecial();
							});
						</script>
				
</div>