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
	<link href="{$css_uri|escape:'html':'UTF-8'}" rel="stylesheet" type="text/css" media="{$media|escape}" />
	{/foreach}
{/if}

{if isset($js_files)}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
	{/foreach}
{/if}

<form id="formUploadImage" class="defaultForm form-horizontal" action="{$action_url|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data">
<div class="panel" id="fieldset_0">
	<h3>{l s='Select Image Slide' mod='wtslideshow'}</h3>
	<div class="form-wrapper">
		<div class="upload_image_layer">
			<input id="upload_image" type="file" name="upload_image"/>
			<button type="submit" value="1" id="module_form_submit_btn" name="submitUploadImage" class="btn btn-default pull-center">
				{l s='Upload' mod='wtslideshow'}
			</button>
		</div>
	</div>
</div>
</form>
<hr/>
<div id="list_image">
<ul>
	{$i=0}
	{foreach from=$list_images item = images}
		{$i=$i+1}
	<li id="image-{$i|intval}"><a class="image-layer" href="javascript:void(0)">
		<img src="{$image_path|escape:'html':'UTF-8'}{$images|escape:'html':'UTF-8'}"/>
		<input type="hidden" name="image-layer" class="image-layer-value" value="{$images|escape:'html':'UTF-8'}"/>
		<input type="hidden" name="image-order" class="image-order" value="{$i|intval}"/>
	</a></li>
	{/foreach}
</ul>
</div>
<div id="image_action">
<div class="image_preview">
</div>
<button id="imageInsert" class="btn btn-default" value="">{l s='Insert' mod='wtslideshow'}</button>
<button id="imageDelete" class="btn btn-default" value="">{l s='Delete' mod='wtslideshow'}</button>
<input type="hidden" name="layerlang" id="layerlang" value="{$id_lang|intval}"/>
<input type="hidden" name="image-order-del" id="image-order-del" class="image-order-del" value="0"/>
</div>
<script type="text/javascript">
//<![CDATA[
var image_path = "{$image_path|escape:'html':'UTF-8'}";
var cs_ajax_link = "{$cs_ajax_link|escape:'html':'UTF-8'}";
//]]
</script>