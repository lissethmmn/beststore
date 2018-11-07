<?php

// include autoloader
require dirname(__DIR__) . '/vendor/autoload.php';

//echo dirname(__DIR__);
//echo "hola" . realpath('../vendor/autoload.php'); die();

use Dompdf\Dompdf;

class GeneralController
{

	private $SWACHILEXPRESS_URLGEO = 'http://qaws.ssichilexpress.cl/GeoReferencia?wsdl';
	private $SWACHILEXPRESS_URLGEO_QA = '../wsdl/GeoReferencia_QA.wsdl';
	private $SWACHILEXPRESS_URLTARIF = 'http://qaws.ssichilexpress.cl/TarificarCourier?wsdl';
	private $SWACHILEXPRESS_URLSHIP = 'http://qaws.ssichilexpress.cl/OSB/GenerarOTDigitalIndividual?wsdl';
	private $SWACHILEXPRESS_URLSHIP_QA = '../wsdl/GenerarOTDigital_QA.wsdl';

	private $SWACHILEXPRESS_USER = 'UsrTestServicios';
	private $SWACHILEXPRESS_PASS = 'U$$vr2$tS2T';

	private $SWACHILEXPRESS_TESTMODE = 1;
	private $SWACHILEXPRESS_ORIGIN = false;
	private $SWACHILEXPRESS_TCCNUMBER = 1210611;
	private $SWACHILEXPRESS_OTSTATE =2;
	private $SWACHILEXPRESS_DEFAULTPRICE = 0;

	private $DATAMOCK = '../assets/files/file-mock.json';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	public function index()
	{

		$soapStatus = extension_loaded("soap");
		$soapService = $soapStatus ? "OK":"Debe ser instalado";

		$phpVersion = phpversion();
		$phpVV = '5.4.0';

		$soapVersion = phpversion("soap");
		$soapVV = '5.4.0';

		if($soapVersion == false)
			$soapVersion = "No disponible";

		$phpComparacion = version_compare($phpVersion, $phpVV);

		$soapComparacion = version_compare($soapVersion, $soapVV);

		$claseAlert = 'alert-danger';
		if($phpComparacion == 1)
			$phpClassAlert = 'alert-success';

		$soapClassAlert = 'alert-danger';

		if($soapComparacion == 1)
			$soapClassAlert = 'alert-success';

		if($soapStatus == true && $soapComparacion != 1)
			$soapClassAlert = 'alert-warning';

		return [
			'company_name' => 'SoftwareAgil',
			'soap_service' => $soapService,
			'php_version' => $phpVersion,
			'php_require_version' => $phpVV,
			'soap_version' => $soapVersion,
			'soap_require_version' => $soapVV,
			'php_clase_alert' => $phpClassAlert,
			'soap_clase_alert' => $soapClassAlert
		];
	}

	public function response($params)
	{
		if(count($params) == 0){
			$result = [
				'status' => false,
				'result' => $params
			];
			return $result;
		}

		if(isset($params['regiones']))
			return $this->regiones();

		if(isset($params['cobertura']))
			return $this->cobertura($params['id_region']);

		if(isset($params['integracion']))
			return $this->integracion($params);
	}

	private function regiones()
	{
		$ns = "http://www.chilexpress.cl/CorpGR/";

		$options = array(
			//'cache_wsdl' => WSDL_CACHE_NONE,
			//'exceptions' => true,
			'login' => $this->SWACHILEXPRESS_USER,
			'password' => $this->SWACHILEXPRESS_PASS,
		);

		try {

			$client = new SoapClient($this->SWACHILEXPRESS_URLGEO_QA, $options);

			$headerbody = array(
				'transaccion' => array(
					'fechaHora'=>date('Y-m-d').'T'.date('H:i:s'),
					'idTransaccionNegocio' => '0',
					'sistema'=>'TEST',
					'usuario'=>'TEST',
					'idTransaccionOSB'=> '',
					'oficinaCaja'=> '',
					'nodoHeader'=> ''
				)
			);

            //Create Soap Header.
			$header = new SOAPHeader($ns, 'headerRequest', $headerbody);

			$client->__setSoapHeaders($header);

			/* BODY */
			$reqObtenerRegion = ['reqObtenerRegion'=>''];

			$soapResponse = $client->ConsultarRegiones($reqObtenerRegion);

			$result = [
				'status' => true,
				'result' => $soapResponse->respObtenerRegion->Regiones
			];
			return $result;

		} catch (SoapFault $e) {
			return $e;
		}
	}



	private function cobertura($id_region)
	{
		$ns = "http://www.chilexpress.cl/CorpGR/";

		$options = array(
			//'cache_wsdl' => WSDL_CACHE_NONE,
			//'exceptions' => true,
			'login' => $this->SWACHILEXPRESS_USER,
			'password' => $this->SWACHILEXPRESS_PASS,
		);

		try {

			$client = new SoapClient($this->SWACHILEXPRESS_URLGEO_QA, $options);

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

			$client->__setSoapHeaders($header);

			/* BODY */

			$reqParams = array(
				'CodTipoCobertura' => '3',
				'CodRegion' => $id_region
			);

			$reqObtenerRegion = ['reqObtenerCobertura'=>$reqParams];

			$soapResponse = $client->ConsultarCoberturas($reqObtenerRegion);

			//var_dump($soapResponse);

			if($soapResponse->respObtenerCobertura->CodEstado == 0){
				$result = [
					'status' => true,
					'messageStatus' => $soapResponse->respObtenerCobertura->GlsEstado,
					'result' => $soapResponse->respObtenerCobertura->Coberturas
				];
			}else{
				$result = [
					'status' => false,
					'messageStatus' => $soapResponse->respObtenerCobertura->GlsEstado,
					'result' => ""
				];
			}
			
			return $result;

		} catch (SoapFault $e) {
			return $e;
		}
	}


	private function integracion($params)
	{
		$ns = "http://www.chilexpress.cl/IntegracionAsistida/";

		$options = array(
			//'cache_wsdl' => WSDL_CACHE_NONE,
			//'exceptions' => true,
			'login' => $this->SWACHILEXPRESS_USER,
			'password' => $this->SWACHILEXPRESS_PASS,
		);

		if(!isset($params['pdfs']) || empty($params['pdfs']) || !is_numeric($params['pdfs']))
			$params['pdfs'] = 1;

		if(!isset($params['numeroTCC']) || empty($params['numeroTCC']) || !is_numeric($params['numeroTCC']))
			$params['numeroTCC'] = 1210611;

		

		try {

			$client = new SoapClient($this->SWACHILEXPRESS_URLSHIP_QA, $options);

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

			$client->__setSoapHeaders($header);

			$dataTemplate = '';

			$dataMock = json_decode(file_get_contents($this->DATAMOCK, FILE_USE_INCLUDE_PATH), true);

			shuffle($dataMock);

			for ($i=0; $i < $params['pdfs']; $i++) {

				if($i >= 200)
					break;
				/* BODY */
				$reqParams = array(
					'codigoProducto' => '3',
					'codigoServicio' => '3',
					'comunaOrigen' => 'ACHAO',
					'numeroTCC' => $params['numeroTCC'], // Numero cliente
					'referenciaEnvio' => $dataMock[$i]['referenciaEnvio'],
					'referenciaEnvio2' => $dataMock[$i]['referenciaEnvio2'],
					'eoc' => '0',
					'Remitente' => $dataMock[$i]['Remitente'],
					'Destinatario' => $dataMock[$i]['Destinatario'],
					'Direccion' => $dataMock[$i]['Direccion'],
					'DireccionDevolucion' => $dataMock[$i]['DireccionDevolucion'],
					'Pieza' => $dataMock[$i]['Pieza'],
				);

				$IntegracionAsistidaRequest = ['reqGenerarIntegracionAsistida'=>$reqParams];

				$soapResponse = $client->IntegracionAsistidaOp($IntegracionAsistidaRequest);

				$EstadoOperacion = $soapResponse->respGenerarIntegracionAsistida->EstadoOperacion;

				$imagenEtiqueta = '';
				if($EstadoOperacion->codigoEstado == 0){
					$imageJFIF = trim($soapResponse->respGenerarIntegracionAsistida->DatosEtiqueta->imagenEtiqueta);
					$imagenEtiqueta = base64_encode($imageJFIF);
				}

				if(($i + 1) < $params['pdfs'] && $params['pdfs'] > 1){
					$dataTemplate .= "<img src='data:image/jpeg;base64,{$imagenEtiqueta}' style='width: 378px; border: solid #ccc 1px;' /><div style='page-break-before: always;'></div>";
				}
				else{
					$dataTemplate .= "<img src='data:image/jpeg;base64,{$imagenEtiqueta}' style='width: 378px; border: solid #ccc 1px;' />";
				}
			}
			
			$dompdf = new Dompdf();
			$pathSave = dirname(__DIR__) . "/assets/files/";
			$fileName = "filesave.pdf";

			$dompdf->loadHtml($dataTemplate, 'UTF-8');
			$dompdf->setPaper('letter', 'portrait');

			$dompdf->render();

			$output = $dompdf->output();
			file_put_contents($pathSave . $fileName, $output);


			$result = [
				'status' => true,
				'result' => $soapResponse->respGenerarIntegracionAsistida->EstadoOperacion,
				'pdf' => "./assets/files/" . $fileName
			];
			return $result;

		} catch (SoapFault $e) {
			return $e;
		}
	}







}