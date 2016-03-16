<?php session_save_path("sesiones");
session_start();
include ("conexion.php");
$sql = "select * from usuarios where delcod = '".$_POST['usuario']."' and claves = '".$_POST['pass']."'";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);
if ($cant > 0) {
	$row = mysql_fetch_assoc($result);
	$_SESSION['delcod'] = $row['delcod'];
	$_SESSION['fecult'] = substr($row['fechaactualizacion'],8,2)."/".substr($row['fechaactualizacion'],5,2)."/".substr($row['fechaactualizacion'],0,4);
	$_SESSION['fecacc'] = substr($row['fecuac'],8,2)."/".substr($row['fecuac'],5,2)."/".substr($row['fecuac'],0,4)." - ".$row['horuac'];
	$_SESSION['nombre'] = $row['nombre'];
	

	$habilitados = array("1002","1102","1103","1106","1107","1108","1109","1701","1702","1703","2603","2604","1301","1302","2001","2501","2602","2101","2102","2103","1401","1402","1402","1501","1601","1110","1202","1901","2201","2301","1802","2401","2402","2701","2801");
	$_SESSION['tieneAutorizacion'] = false;
	for ($i=0; $i < sizeof($habilitados); $i++) {
		if ($habilitados[$i] == $_SESSION['delcod']) {
			$_SESSION['tieneAutorizacion'] = true;
			$i = sizeof($habilitados);
		}
	}
	
	$prevencion = array("1002","1102","1106","1107","1108","5000","5001");
	$_SESSION['tienePrevencion'] = false;
	for ($i=0; $i < sizeof($prevencion); $i++) {
		if ($prevencion[$i] == $_SESSION['delcod']) {
			$_SESSION['tienePrevencion'] = "disabled='disabled'";
			$i = sizeof($prevencion);
		}
	}
	
	$hoy = date("Ymd");
	$hora = date("H:i:s");
	$sql = "UPDATE usuarios SET fecuac= '$hoy', horuac = '$hora' where delcod = $delcod";
	$result = mysql_query($sql,$db);
}
echo $cant;
?>
