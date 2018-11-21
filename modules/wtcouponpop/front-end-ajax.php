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
* obtain it through the world-wide-webjquery.cookie, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    Codespot SA <support@presthemes.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

//require_once(dirname(__FILE__).'../../../config/config.inc.php');
//require_once(dirname(__FILE__).'../../../init.php');
//require_once(dirname(__FILE__).'/wtcouponpop.php');

include_once('../../config/config.inc.php');
include_once('../../init.php');
include_once('wtcouponpop.php');

$module = new WtCouponPop();
$task = Tools::getValue('task');
if ($task == 'cancelRegisNewsletter')
{		
	$notshow = (int)Tools::getValue('notshow', 0);
	$cookies_time = Tools::getValue('cookies_time', 0);
	
	
	if ($notshow == '1')
	{
		Context::getContext()->cookie->__set('cookies_time', $cookies_time);
		Context::getContext()->cookie->__set('notshow', $notshow);
	}
	else
	{
		Context::getContext()->cookie->__set('notshow', $notshow);
	}
	
	die(Tools::jsonEncode('1'));
}
if ($task == 'showPopup')
{		
	Context::getContext()->cookie->__set('notshow', 0);
	Context::getContext()->cookie->__set('cookies_time', 0);
	die(Tools::jsonEncode('1'));
}
if ($task == 'regisNewsletter')
{
	$result = $module->newsletterRegistrationAjax();
	
	//$notshow = (int)Tools::getValue('notshow', 0);
	//Context::getContext()->cookie->__set('notshow', $notshow);
	//Context::getContext()->cookie->__set('show_voucher', 1);
	
	die(Tools::jsonEncode($result));
}