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
		if(isset($_POST['vacunasfaltantes'])) {
			$vacunasfaltantes=$_POST['vacunasfaltantes'];
		} else {
			$vacunasfaltantes="";
		}
		try {
			$dbname = "sistem22_intranet";
			$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();
				
			$sqlCarga = "INSERT INTO maternoinfantil (delcod,profesional,fechaatencion,nrcuil,nrafil,codpar,nombre,ddntelefono,nrotelefono,edad,talla,peso,perimetrocefalico,estudiofei,otoemisionesacusticas,fondodeojo,ecocadera,controlnro,vacunasaldia,vacunasfaltantes,lactanciamaterna,emitediagnostico,diagnostico,subdiagnostico,observaciones) VALUES (:delcod,:profesional,:fechaatencion,:nrcuil,:nrafil,:codpar,:nombre,:ddntelefono,:nrotelefono,:edad,:talla,:peso,:perimetrocefalico,:estudiofei,:otoemisionesacusticas,:fondodeojo,:ecocadera,:controlnro,:vacunasaldia,:vacunasfaltantes,:lactanciamaterna,:emitediagnostico,:diagnostico,:subdiagnostico,:observaciones)";
			$resCarga = $dbh->prepare($sqlCarga);
			if($resCarga->execute(array(':delcod' => $delcod, ':profesional' => strtoupper($_POST['profesional']), ':fechaatencion' => fechaParaGuardar($_POST['fechaatencion']), ':nrcuil' => $_POST['nrcuil'], ':nrafil' => $_POST['nrafil'], ':codpar' => $_POST['codpar'], ':nombre' => strtoupper($_POST['nombre']), ':ddntelefono' => $_POST['ddntelefono'], ':nrotelefono' => $_POST['nrotelefono'], ':edad' => $_POST['edad'], ':talla' => $_POST['talla'], ':peso' => $_POST['peso'], ':perimetrocefalico' => $_POST['perimetrocefalico'], ':estudiofei' => $_POST['estudiofei'], ':otoemisionesacusticas' => $_POST['otoemisionesacusticas'], ':fondodeojo' => $_POST['fondodeojo'], ':ecocadera' => $_POST['ecocadera'], ':controlnro' => $_POST['controlnro'],':vacunasaldia' => $_POST['vacunasaldia'], ':vacunasfaltantes' => $vacunasfaltantes, ':lactanciamaterna' => $_POST['lactanciamaterna'], ':emitediagnostico' => $_POST['emitediagnostico'], ':diagnostico' => $_POST['diagnostico'], ':subdiagnostico' => $_POST['subdiagnostico'], ':observaciones' => $_POST['observaciones'])))
			$dbh->commit();
			$pagina = "listadoMaternoInfantil.php";
			Header("Location: $pagina");
		} catch (PDOException $e) {
			echo $e->getMessage();
			$dbh->rollback();
		}
	}
} 
?>