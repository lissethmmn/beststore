<?php
/* Smarty version 3.1.32, created on 2018-11-20 17:08:56
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcomments\views\templates\hook\productcomments-extra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf469d8679cd6_99217609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f1f5553ac47a46242c350ffd5b79a415310b940' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcomments\\views\\templates\\hook\\productcomments-extra.tpl',
      1 => 1541585510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf469d8679cd6_99217609 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php if (($_smarty_tpl->tpl_vars['nbComments']->value == 0 && $_smarty_tpl->tpl_vars['too_early']->value == false && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value)) || ($_smarty_tpl->tpl_vars['nbComments']->value != 0)) {?>
<div id="product_comments_block_extra">
	<?php if ($_smarty_tpl->tpl_vars['nbComments']->value != 0) {?>
	<div class="comments_note">
		<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Average grade','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
&nbsp</span>
		<div class="star_content clearfix">
		<?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= 5; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
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
	</div>
	<?php }?>

	<div class="comments_advices <?php if ($_smarty_tpl->tpl_vars['nbComments']->value != 0) {?> have_star<?php }?>">
		<?php if ($_smarty_tpl->tpl_vars['nbComments']->value != 0) {?>
		<a id="read_user_reviews" href="#productcomments"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read user reviews','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
 (<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['nbComments']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
)</a>
		<?php }?>
		<?php if (($_smarty_tpl->tpl_vars['too_early']->value == false && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
		<a class="open-comment-form" href="#new_comment_form"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</a>
		<?php }?>
	</div>
</div>
<?php }?>
<!--  /Module ProductComments -->
<?php }
}
