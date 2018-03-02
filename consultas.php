<?php include ("verificaSesion.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Mandanos tus comentarios</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css' />
	<link rel="stylesheet" href="include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="css/style.css" />
	
	<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="include/js/jquery.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<?php include_once ("navbar.php"); ?>
			
			<h2><i style="font-size: 50px"  class="glyphicon glyphicon-envelope"></i><br>Consultas</h2>
			<div class="col-md-6 col-md-offset-3" align="left" >
				<form action="consultas.enviar.php" method="post" style="margin-bottom: 15px"> 	
					 <div> <?php if (isset($_GET['err'])) {
						  		$err = $_GET['err'];
								if ($err == 1) { ?>
						  		  	<div style='color:#FF0000'><b> ERROR AL ENVIAR EL MENSAJE INTENTELO NUEVAMENTE </b></div>
						<?php	}
						  	  } ?> 
					 </div>
				  	 <div class="form-group">
				        <label for="nombre_1">Nombre y Apellido: </label>
				        <input type="text"  name="nombre" id="nombre" placeholder="Introduce tu Nombre" required />
				     </div>
				     <div class="form-group">
				        <label for="email_1">Email: </label>
				        <input type="email" required name="email" id="email" placeholder="Introduce tu Email" />
				     </div>
				      <div class="form-group">
				        <label for="telefono_1">Telefono: </label>
				        <input type="number" required name="telefono" id="telefono" placeholder="Introduce tu Telefono" />
				     </div>
				     <div class="form-group">
				        <label for="consulta_1">Consulta: </label>
				       <textarea name="coment" required id="coment" cols="60" rows="5" ></textarea>
				     </div>
				     <div align="center">
				    	<button type="submit" class="btn btn-default">Enviar</button>
				    </div>
				</form>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
		</div>
	</div>
</body>
</html> 