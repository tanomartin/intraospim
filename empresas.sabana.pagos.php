<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$delcod = $_SESSION['delcod'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$rem = "AFIP no informa";

$sql = "select * from empresa where delcod = $delcod and nrcuit = '$nrcuit'";
$result = mysql_query($sql,$db);
$row = mysql_fetch_array($result);

$sql4 = "select * from pagos where delcod = $delcod and nrcuit = '$nrcuit' and anotra = '$ano' and mestra = '$mes'";
$result4 = mysql_query($sql4,$db);
while ($row4=mysql_fetch_array($result4)) {
	if ($row4['contra'] == "REM") {
		$rem += $row4['totdep'];
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Detalle De pago</title>
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
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-list-alt"></i><br>Detalle de Pago</h2>
			<h2><?php print ($row['nombre']);?></h2>
			<div class="col-md-10 col-md-offset-1">
				<h4>Total de Remuneraciones: <b><?php echo $rem ?></b> </h4>
				<table class="table" style="text-align: center">
				  <tr>
				    <th style="text-align: center">Per&iacute;odo</th>
				    <th style="text-align: center">Fecha de Deposito </th>
				    <th style="text-align: center">Total Depositado </th>
				    <th style="text-align: center">Descripci&oacute;n </th>
				  </tr>
				  <?php
					$sql1 = "select p.*, date_format(fecdep, '%d/%m/%Y') as fecdep from pagos as p where delcod = $delcod and nrcuit = '$nrcuit' and anotra = '$ano' and mestra = '$mes'";
					$result1 = mysql_query($sql1,$db); 
					while ($row1=mysql_fetch_array($result1)) {
							$descri="OTROS";
							if ($row1['contra'] == "381") {
								$descri="APORTE";
							}
							if ($row1['contra'] == "401") {
								$descri="CONTRIBUCIÓN";
							}
							if (($row1['contra'] != "REM") && ($row1['contra'] != "OSP")) { ?>
								<tr>
									<td><?php echo $row1['mestra']."/".$row1['anotra'] ?></td>
									<td><?php echo $row1['fecdep'] ?></td>
									<td><?php echo $row1['totdep'] ?></td>
									<td><?php echo $descri ?></td>
								</tr>
					<?php	}
					 	} ?>
				</table>
				<?php
					$sql3 = "select * from cabjur where delcod = $delcod and nrcuit = '$nrcuit' and anotra = '$ano' and mestra = '$mes'";
					$result3 = mysql_query($sql3,$db); 
					$row3=mysql_fetch_array($result3);
					$empleados=$row3['canper'];
					$declarado=$row3['totrem']; ?>
					
				<h3>Detalle de D.D.J.J. </h3>
				<h3>Total de Empleados: <?php echo $empleados ?> - Total de Remuneraciones: <?php echo $declarado ?> </h3>
				<table class="table" style="text-align: center">
				  <tr>
				    <th style="text-align: center">Per&iacute;odo</th>
				    <th style="text-align: center">CUIL</th>
				    <th style="text-align: center">Remuneraci&oacute;n</th>
				  </tr>
				  <?php
					$tablaCuij = "cuij".$_SESSION['delcod'];	
					$sql2 = "select * from $tablaCuij where delcod = $delcod and nrcuit = '$nrcuit' and anotra = '$ano' and mestra = '$mes'";;
					$result2 = mysql_query($sql2,$db); 
					while ($row2=mysql_fetch_array($result2)) {
							
							$c=$row2['nrcuil'];
							
							$sql5 = "select * from titular where nrcuil = $c";
							$result5 = mysql_query($sql5,$db); 
							$row5=mysql_fetch_array($result5);
							
							$sql6 = "select * from bajatit where nrcuil = $c";
							$result6 = mysql_query($sql6,$db); 
							$row6=mysql_fetch_array($result6);
							
							if ((mysql_num_rows($result5) == 0) &&  (mysql_num_rows($result6) == 0)){ ?>
								<tr>
									<td><?php echo $row2['mestra']."/".$row2['anotra'] ?></td>
									<td><?php echo $row2['nrcuil'] ?></td>
									<td><?php echo $row2['remimp'] ?></td>
								</tr>
					<?php 	}
							if (mysql_num_rows($result5) != 0) { ?>
								<tr>
								<td><?php echo $row2['mestra']."/".$row2['anotra'] ?></td>
								<td><a href="javascript:mypopup('empresas.nomina.ficha.php?cuil=<?php echo $row2['nrcuil'] ?>&nrafil=<?php echo $row5['nrafil'] ?>&=nrcuit<?php echo $nrcuit ?>')"><?php echo $row2['nrcuil'] ?></a></td>
								<td><?php echo$row2['remimp'] ?></td>
								</tr>
					<?php	}
							
							 if(mysql_num_rows($result6) != 0) { ?>
							 	<tr>
							 	<td><?php echo $row2['mestra']."/".$row2['anotra'] ?></td>
								<td><a href="javascript:mypopup('empresas.nomina.ficha.php?cuil=<?php echo $row2['nrcuil'] ?>&nrafil=<?php echo $row6['nrafil'] ?>&nrcuit=<?php echo $nrcuit ?>')"><?php echo $row2['nrcuil'] ?></a></td>
								<td><?php echo $row2['remimp'] ?></td>
								</tr>
					<?php	}	
					} ?>
				 </table>
				<p>* Los cuiles sin hiperv&iacute;nculos se corresponden con beneficiarios no afiliados</p>
				<a class="nover" href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px; margin-bottom: 20px"  class="glyphicon glyphicon-print"></i></a>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
		</div>
	</div>
</body>