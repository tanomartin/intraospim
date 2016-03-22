<?php session_save_path("../sesiones");
session_start();
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
include ("../conexion.php");

$redirec = false;
if(empty($_SESSION) || $_SESSION['delcod'] == null || $_SESSION['delcod'] == ''){
	$redirec = true;
} else {
	/*$fechaGuardada = $_SESSION["ultimoAcceso"]; 
	$ahora = date("Y-n-j H:i:s"); 
	$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 
	$maxSession = $_SESSION["maxtimeSession"];
	
	//40 minutos de sesion
	if($tiempo_transcurrido >= $maxSession) { 
		$redirec = true;
	} else {
		$_SESSION["ultimoAcceso"] = $ahora; 
	}*/
	$sql = "select acceso from usuarios where delcod = '$delcod'";
	$result = mysql_query($sql,$db);
	$rowUsuario = mysql_fetch_assoc($result);
	if ($rowUsuario['acceso'] == 0) {
		$redirec = true;
	}
}
if ($redirec) {
	header("Location: ../logout.php?error=2");
	exit(0);
}
?>