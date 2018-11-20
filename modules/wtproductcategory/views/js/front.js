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

$(document).ready(function(){
	var loanding="<p class='loanding'></p>";
	
	$('.wt-prod-cat .sub-cat-ul li').click(function(){
		var id_cat = $(this).attr('id-cat');
		var id_group = $(this).attr('id-group');
		var number_prod = $(this).attr('number-prod');
		var name_module = $(this).attr('wt-name-module');
		
		$('.wt-prod-cat #sub-cat-ul-'+id_group+' li').removeClass('active');
		$(this).addClass('active');
		$('#content-product-sub-cat-'+id_group).html(loanding);
		
		getProductCat(id_group, id_cat, number_prod, name_module);
		
	});
});


function getProductCat(id_group, id_cat, number_prod, name_module) {
		var url_page_cart = $('#wt_home_filter_product_tab_ssl').attr('url_page_cart');
		var static_token = $('#wt-prod-cat-base-ssl').attr('static_token');
		
		$.post(
		    $('#wt-prod-cat-base-ssl').attr('wt_base_ssl'), 
			{id_Cat: id_cat, id_Group: id_group, number_Prod: number_prod, name_Module: name_module, Url_Page_Cart : url_page_cart, Static_Token : static_token},
			function(data) 
			{ 
				$('#content-product-sub-cat-'+id_group).html(data);
			})
			.fail(function(error, textStatus, errorThrown) 
			{ 
				$('#content-product-sub-cat-'+id_group).html(error.responseText);
			});
	
}



