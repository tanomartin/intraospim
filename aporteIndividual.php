<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aporte Individual</title>
<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
body {
	background-color: #CCCCCC;
}
.Estilo4 {
	color: #666666;
	font-weight: bold;
}
.Estilo5 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<?php
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
<body>
<div align="center">
  <table style="width: 1025;">
    <tr>
      <td scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
      <td colspan="2" scope="row"><div align="left">
          <p class="Estilo3">APORTE INDIVIDUAL </p>
      </div></td>
      <td width="635"><div align="right" class="Estilo3"></div></td>
    </tr>
  </table>
  <table width="573" border="0" style="margin-bottom: 10px">
    <tr>
      <th width="508" scope="row"><div align="left"><span class="Estilo4">O.S.P.I.M.</span></div></th>
      <th width="508" scope="row"><div align="right">
          <input type="button" align="middle" name="imprimir" value="Imprimir" onclick="window.print();" />
      </div></th>
    </tr>
  </table>
  <table width="573" style="height: 79;" border="1">
    <tr>
      <td width="214" height="23"><strong>Nro. Afiliado: </strong></td>
      <td><?php print ($row2['nrafil']." - ".$estado); ?></td>
    </tr>
    <tr>
      <td><strong>Nombre y Apellido:</strong></td>
      <td><?php print $row2['nombre']; ?>	</td>
    </tr>
    <tr>
      <td><div><strong>Cuil:</strong></div></td>
      <td><?php print "$cuil"; ?></td>
    </tr>
  </table>	
<table border="1" width="771" style="border-color:#D08C35; font-family: Verdana, Geneva, sans-serif; font-size: 11px; text-align: center; " cellpadding="2" cellspacing="0">
	<tr>
	    <th>Per&iacute;odo </th>
	    <th>CUIT</th>
		<th>Remuneraci&oacute;n</th>
		<th>Aporte</th>
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
					<td><a href="javascript:void(window.open('infoEmpresas.php?cuit=<?php echo $cuit ?>'))"><?php echo $cuit ?></a></td>
					<td><b><?php $remu ?></b></td>
					<td><b><?php $impo ?></b></td>
				</tr>
<?php		}
		}
	}
}

?>
</table>
<p align="center" class="Estilo5">	* ANSES - S.D.: Cobrando para el per&iacute;odo subsidio para desempleados. </p>
</div>
</body>
</html>
