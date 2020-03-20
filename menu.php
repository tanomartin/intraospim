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
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			
			<?php include_once ("navbar.php"); ?>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">CORONAVIRUS</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px; color: red" class="glyphicon glyphicon-asterisk"></i>
							<p><b style="color: blue">CANAL DE COMUNICACION INSTITUCIONAL</b></p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="coronavirus.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				
				<hr/>
				
				<div class="col-md-4 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Empresas</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-home"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="empresas.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
			 	<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Beneficiarios</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-user"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="beneficiarios.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div> 
				
  		  
				<div class="col-md-4 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Prevención de la Salud</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-plus"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item">
								<?php if ($_SESSION['tienePrevencion']) {?>
									<a href="prevencion/menuPrevencion.php" class="btn btn-primary">Ingresar</a>	
							   <?php } else { ?>
							    	<div style="color: red">PEDIR AUTORIZACION</div>
							  <?php  } ?>
							</li>
						</ul>
					</div>
				</div>
		
				<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Autorizaciones</h3>				
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-ok-sign"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item">
								<a href="autorizaciones/listado.php" class="btn btn-primary">Ingresar</a>
							</li>
						</ul>
					</div>
				</div>
		 
				<div class="col-md-4 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Instructivos y Formularios</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-book"></i>
							<i style="font-size: 100px"  class="glyphicon glyphicon-list-alt"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="documentos.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Consultas</h3>				
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-envelope"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="consultas.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
		</div>
	</div>
</body>
</html>



