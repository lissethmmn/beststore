

<div id="topCategories">
 <p style="font-weight:bold">Transacci&oacute;n Realizada correctamente </p>
<img src="{$base}modules/webpay/web-pay-adq.gif" alt="WebPay"/>
        <table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" align="center"  ><p style="color: rgb(255, 0, 0);"><strong>Datos de la Transacci&oacute;n</strong></p>  </td>
</tr>
<tr>
  <td width="16%" align="left"  >Tarjeta: <br /></td>
  <td width="17%" align="left"  >XXXX - {$TBK_FINAL_NUMERO_TARJETA}    </td>
</tr>

<tr>
  <td  align="left" >Orden de compra :  </td>
  <td  align="left" >{$id_carro} </td>
</tr>
<tr>
  <td  align="left" >N&ordm; Interno: <br />
  </td>
  <td  align="left" >{$TBK_ORDEN_COMPRA}</td>
</tr>
<tr>
  <td  align="left" >Nombre del Comercio:  </td>
  <td  align="left" >{$Comercio}</td>
</tr>
<tr>
  <td  align="left" >URL del comercio:<br />
  </td>
  <td  align="left" >{$url}</td>
</tr>
<tr>
  <td  align="left" >Monto:<br />
  </td>
  <td  align="left" >{$total_orden}</td>
</tr>
<tr>
  <td  align="left" >Moneda: <strong> </strong><br />
  </td>
  <td  align="left" >Pesos chilenos </td>
</tr>
<tr>
  <td  align="left" >Fecha transacci&oacute;n: </td>
  <td  align="left" >{$trs_fecha_transaccion}</td>
</tr>
<tr>
  <td  align="left" >Hora transacci&oacute;n: </td>
  <td  align="left" >{$hora}</td>
</tr>
 <tr>
  <td  align="left" >Nombre Comprador:<br />
  </td>
  <td  align="left" >{$address->firstname} {$address->lastname} </td>
</tr>
<tr>
  <td  align="left" >C&oacute;digo Autorizaci&oacute;n:<br />
  </td>
  <td  align="left" >{$TBK_CODIGO_AUTORIZACION}</td>
</tr>
<tr>
  <td  align="left" >Tipo de transacci&oacute;n:<br />
  </td>
  <td  align="left" > Venta</td>
</tr>
<tr>
  <td  align="left" >Tipo de Pago:<br />
  </td>
  <td  align="left" >{$tipo_pago}</td>
</tr>
<tr>
  <td  align="left" >Tipo de Cuota:<br />
  </td>
  <td  align="left" >{$tipo_pago_descripcion}</td>
</tr>

<tr>
  <td  align="left" >Numero de cuotas:</td>
  <td  align="left" >   {$trs_nro_cuotas} </td>
</tr>
<tr>
  <td  align="left" >Descripci&oacute;n de los Bienes y Servicios </td>
  <td  align="left" >Productos tienda <a href="index.php?controller=order-detail&id_order={$orden_compra}" >Ver detalle del pedido</a></td>
</tr>
<tr>
  <td  align="left" >Revise recctriciones con respecto a  devoluciones y reembolsos.</div></td>
  <td  align="left" ><div align="left">
  <a href="{$teminos_condiciones}" onclick="void window.open('{$teminos_condiciones}', '_blank', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');return false;">Ver detalle</a>
  
  
  </div></td>
						  </tr>
</table>
</div>