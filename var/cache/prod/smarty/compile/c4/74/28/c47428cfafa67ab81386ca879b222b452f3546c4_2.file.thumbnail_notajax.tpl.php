<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:30:34
  from 'C:\xampp\htdocs\17beststore\modules\wtproductfilter\views\templates\hook\thumbnail_notajax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be480ca8e1157_02489911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c47428cfafa67ab81386ca879b222b452f3546c4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductfilter\\views\\templates\\hook\\thumbnail_notajax.tpl',
      1 => 1541585529,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be480ca8e1157_02489911 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['wt_thumbnails']->value) {?>

	<div class="thumbs-content">

		<a id="view_scroll_left<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wt_thumbnails_key']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="button-arrow-vertical-thumb prev <?php if (isset($_smarty_tpl->tpl_vars['wt_thumbnails']->value) && count($_smarty_tpl->tpl_vars['wt_thumbnails']->value) <= 4) {?>hidden<?php }?>" href="javascript:{}" title="Other views" rel="11"><i class="icon-chevron-up"></i></a>

		<div id="thumbs_list<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wt_thumbnails_key']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="thumbs_list <?php if (isset($_smarty_tpl->tpl_vars['wt_thumbnails']->value) && count($_smarty_tpl->tpl_vars['wt_thumbnails']->value) > 3) {?>show_sroll<?php }?>">

			<ul id="thumbs_list_frame<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wt_thumbnails_key']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="thumbs_list_frame" name="thumb-images-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
">

				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wt_thumbnails']->value, 'image', false, NULL, 'thumbnails', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_thumbnails']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_thumbnails']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_thumbnails']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_thumbnails']->value['total'];
?>

					<?php $_smarty_tpl->_assignInScope('imageIds', ((string)$_smarty_tpl->tpl_vars['product']->value['id_product'])."-".((string)$_smarty_tpl->tpl_vars['image']->value['id_image']));?>

					<?php if (!empty($_smarty_tpl->tpl_vars['image']->value['legend'])) {?>

						<?php $_smarty_tpl->_assignInScope('imageTitle', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['legend'],'html','UTF-8' )));?>

					<?php } else { ?>

						<?php $_smarty_tpl->_assignInScope('imageTitle', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8' )));?>

					<?php }?>

					<li id="thumbnail<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wt_thumbnails_key']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['id_image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_thumbnails']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_thumbnails']->value['last'] : null)) {?> class="last"<?php }?>>

						<a wt_rel="prettyPhoto[thumb-images-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
]"

							href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['imageIds']->value,'large_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"

							data-fancybox-group="other-views-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
" tv-img-src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['imageIds']->value,'home_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"

							class="fancybox image_hoverwashe"

							title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['imageTitle']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">



							<img class="img-responsive" id="thumb_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_product']), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value['id_image'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['imageIds']->value,'small_default'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['imageTitle']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['imageTitle']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" itemprop="image" />

						<span class="hover_bkg_light"></span>

						</a>

					</li>

				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			</ul>

		</div>

		<a id="view_scroll_right<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wt_thumbnails_key']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" class="button-arrow-vertical-thumb next <?php if (isset($_smarty_tpl->tpl_vars['wt_thumbnails']->value) && count($_smarty_tpl->tpl_vars['wt_thumbnails']->value) <= 4) {?>hidden<?php }?>" href="javascript:{}" title="Other views" rel="11"><i class="icon-chevron-down"></i></a>

</div>

		<?php echo '<script'; ?>
 type="text/javascript">

		$(function(){

		

		$('#thumbs_list<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
').serialScroll({

			items:'li:visible',

			prev:'#view_scroll_left<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
',

			next:'#view_scroll_right<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
',

			axis:'y',

			offset:0,

			start:0,

			stop:true,

			onBefore:serialScrollFixLock,

			duration:700,

			step: 2,

			lazy: true,

			lock: false,

			force:false,

			cycle:false

		});

		$('#thumbs_list<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
').trigger('goto', 1);// SerialScroll Bug on goto 0 ?

		$('#thumbs_list<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
').trigger('goto', 0);

	

		function serialScrollFixLock(event, targeted, scrolled, items, position)

		{

			serialScrollNbImages = $('#thumbs_list<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
 li:visible').length;

			serialScrollNbImagesDisplayed = 3;



			var leftArrow = position == 0 ? true : false;

			var rightArrow = position + serialScrollNbImagesDisplayed >= serialScrollNbImages ? true : false;



			$('#view_scroll_left<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
').css('cursor', leftArrow ? 'default' : 'pointer').css('display', leftArrow ? 'block' : 'block').fadeTo(0, leftArrow ? 0 : 1);

			$('#view_scroll_right<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['wt_thumbnails_key']->value), ENT_QUOTES, 'UTF-8');?>
').css('cursor', rightArrow ? 'default' : 'pointer').fadeTo(0, rightArrow ? 0 : 1).css('display', rightArrow ? 'block' : 'block');

			return true;

		}

		});

	<?php echo '</script'; ?>
>

<?php }
}
}
