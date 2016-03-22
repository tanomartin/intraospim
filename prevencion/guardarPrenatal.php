<?php
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
if($delcod == 0 || $delcod == NULL) 
	header ("Location: ../logintranet.php?err=2");

if($delcod != 0 and $delcod != NULL) {
	if(isset($_POST)) {
		//var_dump($_POST);
		if(isset($_POST['vivos'])) {
			$vivos=$_POST['vivos'];
		} else {
			$vivos="0";
		}
		if(isset($_POST['abortos'])) {
			$abortos=$_POST['abortos'];
		} else {
			$abortos="0";
		}
		if(isset($_POST['toxoplasmosis'])) {
			$toxoplasmosis=$_POST['toxoplasmosis'];
		} else {
			$toxoplasmosis="0";
		}
		if(isset($_POST['chagas'])) {
			$chagas=$_POST['chagas'];
		} else {
			$chagas="0";
		}
		if(isset($_POST['vdrl'])) {
			$vdrl=$_POST['vdrl'];
		} else {
			$vdrl="0";
		}
		if(isset($_POST['hepatitis'])) {
			$hepatitis=$_POST['hepatitis'];
		} else {
			$hepatitis="0";
		}
		if(isset($_POST['hiv'])) {
			$hiv=$_POST['hiv'];
		} else {
			$hiv="0";
		}
		try {
			$dbname = "sistem22_intranet";
			$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();
				
			$sqlCarga = "INSERT INTO prenatal (delcod,profesional,fechaatencion,nrcuil,nrafil,codpar,nombre,ddntelefono,nrotelefono,edad,talla,peso,presion,serologia,fum,edadgestacional,alturauterina,fpp,gestas,vivos,abortos,controlnro,cantidadecografias,toxoplasmosis,chagas,vdrl,hepatitis,hiv,emitediagnostico,diagnostico,subdiagnostico,observaciones) VALUES (:delcod,:profesional,:fechaatencion,:nrcuil,:nrafil,:codpar,:nombre,:ddntelefono,:nrotelefono,:edad,:talla,:peso,:presion,:serologia,:fum,:edadgestacional,:alturauterina,:fpp,:gestas,:vivos,:abortos,:controlnro,:cantidadecografias,:toxoplasmosis,:chagas,:vdrl,:hepatitis,:hiv,:emitediagnostico,:diagnostico,:subdiagnostico,:observaciones)";
			$resCarga = $dbh->prepare($sqlCarga);
			if($resCarga->execute(array(':delcod' => $delcod, ':profesional' => strtoupper($_POST['profesional']), ':fechaatencion' => fechaParaGuardar($_POST['fechaatencion']), ':nrcuil' => $_POST['nrcuil'], ':nrafil' => $_POST['nrafil'], ':codpar' => $_POST['codpar'], ':nombre' => strtoupper($_POST['nombre']), ':ddntelefono' => $_POST['ddntelefono'], ':nrotelefono' => $_POST['nrotelefono'], ':edad' => $_POST['edad'], ':talla' => $_POST['talla'], ':peso' => $_POST['peso'], ':presion' => $_POST['presion'], ':serologia' => $_POST['serologia'], ':fum' => fechaParaGuardar($_POST['fum']), ':edadgestacional' => $_POST['edadgestacional'], ':alturauterina' => $_POST['alturauterina'], ':fpp' => fechaParaGuardar($_POST['fpp']), ':gestas' => $_POST['gestas'], ':vivos' => $vivos, ':abortos' => $abortos, ':controlnro' => $_POST['controlnro'], ':cantidadecografias' => $_POST['cantidadecografias'], ':toxoplasmosis' => $toxoplasmosis, ':chagas' => $chagas, ':vdrl' => $vdrl, ':hepatitis' => $hepatitis, ':hiv' => $hiv, ':emitediagnostico' => $_POST['emitediagnostico'], ':diagnostico' => $_POST['diagnostico'], ':subdiagnostico' => $_POST['subdiagnostico'], ':observaciones' => $_POST['observaciones'])))
			$dbh->commit();
			$pagina = "listadoPrenatal.php";
			Header("Location: $pagina");
		} catch (PDOException $e) {
			echo $e->getMessage();
			$dbh->rollback();
		}
	}
} 
?>