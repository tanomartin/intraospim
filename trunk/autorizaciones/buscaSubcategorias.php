<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
if(isset($_POST['categoria']))
{
	$idcategoria=$_POST['categoria'];
	$respuesta='<option title ="Seleccione un valor" value="">Seleccione un valor</option>';
	$sqlLeeSubCategorias="SELECT idsubcategoria, idcategoria, numerosubcodigo, simbolosubcodigo, SUBSTRING(descripcion, 1, 115) AS descripcion FROM cie10subcategorias WHERE idcategoria = '$idcategoria'";
	$resLeeSubCategorias=mysql_query($sqlLeeSubCategorias,$db);
	while($rowLeeSubCategorias=mysql_fetch_array($resLeeSubCategorias)) {
		$categoria=$rowLeeSubCategorias[idcategoria];
		$sqlLeeCategorias="SELECT letracodigo, numerocodigo FROM cie10categorias WHERE idcategoria = '$categoria'";
		$resLeeCategorias=mysql_query($sqlLeeCategorias,$db);
		$rowLeeCategorias=mysql_fetch_array($resLeeCategorias);

		$respuesta.="<option title ='Codigo $rowLeeCategorias[letracodigo]$rowLeeCategorias[numerocodigo].$rowLeeSubCategorias[numerosubcodigo]$rowLeeSubCategorias[simbolosubcodigo]' value='$rowLeeSubCategorias[idsubcategoria]'>".$rowLeeSubCategorias['descripcion']."</option>";
	}
	echo $respuesta;
}
?>