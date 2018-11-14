<?php
/* Smarty version 3.1.32, created on 2018-11-14 16:21:53
  from 'C:\xampp\htdocs\17beststore\themes\wt_buyonline\templates\_partials\breadcrumb.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bec75d1951e03_35557330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d195ccbbbe1c5e8dcc5b188cd35bea1e0eef879' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\wt_buyonline\\templates\\_partials\\breadcrumb.tpl',
      1 => 1541560213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bec75d1951e03_35557330 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<nav data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['breadcrumb']->value['count'], ENT_QUOTES, 'UTF-8');?>
" class="breadcrumb">
<h1 class="new-title-breadcrumb"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayPageTitle"),$_smarty_tpl ) );?>
</h1>
  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumb']->value['links'], 'path', false, NULL, 'breadcrumb', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['path']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration']++;
?>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_176535bec75d191ba46_36257514', 'breadcrumb_item');
?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ol>
</nav>
<?php }
/* {block 'breadcrumb_item'} */
class Block_176535bec75d191ba46_36257514 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'breadcrumb_item' => 
  array (
    0 => 'Block_176535bec75d191ba46_36257514',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
            <span itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
          </a>
          <meta itemprop="position" content="<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration'] : null), ENT_QUOTES, 'UTF-8');?>
">
        </li>
		<?php if ($_smarty_tpl->tpl_vars['page']->value['page_name'] == 'order-confirmation' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'cart' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'checkout' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'my-account' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'manufacturer' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'search' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'new-products' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'prices-drop' || $_smarty_tpl->tpl_vars['page']->value['page_name'] == 'best-sales') {?>
		   <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			
			  <span itemprop="name"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayPageTitle"),$_smarty_tpl ) );?>

			 
			  </span>
			
			<meta itemprop="position" content="<?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_breadcrumb']->value['iteration'] : null), ENT_QUOTES, 'UTF-8');?>
">
		  </li>
		<?php }?>
		
      <?php
}
}
/* {/block 'breadcrumb_item'} */
}
