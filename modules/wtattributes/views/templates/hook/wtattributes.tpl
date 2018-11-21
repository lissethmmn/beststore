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



{if isset($group_attributes)}
<div class="wt_color">
<span>{l s='Color: ' mod='wtattributes'}</span> 
{$tam1='zero'}
<ul>
{foreach $group_attributes as $k=>$v}
	{if $v.group_name =='Color' || $v.group_name =='Couleur'}
			{if $tam1 != $v.attribute_name}
			<li style="background:{$v.attribute_color|escape:'quotes':'UTF-8'}"></li>
			{$tam1=$v.attribute_name}
			{/if}
{/if}
{/foreach}
</ul>
</div>
{/if}

{if isset($group_attributes)}
<div class="wt_size">
<span>{l s='Size: ' mod='wtattributes'}</span>  
{$tam='zero'}
<ul>

{foreach $group_attributes as $k=>$v}
	{if $v.group_name =='Size' || $v.group_name =='Taille'}
			{if $tam != $v.attribute_name}
			<li>{$v.attribute_name|escape:'quotes':'UTF-8'}</li>
			{$tam=$v.attribute_name}
			{/if}
	{/if}
{/foreach}

</ul>
</div>
{/if}

{if isset($group_attributes)}
<div class="wt_size">
<span>{l s='Size: ' mod='wtattributes'}</span>  
{$tam='zero'}
<ul>

{foreach $group_attributes as $k=>$v}
	{if $v.group_name =='Memory'}
			{if $tam != $v.attribute_name}
			<li>{$v.attribute_name|escape:'quotes':'UTF-8'}</li>
			{$tam=$v.attribute_name}
			{/if}
	{/if}
{/foreach}

</ul>
</div>
{/if}
