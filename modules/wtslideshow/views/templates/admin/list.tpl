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

<div class="panel"><h3><i class="icon-list-ul"></i> {l s='Slideshow list' mod='wtslideshow'}
	<span class="panel-heading-action">
		<a id="desc-product-new" class="list-toolbar-btn" href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtslideshow&addSlide=1">
			<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Add new" data-html="true">
				<i class="process-icon-new "></i>
			</span>
		</a>
	</span>
	</h3>
	<div id="slidesContent">
		<div id="slides">
			{foreach from=$slides item=slide}
				<div id="slides_{$slide.id_wtslideshow|intval}" class="panel">
					<div class="row">
						<div class="col-md-1">
							<span><i class="icon-arrows "></i></span>
						</div>
						<div class="col-md-2">
							<img src="{$image_baseurl|escape:'html':'UTF-8'}thumbnail_{$slide.image|escape:'html':'UTF-8'}" alt="{$slide.title|escape:'html':'UTF-8'}" class="img-thumbnail" style="max-height:50px"/>
						</div>
						<div class="col-md-9">
							<h4 class="pull-left">#{$slide.id_wtslideshow|intval} - {$slide.title|escape:'html':'UTF-8'}</h4>
							<div class="btn-group-action pull-right">
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtslideshow&id_slide={$slide.id_wtslideshow|intval}">
									<i class="icon-edit"></i>
									{l s='Edit' mod='wtslideshow'}
								</a>
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtslideshow&delete_id_slide={$slide.id_wtslideshow|intval}">
									<i class="icon-trash"></i>
									{l s='Delete' mod='wtslideshow'}
								</a>
								<a class="btn btn-default"
									href="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=wtslideshow&id_slide={$slide.id_wtslideshow|intval}&addlayer=1">
									<i class="icon-layer"></i>
									{l s='Layers' mod='wtslideshow'}
								</a>
								{$slide.status|escape:'quotes':'UTF-8'}
							</div>
						</div>
					</div>
				</div>
			{/foreach}
		</div>
	</div>
</div>