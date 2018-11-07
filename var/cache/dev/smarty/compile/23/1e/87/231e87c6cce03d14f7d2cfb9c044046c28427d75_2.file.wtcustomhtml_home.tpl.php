<?php
/* Smarty version 3.1.32, created on 2018-10-08 18:41:11
  from '/home/beststor/public_html/version17/modules/wtcustomhtml/views/templates/hook/wtcustomhtml_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bbbcef74093c3_61890243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '231e87c6cce03d14f7d2cfb9c044046c28427d75' => 
    array (
      0 => '/home/beststor/public_html/version17/modules/wtcustomhtml/views/templates/hook/wtcustomhtml_home.tpl',
      1 => 1538503567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbbcef74093c3_61890243 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Static Block module -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['block_list']->value, 'block');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['block']->value) {
?>
	<?php if (isset($_smarty_tpl->tpl_vars['block']->value['content'])) {?>
		<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['block']->value['content'],'quotes','UTF-8' ));?>

	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<!-- /Static block module --><?php }
}
