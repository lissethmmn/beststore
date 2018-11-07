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

		{if $products}
			<ul class="products">
			{foreach from=$products item=product name=i}
				<li class="{if $smarty.foreach.i.first}first_item{elseif $smarty.foreach.i.last}last_item{else}item{/if}">
					<div class="product_image">
					<a class="ajax_cart_block_remove_link" href="javascript:;" onclick="javascript:WishlistCart('wishlist_block_list', 'delete', '{$product.id_product|intval}', {$product.id_product_attribute|escape:'html':'UTF-8'}, '0', '{if isset($token)}{$token|escape:'html':'UTF-8'}{/if}');" title="{l s='remove this product from my wishlist' mod='wtblockwishlist'}" ><i class="material-icons">clear</i></a>
					<a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html'}" title="{$product.name|escape:'html':'UTF-8'}">
										<img class="img-responsive wt-image" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}" /> 
									</a>
					</div>
					<div class="infor">
					<span class="quantity-formated"><span class="quantity">{$product.quantity|intval}</span>x</span>
					<h1 class="h3 product-title">
						<a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html'}" title="{$product.name|escape:'html':'UTF-8'}">{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}</a>
					</h1>
					</div>
					
				</li>
				
			{/foreach}
			</dl>
		{else}
			<p class="products">
				{l s='No products' mod='wtblockwishlist'}
				</p>
		{/if}
		
