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
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/
$(function(){
		var loanding="<p class='loading'></p>";
	
	$("ul.product-list li .wt_container_thumbnail").hover(
		function(){
			var id_product = $(this).attr('wt-data-id-product');
			var name_module = $(this).attr('wt-name-module');
			var id_tab = $(this).attr('id-tab');
			if (id_tab != '')
				id_tab = '-'+id_tab;
			else
				id_tab = '';
			
			if ($('#'+name_module+id_tab+'-wt-thumbs-content-'+id_product).html() == '')
			{
				$('#'+name_module+id_tab+'-wt-thumbs-content-'+id_product).html(loanding);
				GetImages(name_module, id_tab, id_product);
			}
		},
		function(){
		});
	
		//if($(window).width() < 768)
		//{
			//$('.tabs-carousel').show();
		//}
		//else
		//{
			$('.tabs-carousel').hide();
			$('#tabs-1').show();
		//}
		
	
	$( ".wt_home_filter_product_tab ul.title-tab li").click(function() {
		var loanding="<p class='loading'></p>";
		var type_tab = $(this).attr('type-tab');
		var id_tab = $(this).attr('id-tab');
		var name_module = $(this).attr('wt-name-module');
		
		$('#ul_tv_tab li').removeClass('ui-tabs-selected');
		$(this).addClass('ui-tabs-selected');
		$('.tabs-carousel').hide();
		$('#tabs-'+id_tab).show();
		
		if ($('#tabs-'+id_tab).html().length < 75)
		{
			$('#tabs-'+id_tab).html(loanding);
			GetProducts(name_module, id_tab, type_tab);
		}
		
		});
	
});

$(window).resize(function()
{
		//if($(window).width() < 768)
		//{
			//$('.tabs-carousel').show();
		//}
		//else
		//{
			$('.tabs-carousel').hide();
			$('#tabs-1').show();
		//}
});
$( document).ajaxComplete(function() {
  	$('.thumbs_list li a').hover(
		function(){
			displayThumbnailImage($(this));
			$(this).addClass('select');
		},
		function(){
		$(this).removeClass('select');
		});
		reloadFunction();
		
});

function reloadFunction(){
	var loanding="<p class='loading'></p>";
	$("ul.product-list li .wt_container_thumbnail").hover(
		function(){
			var id_product = $(this).attr('wt-data-id-product');
			var name_module = $(this).attr('wt-name-module');
			var id_tab = $(this).attr('id-tab');
			if (id_tab != '')
				id_tab = '-'+id_tab;
			else
				id_tab = '';
			if ($('#'+name_module+id_tab+'-wt-thumbs-content-'+id_product).html() == '')
			{
				$('#'+name_module+id_tab+'-wt-thumbs-content-'+id_product).html(loanding);
				GetImages(name_module, id_tab, id_product);
			}
		},
		function(){
		});
}

function displayThumbnailImage(domAAroundImgThumb, no_animation)
{
		if (typeof(no_animation) == 'undefined')
			no_animation = false;
		if (domAAroundImgThumb.prop('href'))
		{
			var new_src = domAAroundImgThumb.attr('tv-img-src').replace('thickbox', 'large');
			var new_title = domAAroundImgThumb.attr('title');
			var new_href = domAAroundImgThumb.attr('href');
			
			if (domAAroundImgThumb.parent().parent().parent().parent().parent().find('.wt-image').prop('src') != new_src)
			{
				domAAroundImgThumb.parent().parent().parent().parent().parent().find('.wt-image').attr({
					'src' : new_src,
					'alt' : new_title,
					'title' : new_title
				}).load(function(){
					if (typeof(jqZoomEnabled) != 'undefined' && jqZoomEnabled)
						$(this).attr('rel', new_href);
				});
			}
			$('.thumbs_list li a').removeClass('shown');
			$(domAAroundImgThumb).addClass('shown');
		}
	}
	
function GetImages(name_module, id_tab, id_product) {
		var url = $('#wt_home_filter_product_tab_ssl').attr('wt_base_ssl')+'modules/wtproductfilter/controller_ajax_images.php';
		$.post(
		    url, 
			{id_Product: id_product},
			function(data) 
			{ 
				$('#'+name_module+id_tab+'-wt-thumbs-content-'+id_product).html(data);
		});
}

function GetProducts(name_module, id_tab, type_tab) {
		
		var base_ssl = $('#wt_home_filter_product_tab_ssl').attr('wt_base_ssl')+'modules/wtproductfilter/controller_ajax_product.php';
		var url_page_cart = $('#wt_home_filter_product_tab_ssl').attr('url_page_cart');
		var static_token = $('#wt_home_filter_product_tab_ssl').attr('static_token');
		$.post(
		    base_ssl, 
			{id_Tab: id_tab, type_Tab: type_tab, name_Module: name_module, Url_Page_Cart :url_page_cart, Static_Token : static_token},
			function(data) 
			{ 
				$('#tabs-'+id_tab).html(data);
			})
			.fail(function(error, textStatus, errorThrown) 
			{ 
				$('#tabs-'+id_tab).html(error.responseText);
			});
			
			
		
}
