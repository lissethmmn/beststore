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

<div class="panel">
	<h3><i class="icon-list-ul"></i> {l s='Category List' d='Modules.WTProductCategory.Admin'}
	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtproductcategory&id_wtgroupcategory={$id_wtgroupcategory|intval}&addcatitem=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	{if count($info_cat_item) > 0}
	<div id="slidesContent">
		<div id="slides">
			{foreach from=$info_cat_item item=info_cat}
				<div id="slides_{$info_cat.id_wtcategory|intval}" class="panel">
					<div class="row">
						<div class="col-md-2">
								<h4 class="pull-left">{$info_cat.cat_name|escape:'html':'UTF-8'}</h4>
						</div>
						<div class="col-md-2">
							<h4 class="pull-left" style="padding-right:10px">{l s='Style:' d='Modules.WTProductCategory.Admin'}</h4>
							<span style="background-color:{$info_cat.cat_color|escape:'html':'UTF-8'}; padding:10px"></span>
						</div>
						<div class="col-md-8">	
							<div class="btn-group-action pull-right">
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtproductcategory&id_wtgroupcategory={$info_cat.id_wtgroupcategory|intval}&id_wtcategory={$info_cat.id_wtcategory|intval}">
									<i class="icon-edit"></i>
									{l s='Edit' d='Modules.WTProductCategory.Admin'}
								</a>
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtproductcategory&id_wtgroupcategory={$info_cat.id_wtgroupcategory|intval}&delete_cat_item={$info_cat.id_wtcategory|intval}">
									<i class="icon-trash"></i>
									{l s='Delete' d='Modules.WTProductCategory.Admin'}
								</a>
								{$info_cat.status|escape:'quotes':'UTF-8'}
							</div>
						</div>
					</div>
				</div>
			{/foreach}
		</div>
	</div>
	{/if}
	<div class="panel-footer">
		<a href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtproductcategory" class="btn btn-default">
		<i class="process-icon-back"></i> Back to list</a>
	</div>
</div>
