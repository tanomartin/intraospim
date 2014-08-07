<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
include ("lib/funcionesCarga.php");
$fechaSolicitud = date("d/m/Y"); 
$cartel = 0;
$delcod = $_SESSION['delcod'];
//OJOOOOOOOOO


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
			$tipo = "Titular";
			$codigo = 1;
		} else {
			$result = mysql_query($queryFami,$db); 
			$cant = mysql_num_rows($result);
			if ($cant != 0) {
				$row = mysql_fetch_array($result);
				$tipo = "Familiar";
				$codigo = $row['codpar'];
			} else { 
				$cartel = 1;
			}
		}
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
.Estilo4 {
	color: #990000;
	font-weight: bold;
}
.Estilo6 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="lib/jquery.maskedinput.js" type="text/javascript"></script>
<script src="lib/funcionControl.js" type="text/javascript"></script>
<script src="lib/jquery.blockUI.js" type="text/javascript"></script>
<script src="lib/jquery.maskedinput.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">

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
							document.getElementById(nombre).style.visibility = "visible";
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
	var i;		
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
/*	if (formulario.historiaClinica.value == "") {
		alert("Debe adjuntar la Historia Clinica");
		return false;
	}*/
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

<form id="nuevaSolicitud" name="nuevaSolicitud" method="POST" action="cargarSolicitud.php" onSubmit="return validar(this)" enctype="multipart/form-data" >
<table width="965" border="0">
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">Nueva Solicitud </p>
    </div>
      <span class="Estilo6">(*) DATOS OBLIGATORIOS </span></td>
    <td width="420"><div align="right">
      <p>
        <input type="button" name="volver" value="Volver a listado de Solicitudes" onclick="location.href='listadoAuto.php'"/>
      </p>
      <table width="328" height="33" border="2">
        <tr>
          <td width="112" height="25"><div align="center"><strong>Fecha</strong> </div></td>
          <td width="198"><div align="center"><?php echo $fechaSolicitud ;?></div></td>
        </tr>
      </table>
    </div>
    <div align="right"></div></td>
  </tr>
</table>
<table width="965" border="0">
  <tr>
    <td width="535" valign="top"><p><span class="Estilo4">Informaci&oacute;n del Beneficiario </span></p>
      <p><strong>* C.U.I.L.:</strong> 
         <label>
          <input name="textCuil" type="text" id="textCuil" value="<?php echo $cuil ?>" size="11" onBlur="limpiarFormulario(this.value)" />
            </label>
        <label>
          <input type="button" name="verCuil" id="verCuil" value="Verificar CUIL" onClick="location.href='nuevaSolicitud.php?cuil='+document.forms.nuevaSolicitud.textCuil.value"/>
          </label>
        </p>
      <p><strong>N&uacute;mero de Afiliado:</strong> 
        <input name="textNroAfil" type="text" id="textNroAfil" readonly="true" value="<?php echo $row['nrafil'] ?>" style="background:#CCCCCC"/>
      </p>
      <p><strong>Tipo de Afiliado: </strong>
        <input name="textCodPar" type="text" id="textCodPar" readonly="true" style="background:#CCCCCC" value="<?php echo $tipo; ?>"/>
        <label>
        <input name="codPar" type="text" id="codPar" size="4" readonly="true" style="visibility:hidden" value="<?php echo $codigo ?>"/>
        </label>
        </p>
      <p>
        <?php 
			if ($cartel == 1) {
				print("<div nombre='cartel' id='cartel' style='color:#0033FF'><b> Beneficiario con CUIL $cuil no empadronado. <br>Completar Apellido y Nombre </b></div>");
			}
		?>
      </p>
      <p><strong>* Apellido y Nombre: </strong>
        <input name="textNombre" type="text" id="textNombre" value="<?php echo $row['nombre'] ?>" size="60"/>
        </p>
      <p>&nbsp;</p>
      <p><span class="Estilo4">Información Obligatoria Pedido de Materiales - Presupuestos </span></p>
      <p>Tipo de Material
        <select name="tipoSolicitud" size="1" id="tipoSolicitud" onchange="controlCantidad(document.forms.nuevaSolicitud.tipoSolicitud[selectedIndex].value)" disabled="disabled">
            <option value=0 selected="selected">Seleccione un valor </option>
            <?php 
					$query="select * from clasificamaterial order by codigo ASC";
					$result = mysql_query($query,$db); 
					while ($rowtipos=mysql_fetch_array($result)) { ?>
            <option value="<?php echo $rowtipos['codigo'] ?>"><?php echo $rowtipos['descripcion']  ?></option>
            <?php } ?>
                  </select>
          <label>
          <input name="minimo" type="text" id="minimo" size="4" style="visibility:hidden"/>
          <input name="maximo" type="text" id="maximo" size="4" style="visibility:hidden"/>
                  </label>
      </p>
      <p>
        <input name="notaCantidad" type="text" id="notaCantidad" size="50" style="background:#CCCCCC" readonly="true" />
        <label></label>
      </p>
      <p id="presu1" style="visibility:hidden">Presupuesto 1 -
        <input name="presu1" id="presu1" type="file" />
      </p>
      <p id="presu2" style="visibility:hidden">Presupuesto 2 -
        <input name="presu2" id="presu2" type="file" />
      </p>
      <p id="presu3" style="visibility:hidden">Presupuesto 3 -
        <input name="presu3" id="presu3" type="file" />
      </p>
      <p id="presu4" style="visibility:hidden">Presupuesto 4 -
        <input name="presu4" id="presu4" type="file" />
      </p>
      <p id="presu5" style="visibility:hidden">Presupuesto 5 -
        <input name="presu5" id="presu5" type="file" />
      </p>
        <script>
			if (document.forms.nuevaSolicitud.textNombre.value != "")  {
				document.forms.nuevaSolicitud.textNombre.readOnly = true;
				document.forms.nuevaSolicitud.textNombre.style.background = "#CCCCCC";
			} else {
				document.forms.nuevaSolicitud.textNombre.readOnly = false;
				document.forms.nuevaSolicitud.textNombre.style.background = "#FFFFFF";
			}
		</script>      </td>
    <td width="420" valign="top"><p><span class="Estilo4">Datos Solicitud</span></p>
      <p><strong>* Tipo:</strong></p>
      <label><input name="tipo" id="tipoPractica" type="radio" value="1" onchange="mostrarPresu(0)" checked="checked"/>Pr&aacute;ctica</label>
      <br />
      <label><input name="tipo" id="tipoMaterial" type="radio" value="2" onchange="mostrarPresu(1)"/>Material </label>
	  <br />
	  <label><input name="tipo" id="tipoMedicamento" type="radio" value="3" onchange="mostrarPresu(0)"/>Medicamento </label>
      </p>
      <p><strong>* Pedido Medico:</strong> <input name="pedidoMedico" id="pedidoMedico" type="file" /> </p>
      
	  <div id="obligatorioPedido" style="visibility:hidden; color:#0033FF">
        <div align="left"><strong> Obliglatorio en Oxigenoterapia</strong></div>
      </div>
	  <p><strong>Historia Cl&iacute;nica: </strong> <input name="historiaClinica" id="historiaClinica" type="file" /></p>
      <div id="obligatorioHistoria" style="visibility:hidden; color:#0033FF">
        <div align="left"><strong> Obliglatorio en Oxigenoterapia </strong></div>
      </div>
      <p><strong>Estudios:</strong> 
          <input name="estudios" id="estudios" type="file" />
        </p>
      <p>&nbsp;</p>
      <p>
        <input name="generar" type="submit" id="generar" value="Generar Solicitud" />
      </p></td>
  </tr>
</table>
</form>
</body>
</html>