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
			{l s='Logs.' mod='swachilexpress'}
		</div>
	</div>

	<hr />
</div>

<div class="panel">
	<p style="">
		<table class="table">
			<tr>
				<th>{l s='ID' mod='swachilexpress'}</th>
				<th>{l s='Date' mod='swachilexpress'}</th>
				<th>{l s='Id Order' mod='swachilexpress'}</th>
				<th>{l s='Process' mod='swachilexpress'}</th>
				<th>{l s='Description' mod='swachilexpress'}</th>
			</tr>
			
			{foreach key=cid item=con from=$log}
			<tr>
				<td>{$con.id_swachilexpresslog|escape:'htmlall':'UTF-8'}</td>
				<td>{$con.date|escape:'htmlall':'UTF-8'}</td>
				<td>{$con.id_order|escape:'htmlall':'UTF-8'}</td>
				<td>{$con.process|escape:'htmlall':'UTF-8'}</td>
				<td>{$con.desc|escape:'htmlall':'UTF-8'}</td>
			</tr>
			{/foreach}
			
		</table>
	</p>
</div>