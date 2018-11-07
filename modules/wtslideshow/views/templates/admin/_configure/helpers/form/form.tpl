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
	{if $input.type == 'file_lang'}
		<div class="col-lg-9">
			{foreach from=$languages item=language}
				{if $languages|count > 1}
					<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
				{/if}
					<div class="col-lg-6">
						{if isset($fields[0]['form']['images'][$language.id_lang])}
							{$images_l = $fields[0]['form']['images'][$language.id_lang]|escape:'html':'UTF-8'}
						{else}
							{$images_l =''}
						{/if}
						<input id="{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}" type="text" name="{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}" value="{$images_l|escape:'html':'UTF-8'}" readonly />
						
						{if isset($fields[0]['form']['images'][$language.id_lang]) && $fields[0]['form']['images'][$language.id_lang]!=""}
							<div class="img-thumnail">
							<img src="{$image_baseurl|escape:'html':'UTF-8'}sliderimages/thumbnail_{$fields[0]['form']['images'][$language.id_lang]|escape:'html':'UTF-8'}" class="img-thumbnail" width="100"/>
							</div>
						{/if}
						<a id="cs_add_image" href="javascript:void(0)" rel="{$link_controler_add_image|escape:'html':'UTF-8'}&id_lang={$language.id_lang|intval}">{l s='Change Thumbnail' mod='wtslideshow'}</a>
					</div>
				{if $languages|count > 1}
					<div class="col-lg-6">
						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
							{$language.iso_code|escape:'html':'UTF-8'}
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							{foreach from=$languages item=lang}
							<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
							{/foreach}
						</ul>
					</div>
				{/if}
				
				{if $languages|count > 1}
					</div>
				{/if}
				<script type="text/javascript">
				$(document).ready(function(){
					var image_baseurl = "{$image_baseurl|escape:'html':'UTF-8'}";
					$("#{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}-selectbutton").click(function(e){
						$("#{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}").trigger('click');
					});
					$("#{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}").change(function(e){
						var val = $(this).val();
						var file = val.split(/[\\/]/);
						$("#{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|intval}-name").val(file[file.length-1]);
					});
				});
			</script>
			{/foreach}
		</div>
	{/if}
	{if $input.type == 'thumb_lang'}
		<div class="col-lg-9">
			{foreach from=$languages item=language}
				{if $languages|count > 1}
					<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
				{/if}
				<div class="col-lg-4">
				{if isset($fields[0]['form']['thumbnail'][$language.id_lang])}
					{$thumbnail_l = $fields[0]['form']['thumbnail'][$language.id_lang]|escape:'html':'UTF-8'}
				{else}
					{$thumbnail_l =''}
				{/if}
				<input type="text" class="thumbnail" id="thumbnail_{$language.id_lang|intval}" name="thumbnail_{$language.id_lang|intval}" value="{$thumbnail_l|escape:'html':'UTF-8'}" readonly="readonly"/>
				
				{if isset($fields[0]['form']['thumbnail'][$language.id_lang]) && $fields[0]['form']['thumbnail'][$language.id_lang]!=''}	
					<div class="img-thumnail">
						<img src="{$image_baseurl|escape:'html':'UTF-8'}thumbnails/{$thumbnail_l|escape:'html':'UTF-8'}" class="img-thumbnail" width="100"/>
					</div>
				{/if}
				
				<a id="cs_add_thumb_image" href="javascript:void(0)" rel="{$link_controler_add_thumb_image|escape:'html':'UTF-8'}&id_lang={$language.id_lang|intval}">{l s='Change Thumbnail' mod='wtslideshow'}</a>
				</div>
				{if $languages|count > 1}
					<div class="col-lg-2">
						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
							{$language.iso_code|escape:'html':'UTF-8'}
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							{foreach from=$languages item=lang}
							<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
							{/foreach}
						</ul>
					</div>
				{/if}
				{if $languages|count > 1}
					</div>
				{/if}
			{/foreach}
		</div>
	{/if}
	{$smarty.block.parent}
	<script type="text/javascript">
		//<![CDATA[
		var module_dir_url="{$module_dir_url|escape:'html':'UTF-8'}";
		//]]
	</script>
{/block}
