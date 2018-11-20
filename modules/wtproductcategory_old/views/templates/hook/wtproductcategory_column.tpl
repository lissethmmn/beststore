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

{$number_line = 2}
{$id_lang = Context::getContext()->language->id}
	<div class="block-content type-colum">
		{foreach from=$group_cat_info item=cat_info name=g_cat_info}
		<div class="wt-prod-cat-{$cat_info.id_cat|intval} col-sm-4">
			<div class="cat-bar col-sm-12">
			  <div class="out-wt-prod">
				{if $cat_info.cat_icon!='' }
					<div class="icon_cat" style="background-color:{$cat_info.cat_color|escape:'html':'UTF-8'}">
					   <img src="{$icon_path|escape:'html':'UTF-8'}{$cat_info.cat_icon|escape:'html':'UTF-8'}" alt=""/>
					</div>
				{/if}
			    <h3><a href="{$link->getCategoryLink($cat_info.id_cat, $cat_info.link_rewrite)|escape:'html':'UTF-8'}" title="{$cat_info.cat_name|escape:'html':'UTF-8'}">{$cat_info.cat_name|escape:'html':'UTF-8'}</a></h3>
			  </div>
			</div>
			<div class="sub-cat col-sm-12">
				<ul class="sub-cat-ul">
					{foreach from = $cat_info.sub_cat item=sub_cat name=sub_cat_info}
						<li><a href="{$link->getCategoryLink($sub_cat.id_category, $sub_cat.link_rewrite)|escape:'html':'UTF-8'}" title="{$sub_cat.name|escape:'html':'UTF-8'}">{$sub_cat.name|escape:'html':'UTF-8'}</a></li>
					{/foreach}
					{if $cat_info.show_img == 1 && isset($cat_info.id_image) && $cat_info.id_image > 0}
					<li class="cat-img">
						<a href="{$link->getCategoryLink($cat_info.id_cat, $cat_info.link_rewrite)|escape:'html':'UTF-8'}" title="{$cat_info.cat_name|escape:'html':'UTF-8'}">
							<img src="{$link->getCatImageLink($cat_info.link_rewrite, $cat_info.id_image, 'medium_default')|escape:'html':'UTF-8'}"/>
						</a>
					</li>
					{/if}
					{if isset($cat_info.special_prod_obj) && count($cat_info.special_prod_obj)}
						{$cat_product = $cat_info.special_prod_obj}
						{$id_lang = Context::getContext()->language->id}
						<li class="wt-prod-special">
							<h5 class="product-name">{$cat_product->name[$id_lang]|escape:'html':'UTF-8'}</h5>
							<a class="product_img_link" href="{$link->getProductLink($cat_product)|escape:'html':'UTF-8'}" title="{$cat_product->name[$id_lang]|escape:'html':'UTF-8'}">
							
							<img class="replace-2x img-responsive" src="{$link->getImageLink($cat_product->link_rewrite, $cat_product->id_image, 'home_default')|escape:'html':'UTF-8'}" alt="" title=""/>
							</a>
						</li>
					{/if}
				</ul>
			</div>
			<div class="cat-banner col-sm-12">
				{if $cat_info.cat_banner!='' }
					<a href="{$link->getCategoryLink($cat_info.id_cat, $cat_info.link_rewrite)|escape:'html':'UTF-8'}" title="{$cat_info.cat_name|escape:'html':'UTF-8'}">
						<img src="{$banner_path|escape:'html':'UTF-8'}{$cat_info.cat_banner|escape:'html':'UTF-8'}" alt=""/>
					</a>
				{/if}
			</div>
			<div class="product_list col-sm-12">
				<div class="owl-prod-cat">
					{foreach from=$cat_info.product_list item=product name=product_list}
						{if $smarty.foreach.product_list.iteration % $number_line == 1 || $number_line == 1}
						<div class="item product-box ajax_block_product">
						{/if}
							<div class="product-container">
								<h5 class="product-name">{$product.name|escape:'html':'UTF-8'}</h5>
								{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
								<div class="content_price">
									{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
										<span class="price product-price">
											{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
										</span>
										{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
											{hook h="displayProductPriceBlock" product=$product type="old_price"}
											<span class="old-price product-price">
												{displayWtPrice p=$product.price_without_reduction}
											</span>
											{hook h="displayProductPriceBlock" id_product=$product.id_product type="old_price"}
											{if $product.specific_prices.reduction_type == 'percentage'}
												<span class="price-percent-reduction">-{$product.specific_prices.reduction * 100|escape:'html':'UTF-8'}%</span>
											{/if}
										{/if}
										{hook h="displayProductPriceBlock" product=$product type="price"}
										{hook h="displayProductPriceBlock" product=$product type="unit_price"}
									{/if}
								</div>
								{/if}
								<a class="product_img_link" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.legend|escape:html:'UTF-8'}">
								<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{$product.legend|escape:html:'UTF-8'}" /></a>
							</div>
						{if $smarty.foreach.product_list.iteration % $number_line == 0 || $smarty.foreach.product_list.last || $number_line == 1}
						</div>
						{/if}
					{/foreach}
				</div>
				{if count($cat_info)>0}
				<div class="manu-list">
					<ul>
						{foreach from=$cat_info.manufacture item=manu_item name=manufacture}
							<li><a href="#">{$manu_item->name|escape:'html':'UTF-8'}</a></li>
						{/foreach}
					</ul>
				</div>
				{/if}
			</div>
		</div>
		{/foreach}
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		$(".owl-prod-cat").owlCarousel({
		  loop: true,
		  responsive: {
				0: { items: 2},
				464:{ items: 2},
				750:{ items: 2},
				974:{ items: 2},
				1170:{ items: 3}
			},
		  dots: false,
		  nav: true,
		  loop: true
		  });
	});
	</script>