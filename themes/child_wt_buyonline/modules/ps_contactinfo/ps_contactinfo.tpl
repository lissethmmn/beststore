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

<div class="block-contact links wrapper">
  
  
  <div class="title clearfix hidden-md-up" data-target="#footer_information">
    <span class="h3">{l s='Información de la Tienda' d='Shop.Theme'}</span>
    <span class="pull-xs-right">
      <!--<span class="navbar-toggler collapse-icons">
        <i class="material-icons add">&#xE313;</i>
        <i class="material-icons remove">&#xE316;</i>
      </span>-->
    </span>
  </div>
  
  <div class="account-list" id="footer_information">
     {hook h='displayLeftLogo'}
	 <i class="material-icons">home</i>
      <!--{$contact_infos.address.formatted nofilter}
      {$contact_infos.company}<br/>-->
      <span>{$contact_infos.address.address1}, Providencia</span>
      <!--<span class="footer-contact">{$contact_infos.address.city} - {$contact_infos.address.country}</span>-->
	  {if $contact_infos.phone}
        <br>
		<i class="material-icons">phone</i>
        {* [1][/1] is for a HTML tag. *}
        {l s='Fono: [1]%phone%[/1]'
          sprintf=[
          '[1]' => '<span>',
          '[/1]' => '</span>',
          '%phone%' => $contact_infos.phone
          ]
          d='Shop.Theme'
        }
		
      {/if}
	  
      {if $contact_infos.fax}
	 
        <br>
        {* [1][/1] is for a HTML tag. *}
        {l
          s='Fax: [1]%fax%[/1]'
          sprintf=[
            '[1]' => '<span>',
            '[/1]' => '</span>',
            '%fax%' => $contact_infos.fax
          ]
          d='Shop.Theme'
        }
		
      {/if}
	  
      {if $contact_infos.email}
	
	<br>
	<i class="material-icons">email</i>
        {* [1][/1] is for a HTML tag. *}
        {l
          s='Email: [1]%email%[/1]'
          sprintf=[
            '[1]' => '<span>',
            '[/1]' => '</span>',
            '%email%' => $contact_infos.email
          ]
          d='Shop.Theme'
        }
		
      {/if}
	  
  </div>
 
</div>
