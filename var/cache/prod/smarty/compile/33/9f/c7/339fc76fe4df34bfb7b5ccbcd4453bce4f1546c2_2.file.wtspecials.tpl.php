<?php
/* Smarty version 3.1.32, created on 2018-11-15 16:30:54
  from 'C:\xampp\htdocs\17beststore\themes\child_wt_buyonline\modules\wtspecials\views\templates\hook\wtspecials.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bedc96e317a75_62012961',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '339fc76fe4df34bfb7b5ccbcd4453bce4f1546c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\child_wt_buyonline\\modules\\wtspecials\\views\\templates\\hook\\wtspecials.tpl',
      1 => 1541585630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./main_item.tpl' => 1,
    'file:./medium_item.tpl' => 1,
  ),
),false)) {
function content_5bedc96e317a75_62012961 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php $_smarty_tpl->_assignInScope('number_line', 1);?>

<div id="wt-special-products" class="wt-special-products col-xs-12">

	<div class="title-block">

	<h2><a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getPageLink('prices-drop'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hot Deals','mod'=>'wtspecials'),$_smarty_tpl ) );?>
"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Daily Deals!','mod'=>'wtspecials'),$_smarty_tpl ) );?>
</span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get our best price','mod'=>'wtspecials'),$_smarty_tpl ) );?>
</a>

	</h2>

	</div>

			<div class="block_content">

			

			<a id="prev_wt_special_product" class="button-arrow prev" href="#">&lt;</a>

			<a id="next_wt_special_product" class="button-arrow next" href="#">&lt;</a>



			

				<?php if (isset($_smarty_tpl->tpl_vars['new_products']->value) && count($_smarty_tpl->tpl_vars['new_products']->value) > 0) {?>

						<ul id="wt_special_product" class="product-list">

						<?php $_smarty_tpl->_assignInScope('i', 0);?>

						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_products']->value, 'product', false, NULL, 'products', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['total'];
?>	

						 	<?php if ($_smarty_tpl->tpl_vars['i']->value%3 == 0) {?> 					

								<li class="<?php if (intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['first'] : null))) {?>first_item<?php }?> <?php if (intval((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['last'] : null))) {?>last_item<?php }?> ">												

							<?php }?>

							<?php if ($_smarty_tpl->tpl_vars['i']->value%3 == 2) {?>

							<div class="wt-prod-special col-sm-6 col-md-6">

							<?php $_smarty_tpl->_subTemplateRender('file:./main_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>	

							</div>

							<?php } else { ?>

							<div class="product-list-thumb col-sm-6 col-md-3">

								<?php $_smarty_tpl->_subTemplateRender('file:./medium_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>	

								</div>

							<?php }?>

							

							<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>

						

						

						<?php if ($_smarty_tpl->tpl_vars['i']->value%3 == 0 || $_smarty_tpl->tpl_vars['i']->value == count($_smarty_tpl->tpl_vars['new_products']->value)) {?>

						</li>

						<?php }?>



							

						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

						</ul>

					</div>

					<?php } else { ?>

						<p class="alert alert-warning"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No product at this time','mod'=>'wtspecials'),$_smarty_tpl ) );?>
</p>

					<?php }?>

						

						

						<?php echo '<script'; ?>
 type="text/javascript">

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

						<?php echo '</script'; ?>
>

				

</div><?php }
}
