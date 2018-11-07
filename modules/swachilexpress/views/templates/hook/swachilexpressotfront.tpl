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

<div class="info-order box">
		 <h2>{l s='Chilexpress Information' mod='swachilexpress'}</h2>
		 <p>{l s='State Code' mod='swachilexpress'}: {$codigoEstado|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='State Description' mod='swachilexpress'}: {$descripcionEstado|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Work Order Number' mod='swachilexpress'}: {$numeroOt|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Work Order Number Father' mod='swachilexpress'}: {$numeroOtPadre|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Product Description' mod='swachilexpress'}: {$glosaProductoOT|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Service Description' mod='swachilexpress'}: {$glosaServicio|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Guide Number' mod='swachilexpress'}: {$numeroGuia|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Barcode' mod='swachilexpress'}: {$barcode|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Print Date' mod='swachilexpress'}: {$fechaImpresion|escape:'htmlall':'UTF-8'}</p>
		 <p>{l s='Check Tracking' mod='swachilexpress'}: <a href="http://www.chilexpress.cl/Views/ChilexpressCL/Resultado-busqueda.aspx?DATA={$numeroOt|escape:'htmlall':'UTF-8'}" target="_blank" class="btn btn-default button button-small">{l s='Go Tracking' mod='swachilexpress'}</a></p>		 
</div>