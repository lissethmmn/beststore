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
<div class="add-to-wishlist-button no-print">
	<div id="wishlist_button">
		<select id="idWishlist">
			{foreach $wishlists as $wishlist}
				<option value="{$wishlist.id_wishlist|intval}">{$wishlist.name|escape:'html':'UTF-8'}</option>
			{/foreach}
		</select>
		<button class="btn btn-primary addToWishlist" onclick="WishlistCart('wishlist_block_list', 'add', '{$id_product|intval}', $('#idCombination').val(), document.getElementById('quantity_wanted').value, $('#idWishlist').val()); return false;"  title="{l s='Add to wishlist' mod='wtblockwishlist'}">
			{l s='Add' mod='wtblockwishlist'}
			<i class="material-icons">&#xE87E;</i>
		</button>
	</div>
</div>
{else}
<div class="add-to-wishlist-button-product no-print">
	<a class="button_wishlist addToWishlist" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '{$id_product|intval}', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;"   title="{l s='Add to wishlist' mod='wtblockwishlist'}">
		<i class="material-icons">&#xE87E;</i>
		{l s='Add to wishlist' mod='wtblockwishlist'}
	</a>
</div>
{/if}
