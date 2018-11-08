<?php
/* Smarty version 3.1.32, created on 2018-11-08 17:22:41
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcategory\views\templates\admin\displaystatus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be49b1124f977_02898860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73cff88ceba158ecc424bf4a26a7aff5d31d9c9f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcategory\\views\\templates\\admin\\displaystatus.tpl',
      1 => 1541585473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be49b1124f977_02898860 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a class="btn <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['class']->value,'quotes','UTF-8' ));?>
" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value,'quotes','UTF-8' ));?>
&configure=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'quotes','UTF-8' ));?>
&token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['token']->value,'quotes','UTF-8' ));?>
&changeStatus&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['id_wtgroupcategory']->value);?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'quotes','UTF-8' ));?>
"><i class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['icon']->value,'quotes','UTF-8' ));?>
"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['title']->value,'quotes','UTF-8' ));?>
</a><?php }
}
