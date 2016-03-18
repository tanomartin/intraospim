<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
if($delcod == 0 || $delcod == NULL) 
	header ("Location: ../logintranet.php?err=2");

if($delcod != 0 and $delcod != NULL) {
	if(isset($_POST)) {
		//var_dump($_POST);
		if(isset($_POST['preservativos'])) {
			$preservativos=$_POST['preservativos'];
		} else {
			$preservativos="0";
		}
		if(isset($_POST['diu'])) {
			$diu=$_POST['diu'];
		} else {
			$diu="0";
		}
		if(isset($_POST['anticonceptivos'])) {
			$anticonceptivos=$_POST['anticonceptivos'];
		} else {
			$anticonceptivos="0";
		}

		try {
			$dbname = "sistem22_intranet";
			$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();

			$sqlCarga = "INSERT INTO saludsexual (delcod,profesional,fechaatencion,nrcuil,nrafil,codpar,nombre,ddntelefono,nrotelefono,edad,informacion,metodoanticonceptivo,preservativos,diu,anticonceptivos,motivonoentrega,emitediagnostico,diagnostico,subdiagnostico,observaciones) VALUES (:delcod,:profesional,:fechaatencion,:nrcuil,:nrafil,:codpar,:nombre,:ddntelefono,:nrotelefono,:edad,:informacion,:metodoanticonceptivo,:preservativos,:diu,:anticonceptivos,:motivonoentrega,:emitediagnostico,:diagnostico,:subdiagnostico,:observaciones)";
			$resCarga = $dbh->prepare($sqlCarga);
			if($resCarga->execute(array(':delcod' => $delcod, ':profesional' => strtoupper($_POST['profesional']), ':fechaatencion' => fechaParaGuardar($_POST['fechaatencion']), ':nrcuil' => $_POST['nrcuil'], ':nrafil' => $_POST['nrafil'], ':codpar' => $_POST['codpar'], ':nombre' => strtoupper($_POST['nombre']), ':ddntelefono' => $_POST['ddntelefono'], ':nrotelefono' => $_POST['nrotelefono'], ':edad' => $_POST['edad'], ':informacion' => $_POST['informacion'], ':metodoanticonceptivo' => $_POST['metodoanticonceptivo'], ':preservativos' => $preservativos, ':diu' => $diu, ':anticonceptivos' => $anticonceptivos, ':motivonoentrega' => $_POST['motivonoentrega'], ':emitediagnostico' => $_POST['emitediagnostico'], ':diagnostico' => $_POST['diagnostico'], ':subdiagnostico' => $_POST['subdiagnostico'], ':observaciones' => $_POST['observaciones'])))
			$dbh->commit();
			$pagina = "listadoSaludSexual.php";
			Header("Location: $pagina");
		} catch (PDOException $e) {
			echo $e->getMessage();
			$dbh->rollback();
		}
	}
} 
?>