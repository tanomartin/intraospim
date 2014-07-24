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
if ($cant > 0) {
				$_SESSION['delcod'] = $delcod;
				$_SESSION['aut'] = 'pepepascual';
				if ($delcod >= "3200") {
					if ($delcod  < "4000") {
						header ('location:menuControl.php');
					} else {
						header('location:autorizaciones/listadoAuto.php');
					}
				} else {
					header ('location:menu.php');
				}
} else {
	header ('location:logintranet.php?err=1');
}
?>
