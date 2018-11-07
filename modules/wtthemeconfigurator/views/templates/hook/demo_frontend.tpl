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
*  @author    Codespot SA <support@presthemes.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div id="demo_frontend" class="demo_frontend_close">
<a href="javascript:void(0);" class="close-demo_frontend wt_close"><span> </span></a>
	<div id="demo_icon_set">
		<i class="icon-cog icon-2x"></i>
	</div>
	<div id="demo_container">
		<ul>
			
			
			{if count($color_bgs)>0}
			<li>
			<span class="head show">{l s='Color' mod='wtthemeconfigurator'}</span>
			<div class="demo_content">
			{foreach from=$color_bgs item=color_bg key=elem_color}
				<div class="color_item clearfix">
					<span>{$color_bg[0]|escape:'html':'UTF-8'}</span>
					<div id="{$elem_color|escape:'html':'UTF-8'}" class="bg_color_setting " style="cursor:pointer;{if !isset($smarty.cookies.$elem_color) && isset($options_admin.$elem_color) && $options_admin.$elem_color != ''}background:{$options_admin.$elem_color|escape:'html':'UTF-8'}{elseif isset($smarty.cookies.$elem_color) && $smarty.cookies.$elem_color != ''}background:{$smarty.cookies.$elem_color|escape:'html':'UTF-8'}{else}background:{$color_bg[2]|escape:'html':'UTF-8'}{/if}">text</div>
					
					{if isset($color_bg[0])}<span class="note">{$color_bg[1]|escape:'html':'UTF-8'}</span>{/if}
				</div>
			{/foreach}
			</div>
			</li>
			{/if}
			
			<li>
				<span class="head show">{l s='Mode Width' mod='wtthemeconfigurator'}</span>
				<div class="demo_content">
					<div class="radio-inline">
						<label>
							<input type="radio" name="mode_css" value="box" {if !isset($smarty.cookies.mode_css_input) && isset($options_admin.box_mode) && $options_admin.box_mode == 1}checked="checked"{elseif isset($smarty.cookies.mode_css_input) && $smarty.cookies.mode_css_input == 'box'}checked="checked"{/if}> {l s='Box' mod='wtthemeconfigurator'}
						</label>
					</div>
					<div class="radio-inline">
						<label>
							<input type="radio" name="mode_css" value="wide" {if isset($options_admin.box_mode) && $options_admin.box_mode == 0}checked="checked"{elseif isset($smarty.cookies.mode_css_input) && $smarty.cookies.mode_css_input == 'wide'}checked="checked"{/if}> {l s='Wide' mod='wtthemeconfigurator'}
						</label>
					</div>
				</div>
			</li>
			
			
			
			{if count($font_list_demo)>0}
			<li>
				<span class="head">{l s='Font' mod='wtthemeconfigurator'}</span>
				<div class="demo_content" style="display: none;">
				{foreach from=$font_list item=font key=elem_font}
					<div class="font_item">
						<p class="font-title"><label>{$font[0]|escape:'quotes':'UTF-8'}</label></p>
						<select name="{$elem_font|escape:'quotes':'UTF-8'}" id="{$elem_font|escape:'quotes':'UTF-8'}" onchange="showResultChooseFont('{$elem_font|escape:'quotes':'UTF-8'}','{$font[1]|escape:'quotes':'UTF-8'}')" class="">
						{foreach from=$font_list_demo item=font_demo key=elem_font_demo}
							{$font_demo|escape:'quotes':'UTF-8' nofilter}}
						{/foreach}
						</select>
					</div>
					<script type="text/javascript">	
						$(document).ready(function() {
							$("#{$elem_font|escape:'quotes':'UTF-8'}").val('{if !isset($smarty.cookies.$elem_font) && isset($options_admin.$elem_font) && $options_admin.$elem_font != ''}{$options_admin.$elem_font|escape:"quotes":"UTF-8"}{elseif isset($smarty.cookies.$elem_font) && $smarty.cookies.$elem_font != ''}{$smarty.cookies.$elem_font|escape:"quotes":"UTF-8"}{/if}');
						});
					</script>
				{/foreach}
				</div>
			</li>
			{/if}
			
		</ul>
		<div class="reset"><input type="button" class="btn btn-default button" id="wt_reset" value="{l s='Reset' mod='wtthemeconfigurator'}" /></div>
	</div>
</div>

<script type="application/javascript">
var baseDir = '{$path_ssl|escape:'html':'UTF-8'}';
var page_name = '{$page_name|escape:'html':'UTF-8'}';
$(function(){

var color_cookie = '';
function ColorEv (i,selector)
{
	$("#" + i).ColorPicker({
		color: "#0000ff",
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$("#" + i).css("background", "#" + hex);
			$.cookie("" + i + "", "#" + hex);
			for(var key in selector)
			{
				if(key)
				{
					if(key.indexOf("_")!=-1)
					{
						var arrKey=key.split('_');
						var new_key=arrKey[0];
						var percent=parseInt(arrKey[1])*-1;
						var NewColor = LightenDarkenColor($.cookie(i),percent);
						$("" + selector[key] + "").css("" + new_key + "","" +NewColor+ "");
						
					}
					else
					{
						$("" + selector[key] + "").css("" + key + "","" + $.cookie(i) + "");
						
						color_cookie = $.cookie(i);
						var temp = selector[key];
						var selector_array = new Array();
						
						var selector_array = temp.split(",");
						for (j = 0; j < selector_array.length; j++)
						{ 
							var n = selector_array[j].indexOf(":hover ");
							if (n > 0)
							{
								var element_hover = selector_array[j].substr(0, n);
								var n1 = n+7;
								var child_hover = selector_array[j].substr(n1, selector_array[j].length);
								
								$(element_hover).hover(function() {		
								$('.quick-view',this).css("background-color",$.cookie(i));
								$('.button.ajax_add_to_cart_button',this).css("background-color",$.cookie(i));
								}, function() {
								$('.quick-view',this).css('background-color', '#f5f5f5');
								$('.button.ajax_add_to_cart_button',this).css('background-color','#f5f5f5');
								}); 
							}
						}
						
					}
						
				}
			}		
			
		}
	});
	if ($.cookie("" + i + "") != null)
	{
		$("#" + i + "").css("background","" + $.cookie(i) + "");
		for(var key in selector)
			if(key)
				{
				if(key.indexOf("_")!=-1)
					{
						var arrKey=key.split('_');
						var new_key=arrKey[0];
						var percent=parseInt(arrKey[1])*-1;
						var NewColor = LightenDarkenColor($.cookie(i),percent);
						$("" + selector[key] + "").css("" + new_key + "","" +NewColor+ "");
					}
					else
					{
						$("" + selector[key] + "").css("" + key + "","" + $.cookie(i) + "");
						
							color_cookie = $.cookie(i);
						var temp = selector[key];
						var selector_array = new Array();
						
						var selector_array = temp.split(",");
						for (j = 0; j < selector_array.length; j++)
						{ 
							var n = selector_array[j].indexOf(":hover ");
							if (n > 0)
							{
								var element_hover = selector_array[j].substr(0, n);
								var n1 = n+7;
								var child_hover = selector_array[j].substr(n1, selector_array[j].length);
								
								$(element_hover).hover(function() {		
								$('.quick-view',this).css('background-color', $.cookie(i));
								$('.button.ajax_add_to_cart_button',this).css("background-color",$.cookie(i));
								}, function() {
								$('.quick-view',this).css('background-color', '#f5f5f5');
								$('.button.ajax_add_to_cart_button',this).css('background-color', '#f5f5f5');
								}); 
							}
						}
					}
						
				}
	}
}


$(document).ready(function() {

	$(document).on('click', '#demo_icon_set', function() {
			if ($("#demo_frontend").hasClass('slideShowPanel'))
			{
				
				$('#demo_frontend').animate({
				right:'-276px',
				}, 500);  
				$("#demo_frontend").removeClass('slideShowPanel');
			}
			else
			{
				$('#demo_frontend').animate({
				right:'0px',
				}, 500);
				$("#demo_frontend").addClass('slideShowPanel');
			}
			
		});
		$(document).on('click', '.close-demo_frontend', function() {
			if ($("#demo_frontend").hasClass('slideShowPanel'))
			{
				
				$('#demo_frontend').animate({
				right:'-276px',
				}, 500);  
				$("#demo_frontend").removeClass('slideShowPanel');
			}
			else
			{
				$('#demo_frontend').animate({
				right:'0px',
				}, 500);
				$("#demo_frontend").addClass('slideShowPanel');
			}
			
		});
	
	var data={$config_data|escape:'quotes':'UTF-8' nofilter};
	
	for(var key in data)
	{
		if(key)
			ColorEv(key,data[key]["selector"]);
	}
	var data_body_col = {$config_body_col|escape:'quotes':'UTF-8' nofilter};
	//ColorEv(data_body_col[1],data_body_col["selector"]["color"]);

});
function LightenDarkenColor(col, amt) {
    var usePound = false;
    if (col[0] == "#") {
        col = col.slice(1);
        usePound = true;
    }
    var num = parseInt(col,16);
    var r = (num >> 16) + amt;
    if (r > 255) r = 255;
    else if  (r < 0) r = 0;
    var b = ((num >> 8) & 0x00FF) + amt;
 
    if (b > 255) b = 255;
    else if  (b < 0) b = 0;
 
    var g = (num & 0x0000FF) + amt;
 
    if (g > 255) g = 255;
    else if (g < 0) g = 0;
 
    return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);
  
}
});
</script>