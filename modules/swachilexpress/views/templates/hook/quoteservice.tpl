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
<div class="cart_navigation" style="padding: 36px;">
<p align="center"><img src="{$module_dir|escape:'htmlall':'UTF-8'}logo.png" width="50" height="50" /></p>
<a id="inline" href="#data" class="btn btn-default">{l s='Shipping cost with Chilexpress' mod='swachilexpress'}</a>
</div>
<div style="display:none"><div id="data"> 
<form action="" method="post" name="frmChilexQuote">
<table class="table">
	<tr>
		<td><img src="{$module_dir|escape:'htmlall':'UTF-8'}logo.png" width="100" height="100" /></td>
		<td>{l s='You want to know how much you are sending this product? You can check the shipping price using this option' mod='swachilexpress'}</td>
	</tt>
	<tr>
		<td><label for="origin">{l s='Origin' mod='swachilexpress'}</label></td>
		<td><select name="origin" id="origin">
		{foreach key=cid item=con from=$states}
			<option value="{$con.iso_code|escape:'htmlall':'UTF-8'}">{$con.name|escape:'htmlall':'UTF-8'}</option>
		{/foreach}
		</select></td>
	</tr>
	<tr>
		<td><label for="destination">{l s='Destination' mod='swachilexpress'}</label></td>
		<td><select name="destination" id="destination">
		{foreach key=cid item=con from=$states}
			<option value="{$con.iso_code|escape:'htmlall':'UTF-8'}">{$con.name|escape:'htmlall':'UTF-8'}</option>
		{/foreach}
		</select></td>
	</tr>
	<tr>
		<td>{l s='The shipping cost is:' mod='swachilexpress'}&nbsp;<h1><div id="cost"></div></h1></td>
	</tr>
	<tr>
		<td colspan="2">
	<input class="hidden" type="hidden" value="{$id_product|escape:'htmlall':'UTF-8'}" name="id_product" id="id_product">
	<input class="hidden" type="hidden" value="{$module_dir|escape:'htmlall':'UTF-8'}" name="module_dir" id="module_dir">
	<input class="hidden" type="hidden" value="{$width|escape:'htmlall':'UTF-8'}" name="width" id="width">
	<input class="hidden" type="hidden" value="{$height|escape:'htmlall':'UTF-8'}" name="height" id="height">
	<input class="hidden" type="hidden" value="{$depth|escape:'htmlall':'UTF-8'}" name="depth" id="depth">
	<input class="hidden" type="hidden" value="{$weight|escape:'htmlall':'UTF-8'}" name="weight" id="weight">
	<div class="submit">
		<button id="SubmitCreate" class="button btn btn-default button-large" name="SubmitCreate" type="button" onClick="quote()">{l s='Send' mod='swachilexpress'}</button>
	</div></td>
	</tr>
</table>
</form>

</div></div>
</div>
{literal}
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<link rel="stylesheet" href="../modules/swachilexpress/views/css/jquery.fancybox.css" type="text/css" media="screen" />
<script>
$(document).ready(function() {

	/* This is basic - uses default settings */
	
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});
	
	
	
});
</script>
{/literal}


