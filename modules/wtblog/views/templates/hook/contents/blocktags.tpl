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

<h4 class="title_block">{l s='Blog tags' mod='wtblog'}</h4>
{if $tags|@count > 0}
<div class="block_content">
	{foreach from=$tags item=tag name=tags}
			<a class="tag_level1 item" href="{$tag['link']|escape:'htmlall':'UTF-8'}" {if $smarty.foreach.tags.iteration%4 == 0}class="format"{/if}>{$tag['name']|escape:'htmlall':'UTF-8'}</a>
	{/foreach}			
</div>
{else}
	<div class="no-item">{l s='There is no tag' mod='wtblog'}</div>
{/if}