<?php
/* Smarty version 3.1.32, created on 2018-11-20 17:32:43
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcategory\views\templates\hook\wtproductcategory_accordion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf46f6b7cbf09_22635417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f563b6d3117e14e8c3fc1e0cb4a4309ffba8863' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcategory\\views\\templates\\hook\\wtproductcategory_accordion.tpl',
      1 => 1542717741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./medium_item.tpl' => 1,
  ),
),false)) {
function content_5bf46f6b7cbf09_22635417 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('number_line', 2);
$_smarty_tpl->_assignInScope('dem', 0);
$_smarty_tpl->_assignInScope('id_lang', Context::getContext()->language->id);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_cat_info']->value, 'cat_info', false, NULL, 'g_cat_info', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat_info']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']++;
$_smarty_tpl->_assignInScope('dem', $_smarty_tpl->tpl_vars['dem']->value+1);?>
<div class="out-content-prod">
<div class="block-content clearfix">
	<div id="wt-prod-cat-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['cat_info']->value['id_cat']), ENT_QUOTES, 'UTF-8');?>
" class="row">
	
		<div class="block-products col-sm-6 col-md-9 <?php if ($_smarty_tpl->tpl_vars['dem']->value%2 == 0) {?>right<?php }?>">
			
					<?php if ($_smarty_tpl->tpl_vars['cat_info']->value['cat_icon'] != '') {?>
					<div class="icon_cat">
					   <img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['icon_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_icon'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt=""/>
					</div>
					<?php }?>
					<h3>
						<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['cat_info']->value['id_cat'],$_smarty_tpl->tpl_vars['cat_info']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</a>
					</h3>
					
				
			<div class="content-product-sub-cat" id="content-product-sub-cat-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
">
				<?php if (isset($_smarty_tpl->tpl_vars['cat_info']->value['product_list']) && count($_smarty_tpl->tpl_vars['cat_info']->value['product_list']) > 0) {?>
				<div class="cycleElementsContainer" id="cycle-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">	
					<div id="elements-<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
						<div class="list_carousel responsive">
						<a id="cat-prev-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
" class="btn prev" href="#">&lt;</a>
						<a id="cat-next-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
" class="btn next" href="#">&gt;</a>
						<ul id="cat-carousel-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
" class="product-list-cat">
						<?php $_smarty_tpl->_assignInScope('i', 0);?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cat_info']->value['product_list'], 'product', false, NULL, 'product_list', array (
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
												
							<li class="ajax_block_product <?php if (intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['first'] : null))) {?>first_item<?php }?> <?php if (intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_product_list']->value['last'] : null))) {?>last_item<?php }?> ">						
							
									
							<?php $_smarty_tpl->_subTemplateRender('file:./medium_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>				

						</li>
						
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</ul>
						</div>
					</div>
				</div>
			 <?php } else { ?>
				<div class="item product-box no-product col-sm-12 col-md-6">
							<p class="alert alert-warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No product at this category','d'=>'Modules.WTProductCategory'),$_smarty_tpl ) );?>
</p>
				</div>
			 <?php }?>
			</div><!-- end content product sub cat -->
		</div>
		
		
		<div class="block-banner col-sm-3 col-md-3 <?php if ($_smarty_tpl->tpl_vars['dem']->value%2 == 0) {?>right<?php }?>">
			<div class="cat-banner">
				<?php if ($_smarty_tpl->tpl_vars['cat_info']->value['cat_banner'] != '') {?>
				<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['cat_info']->value['id_cat'],$_smarty_tpl->tpl_vars['cat_info']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['banner_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_banner'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt=""/></a>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['cat_info']->value['cat_desc'] != '') {?>
				<div class="cat-desc">
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_desc'],'quotes','UTF-8' ));?>

				</div>
				<?php }?>
				<div class="cat-view-more">
					<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['cat_info']->value['id_cat'],$_smarty_tpl->tpl_vars['cat_info']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View More','d'=>'Modules.WTProductCategory'),$_smarty_tpl ) );?>
</a>
				</div>
			</div>
		</div>	
		
	</div>
</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['cat_info']->value['show_img'] == 1 && isset($_smarty_tpl->tpl_vars['cat_info']->value['id_image']) && $_smarty_tpl->tpl_vars['cat_info']->value['id_image'] > 0) {?>
<div class="cat-img">
	<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['cat_info']->value['id_cat'],$_smarty_tpl->tpl_vars['cat_info']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_info']->value['cat_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
		<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['cat_info']->value['link_rewrite'],$_smarty_tpl->tpl_vars['cat_info']->value['id_image'],'category_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"/>
	</a>
</div>
<?php }?>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php echo '<script'; ?>
 type="text/javascript">
$(window).ready(function() {
		runSliderProducstCat();
	});

$(document).ajaxComplete(function(){
	runSliderProducstCat();
});
$(window).resize(function() {
			runSliderProducstCat();
});

function runSliderProducstCat()
{
	var item_sub_catpro = 7;
	var item_catpro = 6; 
	if(getWidthBrowser() > 1680)
		{	
			item_sub_catpro = 7;
			item_catpro = 6;
		}
	else		
	if(getWidthBrowser() > 1180)
		{	
			item_sub_catpro = 7;
			item_catpro = 5;
		}
		else
		if(getWidthBrowser() > 991)
		{	
			item_sub_catpro = 5;
			item_catpro = 4;			
		}
		else
		if(getWidthBrowser() > 767)
		{	
			item_sub_catpro = 3; 
			item_catpro = 3;
		}		
		else
		if(getWidthBrowser() > 540)
		{	
			item_sub_catpro = 2;
			item_catpro = 2;
		}
		else
		if(getWidthBrowser() > 340)
		{	
			item_sub_catpro = 2; 
			item_catpro = 2;
		}			
		else
		{
			item_sub_catpro = 2;
			item_catpro = 2;
		}
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_cat_info']->value, 'cat_info', false, NULL, 'g_cat_info', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat_info']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']++;
?>
	
	/*$('#sub-cat-ul-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
').carouFredSel({
				responsive: true,
				width: '100%',
				height: 'variable',
				onWindowResize: 'debounce',
				prev: '#subcat-prev-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
',
				next: '#subcat-next-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:60,
					height: 'auto',
					visible: {
						min: 2,
						max: item_sub_catpro
					}
				},
				scroll: {
					items:2,
					direction : 'left',    
					duration  : 500 ,  
					onBefore: function(data) {  
					},
					onAfter	: function(data) {
				   }
				}
			});*/
			
	$('#cat-carousel-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
').carouFredSel({
				responsive: true,
				width: '100%',
				height: 'variable',
				onWindowResize: 'debounce',
				prev: '#cat-prev-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
',
				next: '#cat-next-<?php echo htmlspecialchars(intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_g_cat_info']->value['iteration'] : null)), ENT_QUOTES, 'UTF-8');?>
',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width:150,
					height: 'auto',
					visible: {
						min: 2,
						max: item_catpro,
					}
				},
				scroll: {
					items:2,
					direction : 'left',    
					duration  : 500 ,  
					onBefore: function(data) {  
					},
					onAfter	: function(data) {
				   }
				}
			});
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
}	

<?php echo '</script'; ?>
>


<?php }
}
