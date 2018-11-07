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

function addCurrenLayerToObj(layerObj, lang_id_arr)
{
	if($('#dropHere .dragthis.layer_selected').length > 0)
	{
		var id_curren_order = $('#dropHere .dragthis.layer_selected').find('.order').val();
		$.each(lang_id_arr, function(key, value)
		{
			var text_html = htmlspecialchars_decode($('.layer-general #captext_'+value).val());
			text_html = text_html.replace('\n','');
			text_html = text_html.replace('\t','');
			layerObj[id_curren_order]['captext'][value] = text_html;
			layerObj[id_curren_order]['capimage'][value] = $('.layer-general #capimage_'+value).val();
			layerObj[id_curren_order]['capvideo'][value] = $('.layer-general #capvideo_'+value).val();
			layerObj[id_curren_order]['link'][value] = $('.layer-general #link_'+value).val();
		});
		layerObj[id_curren_order]['params']['widthv'] = $('#widthv').val();
		layerObj[id_curren_order]['params']['heightv'] = $('#heightv').val();
		layerObj[id_curren_order]['params']['typev'] = $('#typev').val();
		layerObj[id_curren_order]['params']['style'] = $('#style').val();
		layerObj[id_curren_order]['params']['class'] = $('#class').val();
		layerObj[id_curren_order]['params']['parallaxlevel'] = $('#parallaxlevel').val();
		layerObj[id_curren_order]['params']['datax'] = $('#datax').val();
		layerObj[id_curren_order]['params']['datay'] = $('#datay').val();
		layerObj[id_curren_order]['params']['offsetxin'] = $('#offsetxin').val();
		layerObj[id_curren_order]['params']['offsetxout'] = $('#offsetxout').val();
		layerObj[id_curren_order]['params']['offsetyin'] = $('#offsetyin').val();
		layerObj[id_curren_order]['params']['offsetyout'] = $('#offsetyout').val();
		layerObj[id_curren_order]['params']['showuntil'] = $('#showuntil').val();
		layerObj[id_curren_order]['params']['durationin'] = $('#durationin').val();
		layerObj[id_curren_order]['params']['durationout'] = $('#durationout').val();
		layerObj[id_curren_order]['params']['easingin'] = $('#easingin').val();
		layerObj[id_curren_order]['params']['easingout'] = $('#easingout').val();
		layerObj[id_curren_order]['params']['fadein'] = $('#fadein').val();
		layerObj[id_curren_order]['params']['fadeout'] = $('#fadeout').val();
		layerObj[id_curren_order]['params']['rotatein'] = $('#rotatein').val();
		layerObj[id_curren_order]['params']['rotateout'] = $('#rotateout').val();
		layerObj[id_curren_order]['params']['rotatexin'] = $('#rotatexin').val();
		layerObj[id_curren_order]['params']['rotatexout'] = $('#rotatexout').val();
		layerObj[id_curren_order]['params']['rotateyin'] = $('#rotateyin').val();
		layerObj[id_curren_order]['params']['rotateyout'] = $('#rotateyout').val();
		layerObj[id_curren_order]['params']['scalexin'] = $('#scalexin').val();
		layerObj[id_curren_order]['params']['scalexout'] = $('#scalexout').val();
		layerObj[id_curren_order]['params']['scaleyin'] = $('#scaleyin').val();
		layerObj[id_curren_order]['params']['scaleyout'] = $('#scaleyout').val();
		layerObj[id_curren_order]['params']['skewxin'] = $('#skewxin').val();
		layerObj[id_curren_order]['params']['skewxout'] = $('#skewxout').val();
		layerObj[id_curren_order]['params']['skewyin'] = $('#skewyin').val();
		layerObj[id_curren_order]['params']['skewyout'] = $('#skewyout').val();
		layerObj[id_curren_order]['params']['transformoriginin'] = $('#transformoriginin').val();
		layerObj[id_curren_order]['params']['transformoriginout'] = $('#transformoriginout').val();
		layerObj[id_curren_order]['params']['delayin'] = $('#delayin_'+id_curren_order).val();
	}
}

function layerHandle(layerObj,lang_id_arr)
{
	$.each(layerObj, function( key, value)
	{
	  $.each(lang_id_arr, function( key1, value1)
		{
			if (layerObj[key]['captext'])
			{
				layerObj[key]['captext'][value1] = htmlspecialchars_decode(layerObj[key]['captext'][value1]);
				layerObj[key]['captext'][value1] = htmlspecialchars_decode(layerObj[key]['captext'][value1]);
			}
		});
	});
	return layerObj;
}

function setLayerAdd(layerObj,id_order,lang_id_arr)
{
	$('#dropHere .dragthis').removeClass("layer_selected");
	var layerSelect = layerObj[id_order];
	
	if(typeof(layerSelect) != "undefined")
	{
		if(layerSelect['type']==2)
		{
			$('.image-form').css('display','block');
			$('.video-form').css('display','none');
		}
		else if(layerSelect['type']==3)
		{
			$('.video-form').css('display','block');
			$('.image-form').css('display','none');
			$('.link-form').css('display','none');
		}
		else
		{
			$('.image-form').css('display','none');
			$('.video-form').css('display','none');
		}
		$.each(lang_id_arr, function(key, value)
		{
			$('.layer-general #captext_'+value).val(htmlspecialchars_decode(layerSelect['captext'][value]));
			$('.layer-general #capimage_'+value).val(layerSelect['capimage'][value]);
			$('.layer-general #capvideo_'+value).val(layerSelect['capvideo'][value]);
			$('.layer-general #link_'+value).val(layerSelect['link'][value]);
		});
		$('#widthv').val(layerSelect['params']['widthv']);
		$('#heightv').val(layerSelect['params']['heightv']);
		$('#typev').val(layerSelect['params']['typev']);
		$('#style').val(layerSelect['params']['style']);
		$('#datax').val(layerSelect['params']['datax']);
		$('#datay').val(layerSelect['params']['datay']);
		$('#class').val(layerSelect['params']['class']);
		$('#parallaxlevel').val(layerSelect['params']['parallaxlevel']);
		$('#offsetxin').val(layerSelect['params']['offsetxin']);
		$('#offsetxout').val(layerSelect['params']['offsetxout']);
		$('#offsetyin').val(layerSelect['params']['offsetyin']);
		$('#offsetyout').val(layerSelect['params']['offsetyout']);
		$('#showuntil').val(layerSelect['params']['showuntil']);
		$('#durationin').val(layerSelect['params']['durationin']);
		$('#durationout').val(layerSelect['params']['durationout']);
		$('#easingin').val(layerSelect['params']['easingin']);
		$('#easingout').val(layerSelect['params']['easingout']);
		$('#fadein').val(layerSelect['params']['fadein']);
		$('#fadeout').val(layerSelect['params']['fadeout']);
		$('#rotatein').val(layerSelect['params']['rotatein']);
		$('#rotateout').val(layerSelect['params']['rotateout']);
		$('#rotatexin').val(layerSelect['params']['rotatexin']);
		$('#rotatexout').val(layerSelect['params']['rotatexout']);
		$('#rotateyin').val(layerSelect['params']['rotateyin']);
		$('#rotateyout').val(layerSelect['params']['rotateyout']);
		$('#scalexin').val(layerSelect['params']['scalexin']);
		$('#scalexout').val(layerSelect['params']['scalexout']);
		$('#scaleyin').val(layerSelect['params']['scaleyin']);
		$('#scaleyout').val(layerSelect['params']['scaleyout']);
		$('#skewxin').val(layerSelect['params']['skewxin']);
		$('#skewxout').val(layerSelect['params']['skewxout']);
		$('#skewyin').val(layerSelect['params']['skewyin']);
		$('#skewyout').val(layerSelect['params']['skewyout']);
		$('#transformoriginin').val(layerSelect['params']['transformoriginin']);
		$('#transformoriginout').val(layerSelect['params']['transformoriginout']);
		
		$('#delayin_'+id_order).val(layerSelect['params']['delayin']);
		$('.layer-item').removeClass('delayin_selected');
		$('.layer-item-'+id_order).addClass('delayin_selected');
		
		$('#slide_layer_'+id_order).addClass("layer_selected");
	}
	else
		alert('error id_order');
}

function addItemObj(layerObj, layerdefault, id_new)
{
	var layerDefaultObj_new  = $.parseJSON(layerdefault);
	new_obj_df = layerdefaultHandle(layerDefaultObj_new,lang_id_arr);
	
	$.each(lang_id_arr, function(key, value)
	{
		new_obj_df['captext'][value] = 'Layer Text '+id_new;
		new_obj_df['capimage'][value] = 'Layer Image '+id_new;
		new_obj_df['capvideo'][value] = 'Layer Video '+id_new;
	});
	new_obj_df['params']['delayin'] = (id_new+1)*300;
	layerObj[id_new] = new_obj_df;
	return layerObj;
}

function addItemImageObj(layerObj, layerdefault, img_insert, id_new)
{
	var layerDefaultObj_new  = $.parseJSON(layerdefault);
	new_obj_df = layerdefaultHandle(layerDefaultObj_new,lang_id_arr);
	
	new_obj_df['type'] = 2;
	$.each(lang_id_arr, function(key, value)
	{
		new_obj_df['capimage'][value] = img_insert;
		new_obj_df['captext'][value] = 'Image ' +id_new;
	});
	new_obj_df['params']['delayin'] = (id_new+1)*300;
	layerObj[id_new] = new_obj_df;
	return layerObj;
}

function addItemVideoObj(layerObj, layerdefault, video_insert, img_video_prev,widthv,heightv,id_new,type_video)
{
	var layerDefaultObj_new  = $.parseJSON(layerdefault);
	new_obj_df = layerdefaultHandle(layerDefaultObj_new,lang_id_arr);
	
	new_obj_df['type'] = 3;
	$.each(lang_id_arr, function(key, value)
	{
		new_obj_df['capvideo'][value] = video_insert;
		new_obj_df['capimage'][value] = img_video_prev;
		new_obj_df['captext'][value] = 'Video '+id_new;
	});
	new_obj_df['params']['widthv'] = widthv;
	new_obj_df['params']['heightv'] = heightv;
	new_obj_df['params']['typev'] = type_video;
	new_obj_df['params']['delayin'] = (id_new+1)*300;
	layerObj[id_new] = new_obj_df;
	return layerObj;
}

function layerdefaultHandle(layerDefaultObj_h, lang_id_arr)
{
	$.each(lang_id_arr, function(key, value)
	{
		layerDefaultObj_h['captext'][value] = 'Layer text';
		layerDefaultObj_h['capvideo'][value] = '';
		layerDefaultObj_h['capimage'][value] = '';
		layerDefaultObj_h['link'][value] = '#';
	});
	return layerDefaultObj_h;
}

function setLayerSelected(layerObj,id_order,lang_id_arr)
{
	addCurrenLayerToObj(layerObj,lang_id_arr);
	$('#dropHere .dragthis').removeClass("layer_selected");
	var layerSelect = layerObj[id_order];
	
	if(typeof(layerSelect) != "undefined")
	{
		if(layerSelect['type']==2)
		{
			$('.image-form').css('display','block');
			$('.video-form').css('display','none');
			$('.link-form').css('display','block');
		}
		else if(layerSelect['type']==3)
		{
			$('.video-form').css('display','block');
			$('.image-form').css('display','none');
			$('.link-form').css('display','none');
		}
		else
		{
			$('.image-form').css('display','none');
			$('.video-form').css('display','none');
			$('.link-form').css('display','block');
		}
		$.each(lang_id_arr, function(key, value)
		{
			$('.layer-general #captext_'+value).val(htmlspecialchars_decode(layerSelect['captext'][value]));
			$('.layer-general #capimage_'+value).val(layerSelect['capimage'][value]);
			$('.layer-general #capvideo_'+value).val(layerSelect['capvideo'][value]);
			$('.layer-general #link_'+value).val(layerSelect['link'][value]);
		});
		$('#widthv').val(layerSelect['params']['widthv']);
		$('#heightv').val(layerSelect['params']['heightv']);
		$('#typev').val(layerSelect['params']['typev']);
		$('#style').val(layerSelect['params']['style']);
		$('#datax').val(layerSelect['params']['datax']);
		$('#datay').val(layerSelect['params']['datay']);
		$('#class').val(layerSelect['params']['class']);
		$('#parallaxlevel').val(layerSelect['params']['parallaxlevel']);
		$('#offsetxin').val(layerSelect['params']['offsetxin']);
		$('#offsetxout').val(layerSelect['params']['offsetxout']);
		$('#offsetyin').val(layerSelect['params']['offsetyin']);
		$('#offsetyout').val(layerSelect['params']['offsetyout']);
		$('#showuntil').val(layerSelect['params']['showuntil']);
		$('#durationin').val(layerSelect['params']['durationin']);
		$('#durationout').val(layerSelect['params']['durationout']);
		$('#easingin').val(layerSelect['params']['easingin']);
		$('#easingout').val(layerSelect['params']['easingout']);
		$('#fadein').val(layerSelect['params']['fadein']);
		$('#fadeout').val(layerSelect['params']['fadeout']);
		$('#rotatein').val(layerSelect['params']['rotatein']);
		$('#rotateout').val(layerSelect['params']['rotateout']);
		$('#rotatexin').val(layerSelect['params']['rotatexin']);
		$('#rotatexout').val(layerSelect['params']['rotatexout']);
		$('#rotateyin').val(layerSelect['params']['rotateyin']);
		$('#rotateyout').val(layerSelect['params']['rotateyout']);
		$('#scalexin').val(layerSelect['params']['scalexin']);
		$('#scalexout').val(layerSelect['params']['scalexout']);
		$('#scaleyin').val(layerSelect['params']['scaleyin']);
		$('#scaleyout').val(layerSelect['params']['scaleyout']);
		$('#skewxin').val(layerSelect['params']['skewxin']);
		$('#skewxout').val(layerSelect['params']['skewxout']);
		$('#skewyin').val(layerSelect['params']['skewyin']);
		$('#skewyout').val(layerSelect['params']['skewyout']);
		$('#transformoriginin').val(layerSelect['params']['transformoriginin']);
		$('#transformoriginout').val(layerSelect['params']['transformoriginout']);
		
		$('#delayin_'+id_order).val(layerSelect['params']['delayin']);
		$('.layer-item').removeClass('delayin_selected');
		$('.layer-item-'+id_order).addClass('delayin_selected');
		
		$('#slide_layer_'+id_order).addClass("layer_selected");
	}
	else
		alert('error id_order');
}

function csdroppable()
{
	$('#dropHere').droppable(
    {
        accept: '.dragthis',
        over : function(){
            $(this).animate({'border-width' : '3px',
                             'border-color' : '#0f0'
                            }, 400);
            $('.dragthis').draggable('option','containment',$(this));
        }
    });
}

function cssortable(layerObj)
{
	$('#layer-sort-ul').sortable({
		cursor: 'move',
		axis: 'y',
		stop: function()
		{	
			$( "#layer-sort-ul li" ).each(function(index)
			{
				$(this).find('.delayin_value').val(odersObj[index]);
				var order_id = $(this).find('.order_layer').val();
				layerObj[order_id]['params']['delayin'] = odersObj[index];
			});
		}
	});
}

function csdraggable()
{
	$('.dragthis').draggable(
    {
        containment: $('#dropHere'),
        drag: function()
		{
        },
        stop: function()
		{
            var finalxPos = $(this).css('left');
            var finalyPos = $(this).css('top');
			finalxPos = finalxPos.replace('px','');
			finalxPos = $.trim(finalxPos);
			
			finalyPos = finalyPos.replace('px','');
			finalyPos = $.trim(finalyPos);
			
            $('input[name="params[datax]"]').val(finalxPos);
            $('input[name="params[datay]"]').val(finalyPos);
        },
        revert: 'invalid'
    });
}

function changeLangInfor(id_lang)
{
	var id_order_layer = $('#dropHere .layer_selected').find('.order').val();
	var typel = layerObj[id_order_layer]['type'];
	if(typel == 3)
	{
		var img = layerObj[id_order_layer]['capimage'][id_lang];
		var img_update = '<img src="'+img+'"/>';
		$('#dropHere .layer_selected .l-video').html(img_update);
	}
	else if(typel == 2)
	{
		var img = layerObj[id_order_layer]['capimage'][id_lang];
		var img_update = '<img src="'+image_layerurl+img+'"/>';
		$('#dropHere .layer_selected .l-img').html(img_update);
	}
	else
	{
		var text = layerObj[id_order_layer]['captext'][id_lang];
		$('#dropHere .layer_selected .l-text').html(text);
	}
}

function insertImage(url)
{
	if (!!$.prototype.fancybox)
		$.fancybox({
			'padding':  0,
			'width':    900,
			'height':   500,
			'type':     'iframe',
			'href':     url
		});
}

function insertVideo(url)
{
	if (!!$.prototype.fancybox)
		$.fancybox({
			'padding':  0,
			'maxWidth': 800,
			'maxHeight':400,
			'width':    '100%',
			'height':   '100%',
			'type':     'iframe',
			'href':     url
		});
}