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
	$("#videoInsert").click(function()
	{
		var type_video = $('input[name=video_select]:checked').val();
		if(type_video == 0)
		{
			var video_insert = $('#youtube_id').val();
				video_insert = $.trim(video_insert);
			video_insert = getYoutubeIDFromUrl(video_insert);
			var widthv= $('#input_video_width').val();
			var heightv= $('#input_video_height').val();
			var layer_lang = $('input[name=layerlang]').val();
			if(typeof(layer_lang)=='undefined')
				layer_lang=0;
			var img_video_prev_update = $('#image_video_prev').val();
			if(typeof(img_video_prev_update)!='undefined' && img_video_prev_update!='')
				var img_video_prev = img_video_prev_update;
			else
				var img_video_prev = video_prev+'video_prev_default.jpg';
			parent.updateCapvideo(video_insert,layer_lang,img_video_prev,widthv,heightv,type_video);
		}
		else /*vimeo*/
		{
			var video_insert = $('#vimeo_id').val();
				video_insert = $.trim(video_insert);
			video_insert = getVimeoIDFromUrl(video_insert);
			var widthv= $('#input_video_width').val();
			var heightv= $('#input_video_height').val();
			var layer_lang = $('input[name=layerlang]').val();
			if(typeof(layer_lang)=='undefined')
				layer_lang=0;
			var img_video_prev_update = $('#image_video_prev').val();
			if(typeof(img_video_prev_update)!='undefined' && img_video_prev_update!='')
			img_video_prev = img_video_prev_update;
			parent.updateCapvideo(video_insert,layer_lang,img_video_prev,widthv,heightv,type_video);
		}
		parent.$.fancybox.close();
	});
	
	$("#button_youtube_search").click(function()
	{	
		var youtubeID = $('#youtube_id').val();
		youtubeID = $.trim(youtubeID);
		youtubeID = getYoutubeIDFromUrl(youtubeID);
		var your_api_key = 'AIzaSyAjwO6S6Jid8F_8UItE23QxGIamRFMJ0aI';
		var urlAPI = "https://www.googleapis.com/youtube/v3/videos?key="+your_api_key+"&part=snippet&id="+youtubeID+"&callback=onYoutubeCallback";
		
		/*https://www.googleapis.com/youtube/v3/videos?key=YOUR_API_KEY&part=snippet&id=VIDEO_ID*/
		$.getScript(urlAPI);
		
		setTimeout("videoDialogOnError()",4000);
		
	});
	
	$("#button_vimeo_search").click(function()
	{	
		var vimeoID = $('#vimeo_id').val();
		vimeoID = $.trim(vimeoID);
		vimeoID = getVimeoIDFromUrl(vimeoID);
		
		var urlAPI = 'http://www.vimeo.com/api/v2/video/' + vimeoID + '.json?callback=onVimeoCallback'; 
			$.getScript(urlAPI);
		$.getScript(urlAPI);
		
		setTimeout("videoDialogOnError()",4000);
		
	});
	
	$("#video_radio_youtube").click(function()
	{
	  $('#video_vimeo').css('display','none');
	  $('#video_youtube').css('display','block');
	});
	
	$("#video_radio_vimeo").click(function()
	{
	  $('#video_vimeo').css('display','block');
	  $('#video_youtube').css('display','none');
	});
});

function videoDialogOnError()
{
	/*if ok, don't do nothing*/
	if($("#video_hidden_controls").is(":visible"))
		return(false);
	
	/*if error - show message*/
	$("#youtube_loader").hide();
	
	$("#video_preview .video-error").html('Video Not Found!');
	
}
function onYoutubeCallback(obj)
{
	$("#youtube_loader").hide();
	var desc_small_size = 200;
	var entry = obj.items[0].snippet;
	
	var data = {};
	data.id = $("#youtube_id").val();
	data.id = $.trim(data.id);
	data.video_type = "youtube";
	data.title = entry.title;
	data.description = entry.description;
	data.desc_small = data.description;
	
	if(data.description.length > desc_small_size)
		data.desc_small = data.description.slice(0,desc_small_size)+"...";
		
	data.thumb_medium = entry.thumbnails.medium;
	setYoutubeDialogHtml(data);
	$("#video_hidden_controls").show();
}

function onVimeoCallback(obj)
{
	$("#vimeo_loader").hide();
	
	var desc_small_size = 200;
	obj = obj[0];
	
	var data = {};
	data.video_type = "vimeo";
	data.id = obj.id;
	data.id = $.trim(data.id);
	data.title = obj.title;
	data.link = obj.url;
	data.author = obj.user_name;
	
	data.description = obj.description;
	if(data.description.length > desc_small_size)
		data.desc_small = data.description.slice(0,desc_small_size)+"...";
	
	data.thumb_large = {url:obj.thumbnail_large,width:640,height:360};
	data.thumb_medium = {url:obj.thumbnail_medium,width:200,height:150};
	data.thumb_small = {url:obj.thumbnail_small,width:100,height:75};
	
	//set html in dialog
	img_video_prev = data.thumb_large.url;
	setYoutubeDialogHtml(data);
	$("#video_hidden_controls").show();
}
	
function setYoutubeDialogHtml(data)
{
	if(!data){
		$("#video_content").html("");
		return(false);
	}
	$('#video_preview .video-title').html(data.title);
	var thumb = data.thumb_medium;
	var useURL = thumb.url;
	var img_prev = '<img src="'+useURL+'" width="'+thumb.width+'" height="'+thumb.height+'" alt="thumbnail">';
	$('#video_preview .video-thumbnail-preview').html(img_prev);
	$('#video_preview .video-description').html(data.desc_small);
	$('#image_video_prev').val(useURL);
}

function getYoutubeIDFromUrl(url){
	url = $.trim(url);
	
	var video_id = url.split('v=')[1];
	if(video_id){
		var ampersandPosition = video_id.indexOf('&');
		if(ampersandPosition != -1) {
		  video_id = video_id.substring(0, ampersandPosition);
		}
	}else{
		video_id = url;
	}
	
	return(video_id);
}

function getVimeoIDFromUrl(url)
{
	url = $.trim(url);
	var video_id = url.replace(/[^0-9]+/g, '');
	video_id = $.trim(video_id);
	return(video_id);
}