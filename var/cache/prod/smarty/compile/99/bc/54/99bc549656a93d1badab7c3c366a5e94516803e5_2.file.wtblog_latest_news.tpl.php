<?php
/* Smarty version 3.1.32, created on 2018-11-21 13:29:01
  from 'C:\xampp\htdocs\17beststore\modules\wtbloglatestnews\views\templates\hook\wtblog_latest_news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf587cdf28b34_44538218',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99bc549656a93d1badab7c3c366a5e94516803e5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtbloglatestnews\\views\\templates\\hook\\wtblog_latest_news.tpl',
      1 => 1542816187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf587cdf28b34_44538218 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\17beststore\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?> 
<div id="blog_latest_new_home">

<div class="col-xs-12 col-md-4 links">
		
		<h3 class="h3 hidden-sm-down"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Latest Blog','mod'=>'wtbloglatestnews'),$_smarty_tpl ) );?>
</h3>

	<div class="title clearfix hidden-md-up" data-target="#wtbloglatestnews" data-toggle="collapse">
        <span class="h3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Latest Blog','mod'=>'wtbloglatestnews'),$_smarty_tpl ) );?>
</span>
        <span class="pull-xs-right">
          <span class="navbar-toggler collapse-icons">
            <i class="material-icons add">&#xE313;</i>
            <i class="material-icons remove">&#xE316;</i>
          </span>
        </span>
      </div>
	  
	<div id="wtbloglatestnews" class="block_content collapse">
		<?php if (isset($_smarty_tpl->tpl_vars['view_data']->value) && !empty($_smarty_tpl->tpl_vars['view_data']->value)) {?>
			<?php $_smarty_tpl->_assignInScope('i', 1);?>
			<div class="blog-slider">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view_data']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>
					<?php $_smarty_tpl->_assignInScope('options', null);?>
					<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['options']) ? $_smarty_tpl->tpl_vars['options']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['id_post'] = $_smarty_tpl->tpl_vars['post']->value['id_wt_blog_post'];
$_smarty_tpl->_assignInScope('options', $_tmp_array);?>
					<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['options']) ? $_smarty_tpl->tpl_vars['options']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['slug'] = $_smarty_tpl->tpl_vars['post']->value['link_rewrite'];
$_smarty_tpl->_assignInScope('options', $_tmp_array);?>
					<div class="item">
						<div class="blog-img">
							<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="">
								<img alt="" class="feat_img_small" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_ssl']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
modules/wtblog/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
							</a>
						</div>
						<div class="blog-content">
							
							<!--<div class="blog-info">
								<div class="post-date">
									<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date_add']),'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

								</div>
								<span class="blog-author"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['author'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
							</div>-->
							
							<h5 class="post_title">
								<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['link'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="">
								<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>

								</a>
							</h5>
							
						</div>
					</div>
				<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		<?php }?>
	</div>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function(){
			$(".blog-slider").owlCarousel({
					responsive: {
						0: { items: 1},
						464:{ items: 1},
						750:{ items: 1},
						974:{ items: 1},
						1170:{ items: 1}
					},
				  dots: true,
				  nav: false,
				  loop: true,
				  margin: 20,
				  slideSpeed : 500,
				paginationSpeed : 1000,
				scrollPerPage: true
				});
		});
	<?php echo '</script'; ?>
>
</div><?php }
}
