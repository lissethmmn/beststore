<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:30:33
  from 'module:blockreassuranceviewstemp' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be480c9b4cab9_41705558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ffc009d1b66ea89054a8e253403b7d3a67d8150' => 
    array (
      0 => 'module:blockreassuranceviewstemp',
      1 => 1541584040,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be480c9b4cab9_41705558 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '303795be480c9b36897_31452756';
if ($_smarty_tpl->tpl_vars['elements']->value) {?>
  <div id="block-reassurance">
    <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elements']->value, 'element');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['element']->value) {
?>
        <li><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['element']->value['text'],'quotes' )), ENT_QUOTES, 'UTF-8');?>
" /> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span></li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
  </div>
<?php }
}
}
