<?php
/* Smarty version 3.1.32, created on 2018-11-13 18:26:06
  from 'C:\xampp\htdocs\17beststore\modules\wtcustomhtml\views\templates\hook\wtcustomhtml_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb416e1c3bc3_91245909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21d37bdd467240cfee1999d27fc09683d0c5264d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtcustomhtml\\views\\templates\\hook\\wtcustomhtml_footer.tpl',
      1 => 1541585400,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb416e1c3bc3_91245909 (Smarty_Internal_Template $_smarty_tpl) {
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
