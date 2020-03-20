<?php include ("verificaSesion.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:500,700' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			
			<?php include_once ("navbar.php"); ?>
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-list-alt"></i><br>Documentación y Formularios</h2>
			
			<div class="row" style="margin: 5px">
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3>H.I.V.</h3>
						</div>
						<div class="panel-body">
							<p>Formularios y Documentos para H.I.V.</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="documentos.hiv.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3>Diabetes</h3>
						</div>
						<div class="panel-body">
							<p>Formularios y Documentos para Diabetes</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="documentos.diabetes.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3>H.C. Otras Patologias</h3>
						</div>
						<div class="panel-body">
							<p>Formularios para Historias Clinicas</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="documentos.historiasclinicas.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3>Cronicidad</h3><br>
						</div>
						<div class="panel-body">
							<p>Formularios para Cronicidad</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="documentos.cronicidad.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3>Oncología</h3><br>
						</div>
						<div class="panel-body">
							<p>Formularios para Oncología</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="documentos.oncologia.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
			</div>
			
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
							<li class="list-group-item"><a href="files/instructivos/autorizaciones/tutorial.pdf" target="_blank" class="btn btn-primary">Descargar</a></li>
							<li class="list-group-item">
								<b><font color="blue"> Configuracion Correo</font> <br><br> Outlook Express (Windows XP) <br>Live Mail (Windows Vista a Windows 7)</b><br><a href="files/instructivos/autorizaciones/correo.pdf" target="_blank" class="btn btn-primary btn-sm"><i style="font-size: 10px"  class="glyphicon glyphicon-arrow-down"></i> Tutorial</a><br><br>
								<b>eClient (Windows 10)</b><br><a href="files/instructivos/autorizaciones/Tutorial eM Client.pdf" target="_blank" class="btn btn-primary btn-sm"><i style="font-size: 10px"  class="glyphicon glyphicon-arrow-down"></i>Tutorial</a>
								<a href="#" class="btn btn-primary btn-sm"><i style="font-size: 10px"  class="glyphicon glyphicon-arrow-down"></i> Programa</a>
							</li>
							<li class="list-group-item">
								<b><font color="blue">Configuracion Escaneo</font> </b><br><br>
								<a href="files/instructivos/autorizaciones/escaneo.pdf" target="_blank" class="btn btn-primary btn-sm"><i style="font-size: 10px"  class="glyphicon glyphicon-arrow-down"></i> Tutorial</a>
								<a href="files/instructivos/autorizaciones/Scan2PDF.exe" target="_blank" class="btn btn-primary btn-sm"><i style="font-size: 10px"  class="glyphicon glyphicon-arrow-down"></i> Programa</a>
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
			
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>



