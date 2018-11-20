{**
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
*}

				{if isset($cat_product_lists) && count($cat_product_lists) > 0}
				<div class="cycleElementsContainer" id="cycle-{$id_group|intval}">	
				<div id="elements-{$id_group|intval}">
				<div class="list_carousel responsive">
				<a id="cat-prev-{$id_group|intval}-{$id_cat|intval}" class="btn prev" href="#">&lt;</a>
				<a id="cat-next-{$id_group|intval}-{$id_cat|intval}" class="btn next" href="#">&gt;</a>
				<ul id="cat-carousel-{$id_group|intval}-{$id_cat|intval}" class="product-list-cat">
					{$i=0}
					{foreach from=$cat_product_lists item=product name=product_list}
						
						<li class="ajax_block_product {if $smarty.foreach.product_list.first|intval}first_item{/if} {if $smarty.foreach.product_list.last|intval}last_item{/if} ">
						{include file='./medium_item_ajax.tpl'}	
			
						</li>
						
				{/foreach}
				</ul>
				</div>
				</div>
				</div>
			 {else}
			 <div class="item product-box no-product col-sm-12 col-md-6">
							<p class="alert alert-warning">{l s='No product at this category' d='Modules.WTProductCategory'}</p>
			</div>
			 {/if}


<script type="text/javascript">
$(window).ready(function() {
		runSliderProductCat_Ajax();
		
		var id_cart_button_product = 0;
		var name_module = '';
		
		$('.add-to-cart').click(function(e)
		{
		e.preventDefault();
			$('#wt_loading_overlay').css(
			{
			'display': 'block'
			}
			);
			
			id_cart_button_product = $(this).attr('wt_id_product_atrr');
			name_module = $(this).attr('wt-name-module');
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).removeClass('added');
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).addClass('onload');
		});
		
		$('.quick-view').click(function(e)
		{
		e.preventDefault();
			$('#wt_loading_overlay').css(
			{
				'display': 'block'
			}
			);
		});
		
		$( document ).ajaxComplete(function() {
			$('#wt_loading_overlay').css(
			{
			'display': 'none'
			}
			);
			
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).removeClass('onload');
			$('#'+name_module+'-wt-cart-id-product-'+id_cart_button_product).addClass('added');
			
			///doClickButton();
			
		});
		
	});


function runSliderProductCat_Ajax()
{
    var item_catpro = 4;
	if(getWidthBrowser() > 1680)
		{	
			item_catpro = 4;
		}
	else	
	if(getWidthBrowser() > 1180)
		{	
			item_catpro = 3;
		}
		else
		if(getWidthBrowser() > 991)
		{	
			item_catpro = 3;			
		}
		else
		if(getWidthBrowser() > 767)
		{	
			item_catpro = 3;
		}		
		else
		if(getWidthBrowser() > 540)
		{	
			item_catpro = 2;
		}
		else
		if(getWidthBrowser() > 340)
		{	 
			item_catpro = 2;
		}			
		else
		{
			item_catpro = 2;
		}
	$('#cat-carousel-{$id_group|intval}-{$id_cat|intval}').carouFredSel({
				responsive: true,
				width: '100%',
				height: 'variable',
				onWindowResize: 'debounce',
				prev: '#cat-prev-{$id_group|intval}-{$id_cat|intval}',
				next: '#cat-next-{$id_group|intval}-{$id_cat|intval}',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:100,
					height: 'auto',
					visible: {
						min: 1,
						max: item_catpro
					}
				},
				scroll: {
					items:1,
					direction : 'left',    
					duration  : 500 ,  
					onBefore: function(data) {  
					},
					onAfter	: function(data) {
				   }
				}
			});
}	

</script>


