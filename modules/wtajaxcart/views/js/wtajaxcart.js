/**
* 2007-2017 PrestaShop
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
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
* Don't forget to prefix your containers with your own identifier
* to avoid any conflicts with others containers.
*/


$(document).ready(function(){
	
	$('<div class="wtajaxcart"><div id="content_ajaxcart"></div></div>').insertAfter("#_desktop_cart .header" );
		RefreshCart();		
		CartHover();
		prestashop.on('updatedCart', function(event) { 
		$('<div class="wtajaxcart"><div id="content_ajaxcart"></div></div>').insertAfter("#_desktop_cart .header" );
		RefreshCart();
		CartHover();
		$(".wtajaxcart").stop(true, true).slideDown(200);
		//$('.wtajaxcart').slideUp(1900);
		
		});
		

});

$(document).ajaxComplete(function() {
	//CartHover();
});
function RefreshCart()
{
	
	$.ajax({
		type: 'GET',
		url: linkajaxcart+'?rand=' + new Date().getTime(),
		headers: { "cache-control": "no-cache" },
		async: true,
		data: 'action=loadcart',
		cache: false,
		success: function(data)
		{
			$('#content_ajaxcart').html(data);
		}
	});
	
}


function HoverWatcherCart(selector)
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
function CartHover()
{
	
	var ul_content = new HoverWatcherCart(".wtajaxcart");
	var title = new HoverWatcherCart(".blockcart .header");
	
	$(".blockcart .header").hover(
		function() {
			$(".wtajaxcart").stop(true, true).slideDown(400);
		},
		function() {
			setTimeout(function() {
				if (!ul_content.isHoveringOver() && !title.isHoveringOver()){
					$(".wtajaxcart").stop(true, true).slideUp(100);
				}
			}, 100);
		}
	);
	$(".wtajaxcart").hover(
		function() {
		},
		function() {
			
			setTimeout(function() {
				if (!ul_content.isHoveringOver() && !title.isHoveringOver()){
					$(".wtajaxcart").stop(true, true).slideUp(100);
				}
			}, 100);
		}
	);

}

