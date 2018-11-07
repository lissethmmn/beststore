/**
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
*/

$(window).load(function()
{
	$("#list_image a.image-layer").click(function(){
		var img_select = $(this).children('.image-layer-value').val();
		$("#imageInsert").val(img_select);
		$("#imageDelete").val(img_select);
		
		var img_order = $(this).children('.image-order').val();
		$("#image-order-del").val(img_order);
		
		$("#list_image a.image-layer").removeClass('image_selected');
		$(this).addClass('image_selected');
		var img_prev='<img src="'+image_path+img_select+'" width="150px"/>';
		$('.image_preview img').remove();
		$('.image_preview').append(img_prev);
	});
	$("#imageInsert").click(function(){
		var img_insert = $(this).val();
		img_insert = img_insert.replace('thumbnail_','');
		img_insert = $.trim(img_insert);
		var thumb_lang = $('input[name=layerlang]').val();
		if(typeof(thumb_lang)=='undefined')
			thumb_lang=0;
		parent.updateslide(img_insert,thumb_lang);
		parent.$.fancybox.close();
	});
	
	$("#imageDelete").click(function()
	{
		var img_del = $(this).val();
		if(img_del!='')
		{
			var folder= 'sliderimages';
			var img_order = $(this).parent('#image_action').find('.image-order-del').val();
			deleteImage(img_del,folder,img_order);
		}
		else
		{
			alert('Please select image');
		}
	});
});

function deleteImage(img_del,folder,img_order)
{
	$.ajax({
		type: 'POST',
		headers: { "cache-control": "no-cache" },
		url: cs_ajax_link,
		data: 'img_del='+img_del+'&folder='+folder,
		success: function(data)
		{
			if(data==1)
			{
				$('#image-'+img_order).remove();
				$('.image_preview img').remove();
				$('#imageInsert').val('');
				$('#image-order-del').val(0);
			}
		},
		error:function(jqXHR, textStatus, errorThrown){
			if(textStatus == "parsererror")
				alert(jqXHR.responseText);
			alert("Ajax Error!!! " + textStatus);
		}
	});
}