<?php include ("verificaSesionOrdenes.php"); 
include_once ("lib/funciones.php"); 
$error = $_GET['error']; 
$cuil = $_GET['cuil'];?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Listado de Solicitudes</title>
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
<script type="text/javascript" src="../include/js/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
<script type="text/javascript" src="../include/js/jquery.blockUI.js" ></script>
<script></script>

</head>
<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<?php include_once ("../navbar.php"); ?>
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-modal-window"></i><br>Órdenes de Consulta</h2>
			<h3 style="color:red">ERROR AL GENERAR NUEVA ORDEN DE CONSULTA (COD: <?php echo $error ?>)</h3>
	  <?php if ($error == 1) {?>
	  			<h3 style="color:brown">Ya se ha generado una orden de consulta para el cuil "<?php echo $cuil ?>" el día de hoy</h3>
	  			<h3 style="color:brown">Por cualquier duda comuniquese con el sector Auditoria Central</h3>
	  <?php	}
	  	    if ($error == 2) {?>
	  			<h3 style="color:brown">Ya se ha superado el máximo de consulta permitidas por mes (5) para el cuil "<?php echo $cuil ?>"</h3>
	  			<h3 style="color:brown">Por cualquier duda comuniquese con el sector Auditoria Central</h3>
	  <?php	}	?>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>