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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' < $time_to )&& ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $time_from)&& (time_to != '0000-00-00 00:00:00')}
	<div class="wt-count-down">
	<p class="title">{l s='Hurry Up! Offer ends in:' mod='wtcountdown'}</p>
		<div id="countdown_{$prev_id|escape:'html':'UTF-8'}_{$id_product|intval}" class="">
			<div class="wt_countdown" data-date="{$time_to|date_format:'%Y/%m/%d %H:%M:%S'|escape:'html':'UTF-8'}">
			
				<ul class="clock">
					<li>
					<div class="numner">
					<span data-days class="days">0</span>
					</div>
						<span class="dot">:</span>
					<div class="text">
					<p class="timeRefDays">{l s='days' mod='wtcountdown'}</p>
					</div>
					</li>
					
					<li>
					<div class="numner">
					<span data-hours class="hour">0</span>
					</div>
					<span class="dot">:</span>
					<div class="text">
					<p class="timeRefhour">{l s='hours' mod='wtcountdown'}</p>
					</div>
					</li>
					
					
					<li>
					<div class="numner">
						<span data-minutes class="minutes">0</span>
					</div>
					<span class="dot">:</span>
					<div class="text">
					<p class="timeRefminutes">{l s='mins' mod='wtcountdown'}</p>
					</div>
					</li>

						<li>
						<div class="numner">
						<span data-seconds class="remainingSeconds">0</span>
						</div>
						<div class="text">
						<p class="timeRefseconds">{l s='secs' mod='wtcountdown'}</p>
						</div>
						</li> 
						
					
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.wt_countdown').countdown({
					autoStart: true,
				});
			});
		</script>
	</div>
{elseif ($time_to == '0000-00-00 00:00:00') && ($time_from == '0000-00-00 00:00:00')}
	<div class="wt-count-down">
		<span>{l s=' ' mod='wtcountdown'}</span>
	</div>
{/if}