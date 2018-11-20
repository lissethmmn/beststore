{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}

<nav data-depth="{$breadcrumb.count}" class="breadcrumb">
<h1 class="new-title-breadcrumb">{hook h="displayPageTitle"}</h1>
  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
    {foreach from=$breadcrumb.links item=path name=breadcrumb}
      {block name='breadcrumb_item'}
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="{$path.url}">
            <span itemprop="name">{$path.title}</span>
          </a>
          <meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration}">
        </li>
		{if $page.page_name == 'order-confirmation' || $page.page_name == 'cart' || $page.page_name == 'checkout' || $page.page_name == 'my-account' || $page.page_name == 'manufacturer' || $page.page_name == 'search' || $page.page_name == 'new-products' || $page.page_name == 'prices-drop' || $page.page_name == 'best-sales'}
		   <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			
			  <span itemprop="name"> {hook h="displayPageTitle"}
			 
			  </span>
			
			<meta itemprop="position" content="{$smarty.foreach.breadcrumb.iteration}">
		  </li>
		{/if}
		
      {/block}
    {/foreach}
  </ol>
</nav>
