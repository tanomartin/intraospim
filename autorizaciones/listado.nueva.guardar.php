<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
	

	// maximo 512KB
	$maxSize = 524288;
	$tipoPermitidoE = "application/pdf";
	$tipoPermitidoCM = "application/pdf";
	$fechaSolicitud = date("Y/m/d"); 
	
	$delcod = $_SESSION['delcod'];
if($delcod == 0 || $delcod == NULL) 
	header ("Location: ../logintranet.php?err=2");
	
	$cuit =  $_POST['textCuil'];
	$nroafil = $_POST['textNroAfil'];
	$detalleCodigo = $_POST['textCodPar'];
	$codPar = $_POST['codPar'];
	$nombre = strtoupper($_POST['textNombre']);
	$select = $_POST['tipo'];
	if ($select == 1) {
		$practica = 1;
		$material = 0;
		$medicamento = 0;
	}
	if ($select == 2) {
		$practica = 0;
		$material = 1;
		$medicamento = 0;
	}
	if ($select == 3) {
		$practica = 0;
		$material = 0;
		$medicamento = 1;
	}
	if (isset($_POST['tipoSolicitud'])) {
		$tipoMaterial = $_POST['tipoSolicitud'];
	} else {
		$tipoMaterial = 0;
	}
	$minPersu = $_POST['minimo'];
	$maxPresu = $_POST['maximo'];
	$notaPresu =  $_POST['notaCantidad'];
	
	$todoOk = 0;
	
	$nombre_archivo_pm=$_FILES["pedidoMedico"]["name"]; //Nombre del archivo
	$tipo_archivo_pm=$_FILES["pedidoMedico"]["type"]; //Tipo de archivo
	$tamano_archivo_pm=$_FILES["pedidoMedico"]["size"]; //Tamano de archivo
	$archivo_pm = $_FILES["pedidoMedico"]["tmp_name"]; 
	$error_pm = "";
	if ($nombre_archivo_pm!="") {
		if ($tamano_archivo_pm <= $maxSize) {
			if ($tipo_archivo_pm==$tipoPermitidoE || $tipo_archivo_pm==$tipoPermitidoCM ) {
				$fp = fopen($archivo_pm,"rb");
				$contenido_pm = fread($fp,$tamano_archivo_pm);
				$contenido_pm = addslashes($contenido_pm);
				fclose($fp);
			} else {
				$todoOk = 1;
				$error_pm = "Tipo de Archivo no permitido. Solo se permite pdf";
			}
		} else {
			$todoOk = 1;
			$error_pm = "El tamaño del archivo excede el máximo permitido. Máximo permitido 512 KB.";
		}
	} else {
		$todoOk = 1;
		$error_pm = "Archivo no encontrado.";
	}
	
	//echo($nombre_archivo_pm); //echo "<br>";
	//echo($tipo_archivo_pm); //echo "<br>";
	//echo($tamano_archivo_pm); //echo "<br>";
	
	$nombre_archivo_hc=$_FILES["historiaClinica"]["name"]; //Nombre del archivo
	$tipo_archivo_hc=$_FILES["historiaClinica"]["type"]; //Tipo de archivo
	$tamano_archivo_hc=$_FILES["historiaClinica"]["size"]; //Tamano de archivo
	$archivo_hc = $_FILES["historiaClinica"]["tmp_name"]; 
	$error_hc = "";
	if ($nombre_archivo_hc!="") {
		if ($tamano_archivo_hc <= $maxSize) {
			if ($tipo_archivo_hc==$tipoPermitidoE || $tipo_archivo_hc==$tipoPermitidoCM ) {
				$fp = fopen($archivo_hc,"rb");
				$contenido_hc = fread($fp,$tamano_archivo_hc);
				$contenido_hc = addslashes($contenido_hc);
				fclose($fp);
			} else {
				$todoOk = 1;
				$error_hc = "Tipo de Archivo no permitido. Solo se permite pdf";
			}
		} else {
			$todoOk = 1;
			$error_hc = "El tamaño del archivo excede el máximo permitido. Máximo permitido 512 KB.";
		}
	} else {
		$error_hc = "ns";
	}
	
	//echo($nombre_archivo_hc); //echo "<br>";
	//echo($tipo_archivo_hc); //echo "<br>";
	//echo($tamano_archivo_hc); //echo "<br>";
	
	$nombre_archivo_e=$_FILES["estudios"]["name"]; //Nombre del archivo
	$tipo_archivo_e=$_FILES["estudios"]["type"]; //Tipo de archivo
	$tamano_archivo_e=$_FILES["estudios"]["size"]; //Tamano de archivo
	$archivo_e = $_FILES["estudios"]["tmp_name"]; 
	$error_e = "";
	if ($nombre_archivo_e!="") {
		if ($tamano_archivo_e <= $maxSize) {
			if ($tipo_archivo_e==$tipoPermitidoE || $tipo_archivo_e==$tipoPermitidoCM ) {
				$fp = fopen($archivo_e,"rb");
				$contenido_e = fread($fp,$tamano_archivo_e);
				$contenido_e = addslashes($contenido_e);
				fclose($fp);
			} else {
				$todoOk = 1;
				$error_e = "Tipo de Archivo no permitido. Solo se permite pdf";
			}
		} else {
			$todoOk = 1;
			$error_e = "El tamaño del archivo excede el máximo permitido. Máximo permitido 512 KB.";
		}
	} else {
		$error_e = "ns";
	}
	
	//echo($nombre_archivo_e); //echo "<br>";
	//echo($tipo_archivo_e); //echo "<br>";
	//echo($tamano_archivo_e); //echo "<br>";
	
	if ($maxPresu > 0) {
		for ($i=1; $i <= $maxPresu; $i++) {
			$nombrePresu = "presu".$i;
			${nombre_archivo_p.$i}=$_FILES["$nombrePresu"]["name"];
			${tipo_archivo_p.$i}=$_FILES["$nombrePresu"]["type"]; 
			${tamano_archivo_p.$i}=$_FILES["$nombrePresu"]["size"]; 
			${archivo_p.$i} = $_FILES["$nombrePresu"]["tmp_name"]; 
			${error_p.$i} = "";
			if (${nombre_archivo_p.$i}!="") {
				if (${tamano_archivo_p.$i} <= $maxSize) {
					if (${tipo_archivo_p.$i}==$tipoPermitidoE || ${tipo_archivo_p.$i}==$tipoPermitidoCM) {
						$fp = fopen(${archivo_p.$i},"rb");
						${contenido_p.$i} = fread($fp,${tamano_archivo_p.$i});
						${contenido_p.$i} = addslashes(${contenido_p.$i});
						fclose($fp); 
						$controlCantPresu = $controlCantPresu + 1;
					} else {
						$todoOk = 1;
						${error_p.$i} = "Tipo de Archivo no permitido. Solo se permite pdf";
					}
				} else {
					$todoOk = 1;
					${error_p.$i} = "El tamaño del archivo excede el máximo permitido. Máximo permitido 512 KB.";
				}
			} else {
				${error_p.$i} = "nc";
			}
		}
	}
	
	if ($todoOk == 0 and $delcod != 0 and $delcod != NULL) {
		try {
			$dbname = "sistem22_intranet";
			$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();
			
			$sqlCarga = "INSERT INTO autorizacionpedida VALUE (DEFAULT,'$delcod','$fechaSolicitud','$cuit','$nroafil','$codPar','$nombre','$practica','$material','$medicamento','$tipoMaterial','$contenido_pm', '$contenido_hc', '$contenido_e', '$contenido_p1', '$contenido_p2', '$contenido_p3', '$contenido_p4', '$contenido_p5')";
			
			$dbh->exec($sqlCarga);
			
			$ultimo_id = $dbh->lastInsertId();
			$sqlSoli = "INSERT INTO autorizacionprocesada (nrosolicitud,delcod,fechasolicitud,nrcuil,nrafil,codpar,nombre,tiposolicitud, tipomaterial) VALUES  ('$ultimo_id','$delcod','$fechaSolicitud','$cuit','$nroafil','$codPar','$nombre','$select', '$tipoMaterial')";
			$dbh->exec($sqlSoli);
			
			$dbh->commit();
			
			$sqlNombre = "select * from usuarios where delcod = $delcod";
			$row = $dbh->query($sqlNombre)->fetch();
			$nombre = $row['nombre'];
			$emailRepli = "autorizaciones".$delcod."@ospim.com.ar";
			
			$mails = "autorizaciones@ospim.com.ar, verificaciones@ospim.com.ar";
			$asunto = "ATENCION: Solicitud de Autorizacion Nro ".$ultimo_id." de la Delegacion ".$delcod."-".$nombre;
			$cuerpo = "Ha sido ingresada al Sistema de Autorizaciones la solicitud nro ".$ultimo_id." de fecha ".$fechaSolicitud." perteneciente a la Delegacion ".$delcod."-".$nombre;
			$cabecera = "MIME-Version: 1.0" . "\r\n";
			$cabecera .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$cabecera .= "From: ".$nombre." <$emailRepli>" . "\r\n";
			
			mail($mails,$asunto,$cuerpo,$cabecera); 
			
		} catch (PDOException $e) {
			echo $e->getMessage();
			$dbh->rollback();
		}
	} 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Resultado de Carga de Solicitud</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="../include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="../css/style.css">
	
	<script type="text/javascript" src="../include/js/jquery-2.2.0.min.js" ></script>
	<script type="text/javascript" src="../include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../include/js/jquery.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="../include/js/jquery.blockUI.js" ></script>
	<script type="text/javascript" src="lib/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="lib/funcionControl.js" ></script>
</head>
<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="../menu.php"> <img style="max-width:38px; margin-top: -9px;" src="../images/logo.png"></a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" >(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="../empresas.php">Empresas</a></li>
					<li><a href="../beneficiarios.php">Beneficiarios</a></li>
					<?php if ($_SESSION['tienePrevencion']) {?><li><a href="#">Prev. Salud</a></li><?php } ?>
					<?php if ($_SESSION['tieneAutorizacion']) {?><li><a href="../autorizaciones/listadoAuto.php">Autorizaciones</a></li><?php } ?>
					<li><a href="../documentos.php">Inst. y Forms.</a></li>
					<li><a href="../consultas.php">Consultas</a></li>
				</ul>
			</nav>
				
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-ok-sign"></i><br>Autorizaciones</h2>
			<h3>Resultado Carga Solicitud</h3>

			<div align="center">
			    <table>
			      <tr>
			        <td><img src="img/ok.png" width="20" height="20" /></td>
			        <td>Correcto </td>
			        <td><img src="img/nook.png" width="20" height="20" /></td>
			        <td>Error</td>
			        <td><img src="img/noreq.png" width="20" height="20" /></td>
			        <td>No Requerido </td>
			      </tr>
			    </table>
			    
			    <table>
			      <tr>
			        <td width="166"><div align="center"><strong>ARCHIVOS</strong></div></td>
			        <td width="75"><div align="center"><strong>ESTADO</strong></div></td>
			        <td width="317"><div align="center"><strong>OBSERVACIONES</strong></div></td>
			      </tr>
			      <tr>
			        <td><div align="right">Archivo Pedido Medico </div></td>
			        <td><div align="center">
			          <?php if($error_pm == ""){ 
								print("<img src='img/ok.png' width='20' height='20' />") ;
							  } else {
							  	print("<img src='img/nook.png' width='20' height='20' />");
							  } 
					?>
			        </div></td>
			        <td><?php echo $error_pm ?></td>
			      </tr>
			      <tr>
			        <td><div align="right">Archivo Historia Clinica </div></td>
			        <td><div align="center">
			          <?php 
					  		if($error_hc == "ns"){ 
								print("<img src='img/noreq.png' width='20' height='20' />") ;
							} else { 
								if ($error_hc == ""){
							  		print("<img src='img/ok.png' width='20' height='20' />");
								} else {
									print("<img src='img/nook.png' width='20' height='20' />");
								}		 
							}
					?>
			        </div></td>
			        <td><?php 
						if ($error_hc != "ns") { 
							echo $error_hc;
						}
						?></td>
			      </tr>
			      <tr>
			        <td><div align="right">Archivo Estudios </div></td>
			        <td><div align="center">
						 <?php 
						 	if($error_e == "ns"){ 
								print("<img src='img/noreq.png' width='20' height='20' />") ;
							} else { 
								if ($error_e == ""){
							  		print("<img src='img/ok.png' width='20' height='20' />");
								} else {
									print("<img src='img/nook.png' width='20' height='20' />");
								}		 
							}
						?>
					</div></td>
			        <td><?php if ($error_e != "ns") { 
								echo $error_e;
						} ?></td>
			      </tr>
			      <tr>
				  <?php if ($maxPresu >=1) { ?>
						<td><div align="right"><?php print("Presupuesto n° 1") ?></div></td>
						<td><div align="center">
						 <?php if($error_p1 == ""){ 
								print("<img src='img/ok.png' width='20' height='20' />") ;
							    } else { 
							  		if ($error_p1 == "nc") {
							  			print("<img src='img/noreq.png' width='20' height='20' />") ;
							  		} else  {
							  			print("<img src='img/nook.png' width='20' height='20' />");
							  		}
								} 
						?>
							</div></td>
						<td><?php if ($error_p1 != "nc") echo $error_p1 ?></td>
				<?php } ?>
			      </tr>
			      <tr>
			        <?php if ($maxPresu >=2) { ?>
						<td><div align="right"><?php print("Presupuesto n° 2") ?></div></td>
						<td><div align="center">
						 <?php if($error_p2 == ""){ 
								print("<img src='img/ok.png' width='20' height='20' />") ;
							    } else { 
							  		if ($error_p2 == "nc") {
							  			print("<img src='img/noreq.png' width='20' height='20' />") ;
							  		} else  {
							  			print("<img src='img/nook.png' width='20' height='20' />");
							  		}
								} 
						?>
							</div></td>
						<td><?php if ($error_p2 != "nc") echo $error_p2 ?></td>
				<?php } ?>
			      </tr>
			      <tr>
			         <?php if ($maxPresu >=3) { ?>
						<td><div align="right"><?php print("Presupuesto n° 3") ?></div></td>
						<td><div align="center">
						 <?php if($error_p3 == ""){ 
								print("<img src='img/ok.png' width='20' height='20' />") ;
							    } else { 
							  		if ($error_p3 == "nc") {
							  			print("<img src='img/noreq.png' width='20' height='20' />") ;
							  		} else  {
							  			print("<img src='img/nook.png' width='20' height='20' />");
							  		}
								} 
						?>
							</div></td>
						<td><?php if ($error_p3 != "nc") echo $error_p3  ?></td>
				<?php } ?>
			      </tr>
			      <tr>
			         <?php if ($maxPresu >=4) { ?>
						<td><div align="right"><?php print("Presupuesto n° 4") ?></div></td>
						<td><div align="center">
						 <?php if($error_p4 == ""){ 
								print("<img src='img/ok.png' width='20' height='20' />") ;
							    } else { 
							  		if ($error_p4 == "nc") {
							  			print("<img src='img/noreq.png' width='20' height='20' />") ;
							  		} else  {
							  			print("<img src='img/nook.png' width='20' height='20' />");
							  		}
								} 
						?>
							</div></td>
						<td><?php if ($error_p4 != "nc") echo $error_p4 ?></td>
				<?php } ?>
			      </tr>
			      <tr>
			        <?php if ($maxPresu >=5) { ?>
						<td><div align="right"><?php print("Presupuesto n° 5") ?></div></td>
						<td><div align="center">
						 <?php if($error_p5 == ""){ 
								print("<img src='img/ok.png' width='20' height='20' />") ;
							    } else { 
							  		if ($error_p5 == "nc") {
							  			print("<img src='img/noreq.png' width='20' height='20' />") ;
							  		} else  {
							  			print("<img src='img/nook.png' width='20' height='20' />");
							  		}
								} 
						?>
							</div></td>
						<td><?php if ($error_p5 != "nc") echo $error_p5 ?></td>
				<?php } ?>
			      </tr>
			    </table>
			    <p>
				<?php
					if ($todoOk != 0) { ?>
						<input type="button" name="volver" value="Volver a carga de Solicitud" onclick="location.href='nuevaSolicitud.php'"/>
			<?php	} ?>
				</p>
  			</div>
  		</div>
  	</div>
</body>
</html>