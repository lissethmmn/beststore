<?php
/* Smarty version 3.1.32, created on 2018-11-13 16:04:56
  from 'C:\xampp\htdocs\17beststore\modules\wtslideshow\views\templates\admin\slider_option.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5beb20588f3305_50263212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4db4c2d0f2177a357b04dea21ce16b5e35dbc706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\wtslideshow\\views\\templates\\admin\\slider_option.tpl',
      1 => 1541585608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb20588f3305_50263212 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="cs_slider_config_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&configure=wtslideshow&tab_module=front_office_features&module_name=wtslideshow&token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::getAdminTokenLite('AdminModules'),'html','UTF-8' ));?>
" method="post" enctype="multipart/form-data">
<input type="hidden" name="submitSliderConfig" value="1">
<input type="hidden" name="id_wtslideshow_op" id="id_wtslideshow_op" value="1">
<div class="panel" id="fieldset_0">
	<div class="form-wrapper">
	<div class="group layout_properties">
		<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Layout Properties','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
<span class="icon-dropdown"></span></h3>
		<div class="group_content first">
			<div class="form-group">
				<label class="control-label col-lg-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Full Width','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="fullwidth" id="fullwidth_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['fullwidth'] == 'true') {?>checked="checked" <?php }?>>
						<label for="fullwidth_on">Yes</label>
						<input type="radio" name="fullwidth" id="fullwidth_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['fullwidth'] == 'false') {?>checked="checked" <?php }?>>
						<label for="fullwidth_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Width','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="width" name="width" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['width'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Height','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="height" name="height" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['height'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Responsive mode provides optimal viewing experience across a wide range of devices (from desktop to mobile) by adapting and scaling your sliders for the viewing environment.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Responsive','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="responsive" id="responsive_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['responsive'] == 'true') {?>checked="checked" <?php }?>>
						<label for="responsive_on">Yes</label>
						<input type="radio" name="responsive" id="responsive_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['responsive'] == 'false') {?>checked="checked" <?php }?>>
						<label for="responsive_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Turns on responsiveness under a specified value of width. Useful on full width sliders. If using this, the normal responsive property should be set to false!','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'responsiveUnder','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="responsiveUnder" name="responsiveUnder" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['responsiveUnder'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Default 0 (disabled)','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Creates an invisible inner container with the given dimension in pixels to hold and center your layers.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'layersContainer','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="layersContainer" name="layersContainer" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['layersContainer'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Default 0 (disabled)','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'disable on Mobile','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="showmobile" id="showmobile_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['showmobile'] == 'true') {?>checked="checked" <?php }?>>
						<label for="showmobile_on">Yes</label>
						<input type="radio" name="showmobile" id="showmobile_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['showmobile'] == 'false') {?>checked="checked" <?php }?>>
						<label for="showmobile_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
					<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

				</button>
				
			</div>
		</div>	
	</div>
	<div class="group slideshow_properties">
		<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Slideshow properties','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Slideshow will automatically start after pages have loaded.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'AutoStart','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>													
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="autoStart" id="autoStart_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['autoStart'] == 'true') {?> checked="checked" <?php }?>>
						<label for="autoStart_on">Yes</label>
						<input type="radio" name="autoStart" id="autoStart_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['autoStart'] == 'false') {?> checked="checked" <?php }?>>
						<label for="autoStart_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Slideshow will temporally pause when someone moves the mouse cursor over the slider','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PauseOnHover','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>															
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="pauseOnHover" id="pauseOnHover_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['pauseOnHover'] == 'true') {?> checked="checked" <?php }?>>
						<label for="pauseOnHover_on">Yes</label>
						<input type="radio" name="pauseOnHover" id="pauseOnHover_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['pauseOnHover'] == 'false') {?> checked="checked" <?php }?>>
						<label for="pauseOnHover_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The slider will start with the specified slide.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'firstslide','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="firstSlide" name="firstSlide" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['firstSlide'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: A number or "random". Default: 1','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disabling this option will result a static starting slide for the fisrt time on page load','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'animateFirstSlide','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="animateFirstSlide" id="animateFirstSlide_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['animateFirstSlide'] == 'true') {?> checked="checked" <?php }?>>
						<label for="animateFirstSlide_on">Yes</label>
						<input type="radio" name="animateFirstSlide" id="animateFirstSlide_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['animateFirstSlide'] == 'false') {?> checked="checked" <?php }?>>
						<label for="animateFirstSlide_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Number of loops if automatically start slideshow is enabled (0 means infinite!)','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Loops','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="loops" name="loops" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['loops'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: A number. Default: 0','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The slider will always stop at the given number of loops, even if someone restarts slideshow.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'forceLoopNum','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="forceLoopNum" id="forceLoopNum_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['forceLoopNum'] == 'true') {?> checked="checked" <?php }?>>
						<label for="forceLoopNum_on">Yes</label>
						<input type="radio" name="forceLoopNum" id="forceLoopNum_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['forceLoopNum'] == 'false') {?> checked="checked" <?php }?>>
						<label for="forceLoopNum_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Slideshow can go backwards if someone switch to a previous slide.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'towWaySlideshow','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="towWaySlideshow" id="towWaySlideshow_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['towWaySlideshow'] == 'true') {?>checked="checked"<?php }?>>
						<label for="towWaySlideshow_on">Yes</label>
						<input type="radio" name="towWaySlideshow" id="towWaySlideshow_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['towWaySlideshow'] == 'false') {?>checked="checked"<?php }?>>
						<label for="towWaySlideshow_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If true, LayerSlider will change to a random slide.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'randomSlideshow','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="randomSlideshow" id="randomSlideshow_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['randomSlideshow'] == 'true') {?>checked="checked"<?php }?>>
						<label for="randomSlideshow_on">Yes</label>
						<input type="radio" name="randomSlideshow" id="randomSlideshow_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['randomSlideshow'] == 'false') {?>checked="checked"<?php }?>>
						<label for="randomSlideshow_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

				</button>
			</div>
		</div>
	</div>
	<div class="group appearance_properties">
		<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Appearance properties','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can change the skin of the slider. ','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Skin','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="skin" name="skin" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['skin'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value:"skin_name in foder wtslideshow/css/skins". Default: v5','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can change the default path of the skins folder. Note, that you must use the slash at the end of the path.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SkinsPath','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="skinsPath" name="skinsPath" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['skinsPath'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value:"skins_folder_path". Default: views/css/skins/','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Global background color of the slider. Slides with non-transparent background will cover this one.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'GlobalBGColor','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="globalBGColor" name="globalBGColor" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['globalBGColor'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value:"color_name". Default: transparent','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Global background image of the slider.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'GlobalBGImage','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="globalBGImage" id="globalBGImage_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['globalBGImage'] == 'true') {?>checked="checked"<?php }?>>
						<label for="globalBGImage_on">Yes</label>
						<input type="radio" name="globalBGImage" id="globalBGImage_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['globalBGImage'] == 'false') {?>checked="checked"<?php }?>>
						<label for="globalBGImage_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Navigation properties','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disabling this option will hide the Prev and Next buttons.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'navPrevNext','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="navPrevNext" id="navPrevNext_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['navPrevNext'] == 'true') {?>checked="checked"<?php }?>>
						<label for="navPrevNext_on">Yes</label>
						<input type="radio" name="navPrevNext" id="navPrevNext_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['navPrevNext'] == 'false') {?>checked="checked"<?php }?>>
						<label for="navPrevNext_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disabling this option will hide the Start and Stop buttons.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'navStartStop','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="navStartStop" id="navStartStop_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['navStartStop'] == 'true') {?>checked="checked"<?php }?>>
						<label for="navStartStop_on">Yes</label>
						<input type="radio" name="navStartStop" id="navStartStop_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['navStartStop'] == 'false') {?>checked="checked"<?php }?>>
						<label for="navStartStop_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disabling this option will hide slide navigation buttons or thumbnails.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'navButtons','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="navButtons" id="navButtons_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['navButtons'] == 'true') {?>checked="checked"<?php }?>>
						<label for="navButtons_on">Yes</label>
						<input type="radio" name="navButtons" id="navButtons_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['navButtons'] == 'false') {?>checked="checked"<?php }?>>
						<label for="navButtons_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Show the buttons only when someone moves the mouse cursor over the slider. This option depends on the previous setting.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hoverPrevNext','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="hoverPrevNext" id="hoverPrevNext_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['hoverPrevNext'] == 'true') {?>checked="checked"<?php }?>>
						<label for="hoverPrevNext_on">Yes</label>
						<input type="radio" name="hoverPrevNext" id="hoverPrevNext_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['hoverPrevNext'] == 'false') {?>checked="checked"<?php }?>>
						<label for="hoverPrevNext_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Slide navigation buttons (including thumbnails) will be shown on mouse hover only.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'hoverBottomNav','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="hoverBottomNav" id="hoverBottomNav_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['hoverBottomNav'] == 'true') {?>checked="checked"<?php }?>>
						<label for="hoverBottomNav_on">Yes</label>
						<input type="radio" name="hoverBottomNav" id="hoverBottomNav_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['hoverBottomNav'] == 'false') {?>checked="checked"<?php }?>>
						<label for="hoverBottomNav_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can navigate through slides with the left and right arrow keys.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'keybNav','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="keybNav" id="keybNav_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['keybNav'] == 'true') {?>checked="checked"<?php }?>>
						<label for="keybNav_on">Yes</label>
						<input type="radio" name="keybNav" id="keybNav_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['keybNav'] == 'false') {?>checked="checked"<?php }?>>
						<label for="keybNav_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Gesture-based navigation with swiping on touch-enabled devices.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'touchNav','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="touchNav" id="touchNav_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['touchNav'] == 'true') {?>checked="checked"<?php }?>>
						<label for="touchNav_on">Yes</label>
						<input type="radio" name="touchNav" id="touchNav_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['touchNav'] == 'false') {?>checked="checked"<?php }?>>
						<label for="touchNav_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Show the bar timer to indicate slideshow progression. (Not working under IE7 and 8.)','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
""><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'showBarTimer','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="showBarTimer" id="showBarTimer_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['showBarTimer'] == 'true') {?>checked="checked"<?php }?>>
						<label for="showBarTimer_on">Yes</label>
						<input type="radio" name="showBarTimer" id="showBarTimer_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['showBarTimer'] == 'false') {?>checked="checked"<?php }?>>
						<label for="showBarTimer_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use circle timer to indicate slideshow progression.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'showCircleTimer','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="showCircleTimer" id="showCircleTimer_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['showCircleTimer'] == 'true') {?>checked="checked"<?php }?>>
						<label for="showCircleTimer_on">Yes</label>
						<input type="radio" name="showCircleTimer" id="showCircleTimer_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['showCircleTimer'] == 'false') {?>checked="checked"<?php }?>>
						<label for="showCircleTimer_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Type of the thumbnail navigation','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'thumbnailNavigation','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="thumbnailNavigation" name="thumbnailNavigation" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['thumbnailNavigation'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: disabled,hover,always. Default: hover','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The width of the thumbnail container according to the width of the slider.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'tnContainerWidth','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnContainerWidth" name="tnContainerWidth" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['tnContainerWidth'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: "percentage_value". Default: 60%','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The width of the thumbnails in pixels','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'tnWidth','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnWidth" name="tnWidth" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['tnWidth'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: A number. Default: 100','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The height of the thumbnails in pixels','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'tnHeight','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnHeight" name="tnHeight" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['tnHeight'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: A number. Default: 60','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Opacity in percents of thumbnail of the active slide.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'tnActiveOpacity','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnActiveOpacity" name="tnActiveOpacity" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['tnActiveOpacity'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: 0-100. Default: 35','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Opacity in percents of thumbnails of the inactive slides.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'tnInactiveOpacity','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnInactiveOpacity" name="tnInactiveOpacity" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['tnInactiveOpacity'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: 0-100. Default: 100','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Video properties','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Videos (and HTML5 audios) will be automatically started on the active slide.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'autoPlayVideos','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="autoPlayVideos" id="autoPlayVideos_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['autoPlayVideos'] == 'true') {?>checked="checked"<?php }?>>
						<label for="autoPlayVideos_on">Yes</label>
						<input type="radio" name="autoPlayVideos" id="autoPlayVideos_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['autoPlayVideos'] == 'false') {?>checked="checked"<?php }?>>
						<label for="autoPlayVideos_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The slideshow can temporally paused while videos are plaing. You can choose to permanently stop the pause until manual restarting.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'autoPauseSlideshow','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="autoPauseSlideshow" name="autoPauseSlideshow" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['autoPauseSlideshow'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: Auto, true, false. Default: auto','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The preview image quaility for YouTube videos. Note, some videos do not have HD previews, and you may need to choose a lower quaility.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'youtubePreview','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="youtubePreview" name="youtubePreview" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['youtubePreview'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: maxresdefault.jpg, hqdefault.jpg, mqdefault.jpg, default.jpg. Default: hqdefault.jpg','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Image preload properties','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Preloads images used in the next slides for seamless animations.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'imgPreload','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="imgPreload" id="imgPreload_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['imgPreload'] == 'true') {?>checked="checked"<?php }?>>
						<label for="imgPreload_on">Yes</label>
						<input type="radio" name="imgPreload" id="imgPreload_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['imgPreload'] == 'false') {?>checked="checked"<?php }?>>
						<label for="imgPreload_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Loads images only when needed to save bandwidth and server resouces. Relies on the preload feature.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'lazyLoad','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="lazyLoad" id="lazyLoad_on" value="true" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['lazyLoad'] == 'true') {?>checked="checked"<?php }?>>
						<label for="lazyLoad_on">Yes</label>
						<input type="radio" name="lazyLoad" id="lazyLoad_off" value="false" <?php if ($_smarty_tpl->tpl_vars['slier_option']->value['lazyLoad'] == 'false') {?>checked="checked"<?php }?>>
						<label for="lazyLoad_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'YourLogo properties','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A fixed image layer can be shown above the slider that remains still during slide progression. Can be used to display logos or watermarks.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'yourLogo','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogo" name="yourLogo" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['yourLogo'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					 <div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: "image_url" or false. Ex: modules/wtslideshow/img/logo.jpg. Default: false','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'CSS properties to control the image placement and appearance.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'yourLogoStyle','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogoStyle" name="yourLogoStyle" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['yourLogoStyle'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					
                <div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value: CSS properties. Default: left: -10px; top: -10px;','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enter an URL to link the YourLogo image.','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'yourLogoLink','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogoLink" name="yourLogoLink" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['yourLogoLink'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					
                <div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value:"url" or false. Default: false','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'yourLogoTarget','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogoTarget" name="yourLogoTarget" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['slier_option']->value['yourLogoTarget'],'html','UTF-8' ));?>
" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value:"self" or "_blank". Default: _blank','mod'=>'wtslideshow'),$_smarty_tpl ) );?>
</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','mod'=>'wtslideshow'),$_smarty_tpl ) );?>

				</button>
			</div>
		</div>
	</div>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
	$('.group h3').on('click', function()
	{
		$(".group .group_content").slideUp();	
		if(!$(this).next().is(":visible"))
			{
				$(this).next().slideDown();
			}	
	})
<?php echo '</script'; ?>
>
<form><?php }
}
