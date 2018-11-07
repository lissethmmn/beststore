<?php
/**
* 2007-2016 PrestaShop
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
*  @copyright 2007-2016 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
require_once(dirname(__FILE__)."/pdftohtml/dompdf_config.inc.php");

$id_order = $_GET['id_order'];

$image_path = dirname(__FILE__)."/OtImages/$id_order-ima.jpg";
if (file_exists($image_path)) {
	$html = "<p><img src='./OtImages/$id_order-ima.jpg' / style='width: 378px; border: solid #ccc 1px;'></p>";
	// $html .= "<p>".$chilex->getSendAddress($id_order)."</p>";

	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->set_paper('A4', 'P');
	$dompdf->render();
	$dompdf->stream($id_order."-chilex.pdf", array("Attachment" => false));
} else {
	echo "<script type='text/javascript'>window.close()</script>";
	exit(); 
}

