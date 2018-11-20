<?php
/* Smarty version 3.1.32, created on 2018-11-20 17:33:42
  from 'C:\xampp\htdocs\17beststore\themes\wt_buyonline\templates\_partials\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf46fa6cb49a2_38258878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2584a01f570791c2a3188ca31c6f45ddf63b9cd4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\wt_buyonline\\templates\\_partials\\footer.tpl',
      1 => 1542124796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf46fa6cb49a2_38258878 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayWrapperBottom'),$_smarty_tpl ) );?>

 <div class="footer-container">
  <div class="container">
    <div class="row">
	 <div class="col-md-4">
	 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195055bf46fa6c9c763_88112642', 'hook_footer_before');
?>

	</div>
	<div class="col-md-8">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_38625bf46fa6ca20b2_40619872', 'hook_footer');
?>

    </div>
	</div>
    <div class="row">
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_206315bf46fa6cad536_36869643', 'hook_footer_after');
?>

    </div>
   
  </div>
  <div class="container">
		<div class="download">
			<div class="apple">apple</div>
			<div class="google">goolge</div>
			<div class="microsoft">microsoft</div>
		</div>
   <div class="bottom-footer">
      
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBottomFooter'),$_smarty_tpl ) );?>

      
	  </div>
    </div>
  
</div>
<?php }
/* {block 'hook_footer_before'} */
class Block_195055bf46fa6c9c763_88112642 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_before' => 
  array (
    0 => 'Block_195055bf46fa6c9c763_88112642',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterBefore'),$_smarty_tpl ) );?>

    <?php
}
}
/* {/block 'hook_footer_before'} */
/* {block 'hook_footer'} */
class Block_38625bf46fa6ca20b2_40619872 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer' => 
  array (
    0 => 'Block_38625bf46fa6ca20b2_40619872',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'hook_footer'} */
/* {block 'hook_footer_after'} */
class Block_206315bf46fa6cad536_36869643 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_after' => 
  array (
    0 => 'Block_206315bf46fa6cad536_36869643',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooterAfter'),$_smarty_tpl ) );?>

      <?php
}
}
/* {/block 'hook_footer_after'} */
}
