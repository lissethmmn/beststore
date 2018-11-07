

$("button#check-regiones").on("click", function(){
	console.log("regiones");

	$.get( "./api?regiones=all", function(response) {
		var jSONresponse = JSON.parse(response);
		console.log(jSONresponse);
		if(jSONresponse.status == true){
			var tableHead = `<table class="table">
			<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Codigo Región</th>
			<th scope="col">Region</th>
			</tr>
			</thead>`;

			var tableBody = '';

			for (var i = 0; jSONresponse.result.length > i; i++) {
				tableBody = tableBody + `<tbody>
				<tr>
				<th scope="row">` + (i + 1) + `</th>
				<td>` + jSONresponse.result[i].idRegion + `</td>
				<td>` + jSONresponse.result[i].GlsRegion + `</td>
				</tr>
				<tbody>`;
			}

			var tableEnd = "</table>";

			var todd = tableHead + tableBody + tableEnd;

			$("div#responseCHXP").html(todd);
			$("#esperaModal").modal('toggle');
		}
	})
	.done(function() {
		console.log( "second success" );
	})
	.fail(function() {
		console.log( "error" );
	})
	.always(function() {
		console.log( "finished" );
	});
});


$("button#check-cobertura").on("click", function(){
	console.log("cobertura");

	let $cobertura = $('input#cobertura');

	let id_region = $cobertura.val();

	console.log(id_region);

	$.get( "./api?cobertura=filter&id_region=" + id_region, function(response) {
		var jSONresponse = JSON.parse(response);
		console.log(jSONresponse);
		
		if(jSONresponse.status == true){
			var tableHead = `<table class="table">
			<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Código Comuna</th>
			<th scope="col">Código Comuna Ine</th>
			<th scope="col">Código Región</th>
			<th scope="col">Comuna</th>
			</tr>
			</thead>`;

			var tableBody = '';

			for (var i = 0; jSONresponse.result.length > i; i++) {
				tableBody = tableBody + `<tbody>
				<tr>
				<th scope="row">` + (i + 1) + `</th>
				<td>` + jSONresponse.result[i].CodComuna + `</td>
				<td>` + jSONresponse.result[i].CodComunaIne + `</td>
				<td>` + jSONresponse.result[i].CodRegion + `</td>
				<td>` + jSONresponse.result[i].GlsComuna + `</td>
				</tr>
				<tbody>`;
			}

			var tableEnd = "</table>";

			var todd = tableHead + tableBody + tableEnd;

			$("div#responseCHXP").html(todd);
			$("#esperaModal").modal('toggle');
		}else{
			var todd = "<span class='alert alert-danger'>" + jSONresponse.messageStatus + "</span>";
			$("div#responseCHXP").html(todd);
			$("#esperaModal").modal('toggle');
		}
	})
	.done(function() {
		console.log( "second success" );
	})
	.fail(function() {
		console.log( "error" );
	})
	.always(function() {
		console.log( "finished" );
	}); 
});

$("button#check-integracion").on("click", function(){
	console.log("integracion");

	let $pdfs = $('input#pdfs');
	let cant_pdf = $pdfs.val();

	let $numeroTCC = $('input#numeroTCC');
	let numero_tcc = $numeroTCC.val();


	$.get( "./api?integracion=filter&pdfs=" + cant_pdf + "&numeroTCC=" + numero_tcc, function(response) {
		var jSONresponse = JSON.parse(response);
		console.log(jSONresponse);
		
		if(jSONresponse.status == true){

			let Body = '<div class="row"><div class="col-4">' + jSONresponse.result.codigoEstado + '</div><div class="col-4">' + 
			jSONresponse.result.descripcionEstado + '</div>' + 
			'<div class="col-4"><a href="' + jSONresponse.pdf + 
			'" target="_blank" class="btn btn-primary">Ver pdf</a></div></div>';

			$("div#responseCHXP").html(Body);


			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				$("#esperaModal").modal('toggle');
			}, delayInMilliseconds);

			
		}
	})
	.done(function() {
		console.log( "second success" );
	})
	.fail(function() {
		console.log( "error" );
	})
	.always(function() {
		console.log( "finished" );
	}); 
});