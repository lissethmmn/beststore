<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:03:41
  from 'C:\xampp\htdocs\17beststore\modules\wtslideshow\views\templates\admin\imageform.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb200d4ee806_87604329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd14dc9dbe18475021939f00493ee8287ef62c7e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtslideshow\\views\\templates\\admin\\imageform.tpl',
      1 => 1541585609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb200d4ee806_87604329 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['css_files']->value, 'media', false, 'css_uri');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->value => $_smarty_tpl->tpl_vars['media']->value) {
?>
	<link href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['css_uri']->value,'html','UTF-8' ));?>
" rel="stylesheet" type="text/css" media="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['media']->value ));?>
" />
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_files']->value, 'js_uri');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->value) {
?>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['js_uri']->value,'html','UTF-8' ));?>
"><?php echo '</script'; ?>
>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<form id="formUploadImage" class="defaultForm form-horizontal" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action_url']->value,'html','UTF-8' ));?>
" method="post" enctype="multipart/form-data">
<div class="panel" id="fieldset_0">
	<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Select Image Slide','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</h3>
	<div class="form-wrapper">
		<div class="upload_image_layer">
			<input id="upload_image" type="file" name="upload_image"/>
			<button type="submit" value="1" id="module_form_submit_btn" name="submitUploadImage" class="btn btn-default pull-center">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Upload','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

			</button>
		</div>
	</div>
</div>
</form>
<hr/>
<div id="list_image">
<ul>
	<?php $_smarty_tpl->_assignInScope('i', 0);?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_images']->value, 'images');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['images']->value) {
?>
		<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
	<li id="image-<?php echo intval($_smarty_tpl->tpl_vars['i']->value);?>
"><a class="image-layer" href="javascript:void(0)">
		<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_path']->value,'html','UTF-8' ));
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['images']->value,'html','UTF-8' ));?>
"/>
		<input type="hidden" name="image-layer" class="image-layer-value" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['images']->value,'html','UTF-8' ));?>
"/>
		<input type="hidden" name="image-order" class="image-order" value="<?php echo intval($_smarty_tpl->tpl_vars['i']->value);?>
"/>
	</a></li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
</div>
<div id="image_action">
<div class="image_preview">
</div>
<button id="imageInsert" class="btn btn-default" value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Insert','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</button>
<button id="imageDelete" class="btn btn-default" value=""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</button>
<input type="hidden" name="layerlang" id="layerlang" value="<?php echo intval($_smarty_tpl->tpl_vars['id_lang']->value);?>
"/>
<input type="hidden" name="image-order-del" id="image-order-del" class="image-order-del" value="0"/>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
//<![CDATA[
var image_path = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_path']->value,'html','UTF-8' ));?>
";
var cs_ajax_link = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cs_ajax_link']->value,'html','UTF-8' ));?>
";
//]]
<?php echo '</script'; ?>
><?php }
}
