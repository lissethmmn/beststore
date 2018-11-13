<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:04:56
  from 'C:\xampp\htdocs\17beststore\modules\wtslideshow\views\templates\admin\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb2058793f78_49552636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcdfc1c1496b832b190b5c4e4f590241fb293225' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtslideshow\\views\\templates\\admin\\list.tpl',
      1 => 1541585608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb2058793f78_49552636 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel"><h3><i class="icon-list-ul"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Slideshow list','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtslideshow&addSlide=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<div id="slidesContent">
		<div id="slides">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slides']->value, 'slide');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
?>
				<div id="slides_<?php echo intval($_smarty_tpl->tpl_vars['slide']->value['id_wtslideshow']);?>
" class="panel">
					<div class="row">
						<div class="col-md-1">
							<span><i class="icon-arrows "></i></span>
						</div>
						<div class="col-md-2">
							<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image_baseurl']->value,'html','UTF-8' ));?>
thumbnail_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['image'],'html','UTF-8' ));?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['title'],'html','UTF-8' ));?>
" class="img-thumbnail" style="max-height:50px"/>
						</div>
						<div class="col-md-9">
							<h4 class="pull-left">#<?php echo intval($_smarty_tpl->tpl_vars['slide']->value['id_wtslideshow']);?>
 - <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['title'],'html','UTF-8' ));?>
</h4>
							<div class="btn-group-action pull-right">
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtslideshow&id_slide=<?php echo intval($_smarty_tpl->tpl_vars['slide']->value['id_wtslideshow']);?>
">
									<i class="icon-edit"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtslideshow&delete_id_slide=<?php echo intval($_smarty_tpl->tpl_vars['slide']->value['id_wtslideshow']);?>
">
									<i class="icon-trash"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

								</a>
								<a class="btn btn-default"
									href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&configure=wtslideshow&id_slide=<?php echo intval($_smarty_tpl->tpl_vars['slide']->value['id_wtslideshow']);?>
&addlayer=1">
									<i class="icon-layer"></i>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Layers','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

								</a>
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['status'],'quotes','UTF-8' ));?>

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
