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

$sql = array();

/* 1.Table category*/
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_category';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_category(
		id_wt_blog_category int(11) NOT NULL AUTO_INCREMENT,
		category_parent int(11) NULL,
		level_depth int(11) NOT NULL,
		id_shop_default int(10) unsigned NOT NULL,
		date_add datetime NULL,
		active boolean NULL,
		position int(11) NULL,
		allow_comment bool NULL,
		PRIMARY KEY (`id_wt_blog_category`))';

/* 2.Table category_shop */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_category_shop';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_category_shop(
		id_wt_blog_category int(11) NOT NULL AUTO_INCREMENT,
		id_shop int(10) unsigned NOT NULL,
		position int(11) NULL,
		PRIMARY KEY (`id_wt_blog_category`,`id_shop`)
		)';
/* 3.Table category_lang */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_category_lang';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_category_lang(
		id_wt_blog_category int(11) NOT NULL AUTO_INCREMENT,
		id_lang int(11) NOT NULL,
		id_shop int(10) unsigned NOT NULL,
		name nvarchar(500) NOT NULL,
		description nvarchar(2000) NULL,
		meta_title nvarchar(500) NULL,
		meta_description nvarchar(1000) NULL,
		meta_keywords nvarchar(1000) NULL,
		link_rewrite nvarchar(1000) NOT NULL,
		PRIMARY KEY(id_wt_blog_category, id_lang, id_shop)
		)';
/* 4.Table category post */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_category_post';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_category_post(
		id_wt_blog_category int(11) unsigned NOT NULL,
		id_wt_blog_post int(11) unsigned NOT NULL,
		PRIMARY KEY (`id_wt_blog_category`,`id_wt_blog_post`)
		)';

/* 5.Table post */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_post';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_post(
		id_wt_blog_post int(11) NOT NULL AUTO_INCREMENT,
		id_wt_blog_category int(11) NOT NULL,
		id_shop_default int(10) unsigned NOT NULL,
		date_add datetime NULL,
		position int(11) NULL,
		allow_comment boolean NULL,
		active boolean NULL,
		author varchar(255) NULL,
		id_related_posts varchar(255) NULL,
		name_related_posts varchar(4000) NULL,
		PRIMARY KEY(id_wt_blog_post)
		)';

/* 6.Table post_shop */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_post_shop';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_post_shop(
		id_wt_blog_post int(11) NOT NULL AUTO_INCREMENT,
		id_shop int(11) NOT NULL,
		id_wt_blog_category int(11) NOT NULL,
		id_shop_default int(11) NOT NULL,
		date_add datetime NULL,
		position int(11) NULL,
		active boolean NULL,
		related_posts varchar(255) NULL,
		PRIMARY KEY(id_wt_blog_post,id_shop)
		)';
		
/* 7.Table post_lang */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_post_lang';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_post_lang(
		id_wt_blog_post int(11) NOT NULL AUTO_INCREMENT,
		id_lang int(11) NOT NULL,
		id_shop int(11) NOT NULL,
		name nvarchar(2000) NOT NULL,
		description_short text NULL,
		description text NULL,
		meta_title nvarchar(500) NULL,
		meta_description nvarchar(1000) NULL,
		meta_keywords nvarchar(1000) NULL,
		link_rewrite nvarchar(1000) NOT NULL,
		PRIMARY KEY(id_wt_blog_post, id_lang,id_shop)
		)';

/* 8.Table comment */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_comment';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_comment(
		id_wt_blog_comment int(11) NOT NULL AUTO_INCREMENT,
		id_wt_blog_post int(11) NOT NULL,
		id_shop int(11) NOT NULL,
		active boolean NOT NULL,
		author_name nvarchar(100) NULL,
		author_email nvarchar(100) NULL,
		date_add datetime NULL,
		PRIMARY KEY(id_wt_blog_comment)
		)';
		
/* 9.Table comment_lang */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_comment_lang';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_comment_lang(
		id_wt_blog_comment int(11) NOT NULL AUTO_INCREMENT,
		id_lang int(11) NOT NULL,
		title nvarchar(500) NOT NULL,
		content text NOT NULL,
		PRIMARY KEY(id_wt_blog_comment, id_lang)
		)';

/* 10.Table post_tag */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_post_tag';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_post_tag(
		id_wt_blog_post int(11) NOT NULL,
		id_wt_blog_tag int(11) NOT NULL,
		PRIMARY KEY (id_wt_blog_post, id_wt_blog_tag))';

/* 11.Table blog_tag */
$sql[] = 'DROP TABLE IF EXISTS '._DB_PREFIX_.'wt_blog_tag';
$sql[] = 'CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'wt_blog_tag(
		id_wt_blog_tag int(11) NOT NULL AUTO_INCREMENT,
		id_lang int(11) NOT NULL,
		name nvarchar(500) NOT NULL,
		PRIMARY KEY(id_wt_blog_tag))';
?>