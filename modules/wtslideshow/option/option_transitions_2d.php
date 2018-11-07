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

$optransition2d = array
(
	array('key'=> 1,'name' => 'Sliding from right'),
	array('key'=> 2,'name' => 'Sliding from left'),
	array('key'=> 3,'name' => 'Sliding from bottom'),
	array('key'=> 4,'name' => 'Sliding from top'),
	array('key'=> 5,'name' => 'Crossfading'),
	array('key'=> 6,'name' => 'Fading tiles forward'),
	array('key'=> 7,'name' => 'Fading tiles reverse'),
	array('key'=> 8,'name' => 'Fading tiles col-forward'),
	array('key'=> 9,'name' => 'Fading tiles col-reverse'),
	array('key'=> 10,'name' => 'Fading tiles (random)'),
	array('key'=> 11,'name' => 'Smooth fading from right'),
	array('key'=> 12,'name' => 'Smooth fading from left'),
	array('key'=> 13,'name' => 'Smooth fading from bottom'),
	array('key'=> 14,'name' => 'Smooth fading from top'),
	array('key'=> 15,'name' => 'Smooth sliding from right'),
	array('key'=> 16,'name' => 'Smooth sliding from left'),
	array('key'=> 17,'name' => 'Smooth sliging from bottom'),
	array('key'=> 18,'name' => 'Smooth sliding from top'),
	array('key'=> 19,'name' => 'Sliding tiles to right (random)'),
	array('key'=> 20,'name' => 'Sliding tiles to left (random)'),
	array('key'=> 21,'name' => 'Sliding tiles to bottom (random)'),
	array('key'=> 22,'name' => 'Sliding tiles to top (random)'),
	array('key'=> 23,'name' => 'Sliding random tiles to random directions'),
	array('key'=> 24,'name' => 'Sliding rows to right (forward)'),
	array('key'=> 25,'name' => 'Sliding rows to right (reverse)'),
	array('key'=> 26,'name' => 'Sliding rows to right (random)'),
	array('key'=> 27,'name' => 'Sliding rows to left (forward)'),
	array('key'=> 28,'name' => 'Sliding rows to left (reverse)'),
	array('key'=> 29,'name' => 'Sliding rows to left (random)'),
	array('key'=> 30,'name' => 'Sliding rows from top to bottom (forward)'),
	array('key'=> 31,'name' => 'Sliding rows from top to bottom (random)'),
	array('key'=> 32,'name' => 'Sliding rows from bottom to top (reverse)'),
	array('key'=> 33,'name' => 'Sliding rows from bottom to top (random)'),
	array('key'=> 34,'name' => 'Sliding columns to bottom (forward)'),
	array('key'=> 35,'name' => 'Sliding columns to bottom (reverse)'),
	array('key'=> 36,'name' => 'Sliding columns to bottom (random)'),
	array('key'=> 37,'name' => 'Sliding columns to top (forward)'),
	array('key'=> 38,'name' => 'Sliding columns to top (reverse)'),
	array('key'=> 38,'name' => 'Sliding columns to top (random)'),
	array('key'=> 40,'name' => 'Sliding columns from left to right (forward)'),
	array('key'=> 41,'name' => 'Sliding columns from left to right (random)'),
	array('key'=> 42,'name' => 'Sliding columns from right to left (reverse)'),
	array('key'=> 43,'name' => 'Sliding columns from right to left (random)'),
	array('key'=> 44,'name' => 'Fading and sliding tiles to right (random)'),
	array('key'=> 45,'name' => 'Fading and sliding tiles to left (random)'),
	array('key'=> 46,'name' => 'Fading and sliding tiles to bottom (random)'),
	array('key'=> 47,'name' => 'Fading and sliding tiles to top (random)'),
	array('key'=> 48,'name' => 'Fading and sliding random tiles to random directions'),
	array('key'=> 49,'name' => 'Fading and sliding tiles from top-left (forward)'),
	array('key'=> 50,'name' => 'Fading and sliding tiles from bottom-right (reverse)'),
	array('key'=> 51,'name' => 'Fading and sliding tiles from top-right (random)'),
	array('key'=> 52,'name' => 'Fading and sliding tiles from bottom-left (random)'),
	array('key'=> 53,'name' => 'Fading and sliding rows to right (forward)'),
	array('key'=> 54,'name' => 'Fading and sliding rows to right (reverse)'),
	array('key'=> 55,'name' => 'Fading and sliding rows to right (random)'),
	array('key'=> 56,'name' => 'Fading and sliding rows to left (forward)'),
	array('key'=> 57,'name' => 'Fading and sliding rows to left (reverse)'),
	array('key'=> 58,'name' => 'Fading and sliding rows to left (random)'),
	array('key'=> 59,'name' => 'Fading and sliding rows from top to bottom (forward)'),
	array('key'=> 60,'name' => 'Fading and sliding rows from top to bottom (random)'),
	array('key'=> 61,'name' => 'Fading and sliding rows from bottom to top (reverse)'),
	array('key'=> 62,'name' => 'Fading and sliding rows from bottom to top (random)'),
	array('key'=> 63,'name' => 'Fading and sliding columns to bottom (forward)'),
	array('key'=> 64,'name' => 'Fading and sliding columns to bottom (reverse)'),
	array('key'=> 65,'name' => 'Fading and sliding columns to bottom (random)'),
	array('key'=> 66,'name' => 'Fading and sliding columns to top (forward)'),
	array('key'=> 67,'name' => 'Fading and sliding columns to top (reverse)'),
	array('key'=> 68,'name' => 'Fading and sliding columns to top (reverse)'),
	array('key'=> 69,'name' => 'Fading and sliding columns from left to right (forward)'),
	array('key'=> 70,'name' => 'Fading and sliding columns from left to right (random)'),
	array('key'=> 71,'name' => 'Fading and sliding columns from right to left (reverse)'),
	array('key'=> 72,'name' => 'Fading and sliding columns from right to left (random)'),
	array('key'=> 73,'name' => 'Carousel'),
	array('key'=> 74,'name' => 'Carousel rows'),
	array('key'=> 75,'name' => 'Carousel cols'),
	array('key'=> 76,'name' => 'Carousel tiles horizontal'),
	array('key'=> 77,'name' => 'Carousel tiles vertical'),
	array('key'=> 78,'name' => 'Carousel-mirror tiles horizontal'),
	array('key'=> 79,'name' => 'Carousel-mirror tiles vertical'),
	array('key'=> 80,'name' => 'Carousel mirror rows'),
	array('key'=> 81,'name' => 'Carousel mirror cols'),
	array('key'=> 82,'name' => 'Turning tile from left'),
	array('key'=> 83,'name' => 'Turning tile from right'),
	array('key'=> 84,'name' => 'Turning tile from top'),
	array('key'=> 85,'name' => 'Turning tile from bottom'),
	array('key'=> 86,'name' => 'Turning tiles from left'),
	array('key'=> 87,'name' => 'Turning tiles from right'),
	array('key'=> 88,'name' => 'Turning tiles from top'),
	array('key'=> 89,'name' => 'Turning tiles from bottom'),
	array('key'=> 90,'name' => 'Turning rows from top'),
	array('key'=> 91,'name' => 'Turning rows from bottom'),
	array('key'=> 92,'name' => 'Turning cols from left'),
	array('key'=> 93,'name' => 'Turning cols from right'),
	array('key'=> 94,'name' => 'Flying rows from left'),
	array('key'=> 95,'name' => 'Flying rows from right'),
	array('key'=> 96,'name' => 'Flying cols from top'),
	array('key'=> 97,'name' => 'Flying cols from bottom'),
	array('key'=> 98,'name' => 'Flying and rotating tile from left'),
	array('key'=> 99,'name' => 'Flying and rotating tile from right'),
	array('key'=> 100,'name' => 'Flying and rotating tiles from left'),
	array('key'=> 101,'name' => 'Flying and rotating tiles from right'),
	array('key'=> 102,'name' => 'Flying and rotating tiles from random'),
	array('key'=> 103,'name' => 'Scaling tile in'),
	array('key'=> 104,'name' => 'Scaling tile from out'),
	array('key'=> 105,'name' => 'Scaling tiles random'),
	array('key'=> 106,'name' => 'Scaling tiles from out random'),
	array('key'=> 107,'name' => 'Scaling in and rotating tiles random'),
	array('key'=> 108,'name' => 'Scaling and rotating tiles from out random'),
	array('key'=> 109,'name' => 'Mirror-sliding tiles diagonal'),
	array('key'=> 110,'name' => 'Mirror-sliding rows horizontal'),
	array('key'=> 111,'name' => 'Mirror-sliding rows vertical'),
	array('key'=> 112,'name' => 'Mirror-sliding cols horizontal'),
	array('key'=> 113,'name' => 'Mirror-sliding cols vertical')
);