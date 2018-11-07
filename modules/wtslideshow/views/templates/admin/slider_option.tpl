{**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<form id="cs_slider_config_form" class="defaultForm form-horizontal" action="index.php?controller=AdminModules&configure=wtslideshow&tab_module=front_office_features&module_name=wtslideshow&token={Tools::getAdminTokenLite('AdminModules')|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data">
<input type="hidden" name="submitSliderConfig" value="1">
<input type="hidden" name="id_wtslideshow_op" id="id_wtslideshow_op" value="1">
<div class="panel" id="fieldset_0">
	<div class="form-wrapper">
	<div class="group layout_properties">
		<h3>{l s='Layout Properties' mod='wtslideshow'}<span class="icon-dropdown"></span></h3>
		<div class="group_content first">
			<div class="form-group">
				<label class="control-label col-lg-5">{l s='Full Width' mod='wtslideshow'}</label>
				<div class="col-lg-7">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="fullwidth" id="fullwidth_on" value="true" {if $slier_option.fullwidth == 'true'}checked="checked" {/if}>
						<label for="fullwidth_on">Yes</label>
						<input type="radio" name="fullwidth" id="fullwidth_off" value="false" {if $slier_option.fullwidth == 'false'}checked="checked" {/if}>
						<label for="fullwidth_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5">{l s='Width' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="width" name="width" value="{$slier_option.width|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5">{l s='Height' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="height" name="height" value="{$slier_option.height|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Responsive mode provides optimal viewing experience across a wide range of devices (from desktop to mobile) by adapting and scaling your sliders for the viewing environment.' mod='wtslideshow'}">{l s='Responsive' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="responsive" id="responsive_on" value="true" {if $slier_option.responsive == 'true'}checked="checked" {/if}>
						<label for="responsive_on">Yes</label>
						<input type="radio" name="responsive" id="responsive_off" value="false" {if $slier_option.responsive == 'false'}checked="checked" {/if}>
						<label for="responsive_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Turns on responsiveness under a specified value of width. Useful on full width sliders. If using this, the normal responsive property should be set to false!' mod='wtslideshow'}">{l s='responsiveUnder' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="responsiveUnder" name="responsiveUnder" value="{$slier_option.responsiveUnder|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
					<div class="cs-help-block">{l s='Default 0 (disabled)' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Creates an invisible inner container with the given dimension in pixels to hold and center your layers.' mod='wtslideshow'}">{l s='layersContainer' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="layersContainer" name="layersContainer" value="{$slier_option.layersContainer|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="item-unit">px</div>
					<div class="cs-help-block">{l s='Default 0 (disabled)' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5">{l s='disable on Mobile' mod='wtslideshow'}</label>
				<div class="col-lg-7">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="showmobile" id="showmobile_on" value="true" {if $slier_option.showmobile == 'true'}checked="checked" {/if}>
						<label for="showmobile_on">Yes</label>
						<input type="radio" name="showmobile" id="showmobile_off" value="false" {if $slier_option.showmobile == 'false'}checked="checked" {/if}>
						<label for="showmobile_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
					<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
				</button>
				
			</div>
		</div>	
	</div>
	<div class="group slideshow_properties">
		<h3>{l s='Slideshow properties' mod='wtslideshow'}<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Slideshow will automatically start after pages have loaded.' mod='wtslideshow'}">{l s='AutoStart' mod='wtslideshow'}</label>													
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="autoStart" id="autoStart_on" value="true" {if $slier_option.autoStart == 'true'} checked="checked" {/if}>
						<label for="autoStart_on">Yes</label>
						<input type="radio" name="autoStart" id="autoStart_off" value="false" {if $slier_option.autoStart == 'false'} checked="checked" {/if}>
						<label for="autoStart_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Slideshow will temporally pause when someone moves the mouse cursor over the slider' mod='wtslideshow'}">
				{l s='PauseOnHover' mod='wtslideshow'}</label>															
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="pauseOnHover" id="pauseOnHover_on" value="true" {if $slier_option.pauseOnHover == 'true'} checked="checked" {/if}>
						<label for="pauseOnHover_on">Yes</label>
						<input type="radio" name="pauseOnHover" id="pauseOnHover_off" value="false" {if $slier_option.pauseOnHover == 'false'} checked="checked" {/if}>
						<label for="pauseOnHover_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='The slider will start with the specified slide.' mod='wtslideshow'}">{l s='firstslide' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="firstSlide" name="firstSlide" value="{$slier_option.firstSlide|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: A number or "random". Default: 1' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Disabling this option will result a static starting slide for the fisrt time on page load' mod='wtslideshow'}">{l s='animateFirstSlide' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="animateFirstSlide" id="animateFirstSlide_on" value="true" {if $slier_option.animateFirstSlide == 'true'} checked="checked" {/if}>
						<label for="animateFirstSlide_on">Yes</label>
						<input type="radio" name="animateFirstSlide" id="animateFirstSlide_off" value="false" {if $slier_option.animateFirstSlide == 'false'} checked="checked" {/if}>
						<label for="animateFirstSlide_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Number of loops if automatically start slideshow is enabled (0 means infinite!)' mod='wtslideshow'}">{l s='Loops' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="loops" name="loops" value="{$slier_option.loops|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: A number. Default: 0' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='The slider will always stop at the given number of loops, even if someone restarts slideshow.' mod='wtslideshow'}">{l s='forceLoopNum' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="forceLoopNum" id="forceLoopNum_on" value="true" {if $slier_option.forceLoopNum == 'true'} checked="checked" {/if}>
						<label for="forceLoopNum_on">Yes</label>
						<input type="radio" name="forceLoopNum" id="forceLoopNum_off" value="false" {if $slier_option.forceLoopNum == 'false'} checked="checked" {/if}>
						<label for="forceLoopNum_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Slideshow can go backwards if someone switch to a previous slide.' mod='wtslideshow'}">{l s='towWaySlideshow' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="towWaySlideshow" id="towWaySlideshow_on" value="true" {if $slier_option.towWaySlideshow == 'true'}checked="checked"{/if}>
						<label for="towWaySlideshow_on">Yes</label>
						<input type="radio" name="towWaySlideshow" id="towWaySlideshow_off" value="false" {if $slier_option.towWaySlideshow == 'false'}checked="checked"{/if}>
						<label for="towWaySlideshow_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='If true, LayerSlider will change to a random slide.' mod='wtslideshow'}">{l s='randomSlideshow' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="randomSlideshow" id="randomSlideshow_on" value="true" {if $slier_option.randomSlideshow == 'true'}checked="checked"{/if}>
						<label for="randomSlideshow_on">Yes</label>
						<input type="radio" name="randomSlideshow" id="randomSlideshow_off" value="false" {if $slier_option.randomSlideshow == 'false'}checked="checked"{/if}>
						<label for="randomSlideshow_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
				</button>
			</div>
		</div>
	</div>
	<div class="group appearance_properties">
		<h3>{l s='Appearance properties' mod='wtslideshow'}<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='You can change the skin of the slider. ' mod='wtslideshow'}">{l s='Skin' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="skin" name="skin" value="{$slier_option.skin|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value:"skin_name in foder wtslideshow/css/skins". Default: v5' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='You can change the default path of the skins folder. Note, that you must use the slash at the end of the path.' mod='wtslideshow'}">{l s='SkinsPath' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="skinsPath" name="skinsPath" value="{$slier_option.skinsPath|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value:"skins_folder_path". Default: views/css/skins/' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Global background color of the slider. Slides with non-transparent background will cover this one.' mod='wtslideshow'}">{l s='GlobalBGColor' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="globalBGColor" name="globalBGColor" value="{$slier_option.globalBGColor|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value:"color_name". Default: transparent' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Global background image of the slider.' mod='wtslideshow'}">{l s='GlobalBGImage' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="globalBGImage" id="globalBGImage_on" value="true" {if $slier_option.globalBGImage == 'true'}checked="checked"{/if}>
						<label for="globalBGImage_on">Yes</label>
						<input type="radio" name="globalBGImage" id="globalBGImage_off" value="false" {if $slier_option.globalBGImage == 'false'}checked="checked"{/if}>
						<label for="globalBGImage_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3>{l s='Navigation properties' mod='wtslideshow'}<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Disabling this option will hide the Prev and Next buttons.' mod='wtslideshow'}">{l s='navPrevNext' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="navPrevNext" id="navPrevNext_on" value="true" {if $slier_option.navPrevNext == 'true'}checked="checked"{/if}>
						<label for="navPrevNext_on">Yes</label>
						<input type="radio" name="navPrevNext" id="navPrevNext_off" value="false" {if $slier_option.navPrevNext == 'false'}checked="checked"{/if}>
						<label for="navPrevNext_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Disabling this option will hide the Start and Stop buttons.' mod='wtslideshow'}">{l s='navStartStop' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="navStartStop" id="navStartStop_on" value="true" {if $slier_option.navStartStop == 'true'}checked="checked"{/if}>
						<label for="navStartStop_on">Yes</label>
						<input type="radio" name="navStartStop" id="navStartStop_off" value="false" {if $slier_option.navStartStop == 'false'}checked="checked"{/if}>
						<label for="navStartStop_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Disabling this option will hide slide navigation buttons or thumbnails.' mod='wtslideshow'}">{l s='navButtons' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="navButtons" id="navButtons_on" value="true" {if $slier_option.navButtons == 'true'}checked="checked"{/if}>
						<label for="navButtons_on">Yes</label>
						<input type="radio" name="navButtons" id="navButtons_off" value="false" {if $slier_option.navButtons == 'false'}checked="checked"{/if}>
						<label for="navButtons_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Show the buttons only when someone moves the mouse cursor over the slider. This option depends on the previous setting.' mod='wtslideshow'}">{l s='hoverPrevNext' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="hoverPrevNext" id="hoverPrevNext_on" value="true" {if $slier_option.hoverPrevNext == 'true'}checked="checked"{/if}>
						<label for="hoverPrevNext_on">Yes</label>
						<input type="radio" name="hoverPrevNext" id="hoverPrevNext_off" value="false" {if $slier_option.hoverPrevNext == 'false'}checked="checked"{/if}>
						<label for="hoverPrevNext_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Slide navigation buttons (including thumbnails) will be shown on mouse hover only.' mod='wtslideshow'}">{l s='hoverBottomNav' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="hoverBottomNav" id="hoverBottomNav_on" value="true" {if $slier_option.hoverBottomNav == 'true'}checked="checked"{/if}>
						<label for="hoverBottomNav_on">Yes</label>
						<input type="radio" name="hoverBottomNav" id="hoverBottomNav_off" value="false" {if $slier_option.hoverBottomNav == 'false'}checked="checked"{/if}>
						<label for="hoverBottomNav_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='You can navigate through slides with the left and right arrow keys.' mod='wtslideshow'}">{l s='keybNav' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="keybNav" id="keybNav_on" value="true" {if $slier_option.keybNav == 'true'}checked="checked"{/if}>
						<label for="keybNav_on">Yes</label>
						<input type="radio" name="keybNav" id="keybNav_off" value="false" {if $slier_option.keybNav == 'false'}checked="checked"{/if}>
						<label for="keybNav_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Gesture-based navigation with swiping on touch-enabled devices.' mod='wtslideshow'}">{l s='touchNav' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="touchNav" id="touchNav_on" value="true" {if $slier_option.touchNav == 'true'}checked="checked"{/if}>
						<label for="touchNav_on">Yes</label>
						<input type="radio" name="touchNav" id="touchNav_off" value="false" {if $slier_option.touchNav == 'false'}checked="checked"{/if}>
						<label for="touchNav_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Show the bar timer to indicate slideshow progression. (Not working under IE7 and 8.)' mod='wtslideshow'}"">{l s='showBarTimer' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="showBarTimer" id="showBarTimer_on" value="true" {if $slier_option.showBarTimer == 'true'}checked="checked"{/if}>
						<label for="showBarTimer_on">Yes</label>
						<input type="radio" name="showBarTimer" id="showBarTimer_off" value="false" {if $slier_option.showBarTimer == 'false'}checked="checked"{/if}>
						<label for="showBarTimer_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Use circle timer to indicate slideshow progression.' mod='wtslideshow'}">{l s='showCircleTimer' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="showCircleTimer" id="showCircleTimer_on" value="true" {if $slier_option.showCircleTimer == 'true'}checked="checked"{/if}>
						<label for="showCircleTimer_on">Yes</label>
						<input type="radio" name="showCircleTimer" id="showCircleTimer_off" value="false" {if $slier_option.showCircleTimer == 'false'}checked="checked"{/if}>
						<label for="showCircleTimer_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Type of the thumbnail navigation' mod='wtslideshow'}">{l s='thumbnailNavigation' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="thumbnailNavigation" name="thumbnailNavigation" value="{$slier_option.thumbnailNavigation|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: disabled,hover,always. Default: hover' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='The width of the thumbnail container according to the width of the slider.' mod='wtslideshow'}">{l s='tnContainerWidth' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnContainerWidth" name="tnContainerWidth" value="{$slier_option.tnContainerWidth|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: "percentage_value". Default: 60%' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='The width of the thumbnails in pixels' mod='wtslideshow'}">{l s='tnWidth' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnWidth" name="tnWidth" value="{$slier_option.tnWidth|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: A number. Default: 100' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='The height of the thumbnails in pixels' mod='wtslideshow'}">{l s='tnHeight' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnHeight" name="tnHeight" value="{$slier_option.tnHeight|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: A number. Default: 60' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Opacity in percents of thumbnail of the active slide.' mod='wtslideshow'}">{l s='tnActiveOpacity' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnActiveOpacity" name="tnActiveOpacity" value="{$slier_option.tnActiveOpacity|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: 0-100. Default: 35' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Opacity in percents of thumbnails of the inactive slides.' mod='wtslideshow'}">{l s='tnInactiveOpacity' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="tnInactiveOpacity" name="tnInactiveOpacity" value="{$slier_option.tnInactiveOpacity|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: 0-100. Default: 100' mod='wtslideshow'}</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3>{l s='Video properties' mod='wtslideshow'}<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Videos (and HTML5 audios) will be automatically started on the active slide.' mod='wtslideshow'}">{l s='autoPlayVideos' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="autoPlayVideos" id="autoPlayVideos_on" value="true" {if $slier_option.autoPlayVideos == 'true'}checked="checked"{/if}>
						<label for="autoPlayVideos_on">Yes</label>
						<input type="radio" name="autoPlayVideos" id="autoPlayVideos_off" value="false" {if $slier_option.autoPlayVideos == 'false'}checked="checked"{/if}>
						<label for="autoPlayVideos_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='The slideshow can temporally paused while videos are plaing. You can choose to permanently stop the pause until manual restarting.' mod='wtslideshow'}">{l s='autoPauseSlideshow' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="autoPauseSlideshow" name="autoPauseSlideshow" value="{$slier_option.autoPauseSlideshow|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: Auto, true, false. Default: auto' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='The preview image quaility for YouTube videos. Note, some videos do not have HD previews, and you may need to choose a lower quaility.' mod='wtslideshow'}">{l s='youtubePreview' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="youtubePreview" name="youtubePreview" value="{$slier_option.youtubePreview|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value: maxresdefault.jpg, hqdefault.jpg, mqdefault.jpg, default.jpg. Default: hqdefault.jpg' mod='wtslideshow'}</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3>{l s='Image preload properties' mod='wtslideshow'}<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Preloads images used in the next slides for seamless animations.' mod='wtslideshow'}">{l s='imgPreload' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="imgPreload" id="imgPreload_on" value="true" {if $slier_option.imgPreload == 'true'}checked="checked"{/if}>
						<label for="imgPreload_on">Yes</label>
						<input type="radio" name="imgPreload" id="imgPreload_off" value="false" {if $slier_option.imgPreload == 'false'}checked="checked"{/if}>
						<label for="imgPreload_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Loads images only when needed to save bandwidth and server resouces. Relies on the preload feature.' mod='wtslideshow'}">{l s='lazyLoad' mod='wtslideshow'}</label>
				<div class="col-lg-7 ">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="lazyLoad" id="lazyLoad_on" value="true" {if $slier_option.lazyLoad == 'true'}checked="checked"{/if}>
						<label for="lazyLoad_on">Yes</label>
						<input type="radio" name="lazyLoad" id="lazyLoad_off" value="false" {if $slier_option.lazyLoad == 'false'}checked="checked"{/if}>
						<label for="lazyLoad_off">No</label>
						<a class="slide-button btn"></a>
					</span>									
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
				</button>
			</div>
		</div>
	</div>
	<div class="group slideshow_properties">
		<h3>{l s='YourLogo properties' mod='wtslideshow'}<span class="icon-dropdown"></span></h3>
		<div class="group_content">
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='A fixed image layer can be shown above the slider that remains still during slide progression. Can be used to display logos or watermarks.' mod='wtslideshow'}">{l s='yourLogo' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogo" name="yourLogo" value="{$slier_option.yourLogo|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					 <div class="cs-help-block">{l s='Value: "image_url" or false. Ex: modules/wtslideshow/img/logo.jpg. Default: false' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='CSS properties to control the image placement and appearance.' mod='wtslideshow'}" >{l s='yourLogoStyle' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogoStyle" name="yourLogoStyle" value="{$slier_option.yourLogoStyle|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					
                <div class="cs-help-block">{l s='Value: CSS properties. Default: left: -10px; top: -10px;' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label label-tooltip col-lg-5" data-original-title="{l s='Enter an URL to link the YourLogo image.' mod='wtslideshow'}">{l s='yourLogoLink' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogoLink" name="yourLogoLink" value="{$slier_option.yourLogoLink|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					
                <div class="cs-help-block">{l s='Value:"url" or false. Default: false' mod='wtslideshow'}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-5">{l s='yourLogoTarget' mod='wtslideshow'}</label>
				<div class="form-group col-lg-3">
					<input type="text" id="yourLogoTarget" name="yourLogoTarget" value="{$slier_option.yourLogoTarget|escape:'html':'UTF-8'}" onkeyup="if (isArrowKey(event)) return ;updateFriendlyURL();">
					<div class="cs-help-block">{l s='Value:"self" or "_blank". Default: _blank' mod='wtslideshow'}</div>
				</div>
			</div>
			
			<div class="panel-footer">
				<button type="submit" value="1" id="module_form_submit_btn" name="submitSliderConfig" class="btn btn-default pull-center">
				<i class="process-icon-save"></i>{l s='Save' mod='wtslideshow'}
				</button>
			</div>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	$('.group h3').on('click', function()
	{
		$(".group .group_content").slideUp();	
		if(!$(this).next().is(":visible"))
			{
				$(this).next().slideDown();
			}	
	})
</script>
<form>