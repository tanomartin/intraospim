<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
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
.Estilo4 {
	color: #FF0000;
	font-weight: bold;
}
body {
	background-color: #CCCCCC;
}
.Estilo5 {font-size: 14px}
-->
</style>
</head>

<?php
$delcod = $_SESSION['delcod'];
$where = $_POST['orden'];
$like = $_POST['condicion'];
?>
</html>
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<table width="1025" border="0">
  <tr>
    <td scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">RESULTADO DE BENEFICIARIOS </p>
    </div></td>
    <td width="519"><div align="right" class="Estilo3"><font size="2" face="Papyrus">     
    </font>
        <div align="right" class="Estilo3 Estilo5">O.S.P.I.M.</div>
    </div></td>
  </tr>
  
  <tr>
    <td colspan="3" scope="row"><input name="volvar2" value="Nueva Busqueda" type="button" onclick="location.href='buscador.php'" /></td>
    <td scope="row"><div align="right">
      <input name="volvar" value="Volver Menu Principal" type="button" onclick="location.href='menu.php'" />
    </div></td>
  </tr>
</table>
<p>
<table width="1025" border="1" id="titu">
  <tr>
    <td colspan="4"><strong>TITULARES</strong></td>
  </tr>
  <tr>
    <td width="237"><strong>Apellido y nombre </strong></td>
    <td width="227"><strong>Nro. Documento</strong></td>
    <td width="200"><strong>C.U.I.L.</strong></td>
    <td width="200"><strong>Nro. Afiliado</strong></td>
  </tr>
<?php
if ($delcod >= "4000") {
	$sql = "SELECT nombre, nrodoc, nrcuil, nrafil, empcod  FROM `titular` WHERE $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by '$where'";
} else {
	$sql = "SELECT nombre, nrodoc, nrcuil, nrafil, empcod  FROM `titular` WHERE delcod = '$delcod' and $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by '$where'";
}
$result = mysql_query($sql,$db); 

// TABLA DE TITULARES
while ($row = mysql_fetch_array($result)){
	if ($delcod >= "4000") {
		print("<td width=237>".$row['nombre']."</td>");
	} else {
		print("<td width=237> <a href=javascript:void(window.open('infoTitulares.php?cuil=" . $row['nrcuil'] . "&nrafil=" . $row['nrafil'] . "&empcod=" . $row['empcod'] . "'))>".$row['nombre']."</td>");
	}
	print("<td width=227>".$row['nrodoc']."</td>");
	print("<td width=200>".$row['nrcuil']."</td>");
	print("<td width=200>".$row['nrafil']."</td>");	
	print("</tr>");
}

if(mysql_num_rows($result) == 0) 
	print("<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
?>
</table> 
</p>
<!--#fin de la tabla de titulares -->
<p>
<table width="1025" border="1" id="fami">
  <tr>
    <td colspan="4"><strong>FAMILIARES</strong></td>
  </tr>
  <tr>
    <td width="237"><strong>Apellido y nombre </strong></td>
    <td width="227"><strong>Nro. Documento</strong></td>
    <td width="200"><strong>C.U.I.L.</strong></td>
    <td width="200"><strong>Nro. Afiliado del titular</strong></td>		
  </tr>


<?php
if ($delcod >= "4000") {
	$sql2 = "SELECT familia.nombre as nombre, familia.nrodoc as nrodoc, familia.nrcuil as cuifam, titular.empcod as empcod, titular.nrcuil as nrcuil, titular.nrafil as nrafil, titular.delcod as delcod FROM familia, titular WHERE familia.nrafil = titular.nrafil and familia.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by familia.nombre";
} else {
	$sql2 = "SELECT familia.nombre as nombre, familia.nrodoc as nrodoc, familia.nrcuil as cuifam, titular.empcod as empcod, titular.nrcuil as nrcuil, titular.nrafil as nrafil, titular.delcod as delcod	FROM familia, titular WHERE familia.nrafil = titular.nrafil and titular.delcod = '$delcod' and familia.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by familia.nombre";
}
$result2 = mysql_query($sql2,$db);

// TABLA DE FAMILIARES
while ($row2 = mysql_fetch_array($result2)){	
	if ($delcod >= "4000") {
		print("<td width=237>".$row2['nombre']."</td>");
	} else {
		print("<td width=237> <a href=javascript:void(window.open('infoTitulares.php?cuil=" . $row2['nrcuil'] . "&nrafil=" . $row2['nrafil'] . "&empcod=" . $row2['empcod'] . "'))>".$row2['nombre']."</td>");
	}
	print("<td width=227>".$row2['nrodoc']."</td>");
	print("<td width=200>".$row2['cuifam']."</td>");
	print("<td width=200>".$row2['nrafil']."</td>");
	print("</tr>");
}
if(mysql_num_rows($result2) == 0) 
	print("<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
?>
</table> 
</p>
<!--#fin de la tabla de familiares -->

<p>
<table width="1025" border="1" id="fami">
  <tr>
    <td colspan="4"><strong>TITULARES INACTIVOS </strong></td>
  </tr>
  <tr>
    <td width="237"><strong>Apellido y nombre </strong></td>
    <td width="227"><strong>Nro. Documento</strong></td>
    <td width="200"><strong>C.U.I.L.</strong></td>
    <td width="200"><strong>Nro. Afiliado</strong></td>	
  </tr>
<?php
if ($delcod >= "4000") {
	$sql3 = "SELECT nombre, nrafil, nrodoc, nrcuil, empcod FROM bajatit WHERE $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by nombre";
} else {
	$sql3 = "SELECT nombre, nrafil, nrodoc, nrcuil, empcod FROM bajatit WHERE delcod = $delcod and $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by nombre";
}
$result3 = mysql_query($sql3,$db);

// TABLA DE TITULARES DE BAJA
while ($row3 = mysql_fetch_array($result3)){	
	if ($delcod >= "4000") {
		print("<td width=237>" . $row3['nombre'] . "</td>");
	} else {
		print("<td width=237> <a href=javascript:void(window.open('infoTitulares.php?cuil=" . $row3['nrcuil'] . "&nrafil=" . $row3['nrafil'] . "&empcod=" . $row3['empcod'] . "'))>".$row3['nombre']."</td>");
	}
	print("<td width=227>" . $row3['nrodoc'] . "</td>");
	print("<td width=200>" . $row3['nrcuil'] . "</td>");
	print("<td width=200>" . $row3['nrafil'] . "</td>");	
	print("</tr>");
}
if(mysql_num_rows($result3) == 0)
	print("<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
?>
</table> 
</p>
<!--#fin de la tabla de familiares -->

<p>
<table width="1025" border="1" id="fami">
  <tr>
    <td colspan="4"><strong>FAMILIARES INACTIVOS DEL TITULAR </strong></td>
  </tr>
  <tr>
    <td width="237"><strong>Apellido y nombre </strong></td>
    <td width="227"><strong>Nro. Documento</strong></td>
    <td width="200"><strong>C.U.I.L.</strong></td>
    <td width="200"><strong>Nro. Afiliado del titular</strong></td>
  </tr>


<?php
if ($delcod >= "4000") {
	$sql4 = "SELECT bajafam.nombre as nombre, bajafam.nrodoc as nrodoc, bajafam.nrcuil as cuifam, bajatit.delcod as delcod, bajatit.nrafil as nrafil, bajatit.empcod as empcod, bajatit.nrcuil as nrcuil FROM bajafam, bajatit WHERE (bajafam.nrafil = bajatit.nrafil and bajafam.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY bajafam.nombre";
} else {
	$sql4 = "SELECT bajafam.nombre as nombre, bajafam.nrodoc as nrodoc, bajafam.nrcuil as cuifam, bajatit.delcod as delcod, bajatit.nrafil as nrafil, bajatit.empcod as empcod, bajatit.nrcuil as nrcuil FROM bajafam, bajatit WHERE (bajafam.nrafil = bajatit.nrafil and bajatit.delcod = $delcod and bajafam.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY bajafam.nombre";
}
		
$result4 = mysql_query($sql4,$db);

if(mysql_num_rows($result4) == 0) {
	$sql4 = "SELECT bajafam.nombre as nombre, bajafam.nrodoc as nrodoc, bajafam.nrcuil as cuifam, titular.delcod as delcod, titular.nrafil as nrafil, titular.empcod as empcod, titular.nrcuil as nrcuil FROM bajafam, titular WHERE (bajafam.nrafil = titular.nrafil and titular.delcod = '$delcod' and bajafam.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY bajafam.nombre"; 			
		
	$result4 = mysql_query($sql4,$db);

	if(mysql_num_rows($result4) == 0) {
		print("<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
	}
}

// TABLA DE FAMILIARES DE TITULARES DE BAJA
while ($row4 = mysql_fetch_array($result4)){	
	if ($delcod >= "4000") {
		print("<td width=237>" . $row4['nombre'] . "</td>");
	} else {
		print("<td width=237> <a href=javascript:void(window.open('infoTitulares.php?cuil=" . $row4['nrcuil'] . "&nrafil=" . $row4['nrafil'] . "&empcod=" . $row4['empcod'] . "'))>".$row4['nombre']."</td>");
	}
	print("<td width=227>" . $row4['nrodoc'] . "</td>");
	print("<td width=200>" . $row4['cuifam'] . "</td>");
	print("<td width=200>" . $row4['nrafil'] . "</td>");
	print("</tr>");
}

?>
</table> 
<!--#fin de la tabla de familiares -->
</p>


</body>
</html>
