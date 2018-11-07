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

<div class="layer-transitions col-lg-12 clearfix">	
<h3>{l s='Layer transitions' mod='wtslideshow'}</h3>
<div class="layer-transitions-group1 col-lg-6">
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The timing function used for transitions. See easings.net for more information.' mod='wtslideshow'}">easingin</span></label>
		<div class="col-lg-8">
			<select name="params[easingin]" id="easingin" class="style fixed-width-xxl">
				{$layer_easing|escape:'quotes':'UTF-8'}
			</select>
			<p>{l s='A easing_name, See' mod='wtslideshow'} <a href="http://easings.net" target="_blank">easings.net</a> {l s='for more information' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The timing function used for transitions. See easings.net for more information.' mod='wtslideshow'}">easingout</span>
		</label>
		<div class="col-lg-8">
			<select name="params[easingout]" id="easingout" class="style fixed-width-xxl">
				{$layer_easing|escape:'quotes':'UTF-8'}
			</select>
			<p>{l s='A easing_name, See' mod='wtslideshow'} <a href="http://easings.net" target="_blank">easings.net</a> {l s='for more information' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The horizontal offset to align the starting position of layers. Positive and negative numbers are allowed. Set left or right to position layers out of the slider.' mod='wtslideshow'}">offsetxin</span>
		</label>
		<div class="col-lg-8">
			<input type="text" id="offsetxin" name="params[offsetxin]" value="80">
			<p>{l s='Value : left, right or a number (px)' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The horizontal offset to align the starting position of layers. Positive and negative numbers are allowed. Set left or right to position layers out of the slider.' mod='wtslideshow'}">offsetxout</span></label>
		<div class="col-lg-8">
			<input type="text" id="offsetxout" name="params[offsetxout]" value="-80">
			<p>{l s='Value : left, right or a number (px)' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The vertical offset to align the starting position of layers. Positive and negative numbers are allowed. Set top or bottom to position layers out of the slider.' mod='wtslideshow'}">offsetyin</span></label>
		<div class="col-lg-8">
			<input type="text" id="offsetyin" name="params[offsetyin]" value="0">
			<p>{l s='Value : top, bottom or a number (px)' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The vertical offset to align the starting position of layers. Positive and negative numbers are allowed. Set top or bottom to position layers out of the slider.' mod='wtslideshow'}">offsetyout</span>
		</label>
		<div class="col-lg-8">
			<input type="text" id="offsetyout" name="params[offsetyout]" value="0">
			<p>{l s='Value : top, bottom or a number (px)' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='After animating in, the layer will be visible for the time you specify here, then it will animate out. You can use this setting for layers to leave the slide before the slide change or for example before other layers will slide in or out. This value in millisecs, so the value 1000 means 1 second.' mod='wtslideshow'}">Showuntil</span></label>
		<div class="col-lg-8">
			<input type="text" id="showuntil" name="params[showuntil]" value="0">
			<p>{l s='Value : a number (millisecs)' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The duration of layer transitions.' mod='wtslideshow'}">durationin</span></label>
		<div class="col-lg-8">
			<input type="text" id="durationin" name="params[durationin]" value="1000">
			<p>{l s='Value : a number (millisecs)' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='The duration of layer transitions.' mod='wtslideshow'}">durationout</span></label>
		<div class="col-lg-8">
			<input type="text" id="durationout" name="params[durationout]" value="1000">
			<p>{l s='Value : a number (millisecs)' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Fades in / out the layer during the transition.' mod='wtslideshow'}">fadein</span></label>
		<div class="col-lg-8">
			<input type="text" id="fadein" name="params[fadein]" value="true">
			<p>{l s='Value : true, false' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Fades in / out the layer during the transition.' mod='wtslideshow'}">fadeout</span></label>
		<div class="col-lg-8">
			<input type="text" id="fadeout" name="params[fadeout]" value="true">
			<p>{l s='Value : true, false' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='Rotates the layer clockwise from the given angle to zero degree. Negative values are allowed for anticlockwise rotation.' mod='wtslideshow'}">rotatein</span></label>
		<div class="col-lg-8">
			<input type="text" id="rotatein" name="params[rotatein]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Rotates the layer clockwise from the given angle to zero degree. Negative values are allowed for anticlockwise rotation.' mod='wtslideshow'}">rotateout</span></label>
		<div class="col-lg-8">
			<input type="text" id="rotateout" name="params[rotateout]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	
</div>
<div class="layer-transitions-group2 col-lg-6">
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Rotates the layer along the X (horizontal) axis from the given angle to zero degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">rotatexin</span></label>
		<div class="col-lg-8">
			<input type="text" id="rotatexin" name="params[rotatexin]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Rotates the layer along the X (horizontal) axis from the given angle to zero degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">rotatexout</span></label>
		<div class="col-lg-8">
			<input type="text" id="rotatexout" name="params[rotatexout]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Rotates the layer along the Y (vertical) axis from the given angle to zero degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">rotateyin</span></label>
		<div class="col-lg-8">
			<input type="text" id="rotateyin" name="params[rotateyin]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Rotates the layer along the Y (vertical) axis from the given angle to zero degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">rotateyout</span></label>
		<div class="col-lg-8">
			<input type="text" id="rotateyout" name="params[rotateyout]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Scales the of layer width from the given value to its original size.' mod='wtslideshow'}">scalexin</span></label>
		<div class="col-lg-8">
			<input type="text" id="scalexin" name="params[scalexin]" value="1">
			<p>{l s='Value : a number' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Scales the of layer width from the given value to its original size.' mod='wtslideshow'}">scalexout</span></label>
		<div class="col-lg-8">
			<input type="text" id="scalexout" name="params[scalexout]" value="1">
			<p>{l s='Value : a number' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Scales the of layer height from the given value to its original size.' mod='wtslideshow'}">scaleyin</span></label>
		<div class="col-lg-8">
			<input type="text" id="scaleyin" name="params[scaleyin]" value="1">
			<p>{l s='Value : a number' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title="">
		<span class="label-tooltip" data-original-title="{l s='Scales the of layer height from the given value to its original size.' mod='wtslideshow'}">scaleyout</span></label>
		<div class="col-lg-8">
			<input type="text" id="scaleyout" name="params[scaleyout]" value="1">
			<p>{l s='Value : a number' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Skews the layer along the X (horizontal) axis from the given angle to 0 degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">skewxin</span></label>
		<div class="col-lg-8">
			<input type="text" id="skewxin" name="params[skewxin]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Skews the layer along the X (horizontal) axis from the given angle to 0 degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">skewxout</span></label>
		<div class="col-lg-8">
			<input type="text" id="skewxout" name="params[skewxout]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Skews the layer along the Y (vertical) axis from the given angle to 0 degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">skewyin</span></label>
		<div class="col-lg-8">
			<input type="text" id="skewyin" name="params[skewyin]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='Skews the layer along the Y (vertical) axis from the given angle to 0 degree. Negative values are allowed for reverse direction.' mod='wtslideshow'}">skewyout</span></label>
		<div class="col-lg-8">
			<input type="text" id="skewyout" name="params[skewyout]" value="0">
			<p>{l s='Value : a angle' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='This option allows you to modify the origin for transformations of the layer according to its position. The three values represent the X, Y and Z axis in 3D space. OriginX can be left, center, right, a number or a percentage value. OriginY can be top, center, bottom, a number or a percentage value. OriginZ can be a number and corresponds the depth in 3D space.' mod='wtslideshow'}">transformoriginin</span></label>
		<div class="col-lg-8">
			<input type="text" id="transformoriginin" name="params[transformoriginin]" value="50% 50% 0">
			<p>{l s='Value : x y z' mod='wtslideshow'}</p>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-4" title=""><span class="label-tooltip" data-original-title="{l s='This option allows you to modify the origin for transformations of the layer according to its position. The three values represent the X, Y and Z axis in 3D space. OriginX can be left, center, right, a number or a percentage value. OriginY can be top, center, bottom, a number or a percentage value. OriginZ can be a number and corresponds the depth in 3D space.' mod='wtslideshow'}">transformoriginout<span></label>
		<div class="col-lg-8">
			<input type="text" id="transformoriginout" name="params[transformoriginout]" value="50% 50% 0">
			<p>{l s='Value : x y z' mod='wtslideshow'}</p>
		</div>
	</div>
</div>
</div>