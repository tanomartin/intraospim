<?php include ("verificaSesion.php"); 

$nrcuit = $_GET['nrcuit'];
$delcod = $_SESSION['delcod'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];


$sql = "select * from empresa where delcod = $delcod and nrcuit = '$nrcuit'";
$result = mysql_query($sql,$db);
$row = mysql_fetch_array($result);

$sql2 = "select d.* from detacuer d, empresa e where e.delcod = $delcod and e.nrcuit = '$nrcuit' and e.nrcuit = d.nrcuit and d.anoacu = '$ano' and d.mesacu = '$mes'" ;
$result2 = mysql_query($sql2,$db);
$row2 = mysql_fetch_array($result2);
$nroacu = $row2['nroacu'];

$sql3 = "select c.* from cabacuer c, empresa e where e.delcod = $delcod and e.nrcuit = '$nrcuit' and e.nrcuit = c.nrcuit and c.nroacu = $nroacu" ;
$result3 = mysql_query($sql3,$db);
$row3 = mysql_fetch_array($result3);
$tipoAcu="Acuerdo";
if ($row3['tipacu'] == 2) {
	$tipoAcu="Plan de Facilidades";
}
if ($row3['tipacu'] == 3) {
	$tipoAcu="Moratoria AFIP";
}
?>

<!DOCTYPE html>
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
<?php print ("<p><b><font size='3' face='Papyrus'>".$row['nombre']."</font></b></p>"); ?>
</div>
<div align="center">
  <p class="Estilo3">Acuerdo</p>
</div>
<div align="center">
  <table style="width: 549px" border="1" style="margin-bottom: 10px">
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
  <table border="1" style="width: 794px; border-color: #D08C35; font-family: Verdana, Geneva, sans-serif; text-align: center; font-size: 11px ">
    <tr>
      <th>N&uacute;mero </th>
      <th>Monto de Cuota </th>
      <th><font size="1">Fecha de Vencimiento </font> </th>
      <th>Monto Pagado </th>
      <th>Fecha de Pago </th>
    </tr>
      <?php 
	$sql4 = "select c.* from cuoacuer c, empresa e where e.delcod = $delcod and e.nrcuit = '$nrcuit' and e.nrcuit = c.nrcuit and nroacu = $nroacu";
	$result4 = mysql_query($sql4,$db); 
	while ($row4=mysql_fetch_array($result4)) { ?>
		<tr>
			<td><?php echo $row4['nrocuo'] ?></td>
			<td><?php echo $row4['moncuo'] ?></td>
			<td><?php echo $row4['fecvto'] ?></td>
			<td><?php echo $row4['monpag'] ?></td>
			<td><?php echo $row4['fecpag'] ?></td>
		</tr>
<?php } ?>
  </table>
  <p align="center" class="Estilo3">
  <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
</p>
</div>
</body>
</html>
