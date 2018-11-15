<?php
/* Smarty version 3.1.32, created on 2018-11-15 17:14:30
  from 'module:wtajaxcartviewstemplatesf' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bedd3a60d4a63_63007077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f10eb5b723de904102c69edd813ff3ebfe521ccd' => 
    array (
      0 => 'module:wtajaxcartviewstemplatesf',
      1 => 1541585239,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bedd3a60d4a63_63007077 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="ajax-cart-container">

          <div class="card-block">

            <h1 class="h1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shopping Cart','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</h1>

          </div>

          <p class="no-items"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There are no more items in your cart','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</p>

</div><?php }
}
