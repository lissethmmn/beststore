<?php
/* Smarty version 3.1.32, created on 2018-11-12 16:12:40
  from 'C:\xampp\htdocs\17beststore\modules\wtmegamenu\views\templates\admin\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be9d0a856bc05_41732477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1f69c104d3b5b9ab884744b67a3a1a8b87c5a6e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtmegamenu\\views\\templates\\admin\\list.tpl',
      1 => 1541585434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be9d0a856bc05_41732477 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel">
	<h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Menu List','mod'=>'wtmegamenu'),$_smarty_tpl ) );?>

	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtmegamenu&addMenu=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<div id="menuContent">
		<div id="menus">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info_menus']->value, 'info_menu');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['info_menu']->value) {
?>
				<div id="menu_<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_wtmegamenu']);?>
" class="panel">
					<div class="row">
						<div class="col-md-2">
							<h4 class="pull-left">#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_menu']->value['id_wtmegamenu'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-2">
							<h4 class="pull-left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_menu']->value['title'],'html','UTF-8' ));?>
</h4>
						</div>
						<div class="col-md-8">	
							<div class="btn-group-action pull-right">
								<?php if ($_smarty_tpl->tpl_vars['info_menu']->value['dropdown'] == 0 || $_smarty_tpl->tpl_vars['info_menu']->value['type_link'] == 1) {?>
									<a class="btn btn-default"
										href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtmegamenu&id_wtmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_wtmegamenu']);?>
&buildMenu=1">
										<i class="icon-layer"></i>
										<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Build SubMenu','mod'=>'wtmegamenu'),$_smarty_tpl ) );?>

									</a>
								<?php }?>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtmegamenu&id_wtmegamenu=<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_wtmegamenu']);?>
">
									<i class="icon-edit"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'wtmegamenu'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtmegamenu&delete_id_menu=<?php echo intval($_smarty_tpl->tpl_vars['info_menu']->value['id_wtmegamenu']);?>
">
									<i class="icon-trash"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'wtmegamenu'),$_smarty_tpl ) );?>

								</a>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['info_menu']->value['status'],'quotes','UTF-8' ));?>

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
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function() {
			var $myMenus = $("#menus");
			$myMenus.sortable({
				opacity: 0.6,
				cursor: "move",
				update: function() {
					var order = $(this).sortable("serialize") + "&action=updateMenusPosition";
					$.post("<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url_base']->value,'html','UTF-8' ));?>
modules/wtmegamenu/ajax_wtmegamenu.php?secure_key=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['secure_key']->value,'html','UTF-8' ));?>
", order);
					}
				});
			$myMenus.hover(function() {
				$(this).css("cursor","move");
				},
				function() {
				$(this).css("cursor","auto");
			});
		});
	<?php echo '</script'; ?>
>
</div><?php }
}
