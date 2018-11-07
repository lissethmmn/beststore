/**
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
*/

(function( $ ) {
	$.fn.lsTransitionPreview = function(options) {

		return this.each( function(){
			if( typeof options === 'string' ){

				var tpData = $(this).data('transitionPreview');

				switch( options ){
					case 'stop':
						tpData.stop();
					break;
				}
			}else{
				new transitionPreview(this, options);
			}
		});
	};

	var transitionPreview = function(el, options){

		var tp = this;
		tp.$el = $(el);
		tp.$el.data('transitionPreview', tp);

		tp.init = function(){

			// Parse settings

			var settings = $.extend({
				width: 300,
				height: 150,
				delay: 100,
				imgPath: '../assets/img/',
				skinPath: '../layerslider/skins/',
				transitionType: '2d',
				transitionObject: null
			}, options );

			// Add slider HTML markup

			$(el).append( $('<div>', { 'class' : 'transitionpreview', 'style' : 'width: '+settings.width+'px; height: '+settings.height+'px;'})
				.append( $('<div>', { 'class' : 'ls-layer', 'data-ls' : 'slidedelay: '+settings.delay+';'})
					.append( $('<img>', { 'src' : ''+settings.imgPath+'sample_slide_1.png', 'class' : 'ls-bg'})))
				.append( $('<div>', { 'class' : 'ls-layer', 'data-ls' : 'slidedelay: '+settings.delay+';'})
					.append( $('<img>', { 'src' : ''+settings.imgPath+'sample_slide_2.png', 'class' : 'ls-bg'})))
			);

			// Initialize the slider

			$(el).find('.transitionpreview').layerSlider({
				showCircleTimer : false,
				pauseOnHover : false,
				skin : 'noskin',
				slidedelay : 100,
				skinsPath : settings.skinsPath,
				slideTransition : {
					type : settings.transitionType,
					obj : settings.transitionObject
				}
			});
		};

		tp.stop = function(){

			$(el).find('.transitionpreview').layerSlider('forceStop').remove();
		};

		tp.init();
	};
}( jQuery ));
