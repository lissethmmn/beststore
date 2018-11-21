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

$(document).ready(function()
{
	$(document).on('click', '.open .wt-coupon-small, .open .share-coupon-small-wrapper', function()
	{
		showDialog();
	});
	$(document).on('click', '.close .wt-coupon-small, .close .share-coupon-small-wrapper', function()
	{
		closeDialog(cookies_time);
	});
	
});

function showDialog()
{  
	var data={'task':'showPopup'};
		$.ajax({
		type: "POST",
		cache: false,
		url: wt_coupon_url + '/front-end-ajax.php',
		dataType : "json",
		data: data,
		complete: function(){},
		success: function (response) {
			console.log(response);
		}
	});   
	$("#overlay").show();
    $(".wt-popup").show();
	$('.wt-show-popup').removeClass('open').addClass('close');
}

function closeDialog(cookies_time)
{  
	var data={'task':'cancelRegisNewsletter', 'cookies_time':cookies_time};        
	if ($('#notshow').is(':checked')){
        data.notshow = '1';
    }else{
        data.notshow = '0';
    }
		$.ajax({
		type: "POST",
		cache: false,
		url: wt_coupon_url + '/front-end-ajax.php',
		dataType : "json",
		data: data,
		complete: function(){},
		success: function (response) {
			console.log(response);
		}
	});   
	$("#overlay").hide();
    $(".wt-popup").hide();
	$('.wt-show-popup').removeClass('close').addClass('open');	
}
function check_email(email){
	emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;	
	if(emailRegExp.test(email)){
		return true;
	}else{
		return false;
	}
}
function regisNewsletter(){
    var data={'task':'regisNewsletter', 'action':0};
    var email = $("#input-email").val();
    if(check_email(email) == true){
        data.email = email;
        $("#regisNewsletterMessage").html("");
    }else{
        $("#regisNewsletterMessage").html(enterEmail);
        return false;
    }
    
    if ($('#notshow').is(':checked')){
        data.notshow = '1';
    }else{
        data.notshow = '0';
    }
    $.ajax({
		type: "POST",
		cache: false,
		url: wt_coupon_url + '/front-end-ajax.php',
		dataType : "json",
		data: data,
        complete: function(){},
		success: function (response)
		{
			
			if(response.indexOf("@")>0)
			{
				var new_response = response.substring(response.indexOf("@")+1, response.length);
				$("#regisNewsletterMessage").html('<p class="alert alert-success">'+new_response+'</p>');
			}
			else
			$("#regisNewsletterMessage").html('<p class="alert alert-warning">'+response+'</p>');
		
			$("#coupon-text-before").hide();
			$("#coupon-text-after").show();
		},
		 error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
					
        }  
	});
}