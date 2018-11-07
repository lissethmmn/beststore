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

{if isset($wt_post_list)}
<ul id="blog_list" class="">
	{foreach from=$wt_post_list item=post name=post}
		<li class="{if $smarty.foreach.post.iteration%2 == 0}even{else}odd{/if} col-xs-12 col-sm-6">
			<div class="content">
				{if $wt_imep_list_show != 'none'}
					{if isset($post['image']) && $post['image'] != ''}
						<div class="blog-img">
							<a href="{$post['link']|escape:'htmlall':'UTF-8'}" title="{$post['name']|escape:'htmlall':'UTF-8'}">
							<img src="{$post['image']|escape:'htmlall':'UTF-8'}" alt="{$post['name']|escape:'htmlall':'UTF-8'}" />
							</a>
							<div class="date-view">
								<div class="view">
									<i class="icon-comments"></i>
									<span>{$post.count_comment|intval}</span>
								</div>
							</div>
						</div>
					{/if}
				{/if}
				<div class="blog-content">
					<div class="blog-info">
						<div class="post-date">
							{$post.date_add|date_format|escape:'htmlall':'UTF-8'}
						</div>
						<span class="blog-author">{$post.author|escape:'htmlall':'UTF-8'}</span>
					</div>
					<h5 class="post_title">
						<a href="{$post['link']|escape:'htmlall':'UTF-8'}" title="{$post['name']|escape:'htmlall':'UTF-8'}">{$post['name']|escape:'htmlall':'UTF-8'|truncate:50:'...'}</a>
					</h5>
					<p>{$post['description_short']|strip_tags|escape:'htmlall':'UTF-8'|truncate:180:'...'}</p>
					<div class="read-more"><a href="{$post['link']|escape:'htmlall':'UTF-8'}" title="">{l s='Read more' d='Modules.WTBlog'}</a></div>
				</div>
			</div>
		</li>
	{/foreach}
</ul>
{/if}