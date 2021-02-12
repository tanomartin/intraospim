<?php 
include ("verificaSesionOrdenes.php");
include ("lib/funciones.php");
include ("lib/funcionesCarga.php");
$fechaSolicitud = date("d/m/Y"); 
$cartel = 0;
$cartelTitu = -1;
$hiddenInfoRec = 'hidden="hidden"';
$delcod = $_SESSION['delcod'];

$nombre = "";
$nroafil = "";
$tipo = "";
$codigo = "";
$cuil = "";
$fecnac = "";
$edad = "";
$sexo = "";
$nrodoc = "";
$cuilTitu = "";
$nombreTitu = "";
$nroafilTitu = "";

$disabledSubmit = 'disabled = "disabled"';

if (isset($_GET['cuil'])) {
	$cuil = $_GET['cuil'];
	if ($cuil != 'sc' || isset($_GET['cuilTitu'])) {
       	$queryTitu = "SELECT t.*, 
        					 DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, 
        					 DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac, ssexxo, nrodoc
        				  FROM titular t 
        				  WHERE nrcuil = '$cuil' AND delcod = $delcod";
        $queryFami = "SELECT f.*, 
        					 DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, 
        					 DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac, ssexxo, nrodoc
        			  FROM familia f 
        			  WHERE nrcuil = '$cuil' AND delcod = $delcod";
        if ($cuil != NULL) { 
        	$result = mysql_query($queryTitu,$db); 
        	$cant = mysql_num_rows($result);
        	if ($cant != 0) {
        		$row = mysql_fetch_array($result);
        		$nombre = $row['nombre'];
        		$nroafil = $row['nrafil'];
       			$fecnac = $row['fecnac'];
       			$edad = $row['edad'];
       			$sexo = $row['ssexxo'];
       			$nrodoc = $row['nrodoc'];
       			$tipo = "Titular";
       			$codigo = 0;
       			$disabledSubmit = "";
       		} else {
       			$result = mysql_query($queryFami,$db); 
       			$cant = mysql_num_rows($result);
       			if ($cant != 0) {
       				$row = mysql_fetch_array($result);
       				$nombre = $row['nombre'];
       				$nroafil = $row['nrafil'];
       				$nroord = $row['nroord'];
       				$fecnac = $row['fecnac'];
       				$edad = $row['edad'];
       				$sexo = $row['ssexxo'];
       				$tipo = "Familiar";
       				$codigo = $row['codpar'];
       				$nrodoc = $row['nrodoc'];
       				$disabledSubmit = "";
       			} else {
       			    $queryBajaTit = "SELECT t.*, 
        					           DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, 
        					           DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac, ssexxo, nrodoc 
                                     FROM bajatit t WHERE nrcuil = '$cuil' AND delcod = $delcod";
       			    $queryBajaFam = "SELECT f.*, 
        					           DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, 
        					           DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac, ssexxo, nrodoc 
                                    FROM bajafam f WHERE nrcuil = '$cuil' AND delcod = $delcod";
       			    $result = mysql_query($queryBajaTit,$db); 
       			    $cant = mysql_num_rows($result);
       			    if ($cant != 0) {
       			        $row = mysql_fetch_array($result);
       			        $nombre = $row['nombre'];
       			        $nroafil = $row['nrafil'];
       			        $fecnac = $row['fecnac'];
       			        $edad = $row['edad'];
       			        $sexo = $row['ssexxo'];
       			        $nrodoc = $row['nrodoc'];
       			        $tipo = "Titular";
       			        $codigo = 0;
       			        $cartel = 2;
       			    } else {
       			        $result = mysql_query($queryBajaFam,$db); 
       			        $cant = mysql_num_rows($result);
       			        $cant = mysql_num_rows($result);
       			        if ($cant != 0) {
       			            $row = mysql_fetch_array($result);
       			            $nombre = $row['nombre'];
       			            $nroafil = $row['nrafil'];
       			            $nroord = $row['nroord'];
       			            $fecnac = $row['fecnac'];
       			            $edad = $row['edad'];
       			            $sexo = $row['ssexxo'];
       			            $tipo = "Familiar";
       			            $codigo = $row['codpar'];
       			            $nrodoc = $row['nrodoc'];
       			            $cartel = 2;
       			        } else { 
       			            $cartel = 1;
       			            $codigo = -1;
       			            if (isset($_GET['cuilTitu'])) {
       			                $cuilTitu = $_GET['cuilTitu'];
       			                $queryTitu = "SELECT t.nombre, t.nrafil
       									FROM titular t
       									WHERE nrcuil = $cuilTitu AND delcod = $delcod";
       			                $resultTitu = mysql_query($queryTitu,$db);
       			                $cantTitu = mysql_num_rows($resultTitu);
       			                if ($cantTitu != 0) {
       			                    $rowTitu = mysql_fetch_array($resultTitu);
       			                    $nombreTitu = $rowTitu['nombre'];
       			                    $nroafilTitu = $rowTitu['nrafil'];
       			                    $cartelTitu = 0;
       			                    $disabledSubmit = "";
       			                    $hiddenInfoRec = "";
       			                } else {
       			                    $cartelTitu = 1;
       			                }
       			            } 	
       			        }
       			    }		
       			}
       		}
        } 
	} else {
	    $cartel = 1;
	}
}

$disca = "";
if ($nroafil != "") {
	if ($tipo == "Titular") {
		$sqlDisca = "SELECT * FROM discapacitados WHERE nrafil = $nroafil and nroord = 0";
	} else {
		$sqlDisca = "SELECT * FROM discapacitados WHERE nrafil = $nroafil and nroord = $nroord";
	}
	$resDisca = mysql_query($sqlDisca,$db);
	$canDisca = mysql_num_rows($resDisca);
	if ($canDisca == 0) {
		$disca = 'NO';
	} else {
		$disca = 'SI';
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nueva Solicitud</title>
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
	<script>

	jQuery(function($){
		$("#textCuil").mask("99999999999");
		$("#textCuilTitu").mask("99999999999");
		$("#fecNacRecNac").mask("99/99/9999")
	});

	function Verificar() {
		var tecla=window.event.keyCode;
		if (tecla==116) {
			event.returnValue=false;
		}
	}

	function habilitarFormulario(valor) {
		limpiarFormulario();
		if (valor == -1) {
			window.location="listado.nueva.php";
		}
		if (valor == 1) {
			document.getElementById('textCuil').style.background = ""
			document.getElementById('textCuil').readOnly = false;
		}
		if (valor == 0) {
			document.getElementById('textCuil').style.background = "#f5f5f5"
			document.getElementById('textCuil').readOnly = true;
			document.getElementById('verCuil').disabled = true;
			window.location="listado.nueva.php?cuil=sc#infoRecNac";
		}
	}

	function validarCUIL(cuil) {
		if (cuil != '') {
    		if (verificaCuil(cuil) != false) {
    			document.getElementById('verCuil').disabled = false;
    		} 
		}
	}
	
	function limpiarFormulario() {
		document.getElementById('textCuil').value = "";
		document.getElementById('textNroAfil').value = "";
		document.getElementById('textCodPar').value = "";
		document.getElementById('textNroDoc').value = "";
		document.getElementById('edad').value = "";
		document.getElementById('sexo').value = "";
		document.getElementById('textNombre').value = "";
		
		document.getElementById('fecnac').innerHTML = "";
		document.getElementById('disca').innerHTML = "";

		if (document.getElementById('infoRecNac')) {
			document.getElementById('infoRecNac').style.display = "none";
		}
		document.getElementById('generar').disabled = true;
		
	}

	function habilitarCuilTitu(valor) {
		document.getElementById('textCuilTitu').value = "";
		document.getElementById('textCuilTitu').disabled = true;
		document.getElementById('textNroAfilTitu').value = "";
		document.getElementById('textNombreTitu').value = "";
		document.getElementById('verCuilTitu').disabled = true;
		if (valor == 1) {
			document.getElementById('textCuilTitu').disabled = false;
			document.getElementById('verCuilTitu').disabled = false;
		}
	}

	function calcularEdad(fecha) {
		document.getElementById('edadRecNac').value = "";
		if (fecha != "") {
			if (FechaValida(fecha)) {
				//DATOS//
    			var hoy = new Date();
    			var fechaArray = fecha.split("/");
    			var fechaCumple = fechaArray[2]+"-"+fechaArray[1]+"-"+fechaArray[0]+" GMT-0300";
    		    var cumpleanos = new Date(fechaCumple);

				//CALCULOS//
    		    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    		    var m = hoy.getMonth() - cumpleanos.getMonth();
    		    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
    		        edad--;
    		    }

    		    //CONTROL//
    		    if (edad < 0) {
    				alert("La fecha de nacimiento no puede ser futura");
    				document.getElementById('fecNacRecNac').value = '';
    		    } else { 
    				document.getElementById('edadRecNac').value = edad;
    		    }
			} else {
				alert("La fecha de nacimiento no es valida");
				document.getElementById('fecNacRecNac').value = '';
			}
		}
	}

	

	function validar(formulario) {	
		if (formulario.tieneCuil.value == 1) {
    		if (formulario.textCuil.value == "") {
    			alert("Debe ingresar numero de CUIL");
    			return false;
    		}
    		if (verificaCuil(formulario.textCuil.value) == false) {
    			return false;
    		}
		}
		if (formulario.textNombre.value == "") {
			formulario.textNombre.focus();
			alert("Debe ingresar el nombre del Beneficiario");
			return false;
		}

		if (formulario.textNroAfil.value == "") {
			if (formulario.sexoRecNac.value == 0) {
				alert("Debe ingresar el sexo del Recien Nacido");
				return false;
			}
			if (formulario.fecNacRecNac.value == "") {
				alert("Debe ingresar la fecha de nacimiento");
				return false;
			} else {
				if (!FechaValida(formulario.fecNacRecNac.value)) {
					alert("Debe ingresar un fecha de nacimiento valida");
					return false;
				}
			}
			if (formulario.edadRecNac.value > 1) {
				alert("La edad del recien nacido no puede ser superior a 1 año");
				return false;
			}
		}
		
		$.blockUI({ message: "<h1>Generando Orden de Consulta. Aguarde por favor...</h1>" });
		formulario.generar.disabled = true;
		return true;
	}
	
	</script>

</head>
<body onKeyDown="javascript:Verificar()">
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			
			<?php include_once ("../navbar.php"); ?>

			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-modal-window"></i><br>Órdenes de Consulta</h2>
			<h3>Nueva Órden de Consulta</h3>	
			<div class="col-md-10 col-md-offset-1">
				<form id="nuevaSolicitud" name="nuevaSolicitud" method="post" action="listado.nueva.guardar.php" onsubmit="return validar(this)">
					<div class="col-md-10 col-md-offset-1" style="margin-bottom: 15px">
						<div style="float: left;">(*) DATOS OBLIGATORIOS</div>
						<div style="float: right;"><b>Fecha: </b><?php echo $fechaSolicitud ;?></div>
					</div>
					<div class="col-md-10 col-md-offset-1" style="border: 1px solid">	
						<h4 style="color: blue"><b>Información del Beneficiario</b></h4>
						<table class="table" style="width: 85%">
							<tr>
								<td style="text-align: right;"><b>Tiene C.U.I.L.</b></td>
								<td>
								<?php $selectedNO = '';
								      $selectedSI = '';
								      if ($cuil == 'sc') { $selectedNO = 'selected="selected"'; } 
								      if ($cuil != '') { $selectedSI = 'selected="selected"'; } ?>
									<select id="tieneCuil" onchange="habilitarFormulario(this.value)">
										<option value="-1">Selecciones Valor</option>
										<option value="1" <?php echo $selectedSI ?>>SI</option>
										<option value="0" <?php echo $selectedNO ?>>NO</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="text-align: right;"><b>C.U.I.L.:</b></td>
								<td>
									<input name="textCuil" type="text" id="textCuil" value="<?php echo $cuil ?>" readonly="readonly" maxlength="11" size="11" style="background:#f5f5f5" onblur="validarCUIL(this.value)" />
							    	<input type="button" name="verCuil" id="verCuil" value="Verificar CUIL" onclick="location.href='listado.nueva.php?cuil='+document.forms.nuevaSolicitud.textCuil.value" disabled="disabled"/>
							    </td>
							</tr>
							<tr>
								<td style="text-align: right;"><b>Nº de Afiliado:</b></td> 
							    <td><input name="textNroAfil" type="text" id="textNroAfil" readonly="readonly" value="<?php echo $nroafil ?>" style="background:#f5f5f5"/></td>
							</tr>
							<tr>
							    <td style="text-align: right;"><b>Tipo de Afiliado: </b></td> 
							    <td>
							    	<input name="textCodPar" type="text" id="textCodPar" readonly="readonly" style="background:#f5f5f5;" value="<?php echo $tipo; ?>"/>
							    	<input name="codPar" type="text" id="codPar" size="4" readonly="readonly" style="display:none" value="<?php echo $codigo ?>"/>
							    </td>
							</tr>
							<tr>
								<td style="text-align: right;"><b>Nº de Doc.:</b></td> 
							    <td><input name="textNroDoc" type="text" id="textNroDoc" readonly="readonly" value="<?php echo $nrodoc ?>" style="background:#f5f5f5"/></td>
							</tr>
							<tr>
								<td style="text-align: right;"><b>Fec. de Nac.:</b> </td>
								<td><span id="fecnac"><?php echo $fecnac ?></span></td>
							</tr>
							<tr>
								<td style="text-align: right;"><b>Edad: </b></td>
								<td><input name="edad" type="text" id="edad" readonly="readonly" value="<?php echo $edad ?>" style="background:#f5f5f5" size="3"/></td>
							</tr>
							<tr>
								<td style="text-align: right;"><b>Sexo: </b></td>
								<td><input name="sexo" type="text" id="sexo" readonly="readonly" value="<?php echo $sexo ?>" style="background:#f5f5f5" size="3"/></td>
							</tr>							<tr>
								<td style="text-align: right;"><b>Discapacitado: </b></td>
								<td><span id="disca"><?php echo $disca ?></span></td>
							</tr>
							<?php if (($cartel == 0) || ($cartel == 2)) {  ?>
									<tr>
						     			<td style="text-align: right;"><b>* Apellido y Nombre: </b></td>
						     			<td><input name="textNombre" type="text" id="textNombre" value="<?php echo $nombre ?>" size="30" readonly="readonly" style="background:#f5f5f5"/></td>
						   			</tr>
							<?php } ?>
						 </table>
				   <?php $tableRecNac = 'display: none';
						 $recNac = '';
						 $recNacDisabled = '';
						 if ($cartel == 2) { ?>
						     <h4 style='color:red'>Beneficiario con C.U.I.L. <?php echo $cuil ?> se encuentra inactivo<br>No se podrá generar la orden de consulta</h4>
				   <?php }
						 if ($cartel == 1) { 
						 	$tableRecNac = '';
						 	if (isset($_GET['cuilTitu'])) {
						 	  	$recNac = 'selected="selected"';
						 	  	$recNacDisabled = 'disabled';
						 	} ?>
							<table class="table" style="width: 85%; <?php echo $tableRecNac ?>; margin-top: -15px" id="infoRecNac">		
								<tr>
									<td colspan="2" style="text-align: center">
									<?php if ($cuil != 'sc') { ?>
												<b style='color:green'>Beneficiario con C.U.I.L. <?php echo $cuil ?> no empadronado<br>
															  		   Completar la siguiente Información</b>
									<?php } else { ?>	
												<b style='color:green'>Beneficiario sin C.U.I.L. no empadronado<br>
															  		   Completar la siguiente Información</b>
									<?php } ?>	
									</td>
								</tr>		
								<tr>
									<td style="text-align: right;"><b>Es Recién Nacido: </b></td>
									<td>
										<select id="reciennacido" onchange="habilitarCuilTitu(this.value)" <?php echo $recNacDisabled ?>>
											<option value="-1">Selecciones Valor</option>
											<option value="1" <?php echo $recNac ?>>SI</option>
											<option value="0">NO</option>
										</select>
									</td>
								</tr>
								<tr>	
									<td colspan="2" style="text-align: center">
										<b style="color: blue">Información del Titular</b>
									</td>
								</tr>
								<tr>
									<td style="text-align: right;"><b>* C.U.I.L.:</b> </td>
									<td>
										<input name="textCuilTitu" disabled="disabled" value="<?php echo $cuilTitu ?>" type="text" id="textCuilTitu" size="11" />
										<input name="nrcuilTitu" value="<?php echo $cuilTitu ?>" type="text" id="nrcuilTitu" style="display: none" />
										<?php if ($cuil != 'sc') { ?>
												<input type="button" disabled="disabled" name="verCuil" id="verCuilTitu" value="Verificar CUIL" onclick="location.href='listado.nueva.php?cuil='+document.forms.nuevaSolicitud.textCuil.value+'&cuilTitu='+document.forms.nuevaSolicitud.textCuilTitu.value+'#infoRecNac'"/>
										<?php } else { ?>
												<input type="button" disabled="disabled" name="verCuil" id="verCuilTitu" value="Verificar CUIL" onclick="location.href='listado.nueva.php?cuil=sc&cuilTitu='+document.forms.nuevaSolicitud.textCuilTitu.value+'#infoRecNac'"/>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td style="text-align: right;"><b>Nº de Afiliado:</b></td> 
									<td><input name="textNroAfilTitu" type="text" id="textNroAfilTitu" readonly="readonly" value="<?php echo $nroafilTitu ?>" style="background:#f5f5f5"/></td>
								</tr>
								<tr>
									<td style="text-align: right;"><b>Apellido y Nombre: </b></td>
									<td><input name="textNombreTitu" type="text" id="textNombreTitu" readonly="readonly" value="<?php echo $nombreTitu ?>"  style="background:#f5f5f5" size="30"/></td>
								</tr>
						<?php if ($cartelTitu == 1) { ?>
								<tr>
									<td colspan="2" style="text-align: center">
										<b style='color:red'> Titular <?php echo $cuilTitu ?> no se encontro empadronado o activo.<br>No se podrá generar la Órden de consulta</b>
									</td>
								</tr>	
						<?php } ?>
								<tr <?php echo $hiddenInfoRec?>>	
									<td colspan="2" style="text-align: center">
										<b style="color: blue">Información del Recién Nacido</b>
									</td>
								</tr>
								<tr <?php echo $hiddenInfoRec ?>>
									<td style="text-align: right;"><b>* Apellido y Nombre: </b></td>
									<td><input name="textNombre" type="text" id="textNombre" size="30"/></td>
								</tr>
								<tr <?php echo $hiddenInfoRec ?>>
									<td style="text-align: right;"><b>* Sexo: </b></td>
									<td>
										 <select id="sexoRecNac" name="sexoRecNac">
										    <option value="0">Selecciones Sexo</option>
										    <option value="M">Masculino</option>
										    <option value="F">Femenino</option>
										 </select>
									</td>
								</tr>
								<tr <?php echo $hiddenInfoRec ?>>
									 <td style="text-align: right;"><b>* Fecha Nacimiento: </b></td>
									 <td><input type="text" name="fecNacRecNac" id="fecNacRecNac" onchange="calcularEdad(this.value)" size="8"></td>
								</tr>
								<tr <?php echo $hiddenInfoRec ?>>
									 <td style="text-align: right;"><b>Edad: </b></td>
									 <td><input type="text" name="edadRecNac" id="edadRecNac" readonly="readonly" style="background:#f5f5f5" size="3"></td>
								</tr> 
							</table>
					<?php } ?>
					    <br>
					</div>  
					<input style="margin-top: 10px" id="generar" <?php echo $disabledSubmit ?> class="btn btn-primary" name="generar" type="submit" id="generar" value="Generar Órden de Consulta"  />
				</form>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>