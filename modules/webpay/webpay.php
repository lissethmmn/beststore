<?php

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;
class webpay extends PaymentModule{
	private	$_html = '';
	private $_postErrors = array();
	public $mosConfig_live_site; 
	public $mosConfig_mailfrom ;
	public $mosConfig_fromname ;
	public $https_prefijo; //valiables valido https o http
	public $correo_notificacion;
	public $nombre_destino;
	public $teminos_condiciones;
	public $texto_modulo;
	public $estado_procesando;
	public $estado_aceptado;
	public $estado_error;	
	public $webpay_comercio;
	
	public $ambiente;
	public $webpay_codigo_comercio;
	public $webpay_wsdl_normal;
	public $webpay_wsdl_anulacion;
	
	public $webpay_error_certificado;
	public $webpay_error_orden_duplicada;
	
	public $webpay_set_version=301099;
	public $webpay_configuradora="pagosweb.cl";
	public $webpay_orden;
	
			

	public function __construct()
	{
		$this->name = 'webpay';
		$this->tab = 'payments_gateways';
		$this->version = '4.5'; 
		$this->description = $this->l('Webpay plus Webservice');
     $this->author = 'Pagosweb.cl';

		
		$this->estado_procesando 			= Configuration::get('webpay_estado_procesando');//Configuration::get('PS_OS_PAYMENT');
		$this->estado_aceptado				= Configuration::get('PS_OS_PAYMENT');
		$this->estado_error					= Configuration::get('PS_OS_ERROR');
		
		
		
		$this->mosConfig_live_site 		= Configuration::get('webpay_mosConfig_live_site'); 
		$this->mosConfig_mailfrom 		= Configuration::get('webpay_mosConfig_mailfrom');
		$this->mosConfig_fromname 		= Configuration::get('webpay_mosConfig_fromname');
		$this->https_prefijo 			= Configuration::get('webpay_https_prefijo'); //valiables valido https o http
		$this->correo_notificacion		= Configuration::get('webpay_correo_notificacion');
		$this->nombre_destino			= Configuration::get('webpay_nombre_destino');
		$this->teminos_condiciones		= Configuration::get('webpay_teminos_condiciones');
		$this->texto_modulo				= Configuration::get('webpay_texto_modulo');
		$this->webpay_comercio				= Configuration::get('webpay_comercio');
		
		$this->webpay_error_certificado				= Configuration::get('webpay_error_certificado');
			$this->webpay_error_orden_duplicada				= Configuration::get('webpay_error_orden_duplicada');
			$this->webpay_orden				= Configuration::get('webpay_orden');	
			
			$this->webpay_tx_compra				= Configuration::get('webpay_tx_compra');	
			$this->webpay_exito				= Configuration::get('webpay_exito');	
			
	

		
	
		$this->ambiente =  Configuration::get('ambiente');//0 certificacion 1 producción
		if ($this->ambiente==0){ // valores desarrollo
			$this->webpay_codigo_comercio =  Configuration::get('webpay_codigo_comercio_certificacion');
			$this->webpay_wsdl_normal =  Configuration::get('webpay_wsdl_normal_certificacion');
			$this->webpay_wsdl_anulacion =  Configuration::get('webpay_wsdl_anulacion_certificacion');
		}else{ // valores producción
			$this->webpay_codigo_comercio =  Configuration::get('webpay_codigo_comercio_produccion');
			$this->webpay_wsdl_normal =  Configuration::get('webpay_wsdl_normal_produccion');
			$this->webpay_wsdl_anulacion =  Configuration::get('webpay_wsdl_anulacion_produccion');
		}
		
							
					
		
		$this->currencies = true;
		$this->currencies_mode = 'radio';

        parent::__construct();

		$this->page = basename(__FILE__, '.php');
        $this->displayName = $this->texto_modulo;
        $this->description = 'Acepta pagos de WebPay';
		$this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
	}

	public function getwebpayUrl()
	{
			return Configuration::get('webpay_SANDBOX') ? '../cgi-bin/tbk_bp_pago.cgi' : '../cgi-bin/tbk_bp_pago.cgi';
	}

	public function install()	{		
		require_once _PS_MODULE_DIR_.'/webpay/controllers/front/admin.php'; 
			if (!instal()){return null;}	
			
			if (!parent::install() || !$this->registerHook('paymentReturn') || !$this->registerHook('paymentOptions')) {
			//if(!parent::install() OR !$this->registerHook('payment') OR !$this->registerHook('paymentReturn')){
				
								return false;				
			}else{						
					$url_comercio= $_SERVER['SERVER_NAME'];	 $url_comercio= str_replace("www.","",$url_comercio);
					Configuration::updateValue('webpay_comercio', $url_comercio);
					Configuration::updateValue('webpay_mosConfig_live_site', $url_comercio);
					Configuration::updateValue('webpay_mosConfig_mailfrom', 'ventas@'.$url_comercio);
					Configuration::updateValue('webpay_mosConfig_fromname', $url_comercio);
					Configuration::updateValue('webpay_https_prefijo', 'http');
					Configuration::updateValue('webpay_correo_notificacion', 'ventas@'.$url_comercio);
					Configuration::updateValue('webpay_nombre_destino', $url_comercio);
					Configuration::updateValue('webpay_teminos_condiciones', 1);
					Configuration::updateValue('webpay_texto_modulo', 'Webpay Plus');
					Configuration::updateValue('ambiente', 'Certificación');
					 
					Configuration::updateValue('webpay_tx_compra', Context::getContext()->link->getModuleLink($this->name, 'tx_compra', array(), true));
        	Configuration::updateValue('webpay_exito', Context::getContext()->link->getModuleLink($this->name, 'exito', array(), true));


					
					Configuration::updateValue('webpay_codigo_comercio_certificacion', '597020000541');
					Configuration::updateValue('webpay_wsdl_normal_certificacion', 'https://webpay3gint.transbank.cl/WSWebpayTransaction/cxf/WSWebpayService?wsdl');
					Configuration::updateValue('webpay_wsdl_anulacion_certificacion', 'https://webpay3gint.transbank.cl/WSWebpayTransaction/cxf/WSCommerceIntegrationService?wsdl');
					Configuration::updateValue('webpay_codigo_comercio_produccion', 'Codigo de comercio producción');
					Configuration::updateValue('webpay_wsdl_normal_produccion', 'https://webpay3g.transbank.cl/WSWebpayTransaction/cxf/WSWebpayService?wsdl');
					Configuration::updateValue('webpay_wsdl_anulacion_produccion','https://webpay3g.transbank.cl/WSWebpayTransaction/cxf/WSCommerceIntegrationService?wsdl');	Configuration::updateValue('webpay_orden', md5($url_comercio));
					$this->addOrderStates();
					
					$sql=query_install(1);	$result = Db::getInstance()->ExecuteS($sql);$sql=query_install(2);	$result = Db::getInstance()->ExecuteS($sql);	
					$sql=query_install(3);	$result = Db::getInstance()->ExecuteS($sql);$sql=query_install(4);	$result = Db::getInstance()->ExecuteS($sql);	

			
					
			return true;			}		
			}		
			
		
	public function uninstall()	{		if (!Configuration::deleteByName('webpay_BUSINESS')			OR !Configuration::deleteByName('webpay_SANDBOX')			OR !parent::uninstall())			return false;		return true;	}



	private function addOrderStates()	{
		require_once _PS_MODULE_DIR_.'/webpay/controllers/front/admin.php'; 
				
				 if (!(Configuration::get('webpay_estado_procesando') > 0)) {
					// Open
					$OrderState = new OrderState(null, Configuration::get('PS_LANG_DEFAULT'));
					$OrderState->name = "Procesando pago webpay";
					$OrderState->invoice = false;
					$OrderState->send_email = false;
					$OrderState->module_name = $this->name;
					$OrderState->color = "RoyalBlue";
					$OrderState->unremovable = true;
					$OrderState->hidden = false;
					$OrderState->logable = false;
					$OrderState->delivery = false;
					$OrderState->shipped = false;
					$OrderState->paid = false;
					$OrderState->deleted = false;
					$OrderState->template = "order_changed";
					$OrderState->add();
		
					Configuration::updateValue("webpay_estado_procesando", $OrderState->id);
					//query
						}	

		}
	

	public function getContent()
	{
		$this->_html = '<h2>webpay</h2>';
		if (isset($_POST['submitwebpay']))
		{
			
			if (empty($_POST['webpay_mosConfig_live_site']))
				$this->_postErrors[] = $this->l('webpay Url de comercio es requerido');
		
			if (!sizeof($this->_postErrors))
			{
							
					Configuration::updateValue('webpay_mosConfig_live_site', strval($_POST['webpay_mosConfig_live_site']));
					Configuration::updateValue('webpay_comercio', strval($_POST['webpay_comercio']));					
					Configuration::updateValue('webpay_mosConfig_mailfrom', strval($_POST['webpay_mosConfig_mailfrom']));
					Configuration::updateValue('webpay_mosConfig_fromname', strval($_POST['webpay_mosConfig_fromname']));
					Configuration::updateValue('webpay_https_prefijo', strval($_POST['webpay_https_prefijo']));
					Configuration::updateValue('webpay_correo_notificacion', strval($_POST['webpay_correo_notificacion']));
					Configuration::updateValue('webpay_nombre_destino', strval($_POST['webpay_nombre_destino']));
					Configuration::updateValue('webpay_teminos_condiciones',strval($_POST['webpay_teminos_condiciones']));
					Configuration::updateValue('webpay_texto_modulo', strval($_POST['webpay_texto_modulo']));
	
				$this->displayConf();
			}
			else
				$this->displayErrors();
		}
		
		if (isset($_POST['submitwebpayAmbiente']))
		{
			
			if (empty($_POST['webpay_codigo_comercio_certificacion']))
				$this->_postErrors[] = $this->l('En Ambiente y llave falta Codigo de comercio de comercio');

		
			if (!sizeof($this->_postErrors))
			{
							
					Configuration::updateValue('ambiente', strval($_POST['ambiente']));
					Configuration::updateValue('webpay_codigo_comercio_certificacion', strval($_POST['webpay_codigo_comercio_certificacion']));
					Configuration::updateValue('webpay_wsdl_normal_certificacion', strval($_POST['webpay_wsdl_normal_certificacion']));
					Configuration::updateValue('webpay_wsdl_anulacion_certificacion', strval($_POST['webpay_wsdl_anulacion_certificacion']));
					Configuration::updateValue('webpay_codigo_comercio_produccion', strval($_POST['webpay_codigo_comercio_produccion']));
					Configuration::updateValue('webpay_wsdl_normal_produccion', strval($_POST['webpay_wsdl_normal_produccion']));
					Configuration::updateValue('webpay_wsdl_anulacion_produccion',strval($_POST['webpay_wsdl_anulacion_produccion']));
				
					Configuration::updateValue('webpay_error_certificado', strval($_POST['webpay_error_certificado']));
					Configuration::updateValue('webpay_error_orden_duplicada',strval($_POST['webpay_error_orden_duplicada']));

					Configuration::updateValue('webpay_tx_compra', Context::getContext()->link->getModuleLink($this->name, 'tx_compra', array(), true));
        	Configuration::updateValue('webpay_exito', Context::getContext()->link->getModuleLink($this->name, 'exito', array(), true));

				
				$this->displayConf();
			}
			else
				$this->displayErrors();
		}
		//
		if (isset($_POST['submitwebpayLicencia']))
		{
			
			if (empty($_POST['webpay_orden']))
				$this->_postErrors[] = $this->l('En Licencia: Orden de compra');
			
			if (empty($_POST['webpay_email']))
				$this->_postErrors[] = $this->l('En Licencia: Email');
			
			if (empty($_POST['url_comercio']))
				$this->_postErrors[] = $this->l('En Licencia: Url Comercio');
		
			if (!sizeof($this->_postErrors))
			{
					$url_comercio= $_SERVER['SERVER_NAME'];	 $url_comercio= str_replace("www.","",$url_comercio);
					Configuration::updateValue('webpay_orden', strval($_POST['webpay_orden']));
					Configuration::updateValue('webpay_email', strval($_POST['webpay_email']));
					Configuration::updateValue('url_comercio', $url_comercio);
				
			}
			else
				$this->displayErrors();
		}
		
		
		$this->displaywebpay();
		$this->displayFormSettings();
		return $this->_html;
	}

	public function displayConf()
	{
		$this->_html .= '
		<div class="conf confirm">
			<img src="../img/admin/ok.gif" alt="'.$this->l('Confirmation').'" />
			'.$this->l('Settings updated').'
		</div>';
	}

	public function displayErrors()
	{
		$nbErrors = sizeof($this->_postErrors);
		$this->_html .= '
		<div class="alert error">
			<h3>'.($nbErrors > 1 ? $this->l('There are') : $this->l('There is')).' '.$nbErrors.' '.($nbErrors > 1 ? $this->l('errors') : $this->l('error')).'</h3>
			<ol>';
		foreach ($this->_postErrors AS $error)
			$this->_html .= '<li>'.$error.'</li>';
		$this->_html .= '
			</ol>
		</div>';
	}
	
	
	public function displaywebpay()
	{
		$this->_html .= '';
	}

	public function displayFormSettings()
	{
			require_once _PS_MODULE_DIR_.'/webpay/controllers/front/admin.php';
			$conf = Configuration::getMultiple(variables_config());
		
		$webpay_buffer = webpay_buffer();
		if ($webpay_buffer){			$this->_html = $webpay_buffer;			 return 0;		} 
	
			
			
			$business = array_key_exists('business', $_POST) ? $_POST['business'] : (array_key_exists('webpay_BUSINESS', $conf) ? $conf['webpay_BUSINESS'] : '');
			
			$this->_html .= '
		<br />
		<fieldset class="width3">
			<legend><img src="../img/admin/warning.gif" />'.$this->l('Information').'</legend>
			<table>
				<tr>
					<td><img src="../modules/webpay/web-pay-adq.gif" style="float:left; margin-right:15px;" /></td>
					<td>
					Modulo WebPay para prestoshop, certificado por Transbank Ver:'.$this->version.'<br>
Autor: Victor Araya - contacto@pagosweb.cl<br>
Empresa Configuradora: '.$this->webpay_configuradora.'
<br />
Comercio: <b>'.$this->mosConfig_live_site.'</b> / Licencia:<b>' .$this->webpay_orden.'</b>
					</td>
				</tr>
			</table>
		</fieldset>';
		
			$sql="SELECT * from webpay 
					WHERE Tbk_respuesta in ('0','Anulado', 'Anulado Parcial') order by CAST(Tbk_orden_compra as SIGNED ) desc";
		$result = Db::getInstance()->ExecuteS($sql);	
		
		$this->_html .='<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="'. __PS_BASE_URI__.'modules/webpay/controllers/front/funciones.js"></script>

<div class="container">
  <ul class="nav nav-tabs">
    <li ><a data-toggle="tab" href="#home">Configuracion</a></li>
    <li><a data-toggle="tab" href="#menu1">Ambiente y llaves</a></li>
    <li class="active"><a data-toggle="tab" href="#menu2">Panel de transacciones</a></li>
    <li><a data-toggle="tab" href="#menu3">Licencia</a></li>
       <li><a data-toggle="tab" href="#menu4">Ayuda</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade ">
      <p>'.configuracion($conf).'</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <p>'.ambiente($conf).'</p>
    </div>
    <div id="menu2" class="tab-pane fade in active">
      <p>'.panel_pago($result,$this->webpay_set_version ).'</p>
    </div>
    <div id="menu3" class="tab-pane fade">
    
      <p>'.licencia($conf).'</p>
    </div>
    <div id="menu4" class="tab-pane fade">
    
      <p>'.ayuda($conf).'</p>
    </div>
    
  </div>
</div>';
		
		
		}

 public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return;
        }

        // Check if cart has product download
        

        $newOption = new PaymentOption();
        $newOption->setModuleName($this->name)
            ->setCallToActionText($this->trans('Webpay', array(), 'Modules.Cashondelivery.Shop'))
            ->setAction($this->context->link->getModuleLink($this->name, 'ws_payment', array(), true))
            ->setAdditionalInformation($this->fetch('module:webpay/views/templates/hook/ps_webpay.tpl'));

        $payment_options = [
            $newOption,
        ];
        return $payment_options;
    }

	public function hookPayment($params)
	{
			require_once _PS_MODULE_DIR_.'/webpay/controllers/front/admin.php';
		if (!$this->active)
			return ;

		global $smarty;

		$address = new Address(intval($params['cart']->id_address_invoice));
		$customer = new Customer(intval($params['cart']->id_customer));
		$business = Configuration::get('webpay_mosConfig_live_site');
		$currency = $this->getCurrency();
		
		$errr_1=Validate_isvalido($business);
		if ($errr_1)return $this->l($errr_1);

		if (!Validate::isLoadedObject($address) OR !Validate::isLoadedObject($customer) OR !Validate::isLoadedObject($currency))
			return $this->l('webpay error: (invalid address or customer)');
			
		$products = $params['cart']->getProducts();

		foreach ($products as $key => $product)
		{
			$products[$key]['name'] = str_replace('"', '\'', $product['name']);
			if (isset($product['attributes']))
				$products[$key]['attributes'] = str_replace('"', '\'', $product['attributes']);
			$products[$key]['name'] = htmlentities(utf8_decode($product['name']));
			$products[$key]['webpayAmount'] = number_format(Tools::convertPrice($product['price_wt'], $currency), 2, '.', '');
		}
		
        
		$smarty->assign(array(
			'address' => $address,
			'country' => new Country(intval($address->id_country)),
			'customer' => $customer,
			'business' => $business,
			'header' => $header,
			'currency' => $currency,
			'orden_compra' => $params['cart']->id,
			'webpayUrl' => $this->getwebpayUrl(),
			// products + discounts - shipping cost
			'amount' => number_format(Tools::convertPrice($params['cart']->getOrderTotal(true, 4), $currency), 2, '.', ''),
			// shipping cost + wrapping
			'shipping' =>  number_format(Tools::convertPrice(($params['cart']->getOrderShippingCost() + $params['cart']->getOrderTotal(true, 6)), $currency), 2, '.', ''),
			'discounts' => $params['cart']->getDiscounts(),
			'products' => $products,
			// products + discounts + shipping cost
			'total' => round(Tools::convertPrice($params['cart']->getOrderTotal(true, 3), $currency)),
			'id_cart' => intval($params['cart']->id),
			'goBackUrl' => $this->https_prefijo.'://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'order-confirmation.php?key='.$customer->secure_key.'&id_cart='.intval($params['cart']->id).'&id_module='.intval($this->id),
			'url_enviar' => $this->https_prefijo.'://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'index.php?fc=module&module=webpay&controller=ws_payment',
			'tx_compra' => $this->https_prefijo.'://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'index.php?fc=module&module=webpay&controller=tx_compra',
			'token' => base64_encode(intval($params['cart']->id)."superclave"),
			'this_path' => $this->_path
		));
		return $this->display(__FILE__, 'views/templates/front/webpay.tpl');
	}

	public function hookPaymentReturn($params)
	{
	
		//$id_orden=$this->ordenCompra($params['objOrder']->id_cart);
		$id_orden=$_GET['id_cart'];
		$sql="SELECT * FROM `webpay` WHERE Tbk_respuesta = '0' AND `Tbk_orden_compra` = ".$id_orden;
		$result = Db::getInstance()->getRow($sql);		
		
		if ($result['Tbk_respuesta']=='0'){  //fue aceptado por el validador, entra a comprobante si no va a fracaso
			$address = new Address(intval($params['order']->id_address_invoice));
		
			$orden_compra = $this->ordenCompra($id_orden);
		
			
			$TBK_FINAL_NUMERO_TARJETA=$result['Tbk_numero_final_tarjeta'];
			$TBK_ORDEN_COMPRA=$params['order']->id;
			$Comercio=$this->webpay_comercio;
			$url=$this->mosConfig_live_site;
			$trs_monto = substr($result['Tbk_monto'],0,-3);
			$dateArray=explode('-',$result['Tbk_fecha_transaccion']);
			$trs_fecha_transaccion = substr($dateArray[2],0,2)."/".$dateArray[1]."/".$dateArray[0]; 
			
			$TBK_CODIGO_AUTORIZACION = $result['Tbk_codigo_autorizacion'];
			$TIPO_TRANSACCION="Venta";
			$trs_tipo_pago = $result['Tbk_tipo_pago']; 
			$trs_nro_cuotas = $result['Tbk_numero_cuotas'];
			if ($trs_nro_cuotas=='0'){$trs_nro_cuotas='00';}
			$tipo_pago_descripcion="";
			$tipo_pago=" Credito";
			if ($trs_tipo_pago=="VN"){	$tipo_pago_descripcion=" Sin Cuotas";}
			if ($trs_tipo_pago=="VC"){	$tipo_pago_descripcion=" Normales";}
			if ($trs_tipo_pago=="SI"){	$tipo_pago_descripcion=" Sin inter&eacute;s";}
			if ($trs_tipo_pago=="CIC"){	$tipo_pago_descripcion=" Cuotas Comercio";}
			if ($trs_tipo_pago=="VD"){	$tipo_pago_descripcion=" Debito";$tipo_pago=" Redcompra";}
			
			
			$base =$this->https_prefijo.'://'.htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__;
			
			
			if (!$this->active)
				return ;
				$currency = $this->getCurrency();	
			global $smarty;	
			$smarty->assign(array(
			'address' => $address,
				'orden_compra' => $TBK_ORDEN_COMPRA,
				'id_carro' =>$id_orden,
				'TBK_FINAL_NUMERO_TARJETA' =>$TBK_FINAL_NUMERO_TARJETA,
				'TBK_ORDEN_COMPRA' =>$TBK_ORDEN_COMPRA,
				'Comercio' =>$Comercio,
				'url' =>$url,
				'trs_monto' =>$trs_monto,
				'trs_fecha_transaccion' =>$trs_fecha_transaccion,
				'TBK_CODIGO_AUTORIZACION' =>$TBK_CODIGO_AUTORIZACION,
				'TIPO_TRANSACCION' =>$TIPO_TRANSACCION,
				'tipo_pago_descripcion' =>$tipo_pago_descripcion,
				'trs_nro_cuotas' =>$trs_nro_cuotas,
				'total_orden' =>  Tools::displayPrice(
                    $params['order']->getOrdersTotalPaid(),
                    new Currency($params['order']->id_currency),
                    false
                ),
					'hora' => date("g:i") ,
				'tipo_pago' =>  $tipo_pago,
				'base'=>$base,
				'teminos_condiciones'=>$this->teminos_condiciones,
				'this_path' => $this->_path
			));
			
			//Tools::displayPrice($this->context->cart->getOrderTotal(true), $currency),
			
			return $this->display(__FILE__, 'views/templates/front/confirmation.tpl');
		}else{
		
			return $this->display(__FILE__, 'views/templates/front/fracaso.tpl');
		}
		
	}

	public function getL($key)
	{
		$translations = array(
			'mc_gross' => $this->l('webpay key \'mc_gross\' not specified, can\'t control amount paid.'),
			'payment_status' => $this->l('webpay key \'payment_status\' not specified, can\'t control payment validity'),
			'payment' => $this->l('Payment: '),
			'custom' => $this->l('webpay key \'custom\' not specified, can\'t rely to cart'),
			'txn_id' => $this->l('webpay key \'txn_id\' not specified, transaction unknown'),
			'mc_currency' => $this->l('webpay key \'mc_currency\' not specified, currency unknown'),
			'cart' => $this->l('Cart not found'),
			'order' => $this->l('Order has already been placed'),
			'transaction' => $this->l('webpay Transaction ID: '),
			'verified' => $this->l('The webpay transaction could not be VERIFIED.'),
			'connect' => $this->l('Problem connecting to the webpay server.'),
			'nomethod' => $this->l('No communications transport available.'),
			'socketmethod' => $this->l('Verification failure (using fsockopen). Returned: '),
			'curlmethod' => $this->l('Verification failure (using cURL). Returned: '),
			'curlmethodfailed' => $this->l('Connection using cURL failed'),
		);
		return $translations[$key];
	}

	
	function ejecuta_query($query){
		//ejecuta un query desde la clase
		$result = Db::getInstance()->Execute($query);	
	}
	
		function query_row($query){
		//ejecuta un query desde la clase
		$result = Db::getInstance()->getRow($query);
		return	 $result ;
	}
	
	function ordenCompra($id_cart){
		//desde un codigo de carro trae el codigo del pedido generado
		if ($id_cart){
				$result = Db::getInstance()->getRow(' SELECT id_order FROM `'._DB_PREFIX_.'orders` pc	WHERE `id_cart` ='.$id_cart );	
				return $result['id_order'];	
			}else{
					return 0;
				}
		
	}
	function ordenCarro($id_order){
		//desde un codigo de carro trae el codigo del pedido generado
		$result = Db::getInstance()->getRow('SELECT id_cart FROM `'._DB_PREFIX_.'orders` pc	WHERE `id_order` ='.$id_order );
		//echo 'SELECT id_cart FROM `'._DB_PREFIX_.'orders` pc	WHERE `id_order` ='.$id_order;	
		return $result['id_cart'];	
	}
	
	
	function montoCompra($id_cart){
		$cart = new Cart(intval($id_cart));
		$monto=floor($cart->getOrderTotal(true, 3));	
		return $monto;	
	}
	
}

	