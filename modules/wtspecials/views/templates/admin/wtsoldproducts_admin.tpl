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
 <div class="col-xl-4 col-lg-4">
	<fieldset class="form-group">		
			
			<label style="width:auto;float:none;" class="form-control-label">{l s='The Quantity Products' mod='wtspecials'}</label>
				<p>{l s='This is a static value at the warehouse.
It is only use to calculate the number product sold base on the product quantity current.' d='Modules.WTSpecialsProducts.Admin'}</p>
				<div class="tokenfield">	
				<input class="form-control" type="text" id="wt-special-quantity" wt-special_ssl="{$path_ssl|escape:'quotes':'UTF-8'}" wt-special-id-product="{$id_product|intval}" name="static_quantity_instock" value="{$quantity|intval}"/>
				<p id="wt-special-qty-error" style="color: #c11111"></p>
				<p id="wt-special-qty-ok" style="color: #6dac23"></p>
			</div>
			
	</fieldset>
	</div>
<div class="panel-footer col-xl-4 col-lg-4" style="margin-top: 28px;">
			<div class="js-spinner spinner hide btn-primary-reverse onclick pull-left m-r-1" style="display: none;"></div>
			<button type="submit" id="wt-save-quantity" name="submitAddproductAndStay" class="btn btn-primary js-btn-save"><i class="process-icon-save"></i><span> {l s='Save' mod='wtspecials'}</span></button>
			
		</div>
		
<script type="text/javascript">

$(function(){
	
	$("#wt-save-quantity").click(function() 
	{
	
		var special_qty = $('#wt-special-quantity').val();
		var base_ssl = $('#wt-special-quantity').attr('wt-special_ssl')+'modules/wtspecials/ajax_wtspecials.php';
		var id_product = $('#wt-special-quantity').attr('wt-special-id-product');
		
		$.post(
		    base_ssl, 
			{
			WT_Special_Qty : special_qty, ID_Product : id_product
			},
			function(data) 
			{ 
				if (data.length > 2)
				{
				
					$('#wt-special-qty-ok').html('');
					$('#wt-special-qty-error').html(data);
				}
				else
				{
				
					$('#wt-special-qty-ok').html('Your qty have been updated.');
					$('#wt-special-qty-error').html('');
					
					
				}
				
			});
		
		
		});

});
</script>














