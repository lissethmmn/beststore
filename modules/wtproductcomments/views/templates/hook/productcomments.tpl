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

<script type="text/javascript">
var productcomments_controller_url = '{$productcomments_controller_url|escape:'html':'UTF-8'}';
var confirm_report_message = '{l s='Are you sure that you want to report this comment?' mod='wtproductcomments' js=1}';
var secure_key = '{$secure_key|escape:'html':'UTF-8'}';
var productcomments_url_rewrite = '{$productcomments_url_rewriting_activated|escape:'html':'UTF-8'}';
var productcomment_added = '{l s='Your comment has been added!' mod='wtproductcomments' js=1}';
var productcomment_added_moderation = '{l s='Your comment has been submitted and will be available once approved by a moderator.' mod='wtproductcomments' js=1}';
var productcomment_title = '{l s='New comment' mod='wtproductcomments' js=1}';
var productcomment_ok = '{l s='OK' mod='wtproductcomments' js=1}';
var moderation_active = {$moderation_active|escape:'html':'UTF-8'};
var productcomment_success = '{l s='Your comment has been added! This reviews will be validated by an employee.' mod='wtproductcomments' js=1}';

</script>


<div class="tab-pane fade in" id="productcomments">
    
	<div id="message_comment_form" class="error" style="display: none; padding:15px 25px">
	</div>
				
	<div id="product_comments_block_tab">
	{if $comments}
	{if (!$too_early AND ($logged OR $allow_guests))}
		<p class="align_center">
			<a id="new_comment_tab_btn" class="open-comment-form btn btn-secondary" href="#new_comment_form">{l s='Write your review' mod='wtproductcomments'} !</a>
		</p>
     {/if}
		
		{foreach from=$comments item=comment}
			{if $comment.content}
			<div class="comment clearfix">
				<div class="comment_author">
					<span>{l s='Grade' mod='wtproductcomments'}&nbsp</span>
					<div class="star_content clearfix">
					{section name="i" start=0 loop=5 step=1}
						{if $comment.grade le $smarty.section.i.index}
							<div class="star"></div>
						{else}
							<div class="star star_on"></div>
						{/if}
					{/section}
					</div>
					<div class="comment_author_infos">
						<strong>{$comment.customer_name|escape:'html':'UTF-8'}</strong><br/>
						<em>{dateFormat date=$comment.date_add|escape:'html':'UTF-8' full=0}</em>
					</div>
				</div>
				<div class="comment_details">
					<h4 class="title_block">{$comment.title|escape:'html':'UTF-8'}</h4>
					<p>{$comment.content|escape:'html':'UTF-8'|nl2br}</p>
					<ul>
						{if $comment.total_advice > 0}
							<li>{l s='%1$d out of %2$d people found this review useful.' sprintf=[$comment.total_useful,$comment.total_advice] mod='wtproductcomments'}</li>
						{/if}
						{if $logged}
							{if !$comment.customer_advice}
							<li>{l s='Was this comment useful to you?' mod='wtproductcomments'}<button class="usefulness_btn" data-is-usefull="1" data-id-product-comment="{$comment.id_product_comment|escape:'html':'UTF-8'}">{l s='yes' mod='wtproductcomments'}</button><button class="usefulness_btn" data-is-usefull="0" data-id-product-comment="{$comment.id_product_comment|escape:'html':'UTF-8'}">{l s='no' mod='wtproductcomments'}</button></li>
							{/if}
							{if !$comment.customer_report}
							<li><span class="report_btn" data-id-product-comment="{$comment.id_product_comment|escape:'html':'UTF-8'}">{l s='Report abuse' mod='wtproductcomments'}</span></li>
							{/if}
						{/if}
					</ul>
				</div>
			</div>
			{/if}
		{/foreach}
        
	{else}
		{if (!$too_early AND ($logged OR $allow_guests))}
		<p class="align_center">
			<a id="new_comment_tab_btn" class="open-comment-form btn btn-secondary" href="#new_comment_form">{l s='Be the first to write your review' mod='wtproductcomments'} !</a>
		</p>
		{else}
		<p class="align_center">{l s='No customer reviews for the moment.' mod='wtproductcomments'}</p>
		{/if}
	{/if}	
	</div>
	
	
	
</div>

{if isset($product) && $product}
<!-- Fancybox -->

	<div id="new_comment_form" style="display:none">
		<form id="id_new_comment_form" action="#">
		<button type="button" class="close_comment wt_close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
			<h2 class="title">{l s='Write your review' mod='wtproductcomments'}</h2>
			<div id="message_comment_popup" class="error" style="display: none; padding:15px 25px">
			</div>
	
			{if isset($product) && $product}
			<div class="product col-md-6">
				<div class="product_desc">
					<p class="product_name"><strong>{$product->name|escape:'html':'UTF-8' nofilter}</strong></p>
					
				</div>
				<img src="{$productcomment_cover_image|escape:'html':'UTF-8'}" height="{$mediumSize.height|escape:'html':'UTF-8'}" width="{$mediumSize.width|escape:'html':'UTF-8'}" alt="{$product->name|escape:html:'UTF-8'}" />
				
			</div>
			{/if}
			<div class="new_comment_form_content product col-md-6">
				
				{if $criterions|@count > 0}
					<ul id="criterions_list">
					{foreach from=$criterions item='criterion'}
						<li>
							<label>{$criterion.name|escape:'html':'UTF-8'}</label>
							<div class="star_content">
								<input class="star" type="radio" name="criterion[{$criterion.id_product_comment_criterion|escape:'html':'UTF-8'}]" value="1" />
								<input class="star" type="radio" name="criterion[{$criterion.id_product_comment_criterion|escape:'html':'UTF-8'}]" value="2" />
								<input class="star" type="radio" name="criterion[{$criterion.id_product_comment_criterion|escape:'html':'UTF-8'}]" value="3" />
								<input class="star" type="radio" name="criterion[{$criterion.id_product_comment_criterion|escape:'html':'UTF-8'}]" value="4" />
								<input class="star" type="radio" name="criterion[{$criterion.id_product_comment_criterion|escape:'html':'UTF-8'}]" value="5" checked="checked" />
							</div>
							<div class="clearfix"></div>
						</li>
					{/foreach}
					</ul>
				{/if}
				<label for="comment_title">{l s='Title for your review' mod='wtproductcomments'}<sup class="required">*</sup></label>
				<input id="comment_title" name="title" type="text" value=""/>

				<label for="content">{l s='Your review' mod='wtproductcomments'}<sup class="required">*</sup></label>
				<textarea id="content" name="content"></textarea>

				{if $allow_guests == true && !$logged}
				<label>{l s='Your name' mod='wtproductcomments'}<sup class="required">*</sup></label>
				<input id="commentCustomerName" name="customer_name" type="text" value=""/>
				{/if}

				<div id="new_comment_form_footer">
					<input id="id_product_comment_send" name="id_product" type="hidden" value='{$id_product_comment_form|escape:'html':'UTF-8'}' />
					<p class="fl required"><sup>*</sup> {l s='Required fields' mod='wtproductcomments'}</p>
					<p class="fr">
						<button id="submitNewMessage" name="submitMessage" type="submit">{l s='Send' mod='wtproductcomments'}</button>&nbsp;
						{l s='or' mod='wtproductcomments'}&nbsp;<a href="javascript:void(0);" class="close_comment">{l s='Cancel' mod='wtproductcomments'}</a>
					</p>
					<div class="clearfix"></div>
				</div>
			</div>
		</form><!-- /end new_comment_form_content -->
	</div>

<!-- End fancybox -->
{/if}

