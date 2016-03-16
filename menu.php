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
					<li><a href="#">Beneficiarios</a></li>
					<?php if ($_SESSION['tienePrevencion']) {?><li><a href="#">Prev. Salud</a></li><?php } ?>
					<?php if ($_SESSION['tieneAutorizacion']) {?><li><a href="#">Autorizaciones</a></li><?php } ?>
					<li><a href="#">Inst. y Forms.</a></li>
					<li><a href="consultas.php">Consultas</a></li>
				</ul>
			</nav>
			
			
			<div class="row">
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
							<li class="list-group-item"><a href="empresas.php" class="btn btn-primary">Ingresar</a></li>
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
									<a href="files/tutorialIntra.pdf" class="btn btn-primary" target="_blanck">Ingresar</a>	
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
								<?php if ($_SESSION['tieneAutorizacion']) {?>
									<a href="consultas.php" class="btn btn-primary">Ingresar</a>
							   <?php } else { ?>
							    	<div style="color: red">PEDIR AUTORIZACION</div>
							  <?php  } ?>
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
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/tutorialIntra.pdf" class="btn btn-primary" target="_blanck">Ingresar</a></li>
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
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>



