<?php
/* Smarty version 3.1.32, created on 2018-11-15 17:04:26
  from 'C:\xampp\htdocs\17beststore\modules\wtproductfilter\views\templates\hook\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bedd14ab9b899_12059446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25adbf713905a175bcb70bebac7b504ebb91c987' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductfilter\\views\\templates\\hook\\list.tpl',
      1 => 1541585529,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bedd14ab9b899_12059446 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel">
	<div class="panel-heading">
		  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tab List','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>

		<a style="text-decoration:none;" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductfilter&addTab=1">
		<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new tab" data-html="true">
				<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path']->value,'html','UTF-8' ));?>
/views/img/add.png" alt="" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>

			</span>
		</a>
	</div>
	<div class="panel">
		<div class="panel">
			<div class="col-lg-1">
			<h3 class="pull-center" style="margin-left:20px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>
</h3>
			</div>
			<div class="col-md-3">
					<h3 class="pull-center" style="margin-left:30px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Title tab','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>
</h3>
			</div>
			<div class="col-md-5"  style="">
					<h3 class="pull-center" style="margin-left:10px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get product from','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>
</h3>
			</div>
			<div class="col-md-3"  style="">
					<h3 class="pull-center" style="margin-left:20px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Action','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>
</h3>
			</div>
		</div>
	<div id="slidesContent">
		<div id="tabs">
		<?php $_smarty_tpl->_assignInScope('dem', 0);?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'tab');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
?>
			<?php $_smarty_tpl->_assignInScope('dem', $_smarty_tpl->tpl_vars['dem']->value+1);?>
				<div id="tabs_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['id_tab'],'html','UTF-8' ));?>
" class="panel" style="border-radius:3px;margin-bottom:8px;box-shadow:none;padding:3px 40px;">
					<div class="row">
						<div class="col-lg-1">
						<span style="position:absolute;top:15px;"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dem']->value,'html','UTF-8' ));?>
</span>
							<span style="position:absolute;top:15px;left:30px;"><i class="icon-arrows "></i></span>
						</div>
						<div class="col-md-3"  style="margin-top: 10px;">
							<h4 class="pull-left">#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['id_tab'],'html','UTF-8' ));?>
 - <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['title'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-5"  style="margin-top: 10px;">
							<h4 class="pull-left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['product_type'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-3"  style="margin-top: 10px;">
							<div class="btn-group-action pull-right">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['status'],'quotes','UTF-8' ));?>
								
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductfilter&id_tab=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['id_tab'],'html','UTF-8' ));?>
">
									<i class="icon-edit"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductfilter&delete_id_tab=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['id_tab'],'html','UTF-8' ));?>
">
									<i class="icon-trash"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'wtproductfilter'),$_smarty_tpl ) );?>

								</a>
							</div>
						</div>
					</div>
				</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
	</div>
</div>
<?php }
}
