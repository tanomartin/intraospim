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
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-list-alt"></i><br>Formularios</h2>
			<h3>Historias Clinicas</h3>
			
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Consentimiento Informado</h3><br>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/CONSENTIMIENTO INFORMADO.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Historia Clinica de Prácticas de Alta Complejidad</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/HISTORIA CLINICA DE PRACTICAS DE ALTA COMPLEJIDAD.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Historia Clínica HIV</h3><br>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/HISTORIA CLINICA HIV.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Historia Clínica Medicación Alto Costo</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/HISTORIA CLINICA MEDICACION ALTO COSTO.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Historia Clínica Oncología</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/HISTORIA CLINICA ONCOLOGIA.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Hormona de Crecimiento Formularios</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/HORMONA DE CRECIMIENTO FORMULARIOS.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Notificación de VIH-SIDA</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/NOTIFICACION DE VIH-SIDA.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Resumen de Historia Clínica Artritis</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/RESUMEN HISTORIA CLINICA ARTRITIS.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Resumen Historia Clínica Esclerosis Múltiple</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/RESUMEN HISTORIA CLINICA ESCLEROSIS MULTIPLE.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Resumen de Historia Clínica Específica para Hepatitis B y C Crónicas</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/RESUMEN DE HISTORIA CLINICA ESPECIFICA PARA HEPATITIS B Y C CRONICAS.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Historia Clínica de Fertilización Asistida</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/HISTORIA CLINICA DE FERTILIZACION ASISTIDA.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Historia Clínica Diabetes</h3>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/formularios/historias/HISTORIA CLINICA DIABETES.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
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



