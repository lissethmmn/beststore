<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:50:56
  from 'module:wtslideshowviewstemplates' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be4859059ab85_12629478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '417c66bf5da6af8c7fab64e615df60556b73fc44' => 
    array (
      0 => 'module:wtslideshowviewstemplates',
      1 => 1541585614,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be4859059ab85_12629478 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Module HomeSlider -->
<?php $_smarty_tpl->_assignInScope('id_lang', Context::getContext()->language->id);
if ($_smarty_tpl->tpl_vars['slier_option_arr']->value['fullwidth'] == 'true') {?>
	<?php $_smarty_tpl->_assignInScope('width', '100%');?>
<div id="full-slider-wrapper">
<?php } else { ?>
	<?php $_smarty_tpl->_assignInScope('width', ($_smarty_tpl->tpl_vars['slier_option_arr']->value['width']).('px'));?>
<div id="slider-wrapper" class="col-xs-12">
<?php }
$_smarty_tpl->_assignInScope('height', ($_smarty_tpl->tpl_vars['slier_option_arr']->value['height']).('px'));?>
	<div id="layerslider" style="width:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['width']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;height:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['height']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wtslideshow_slides']->value, 'slide');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['slide']->value['transition3d'] != '') {?>
			<?php $_smarty_tpl->_assignInScope('transition2d', 'all');?>
			<?php $_smarty_tpl->_assignInScope('transition3d', $_smarty_tpl->tpl_vars['slide']->value['transition3d']);?>
		<?php } else { ?>
			<?php $_smarty_tpl->_assignInScope('transition2d', $_smarty_tpl->tpl_vars['slide']->value['transition2d']);?>
			<?php $_smarty_tpl->_assignInScope('transition3d', '');?>
		<?php }?>
		<div class="ls-slide" data-ls="slidedelay:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['slidedelay'],'html','UTF-8' ));?>
;timeshift:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['timeshift'],'html','UTF-8' ));?>
;transition2d:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['transition2d']->value,'html','UTF-8' ));?>
;transition3d:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['transition3d']->value,'html','UTF-8' ));?>
">
			<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wtslideshow_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/sliderimages/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="ls-bg" title ="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['title'],'html','UTF-8' ));?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['title'],'html','UTF-8' ));?>
"/>
			<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['url'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="ls-link" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['title'],'html','UTF-8' ));?>
"></a>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slide']->value['caption'], 'captionItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['captionItem']->value) {
?>
				<?php if ($_smarty_tpl->tpl_vars['captionItem']->value['type'] == 3) {?>
					<?php if ($_smarty_tpl->tpl_vars['captionItem']->value['params']['typev'] == 1) {?>
						<div class="ls-l <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['style'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['style'],'html','UTF-8' ));
}?> <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['class'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['class'],'html','UTF-8' ));
}?>" style="top:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datay'],'html','UTF-8' ));?>
px; left:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datax'],'html','UTF-8' ));?>
px;" data-ls="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['paramstr'],'html','UTF-8' ));?>
">
						<iframe src="http://player.vimeo.com/video/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['capvideo'][$_smarty_tpl->tpl_vars['id_lang']->value],'html','UTF-8' ));?>
" width="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['widthv'],'html','UTF-8' ));?>
" height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['heightv'],'html','UTF-8' ));?>
"></iframe>
						</div>
					<?php } else { ?>
						<div class="ls-l <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['style'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['style'],'html','UTF-8' ));
}?> <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['class'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['class'],'html','UTF-8' ));
}?>" style="top:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datay'],'html','UTF-8' ));?>
px; left:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datax'],'html','UTF-8' ));?>
px;" data-ls="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['paramstr'],'html','UTF-8' ));?>
">
						<iframe width="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['widthv'],'html','UTF-8' ));?>
" height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['heightv'],'html','UTF-8' ));?>
" src="//www.youtube.com/embed/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['capvideo'][$_smarty_tpl->tpl_vars['id_lang']->value],'html','UTF-8' ));?>
" frameborder="0" allowfullscreen></iframe>
						</div>
					<?php }?>
					
				<?php } elseif ($_smarty_tpl->tpl_vars['captionItem']->value['type'] == 2) {?>
					<?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['link'][$_smarty_tpl->tpl_vars['id_lang']->value]) && $_smarty_tpl->tpl_vars['captionItem']->value['link'][$_smarty_tpl->tpl_vars['id_lang']->value] != '') {?>
						<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['link'][$_smarty_tpl->tpl_vars['id_lang']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" target="_blank" class="ls-l <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['style'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['style'],'html','UTF-8' ));
}?> <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['class'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['class'],'html','UTF-8' ));
}?>" style="top:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datay'],'html','UTF-8' ));?>
px; left:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datax'] )), ENT_QUOTES, 'UTF-8');?>
px" data-ls="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['paramstr'],'html','UTF-8' ));?>
">
							<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wtslideshow_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/layers/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['capimage'][$_smarty_tpl->tpl_vars['id_lang']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"  alt=""/>
						</a>
					<?php } else { ?>
						<img class="ls-l <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['style'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['style'],'html','UTF-8' ));
}?> <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['class'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['class'],'html','UTF-8' ));
}?>" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wtslideshow_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/layers/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['capimage'][$_smarty_tpl->tpl_vars['id_lang']->value],'html','UTF-8' ));?>
" class="ls-l <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['style'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['style'],'html','UTF-8' ));
}?> <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['class'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['class'],'html','UTF-8' ));
}?>" style="top:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datay'],'html','UTF-8' ));?>
px; left:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datax'],'html','UTF-8' ));?>
px" data-ls="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['paramstr'],'html','UTF-8' ));?>
" alt=""/>
					<?php }?>
				<?php } else { ?>
					<?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['link'][$_smarty_tpl->tpl_vars['id_lang']->value]) && $_smarty_tpl->tpl_vars['captionItem']->value['link'][$_smarty_tpl->tpl_vars['id_lang']->value] != '') {?>
						<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['link'][$_smarty_tpl->tpl_vars['id_lang']->value],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" target="_blank" class="ls-l <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['style'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['style'],'html','UTF-8' ));
}?> <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['class'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['class'],'html','UTF-8' ));
}?>" style="top:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datay'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
px; left:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datax'],'html','UTF-8' ));?>
px" data-ls="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['paramstr'],'html','UTF-8' ));?>
">
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['captext'][$_smarty_tpl->tpl_vars['id_lang']->value],'quotes','UTF-8' ));?>

						</a>
					<?php } else { ?>
						<div class="ls-l <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['style'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['style'],'html','UTF-8' ));
}?> <?php if (isset($_smarty_tpl->tpl_vars['captionItem']->value['params']['class'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['class'],'html','UTF-8' ));
}?>" style="top:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datay'],'html','UTF-8' ));?>
px; left:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['params']['datax'],'html','UTF-8' ));?>
px" data-ls="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['paramstr'],'html','UTF-8' ));?>
">
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['captionItem']->value['captext'][$_smarty_tpl->tpl_vars['id_lang']->value],'quotes','UTF-8' ));?>

						</div>
					<?php }?>
				<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		
			<?php if ($_smarty_tpl->tpl_vars['slide']->value['thumbnail']) {?>
				<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wtslideshow_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/thumbnails/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['thumbnail'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="ls-tn" alt="Slide thumbnail"/>
			<?php } else { ?>
				<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wtslideshow_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/sliderimages/thumbnail_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slide']->value['image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="ls-tn" alt="Slide thumbnail"/>
			<?php }?>
		</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
	
	
	<?php echo '<script'; ?>
 type="text/javascript">
	$(function(){
	
	$("#layerslider").layerSlider({
		responsive: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['responsive'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		responsiveUnder:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['responsiveUnder'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		layersContainer:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['layersContainer'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		autoStart:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['autoStart'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		pauseOnHover:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['pauseOnHover'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		firstSlide:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['firstSlide'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		animateFirstSlide:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['animateFirstSlide'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		forceLoopNum:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['forceLoopNum'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		towWaySlideshow:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['towWaySlideshow'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		randomSlideshow:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['randomSlideshow'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		skin:"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['skin'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		loops:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['loops'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		skinsPath: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wtslideshow_path']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['skinsPath'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		globalBGColor: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['globalBGColor'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		globalBGImage: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['globalBGImage'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		navPrevNext: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['navPrevNext'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		navStartStop: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['navStartStop'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		navButtons: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['navButtons'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		hoverPrevNext: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['hoverPrevNext'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		hoverBottomNav:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['hoverBottomNav'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		keybNav:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['keybNav'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		touchNav:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['touchNav'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		showBarTimer:<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['showBarTimer'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		showCircleTimer: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['showCircleTimer'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		thumbnailNavigation: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['thumbnailNavigation'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		tnContainerWidth: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['tnContainerWidth'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		tnWidth: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['tnWidth'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		tnHeight: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['tnHeight'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		tnActiveOpacity: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['tnActiveOpacity'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		tnInactiveOpacity: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['tnInactiveOpacity'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		tnInactiveOpacity: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['tnInactiveOpacity'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		autoPlayVideos: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['autoPlayVideos'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		autoPauseSlideshow: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['autoPauseSlideshow'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		youtubePreview: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['youtubePreview'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		imgPreload: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['imgPreload'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		lazyLoad: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['lazyLoad'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
,
		yourLogo: <?php if ($_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogo'] == 'false') {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogo'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');
} else { ?>"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogo'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>,
		yourLogoStyle: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogoStyle'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
		yourLogoLink: <?php if ($_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogoLink'] == 'false') {
echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogoLink'] )), ENT_QUOTES, 'UTF-8');
} else { ?>"<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogoLink'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php }?>,
		yourLogoTarget: '<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option_arr']->value['yourLogoTarget'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
'
	});
	
	});
	
	<?php echo '</script'; ?>
>
</div>
<!-- /Module HomeSlider --><?php }
}
