<?php
session_save_path("sesiones");
session_start();
include ("conexion.php");
$datos = array_values($_POST);
$delcod = $datos[0];
$clave = $datos[1];


$sql = "select * from usuarios where delcod = '$delcod' and claves = '$clave'";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);
$redire = '';
if ($cant > 0) {
	$rowUsuario = mysql_fetch_assoc($result); 
	if ($rowUsuario['acceso'] == 0) {
		$redire = 'location:actualizando.php';
	} else {
		$_SESSION['delcod'] = $delcod;
		$_SESSION['aut'] = 'pepepascual';
		if ($delcod >= "3200") {
			if ($delcod  < "4000") {
				$redire = 'location:menuControl.php';
			} else {
				$redire = 'location:autorizaciones/listadoAuto.php';
			}
		} else {
			$redire = 'location:menu.php';
		}
	}
} else {
	$redire = 'location:logintranet.php?err=1';
}

header($redire);
?>
