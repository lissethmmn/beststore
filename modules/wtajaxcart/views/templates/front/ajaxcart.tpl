{**
* 2007-2017 PrestaShop
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
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}


<div class="ajax-cart-container">
          <div class="card-block">
            <h1 class="h1">{l s='Shopping Cart' d='Shop.Theme.Checkout'}</h1>
          </div>
          {block name='cart_detailed_product'}
			  <div class="cart-overview js-cart" data-refresh-url="{url entity='cart' params=['ajax' => true, 'action' => 'refresh']}">
				{if $cart.products}
				<ul class="cart-items">
				  {foreach from=$cart.products item=product}
					<li class="cart-item">
					  
						<div class="product-line-grid">
								  <!--  product left content: image-->
								  <div class="product-line-grid-left">
									<span class="product-image media-middle">
									  <img src="{$product.cover.bySize.cart_default.url}" alt="{$product.name|escape:'quotes'}">
									</span>
									<a class="remove-from-cart" rel="nofollow"
											  href="{$product.remove_from_cart_url}"
											  data-link-action="delete-from-cart"
											  data-id-product="{$product.id_product|escape:'javascript'}"
											  data-id-product-attribute="{$product.id_product_attribute|escape:'javascript'}"
											  data-id-customization="{$product.id_customization|escape:'javascript'}"
										  >
											{if !isset($product.is_gift) || !$product.is_gift}
											<i class="material-icons float-xs-left">delete</i>
											{/if}
										  </a>
								  </div>

								  <!--  product left body: description -->
								  <div class="product-line-grid-body col-md-4 col-xs-8">
									<div class="product-line-info">
									  <a class="label" href="{$product.url}" data-id_customization="{$product.id_customization|intval}">{$product.name}</a>
									</div>

									<div class="product-line-info product-price h5 {if $product.has_discount}has-discount{/if}">
									  {if $product.has_discount}
										<div class="product-discount">
										  <span class="regular-price">{$product.regular_price}</span>
										  {if $product.discount_type === 'percentage'}
											<span class="discount discount-percentage">
												-{$product.discount_percentage_absolute}
											  </span>
										  {else}
											<span class="discount discount-amount">
												-{$product.discount_to_display}
											  </span>
										  {/if}
										</div>
									  {/if}
									  <div class="current-price">
										<span class="price">{$product.price}</span>
										{if $product.unit_price_full}
										  <div class="unit-price-cart">{$product.unit_price_full}</div>
										{/if}
									  </div>
									</div>

									<br/>

									{foreach from=$product.attributes key="attribute" item="value"}
									  <div class="product-line-info">
										<span class="label">{$attribute}:</span>
										<span class="value">{$value}</span>
									  </div>
									{/foreach}
								</div>
					   <!--  product left body: description -->
								  <div class="product-line-grid-right product-line-actions">
									
										
										  <div class="col-md-6 col-xs-6 qty">
											{if isset($product.is_gift) && $product.is_gift}
											  <span class="gift-quantity">{$product.quantity}</span>
											{else}
											  <input
												class="js-cart-line-product-quantity"
												data-down-url="{$product.down_quantity_url}"
												data-up-url="{$product.up_quantity_url}"
												data-update-url="{$product.update_quantity_url}"
												data-product-id="{$product.id_product}"
												type="text"
												value="{$product.quantity}"
												name="product-quantity-spin"
												min="{$product.minimal_quantity}"
											  />
											  <i class="material-icons">clear</i>
											  <span class="price">{$product.price}</span>
											{/if}
										  </div>
										  <div class="col-md-6 col-xs-2 price">
											<span class="product-price">
											  <strong>
												{if isset($product.is_gift) && $product.is_gift}
												  <span class="gift">{l s='Gift' d='Shop.Theme.Checkout'}</span>
												{else}
												  {$product.total}
												{/if}
											  </strong>
											</span>
										  </div>
										
									  
									  <div class="col-md-2 col-xs-2 text-xs-right">
										<div class="cart-line-product-actions">
										  

										 

										</div>
									  </div>
									
								  </div>
					  
					  
					  
					</li>
					{if $product.customizations|count >1}<hr>{/if}
				  {/foreach}
				</ul>
				{else}
				  <span class="no-items">{l s='There are no more items in your cart' d='Shop.Theme.Checkout'}</span>
				{/if}
			  </div>
		{/block}
		  {block name='cart_totals'}
              {include file='checkout/_partials/cart-detailed-totals.tpl' cart=$cart}
            {/block}
			{block name='cart_actions'}
              {include file='checkout/_partials/cart-detailed-actions.tpl' cart=$cart}
            {/block}
</div>