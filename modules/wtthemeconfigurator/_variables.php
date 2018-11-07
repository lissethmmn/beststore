<?php
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

	$themes_colors = array(
		'default'
	);
	
	$items_settings = array(
		'header_bkg' => array(
			'text' => 'background header',
			'attr_css' => 'color',
			'selector' => array(
				'background-color' =>'#header .header-top',
			),
			'default_val' => '#2a3847',
			'frontend' => true,
		),
		'text_header' => array(
			'text' => 'Text header',
			'attr_css' => 'color',
			'selector' => array(
				'color' =>'.blockcart .header,#header .header-nav .currency-selector .expand-more,#header .header-nav .language-selector .expand-more,#header .header-nav .user-info a,.blockcart a',
			),
			'default_val' => '#fff', 
			'frontend' => true,
		),
		
		'button_search' => array(
			'text' => 'Button search background',
			'attr_css' => 'color',
			'selector' => array(
				'background-color' =>'#search_block_top .btn.button-search',
				),
			'default_val' => '#fff',
			'frontend' => true,
		),
		'color_menu' => array(
			'text' => 'Color text menu',
			'attr_css' => 'color',
			'selector' => array(
				'color' =>'#header .wt-menu-horizontal ul li.level-1 > a',
				),
			'default_val' => '#2a3847',
			'frontend' => true,
		),
		'icon_menu' => array(
			'text' => 'Color icon menu',
			'attr_css' => 'color',
			'selector' => array(
				'color' =>'.wt-menu-horizontal li.level-1 i',
				),
			'default_val' => '#2a3847',
			'frontend' => true,
		),
		'block_title' => array(
			'text' => 'Block title color',
			'attr_css' => 'color',
			'selector' => array(
				'color' =>'.block-categories .text-uppercase,#content-wrapper h1,#page #wt-special-products .title-block a,#page #wt-special-products .title-block span, #page #wt-new-products .title_block,#page .out-content-prod .wt-block-title a,#page .wt_home_filter_product_tab h1',
				),
			'default_val' => '#2a3847',
			'frontend' => true,
		),
		
		'main_color' => array(
			'text' => 'Main color',
			'note' => '',
			'attr_css' => 'color',
			'selector' => array(
				'background-color' =>'#wt-menu-ver-left .category-left .category-title,.wt-button-container .medium-button,.wt-menu-sticky',
				'color' =>'#products .product-title a, .featured-products .product-title a, .product-accessories .product-title a, .product-miniature .product-title a,#wt_subcategory h3,#search_filters .text-uppercase,#header .wt-menu-horizontal ul li.level-1 > a,.wt-special-products ul#wt_special_product li .product-info-container .product-name,.product-name,.wt-prod-cat .list_carousel ul.sub-cat-ul li a,.wt_home_filter_product_tab ul.title-tab li.ui-state-active a ,.wt_home_filter_product_tab ul.title-tab li.ui-tabs-selected a:hover,.wt_home_filter_product_tab ul.title-tab li a:hover', 
				'outline-color' =>'',
				'border-color' =>'',
				
				),
			'default_val' => '#2a3847',
			'frontend' => true,
		),
		'price_color' => array(
			'text' => 'Price color',
			'note' => '',
			'attr_css' => 'color',
			'selector' => array(
				'background-color' =>'',
				'color' =>'.product-price,.product-price-and-shipping .price', 
				'outline-color' =>'',
				'border-color' =>'',
				
				),
			'default_val' => '#324c68',
			'frontend' => true,
		),
		'dark_background_footer' => array(
			'text' => 'Background footer',
			'note' => '',
			'attr_css' => 'color',
			'selector' => array(
				'background-color' =>'.footer-container',
				'color' =>'', 
				'outline-color' =>'',
				'border-color' =>'',
				
				),
			'default_val' => '#2a3847',
			'frontend' => true,
		), 
		'White_color_footer' => array(
			'text' => 'Color footer',
			'note' => '',
			'attr_css' => 'color',
			'selector' => array(
				'background-color' =>'',
				'color' =>'.footer-container li a,.footer-container .links,.copyright a,.footer-container .links .wrapper h3,#blog_latest_new_home h3,.block_newsletter h1,.block_newsletter p', 
				'outline-color' =>'',
				'border-color' =>'',
				
				),
			'default_val' => '#999',
			'frontend' => true,
		),
		'bkg_body' => array(
			'text' => 'Background color of body',
			'note' => 'Support box mode only',
			'attr_css' => 'color',
			'selector' => array(
				'background-color' => 'body',
				'color' =>'', 
				'border-color' =>'',
				
				),
			'default_val' => '#ffffff',
			'frontend' => true,
		),
		'main_menu_font' => array(
			'text' => 'Font item main menu',
			'note' => '',
			'attr_css' => 'font-family',
			'selector' => '#header .wt-menu-horizontal ul li.level-1 > a,#wt-menu-ver-left .category-left li.level-1 > a,#wt-menu-ver-left  ul li.item-header a,#header .wt-menu-horizontal ul li.item-header a',
			'frontend' => true,
		),
		'sub_menu_font' => array(
			'text' => 'Font item sub menu',
			'note' => '',
			'attr_css' => 'font-family',
			'selector' => '#header .wt-menu-horizontal ul li.level-1 ul li a,#wt-menu-ver-left .menu-dropdown li a',
			'frontend' => true,
		),
		'block_title_font' => array(
			'text' => 'Font block title',
			'note' => '',
			'attr_css' => 'font-family',
			'selector' => 'h1,.title-block a,.wt_productscategory h2,.wt_home_filter_product_tab ul.title-tab li.ui-state-active a,.block-categories .text-uppercase,#wt_subcategory h3,.out-content-prod  .wt-block-title a,.sub-cat .sub-cat-ul li a,#wt_category_feature .wt-block-title h3,#wt-menu-ver-left .category-left .category-title,.block .title_block, .block h4,.block_newsletter h1,.footer-container .links .wrapper h3,#block_myaccount_infos .myaccount-title a',
			'frontend' => true,
		),
		'product_name_font' => array(
			'text' => 'Font product name',
			'note' => '',
			'attr_css' => 'font-family',
			'selector' => '.product-name,.product-miniature .product-title a,#content-wrapper h1',
			'frontend' => true,
		),
		'body_font' => array(
			'text' => 'Font of body',
			'note' => 'text desction, link footer,...',
			'attr_css' => 'font-family',
			'selector' => 'body, h2, h4, h5, h6, .h2, .h4, .h5, .h6,.price.product-price,.price,.footer-container #footer a,#subcategories ul li .subcategory-name,.cart_block .cart-buttons a#button_order_cart span,.labels_cart,.table tfoot > tr > td,#cart_summary tfoot td.total_price_container span,#cart_summary tfoot td#total_price_container,.footer-container li a,#wt_cat_featured .content .sub-cat ul li a,.tab-content .product-description,#content-wrapper p',
			'frontend' => true,
		)
	);
