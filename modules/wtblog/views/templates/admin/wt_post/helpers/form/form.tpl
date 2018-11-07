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
{block name="input"}
	{if $input.name == "link_rewrite"}
		<script type="text/javascript">
		{if isset($PS_ALLOW_ACCENTED_CHARS_URL) && $PS_ALLOW_ACCENTED_CHARS_URL}
			var PS_ALLOW_ACCENTED_CHARS_URL = 1;
		{else}
			var PS_ALLOW_ACCENTED_CHARS_URL = 0;
		{/if}
		var ps_force_friendly_product = false;
		</script>
		{$smarty.block.parent}
	{else if $input.name == "related_posts"}
			<input type="text" size="48" value="" id="opt_post_autocomplete_input" />
			<input type="hidden" id="id_related_posts" name="id_related_posts" value="{$input.id_related_posts|escape:'quotes':'UTF-8'}"/>
			<input type="hidden" id="name_related_posts" name="name_related_posts" value="{$input.name_related_posts|escape:'quotes':'UTF-8'}"/>
			<div id="opt_result_post_autocomplete">
			{$input.string_name_post|escape:'quotes':'UTF-8'}
			</div>
	{else if $input.name == "id_wt_blog_tags"}
		<div class="form-group">
			{foreach from=$languages item=language}
			<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
			<div class="col-lg-9">
					<input type="text" size="48" id="{if isset($input.id)}{$input.id|intval}_{$language.id_lang|intval}{else}{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}{/if}"
													name="{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}"
							value="{$input.post->getTags($language.id_lang, true)|escape:'html':'UTF-8'}" />
			</div>
			{if $languages|count > 1}							
				<div class="col-lg-2">
					<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
						{$language.iso_code|escape:'html':'UTF-8'}
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						{foreach from=$languages item=language}
						<li><a href="javascript:hideOtherLanguage({$language.id_lang|intval});" tabindex="-1">{$language.name|escape:'html':'UTF-8'}</a></li>
						{/foreach}
					</ul>
				</div>
			
			{/if}
				</div>
			{/foreach}
			<div class="col-lg-9">
			<p class="help-block">{l s='Tags separated by commas (e.g. dvd, dvd player, hifi)' mod='wtblog'}</p>
			</div>
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}

