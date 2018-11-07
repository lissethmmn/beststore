<?php

require "./Controllers/GeneralController.php";

$GeneralController = new GeneralController();

$home = $GeneralController->index();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Chilexpress Validator</title>
	<meta name="description" content="Chilexpress Validator">
	<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar fixed-top navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Chilexpress Validator</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!--div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div-->
	</nav>
	<div class="container-fluid">
		<br>
		<br>
		<br>
		<?php
		//var_dump($home);
		?>
		<h1><?php echo $home['company_name'] ?></h1>
		<div class="row">
			<div class="col-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Servicio</th>
							<th scope="col">Estado</th>
							<th scope="col">Versión</th>
							<th scope="col">Versión Requerida</th>
						</tr>
					</thead>
					<tbody>
						<tr >
							<th class="<?php echo $home['php_clase_alert'] ?>" scope="row">1</th>
							<td>PHP</td>
							<td>OK</td>
							<td><?php echo $home['php_version'] ?></td>
							<td><?php echo $home['php_require_version'] ?></td>
						</tr>
						<tr>
							<th class="<?php echo $home['soap_clase_alert'] ?>" scope="row">2</th>
							<td>SOAP</td>
							<td><?php echo $home['soap_service'] ?></td>
							<td><?php echo $home['soap_version'] ?></td>
							<td><?php echo $home['soap_require_version'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Comprobar Web Services</h5>
						<div class="row">
							<div class="col-4">
								<button id="check-regiones" class="btn btn-primary btn-block" data-toggle="modal" data-target="#esperaModal">Regiones</button>
							</div>
							<div class="col-4">
								<input type="text" id="cobertura" name="cobertura" class="form-control" placeholder="Código Región">	
							</div>
							<div class="col-4">
								<button id="check-cobertura" class="btn btn-primary btn-block" data-toggle="modal" data-target="#esperaModal">Cobertura Comunas</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<hr>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Generar Etiquetas</h5>
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label for="pdfs">Cantidad de etiquetas</label>
									<input type="number" id="pdfs" name="pdfs" class="form-control" placeholder="Cantidad de etiquetas">
								</div>			
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="numeroTCC">Número TCC</label>
									<input type="number" id="numeroTCC" name="numeroTCC" class="form-control" placeholder="Número TCC">
								</div>			
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="numeroTCC">Generar PDF</label><br>
									<button id="check-integracion" class="btn btn-primary btn-block" data-toggle="modal" data-target="#esperaModal">Generar </button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="col-12">
				<hr>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Respuesta Web Services</h5>
						<div id="responseCHXP"></div>
					</div>
				</div>
			</div>
		</div>
	</div> 

	<!-- Modal -->
	<div class="modal fade" id="esperaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Procesado...</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="Valor" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
					<h5>Esta validando servicio por favor espere</h5>
				</div>
				<div class="modal-footer">
					<!--button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button-->
				</div>
			</div>
		</div>
	</div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="./assets/js/request-soap-rest.js"></script>

</html>