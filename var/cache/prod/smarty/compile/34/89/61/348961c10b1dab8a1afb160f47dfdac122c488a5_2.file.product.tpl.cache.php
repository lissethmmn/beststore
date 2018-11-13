<?php
/* Smarty version 3.1.32, created on 2018-11-13 11:32:59
  from 'C:\xampp\htdocs\17beststore\themes\wt_buyonline\templates\catalog\_partials\miniatures\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beae09befb997_58490341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '348961c10b1dab8a1afb160f47dfdac122c488a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\wt_buyonline\\templates\\catalog\\_partials\\miniatures\\product.tpl',
      1 => 1541560227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/customize/button-cart-product-list.tpl' => 1,
    'file:catalog/_partials/customize/button-quickview.tpl' => 1,
  ),
),false)) {
function content_5beae09befb997_58490341 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '100145beae09be63395_58930626';
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_317435beae09bea1bd0_09724735', 'product_miniature_item');
?>

<?php }
/* {block 'product_thumbnail'} */
class Block_117245beae09beaf374_41334464 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="thumbnail product-thumbnail">
          <img class="wt-image"
            src = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
            alt = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
"
            data-full-size-image-url = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['large']['url'], ENT_QUOTES, 'UTF-8');?>
"
          >
        </a>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListThumbnails','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'product_thumbnail'} */
/* {block 'product_name'} */
class Block_225495beae09becf648_20456156 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <h1 class="h3 product-title" itemprop="name"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value['name'],30,'...' )), ENT_QUOTES, 'UTF-8');?>
</a></h1>
        <?php
}
}
/* {/block 'product_name'} */
/* {block 'product_price_and_shipping'} */
class Block_59305beae09bed91f1_23839982 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
            <div class="product-price-and-shipping">
              <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl ) );?>


                <span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type'] === 'percentage') {?>
                  <span class="discount-percentage"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span>
                <?php }?>
              <?php }?>

              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl ) );?>


              <span itemprop="price" class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>

              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'unit_price'),$_smarty_tpl ) );?>


            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'weight'),$_smarty_tpl ) );?>

          </div>
        <?php }?>
      <?php
}
}
/* {/block 'product_price_and_shipping'} */
/* {block 'product_reviews'} */
class Block_228115beae09bef0f42_77271310 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'product_reviews'} */
/* {block 'product_miniature_item'} */
class Block_317435beae09bea1bd0_09724735 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_miniature_item' => 
  array (
    0 => 'Block_317435beae09bea1bd0_09724735',
  ),
  'product_thumbnail' => 
  array (
    0 => 'Block_117245beae09beaf374_41334464',
  ),
  'product_name' => 
  array (
    0 => 'Block_225495beae09becf648_20456156',
  ),
  'product_price_and_shipping' => 
  array (
    0 => 'Block_59305beae09bed91f1_23839982',
  ),
  'product_reviews' => 
  array (
    0 => 'Block_228115beae09bef0f42_77271310',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <article class="ajax_block_product product-miniature js-product-miniature col-xs-12 col-sm-6 col-md-4" data-id-product="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
" data-id-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" itemscope itemtype="http://schema.org/Product">
    <div class="thumbnail-container wt_container_thumbnail">
	<div class="div-product-image">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_117245beae09beaf374_41334464', 'product_thumbnail', $this->tplIndex);
?>

	   <div class="wt-button-container">
		<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-cart-product-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value,'name_module'=>'product-list'), 0, false);
?>
		
		<?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/customize/button-quickview.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, false);
?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

	</div>
	</div>
      <div class="product-description">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_225495beae09becf648_20456156', 'product_name', $this->tplIndex);
?>

		<div class="description" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_59305beae09bed91f1_23839982', 'product_price_and_shipping', $this->tplIndex);
?>


      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_228115beae09bef0f42_77271310', 'product_reviews', $this->tplIndex);
?>

    </div>

  

    

  </article>
<?php
}
}
/* {/block 'product_miniature_item'} */
}
