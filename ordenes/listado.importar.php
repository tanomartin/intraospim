<?php 
include ("verificaSesionOrdenes.php");
include ("lib/funciones.php");
include ("lib/funcionesCarga.php");?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Importacion de Solicitudes</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="../include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="../css/style.css">
	
	<script type="text/javascript" src="../include/js/jquery-2.2.0.min.js" ></script>
	<script type="text/javascript" src="../include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../include/js/jquery.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="../include/js/jquery.blockUI.js" ></script>
	<script type="text/javascript" src="lib/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="lib/funcionControl.js" ></script>
	<script>
    	function validar(formulario) {
    		if (formulario.txtImp.value == ""){
    			alert("El archivo txt con los datos de imporatacion es obligatorio");
    			return false;
    		}
    		$.blockUI({ message: "<h1>Generando Validacion de Importacion de Ordenes Consulta. Aguarde por favor...</h1>" });
    		formulario.generar.disabled = true;
    		return true;
    	}
	</script>
	</head>
<body>
    <div class="container">
    		<div class="row" align="center" style="background-color: #f5f5f5;">
    			<?php include_once ("../navbar.php"); ?>
    		<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-modal-window"></i><br>Órdenes de Consulta</h2>
			<h3>Importar Órdenes de Consulta</h3>	
			<div class="col-md-10 col-md-offset-1">
				<form id="importarSolicitud" name="importarSolicitud" method="post" action="listado.importar.verificar.php" enctype="multipart/form-data" onsubmit="return validar(this)">
					<h4>Archivo TXT importador de Ordenes de Consulta</h4>
					<p><input name="txtImp" id="txtImp" type="file" accept=".txt"/></p>
					<input style="margin-top: 10px" id="importar" class="btn btn-primary" name="importar" type="submit" value="Importar Órdenes de Consulta"  />
				</form>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>