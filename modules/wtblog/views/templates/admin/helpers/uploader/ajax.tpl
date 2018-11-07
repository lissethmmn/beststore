{*
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
*}
<div class="form-group" style="display: none;">
	<div class="col-lg-12" id="{$id|intval}-images-thumbnails">
		{if isset($files) && $files|count > 0}
		{foreach $files as $file}
		{if isset($file.image) && $file.type == 'image'}
		<div class="img-thumbnail text-center">
			<p>{$file.image|escape:'quotes':'UTF-8'}</p>
			{if isset($file.size)}<p>{l s='File size' mod='wtblog'} {$file.size|escape:'html':'UTF-8'}kb</p>{/if}
			{if isset($file.delete_url)}
			<p>
				<a class="btn btn-default" href="{$file.delete_url|escape:'quotes':'UTF-8'}">
					<i class="icon-trash"></i> {l s='Delete' mod='wtblog'}
				</a>
			</p>
			{/if}
		</div>
		{/if}
		{/foreach}
		{/if}
	</div>
</div>
{if isset($max_files) && $files|count >= $max_files}
<div class="row">
	<div class="alert alert-warning">{l s='You have reached the limit (%s) of files to upload, please remove files to continue uploading' sprintf=$max_files mod='wtblog'}</div>
</div>
<script type="text/javascript">
	$( document ).ready(function() {
		{if isset($files) && $files}
		$('#{$id|intval}-images-thumbnails').parent().show();
		{/if}
	});
</script>
{else}
<div class="form-group">
	<div class="col-lg-12">
		<input id="{$id|intval}" type="file" name="{$name|escape:'html':'UTF-8'}[]"{if isset($url)} data-url="{$url|escape:'html':'UTF-8'}"{/if}{if isset($multiple) && $multiple} multiple="multiple"{/if} class="hide" />
		<button class="btn btn-default" data-style="expand-right" data-size="s" type="button" id="{$id|intval}-add-button">
			<i class="icon-plus-sign"></i> {if isset($multiple) && $multiple}{l s='Add files' mod='wtblog'}{else}{l s='Add file' mod='wtblog'}{/if}
		</button>
		<button class="ladda-button btn btn-default" data-style="expand-right" type="button" id="{$id|intval}-upload-button" style="display:none;">
			<i class="icon-cloud-upload text-success"></i> <span class="ladda-label text-success">{if isset($multiple) && $multiple}{l s='Upload files' mod='wtblog'}{else}{l s='Upload file' mod='wtblog'}{/if}</span>
		</button>
	</div>
</div>
<div class="row" style="display:none">
	<div class="alert alert-info" id="{$id|intval}-files-list"></div>
</div>
<div class="row" style="display:none">
	<div class="alert alert-success" id="{$id|intval}-success"></div>
</div>
<div class="row" style="display:none">
	<div class="alert alert-danger" id="{$id|intval}-errors"></div>
</div>
<script type="text/javascript">
	function humanizeSize(bytes)
	{
		if (typeof bytes !== 'number') {
			return '';
		}

		if (bytes >= 1000000000) {
			return (bytes / 1000000000).toFixed(2) + ' GB';
		}

		if (bytes >= 1000000) {
			return (bytes / 1000000).toFixed(2) + ' MB';
		}

		return (bytes / 1000).toFixed(2) + ' KB';
	}

	$( document ).ready(function() {
		{if isset($multiple) && isset($max_files)}
			var {$id|intval}_max_files = {$max_files - $files|count};
		{/if}

		{if isset($files) && $files}
		$('#{$id|intval}-images-thumbnails').parent().show();
		{/if}

		var {$id|intval}_upload_button = Ladda.create( document.querySelector('#{$id|intval}-upload-button' ));
		var {$id|intval}_total_files = 0;

		$('#{$id|intval}').fileupload({
			dataType: 'json',
			async: false,
			autoUpload: false,
			singleFileUploads: true,
			{if isset($post_max_size)}maxFileSize: {$post_max_size|escape:'quotes':'UTF-8'},{/if}
			{if isset($drop_zone)}dropZone: {$drop_zone|escape:'quotes':'UTF-8'},{/if}
			start: function (e) {
				{$id|intval}_upload_button.start();
				$('#{$id|intval}-upload-button').unbind('click'); //Important as we bind it for every elements in add function
			},
			fail: function (e, data) {
				$('#{$id|intval}-errors').html(data.errorThrown.message).parent().show();
			},
			done: function (e, data) {
				if (data.result) {
					if (typeof data.result.{$name|escape:'html':'UTF-8'} !== 'undefined') {
						for (var i=0; i<data.result.{$name|escape:'htmlall':'UTF-8'}.length; i++) {
							if (data.result.{$name|escape:'html':'UTF-8'}[i] !== null) {
								if (typeof data.result.{$name|escape:'html':'UTF-8'}[i].error !== 'undefined' && data.result.{$name|escape:'html':'UTF-8'}[i].error != '') {
									$('#{$id|intval}-errors').html('<strong>'+data.result.{$name|escape:'html':'UTF-8'}[i].name+'</strong> : '+data.result.{$name|escape:'html':'UTF-8'}[i].error).parent().show();
								}
								else 
								{
									$(data.context).appendTo($('#{$id|intval}-success'));
									$('#{$id|intval}-success').parent().show();

									if (typeof data.result.{$name|escape:'html':'UTF-8'}[i].image !== 'undefined')
									{
										var template = '<div class="img-thumbnail text-center">';
										template += '<p>'+data.result.{$name|escape:'html':'UTF-8'}[i].image+'</p>';
										
										if (typeof data.result.{$name|escape:'html':'UTF-8'}[i].delete_url !== 'undefined')
											template += '<p><a class="btn btn-default" href="'+data.result.{$name|escape:'html':'UTF-8'}[i].delete_url+'"><i class="icon-trash"></i> {l s='Delete' mod='wtblog'}</a></p>';

										template += '</div>';
										$('#{$id|intval}-images-thumbnails').html($('#{$id|intval}-images-thumbnails').html()+template);
										$('#{$id|intval}-images-thumbnails').parent().show();
									}
								}
							}
						}
					}

					$(data.context).find('button').remove();					
				}
			},
		}).on('fileuploadalways', function (e, data) {
				{$id|intval}_total_files--;

				if ({$id|intval}_total_files == 0)
				{
					{$id|intval}_upload_button.stop();
					$('#{$id|intval}-upload-button').unbind('click');
					$('#{$id|intval}-files-list').parent().hide();
				}
		}).on('fileuploadadd', function(e, data) {
			if (typeof {$id|intval}_max_files !== 'undefined') {
				if ({$id|intval}_total_files >= {$id|intval}_max_files) {
					e.preventDefault();
					alert('{l s='You can upload a maximum of %s files' mod='wtblog'}'+$max_files);
					return;
				}
			}

			data.context = $('<div/>').addClass('row').appendTo($('#{$id|intval}-files-list'));
			var file_name = $('<span/>').append('<strong>'+data.files[0].name+'</strong> ('+humanizeSize(data.files[0].size)+')').appendTo(data.context);

			var button = $('<button/>').addClass('btn btn-default pull-right').prop('type', 'button').html('<i class="icon-trash"></i> {l s='Remove file' mod='wtblog'}').appendTo(data.context).on('click', function() {
				{$id|intval}_total_files--;
				data.files = null;
				
				var total_elements = $(this).parent().siblings('div.row').length;
				$(this).parent().remove();

				if (total_elements == 0) {
					$('#{$id|intval}-files-list').html('').parent().hide();
				}
			});

			$('#{$id|intval}-files-list').parent().show();
			$('#{$id|intval}-upload-button').show().bind('click', function () {
				if (data.files != null)
					data.submit();						
			});

			{$id|intval}_total_files++;
		}).on('fileuploadprocessalways', function (e, data) {
			var index = data.index,	file = data.files[index];
			
			if (file.error) {
				$('#{$id|intval}-errors').append('<div class="row"><strong>'+file.name+'</strong> ('+humanizeSize(file.size)+') : '+file.error+'</div>').parent().show();
				$(data.context).find('button').trigger('click');
			}
		});

		$('#{$id|intval}-add-button').on('click', function() {
			$('#{$id|intval}-success').html('').parent().hide();
			$('#{$id|intval}-errors').html('').parent().hide();
			$('#{$id|intval}-files-list').parent().hide();
			{$id|intval}_total_files = 0;
			$('#{$id|intval}').trigger('click');
		});
	});
</script>
{/if}