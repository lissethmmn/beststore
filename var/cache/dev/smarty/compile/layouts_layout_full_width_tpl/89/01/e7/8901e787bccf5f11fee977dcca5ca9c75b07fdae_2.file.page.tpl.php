<?php
/* Smarty version 3.1.32, created on 2018-10-08 18:41:12
  from '/home/beststor/public_html/version17/themes/wt_buyonline/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bbbcef8214835_58431733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8901e787bccf5f11fee977dcca5ca9c75b07fdae' => 
    array (
      0 => '/home/beststor/public_html/version17/themes/wt_buyonline/templates/page.tpl',
      1 => 1538503567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbbcef8214835_58431733 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6538545385bbbcef82071e1_84177606', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_13488612715bbbcef8209292_13819268 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_16266178815bbbcef8208067_74956840 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13488612715bbbcef8209292_13819268', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_19037729835bbbcef820df75_93220139 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_14301159175bbbcef820f3a8_34935423 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_19342459265bbbcef820d0b2_52302358 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19037729835bbbcef820df75_93220139', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14301159175bbbcef820f3a8_34935423', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_228636235bbbcef82122e8_31969945 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_17164305275bbbcef8211398_62243975 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_228636235bbbcef82122e8_31969945', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_6538545385bbbcef82071e1_84177606 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6538545385bbbcef82071e1_84177606',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_16266178815bbbcef8208067_74956840',
  ),
  'page_title' => 
  array (
    0 => 'Block_13488612715bbbcef8209292_13819268',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_19342459265bbbcef820d0b2_52302358',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_19037729835bbbcef820df75_93220139',
  ),
  'page_content' => 
  array (
    0 => 'Block_14301159175bbbcef820f3a8_34935423',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_17164305275bbbcef8211398_62243975',
  ),
  'page_footer' => 
  array (
    0 => 'Block_228636235bbbcef82122e8_31969945',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16266178815bbbcef8208067_74956840', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19342459265bbbcef820d0b2_52302358', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17164305275bbbcef8211398_62243975', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
