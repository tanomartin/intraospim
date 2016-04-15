<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>

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
			<nav class="navbar navbar-default navbar-static-top">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="menu.php"> <img style="max-width:38px; margin-top: -9px;" src="images/logo.png"></a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" >(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="empresas.php">Empresas</a></li>
					<li><a href="beneficiarios.php">Beneficiarios</a></li>
					<?php if ($_SESSION['tienePrevencion']) {?><li><a href="prevencion/menuPrevencion.php">Prev. Salud</a></li><?php } ?>
					<?php if ($_SESSION['tieneAutorizacion']) {?><li><a href="autorizaciones/listado.php">Autorizaciones</a></li><?php } ?>
					<li><a href="documentos.php">Inst. y Forms.</a></li>
					<li><a href="consultas.php">Consultas</a></li>
				</ul>
			</nav>
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-book"></i><br>Instructivos</h2>
			
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Consultas</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-book"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/instructivos/tutorial.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Autorizaciones</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-ok-sign"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item">
								<b>Tutorial</b><br><a href="files/instructivos/autorizaciones/tutorial.pdf" target="_blank" class="btn btn-primary btn-sm">Descargar</a>
							</li>
							<li class="list-group-item">
								<b>Configuracion Correo</b><br><a href="files/instructivos/autorizaciones/correo.pdf" target="_blank" class="btn btn-primary btn-sm">Descargar</a>
							</li>
							<li class="list-group-item">
								<b>Configuracion Escane</b><br><a href="files/instructivos/autorizaciones/escaneo.pdf" target="_blank" class="btn btn-primary btn-sm">Descargar</a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Prevención de la Salud</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-plus"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/instructivos/prevencion/tutorial.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-list-alt"></i><br>Formularios</h2>
			<h3>Discapacidad</h3>
			
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Facturación de Prestadores</h3>
						</div>
						<div class="panel-body">
							<p>Instructivo Para Facturación de Prestadores</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/DISCAPACIDAD INSTRUCTIVO FACTURACION.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Trámites por Prestaciones</h3>
						</div>
						<div class="panel-body">
							<p>Instructivo Para Trámites por Prestaciones</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/DISCAPACIDAD INSTRUCTIVO BENEFICIARIO.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Transporte</h3>
						</div>
						<div class="panel-body">
							<p>Consentimiento de Transporte</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/CONSENTIMIENTO DE TRANSPORTE DISCAPACIDAD.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Tratamiento</h3>
						</div>
						<div class="panel-body">
							<p>Consentimiento de Tratamiento<br><br></p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/CONSENTIMIENTO DE TRATAMIENTO DISCAPACIDAD.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Asistencia</h3>
						</div>
						<div class="panel-body">
							<p>Planilla de Asistencia Mensual Prestadores / Ambulatorio</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/PLANILLA ASISTENCIA PRESTADORES OSPIM_AMBULATORIO.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Asistencia</h3>
						</div>
						<div class="panel-body">
							<p>Planilla de Asistencia Mensual Prestadores / Instituciones</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/PLANILLA ASISTENCIA PRESTADORES OSPIM_INSTITUCIONES.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Transporte</h3>
						</div>
						<div class="panel-body">
							<p>Planilla de Asistencia Mensual Transporte</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/PLANILLA ASISTENCIA TRANSPORTE OSPIM.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Independencia Funcional</h3>
						</div>
						<div class="panel-body">
							<p>Planilla de Medida de Independencia Funcional</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/PLANILLA DE MEDIDA DE INDEPENDENCIA FUNCIONAL.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Historia Clinica</h3>
						</div>
						<div class="panel-body">
							<p>Resumen de Historia Clinica</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/discapacidad/RESUMEN DE HISTORIA CLINICA PARA EL BENEFICIARIO.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
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



