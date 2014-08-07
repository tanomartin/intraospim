<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle de Acuerdo</title>
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
.Estilo10 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<div align="center">
<span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></p>
<?php
$empcod = $_GET['empcod'];
$delcod = $_SESSION['delcod'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];


$sql = "select * from empresa where delcod = $delcod and empcod = '$empcod'";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);

$sql2 = "select d.* from detacuer d, empresa e where e.delcod = $delcod and e.empcod = '$empcod' and e.nrcuit = d.nrcuit and d.anoacu = '$ano' and d.mesacu = '$mes'" ;
$result2 = mysql_query($sql2,$db); 
$row2 = mysql_fetch_array($result2);
$nroacu = $row2['nroacu'];
				
$sql3 = "select c.* from cabacuer c, empresa e where e.delcod = $delcod and e.empcod = '$empcod' and e.nrcuit = c.nrcuit and c.nroacu = $nroacu" ;
$result3 = mysql_query($sql3,$db); 
$row3 = mysql_fetch_array($result3);
$tipoAcu="Acuerdo";
if ($row3['tipacu'] == 2) {
	$tipoAcu="Plan de Facilidades";
} 
if ($row3['tipacu'] == 3) {
	$tipoAcu="Moratoria AFIP";
}

print ("<p><b><font size='3' face='Papyrus'>".$row['nombre']."</font></b></p>");

?>
</div>
<div align="center">
  <p class="Estilo3">Acuerdo</p>
</div>
<div align="center">
  <table width="548" border="1">
    <tr>
      <th width="167" scope="row"><div align="left">Per&iacute;odo</div></th>
      <td width="365"><?php print ($mes."-".$ano);?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">N&uacute;mero</div></th>
      <td><?php print ($row3['nroacu']);?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Tipo </div></th>
      <td><?php print ($tipoAcu); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Fecha</div></th>
      <td><?php print ($row3['fecacu']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Monto</div></th>
      <td><?php print ($row3['totacu']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Estado</div></th>
      <td><?php if ($row3['estacu'] == 1) {
 			print ("Vigente");
		} else {
			print ("Cancelado");
		}
		?></td>
    </tr>
  </table>
</div>
<p align="center" class="Estilo3">	Cuotas del Acuerdo</p>
<div align="center">
  <table border="1" width="794" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
    <tr>
      <td width="123"><div align="center"><strong><font size="1" face="Verdana">N&uacute;mero </font></strong></div></td>
      <td width="160"><div align="center"><strong><font size="1" face="Verdana">Monto de Cuota </font></strong></div></td>
      <td width="163"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Fecha de Vencimiento </font> </font></strong></div></td>
      <td width="167"><div align="center"><strong><font size="1" face="Verdana">Monto Pagado </font></strong></div></td>
      <td width="149"><div align="center"><strong><font size="1" face="Verdana">Fecha de Pago </font></strong></div></td>
    </tr>
    <p>
      <?php 
	$sql4 = "select c.* from cuoacuer c, empresa e where e.delcod = $delcod and e.empcod = '$empcod' and e.nrcuit = c.nrcuit and nroacu = $nroacu";
	$result4 = mysql_query($sql4,$db); 
	while ($row4=mysql_fetch_array($result4)) {
		print ("<td width=80><div align=center><font face=Verdana size=1>".$row4['nrocuo']."</font></div></td>");
		print ("<td width=136><div align=center><font face=Verdana size=1>".$row4['moncuo']."</font></div></td>");
		print ("<td width=136><div align=center><font face=Verdana size=1>".$row4['fecvto']."</font></div></td>");
		print ("<td width=121><div align=center><font face=Verdana size=1>".$row4['monpag']."</font></div></td>");
		print ("<td width=124><div align=center><font face=Verdana size=1>".$row4['fecpag']."</font></div></td>");
		print ("</tr>");
}
?>
    </p>
  </table>
  <p align="center" class="Estilo3">
  <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
</p>
</div>
</body>
</html>
