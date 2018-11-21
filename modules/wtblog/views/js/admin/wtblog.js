/*
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2018 PrestaShop SA
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

var lasturl = ""; 
function checkURL(hash)
{
	if(!hash) hash = window.location.hash; 
	
	if(hash != lasturl) 
	{
		lasturl = hash;
		loadTab(hash);

	}
}

function loadTab(data)  
{
	data = data.replace('#', '');   
	var url_arr = data.split("&");
	
	jQuery.each(url_arr, function(index, value) { 
		var value_arr = value.split('=');
		
		switch(value_arr[0]){
			
			case "tab":
				var id = value_arr[1];
				$(".list-group-item").removeClass("active");
				$("#" + id).addClass("active");
				$(".tab-manager").hide();
				$("."+id).show();
				break;
			default:
				break;
		}
	});
}

function setTab(id)
{
	var hash_url = 'tab=' + id;
	document.location.hash = hash_url;
}

function initTab()
{
	var first = $(".list-group-item").first();
	
	var hash = window.location.hash;
	if(!hash)
		setTab($(first).attr('id'));
}

jQuery(document).ready(function($) {
	/*initTab();
	initShowNumRelated();
	checkURL();
	setInterval("checkURL()", 250);
	
	$("div.productTabs a").click(function() {
		var id = $(this).attr("id");
		
		setTab(id);
	});*/
});

function showNumRelated(id, flag)
{
	if(flag)
		$("#" + id).show();
	else
		$("#" + id).hide();
}

function initShowNumRelated()
{
	if($('#related_posts_on').attr('checked') == 'checked')
		showNumRelated('num_related_posts', true);
	else
		showNumRelated('num_related_posts', false);
		
	if($('#related_products_on').attr('checked') == 'checked')
		showNumRelated('num_related_products', true);
	else
		showNumRelated('num_related_products', false);
}

function plTableFilter(idSubmit)
{
	$("#" + idSubmit).click();
}