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
<div class="top-wishlists">
<a class="icon" href="{$link->getModuleLink('wtblockwishlist', 'mywishlist', array(), true)|escape:'html':'UTF-8'}" title="{l s='My wishlists' mod='wtblockwishlist'}" >
				<i class="material-icons">favorite</i>
				(<span id="item_wishlist_number">{if $wishlist_products}{count($wishlist_products)}{else}0{/if}</span>)
			</span>
</a>
<div id="wishlist_block" class="block account">
	<h4 class="text-uppercase">
		{l s='Wishlist' mod='wtblockwishlist'}
	</h4>
	<div class="block_content">
		<div id="wishlist_block_list" class="expanded">
		{if $wishlist_products}
			<ul class="products">
			{foreach from=$wishlist_products item=product name=i}
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
				{l s='There are no more items in your wishlist' mod='wtblockwishlist'}
			</p>
		{/if}
		</div>
		<p class="lnk">
		<!--{if $wishlists}
			<select name="wishlists" id="wishlists" onchange="WishlistChangeDefault('wishlist_block_list', $('#wishlists').val());">
			{foreach from=$wishlists item=wishlist name=i}
				<option value="{$wishlist.id_wishlist|intval}"{if $id_wishlist eq $wishlist.id_wishlist or ($id_wishlist == false and $smarty.foreach.i.first)} selected="selected"{/if}>{$wishlist.name|truncate:22:'...'|escape:'html':'UTF-8'}</option>
			{/foreach}
			</select>
		{/if}-->
			<a class="btn btn-primary" href="{$link->getModuleLink('wtblockwishlist', 'mywishlist', array(), true)|escape:'html':'UTF-8'}" title="{l s='My wishlists' mod='wtblockwishlist'}" >
				{l s='My wishlists' mod='wtblockwishlist'}
			</a>
		</p>
	</div>
</div>
</div>