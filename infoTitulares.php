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
$nrcuit = $_GET['nrcuit'];
$nrafil = $_GET['nrafil'];

$sql = "SELECT t.*, d.nombre as nomdel, e.nombre as empresa, p.nombre as provin, tip.descri as tipdoc, civ.descrip as estcivil
		FROM titular t, delega d, empresa e, provin p, tipodocu tip, estadocivil civ
		WHERE t.nrcuil = '$cuil' and t.delcod = d.delcod and t.nrcuit = e.nrcuit and t.delcod = e.delcod and t.provin = p.codigo and t.tipdoc = tip.codigo and t.estciv = civ.codestciv";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
$est = "ACTIVO";

if (mysql_num_rows($result) == 0) {
	$sql = "SELECT t.*, d.nombre as nomdel, e.nombre as empresa, p.nombre as provin, tip.descri as tipdoc, civ.descrip as estcivil
		FROM bajatit t, delega d, empresa e, provin p, tipodocu tip, estadocivil civ
		WHERE t.nrcuil = '$cuil' and t.delcod = d.delcod and t.nrcuit = e.nrcuit and t.delcod = e.delcod and t.provin = p.codigo and t.tipdoc = tip.codigo and  t.estciv = civ.codestciv";
	$result = mysql_query($sql,$db); 
	$row = mysql_fetch_array($result);
	$est = "DE BAJA - Desde: ".$row['fecbaj'];
}

$sqlDisca = "SELECT * FROM discapacitados WHERE nrafil = $nrafil and nroord = 0";
$resDisca = mysql_query($sqlDisca,$db);
$canDisca = mysql_num_rows($resDisca);
if ($canDisca == 0) {
	$disca = 'NO';
} else {
	$disca = 'SI';
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
  <table width="548" border="1" style="margin-bottom: 10px">
    <tr>
      <th scope="row"><div align="left">Documento</div></th>
        <td width="365"><?php print ($row['tipdoc'].": ".$row['nrodoc']);?></td>
    </tr>
	<tr>
      <th scope="row"><div align="left">Estado Civil</div></th>
        <td width="365"><?php print ($row['estcivil']);?></td>
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
    <tr>
     <th scope="row"><div align="left">Discapacitado</div></th>
        <td><?php print ($disca); ?></td>
    </tr>
  </table>
  <p class="Estilo6">*Si el empleado pertenece a su Delegacion. Haciendo click sobre su CUIL se motrar&aacute;n sus aportes individuales </p>
  <p class="Estilo5">Familiares</p>

<?php
if ($est == "ACTIVO") {
	$sql1 = "select f.*, t.descri as tipdoc, p.descrip as despare from familia f, tipodocu t, parentesco p where f.nrafil = '$nrafil' and f.tipdoc = t.codigo and f.codpar = p.codparent";
	$result1 = mysql_query($sql1,$db); 
} else {
	$sql1 = "select f.*, t.descri as tipdoc, p.descrip as despare from bajafam f, tipodocu t, parentesco p where f.nrafil = '$nrafil' and f.tipdoc = t.codigo and f.codpar = p.codparent";
	$result1 = mysql_query($sql1,$db); 
}
$cantFami = mysql_num_rows($result1);
if ($cantFami > 0) { ?>
		<table border="1" width="1030" style="border-color: #D08C35; font-family: Verdana, Geneva, sans-serif; font-size: 11px; text-align: center;" cellpadding="2" cellspacing="0">
		<tr>
			<th>Nombre y Apellido </th>
			<th>Documento </th>
			<th>Parentesco </th>
			<th>Sexo </th>
			<th>Fecha de Nacimiento </th>
			<th>C.U.I.L. </th>
			<th>Discapacitado</th>
		</tr>
<?php while ($row1=mysql_fetch_array($result1)) { 
			$nroorden = $row1['nroord'];
			$sqlDisca = "SELECT * FROM discapacitados WHERE nrafil = $nrafil and nroord = $nroorden";
			$resDisca = mysql_query($sqlDisca,$db);
			$canDisca = mysql_num_rows($resDisca);
			if ($canDisca == 0) {
				$disca = 'NO';
			} else {
				$disca = 'SI';
			}
?>
		<tr>
		    <td><?php echo $row1['nombre'] ?></td>
			<td><?php echo $row1['tipdoc'].": ".$row1['nrodoc'] ?> </td>
			<td><?php echo $row1['despare'] ?></td>
			<td><?php echo $row1['ssexxo'] ?></td>
			<td><?php echo $row1['fecnac'] ?></td>
			<td><?php echo $row1['nrcuil'] ?></td>
			<td><?php echo $disca ?></td>
		</tr>
<?php	}
} else { ?>
		<tr><td colspan="7"><b> No hay familiares informados</b></td></tr>
<?php }
?>

</table>
<p><input type="button" name="imprimir" value="Imprimir" onclick="window.print();" /></p>
</div>
</body>
</html>
