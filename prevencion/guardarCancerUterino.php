<?php 
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
		if(isset($_POST['ultimopap'])) {
			$ultimopap=fechaParaGuardar($_POST['ultimopap']);
		} else {
			$ultimopap="0000-00-00";
		}
		if(isset($_POST['ultimacolpo'])) {
			$ultimacolpo=fechaParaGuardar($_POST['ultimacolpo']);
		} else {
			$ultimacolpo="0000-00-00";
		}
		try {
			$dbname = "sistem22_intranet";
			$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();
				
			$sqlCarga = "INSERT INTO canceruterino (delcod,profesional,fechaatencion,nrcuil,nrafil,codpar,nombre,ddntelefono,nrotelefono,edad,antecedentes,personaantecedente,pap,ultimopap,colpo,ultimacolpo,emitediagnostico,diagnostico,subdiagnostico,observaciones) VALUES (:delcod,:profesional,:fechaatencion,:nrcuil,:nrafil,:codpar,:nombre,:ddntelefono,:nrotelefono,:edad,:antecedentes,:personaantecedente,:pap,:ultimopap,:colpo,:ultimacolpo,:emitediagnostico,:diagnostico,:subdiagnostico,:observaciones)";
			$resCarga = $dbh->prepare($sqlCarga);
			if($resCarga->execute(array(':delcod' => $delcod, ':profesional' => strtoupper($_POST['profesional']), ':fechaatencion' => fechaParaGuardar($_POST['fechaatencion']), ':nrcuil' => $_POST['nrcuil'], ':nrafil' => $_POST['nrafil'], ':codpar' => $_POST['codpar'], ':nombre' => strtoupper($_POST['nombre']), ':ddntelefono' => $_POST['ddntelefono'], ':nrotelefono' => $_POST['nrotelefono'], ':edad' => $_POST['edad'], ':antecedentes' => $_POST['antecedentes'], ':personaantecedente' => $personaantecedente, ':pap' => $_POST['pap'], ':ultimopap' => $ultimopap, ':colpo' => $_POST['colpo'], ':ultimacolpo' => $ultimacolpo, ':emitediagnostico' => $_POST['emitediagnostico'], ':diagnostico' => $_POST['diagnostico'], ':subdiagnostico' => $_POST['subdiagnostico'], ':observaciones' => $_POST['observaciones'])))
			$dbh->commit();
			$pagina = "listadoCanceUterino.php";
			Header("Location: $pagina");
		} catch (PDOException $e) {
			echo $e->getMessage();
			$dbh->rollback();
		}
	}
} 
?>