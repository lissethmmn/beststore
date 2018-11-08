<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:50:48
  from 'module:psbestsellersviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be485884280a6_27198402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3681aa30d1f85f48e2cf4794b77200e697f706a9' => 
    array (
      0 => 'module:psbestsellersviewstemplat',
      1 => 1541584232,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/miniatures/product.tpl' => 1,
  ),
),false)) {
function content_5be485884280a6_27198402 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '164545be4858841b828_90119291';
?>
<section>
  <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Best Sellers','d'=>'Modules.Bestsellers.Shop'),$_smarty_tpl ) );?>
</h1>
  <div class="products">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
      <?php $_smarty_tpl->_subTemplateRender("file:catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['allBestSellers']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All best sellers','d'=>'Modules.Bestsellers.Shop'),$_smarty_tpl ) );?>
</a>
</section>
<?php }
}
