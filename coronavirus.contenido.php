<?php include ("verificaSesion.php"); 

$delcod = $_SESSION['delcod'];
$sql = "SELECT * FROM autorizacionemail WHERE delcod = $delcod";
$result = mysql_query($sql,$db);
$row = mysql_fetch_assoc($result);

?>

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
				<i style="font-size: 50px" class="glyphicon glyphicon-tasks"></i><br>CORONAVIRUS CONTENIDO
			</h2>
			
			<div class="row" style="margin: 15px">
    			<div class="col-md-6">
    				<h3 style="margin-top: -4px">Uso del correo electrónico a través de web mail</h3>
    				<p align="justify">
    					A continuación usted encontrara la información para poder acceder a su correo electrónico de autorizaciones a través de web mail. 
    					Usted debe ingresar al siguiente link <a href="http://www.ospim.com.ar/webmail" target="_blank">www.ospim.com.ar/webmail.</a> 
    					Han sido reiniciadas todas las contraseñas para centralizar su uso exclusivamente a traves de webmail.<br> 
						A continuacion los datos para su acceso.
					</p>
					<div class="panel panel-default">
						<div class="panel-body">
        					<h4 style="margin-top: -4px">Su información de acceso es la siguiente</h4>
        					<b>Dirección de correo electrónico: <font color="blue"><?php echo $row['email'] ?></font></b><br>
        					<b>Contraseña: <font color="blue"><?php echo $row['clave'] ?></font></b>
    					</div>
    				</div>
    				<p align="justify">
    					A la derecha de la pantalla encontrará un video explicativo que muestra como acceder al correo electrónico
    					a través del web mail paso a paso
    				</p>
    				
    			</div>
    			<div class="col-md-6">
                  	<video width="100%" controls>
                      <source src="files/videos/webmail.mp4" type="video/mp4">
                    </video>
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