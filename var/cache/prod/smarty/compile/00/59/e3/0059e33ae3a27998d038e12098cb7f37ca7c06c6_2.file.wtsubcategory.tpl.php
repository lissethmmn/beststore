<?php
/* Smarty version 3.1.32, created on 2018-11-08 15:31:03
  from 'C:\xampp\htdocs\17beststore\modules\wtsubcategory\views\templates\hook\wtsubcategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be480e795da68_47696454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0059e33ae3a27998d038e12098cb7f37ca7c06c6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtsubcategory\\views\\templates\\hook\\wtsubcategory.tpl',
      1 => 1541585641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be480e795da68_47696454 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['subcategories']->value) > 0) {?>

<div id="wt_subcategory" class="wt_subcategory">

<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sub Categories','mod'=>'wtsubcategory'),$_smarty_tpl ) );?>
 </h3>

					

					 <div class="button-next-prev">

					<a id="prev_sub_cat" class="button-arrow prev" href="#"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Prev','mod'=>'wtsubcategory'),$_smarty_tpl ) );?>
</a>

					<a id="next_sub_cat" class="button-arrow next" href="#"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next','mod'=>'wtsubcategory'),$_smarty_tpl ) );?>
</a>

		</div>

					  <div id="subcategory_list" class="subcategory_list">

					<ul id="ul_subcategory_list" class="product-list">

						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcategories']->value, 'sub_cat', false, NULL, 'sub_cat_info', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sub_cat']->value) {
?>

							<li>

								

								<a href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['sub_cat']->value['id_category'],$_smarty_tpl->tpl_vars['sub_cat']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_cat']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">

								

								<?php if ($_smarty_tpl->tpl_vars['sub_cat']->value['id_image'] && $_smarty_tpl->tpl_vars['sub_cat']->value['cat_thumb'] == 1) {?>

									<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_ssl']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
img/c/<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['sub_cat']->value['id_category']), ENT_QUOTES, 'UTF-8');?>
_thumb.jpg" alt=""/>

								<?php } else { ?>

									<img class="replace-2x" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path_ssl']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
img/c/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['iso_code']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
.jpg" alt=""/>

								<?php }?>

								</a>

								<a class="subcat-name" href="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['sub_cat']->value['id_category'],$_smarty_tpl->tpl_vars['sub_cat']->value['link_rewrite']),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_cat']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sub_cat']->value['name'] )), ENT_QUOTES, 'UTF-8');?>


								

								</a>

							</li>

						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

						</ul>

					</div>

					



	<?php echo '<script'; ?>
 type="text/javascript">

		

	$(window).load(function() {

		runSliderSubCategory();

	});



	$(window).resize(function() {

			runSliderSubCategory();

	});

function runSliderSubCategory(){

	

	var item_sub_cat = 5 ;

		

		if(getWidthBrowser() > 1180)

		{	

			item_sub_cat = 5; 

		}

		else

		if(getWidthBrowser() > 991)

		{	

			item_sub_cat = 4; 

		}

		else

		if(getWidthBrowser() > 767)

		{	

			item_sub_cat = 3; 

		}		

		else

		if(getWidthBrowser() > 540)

		{	

			item_sub_cat = 2; 

		}

		else

			item_sub_cat = 2;

 		

			$('#ul_subcategory_list').carouFredSel({

				responsive: true,

				width: '100%',

				height: 'variable',

				onWindowResize: 'debounce',

				prev: '#prev_sub_cat',

				next: '#next_sub_cat',

				auto: false,

				swipe: {

					onTouch : true

				},

				items: {

					width:160,

					height: 'auto',

					visible: {

						min: 1,

						max: item_sub_cat

					}

				},

				scroll: {

					items:item_sub_cat,

					direction : 'left',    

					duration  : 900 ,  

					onBefore: function(data) { 

	

					},

					onAfter	: function(data) {

					

				   }

				}

			});

	}



	<?php echo '</script'; ?>
>

</div>

<?php }
}
}
