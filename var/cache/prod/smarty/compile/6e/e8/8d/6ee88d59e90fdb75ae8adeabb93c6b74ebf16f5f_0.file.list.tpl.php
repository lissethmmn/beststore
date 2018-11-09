<?php
/* Smarty version 3.1.32, created on 2018-11-09 18:04:08
  from 'C:\xampp\htdocs\17beststore\modules\wtcustomhtml\views\templates\admin\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be5f6482a5740_45987189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ee88d59e90fdb75ae8adeabb93c6b74ebf16f5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtcustomhtml\\views\\templates\\admin\\list.tpl',
      1 => 1541585396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be5f6482a5740_45987189 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="panel"><h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Block List','mod'=>'wtcustomhtml'),$_smarty_tpl ) );?>

	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtcustomhtml&addblock=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<?php if (count($_smarty_tpl->tpl_vars['blocks']->value) > 0) {?>
	<div id="slidesContent">
		<div id="slides">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blocks']->value, 'block');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['block']->value) {
?>
				<div id="slides_<?php echo intval($_smarty_tpl->tpl_vars['block']->value['id_wtcustomhtml']);?>
" class="panel">
					<div class="row">
						<div class="col-md-2">
								<h4 class="pull-left">ID : #<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['block']->value['id_wtcustomhtml'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-2">
								<h4 class="pull-left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['block']->value['title'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-2">
							<h4 class="pull-left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hook','mod'=>'wtcustomhtml'),$_smarty_tpl ) );?>
: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['block']->value['hook'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-6">	
							<div class="btn-group-action pull-right">
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtcustomhtml&id_wtcustomhtml=<?php echo intval($_smarty_tpl->tpl_vars['block']->value['id_wtcustomhtml']);?>
">
									<i class="icon-edit"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'wtcustomhtml'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtcustomhtml&delete_id_block=<?php echo intval($_smarty_tpl->tpl_vars['block']->value['id_wtcustomhtml']);?>
">
									<i class="icon-trash"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'wtcustomhtml'),$_smarty_tpl ) );?>

								</a>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['block']->value['status'],'quotes','UTF-8' ));?>

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
	<?php }?>
</div><?php }
}
