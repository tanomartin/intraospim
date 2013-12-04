<?php session_save_path("../sesiones");
session_start();
if($_SESSION['delcod'] == NULL) 
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
	

	// maximo 512KB
	$maxSize = 524288;
	$tipoPermitidoE = "application/pdf";
	$tipoPermitidoCM = "application/pdf";
	$fechaSolicitud = date("Y/m/d"); 
	
	$delcod = $_SESSION['delcod'];
if($delcod == 0 || $delcod == NULL) 
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
	
	$datos = array_values($_POST);
	//echo $datos[0]; //echo "<br>";
	$cuit =  $datos[0];
	//echo $datos[1]; //echo "<br>";
	$nroafil = $datos[1];
	//echo $datos[2]; //echo "<br>";
	$detalleCodigo = $datos[2];
	//echo $datos[3]; //echo "<br>";
	$codPar = $datos[3];
	//echo $datos[4]; //echo "<br>";
	$nombre = strtoupper($datos[4]);
	
	//echo $datos[5]; //echo "<br>"; //echo "<br>";
	$select = $datos[5];
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
	
	//echo $practica; //echo "<br>";
	//echo $material; //echo "<br>";
	//echo $medicamento; //echo "<br>";//echo "<br>";

	//echo $datos[6]; //echo "<br>";
	$tipoMaterial = $datos[6];
	//echo "MINIMO: ".$datos[7]; //echo "<br>";
	$minPersu = $datos[7];
	//echo "MAXIMO: ".$datos[8]; //echo "<br>";
	$maxPresu = $datos[8];
	//echo $datos[9]; //echo "<br>";
	$notaPresu =  $datos[9];
	
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
	
	if ($todoOk == 0) {
		try {
			$hostname = "ospim.com.ar";
			$dbname = "uv0471_intranet";
			$dbh = new PDO("mysql:host=$hostname;dbname=$dbname","uv0471","bsdf5762");
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();
			
			$sqlCarga = "INSERT INTO autorizacionpedida (delcod,fechasolicitud,nrcuil,nrafil,codpar,nombre,practica,material,medicamento,tipomaterial,pedidomedico,resumenhc, avalsolicitud, presupuesto1, presupuesto2, presupuesto3, presupuesto4, presupuesto5) VALUES ('$delcod','$fechaSolicitud','$cuit','$nroafil','$codPar','$nombre','$practica','$material','$medicamento','$tipoMaterial','$contenido_pm', '$contenido_hc', '$contenido_e', '$contenido_p1', '$contenido_p2', '$contenido_p3', '$contenido_p4', '$contenido_p5')";
			
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nueva Solicitud</title>

<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
body {
	background-color: #CCCCCC;
}
-->
</style>
</head>
<body>
  <table width="1054" border="0">
    <tr>
      <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
      <td colspan="2" scope="row"><div align="left">
        <p class="Estilo3">Resultado Solicitud Generada  </p>
      </div>
      </td>
      <td width="509">&nbsp;</td>
    </tr>
  </table>
  <div align="center">
    <table width="374" border="0">
      <tr>
        <td width="27"><img src="img/ok.png" width="20" height="20" /></td>
        <td width="79">Correcto </td>
        <td width="20"><img src="img/nook.png" width="20" height="20" /></td>
        <td width="58">Error</td>
        <td width="24"><img src="img/noreq.png" width="20" height="20" /></td>
        <td width="140">No Requerido </td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="572" border="0">
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
      <label>
    
      </label>
	<?php
		if ($todoOk != 0) { ?>
			<input type="button" name="volver" value="Volver a carga de Solicitud" onClick="location.href='nuevaSolicitud.php'"/>
<?php	} else { ?>
			<input type="button" name="volver" value="Volver a listado de Solicitudes" onClick="location.href='listadoAuto.php'"/>
<?php	} ?>
	</p>
  </div>
</body>
</html>