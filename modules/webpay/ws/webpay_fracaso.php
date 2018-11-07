<?php

$id = $_REQUEST['TBK_ORDEN_COMPRA'];

$token_ws=$_REQUEST['token_ws'];
//echo $token_ws;
require("../../../config/settings.inc.php");
include("includes_webpay/configuration.php");
include("includes_webpay/database.php");
	$database = new database( $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix );

	$query = "SELECT id FROM `webpay_orden` where token ='".$token_ws."'";
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	$row=$rows[0];
	$trs_orden_compra=$row->id;
	if (!$row){
		$trs_orden_compra = $id ;
		}
	//vaciar carro a petición de transbank

?>

<h1>Transacci&oacute;n rechazada</h1>
<br>
<p>Su transacci&oacute;n N:<?php echo $trs_orden_compra;?> , no ha podido ser procesada </p>

<br><p>Las posibles causas de este rechazo son:<br />
  - Error en el ingreso de los datos de su tarjeta de cr&eacute;dito o debito (fecha y/o c&oacute;digo de seguridad).<br />
  - Su tarjeta de cr&eacute;dito o debito no cuenta con el cupo necesario para cancelar la compra.<br />
  - Tarjeta a&uacute;n no habilitada en el sistema financiero. <br />
  
</p>
<br>
<p>Si el problema persiste cont&aacute;ctese a ventas@lovemelissa.cl</p>

<p><a href='/pedido-rapido'>Volver a la tienda </a></p>


