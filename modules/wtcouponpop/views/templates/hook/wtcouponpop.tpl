{**
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
*  @author    Codespot SA <support@presthemes.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<script type="text/javascript">
    var wt_coupon_url = "{$wt_coupon_url|escape:'html':'UTF-8'}";
	var cookies_time = {$newsletter_setting.cookies_time|intval};
</script>
{if $newsletter_setting}
<div id="overlay" style="{if $cookies_time>0}display: none;{/if}" onclick="closeDialog(cookies_time)"></div>
{if $newsletter_setting.background != ''}
<div class="wt-popup" style="background-image: url({$newsletter_setting.background|escape:'html':'UTF-8'});{if $cookies_time>0}display: none;{/if}">
{else}
<div class="wt-popup">
{/if}
	<div class="wt-popup-close">
			<a class="wt_close" href="javascript:void(0)" onclick="closeDialog(cookies_time)">
				<img src="{$wt_coupon_url|escape:'html':'UTF-8'}/views/img/icon-close.png" /> </a>
			</div>
    <div class="inner">
	
		<div class="clearfix newsletter-content">
			{$newsletter_setting.content|escape:'quotes':'UTF-8' nofilter}
		</div>
		<div class="newsletter-form">
			<div class="g-newsletter-form">
				<input class="input-email" id="input-email" id="" type="text" name="email" size="18" placeholder="{l s='Enter your email...' mod='wtcouponpop'}" value="" />                    
				<a onclick="regisNewsletter()" name="submitNewsletter" class="btn btn-default button">{l s='Subscribe' mod='wtcouponpop'}</a>
			</div>
			
			
			<div class="g-check">                    
				<div class="checkbox">
					<input id="notshow" name="notshow" type="checkbox" value="1">
					{l s='Do not show this popup again' mod='wtcouponpop'}
				</div>
			</div>
			<div id="regisNewsletterMessage"></div>
			
			{if $voucher_code != ''}
			<div class="coupon-side clearfix">
				<div class="coupon-wrapper clearfix">
					<div id="coupon-element" class="coupon" >
						<div class="scissors"></div>
						<div class="dashed-border">
							<span id="coupon-text-before"  style="{if $show_voucher == 1}display: none;{else}display: block;{/if}">
							{l s='Coupon will be shown here' mod='wtcouponpop'}</span>
							<span id="coupon-text-after" style="{if $show_voucher == 1}display: block;{else}display: none;{/if}">{l s='Voucher Code' mod='wtcouponpop'}: {$voucher_code|escape:'html':'UTF-8'}</span>
						</div>
					</div>
				</div>
			</div>
			{/if}
		</div>
    </div>    
</div>

<script type="text/javascript">
var regisNewsletterMessage = '{l s='You have just subscribled successfully!' mod='wtcouponpop' js=1}';
var enterEmail = '{l s='Enter your email please!' mod='wtcouponpop' js=1}';
</script>
{/if}
<div class="wt-show-popup {if $cookies_time>0}open{else}close{/if}">
	<div class="wt-coupon-small">
		<div class="tab-image"></div>
		<div class="scissors-small"></div>
		<div class="dashes-d"></div>
		<div class="dashes-b"></div>
		<div class="share-coupon-small-wrapper"><a href="javascript: void(0)"><span>{l s='Discount' mod='wtcouponpop'}</span></a></div>
	</div>
</div>