<? session_save_path("../sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OSPIM :: Buscador de beneficiarios</title>
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

<?
include ("conexion.php");
$delcod = $_SESSION['delcod'];
$where = $_POST['orden'];
$like = $_POST['condicion'];
$sql = "SELECT nombre, nrodoc, nrcuil, nrafil, empcod  FROM `titular` WHERE delcod = '$delcod' and `$orden` LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by '$where'";
$result = mysql_db_query("uv0471_intranet",$sql,$db); 

//printf("where: %s like: %s", $where, $like);
?>
</html>
<br />
<html xmlns="http://www.w3.org/1999/xhtml">


<body onUnload="../logout.php">
<form action="results.php" method="post" name="form2" id="form2">
<table width="1025" border="0">
  <tr>
    <td scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">RESULTADO DE BENEFICIARIOS </p>
    </div></td>
    <td width="519"><div align="right" class="Estilo3"><font size="2" face="Papyrus">     
    </font></div></td>
  </tr>
  <tr>
    <td colspan="4" scope="row"><div align="right" class="Estilo4">O.S.P.I.M.</div></td>
  </tr>
</table>
</form>

<p><a href="buscador.php">Nueva b&uacute;squeda</a> </p>
<p><a href="../menu.php">Volver a men&uacute; principal </a></p>
<table width="1025" border="1" id="titu" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="4"><strong>TITULARES</strong></td>
  </tr>
  <tr>
    <td width="237">Apellido y nombre </td>
    <td width="227">Nro. Documento</td>
    <td width="200">C.U.I.L.</td>
    <td width="200">Nro. Afiliado</td>
  </tr>
<?php

// TABLA DE TITULARES
while ($row = mysql_fetch_array($result)){

	print("<td width=237> <a href=javascript:void(window.open('../infoTitulares.php?cuil=" . $row['nrcuil'] . "&nrafil=" . $row['nrafil'] . "&empcod=" . $row['empcod'] . "'))>".$row['nombre']."</td>");
	print("<td width=227>".$row['nrodoc']."</td>");
	print("<td width=200>".$row['nrcuil']."</td>");
	print("<td width=200>".$row['nrafil']."</td>");	
	print("</tr>");
}

?>
</table> 
<!--#fin de la tabla de titulares -->
<?
if(mysql_num_rows($result) == 0)
	echo "consulta sin resultados";
?>

<p>&nbsp;</p>
<table width="1025" border="1" id="fami">
  <tr>
    <td colspan="3"><strong>FAMILIARES</strong></td>
  </tr>
  <tr>
    <td width="237">Apellido y nombre </td>
    <td width="227">Nro. Documento</td>
    <td width="227">Nro. Afiliado del familiar titular</td>		
  </tr>


<?php
include ("conexion.php");
$sql2 =   " SELECT familia.nombre, familia.nrodoc, titular.empcod, titular.nrcuil, titular.nrafil, titular.delcod"
        . " FROM `familia`, `titular` "
        . " WHERE "
        . " familia.nrafil = titular.nrafil && titular.delcod = '$delcod' &&"
        . " familia.`$orden` LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci "
		. " order by familia.nombre"; 				
		
$result2 = mysql_db_query("uv0471_intranet",$sql2,$db);

// TABLA DE FAMILIARES
while ($row2 = mysql_fetch_array($result2)){	

	print("<td width=237> <a href=javascript:void(window.open('../infoTitulares.php?cuil=" . $row2['nrcuil'] . "&nrafil=" . $row2['nrafil'] . "&empcod=" . $row2['empcod'] . "'))>".$row2['nombre']."</td>");
	print("<td width=227>".$row2['nrodoc']."</td>");
	print("<td width=227>".$row2['nrafil']."</td>");
	print("</tr>");
}

?>
</table> 
<!--#fin de la tabla de familiares -->

<?
if(mysql_num_rows($result2) == 0)
	echo "consulta sin resultados";
?>

<p>&nbsp;</p>


<p>&nbsp;</p>
<table width="1025" border="1" id="fami">
  <tr>
    <td colspan="4"><strong>TITULARES INACTIVOS </strong></td>
  </tr>
  <tr>
    <td width="237">Apellido y nombre </td>
    <td width="227">Nro. Documento</td>
    <td width="200">C.U.I.L.</td>
    <td width="200">Nro. Afiliado</td>	
  </tr>


<?php
include ("conexion.php");
$sql3 =   " SELECT nombre, nrafil, nrodoc, nrcuil, empcod"
        . " FROM `bajatit` "
        . " WHERE "
        . " delcod = '$delcod' &&"
        . " `$orden` LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci "
		. " order by nombre"; 				
		
$result3 = mysql_db_query("uv0471_intranet",$sql3,$db);

// TABLA DE TITULARES DE BAJA
while ($row3 = mysql_fetch_array($result3)){	

print("<td width=237> <a href=javascript:void(window.open('../infoTitulares.php?cuil=" . $row3['nrcuil'] . "&nrafil=" . $row3['nrafil'] . "&empcod=" . $row3['empcod'] . "'))>".$row3['nombre']."</td>");
	print("<td width=227>" . $row3['nrodoc'] . "</td>");
	print("<td width=200>" . $row3['nrcuil'] . "</td>");
	print("<td width=200>" . $row3['nrafil'] . "</td>");	
	print("</tr>");
}

?>
</table> 
<!--#fin de la tabla de familiares -->

<?
if(mysql_num_rows($result3) == 0)
	echo "consulta sin resultados";
?>


<p>&nbsp;</p>
<table width="1025" border="1" id="fami">
  <tr>
    <td colspan="3"><strong>FAMILIARES INACTIVOS DEL TITULAR </strong></td>
  </tr>
  <tr>
    <td width="237">Apellido y nombre </td>
    <td width="227">Nro. Documento</td>
    <td width="227">Nro. Afiliado del familiar titular</td>	
  </tr>


<?php
include ("conexion.php");
$sql4 =   " SELECT bajafam.nombre, bajafam.nrodoc, bajatit.delcod, bajatit.nrafil, bajatit.empcod, bajatit.nrcuil"
        . " FROM `bajafam`, `bajatit`"
        . " WHERE "
        . " (bajafam.nrafil = bajatit.nrafil && bajatit.delcod = '$delcod' &&"
        . " bajafam.`$orden` LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci)"
		. " order by bajafam.nombre"; 			
		
$result4 = mysql_db_query("uv0471_intranet",$sql4,$db);

if(mysql_num_rows($result4) == 0) {
	$sql4 =   " SELECT bajafam.nombre, bajafam.nrodoc, titular.delcod, titular.nrafil, titular.empcod, titular.nrcuil"
        . " FROM `bajafam`, `titular`"
        . " WHERE "
        . " (bajafam.nrafil = titular.nrafil && titular.delcod = '$delcod' &&"
        . " bajafam.`$orden` LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci)"
		. " order by bajafam.nombre"; 			
		
	$result4 = mysql_db_query("uv0471_intranet",$sql4,$db);

	if(mysql_num_rows($result4) == 0) {
		echo "consulta sin resultados";
	}
}

// TABLA DE FAMILIARES DE TITULARES DE BAJA
while ($row4 = mysql_fetch_array($result4)){	

print("<td width=237> <a href=javascript:void(window.open('../infoTitulares.php?cuil=" . $row4['nrcuil'] . "&nrafil=" . $row4['nrafil'] . "&empcod=" . $row4['empcod'] . "'))>".$row4['nombre']."</td>");
	print("<td width=227>" . $row4['nrodoc'] . "</td>");
	print("<td width=227>" . $row4['nrafil'] . "</td>");	
	print("</tr>");
}

?>
</table> 
<!--#fin de la tabla de familiares -->



</body>
</html>
