<?php
/* Smarty version 3.1.32, created on 2018-11-09 16:47:07
  from 'module:wtpagetitleviewstemplates' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be5e43b6b7fa1_31605860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3872ca5585bf40a710de72c1c55fd7778da72dd1' => 
    array (
      0 => 'module:wtpagetitleviewstemplates',
      1 => 1541585445,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be5e43b6b7fa1_31605860 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['page_title']->value != '') {?>
	<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['page_title']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

<?php }
}
}
