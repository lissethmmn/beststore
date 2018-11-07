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

<div class="ajax_block_product ajax_block_product js-product-miniature" data-id-product="{$product.id_product|escape:'quotes':'UTF-8'}" data-id-product-attribute="{$product.id_product_attribute|escape:'quotes':'UTF-8'}">

					<div class="product-container">	

								<div class="product-image-container">

									<a class="product_img_link" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.legend|escape:html:'UTF-8'}">

										<img class="zoomIn lazy" data-animate="zoomIn" data-delay="100" data-original="{$link->getImageLink($product.link_rewrite, $product.id_image, 'medium_default')|escape:'html':'UTF-8'}" src="{$path_ssl|escape:'html':'UTF-8'}modules/wtproductcategory/views/img/empty-lazy.gif" alt="{$product.legend|escape:'html':'UTF-8'}" />

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

									<div class="wt-button-container">

						{include file='catalog/_partials/customize/button-cart-2.tpl' product=$product name_module=$name_module}

						{include file='catalog/_partials/customize/button-quickview.tpl' product=$product}

						{hook h='displayProductListFunctionalButtons' product=$product}

						</div>		

								</div>

								<div class="col-right">

								<h5 class="product-name"><a class="product-name" href="{$product.link|escape:'html':'UTF-8'}">{$product.name|truncate:15:''|escape:'html':'UTF-8'}</a></h5>

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

							 {hook h='displayProductAttributes' product=$product}

							{hook h='displayCountDownProduct' product=$product prev_id='sp'}

					</div>	

			</div>

