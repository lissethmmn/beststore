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
{if count($subcategories) > 0}
<div id="wt_subcategory" class="wt_subcategory">
<h3>{l s='Sub Categories' mod='wtsubcategory'} </h3>
					
					 <div class="button-next-prev">
					<a id="prev_sub_cat" class="button-arrow prev" href="#">{l s='Prev' mod='wtsubcategory'}</a>
					<a id="next_sub_cat" class="button-arrow next" href="#">{l s='Next' mod='wtsubcategory'}</a>
		</div>
					  <div id="subcategory_list" class="subcategory_list">
					<ul id="ul_subcategory_list" class="product-list">
						{foreach from = $subcategories item=sub_cat name=sub_cat_info}
							<li>
								
								<a href="{$link->getCategoryLink($sub_cat.id_category, $sub_cat.link_rewrite)|escape:'html':'UTF-8'}" title="{$sub_cat.name|escape:'html':'UTF-8'}">
								
								{if $sub_cat.id_image && $sub_cat.cat_thumb == 1}
									<img src="{$path_ssl|escape:'html':'UTF-8'}img/c/{$sub_cat.id_category|intval}_thumb.jpg" alt=""/>
								{else}
									<img class="replace-2x" src="{$path_ssl|escape:'html':'UTF-8'}img/c/{$iso_code|escape:'html':'UTF-8'}.jpg" alt=""/>
								{/if}
								</a>
								<a class="subcat-name" href="{$link->getCategoryLink($sub_cat.id_category, $sub_cat.link_rewrite)|escape:'html':'UTF-8'}" title="{$sub_cat.name|escape:'html':'UTF-8'}">{$sub_cat.name|escape}
								
								</a>
							</li>
						{/foreach}
						</ul>
					</div>
					

	<script type="text/javascript">
		
	$(window).load(function() {
		runSliderSubCategory();
	});

	$(window).resize(function() {
			runSliderSubCategory();
	});
function runSliderSubCategory(){
	
	var item_sub_cat = 5 ;
		
		if(getWidthBrowser() > 1180)
		{	
			item_sub_cat = 5; 
		}
		else
		if(getWidthBrowser() > 991)
		{	
			item_sub_cat = 4; 
		}
		else
		if(getWidthBrowser() > 767)
		{	
			item_sub_cat = 3; 
		}		
		else
		if(getWidthBrowser() > 540)
		{	
			item_sub_cat = 2; 
		}
		else
			item_sub_cat = 2;
 		
			$('#ul_subcategory_list').carouFredSel({
				responsive: true,
				width: '100%',
				height: 'variable',
				onWindowResize: 'debounce',
				prev: '#prev_sub_cat',
				next: '#next_sub_cat',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:160,
					height: 'auto',
					visible: {
						min: 1,
						max: item_sub_cat
					}
				},
				scroll: {
					items:item_sub_cat,
					direction : 'left',    
					duration  : 900 ,  
					onBefore: function(data) { 
	
					},
					onAfter	: function(data) {
					
				   }
				}
			});
	}

	</script>
</div>
{/if}