<?php include ("verificaSesion.php");
$delcod = $_SESSION['delcod'];
$where = $_POST['orden'];
$like = $_POST['condicion'];
?>

<h3 class="page-header">Resultados</h3>
<table class="table" style="margin-bottom: 10px;" border="1">
  <tr>
    <td colspan="4"><strong>TITULARES</strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado</strong></td>
  </tr>
<?php
$sql = "SELECT nombre, nrodoc, nrcuil, nrafil, nrcuit  FROM `titular` WHERE delcod = '$delcod' and $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by '$where'";
$result = mysql_query($sql,$db); 

		// TABLA DE TITULARES
		if(mysql_num_rows($result) == 0) { ?>
			<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>
<?php 	} else {
			while ($row = mysql_fetch_array($result)){ ?>
				<tr>
					<td> <a target="_black" href="empresas.nomina.ficha.php?cuil=<?php echo $row['nrcuil'] ?>&nrafil=<?php echo $row['nrafil']?>&nrcuit=<?php echo $row['nrcuit']?>"><?php echo $row['nombre'] ?></a></td>
					<td><?php echo $row['nrodoc'] ?></td>
					<td><?php echo $row['nrcuil'] ?></td>
					<td><?php echo $row['nrafil'] ?></td>
				</tr>
<?php		}
		}
?>
</table> 
<!--#fin de la tabla de titulares -->

<table class="table" style="margin-bottom: 10px;" border="1">
  <tr>
    <td colspan="4"><strong>FAMILIARES</strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado del titular</strong></td>		
  </tr>


<?php
$sql2 = "SELECT familia.nombre as nombre, familia.nrodoc as nrodoc, familia.nrcuil as cuifam, titular.nrcuit as nrcuit, titular.nrcuil as nrcuil, titular.nrafil as nrafil, titular.delcod as delcod FROM familia, titular WHERE familia.nrafil = titular.nrafil and titular.delcod = '$delcod' and familia.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by familia.nombre";
$result2 = mysql_query($sql2,$db);

// TABLA DE FAMILIARES
while ($row2 = mysql_fetch_array($result2)){	
	print("<tr>");	
	print("<td> <a href=javascript:void(window.open('infoTitulares.php?cuil=" . $row2['nrcuil'] . "&nrafil=" . $row2['nrafil'] . "&nrcuit=" . $row2['nrcuit'] . "'))>".$row2['nombre']."</td>");
	print("<td>".$row2['nrodoc']."</td>");
	print("<td>".$row2['cuifam']."</td>");
	print("<td>".$row2['nrafil']."</td>");
	print("</tr>");
}
if(mysql_num_rows($result2) == 0) 
	print("<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
?>
</table> 
<!--#fin de la tabla de familiares -->

<table class="table" style="margin-bottom: 10px;" border="1">
  <tr>
    <td colspan="4"><strong>TITULARES INACTIVOS </strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado</strong></td>	
  </tr>
<?php
$sql3 = "SELECT nombre, nrafil, nrodoc, nrcuil, nrcuit FROM bajatit WHERE delcod = $delcod and $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by nombre";
$result3 = mysql_query($sql3,$db);

// TABLA DE TITULARES DE BAJA
while ($row3 = mysql_fetch_array($result3)){	
	print("<tr>");
	print("<td> <a href=javascript:void(window.open('infoTitulares.php?cuil=" . $row3['nrcuil'] . "&nrafil=" . $row3['nrafil'] . "&nrcuit=" . $row3['nrcuit'] . "'))>".$row3['nombre']."</td>");
	print("<td>" . $row3['nrodoc'] . "</td>");
	print("<td>" . $row3['nrcuil'] . "</td>");
	print("<td>" . $row3['nrafil'] . "</td>");	
	print("</tr>");
}
if(mysql_num_rows($result3) == 0)
	print("<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
?>
</table> 
<!--#fin de la tabla de familiares -->

<table class="table" style="margin-bottom: 10px;" border="1">
  <tr>
    <td colspan="4"><strong>FAMILIARES INACTIVOS DEL TITULAR </strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado del titular</strong></td>
  </tr>


<?php
$sql4 = "SELECT bajafam.nombre as nombre, bajafam.nrodoc as nrodoc, bajafam.nrcuil as cuifam, bajatit.delcod as delcod, bajatit.nrafil as nrafil, bajatit.nrcuit as nrcuit, bajatit.nrcuil as nrcuil FROM bajafam, bajatit WHERE (bajafam.nrafil = bajatit.nrafil and bajatit.delcod = $delcod and bajafam.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY bajafam.nombre";	
$result4 = mysql_query($sql4,$db);

if(mysql_num_rows($result4) == 0) {
	$sql4 = "SELECT bajafam.nombre as nombre, bajafam.nrodoc as nrodoc, bajafam.nrcuil as cuifam, titular.delcod as delcod, titular.nrafil as nrafil, titular.nrcuit as nrcuit, titular.nrcuil as nrcuil FROM bajafam, titular WHERE (bajafam.nrafil = titular.nrafil and titular.delcod = '$delcod' and bajafam.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY bajafam.nombre"; 			
	$result4 = mysql_query($sql4,$db);
	if(mysql_num_rows($result4) == 0) {
		print("<tr><td colspan='4' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
	}
}

// TABLA DE FAMILIARES DE TITULARES DE BAJA
while ($row4 = mysql_fetch_array($result4)){	
	print("<tr>");
	print("<td width=237> <a href=javascript:void(window.open('infoTitulares.php?cuil=" . $row4['nrcuil'] . "&nrafil=" . $row4['nrafil'] . "&nrcuit=" . $row4['nrcuit'] . "'))>".$row4['nombre']."</td>");
	print("<td>" . $row4['nrodoc'] . "</td>");
	print("<td>" . $row4['cuifam'] . "</td>");
	print("<td>" . $row4['nrafil'] . "</td>");
	print("</tr>");
}

?>
</table> 