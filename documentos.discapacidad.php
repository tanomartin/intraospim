<?php include ("verificaSesion.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport"
	content="width=device-width,initial-scale=1,maximum-scale=1" />
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet"
	href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:500,700'
	rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			
			<?php include_once ("navbar.php"); ?>
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-list-alt"></i><br>Documentación y Formularios</h2>
			<h3>Discapacidad</h3>
			
			<div class="row">
				<div class="col-md-5 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Manual de Procedimiento 2018</h3>
						</div>
						<div class="panel-body">
							<p>Instructivo Completo de Procedimiento para Discapacidad</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/Manual de Procedimiento Discapacidad 2018.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
			
				<div class="col-md-5">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Facturación de Prestadores 2017</h3>
						</div>
						<div class="panel-body">
							<p>Instructivo Para Facturación de Prestadores</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/INSTRUCTIVO FACTURACION.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">ANEXO I</h3>
						</div>
						<div class="panel-body">
							<p>Planilla de Asistencia Mensual Prestadores / Instituciones</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/ANEXO I PLANILLA ASISTENCIA OSPIM INSTITUCIONES.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">ANEXO II</h3>
						</div>
						<div class="panel-body">
							<p>Planilla de Asistencia Mensual Prestadores / Ambulatorio</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/ANEXO II PLANILLA ASISTENCIA OSPIM AMBULATORIO.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">ANEXO III</h3>
						</div>
						<div class="panel-body">
							<p>Planilla de Asistencia Mensual Prestadores / Transporte</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/ANEXO III PLANILLA ASISTENCIA OSPIM TRANSPORTE.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>			
			</div>
			
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>



