<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Empresas</title>
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
-->
</style>
</head>

<?php

$delegaciones = array(1002, 1101, 1102 ,1103, 1106, 1107, 1108, 1109, 
					  1110, 1201, 1202, 1203, 1301, 1302, 1401, 1402,
					  1501, 1601, 1701, 1702, 1703, 1802, 1901, 2001,
					  2101, 2102, 2103, 2201, 2301, 2401, 2402, 2403,
					  2501, 2602, 2603, 2604, 2701, 2801, 2902, 3001, 
					  3101);
?>


<body>
<table width="1142" border="0" style="margin-bottom: 10px">
  <tr>
    <td height="28" scope="row"><div align="left"><span class="Estilo3">Control Actualizaci&oacute;n </span></div></td>
    <td scope="row"><div align="right"><span class="Estilo4"> O.S.P.I.M.</span></div></td>
  </tr>
  <tr>
    <td width="566" height="28" scope="row"><div align="left">
      <input name="back" type="button" id="back" value="VOLVER" onclick="location.href='menuControl.php'"/>
    </div></td>
    <td width="566" scope="row"><div align="right"><span class="Estilo4">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </span></div></td>
  </tr>
</table>

<table border="1" width="1145" style="border-color: #D08C35; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
  <tr>
    <th>C&oacute;digo</th>
    <th>Empresa</th>
    <th>Titular</th>
	<th>Familia</th>
    <th>Bajatit</th>
	<th>Bajafam </th>
	<th>Cabacuer</th>
	<th>Detacuer</th>
    <th>Cuoacuer</th>
    <th>Cabjur</th>
	<th>Cuijur</th>
    <th>Pagos</th>
	<th>Apoind</th>
	<th>Juicios</th>
  </tr>

<?php
for($i=0; $i<sizeof($delegaciones); $i++) {
	$sql = "select count(*) from empresa where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db); 
	$countEmp = mysql_fetch_array($result); 
	
	$sql = "select count(*) from titular where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countTit = mysql_fetch_array($result);
	
	$sql = "select count(*) from familia where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countFam = mysql_fetch_array($result);
	
	$sql = "select count(*) from bajatit where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countBTit = mysql_fetch_array($result);
	
	$sql = "select count(*) from bajafam where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countBFam = mysql_fetch_array($result);
	
	$sql = "select count(*) from cabacuer where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countCab = mysql_fetch_array($result);
	
	$sql = "select count(*) from detacuer where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countDet = mysql_fetch_array($result);
	
	$sql = "select count(*) from cuoacuer where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countCuo = mysql_fetch_array($result);
	
	$sql = "select count(*) from cabjur where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countCabj = mysql_fetch_array($result);
	
	$tabla="cuij".$delegaciones[$i];
	$sql = "select count(*) from $tabla where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countCuij = mysql_fetch_array($result);
	
	$sql = "select count(*) from pagos where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countPag = mysql_fetch_array($result);
	
	$tabla="apoi".$delegaciones[$i];
	$sql = "select count(*) from $tabla where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countApoi = mysql_fetch_array($result);
	
	$sql = "select count(*) from juicios where delcod = $delegaciones[$i]";
	$result = mysql_query($sql,$db);
	$countJui = mysql_fetch_array($result); ?>
	<tr>
		<td><b>".$delegaciones[$i]."</b></td>
		<td><?php echo $countEmp['0'] ?></td>
		<td><?php echo $countTit['0'] ?></td>
		<td><?php echo $countFam['0'] ?></td>
		<td><?php echo $countBTit['0'] ?></td>
		<td><?php echo $countBFam['0'] ?></td>
		<td><?php echo $countCab['0'] ?></td>
		<td><?php echo $countDet['0'] ?></td>
		<td><?php echo $countCuo['0'] ?></td>
		<td><?php echo $countCabj['0'] ?></td>
		<td><?php echo $countCuij['0'] ?></td>
		<td><?php echo $countPag['0'] ?></td>
		<td><?php echo $countApoi['0'] ?></td>
		<td><?php echo $countJui['0'] ?></td>
	</tr>
<?php }
?>
</table>
</body>
</html>
