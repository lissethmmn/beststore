<?php
/* Smarty version 3.1.32, created on 2018-11-09 18:07:49
  from 'C:\xampp\htdocs\17beststore\modules\wtcountdown\views\templates\hook\wtcountdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be5f72529a067_75180307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '884a88def965b79c415ecf193fd480de34ab753a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtcountdown\\views\\templates\\hook\\wtcountdown.tpl',
      1 => 1541585362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be5f72529a067_75180307 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\17beststore\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
if ((smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S') < $_smarty_tpl->tpl_vars['time_to']->value) && (smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S') >= $_smarty_tpl->tpl_vars['time_from']->value) && ('time_to' != '0000-00-00 00:00:00')) {?>
	<div class="wt-count-down">
	<p class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hurry Up! Offer ends in:','mod'=>'wtcountdown'),$_smarty_tpl ) );?>
</p>
		<div id="countdown_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['prev_id']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_product']->value), ENT_QUOTES, 'UTF-8');?>
" class="">
			<div class="wt_countdown" data-date="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( smarty_modifier_date_format($_smarty_tpl->tpl_vars['time_to']->value,'%Y/%m/%d %H:%M:%S'),'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
			
				<ul class="clock">
					<li>
					<div class="numner">
					<span data-days class="days">0</span>
					</div>
						<span class="dot">:</span>
					<div class="text">
					<p class="timeRefDays"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'days','mod'=>'wtcountdown'),$_smarty_tpl ) );?>
</p>
					</div>
					</li>
					
					<li>
					<div class="numner">
					<span data-hours class="hour">0</span>
					</div>
					<span class="dot">:</span>
					<div class="text">
					<p class="timeRefhour"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hours','mod'=>'wtcountdown'),$_smarty_tpl ) );?>
</p>
					</div>
					</li>
					
					
					<li>
					<div class="numner">
						<span data-minutes class="minutes">0</span>
					</div>
					<span class="dot">:</span>
					<div class="text">
					<p class="timeRefminutes"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'mins','mod'=>'wtcountdown'),$_smarty_tpl ) );?>
</p>
					</div>
					</li>

						<li>
						<div class="numner">
						<span data-seconds class="remainingSeconds">0</span>
						</div>
						<div class="text">
						<p class="timeRefseconds"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'secs','mod'=>'wtcountdown'),$_smarty_tpl ) );?>
</p>
						</div>
						</li> 
						
					
				</ul>
			</div>
		</div>
		<?php echo '<script'; ?>
 type="text/javascript">
			$(document).ready(function(){
				$('.wt_countdown').countdown({
					autoStart: true,
				});
			});
		<?php echo '</script'; ?>
>
	</div>
<?php } elseif (($_smarty_tpl->tpl_vars['time_to']->value == '0000-00-00 00:00:00') && ($_smarty_tpl->tpl_vars['time_from']->value == '0000-00-00 00:00:00')) {?>
	<div class="wt-count-down">
		<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' ','mod'=>'wtcountdown'),$_smarty_tpl ) );?>
</span>
	</div>
<?php }
}
}
