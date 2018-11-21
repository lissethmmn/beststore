<?php
/* Smarty version 3.1.32, created on 2018-11-21 15:07:29
  from 'module:wtmanufactureviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf59ee15a5e53_10094416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a048b6cdd441e84b64b39fd2a81f7ad7cd020b6' => 
    array (
      0 => 'module:wtmanufactureviewstemplat',
      1 => 1542816188,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf59ee15a5e53_10094416 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="wt_logo_manufacturer col-sm-12">
<div class="container">
<div class="title">
		<h2 class="title_block"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Our Clients','mod'=>'wtmanufacture'),$_smarty_tpl ) );?>
</span></h2>
	</div>
<div class="list_manufacturer">
		<ul id="scroller_mannu">
		<?php $_smarty_tpl->_assignInScope('i', 0);?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_manu']->value, 'manufacturer', false, NULL, 'list_manu', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['total'];
?>
			<li class="<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['first'] : null)) {?>first_item<?php } elseif ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_list_manu']->value['last'] : null)) {?>last_item<?php }?>">
				<a class="image_hoverwashe" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['manufacturer']->value['name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
				<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_ssl']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
img/m/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
-logo_manufacture.jpg" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['manufacturer']->value['name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
				<span class="hover_bkg_light"></span>
				</a>
			</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
			<a id="prev_manu" class="prev btn" href="#">&lt;</a>
			<a id="next_manu" class="next btn" href="#">&gt;</a>
	</div>
</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>
<?php }
}
