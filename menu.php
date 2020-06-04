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
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title"><b>CORONAVIRUS</b></h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px; color: red" class="glyphicon glyphicon-asterisk"></i>
							<p><b style="color: blue">CANAL DE COMUNICACION INSTITUCIONAL</b></p>
							<p>Para mantenerse actualizado acerca de las comunicaciones y contenidos técnicos ingrese cotidianamente aquí</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="coronavirus.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">CONSULTAS</h3>
						</div>
						<div class="panel-body">
							<a href="menu.consultas.php" title="INGRESAR"><i style="font-size: 100px"  class="glyphicon glyphicon-th"></i></a>
						</div>
					</div>
				</div>		
		 		
		 		<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">PROCESOS</h3>
						</div>
						<div class="panel-body">
							<a href="menu.procesos.php" title="INGRESAR"><i style="font-size: 100px"  class="glyphicon glyphicon-copy"></i></a>
						</div>
					</div>
				</div>
		 
				<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">DOCUMENTACION</h3>
						</div>
						<div class="panel-body">
							<a href="menu.documentos.php" title="INGRESAR"><i style="font-size: 100px"  class="glyphicon glyphicon-list-alt"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">CONTACTO</h3>				
						</div>
						<div class="panel-body">
							<a href="consultas.php" title="INGRESAR"><i style="font-size: 100px"  class="glyphicon glyphicon-envelope"></i></a>
						</div>
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



