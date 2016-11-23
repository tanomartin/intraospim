<?php include ("verificaSesion.php");
$delcod = $_SESSION['delcod'];
$where = $_POST['orden'];
$like = $_POST['condicion'];
?>

<h3 class="page-header">Resultados</h3>
<table class="table" style="margin-bottom: 10px;" border="1">
  <tr style="text-align: center">
    <td colspan="5"><strong>TITULARES</strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>Fec. Nacimiento (Edad)</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado</strong></td>
  </tr>
<?php
$sql = "SELECT nombre, nrodoc, nrcuil, nrafil, nrcuit, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac FROM `titular` WHERE delcod = '$delcod' and $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by '$where'";
$result = mysql_query($sql,$db); 

		// TABLA DE TITULARES
		if(mysql_num_rows($result) == 0) { ?>
			<tr><td colspan='5' align='center' class='Estilo4'> Consulta sin resultados </td></tr>
<?php 	} else {
			while ($row = mysql_fetch_array($result)){ ?>
				<tr>
					<td><a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row['nrcuil'] ?>&nrafil=<?php echo $row['nrafil']?>&nrcuit=<?php echo $row['nrcuit']?>"><?php echo $row['nombre'] ?></a></td>
					<td><?php echo $row['nrodoc'] ?></td>
					<td><?php echo $row['fecnac']." (".$row['edad'].")" ?></td>
					<td><?php echo $row['nrcuil'] ?></td>
					<td><?php echo $row['nrafil'] ?></td>
				</tr>
<?php		}
		}
?>
</table> 
<!--#fin de la tabla de titulares -->

<table class="table" style="margin-bottom: 10px;" border="1">
  <tr style="text-align: center">
    <td colspan="5"><strong>FAMILIARES</strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>Fec. Nacimiento (Edad)</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado del titular</strong></td>		
  </tr>


<?php
$sql2 = "SELECT familia.nombre as nombre, familia.nrodoc as nrodoc, familia.nrcuil as cuifam, titular.nrcuit as nrcuit, titular.nrcuil as nrcuil, titular.nrafil as nrafil, titular.delcod as delcod, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(familia.fecnac)), '%Y')+0 as edad, DATE_FORMAT(familia.fecnac,'%d/%m/%Y') as fecnac 
			FROM familia, titular WHERE familia.nrafil = titular.nrafil and titular.delcod = '$delcod' and familia.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by familia.nombre";
$result2 = mysql_query($sql2,$db);

// TABLA DE FAMILIARES
while ($row2 = mysql_fetch_array($result2)) {	?>
	<tr>
		<td> <a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row2['nrcuil'] ?>&nrafil=<?php echo $row2['nrafil']?>&nrcuit=<?php echo $row2['nrcuit']?>"><?php echo $row2['nombre'] ?></a></td>
		<td><?php echo $row2['nrodoc'] ?></td>
		<td><?php echo $row2['fecnac']." (".$row2['edad'].")" ?></td>
		<td><?php echo $row2['cuifam'] ?></td>
		<td><?php echo $row2['nrafil'] ?></td>
	</tr>
<?php }
if(mysql_num_rows($result2) == 0) { ?>
	<tr><td colspan='5' align='center' class='Estilo4'> Consulta sin resultados </td></tr>
<?php } ?>
</table> 
<!--#fin de la tabla de familiares -->

<table class="table" style="margin-bottom: 10px;" border="1">
  <tr style="text-align: center">
    <td colspan="5"><strong>TITULARES INACTIVOS </strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>Fec. Nacimiento (Edad)</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado</strong></td>	
  </tr>
<?php
$sql3 = "SELECT nombre, nrafil, nrodoc, nrcuil, nrcuit, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac FROM bajatit WHERE delcod = $delcod and $where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci order by nombre";
$result3 = mysql_query($sql3,$db);

// TABLA DE TITULARES DE BAJA
while ($row3 = mysql_fetch_array($result3)){	?>
	<tr>
		<td> <a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row3['nrcuil'] ?>&nrafil=<?php echo $row3['nrafil']?>&nrcuit=<?php echo $row3['nrcuit']?>"><?php echo $row3['nombre'] ?></a></td>
		<td><?php echo $row3['nrodoc'] ?></td>
		<td><?php echo $row3['fecnac']." (".$row3['edad'].")" ?></td>
		<td><?php echo $row3['nrcuil'] ?></td>
		<td><?php echo $row3['nrafil'] ?></td>
	</tr>
<?php }
if(mysql_num_rows($result3) == 0) { ?>
	<tr><td colspan='5' align='center' class='Estilo4'> Consulta sin resultados </td></tr>
<?php } ?>
</table> 
<!--#fin de la tabla de familiares -->

<table class="table" style="margin-bottom: 10px;" border="1">
  <tr style="text-align: center">
    <td colspan="5"><strong>FAMILIARES INACTIVOS DEL TITULAR </strong></td>
  </tr>
  <tr>
    <td><strong>Apellido y nombre </strong></td>
    <td><strong>Nro. Documento</strong></td>
    <td><strong>Fec. Nacimiento (Edad)</strong></td>
    <td><strong>C.U.I.L.</strong></td>
    <td><strong>Nro. Afiliado del titular</strong></td>
  </tr>


<?php
$sql4 = "SELECT bajafam.nombre as nombre, bajafam.nrodoc as nrodoc, bajafam.nrcuil as cuifam, bajatit.delcod as delcod, bajatit.nrafil as nrafil, bajatit.nrcuit as nrcuit, bajatit.nrcuil as nrcuil, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(bajafam.fecnac)), '%Y')+0 as edad, DATE_FORMAT(bajafam.fecnac,'%d/%m/%Y') as fecnac 
			FROM bajafam, bajatit WHERE (bajafam.nrafil = bajatit.nrafil and bajatit.delcod = $delcod and bajafam.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY bajafam.nombre";	
$result4 = mysql_query($sql4,$db);

if(mysql_num_rows($result4) == 0) {
	$sql4 = "SELECT bajafam.nombre as nombre, bajafam.nrodoc as nrodoc, bajafam.nrcuil as cuifam, titular.delcod as delcod, titular.nrafil as nrafil, titular.nrcuit as nrcuit, titular.nrcuil as nrcuil FROM bajafam, titular WHERE (bajafam.nrafil = titular.nrafil and titular.delcod = '$delcod' and bajafam.$where LIKE CONVERT(_utf8 '%$like%' USING latin1) COLLATE latin1_swedish_ci) ORDER BY bajafam.nombre"; 			
	$result4 = mysql_query($sql4,$db);
	if(mysql_num_rows($result4) == 0) {
		print("<tr><td colspan='5' align='center' class='Estilo4'> Consulta sin resultados </td></tr>");
	}
}

// TABLA DE FAMILIARES DE TITULARES DE BAJA
while ($row4 = mysql_fetch_array($result4)){	 ?>
	<tr>
		<td> <a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row4['nrcuil'] ?>&nrafil=<?php echo $row4['nrafil']?>&nrcuit=<?php echo $row4['nrcuit']?>"><?php echo $row4['nombre'] ?></a></td>
		<td><?php echo $row4['nrodoc'] ?></td>
		<td><?php echo $row4['fecnac']." (".$row4['edad'].")" ?></td>
		<td><?php echo $row4['cuifam'] ?></td>
		<td><?php echo $row4['nrafil'] ?></td>
	</tr>
<?php } ?>
</table> 