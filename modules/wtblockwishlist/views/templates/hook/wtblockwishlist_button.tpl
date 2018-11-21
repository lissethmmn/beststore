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

{if isset($wishlists) && count($wishlists) > 1}
	<div class="wishlist">
		<a class="wishlist_button_list" tabindex="0" data-toggle="popover" data-trigger="focus" title="{l s='Wishlist' mod='wtblockwishlist'}" data-placement="bottom">
			<i class="material-icons">&#xE87E;</i>
			<span>{l s='Add to wishlist' mod='wtblockwishlist'}</span>	
		</a>
		<div hidden class="popover-content">
			{foreach name=wl from=$wishlists item=wishlist}
				<div class="item-wishlist" title="{$wishlist.name|escape:'html':'UTF-8'}" value="{$wishlist.id_wishlist|intval}" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', false, 1, '{$wishlist.id_wishlist|intval}');">{l s='Add to %s' sprintf=[$wishlist.name] mod='wtblockwishlist'}</div>
			{foreachelse}
				<a href="#" id="wishlist_button_nopop" onclick="WishlistCart('wishlist_block_list', 'add', '{$id_product|intval}', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;"   title="{l s='Add to my wishlist' mod='wtblockwishlist'}">
					<i class="material-icons">&#xE87E;</i>
					<span>{l s='Add to wishlist' mod='wtblockwishlist'}</span>
				</a>
			{/foreach}
		</div>
	</div>
{else}
<div class="product-wishlist">
	<a class="medium-button wishlist addToWishlist wishlistProd_{$product.id_product|intval}" href="#" data-rel="{$product.id_product|intval}" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product|intval}', false, 1); return false;" title="{l s='Add to Wishlist' mod='wtblockwishlist'}">
		<span>{l s='Add to wishlist' mod='wtblockwishlist'}</span>
	</a>
	</div>
{/if}