<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
$delcod = $_SESSION['delcod'];
if (isset($_POST['cuil'])) {
	$respuesta = array("nroafi" => NULL, "tipo" => NULL, "codigo" => NULL, "fecnac" => NULL, "nombre" => NULL, "sexo" => NULL);
	$cuil = $_POST['cuil'];
	if ($delcod >= "4000") {
		$queryTitu = "SELECT * FROM titular WHERE nrcuil = $cuil";
		$queryFami = "SELECT * FROM familia WHERE nrcuil = $cuil";
	} else {
		$queryTitu = "SELECT * FROM titular WHERE nrcuil = $cuil AND delcod = $delcod";
		$queryFami = "SELECT * FROM familia WHERE nrcuil = $cuil AND delcod = $delcod";
	}
	if ($cuil != NULL) { 
		$result = mysql_query($queryTitu,$db); 
		$cant = mysql_num_rows($result);
		if ($cant != 0) {
			$row = mysql_fetch_array($result);
			$nroafi = $row['nrafil'];
			$tipo = "Titular";
			$codigo = 1;
			$fecnac = $row['fecnac'];
			$nombre = utf8_encode($row['nombre']);
			$sexo = $row['ssexxo'];
		} else {
			$result = mysql_query($queryFami,$db); 
			$cant = mysql_num_rows($result);
			if ($cant != 0) {
				$row = mysql_fetch_array($result);
				$nroafi = $row['nrafil'];
				$tipo = "Familiar";
				$codigo = $row['codpar'];
				$fecnac = $row['fecnac'];
				$nombre = utf8_encode($row['nombre']);
				$sexo = $row['ssexxo'];
			}
		}
		$respuesta = array("nroafi" => $nroafi, "tipo" => $tipo, "codigo" => $codigo, "fecnac" => $fecnac, "nombre" => $nombre, "sexo" => $sexo);
	} 
	echo json_encode($respuesta);
}
?>