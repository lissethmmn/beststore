<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:31:57
  from 'C:\xampp\htdocs\17beststore\themes\wt_buyonline\templates\catalog\_partials\sort-orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be4811d283489_08891526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92b1a1c7d3d4ad0a3126716c0abe1057b0808c0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\wt_buyonline\\templates\\catalog\\_partials\\sort-orders.tpl',
      1 => 1541560217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be4811d283489_08891526 (Smarty_Internal_Template $_smarty_tpl) {
?><span class="col-sm-3 col-md-3 hidden-sm-down sort-by"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sort by:','d'=>'Shop.Theme'),$_smarty_tpl ) );?>
</span>
<div class="<?php if (!empty($_smarty_tpl->tpl_vars['listing']->value['rendered_facets'])) {?>col-sm-9 col-xs-8<?php } else { ?>col-sm-12 col-xs-12<?php }?> col-md-9 products-sort-order dropdown">
  <a class="select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php if (isset($_smarty_tpl->tpl_vars['listing']->value['sort_selected'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['listing']->value['sort_selected'], ENT_QUOTES, 'UTF-8');
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );
}?>
    <i class="material-icons pull-xs-right">&#xE5C5;</i>
  </a>
  <div class="dropdown-menu">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listing']->value['sort_orders'], 'sort_order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sort_order']->value) {
?>
      <a
        rel="nofollow"
        href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sort_order']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
        class="select-list <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'classnames' ][ 0 ], array( array('current'=>$_smarty_tpl->tpl_vars['sort_order']->value['current'],'js-search-link'=>true) )), ENT_QUOTES, 'UTF-8');?>
"
      >
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sort_order']->value['label'], ENT_QUOTES, 'UTF-8');?>

      </a>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>
<?php }
}
