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
	
	var loanding="<p class='loanding'></p>";
		var content_result = "<div id='wtsearch_content_result'><div class='over_light'></div><a href='javascript:void(0)' class='wt_close' id='close_search_query_nav'><span>"+close_text+"</span></a><div id='wtsearch_eccept_data'  class='wt-container'></div></div>";
		$(content_result).insertAfter("#search_block_top" );
		
	$('#search_query_nav').click(function(){
			//$('body,html').animate({scrollTop:0},300);
			$("#search_block_top").addClass('show');
		});
		
		$('#close_search_query_nav').click(function(){
			$('#wtsearch_content_result').slideUp(300);
			$("#search_block_top").removeClass('show');
			//$('body').removeClass('fixed');
		});
		
		

	$('#searchbox input.search_query').keyup(function(){ 
	   $('.ac_results').remove();
	   $('#wtsearch_eccept_data').html(loanding);
		$('#wtsearch_content_result').slideDown(400);
		if(this.value.length<3)
		$('#wtsearch_eccept_data').html(limit_character);				
		else
		{
			var id_cat = $('#search_category').val();
			doLiveSearch(this.value, id_cat);
		}
		
	});
	
	$( "#search_category" ).change(function() {
		 $('#wtsearch_eccept_data').html(loanding);
		if($('#searchbox input.search_query').val().length < 3)
		{
			$('#wtsearch_eccept_data').html(limit_character);
		}
		else
		{
			var id_cat = $('#search_category').val();
			doLiveSearch($('#searchbox input.search_query').val(), id_cat);
		}
	});

	
	
});
function doLiveSearch(inputString, id_cat) {
		
		$.post(
		    $('#wt_url_ajax_search input.url_ajax').val(), 
			{queryString: inputString, id_Cat: id_cat},
			function(data) 
			{ 
				$('#wtsearch_eccept_data').html(data);
		});
		
		
		/*
		var url =  $('#wt_url_ajax_search input.url_ajax').val()+'?queryString='+inputString+'&id_Cat='+id_cat;
		var ajaxRequest;  // The variable that makes Ajax possible!
				try{
					// Opera 8.0+, Firefox, Safari
					ajaxRequest = new XMLHttpRequest();
				} catch (e){
					// Internet Explorer Browsers
					try{
						ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
						try{
							ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
						} catch (e){
							// Something went wrong
							alert("Your browser broke!");
							return false;
						}
					}
				}
				// Create a function that will receive data sent from the server
				ajaxRequest.onreadystatechange = function(){
					if(ajaxRequest.readyState == 4){
						//var ajaxDisplay = document.getElementById('#tabs-'+id_tab);
						//alert(ajaxRequest.responseText);
						//ajaxDisplay.innerHTML = ajaxRequest.responseText;
						$('#wtsearch_eccept_data').html(ajaxRequest.responseText);
					}
				}
				ajaxRequest.open("GET", url, true);
				ajaxRequest.send(null); */
				
				
				
				/*
				$.ajax(
				{
					  method: "POST",
					 url: $('#wt_url_ajax_search input.url_ajax').val(),
					 data: { queryString: inputString, id_Cat: id_cat },
					 success: function(res)
				{
					$('#wtsearch_eccept_data').html(res);							
				}
				});*/
					 
				
				
				
				
}

function Show_All_Search()
{
	$( "#searchbox" ).submit();
}