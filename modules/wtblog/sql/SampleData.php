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
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class SampleDataBlog
{
	public function installConfiguration($id_shop = null)
	{
		$image = 'home_'.'default';
		Configuration::updateValue('WT_MAIN_BLOG_URL', 'wtblog');
		Configuration::updateValue('WT_SHOW_BLOCK_CATEGORY', 1);
		Configuration::updateValue('WT_DISPLAY_CATEGORY', 'displayLeftColumn');
		Configuration::updateValue('BLOCK_CATEG_DHTML', 1);
		Configuration::updateValue('WT_SHOW_BLOCK_TAG', 1);
		Configuration::updateValue('WT_DISPLAY_TAG', 'displayLeftColumn');
		Configuration::updateValue('WT_NUMBER_TAG_DISPLAYED', 10);
		Configuration::updateValue('WT_COMMENTS_VALIDATE', 0);	
		Configuration::updateValue('WT_ALLOW_COMMENTS_BY_GUESTS', '1');
		Configuration::updateValue('WT_DISPLAY_CAPTCHA', '1');
		Configuration::updateValue('WT_ALLOW_RELATED_POSTS', '1');
		Configuration::updateValue('WT_IMAGE_SIZE_RELATED_POSTS', 'none');
		Configuration::updateValue('WT_ALLOW_RELATED_PRODUCTS', '1');
		Configuration::updateValue('WT_IMAGE_SIZE_RELATED_PRODUCT', $image);
		Configuration::updateValue('WT_ALLOW_CATEGORY_IMAGE', '1');
		Configuration::updateValue('WT_ALLOW_CATEGORY_DESCRIPTION', '1');
		Configuration::updateValue('WT_SHOW_BLOCK_LASTEST', 1);
		Configuration::updateValue('WT_LASTEST_POST', 'displayLeftColumn');
		Configuration::updateValue('WT_OP_LASTEST_POST', 5);
		Configuration::updateValue('WT_TBEP_SHOW', '1');
		Configuration::updateValue('WT_IMEP_SHOW', 'none');
		Configuration::updateValue('WT_IMIPD_SHOW', 'large');
		Configuration::updateValue('WT_IMEP_LIST_SHOW', 'medium');
		Configuration::updateValue('WT_COLP_MAXIMUM', 150);
		Configuration::updateValue('WT_B_SUMMARY_CHARACTER_COUNT', 250);
		Configuration::updateValue('WT_POSTS_PER_PAGE', 10);
		Configuration::updateValue('WT_NUM_RELATED_POSTS', 5);
		Configuration::updateValue('WT_NUM_RELATED_PRODUCTS', 5);
		Configuration::updateValue('WT_IMG_SMALL_SIZE', 590);
		Configuration::updateValue('WT_IMG_SMALL_H_SIZE', 330);
		Configuration::updateValue('WT_IMG_MEDIUM_SIZE', 688);
		Configuration::updateValue('WT_IMG_MEDIUM_H_SIZE', 385);
		Configuration::updateValue('WT_IMG_LARGE_SIZE', 1456);
		Configuration::updateValue('WT_IMG_LARGE_H_SIZE', 816);
		Configuration::updateValue('WT_IMG_CATEGORY_SIZE', 880);
		Configuration::updateValue('WT_IMG_CATEGORY_H_SIZE', 881);
		Configuration::updateValue('WT_SHOW_BLOCK_CURRENT_COMMENT', 1);
		Configuration::updateValue('WT_POSITION_CURRENT_COMMENT', 'displayLeftColumn');
		Configuration::updateValue('WT_NUMBER_CURRENT_COMMENT', 5);
		Configuration::updateValue('WT_COMMENT_SIZE_IMAGE_POST', 'none');
		Configuration::updateValue('WT_NUMBER_COMMENT_DETAIL', 5);
		Configuration::updateValue('CATEGORY_RSS_NUMBER', 10);
		Configuration::updateValue('BLOCK_CATEG_DISPLAY_PAGE', 1);
		Configuration::updateValue('WT_TAG_DISPLAY_PAGE', 1);
		Configuration::updateValue('LASTEST_POST_DISPLAY_PAGE', 1);
		Configuration::updateValue('CURRENT_COMMENT_DISPLAY_PAGE', 1);
	}
	public function initData()
	{
		$return = true;
		$languages = Language::getLanguages(true);
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		$timezone = date('Y-m-d H:i:s');
		$post_title = 'Praesent efficitur aliquet tembitr acest';
		$link_rewrite = Tools::strtolower(str_replace(' ', '-', $post_title));
		$post_description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel quam vel leo pellentesque suscipit. Maecenas at nisi diam. Suspendisse purus ex, venenatis quis velit consectetur, dapibus bibendum velit. Duis et efficitur nibh. Integer egestas ipsum diam, sed faucibus felis commodo quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae dictum odio. Vestibulum vitae risus et nisi mattis ultricies sed id mauris. Aenean porta ante ac elit tincidunt vulputate. Nullam faucibus malesuada libero, ut rutrum mauris luctus ut.</p>';
		$description_short = '<p>Phasellus vulputate, neque aliquam luctus dictum sapien dictum eame dictum sapien purus condim gsdgentum raesent eu turpis faucibus, porta lectus sit amet, tempor leo. Nunc et sapien ac neque sceleri gre sque condimentum nec non justo. Etiam suscipit massaerat.</p>';
		$cat_description = '';
		/*insert db default*/
		if (!Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_category` (`id_wt_blog_category`, `category_parent`, `level_depth`, `id_shop_default`, `date_add`, `active`, `position`, `allow_comment`) VALUES 
			(2, 1, 0, 1, "'.$timezone.'", 1, 1, 1),
			(3, 1, 1, 1, "'.$timezone.'", 1, 2, 1),
			(4, 1, 1, 1, "'.$timezone.'", 1, 3, 1)
			;'
			) || !Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_category_shop` (`id_wt_blog_category`, `id_shop`, `position`) VALUES 
			(2, "'.$id_shop.'", 1),
			(3, "'.$id_shop.'", 2),
			(4, "'.$id_shop.'", 3)
			;') || !Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_category_post` (`id_wt_blog_category`, `id_wt_blog_post`) VALUES 
			(1, 1),
			(1, 2),
			(1, 3),
			(2, 1),
			(2, 2),
			(2, 3),
			(3, 1),
			(3, 2),
			(3, 3),
			(4, 1),
			(4, 2),
			(4, 3),
			(1, 4),
			(2, 4),
			(3, 4),
			(4, 4);') || !Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_comment` (`id_wt_blog_comment`, `id_wt_blog_post`, `id_shop`, `active`, `author_name`, `author_email`, `date_add`) VALUES 
			(1, 2, "'.$id_shop.'", 1, "UserDemo", "demo@gmail.com", "'.$timezone.'"),
			(2, 2, "'.$id_shop.'", 1, "UserDemo", "demo@gmail.com", "'.$timezone.'")
			;') || !Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_post` (`id_wt_blog_post`, `id_wt_blog_category`, `id_shop_default`, `date_add`, `position`, `allow_comment`, `active`, `author`, `id_related_posts`, `name_related_posts`) VALUES
			(1, 2, 1, "'.$timezone.'", 1, 1, 1, "1", "", ""),
			(2, 2, 1, "'.$timezone.'", 1, 1, 1, "1", "", ""),
			(3, 2, 1, "'.$timezone.'", 2, 1, 1, "1", "1-2-", "At vero eos et accusamus et iusto odio dignissimos (id - 1)¤Ducimus qui blanditiis praesentium voluptatum (id - 2)¤"),
			(4, 2, 1, "'.$timezone.'", 1, 1, 1, "1", "", "")
			;') || !Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_post_shop` (`id_wt_blog_post`, `id_shop`, `id_wt_blog_category`, `id_shop_default`, `date_add`, `position`, `active`, `related_posts`) VALUES
			(1, "'.$id_shop.'", 0, 0, NULL, 1, 1, NULL),
			(2, "'.$id_shop.'", 0, 0, NULL, 1, 1, NULL),
			(3, "'.$id_shop.'", 0, 0, NULL, 2, 1, NULL),
			(4, "'.$id_shop.'", 0, 0, NULL, 2, 1, NULL)
			;') || !Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_post_tag` (`id_wt_blog_post`, `id_wt_blog_tag`) VALUES
			(1, 1),
			(1, 2),
			(2, 3)
			;'))
			return false;
		foreach ($languages as $language)
		{
			$return &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_category_lang` (`id_wt_blog_category`, `id_lang`, `id_shop`, `name`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `link_rewrite`) VALUES 
			(2, "'.$language['id_lang'].'", "'.$id_shop.'", "Category 1", "'.$cat_description.'", "", "", "", "category-1"),
			(3, "'.$language['id_lang'].'", "'.$id_shop.'", "Category 2", "'.$cat_description.'", "", "", "", "category-2"),
			(4, "'.$language['id_lang'].'", "'.$id_shop.'", "Category 3", "'.$cat_description.'", "", "", "", "category-3");');
			$return &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_comment_lang` (`id_wt_blog_comment`, `id_lang`, `title`, `content`) VALUES 
			(1, "'.$language['id_lang'].'", "Title content", "Nunc consequat auctor neque, ut laoreet augue rhoncus viverra. Maecenas consequat, augue at euismod quam eros egestas magna, laoreet lobortis odio mauris et sem. Cras pharetra dui sodales venenatis consequat. Suspendisse eget dictum tellus"),
			(2, "'.$language['id_lang'].'",  "Title content", "Nunc consequat auctor neque, ut laoreet augue rhoncus viverra. Maecenas consequat, augue at euismod quam eros egestas magna, laoreet lobortis odio mauris et sem. Cras pharetra dui sodales venenatis consequat. Suspendisse eget dictum tellus");');
			$return &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_post_lang` (`id_wt_blog_post`, `id_lang`, `id_shop`, `name`, `description_short`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `link_rewrite`) VALUES
			(1, "'.$language['id_lang'].'", "'.$id_shop.'", "'.pSQL($post_title).'", "'.pSQL($description_short).'", "'.pSQL($post_description).'", "", "", "", "'.pSQL($link_rewrite).'"),
			(2, "'.$language['id_lang'].'", "'.$id_shop.'", "'.pSQL($post_title).'", "'.pSQL($description_short).'", "'.pSQL($post_description).'", "", "", "", "'.pSQL($link_rewrite).'"),
			(3, "'.$language['id_lang'].'", "'.$id_shop.'", "'.pSQL($post_title).'", "'.pSQL($description_short).'", "'.pSQL($post_description).'", "", "", "","'.pSQL($link_rewrite).'"),
			(4, "'.$language['id_lang'].'", "'.$id_shop.'", "'.pSQL($post_title).'", "'.pSQL($description_short).'", "'.pSQL($post_description).'", "", "", "", "'.pSQL($link_rewrite).'")
			;');
			$return &= Db::getInstance()->Execute('INSERT INTO `'._DB_PREFIX_.'wt_blog_tag` (`id_wt_blog_tag`, `id_lang`, `name`) VALUES
			(NULL, "'.$language['id_lang'].'", "tag 1"),
			(NULL, "'.$language['id_lang'].'", "tag 2"),
			(NULL, "'.$language['id_lang'].'", "tag 3");');
		}
		return $return;
	}
}