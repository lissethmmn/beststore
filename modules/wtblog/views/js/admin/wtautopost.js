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

$(window).load(function(){
		$("#opt_post_autocomplete_input")
			.autocomplete("../modules/wtblog/autocompleted/wt_ajax_posts_list.php", {
				minChars: 1,
				autoFill: true,
				max:20,
				matchContains: true,
				mustMatch:true,
				scroll:false,
				cacheLength:0,
				formatItem: function(item) {
					return item[1] + " - " + item[0];
				}
		}).result(this.addPostIntoMenu);
		$('#opt_result_post_autocomplete').delegate('.delPosts', 'click', function(){
			self.delPosts($(this).attr('name'));
		});
});


this.addPostIntoMenu = function(event, data, formatted)
{
	if (data == null)
		return false;
	var postId = data[1];
	var postName = data[0];
	var $divResultAutocomplete = $('#opt_result_post_autocomplete');
	var $inputResultAutocompleteId = $('#id_related_posts');
	var $inputResultAutocompleteName = $('#name_related_posts');
	$divResultAutocomplete.html($divResultAutocomplete.html() +  '<div class="form-control-static"><button type="button" class="delPosts btn btn-default" name="' + postId + '"><i class="icon-remove text-danger"></i></button>&nbsp;'+ postName +'</div>');
	$inputResultAutocompleteName.val($inputResultAutocompleteName.val() + postName + '¤');
	$inputResultAutocompleteId.val($inputResultAutocompleteId.val() + postId + '-');
	$('#related_posts').val('');
	$('#related_posts').setOptions({
			extraParams: {
				excludeIds : self.getResultPostIds()
			}
		});
	return false;
}

this.getResultPostIds = function(data)
{
	if ($('#id_related_posts').val() === undefined)
		return '';
	return $('#id_related_posts').val().replace(/\-/g,',');
}

this.delPosts = function(id)
{
	var div = getE('opt_result_post_autocomplete');
	var input = getE('id_related_posts');
	var name = getE('name_related_posts');

	/* Cut hidden fields in array */
	var inputCut = input.value.split('-');
	var nameCut = name.value.split('¤');

	if (inputCut.length != nameCut.length)
		return jAlert('Bad size');

	/* Reset all hidden fields */
	input.value = '';
	name.value = '';
	div.innerHTML = '';
	for (i in inputCut)
	{
		/* If empty, error, next */
		if (!inputCut[i] || !nameCut[i])
			continue ;

		/* Add to hidden fields no selected products OR add to select field selected product */
		if (inputCut[i] != id)
		{
			input.value += inputCut[i] + '-';
			name.value += nameCut[i] + '¤';
			
			div.innerHTML += '<div class="form-control-static"><button type="button" class="delPosts btn btn-default" name="' + inputCut[i] +'"><i class="icon-remove text-danger"></i></button>&nbsp;' + nameCut[i] + ' (id: ' +inputCut[i] + ') </div>';
		}
	}
	$('#related_posts').setOptions({
		extraParams: {excludeIds : self.getResultPostIds()}
	});
};