{**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License 3.0 (AFL-3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* https://opensource.org/licenses/AFL-3.0
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
* @author PrestaShop SA <contact@prestashop.com>
    * @copyright 2007-2018 PrestaShop SA
    * @license https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
    * International Registered Trademark & Property of PrestaShop SA
    *}
    {hook h='displayWrapperBottom'}
    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="logo-best" itemprop="description">
                        <img class="img-responsive" src="https://beststore.cl/version17/img/cms/logo_60_alt.png" alt="Best Store">
                    </div>
                    {block name='hook_footer_before'}
                    {hook h='displayFooterBefore'}
                    {/block}
                </div>
                <div class="col-md-8">
                    {block name='hook_footer'}
                    {hook h='displayFooter'}
                    {/block}
                    <div class="col-md-4 footer-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.8725115303523!2d-70.6111766853454!3d-33.42656798078073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c56ff42dce05%3A0x80d6070c8bdb1ed8!2sBest+Store!5e0!3m2!1ses-419!2scl!4v1539361530929" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

                
            </div>
            <div class="row">
                
            </div>
            <div class="row">
                {block name='hook_footer_after'}
                {hook h='displayFooterAfter'}
                {/block}
            </div>
        </div>
        <div class="container">
            <div class="bottom-footer">
                {hook h='displayBottomFooter'}
            </div>
            
        </div>
    </div>