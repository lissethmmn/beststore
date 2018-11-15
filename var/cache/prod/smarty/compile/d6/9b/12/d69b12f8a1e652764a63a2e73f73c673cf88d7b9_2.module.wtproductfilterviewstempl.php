<?php
/* Smarty version 3.1.32, created on 2018-11-15 13:25:25
  from 'module:wtproductfilterviewstempl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bed9df539d195_37316355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd69b12f8a1e652764a63a2e73f73c673cf88d7b9' => 
    array (
      0 => 'module:wtproductfilterviewstempl',
      1 => 1542228950,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/customize/button-cart-2.tpl' => 1,
    'file:catalog/_partials/customize/button-quickview.tpl' => 1,
  ),
),false)) {
function content_5bed9df539d195_37316355 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (count($_smarty_tpl->tpl_vars['tabs']->value) > 0) {?>

<div class="wt_home_filter_product_tab col-xs-12 col-sm-12" id="wt_home_filter_product_tab_ssl" static_token="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['static_token']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" url_page_cart="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['urls']->value['pages']['cart'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" wt_base_ssl="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_ssl']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
<h1> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Trending now','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>
</h1>
<div id="tabs" class="sub-cat">
	<ul id="ul_tv_tab" class="title-tab sub-cat-ul">
		<?php $_smarty_tpl->_assignInScope('i', 0);?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'tab', false, NULL, 'tabs', array (
  'iteration' => true,
  'first' => true,
  'last' => true,
  'index' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['total'];
?>
			<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
			<li wt-name-module="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name_module']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" type-tab="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['product_type'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" id-tab="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class=" <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['first'] : null)) {?>first ui-tabs-selected ui-state-active<?php } elseif ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['last'] : null)) {?>last<?php }?> ">
				<a class="title_block" href="javascript:void(0)">
				<?php if (isset($_smarty_tpl->tpl_vars['tab']->value['title'])) {?>
				<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

				<?php } else { ?>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'not title','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>

				<?php }?>
				</a>
			</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>

	<div class="content-tab-product">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'tab', false, NULL, 'tabs', array (
  'iteration' => true,
  'first' => true,
  'last' => true,
  'index' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['total'];
?>
		
	<div class="tabs-carousel" id="tabs-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
		<?php if ($_smarty_tpl->tpl_vars['tab']->value['tab_product_list']->product_list && count($_smarty_tpl->tpl_vars['tab']->value['tab_product_list']->product_list) > 0) {?>
		<a id="prev<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
" class="button-arrow prev" href="#">&lt;</a>
		<a id="next<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
" class="button-arrow next" href="#">&gt;</a>
		<div class="cycleElementsContainer" id="cycle-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
			<div id="elements-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
				<div class="list_carousel responsive">
					<ul id="carousel<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
" class="product-list">
					<?php $_smarty_tpl->_assignInScope('i', 0);?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab']->value['tab_product_list']->product_list, 'product', false, NULL, 'product_list', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['total'];
?>
						<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
					<li class="ajax_block_product <?php if (intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['first'] : null))) {?>first_item<?php } elseif (intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['last'] : null))) {?>last_item<?php }?> js-product-miniature" data-id-product="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['id_product'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
					<div class="product-block wt_container_thumbnail" wt-name-module="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name_module']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" id-tab="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" wt-data-id-product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
">

						<div class="product-image-container">
									<div class="div-product-image">							
									<a class="product_image" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['legend'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
										<img class="img-responsive wt-image lazy" data-animate="zoomIn" data-delay="30" data-original="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_ssl']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/wtproductcategory/views/img/empty-lazy.gif" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['legend'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
										<span class="overlay"></span>
									</a>
									<!--
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['new']) && $_smarty_tpl->tpl_vars['product']->value['new'] == 1) {?>
									<span class="new-label"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>
</span></span>
									<?php }?>-->									
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['show_price']) && $_smarty_tpl->tpl_vars['product']->value['show_price'] && !isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']) && $_smarty_tpl->tpl_vars['product']->value['specific_prices'] && isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']) && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'] > 0) {?>
											<p class="discount-percentage animated" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
														<span class="sale">
<!-- 														<?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices'] && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type'] == 'percentage') {?>
														-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'],'quotes','UTF-8' ))*100, ENT_QUOTES, 'UTF-8');?>
%
														<?php } else { ?>
														-<?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-$_smarty_tpl->tpl_vars['product']->value['price']), ENT_QUOTES, 'UTF-8');?>

														<?php }?> -->
														</span>
													</p>
									<?php }?>
									<?php }?>
									<div class="thumbs-content" id="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name_module']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
-wt-thumbs-content-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
"></div>
									</div>
							<div class="wt-button-container">
							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart-2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'name_module'=>$_smarty_tpl->tpl_vars['name_module']->value), 0, true);
?>
							<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-quickview.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

							</div>
						</div>
						<div>
								
									<div class="review">									
											<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

									</div>
						</div>
							
							
						<h3 class="product-name"><a class="product-name" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],50,'...' ))),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a></h3>
							<div class="content_price product-price-and-shipping">
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['show_price']) && $_smarty_tpl->tpl_vars['product']->value['show_price'] && !isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
										<span itemprop="price" class="price <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']) && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'] > 0) {?> special-price<?php }?>">												
												<?php echo htmlspecialchars(Tools::displayPrice(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['price'],'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>


												</span>
										<?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']) && $_smarty_tpl->tpl_vars['product']->value['specific_prices'] && isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']) && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'] > 0) {?>
												<span class="old-price regular-price">
												<?php echo htmlspecialchars(Tools::displayPrice(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['price_without_reduction'],'quotes','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>

												</span>
										<?php }?>
											<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl ) );?>

											<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl ) );?>

									<?php }?>
								</div>
							
						
						
						
					</div>
					</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</ul>
					<div class="cclearfix"></div>					
				</div>
		</div>
	</div>
	
	<?php }?>
	</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	
</div>

<?php echo '<script'; ?>
 type="text/javascript">
	$(window).ready(function() {
		runSliderHometab();
	});

	$(window).resize(function() {
			runSliderHometab();
	});
	
	function runSliderHometab(){
	
	var item_hometab = 5;
		if(getWidthBrowser() > 1380)
		{	
			item_hometab = 8; 
		}
		else
		if(getWidthBrowser() > 1180)
		{	
			item_hometab = 5; 
		}
		else
		if(getWidthBrowser() > 991)
		{	
			item_hometab = 4; 
		}
		else
		if(getWidthBrowser() > 767)
		{	
			item_hometab = 3; 
		}		
		else
		if(getWidthBrowser() > 540)
		{	
			item_hometab = 2; 
		}
		else
		if(getWidthBrowser() > 340)
		{	
			item_hometab = 2; 
		}
/*		
		if(getWidthBrowser() <=767){
			$('#tabs div.title_tab_hide_show').show();
			
		} else {		
			$('#tabs div.title_tab_hide_show').hide();
		}*/
		
		
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'tab', false, NULL, 'tabs', array (
  'iteration' => true,
  'first' => true,
  'last' => true,
  'index' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['total'];
?>
			$("#carousel<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
 li:nth-child("+item_hometab+")").addClass("last_item");
			$('#carousel<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
').carouFredSel({
				responsive: true,
				width: '100%',
				prev: '#prev<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
',
				next: '#next<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:260,
					visible: {
						min: 1,
						max: item_hometab
					}
				},
				scroll: {
					items:item_hometab,
					direction : 'left',    
					duration  : 1200 ,  
					onBefore: function(data) { 
						
					},
					onAfter	: function(data) {
						 $('#carousel<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
')
							.find('img.lazy')
							.each(function() {
							   var src = $(this).attr('data-original');
							  $(this).attr('src', src);
							});
		
						var n=5;
						n=data.items.visible.length;
						$("#carousel<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
 li").removeClass("first_item");
						$("#carousel<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tabs']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
 li:nth-child(1)").addClass("first_item");
				   }
				}
			});
			<?php if ($_smarty_tpl->tpl_vars['isMobile']->value == 0) {?>
			<?php break 1;?>
			<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	}
	


<?php echo '</script'; ?>
>
</div>
</div>
<?php }?>


<?php }
}
