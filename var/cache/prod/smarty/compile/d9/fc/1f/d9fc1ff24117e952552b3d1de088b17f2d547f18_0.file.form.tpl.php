<?php
/* Smarty version 3.1.32, created on 2018-11-15 17:04:11
  from 'C:\xampp\htdocs\17beststore\modules\wtproductfilter\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bedd13bf24c31_85593420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9fc1ff24117e952552b3d1de088b17f2d547f18' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductfilter\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1541585527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bedd13bf24c31_85593420 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_283455bedd13beed849_66700919', "field");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "field"} */
class Block_283455bedd13beed849_66700919 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_283455bedd13beed849_66700919',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'select_link') {?>
		<div class="margin-form" id="product_type_menu" <?php if ($_smarty_tpl->tpl_vars['input']->value['show'] != "choose_the_category") {?> style = "display:none;" <?php }?>>
			<select class="form-control fixed-width-xxl ps_link" name="id_cat" id="id_cat">
				<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_options']->value,'quotes','UTF-8' ));?>

			</select>
			<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function() {
					$("#id_cat").val('<?php if (isset($_smarty_tpl->tpl_vars['cat_value']->value) && $_smarty_tpl->tpl_vars['cat_value']->value != '') {
echo intval($_smarty_tpl->tpl_vars['cat_value']->value);
}?>');
					
					$("#product_type").bind("change", function() {
					if($(this).attr("value") == "choose_the_category")
						$("#product_type_menu").show("fast"); 
					else
						$("#product_type_menu").hide("slow"); 
					});
			});
			<?php echo '</script'; ?>
>
		</div>
	<?php } else { ?>
		<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

	<?php }?>	
<?php
}
}
/* {/block "field"} */
}
