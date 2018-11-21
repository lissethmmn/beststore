<?php
/* Smarty version 3.1.32, created on 2018-11-21 15:07:28
  from 'C:\xampp\htdocs\17beststore\modules\wtattributes\views\templates\hook\wtattributes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf59ee026b140_06487545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28fb079ee38ba89d784df767a4d1fb8491915b16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtattributes\\views\\templates\\hook\\wtattributes.tpl',
      1 => 1542816184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf59ee026b140_06487545 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if (isset($_smarty_tpl->tpl_vars['group_attributes']->value)) {?>
<div class="wt_color">
<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Color: ','mod'=>'wtattributes'),$_smarty_tpl ) );?>
</span> 
<?php $_smarty_tpl->_assignInScope('tam1', 'zero');?>
<ul>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_attributes']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['v']->value['group_name'] == 'Color' || $_smarty_tpl->tpl_vars['v']->value['group_name'] == 'Couleur') {?>
			<?php if ($_smarty_tpl->tpl_vars['tam1']->value != $_smarty_tpl->tpl_vars['v']->value['attribute_name']) {?>
			<li style="background:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['v']->value['attribute_color'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"></li>
			<?php $_smarty_tpl->_assignInScope('tam1', $_smarty_tpl->tpl_vars['v']->value['attribute_name']);?>
			<?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['group_attributes']->value)) {?>
<div class="wt_size">
<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Size: ','mod'=>'wtattributes'),$_smarty_tpl ) );?>
</span>  
<?php $_smarty_tpl->_assignInScope('tam', 'zero');?>
<ul>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_attributes']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['v']->value['group_name'] == 'Size' || $_smarty_tpl->tpl_vars['v']->value['group_name'] == 'Taille') {?>
			<?php if ($_smarty_tpl->tpl_vars['tam']->value != $_smarty_tpl->tpl_vars['v']->value['attribute_name']) {?>
			<li><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['v']->value['attribute_name'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</li>
			<?php $_smarty_tpl->_assignInScope('tam', $_smarty_tpl->tpl_vars['v']->value['attribute_name']);?>
			<?php }?>
	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</ul>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['group_attributes']->value)) {?>
<div class="wt_size">
<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Size: ','mod'=>'wtattributes'),$_smarty_tpl ) );?>
</span>  
<?php $_smarty_tpl->_assignInScope('tam', 'zero');?>
<ul>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_attributes']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['v']->value['group_name'] == 'Memory') {?>
			<?php if ($_smarty_tpl->tpl_vars['tam']->value != $_smarty_tpl->tpl_vars['v']->value['attribute_name']) {?>
			<li><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['v']->value['attribute_name'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</li>
			<?php $_smarty_tpl->_assignInScope('tam', $_smarty_tpl->tpl_vars['v']->value['attribute_name']);?>
			<?php }?>
	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</ul>
</div>
<?php }
}
}
