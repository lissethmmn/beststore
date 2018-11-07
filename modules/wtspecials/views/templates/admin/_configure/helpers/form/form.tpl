{*
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file="helpers/form/form.tpl"}

{block name="field"}
	{if $input.type == 'file'}
		{$smarty.block.parent}
		{if isset($fields[0]['form']['banner']) && $fields[0]['form']['banner'] != ''}
		<div class="col-lg-3"></div>
		<div class="col-lg-9" style="margin-top:5px">
			<img src="{$image_baseurl|escape:'html':'UTF-8'}banner/{$fields[0]['form']['banner']|escape:'html':'UTF-8'}" class="img-thumbnail" style="max-height:200px" />
			<a href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtspecials&deletebanner=1">{l s='delete' mod='wtspecials'}</a>
		</div>
		{/if}
	{else}
		{$smarty.block.parent}
	{/if}
{/block}