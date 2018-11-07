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
*  @author    Codespot SA <support@presthemes.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

function getWidthBrowser() {
	var myWidth;

	if( typeof( window.innerWidth ) == 'number' ) { 
		//Non-IE 
		myWidth = window.innerWidth;
		//myHeight = window.innerHeight; 
	} 
	else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) { 
		//IE 6+ in 'standards compliant mode' 
		myWidth = document.documentElement.clientWidth; 
		//myHeight = document.documentElement.clientHeight; 
	} 
	else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) { 
		//IE 4 compatible 
		myWidth = document.body.clientWidth; 
		//myHeight = document.body.clientHeight; 
	}
	
	return myWidth;
}

function isMobileIpad() {
	if(navigator.userAgent.match(/Android/i) ||
		navigator.userAgent.match(/webOS/i) ||
		navigator.userAgent.match(/iPad/i) ||
		navigator.userAgent.match(/iPhone/i) ||
		navigator.userAgent.match(/iPod/i)
		){
			return true;
	}
	else return false;
}

function isMobile() {
	if(navigator.userAgent.match(/Android/i) ||
		navigator.userAgent.match(/webOS/i) ||
		navigator.userAgent.match(/iPhone/i) ||
		navigator.userAgent.match(/iPod/i)
		){
			return true;
	}
	else return false;
}

function displayImage_ThumbList(domAAroundImgThumb, no_animation)
	{
		if (typeof(no_animation) == 'undefined')
			no_animation = false;
		if (domAAroundImgThumb.prop('href'))
		{
			var new_src = domAAroundImgThumb.attr('tv-img-src');
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
	
	
	
$(function(){
	var scrol_to_top = 1;
	if (typeof scrol_to_top !== "undefined" && scrol_to_top)
	{
		if (typeof scrol_to_top_text === "undefined" || !scrol_to_top_text)
			scrol_to_top_text = 'to top';
		var htmlToTop = "<div id='wt_scroll_top' data-toggle='tooltip' data-placement='top' title='" + scrol_to_top_text + "'>" + scrol_to_top_text + "</div>";
		$('body').append(htmlToTop);
		$(window).scroll(function(){
			if($(this).scrollTop()!=0)
				$('#wt_scroll_top').fadeIn();
			else
				$('#wt_scroll_top').fadeOut();
		});
		$('#wt_scroll_top').click(function(){
			$('body,html').animate({scrollTop:0},500);
		});
	}
	
	$('.thumbs_list li a').hover(
		function(){
			
			displayImage_ThumbList($(this));
			$(this).addClass('select');
		},
		function(){
		$(this).removeClass('select');
		}
	);
	
	
});



function searchdropDown()
{
	elementClick1 = '#search_block_top .search_hover';
	elementSlide1 = '#search_block_top .drop_search';
	activeClass1 = 'active';

	$(elementClick1).on('click', function(e){
		e.stopPropagation();
		var subUl = $(this).next(elementSlide1);
		if(subUl.is(':hidden'))
		{
			if($(window).width()<=768)
			{
				$('.category-left').hide();
				var sh = ($('.header-top').height()-15)+'px';
				$('.drop_search').css({'top': sh});
				
			}
			subUl.slideDown();
			$(this).addClass(activeClass1);
		}
		else
		{
			subUl.slideUp();
			$(this).removeClass(activeClass1);
		}
		$(elementClick1).not(this).next(elementSlide1).slideUp();
		$(elementClick1).not(this).removeClass(activeClass1);
		e.preventDefault();
	});
	$(elementSlide1).on('click', function(e){
		e.stopPropagation();
	});
	$(document).on('click', function(e){
		if($(window).width()>=768)
		{
			e.stopPropagation();
			var elementHide1 = $(elementClick1).next(elementSlide1);
			$(elementHide1).slideUp();
			$(elementClick1).removeClass('active');
		}
	});
	$('.hide-search-wrapper').on('click', function(e){
		$(elementSlide1).hide();
		$(elementClick1).removeClass(activeClass1);
	});
}
function checkBrowser()
{
	var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
	var isFirefox = typeof InstallTrigger !== 'undefined';
	var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
	var isChrome = !!window.chrome && !isOpera;
	var isIE = false || !!document.documentMode;
	
	if(isChrome || isSafari)
	{
		$('.bn-top-home ul li:first-child').css('margin-bottom','1px');
	}
	else
		return false;
}


$(window).scroll(function() {
		if(!isMobileIpad() && $(window).width() > 1200)
		{
			addStickyHeader();
		}	
		if(!isMobileIpad() && $(window).width() > 991)
		{
			//addStickyLeftMenu();
			//addStickyVerticalMenu();
		}	

		
	

		
});

function addStickyHeader()
{
		var height_page = $('#header .header-top').height() + 400;
		if($(this).scrollTop() > height_page)
		{
			$('#header').addClass('header-sticky');
			$('#search_block_top').addClass('animated fadeInDown');
			$('.wt-verticalmenu').addClass('sticky animated fadeInDown');					
			$('#_desktop_cart .blockcart').addClass('animated fadeInDown');
			$('.top-wishlists').addClass('animated fadeInDown');
			
			$('#desktop_user_info').addClass('animated fadeInDown');
			$('#wt_overlay').removeClass('opened');	
			$(".wt-menu-ver-left .menu-content").stop(true, true).slideUp(300);
			$(".vertical-menu-content").removeClass('opened');
			$("#wt-menu-ver-left .category-title").addClass('plus');
		}			
		else
		{	
			$('#header').removeClass('header-sticky');
			$('#search_block_top').removeClass('animated fadeInDown');
			$('#_desktop_cart .blockcart').removeClass('animated fadeInDown');
			$('#desktop_user_info').removeClass('animated fadeInDown');
			$('.wt-verticalmenu').removeClass('sticky animated fadeInDown');
			$('.top-wishlists').removeClass('animated fadeInDown');
			//$('.vertical-menu-content').removeClass('hided');
			//$('#wt_overlay').removeClass('opened');
				
		}	
}


var filter_item = "col-md-4";
$(window).resize(function() {
			
		if(getWidthBrowser() > 1180)
		{				
			$('.filter-col-item li').removeClass("selected");
			$('.filter-col-item #grid_4').addClass("selected");
			$('#js-product-list .ajax_block_product').removeClass("col-md-6");
			$('#js-product-list .ajax_block_product').removeClass("col-md-4");
			$('#js-product-list .ajax_block_product').removeClass("col-md-2");
			$('#js-product-list .ajax_block_product').removeClass("row-line");
			filter_item = "col-md-4";
			$('#js-product-list .ajax_block_product').addClass(filter_item);
		}
		else
		if(getWidthBrowser() > 767)
		{	
			$('.filter-col-item li').removeClass("selected");
			$('.filter-col-item #grid_2').addClass("selected");
			
			$('#js-product-list .ajax_block_product').removeClass("col-md-6");
			$('#js-product-list .ajax_block_product').removeClass("col-md-4");
			$('#js-product-list .ajax_block_product').removeClass("col-md-2");
			$('#js-product-list .ajax_block_product').removeClass("row-line");
			filter_item = "col-md-6";
			$('#js-product-list .ajax_block_product').addClass(filter_item);
		}
		else
		{	
			$('.filter-col-item li').removeClass("selected");
			$('.filter-col-item #grid_2').addClass("selected");
			
			$('#js-product-list .ajax_block_product').removeClass("col-md-6");
			$('#js-product-list .ajax_block_product').removeClass("col-md-4");
			$('#js-product-list .ajax_block_product').removeClass("col-md-2");
			$('#js-product-list .ajax_block_product').removeClass("row-line");
			filter_item = "col-md-12";
			$('ul.product_list.grid > li').addClass(filter_item);
		}
		
});
	

function doClickButton()
{
		
		
		
		$('.add-to-cart').click(function(e){
		e.preventDefault();
			
			$('#wt_loading_overlay').css({'display': 'block'});
			
			id_cart_button_product = $(this).attr('wt_id_product_atrr');
			name_module = $(this).attr('wt-name-module');
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).removeClass('added');
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).addClass('onload');
		});
		$('.quick-view').click(function(e){
		e.preventDefault();
			$('#wt_loading_overlay').css({'display': 'block'});
		});
}
	
function initCloudZoom()
{
	$thumbnailsContainer = $('.thumb-container');
            $thumbnails = $('a', $thumbnailsContainer);
			
            $productImages = $('.product-cover > a');
            addCloudZoom = function(onWhat){

                //onWhat.addClass('cloud-zoom').CloudZoom();
				onWhat.addClass('cloud-zoom').attr('rel', "zoomWidth:600,zoomHeight:'auto',position:'right',adjustX:10").CloudZoom();

            }
            if($thumbnails.length){
                $cloneProductImage = $productImages.clone(false);
                $thumbnailsContainer.append($cloneProductImage);
                $thumbnails.bind('mouseenter',function(){
                    $image = $(this).clone(false);
                    $image.insertAfter($productImages);
                    $productImages.remove();
                    $productImages = $image;
                    $('.mousetrap').remove();
                    addCloudZoom($productImages);

                    return false;

                })

            }
            addCloudZoom($productImages);
}
	
function AddCartAfterFilter()
{
	$('#js-product-list .ajax_block_product').hover(
		  function() {
			//$('#js-product-list .ajax_block_product')
			var static_token = $('#products').attr('static_token');
			var urls_pages_cart = $('#products').attr('urls_pages_cart');
			$("#add-to-cart-or-refresh", this).attr('action', urls_pages_cart);
			$("#token-product-list", this).attr('value', static_token);
		  }, function() {
		   
		  });
}
$(document).ready(function()
{
	$("a[wt_rel^='prettyPhoto']").prettyPhoto();
	$("img.lazy").lazyload({
    effect : "fadeIn",
	 event : "scroll",
		});
	 initCloudZoom();
	AddCartAfterFilter();
	
		var id_cart_button_product = 0;
		var name_module = '';
		doClickButton();
	
		$( document ).ajaxComplete(function() {
			$('#wt_loading_overlay').css({'display': 'none'});
			
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).removeClass('onload');
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).addClass('added');
			
			doClickButton();
			AddCartAfterFilter();
			 initCloudZoom();
			 
			 $("a[wt_rel^='prettyPhoto']").prettyPhoto();
			 $("img.lazy_ajax").lazyload({
				effect : "fadeIn",
				 event : "scroll",
					});
		
		});
		
	
		/*$('.block .title_block').click(function(e){
		e.preventDefault();
			if($(this).next().is(":visible"))
				{
					$(this).addClass('closed');
				$(this).next().stop(true, true).slideUp(400);
				}
				else
				{
					$(this).removeClass('closed');
					$(this).next().stop(true, true).slideDown(200);		
				}
		});*/
		

		$('.filter-col-item li a').click(function(e){
			e.preventDefault();
			$('.filter-col-item li').removeClass("selected");
			$(this).parent().addClass("selected");
			filter_item = $(this).attr("class");
			$('#js-product-list .ajax_block_product').removeClass("col-md-6");
			$('#js-product-list .ajax_block_product').removeClass("col-md-4");
			$('#js-product-list .ajax_block_product').removeClass("col-md-2");
			$('#js-product-list .ajax_block_product').removeClass("row-line");
			$('#js-product-list .ajax_block_product').addClass(filter_item);
		});
		
	
		$("#hide_category").toggle(
			function() {
				$(this).addClass('hided');
				$(".content_scene_cat").stop(true, true).slideUp(300);
				$('body,html').animate({scrollTop:0},300);
			},
			function() {	
				$(this).removeClass('hided');
				$(".content_scene_cat").stop(true, true).slideDown(300);
				$('body,html').animate({scrollTop:$('#hide_category').offset().top},300);		
			}
		);
		
		$( document ).ajaxComplete(function() {
			$('ul.product_list.grid li').removeClass("col-md-6");
			$('ul.product_list.grid li').removeClass("col-md-4");
			$('ul.product_list.grid li').removeClass("col-md-2");
			$('ul.product_list.grid li').removeClass("row-line");
			$('ul.product_list.grid > li').addClass(filter_item);
			
			//var temp_product_list = $('#js-product-list-top').html();       
			//if (temp_product_list != null)
				//$('body,html').animate({scrollTop:$('#js-product-list-top').offset().top-60},500);
			
			$('.filter-col-item li a').click(function(e){
				e.preventDefault();
				$('.filter-col-item li').removeClass("selected");
				$(this).parent().addClass("selected");
				filter_item = $(this).attr("class");
				$('#js-product-list .ajax_block_product').removeClass("col-md-6");
				$('#js-product-list .ajax_block_product').removeClass("col-md-4");
				$('#js-product-list .ajax_block_product').removeClass("col-md-2");
				$('#js-product-list .ajax_block_product').removeClass("row-line");
				$('#js-product-list .ajax_block_product').addClass(filter_item);
			});
		
		});

		
		
		
		
		
		
		
		
		
	
});
