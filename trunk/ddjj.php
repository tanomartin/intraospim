<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle DDJJ</title>
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
.Estilo8 {color: #990000; font-weight: bold; }
.Estilo10 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
  <?
include ("conexion.php");
$sql = "select * from empresa where delcod = $delcod and empcod = '$empcod'";
$result = mysql_db_query("uv0471_intranet",$sql,$db); 
$row = mysql_fetch_array($result);

?>
</div>
<p align="center"><span class="Estilo3"><font size="3" face="Papyrus"><img src="logoSolo.JPG" width="72" height="62" />
</font></span></p>
<p align="center"><span class="Estilo10"><font size="3" face="Papyrus">
  <strong>
  <?
 					print ($row['nombre']);
	?>
  </strong></font>
    <strong>
    <?

$sql3 = "select * from cabjur where delcod = $delcod and empcod = '$empcod' and anotra = '$ano' and mestra = '$mes'";
$result3 = mysql_db_query("uv0471_intranet",$sql3,$db); 
$row3=mysql_fetch_array($result3);
$empleados=$row3['canper'];
$declarado=$row3['totrem'];

?>
    </strong></span><strong>    </strong></p>
<p align="center"><span class="Estilo3">Detalle de D.D.J.J. no paga</span></p>
<p align="center"><span class="Estilo8">Total de Empleados: <? echo $empleados ?> - Total de Remuneraciones: <? echo $declarado ?> </span></p>
<table width="496" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#CD8C34" bordercolorlight="#D08C35" bordercolordark="#D08C35">
  <tr>
    <td width="140"><div align="center"><strong><font size="1" face="Verdana">Per&iacute;odo</font></strong></div></td>
    <td width="182"><div align="center"><strong><font size="1" face="Verdana"><font size="1">CUIL</font> </font></strong></div></td>
    <td width="154"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Remuneraci&oacute;n</font> </font></strong></div></td>
  </tr>
  <p>
    <?
$tablaCuij = "cuij".$_SESSION['delcod'];
$sql2 = "select * from $tablaCuij where delcod = $delcod and empcod = '$empcod' and anotra = '$ano' and mestra = '$mes'";;
$result2 = mysql_db_query("uv0471_intranet",$sql2,$db); 
while ($row2=mysql_fetch_array($result2)) {
		
		$c=$row2['nrcuil'];
		
		$sql5 = "select * from titular where nrcuil = $c";
		$result5 = mysql_db_query("uv0471_intranet",$sql5,$db); 
		$row5=mysql_fetch_array($result5);
		
		$sql6 = "select * from bajatit where nrcuil = $c";
		$result6 = mysql_db_query("uv0471_intranet",$sql6,$db); 
		$row6=mysql_fetch_array($result6);
		
		if ((mysql_num_rows($result5) == 0) &&  (mysql_num_rows($result6) == 0)){
			print ("<td width=140><div align=center><font face=Verdana size=1>".$row2['mestra']."/".$row2['anotra']."</font></div></td>");
			print ("<td width=182><div align=center><font face=Verdana size=1>".$row2['nrcuil']."</font></div></td>");
			print ("<td width=154><div align=center><font face=Verdana size=1>".$row2['remimp']."</font></div></td>");
			print ("</tr>");
		}

		if (mysql_num_rows($result5) != 0) {
			print ("<td width=140><div align=center><font face=Verdana size=1>".$row2['mestra']."/".$row2['anotra']."</font></div></td>");
			print ("<td width=182><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('infoTitulares.php?cuil="            .$row2['nrcuil']."&nrafil=".$row5['nrafil']."&empcod=".$empcod."'))>".$row2['nrcuil']."</font></div></td>");
			print ("<td width=154><div align=center><font face=Verdana size=1>".$row2['remimp']."</font></div></td>");
			print ("</tr>");
		}
		
		 if(mysql_num_rows($result6) != 0) {
		 	print ("<td width=140><div align=center><font face=Verdana size=1>".$row2['mestra']."/".$row2['anotra']."</font></div></td>");
			print ("<td width=182><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('infoTitulares.php?cuil="            .$row2['nrcuil']."&nrafil=".$row6['nrafil']."&empcod=".$empcod."'))>".$row2['nrcuil']."</font></div></td>");
			print ("<td width=154><div align=center><font face=Verdana size=1>".$row2['remimp']."</font></div></td>");
			print ("</tr>");
		 }
		
		
}
?>
  </p>
</table>
<p align="center"><span class="Estilo10">* Los cuiles sin hiperv&iacute;nculos se corresponden con beneficiarios no afiliados </span></p>
<div align="center">
  <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
</div>
<p>&nbsp;</p>
</body>
</html>
