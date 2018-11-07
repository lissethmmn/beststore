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

$(document).ready(function()
{
	csdraggable();
	csdroppable();
	cssortable(layerObj);
	$("#cs_add_layer_text").click(function(){
		addLayerText(layerObj,layerdefault,lang_id_arr);
	});
	$('.layer-sort .layer-item').mousedown(function(event){
		var id_order_layer = $(this).find('.order_layer').val();
		setLayerSelected(layerObj,id_order_layer,lang_id_arr);
	});

	$("button[name='submitCaption']").click(function()
	{
		saveCaptions(layerObj,lang_id_arr);
	});
	$("#cs_delete_layer").click(function()
	{
		deleteCaptions();
	});
	$("#cs_delete_all_layer").click(function()
	{
		deleteAllCaptions();
	});
	$('#style').change(function()
	{
		var styleClass = $('#style').val();
		$('#dropHere .layer_selected div').removeClass();
		$('#dropHere .layer_selected div').addClass('layer_text');
		$('#dropHere .layer_selected div').addClass('ls-l');
		$('#dropHere .layer_selected div').addClass(styleClass);
	});
	
	$(document).on('click', '#cs_add_layer_image,#cs_add_layer_image_lang', function() 
	{
		var url = this.rel;
		insertImage(url);
	});
	
	$(document).on('click', '#cs_add_layer_video', function() 
	{
		var url = this.rel;
		insertVideo(url);
	});
	
	$(document).on('click', '#cs_add_layer_video_lang', function() 
	{
		var url = this.rel;
		var id_lang = $(this).parent('div.capvideodiv').children('.video_id_lang').val();
		if(id_lang!='')
		{
			var id_video = $('#capvideo_'+id_lang).val();
			if(id_video!='')
				url += '&id_video='+id_video;
			var img_url = $('#capimage_'+id_lang).val();;
			if(img_url!='')
				url += '&img_url='+img_url;
			var widthv = $('#widthv').val();
			if(widthv!=0)
				url += '&widthv='+widthv;
			var heightv = $('#heightv').val();
			if(heightv!=0)
				url += '&heightv='+heightv;
			var typev = $('#typev').val();
			if(typev!=0)
				url += '&typev='+typev;
			insertVideo(url);
		}
	});
	
	layerActive(layerObj);
});

function addLayerText(layerObj,layerdefault,lang_id_arr)
{
	var num_layer=$('#dropHere div.dragthis').length;
	if(num_layer == 'undefined')
		num_layer=0;
	var id_new_layer = num_layer;
	
	var htmlLayer='<div id="slide_layer_'+id_new_layer+'" class="dragthis" style="z-index:'+id_new_layer+';position: absolute;left:200px; top:200px"><div class="layer_text l-text ls-l big_black">Layer Text '+id_new_layer+'</div><input type="hidden" name = "id_caption_'+id_new_layer+'" class="id_caption" value=""/><input type="hidden" name = "order_'+id_new_layer+'" class="order" value="'+id_new_layer+'"/></div>';
	$('#dropHere').append(htmlLayer);
	
	var htmlDelayIn = '<li class="ui-state-default"><div class="form-group layer-item layer-item-'+id_new_layer+'"><label class="control-label col-lg-7">Layer text '+id_new_layer+'</label><div class="col-lg-3"><input type="text" id="delayin_'+id_new_layer+'" name="params[delayin]" value=""><input type="hidden" name="order_layer_'+id_new_layer+'" class="order_layer" value="0"></div><div class="col-lg-2"><span class="layer-ms-delay">ms</span><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></div></div></li>';
	
	addCurrenLayerToObj(layerObj,lang_id_arr);
	
	$('#layer-sort-ul').append(htmlDelayIn);
	
	layerObj = addItemObj(layerObj, layerdefault, id_new_layer);
	
	setLayerAdd(layerObj,id_new_layer,lang_id_arr);
	
	$.each(lang_id_arr, function(key, value)
	{
		$('#captext_'+value).val('Layer Text '+id_new_layer);
	});
	csdraggable();
	csdroppable();
	layerActive(layerObj);
}

function saveCaptions(layerObj,lang_id_arr)
{
	addCurrenLayerToObj(layerObj,lang_id_arr);
	var objData = {data:layerObj};
	csloading.show();
	$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			url: cs_ajax_link,
			data: objData,
			success: function(data)
			{
				csloading.hide();
				location.reload();
			},
			error:function(jqXHR, textStatus, errorThrown){
				if(textStatus == "parsererror")
					alert(jqXHR.responseText);
				alert("Ajax Error!!! " + textStatus);
			}
		});
}
function deleteCaptions()
{
	if($('#dropHere .dragthis.layer_selected').length > 0)
	{
		var id_caption_del = $('#dropHere .dragthis.layer_selected').find('.id_caption').val();
		
		$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			url: cs_ajax_link,
			data: 'id_caption='+id_caption_del+'&delete=1',
			success: function(data)
			{
				$("div.layer_selected").remove();
				$("div.delayin_selected").remove();
				location.reload();
				setTimeout(function ()
				{
					$("html, body").animate({ scrollTop: 0 },300);
					$('div.message-note').html('The layer(s) were delete successfully');
					$('div.message-note').addClass('m-success');
				},200);
			},
			error:function(jqXHR, textStatus, errorThrown){
				if(textStatus == "parsererror")
					alert(jqXHR.responseText);
				alert("Ajax Error!!! " + textStatus);
			}
		});
	}
	else
	{
		alert('select a layer!');
	}
}
function deleteAllCaptions()
{
	var id_slide = $('#id_slide').val();
	$.ajax({
		type: 'POST',
		headers: { "cache-control": "no-cache" },
		url: cs_ajax_link,
		data: 'id_slide='+id_slide+'&deleteall=1',
		success: function(data)
		{
			$("#dropHere .dragthis").remove();
			$(".layer-sort .form-group").remove();
			location.reload();
			setTimeout(function ()
			{
				$("html, body").animate({ scrollTop: 0 },300);
				$('div.message-note').html('The layer(s) were delete successfully');
				$('div.message-note').addClass('m-success');
			},200);
		},
		error:function(jqXHR, textStatus, errorThrown){
			if(textStatus == "parsererror")
				alert(jqXHR.responseText);
			alert("Ajax Error!!! " + textStatus);
		}
	});
}

function updateCapimage(img_insert,layer_lang)
{
	if(layer_lang==0 || layer_lang=='0')
		addLayerImage(layerObj,layerdefault,lang_id_arr,img_insert);
	else
		updateLayerImage(layerObj,layer_lang,img_insert);
}
function addLayerImage(layerObj,layerdefault,lang_id_arr,img_insert)
{
	var num_layer=$('#dropHere div.dragthis').length;
	if(num_layer == 'undefined')
		num_layer=0;
	var id_new_layer = num_layer;
	
	var htmlLayer='<div id="slide_layer_'+id_new_layer+'" class="dragthis" style="z-index:'+id_new_layer+'; position: absolute; left: 200px; top: 200px;"><div class="layer_text"><img src="'+image_layerurl+img_insert+'"/></div><input type="hidden" name = "id_caption_'+id_new_layer+'" class="id_caption" value=""/><input type="hidden" name = "order_'+id_new_layer+'" class="order" value="'+id_new_layer+'"/></div>';
	$('#dropHere').append(htmlLayer);
	
	var htmlDelayIn = '<li class="ui-state-default"><div class="form-group layer-item layer-item-'+id_new_layer+' delayin_selected"><label class="control-label col-lg-7">Layer Image</label><div class="col-lg-3"><input type="text" id="delayin_'+id_new_layer+'" name="params[delayin]" value=""><input type="hidden" name="order_layer_'+id_new_layer+'" class="order_layer" value="0"></div><div class="col-lg-2"><span class="layer-ms-delay">ms</span><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></div></div></div>';
	$('#layer-sort-ul').append(htmlDelayIn);
	
	addCurrenLayerToObj(layerObj,lang_id_arr);
	
	layerObj = addItemImageObj(layerObj, layerdefault, img_insert, id_new_layer);
	
	setLayerAdd(layerObj,id_new_layer,lang_id_arr);
	csdraggable();
	csdroppable();
	layerActive(layerObj);
}

function updateLayerImage(layerObj,layer_lang,img_insert)
{
	var htmlLayer='<img src="'+image_layerurl+img_insert+'"/>';
	$('#dropHere .layer_selected .layer_text img').remove();
	$('#dropHere .layer_selected .layer_text').append(htmlLayer);
	var id_order=$('#dropHere .layer_selected .order').val();
	layerObj[id_order]['capimage'][layer_lang] = img_insert;
	$('.layer-general #capimage_'+layer_lang).val(img_insert);
}
function updateCapvideo(video_insert,layer_lang,img_video_prev,widthv,heightv,type_video)
{
	if(layer_lang==0 || layer_lang=='0')
		addLayerVideo(layerObj,layerdefault, video_insert, img_video_prev,widthv,heightv,type_video);
	else 
		updateLayerVideo(layerObj,layer_lang,video_insert,img_video_prev,widthv,heightv,type_video);
}
function addLayerVideo(layerObj,layerdefault,video_insert, img_video_prev,widthv,heightv,type_video)
{
	var num_layer=$('#dropHere div.dragthis').length;
	if(num_layer == 'undefined')
		num_layer=0;
	var id_new_layer = num_layer;
	
	var htmlLayer='<div id="slide_layer_'+id_new_layer+'" class="dragthis" style="z-index:'+id_new_layer+';position: absolute; left: 200px; top: 200px;"><div class="layer_text"><img src="'+img_video_prev+'" width="'+widthv+'" height="'+heightv+'"/></div><input type="hidden" name = "id_caption_'+id_new_layer+'" class="id_caption" value=""/><input type="hidden" name = "order_'+id_new_layer+'" class="order" value="'+id_new_layer+'"/></div>';
	$('#dropHere').append(htmlLayer);
	
	var htmlDelayIn = '<li class="ui-state-default"><div class="form-group layer-item layer-item-'+id_new_layer+' delayin_selected"><label class="control-label col-lg-7">Layer Video</label><div class="col-lg-3"><input type="text" id="delayin_'+id_new_layer+'" name="params[delayin]" value=""><input type="hidden" name="order_layer_'+id_new_layer+'" class="order_layer" value="0"></div><div class="col-lg-2"><span class="layer-ms-delay">ms</span><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></div></div></li>';
	$('#layer-sort-ul').append(htmlDelayIn);
	
	addCurrenLayerToObj(layerObj,lang_id_arr);
	
	layerObj = addItemVideoObj(layerObj, layerdefault, video_insert, img_video_prev,widthv,heightv,id_new_layer,type_video);
	
	setLayerAdd(layerObj,id_new_layer,lang_id_arr);
	
	csdraggable();
	csdroppable();
	layerActive(layerObj);
}

function updateLayerVideo(layerObj,layer_lang,video_insert,img_video_prev,widthv,heightv,type_video)
{
	var htmlLayer='<img src="'+img_video_prev+'" width="'+widthv+'" height="'+heightv+'"/>';
	$('#dropHere .layer_selected .layer_text img').remove();
	$('#dropHere .layer_selected .layer_text').append(htmlLayer);
	var id_order=$('#dropHere .layer_selected .order').val();
	layerObj[id_order]['params']['widthv'] = widthv;
	layerObj[id_order]['params']['heightv'] = heightv;
	layerObj[id_order]['params']['typev'] = type_video;
	
	layerObj[id_order]['capimage'][layer_lang] = img_video_prev;
	layerObj[id_order]['capvideo'][layer_lang] = video_insert;
	$('.layer-general #capimage_'+layer_lang).val(img_video_prev);
	$('.layer-general #capvideo_'+layer_lang).val(video_insert);
	$('.layer-general #widthv').val(widthv);
	$('.layer-general #heightv').val(heightv);
	$('.layer-general #typev').val(type_video);
}
function updateOffsetY(thisis)
{
	var value_input = $(thisis).val();
	$('#dropHere div.layer_selected').css("top", value_input+'px');
}
function updateOffsetX(thisis)
{
	var value_input = $(thisis).val();
	$('#dropHere div.layer_selected').css("left", value_input+'px');
}

function updateCapText(thisis,id_lang)
{
	$('#dropHere div.layer_selected div.layer_text').html($(thisis).val());
	$('.layer-sort .delayin_selected label').html($(thisis).val());
}

function layerActive(layerObj)
{
	$('#dropHere .dragthis').mousedown(function(event){
		var id_order = $(this).find('.order').val();
		setLayerSelected(layerObj,id_order,lang_id_arr);
	});
}