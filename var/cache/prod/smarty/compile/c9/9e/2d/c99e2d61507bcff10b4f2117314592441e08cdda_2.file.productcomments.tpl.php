<?php
/* Smarty version 3.1.32, created on 2018-11-20 17:08:57
  from 'C:\xampp\htdocs\17beststore\modules\wtproductcomments\views\templates\hook\productcomments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bf469d95916b8_87811533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c99e2d61507bcff10b4f2117314592441e08cdda' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtproductcomments\\views\\templates\\hook\\productcomments.tpl',
      1 => 1541585509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf469d95916b8_87811533 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
var productcomments_controller_url = '<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['productcomments_controller_url']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
';
var confirm_report_message = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure that you want to report this comment?','mod'=>'wtproductcomments','js'=>1),$_smarty_tpl ) );?>
';
var secure_key = '<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['secure_key']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
';
var productcomments_url_rewrite = '<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['productcomments_url_rewriting_activated']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
';
var productcomment_added = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your comment has been added!','mod'=>'wtproductcomments','js'=>1),$_smarty_tpl ) );?>
';
var productcomment_added_moderation = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your comment has been submitted and will be available once approved by a moderator.','mod'=>'wtproductcomments','js'=>1),$_smarty_tpl ) );?>
';
var productcomment_title = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New comment','mod'=>'wtproductcomments','js'=>1),$_smarty_tpl ) );?>
';
var productcomment_ok = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'OK','mod'=>'wtproductcomments','js'=>1),$_smarty_tpl ) );?>
';
var moderation_active = <?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moderation_active']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
;
var productcomment_success = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your comment has been added! This reviews will be validated by an employee.','mod'=>'wtproductcomments','js'=>1),$_smarty_tpl ) );?>
';

<?php echo '</script'; ?>
>


<div class="tab-pane fade in" id="productcomments">
    
	<div id="message_comment_form" class="error" style="display: none; padding:15px 25px">
	</div>
				
	<div id="product_comments_block_tab">
	<?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
	<?php if ((!$_smarty_tpl->tpl_vars['too_early']->value && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
		<p class="align_center">
			<a id="new_comment_tab_btn" class="open-comment-form btn btn-secondary" href="#new_comment_form"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
 !</a>
		</p>
     <?php }?>
		
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['comment']->value['content']) {?>
			<div class="comment clearfix">
				<div class="comment_author">
					<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Grade','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
&nbsp</span>
					<div class="star_content clearfix">
					<?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= 5; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
						<?php if ($_smarty_tpl->tpl_vars['comment']->value['grade'] <= (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
							<div class="star"></div>
						<?php } else { ?>
							<div class="star star_on"></div>
						<?php }?>
					<?php
}
}
?>
					</div>
					<div class="comment_author_infos">
						<strong><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['customer_name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</strong><br/>
						<em><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['date_add'],'html','UTF-8' )),'full'=>0),$_smarty_tpl ) );?>
</em>
					</div>
				</div>
				<div class="comment_details">
					<h4 class="title_block"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['title'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</h4>
					<p><?php echo htmlspecialchars(nl2br(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['content'],'html','UTF-8' ))), ENT_QUOTES, 'UTF-8');?>
</p>
					<ul>
						<?php if ($_smarty_tpl->tpl_vars['comment']->value['total_advice'] > 0) {?>
							<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%1$d out of %2$d people found this review useful.','sprintf'=>array($_smarty_tpl->tpl_vars['comment']->value['total_useful'],$_smarty_tpl->tpl_vars['comment']->value['total_advice']),'mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
							<?php if (!$_smarty_tpl->tpl_vars['comment']->value['customer_advice']) {?>
							<li><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Was this comment useful to you?','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
<button class="usefulness_btn" data-is-usefull="1" data-id-product-comment="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['id_product_comment'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'yes','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</button><button class="usefulness_btn" data-is-usefull="0" data-id-product-comment="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['id_product_comment'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'no','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</button></li>
							<?php }?>
							<?php if (!$_smarty_tpl->tpl_vars['comment']->value['customer_report']) {?>
							<li><span class="report_btn" data-id-product-comment="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['id_product_comment'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Report abuse','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</span></li>
							<?php }?>
						<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
	<?php } else { ?>
		<?php if ((!$_smarty_tpl->tpl_vars['too_early']->value && ($_smarty_tpl->tpl_vars['logged']->value || $_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
		<p class="align_center">
			<a id="new_comment_tab_btn" class="open-comment-form btn btn-secondary" href="#new_comment_form"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Be the first to write your review','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
 !</a>
		</p>
		<?php } else { ?>
		<p class="align_center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No customer reviews for the moment.','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</p>
		<?php }?>
	<?php }?>	
	</div>
	
	
	
</div>

<?php if (isset($_smarty_tpl->tpl_vars['product']->value) && $_smarty_tpl->tpl_vars['product']->value) {?>
<!-- Fancybox -->

	<div id="new_comment_form" style="display:none">
		<form id="id_new_comment_form" action="#">
		<button type="button" class="close_comment wt_close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
			<h2 class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write your review','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</h2>
			<div id="message_comment_popup" class="error" style="display: none; padding:15px 25px">
			</div>
	
			<?php if (isset($_smarty_tpl->tpl_vars['product']->value) && $_smarty_tpl->tpl_vars['product']->value) {?>
			<div class="product col-md-6">
				<div class="product_desc">
					<p class="product_name"><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->name,'html','UTF-8' ));?>
</strong></p>
					
				</div>
				<img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['productcomment_cover_image']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mediumSize']->value['height'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mediumSize']->value['width'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->name,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" />
				
			</div>
			<?php }?>
			<div class="new_comment_form_content product col-md-6">
				
				<?php if (count($_smarty_tpl->tpl_vars['criterions']->value) > 0) {?>
					<ul id="criterions_list">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['criterions']->value, 'criterion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['criterion']->value) {
?>
						<li>
							<label><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['name'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</label>
							<div class="star_content">
								<input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="1" />
								<input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="2" />
								<input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="3" />
								<input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="4" />
								<input class="star" type="radio" name="criterion[<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['criterion']->value['id_product_comment_criterion'],'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
]" value="5" checked="checked" />
							</div>
							<div class="clearfix"></div>
						</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</ul>
				<?php }?>
				<label for="comment_title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Title for your review','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
<sup class="required">*</sup></label>
				<input id="comment_title" name="title" type="text" value=""/>

				<label for="content"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your review','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
<sup class="required">*</sup></label>
				<textarea id="content" name="content"></textarea>

				<?php if ($_smarty_tpl->tpl_vars['allow_guests']->value == true && !$_smarty_tpl->tpl_vars['logged']->value) {?>
				<label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your name','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
<sup class="required">*</sup></label>
				<input id="commentCustomerName" name="customer_name" type="text" value=""/>
				<?php }?>

				<div id="new_comment_form_footer">
					<input id="id_product_comment_send" name="id_product" type="hidden" value='<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_product_comment_form']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
' />
					<p class="fl required"><sup>*</sup> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Required fields','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</p>
					<p class="fr">
						<button id="submitNewMessage" name="submitMessage" type="submit"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Send','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</button>&nbsp;
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'or','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
&nbsp;<a href="javascript:void(0);" class="close_comment"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','mod'=>'wtproductcomments'),$_smarty_tpl ) );?>
</a>
					</p>
					<div class="clearfix"></div>
				</div>
			</div>
		</form><!-- /end new_comment_form_content -->
	</div>

<!-- End fancybox -->
<?php }?>

<?php }
}
