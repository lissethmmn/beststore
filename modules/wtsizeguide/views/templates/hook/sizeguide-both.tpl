{*
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($tabs) && $tabs|count > 0}
<div class="tabs">
{foreach from=$tabs item='tab'}
   
		<h3><a class="nav-link tab-sizeguide" id="product_sizeguide_{$tab.id_wtsizeguide|intval}" href="#idTab_siseguide_{$tab.id_wtsizeguide|intval}" role="tab" data-toggle="tab">{$tab.title|escape:'html':'UTF-8'}</a></h3>
	

	<div class="page-product-box tab-pane fade in" id="idTab_siseguide_{$tab.id_wtsizeguide|intval}">
		{$tab.content|escape:'htmlall':'UTF-8' nofilter}		
	</div>
{/foreach}
</div>
{/if}