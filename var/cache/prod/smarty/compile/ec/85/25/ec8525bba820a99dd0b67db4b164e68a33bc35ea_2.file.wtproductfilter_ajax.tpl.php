<?php
/* Smarty version 3.1.32, created on 2018-11-15 17:15:13
  from 'C:\xampp\htdocs\17beststore\modules\wtproductfilter\views\templates\hook\wtproductfilter_ajax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bedd3d1f1f937_71283110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec8525bba820a99dd0b67db4b164e68a33bc35ea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductfilter\\views\\templates\\hook\\wtproductfilter_ajax.tpl',
      1 => 1541585528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/customize/button-cart-ajax.tpl' => 1,
    'file:catalog/_partials/customize/button-quickview.tpl' => 1,
  ),
),false)) {
function content_5bedd3d1f1f937_71283110 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<?php if (isset($_smarty_tpl->tpl_vars['products_list']->value) && count($_smarty_tpl->tpl_vars['products_list']->value) > 1) {?>
		<a id="prev<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
" class="button-arrow prev" href="#">&lt;</a>
		<a id="next<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
" class="button-arrow next" href="#">&gt;</a>
		<div class="cycleElementsContainer" id="cycle-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
">
			<div id="elements-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
">
				<div class="list_carousel responsive">
					<ul id="carousel<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
" class="product-list">
					<?php $_smarty_tpl->_assignInScope('i', 0);?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products_list']->value, 'product', false, NULL, 'product_list', array (
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
" id-tab="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
" wt-data-id-product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
">
						<h3 class="product-name"><a class="product-name" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],50,'...' ))),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a></h3>
						<div class="product-image-container">
							<div class="div-product-image">							
									<a class="product_image" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['legend'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
										<img class="img-responsive wt-image" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['legend'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
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
														<?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices'] && $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type'] == 'percentage') {?>
														-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'],'quotes','UTF-8' ))*100, ENT_QUOTES, 'UTF-8');?>
%
														<?php } else { ?>
														-<?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-$_smarty_tpl->tpl_vars['product']->value['price']), ENT_QUOTES, 'UTF-8');?>

														<?php }?>
														</span>
													</p>
									<?php }?>
									<?php }?>
									<div class="thumbs-content" id="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name_module']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
-wt-thumbs-content-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
"></div>
									<div class="wt-button-container">
									<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart-ajax.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'name_module'=>$_smarty_tpl->tpl_vars['name_module']->value), 0, true);
?>
									<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-quickview.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

									</div>
							</div>
						</div>
						<div>
								
									<div class="review">									
											<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

									</div>
						</div>
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
		<?php } else { ?>
			<p class="alert alert-warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No product at this time','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>
</p>
		<?php }?>
	
<?php if ($_smarty_tpl->tpl_vars['products_list']->value && count($_smarty_tpl->tpl_vars['products_list']->value) > 0) {
echo '<script'; ?>
 type="text/javascript">
	$(window).ready(function() {
		runSliderHometab_Ajax();
		
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
			
		});
		
	});



	function runSliderHometab_Ajax(){
	
	var item_hometab = 8;
		if(getWidthBrowser() > 1380)
		{	
			item_hometab = 8; 
		}
		else
		if(getWidthBrowser() > 1180)
		{	
			item_hometab = 6; 
		}
		else
		if(getWidthBrowser() > 991)
		{	
			item_hometab = 6; 
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
		
			$("#carousel<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
 li:nth-child("+item_hometab+")").addClass("last_item");
			$('#carousel<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
').carouFredSel({
				responsive: true,
				width: '100%',
				height: 'variable',
				onWindowResize: 'debounce',
				prev: '#prev<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
',
				next: '#next<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:160,
					height: 'auto',
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
						var n=5;
						n=data.items.visible.length;
						$("#carousel<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
 li").removeClass("first_item");
						$("#carousel<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_tab']->value), ENT_QUOTES, 'UTF-8');?>
 li:nth-child(1)").addClass("first_item");
				   }
				}
			});
	}
<?php echo '</script'; ?>
>
<?php }?>


<?php }
}
