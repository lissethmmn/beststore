<?php
/* Smarty version 3.1.32, created on 2018-11-12 17:04:19
  from 'C:\xampp\htdocs\17beststore\adminbs\themes\default\template\controllers\currencies\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be9dcc3b995d4_00309047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b182b68bd7397a1ad5ac675cb6040f276abd790b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\adminbs\\themes\\default\\template\\controllers\\currencies\\content.tpl',
      1 => 1541516418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:controllers/currencies/status.tpl' => 1,
    'file:controllers/currencies/conversion_rate.tpl' => 1,
  ),
),false)) {
function content_5be9dcc3b995d4_00309047 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-10 col-xs-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
	<div class="col-lg-2 col-xs-12">
		<?php if (isset($_smarty_tpl->tpl_vars['isForm']->value)) {?>
			<?php $_smarty_tpl->_subTemplateRender('file:controllers/currencies/status.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php } else { ?>
			<?php $_smarty_tpl->_subTemplateRender('file:controllers/currencies/conversion_rate.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php }?>
	</div>
</div>
<?php }
}
