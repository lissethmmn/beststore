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

class SampleDataVMenu
{
	public function initData()
	{
		$return = true;
		$languages = Language::getLanguages(true);
		$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu` (`id_wtverticalmegamenu`, `type_link`, `dropdown`, `type_icon`, `icon`, `align_sub`, `width_sub`, `class`, `active`) VALUES 
		(1, 0, 0, 0, "1c65a23956664a6fb291038ff8aabf02fd2d58b3_1.png", "wt-vm-sub-top", "12", "menu-camera", 1),
		(2, 0, 0, 0, "9df98fba7e60b23b410b9c0acee0586a6d9c699f_7.png", "wt-vm-sub-top", "12", "phone_banner", 1),
		(3, 0, 0, 0, "88a07fbc6fb6001ae3079d66ae558a569f0756cf_5.png", "wt-vm-sub-top", "12", "headphone_banner", 1),
		(4, 0, 0, 0, "663ee1a60acca5e813b946af111ab7976127b8b9_6.png", "wt-vm-sub-top", "12", "", 1),
		(5, 0, 0, 0, "7703f51a5c2ad8da45fa3753dc0a4a60f8db3792_2.png", "wt-vm-sub-top", "12", "", 1),
		(6, 0, 1, 0, "46864eb3b60d8cd36fd18eaf9fce8420c3fdce14_3.png", "wt-vm-sub-top", "9", "", 1),
		(7, 0, 0, 0, "f509db8d99df847f7da4890c0c40bcf6f75dd538_4.png", "wt-vm-sub-auto", "9", "", 1),
		(8, 0, 0, 0, "e725ff0b753e50f0b7c5b179d5360540fbc01fdd_Untitled-1.png", "wt-vm-sub-auto", "12", "", 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_shop` (`id_wtverticalmegamenu`, `id_shop`, `type_link`, `dropdown`, `type_icon`, `icon`, `align_sub`, `width_sub`, `class`, `active`) VALUES
		(1, '.$id_shop.', 0, 0, 0, "1c65a23956664a6fb291038ff8aabf02fd2d58b3_1.png", "wt-vm-sub-top", "12", "menu-camera", 1),
		(2, '.$id_shop.', 0, 0, 0, "9df98fba7e60b23b410b9c0acee0586a6d9c699f_7.png", "wt-vm-sub-top", "12", "phone_banner", 1),
		(3, '.$id_shop.', 0, 0, 0, "88a07fbc6fb6001ae3079d66ae558a569f0756cf_5.png", "wt-vm-sub-top", "12", "headphone_banner", 1),
		(4, '.$id_shop.', 0, 0, 0, "663ee1a60acca5e813b946af111ab7976127b8b9_6.png", "wt-vm-sub-top", "12", "", 1),
		(5, '.$id_shop.', 0, 0, 0, "7703f51a5c2ad8da45fa3753dc0a4a60f8db3792_2.png", "wt-vm-sub-top", "12", "", 1),
		(6, '.$id_shop.', 0, 1, 0, "46864eb3b60d8cd36fd18eaf9fce8420c3fdce14_3.png", "wt-vm-sub-auto", "9", "", 1),
		(7, '.$id_shop.', 0, 0, 0, "f509db8d99df847f7da4890c0c40bcf6f75dd538_4.png", "wt-vm-sub-auto", "9", "", 1),
		(8, '.$id_shop.', 0, 0, 0, "e725ff0b753e50f0b7c5b179d5360540fbc01fdd_Untitled-1.png", "wt-vm-sub-auto", "12", "", 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_row` (`id_row`, `id_wtverticalmegamenu`, `class`, `active`) VALUES 
		(1, 2, "", 1),
		(2, 3, "", 1),
		(3, 4, "", 1),
		(4, 5, "", 1),
		(5, 1, "", 1),
		(6, 1, "", 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_row_shop` (`id_row`, `id_wtverticalmegamenu`, `id_shop`, `class`, `active`) VALUES
		(1, 2, '.$id_shop.', "", 1),
		(2, 3, '.$id_shop.', "", 1),
		(3, 4, '.$id_shop.', "", 1),
		(4, 5, '.$id_shop.', "", 1),
		(5, 1, '.$id_shop.', "", 1),
		(6, 1, '.$id_shop.', "", 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_column` (`id_column`, `id_row`, `width`, `class`, `active`) VALUES 
		(1, 1, "col-sm-3", "", 1),
		(2, 1, "col-sm-3", "", 1),
		(3, 1, "col-sm-3", "smartphone-menuleft", 1),
		(10, 4, "col-sm-3", "", 1),
		(11, 4, "col-sm-3", "", 1),
		(13, 5, "col-sm-3", "", 1),
		(14, 5, "col-sm-3", "", 1),
		(24, 6, "col-sm-3", "", 1),
		(25, 6, "col-sm-3", "", 1),
		(26, 2, "col-sm-3", "", 1),
		(27, 2, "col-sm-3", "", 1),
		(28, 2, "col-sm-3", "", 1),
		(29, 3, "col-sm-3", "", 1),
		(30, 3, "col-sm-3", "", 1),
		(31, 3, "col-sm-3", "", 1),
		(32, 3, "col-sm-3", "", 1),
		(33, 4, "col-sm-3", "", 1),
		(34, 4, "col-sm-3", "", 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_column_shop` (`id_column`, `id_row`, `id_shop`, `width`, `class`, `active`) VALUES
		(1, 1, '.$id_shop.', "col-sm-3", "", 1),
		(2, 1, '.$id_shop.', "col-sm-3", "", 1),
		(3, 1, '.$id_shop.', "col-sm-3", "smartphone-menuleft", 1),
		(10, 4, '.$id_shop.', "col-sm-3", "", 1),
		(11, 4, '.$id_shop.', "col-sm-3", "", 1),
		(13, 5, '.$id_shop.', "col-sm-3", "", 1),
		(14, 5, '.$id_shop.', "col-sm-3", "", 1),
		(24, 6, '.$id_shop.', "col-sm-3", "", 1),
		(25, 6, '.$id_shop.', "col-sm-3", "", 1),
		(26, 2, '.$id_shop.', "col-sm-3", "", 1),
		(27, 2, '.$id_shop.', "col-sm-3", "", 1),
		(28, 2, '.$id_shop.', "col-sm-3", "", 1),
		(29, 3, '.$id_shop.', "col-sm-3", "", 1),
		(30, 3, '.$id_shop.', "col-sm-3", "", 1),
		(31, 3, '.$id_shop.', "col-sm-3", "", 1),
		(32, 3, '.$id_shop.', "col-sm-3", "", 1),
		(33, 4, '.$id_shop.', "col-sm-3", "", 1),
		(34, 4, '.$id_shop.', "col-sm-3", "", 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_item` (`id_item`, `id_column`, `type_link`, `type_item`, `id_product`, `active`) VALUES 
		(2, 2, 1, "1", 0, 1),
		(14, 2, 1, "2", 0, 1),
		(15, 2, 1, "2", 0, 1),
		(16, 2, 1, "2", 0, 1),
		(17, 2, 1, "2", 0, 1),
		(18, 2, 1, "2", 0, 1),
		(19, 2, 1, "2", 0, 1),
		(20, 2, 1, "2", 0, 1),
		(21, 2, 1, "2", 0, 1),
		(22, 2, 1, "2", 0, 1),
		(23, 2, 1, "2", 0, 1),
		(49, 10, 1, "1", 0, 1),
		(50, 10, 1, "2", 0, 1),
		(51, 10, 1, "2", 0, 1),
		(52, 10, 1, "2", 0, 1),
		(53, 10, 1, "2", 0, 1),
		(54, 10, 1, "2", 0, 1),
		(55, 10, 1, "2", 0, 1),
		(56, 10, 1, "2", 0, 1),
		(57, 10, 1, "2", 0, 1),
		(58, 10, 1, "2", 0, 1),
		(59, 10, 1, "2", 0, 1),
		(60, 11, 1, "1", 0, 1),
		(61, 11, 1, "2", 0, 1),
		(62, 11, 1, "2", 0, 1),
		(63, 11, 1, "2", 0, 1),
		(64, 11, 1, "2", 0, 1),
		(65, 11, 1, "2", 0, 1),
		(66, 11, 1, "2", 0, 1),
		(67, 11, 1, "2", 0, 1),
		(68, 11, 1, "2", 0, 1),
		(71, 13, 1, "1", 0, 1),
		(72, 13, 1, "2", 0, 1),
		(74, 13, 1, "2", 0, 1),
		(76, 13, 1, "2", 0, 1),
		(77, 13, 1, "2", 0, 1),
		(78, 13, 1, "2", 0, 1),
		(79, 14, 1, "1", 0, 1),
		(80, 14, 1, "2", 0, 1),
		(81, 14, 1, "2", 0, 1),
		(82, 14, 1, "2", 0, 1),
		(84, 14, 1, "2", 0, 1),
		(85, 14, 1, "2", 0, 1),
		(115, 24, 1, "1", 0, 1),
		(116, 24, 1, "2", 0, 1),
		(117, 24, 1, "2", 0, 1),
		(118, 24, 1, "2", 0, 1),
		(119, 13, 1, "2", 0, 1),
		(120, 14, 1, "2", 0, 1),
		(121, 24, 1, "2", 0, 1),
		(122, 24, 1, "2", 0, 1),
		(124, 25, 1, "1", 0, 1),
		(125, 25, 1, "2", 0, 1),
		(126, 25, 1, "2", 0, 1),
		(127, 25, 1, "2", 0, 1),
		(128, 25, 1, "2", 0, 1),
		(129, 25, 1, "2", 0, 1),
		(131, 2, 1, "2", 0, 1),
		(132, 2, 1, "2", 0, 1),
		(133, 1, 1, "1", 39, 1),
		(134, 1, 4, "1", 40, 1),
		(135, 3, 1, "1", 0, 1),
		(136, 3, 1, "2", 0, 1),
		(137, 3, 1, "2", 0, 1),
		(138, 3, 1, "2", 0, 1),
		(139, 3, 1, "2", 0, 1),
		(140, 3, 1, "2", 0, 1),
		(141, 3, 1, "2", 0, 1),
		(142, 3, 1, "2", 0, 1),
		(143, 3, 1, "2", 0, 1),
		(144, 3, 1, "2", 0, 1),
		(145, 3, 1, "2", 0, 1),
		(146, 3, 1, "2", 0, 1),
		(147, 3, 1, "2", 0, 1),
		(148, 1, 4, "1", 2, 1),
		(149, 26, 1, "1", 0, 1),
		(150, 26, 1, "2", 0, 1),
		(151, 26, 1, "2", 0, 1),
		(152, 26, 1, "2", 0, 1),
		(153, 26, 1, "2", 0, 1),
		(154, 26, 1, "2", 0, 1),
		(155, 26, 1, "2", 0, 1),
		(156, 26, 1, "2", 0, 1),
		(157, 26, 1, "2", 0, 1),
		(158, 26, 1, "2", 0, 1),
		(159, 26, 1, "2", 0, 1),
		(160, 26, 1, "2", 0, 1),
		(161, 26, 1, "2", 0, 1),
		(162, 27, 1, "1", 0, 1),
		(163, 27, 1, "2", 0, 1),
		(164, 27, 1, "2", 0, 1),
		(165, 27, 1, "2", 0, 1),
		(166, 27, 1, "2", 0, 1),
		(167, 27, 1, "2", 0, 1),
		(168, 27, 1, "2", 0, 1),
		(169, 27, 1, "2", 0, 1),
		(170, 27, 1, "2", 0, 1),
		(171, 27, 1, "2", 0, 1),
		(172, 27, 1, "2", 0, 1),
		(173, 27, 1, "2", 0, 1),
		(174, 27, 1, "2", 0, 1),
		(175, 28, 1, "1", 0, 1),
		(176, 28, 1, "2", 0, 1),
		(177, 28, 1, "2", 0, 1),
		(178, 28, 1, "2", 0, 1),
		(179, 28, 1, "2", 0, 1),
		(180, 28, 1, "2", 0, 1),
		(181, 28, 1, "2", 0, 1),
		(182, 28, 1, "2", 0, 1),
		(183, 28, 1, "2", 0, 1),
		(184, 28, 1, "2", 0, 1),
		(185, 28, 1, "2", 0, 1),
		(186, 28, 1, "2", 0, 1),
		(187, 28, 1, "2", 0, 1),
		(188, 28, 1, "2", 0, 1),
		(189, 29, 1, "1", 0, 1),
		(190, 29, 1, "2", 0, 1),
		(191, 29, 1, "2", 0, 1),
		(192, 29, 1, "2", 0, 1),
		(193, 29, 1, "2", 0, 1),
		(194, 29, 1, "2", 0, 1),
		(195, 30, 1, "1", 0, 1),
		(196, 30, 1, "2", 0, 1),
		(197, 30, 1, "2", 0, 1),
		(198, 30, 1, "2", 0, 1),
		(199, 30, 1, "2", 0, 1),
		(200, 30, 1, "2", 0, 1),
		(201, 31, 1, "1", 0, 1),
		(202, 31, 1, "2", 0, 1),
		(203, 31, 1, "2", 0, 1),
		(204, 31, 1, "2", 0, 1),
		(205, 31, 1, "2", 0, 1),
		(206, 31, 1, "2", 0, 1),
		(207, 32, 1, "1", 0, 1),
		(208, 32, 1, "2", 0, 1),
		(209, 32, 1, "2", 0, 1),
		(210, 32, 1, "2", 0, 1),
		(211, 32, 1, "2", 0, 1),
		(212, 32, 1, "2", 0, 1),
		(213, 10, 3, "1", 0, 1),
		(215, 33, 1, "1", 0, 1),
		(216, 33, 1, "2", 0, 1),
		(217, 33, 1, "2", 0, 1),
		(218, 33, 1, "2", 0, 1),
		(219, 33, 1, "2", 0, 1),
		(220, 33, 1, "2", 0, 1),
		(221, 33, 1, "2", 0, 1),
		(222, 33, 1, "2", 0, 1),
		(223, 33, 1, "2", 0, 1),
		(224, 33, 1, "2", 0, 1),
		(225, 33, 1, "2", 0, 1),
		(226, 33, 3, "1", 0, 1),
		(227, 34, 1, "1", 0, 1),
		(228, 34, 1, "2", 0, 1),
		(229, 34, 1, "2", 0, 1),
		(230, 34, 1, "2", 0, 1),
		(231, 34, 1, "2", 0, 1),
		(232, 34, 1, "2", 0, 1),
		(233, 34, 1, "2", 0, 1),
		(234, 34, 1, "2", 0, 1),
		(235, 34, 1, "2", 0, 1),
		(236, 34, 1, "2", 0, 1),
		(237, 34, 1, "2", 0, 1),
		(238, 34, 3, "1", 0, 1),
		(239, 11, 1, "2", 0, 1),
		(240, 11, 1, "2", 0, 1),
		(241, 11, 3, "1", 0, 1);');
		
		$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_item_shop` (`id_item`, `id_column`, `id_shop`, `type_link`, `type_item`, `id_product`, `active`) VALUES
		(2, 2, '.$id_shop.', 1, "1", 0, 1),
		(14, 2, '.$id_shop.', 1, "2", 0, 1),
		(15, 2, '.$id_shop.', 1, "2", 0, 1),
		(16, 2, '.$id_shop.', 1, "2", 0, 1),
		(17, 2, '.$id_shop.', 1, "2", 0, 1),
		(18, 2, '.$id_shop.', 1, "2", 0, 1),
		(19, 2, '.$id_shop.', 1, "2", 0, 1),
		(20, 2, '.$id_shop.', 1, "2", 0, 1),
		(21, 2, '.$id_shop.', 1, "2", 0, 1),
		(22, 2, '.$id_shop.', 1, "2", 0, 1),
		(23, 2, '.$id_shop.', 1, "2", 0, 1),
		(25, 4, '.$id_shop.', 3, "1", 0, 1),
		(37, 7, '.$id_shop.', 1, "1", 0, 1),
		(38, 7, '.$id_shop.', 1, "2", 0, 1),
		(39, 7, '.$id_shop.', 1, "2", 0, 1),
		(40, 7, '.$id_shop.', 1, "2", 0, 1),
		(41, 7, '.$id_shop.', 1, "2", 0, 1),
		(42, 7, '.$id_shop.', 1, "2", 0, 1),
		(43, 7, '.$id_shop.', 1, "2", 0, 1),
		(44, 7, '.$id_shop.', 1, "2", 0, 1),
		(45, 7, '.$id_shop.', 1, "2", 0, 1),
		(46, 7, '.$id_shop.', 1, "2", 0, 1),
		(47, 8, '.$id_shop.', 3, "1", 0, 1),
		(49, 10, '.$id_shop.', 1, "1", 0, 1),
		(50, 10, '.$id_shop.', 1, "2", 0, 1),
		(51, 10, '.$id_shop.', 1, "2", 0, 1),
		(52, 10, '.$id_shop.', 1, "2", 0, 1),
		(53, 10, '.$id_shop.', 1, "2", 0, 1),
		(54, 10, '.$id_shop.', 1, "2", 0, 1),
		(55, 10, '.$id_shop.', 1, "2", 0, 1),
		(56, 10, '.$id_shop.', 1, "2", 0, 1),
		(57, 10, '.$id_shop.', 1, "2", 0, 1),
		(58, 10, '.$id_shop.', 1, "2", 0, 1),
		(59, 10, '.$id_shop.', 1, "2", 0, 1),
		(60, 11, '.$id_shop.', 1, "1", 0, 1),
		(61, 11, '.$id_shop.', 1, "2", 0, 1),
		(62, 11, '.$id_shop.', 1, "2", 0, 1),
		(63, 11, '.$id_shop.', 1, "2", 0, 1),
		(64, 11, '.$id_shop.', 1, "2", 0, 1),
		(65, 11, '.$id_shop.', 1, "2", 0, 1),
		(66, 11, '.$id_shop.', 1, "2", 0, 1),
		(67, 11, '.$id_shop.', 1, "2", 0, 1),
		(68, 11, '.$id_shop.', 1, "2", 0, 1),
		(70, 12, '.$id_shop.', 3, "1", 0, 1),
		(71, 13, '.$id_shop.', 1, "1", 0, 1),
		(72, 13, '.$id_shop.', 1, "2", 0, 1),
		(74, 13, '.$id_shop.', 1, "2", 0, 1),
		(76, 13, '.$id_shop.', 1, "2", 0, 1),
		(77, 13, '.$id_shop.', 1, "2", 0, 1),
		(78, 13, '.$id_shop.', 1, "2", 0, 1),
		(79, 14, '.$id_shop.', 1, "1", 0, 1),
		(80, 14, '.$id_shop.', 1, "2", 0, 1),
		(81, 14, '.$id_shop.', 1, "2", 0, 1),
		(82, 14, '.$id_shop.', 1, "2", 0, 1),
		(84, 14, '.$id_shop.', 1, "2", 0, 1),
		(85, 14, '.$id_shop.', 1, "2", 0, 1),
		(88, 15, '.$id_shop.', 1, "1", 0, 1),
		(89, 15, '.$id_shop.', 1, "2", 0, 1),
		(90, 15, '.$id_shop.', 1, "2", 0, 1),
		(91, 15, '.$id_shop.', 1, "2", 0, 1),
		(92, 15, '.$id_shop.', 1, "2", 0, 1),
		(93, 15, '.$id_shop.', 1, "2", 0, 1),
		(94, 15, '.$id_shop.', 1, "2", 0, 1),
		(95, 15, '.$id_shop.', 1, "2", 0, 1),
		(96, 16, '.$id_shop.', 1, "1", 0, 1),
		(97, 16, '.$id_shop.', 1, "2", 0, 1),
		(98, 16, '.$id_shop.', 1, "2", 0, 1),
		(99, 16, '.$id_shop.', 1, "2", 0, 1),
		(100, 16, '.$id_shop.', 1, "2", 0, 1),
		(101, 16, '.$id_shop.', 1, "2", 0, 1),
		(102, 16, '.$id_shop.', 1, "2", 0, 1),
		(103, 16, '.$id_shop.', 1, "2", 0, 1),
		(107, 21, '.$id_shop.', 3, "1", 0, 1),
		(108, 22, '.$id_shop.', 4, "1", 1, 1),
		(109, 22, '.$id_shop.', 4, "1", 2, 1),
		(113, 23, '.$id_shop.', 4, "1", 8, 1),
		(114, 23, '.$id_shop.', 4, "1", 7, 1),
		(115, 24, '.$id_shop.', 1, "1", 0, 1),
		(116, 24, '.$id_shop.', 1, "2", 0, 1),
		(117, 24, '.$id_shop.', 1, "2", 0, 1),
		(118, 24, '.$id_shop.', 1, "2", 0, 1),
		(119, 13, '.$id_shop.', 1, "2", 0, 1),
		(120, 14, '.$id_shop.', 1, "2", 0, 1),
		(121, 24, '.$id_shop.', 1, "2", 0, 1),
		(122, 24, '.$id_shop.', 1, "2", 0, 1),
		(124, 25, '.$id_shop.', 1, "1", 0, 1),
		(125, 25, '.$id_shop.', 1, "2", 0, 1),
		(126, 25, '.$id_shop.', 1, "2", 0, 1),
		(127, 25, '.$id_shop.', 1, "2", 0, 1),
		(128, 25, '.$id_shop.', 1, "2", 0, 1),
		(129, 25, '.$id_shop.', 1, "2", 0, 1),
		(131, 2, '.$id_shop.', 1, "2", 0, 1),
		(132, 2, '.$id_shop.', 1, "2", 0, 1),
		(133, 1, '.$id_shop.', 1, "1", 39, 1),
		(134, 1, '.$id_shop.', 4, "1", 40, 1),
		(135, 3, '.$id_shop.', 1, "1", 0, 1),
		(136, 3, '.$id_shop.', 1, "2", 0, 1),
		(137, 3, '.$id_shop.', 1, "2", 0, 1),
		(138, 3, '.$id_shop.', 1, "2", 0, 1),
		(139, 3, '.$id_shop.', 1, "2", 0, 1),
		(140, 3, '.$id_shop.', 1, "2", 0, 1),
		(141, 3, '.$id_shop.', 1, "2", 0, 1),
		(142, 3, '.$id_shop.', 1, "2", 0, 1),
		(143, 3, '.$id_shop.', 1, "2", 0, 1),
		(144, 3, '.$id_shop.', 1, "2", 0, 1),
		(145, 3, '.$id_shop.', 1, "2", 0, 1),
		(146, 3, '.$id_shop.', 1, "2", 0, 1),
		(147, 3, '.$id_shop.', 1, "2", 0, 1),
		(148, 1, '.$id_shop.', 4, "1", 2, 1),
		(149, 26, '.$id_shop.', 1, "1", 0, 1),
		(150, 26, '.$id_shop.', 1, "2", 0, 1),
		(151, 26, '.$id_shop.', 1, "2", 0, 1),
		(152, 26, '.$id_shop.', 1, "2", 0, 1),
		(153, 26, '.$id_shop.', 1, "2", 0, 1),
		(154, 26, '.$id_shop.', 1, "2", 0, 1),
		(155, 26, '.$id_shop.', 1, "2", 0, 1),
		(156, 26, '.$id_shop.', 1, "2", 0, 1),
		(157, 26, '.$id_shop.', 1, "2", 0, 1),
		(158, 26, '.$id_shop.', 1, "2", 0, 1),
		(159, 26, '.$id_shop.', 1, "2", 0, 1),
		(160, 26, '.$id_shop.', 1, "2", 0, 1),
		(161, 26, '.$id_shop.', 1, "2", 0, 1),
		(162, 27, '.$id_shop.', 1, "1", 0, 1),
		(163, 27, '.$id_shop.', 1, "2", 0, 1),
		(164, 27, '.$id_shop.', 1, "2", 0, 1),
		(165, 27, '.$id_shop.', 1, "2", 0, 1),
		(166, 27, '.$id_shop.', 1, "2", 0, 1),
		(167, 27, '.$id_shop.', 1, "2", 0, 1),
		(168, 27, '.$id_shop.', 1, "2", 0, 1),
		(169, 27, '.$id_shop.', 1, "2", 0, 1),
		(170, 27, '.$id_shop.', 1, "2", 0, 1),
		(171, 27, '.$id_shop.', 1, "2", 0, 1),
		(172, 27, '.$id_shop.', 1, "2", 0, 1),
		(173, 27, '.$id_shop.', 1, "2", 0, 1),
		(174, 27, '.$id_shop.', 1, "2", 0, 1),
		(175, 28, '.$id_shop.', 1, "1", 0, 1),
		(176, 28, '.$id_shop.', 1, "2", 0, 1),
		(177, 28, '.$id_shop.', 1, "2", 0, 1),
		(178, 28, '.$id_shop.', 1, "2", 0, 1),
		(179, 28, '.$id_shop.', 1, "2", 0, 1),
		(180, 28, '.$id_shop.', 1, "2", 0, 1),
		(181, 28, '.$id_shop.', 1, "2", 0, 1),
		(182, 28, '.$id_shop.', 1, "2", 0, 1),
		(183, 28, '.$id_shop.', 1, "2", 0, 1),
		(184, 28, '.$id_shop.', 1, "2", 0, 1),
		(185, 28, '.$id_shop.', 1, "2", 0, 1),
		(186, 28, '.$id_shop.', 1, "2", 0, 1),
		(187, 28, '.$id_shop.', 1, "2", 0, 1),
		(188, 28, '.$id_shop.', 1, "2", 0, 1),
		(189, 29, '.$id_shop.', 1, "1", 0, 1),
		(190, 29, '.$id_shop.', 1, "2", 0, 1),
		(191, 29, '.$id_shop.', 1, "2", 0, 1),
		(192, 29, '.$id_shop.', 1, "2", 0, 1),
		(193, 29, '.$id_shop.', 1, "2", 0, 1),
		(194, 29, '.$id_shop.', 1, "2", 0, 1),
		(195, 30, '.$id_shop.', 1, "1", 0, 1),
		(196, 30, '.$id_shop.', 1, "2", 0, 1),
		(197, 30, '.$id_shop.', 1, "2", 0, 1),
		(198, 30, '.$id_shop.', 1, "2", 0, 1),
		(199, 30, '.$id_shop.', 1, "2", 0, 1),
		(200, 30, '.$id_shop.', 1, "2", 0, 1),
		(201, 31, '.$id_shop.', 1, "1", 0, 1),
		(202, 31, '.$id_shop.', 1, "2", 0, 1),
		(203, 31, '.$id_shop.', 1, "2", 0, 1),
		(204, 31, '.$id_shop.', 1, "2", 0, 1),
		(205, 31, '.$id_shop.', 1, "2", 0, 1),
		(206, 31, '.$id_shop.', 1, "2", 0, 1),
		(207, 32, '.$id_shop.', 1, "1", 0, 1),
		(208, 32, '.$id_shop.', 1, "2", 0, 1),
		(209, 32, '.$id_shop.', 1, "2", 0, 1),
		(210, 32, '.$id_shop.', 1, "2", 0, 1),
		(211, 32, '.$id_shop.', 1, "2", 0, 1),
		(212, 32, '.$id_shop.', 1, "2", 0, 1),
		(213, 10, '.$id_shop.', 3, "1", 0, 1),
		(215, 33, '.$id_shop.', 1, "1", 0, 1),
		(216, 33, '.$id_shop.', 1, "2", 0, 1),
		(217, 33, '.$id_shop.', 1, "2", 0, 1),
		(218, 33, '.$id_shop.', 1, "2", 0, 1),
		(219, 33, '.$id_shop.', 1, "2", 0, 1),
		(220, 33, '.$id_shop.', 1, "2", 0, 1),
		(221, 33, '.$id_shop.', 1, "2", 0, 1),
		(222, 33, '.$id_shop.', 1, "2", 0, 1),
		(223, 33, '.$id_shop.', 1, "2", 0, 1),
		(224, 33, '.$id_shop.', 1, "2", 0, 1),
		(225, 33, '.$id_shop.', 1, "2", 0, 1),
		(226, 33, '.$id_shop.', 3, "1", 0, 1),
		(227, 34, '.$id_shop.', 1, "1", 0, 1),
		(228, 34, '.$id_shop.', 1, "2", 0, 1),
		(229, 34, '.$id_shop.', 1, "2", 0, 1),
		(230, 34, '.$id_shop.', 1, "2", 0, 1),
		(231, 34, '.$id_shop.', 1, "2", 0, 1),
		(232, 34, '.$id_shop.', 1, "2", 0, 1),
		(233, 34, '.$id_shop.', 1, "2", 0, 1),
		(234, 34, '.$id_shop.', 1, "2", 0, 1),
		(235, 34, '.$id_shop.', 1, "2", 0, 1),
		(236, 34, '.$id_shop.', 1, "2", 0, 1),
		(237, 34, '.$id_shop.', 1, "2", 0, 1),
		(238, 34, '.$id_shop.', 3, "1", 0, 1),
		(239, 11, '.$id_shop.', 1, "2", 0, 1),
		(240, 11, '.$id_shop.', 1, "2", 0, 1),
		(241, 11, '.$id_shop.', 3, "1", 0, 1);');
		
		foreach ($languages as $language)
		{
			$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_lang` (`id_wtverticalmegamenu`, `id_shop`, `id_lang`, `title`, `link`, `subtitle`) VALUES 
			(1, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(2, '.$id_shop.', '.$language['id_lang'].', "CAT4", "CAT4", "Hot"),
			(3, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(4, '.$id_shop.', '.$language['id_lang'].', "CAT6", "CAT6", ""),
			(5, '.$id_shop.', '.$language['id_lang'].', "CAT7", "CAT7", "Hot"),
			(6, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(7, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(8, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", "");');
			
			$return &= Db::getInstance()->Execute('INSERT IGNORE INTO `'._DB_PREFIX_.'wtverticalmegamenu_item_lang` (`id_item`, `id_shop`, `id_lang`, `title`, `link`, `text`) VALUES 
			(2, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(14, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(15, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(16, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(17, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(18, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(19, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(20, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(21, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(22, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(23, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(49, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(50, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(51, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(52, '.$id_shop.', '.$language['id_lang'].', "CAT7", "CAT7", ""),
			(53, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(54, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(55, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(56, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(57, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(58, 1, 3, "CAT3", "CAT3", ""),
			(59, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(60, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(61, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(62, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(63, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(64, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(65, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(66, '.$id_shop.', '.$language['id_lang'].', "CAT10", "CAT10", ""),
			(67, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(68, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(71, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(72, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(74, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(76, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(77, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(78, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(79, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(80, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(81, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(82, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(84, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(85, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(115, '.$id_shop.', '.$language['id_lang'].', "CAT7", "CAT7", ""),
			(116, '.$id_shop.', '.$language['id_lang'].', "CAT7", "CAT7", ""),
			(117, '.$id_shop.', '.$language['id_lang'].', "CAT10", "CAT10", ""),
			(118, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(119, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(120, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(121, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(122, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(124, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(125, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(126, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(127, '.$id_shop.', '.$language['id_lang'].', "CAT10", "CAT10", ""),
			(128, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(129, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(131, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(132, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(133, '.$id_shop.', '.$language['id_lang'].', "PAGbest-sales", "PAGbest-sales", ""),
			(134, '.$id_shop.', '.$language['id_lang'].', "", "#", ""),
			(135, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(136, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(137, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(138, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(139, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(140, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(141, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(142, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(143, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(144, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(145, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(146, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(147, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(148, '.$id_shop.', '.$language['id_lang'].', "", "#", ""),
			(149, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(150, '.$id_shop.', '.$language['id_lang'].', "CAT4", "CAT4", ""),
			(151, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(152, '.$id_shop.', '.$language['id_lang'].', "CAT7", "CAT7", ""),
			(153, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(154, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(155, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(156, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(157, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(158, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(159, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(160, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(161, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(162, '.$id_shop.', '.$language['id_lang'].', "CAT4", "CAT4", ""),
			(163, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(164, '.$id_shop.', '.$language['id_lang'].', "CAT10", "CAT10", ""),
			(165, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(166, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(167, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(168, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(169, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(170, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(171, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(172, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(173, '.$id_shop.', '.$language['id_lang'].', "MAN6", "MAN6", ""),
			(174, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(175, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(176, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(177, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(178, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(179, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(180, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(181, '.$id_shop.', '.$language['id_lang'].', "MAN10", "MAN10", ""),
			(182, '.$id_shop.', '.$language['id_lang'].', "CMS5", "CMS5", ""),
			(183, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(184, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(185, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(186, '.$id_shop.', '.$language['id_lang'].', "PAGorder-slip", "PAGorder-slip", ""),
			(187, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(188, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(189, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(190, '.$id_shop.', '.$language['id_lang'].', "CAT10", "CAT10", ""),
			(191, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(192, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(193, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(194, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(195, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(196, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(197, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(198, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(199, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(200, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(201, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(202, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(203, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(204, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(205, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(206, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(207, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(208, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(209, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(210, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(211, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(212, '.$id_shop.', '.$language['id_lang'].', "CAT7", "CAT7", ""),
			(213, '.$id_shop.', '.$language['id_lang'].', "hat", "#", "<p><img src=\"{wt_menu_v_url}themes/wt_bestbuy/assets/img/cms/menu1.png\" alt=\"\" /></p>"),
			(215, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(216, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(217, '.$id_shop.', '.$language['id_lang'].', "CAT7", "CAT7", ""),
			(218, '.$id_shop.', '.$language['id_lang'].', "CAT10", "CAT10", ""),
			(219, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(220, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(221, '.$id_shop.', '.$language['id_lang'].', "CAT9", "CAT9", ""),
			(222, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(223, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(224, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(225, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(226, '.$id_shop.', '.$language['id_lang'].', "shoes", "#", "<p><img src=\"{wt_menu_v_url}themes/wt_bestbuy/assets/img/cms/menu2.png\" alt=\"\" /></p>"),
			(227, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(228, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(229, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(230, '.$id_shop.', '.$language['id_lang'].', "CAT8", "CAT8", ""),
			(231, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(232, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(233, '.$id_shop.', '.$language['id_lang'].', "CAT12", "CAT12", ""),
			(234, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(235, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(236, '.$id_shop.', '.$language['id_lang'].', "CAT5", "CAT5", ""),
			(237, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(238, '.$id_shop.', '.$language['id_lang'].', "handbag", "#", "<p><img src=\"{wt_menu_v_url}themes/wt_bestbuy/assets/img/cms/menu2.png\" alt=\"\" /></p>"),
			(239, '.$id_shop.', '.$language['id_lang'].', "CAT10", "CAT10", ""),
			(240, '.$id_shop.', '.$language['id_lang'].', "CAT3", "CAT3", ""),
			(241, '.$id_shop.', '.$language['id_lang'].', "swimwear", "#", "<p><img src=\"{wt_menu_v_url}themes/wt_bestbuy/assets/img/cms/menu1.png\" alt=\"\" /></p>");');
		}
		return $return;
	}
}
?>