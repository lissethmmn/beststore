{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<section id="js-product-list" class="featured-products clearfix mt-3">
  <h2>
    {if $products|@count == 1}
      {l s='%s other product in the same category:' sprintf=[$products|@count] d='Shop.Theme.Catalog'}
    {else}
      {l s='%s other products in the same category:' sprintf=[$products|@count] d='Shop.Theme.Catalog'}
    {/if}
  </h2>
 <div id="carousel_cat_product" class="product-list">
      {foreach from=$products item="product"}
          <article class="ajax_block_product product-miniature js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" itemscope itemtype="http://schema.org/Product">
				<div class="thumbnail-container wt_container_thumbnail">
				<div class="div-product-image">
				  {block name='product_thumbnail'}
					<a href="{$product.url}" class="thumbnail product-thumbnail">
					  <img class="wt-image"
						src = "{$product.cover.bySize.home_default.url}"
						alt = "{$product.cover.legend}"
						data-full-size-image-url = "{$product.cover.large.url}"
					  >
					</a>
					{hook h='displayProductListThumbnails' product=$product}
				  {/block}
				  
				</div>
				  <div class="product-description">
					{block name='product_name'}
					  <h1 class="h3 product-title" itemprop="name"><a href="{$product.url}">{$product.name|truncate:30:'...'}</a></h1>
					{/block}
					<div class="description" style="display: none;">{$product.description_short|truncate:400:'...' nofilter}</div>
					{block name='product_price_and_shipping'}
					  {if $product.show_price}
						<div class="product-price-and-shipping">
						  {if $product.has_discount}
							{hook h='displayProductPriceBlock' product=$product type="old_price"}

							<span class="regular-price">{$product.regular_price}</span>
							{if $product.discount_type === 'percentage'}
							  <span class="discount-percentage">{$product.discount_percentage}</span>
							{/if}
						  {/if}

						  {hook h='displayProductPriceBlock' product=$product type="before_price"}

						  <span itemprop="price" class="price">{$product.price}</span>

						  {hook h='displayProductPriceBlock' product=$product type='unit_price'}

						{hook h='displayProductPriceBlock' product=$product type='weight'}
					  </div>
					{/if}
				  {/block}

				  {block name='product_reviews'}
					{hook h='displayProductListReviews' product=$product}
				  {/block}
				</div>
			</article>
  
      {/foreach}
  </div>
</section>

{if $products && count($products)>0}
<script type="text/javascript">
	$(window).load(function() {
		runSliderCatProduct();
	});

	
	
	function runSliderCatProduct(){
	if(getWidthBrowser() > 767)
	{	
			$("#carousel_cat_product").owlCarousel({
			  loop: true,
				responsive: {
					0: { items: 2},
					464:{ items: 2, slideBy:2},
					750:{ items: 3, slideBy:3},
					974:{ items: 3, slideBy:4},
					1170:{ items: 4, slideBy:4}
				},
			  dots: false,
			  nav: true,
			  loop: true,
			  margin:0
			});
	}
	else
	{
		$("#carousel_cat_product").owlCarousel({
			  loop: true,
				responsive: {
					0: { items: 2},
					464:{ items: 2, slideBy:2},
					750:{ items: 3, slideBy:3},
					974:{ items: 3, slideBy:4},
					1170:{ items: 4, slideBy:4}
				},
			  dots: false,
			  nav: true,
			  loop: true,
			  margin:0
			});
	}
	

	}
	
</script>
{/if}