<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    knowband.com <support@knowband.com>
 * @copyright 2017 Knowband
 * @license   see file: LICENSE.txt
 * @category  PrestaShop Module
 */

require_once 'SupercheckoutCore.php';

class SupercheckoutSupercheckoutModuleFrontController extends SupercheckoutCore
{
    public function postProcess()
    {
        parent::postProcess();

        //Handle Ajax request
        if (Tools::isSubmit('ajax')) {
            $this->json = array();
            if (Tools::isSubmit('method') && Tools::getValue('method') == 'saveAddress') {
                $this->json = $this->saveAddress();
            } else if (Tools::isSubmit($this->name.'PlaceOrder')) {
                $this->json = $this->confirmOrder();
            } elseif (Tools::isSubmit('SubmitLogin')) {
                $this->processSubmitLogin();
            } elseif (Tools::isSubmit('submitDiscount')) {
                if ($this->nb_products) {
                    $this->json = $this->addCartRule();
                } else {
                    $this->json['error'] = $this->module->l('Your cart is empty.');
                }
            } elseif (Tools::isSubmit('deleteDiscount')) {
                if ($this->nb_products) {
                    $this->json = $this->removeDiscount();
                } else {
                    $this->json['error'] = $this->module->l('Your cart is empty.');
                }
            } elseif (Tools::isSubmit('method')) {
                switch (Tools::getValue('method')) {
                    case 'checkDniandVat':
                        $this->json = $this->checkForDniandVat(Tools::getValue('id_country'));
                        break;
                    case 'isValidDni':
                        $this->json = $this->isValidDni(Tools::getValue('dni'));
                        break;
                    case 'isValidVatNumber':
                        $this->json = $this->isValidVatNumber(Tools::getValue('vat_number'));
                        break;
                    case 'loadInvoiceAddress':
                        $this->json = $this->loadInvoiceAddress(
                            Tools::getValue('id_country'),
                            Tools::getValue('id_state'),
                            Tools::getValue('postcode'),
                            Tools::getValue('id_address_invoice')
                        );
                        break;
                    case 'loadCarriers':
                        $this->json = $this->loadCarriers(
                            Tools::getValue('id_country'),
                            Tools::getValue('id_state'),
                            Tools::getValue('postcode'),
                            (int) Tools::getValue('id_address_delivery')
                        );
                        break;
                    case 'setSameInvoice':
                        $this->context->cookie->isSameInvoiceAddress = Tools::getValue('use_for_invoice') == 1 ? 1 : 0;
                        $this->context->cookie->write();
                        $this->json = array();
                        break;
                    case 'updateCarrier':
                        $this->json = $this->updateCarrier();
                        break;
                    case 'loadCart':
                        $this->json = $this->loadCart();
                        break;
                    case 'loadPayment':
                        $selected_payment_method = $this->default_payment_selected;
                        if (Tools::getIsset('selected_payment_method_id')) {
                            $selected_payment_method = Tools::getValue('selected_payment_method_id', 0);
                        }
                        $this->json = $this->loadPaymentMethods($selected_payment_method);
                        break;
                    case 'loadPaymentAdditionalInfo':
                        $this->json = $this->loadPaymentAdditionalInfo();
                        break;
                    case 'checkZipCode':
                        $this->json = $this->checkZipCode(Tools::getValue('id_country'), Tools::getValue('postcode'));
                        break;
                    case 'createFreeOrder':
                        $this->json = $this->createFreeOrder();
                        break;
                    case 'addEmailToList':
                        $this->addEmailToList(Tools::getValue('email'));
                        break;
                    case 'updateDeliveryExtra':
                        $this->json = $this->updateDeliveryExtra();
                        break;
                }
            }
            if (Tools::getValue('paypal_ec_canceled') == 1 || Tools::isSubmit('paypal_ec_canceled')) {
                Tools::redirect(
                    $this->context->link->getModuleLink(
                        'supercheckout',
                        'supercheckout',
                        array(),
                        (bool) Configuration::get('PS_SSL_ENABLED')
                    )
                );
            }

            echo Tools::jsonEncode($this->json);
            die;
        } elseif (Tools::isSubmit('mylogout')) {
            $this->context->customer->mylogout();
            Tools::redirect('index.php');
        } elseif (Tools::isSubmit('myfbLogin') || Tools::isSubmit('myGoogleLogin')) {
            if (Tools::isSubmit('myfbLogin')) {
                $this->social_login_type = 'fb';
            } elseif (Tools::isSubmit('myGoogleLogin')) {
                $this->social_login_type = 'google';
            }

            $user_data_from_social = $this->socialLogin();

            if (count($user_data_from_social) > 0) {
                if ($this->loggedInCustomer($user_data_from_social)) {
                    if ($this->supercheckout_settings['social_login_popup']['enable'] == 1) {
                        echo '<script>window.opener.location.reload(true);window.close();</script>';
                    } else {
                        Tools::redirect(
                            $this->context->link->getModuleLink(
                                'supercheckout',
                                'supercheckout',
                                array(),
                                (bool) Configuration::get('PS_SSL_ENABLED')
                            )
                        );
                    }
                }
            }
        } elseif (Tools::isSubmit('code')) {
            if (Tools::isSubmit('login_type') && Tools::getValue('login_type') == 'fb') {
                $this->social_login_type = 'fb';
            } elseif (Tools::isSubmit('login_type') && Tools::getValue('login_type') == 'google') {
                $this->social_login_type = 'google';
            }

            $user_data_from_social = $this->socialLogin();

            if (count($user_data_from_social) > 0) {
                if ($this->loggedInCustomer($user_data_from_social)) {
                    if ($this->supercheckout_settings['social_login_popup']['enable'] == 1) {
                        echo '<script>window.opener.location.reload(true);window.close();</script>';
                    } else {
                        Tools::redirect(
                            $this->context->link->getModuleLink(
                                'supercheckout',
                                'supercheckout',
                                array(),
                                (bool) Configuration::get('PS_SSL_ENABLED')
                            )
                        );
                    }
                }
            }
        }
    }

    public function saveAddress()
    {
        $response = array();
        $posted_data = $_POST;
        $continue = 1;
        $condition_result = ($this->context->customer->id && Customer::customerIdExistsStatic((int)$this->context->cookie->id_customer));
        $islogged = (bool)$condition_result;
        if ($this->nb_products > 0) {
            if ($this->is_logged) {
                $id_customer = $this->context->customer->id;
            } else if ($islogged && $this->context->cookie->is_guest) {
                $id_customer = (int)$this->context->cookie->id_customer;
            } else {
                $id_customer = 0;
            }

            $delivery_address = null;
            $invoice_address = null;

            $id_delivery_address = 0;
            if ((isset($posted_data['shipping_address_value']) && $posted_data['shipping_address_value'] == 1)
                || !isset($posted_data['shipping_address_value'])) {
                if (isset($this->context->cookie->supercheckout_temp_address_delivery)
                    && $this->context->cookie->supercheckout_temp_address_delivery > 0) {
                    $id_delivery_address = $this->context->cookie->supercheckout_temp_address_delivery;
                }
            } else if (isset($posted_data['shipping_address_value']) && $posted_data['shipping_address_value'] == 0
                && isset($posted_data['shipping_address_id'])) {
                $id_delivery_address = $posted_data['shipping_address_id'];
            }

            $id_invoice_address = 0;
            if (isset($posted_data['use_for_invoice'])) {
                $id_invoice_address = $id_delivery_address;
            } else if (((isset($posted_data['payment_address_value']) && $posted_data['payment_address_value'] == 1)
                || !isset($posted_data['payment_address_value']))) {
                if (isset($this->context->cookie->supercheckout_temp_address_invoice)
                    && $this->context->cookie->supercheckout_temp_address_invoice > 0) {
                    $id_invoice_address = $this->context->cookie->supercheckout_temp_address_invoice;
                } else {
                    $temp_invoice_address = new Address();
                    $temp_country_var = new Country((int)Configuration::get('PS_COUNTRY_DEFAULT'));

                    $temp_invoice_address->firstname = ' ';
                    $temp_invoice_address->lastname = ' ';
                    $temp_invoice_address->company = ' ';
                    $temp_invoice_address->address1 = ' ';
                    $temp_invoice_address->address2 = ' ';
                    $temp_invoice_address->phone_mobile = ' ';
                    $temp_invoice_address->vat_number = ' ';
                    $temp_invoice_address->city = ' ';
                    $temp_invoice_address->postcode = 0;
                    $temp_invoice_address->phone = ' ';
                    $temp_invoice_address->alias = $this->module->l('Address Alias').' - '.date('s').rand(0, 9);
                    $temp_invoice_address->other = ' ';
                    $temp_invoice_address->id_country = (int)Configuration::get('PS_COUNTRY_DEFAULT');
                    $temp_invoice_address->id_state = 0;

                    if ($temp_invoice_address->dni == '' && in_array('dni', AddressFormat::getFieldsRequired())) {
                        $temp_invoice_address->dni = '-';
                    }
                    if (!$temp_invoice_address->save()) {
                        $response['error']['general'][] = $this->module->l('Error occurred while creating new address');
                    }
                    $id_invoice_address = $temp_invoice_address->id;
                    $this->context->cookie->supercheckout_temp_address_invoice = $id_invoice_address;
                }
            } else if (!isset($posted_data['use_for_invoice']) && isset($posted_data['payment_address_value'])
                && $posted_data['payment_address_value'] == 0) {
                $id_invoice_address = $posted_data['payment_address_id'];
            }

            //////////////////////////Start - Plugin Validations //////////////////////////

            //Set User Type and password according to user type
            $check_new_password = 0;
            if (isset($posted_data['checkout_option']) && $posted_data['checkout_option'] != 0) {
                $checkout_option = 1;
                $check_new_password = $posted_data['checkout_option'];
            } else {
                $checkout_option = 0;
            }

            $user_type = ($checkout_option == 0) ? 'logged' : 'guest';

            if (!$this->is_logged) {
                $email = $posted_data['supercheckout_email'];

                if ($email == '') {
                    $response['error']['checkout_option'][] = array('key' => 'supercheckout_email',
                        'error' => $this->module->l('An email address required.'));
                } else if (!Validate::isEmail($email)) {
                    $response['error']['checkout_option'][] = array('key' => 'supercheckout_email',
                        'error' => $this->module->l('Invalid email address.'));
                } else if (Customer::customerExists($email) && isset($posted_data['checkout_option']) && $posted_data['checkout_option'] != 1) {
                    $response['error']['checkout_option'][] = array('key' => 'supercheckout_email',
                        'error' => $this->module->l('This customer is already exist'));
                }

                //Customer Personal Information
                foreach ($posted_data['customer_personal'] as $key => $value) {
                    if ($key != 'dob_days' && $key != 'dob_months' && $key != 'dob_years') {
                        if ($key == 'password') {
                            if ($check_new_password == 2) {
                                $new_password = $posted_data['customer_personal'][$key];
                                if ($new_password == '') {
                                    $response['error']['customer_personal'][] = array('key' => $key,
                                        'error' => $this->module->l('Password is required.'));
                                } else if (!(Tools::strlen($new_password) >= $this->password_length && Tools::strlen($new_password) < 255)) {
                                    $response['error']['customer_personal'][] = array('key' => $key,
                                        'error' => sprintf($this->module->l('Invalid Password'), Validate::PASSWORD_LENGTH));
                                }
                            }
                        } else {
                            if (isset($this->supercheckout_settings['customer_personal'][$key][$user_type]['require'])
                                && $this->supercheckout_settings['customer_personal'][$key][$user_type]['require'] == 1
                                && !isset($posted_data['customer_personal'][$key])) {
                                $response['error']['customer_personal'][] = array('key' => $key,
                                    'error' => $this->module->l('Required Field'));
                            }
                        }
                    }
                }
                $check_dob = false;
                if (isset($posted_data['customer_personal']['dob_days'])
                    && isset($posted_data['customer_personal']['dob_months'])
                    && isset($posted_data['customer_personal']['dob_years'])) {
                    if ($this->supercheckout_settings['customer_personal']['dob'][$user_type]['require'] == 1 && $checkout_option == 1) {
                        $check_dob = true;
                        $birthday = (((empty($posted_data['customer_personal']['dob_years'])) ? '' : (int)$posted_data['customer_personal']['dob_years'])
                            .'-'.((empty($posted_data['customer_personal']['dob_months'])) ? '' : (int)$posted_data['customer_personal']['dob_months'])
                            .'-'.((empty($posted_data['customer_personal']['dob_days'])) ? '' : (int)$posted_data['customer_personal']['dob_days']));
                        if (empty($birthday)) {
                            $response['error']['customer_personal'][] = array('key' => 'dob', 'error' => $this->module->l('Required Field'));
                        } else if (!Validate::isBirthDate($birthday)) {
                            $response['error']['customer_personal'][] = array('key' => 'dob', 'error' => $this->module->l('Invalid date of birth'));
                        }
                    }
                }
            } else {
                $checkout_option = 0;
            }

            $shipping_address_value = 1;
            if (isset($posted_data['shipping_address_value'])) {
                $shipping_address_value = $posted_data['shipping_address_value'];
            }

            $loop_index = 0;
            if (!$this->context->cart->isVirtualCart() && $shipping_address_value == 1) {
                foreach ($posted_data['shipping_address'] as $key => $value) {
                    $add_plugin_config = $this->supercheckout_settings['shipping_address'][$key];
                    if ($add_plugin_config[$user_type]['require'] == 1 && $posted_data['shipping_address'][$key] == '') {
                        if ($key == 'dni') {
                            $country = new Country($posted_data['shipping_address']['id_country']);
                            if ($country->isNeedDni()) {
                                $response['error']['shipping_address'][$loop_index] = array('key' => $key, 'error' => $this->module->l('Required Field'));
                            }
                        } else {
                            $response['error']['shipping_address'][$loop_index] = array('key' => $key, 'error' => $this->module->l('Required Field'));
                        }
                    }
                    if (($key == 'phone_mobile' || $key == 'phone') && !empty($posted_data['shipping_address'][$key])
                        && !(boolean)Validate::isPhoneNumber($posted_data['shipping_address'][$key])) {
                        $response['error']['shipping_address'][$loop_index] = array('key' => $key, 'error' => $this->module->l('Invalid phone number'));
                    }
                    if ($key == 'id_country') {
                        $country = new Country($posted_data['shipping_address'][$key]);
                        if ($posted_data['shipping_address'][$key] == 0) {
                            $response['error']['shipping_address'][$loop_index] = array('key' => $key,
                                'error' => $this->module->l('Required Field'));
                        } else if (!$country->active) {
                            $response['error']['shipping_address'][$loop_index] = array('key' => $key,
                                'error' => $this->module->l('This country is not active'));
                        } else if ((int)$country->contains_states && (isset($posted_data['shipping_address']['id_state'])
                            && !(int)$posted_data['shipping_address']['id_state'])) {
                            $response['error']['shipping_address'][$loop_index] = array('key' => $key,
                                'error' => $this->module->l('This country requires you to chose a State'));
                        }
                        if (isset($posted_data['shipping_address']['postcode']) && !empty($posted_data['shipping_address']['postcode'])
                            && $postcode_error = $this->checkZipForCountry($country, $posted_data['shipping_address']['postcode'], true)) {
                            $response['error']['shipping_address'][$loop_index] = $postcode_error;
                        }

                        if ($this->supercheckout_settings['shipping_address']['dni'][$user_type]['require'] == 1 && $country->isNeedDni() && !empty($posted_data['shipping_address']['dni'])) {
                            if (isset($posted_data['shipping_address']['dni']) && $country->isNeedDni()
                                && ($posted_data['shipping_address']['dni'] == '' || !Validate::isDniLite($posted_data['shipping_address']['dni']))) {
                                $response['error']['shipping_address'][$loop_index] = array('key' => 'dni', 'error' => $this->module->l('DNI Error'));
                            }
                        }
                    }
                    if ($key == 'id_state' && $posted_data['shipping_address'][$key] == 0) {
                        if (Country::containsStates((int)$posted_data['shipping_address']['id_country'])) {
                            $response['error']['shipping_address'][$loop_index] = array('key' => $key, 'error' => $this->module->l('Required Field'));
                        }
                    }
                    if ($key == 'alias' && !empty($posted_data['shipping_address'][$key])) {
                        $is_alias_onsame_id = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('select * from '._DB_PREFIX_.'address 
                            where id_address = '.(int)$id_delivery_address.' AND alias = "'.pSQL($posted_data['shipping_address'][$key]).'"');
                        if (!count($is_alias_onsame_id)) {
                            if ($this->aliasExistOveridden($posted_data['shipping_address'][$key], (int)$id_delivery_address, $id_customer)) {
                                $response['error']['shipping_address'][$loop_index] = array('key' => $key,
                                    'error' => $this->module->l('This title has already taken'));
                            }
                        }
                    }
                    
                    /* Start - Code Added by Raghu on 22-Aug-2017 for fixing 'VAT Number Required Validation' issue */
                    if ($key == 'vat_number' && $this->isNeedVat() && empty($posted_data['shipping_address'][$key])) {
                        $response['error']['shipping_address'][$loop_index] = array('key' => $key,
                                    'error' => $this->module->l('Required Field'));
                    }
                    /* End - Code Added by Raghu on 22-Aug-2017 for fixing 'VAT Number Required Validation' issue */
                    
                    $loop_index++;
                }
            }

            $payment_address_value = 1;
            if (isset($posted_data['payment_address_value'])) {
                $payment_address_value = $posted_data['payment_address_value'];
            }

            if (!isset($posted_data['use_for_invoice'])) {
                $loop_index = 0;
                if ($payment_address_value == 1) {
                    foreach ($posted_data['payment_address'] as $key => $value) {
                        $add_plugin_config = $this->supercheckout_settings['payment_address'][$key];
                        if ($add_plugin_config[$user_type]['require'] == 1 && $posted_data['payment_address'][$key] == '') {
                            if ($key == 'dni') {
                                $country = new Country($posted_data['payment_address']['id_country']);
                                if ($country->isNeedDni()) {
                                    $response['error']['payment_address'][$loop_index] = array('key' => $key, 'error' => $this->module->l('Required Field'));
                                }
                            } else {
                                $response['error']['payment_address'][$loop_index] = array('key' => $key,
                                    'error' => $this->module->l('Required Field'));
                            }
                        }
                        if (($key == 'phone_mobile' || $key == 'phone') && !empty($posted_data['payment_address'][$key])
                            && !(boolean)Validate::isPhoneNumber($posted_data['payment_address'][$key])) {
                            $response['error']['payment_address'][$loop_index] = array('key' => $key,
                                'error' => $this->module->l('Invalid phone number'));
                        }
                        if ($key == 'id_country') {
                            $country = new Country($posted_data['payment_address'][$key]);
                            if ($posted_data['payment_address'][$key] == 0) {
                                $response['error']['payment_address'][$loop_index] = array('key' => $key, 'error' => $this->module->l('Required Field'));
                            } else if ((int)$country->contains_states && (isset($posted_data['payment_address']['id_state'])
                                && !(int)$posted_data['payment_address']['id_state'])) {
                                $response['error']['payment_address'][$loop_index] = array('key' => $key,
                                    'error' => $this->module->l('This country requires you to chose a State'));
                            } else if (!$country->active) {
                                $response['error']['payment_address'][$loop_index] = array('key' => $key,
                                    'error' => $this->module->l('This country is not active'));
                            }
                            if (isset($posted_data['payment_address']['postcode']) && !empty($posted_data['payment_address']['postcode'])
                                && $postcode_error = $this->checkZipForCountry($country, $posted_data['payment_address']['postcode'])) {
                                $response['error']['payment_address'][$loop_index] = $postcode_error;
                            }

                            if (($this->supercheckout_settings['payment_address']['dni'][$user_type]['require'] == 1) && $country->isNeedDni() && !empty($posted_data['payment_address']['dni'])) {
                                if (isset($posted_data['payment_address']['dni']) && $country->isNeedDni()
                                    && ($posted_data['payment_address']['dni'] == '' || !Validate::isDniLite($posted_data['payment_address']['dni']))) {
                                    $response['error']['payment_address'][$loop_index] = array('key' => 'dni',
                                        'error' => $this->module->l('DNI Error'));
                                }
                            }
                        }
                        if ($key == 'id_state' && $posted_data['payment_address'][$key] == 0) {
                            if (Country::containsStates((int)$posted_data['payment_address']['id_country'])) {
                                $response['error']['payment_address'][$loop_index] = array('key' => $key,
                                    'error' => $this->module->l('Required Field'));
                            }
                        }
                        if ($key == 'alias' && !empty($posted_data['payment_address'][$key])) {
                            $is_alias_onsame_id = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('select * from '._DB_PREFIX_.'address 
                                where id_address = '.(int)$id_invoice_address.' AND alias = "'.pSQL($posted_data['payment_address'][$key]).'"');
                            if (!count($is_alias_onsame_id)) {
                                if ($this->aliasExistOveridden($posted_data['payment_address'][$key], (int)$id_invoice_address, $id_customer)) {
                                    $response['error']['payment_address'][$loop_index] = array('key' => $key,
                                        'error' => $this->module->l('This title has already taken'));
                                }
                            }
                        }
                        
                        /* Start - Code Added by Raghu on 22-Aug-2017 for fixing 'VAT Number Required Validation' issue */
                        if ($key == 'vat_number' && $this->isNeedVat() && empty($posted_data['payment_address'][$key])) {
                            $response['error']['payment_address'][$loop_index] = array('key' => $key,
                                        'error' => $this->module->l('Required Field'));
                        }
                        /* End - Code Added by Raghu on 22-Aug-2017 for fixing 'VAT Number Required Validation' issue */
                        
                        $loop_index++;
                    }
                }
            }

            if (isset($response['error']) && count($response['error']) > 0) {
                $continue = 0;
//                return $response;
            }

            //////////////////////////End - Plugin Validations //////////////////////////

            if ($continue == 1 && !$this->context->cart->isVirtualCart() && ((isset($posted_data['shipping_address_value']) && $posted_data['shipping_address_value'] == 1)
                || !isset($posted_data['shipping_address_value']))) {
                $delivery_address = new Address();

                $delivery_address->firstname = (!empty($posted_data['shipping_address']['firstname'])) ? $posted_data['shipping_address']['firstname']: ' ';

                $delivery_address->lastname = (!empty($posted_data['shipping_address']['lastname'])) ? $posted_data['shipping_address']['lastname'] : ' ';

                $delivery_address->company = (!empty($posted_data['shipping_address']['company'])) ? $posted_data['shipping_address']['company'] : ' ';

                $delivery_address->address1 = (!empty($posted_data['shipping_address']['address1'])) ? $posted_data['shipping_address']['address1'] : ' ';

                $delivery_address->address2 = (!empty($posted_data['shipping_address']['address2'])) ? $posted_data['shipping_address']['address2'] : ' ';

                $delivery_address->city = (!empty($posted_data['shipping_address']['city'])) ? $posted_data['shipping_address']['city'] : ' ';

                $delivery_address->phone = (!empty($posted_data['shipping_address']['phone'])) ? $posted_data['shipping_address']['phone'] : ' ';

                $delivery_address->phone_mobile = (!empty($posted_data['shipping_address']['phone_mobile']))
                        ? $posted_data['shipping_address']['phone_mobile']
                        : ' ';

                $delivery_address->id_country = (!empty($posted_data['shipping_address']['id_country']))
                            ? $posted_data['shipping_address']['id_country']
                            : (int)Configuration::get('PS_COUNTRY_DEFAULT');

                $delivery_address->postcode = (!empty($posted_data['shipping_address']['postcode'])) ? $posted_data['shipping_address']['postcode'] : 0;
                if (!Country::getNeedZipCode($delivery_address->id_country)) {
                    $delivery_address->postcode = 0;
                }

                $delivery_address->id_state = (!empty($posted_data['shipping_address']['id_state'])) ? $posted_data['shipping_address']['id_state'] : 0;
                if (!Country::containsStates($delivery_address->id_country)) {
                    $delivery_address->id_state = 0;
                }

                $delivery_address->vat_number = (!empty($posted_data['shipping_address']['vat_number'])) ? $posted_data['shipping_address']['vat_number'] : ' ';

                $delivery_address->dni = (!empty($posted_data['shipping_address']['dni'])) ? $posted_data['shipping_address']['dni'] : '-';
                if (!Country::isNeedDniByCountryId($delivery_address->id_country)) {
                    $delivery_address->dni = '-';
                }

                $delivery_address->alias = (isset($posted_data['shipping_address']['alias']))
                        ? (empty($posted_data['shipping_address']['alias']))
                            ? $this->module->l('Address Alias').' - '.date('s').rand(0, 9)
                            : $posted_data['shipping_address']['alias']
                        : $this->module->l('Address Alias').' - '.date('s').rand(0, 9);
                $delivery_address->other = (!empty($posted_data['shipping_address']['other'])) ? $posted_data['shipping_address']['other'] : ' ';

                $delivery_address->id_customer = $id_customer;

                $validate_address = $delivery_address->validateController();
                if ($validate_address && count($validate_address) > 0) {
                    $response['error']['shipping_address'] = array();
                    foreach ($validate_address as $key => $value) {
                        if ($key == '0') {
                            $response['error']['shipping_address'][] = array('key' => 'vat_number', 'error' => $value);
                        } else {
                            $response['error']['shipping_address'][] = array('key' => $key, 'error' => $value);
                        }
                    }
                } else {
                    if (!$delivery_address->save()) {
                        $response['error']['general'][] = $this->module('Error occurred while creating new address');
                    } else {
                        $id_delivery_address = $delivery_address->id;
                    }
                }
            } else if (isset($posted_data['shipping_address_value']) && $posted_data['shipping_address_value'] == 0
                && isset($posted_data['shipping_address_id'])) {
                $id_delivery_address = $posted_data['shipping_address_id'];
            }

            if (isset($posted_data['use_for_invoice']) && ((isset($posted_data['shipping_address_value']) && $posted_data['shipping_address_value'] == 1)
                || !isset($posted_data['shipping_address_value']))) {
                $invoice_address = $delivery_address;
                $id_invoice_address = $id_delivery_address;
            } else if (isset($posted_data['use_for_invoice']) && isset($posted_data['shipping_address_value'])
                && $posted_data['shipping_address_value'] == 0) {
                $id_invoice_address = $id_delivery_address;
            }

            if ($continue == 1 && !isset($posted_data['use_for_invoice']) && ((isset($posted_data['payment_address_value']) && $posted_data['payment_address_value'] == 1)
                || !isset($posted_data['payment_address_value']))) {
                $invoice_address = new Address();
                $invoice_address->firstname = (!empty($posted_data['payment_address']['firstname']))
                                ? $posted_data['payment_address']['firstname'] : ' ';
                $invoice_address->lastname = (!empty($posted_data['payment_address']['lastname']))
                                ? $posted_data['payment_address']['lastname'] : ' ';
                $invoice_address->company = (!empty($posted_data['payment_address']['company']))
                                ? $posted_data['payment_address']['company'] : ' ';
                $invoice_address->address1 = (!empty($posted_data['payment_address']['address1']))
                                ? $posted_data['payment_address']['address1'] : ' ';
                $invoice_address->address2 = (!empty($posted_data['payment_address']['address2']))
                                ? $posted_data['payment_address']['address2'] : ' ';
                $invoice_address->city = (!empty($posted_data['payment_address']['city']))
                                ? $posted_data['payment_address']['city'] : ' ';
                $invoice_address->phone = (!empty($posted_data['payment_address']['phone']))
                                ? $posted_data['payment_address']['phone'] : ' ';
                $invoice_address->phone_mobile = (!empty($posted_data['payment_address']['phone_mobile']))
                                ? $posted_data['payment_address']['phone_mobile'] : ' ';
                $invoice_address->id_country = (!empty($posted_data['payment_address']['id_country']))
                                ? $posted_data['payment_address']['id_country'] : (int)Configuration::get('PS_COUNTRY_DEFAULT');
                $invoice_address->postcode = (!empty($posted_data['payment_address']['postcode']))
                                ? $posted_data['payment_address']['postcode'] : 0;
                if (!Country::getNeedZipCode($invoice_address->id_country)) {
                    $invoice_address->postcode = 0;
                }
                $invoice_address->id_state = (!empty($posted_data['payment_address']['id_state']))
                                ? $posted_data['payment_address']['id_state'] : 0;
                if (!Country::containsStates($invoice_address->id_country)) {
                    $invoice_address->id_state = 0;
                }
                $invoice_address->vat_number = (!empty($posted_data['payment_address']['vat_number']))
                                ? $posted_data['payment_address']['vat_number'] : ' ';
                $invoice_address->dni = (!empty($posted_data['payment_address']['dni']))
                                ? $posted_data['payment_address']['dni'] : '-';
                if (!Country::isNeedDniByCountryId($invoice_address->id_country)) {
                    $invoice_address->dni = '-';
                }
                $invoice_address->alias = (isset($posted_data['payment_address']['alias']))
                                ? (empty($posted_data['payment_address']['alias']))
                                    ? $this->module->l('Address Alias').' - '.date('s').rand(0, 9)
                                    : $posted_data['payment_address']['alias']
                                : $this->module->l('Address Alias').' - '.date('s').rand(0, 9);
                $invoice_address->other = (!empty($posted_data['payment_address']['other'])) ? $posted_data['payment_address']['other'] : ' ';
                $invoice_address->id_customer = $id_customer;

                $validate_address = $invoice_address->validateController();
                if ($validate_address && count($validate_address) > 0) {
                    $response['error']['payment_address'] = array();
                    foreach ($validate_address as $key => $value) {
                        if ($key == '0') {
                            $response['error']['payment_address'][] = array('key' => 'vat_number', 'error' => $value);
                        } else {
                            $response['error']['payment_address'][] = array('key' => $key, 'error' => $value);
                        }
                    }
                } else {
                    if (!$invoice_address->save()) {
                        $response['error']['general'][] = $this->module('Error occurred while creating new address');
                    } else {
                        $id_invoice_address = $invoice_address->id;
                    }
                }
            } else if (!isset($posted_data['use_for_invoice']) && isset($posted_data['payment_address_value'])
                && $posted_data['payment_address_value'] == 0) {
                $id_invoice_address = $posted_data['payment_address_id'];
            }

            //If any Error return
            if (isset($response['error']) && count($response['error']) > 0) {
                $continue = 0;
//                return $response;
            }

            $customer = null;

            if (!$this->is_logged && $continue == 1) {
                $original_password = '';
                if ($posted_data['checkout_option'] == 2) {
                    $_POST['is_new_customer'] = 1;
                    $_POST['passwd'] = $posted_data['customer_personal']['password'];
                    $original_password = Tools::getValue('passwd');
                } else {
                    $_POST['is_new_customer'] = 0;
                    $_POST['passwd'] = $this->generateRandomPassword(); //uniqid(rand(), true);
                    if ($this->supercheckout_settings['enable_guest_register']) {
                        $_POST['is_new_customer'] = 1;
                        $original_password = Tools::getValue('passwd');
                    }
                }
                $_POST['email'] = $posted_data['supercheckout_email'];
                $_POST['id_gender'] = (isset($posted_data['customer_personal']['id_gender']))?$posted_data['customer_personal']['id_gender']:0;

                if (empty($posted_data['shipping_address']['firstname'])
                    && $this->supercheckout_settings['shipping_address']['firstname'][$user_type]['require'] == 0) {
                    if (isset($posted_data['payment_address']['firstname']) && !empty($posted_data['payment_address']['firstname'])) {
                        $_POST['customer_firstname'] = $posted_data['payment_address']['firstname'];
                    } else {
                        $_POST['customer_firstname'] = ' ';
                    }
                } else {
                    $_POST['customer_firstname'] = (isset($posted_data['shipping_address']['firstname']))
                                ? $posted_data['shipping_address']['firstname'] : '';
                }

                if (empty($posted_data['shipping_address']['lastname'])
                    && $this->supercheckout_settings['shipping_address']['lastname'][$user_type]['require'] == 0) {
                    if (isset($posted_data['payment_address']['lastname']) && !empty($posted_data['payment_address']['lastname'])) {
                        $_POST['customer_lastname'] = $posted_data['payment_address']['lastname'];
                    } else {
                        $_POST['customer_lastname'] = ' ';
                    }
                } else {
                    $_POST['customer_lastname'] = (isset($posted_data['shipping_address']['lastname']))
                                ? $posted_data['shipping_address']['lastname'] : '';
                }

                $blocknewsletter = Module::isInstalled('blocknewsletter')
                    && $module_newsletter = Module::getInstanceByName('blocknewsletter');
                if (isset($posted_data['customer_personal']['newsletter'])) {
                    if ($blocknewsletter && $module_newsletter->active) {
                        if (is_callable(array($module_newsletter, 'isNewsletterRegistered'))
                            && $module_newsletter->isNewsletterRegistered(Tools::getValue('email')) != $module_newsletter::GUEST_REGISTERED) {
                            /* Force newsletter registration as customer as already registred as guest */
                            $_POST['newsletter'] = true;
                        }
                    }
                }
//                $_POST['newsletter'] = (isset($posted_data['customer_personal']['newsletter'])) ? 1 : 0;
                $newsletter = (isset($posted_data['customer_personal']['newsletter'])) ? 1 : 0;
                $_POST['optin'] = (isset($posted_data['customer_personal']['optin'])) ? 1 : 0;
                if ($check_dob) {
                    $_POST['days'] = (isset($posted_data['customer_personal']['dob_days'])) ? $posted_data['customer_personal']['dob_days'] : '';
                    $_POST['months'] = (isset($posted_data['customer_personal']['dob_months'])) ? $posted_data['customer_personal']['dob_months'] : '';
                    $_POST['years'] = (isset($posted_data['customer_personal']['dob_years'])) ? $posted_data['customer_personal']['dob_years'] : '';
                }

                Hook::exec('actionBeforeSubmitAccount');

                $flag = false;
                if ($islogged && $this->context->cookie->is_guest) {
                    $customer = new Customer((int)$this->context->cookie->id_customer);
                    $flag = true;
                } else {
                    $customer = new Customer();
                }

                $customer->id_gender = Tools::getValue('id_gender');
                $customer->firstname = Tools::getValue('customer_firstname');
                $customer->lastname = Tools::getValue('customer_lastname');
                $customer->email = Tools::getValue('email');
                $customer->passwd = Tools::encrypt(Tools::getValue('passwd'));
                $customer->newsletter = $newsletter;
                $customer->optin = Tools::getValue('optin');
                $customer->secure_key = md5(uniqid(rand(), true));

                if (isset($posted_data['customer_personal']['newsletter'])) {
                    $this->processCustomerNewsletter($customer);
                    if ($this->supercheckout_settings['mailchimp']['enable'] == 1) {
                        $this->addEmailToList($customer->email, $customer->firstname, $customer->lastname);
                    }
                }

                if ($check_dob) {
                    $customer->birthday = (int)Tools::getValue('years').'-'.(int)Tools::getValue('months').'-'.Tools::getValue('days');
                } else {
                    $customer->birthday = '';
                }

                $customer->active = 1;

                if ($flag) {
                    $customer->update(true);
                } else {
                    // New Guest customer
                    if (Tools::isSubmit('is_new_customer')) {
                        $customer->is_guest = !Tools::getValue('is_new_customer', 1);
                    } else {
                        $customer->is_guest = 0;
                    }

                    if (!$customer->add()) {
                        $response['error']['general'][] = $this->module->l('An error occurred while creating your account.');
                    } else {
                        $customer->cleanGroups();
                        if (!$customer->is_guest) {
                            // we add the guest customer in the default customer group
                            $customer->addGroups(array((int)Configuration::get('PS_CUSTOMER_GROUP')));

                            if (!$this->sendConfirmationMail($customer, $original_password)) {
                                $response['warning'][] = $this->module->l('An error ocurred while sending account confirmation email');
                            }
                        } else {
                            $customer->addGroups(array((int)Configuration::get('PS_GUEST_GROUP')));
                        }

                        Hook::exec('actionCustomerAccountAdd', array(
                            '_POST' => $_POST,
                            'newCustomer' => $customer
                        ));
                        $id_customer = $customer->id;
                    }
                }
            } else {
                $id_customer = $this->context->customer->id;
            }

            if (!isset($response['error'])) {
                if (Validate::isLoadedObject($delivery_address) && $delivery_address != null) {
                    $delivery_address->id_customer = $id_customer;
                    if (!$delivery_address->save()) {
                        $response['error']['general'][] = $this->module('Error occurred while updating address');
                    } else {
                        $id_delivery_address = $delivery_address->id;
                    }
                }

                if (Validate::isLoadedObject($invoice_address) && $invoice_address != null) {
                    $invoice_address->id_customer = $id_customer;
                    if (!$invoice_address->save()) {
                        $response['error']['general'][] = $this->module('Error occurred while updating address');
                    } else {
                        $id_invoice_address = $invoice_address->id;
                    }
                }
            }

            if (isset($response['error'])) {
//                return $response;
            }

            if (!isset($response['error'])) {
                // Add customer to the context
                if (!$this->is_logged) {
                    $this->context->customer = $customer;
                    $this->context->cookie->id_customer = (int)$customer->id;
                    $this->context->cookie->customer_lastname = $customer->lastname;
                    $this->context->cookie->customer_firstname = $customer->firstname;
                    $this->context->cookie->logged = 1;
                    $customer->logged = 1;
                    $this->context->cookie->is_guest = $customer->isGuest();
                    $this->context->cookie->passwd = $customer->passwd;
                    $this->context->cookie->email = $customer->email;
                }

                $this->context->cart->id_customer = (int)$id_customer;
                $this->context->cart->id_address_delivery = $id_delivery_address;
                $this->context->cart->id_address_invoice = $id_invoice_address;
                $this->context->cart->secure_key = $this->context->customer->secure_key;

                $this->context->cart->save();
                $this->context->cookie->id_cart = (int)$this->context->cart->id;
                $this->context->cookie->write();
                //As there is no multishipping, set each product delivery address with main delivery address
                $this->context->cart->setNoMultishipping();
                $this->context->cart->autosetProductAddress();
            }
        } else {
            $response['error']['general'][] = $this->module->l('Your Cart is Empty');
        }

        if (!isset($response['error'])) {
            $this->context->cookie->supercheckout_perm_address_delivery = $id_delivery_address;
            $this->context->cookie->supercheckout_perm_address_invoice = $id_invoice_address;
            $response['success'] = true;
        }

        return $response;
    }
    
    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(array(
            'HOOK_LEFT_COLUMN' => null,
            'HOOK_RIGHT_COLUMN' => null
        ));

        if (!$this->context->cart->nbProducts()) {
            $this->context->smarty->assign(array('empty' => true));
            $this->setTemplate('module:supercheckout/views/templates/front/supercheckout.tpl');
            return;
        }

        $page_data = array();

        //Addresses
        $default_country = (int) Configuration::get('PS_COUNTRY_DEFAULT');

        $countries = Country::getCountries((int) $this->context->cookie->id_lang, true);
        $page_data = array_merge($page_data, array('countries' => $countries));

        $islogged = (bool) ($this->context->customer->id && Customer::customerIdExistsStatic((int) $this->context->cookie->id_customer));
        if ($islogged && $this->context->cookie->is_guest) {
            $guest_data = $this->getGuestInformations();
            $this->context->smarty->assign(array('guest_information' => Tools::jsonEncode($guest_data)));
        }

        $translated_months = array();
        $months = Tools::dateMonths();
        foreach ($months as $i => $m) {
            $translated_months[$i] = $this->module->l($m);
        }

        //Load plugin Settings
        $custom_ssl_var = 0;
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $custom_ssl_var = 1;
        }
//        $supercheckout_url = $this->context->link->getModuleLink(
//            'supercheckout',
//            'supercheckout',
//            array(),
//            (bool) Configuration::get('PS_SSL_ENABLED')
//        );
        $supercheckout_url = __PS_BASE_URI__ . 'index.php?fc=module&module=supercheckout&controller=supercheckout';
//        $addon_url = $this->context->link->getModuleLink(
//            'supercheckoutpaymentaddon',
//            'paymentaddon'
//        );
        $addon_url = __PS_BASE_URI__ . 'index.php?fc=module&module=supercheckoutpaymentaddon&controller=paymentaddon';
//        $analytic_url = $this->context->link->getModuleLink(
//            'supercheckoutanalyticaddon',
//            'analyticaddon'
//        );
        $analytic_url = __PS_BASE_URI__ . 'index.php?fc=module&module=supercheckoutanalyticaddon&controller=analyticaddon';
        
        $plugin_settings = array(
            'plugin_name' => $this->name,
            'settings' => $this->supercheckout_settings,
            'module_image_path' => _PS_BASE_URL_SSL_ . _MODULE_DIR_ . 'supercheckout/views/img/front/',
            'module_url' => $supercheckout_url,
            'supercheckout_url' => $supercheckout_url,
            'sc_logout_url' => $this->context->link->getPageLink('index', true, null, 'mylogout'),
            'addon_url' => $addon_url,
            'analytic_url' => $analytic_url,
            'forgotten_link' => $this->context->link->getPageLink('password'),
            'my_account_url' => $this->context->link->getPageLink('my-account'),
            'module_tpl_dir' => $this->module_dir . 'views/templates/front/',
            'logged' => $this->is_logged,
            'default_country' => $default_country,
            'user_type' => ($this->is_logged) ? 'logged' : 'guest',
            'genders' => Gender::getGenders(),
            'years' => Tools::dateYears(),
            'months' => $translated_months,
            'days' => Tools::dateDays(),
            'need_dni' => Country::isNeedDniByCountryId($default_country),
            'need_vat' => $this->isNeedVat(),
            'guest_enable_by_system' => Configuration::get('PS_GUEST_CHECKOUT_ENABLED'),
            'iso_code' => $this->context->language->iso_code,
            'is_virtual_cart' => $this->context->cart->isVirtualCart(),
            'cartRefreshURL' => $this->context->link->getModuleLink('ps_shoppingcart', 'ajax')
        );

        if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
            $plugin_settings['module_image_path'] = _PS_BASE_URL_SSL_ . _MODULE_DIR_
                . 'supercheckout/views/img/front/';
        } else {
            $plugin_settings['module_image_path'] = _PS_BASE_URL_ . _MODULE_DIR_
                . 'supercheckout/views/img/front/';
        }

        $page_data = array_merge($page_data, $plugin_settings);

        $id_address_delivery = $this->checkout_session->getIdAddressDelivery();
        $id_address_invoice = $this->checkout_session->getIdAddressInvoice();
        if ($this->is_logged) {
            $customer_name = $this->context->customer->firstname . ' ' . $this->context->customer->lastname;
            $page_data = array_merge($page_data, array('customer_name' => $customer_name));
        }

        $this->loadCarriers($default_country, 0, 0, $id_address_delivery, $this->default_shipping_selected);

        $data = $this->getOrderExtraParams();
        $page_data = array_merge($page_data, $data);

        $page_data = array_merge(
            $page_data,
            array('id_address_delivery' => $id_address_delivery, 'id_address_invoice' => $id_address_invoice)
        );

        //Set Same Invoice Address in cookie for later use
        $this->context->cookie->isSameInvoiceAddress = 1;
        $this->context->cookie->write();

        //Message Titles
        $messages = array(
            'warning' => $this->module->l('Warning'),
            'product_remove_success' => $this->module->l('Products successfully removed'),
            'product_qty_update_success' => $this->module->l('Products quantity successfully updated')
        );

        $page_data = array_merge($page_data, $messages);

        $this->context->smarty->assign($page_data);

        $velsof_errors = array();
        if (isset($this->context->cookie->velsof_error) && $this->context->cookie->velsof_error) {
            $velsof_errors = unserialize($this->context->cookie->velsof_error);
            $this->context->cookie->velsof_error = null;
            $this->context->cookie->__unset($this->context->cookie->velsof_error);
        }

        if (isset($_REQUEST['message']) && Tools::getValue('message')) {
            $velsof_errors[] = Tools::getValue('message');
        }

        if (isset($_REQUEST['firstdataError']) && Tools::getValue('firstdataError')) {
            $velsof_errors[] = Tools::getValue('firstdataError');
        }

        $this->context->smarty->assign(array('velsof_errors' => $velsof_errors));
        
        //Added for showing Social Loginizer buttons on SuperCheckout page
        if (Module::isInstalled('socialloginizer') && Module::isEnabled('socialloginizer')) {
            $social_login_data = unserialize(Configuration::get('VELOCITY_SOCIAL_LOGINIZER'));
            if (isset($social_login_data['show_on_supercheckout'])) {
                $this->context->smarty->assign('show_on_supercheckout', $social_login_data['show_on_supercheckout']);
            } else {
                $this->context->smarty->assign('show_on_supercheckout', 'no');
            }
            unset($social_login_data);
        }
        
        // Assigning Custon Fields Variables into the tpl
        $id_lang_current = $this->context->language->id;
        $array_fields = $this->getCustomFieldsDetails($id_lang_current);
        $this->context->smarty->assign('array_fields', $array_fields);

        $this->setTemplate('module:supercheckout/views/templates/front/supercheckout.tpl');
    }
    
    /*
     * Function modified by RS for fixing the pSQL() errors reported by PrestaShop Addons team
     */
    private function getCustomFieldsDetails($id_lang_current)
    {
        //$query_all_fields = 'SELECT * FROM '._DB_PREFIX_.'velsof_supercheckout_custom_fields WHERE active = 1';

        $id_lang = $this->context->cookie->id_lang;
        // Each field value
        //$query = 'SELECT id_velsof_supercheckout_custom_fields FROM '._DB_PREFIX_.'velsof_supercheckout_custom_fields WHERE active = 1';
        $query = 'SELECT * FROM ' . _DB_PREFIX_ . 'velsof_supercheckout_custom_fields cf ';
        $query = $query . 'JOIN ' . _DB_PREFIX_ . 'velsof_supercheckout_custom_fields_lang cfl ';
        $query = $query . 'ON cf.id_velsof_supercheckout_custom_fields = cfl.id_velsof_supercheckout_custom_fields ';
        $query = $query . 'WHERE active = 1 AND cfl.id_lang = '.(int)$id_lang;

        $result_fields = Db::getInstance()->executeS($query);
        $array_fields = array();
        foreach ($result_fields as $field) {
            $id_velsof_supercheckout_custom_fields = $field['id_velsof_supercheckout_custom_fields'];
            if ($field['type'] == 'textbox' || $field['type'] == 'textarea') {
                $query = 'SELECT * FROM ' . _DB_PREFIX_ . 'velsof_supercheckout_custom_fields cf ';
                $query .= 'JOIN ' . _DB_PREFIX_ . 'velsof_supercheckout_custom_fields_lang cfl ';
                $query .= 'ON cf.id_velsof_supercheckout_custom_fields = cfl.id_velsof_supercheckout_custom_fields ';
                $query .= 'WHERE cf.id_velsof_supercheckout_custom_fields = '.(int)$id_velsof_supercheckout_custom_fields.'
					AND cfl.id_lang = '.(int)$id_lang_current.' AND cf.active = 1';
                $result_custom_fields_details = Db::getInstance()->executeS($query);
                $array_fields[$id_velsof_supercheckout_custom_fields] = $result_custom_fields_details[0];
            } else {
                $query = 'SELECT * FROM ' . _DB_PREFIX_ . 'velsof_supercheckout_custom_fields cf ';
                $query .= 'JOIN ' . _DB_PREFIX_ . 'velsof_supercheckout_custom_fields_lang cfl ';
                $query .= 'ON cf.id_velsof_supercheckout_custom_fields = cfl.id_velsof_supercheckout_custom_fields ';
                $query .= 'JOIN ' . _DB_PREFIX_ . 'velsof_supercheckout_custom_field_options_lang cfol ';
                $query .= 'ON cf.id_velsof_supercheckout_custom_fields = cfol.id_velsof_supercheckout_custom_fields ';
                $query .= 'WHERE cf.id_velsof_supercheckout_custom_fields = '.(int)$id_velsof_supercheckout_custom_fields.'
					AND cfl.id_lang = '.(int)$id_lang_current.' AND cfol.id_lang = '.(int)$id_lang_current.' AND cf.active = 1';
                $result_custom_fields_details = Db::getInstance()->executeS($query);
                // Setting required variables
                $array_fields[$id_velsof_supercheckout_custom_fields]['options'] = $result_custom_fields_details;
                $array_fields[$id_velsof_supercheckout_custom_fields]['id_velsof_supercheckout_custom_fields'] = $id_velsof_supercheckout_custom_fields;
                $array_fields[$id_velsof_supercheckout_custom_fields]['type'] = $result_custom_fields_details[0]['type'];
                $array_fields[$id_velsof_supercheckout_custom_fields]['position'] = $result_custom_fields_details[0]['position'];
                $array_fields[$id_velsof_supercheckout_custom_fields]['required'] = $result_custom_fields_details[0]['required'];
                $array_fields[$id_velsof_supercheckout_custom_fields]['field_label'] = $result_custom_fields_details[0]['field_label'];
                $array_fields[$id_velsof_supercheckout_custom_fields]['field_help_text'] = $result_custom_fields_details[0]['field_help_text'];
            }
        }
        return $array_fields;
    }

    private function loadCarriers(
        $id_country = 0,
        $id_state = 0,
        $postcode = '',
        $id_address_delivery = 0,
        $default_carrier = null
    ) {
        $old_id_address_delivery = $this->checkout_session->getIdAddressDelivery();

        $this->initCheckoutAddresses($id_country, $id_state, $postcode, $id_address_delivery);

        $updated_id_address_delivery = $this->checkout_session->getIdAddressDelivery();
        $this->updateCartDeliveryAddress($old_id_address_delivery, $updated_id_address_delivery);

        if (Tools::isSubmit('ajax')) {
            if (!$this->context->cart->isVirtualCart()) {
                $id_address_delivery = $this->checkout_session->getIdAddressDelivery();
                $checkoutDeliveryStep = new CheckoutDeliveryStep(
                    $this->context,
                    $this->getTranslator()
                );

                $checkoutDeliveryStep
                    ->setRecyclablePackAllowed((bool) Configuration::get('PS_RECYCLABLE_PACK'))
                    ->setGiftAllowed((bool) Configuration::get('PS_GIFT_WRAPPING'))
                    ->setIncludeTaxes(
                        !Product::getTaxCalculationMethod((int) $this->context->cart->id_customer)
                        && (int) Configuration::get('PS_TAX')
                    )
                    ->setDisplayTaxesLabel(
                        (Configuration::get('PS_TAX') && !Configuration::get('AEUC_LABEL_TAX_INC_EXC'))
                    )
                    ->setGiftCost(
                        $this->context->cart->getGiftWrappingPrice(
                            $checkoutDeliveryStep->getIncludeTaxes()
                        )
                    );

                $delivery_options = $this->checkout_session->getDeliveryOptions();

                if (!empty($default_carrier) && isset($delivery_options[$id_address_delivery])
                    && array_key_exists($default_carrier . ',', $delivery_options[$id_address_delivery])
                ) {
                    $this->checkout_session->setDeliveryOption(array($default_carrier . ','));
                } else {
                    $this->checkout_session->setDeliveryOption($this->superCheckoutGetDeliveryOption());
                }
            }

            $_POST['id_address_delivery'] = $id_address_delivery;
            $delivery_options = $this->checkout_session->getDeliveryOptions();
            
            $deliverdata = unserialize(Configuration::get('VELOCITY_SUPERCHECKOUT_DATA'));
            foreach ($delivery_options as $id_carrier => &$carrier) {
                foreach ($deliverdata['delivery_method'] as $did => $deliveryid) {
                    if ($did == $id_carrier) {
                        if ($deliveryid['logo']['title'] != '') {
                            $custom_ssl_var = 0;
                            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                                $custom_ssl_var = 1;
                            }
                            if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
                                $delivery_logo_path = _PS_BASE_URL_SSL_ . __PS_BASE_URI__
                                    . 'modules/supercheckout/views/img/admin/uploads/' . $deliveryid['logo']['title'];
                            } else {
                                $delivery_logo_path = _PS_BASE_URL_ . __PS_BASE_URI__
                                    . 'modules/supercheckout/views/img/admin/uploads/' . $deliveryid['logo']['title'];
                            }

                            $delivery_path = _PS_ROOT_DIR_ . '/modules/supercheckout/views/img/admin/uploads/'
                                . $deliveryid['logo']['title'];
                            if (file_exists($delivery_path)) {
                                $carrier['logo'] = $delivery_logo_path;
                                $carrier['logo_width'] = $deliveryid['logo']['resolution']['width'];
                                $carrier['logo_height'] = $deliveryid['logo']['resolution']['height'];
                            }
                        }
                        if ($deliveryid['logo']['resolution']['width'] != 'auto') {
                            $carrier['logo_width'] = $deliveryid['logo']['resolution']['width'];
                        }

                        if ($deliveryid['logo']['resolution']['height'] != 'auto') {
                            $carrier['logo_height'] = $deliveryid['logo']['resolution']['height'];
                        }
                        $lid = $this->context->language->id;
                        if (isset($deliveryid['title'][$lid]) && !empty($deliveryid['title'][$lid])) {
                            $carrier['name'] = $deliveryid['title'][$lid];
                        }
                    }
                }
            }

            $data = array(
                'hookDisplayBeforeCarrier' => Hook::exec(
                    'displayBeforeCarrier',
                    array('cart' => $this->checkout_session->getCart())
                ),
                'hookDisplayAfterCarrier' => Hook::exec(
                    'displayAfterCarrier',
                    array('cart' => $this->checkout_session->getCart())
                ),
                'id_address' => $id_address_delivery,
                'delivery_options' => $delivery_options,
                'delivery_option' => $this->getSelectedSupercheckoutDeliveryOption(),
                'display_carrier_style' => $this->supercheckout_settings['shipping_method']['display_style'],
                'default_shipping_method' => $this->default_shipping_selected,
                'is_virtual_cart' => $this->context->cart->isVirtualCart()
            );

            if (!count($delivery_options)) {
                $this->shipping_error[] = $this->module->l('No Delivery Method Available for this Address');
            }

            if (count($this->shipping_error)) {
                $data = array_merge($data, array(
                    'hasError' => !empty($this->shipping_error),
                    'shipping_error' => $this->shipping_error,
                ));
            }

            $this->context->smarty->assign($data);

            $temp_vars = array(
                'hasError' => !empty($this->shipping_error),
                'shipping_error' => $this->shipping_error,
                'html' => $this->context->smarty->fetch(
                    _PS_MODULE_DIR_ . 'supercheckout/views/templates/front/delivery_methods.tpl'
                )
            );

            return $temp_vars;
        }
    }

    private function processSubmitLogin()
    {
        $email = trim(Tools::getValue('supercheckout_email'));
        $passwd = trim(Tools::getValue('supercheckout_password'));

        if (empty($email)) {
            $this->json['error']['email'] = $this->module->l('An email address required.');
        } elseif (!Validate::isEmail($email)) {
            $this->json['error']['email'] = $this->module->l('Invalid email address.');
        }

        if (empty($passwd)) {
            $this->json['error']['password'] = $this->module->l('Password is required.');
        } elseif (!Validate::isPasswd($passwd)) {
            $this->json['error']['password'] = $this->module->l('Invalid Password');
        }
        if (empty($this->json['error'])) {
            $_POST['email'] = trim($email);
            $_POST['password'] = trim($passwd);

            Hook::exec('actionAuthenticationBefore');

            $customer = new Customer();
            $authentication = $customer->getByEmail(trim($email), trim($passwd));
            if (isset($authentication->active) && !$authentication->active) {
                $this->json['error']['general'] = $this->module->l('Your account is not active at this time.');
            } elseif (!$authentication || !$customer->id || $customer->is_guest) {
                $this->json['error']['general'] = $this->module->l('Authentication failed.');
            } else {
                $update_product_delivery = true;
                if (Configuration::get('PS_CART_FOLLOWING')
                    && (empty($this->context->cookie->id_cart)
                    || Cart::getNbProducts($this->context->cookie->id_cart) == 0)
                    && (int) Cart::lastNoneOrderedCart($customer->id)
                ) {
                    $update_product_delivery = false;
                } else {
                    $update_product_delivery = true;
                }

                $this->context->updateCustomer($customer);
                if ($update_product_delivery) {
                    $updated_id_address_delivery = (int) Address::getFirstCustomerAddressId((int) ($customer->id));
                    $old_id_address_delivery = 0;
                    if (isset($this->context->cookie->supercheckout_temp_address_delivery)
                        && (int) $this->context->cookie->supercheckout_temp_address_delivery > 0
                    ) {
                        $old_id_address_delivery = (int) $this->context->cookie->supercheckout_temp_address_delivery;
                    }
                    $this->updateCartDeliveryAddress($old_id_address_delivery, $updated_id_address_delivery);
                }

                Hook::exec('actionAuthentication', array('customer' => $this->context->customer));

                CartRule::autoRemoveFromCart($this->context);
                CartRule::autoAddToCart($this->context);

                if ($customer->newsletter == 1) {
                    if ($this->supercheckout_settings['mailchimp']['enable'] == 1) {
                        $this->addEmailToList($customer->email, $customer->firstname, $customer->lastname);
                    }
                }

                $this->json['success'] = $this->context->link->getModuleLink(
                    'supercheckout',
                    'supercheckout',
                    array(),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                );
            }
        }
    }

    protected function socialLogin()
    {
        require_once(_PS_MODULE_DIR_ . 'supercheckout/libraries/http.php');
        require_once(_PS_MODULE_DIR_ . 'supercheckout/libraries/oauth_client.php');
        $client = new oauth_client_class;
        $custom_ssl_var = 0;
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $custom_ssl_var = 1;
        }

//        if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
//            if ($this->social_login_type == 'fb') {
//                $client->redirect_uri = $this->context->link->getModuleLink(
//                    'supercheckout',
//                    'supercheckout',
//                    array('login_type' => 'fb'),
//                    true
//                );
//            } elseif ($this->social_login_type == 'google') {
//                $client->redirect_uri = $this->context->link->getModuleLink(
//                    'supercheckout',
//                    'supercheckout',
//                    array('login_type' => 'google'),
//                    true
//                );
//            }
//        } else {
//            if ($this->social_login_type == 'fb') {
//                $client->redirect_uri = $this->context->link->getModuleLink(
//                    'supercheckout',
//                    'supercheckout',
//                    array('login_type' => 'fb'),
//                    false
//                );
//            } elseif ($this->social_login_type == 'google') {
//                $client->redirect_uri = $this->context->link->getModuleLink(
//                    'supercheckout',
//                    'supercheckout',
//                    array('login_type' => 'google'),
//                    false
//                );
//            }
//        }

        if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
            $client->redirect_uri = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'index.php?fc=module&module=supercheckout&controller=supercheckout';
        } else {
            $client->redirect_uri = _PS_BASE_URL_ . __PS_BASE_URI__ . 'index.php?fc=module&module=supercheckout&controller=supercheckout';
        }
        
        if ($this->social_login_type == 'fb') {
            $client->redirect_uri .= '&login_type=fb';
            $client->server = 'Facebook';
            $client->client_id = $this->supercheckout_settings['fb_login']['app_id'];
            $client->client_secret = $this->supercheckout_settings['fb_login']['app_secret'];
            $client->scope = 'email';
        } elseif ($this->social_login_type == 'google') {
            $client->redirect_uri .= '&login_type=google';
            $client->offline = true;
            $client->server = 'Google';
            //$client->api_key = $this->supercheckout_settings['google_login']['app_id'];
            $client->client_id = $this->supercheckout_settings['google_login']['client_id'];
            $client->client_secret = $this->supercheckout_settings['google_login']['app_secret'];
            $client->scope = 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile';
        }
        $user = array();
        if (($success = $client->Initialize())) {
            if (($success = $client->Process())) {
                if ($this->social_login_type == 'fb') {
                    if (Tools::strlen($client->access_token)) {
                        $success = $client->CallAPI(
                            'https://graph.facebook.com/me?fields=email,first_name,last_name,gender',
                            'GET',
                            array(),
                            array('FailOnAccessError' => true),
                            $user
                        );
                    }
                } elseif ($this->social_login_type == 'google') {
                    if (Tools::strlen($client->authorization_error)) {
                        $client->error = $client->authorization_error;
                        $success = false;
                    } elseif (Tools::strlen($client->access_token)) {
                        $success = $client->CallAPI(
                            'https://www.googleapis.com/oauth2/v1/userinfo',
                            'GET',
                            array(),
                            array('FailOnAccessError' => true),
                            $user
                        );
                    }
                }
            }
            $success = $client->Finalize($success);
        }
        if ($client->exit) {
            exit;
        }

        $social_customer_array = array();
        if ($success) {
            if ($this->social_login_type == 'fb') {
                $social_customer_array['first_name'] = $user->first_name;
                $social_customer_array['last_name'] = $user->last_name;
            } elseif ($this->social_login_type == 'google') {
                $social_customer_array['first_name'] = $user->given_name;
                $social_customer_array['last_name'] = $user->family_name;
            }
            $social_customer_array['gender'] = ($user->gender == 'male') ? 0 : 1;
            $social_customer_array['email'] = $user->email;
            $this->addEmailToList($social_customer_array['first_name'], $social_customer_array['email']);
        } else {
            $this->context->cookie->velsof_error = serialize(
                array($this->module->l('Not able to login with social site'))
            );
            Tools::redirect(
                $this->context->link->getModuleLink(
                    'supercheckout',
                    'supercheckout',
                    array(),
                    (bool) Configuration::get('PS_SSL_ENABLED')
                )
            );
        }

        return $social_customer_array;
    }

    protected function loadInvoiceAddress($id_country = 0, $id_state = 0, $postcode = 0, $id_address_invoice = 0)
    {
        if ((int) $id_address_invoice > 0) {
            $this->checkout_session->setIdAddressInvoice((int) $id_address_invoice);
            $this->context->cookie->supercheckout_temp_address_invoice = $id_address_invoice;
            return true;
        }
        if ($this->context->cart->isVirtualCart()) {
            if (isset($this->context->cookie->isSameInvoiceAddress)
                && $this->context->cookie->isSameInvoiceAddress == 1
            ) {
                $this->checkout_session->setIdAddressInvoice($this->checkout_session->getIdAddressDelivery());
                $tmp_id_address = $this->checkout_session->getIdAddressInvoice();
                $this->context->cookie->supercheckout_temp_address_invoice = $tmp_id_address;
                return true;
            }

            if (empty($id_country)) {
                $id_country = Configuration::get('PS_COUNTRY_DEFAULT');
            }

            if (empty($id_address_invoice)) {
                if (isset($this->context->cookie->supercheckout_temp_address_invoice)
                    && $this->context->cookie->supercheckout_temp_address_invoice > 0
                ) {
                    $id_address_invoice = $this->context->cookie->supercheckout_temp_address_invoice;
                }
            }
            if ($id_address_invoice == 0) {
                $invoice_address = new Address($id_address_invoice);
                $invoice_address->firstname = ' ';
                $invoice_address->lastname = ' ';
                $invoice_address->company = ' ';
                $invoice_address->address1 = ' ';
                $invoice_address->address2 = ' ';
                $invoice_address->phone_mobile = ' ';
                $invoice_address->vat_number = ' ';
                $invoice_address->city = '';
                $invoice_address->id_country = $id_country;
                $invoice_address->id_state = $id_state;
                $invoice_address->postcode = $postcode;
                $invoice_address->other = ' ';
                $invoice_address->alias = $this->module->l('Address Alias') . ' - ' . date('s') . rand(0, 9);
                if ($invoice_address->save()) {
                    $this->checkout_session->setIdAddressInvoice($invoice_address->id);
                    $this->context->cookie->supercheckout_temp_address_invoice = $invoice_address->id;
                }
            }
        }
        return true;
    }

    protected function addCartRule()
    {
        $discountarr = array();
        if (CartRule::isFeatureActive()) {
            if (!($code = trim(Tools::getValue('discount_name')))) {
                $discountarr['error'] = $this->module->l('You must enter a voucher code');
            } elseif (!Validate::isCleanHtml($code)) {
                $discountarr['error'] = $this->module->l('The voucher code is invalid');
            } else {
                if (($cart_rule = new CartRule(CartRule::getIdByCode($code)))
                    && Validate::isLoadedObject($cart_rule)
                ) {
                    if ($error = $cart_rule->checkValidity($this->context, false, true)) {
                        if (is_array($error)) {
                            $discountarr['error'] = implode('<br>', $error);
                        } else {
                            $discountarr['error'] = $error;
                        }
                    } else {
                        $this->context->cart->addCartRule($cart_rule->id);
                        $discountarr['success'] = $this->module->l('Voucher successfully applied');
                    }
                } else {
                    $discountarr['error'] = $this->module->l('The voucher code is invalid');
                }
            }
        } else {
            $discountarr['error'] = $this->module->l('This feature is not active for this voucher');
        }
        return $discountarr;
    }

    protected function removeDiscount()
    {
        $discountarr = array();
        if (CartRule::isFeatureActive()) {
            if (($id_cart_rule = (int) Tools::getValue('deleteDiscount')) && Validate::isUnsignedId($id_cart_rule)) {
                $this->context->cart->removeCartRule($id_cart_rule);
                $discountarr['success'] = $this->module->l('Voucher successfully removed');
            } else {
                $discountarr['error'] = $this->module->l('Error occured while removing voucher');
            }
        } else {
            $discountarr['error'] = $this->module->l('This feature is not active for this voucher');
        }

        return $discountarr;
    }

    private function loggedInCustomer($customer_from_ocial)
    {
        $customer_obj = new Customer();
        $customer_tmp = $customer_obj->getByEmail($customer_from_ocial['email']);
        if (isset($customer_tmp->id) && $customer_tmp->id > 0) {
            $customer = new Customer($customer_tmp->id);

            $_POST['email'] = trim($customer_from_ocial['email']);
            $_POST['password'] = $customer->passwd;

            Hook::exec('actionAuthenticationBefore');

            $update_product_delivery = true;
            if (Configuration::get('PS_CART_FOLLOWING')
                && (empty($this->context->cookie->id_cart)
                || Cart::getNbProducts($this->context->cookie->id_cart) == 0)
                && (int) Cart::lastNoneOrderedCart($customer->id)
            ) {
                $update_product_delivery = false;
            } else {
                $update_product_delivery = true;
            }

            $this->context->updateCustomer($customer);
            if ($update_product_delivery) {
                $updated_id_address_delivery = (int) Address::getFirstCustomerAddressId((int) ($customer->id));
                $old_id_address_delivery = 0;
                if (isset($this->context->cookie->supercheckout_temp_address_delivery)
                    && (int) $this->context->cookie->supercheckout_temp_address_delivery > 0
                ) {
                    $old_id_address_delivery = (int) $this->context->cookie->supercheckout_temp_address_delivery;
                }
                $this->updateCartDeliveryAddress($old_id_address_delivery, $updated_id_address_delivery);
            }

            Hook::exec('actionAuthentication', array('customer' => $this->context->customer));
        } else {
            $original_passd = $this->generateRandomPassword(); //uniqid(rand(), true);
            $passd = Tools::encrypt($original_passd);
            $secure_key = md5(uniqid(rand(), true));
            $gender = Db::getInstance()->getRow(
                'select id_gender from ' . _DB_PREFIX_ . 'gender where type = '
                . pSQL($customer_from_ocial['gender'])
            );
            if (empty($gender)) {
                $gender['id_gender'] = 0;
            }

            $customer = new Customer();
            $customer->firstname = $customer_from_ocial['first_name'];
            $customer->lastname = $customer_from_ocial['last_name'];
            $customer->passwd = $passd;
            $customer->email = $customer_from_ocial['email'];
            $customer->secure_key = $secure_key;
            $customer->birthday = '';
            $customer->is_guest = 0;
            $customer->active = 1;
            $customer->logged = 1;
            $customer->id_shop_group = (int) $this->context->shop->id_shop_group;
            $customer->id_shop = (int) $this->context->shop->id;
            $customer->id_gender = (int) $gender['id_gender'];
            $customer->id_default_group = (int) Configuration::get('PS_CUSTOMER_GROUP');
            $customer->id_lang = (int) $this->context->language->id;
            $customer->id_risk = 0;
            $customer->max_payment_days = 0;

            $customer->save(true);
            $customer->cleanGroups();
            $customer->addGroups(array((int) Configuration::get('PS_CUSTOMER_GROUP')));

            $this->sendConfirmationMail($customer, $original_passd);

            $update_product_delivery = true;
            if (Configuration::get('PS_CART_FOLLOWING')
                && (empty($this->context->cookie->id_cart)
                || Cart::getNbProducts($this->context->cookie->id_cart) == 0)
                && (int) Cart::lastNoneOrderedCart($customer->id)
            ) {
                $update_product_delivery = false;
            } else {
                $update_product_delivery = true;
            }

            $this->context->updateCustomer($customer);
            if ($update_product_delivery) {
                $updated_id_address_delivery = (int) Address::getFirstCustomerAddressId((int) ($customer->id));
                $old_id_address_delivery = 0;
                if (isset($this->context->cookie->supercheckout_temp_address_delivery)
                    && (int) $this->context->cookie->supercheckout_temp_address_delivery > 0
                ) {
                    $old_id_address_delivery = (int) $this->context->cookie->supercheckout_temp_address_delivery;
                }
                $this->updateCartDeliveryAddress($old_id_address_delivery, $updated_id_address_delivery);
            }

            $this->context->cart->update();

            Hook::exec(
                'actionCustomerAccountAdd',
                array('newCustomer' => $customer)
            );
        }

        $this->context->smarty->assign('confirmation', 1);

        return true;
    }

    private function getOrderExtraParams()
    {
        $checkoutDeliveryStep = new CheckoutDeliveryStep(
            $this->context,
            $this->getTranslator()
        );

        $checkoutDeliveryStep
            ->setRecyclablePackAllowed((bool) Configuration::get('PS_RECYCLABLE_PACK'))
            ->setGiftAllowed((bool) Configuration::get('PS_GIFT_WRAPPING'))
            ->setIncludeTaxes(
                !Product::getTaxCalculationMethod((int) $this->context->cart->id_customer)
                && (int) Configuration::get('PS_TAX')
            )
            ->setDisplayTaxesLabel(
                (Configuration::get('PS_TAX') && !Configuration::get('AEUC_LABEL_TAX_INC_EXC'))
            )
            ->setGiftCost(
                $this->context->cart->getGiftWrappingPrice(
                    $checkoutDeliveryStep->getIncludeTaxes()
                )
            );

        $conditions_to_approve = new ConditionsToApproveFinder($this->context, $this->getTranslator());

        $gift = $this->checkout_session->getGift();
        $gift_wrap_msg = $this->module->l('I would like my order to be gift wrapped');
        $data = array(
            'is_virtual_cart' => $this->context->cart->isVirtualCart(),
            'recyclable' => $this->checkout_session->isRecyclable(),
            'recyclablePackAllowed' => $checkoutDeliveryStep->isRecyclablePackAllowed(),
            'gift' => array(
                'allowed' => $checkoutDeliveryStep->isGiftAllowed(),
                'isGift' => $gift['isGift'],
                'label' => $this->getTranslator()->trans(
                    $gift_wrap_msg . $checkoutDeliveryStep->getGiftCostForLabel(),
                    array(),
                    'supercheckout'
                ),
                'message' => $gift['message'],
            ),
            'show_TOS' => $this->supercheckout_settings['confirm']['term_condition'][($this->is_logged)
                ? 'logged' : 'guest']['display'],
            'checkedTOS' => $this->supercheckout_settings['confirm']['term_condition'][($this->is_logged)
                ? 'logged' : 'guest']['checked'],
            'conditions_to_approve' => $conditions_to_approve->getConditionsToApproveForTemplate(),
        );
        return $data;
    }

    protected function loadPaymentMethods($selected_payment_method = 0)
    {
        $payment_methods = array();
        $available_payments = array();

        if ($this->context->cart->getOrderTotal(true) == 0) {
            $payment_methods['payment_method_not_required'] = true;
        } else {
            $finder = new PaymentOptionsFinder();
            $available_payments = $finder->present();
        }

        if ($available_payments) {
            $payment_settings_data = unserialize(Configuration::get('VELOCITY_SUPERCHECKOUT_DATA'));

            $delivery_option = $this->getSelectedSupercheckoutDeliveryOption();

            $custom_ssl_var = 0;
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $custom_ssl_var = 1;
            }

            foreach ($available_payments as $module_name => $module_options) {
                $module_instance = Module::getInstanceByName($module_name);
                //BOC - Check for Ship to Pay
                $not_include_count = 0;
                
                /* Start - Code Added by Raghu on 21-Aug-2017 for fixing 'Same payment method is coming more than once' issue */
                $flag = true;
                if (count($module_options) > 1) {
                    $flag = false;
                }
                /* End - Code Added by Raghu on 21-Aug-2017 for fixing 'Same payment method is coming more than once' issue */
                if (isset($this->supercheckout_settings['ship_to_pay'])
                    && !empty($this->supercheckout_settings['ship_to_pay'])
                ) {
                    $tmp = rtrim($delivery_option, ',');
                    if (isset($this->supercheckout_settings['ship_to_pay'][$tmp][$module_instance->id])) {
                        $not_include_count++;
                    }
                }

                if ($not_include_count > 0) {
                    continue;
                }
                //EOC - Check for Ship to Pay
                foreach ($module_options as &$option) {
                    $option['id_module'] = $module_instance->id;

                    //Get Image
                    $payment_image_url = '';
                    if ($this->supercheckout_settings['payment_method']['display_style']) {
                        foreach ($this->image_extensions as $img_ext) {
                            $tmp_file_path = _PS_MODULE_DIR_ . $module_instance->name
                                . '/' . $module_instance->name . $img_ext;
                            if (file_exists($tmp_file_path)) {
                                if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
                                    $payment_image_url = _PS_BASE_URL_SSL_ . _MODULE_DIR_
                                        . $module_instance->name . '/' . $module_instance->name . $img_ext;
                                } else {
                                    $payment_image_url = _PS_BASE_URL_ . _MODULE_DIR_
                                        . $module_instance->name . '/' . $module_instance->name . $img_ext;
                                }
                                break;
                            }
                        }
                    }
                    $option['payment_image_url'] = $payment_image_url;

                    foreach ($payment_settings_data['payment_method'] as $id_module => $payid) {
                        if ($option['id_module'] == $id_module) {
                            if ($payid['logo']['title'] != '') {
                                $pay_path = _PS_MODULE_DIR_ . $this->module->name . '/views/img/admin/uploads/'
                                    . $payid['logo']['title'];
                                if (file_exists($pay_path)) {
                                    if ((bool) Configuration::get('PS_SSL_ENABLED') && $custom_ssl_var == 1) {
                                        $logo_path = _PS_BASE_URL_SSL_ . __PS_BASE_URI__ . 'modules/'
                                            . $this->module->name . '/views/img/admin/uploads/'
                                            . $payid['logo']['title'];
                                    } else {
                                        $logo_path = _PS_BASE_URL_ . __PS_BASE_URI__ . 'modules/'
                                            . $this->module->name . '/views/img/admin/uploads/'
                                            . $payid['logo']['title'];
                                    }
                                    $option['payment_image_url'] = $logo_path;
                                    $option['width'] = $payid['logo']['resolution']['width'];
                                    $option['height'] = $payid['logo']['resolution']['height'];
                                }
                            }
                            $lang_id = $this->context->language->id;
                            /* Start - Code Modified by Raghu on 21-Aug-2017 for fixing 'Same payment method is coming more than once' issue */
                            if ($flag) {
                                if (isset($payid['title'][$lang_id]) && !empty($payid['title'][$lang_id])) {
                                    $option['call_to_action_text'] = $payid['title'][$lang_id];
                                }
                            }
                            /* Start - Code Modified by Raghu on 21-Aug-2017 for fixing 'Same payment method is coming more than once' issue */
                        }
                    }

                    $payment_methods['payment_methods'][] = $option;
                }
            }
        } else {
            $payment_methods['payment_methods'] = array();
        }

        $payment_methods['selected_payment_method'] = $selected_payment_method;
        $payment_methods['display_payment_style'] = $this->supercheckout_settings['payment_method']['display_style'];

        //return $payment_methods;
        $this->context->smarty->assign($payment_methods);
        $temp_vars = array(
            'html' => $this->context->smarty->fetch(
                _PS_MODULE_DIR_ . $this->module->name . '/views/templates/front/payment_methods.tpl'
            )
        );

        return $temp_vars;
    }

    public function loadPaymentAdditionalInfo()
    {
        $selected_payment_method = $this->default_payment_selected;
        if (!Tools::getIsset('selected_payment_method_id')) {
            return array('html' => '');
        } else {
            $selected_payment_method = Tools::getValue('selected_payment_method_id', 0);
        }

        $content = '';
        $finder = new PaymentOptionsFinder();
        $available_payments = $finder->present();
        $is_meet = false;
        foreach ($available_payments as $module_name => $module_options) {
            foreach ($module_options as &$option) {
                $module_instance = Module::getInstanceByName($module_name);
                if (!Validate::isLoadedObject($module_instance)) {
                    continue;
                }

                if ($option['id'] == $selected_payment_method) {
                    $this->context->smarty->assign(array('payment_method_content' => $option));
                    $content = $this->context->smarty->fetch(
                        _PS_MODULE_DIR_ . $this->module->name . '/views/templates/front/payment_method_content.tpl'
                    );
                    $is_meet = true;
                    break;
                }
            }
            if ($is_meet) {
                break;
            }
        }
        return array('html' => $content);
    }

    private function updateDeliveryExtra()
    {
        $error = array();
        $this->context->cart->recyclable = (int) Tools::getValue('recycle');
        $this->context->cart->gift = (int) Tools::getValue('gift');
        $gift_message = Tools::getValue('gift_message');
        if ($this->context->cart->gift && !empty($gift_message)) {
            $gift_message = Tools::getValue('gift_message');
            if (!Validate::isMessage($gift_message)) {
                $error[] = $this->module->l('An error occurred while updating your cart');
            } else {
                $this->context->cart->gift_message = strip_tags($gift_message);
            }
        } elseif (!$this->context->cart->gift) {
            $this->context->cart->gift_message = '';
        }

        if (!$this->context->cart->update()) {
            $error[] = $this->module->l('An error occurred while updating your cart');
        }

        // Carrier has changed, so we check if the cart rules still apply
        CartRule::autoRemoveFromCart($this->context);
        CartRule::autoAddToCart($this->context);

        return array('hasError' => !empty($this->errors), 'errors' => $this->errors);
    }
    
    /*
     * This function is used just to include all the month texts to translations files.
     * Start - Code Modified by Raghu on 22-Aug-2017 for fixing 'Months Translations on SuperCheckout Page' issue
     */

    private function moduleMonthsIncludeFunction()
    {
        $this->module->l('January');
        $this->module->l('February');
        $this->module->l('March');
        $this->module->l('April');
        $this->module->l('May');
        $this->module->l('June');
        $this->module->l('July');
        $this->module->l('August');
        $this->module->l('September');
        $this->module->l('October');
        $this->module->l('November');
        $this->module->l('December');
    }
    
    /**
     * Get the delivery option selected, or if no delivery option was selected,
     * the cheapest option for each address
     *
     * @param Country|null $default_country
     * @param bool         $dontAutoSelectOptions
     * @param bool         $use_cache
     *
     * @return array|bool|mixed Delivery option
     */
    protected function superCheckoutGetDeliveryOption($default_country = null, $dontAutoSelectOptions = false, $use_cache = false)
    {
        static $cache = array();
        $cache_id = (int)(is_object($default_country) ? $default_country->id : 0).'-'.(int)$dontAutoSelectOptions;
        if (isset($cache[$cache_id]) && $use_cache) {
            return $cache[$cache_id];
        }
        // changes
        $delivery_option = array();
        $delivery_option_list = $this->context->cart->getDeliveryOptionList($default_country);

        // The delivery option was selected
        if (isset($this->context->cart->delivery_option) && $this->context->cart->delivery_option != '') {
            $delivery_option = Tools::unSerialize($this->context->cart->delivery_option);
            $validated = true;
            if (isset($delivery_option) && $delivery_option != '' && !empty($delivery_option)) {
                if (is_array($delivery_option) && count($delivery_option) > 0) {
                    foreach ($delivery_option as $id_address => $key) {
                        if (!isset($delivery_option_list[$id_address][$key])) {
                            $validated = false;
                            break;
                        }
                    }
                }
            } else {
                $delivery_option = array();
            }
            if ($validated) {
                $cache[$cache_id] = $delivery_option;
                return $delivery_option;
            }
        }

        if ($dontAutoSelectOptions) {
            return false;
        }
        
        //$delivery_option = array();
        if (isset($this->supercheckout_settings['enable']) && $this->supercheckout_settings['enable'] == 1) {
            foreach ($delivery_option_list as $id_address => $options) {
                if ($this->supercheckout_settings['shipping_method']['default']) {
                    $delivery_option[$id_address] = $this->supercheckout_settings['shipping_method']['default'].",";
                    break;
                }
            }
        }
        $cache[$cache_id] = $delivery_option;
        return $delivery_option;
    }
    
    public function getSelectedSupercheckoutDeliveryOption()
    {
        $devliveryOptions = $this->superCheckoutGetDeliveryOption(null, false, false);
        if (is_array($devliveryOptions)) {
                return current($devliveryOptions);
        }
        return false;
    }
}
