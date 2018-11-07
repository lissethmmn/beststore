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





<div class="item product-box ajax_block_product js-product-miniature" data-id-product="{$product.id_product|escape:'quotes':'UTF-8'}" data-id-product-attribute="{$product.id_product_attribute|escape:'quotes':'UTF-8'}">

							 <div class="out-product-image-container col-sm-6">

									<div class="product-image-container">

										<a class="product_img_link" href="{$product.link|escape:'html':'UTF-8'}" title="" itemprop="url">

											<img class="zoomIn replace-2x img-responsive wt-image" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title=""  itemprop="image" />

										</a>

										{hook h='displayProductListReviews' product=$product}

												{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}

																			{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}

																					<p class="discount-percentage animated" href="{$product.link|escape:'html':'UTF-8'}">

																								<span class="sale">

																								{if $product.specific_prices && $product.specific_prices.reduction_type == 'percentage'}

																								-{$product.specific_prices.reduction|escape:'quotes':'UTF-8' * 100}%

																								{else}

																								- {Tools::displayPrice($product.specific_prices.reduction)}

																								{/if}

																								</span>

																							</p>

																			{/if}

																			{/if}

									

									

									

									{hook h='displayProductListThumbnailsSpecial' product=$product}

									</div>

								</div>

							

							<div class="product-info-container col-sm-6">

								<div class="out-content">

									<h3 class="product-name">

										<a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.legend|escape:html:'UTF-8'}">{$product.name|escape:'html':'UTF-8'|truncate:18:''}</a>

									</h3>

									

									<p class="product-desc" itemprop="description">

										{$product.description_short|strip_tags|escape:'html':'UTF-8'|truncate:110:'...'}

									</p>

									{hook h='displayProductAttributes' product=$product}

									

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

									

									

									

									

									{if isset($product.sold_quantity) && $product.sold_quantity > 0}

									<div class="alreadly-sold">

										<p class="sold">{l s='Alreadly Sold: ' mod='wtspecials'}<span>{$product.sold_quantity|intval}</span>

										</p>

										<p class="available">{l s='Available: ' mod='wtspecials'}<span>{$product.quantity|intval}</span></p>

										<div class="bar-sold"><p class="percent" style="width: {$product.percent|escape:'quotes':'UTF-8'}%;"></p></div>

									</div>

									{/if}

									

									{hook h='displayCountDownProduct' product=$product prev_id='sp'}

									

								  </div>

							<div class="wt-button-container">

						{include file='catalog/_partials/customize/button-cart.tpl' product=$product name_module=$name_module}

						{include file='catalog/_partials/customize/button-quickview.tpl' product=$product}

						{hook h='displayProductListFunctionalButtons' product=$product}

						</div>

						

						</div>

</div>

