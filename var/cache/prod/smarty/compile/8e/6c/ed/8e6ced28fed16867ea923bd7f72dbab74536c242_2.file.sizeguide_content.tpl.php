<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:30:34
  from 'C:\xampp\htdocs\17beststore\modules\wtsizeguide\views\templates\hook\sizeguide_content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be480ca056d21_32218749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e6ced28fed16867ea923bd7f72dbab74536c242' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtsizeguide\\views\\templates\\hook\\sizeguide_content.tpl',
      1 => 1541585542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be480ca056d21_32218749 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['tabs']->value) && count($_smarty_tpl->tpl_vars['tabs']->value) > 0) {?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'tab');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
?>

	<div class="page-product-box tab-pane fade in" id="idTab_siseguide_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['tab']->value['id_wtsizeguide']), ENT_QUOTES, 'UTF-8');?>
">

		<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['content'],'htmlall','UTF-8' ));?>
		

	</div>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }
}
}
