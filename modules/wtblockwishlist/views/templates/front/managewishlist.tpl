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
	{if !$refresh}
	<div class="wishlistLinkTop">
		<!--<a href="#" id="hideWishlist" class="button_account" onclick="WishlistVisibility('wishlistLinkTop', 'Wishlist'); return false;" title="{l s='Close this wishlist' mod='wtblockwishlist'}" ><i class="material-icons close">close</i></a>-->
		<ul class="clearfix display_list">
			<li>
				<a href="#" id="hideBoughtProducts" class="button_account"  onclick="WishlistVisibility('wlp_bought', 'BoughtProducts'); return false;" title="{l s='Hide products' mod='wtblockwishlist'}">{l s='Hide products' mod='wtblockwishlist'}</a>
				<a href="#" id="showBoughtProducts" class="button_account"  onclick="WishlistVisibility('wlp_bought', 'BoughtProducts'); return false;" title="{l s='Show products' mod='wtblockwishlist'}">{l s='Show products' mod='wtblockwishlist'}</a>
			</li>
			<!--{if count($productsBoughts)}
			<li>
				<a href="#" id="hideBoughtProductsInfos" class="button_account" onclick="WishlistVisibility('wlp_bought_infos', 'BoughtProductsInfos'); return false;" title="{l s='Hide products' mod='wtblockwishlist'}">{l s='Hide bought products info' mod='wtblockwishlist'}</a>
				<a href="#" id="showBoughtProductsInfos" class="button_account"  onclick="WishlistVisibility('wlp_bought_infos', 'BoughtProductsInfos'); return false;" title="{l s='Show products' mod='wtblockwishlist'}">{l s='Show bought products info' mod='wtblockwishlist'}</a>
			</li>
			{/if}-->
		</ul>
		
		<!--<p class="submit">
			<div id="showSendWishlist">
				<a href="#" class="button_account exclusive" onclick="WishlistVisibility('wl_send', 'SendWishlist'); return false;" title="{l s='Send this wishlist' mod='wtblockwishlist'}">{l s='Send this wishlist' mod='wtblockwishlist'}</a>
			</div>
		</p>-->
	</div>
	{/if}
	<div class="wlp_bought">
		<div class="clearfix row wlp_bought_list">
		{foreach from=$products item=product name=i}
			<div id="wlp_{$product.id_product|intval}_{$product.id_product_attribute|escape:'html':'UTF-8'}" class="col-md-3 col-sm-4 col-xs-6 address {if $smarty.foreach.i.index % 2}alternate_{/if}item">
				<a href="javascript:;" class="lnkdel" onclick="WishlistProductManage('wlp_bought', 'delete', '{$id_wishlist|intval}', '{$product.id_product|intval}', '{$product.id_product_attribute|escape:'html':'UTF-8'}', $('#quantity_{$product.id_product|intval}_{$product.id_product_attribute|escape:'html':'UTF-8'}').val(), $('#priority_{$product.id_product|intval}_{$product.id_product_attribute|escape:'html':'UTF-8'}').val());" title="{l s='Delete' mod='wtblockwishlist'}"><i class="material-icons close">close</i></a>
				<div class="clearfix">
					<div class="product_image">
						<a href="{$link->getProductlink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}" title="{l s='Product detail' mod='wtblockwishlist'}">
							<img class="img-fluid" src="{$link->getImageLink($product.link_rewrite, $product.cover, 'medium_default')|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}" />
						</a>
					</div>
					<div class="product_infos">
						<div id="s_title" class="product_name"><a href="{$link->getProductlink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html'}">{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}</a></div>
						<div class="wishlist_product_detail">
							{*
							{if isset($product.attributes_small)}
								<a href="{$link->getProductlink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html'}" title="{l s='Product detail' mod='wtblockwishlist'}">{$product.attributes_small|escape:'html':'UTF-8'}</a>
							{/if}
							*}
							<div class="form-inline">
  								<label class="form-control-label">{l s='Qty' mod='wtblockwishlist'}:</label>
								<input type="text" class="form-control quantity" style="width: 50px;" id="quantity_{$product.id_product|intval}_{$product.id_product_attribute|escape:'html':'UTF-8'}" value="{$product.quantity|intval}"/>
								<!--<label class="form-control-label">{l s='Priority' mod='wtblockwishlist'}:</label>
								<select id="priority_{$product.id_product|intval}_{$product.id_product_attribute|escape:'html':'UTF-8'}" class="priority custom-select">
									<option value="0"{if $product.priority eq 0} selected="selected"{/if}>{l s='High' mod='wtblockwishlist'}</option>
									<option value="1"{if $product.priority eq 1} selected="selected"{/if}>{l s='Medium' mod='wtblockwishlist'}</option>
									<option value="2"{if $product.priority eq 2} selected="selected"{/if}>{l s='Low' mod='wtblockwishlist'}</option>
								</select>-->
							</div>
							{if $wishlists|count > 1}
								<br>
								{l s='Move' mod='wtblockwishlist'}:
								<br>
                                {foreach name=wl from=$wishlists item=wishlist}
                                    {if $smarty.foreach.wl.first}
                                       <select class="wishlist_change_button custom-select">
                                       <option>---</option>
                                    {/if}
                                    {if $id_wishlist != {$wishlist.id_wishlist}}
	                                        <option title="{$wishlist.name|escape:'html':'UTF-8'}" value="{$wishlist.id_wishlist|intval}" data-id-product="{$product.id_product|intval}" data-id-product-attribute="{$product.id_product_attribute|escape:'html':'UTF-8'}" data-quantity="{$product.quantity|intval}" data-priority="{$product.priority}" data-id-old-wishlist="{$id_wishlist}" data-id-new-wishlist="{$wishlist.id_wishlist}">
	                                                {l s='Move to %s'|sprintf:$wishlist.name mod='wtblockwishlist'}
	                                        </option>
                                    {/if}
                                    {if $smarty.foreach.wl.last}
                                        </select>
                                        <br>
                                    {/if}
                                {/foreach}
                            {/if}
						</div>
					</div>
				</div>
				<div class="btn_action clearfix text-center">
					<a href="javascript:;" class="btn btn-default exclusive lnksave" onclick="WishlistProductManage('wlp_bought_{$product.id_product_attribute|escape:'html':'UTF-8'}', 'update', '{$id_wishlist|intval}', '{$product.id_product|intval}', '{$product.id_product_attribute|escape:'html':'UTF-8'}', $('#quantity_{$product.id_product|intval}_{$product.id_product_attribute|escape:'html':'UTF-8'}').val(), $('#priority_{$product.id_product|intval}_{$product.id_product_attribute|escape:'html':'UTF-8'}').val());" title="{l s='Save' mod='wtblockwishlist'}">
					{l s='Save' mod='wtblockwishlist'}</a>
				</div>
			</div>
		{/foreach}
		</div>
	</div>
	{if !$refresh}
	<form method="post" class="wl_send std" onsubmit="return (false);" style="display: none;">
		<a id="hideSendWishlist" class="button_account icon"  href="#" onclick="WishlistVisibility('wl_send', 'SendWishlist'); return false;"  title="{l s='Close this wishlist' mod='wtblockwishlist'}">
			<i class="material-icons close">close</i>
		</a>
		<fieldset>
			<p class="required">
				<label for="email1">{l s='Email' mod='wtblockwishlist'}1 <sup>*</sup></label>
				<input type="text" class="form-control" name="email1" id="email1" />
			</p>
			{section name=i loop=11 start=2}
			<p>
				<label for="email{$smarty.section.i.index|intval}">{l s='Email' mod='wtblockwishlist'}{$smarty.section.i.index|intval}</label>
				<input type="text" name="email{$smarty.section.i.index|intval}" class="form-control" id="email{$smarty.section.i.index|intval}" />
			</p>
			{/section}
			<p class="submit">
				<input class="btn btn-default" type="submit" value="{l s='Send' mod='wtblockwishlist'}" name="submitWishlist" onclick="WishlistSend('wl_send', '{$id_wishlist|intval}', 'email');" />
			</p>
			<p class="required">
				<sup>*</sup> {l s='Required field' mod='wtblockwishlist'}
			</p>
		</fieldset>
	</form>
	<!--{if count($productsBoughts)}
	<table class="wlp_bought_infos hidden std">
		<thead>
			<tr>
				<th class="first_item">{l s='Product' mod='wtblockwishlist'}</th>
				<th class="item">{l s='Quantity' mod='wtblockwishlist'}</th>
				<th class="item">{l s='Offered by' mod='wtblockwishlist'}</th>
				<th class="last_item">{l s='Date' mod='wtblockwishlist'}</th>
			</tr>
		</thead>
		<tbody>
		{foreach from=$productsBoughts item=product name=i}
			{foreach from=$product.bought item=bought name=j}
			{if $bought.quantity > 0}
				<tr>
					<td class="first_item">
						<span style="float:left;"><img src="{$link->getImageLink($product.link_rewrite, $product.cover, 'small')|escape:'html'}" alt="{$product.name|escape:'html':'UTF-8'}" /></span>
						<span style="float:left;">
							{$product.name|truncate:40:'...'|escape:'html':'UTF-8'}
						{if isset($product.attributes_small)}
							<br /><i>{$product.attributes_small|escape:'html':'UTF-8'}</i>
						{/if}
						</span>
					</td>
					<td class="item align_center">{$bought.quantity|intval}</td>
					<td class="item align_center">{$bought.firstname|escape:'html':'UTF-8'} {$bought.lastname|escape:'html':'UTF-8'}</td>
					<td class="last_item align_center">{$bought.date_add|date_format:"%Y-%m-%d"|escape:'html':'UTF-8'}</td>
				</tr>
			{/if}
			{/foreach}
		{/foreach}
		</tbody>
	</table>
	{/if}-->
	{/if}
{else}
	<p class="warning">{l s='No products' mod='wtblockwishlist'}</p>
{/if}
