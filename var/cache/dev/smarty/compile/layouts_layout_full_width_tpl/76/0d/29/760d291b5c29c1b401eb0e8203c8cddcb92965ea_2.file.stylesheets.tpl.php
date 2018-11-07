<?php
/* Smarty version 3.1.32, created on 2018-10-08 18:41:12
  from '/home/beststor/public_html/version17/themes/wt_buyonline/templates/_partials/stylesheets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bbbcef82964f0_08084472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '760d291b5c29c1b401eb0e8203c8cddcb92965ea' => 
    array (
      0 => '/home/beststor/public_html/version17/themes/wt_buyonline/templates/_partials/stylesheets.tpl',
      1 => 1538503567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbbcef82964f0_08084472 (Smarty_Internal_Template $_smarty_tpl) {
?> 
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fjalla One:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stylesheets']->value['external'], 'stylesheet');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->value) {
?>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" type="text/css" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['media'], ENT_QUOTES, 'UTF-8');?>
">
  <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,500,600i,700|Muli:300,400,600,700" rel="stylesheet">
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stylesheets']->value['inline'], 'stylesheet');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->value) {
?>
  <style>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['content'], ENT_QUOTES, 'UTF-8');?>

  </style>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
