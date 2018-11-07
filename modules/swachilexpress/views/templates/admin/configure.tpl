{*
* 2007-2017 PrestaShop
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
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="panel">
	<h3><i class="icon icon-truck"></i> {l s='Chilexpress' mod='swachilexpress'}</h3>
	<img src="{$module_dir|escape:'html':'UTF-8'}/logo.png" id="payment-logo" class="pull-right" width="100" height="100" />
	<p>
		<strong>{l s='Here is my new shipping module!' mod='swachilexpress'}</strong><br />
		{l s='Thanks to PrestaShop, now I have a great shipping module.' mod='swachilexpress'}<br />
	</p>
	<p>
		<strong>{l s='ID Carrier generated' mod='swachilexpress'}</strong><br />
		{$id_carrier}<br />
	</p>
	<br />
</div>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li><a href="#template_7" role="tab" data-toggle="tab">{l s='Logs' mod='swachilexpress'}</a></li>
	<li><a href="#template_1" role="tab" data-toggle="tab">{l s='Set Manual Prices' mod='swachilexpress'}</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane" id="template_7">{include file='./template_7.tpl'}</div>
	<div class="tab-pane" id="template_1">{include file='./template_1.tpl'}</div>
</div>
