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

{$id_lang = Context::getContext()->language->id}
<form id="cs_slider_caption_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&configure=wtslideshow&tab_module=front_office_features&module_name=wtslideshow&token={Tools::getAdminTokenLite('AdminModules')|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data">
<div class="cs-caption-form defaultForm">
	<div class="">
		<div class="form-wrapper">
			<div class="message-note"></div>
			<div id="dropHere" class="dropHere" style="background-image:url('{$image_baseurl|escape:'html':'UTF-8'}{$slide.image|escape:'html':'UTF-8'}');width:{$slier_option_arr.width|intval}px;height:{$slier_option_arr.height|intval}px;"
 >
				{$k=0}
				{foreach from=$captions item=caption}
					<div id="slide_layer_{$k|intval}" class="dragthis" style="z-index:{$k|intval};position: absolute;left:{$caption.params.datax|intval}px; top: {$caption.params.datay|intval}px;">
						{if $caption.type == 3}
							<div id="layer_text_{$k|intval}" class="layer_text l-video ls-l {$caption.params.style|escape:'html':'UTF-8'} {$caption.params.class|escape:'html':'UTF-8'}">
								<img src="{$caption.capimage[$id_lang]|escape:'html':'UTF-8'}" width="{$caption.params.widthv|intval}" height="{$caption.params.heightv|intval}"/>
							</div>
						{elseif $caption.type == 2}
							<div id="layer_text_{$k|intval}" class="layer_text l-img ls-l {$caption.params.style|escape:'html':'UTF-8'} {$caption.params.class|escape:'html':'UTF-8'}">
								<img src="{$image_layerurl|escape:'html':'UTF-8'}{$caption.capimage[$id_lang]|escape:'html':'UTF-8'}"/>
							</div>
						{else}
							<div id="layer_text_{$k|intval}" class="layer_text l-text ls-l {$caption.params.style|escape:'html':'UTF-8'} {$caption.params.class|escape:'html':'UTF-8'}">{$caption.captext[$id_lang]|escape:'quotes':'UTF-8'}</div>
						{/if}
						<input type="hidden" name="id_caption_{$k|intval}" class="id_caption" value="{$caption.id_caption|intval}"/>
						<input type="hidden" name="order_{$k|intval}" class="order" value="{$k|intval}"/>
					</div>
					{$k=$k+1}
				{/foreach}
			</div>
			<div class="editor-button-layer cs-section col-lg-12 clearfix">
				<ul>
					<li><a id="cs_add_layer_text" href="javascript:void(0)">{l s='Add Layer' mod='wtslideshow'}</a></li>
					<li><a id="cs_add_layer_image" href="javascript:void(0)" rel="{$link_controler_add_layer_image|escape:'html':'UTF-8'}">{l s='Add Layer Images' mod='wtslideshow'}</a></li>
					<li><a id="cs_add_layer_video" href="javascript:void(0)" rel="{$link_controler_add_layer_video|escape:'html':'UTF-8'}">{l s='Add Layer Video' mod='wtslideshow'}</a></li>
					<li class="button-right"><a id="cs_delete_all_layer" href="javascript:void(0)">{l s='Delete All Layer' mod='wtslideshow'}</a></li>
					<li class="button-right">
					<a id="cs_delete_layer" href="javascript:void(0)">{l s='Delete Layer' mod='wtslideshow'}</a></li>
				</ul>
			</div>
			<div class="group-layer-config col-lg-12">
			<div class="layer-general col-lg-6 clearfix">
				<h3>{l s='Layer General Parameters' mod='wtslideshow'}</h3>
				<div class="form-group">
					<label class="control-label col-lg-2">{l s='Style' mod='wtslideshow'}</label>
					<div class="col-lg-8">
						<select name="params[style]" id="style" class="style fixed-width-xl">
							<option value="no_style" selected="selected">no_style</option>
							{foreach from=$layer_style item = style key = k}				
								{$style|escape:'quotes':'UTF-8'}
							{/foreach}
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">{l s='TEXT/HTML' mod='wtslideshow'}</label>
					<div class="col-lg-8">
						{foreach from=$languages item=language}
							{if $languages|count > 1}
								<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
							{/if}
							<div class="col-lg-10">
							<textarea type="text" class="captext" id="captext_{$language.id_lang|intval}" name="captext_{$language.id_lang|intval}" onkeyup="updateCapText(this,{$language.id_lang|intval});">{l s='Layer text' mod='wtslideshow'}</textarea>
							</div>
							{if $languages|count > 1}
								<div class="col-lg-2">
									<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
										{$language.iso_code|escape:'html':'UTF-8'}
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										{foreach from=$languages item=lang}
										<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});javascript:changeLangInfor({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
										{/foreach}
									</ul>
								</div>
							{/if}
							{if $languages|count > 1}
								</div>
							{/if}
						{/foreach}
					</div>
				</div>
				<div class="form-group image-form" style="display:none">
					<label class="control-label col-lg-2">{l s='Layer Image' mod='wtslideshow'}</label>
					<div class="col-lg-8">
						{foreach from=$languages item=language}
							{if $languages|count > 1}
								<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
							{/if}
							<div class="col-lg-10">
							<input type="text" class="capimage" id="capimage_{$language.id_lang|intval}" name="capimage_{$language.id_lang|intval}" value="Layer Image" readonly="readonly"/>
							<a id="cs_add_layer_image_lang" href="javascript:void(0)" rel="{$link_controler_add_layer_image|escape:'html':'UTF-8'}&id_lang={$language.id_lang|intval}">{l s='Change Images' mod='wtslideshow'}</a>
							</div>
							{if $languages|count > 1}
								<div class="col-lg-2">
									<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
										{$language.iso_code|escape:'html':'UTF-8'}
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										{foreach from=$languages item=lang}
										<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});javascript:changeLangInfor({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
										{/foreach}
									</ul>
								</div>
							{/if}
							{if $languages|count > 1}
								</div>
							{/if}
						{/foreach}
					</div>
				</div>
				<div class="form-group video-form" style="display:none">
					<label class="control-label col-lg-2">{l s='Layer Video' mod='wtslideshow'}</label>
					<div class="col-lg-8">
						{foreach from=$languages item=language}
							{if $languages|count > 1}
								<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
							{/if}
							<div class="col-lg-10 capvideodiv">
								<input type="text" class="capvideo" id="capvideo_{$language.id_lang|intval}" name="capvideo_{$language.id_lang|intval}" value="Layer Video" readonly="readonly"/>
						
								<a id="cs_add_layer_video_lang" href="javascript:void(0)" rel="{$link_controler_add_layer_video|escape:'html':'UTF-8'}&id_lang={$language.id_lang|intval}">{l s='Change Video' mod='wtslideshow'}</a>
								<input type="hidden" name="video_id_lang" class="video_id_lang" value="{$language.id_lang|intval}"/>
							</div>
							{if $languages|count > 1}
								<div class="col-lg-2">
									<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
										{$language.iso_code|escape:'html':'UTF-8'}
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										{foreach from=$languages item=lang}
										<li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});javascript:changeLangInfor({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
										{/foreach}
									</ul>
								</div>
							{/if}
							{if $languages|count > 1}
								</div>
							{/if}
						{/foreach}
						<input type="hidden" id="widthv" name="params[widthv]" value=""/>
						<input type="hidden" id="heightv" name="params[heightv]" value=""/>
						<input type="hidden" id="typev" name="params[typev]" value=""/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-lg-2">{l s='Data X' mod='wtslideshow'}</label>
					<div class="col-lg-2">
						<input type="text" id="datax" name="params[datax]" onkeyup="updateOffsetX(this);" value="200">
					</div>
					<div class="col-lg-1"><span>px</span></div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">{l s='Data Y' mod='wtslideshow'}</label>
					<div class="col-lg-2">
						<input type="text" id="datay" name="params[datay]" onkeyup="updateOffsetY(this);" value="200">
					</div>
					<div class="col-lg-1"><span>px</span></div>
				</div>
				<div class="form-group link-form">
					<label class="control-label col-lg-2">{l s='Link layer' mod='wtslideshow'}</label>
					<div class="col-lg-8">
						{foreach from=$languages item=language}
							{if $languages|count > 1}
								<div class="translatable-field lang-{$language.id_lang|intval}" {if $language.id_lang != $id_language}style="display:none"{/if}>
							{/if}
							<div class="col-lg-10">
							<input type="text" class="link-layer" id="link_{$language.id_lang|intval}" name="link_{$language.id_lang|intval}" value=""/>
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
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">{l s='Parallax Level ' mod='wtslideshow'}</label>
					<div class="col-lg-8">
						<input type="text" id="parallaxlevel" name="params[parallaxlevel]" value="0">
						<p>{l s='A fancy parallax effect by moving your mouse over the slider. Value : a number' mod='wtslideshow'}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-2">{l s='Special Class' mod='wtslideshow'}</label>
					<div class="col-lg-8">
						<input type="text" id="class" name="params[class]" value="">
					</div>
				</div>
			</div>
			<div class="layer-sort col-lg-6 clearfix">
				<h3>{l s='Layers Timing & Sorting' mod='wtslideshow'}</h3>
				{$d=0}
				<ul id="layer-sort-ul">
				{foreach from=$captions item=caption}
				<li class="ui-state-default">
					<div class="form-group layer-item layer-item-{$d|intval}">
						<label class="control-label col-lg-7" title="{l s='Delays the layer transitions with the specified amount of time in milliseconds.' mod='wtslideshow'}">
						{$caption.captext[$id_lang]|escape:'quotes':'UTF-8'|strip_tags|truncate:45:'...'}</label>
						<div class="col-lg-3">
							<span class="delayin">{l s='Delayin' mod='wtslideshow'}</span>
							<input type="text" id="delayin_{$d|intval}" class="delayin_value" name="params[delayin]" value="{$caption.params.delayin|escape:'html':'UTF-8'}">
							<input type="hidden" name="order_layer_{$d|intval}" class="order_layer" value="{$d|intval}"/>
						</div>
						<div class="col-lg-2">
							<span class="layer-ms-delay">ms</span>
							<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
						</div>
					</div>
				</li>
				{$d=$d+1}
				{/foreach}
				</ul>
			</div>
			</div>
			{include file="./caption_transitions.tpl"}
		</div>
		<div class="panel-footer col-lg-12">
			<a href="index.php?controller=AdminModules&configure=wtslideshow&token={$token|escape:'html':'UTF-8'}&id_slide={$id_slide|intval}" class="btn btn-default"><i class="process-icon-back"></i> {l s='Cancel' mod='wtslideshow'}</a>
			<a href="index.php?controller=AdminModules&configure=wtslideshow&token={$token|escape:'html':'UTF-8'}" class="btn btn-default"><i class="process-icon-back"></i> {l s='Back to list' mod='wtslideshow'}</a>
			<input type="hidden" name="id_slide" id="id_slide" value="{$id_slide|intval}"/>
			<div id="canvasloader-container" class="wrapper-loading"></div>
			<button type="button" value="1" id="module_form_submit_btn" name="submitCaption" class="btn btn-default pull-right">
			<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
			</button>
		</div>
	</div>
</div>
<form>
<script type="text/javascript">
//<![CDATA[
	var layerStr = '{$layers|escape:"quotes":"UTF-8"}';
	var oders_str = '{$oders_str|escape:"quotes":"UTF-8"}';
	var lang_id_str = '{$lang_id_str|escape:"quotes":"UTF-8"}';
	var layerdefault = '{$layer_default|escape:"quotes":"UTF-8"}';
	var token = "{$token|escape:'html':'UTF-8'}";
	var cs_ajax_link = "{$cs_ajax_link|escape:'html':'UTF-8'}";
	var lang_id_arr  = $.parseJSON(lang_id_str);
	var odersObj = $.parseJSON(oders_str);
	var image_layerurl = "{$image_layerurl|escape:'html':'UTF-8'}";
	var layerDefaultObj  = $.parseJSON(layerdefault);
	layerDefaultObj = layerdefaultHandle(layerDefaultObj,lang_id_arr);
	var layerObj0  = $.parseJSON(layerStr);
	var layerObj  = layerHandle(layerObj0,lang_id_arr);
	
	var csloading = new CanvasLoader('canvasloader-container');
	var loaderObj = document.getElementById("canvasLoader");
	loaderObj.style.position = "absolute";
	loaderObj.style["top"] = csloading.getDiameter() * -0.5 + "px";
	loaderObj.style["left"] = csloading.getDiameter() * -0.5 + "px";
//]]
</script>