<?php
/* Smarty version 3.1.32, created on 2018-11-13 18:21:56
  from 'C:\xampp\htdocs\17beststore\modules\wtthemeconfigurator\views\templates\admin\setting_theme.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb40745facd9_40973329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b75e9bf6be9ee553d2aa1828d170b3a97c018bf4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtthemeconfigurator\\views\\templates\\admin\\setting_theme.tpl',
      1 => 1541585684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb40745facd9_40973329 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form class="form-horizontal" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['postAction']->value,'html','UTF-8' ));?>
" method="POST" enctype="multipart/form-data">
<div class="panel">
	<h3>
		<i class="icon-cogs"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Settings style','mod'=>'wtthemeconfigurator'),$_smarty_tpl ) );?>

	</h3>
	<div class="form-group">
		<label for="box_mode" class="control-label col-lg-3 ">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Box mode','mod'=>'wtthemeconfigurator'),$_smarty_tpl ) );?>

		</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="input-group col-lg-2">
					<span class="switch prestashop-switch">
						<input type="radio" name="box_mode" id="box_mode_on" value="1" <?php if (isset($_smarty_tpl->tpl_vars['options']->value['box_mode']) && $_smarty_tpl->tpl_vars['options']->value['box_mode'] == 1) {?> checked="checked" <?php }?>>
						<label for="box_mode_on">Yes</label>
						<input type="radio" name="box_mode" id="box_mode_off" value="0" <?php if (isset($_smarty_tpl->tpl_vars['options']->value['box_mode']) && $_smarty_tpl->tpl_vars['options']->value['box_mode'] == 0) {?> checked="checked" <?php }?>>
						<label for="box_mode_off">No</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
			</div>
		</div>
	</div>	
	<div class="form-group">
		<label for="cpanel" class="control-label col-lg-3 ">
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Show Demo Frontend','mod'=>'wtthemeconfigurator'),$_smarty_tpl ) );?>

		</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="input-group col-lg-2">
					<span class="switch prestashop-switch">
						<input type="radio" name="cpanel" id="cpanel_on" value="1" <?php if (isset($_smarty_tpl->tpl_vars['options']->value['cpanel']) && $_smarty_tpl->tpl_vars['options']->value['cpanel'] == 1) {?> checked="checked" <?php }?>>
						<label for="cpanel_on">Yes</label>
						<input type="radio" name="cpanel" id="cpanel_off" value="0" <?php if (isset($_smarty_tpl->tpl_vars['options']->value['cpanel']) && $_smarty_tpl->tpl_vars['options']->value['cpanel'] == 0) {?> checked="checked" <?php }?>>
						<label for="cpanel_off">No</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
			</div>
		</div>
	</div>
		
	<?php if ($_smarty_tpl->tpl_vars['bg_colors']->value != '') {?><h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Color','mod'=>'wtthemeconfigurator'),$_smarty_tpl ) );?>
</h3><?php }?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bg_colors']->value, 'list', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['list']->value) {
?>
	<?php $_smarty_tpl->_assignInScope('bg_color', ('color_').($_smarty_tpl->tpl_vars['name']->value));?>		
	<div class="form-group">
	<label class="control-label col-lg-3"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list']->value['text'],'html','UTF-8' ));?>
</label>
	<div class="col-lg-9">
		<div class="col-lg-5">
			<div class="input-group <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bg_color']->value,'html','UTF-8' ));?>
">
				<input id="result_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_color" type="text" name="color_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['bg_color']->value]) && $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['bg_color']->value] != '') {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['bg_color']->value],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list']->value['default_val'],'html','UTF-8' ));
}?>" style="<?php if (isset($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['bg_color']->value]) && $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['bg_color']->value] != '') {?>background-color:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['bg_color']->value],'html','UTF-8' ));
} else { ?>background-color:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list']->value['default_val'],'html','UTF-8' ));
}?>"/>
				<span id="colobg_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_color" class="input-group-btn" >
					<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( @constant('_PS_ADMIN_IMG_'),'html','UTF-8' ));?>
color.png" style="cursor:pointer; margin-left:5px" />
				</span>
			</div>
			<?php if (isset($_smarty_tpl->tpl_vars['list']->value['note'])) {?><p class="help-block" style="font-size:11px"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list']->value['note'],'html','UTF-8' ));?>
</p><?php }?>
			<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function(){
					colorEvent("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
_color");
				});				
			<?php echo '</script'; ?>
>
		</div>
	</div>
	</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php if ($_smarty_tpl->tpl_vars['fonts']->value != '') {?><h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Font','mod'=>'wtthemeconfigurator'),$_smarty_tpl ) );?>
</h3><?php }?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fonts']->value, 'list', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['list']->value) {
?>
		<?php $_smarty_tpl->_assignInScope('font_family', ('font_family_').($_smarty_tpl->tpl_vars['name']->value));?>		
		<div class="form-group">
		<label class="control-label col-lg-3"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list']->value['text'],'html','UTF-8' ));?>
</label>
		<div class="col-lg-9">
		<div class="col-lg-5">
			<select name="font_family_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" id="font_family_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" onchange="showResultChooseFont('font_family_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
','font_result_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
')">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['font_list']->value, 'font', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['font']->value) {
?>				
					<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['font']->value,'quotes','UTF-8' ));?>

				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
			<?php if (isset($_smarty_tpl->tpl_vars['list']->value['note'])) {?><p class="help-block" style="font-size:11px"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list']->value['note'],'html','UTF-8' ));?>
</p><?php }?>
			<?php echo '<script'; ?>
 type="text/javascript">	
				$(document).ready(function() {
					<?php if (isset($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value]) && $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value] != '') {?>
						var f_m = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value],"html","UTF-8" ));?>
';
						$("#font_family_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
").val(f_m);
					<?php } else { ?>
						$("#font_family_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
").val('');
					<?php }?>
				});
			<?php echo '</script'; ?>
>
		</div>
		<div class="col-lg-5"><span id="font_result_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
" <?php if (isset($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value]) && $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value] != '') {?>style="font-family:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value],'html','UTF-8' ));?>
"<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value]) && $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value] != '') {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value],'html','UTF-8' ));
}?></span></div>		
		</div>				
		</div>
		<?php if (isset($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value]) && $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value] != '') {?>
		<?php echo '<script'; ?>
 type="text/javascript">	
			$(document).ready(function() {
				$('head').append('<link id="link_' + '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value],"html","UTF-8" ));?>
' + '" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['font_family']->value],"html","UTF-8" ));?>
' + '">');	
			});
		<?php echo '</script'; ?>
>
		<?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>	
	<div class="panel-footer">
		<button type="submit" value="1" id="resetSetting" name="resetSetting" class="btn btn-default pull-left" onclick="this.form.submit();">
			<i class="process-icon-reset"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset','mod'=>'wtthemeconfigurator'),$_smarty_tpl ) );?>

		</button>
		<button type="submit" value="1" id="submit_color" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['submit_action']->value,'html','UTF-8' ));?>
" class="btn btn-default pull-right" onclick="this.form.submit();">
			<i class="process-icon-save"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtthemeconfigurator'),$_smarty_tpl ) );?>

		</button>
	</div>
</div>
</form>
<?php echo '<script'; ?>
 type="text/javascript">	
	function showBackground(classActive, name)
	{
		$(".fimage").hide();
		$("#image_" + classActive + "_" + name).show("slow");
	}
	function showResultChooseFont(id,id_result)
	{
		$('link#link_' + id).remove();
		if($("#" + id).val() != "")
			$('head').append('<link id="link_' + id + '" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + $("#" + id).val() + '">');
		$("#" + id_result).html("" + $("#" + id).val() + "");
		$("#" + id_result).css("font-family","" + $("#" + id).val() + "");
	}
	function noteCustomer(thisForm)
	{
		 if (confirm("Do you really want to change the layout?") == true) {
		     thisForm.form.submit();
			return true;
		} else {
			return false;
		}
	}
<?php echo '</script'; ?>
>
<?php }
}
