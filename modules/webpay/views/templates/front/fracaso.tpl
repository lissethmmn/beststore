<!DOCTYPE html>

<html lang="es">
<head>
<style>
html {
    font-family: arial;
    font-size: 13px;
}
.cart {
    width: 960px;
    margin: 0 auto;
    text-align: center;
}
	.list_categoria {
border: 1px solid #ddd !important;
padding: 2px 11px;
}
p {
    margin: 5px;
    text-align: center;
}
table {
    border: 1px solid #ddd !important;
	background:#f8f8f8;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pago Webpay</title>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!--[if lt IE 7]>
<![endif]-->
  <!-- BEGIN Main Container -->
          <div style="text-align:center; margin-bottom: 20px;margin-top:20px;">
           <img src="modules/webpay/web-pay-adq.gif" /></div>
    <div class="main container">
      <div class="cart"> 
      
<h1>{l s='Transacción Rechazada' mod='webpay'}</h1>
<br>
<p>{l s='Su transacción número' mod='webpay'}  <b>{$orden_compra}</b> {l s='no ha podido ser procesada' mod='webpay'} </p>

<br><p>{l s='Las posibles causas de este rechazo son:' mod='webpay'}<br />
  {l s='- Error en el ingreso de los datos de su tarjeta de crédito o debito (fecha y/o código de seguridad).' mod='webpay'}<br />
  {l s='- Su tarjeta de crédito o debito no cuenta con el cupo necesario para cancelar la compra.' mod='webpay'}<br />
  {l s='- Tarjeta aún no habilitada en el sistema financiero.' mod='webpay'} <br />
</p>
<br>
<p>{l s='Si desea confirmar su compra porfavor contáctese con ' mod='webpay'}{$email}</p>
</div>
    <!-- BEGIN SIMPLE FOOTER --> 
  </footer>
  <div style="text-align:center; margin: 20px 0">
   <a class="linkhome" href="{$mosConfig_live_site}" style="text-align:center;font-weight: bold;">
          Haz clic aqu&iacute; para volver a la p&aacute;gina de inicio
          </a> </div>

</div>
<!--page-->
</body>
</html>