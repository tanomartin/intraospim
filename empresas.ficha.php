<?php include ("verificaSesion.php");

$cuit = $_GET['nrcuit'];
$sql = "select e.*, p.nombre as provin from empresa e, provin p where e.nrcuit = '$cuit' and e.provle = p.codigo";
$result = mysql_query($sql,$db);
$row=mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ficha Empresa</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	
	<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="include/js/jquery.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script>
	function mypopup(dire) {
	    mywindow = window.open(dire, 'InfoCuenta', 'location=1, width=1080, height=600, top=30, left=40, resizable=1, scrollbars=1');
	}
	</script>
	
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-home"></i><br>Ficha de Empresa</h2>
			<h3><?php print ($row['nombre']);?></h3>
			<div class="col-md-8 col-md-offset-2">
				<table class="table" style="text-align: center">
			    	<tr>
				        <th style="text-align: center;">CUIT</th>
				      	<td><?php print ($row['nrcuit']);?></td>
			    	</tr>
				  	<tr>
				        <th style="text-align: center;">Domicilio</th>
				     	<td><?php print ($row['domile']);?></td>
			    	</tr>
			      	<tr>
				        <th style="text-align: center;">Localidad</th>
				      	<td><?php print ($row['locale']);?></td>
			    	</tr>
			      	<tr>
				        <th style="text-align: center;">Provincia</th>
						<td><?php print ($row['provin']);?></td>
			    	</tr>
			      	<tr>
				        <th style="text-align: center;">C.P.</th>
				      	<td><?php print ($row['copole']);?></td>
			    	</tr>
			      	<tr>
				        <th style="text-align: center;">Tel&eacute;fono</th>
				      	<td><?php print ($row['telef1']);?></td>
			    	</tr>
			      	<tr>
				        <th style="text-align: center;">Fecha Inicio</th>
				      	<td><?php print ($row['fecini']);?></td>
			    	</tr>
			   </table>
			   <a class="nover" href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px; margin-bottom: 20px"  class="glyphicon glyphicon-print"></i></a>
			</div>	
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
		</div>
	</div>
</body>
