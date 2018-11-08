<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:52:13
  from 'C:\xampp\htdocs\17beststore\adminbs\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be485ddbea709_07645451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb577d05ecc59cc3672a19152da8eae31e5967ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\adminbs\\themes\\default\\template\\content.tpl',
      1 => 1541516369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be485ddbea709_07645451 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
