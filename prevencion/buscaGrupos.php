<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
if(isset($_POST['capitulo']))
{
	$idcapitulo=$_POST['capitulo'];
	$respuesta='<option title ="Seleccione un valor" value="">Seleccione un valor</option>';
	$sqlLeeGrupos="SELECT idgrupo, SUBSTRING(descripcion, 1, 115) AS descripcion FROM cie10grupos WHERE idcapitulo = '$idcapitulo'";
	$resLeeGrupos=mysql_query($sqlLeeGrupos,$db);
	while($rowLeeGrupos=mysql_fetch_array($resLeeGrupos)) {
		$respuesta.="<option title ='Grupo $rowLeeGrupos[idgrupo]' value='$rowLeeGrupos[idgrupo]'>".$rowLeeGrupos['descripcion']."</option>";
	}
	echo $respuesta;
}
?>