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

{extends file='page.tpl'}
{block name="page_content"}
<div id="mywishlist">
    {capture name=path}
        <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}">{l s='My account' mod='wtblockwishlist'}</a>
        <a href="{$link->getModuleLink('wtblockwishlist', 'mywishlist')|escape:'html':'UTF-8'}">{l s='My wishlists' mod='wtblockwishlist'}</a>
		{if isset($current_wishlist)}
	        {$current_wishlist.name|escape:'html':'UTF-8'}
		{/if}
    {/capture}

	<h1 class="page-title">{l s='My wishlists' mod='wtblockwishlist'}</h1>

	{if $id_customer|intval neq 0}
		<!--<form method="post" class="std" id="form_wishlist">
			<fieldset>
				<h3>{l s='New wishlist' mod='wtblockwishlist'}</h3>
				<div class="input-group">
				  	<input type="hidden" name="token" value="{$token|escape:'html':'UTF-8'}" />
					<input type="text" id="name" name="name" placeholder="{l s='Name' mod='wtblockwishlist'}" class="form-control" value="{if isset($smarty.post.name) and $errors|@count > 0}{$smarty.post.name|escape:'html':'UTF-8'}{/if}" />
				  	<span class="input-group-btn">
				        <button id="submitWishlist" name="submitWishlist" class="btn btn-secondary" type="submit">{l s='Save' mod='wtblockwishlist'}</button>
				    </span>
				</div>
			</fieldset>
		</form>-->
		{if $wishlists}
		<div id="block-history" class="block-center">
			<table class="std table">
				<thead>
					<tr>
						<th class="first_item">{l s='Name' mod='wtblockwishlist'}</th>
						<th class="item mywishlist_first">{l s='Qty' mod='wtblockwishlist'}</th>
						<th class="item mywishlist_first">{l s='Viewed' mod='wtblockwishlist'}</th>
						<th class="item mywishlist_second">{l s='Created' mod='wtblockwishlist'}</th>
						<th class="item mywishlist_second">{l s='Direct Link' mod='wtblockwishlist'}</th>
						<th class="item mywishlist_second">{l s='Default' mod='wtblockwishlist'}</th>
						<th class="last_item mywishlist_first">{l s='Delete' mod='wtblockwishlist'}</th>
					</tr>
				</thead>
				<tbody>
				{section name=i loop=$wishlists}
					<tr id="wishlist_{$wishlists[i].id_wishlist|intval}">
						<td style="width:200px;">
							<a href="javascript:;" onclick="javascript:WishlistManage('block-order-detail', '{$wishlists[i].id_wishlist|intval}');">{$wishlists[i].name|truncate:30:'...'|escape:'html':'UTF-8'}</a>
						</td>
						<td class="bold align_center">
							{assign var=n value=0}
							{foreach from=$nbProducts item=nb name=i}
								{if $nb.id_wishlist eq $wishlists[i].id_wishlist}
									{assign var=n value=$nb.nbProducts|intval}
								{/if}
							{/foreach}
							{if $n}
								{$n|intval}
							{else}
								0
							{/if}
						</td>
						<td>{$wishlists[i].counter|intval}</td>
						<td>{$wishlists[i].date_add|date_format:"%Y-%m-%d"|escape:'html':'UTF-8'}</td>
						<td><a href="javascript:;" onclick="javascript:WishlistManage('block-order-detail', '{$wishlists[i].id_wishlist|intval}');">{l s='View products' mod='wtblockwishlist'}</a></td>
						<td class="wishlist_default">
							{if isset($wishlists[i].default) && $wishlists[i].default == 1}
								<p class="is_wish_list_default">
									<i class="icon icon-check-square"></i>
								</p>
							{else}
								<a href="#" onclick="javascript:event.preventDefault();(WishlistDefault('wishlist_{$wishlists[i].id_wishlist|intval}', '{$wishlists[i].id_wishlist|intval}'));">
									<i class="icon icon-square"></i>
								</a>
							{/if}
						</td>
						<td class="wishlist_delete">
							<a href="javascript:;"onclick="return (WishlistDelete('wishlist_{$wishlists[i].id_wishlist|intval}', '{$wishlists[i].id_wishlist|intval}', '{l s='Do you really want to delete this wishlist ?' mod='wtblockwishlist' js=1}'));">{l s='Delete' mod='wtblockwishlist'}</a>
						</td>
					</tr>
				{/section}
				</tbody>
			</table>
		</div>
		<div id="block-order-detail">&nbsp;</div>
		{/if}
	{/if}

	<div class="footer_links clearfix">
		<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" class="btn btn-primary pull-left"><i class="material-icons">assignment_return</i><span>{l s='Back to Your Account' mod='wtblockwishlist'}</span></a>
		<a href="{$urls.base_url|escape:'html':'UTF-8'}" class="btn btn-secondary pull-right"><i class="material-icons">home</i><span>{l s='Home' mod='wtblockwishlist'}</span></a>
	</div>
</div>
{/block}