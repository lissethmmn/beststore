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

<h4 class="title_block">{l s='Blog Categories' d='Modules.WTBlog'}</h4>
{if $wt_blockCategTree.children|@count > 0}
	<div class="block_content">
		<ul class="tree {if $wt_isDhtml}dhtml{/if}">
		{foreach from=$wt_blockCategTree.children item=child name=wt_blockCategTree}
			{if $smarty.foreach.wt_blockCategTree.last}
				{include file="$wt_branche_tpl_path" node=$child last='true'}
			{else}
				{include file="$wt_branche_tpl_path" node=$child}
			{/if}
		{/foreach}
		</ul>
		
	</div>
{else}
	<div class="no_item">{l s='There is no category' d='Modules.WTBlog'}</div>
{/if}