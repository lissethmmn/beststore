<?php
/* Smarty version 3.1.32, created on 2018-11-21 15:07:30
  from 'C:\xampp\htdocs\17beststore\modules\wtcouponpop\views\templates\hook\wtcouponpop.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf59ee21e9244_48763101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '778e1c263a9ef29289f190b9781682877ef55f24' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtcouponpop\\views\\templates\\hook\\wtcouponpop.tpl',
      1 => 1542816188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf59ee21e9244_48763101 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    var wt_coupon_url = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wt_coupon_url']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
	var cookies_time = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['newsletter_setting']->value['cookies_time']), ENT_QUOTES, 'UTF-8');?>
;
<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['newsletter_setting']->value) {?>
<div id="overlay" style="<?php if ($_smarty_tpl->tpl_vars['cookies_time']->value > 0) {?>display: none;<?php }?>" onclick="closeDialog(cookies_time)"></div>
<?php if ($_smarty_tpl->tpl_vars['newsletter_setting']->value['background'] != '') {?>
<div class="wt-popup" style="background-image: url(<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['newsletter_setting']->value['background'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
);<?php if ($_smarty_tpl->tpl_vars['cookies_time']->value > 0) {?>display: none;<?php }?>">
<?php } else { ?>
<div class="wt-popup">
<?php }?>
	<div class="wt-popup-close">
			<a class="wt_close" href="javascript:void(0)" onclick="closeDialog(cookies_time)">
				<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['wt_coupon_url']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
/views/img/icon-close.png" /> </a>
			</div>
    <div class="inner">
	
		<div class="clearfix newsletter-content">
			<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['newsletter_setting']->value['content'],'quotes','UTF-8' ));?>

		</div>
		<div class="newsletter-form">
			<div class="g-newsletter-form">
				<input class="input-email" id="input-email" id="" type="text" name="email" size="18" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enter your email...','mod'=>'wtcouponpop'),$_smarty_tpl ) );?>
" value="" />                    
				<a onclick="regisNewsletter()" name="submitNewsletter" class="btn btn-default button"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Subscribe','mod'=>'wtcouponpop'),$_smarty_tpl ) );?>
</a>
			</div>
			
			
			<div class="g-check">                    
				<div class="checkbox">
					<input id="notshow" name="notshow" type="checkbox" value="1">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do not show this popup again','mod'=>'wtcouponpop'),$_smarty_tpl ) );?>

				</div>
			</div>
			<div id="regisNewsletterMessage"></div>
			
			<?php if ($_smarty_tpl->tpl_vars['voucher_code']->value != '') {?>
			<div class="coupon-side clearfix">
				<div class="coupon-wrapper clearfix">
					<div id="coupon-element" class="coupon" >
						<div class="scissors"></div>
						<div class="dashed-border">
							<span id="coupon-text-before"  style="<?php if ($_smarty_tpl->tpl_vars['show_voucher']->value == 1) {?>display: none;<?php } else { ?>display: block;<?php }?>">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Coupon will be shown here','mod'=>'wtcouponpop'),$_smarty_tpl ) );?>
</span>
							<span id="coupon-text-after" style="<?php if ($_smarty_tpl->tpl_vars['show_voucher']->value == 1) {?>display: block;<?php } else { ?>display: none;<?php }?>"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Voucher Code','mod'=>'wtcouponpop'),$_smarty_tpl ) );?>
: <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['voucher_code']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</span>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
    </div>    
</div>

<?php echo '<script'; ?>
 type="text/javascript">
var regisNewsletterMessage = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You have just subscribled successfully!','mod'=>'wtcouponpop','js'=>1),$_smarty_tpl ) );?>
';
var enterEmail = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enter your email please!','mod'=>'wtcouponpop','js'=>1),$_smarty_tpl ) );?>
';
<?php echo '</script'; ?>
>
<?php }?>
<div class="wt-show-popup <?php if ($_smarty_tpl->tpl_vars['cookies_time']->value > 0) {?>open<?php } else { ?>close<?php }?>">
	<div class="wt-coupon-small">
		<div class="tab-image"></div>
		<div class="scissors-small"></div>
		<div class="dashes-d"></div>
		<div class="dashes-b"></div>
		<div class="share-coupon-small-wrapper"><a href="javascript: void(0)"><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Discount','mod'=>'wtcouponpop'),$_smarty_tpl ) );?>
</span></a></div>
	</div>
</div><?php }
}
