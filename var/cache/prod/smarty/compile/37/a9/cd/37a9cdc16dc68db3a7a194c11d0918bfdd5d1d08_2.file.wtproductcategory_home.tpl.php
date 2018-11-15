<?php
/* Smarty version 3.1.32, created on 2018-11-15 17:14:21
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcategory\views\templates\hook\wtproductcategory_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bedd39d272091_87765755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37a9cdc16dc68db3a7a194c11d0918bfdd5d1d08' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcategory\\views\\templates\\hook\\wtproductcategory_home.tpl',
      1 => 1541585478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./wtproductcategory_accordion.tpl' => 1,
    'file:./wtproductcategory_column.tpl' => 1,
    'file:./wtproductcategory_tab.tpl' => 1,
  ),
),false)) {
function content_5bedd39d272091_87765755 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Module Product From Category -->
<div class="wt-prod-cat clearfix" id="wt-prod-cat-base-ssl" static_token="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
" url_page_cart="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['urls']->value['pages']['cart'],'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" wt_base_ssl="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_ssl']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/wtproductcategory/controller_ajax_cat.php">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group_cat_result']->value, 'group_cat', false, NULL, 'group_cat_result', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group_cat']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['group_cat']->value['type_display'] == 'accordion') {?>
			<?php $_smarty_tpl->_subTemplateRender("file:./wtproductcategory_accordion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('group_cat_info'=>$_smarty_tpl->tpl_vars['group_cat']->value['cat_info'],'name_module'=>$_smarty_tpl->tpl_vars['name_module']->value), 0, true);
?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['group_cat']->value['type_display'] == 'column') {?>
			<?php $_smarty_tpl->_subTemplateRender("file:./wtproductcategory_column.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('group_cat_info'=>$_smarty_tpl->tpl_vars['group_cat']->value['cat_info']), 0, true);
?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['group_cat']->value['type_display'] == 'tab') {?>
			<?php $_smarty_tpl->_subTemplateRender("file:./wtproductcategory_tab.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('group_cat_info'=>$_smarty_tpl->tpl_vars['group_cat']->value['cat_info']), 0, true);
?>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['group_cat']->value['use_slider']) && $_smarty_tpl->tpl_vars['group_cat']->value['use_slider'] == 1) {?>
		<?php echo '<script'; ?>
 type="text/javascript">
		
			
		<?php echo '</script'; ?>
>
		<?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>	
</div>
<!-- /Module Product From Category --><?php }
}
