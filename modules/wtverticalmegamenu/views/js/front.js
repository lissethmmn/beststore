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

$(window).load(function()
{
		$('#wt-menu-ver-left .icon-drop-mobile').click(function() {
		 $(this).next().toggle('slow');
		$(this).toggleClass('opened');
	});
	if($(window).width() > 767)
	{
		$("#index .wt-menu-ver-left .category-left").css('display','block');
		//menuVerHover();
		if($(window).width() < 992)
		$(".vertical-menu-content").removeClass('opened');

	
	}	
	else
	{
		$(".wt-menu-ver-left .vertical-menu-content").css('display','none');
		menuVerClick();
	}
		
	var width_menu_content = $('#wrapper .container').width() - $('#wt-menu-ver-left').width() - 300;
	
	$('#wt-menu-ver-left ul.menu-content li div.wt-sub-menu').each(function(index, element)
	{
		var width_sub = parseInt($(this).children('.v-menu-sub-width').val());
		if($(window).width() < 1024 && width_sub >= 6)
			width_sub = 12;
		if($(window).width() < 1024 && width_sub < 6)
			width_sub = 6;
		
		var width_sub_result = parseInt(width_menu_content/12*width_sub);
		$(this).width(width_sub_result);
	});
	if($(window).width() > 767)
	{
	
	
		  
		  $('#wt-menu-ver-left .category-title').click(function() {
			  if ($(".wt-menu-ver-left .vertical-menu-content").hasClass('opened'))
			{
				$(".wt-menu-ver-left .menu-content").stop(true, true).slideUp(300);
				$(".wt-menu-ver-left .vertical-menu-content").removeClass('opened');
				$(this).addClass('plus');
			}
			else
			{
				$(".wt-menu-ver-left .menu-content").stop(true, true).slideDown(600);
				$(".wt-menu-ver-left .vertical-menu-content").addClass('opened');
				$(this).removeClass('plus');
			}
			
			  //$('.vertical-menu-content').addClass('opened');
			//$('.header-sticky #wt_overlay').addClass('opened');
			//$('#wt_overlay.other-page').addClass('opened');
		});
		
		$('#wt-menu-ver-left .category-left li.more, #wt-menu-ver-left .category-left li.hide').click(function() {
			  if ($("#wt-menu-ver-left .category-left li.more").is(':visible'))
			{
				$("#wt-menu-ver-left .category-left li.level-1.hide_li").slideDown(200);
				$("#wt-menu-ver-left .category-left li.more").slideUp(600);
				$("#wt-menu-ver-left .category-left li.hide").slideDown(600);
			}
			else
			{
				$("#wt-menu-ver-left .category-left li.level-1.hide_li").slideUp(200);
				$("#wt-menu-ver-left .category-left li.more").slideDown(600);
				$("#wt-menu-ver-left .category-left li.hide").slideUp(600);
			}
			
			  //$('.vertical-menu-content').addClass('opened');
			//$('.header-sticky #wt_overlay').addClass('opened');
			//$('#wt_overlay.other-page').addClass('opened');
		});
		
	

	}
	
	
});

$(window).resize(function()
{
	var width_menu_content = $('#wrapper .container').width() - $('#wt-menu-ver-left').width();
	$('#wt-menu-ver-left ul.menu-content li div.wt-sub-menu').each(function(index, element)
	{
		var width_sub = parseInt($(this).children('.v-menu-sub-width').val());
		if($(window).width() < 1024 && width_sub >= 6)
			width_sub = 12;
		if($(window).width() < 1024 && width_sub < 6)
			width_sub = 6;
		
		var width_sub_result = parseInt(width_menu_content/12*width_sub);
		$(this).width(width_sub_result);
	});
	
	if($(window).width() < 750)
	{
		//$("#index .wt-menu-ver-left .vertical-menu-content").css('display','none')
		
		menuVerClick();
	}
	else
	{
		$("#index .wt-menu-ver-left .vertical-menu-content").css('display','block')
		//menuVerHover();
	}
});
function HoverWatcher(selector)
{
	this.hovering = false;
	var self = this;

	this.isHoveringOver = function(){
		return self.hovering;
	}

	$(selector).hover(function(){
		self.hovering = true;
	}, function(){
		self.hovering = false;
	})
}
function menuVerHover()
{
	var ul_ver_menu = new HoverWatcher('.wt-menu-ver-page .category-left');
	var ver_menu_title = new HoverWatcher('.wt-menu-ver-page .category-title');
	
	/*$(".wt-menu-ver-page .category-title").hover(
		function() {
			$(".wt-menu-ver-page .category-left").stop(true, true).slideDown(400);
		},
		function() {
			setTimeout(function() {
				if (!ul_ver_menu.isHoveringOver() && !ver_menu_title.isHoveringOver()){
					$(".wt-menu-ver-page .category-left").stop(true, true).slideUp(200);
				}
			}, 200);
		}
	);*/
	
	/*$(".wt-menu-ver-page .category-left").hover(
		function() {
			$(".wt-menu-ver-page .category-left").stop(true, true).slideDown(400);				
		},
		function() {
			setTimeout(function() {
				if (!ul_ver_menu.isHoveringOver())
					$(".wt-menu-ver-page .category-left").stop(true, true).slideUp(200);
			}, 200);
		}
	);	*/
}
function menuVerClick()
{

		$('.wt-menu-ver-left .category-title').click(function() {
			if ($(".wt-menu-ver-left .vertical-menu-content").hasClass('slideDown'))
			{
				$(".wt-menu-ver-left .vertical-menu-content").stop(true, true).slideUp(300);
				$(".wt-menu-ver-left .vertical-menu-content").removeClass('slideDown');
				
			}
			else
			{
				$(".wt-menu-ver-left .vertical-menu-content").stop(true, true).slideDown(600);
				$(".wt-menu-ver-left .vertical-menu-content").addClass('slideDown');
				
			}
			
		});
		
}