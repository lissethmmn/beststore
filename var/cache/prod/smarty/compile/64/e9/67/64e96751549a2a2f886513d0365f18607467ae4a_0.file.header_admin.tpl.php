<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:05:26
  from 'C:\xampp\htdocs\17beststore\modules\wtslideshow\views\templates\admin\header_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb2076e40332_38754859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64e96751549a2a2f886513d0365f18607467ae4a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtslideshow\\views\\templates\\admin\\header_admin.tpl',
      1 => 1541585609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb2076e40332_38754859 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    	$(function() {
				var $mySlides = $("#slides");
				$mySlides.sortable({
					opacity: 0.6,
					cursor: "move",
					update: function() {
						var order = $(this).sortable("serialize") + "&action=updateSlidesPosition";
						$.post("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_uri']->value,'quotes','UTF-8' ));?>
modules/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name_module']->value,'quotes','UTF-8' ));?>
/ajax_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name_module']->value,'quotes','UTF-8' ));?>
.php?secure_key=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['secure_key']->value,'quotes','UTF-8' ));?>
", order);
						}
					});
				$mySlides.hover(function() {
					$(this).css("cursor","move");
					},
					function() {
					$(this).css("cursor","auto");
				});
			});
<?php echo '</script'; ?>
>
<?php }
}
