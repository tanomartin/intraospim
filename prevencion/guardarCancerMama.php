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
		if(isset($_POST['personaantecedente'])) {
			$personaantecedente=$_POST['personaantecedente'];
		} else {
			$personaantecedente="";
		}
		if(isset($_POST['ultimoexamenmamario'])) {
			$ultimoexamenmamario=fechaParaGuardar($_POST['ultimoexamenmamario']);
		} else {
			$ultimoexamenmamario="0000-00-00";
		}
		if(isset($_POST['ultimamamografia'])) {
			$ultimamamografia=fechaParaGuardar($_POST['ultimamamografia']);
		} else {
			$ultimamamografia="0000-00-00";
		}
		try {
			$dbname = "sistem22_intranet";
			$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();
				
			$sqlCarga = "INSERT INTO cancermama (delcod,profesional,fechaatencion,nrcuil,nrafil,codpar,nombre,ddntelefono,nrotelefono,edad,antecedentes,personaantecedente,examenmamario,ultimoexamenmamario,mamografia,ultimamamografia,emitediagnostico,diagnostico,subdiagnostico,observaciones) VALUES (:delcod,:profesional,:fechaatencion,:nrcuil,:nrafil,:codpar,:nombre,:ddntelefono,:nrotelefono,:edad,:antecedentes,:personaantecedente,:examenmamario,:ultimoexamenmamario,:mamografia,:ultimamamografia,:emitediagnostico,:diagnostico,:subdiagnostico,:observaciones)";
			$resCarga = $dbh->prepare($sqlCarga);
			if($resCarga->execute(array(':delcod' => $delcod, ':profesional' => strtoupper($_POST['profesional']), ':fechaatencion' => fechaParaGuardar($_POST['fechaatencion']), ':nrcuil' => $_POST['nrcuil'], ':nrafil' => $_POST['nrafil'], ':codpar' => $_POST['codpar'], ':nombre' => strtoupper($_POST['nombre']), ':ddntelefono' => $_POST['ddntelefono'], ':nrotelefono' => $_POST['nrotelefono'], ':edad' => $_POST['edad'], ':antecedentes' => $_POST['antecedentes'], ':personaantecedente' => $personaantecedente, ':examenmamario' => $_POST['examenmamario'], ':ultimoexamenmamario' => $ultimoexamenmamario, ':mamografia' => $_POST['mamografia'], ':ultimamamografia' => $ultimamamografia, ':emitediagnostico' => $_POST['emitediagnostico'], ':diagnostico' => $_POST['diagnostico'], ':subdiagnostico' => $_POST['subdiagnostico'], ':observaciones' => $_POST['observaciones'])))
			$dbh->commit();
			$pagina = "listadoCancerMama.php";
			Header("Location: $pagina");
		} catch (PDOException $e) {
			echo $e->getMessage();
			$dbh->rollback();
		}
	}
} 
?>