<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cuenta</title>
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
.Estilo5 {font-size: 12px}
.Estilo7 {font-size: 12px; font-weight: bold; }
-->
</style>
</head>

<?php
$empcod = $_GET['empcod'];
$delcod = $_SESSION['delcod'];
$sql = "select * from empresa where delcod = $delcod and empcod = '$empcod'";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);

function estado($del,$emp,$ano, $me, $db) {	
	$sql1 = "select * from pagos where delcod = $del and empcod = $emp and anotra = $ano and mestra = $me";
	$result1 = mysql_query($sql1,$db); 
	$row1 = mysql_fetch_array($result1);
	if($row1!=null) {
		$des = "PAGO";
		} else { $sql6 = "select * from juicios where delcod = $del and empcod = $emp and anojui = $ano and mesjui = $me" ;
				 $result6 = mysql_query($sql6,$db); 
				 $row6 = mysql_fetch_array($result6);
				 if ($row6 != null) {
				 	$des = "JUICI.";
				 } else {
							$sql2 = "select d.* from detacuer d, empresa e where e.delcod = $del and e.empcod = $emp and d.nrcuit = e.nrcuit and d.anoacu = $ano and d.mesacu = $me" ;
							$result2 = mysql_query($sql2,$db); 
							$row2 = mysql_fetch_array($result2);
							if($row2!=null) {
								$des = "ACUER.";
							} else {
										$sql9 = "select * from cabjur where delcod = $del and empcod = $emp and anotra = $ano and mestra = $me" ;
										$result9 = mysql_query($sql9,$db); 
										$row9 = mysql_fetch_array($result9);
										if($row9!=null) {
											$des = "NO PAGO";
										} else {
											$des = "S.DJ.";
										}
								}
						}
			}
	return $des;
}
?>

<body onUnload="logout.php">

<table width="1023" border="0">
  <tr>
    <td width="57" scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
    <td width="436"> <div align="left">
      <p class="Estilo3">ESTADO DE CUENTA</p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus">
      <?php print ($row['nombre']); ?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo4">O.S.P.I.M. </div></td>
  </tr>
</table>

<table width="1024" border="1" bordercolor="#000000">
  <tr>
    <td width="52" rowspan="2"><div align="center"><strong>A&Ntilde;OS</strong></div></td>
    <td colspan="12"><div align="center"><strong>MESES</strong></div></td>
  </tr>
  <tr>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Enero</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Febrero</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Marzo</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Abril</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Mayo</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Junio</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Julio</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Agosto</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Setiembre</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Octubre</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Noviembre</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Diciembre</font></strong></div></td>
  </tr>

<p>
</p>
<?php $año = date("Y")-9;
$añofin = date("Y");
while($año<=$añofin) {
?>
  <tr>
    <td width="52"> <div align="left"><strong><?php echo $año; ?></strong></div></td>
<?php 
	for ($i=1;$i<13;$i++){
		$descri = estado($delcod,$empcod,$año,$i,$db);
		if ($descri == "PAGO") {
			print ("<td width=81><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('pagos.php?empcod=".$empcod."&ano=".$año."&mes=".$i."'))>".$descri."</font></div></td>");
		}
		if ($descri == "ACUER.") {
			print ("<td width=81><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('acuerdos.php?empcod=".$empcod."&ano=".$año."&mes=".$i."'))>".$descri."</font></div></td>");
		}
		if ($descri == "NO PAGO") {
			print ("<td width=81><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('ddjj.php?empcod=".$empcod."&ano=".$año."&mes=".$i."'))>".$descri."</font></div></td>");
		}
		if ($descri == "JUICI.") {
			print ("<td width=81><div align=center><font face=Verdana size=1>".$descri."</font></div></td>");
		}
		if ($descri == "S.DJ.") {
			print ("<td width=81><div align=center><font face=Verdana size=1>".$descri."</font></div></td>");
		}
	}
$año++;
print("</tr>");
}
?>
</table>
<table width="1027" border="0">
  <tr>
    <th colspan="2" scope="row">
      <div align="center">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
  <tr>
    <th width="502" scope="row"><div align="left"><span class="Estilo5">*ACUER. = PERIODO EN ACUERDO </span></div></th>
    <td width="515"><div align="left"><span class="Estilo7">*PAGO = PERIODO PAGO CON DDJJ </span></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left"><span class="Estilo5">*S. DJ.= PERIODO SIN DDJJ </span></div></th>
    <td><span class="Estilo7">*NO PAGO = PERIODO NO PAGO CON DDJJ </span></td>
  </tr>
  <tr>
    <th scope="row">
      <div align="left"><span class="Estilo5">*JUICI.= PERIODO EN JUICIO </span></div></th>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
