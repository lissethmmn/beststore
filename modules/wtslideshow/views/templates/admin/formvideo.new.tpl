{**
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

{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
	<link href="{$css_uri|escape:'html':'UTF-8'}" rel="stylesheet" type="text/css" media="{$media|escape:'html':'UTF-8'}" />
	{/foreach}
{/if}

{if isset($js_files)}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
	{/foreach}
{/if}

<form id="formUploadImage" class="defaultForm form-horizontal" action="{$action_url|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data">
<div class="panel" id="fieldset_0">
	<h3>{l s='Layer Video' mod='wtslideshow'}</h3>
</div>
</form>
<div id="type_video">
	<label for="video_radio_youtube">Youtube</label>
	<input type="radio" {if $typev == 0}checked="checked"{/if} id="video_radio_youtube" value="0" name="video_select"/>
	<label for="video_radio_vimeo">Vimeo</label>
	<input type="radio" {if $typev == 1}checked="checked"{/if} id="video_radio_vimeo" value="1" name="video_select"/>
</div>
<hr/>
<div id="video_form">
	<div id="video_youtube" {if $typev == 1}style="display:none"{/if}>
		<label>{l s='Enter Youtube ID or URL' mod='wtslideshow'}</label>
		<input type="text" id="youtube_id" value="{if $id_video!=''}{$id_video|escape:'html':'UTF-8'}{else}{/if}" class="">
		<input type="button" id="button_youtube_search" class="button-regular" value="search">
	</div>
	<div id="video_vimeo" {if $typev == 0}style="display:none"{/if}>
		<label>{l s='Enter Vimeo ID or URL' mod='wtslideshow'}</label>
		<input type="text" id="vimeo_id" value="{if $id_video!=''}{$id_video|escape:'html':'UTF-8'}{else}{/if}" class="">
		<input type="button" id="button_vimeo_search" class="button-regular" value="search">
	</div>
	<div id="video_hidden_controls" style="{if $id_video!=''}display:block{else}display:none{/if}">
	    <div class="out_width">
			<label>{l s='Width' mod='wtslideshow'}</label>
			<input type="text" id="input_video_width" class="input_video_width" value="{if $widthv!=0}{$widthv|intval}{else}320{/if}"/>
        </div>
		<div class="out_width">
			<label>{l s='Height' mod='wtslideshow'}</label>
			<input type="text" id="input_video_height" class="input_video_height" value="{if $heightv!=0}{$heightv|intval}{else}180{/if}"/>
		</div>
		<button id="videoInsert" class="btn btn-default" value="">{l s='Insert' mod='wtslideshow'}</button>
		<input type="hidden" name="layerlang" id="layerlang" value="{$id_lang|intval}"/>
	</div>
</div>
<div id="video_preview">
	<div class="video-title"></div>
	{if $img_url!=''}
		<div class="video-thumbnail-preview">
			<img src="{$img_url|escape:'html':'UTF-8'}" alt="image preview" width="320" height="180"/>
		</div>
		<input type="hidden" name="image_video_prev" id="image_video_prev" value="{$img_url|escape:'html':'UTF-8'}"/>
	{else}
		<div class="video-thumbnail-preview"></div>
		<input type="hidden" name="image_video_prev" id="image_video_prev" value="{$video_prev|escape:'html':'UTF-8'}video_prev_default.jpg"/>
	{/if}
	<div class="video-description"></div>
	<div class='video-error'></div>
</div>
<script type="text/javascript">
//<![CDATA[
var image_path = "{$image_path|escape:'html':'UTF-8'}";
var video_prev = "{$video_prev|escape:'html':'UTF-8'}";
var cs_ajax_link = "{$cs_ajax_link|escape:'html':'UTF-8'}";
var img_video_prev = '';
//]]
</script>