<?php
/**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-webjquery.cookie, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    Codespot SA <support@presthemes.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

include_once _PS_MODULE_DIR_.'wtcouponpop/classes/WtCouponPopClass.php';
include_once _PS_MODULE_DIR_.'wtcouponpop/sql/SampleDataCounpon.php';
class WtCouponPop extends Module
{
	const GUEST_NOT_REGISTERED = -1;
	const CUSTOMER_NOT_REGISTERED = 0;
	const GUEST_REGISTERED = 1;
	const CUSTOMER_REGISTERED = 2;

	public $pathImage = '';
	public function __construct()
	{
		$this->name = 'wtcouponpop';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'waterthemes';
		$this->secure_key = Tools::encrypt('waterthemes'.$this->name);
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->l('WT CouponPop Module');
		$this->description = $this->l('WT CouponPop Module');
		$this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
		$this->pathImage = dirname(__FILE__).'/views/img/';
		$this->error = false;
		$this->valid = false;
	}
	public function install($keep = true)
	{
		Configuration::updateValue('WT_VOUCHER_CODE','SAVE20');
		if (!parent::install() || !$this->registerHook('displayHeader') || !$this->registerHook('displayFooter')) return false;
		if (!Configuration::updateGlobalValue('MOD_WT_COUPONPOP', '1')) return false;
		include(dirname(__FILE__).'/sql/install.php');
		$sample_data = new SampleDataCounpon();
			$sample_data->initData();
		return true;
	}

	public function uninstall($keep = true)
	{
		Configuration::deleteByName('WT_VOUCHER_CODE');
		
		include(dirname(__FILE__).'/sql/uninstall.php');
		if (!parent::uninstall()) return false;
		if (!Configuration::deleteByName('MOD_WT_COUPONPOP')) return false;
		return true;
	}
	public function reset()
	{
		if (!$this->uninstall(false))
			return false;
		if (!$this->install(false))
			return false;
		return true;
	}
	
	
	public function getBackgroundSrc($image = '', $check = false)
	{
		if ($image && file_exists($this->pathImage.$image))
			if (Tools::usingSecureMode())
				return _PS_BASE_URL_SSL_.__PS_BASE_URI__.'modules/'.$this->name.'/views/img/'.$image;
			else
				return _PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/views/img/'.$image;
		else
			if ($check == true)
				return '';
			else
				if (Tools::usingSecureMode())
					return _PS_BASE_URL_SSL_.__PS_BASE_URI__.'modules/'.$this->name.'/views/img/default.jpg';
				else
					return _PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/views/img/default.jpg';
	}
	public function getLangOptions($id_lang = 0)
	{
		if ((int)$id_lang == 0) $id_lang = Context::getContext()->language->id;
		$items = DB::getInstance()->executeS('Select id_lang, name, iso_code From '._DB_PREFIX_.'lang Where active = 1');
		$options = '';
		if ($items)
		{
			foreach ($items as $item)
			{
				if ($item['id_lang'] == $id_lang)
					$options .= '<option value="'.$item['id_lang'].'" selected="selected">'.$item['name'].'</option>';
				else
					$options .= '<option value="'.$item['id_lang'].'">'.$item['name'].'</option>';
			}
		}
		return $options;
	}
	public function getAllLangs()
	{
		return $items = DB::getInstance()->executeS('Select id_lang, name, iso_code From '._DB_PREFIX_.'lang Where active = 1 Order By id_lang');
	}

	public function getContent()
	{
		return $this->postProcess().$this->initForm();
	}
	public function postProcess()
	{		
		if (Tools::isSubmit('saveCoupon'))
		{
			$languageDefault = Configuration::get('PS_LANG_DEFAULT');
			$languages = Language::getLanguages(false);
			Configuration::updateValue('WT_VOUCHER_CODE', Tools::getValue('wt_voucher_code'));
			$coupon = new WtCouponPopClass(Tools::getValue('id_wtcouponpop'));
			$coupon->cookies_time = Tools::getValue('cookies_time');
			$coupon->active = Tools::getValue('active');
			if ($coupon->validateFields(false) && $coupon->validateFieldsLang(false))
			{
				foreach ($languages as $lang)
				{
					$coupon->content[$lang['id_lang']] = Tools::getValue('content_'.$lang['id_lang']);
					
					if (isset($_FILES['background_'.$lang['id_lang']]) && isset($_FILES['background_'.$lang['id_lang']]['tmp_name']) && !empty($_FILES['background_'.$lang['id_lang']]['tmp_name']))
					{
						$id_shop = $this->context->shop->id;
						if ($error = ImageManager::validateUpload($_FILES['background_'.$lang['id_lang']]))
							return false;
						elseif (!($tmpName = tempnam(_PS_TMP_IMG_DIR_, 'PS')) || !move_uploaded_file($_FILES['background_'.$lang['id_lang']]['tmp_name'], $tmpName))
							return false;
						elseif (!ImageManager::resize($tmpName, dirname(__FILE__).'/views/img/coupon-'.$id_shop.'-'.$lang['id_lang'].'.jpg'))
							return false;
						unlink($tmpName);
						$coupon->background[$lang['id_lang']] = 'coupon-'.$id_shop.'-'.$lang['id_lang'].'.jpg';
					}
					
				}
				if (!$coupon->update())
					return $this->displayError($this->l('The slide could not be updated.'));
				Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
			}
			else
				return '<div class="conf error">'.$this->l('An error occurred while attempting to save.').'</div>';
			
		}
	}
	public function initForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$id_wtcouponpop = 1;
		if ($id_wtcouponpop)
			$coupon = new WtCouponPopClass((int)$id_wtcouponpop);
		else
			$coupon = new WtCouponPopClass();
		
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Coupon Popup'),
			),
			'input' => array(
				array(
					'type' => 'textarea',
					'label' => $this->l('Content:'),
					'lang' => true,
					'name' => 'content',
					'autoload_rte' => true,
					'cols' => 40,
					'rows' => 10
				),
				array(
					'type' => 'file_lang',
					'label' => $this->l('Background:'),
					'name' => 'background',
					'lang' => true
				),
				array(
						'type' => 'text',
						'label' => $this->l('Voucher Code:'),
						'lang' => false,
						'name' => 'wt_voucher_code',
					),		
				array(
					'type' => 'text',
					'label' => $this->l('Cookies time:'),
					'name' => 'cookies_time'
				),
				array(
						'type' => 'switch',
						'label' => $this->l('Displayed'),
						'name' => 'active',
						'values' => array(
									array(
										'id' => 'active_on',
										'value' => 1,
										'label' => $this->l('Enabled')
									),
									array(
										'id' => 'active_off',
										'value' => 0,
										'label' => $this->l('Disabled')
									)
						),
				),
			),
			'submit' => array(
				'title' => $this->l('Save')
			)
		);
		
		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = 'wtcouponpop';
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		foreach (Language::getLanguages(false) as $lang)
			$helper->languages[] = array(
				'id_lang' => $lang['id_lang'],
				'iso_code' => $lang['iso_code'],
				'name' => $lang['name'],
				'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
			);
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->toolbar_scroll = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'saveCoupon';
		$helper->toolbar_btn = array(
			'save' =>
			array(
				'desc' => $this->l('Save'),
				'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			)
		);
		foreach (Language::getLanguages(false) as $lang)
		{
			$helper->fields_value['content'][(int)$lang['id_lang']] = Tools::getValue('content_'.(int)$lang['id_lang'], $coupon->content[(int)$lang['id_lang']]);
			$helper->fields_value['background'][(int)$lang['id_lang']] = Tools::getValue('background_'.(int)$lang['id_lang'], $coupon->background[(int)$lang['id_lang']]);
		}
			
		if (Tools::getValue('active', $coupon->active) != '')
			$active = Tools::getValue('active', $coupon->active);
		else
			$active = 1;
		$helper->fields_value['active'] = $active;
		
		
		$helper->fields_value['wt_voucher_code'] = Configuration::get('WT_VOUCHER_CODE');
		
		if (Tools::getValue('cookies_time', $coupon->cookies_time) != '')
			$cookies_time = Tools::getValue('cookies_time', $coupon->cookies_time);
		else
			$cookies_time = 864000;
		
		$helper->fields_value['cookies_time'] = $cookies_time;
		if ($id_wtcouponpop)
		{
			$this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_wtcouponpop');
			$helper->fields_value['id_wtcouponpop'] = (int)Tools::getValue('id_wtcouponpop', $coupon->id_wtcouponpop);	
		}
		
		$helper->tpl_vars = array(
			'uri' => $this->getPathUri(),
			'fields_value' => $helper->fields_value,
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper->generateForm($this->fields_form);
	}
	
	public function hookdisplayHeader()
	{
		$this->context->controller->addCSS(($this->_path).'views/css/wtcouponpop.css');
		$this->context->controller->addJS(($this->_path).'views/js/wtcouponpop.js');
	}
	
	protected function _prepareHook($params)
	{
		if (Tools::isSubmit('submitNewsletter'))
		{
			$email = Tools::getValue('email');
			$action = Tools::getValue('action');
			$this->newsletterRegistration();
			if ($this->error)
			{
				$this->smarty->assign(
					array(
						'color' => 'red',
						'msg' => $this->error,
						'nw_value' => isset($email) ? pSQL($email) : false,
						'nw_error' => true,
						'action' => $action
					)
				);
			}
			else if ($this->valid)
			{
				$this->smarty->assign(
					array(
						'color' => 'green',
						'msg' => $this->valid,
						'nw_error' => false
					)
				);
			}
		}
		$this->smarty->assign('this_path', $this->_path);
	}
	protected function newsletterRegistration()
	{
		$email = Tools::getValue('email');
		$action = Tools::getValue('action');
		if (empty($email) || !Validate::isEmail($email))
			return $this->error = $this->l('Invalid email address.');

		/* Unsubscription */
		else if ($action == '1')
		{
			$register_status = $this->isNewsletterRegistered($email);

			if ($register_status < 1)
				return $this->error = $this->l('This email address is not registered.');

			if (!$this->unregister($email, $register_status))
				return $this->error = $this->l('An error occurred while attempting to unsubscribe.');

			return $this->valid = $this->l('Unsubscription successful.');
		}
		/* Subscription */
		else if ($action == '0')
		{
			$register_status = $this->isNewsletterRegistered($email);
			if ($register_status > 0)
				return $this->error = $this->l('This email address is already registered.');

			$email = pSQL($email);
			if (!$this->isRegistered($register_status))
			{
				if (Configuration::get('NW_VERIFICATION_EMAIL'))
				{
					// create an unactive entry in the newsletter database
					if ($register_status == self::GUEST_NOT_REGISTERED)
						$this->registerGuest($email, false);

					if (!$token = $this->getToken($email, $register_status))
						return $this->error = $this->l('An error occurred during the subscription process.');

					//$this->sendVerificationEmail($email, $token);

					return $this->valid = $this->l('A verification email has been sent. Please check your inbox.');
				}
				else
				{
					if ($this->register($email, $register_status))
						$this->valid = $this->l('You have successfully subscribed to this newsletter.');
					else
						return $this->error = $this->l('An error occurred during the subscription process.');

					//if ($code = Configuration::get('WT_VOUCHER_CODE'))
						//$this->sendVoucher($email, $code);

					//if (Configuration::get('NW_CONFIRMATION_EMAIL'))
						//$this->sendConfirmationEmail($email);
				}
			}
		}
	}
	

	
	public function hookdisplayFooter()
	{
		$page_name = Dispatcher::getInstance()->getController();
		if ($page_name != 'index') return false;
		if (isset(Context::getContext()->cookie->notshow))
			$notshow = Context::getContext()->cookie->notshow;
		else
			$notshow = 0;
		if (isset(Context::getContext()->cookie->show_voucher))
			$show_voucher = Context::getContext()->cookie->show_voucher;
		else
			$show_voucher = 0;
		if (isset(Context::getContext()->cookie->cookies_time))
			$cookies_time = Context::getContext()->cookie->cookies_time;	
		else
			$cookies_time = 0;
		
		if ($notshow >= 0)
		{
			
				$id_lang = (int)Context::getContext()->language->id;
				$id_shop = (int)Context::getContext()->shop->id;
				
				$sql = 'SELECT cpl.*, cps.*
						FROM `'._DB_PREFIX_.'wtcouponpop` cp
						LEFT JOIN `'._DB_PREFIX_.'wtcouponpop_shop` cps ON (cp.`id_wtcouponpop` = cps.`id_wtcouponpop`)
						LEFT JOIN `'._DB_PREFIX_.'wtcouponpop_lang` cpl ON (cps.`id_wtcouponpop` = cpl.`id_wtcouponpop`)	
						WHERE cpl.`id_shop` = '.$id_shop.' AND cpl.`id_lang` = '.$id_lang.' AND cp.`id_wtcouponpop` = 1';
				$item = DB::getInstance()->getRow($sql);	
				if ($item)
					if ($item['background']) $item['background'] = $this->getBackgroundSrc($item['background'], true);
				else
					$item = array();
				if (Tools::usingSecureMode())
					$wt_coupon_url = _PS_BASE_URL_SSL_.__PS_BASE_URI__.'modules/'.$this->name;
				else
					$wt_coupon_url = _PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name;
				
				if ($code = Configuration::get('WT_VOUCHER_CODE'))
					$voucher_code = $code;
				else
					$voucher_code = '';
				
				$this->context->smarty->assign(
				array(
					'newsletter_setting' => $item,
					'wt_coupon_url' => $wt_coupon_url,
					'voucher_code' => $voucher_code,
					'show_voucher' => $show_voucher,
					'cookies_time' => $cookies_time
					)
				);
			
			return $this->display(__FILE__, 'wtcouponpop.tpl');
		}
		else
			return false;
	}
	public function clearCache($name = null)
	{
		parent::_clearCache('wtcouponpop.tpl');
	}

	protected function isNewsletterRegistered($customer_email)
	{
		$sql = 'SELECT `email`
				FROM '._DB_PREFIX_.'emailsubscription
				WHERE `email` = \''.pSQL($customer_email).'\'
				AND id_shop = '.$this->context->shop->id;

		if (Db::getInstance()->getRow($sql))
			return self::GUEST_REGISTERED;
	
		$sql = 'SELECT `newsletter`
				FROM '._DB_PREFIX_.'customer
				WHERE `email` = \''.pSQL($customer_email).'\'
				AND id_shop = '.$this->context->shop->id;

		if (!$registered = Db::getInstance()->getRow($sql))
			return self::GUEST_NOT_REGISTERED;
		

		if ($registered['newsletter'] == '1')
			return self::CUSTOMER_REGISTERED;
		
		return self::CUSTOMER_NOT_REGISTERED;
	}
	protected function unregister($email, $register_status)
	{
		$email = Tools::getValue('email');
		if ($register_status == self::GUEST_REGISTERED)
			$sql = 'DELETE FROM '._DB_PREFIX_.'emailsubscription WHERE `email` = \''.pSQL($email).'\' AND id_shop = '.$this->context->shop->id;
		else if ($register_status == self::CUSTOMER_REGISTERED)
			$sql = 'UPDATE '._DB_PREFIX_.'customer SET `newsletter` = 0 WHERE `email` = \''.pSQL($email).'\' AND id_shop = '.$this->context->shop->id;

		if (!isset($sql) || !Db::getInstance()->execute($sql))
			return false;

		return true;
	}
	protected function isRegistered($register_status)
	{
		return in_array(
			$register_status,
			array(self::GUEST_REGISTERED, self::CUSTOMER_REGISTERED)
		);
	}
	protected function registerGuest($email, $active = true)
	{
		$sql = 'INSERT INTO '._DB_PREFIX_.'emailsubscription (id_shop, id_shop_group, email, newsletter_date_add, ip_registration_newsletter, http_referer, active)
				VALUES
				('.$this->context->shop->id.',
				'.$this->context->shop->id_shop_group.',
				\''.pSQL($email).'\',
				NOW(),
				\''.pSQL(Tools::getRemoteAddr()).'\',
				(
					SELECT c.http_referer
					FROM '._DB_PREFIX_.'connections c
					WHERE c.id_guest = '.(int)$this->context->customer->id.'
					ORDER BY c.date_add DESC LIMIT 1
				),
				'.(int)$active.'
				)';

		return Db::getInstance()->execute($sql);
	}
	protected function getToken($email, $register_status)
	{
		if (in_array($register_status, array(self::GUEST_NOT_REGISTERED, self::GUEST_REGISTERED)))
		{
			$sql = 'SELECT MD5(CONCAT( `email` , `newsletter_date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) as token
					FROM `'._DB_PREFIX_.'newsletter`
					WHERE `active` = 0
					AND `email` = \''.pSQL($email).'\'';
		}
		else if ($register_status == self::CUSTOMER_NOT_REGISTERED)
		{
			$sql = 'SELECT MD5(CONCAT( `email` , `date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\' )) as token
					FROM `'._DB_PREFIX_.'customer`
					WHERE `newsletter` = 0
					AND `email` = \''.pSQL($email).'\'';
		}

		return Db::getInstance()->getValue($sql);
	}
	public function newsletterRegistrationAjax()
	{
		$response = new stdClass();
		$response->status = 0;
		$email = Tools::getValue('email');
		$action = Tools::getValue('action');
		
		if (empty($email) || !Validate::isEmail($email))
			return $this->l('Invalid email address.');
		else if ($action == '1')/* Unsubscription */
		{
			
			$register_status = $this->isNewsletterRegistered($email);

			if ($register_status < 1)
				return $this->l('This email address is not registered.');

			if (!$this->unregister($email, $register_status))
				return $this->l('An error occurred while attempting to unsubscribe.');

			return $this->l('Unsubscription successful.');
		}
		else if ($action == '0')/* Subscription */
		{
			
			$register_status = $this->isNewsletterRegistered($email);
			
			if ($register_status > 0)
				return $this->l('This email address is already registered.');
			
			$email = pSQL($email);
			if (!$this->isRegistered($register_status))
			{
				/*if (Configuration::get('NW_VERIFICATION_EMAIL'))
				{
					if ($register_status == self::GUEST_NOT_REGISTERED)
						$this->registerGuest($email, false);
					if (!$token = $this->getToken($email, $register_status))
						return $this->l('An error occurred during the subscription process.');
					$this->sendVerificationEmail($email, $token);
					return $this->l('A verification email has been sent. Please check your inbox.');
				}*/
				//else
				//{
					if (!$this->register($email, $register_status))
						return $this->l('An error occurred during the subscription process.');
					else
					{
						//if ($code = Configuration::get('WT_VOUCHER_CODE'))
							//$this->sendVoucher($email, $code);
						//if (Configuration::get('NW_CONFIRMATION_EMAIL'))
							//$this->sendConfirmationEmail($email);
						return 'sussess@'.$this->l('You have successfully subscribed to this newsletter.');
					}	
				//}
			}
			else
				return $this->l('You have not subscribed to this newsletter.');
		}
	}
	protected function sendConfirmationEmail($email)
	{
		return Mail::Send($this->context->language->id, 'newsletter_conf', Mail::l('Newsletter confirmation', $this->context->language->id), array(), pSQL($email), null, null, null, null, null, _PS_ROOT_DIR_.'/modules/blocknewsletter/mails/', false, $this->context->shop->id);
	}
	protected function sendVoucher($email, $code)
	{
		return Mail::Send($this->context->language->id, 'newsletter_voucher', Mail::l('Newsletter voucher', $this->context->language->id), array('{discount}' => $code), $email, null, null, null, null, null, _PS_ROOT_DIR_.'/modules/blocknewsletter/mails/', false, $this->context->shop->id);
	}
	protected function register($email, $register_status)
	{
		if ($register_status == self::GUEST_NOT_REGISTERED)
			return $this->registerGuest($email);

		if ($register_status == self::CUSTOMER_NOT_REGISTERED)
			return $this->registerUser($email);

		return false;
	}
	protected function registerUser($email)
	{
		$sql = 'UPDATE '._DB_PREFIX_.'customer
				SET `newsletter` = 1, newsletter_date_add = NOW(), `ip_registration_newsletter` = \''.pSQL(Tools::getRemoteAddr()).'\'
				WHERE `email` = \''.pSQL($email).'\'
				AND id_shop = '.$this->context->shop->id;

		return Db::getInstance()->execute($sql);
	}
	protected function sendVerificationEmail($email, $token)
	{
		$verif_url = Context::getContext()->link->getModuleLink('wtcouponpop', 'verification', array('token' => $token,));
		return Mail::Send($this->context->language->id, 'newsletter_verif', Mail::l('Email verification', $this->context->language->id), array('{verif_url}' => $verif_url), $email, null, null, null, null, null, _PS_ROOT_DIR_.'/modules/blocknewsletter/mails/', false, $this->context->shop->id);
	}
	protected function getGuestEmailByToken($token)
	{
		$sql = 'SELECT `email`
				FROM `'._DB_PREFIX_.'emailsubscription`
				WHERE MD5(CONCAT( `email` , `newsletter_date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) = \''.pSQL($token).'\'
				AND `active` = 0';

		return Db::getInstance()->getValue($sql);
	}
	public function activateGuest($email)
	{
		return Db::getInstance()->execute(
			'UPDATE `'._DB_PREFIX_.'emailsubscription`
						SET `active` = 1
						WHERE `email` = \''.pSQL($email).'\''
		);
	}
	protected function getUserEmailByToken($token)
	{
		$sql = 'SELECT `email`
				FROM `'._DB_PREFIX_.'customer`
				WHERE MD5(CONCAT( `email` , `date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) = \''.pSQL($token).'\'
				AND `newsletter` = 0';

		return Db::getInstance()->getValue($sql);
	}
	public function confirmEmail($token)
	{
		$activated = false;
		if ($email = $this->getGuestEmailByToken($token))
			$activated = $this->activateGuest($email);
		else if ($email = $this->getUserEmailByToken($token))
			$activated = $this->registerUser($email);

		if (!$activated)
			return $this->l('This email is already registered and/or invalid.');

		if ($discount = Configuration::get('WT_VOUCHER_CODE'))
			$this->sendVoucher($email, $discount);

		if (Configuration::get('NW_CONFIRMATION_EMAIL'))
			$this->sendConfirmationEmail($email);

		return $this->l('Thank you for subscribing to our newsletter.');
	}
}