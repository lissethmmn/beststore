<?php
/* Smarty version 3.1.32, created on 2018-11-13 18:26:06
  from 'module:pscontactinfopscontactinf' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb416e06a7e0_11389938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9992f3fe04dd41bcec1a2029cf07bead637caf4d' => 
    array (
      0 => 'module:pscontactinfopscontactinf',
      1 => 1541559744,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb416e06a7e0_11389938 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="block-contact links wrapper">
  
  
  <div class="title clearfix hidden-md-up" data-target="#footer_information">
    <span class="h3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Información de la Tienda','d'=>'Shop.Theme'),$_smarty_tpl ) );?>
</span>
    <span class="pull-xs-right">
      <!--<span class="navbar-toggler collapse-icons">
        <i class="material-icons add">&#xE313;</i>
        <i class="material-icons remove">&#xE316;</i>
      </span>-->
    </span>
  </div>
  
  <div class="account-list" id="footer_information">
     <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayLeftLogo'),$_smarty_tpl ) );?>

	 <i class="material-icons">home</i>
      <!--<?php echo $_smarty_tpl->tpl_vars['contact_infos']->value['address']['formatted'];?>

      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['company'], ENT_QUOTES, 'UTF-8');?>
<br/>-->
      <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['address']['address1'], ENT_QUOTES, 'UTF-8');?>
, Providencia</span>
      <!--<span class="footer-contact"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['address']['city'], ENT_QUOTES, 'UTF-8');?>
 - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact_infos']->value['address']['country'], ENT_QUOTES, 'UTF-8');?>
</span>-->
	  <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['phone']) {?>
        <br>
		<i class="material-icons">phone</i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Fono: [1]%phone%[/1]','sprintf'=>array('[1]'=>'<span>','[/1]'=>'</span>','%phone%'=>$_smarty_tpl->tpl_vars['contact_infos']->value['phone']),'d'=>'Shop.Theme'),$_smarty_tpl ) );?>

		
      <?php }?>
	  
      <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['fax']) {?>
	 
        <br>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Fax: [1]%fax%[/1]','sprintf'=>array('[1]'=>'<span>','[/1]'=>'</span>','%fax%'=>$_smarty_tpl->tpl_vars['contact_infos']->value['fax']),'d'=>'Shop.Theme'),$_smarty_tpl ) );?>

		
      <?php }?>
	  
      <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['email']) {?>
	
	<br>
	<i class="material-icons">email</i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email: [1]%email%[/1]','sprintf'=>array('[1]'=>'<span>','[/1]'=>'</span>','%email%'=>$_smarty_tpl->tpl_vars['contact_infos']->value['email']),'d'=>'Shop.Theme'),$_smarty_tpl ) );?>

		
      <?php }?>
	  
  </div>
 
</div>
<?php }
}
