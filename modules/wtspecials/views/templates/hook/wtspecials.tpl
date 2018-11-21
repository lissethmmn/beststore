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

{$number_line = 1}
<div id="wt-special-products" class="wt-special-products col-xs-12">
	<div class="title-block">
	<h2><a href="{$link->getPageLink('prices-drop')|escape:'html':'UTF-8'}" title="{l s='Hot Deals' mod='wtspecials'}"><span>{l s='Daily Deals!' mod='wtspecials'}</span> {l s='Get our best price' mod='wtspecials'}</a>
	</h2>
	</div>
			<div class="block_content">
			
			<a id="prev_wt_special_product" class="button-arrow prev" href="#">&lt;</a>
			<a id="next_wt_special_product" class="button-arrow next" href="#">&lt;</a>

			
				{if isset($new_products) && count($new_products) > 0}
						<ul id="wt_special_product" class="product-list">
						{$i=0}
						{foreach from=$new_products item=product name=products}	
						 	{if $i%3==0} 					
								<li class="{if $smarty.foreach.products.first|intval}first_item{/if} {if $smarty.foreach.products.last|intval}last_item{/if} ">												
							{/if}
							{if $i%3==2}
							<div class="wt-prod-special col-sm-6 col-md-6">
							{include file='./main_item.tpl'}	
							</div>
							{else}
							<div class="product-list-thumb col-sm-6 col-md-3">
								{include file='./medium_item.tpl'}	
								</div>
							{/if}
							
							{$i=$i+1}
						
						
						{if $i%3==0 || $i==count($new_products)}
						</li>
						{/if}

							
						{/foreach}
						</ul>
					</div>
					{else}
						<p class="alert alert-warning">{l s='No product at this time' mod='wtspecials'}</p>
					{/if}
						
						
						<script type="text/javascript">
						function runSliderSpecial(){
							$("ul#wt_special_product").carouFredSel({
									auto: false,
									responsive: true,
										width: '100%',
										prev: '#prev_wt_special_product',
										next: '#next_wt_special_product',
										swipe: {
											onMouse: false,
											onTouch: true,
											},
										items: {
											width: 162,
											visible: {
												min: 1,
												max: 1
											}
										},
										scroll: {
											items : 1 ,       
											direction : 'left',   
											duration  : 1200,   
												onBefore: function(data) { 
						
												},
												onAfter	: function(data) {
													 $('ul#wt_special_product')
														.find('img.lazy')
														.each(function() {
														  var src = $(this).attr('data-original');
														  $(this).attr('src', src);
														});
									
													
											   }
										}

								});
						}
							$(document).ready(function() {
								runSliderSpecial();
							});
						</script>
				
</div>