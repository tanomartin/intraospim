<?php
session_save_path("sesiones");
session_start();

$datos = array_values($HTTP_POST_VARS);

$delcod = $datos [0];
$clave = $datos [1];

include ("conexion.php");

$sql = "select * from usuarios where delcod = '$delcod' and claves = '$clave'";
$result = mysql_db_query("uv0471_intranet",$sql,$db);
$cant = mysql_num_rows($result);
if ($cant > 0) {
				$_SESSION['delcod'] = $delcod;
				$_SESSION['aut'] = 'pepepascual';
				if ($delcod >= "3200") {
					if ($delcod  != "4000") {
						header ('location:menuControl.php');
					} else {
						header('location:autorizaciones/listadoAuto.php');
					}
				} else {
					header ('location:menu.php');
				}
} else {
	header ('location:loginerror.php');
}
?>
