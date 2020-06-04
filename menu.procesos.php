<?php include ("verificaSesion.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:500,700' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css" />
<style>
    a { color:black;  }
    a:hover { color:grey; }
</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			
			<?php include_once ("navbar.php"); ?>
			
			<div class="row" style="margin: 10px">
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">AUTORIZACIONES</h3>				
						</div>
						<div class="panel-body">
							<a href="autorizaciones/listado.php" title="INGRESAR"><i style="font-size: 100px"  class="glyphicon glyphicon-ok-sign"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">ORDENES DE CONSULTA</h3>				
						</div>
						<div class="panel-body">
							<a href="ordenes/listado.php" title="INGRESAR"><i style="font-size: 100px;" class="glyphicon glyphicon-modal-window"></i></a>
						</div>
					</div>
				</div>
				
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">PREVENCION DE LA SALUD</h3>
						</div>
						<div class="panel-body">
							<?php if ($_SESSION['tienePrevencion']) {?> 
									<a href="prevencion/menuPrevencion.php"><i style="font-size: 100px"  class="glyphicon glyphicon-plus"></i></a>
							<?php } else { ?>
									<i style="font-size: 100px"  class="glyphicon glyphicon-plus"></i>
							<?php } ?>
						</div>
						<?php if (!$_SESSION['tienePrevencion']) {?>
								<ul class="list-group">
									<li class="list-group-item" style="color: red">
									    <b>PEDIR AUTORIZACION</b>
									</li>
								</ul>
					   <?php  } ?>
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



