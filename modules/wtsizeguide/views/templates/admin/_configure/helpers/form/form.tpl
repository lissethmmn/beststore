{**
* 2007-2018 PrestaShop
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
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{extends file="helpers/form/form.tpl"}
{block name="field"}
	{if $input.type == 'category_list'}
		<select class="form-control fixed-width-xxl ps_link col-md-9" name="id_cat" id="id_cat">
			<option value="0">{l s='All category' mod='wtsizeguide'}</option>
			{include file="./menu_item_cat.tpl" cat_option = $cat_options}
		</select>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#id_cat").val('{if isset($cat_value) &&  $cat_value != ''}{$cat_value|intval}{/if}');
			});
			var ajax_url = "{$ajax_url|escape:'html':'UTF-8'}";
		</script>
	
	{else if $input.type == 'select_product'}		
			<select class="form-control fixed-width-lg col-md-9" name="product" id="product_select" >
				{if $cat_value != 0}
					<option value="{$cat_value|intval}">{$product_select->name|escape:'html':'UTF-8'}</option>
				{else}
					<option value="0">{l s='All Product' mod='wtsizeguide'}</option>
				{/if}
			</select>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}
