<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
if(isset($_POST['capitulo']))
{
	$respuesta='<option title ="Seleccione un valor" value="">Seleccione un valor</option>';
	$sqlLeeCapitulos="SELECT idcapitulo, descripcion FROM cie10capitulos";
	$resLeeCapitulos=mysql_query($sqlLeeCapitulos,$db);
	while($rowLeeCapitulos=mysql_fetch_array($sqlLeeCapitulos)) {
		$respuesta.="<option title ='$rowLeeCapitulos[descripcion]' value='$rowLeeCapitulos[idcapitulo]'>".$rowLeeCapitulos['descripcion']."</option>";
	}
	echo $respuesta;
}
?>