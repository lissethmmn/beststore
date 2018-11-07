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

<div class="wt_logo_manufacturer col-sm-12">
<div class="container">
<div class="title">
		<h2 class="title_block"><span>{l s='Our Clients' mod='wtmanufacture'}</span></h2>
	</div>
<div class="list_manufacturer">
		<ul id="scroller_mannu">
		{$i=0}
		{foreach from=$list_manu item=manufacturer name=list_manu}
			<li class="{if $smarty.foreach.list_manu.first}first_item{elseif $smarty.foreach.list_manu.last}last_item{/if}">
				<a class="image_hoverwashe" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$manufacturer.name|escape:'htmlall':'UTF-8'}">
				<img src="{$path_ssl|escape:'htmlall':'UTF-8'}img/m/{$manufacturer.id_manufacturer|escape:'htmlall':'UTF-8'}-logo_manufacture.jpg" alt="{$manufacturer.name|escape:'htmlall':'UTF-8'}" />
				<span class="hover_bkg_light"></span>
				</a>
			</li>
		{/foreach}
		</ul>
			<a id="prev_manu" class="prev btn" href="#">&lt;</a>
			<a id="next_manu" class="next btn" href="#">&gt;</a>
	</div>
</div>
</div>
<script type="text/javascript">
	$(window).load(function(){
		runSliderManu();
	});
	
	$(window).resize(function(){
			runSliderManu();
	});
function runSliderManu()
{
	var item_manu = 7;
		
		if(getWidthBrowser() > 1180)
		{	
			item_manu = 7; 
		}
		else
		if(getWidthBrowser() > 890)
		{	
			item_manu = 6; 
		}
		else
		if(getWidthBrowser() > 767)
		{	
			item_manu = 4; 
		}
		else
		item_manu = 2; 
		$("#scroller_mannu").carouFredSel({
			auto: false,
			responsive: true,
				width: '100%',
				height:'variable',				
				prev: '#prev_manu',
				next: '#next_manu',
				swipe: {
					onTouch : true
				},
				items: {
					width: 185,
					height:'auto',
					visible: {
						min: 2,
						max: item_manu
					}
				},
				scroll: {
					items : 2 ,  
					direction : 'left',   
					duration  : 500 , 
					onBefore: function(data) {
						
					}

				}
		});
}
</script>
