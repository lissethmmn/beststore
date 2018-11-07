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

<h4 class="title_block">{l s='recent comments' mod='wtblog'}</h4>
{if $blockcomments|@count > 0}
<div class="block_content">
	<ul class="ul-comment-recent">
	{foreach from=$blockcomments item=comment name=comment}
		<li {if $smarty.foreach.comment.last}class="last"{/if}>
			<div class="blog-content">
				<div class="blog-info">
					<div class="post-date">{$comment.date_add|date_format|escape:'htmlall':'UTF-8'}</div>
					<span class="blog-author">{$comment['author_name']|escape:'htmlall':'UTF-8'}</span>
				</div>
				<div class="comment-content">			 	{$comment['content']|strip_tags:'UTF-8'|escape:'htmlall':'UTF-8'|truncate:55:'...'}</div>
			</div>
		</li>
	{/foreach}
	</ul>
</div>
{else}
	<div class="no-item">{l s='There is no comment' mod='wtblog'}</div>
{/if}