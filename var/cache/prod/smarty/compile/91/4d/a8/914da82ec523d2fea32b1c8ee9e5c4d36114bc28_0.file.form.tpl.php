<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:50:50
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcategory\views\templates\admin\_configure\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb2b1ac467d9_21897775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '914da82ec523d2fea32b1c8ee9e5c4d36114bc28' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcategory\\views\\templates\\admin\\_configure\\helpers\\form\\form.tpl',
      1 => 1541585475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb2b1ac467d9_21897775 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_206235beb2b1abdf006_79772256', "field");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "field"} */
class Block_206235beb2b1abdf006_79772256 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_206235beb2b1abdf006_79772256',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'file_lang') {?>
		<div class="row">
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
						<div class="dummyfile input-group">
							<input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" type="file" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" class="hide-file-upload" />
							<span class="input-group-addon"><i class="icon-file"></i></span>
							<input id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-name" type="text" class="disabled" name="filename" readonly />
							<span class="input-group-btn">
								<button id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
									<i class="icon-folder-open"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose a file','mod'=>'wtproductcategory'),$_smarty_tpl ) );?>

								</button>
							</span>
						</div>
						<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[0]['form']['cat_banner'][$_smarty_tpl->tpl_vars['language']->value['id_lang']]) && $_smarty_tpl->tpl_vars['fields']->value[0]['form']['cat_banner'][$_smarty_tpl->tpl_vars['language']->value['id_lang']] != '') {?>
						<div class="col-lg-4" style="margin-top:5px"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));?>
banners/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields']->value[0]['form']['cat_banner'][$_smarty_tpl->tpl_vars['language']->value['id_lang']],'html','UTF-8' ));?>
" class="img-thumbnail" style="max-height:200px" /></div>
						<div class="col-lg-8" style="margin-top:100px">
						<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['id_wtgroupcategory']->value);?>
&id_wtcategory=<?php echo intval($_smarty_tpl->tpl_vars['id_wtcategory']->value);?>
&deletebanner=1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'delete','mod'=>'wtproductcategory'),$_smarty_tpl ) );?>
</a>
						</div>
						<?php }?>
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
				<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function(){
					$('#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-selectbutton').click(function(e){
						$('#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
').trigger('click');
					});
					$('#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
').change(function(e){
						var val = $(this).val();
						var file = val.split(/[\\/]/);
						$('#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
-name').val(file[file.length-1]);
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
	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'select_link') {?>
		<select class="form-control fixed-width-xxl ps_link" name="id_cat" id="id_cat">
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['cat_options']->value,'quotes','UTF-8' ));?>

		</select>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function() {
				$("#id_cat").val('<?php if (isset($_smarty_tpl->tpl_vars['cat_value']->value) && $_smarty_tpl->tpl_vars['cat_value']->value != '') {
echo intval($_smarty_tpl->tpl_vars['cat_value']->value);
}?>');
			});
		<?php echo '</script'; ?>
>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'file') {?>
		<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

		<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[0]['form']['cat_icon']) && $_smarty_tpl->tpl_vars['fields']->value[0]['form']['cat_icon'] != '') {?>
		<div class="col-lg-3"></div>
		<div class="col-lg-9" style="margin-top:5px">
			<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));?>
icons/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields']->value[0]['form']['cat_icon'],'html','UTF-8' ));?>
" class="img-thumbnail" style="max-height:200px" />
			<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['id_wtgroupcategory']->value);?>
&id_wtcategory=<?php echo intval($_smarty_tpl->tpl_vars['id_wtcategory']->value);?>
&deleteicon=1"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'delete','mod'=>'wtproductcategory'),$_smarty_tpl ) );?>
</a>
		</div>
		<?php }?>
	<?php } else { ?>
		<?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

	<?php }
}
}
/* {/block "field"} */
}
