<?php
/* Smarty version 3.1.32, created on 2018-11-12 17:04:19
  from 'C:\xampp\htdocs\17beststore\adminbs\themes\default\template\controllers\currencies\conversion_rate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be9dcc3c4f9a4_76623143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe758f72f32ef0f876e568ef92c87798d20be5ea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\adminbs\\themes\\default\\template\\controllers\\currencies\\conversion_rate.tpl',
      1 => 1541516418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be9dcc3c4f9a4_76623143 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<div class="col-lg-12">
		<?php if (Module::isInstalled("cronjobs")) {?>
			<?php $_smarty_tpl->_assignInScope('PS_ACTIVE_CRONJOB_EXCHANGE_RATE', Configuration::get('PS_ACTIVE_CRONJOB_EXCHANGE_RATE'));?>
			<div id="currencyCronjobLiveExchangeRate" class="panel">
				<div class="panel-heading">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Live exchange rates','d'=>'Admin.International.Feature'),$_smarty_tpl ) );?>

					<div class="pull-right checkbox titatoggle unchecked-red checkbox-slider--b-flat">
						<label>
							<input type="checkbox" <?php echo 0 != $_smarty_tpl->tpl_vars['PS_ACTIVE_CRONJOB_EXCHANGE_RATE']->value ? 'checked="checked"' : '';?>
><span></span>
						</label>
					</div>
					<div class="clearfix"></div>
				</div>
				<span class="status disabled <?php echo 0 == $_smarty_tpl->tpl_vars['PS_ACTIVE_CRONJOB_EXCHANGE_RATE']->value ? '' : 'hide';?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"The exchange rates are not automatically updated",'d'=>'Admin.International.Feature'),$_smarty_tpl ) );?>
</span>
				<span class="status enabled <?php echo 0 != $_smarty_tpl->tpl_vars['PS_ACTIVE_CRONJOB_EXCHANGE_RATE']->value ? '' : 'hide';?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"The exchange rates are automatically updated",'d'=>'Admin.International.Feature'),$_smarty_tpl ) );?>
</span>
			</div>
    <?php } else { ?>
      <div id="currencyCronjobLiveExchangeRate" class="panel">
				<div class="panel-heading">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Live exchange rates','d'=>'Admin.International.Feature'),$_smarty_tpl ) );?>

					<div class="pull-right checkbox titatoggle unchecked-red checkbox-slider--b-flat"></div>
					<div class="clearfix"></div>
				</div>
				<span class="status disabled"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please install the %module_name% module before using this feature.','sprintf'=>array('%module_name%'=>'cronjobs'),'d'=>'Admin.International.Notification'),$_smarty_tpl ) );?>
</span>
			</div>
		<?php }?>
		<div class="panel">
			<div class="panel-heading"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update exchange rates','d'=>'Admin.International.Feature'),$_smarty_tpl ) );?>
</div>
			<form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCurrencies'),'html','UTF-8' ));?>
" id="currency_form" method="post">
				<button type="submit" class="btn btn-default col-lg-12 col-xs-4" name="SubmitExchangesRates"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Update",'d'=>'Admin.Global'),$_smarty_tpl ) );?>
</button>
			</form>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php }
}
