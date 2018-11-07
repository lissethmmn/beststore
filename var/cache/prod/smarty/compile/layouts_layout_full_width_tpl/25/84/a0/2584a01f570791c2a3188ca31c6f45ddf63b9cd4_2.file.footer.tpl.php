<?php
/* Smarty version 3.1.32, created on 2018-11-07 16:16:32
  from 'C:\xampp\htdocs\17beststore\themes\wt_buyonline\templates\_partials\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be33a108d5009_07458943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2584a01f570791c2a3188ca31c6f45ddf63b9cd4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\wt_buyonline\\templates\\_partials\\footer.tpl',
      1 => 1541560213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be33a108d5009_07458943 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayWrapperBottom'),$_smarty_tpl ) );?>

    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="logo-best" itemprop="description">
                        <img class="img-responsive" src="https://beststore.cl/version17/img/cms/logo_60_alt.png" alt="Best Store">
                    </div>
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155085be33a108caa45_86976792', 'hook_footer_before');
?>

                </div>
                <div class="col-md-8">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_49255be33a108ce399_04938367', 'hook_footer');
?>

                    <div class="col-md-4 footer-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.8725115303523!2d-70.6111766853454!3d-33.42656798078073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c56ff42dce05%3A0x80d6070c8bdb1ed8!2sBest+Store!5e0!3m2!1ses-419!2scl!4v1539361530929" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

                
            </div>
            <div class="row">
                
            </div>
            <div class="row">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_305145be33a108d1245_45501667', 'hook_footer_after');
?>

            </div>
        </div>
        <div class="container">
            <div class="bottom-footer">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBottomFooter'),$_smarty_tpl ) );?>

            </div>
            
        </div>
    </div><?php }
/* {block 'hook_footer_before'} */
class Block_155085be33a108caa45_86976792 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_before' => 
  array (
    0 => 'Block_155085be33a108caa45_86976792',
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
class Block_49255be33a108ce399_04938367 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer' => 
  array (
    0 => 'Block_49255be33a108ce399_04938367',
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
class Block_305145be33a108d1245_45501667 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'hook_footer_after' => 
  array (
    0 => 'Block_305145be33a108d1245_45501667',
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
