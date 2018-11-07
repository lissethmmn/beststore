{*
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

<div class="panel">
	<div class="row swasfegd-header">
		<div class="col-xs-6 col-md-6 text-center text-muted">
			{l s='Set Manual Prices.' mod='swachilexpress'}
		</div>
	</div>

	<hr />
</div>

<div class="panel">
	<p style="">
		<table class="table">
			<tr>
				<th>{l s='ID' mod='swachilexpress'}</th>
				<th>{l s='State' mod='swachilexpress'}</th>
				<th>{l s='Price' mod='swachilexpress'}</th>
			</tr>
			
			{foreach key=cid item=con from=$state}
			<tr>
				<td>{$con.id_state|escape:'htmlall':'UTF-8'}</td>
				<td>{$con.name|escape:'htmlall':'UTF-8'}</td>
				<td><input type="text" name="shipPrice{$con.id_state|escape:'htmlall':'UTF-8'}" id="shipPrice" value="{$con.ship_price|escape:'htmlall':'UTF-8'}" onChange="updatePrice({$con.id_state|escape:'htmlall':'UTF-8'}, this.value)"></td>
			</tr>
			{/foreach}
			
		</table>
	</p>
</div>