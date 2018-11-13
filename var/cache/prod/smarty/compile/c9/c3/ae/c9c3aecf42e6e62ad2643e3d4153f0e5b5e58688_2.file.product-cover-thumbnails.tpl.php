<?php
/* Smarty version 3.1.32, created on 2018-11-13 18:23:13
  from 'C:\xampp\htdocs\17beststore\themes\wt_buyonline\templates\catalog\_partials\product-cover-thumbnails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb40c1563c85_56154206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9c3aecf42e6e62ad2643e3d4153f0e5b5e58688' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\wt_buyonline\\templates\\catalog\\_partials\\product-cover-thumbnails.tpl',
      1 => 1541560221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb40c1563c85_56154206 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<div class="images-container">
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_187085beb40c14c5016_16608837', 'product_cover');
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_260455beb40c14dbb60_81025954', 'product_images');
?>

</div>

	
<?php echo '<script'; ?>
 type="text/javascript">
	$(window).ready(function() {
		runSliderthumbnail();
	});
$(function(){
	runSliderthumbnail();
});
	
	function runSliderthumbnail(){
		$('#thumbs_list_frame').carouFredSel({
				responsive: true,
				direction: 'up',
				width: 'variable',
				height: '80',
				onWindowResize: 'debounce',
	
				prev: '#prev_thumblist',
				next: '#next_thumblist',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width: 'auto',
					height: '360px',
					visible: 3
				},
				scroll: {
					items:1,
					direction : 'up',    
					duration  : 700 ,  
					onBefore: function(data) { 	
					},
					onAfter	: function(data) {
				   }
				}
			});
		
	}
<?php echo '</script'; ?>
>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAfterProductThumbs'),$_smarty_tpl ) );?>

<?php }
/* {block 'product_cover'} */
class Block_187085beb40c14c5016_16608837 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_187085beb40c14c5016_16608837',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="product-cover">
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
"><img class="js-qv-product-cover" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;" itemprop="image"></a>
      <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
        <i class="material-icons zoom-in">&#xE8FF;</i>
      </div>
    </div>
  <?php
}
}
/* {/block 'product_cover'} */
/* {block 'product_images'} */
class Block_260455beb40c14dbb60_81025954 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_260455beb40c14dbb60_81025954',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  
  
    <div class="js-qv-mask mask">
	<a id="prev_thumblist" class="button-arrow-vertical prev" href="#"></a>
	<a id="next_thumblist" class="button-arrow-vertical next" href="#"></a>
      <ul id="thumbs_list_frame" class="product-images js-qv-product-images" name="thumb-images">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
          <li class="thumb-container">
            <a wt_rel="prettyPhoto[thumb-images]" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
"><img
              class="thumb js-thumb <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] == $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
              data-image-medium-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['medium_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
              data-image-large-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
              src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
              alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
              title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
              
              itemprop="image"
            >
			</a>
          </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>

	</div>
  <?php
}
}
/* {/block 'product_images'} */
}
