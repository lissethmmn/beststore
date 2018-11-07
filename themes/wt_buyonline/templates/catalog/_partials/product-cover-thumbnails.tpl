{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div class="images-container">
  {block name='product_cover'}
    <div class="product-cover">
      <a href="{$product.cover.bySize.large_default.url}"><img class="js-qv-product-cover" src="{$product.cover.bySize.large_default.url}" alt="{$product.cover.legend}" title="{$product.cover.legend}" style="width:100%;" itemprop="image"></a>
      <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
        <i class="material-icons zoom-in">&#xE8FF;</i>
      </div>
    </div>
  {/block}

  {block name='product_images'}
  
  
    <div class="js-qv-mask mask">
	<a id="prev_thumblist" class="button-arrow-vertical prev" href="#"></a>
	<a id="next_thumblist" class="button-arrow-vertical next" href="#"></a>
      <ul id="thumbs_list_frame" class="product-images js-qv-product-images" name="thumb-images">
        {foreach from=$product.images item=image}
          <li class="thumb-container">
            <a wt_rel="prettyPhoto[thumb-images]" href="{$image.bySize.large_default.url}"><img
              class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
              data-image-medium-src="{$image.bySize.medium_default.url}"
              data-image-large-src="{$image.bySize.large_default.url}"
              src="{$image.bySize.large_default.url}"
              alt="{$image.legend}"
              title="{$image.legend}"
              
              itemprop="image"
            >
			</a>
          </li>
        {/foreach}
      </ul>

	</div>
  {/block}
</div>

	
<script type="text/javascript">
	$(window).ready(function() {
		runSliderthumbnail();
	});
$(function(){
	runSliderthumbnail();
});
	
	function runSliderthumbnail(){
		$('#thumbs_list_frame').carouFredSel({
				responsive: true,
				direction: 'up',
				width: 'variable',
				height: '80',
				onWindowResize: 'debounce',
	
				prev: '#prev_thumblist',
				next: '#next_thumblist',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width: 'auto',
					height: '360px',
					visible: 3
				},
				scroll: {
					items:1,
					direction : 'up',    
					duration  : 700 ,  
					onBefore: function(data) { 	
					},
					onAfter	: function(data) {
				   }
				}
			});
		
	}
</script>

{hook h='displayAfterProductThumbs'}
