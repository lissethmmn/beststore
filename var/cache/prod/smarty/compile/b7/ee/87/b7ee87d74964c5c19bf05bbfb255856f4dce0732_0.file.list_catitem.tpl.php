<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:50:59
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcategory\views\templates\admin\list_catitem.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb2b23541057_24826579',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7ee87d74964c5c19bf05bbfb255856f4dce0732' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcategory\\views\\templates\\admin\\list_catitem.tpl',
      1 => 1541585471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb2b23541057_24826579 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel">
	<h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Category List','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>

	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['id_wtgroupcategory']->value);?>
&addcatitem=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<?php if (count($_smarty_tpl->tpl_vars['info_cat_item']->value) > 0) {?>
	<div id="slidesContent">
		<div id="slides">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info_cat_item']->value, 'info_cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['info_cat']->value) {
?>
				<div id="slides_<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtcategory']);?>
" class="panel">
					<div class="row">
						<div class="col-md-2">
								<h4 class="pull-left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_cat']->value['cat_name'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-2">
							<h4 class="pull-left" style="padding-right:10px"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Style:','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>
</h4>
							<span style="background-color:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_cat']->value['cat_color'],'html','UTF-8' ));?>
; padding:10px"></span>
						</div>
						<div class="col-md-8">	
							<div class="btn-group-action pull-right">
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtgroupcategory']);?>
&id_wtcategory=<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtcategory']);?>
">
									<i class="icon-edit"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Modules.WTProductCategory.Admin'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory&id_wtgroupcategory=<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtgroupcategory']);?>
&delete_cat_item=<?php echo intval($_smarty_tpl->tpl_vars['info_cat']->value['id_wtcategory']);?>
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
	<?php }?>
	<div class="panel-footer">
		<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtproductcategory" class="btn btn-default">
		<i class="process-icon-back"></i> Back to list</a>
	</div>
</div>
<?php }
}
