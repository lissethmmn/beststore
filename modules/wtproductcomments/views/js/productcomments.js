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
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$(function() {
	$('input.star').rating();
	$('.auto-submit-star').rating();

	
	$('.open-comment-form').click(function() {
		
		$('#new_comment_form').addClass('open');
		$('#wt_overlay').addClass('open');
		$('#new_comment_form').fadeIn();
		$('#message_comment_form').hide();
		$('#message_comment_popup').hide();
	});
	
	$('.close_comment').click(function() {
		$('#new_comment_form').removeClass('open');
		$('#wt_overlay').removeClass('open');
		$('#new_comment_form').hide();
		$('#message_comment_form').hide();
		$('#message_comment_popup').hide();
		$('#nav-link-comment .nav-link').click();
		$('body').scrollTo('.nav-tabs',500,{
			axis:'y',
			offset:-80			
		});
	});
	
	$('#read_user_reviews').click(function() {
		$('#nav-link-comment .nav-link').click();
		$('body').scrollTo('#nav-link-comment',500,{
			axis:'y',
			offset:-80			
		});
		
	});
	
	$('button.usefulness_btn').click(function() {
		var id_product_comment = $(this).data('id-product-comment');
		var is_usefull = $(this).data('is-usefull');
		var parent = $(this).parent();

		$.ajax({
			url: productcomments_controller_url + '?rand=' + new Date().getTime(),
			data: {
				id_product_comment: id_product_comment,
				action: 'comment_is_usefull',
				value: is_usefull
			},
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			success: function(result){
				parent.fadeOut('slow', function() {
					parent.remove();
				});
			}
		});
	});

	$('span.report_btn').click(function() {
		if (confirm(confirm_report_message))
		{
			var idProductComment = $(this).data('id-product-comment');
			var parent = $(this).parent();

			$.ajax({
				url: productcomments_controller_url + '?rand=' + new Date().getTime(),
				data: {
					id_product_comment: idProductComment,
					action: 'report_abuse'
				},
				type: 'POST',
				headers: { "cache-control": "no-cache" },
				success: function(result){
					parent.fadeOut('slow', function() {
						parent.remove();
					});
				}
			});
		}
	});

	$('#submitNewMessage').click(function(e) {
		// Kill default behaviour
		e.preventDefault();

		// Form element

        url_options = '?';
        if (!productcomments_url_rewrite)
            url_options = '&';

		$.ajax({
			url: productcomments_controller_url + url_options + 'action=add_comment&secure_key=' + secure_key + '&rand=' + new Date().getTime(),
			data: $('#id_new_comment_form').serialize(),
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			dataType: "json",
			success: function(data){
				if (data.result)
				{
					$('#message_comment_form').html('<p class="alert alert-success">'+productcomment_success+'</p>');
					$('#message_comment_form').slideDown();
					$('#new_comment_form').removeClass('open');
					$('#wt_overlay').removeClass('open');
					$('#new_comment_form').hide();
					$('#nav-link-comment .nav-link').click();
					$('body').scrollTo('.nav-tabs',500,{
						axis:'y',
						offset:-80			
					});
		
                    var buttons = {};
                    buttons[productcomment_ok] = "productcommentRefreshPage";
                    //fancyChooseBox(moderation_active ? productcomment_added_moderation : productcomment_added, productcomment_title, buttons);
				}
				else
				{
					$.each(data.errors, function(index, value) {
						$('#message_comment_popup').append('<p class="alert alert-warning">'+value+'</p>');
					});
					
					$('#message_comment_popup').slideDown();
				}
			}
		});
		return false;
	});
});

function productcommentRefreshPage() {
    window.location.reload();
}