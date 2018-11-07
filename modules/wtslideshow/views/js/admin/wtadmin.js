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
	if( typeof layerSliderTransitions !== 'undefined' )
	{
		transitionGallery.init();
		$('#transition2d').parent('div').append($('<div>', { 'class' : 'transitionpreview2d'})
			.append($('<div>', { 'class' : 'inner ls-transition-preview', 'style' : 'width: 200px; height: 100px; margin-top: 10px'}))
		);
		
		$('#transition3d').parent('div').append($('<div>', { 'class' : 'transitionpreview3d'})
			.append($('<div>', { 'class' : 'inner ls-transition-preview', 'style' : 'width: 200px; height: 100px; margin-top: 10px'}))
		);
	}
	$(document).on('click', '#cs_add_thumb_image,#cs_add_image', function() 
	{
		var url = this.rel;
		insertImageThumb(url);
	});
});
var transitionGallery = {
	init : function(){
		var self =  this;
		var image_baseurl = module_dir_url+'img/admin/';
		// Show transitions
		$('#transition2d').change(function()
		{
			var arrValue = $('#transition2d').val();
			self.showTransition(arrValue,image_baseurl,'2d');
		});
		$('#transition3d').change(function()
		{
			var arrValue3d = $('#transition3d').val();
			self.showTransition(arrValue3d,image_baseurl,'3d');
		});
	},
	showTransition : function(arrValue,image_baseurl,type_transition)
	{
		var t2d = '';
		var t3d = '';
		if(type_transition=='2d')
		{
			$.each(arrValue, function( i, val )
			{
				if(i<(arrValue.length-1))
					t2d+= val+',';
				else
					t2d+= val;
			});
			if (t2d=='')
				t2d=0;
		}
		else
		{
			t2d = 'all';
			$.each(arrValue, function( i, val )
			{
				if(i<(arrValue.length-1))
					t3d+= val+',';
				else
					t3d+= val;
			});
			if (t3d == '')
				t3d=0;
		}
		
		var imgPath = '../assets/img/';
		var skinPath = '../../css/skins/';
		$('.transitionpreview'+type_transition+' .transition').remove();
		
		
		$('.transitionpreview'+type_transition).find('.inner').append($('<div>', { 'class' : 'transition', 'style' : 'width: 200px; height: 100px;'})
		.append($('<div>', { 'class' : 'ls-layer', 'data-ls' : 'slidedelay:700;transition2d:'+t2d+';transition3d:'+t3d+';'})
			.append( $('<img>', { 'src' : ''+image_baseurl+'sample_slide_1.png', 'class' : 'ls-bg'}))
			)
		.append( $('<div>', { 'class' : 'ls-layer', 'data-ls' : 'slidedelay: 700;transition2d:'+t2d+';'})
			.append( $('<img>', { 'src' : ''+image_baseurl+'sample_slide_2.png', 'class' : 'ls-bg'})))
		);
		
		$('.transitionpreview'+type_transition+' .transition').layerSlider({
			showCircleTimer : false,
			pauseOnHover : true,
			skin : 'noskin',
			skinsPath: module_dir_url+'css/skins/'	
		});
	}
};
function insertImageThumb(url)
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

function updateThumb(img_insert,thumb_lang)
{
	$('#thumbnail_'+thumb_lang).val(img_insert);
}
function updateslide(img_insert,thumb_lang)
{
	$('#image_'+thumb_lang).val(img_insert);
}