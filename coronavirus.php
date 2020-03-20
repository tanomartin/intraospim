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
			
			<h2 class="page-header">
				<i style="font-size: 50px;color: red" class="glyphicon glyphicon-asterisk"></i><br>CORONAVIRUS
			</h2>
			<h3 style="color: blue">CANAL DE COMUNICACION INSTITUCIONAL</h3>
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default text-center">
        			<p style="text-align: justify; margin: 15px">Ante la realidad que nos toca vivir, la U.S.I.M.R.A. respondiendo a decisiones gubernamentales, limita la actividad social y gremial a comunicaciones electrónicas, extendiendo la moción a todos los Sindicatos  y Delegaciones adheridos.<br> 
        			   Se habilitará un canal de comunicación a través de las intranets de U.S.I.M.R.A. y O.S.P.I.M. a los efectos de centralizar la informacion que deba ser comunicada. <br>
        			   El Dpto. de Sistemas está elaborando estrategias y estableciendo configuraciones que oportunamente seran informadas.</p>
         			<p style="text-align: right; margin: 15px"><b>Secretario General U.S.I.M.R.A.</b></p>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Comunicaciones</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-info-sign"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="coronavirus.comunicacion.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
			 	<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Contenido</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-tasks"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="coronavirus.contenido.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
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