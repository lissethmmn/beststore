<?php
/* Smarty version 3.1.32, created on 2018-11-21 13:18:14
  from 'C:\xampp\htdocs\17beststore\adminbs\themes\default\template\helpers\tree\tree_toolbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf58546243f82_89057124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e4c9066b9671e78513afb6f0bdb8123582511dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\adminbs\\themes\\default\\template\\helpers\\tree\\tree_toolbar.tpl',
      1 => 1541516584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf58546243f82_89057124 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-actions pull-right">
	<?php if (isset($_smarty_tpl->tpl_vars['actions']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
?>
		<?php echo $_smarty_tpl->tpl_vars['action']->value->render();?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
</div>
<?php }
}
