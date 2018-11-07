$(document).ready(function(){
		$(".submit").click(function(){
			
			var id_valor =this.id.replace('boton','');
			
			
			var Tbk_orden_compra = $("#Tbk_orden_compra"+id_valor).val();
			var monto = $("#monto"+id_valor).val();
			var token = $("#token").val();
			
			var Tbk_codigo_autorizacion = $("#Tbk_codigo_autorizacion"+id_valor).val();
			var monto_anular = $("#monto_anular"+id_valor).val();
			
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = 'Tbk_orden_compra='+ Tbk_orden_compra + '&monto='+ monto + '&Tbk_codigo_autorizacion='+ Tbk_codigo_autorizacion+'&monto_anular='+monto_anular+'&token='+token;
			
			//alert(dataString );
			if(Tbk_orden_compra==''||monto==''||Tbk_codigo_autorizacion==''||monto_anular==''){
				alert("no se puede anular");
			}else{
			// AJAX Code To Submit Form.
				$.ajax({
				type: "POST",
				url: "../index.php?fc=module&module=webpay&controller=ws_anulacion",
				data: dataString,
				cache: false,
				success: function(result){
				confirm(result);
				location.reload(true);
			}
			});
		}
		return false;
});
});