<?php include ("verificaSesion.php"); 
$nrcuit = $_GET['nrcuit'];
$delcod = $_SESSION['delcod'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];

$sql = "select * from empresa where nrcuit = $nrcuit";
$result = mysql_query($sql,$db);
$row = mysql_fetch_array($result);

$sql3 = "select * from cabjur where delcod = $delcod and nrcuit = '$nrcuit' and anotra = '$ano' and mestra = '$mes'";
$result3 = mysql_query($sql3,$db);
$row3=mysql_fetch_array($result3);
$empleados=$row3['canper'];
$declarado=$row3['totrem'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Detalle de DDJJ</title>
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
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-list-alt"></i><br>Detalle de DDJJ no Paga</h2>
			<h2><?php print ($row['nombre']);?></h2>
			<div class="col-md-10 col-md-offset-1">
				<h4>Total de Empleados: <?php echo $empleados ?> - Total de Remuneraciones: <?php echo $declarado ?></h4>
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
						  <?php	}
						
								if (mysql_num_rows($result5) != 0) { ?>
									<tr>
										<td><?php echo $row2['mestra']."/".$row2['anotra'] ?></td>
										<td><a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row2['nrcuil'] ?>&nrafil=<?php echo $row5['nrafil'] ?>&=nrcuit<?php echo $nrcuit ?>"><?php echo $row2['nrcuil'] ?></a></td>
										<td><?php echo $row2['remimp'] ?></td>
									</tr>
						 <?php	}
								 if(mysql_num_rows($result6) != 0) { ?>
								 	<tr>
									 	<td><?php echo $row2['mestra']."/".$row2['anotra'] ?></td>
										<td><a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row2['nrcuil'] ?>&nrafil=<?php echo $row6['nrafil'] ?>&=nrcuit<?php echo $nrcuit ?>"><?php echo $row2['nrcuil'] ?></a></td>
										<td><?php echo $row2['remimp'] ?></td>
									</tr>
						 <?php	 }
						} ?>
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