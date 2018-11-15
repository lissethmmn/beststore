<?php
/* Smarty version 3.1.32, created on 2018-11-15 14:49:43
  from 'C:\xampp\htdocs\17beststore\modules\swachilexpress\views\templates\hook\quoteservice.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bedb1b7843a87_24836592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a47a9a870dfb62c2110756dedbe3867aeee9f4a1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\swachilexpress\\views\\templates\\hook\\quoteservice.tpl',
      1 => 1541585168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bedb1b7843a87_24836592 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="cart_navigation" style="padding: 36px;">

<p align="center"><img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
logo.png" width="50" height="50" /></p>

<a id="inline" href="#data" class="btn btn-default"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping cost with Chilexpress','mod'=>'swachilexpress'),$_smarty_tpl ) );?>
</a>

</div>

<div style="display:none"><div id="data"> 

<form action="" method="post" name="frmChilexQuote">

<table class="table">

	<tr>

		<td><img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
logo.png" width="100" height="100" /></td>

		<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You want to know how much you are sending this product? You can check the shipping price using this option','mod'=>'swachilexpress'),$_smarty_tpl ) );?>
</td>

	</tt>

	<tr>

		<td><label for="origin"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Origin','mod'=>'swachilexpress'),$_smarty_tpl ) );?>
</label></td>

		<td><select name="origin" id="origin">

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['states']->value, 'con', false, 'cid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['con']->value) {
?>

			<option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['con']->value['iso_code'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['con']->value['name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</option>

		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		</select></td>

	</tr>

	<tr>

		<td><label for="destination"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Destination','mod'=>'swachilexpress'),$_smarty_tpl ) );?>
</label></td>

		<td><select name="destination" id="destination">

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['states']->value, 'con', false, 'cid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['con']->value) {
?>

			<option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['con']->value['iso_code'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['con']->value['name'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</option>

		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		</select></td>

	</tr>

	<tr>

		<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The shipping cost is:','mod'=>'swachilexpress'),$_smarty_tpl ) );?>
&nbsp;<h1><div id="cost"></div></h1></td>

	</tr>

	<tr>

		<td colspan="2">

	<input class="hidden" type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_product']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" name="id_product" id="id_product">

	<input class="hidden" type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" name="module_dir" id="module_dir">

	<input class="hidden" type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['width']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" name="width" id="width">

	<input class="hidden" type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['height']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" name="height" id="height">

	<input class="hidden" type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['depth']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" name="depth" id="depth">

	<input class="hidden" type="hidden" value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['weight']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" name="weight" id="weight">

	<div class="submit">

		<button id="SubmitCreate" class="button btn btn-default button-large" name="SubmitCreate" type="button" onClick="quote()"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Send','mod'=>'swachilexpress'),$_smarty_tpl ) );?>
</button>

	</div></td>

	</tr>

</table>

</form>



</div></div>

</div>



<?php echo '<script'; ?>
 type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><?php echo '</script'; ?>
>

<link rel="stylesheet" href="../modules/swachilexpress/views/css/jquery.fancybox.css" type="text/css" media="screen" />

<?php echo '<script'; ?>
>

$(document).ready(function() {



	/* This is basic - uses default settings */

	

	$("a#inline").fancybox({

		'hideOnContentClick': true

	});

	

	

	

});

<?php echo '</script'; ?>
>







<?php }
}
