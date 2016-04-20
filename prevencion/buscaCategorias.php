<?php
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
if(isset($_POST['grupo']))
{
	$idgrupo=$_POST['grupo'];
	$respuesta='<option title ="Seleccione un valor" value="">Seleccione un valor</option>';
	$sqlLeeCategorias="SELECT idcategoria, letracodigo, numerocodigo, simbolocodigo, SUBSTRING(descripcion, 1, 115) AS descripcion FROM cie10categorias WHERE idgrupo = '$idgrupo'";
	$resLeeCategorias=mysql_query($sqlLeeCategorias,$db);
	while($rowLeeCategorias=mysql_fetch_array($resLeeCategorias)) {
		$respuesta.="<option title ='Codigo $rowLeeCategorias[letracodigo]$rowLeeCategorias[numerocodigo]$rowLeeCategorias[simbolocodigo]' value='$rowLeeCategorias[idcategoria]'>".$rowLeeCategorias['descripcion']."</option>";
	}
	echo $respuesta;
}
?>