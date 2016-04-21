<?php include ("verificaSesion.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle de pago</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
body {
	background-color: #CCCCCC;
}
.Estilo5 {	color: #666666;
	font-weight: bold;
}
.Estilo8 {color: #990000; font-weight: bold; }
.Estilo9 {color: #990000}
.Estilo10 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
<?php  
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
</div>
<p align="center" class="Estilo10"><strong><font size="3" face="Papyrus">
<?php print ($row['nombre']);?>
</font></strong></p>
<p align="center"><span class="Estilo3">Detalle de Pago </span></p>
<p align="center" class="Estilo5 Estilo9">Total de Remuneraciones: <?php echo $rem ?> </p>
<table width="700" border="1" align="center" cellpadding="2" cellspacing="0" style="border-color: #CD8C34; text-align: center; font-family:  Verdana, Geneva, sans-serif; font-size: 11px">
  <tr>
    <th>Per&iacute;odo</th>
    <th>Fecha de Deposito </th>
    <th>Total Depositado </th>
    <th>Descripci&oacute;n </th>
  </tr>
  
<?php
$sql1 = "select * from pagos where delcod = $delcod and nrcuit = '$nrcuit' and anotra = '$ano' and mestra = '$mes'";
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
$declarado=$row3['totrem'];
?>
<p align="center"><span class="Estilo3">Detalle de D.D.J.J. </span></p>
<p align="center"><span class="Estilo8">Total de Empleados: <?php echo $empleados ?> - Total de Remuneraciones: <?php echo $declarado ?> </span></p>
<table width="496" border="1" align="center" cellpadding="2" cellspacing="0"  style="border-color: #CD8C34; text-align: center; font-family:  Verdana, Geneva, sans-serif; font-size: 11px">
  <tr>
    <td width="140"><div align="center"><strong><font size="1" face="Verdana">Per&iacute;odo</font></strong></div></td>
    <td width="182"><div align="center"><strong><font size="1" face="Verdana"><font size="1">CUIL</font> </font></strong></div></td>
    <td width="154"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Remuneraci&oacute;n</font> </font></strong></div></td>
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
			<td><a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row2['nrcuil'] ?>&nrafil=<?php echo $row5['nrafil'] ?>&=nrcuit<?php echo $nrcuit ?>'"><?php echo $row2['nrcuil'] ?></a></td>
			<td><?php echo$row2['remimp'] ?></td>
			</tr>
<?php	}
		
		 if(mysql_num_rows($result6) != 0) { ?>
		 	<tr>
		 	<td><?php echo $row2['mestra']."/".$row2['anotra'] ?></td>
			<td><a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row2['nrcuil'] ?>&nrafil=<?php echo $row6['nrafil'] ?>&nrcuit=<?php echo $nrcuit ?>'"><?php echo $row2['nrcuil'] ?></a></td>
			<td><?php echo $row2['remimp'] ?></td>
			</tr>
<?php	}	
}
?>

</table>
<p align="center"><span class="Estilo10">* Los cuiles sin hiperv&iacute;nculos se corresponden con beneficiarios no afiliados </span></p>
<div align="center">
  <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
</div>
</body>
</html>
