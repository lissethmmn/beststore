<?php
/* Smarty version 3.1.32, created on 2018-11-16 18:28:51
  from 'C:\xampp\htdocs\17beststore\themes\wt_buyonline\templates\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bef3693b1de45_84222408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de49a12008c136cc48f12a0a523a0b3b99878c72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\themes\\wt_buyonline\\templates\\page.tpl',
      1 => 1541560207,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bef3693b1de45_84222408 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_200905bef3693ad2536_14324584', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_108885bef3693ae2be6_14086837 extends Smarty_Internal_Block
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
class Block_179635bef3693ada859_52964246 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_108885bef3693ae2be6_14086837', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_225985bef3693afaca4_93324911 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_66635bef3693b07978_48950661 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_153935bef3693af9346_77221696 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_225985bef3693afaca4_93324911', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_66635bef3693b07978_48950661', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_310695bef3693b122f4_09443185 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_264205bef3693b0db44_67237092 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_310695bef3693b122f4_09443185', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_200905bef3693ad2536_14324584 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_200905bef3693ad2536_14324584',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_179635bef3693ada859_52964246',
  ),
  'page_title' => 
  array (
    0 => 'Block_108885bef3693ae2be6_14086837',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_153935bef3693af9346_77221696',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_225985bef3693afaca4_93324911',
  ),
  'page_content' => 
  array (
    0 => 'Block_66635bef3693b07978_48950661',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_264205bef3693b0db44_67237092',
  ),
  'page_footer' => 
  array (
    0 => 'Block_310695bef3693b122f4_09443185',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_179635bef3693ada859_52964246', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_153935bef3693af9346_77221696', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_264205bef3693b0db44_67237092', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
