<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:05:27
  from 'C:\xampp\htdocs\17beststore\modules\wtslideshow\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb207703a320_71138386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b59321118a45e7a79e56cf5cced46d66bfaa8f5e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtslideshow\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1541585613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb207703a320_71138386 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_185115beb2076ee7647_40705686', "field");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "field"} */
class Block_185115beb2076ee7647_40705686 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_185115beb2076ee7647_40705686',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'file_lang') {?>
		<div class="col-lg-9">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['defaultFormLanguage']->value) {?>style="display:none"<?php }?>>
				<?php }?>
					<div class="col-lg-6">
						<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[0]['form']['images'][$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?>
							<?php $_smarty_tpl->_assignInScope('images_l', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields']->value[0]['form']['images'][$_smarty_tpl->tpl_vars['language']->value['id_lang']],'html','UTF-8' )));?>
						<?php } else { ?>
							<?php $_smarty_tpl->_assignInScope('images_l', '');?>
						<?php }?>
						<input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" type="text" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['images_l']->value,'html','UTF-8' ));?>
" readonly />
						
						<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[0]['form']['images'][$_smarty_tpl->tpl_vars['language']->value['id_lang']]) && $_smarty_tpl->tpl_vars['fields']->value[0]['form']['images'][$_smarty_tpl->tpl_vars['language']->value['id_lang']] != '') {?>
							<div class="img-thumnail">
							<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));?>
sliderimages/thumbnail_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields']->value[0]['form']['images'][$_smarty_tpl->tpl_vars['language']->value['id_lang']],'html','UTF-8' ));?>
" class="img-thumbnail" width="100"/>
							</div>
						<?php }?>
						<a id="cs_add_image" href="javascript:void(0)" rel="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_controler_add_image']->value,'html','UTF-8' ));?>
&id_lang=<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change Thumbnail','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</a>
					</div>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="col-lg-6">
						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
							<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
?>
							<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</ul>
					</div>
				<?php }?>
				
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					</div>
				<?php }?>
				<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function(){
					var image_baseurl = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));?>
";
					$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-selectbutton").click(function(e){
						$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
").trigger('click');
					});
					$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
").change(function(e){
						var val = $(this).val();
						var file = val.split(/[\\/]/);
						$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-name").val(file[file.length-1]);
					});
				});
			<?php echo '</script'; ?>
>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'thumb_lang') {?>
		<div class="col-lg-9">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang'] != $_smarty_tpl->tpl_vars['id_language']->value) {?>style="display:none"<?php }?>>
				<?php }?>
				<div class="col-lg-4">
				<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[0]['form']['thumbnail'][$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?>
					<?php $_smarty_tpl->_assignInScope('thumbnail_l', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields']->value[0]['form']['thumbnail'][$_smarty_tpl->tpl_vars['language']->value['id_lang']],'html','UTF-8' )));?>
				<?php } else { ?>
					<?php $_smarty_tpl->_assignInScope('thumbnail_l', '');?>
				<?php }?>
				<input type="text" class="thumbnail" id="thumbnail_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" name="thumbnail_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumbnail_l']->value,'html','UTF-8' ));?>
" readonly="readonly"/>
				
				<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[0]['form']['thumbnail'][$_smarty_tpl->tpl_vars['language']->value['id_lang']]) && $_smarty_tpl->tpl_vars['fields']->value[0]['form']['thumbnail'][$_smarty_tpl->tpl_vars['language']->value['id_lang']] != '') {?>	
					<div class="img-thumnail">
						<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));?>
thumbnails/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumbnail_l']->value,'html','UTF-8' ));?>
" class="img-thumbnail" width="100"/>
					</div>
				<?php }?>
				
				<a id="cs_add_thumb_image" href="javascript:void(0)" rel="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_controler_add_thumb_image']->value,'html','UTF-8' ));?>
&id_lang=<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change Thumbnail','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</a>
				</div>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					<div class="col-lg-2">
						<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
							<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['language']->value['iso_code'],'html','UTF-8' ));?>

							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
?>
							<li><a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
);" tabindex="-1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['lang']->value['name'],'html','UTF-8' ));?>
</a></li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</ul>
					</div>
				<?php }?>
				<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
					</div>
				<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	<?php }?>
	<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

	<?php echo '<script'; ?>
 type="text/javascript">
		//<![CDATA[
		var module_dir_url="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir_url']->value,'html','UTF-8' ));?>
";
		//]]
	<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "field"} */
}
