<?php session_save_path("sesiones");
session_start();
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
include ("conexion.php");

$redirec = false;
if(empty($_SESSION) || $_SESSION['delcod'] == null || $_SESSION['delcod'] == ''){
	$redirec = true;
} else {
	$sql = "select acceso from usuarios where delcod = '$delcod'";
	$result = mysql_query($sql,$db);
	$rowUsuario = mysql_fetch_assoc($result);
	if ($rowUsuario['acceso'] == 0) {
		$redirec = true;
	}
}
if ($redirec) {
	header("Location: logout.php?error=2");
	exit(0);
}
?>