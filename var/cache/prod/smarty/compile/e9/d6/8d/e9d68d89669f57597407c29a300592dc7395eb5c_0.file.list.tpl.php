<?php
/* Smarty version 3.1.32, created on 2018-11-08 17:22:41
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcategory\views\templates\admin\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be49b11477ca4_10681175',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9d68d89669f57597407c29a300592dc7395eb5c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcategory\\views\\templates\\admin\\list.tpl',
      1 => 1541585472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be49b11477ca4_10681175 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel"><h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Category Group','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>

	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&addCat=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<div id="slidesContent">
		<div id="slides">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info_category']->value, 'info_cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['info_cat']->value) {
?>
				<div id="slides_<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtgroupcategory']);?>
" class="panel">
					<div class="row">
						<div class="col-md-2">
								<h4 class="pull-left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_cat']->value['group_cat'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-2">
							<h4 class="pull-left"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hook','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>
: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_cat']->value['id_hook'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-8">	
							<div class="btn-group-action pull-right">
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtgroupcategory']);?>
">
									<i class="icon-edit"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtgroupcategory']);?>
&buildCat=1">
									<i class="icon-layer"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View Category','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&delete_id_group_cat=<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtgroupcategory']);?>
">
									<i class="icon-trash"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>

								</a>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_cat']->value['status'],'quotes','UTF-8' ));?>

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
</div><?php }
}
