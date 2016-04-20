<?php 
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
include ("lib/funcionesCarga.php");
$fechaSolicitud = date("d/m/Y"); 
$cartel = 0;
$delcod = $_SESSION['delcod'];

$nombre = "";
$nroafil = "";
$tipo = "";
$codigo = "";
$cuil = "";
if (isset($_GET['cuil'])) {
	$cuil = $_GET['cuil'];
	if ($delcod >= "4000") {
		$queryTitu = "select * from titular where nrcuil = $cuil";
		$queryFami = "select * from familia where nrcuil = $cuil";
	} else {
		$queryTitu = "select * from titular where nrcuil = $cuil and delcod = $delcod";
		$queryFami = "select * from familia where nrcuil = $cuil and delcod = $delcod";
	}
	if ($cuil != NULL) { 
		$result = mysql_query($queryTitu,$db); 
		$cant = mysql_num_rows($result);
		if ($cant != 0) {
			$row = mysql_fetch_array($result);
			$nombre = $row['nombre'];
			$nroafil = $row['nrafil'];
			$tipo = "Titular";
			$codigo = 0;
		} else {
			$result = mysql_query($queryFami,$db); 
			$cant = mysql_num_rows($result);
			if ($cant != 0) {
				$row = mysql_fetch_array($result);
				$nombre = $row['nombre'];
				$nroafil = $row['nrafil'];
				$tipo = "Familiar";
				$codigo = $row['codpar'];
			} else { 
				$cartel = 1;
				$codigo = -1;
			}
		}
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
	});
	
	function controlCantidad(tipo) {
		if (tipo == 9) {
			document.getElementById("obligatorioPedido").style.visibility = "visible";
			document.getElementById("obligatorioHistoria").style.visibility = "visible";
		} else {
			document.getElementById("obligatorioPedido").style.visibility = "hidden";
			document.getElementById("obligatorioHistoria").style.visibility = "hidden";
		}
		ocultarPresu();
		var nota = "";
		var nombre = "";
		var i;
		if (tipo == 0) {
			document.forms.nuevaSolicitud.notaCantidad.value = nota;
		} else { <?php 
		      $query="select * from clasificamaterial order by codigo ASC";
			  $result = mysql_query($query,$db); 
			  while ($rowtipos=mysql_fetch_array($result)) { ?>
			  		if (tipo == <?php echo $rowtipos['codigo'] ?>) {
						if (<?php echo $rowtipos['presumaximo'] ?> == 0) {
							nota = "No requiere presupuesto";
						} else {
							for (i=1; i<=<?php echo $rowtipos['presumaximo'] ?>; i++) {						
								nombre = "presu"+i;
								document.getElementById(nombre).style.display = "block";
							}
							nota = "Debe cargar entre "+<?php echo $rowtipos['presuminimo'] ?> +" y "+<?php echo $rowtipos['presumaximo'] ?>+ " presupuestos" ;
						}
						document.forms.nuevaSolicitud.minimo.value = <?php echo $rowtipos['presuminimo'] ?>;
						document.forms.nuevaSolicitud.maximo.value = <?php echo $rowtipos['presumaximo'] ?>;
						document.forms.nuevaSolicitud.notaCantidad.value = nota;
					} 
		<?php } ?>
		}	
	}
	 
	function validar(formulario) {	
		if (formulario.textCuil.value == "") {
			alert("Debe ingresar numero de CUIL");
			return false;
		}
		if (verificaCuil(formulario.textCuil.value) == false) {
			return false;
		}
		if (formulario.textNombre.value == "") {
			alert("Debe ingresar el nombre del Beneficiario");
			return false;
		}
		if (formulario.pedidoMedico.value == "") {
			alert("Debe adjuntar el Pedido Medico");
			return false;
		} 
		if (formulario.tipoMaterial.checked == true) {
			if(document.getElementById("tipoSolicitud").value == 0) {
				alert("Debe seleccionar un tipo de Material");
				return false;
			} else {
				if(document.getElementById("tipoSolicitud").value == 9) {
					if (formulario.historiaClinica.value == "") {
						alert("Debe adjuntar la Historia Clinica para Oxigenoterapia");
						return false;
					}
					if (formulario.estudios.value == "") {
						alert("Debe adjuntar Estudios para Oxigenoterapia");
						return false;
					}
				}
				if (formulario.minimo.value != 0) {
					if (controlPresu(formulario.minimo.value) == false) {
						alert("Debe adjuntar los presupuestos pedidos");
						return false;
					}
				}
			}
		}
		$.blockUI({ message: "<h1>Generando Solicitud. Aguarde por favor...</h1>" });
		return true;
	}
	
	</script>

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
					<a style="margin: 11px 10px 0 0"  href="../logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="../empresas.php">Empresas</a></li>
					<li><a href="../beneficiarios.php">Beneficiarios</a></li>
					<?php if ($_SESSION['tienePrevencion']) {?><li><a href="../prevencion/menuPrevencion.php">Prev. Salud</a></li><?php } ?>
					<?php if ($_SESSION['tieneAutorizacion']) {?><li><a href="../autorizaciones/listado.php">Autorizaciones</a></li><?php } ?>
					<li><a href="../documentos.php">Inst. y Forms.</a></li>
					<li><a href="../consultas.php">Consultas</a></li>
				</ul>
			</nav>

			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-ok-sign"></i><br>Autorizaciones</h2>
			<h3>Nueva Solicitud</h3>	
			<div class="col-md-10 col-md-offset-1">
				<form id="nuevaSolicitud" name="nuevaSolicitud" method="post" action="listado.nueva.guardar.php" onsubmit="return validar(this)" enctype="multipart/form-data">
					<div class="col-md-10 col-md-offset-1" style="margin-bottom: 15px">
						<div style="float: left;">(*) DATOS OBLIGATORIOS</div>
						<div style="float: right;"><b>Fecha: </b><?php echo $fechaSolicitud ;?></div>
					</div>
					<div class="col-md-10 col-md-offset-1" style="border: 1px solid">
						<h4 style="color: blue">Informaci&oacute;n del Beneficiario</h4>
						<p><b>* C.U.I.L.:</b> 
							<input name="textCuil" type="text" id="textCuil" value="<?php echo $cuil ?>" size="11" onblur="limpiarFormulario(this.value)" />
						    <input type="button" name="verCuil" id="verCuil" value="Verificar CUIL" onclick="location.href='listado.nueva.php?cuil='+document.forms.nuevaSolicitud.textCuil.value"/>
						</p>
						<p>
							<b>N&uacute;mero de Afiliado:</b> 
						    <input name="textNroAfil" type="text" id="textNroAfil" readonly="readonly" value="<?php echo $nroafil ?>" style="background:#f5f5f5"/>
						</p>
						<p>
						    <b>Tipo de Afiliado: </b>
						    <input name="textCodPar" type="text" id="textCodPar" readonly="readonly" style="background:#f5f5f5;" value="<?php echo $tipo; ?>"/>
						    <input name="codPar" type="text" id="codPar" size="4" readonly="readonly" style="display:none" value="<?php echo $codigo ?>"/>
						</p>
						<p><?php 
							if ($cartel == 1) {
								print("<div nombre='cartel' id='cartel' style='color:green'><b> Beneficiario con CUIL $cuil no empadronado. Completar Apellido y Nombre </b></div>");
							}?>
					    </p>
					    <p>
					      <b>* Apellido y Nombre: </b>
					      <input name="textNombre" type="text" id="textNombre" value="<?php echo $nombre ?>" size="30"/>
					    </p>
					    <br>
					    <script>
								if (document.forms.nuevaSolicitud.textNombre.value != "")  {
									document.forms.nuevaSolicitud.textNombre.readOnly = true;
									document.forms.nuevaSolicitud.textNombre.style.background = "#f5f5f5";
								} else {
									document.forms.nuevaSolicitud.textNombre.readOnly = false;
									document.forms.nuevaSolicitud.textNombre.style.background = "#ffffff";
								}
						</script>
					</div>
					
					<div class="col-md-10 col-md-offset-1" style="border: 1px solid">
					    <h4 style="color: blue">Datos Solicitud</h4>
					      	<p><b>* Tipo: </b>
						      	<input name="tipo" id="tipoPractica" type="radio" value="1" onchange="mostrarPresu(0)" checked="checked"/> Pr&aacute;ctica |
						      	<input name="tipo" id="tipoMaterial" type="radio" value="2" onchange="mostrarPresu(1)"/> Material |
							  	<input name="tipo" id="tipoMedicamento" type="radio" value="3" onchange="mostrarPresu(0)"/> Medicamento 
					      	</p>
					      	<br>
					      	<p><b>* Pedido Medico:</b><input name="pedidoMedico" id="pedidoMedico" type="file" /></p>
						  	<div id="obligatorioPedido" style="visibility:hidden; color:green">
					       		<b> Obliglatorio en Oxigenoterapia</b>
					      	</div>
						  	<p><b>Historia Cl&iacute;nica: </b><input name="historiaClinica" id="historiaClinica" type="file" /></p>
					      	<div id="obligatorioHistoria" style="visibility:hidden; color:green">
					        	<b> Obliglatorio en Oxigenoterapia </b>
					      	</div>
					      	<p><b>Estudios:</b><input name="estudios" id="estudios" type="file" /></p>
					      	<br>
					 </div>  
					 
					 <div class="col-md-10 col-md-offset-1" style="border: 1px solid; margin-bottom: 10px">
					 	 <h4 style="color: blue">Pedido de Materiales - Presupuestos</h4>
					      <p><b>Tipo de Material</b></p>
					      <p>
					       	 <select name="tipoSolicitud" size="1" id="tipoSolicitud" onchange="controlCantidad(document.forms.nuevaSolicitud.tipoSolicitud[selectedIndex].value)" style="background:#f5f5f5" disabled="disabled">
					            <option value='0' selected="selected">Seleccione un valor </option>
						            <?php $query="select * from clasificamaterial order by codigo ASC";
										  $result = mysql_query($query,$db); 
										  while ($rowtipos=mysql_fetch_array($result)) { ?>
						            		<option value="<?php echo $rowtipos['codigo'] ?>"><?php echo $rowtipos['descripcion']  ?></option>
						            <?php } ?>
					            </select>
					      </p>
					      <input name="minimo" type="text" id="minimo" size="4" style="display: none"/>
					      <input name="maximo" type="text" id="maximo" size="4" style="display: none"/>
					      <p>
					        <input name="notaCantidad" type="text" id="notaCantidad" size="50" style="background:#f5f5f5; text-align: center; color: green; font-weight: bold;" readonly="readonly" />
					      </p>
					      <p id="presu1" style="display: none"><b>Presupuesto 1</b> <input name="presu1" id="presu1" type="file" /></p>
					      <p id="presu2" style="display: none"><b>Presupuesto 2</b> <input name="presu2" id="presu2" type="file" /></p>
					      <p id="presu3" style="display: none"><b>Presupuesto 3</b> <input name="presu3" id="presu3" type="file" /></p>
					      <p id="presu4" style="display: none"><b>Presupuesto 4</b> <input name="presu4" id="presu4" type="file" /></p>
					      <p id="presu5" style="display: none"><b>Presupuesto 5</b> <input name="presu5" id="presu5" type="file" /></p>  
					</div>      
					<?php if (isset($_GET['cuil'])) {?>
					         	<input class="btn btn-primary" name="generar" type="submit" id="generar" value="Generar Solicitud"/>
					<?php } else {?>
					         	<input title="Debe Verificar C.U.I.L." class="btn btn-primary" name="generar" type="submit" id="generar" value="Generar Solicitud" disabled="disabled"/>
					<?php } ?>
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