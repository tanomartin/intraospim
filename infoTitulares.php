<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Informacion Titulares</title>
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
.Estilo4 {
	font-size: 10px;
	font-weight: bold;
}
.Estilo5 {font-family: Papyrus; font-weight: bold; color: #000000; font-size: 24px; }
.Estilo6 {font-size: 11px; font-weight: bold; }
-->
</style>
</head>

<?php
$cuil = $_GET['cuil'];
$empcod = $_GET['empcod'];
$nrafil = $_GET['nrafil'];

$sql = "SELECT t.*, d.nombre as nomdel, e.nombre as empresa, p.nombre as provin, tip.descri as tipdoc
		FROM titular t, delega d, empresa e, provin p, tipodocu tip
		WHERE t.nrcuil = '$cuil' and t.delcod = d.delcod and t.empcod = e.empcod and t.delcod = e.delcod and t.provin = p.codigo and t.tipdoc = tip.codigo";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
$est = "ACTIVO";

if (mysql_num_rows($result) == 0) {
	$sql = "SELECT t.*, d.nombre as nomdel, e.nombre as empresa, p.nombre as provin, tip.descri as tipdoc
		FROM bajatit t, delega d, empresa e, provin p, tipodocu tip
		WHERE t.nrcuil = '$cuil' and t.delcod = d.delcod and t.empcod = e.empcod and t.delcod = e.delcod and t.provin = p.codigo and t.tipdoc = tip.codigo";
	$result = mysql_query($sql,$db); 
	$row = mysql_fetch_array($result);
	$est = "DE BAJA - Desde: ".$row['fecbaj'];
}
?>


<body>
<div align="center">
  <table width="546" border="0">
    <tr>
      <th width="44" scope="row"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></th>
        <th scope="row"><div align="right"><font size="3" face="Papyrus">
          <?php print ("Afiliado Nro: ".$row['nrafil']." - ".$row['nombre']); ?>
        </font></div></th>
      </tr>
  </table>
  <table width="548" border="1">
    <tr>
      <th width="167" scope="row"><div align="left">Documento</div></th>
        <td width="365"><?php print ($row['tipdoc'].": ".$row['nrodoc']);?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Domicilio</div></th>
        <td><?php print ($row['domici']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Localidad</div></th>
        <td><?php print ($row['locali']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Provincia</div></th>
        <td><?php print ($row['provin']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">C.P.</div></th>
        <td><?php print ($row['codpos']);?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Fecha Nacimiento </div></th>
        <td><?php print ($row['fecnac']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">CUIL</div></th>
        <td><?php
		if ($_SESSION['delcod'] == $row['delcod']) {
			print("<a href=javascript:void(window.open('aporteIndividual.php?cuil=".$row['nrcuil']."'))>".$row['nrcuil']."</a>");
		} else {
 			print ($row['nrcuil']);
		}
		?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Delegaci&oacute;n</div></th>
      <td><?php print ($row['nomdel']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Empresa</div></th>
      <td><?php print ($row['empresa']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Estado </div></th>
      <td><?php print ($est); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Categoria</div></th>
        <td><?php print ($row['catego']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Feche de ingreso </div></th>
        <td><?php print ($row['fecing']); ?></td>
    </tr>
  </table>
  <p class="Estilo6">*Si el empleado pertenece a su Delegacion. Haciendo click sobre su CUIL se motrar&aacute;n sus aportes individuales </p>
  <p class="Estilo5">Familiares</p>

<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
<tr>
    <td width="329"><div align="center"><strong><font size="1" face="Verdana">Nombre y Apellido </font></strong></div></td>
    <td width="177"><div align="center"><strong><font size="1" face="Verdana">Documento </font></strong></div></td>
	<td width="156"><div align="center"><strong><font size="1" face="Verdana">Parentesco </font></strong></div></td>
	<td width="157"><div align="center"><strong><font size="1" face="Verdana">Sexo </font></strong></div></td>
	<td width="174"><div align="center"><strong><font size="1" face="Verdana">Fecha de Nacimiento </font></strong></div></td>
	<td width="174"><div align="center"><strong><font size="1" face="Verdana">C.U.I.L. </font></strong></div></td>
</tr>
<p>
<?php
if ($est == "ACTIVO") {
	$sql1 = "select f.*, t.descri as tipdoc from familia f, tipodocu t where f.nrafil = '$nrafil' and f.tipdoc = t.codigo";
	$result1 = mysql_query($sql1,$db); 
} else {
	$sql1 = "select f.*, t.descri as tipdoc from bajafam f, tipodocu t where f.nrafil = '$nrafil' and f.tipdoc = t.codigo";
	$result1 = mysql_query($sql1,$db); 
}


while ($row1=mysql_fetch_array($result1)) {
	if ($row1['codpar'] == 4 ) {
		$despare="Madre";
	}
	if ($row1['codpar'] == 5 ) {
		$despare="Padre";
	}
	if ($row1['codpar'] == 6 ) {
		$despare="Conyuge";
	}
	if ($row1['codpar'] == 7 ) {
		$despare="Concubino";
	}
	if ($row1['codpar'] == 8 ||  $row1['codpar'] == 9) {
		$despare="A cargo";
	}
	if ($row1['codpar'] >= 10 ) {
		$despare="Hijo";
	}

	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['nombre']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['tipdoc'].": ".$row1['nrodoc']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$despare."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['ssexxo']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['fecnac']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['nrcuil']."</font></td>");
	print ("</tr>");
}
?>
</p>
</table>
<p><input type="button" name="imprimir" value="Imprimir" onclick="window.print();" /></p>
</div>
</body>
</html>
