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

{if isset($p) AND $p}
	<!-- Pagination -->
	{if isset($wt_blog_category['id_wt_blog_category']) && $wt_blog_category['id_wt_blog_category']}
		{assign var='requestPage' value=$WTLink->getCategoryPostLink($wt_blog_category['id_wt_blog_category'],$wt_blog_category['link_rewrite'])|escape:'UTF-8'}
	{elseif isset($wt_blog_tag)}

		{assign var='requestPage' value=$WTLink->getTagLink($wt_blog_tag->id,$wt_blog_tag->name)|escape:'UTF-8'}
	{else}

		{assign var='requestPage' value=$link->getModuleLink('wtblog','categoryPost')|escape:'UTF-8'}
	{/if}
	<div id="pagination" class="pagination clearfix">
	{if $start!=$stop}
		<ul class="pagination">
		{if $p != 1}
			{assign var='p_previous' value=$p-1}
			<li id="pagination_previous" class="pagination_previous"><a href="{$link->goPage($requestPage, $p_previous)|escape:'html':'UTF-8'}">
				<i class="material-icons">&#xE314;</i>
			</a></li>
		{else}
			<li id="pagination_previous" class="disabled pagination_previous">
			<span>
				<i class="material-icons">&#xE314;</i>
				
			</span>
			</li>
		{/if}
		{if $start>3}
			<li><a href="{$link->goPage($requestPage, 1)|escape:'html':'UTF-8'}"><span>1</span></a></li>
			<li class="truncate">
				<span>
					<span>...</span>
				</span>
			</li>
		{/if}
		{section name=pagination start=$start loop=$stop+1 step=1}
			{if $p == $smarty.section.pagination.index}
				<li class="active"><span><span>{$p|escape:'html':'UTF-8'}</span></span></li>
			{else}
				<li><a href="{$link->goPage($requestPage, $smarty.section.pagination.index)|escape:'html':'UTF-8'}"><span>{$smarty.section.pagination.index|escape:'html':'UTF-8'}</span></a></li>
			{/if}
		{/section}
		{if $pages_nb>$stop+2}
			<li class="truncate">
				<span>
					<span>...</span>
				</span>
			</li>
			<li><a href="{$link->goPage($requestPage, $pages_nb)|escape:'html':'UTF-8'}">{$pages_nb|intval}</a></li>
		{/if}
		{if $pages_nb > 1 AND $p != $pages_nb}
			{assign var='p_next' value=$p+1}
			<li id="pagination_next" class="pagination_next"><a href="{$link->goPage($requestPage, $p_next)|escape:'html':'UTF-8'}">
			
			<i class="material-icons">&#xE315;</i>
			</a></li>
		{else}
			<li id="pagination_next" class="disabled"><span>
			
			<i class="material-icons">&#xE315;</i>
			</span></li>
		{/if}
		</ul>
	{/if}
	</div>
	<!-- /Pagination -->

{/if}
