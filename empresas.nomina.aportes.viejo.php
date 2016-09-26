<?php include ("verificaSesion.php");
$cuil = $_GET['cuil'];
$sql2 = "select * from titular where nrcuil = '$cuil'";
$result2 = mysql_query($sql2,$db);
$row2 = mysql_fetch_array($result2);
$estado="ACTIVO";
if (mysql_num_rows($result2) == 0) {
	$sql2 = "select * from bajatit where nrcuil = '$cuil'";
	$result2 = mysql_query($sql2,$db);
	$row2 = mysql_fetch_array($result2);
	$estado="DE BAJA - Desde: ".$row2['fecbaj'];
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Aportes Individuales</title>
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
		var a = document.createElement("a");
		a.target = "_blank";
		a.href = dire;
		a.click();
	}
	</script>
	
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-usd"></i><br>Aportes Individuales</h2>
			<h3><?php echo $row2['nombre']?></h3>
			<h3><?php echo "Nro Afiliado: ".$row2['nrafil']." - CUIL: ".$cuil ?></h3>
			<div class="col-md-8 col-md-offset-2">
				<table class="table" style="text-align: center"> 	
					<tr>
						<th style="text-align: center">Per&iacute;odo </th>
						<th style="text-align: center">CUIT</th>
						<th style="text-align: center">Remuneraci&oacute;n</th>
						<th style="text-align: center">Aporte</th>
					</tr>
					<?php
						if (!isset($global['timezone'])) {
							$global['timezone'] = "";
						}
						if ($global['timezone'] == "") {
							$global['timezone'] = "America/Buenos_Aires";
						}
						if (function_exists('date_default_timezone_set')) {
							date_default_timezone_set($global['timezone']);
						}
						
						$anoincio=date("Y")-1;
						$anofinal=date("Y")+1;
						
						$tabla="apoi".$_SESSION['delcod'];
						$tablaCuij = "cuij".$_SESSION['delcod'];
						for ($ano=$anoincio;$ano<$anofinal;$ano++){
							for ($mes=1;$mes<13;$mes++) {
								$sql3 = "select * from $tablaCuij where nrcuil = '$cuil' and anotra = '$ano' and mestra = '$mes'";
								$result3 = mysql_query($sql3,$db); 
								if (mysql_num_rows($result3) == 0) {
									$remu="-";
									$impo="-";	
									$cuit="-";
									
									$sql6 = "select * from desemple where nrcuil = '$cuil' and mestra = '$mes' and anotra = '$ano'";
									$result6 = mysql_query($sql6,$db); 
									$row6 = mysql_fetch_array($result6);
									if (mysql_num_rows($result6)!=0) {
										$cuit="ANSES - S.D.";
									}?>
									<tr>
										<td><?php echo $mes."/".$ano ?></td>
										<td><?php echo $cuit ?></td>
										<td><b><?php echo $remu ?></b></td>
										<td><b><?php echo $impo ?></b></td>
									</tr>
						<?php		} else {
									while ($row3=mysql_fetch_array($result3)) {
										$remu=$row3['remimp'];
										$cuit=$row3['nrcuit'];
							
										$sql = "select * from $tabla where nrcuit = '$cuit' and nrcuil = '$cuil' and mestra = '$mes' and anotra = '$ano'";
										$result = mysql_query($sql,$db); 
										$row = mysql_fetch_array($result);
										
										if (mysql_num_rows($result) == 0) {
											$impo="-";
										} else {
											$impo=$row['imptra'];
										} ?>
										<tr>
											<td><?php echo $mes."/".$ano ?></td>
											<td><a target="_blank" href="javascript:mypopup('empresas.ficha.php?nrcuit=<?php echo $cuit ?>')"><?php echo $cuit ?></a></td>
											<td><b><?php echo $remu ?></b></td>
											<td><b><?php echo $impo ?></b></td>
										</tr>
						<?php		}
								}
							}
						} ?>
				</table>
				<p>	* ANSES - S.D.: Cobrando para el per&iacute;odo subsidio para desempleados. </p>
				<p><a class="nover" href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px" class="glyphicon glyphicon-print"></i></a></p>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
		</div>
	</div>
</body>