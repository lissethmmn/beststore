<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:33:52
  from 'C:\xampp\htdocs\17beststore\themes\child_wt_buyonline\templates\catalog\_partials\customize\button-cart-product-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb2720381104_42851972',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c885b1710d01a2b076ff7c881a3d05e94a3137eb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\child_wt_buyonline\\templates\\catalog\\_partials\\customize\\button-cart-product-list.tpl',
      1 => 1541559765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb2720381104_42851972 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="product-add-to-cart">

		  <form action="" method="post" id="add-to-cart-or-refresh">
               
				<div class="product-quantity" style="display:none;">
				 <input type="hidden" name="token" id="token-product-list" value="">
                <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" id="product_page_product_id">
                <input type="hidden" name="id_customization" value="0" id="product_customization_id">
                <input type="hidden" name="qty" id="quantity_wanted" value="1" class="input-group"  min="1"  />
				</div>
                 <a href="javascript:void(0);" wt-name-module="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name_module']->value, ENT_QUOTES, 'UTF-8');?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name_module']->value, ENT_QUOTES, 'UTF-8');?>
-wt-cart-id-product-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" wt_id_product_atrr="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" class="medium-button add-to-cart hvr-sweep-to-top no-ico" data-button-action="add-to-cart">
					<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add to cart','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>
</span>
					
				  </a>

            </form>
    

</div>
<?php }
}
