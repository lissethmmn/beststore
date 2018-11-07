<?php
/**
* 2007-2017 PrestaShop
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
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Swachilexpress extends CarrierModule
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'swachilexpress';
        $this->tab = 'shipping_logistics';
        $this->version = '1.1.3';
        $this->author = 'Softwareagil';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Chilexpress');
        $this->description = $this->l('Chilexpress shipping integration');

        $this->confirmUninstall = $this->l('Are you sure to uninstall? You will lose information.');
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        if (extension_loaded('curl') == false) {
            $this->_errors[] = $this->l('You have to enable the cURL extension on your server to install this module');
            return false;
        }

        include(dirname(__FILE__).'/sql/install.php');

        Configuration::updateValue('SWACHILEXPRESS_URLGEO', 'http://qaws.ssichilexpress.cl/GeoReferencia?wsdl');
        Configuration::updateValue('SWACHILEXPRESS_USERGEO', 'UsrTestServicios');
        Configuration::updateValue('SWACHILEXPRESS_PASSGEO', 'U$$vr2$tS2T');
        Configuration::updateValue('SWACHILEXPRESS_URLTARIF', 'http://qaws.ssichilexpress.cl/TarificarCourier?wsdl');
        Configuration::updateValue('SWACHILEXPRESS_USERTARIF', 'UsrTestServicios');
        Configuration::updateValue('SWACHILEXPRESS_PASSTARIF', 'U$$vr2$tS2T');
        Configuration::updateValue('SWACHILEXPRESS_URLSHIP', 'http://qaws.ssichilexpress.cl/OSB/GenerarOTDigitalIndividual?wsdl');
        Configuration::updateValue('SWACHILEXPRESS_USERSHIP', 'UsrTestServicios');
        Configuration::updateValue('SWACHILEXPRESS_PASSSHIP', 'U$$vr2$tS2T');
        Configuration::updateValue('SWACHILEXPRESS_TESTMODE', '1');
        Configuration::updateValue('SWACHILEXPRESS_ORIGIN', false);
        Configuration::updateValue('SWACHILEXPRESS_TCCNUMBER', '1210611');
        Configuration::updateValue('SWACHILEXPRESS_OTSTATE', '2');
        Configuration::updateValue('SWACHILEXPRESS_DEFAULTPRICE', '0');

        $this->installNewZones();
        $this->installStates();

        $carrier = $this->addCarrier();
        $this->addZones($carrier);
        $this->addGroups($carrier);
        $this->addRanges($carrier);


        return parent::install() &&
        $this->registerHook('header') &&
        $this->registerHook('backOfficeHeader') &&
        $this->registerHook('updateCarrier') &&
        $this->registerHook('displayOrderDetail') &&
        $this->registerHook('actionOrderStatusUpdate') &&
        $this->registerHook('displayProductButtons') &&
        $this->registerHook('displayAdminOrder');
    }

    public function uninstall()
    {
        Configuration::deleteByName('SWACHILEXPRESS_URLGEO');
        Configuration::deleteByName('SWACHILEXPRESS_USERGEO');
        Configuration::deleteByName('SWACHILEXPRESS_PASSGEO');
        Configuration::deleteByName('SWACHILEXPRESS_URLTARIF');
        Configuration::deleteByName('SWACHILEXPRESS_USERTARIF');
        Configuration::deleteByName('SWACHILEXPRESS_PASSTARIF');
        Configuration::deleteByName('SWACHILEXPRESS_URLSHIP');
        Configuration::deleteByName('SWACHILEXPRESS_USERSHIP');
        Configuration::deleteByName('SWACHILEXPRESS_PASSSHIP');
        Configuration::deleteByName('SWACHILEXPRESS_TESTMODE');
        Configuration::deleteByName('SWACHILEXPRESS_ORIGIN');
        Configuration::deleteByName('SWACHILEXPRESS_TCCNUMBER');
        Configuration::deleteByName('SWACHILEXPRESS_OTSTATE');
        Configuration::deleteByName('SWACHILEXPRESS_DEFAULTPRICE');

        $this->uninstallNewZones();
        $this->destroyStates();

        include(dirname(__FILE__).'/sql/uninstall.php');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitSwachilexpressModule')) == true) {
            $this->postProcess();
        }

        //showLog
        $log = $this->getLog();
        $states = $this->getStates(68);
        $this->context->smarty->assign('log', $log);
        $this->context->smarty->assign('state', $states);
        $this->context->smarty->assign('id_carrier', Configuration::get('SWACHILEXPRESS_CARRIER_ID'));
        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitSwachilexpressModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
        .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        $sql = "SELECT * FROM "._DB_PREFIX_."state";
        $row = Db::getInstance()->ExecuteS($sql);
        
        $sql1 = "SELECT * FROM "._DB_PREFIX_."order_state AS os
        INNER JOIN "._DB_PREFIX_."order_state_lang as osl ON os.id_order_state=osl.id_order_state
        WHERE id_lang = '".Configuration::get('PS_LANG_DEFAULT')."'";
        $row1 = Db::getInstance()->ExecuteS($sql1);

        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-link"></i>',
                        'desc' => $this->l('Enter a ChileExpress WS URL for Geographic information'),
                        'name' => 'SWACHILEXPRESS_URLGEO',
                        'label' => $this->l('URL Webservice Geographic'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-user"></i>',
                        'desc' => $this->l('Enter a valid user'),
                        'name' => 'SWACHILEXPRESS_USERGEO',
                        'label' => $this->l('User name Geographic'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-key"></i>',
                        'desc' => $this->l('Enter a valid password'),
                        'name' => 'SWACHILEXPRESS_PASSGEO',
                        'label' => $this->l('Password Geographic'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-link"></i>',
                        'desc' => $this->l('Enter a ChileExpress WS URL for Rates information'),
                        'name' => 'SWACHILEXPRESS_URLTARIF',
                        'label' => $this->l('URL Webservice Rates'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-user"></i>',
                        'desc' => $this->l('Enter a valid user'),
                        'name' => 'SWACHILEXPRESS_USERTARIF',
                        'label' => $this->l('User name Rates'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-key"></i>',
                        'desc' => $this->l('Enter a valid password'),
                        'name' => 'SWACHILEXPRESS_PASSTARIF',
                        'label' => $this->l('Password Rates'),
                    ),array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-link"></i>',
                        'desc' => $this->l('Enter a ChileExpress WS URL for send Shipping'),
                        'name' => 'SWACHILEXPRESS_URLSHIP',
                        'label' => $this->l('URL Webservice Shipping'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-user"></i>',
                        'desc' => $this->l('Enter a valid user'),
                        'name' => 'SWACHILEXPRESS_USERSHIP',
                        'label' => $this->l('User name Shipping'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-key"></i>',
                        'desc' => $this->l('Enter a valid password'),
                        'name' => 'SWACHILEXPRESS_PASSSHIP',
                        'label' => $this->l('Password Shipping'),
                    ),
                    array(
                        'type' => 'radio',
                        'name' => 'SWACHILEXPRESS_TESTMODE',
                        'label' => $this->l('Test Mode'),
                        'desc' => $this->l('Set the module in testmode. It will consume local WSDL'),
                        'is_bool'   => true,
                        'values' => array(
                         array(
                          'id' => 'active_on',
                          'value' => 1,
                          'label' => $this->l('Enabled'),
                      ),
                         array(
                          'id' => 'active_off',
                          'value' => 0,
                          'label' => $this->l('Disable'),
                      ),
                     ),
                    ),
                    array(
                        'type' => 'select',
                        'name' => 'SWACHILEXPRESS_ORIGIN',
                        'label' => $this->l('Please set the origin'),
                        'options' => array(
                          'query' => $row,
                          'id' => 'id_state',
                          'name' => 'name'
                      )
                    ),
                    array(
                        'type' => 'select',
                        'name' => 'SWACHILEXPRESS_OTSTATE',
                        'label' => $this->l('Please set the state to create an OT'),
                        'desc' => $this->l('This state will create an order transport in Chilexpress'),
                        'options' => array(
                          'query' => $row1,
                          'id' => 'id_order_state',
                          'name' => 'name'
                      )
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-user"></i>',
                        'desc' => $this->l('Number for Chilexpress charges'),
                        'name' => 'SWACHILEXPRESS_TCCNUMBER',
                        'label' => $this->l('TCC NUMBER'),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-dollar"></i>',
                        'desc' => $this->l('Set default price'),
                        'name' => 'SWACHILEXPRESS_DEFAULTPRICE',
                        'label' => $this->l('DEFAULT PRICE'),
                    ),
                ),
'submit' => array(
    'title' => $this->l('Save'),
),
),
);
}

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'SWACHILEXPRESS_URLGEO' => Configuration::get('SWACHILEXPRESS_URLGEO'),
            'SWACHILEXPRESS_USERGEO' => Configuration::get('SWACHILEXPRESS_USERGEO'),
            'SWACHILEXPRESS_PASSGEO' => Configuration::get('SWACHILEXPRESS_PASSGEO'),
            'SWACHILEXPRESS_URLTARIF' => Configuration::get('SWACHILEXPRESS_URLTARIF'),
            'SWACHILEXPRESS_USERTARIF' => Configuration::get('SWACHILEXPRESS_USERTARIF'),
            'SWACHILEXPRESS_PASSTARIF' => Configuration::get('SWACHILEXPRESS_PASSTARIF'),
            'SWACHILEXPRESS_URLSHIP' => Configuration::get('SWACHILEXPRESS_URLSHIP'),
            'SWACHILEXPRESS_USERSHIP' => Configuration::get('SWACHILEXPRESS_USERSHIP'),
            'SWACHILEXPRESS_PASSSHIP' => Configuration::get('SWACHILEXPRESS_PASSSHIP'),
            'SWACHILEXPRESS_TESTMODE' => Configuration::get('SWACHILEXPRESS_TESTMODE'),
            'SWACHILEXPRESS_ORIGIN' => Configuration::get('SWACHILEXPRESS_ORIGIN'),
            'SWACHILEXPRESS_TCCNUMBER' => Configuration::get('SWACHILEXPRESS_TCCNUMBER'),
            'SWACHILEXPRESS_OTSTATE' => Configuration::get('SWACHILEXPRESS_OTSTATE'),
            'SWACHILEXPRESS_DEFAULTPRICE' => Configuration::get('SWACHILEXPRESS_DEFAULTPRICE'),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    public function getOrderShippingCost($params, $shipping_cost)
    {
        //if (Context::getContext()->customer->logged == true)
        {
            $id_address_delivery = Context::getContext()->cart->id_address_delivery;
            $address = new Address($id_address_delivery);
            $shipping_cost = $this->getShipingValue($address->id_state, Configuration::get('SWACHILEXPRESS_ORIGIN'), Context::getContext()->cart->id);
            
            return $shipping_cost;
            /**
             * Send the details through the API
             * Return the price sent by the API
             */
            //return 20;
        }
    }

    public function getOrderShippingCostExternal($params)
    {
        return true;
    }

    protected function addCarrier()
    {
        $carrier = new Carrier();

        $carrier->name = $this->l('Chilexpress');
        $carrier->is_module = true;
        $carrier->active = 1;
        $carrier->range_behavior = 1;
        $carrier->need_range = 1;
        $carrier->shipping_external = true;
        $carrier->range_behavior = 0;
        $carrier->external_module_name = $this->name;
        $carrier->shipping_method = 2;

        foreach (Language::getLanguages() as $lang) {
            $carrier->delay[$lang['id_lang']] = $this->l('Depends of orgin/destination');
        }
        if ($carrier->add() == true) {
            @copy(dirname(__FILE__).'/views/img/carrier_image.jpg', _PS_SHIP_IMG_DIR_.'/'.(int)$carrier->id.'.jpg');
            Configuration::updateValue('SWACHILEXPRESS_CARRIER_ID', (int)$carrier->id);
            return $carrier;
        }

        return false;
    }

    protected function addGroups($carrier)
    {
        $groups_ids = array();
        $groups = Group::getGroups(Context::getContext()->language->id);
        foreach ($groups as $group) {
            $groups_ids[] = $group['id_group'];
        }
        $carrier->setGroups($groups_ids);
    }

    protected function addRanges($carrier)
    {
        $range_price = new RangePrice();
        $range_price->id_carrier = $carrier->id;
        $range_price->delimiter1 = '0';
        $range_price->delimiter2 = '10000';
        $range_price->add();

        $range_weight = new RangeWeight();
        $range_weight->id_carrier = $carrier->id;
        $range_weight->delimiter1 = '0';
        $range_weight->delimiter2 = '10000';
        $range_weight->add();
    }

    protected function addZones($carrier)
    {
        $zones = Zone::getZones();

        foreach ($zones as $zone) {
            $carrier->addZone($zone['id_zone']);
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            //$this->context->controller->addJS($this->_path.'/views/js/jquery.fancybox.js');
            //$this->context->controller->addJS($this->_path.'/views/js/jquery.fancybox.pack.js');
            $this->context->controller->addJS($this->_path.'/views/js/jquery.mousewheel-3.0.6.pack.js');

            $this->context->controller->addCSS($this->_path.'views/css/back.css');
            $this->context->controller->addCSS($this->_path.'/views/css/front.css');
            $this->context->controller->addCSS($this->_path.'/views/css/jquery.fancybox.css');
            $this->context->controller->addCSS($this->_path.'/views/css/jquery.galleryview-3.0-dev.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
		$this->context->controller->addJS($this->_path.'/views/js/jquery.fancybox.js');  /// Aded by Ajay
		$this->context->controller->addJS($this->_path.'/views/js/jquery.fancybox.pack.js');  /// Aded by Ajay
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookUpdateCarrier($params)
    {
        /**
         * Not needed since 1.5
         * You can identify the carrier by the id_reference
        */
    }

    public function hookDisplayOrderDetail()
    {
        $id_order = Tools::getValue('id_order');

        $sql = "SELECT * FROM "._DB_PREFIX_."swachilexpressguide
        WHERE id_order='".pSQL($id_order)."'";

        $row = Db::getInstance()->ExecuteS($sql);
        foreach ($row as $row) {
            $codigoEstado = $row["codigoEstado"];
            $descripcionEstado = $row["descripcionEstado"];
            $numeroOt = $row["numeroOT"];
            $numeroOtPadre = $row["numeroOTPadre"];
            $glosaProductoOT = $row["glosaProducto"];
            $glosaServicio = $row["glosaServicio"];
            $numeroGuia = $row["Numeroguia"];
            $barcode = $row["barcode"];
            $fechaImpresion = $row["fechaImpresion"];
        }

        $this->context->smarty->assign('codigoEstado', $codigoEstado);
        $this->context->smarty->assign('descripcionEstado', $descripcionEstado);
        $this->context->smarty->assign('numeroOt', $numeroOt);
        $this->context->smarty->assign('numeroOtPadre', $numeroOtPadre);
        $this->context->smarty->assign('glosaProductoOT', $glosaProductoOT);
        $this->context->smarty->assign('glosaServicio', $glosaServicio);
        $this->context->smarty->assign('numeroGuia', $numeroGuia);
        $this->context->smarty->assign('barcode', $barcode);
        $this->context->smarty->assign('fechaImpresion', $fechaImpresion);

        $this->smarty->assign('module_dir', $this->_path);
        return $this->display(__FILE__, 'views/templates/hook/swachilexpressotfront.tpl');
    }

    public function hookActionOrderStatusUpdate($params)
    {
        $id_order = $params["id_order"];
        $id_order_state = $params["newOrderStatus"]->id;

        $sql = "SELECT * FROM "._DB_PREFIX_."orders
        WHERE id_order='".pSQL($id_order)."'";
        $row = Db::getInstance()->ExecuteS($sql);
        foreach ($row as $row) {
            $id_carrier = $row['id_carrier'];
        }

        $sql = "SELECT * FROM "._DB_PREFIX_."swachilexpressguide
        WHERE id_order='".pSQL($id_order)."'";
        $row = Db::getInstance()->ExecuteS($sql);

        if (count($row) > 0) {
           return;
        }

        if (Configuration::get('SWACHILEXPRESS_CARRIER_ID') != $id_carrier) {
        //echo $id_carrier." ".Configuration::get('SWACHILEXPRESS_CARRIER_ID');
         return;
     }

     if ($id_order_state != Configuration::get('SWACHILEXPRESS_OTSTATE')) {
      return;
  }


  /* Place your code here. */
  $testmode = Configuration::get('SWACHILEXPRESS_TESTMODE');
  try {
    if ($testmode == 1) {
        $WSDL = dirname(__FILE__) . "/internalws/GenerarOTDigitalIndividualC2C.wsdl";
    } else {
        $WSDL = Configuration::get('SWACHILEXPRESS_URLSHIP');
    }

    $clientOptions = array(
        "login" => Configuration::get('SWACHILEXPRESS_USERSHIP'),
        "password" => Configuration::get('SWACHILEXPRESS_PASSSHIP'));
    $client = new SoapClient($WSDL, $clientOptions);

    /* HEADER */
    $ns = 'http://www.chilexpress.cl/IntegracionAsistida/';

    $headerbody = array(
        'transaccion' => array(
            'fechaHora'=>date('Y-m-d').'T'.date('H:i:s'),
            'idTransaccionNegocio' => '0',
            'sistema'=>'TEST',
            'usuario'=>'TEST'
        )
    );

            //Recoleccion de Datos
            //Datos principales de la orden
    $sql = "SELECT * FROM "._DB_PREFIX_."orders
    WHERE id_order = '".pSQL($id_order)."'";
    $row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $reference = $row['reference'];
        $id_address_delivery = $row['id_address_delivery'];
        $id_customer = $row['id_customer'];
    }

            //Datos direccion de entrega
    $sql = "SELECT * FROM "._DB_PREFIX_."address
    WHERE id_address = '".pSQL($id_address_delivery)."'";
    $row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $customer_name = $row['firstname']." ".$row["lastname"];
        $id_state = $row['id_state'];
        $phone = $row['phone'];
        $address1 = $row['address1'];
        $address2 = $row['address2'];
    }

            //Datos Cliente
    $sql = "SELECT * FROM "._DB_PREFIX_."customer
    WHERE id_customer = '".pSQL($id_customer)."'";
    $row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $email = $row['email'];
    }

            //Ciudad Destino
    $sql = "SELECT * FROM "._DB_PREFIX_."state
    WHERE id_state = '".pSQL($id_state)."'";
    $row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $dest = $row['name'];
    }

            //Datos de Pieza
    $sql = "SELECT p.width, p.height, p.depth,
    p.weight, od.product_quantity FROM "._DB_PREFIX_."order_detail as od
    INNER JOIN "._DB_PREFIX_."product as p ON p.id_product = od.product_id
    WHERE od.id_order = '".pSQL($id_order)."'";

    $width = 1;
    $height = 1;
    $depth = 1;
    $weight = 0;
    /*$row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $width += $row['width'] * $row['product_quantity'];
        $height += $row['height'] * $row['product_quantity'];
        $depth += $row['depth'] * $row['product_quantity'];
        $weight += $row['weight'] * $row['product_quantity'];
    }*/
    $row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $dim1[] = $row['width'];
        $dim1[] = $row['height'];
        $dim1[] = $row['depth'];
        $weight += $row['weight'] * $row['product_quantity'];
        
        $volt += ($row['width'] * $row['height'] * $row['depth']) * $row['product_quantity'];
    }
    
    $dim2 = $volt / max($dim1);
    $dim2 = (2/3) * $dim2;
    $dim2 = sqrt($dim2);
    
    $dim3 = ($volt / max($dim1) / $dim2);
    
    $str = "DIM1:".max($dim1)." DIM2:".$dim2." DIM3:".$dim3." P:".$weight." V:".$price;
            $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
            (`date`, `id_order`, `desc`, `process`) VALUES
            ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_cart)."', '".pSQL($str)."', 'Cart Cost')";
            Db::getInstance()->Execute($sql);
			
    if(Configuration::get('PS_SHOP_STATE')=='' || Configuration::get('PS_SHOP_STATE')=='-') $statew='ACHAO'; else  $statew= Configuration::get('PS_SHOP_STATE');
	
	
    $reqParams = array(
        'codigoProducto' => '3',
        'codigoServicio' => '3',
        'comunaOrigen' => trim($statew),
        'numeroTCC' => trim(Configuration::get('SWACHILEXPRESS_TCCNUMBER')),
        'referenciaEnvio' => trim($reference),
        'referenciaEnvio2' => trim($id_order),
        'eoc' => '0',
        'Remitente' => array(
            'nombre' => trim(Configuration::get('PS_SHOP_NAME')),
            'email' => trim(Configuration::get('PS_SHOP_EMAIL')),
            'celular' => trim(Configuration::get('PS_SHOP_PHONE'))
        ),
        'Destinatario' => array(
            'nombre' => trim($customer_name),
            'email' => trim($email),
            'celular' => trim($phone)
        ),
        'Direccion' => array(
            'comuna' => trim($dest),
            'calle' => trim($address1),
            'numero' => filter_var($address1, FILTER_SANITIZE_NUMBER_INT),
            'complemento' => trim($address2)
        ),
        'DireccionDevolucion' => array(
            'comuna' => trim(Configuration::get('PS_SHOP_STATE')),
            'calle' => trim(Configuration::get('PS_SHOP_ADDR1')),
            'numero' => filter_var(Configuration::get('PS_SHOP_ADDR1'), FILTER_SANITIZE_NUMBER_INT),
            'complemento' => trim(Configuration::get('PS_SHOP_ADDR2'))
        ),
        'Pieza' => array(
            'peso' => trim($weight),
            'alto' => max($dim1),
            'ancho' => ($dim2),
            'largo' => ($dim3),
        ),
    );

            //Create Soap Header.
    $header = new SOAPHeader($ns, 'headerRequest', $headerbody);

            //set the Headers of Soap Client.
    $client->__setSoapHeaders($header);

    /* BODY */
    $result = $client->__soapCall(
        'IntegracionAsistidaOp',
        array(
            "IntegracionAsistidaRequest" => array(
                'reqGenerarIntegracionAsistida'=>  $reqParams
            )
        ),
        array(),
        null,
        $outputHeaders
    );
	
    $codigoEstado = $result->respGenerarIntegracionAsistida->EstadoOperacion->codigoEstado;
    $descripcionEstado = $result->respGenerarIntegracionAsistida->EstadoOperacion->descripcionEstado;
    $numeroOt = $result->respGenerarIntegracionAsistida->DatosOT->numeroOt;
    $numeroOtPadre = $result->respGenerarIntegracionAsistida->DatosOT->numeroOtPadre;
    $glosaProductoOT = $result->respGenerarIntegracionAsistida->DatosEtiqueta->glosaProductoOT;
    $glosaServicio = $result->respGenerarIntegracionAsistida->DatosEtiqueta->glosaServicio;
    $numeroGuia = $result->respGenerarIntegracionAsistida->DatosEtiqueta->numeroGuia;
    $barcode = $result->respGenerarIntegracionAsistida->DatosEtiqueta->barcode;
    $fechaImpresion = $result->respGenerarIntegracionAsistida->DatosEtiqueta->fechaImpresion;
    $imageJFIF = trim($result->respGenerarIntegracionAsistida->DatosEtiqueta->imagenEtiqueta);
    $imagenEtiqueta = base64_encode($imageJFIF);

    file_put_contents(dirname(__FILE__).'/OtImages/'.$id_order."-ima.jpg", $imageJFIF);

    $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpressguide`
    (`codigoEstado`, `descripcionEstado`,
        `numeroOT`, `numeroOTPadre`, `glosaProducto`,
        `glosaServicio`, `Numeroguia`, `imagenEtiqueta`,
        `id_order`, `barcode`, `fechaImpresion`, `image`)
        VALUES ('".pSQL($codigoEstado)."','".pSQL($descripcionEstado)."',
        '".pSQL($numeroOt)."','".pSQL($numeroOtPadre)."','".pSQL($glosaProductoOT)."',
        '".pSQL($glosaServicio)."','".pSQL($numeroGuia)."','".pSQL($filename)."',
        '".pSQL($id_order)."','".pSQL($barcode)."','".pSQL($fechaImpresion)."', '".pSQL($imagenEtiqueta)."')";

        Db::getInstance()->Execute($sql);

        $this->sendEmail($customer_name, $email, $reference, $numeroOt);
    } catch (Exception $e) {
        $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
        (`date`, `id_order`, `desc`, `process`) VALUES
        ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_order)."', '".pSQL($e->faultstring)."', 'Create OT')";
        Db::getInstance()->Execute($sql);
    }
}

public function hookDisplayAdminOrder()
{
    $id_order = Tools::getValue('id_order');

    $sql = "SELECT * FROM "._DB_PREFIX_."swachilexpressguide
    WHERE id_order='".pSQL($id_order)."'";

    $row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $codigoEstado = $row["codigoEstado"];
        $descripcionEstado = $row["descripcionEstado"];
        $numeroOt = $row["numeroOT"];
        $numeroOtPadre = $row["numeroOTPadre"];
        $glosaProductoOT = $row["glosaProducto"];
        $glosaServicio = $row["glosaServicio"];
        $numeroGuia = $row["Numeroguia"];
        $barcode = $row["barcode"];
        $fechaImpresion = $row["fechaImpresion"];
    }

    $this->context->smarty->assign('codigoEstado', $codigoEstado);
    $this->context->smarty->assign('descripcionEstado', $descripcionEstado);
    $this->context->smarty->assign('numeroOt', $numeroOt);
    $this->context->smarty->assign('numeroOTPadre', $numeroOtPadre);
    $this->context->smarty->assign('glosaProductoOT', $glosaProductoOT);
    $this->context->smarty->assign('glosaServicio', $glosaServicio);
    $this->context->smarty->assign('numeroGuia', $numeroGuia);
    $this->context->smarty->assign('barcode', $barcode);
    $this->context->smarty->assign('fechaImpresion', $fechaImpresion);
    $this->context->smarty->assign('id_order', $id_order);

    $this->smarty->assign('module_dir', $this->_path);
    return $this->display(__FILE__, 'views/templates/hook/swachilexpressot.tpl');
}

public function installStates()
{
    $sql = "SELECT * FROM "._DB_PREFIX_."zone WHERE usebychilexpress = '1'";

    $row = Db::getInstance()->ExecuteS($sql);
    foreach ($row as $row) {
        $this->getCoberturas($row['id_zone'], $row['id_region']);
    }
}

public function installNewZones()
{
    $testmode = Configuration::get('SWACHILEXPRESS_TESTMODE');
    try {
        if ($testmode == 1) {
            $WSDL = dirname(__FILE__) . "/internalws/GeoReferencia.wsdl";
        } else {
            $WSDL = Configuration::get('SWACHILEXPRESS_URLGEO');
        }

        $clientOptions = array("login" => Configuration::get('SWACHILEXPRESS_USERGEO'), "password" => Configuration::get('SWACHILEXPRESS_PASSGEO'));
        $client = new SoapClient($WSDL, $clientOptions);

        /* HEADER */
        $ns = 'http://www.chilexpress.cl/CorpGR/';

        $headerbody = array(
            'transaccion' => array(
                'fechaHora'=>date('Y-m-d').'T'.date('H:i:s'),
                'idTransaccionNegocio' => '0',
                'sistema'=>'TEST',
                'usuario'=>'TEST'
            )
        );

            //Create Soap Header.
        $header = new SOAPHeader($ns, 'headerRequest', $headerbody);

            //set the Headers of Soap Client.
        $client->__setSoapHeaders($header);

        /* BODY */
        $result = $client->__soapCall(
            'ConsultarRegiones',
            array("ConsultarRegiones" => array('reqObtenerRegion'=>'')),
            array(),
            null,
            $outputHeaders
        );

        $reg = $result->respObtenerRegion->Regiones;

        for ($i = 0; $i<=count($reg); $i++) {
            if (!empty($reg[$i]->GlsRegion)) {
              $sql = "INSERT INTO `"._DB_PREFIX_."zone`(
                  `name`, `usebychilexpress`, `id_region`, `active`)
                  VALUES
                  ('".pSQL($reg[$i]->GlsRegion)."', '1', '".pSQL($reg[$i]->idRegion)."','1')";
                  Db::getInstance()->Execute($sql);
              }
          }
      } catch (SoapFault $e) {
        $id_order = '';
        $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
        (`date`, `id_order`, `desc`, `process`) VALUES
        ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_order)."', '".pSQL($e->faultstring)."', 'Instal Zones')";
            //Db::getInstance()->Execute($sql); echo "<pre>"; var_dump($header); var_dump($e);die();
    }
        //die();
}

public function uninstallNewZones()
{
    $sql = "DELETE FROM "._DB_PREFIX_."zone WHERE usebychilexpress = '1'";
    Db::getInstance()->Execute($sql);
}

public function getCoberturas($id_zone, $id_region = 99)
{
    $testmode = Configuration::get('SWACHILEXPRESS_TESTMODE');
    try {
        if ($testmode == 1) {
            $WSDL = dirname(__FILE__) . "/internalws/GeoReferencia.wsdl";
        } else {
            $WSDL = Configuration::get('SWACHILEXPRESS_URLGEO');
        }

        $clientOptions = array("login" => Configuration::get('SWACHILEXPRESS_USERGEO'), "password" => Configuration::get('SWACHILEXPRESS_PASSGEO'));
        $client = new SoapClient($WSDL, $clientOptions);

        /* HEADER */
        $ns = 'http://www.chilexpress.cl/CorpGR/';

        $headerbody = array(
            'transaccion' => array(
                'fechaHora'=>date('Y-m-d').'T'.date('H:i:s'),
                'idTransaccionNegocio' => '0',
                'sistema'=>'TEST',
                'usuario'=>'TEST'
            )
        );

            //Create Soap Header.
        $header = new SOAPHeader($ns, 'headerRequest', $headerbody);

            //set the Headers of Soap Client.
        $client->__setSoapHeaders($header);

        $reqParams = array(
            CodTipoCobertura => '3',
            CodRegion => $id_region
        );

        /* BODY */
        $result = $client->__soapCall(
            'ConsultarCoberturas',
            array("ConsultarCoberturas" => array('reqObtenerCobertura'=>$reqParams)),
            array(),
            null,
            $outputHeaders
        );

        $reg = $result->respObtenerCobertura->Coberturas;
        if ($id_region != 'R15') {
            for ($i = 0; $i <= count($reg)-1; $i++) {
                $sql = "INSERT INTO `"._DB_PREFIX_."state`(
                    `id_country`, `id_zone`, `name`, `iso_code`, `tax_behavior`, `active`)
                    VALUES ('".pSQL(trim(Configuration::get('PS_COUNTRY_DEFAULT')))."',
                    '".pSQL($id_zone)."','".pSQL($reg[$i]->GlsComuna)."','".pSQL($reg[$i]->CodComuna)."','0','1')";
                    Db::getInstance()->Execute($sql);
                }
            }
        } catch (SoapFault $e) {
            $id_order = '';
            $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
            (`date`, `id_order`, `desc`, `process`) VALUES
            ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_order)."', '".pSQL($e->faultstring)."', 'Install States')";
            Db::getInstance()->Execute($sql);
        }
    }

    public function getShipingValue($destination, $origin, $id_cart)
    {
        $testmode = Configuration::get('SWACHILEXPRESS_TESTMODE');
        try {
            if ($testmode == 1) {
                $WSDL = dirname(__FILE__) . "/internalws/TarificarCourier.wsdl";
            } else {
                $WSDL = Configuration::get('SWACHILEXPRESS_URLTARIF');
            }

            $clientOptions = array(
                "login" => Configuration::get('SWACHILEXPRESS_USERTARIF'),
                "password" => Configuration::get('SWACHILEXPRESS_PASSTARIF')
            );
            $client = new SoapClient($WSDL, $clientOptions);

            /* HEADER */
            $ns = 'http://www.chilexpress.cl/TarificaCourier/';

            $headerbody = array(
                'transaccion' => array(
                    'fechaHora'=>date('Y-m-d').'T'.date('H:i:s'),
                    'idTransaccionNegocio' => '?',
                    'sistema'=>'?',
                    'login'=> Configuration::get('SWACHILEXPRESS_USERTARIF'),
                    'password'=>Configuration::get('SWACHILEXPRESS_PASSTARIF'),
                    'soap_version' => SOAP_1_2
                )
            );

            $sql = "SELECT * FROM "._DB_PREFIX_."state WHERE id_state = '".pSQL($destination)."'";
            $row = Db::getInstance()->ExecuteS($sql);
            foreach ($row as $row) {
                $iso_dest = $row['iso_code'];
            }
            $sql = "SELECT * FROM "._DB_PREFIX_."state WHERE id_state = '".pSQL($origin)."'";
            $row = Db::getInstance()->ExecuteS($sql);
            foreach ($row as $row) {
                $iso_orig = $row['iso_code'];
            }
            
            $str = "Origen:".$iso_orig." Destino:".$iso_dest;
            $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
            (`date`, `id_order`, `desc`, `process`) VALUES
            ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_cart)."', '".pSQL($str)."', 'Cart Cost')";
            Db::getInstance()->Execute($sql);

            $sql = "SELECT p.width, p.height, p.depth,
            p.weight, cp.quantity FROM "._DB_PREFIX_."cart_product as cp
            INNER JOIN "._DB_PREFIX_."product as p ON p.id_product = cp.id_product
            WHERE cp.id_cart = '".pSQL($id_cart)."'";
            
            
            

            $width = 0;
            $height = 0;
            $depth = 0;
            $weight = 0;
            /*$row = Db::getInstance()->ExecuteS($sql);
            foreach ($row as $row) {
                $width += $row['width'] * $row['quantity'];
                $height += $row['height'] * $row['quantity'];
                $depth += $row['depth'] * $row['quantity'];
                $weight += $row['weight'] * $row['quantity'];
            }*/
            
            $row = Db::getInstance()->ExecuteS($sql);
	    foreach ($row as $row) {
	        $dim1[] = $row['width'];
	        $dim1[] = $row['height'];
	        $dim1[] = $row['depth'];
	        $weight += $row['weight'] * $row['quantity'];
	        
	        $volt += ($row['width'] * $row['height'] * $row['depth']) * $row['quantity'];
	    }
	        
	    
	    $dim2 = $volt / max($dim1);
	    $dim2 = (2/3) * $dim2;
	    $dim2 = sqrt($dim2);
	    
	    $dim3 = ($volt / max($dim1) / $dim2);
	    
	     $str = "DIM1:".max($dim1)." DIM2:".$dim2." DIM3:".$dim3." P:".$weight." V:".$price;
            $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
            (`date`, `id_order`, `desc`, `process`) VALUES
            ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_cart)."', '".pSQL($str)."', 'Cart Cost')";
            Db::getInstance()->Execute($sql);




            /*$reqParams = array(
                'CodCoberturaOrigen' => trim($iso_orig),
                'CodCoberturaDestino' => trim($iso_dest),
                'PesoPza' => trim($weight),
                'DimAltoPza' => trim($height),
                'DimAnchoPza' => trim($width),
                'DimLargoPza' => trim($depth),
            );*/
            $reqParams = array(
                'CodCoberturaOrigen' => trim($iso_orig),
                'CodCoberturaDestino' => trim($iso_dest),
                'PesoPza' => trim($weight),
                'DimAltoPza' => max($dim1),
                'DimAnchoPza' => trim($dim2),
                'DimLargoPza' => trim($dim3),
            );

            //Create Soap Header.
            $header = new SOAPHeader($ns, 'headerRequest', $headerbody);

            //set the Headers of Soap Client.
            $client->__setSoapHeaders($header);
            /* BODY */
            $result = $client->__soapCall(
                'TarificarCourier',
                array("TarificarCourier" => array('reqValorizarCourier'=>$reqParams)),
                array(),
                null,
                $outputHeaders
            );

            // echo "<pre>"; print_r($result); echo "</pre>"; // die();

            $str = "Dato reportado por WS:".serialize($result);
            $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
            (`date`, `id_order`, `desc`, `process`) VALUES
            ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_cart)."', '".pSQL($str)."', 'Cart Cost')";
            Db::getInstance()->Execute($sql);
            
            // $price = $result->respValorizarCourier->Servicios->ValorServicio;
            $price = 0;

            if(is_object($result->respValorizarCourier->Servicios)){
                $price = $result->respValorizarCourier->Servicios->ValorServicio;
            }else if(is_array($result->respValorizarCourier->Servicios)){
            	
            	
            
            
                foreach ($result->respValorizarCourier->Servicios as $key => $value) {
                    //if($value->CodServicio == 2)
                        $set_price[] = $value->ValorServicio;
                        
                }
                
                $price = min($set_price);
               
            }            
            
            if($price == 0)
            {
            	$price = $this->seekManualPrice($iso_dest);
            	
            	if($price == 0 || $price == '')
            	{
            		$price = Configuration::get('SWACHILEXPRESS_DEFAULTPRICE');
            	}
            }
            
            $str = "W:".$width." H:".$height." D:".$depth." P:".$weight." V:".$price;
            $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
            (`date`, `id_order`, `desc`, `process`) VALUES
            ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_cart)."', '".pSQL($str)."', 'Cart Cost')";
            Db::getInstance()->Execute($sql);
            
            return $price;
            
        } catch (SoapFault $e) {
            $id_order = '';
            $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
            (`date`, `id_order`, `desc`, `process`) VALUES
            ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_order)."', '".pSQL($e->faultstring)."', 'Get Shippping Cost')";
            Db::getInstance()->Execute($sql);
        }
    }

    public function destroyStates()
    {
        $sql = "DELETE FROM `"._DB_PREFIX_."state`
        WHERE id_country = '68'";
        Db::getInstance()->Execute($sql);
    }

    public function sendEmail($customer_name, $customer_email, $reference, $otnumber)
    {
        $templateVars = array();
        $templateVars['{customer_name}'] = $customer_name;
        $templateVars['{reference}'] = $reference;
        $templateVars['{otnumber}'] = $otnumber;

        $templateVars['{shop_url}'] = Configuration::get('PS_SHOP_DOMAIN');
        $templateVars['{shop_name}'] = Configuration::get('PS_SHOP_NAME');
        $templateVars['{shop_phone}'] = Configuration::get('PS_SHOP_PHONE');

        $id_lang = Language::getIdByIso('es');
        $template_name = 'chilexpresstracking';
        $title = Mail::l("CHILEXPRESS OT - ").Configuration::get('PS_SHOP_NAME');
        $from = $customer_email;
        $fromName = $customer_name;
        $mailDir = dirname(__FILE__).'/mails/';//Directory with message templates
        $toName = Configuration::get('PS_SHOP_NAME');//Customer name

        Mail::Send($id_lang, $template_name, $title, $templateVars, $customer_email, $toName, $from, $fromName, null, null, $mailDir);
    }

    public function getlog()
    {
        $sql = "SELECT * FROM "._DB_PREFIX_."swachilexpresslog ORDER BY date DESC";
        return Db::getInstance()->ExecuteS($sql);
    }

    public function hookDisplayProductButtons()
    {
        /* Place your code here. */
        $id_product = Tools::getValue('id_product');

        $sql = "SELECT * FROM "._DB_PREFIX_."product as p
        WHERE p.id_product = '".(int)$id_product."'";
        $row = Db::getInstance()->ExecuteS($sql);
        foreach($row as $row) {
            $width = $row['width'];
            $height = $row['height'];
            $depth = $row['depth'];
            $weight = $row['weight'];
        }
        $sql = "SELECT * FROM "._DB_PREFIX_."state where active='1'";
        $row = Db::getInstance()->ExecuteS($sql);

        $this->context->smarty->assign('module_dir', $this->_path);
        $this->context->smarty->assign('id_product', $id_product);
        $this->context->smarty->assign('width', $width);
        $this->context->smarty->assign('height', $height);
        $this->context->smarty->assign('depth', $depth);
        $this->context->smarty->assign('weight', $weight);
        $this->context->smarty->assign('states', $row);
        return $this->display(__FILE__, 'views/templates/hook/quoteservice.tpl');

    }

    public function quoteShiping($destination, $origin, $width, $height, $depth, $weight, $id_product)
    {
        $testmode = Configuration::get('SWACHILEXPRESS_TESTMODE');
        try {
            if ($testmode == 1) {
                $WSDL = dirname(__FILE__) . "/internalws/TarificarCourier.wsdl";
            } else {
                $WSDL = Configuration::get('SWACHILEXPRESS_URLTARIF');
            }

            $clientOptions = array(
                "login" => Configuration::get('SWACHILEXPRESS_USERTARIF'),
                "password" => Configuration::get('SWACHILEXPRESS_PASSTARIF')
            );
            $client = new SoapClient($WSDL, $clientOptions);

            /* HEADER */
            $ns = 'http://www.chilexpress.cl/TarificaCourier/';

            $headerbody = array(
                'transaccion' => array(
                    'fechaHora'=>date('Y-m-d').'T'.date('H:i:s'),
                    'idTransaccionNegocio' => '?',
                    'sistema'=>'?',
                    'login'=> Configuration::get('SWACHILEXPRESS_USERTARIF'),
                    'password'=>Configuration::get('SWACHILEXPRESS_PASSTARIF'),
                    'soap_version' => SOAP_1_2
                )
            );

            $reqParams = array(
                'CodCoberturaOrigen' => trim($origin),
                'CodCoberturaDestino' => trim($destination),
                'PesoPza' => trim($weight),
                'DimAltoPza' => trim($height),
                'DimAnchoPza' => trim($width),
                'DimLargoPza' => trim($depth),
            );

            //Create Soap Header.
            $header = new SOAPHeader($ns, 'headerRequest', $headerbody);

            //set the Headers of Soap Client.
            $client->__setSoapHeaders($header);
            /* BODY */
            $result = $client->__soapCall(
                'TarificarCourier',
                array("TarificarCourier" => array('reqValorizarCourier'=>$reqParams)),
                array(),
                null,
                $outputHeaders
            );
//var_dump($result);die();
            $price = $result->respValorizarCourier->Servicios->ValorServicio;
            if ($price == 0) {
             $price = $this->seekManualPrice($destination);
             if($price == 0 || $price == '')
             {
                 $price = Configuration::get('SWACHILEXPRESS_DEFAULTPRICE');
             }
         }

         return $price;

     } catch (SoapFault $e) {
        $id_order = '';
        $sql = "INSERT INTO `"._DB_PREFIX_."swachilexpresslog`
        (`date`, `id_order`, `desc`, `process`) VALUES
        ('".pSQL(date("Y-m-d H:i:s"))."','".pSQL($id_order)."', '".pSQL($e->faultstring)."', 'Get Shippping Quote')";
        Db::getInstance()->Execute($sql);
        return $e;
    }
}

public function getImage($id_order)
{
   $sql = "SELECT * FROM "._DB_PREFIX_."swachilexpressguide WHERE id_order = '".pSQL($id_order)."'";
   $row = Db::getInstance()->ExecuteS($sql);
   foreach($row as $row) {
    return $row['image'];
}

}

public function getStates($id_country)
{
   $sql = "SELECT * FROM "._DB_PREFIX_."state WHERE id_country = '".pSQL($id_country)."'";
   return $row = Db::getInstance()->ExecuteS($sql);
}

public function editPrices($id_state, $price)
{
   $sql = "UPDATE "._DB_PREFIX_."state SET ship_price = '".pSQL($price)."' WHERE id_state='".pSQL($id_state)."'";
   Db::getInstance()->Execute($sql);
}

public function seekManualPrice($iso_code)
{
   $sql = "SELECT * FROM "._DB_PREFIX_."state WHERE iso_code = '".pSQL($iso_code)."'";
   $row = Db::getInstance()->ExecuteS($sql);
   foreach ($row as $row) {
      return $row['ship_price'];
  }
}
}
