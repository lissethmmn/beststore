<?php
/* Smarty version 3.1.32, created on 2018-11-16 18:26:41
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcomments\views\templates\hook\productcomments_reviews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bef3611603ee9_49418388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '672410a38740d0b8f3222d689ece2fd77e6be8bc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcomments\\views\\templates\\hook\\productcomments_reviews.tpl',
      1 => 1541585509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bef3611603ee9_49418388 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['nbComments']->value > 0) {?>

<div class="comments_note">	
	<div class="star_content clearfix">
	<?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_21_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_21_iteration <= 5; $__section_i_21_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
		<?php if ($_smarty_tpl->tpl_vars['averageTotal']->value <= (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
			<div class="star"></div>
		<?php } else { ?>
			<div class="star star_on"></div>
		<?php }?>
	<?php
}
}
?>
	</div>
	<!--<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>sprintf('%s Review(s)',$_smarty_tpl->tpl_vars['nbComments']->value),'mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
&nbsp</span>-->
</div>
<?php }
}
}
