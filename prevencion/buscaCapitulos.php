<?php 
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");

$respuesta='<option title ="Seleccione un valor" value="">Seleccione un valor</option>';
$sqlLeeCapitulos="SELECT idcapitulo, numerocapitulo, SUBSTRING(descripcion, 1, 115) AS descripcion FROM cie10capitulos";
$resLeeCapitulos=mysql_query($sqlLeeCapitulos,$db);
while($rowLeeCapitulos=mysql_fetch_array($resLeeCapitulos)) {
	$respuesta.="<option title ='Capitulo $rowLeeCapitulos[numerocapitulo]' value='$rowLeeCapitulos[idcapitulo]'>".$rowLeeCapitulos['descripcion']."</option>";
}
echo $respuesta;
?>