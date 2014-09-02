<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nuevo Registro Detecci&oacute;n C&aacute;ncer de Cuello Uterino</title>
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
	$("#nrcuil").mask("99999999999");
	$("#fechaatencion").mask("99-99-9999");
	$("#ultimopap").mask("99-99-9999");
	$("#ultimacolpo").mask("99-99-9999");
});
 
$(document).ready(function(){
	$("#verCuil").attr('disabled', true);

	$("#guardar").attr('disabled', true);

	$("#fechaatencion").change(function(){
		var fechacar = $("#fechaatencion").val();
		var fechanac = $("#fechanacimiento").val();
		if(fechanac != "") {
			var array_fechanac = fechanac.split("-");
			var anonac = parseInt(array_fechanac[0]);
			var mesnac = parseInt(array_fechanac[1]);
			var dianac = parseInt(array_fechanac[2]);

			var array_fechacar = fechacar.split("-");
			var anocar = parseInt(array_fechacar[2]);
			var mescar = parseInt(array_fechacar[1]);
			var diacar = parseInt(array_fechacar[0]);
			var fechacon = mescar+"/"+diacar+"/"+anocar;
	      	fecha = new Date();
	      	fecha.setTime(Date.parse(fechacon));

			var edad;
					
			edad=fecha.getFullYear() - anonac - 1;
			if(fecha.getMonth() + 1 - mesnac > 0) {
			   edad = edad + 1;
			}
			if(fecha.getMonth() + 1 - mesnac == 0) {
				if(fecha.getUTCDate() - dianac >= 0) {
					edad = edad + 1;
			   }
			}
			$("#edad").val(edad);
			$("#edad").attr("readonly", true);
			$("#edad").css({"background-color": "#cccccc"});
		}
	})

	$("#nrcuil").change(function(){
		$("#guardar").attr('disabled', true);
		var cuil = $("#nrcuil").val();
		var aMult = '5432765432';
    	var aMult = aMult.split('');
	    if (cuil && cuil.length == 11) {
			var aCUIL = cuil.split('');
			var iResult = 0;
			var resAux = 0;
			for(i = 0; i <= 9; i++) {
				iResult += aCUIL[i] * aMult[i];
			}
			iResult = (iResult % 11);
			if (iResult == 1) iResult = 0;
			if (iResult != 0) iResult = 11 - iResult;
			if (iResult == aCUIL[10]) {
				$("#verCuil").attr('disabled', false);
			} else {
				$("#verCuil").attr('disabled', true);
				$("#guardar").attr('disabled', true);
				$("#nrafil").val("");
				$("#tipoafiliado").val("");
				$("#codpar").val("");
				$("#fechanacimiento").val("");
				$("#nombre").val("");
				$("#edad").val("");
				$("#nombre").attr("readonly", false);
				$("#nombre").css({"background-color": "#ffffff"});
				$("#edad").attr("readonly", false);
				$("#edad").css({"background-color": "#ffffff"});
				alert("CUIL INVALIDO");
				$("#nrcuil").focus();
			}
		}
	});

	$("#verCuil").click(function(){
		var cuil = $("#nrcuil").val();
		if(cuil!="") {
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "buscaBeneficiario.php",
				data: {cuil:cuil},
			}).done(function(respuesta){
				if(respuesta.nroafi) {
					$("#nrafil").val(respuesta.nroafi);
					$("#tipoafiliado").val(respuesta.tipo);
					$("#codpar").val(respuesta.codigo);
					$("#fechanacimiento").val(respuesta.fecnac);
					$("#nombre").val(respuesta.nombre);
					$("#nombre").attr("readonly", true);
					$("#nombre").css({"background-color": "#cccccc"});
					var fechacar = $("#fechaatencion").val();
					if(fechacar != "") {
						var fechanac = $("#fechanacimiento").val();
						var array_fechanac = fechanac.split("-");
						var anonac = parseInt(array_fechanac[0]);
						var mesnac = parseInt(array_fechanac[1]);
						var dianac = parseInt(array_fechanac[2]);

						var array_fechacar = fechacar.split("-");
						var anocar = parseInt(array_fechacar[2]);
						var mescar = parseInt(array_fechacar[1]);
						var diacar = parseInt(array_fechacar[0]);
						var fechacon = mescar+"/"+diacar+"/"+anocar;
				      	fecha = new Date();
				      	fecha.setTime(Date.parse(fechacon));

						var edad;
					
						edad=fecha.getFullYear() - anonac - 1;
						if(fecha.getMonth() + 1 - mesnac > 0) {
						   edad = edad + 1;
						}
						if(fecha.getMonth() + 1 - mesnac == 0) {
							if(fecha.getUTCDate() - dianac >= 0) {
								edad = edad + 1;
						   }
						}
						$("#edad").val(edad);
						$("#edad").attr("readonly", true);
						$("#edad").css({"background-color": "#cccccc"});
					}
					$("#guardar").attr('disabled', false);
				} else {
					$("#guardar").attr('disabled', false);
					alert("Beneficiario no empadronado o perteneciente a otra delegacion. Debe completar Apellido y Nombre");
					$("#nrafil").val("");
					$("#tipoafiliado").val("");
					$("#codpar").val("");
					$("#fechanacimiento").val("");
					$("#nombre").val("");
					$("#edad").val("");
					$("#nombre").attr("readonly", false);
					$("#nombre").css({"background-color": "#ffffff"});
					$("#edad").attr("readonly", false);
					$("#edad").css({"background-color": "#ffffff"});
					$("#nombre").focus();
				}
			});
		} else {
			$("#guardar").attr('disabled', true);
			alert("Debe Ingresar un C.U.I.L. para verificar la existencia");
			$("#nrcuil").focus();
		}
	});

	$("#antecedentes").change(function(){
		var antecedentes = $(this).val();
		if(antecedentes=="0") {
			$("#personaantecedente option[value='']").prop('selected',true);
			$("#personaantecedente").attr('disabled', true);
		}
		else {
			$("#personaantecedente option[value='']").prop('selected',true);
			$("#personaantecedente").attr('disabled', false);
		}
	});

	$("#pap").change(function(){
		var pap = $(this).val();
		if(pap=="0") {
			$("#ultimopap").val("");
			$("#ultimopap").attr('disabled', true);
		}
		else {
			$("#ultimopap").val("");
			$("#ultimopap").attr('disabled', false);
		}
	});

	$("#colpo").change(function(){
		var colpo = $(this).val();
		if(colpo=="0") {
			$("#ultimacolpo").val("");
			$("#ultimacolpo").attr('disabled', true);
		}
		else {
			$("#ultimacolpo").val("");
			$("#ultimacolpo").attr('disabled', false);
		}
	});
});

function validar(formulario) {
	if (formulario.profesional.value == "") {
		alert("Debe ingresar Apellido y Nombre del Profesional que Realizó la Atención");
		document.getElementById("profesional").focus();
		return false;
	}
	if (formulario.fechaatencion.value == "") {
		alert("Debe ingresar la Fecha Atención del Beneficiario");
		document.getElementById("fechaatencion").focus();
		return false;
	} else {
		if (!esFechaValida(formulario.fechaatencion.value)) {
			document.getElementById("fechaatencion").focus();
			return false;
		}
	}
	if (formulario.nrcuil.value == "") {
		alert("Debe ingresar numero de CUIL");
		document.getElementById("nrcuil").focus();
		return false;
	}
	if (formulario.nombre.value == "") {
		alert("Debe ingresar el nombre del Beneficiario");
		document.getElementById("nombre").focus();
		return false;
	}
	if (formulario.ddntelefono.value != "") {
		if (!esEnteroPositivo(formulario.ddntelefono.value)) {
			alert("El codigo de area debe ser numerico");
			document.getElementById("ddntelefono").focus();
			return false;
		}
	} else {
		formulario.ddntelefono.value = "0";
	}
	if (formulario.nrotelefono.value != "") {
		if (!esEnteroPositivo(formulario.nrotelefono.value)) {
			alert("El telefono debe ser numerico");
			document.getElementById("nrotelefono").focus();
			return false;
		}
	} else {
		formulario.nrotelefono.value = "0";
	}
	if (formulario.edad.value == "") {
		alert("Debe ingresar la Edad del Beneficiario");
		document.getElementById("edad").focus();
		return false;
	}
	if (formulario.antecedentes.options[formulario.antecedentes.selectedIndex].value == "") {
		alert("Debe seleccionar si posee o no Antecedentes Cca Cuello Uterino");
		document.getElementById("antecedentes").focus();
		return false;
	}
	if (formulario.antecedentes.options[formulario.antecedentes.selectedIndex].value == "1") {
		if (formulario.personaantecedente.options[formulario.personaantecedente.selectedIndex].value == "") {
			alert("Debe ingresar el Familiar que presenta Antecedentes Cca Cuello Uterino");
			document.getElementById("personaantecedente").focus();
			return false;
		}
	}
	if (formulario.pap.options[formulario.pap.selectedIndex].value == "") {
		alert("Debe seleccionar si efectuo o no PAP");
		document.getElementById("pap").focus();
		return false;
	}
	if (formulario.pap.options[formulario.pap.selectedIndex].value == "1") {
		if (formulario.ultimopap.value == "") {
			alert("Debe ingresar la fecha del Último Examen Mamario");
			document.getElementById("ultimopap").focus();
			return false;
		} else {
			if (!esFechaValida(formulario.ultimopap.value)) {
				document.getElementById("ultimopap").focus();
				return false;
			}
		}
	}
	if (formulario.colpo.options[formulario.colpo.selectedIndex].value == "") {
		alert("Debe seleccionar si efectuo o no Colposcopia");
		document.getElementById("colpo").focus();
		return false;
	}
	if (formulario.colpo.options[formulario.colpo.selectedIndex].value == "1") {
		if (formulario.ultimamacolpo.value == "") {
			alert("Debe ingresar la fecha de la Última Colposcopia");
			document.getElementById("ultimamacolpo").focus();
			return false;
		} else {
			if (!esFechaValida(formulario.ultimamacolpo.value)) {
				document.getElementById("ultimamacolpo").focus();
				return false;
			}
		}
	}
	if (formulario.diagnostico.value == "") {
		alert("Debe ingresar un valor en el campo Diagnostico");
		document.getElementById("diagnostico").focus();
		return false;
	}
	if (formulario.observaciones.value == "") {
		alert("Debe ingresar un valor en el campo Observaciones/Indicaciones");
		document.getElementById("observaciones").focus();
		return false;
	}
	$.blockUI({ message: "<h1>Guardando Registro. Aguarde por favor...</h1>" });
	return true;
}
</script>
</head>
<body>

<form id="agregaCancerUterino" name="agregaCancerUterino" method="POST" action="guardarCancerUterino.php" onSubmit="return validar(this)" enctype="multipart/form-data" >
<table width="978" border="0">
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">Nuevo Registro Detecci&oacute;n C&aacute;ncer de Cuello Uterino</p>
    </div>
      </td>
    <td width="421"><div align="right">
        <input type="button" name="volver" value="Volver a Programa de Detección Precoz del Cáncer de Cuello Uterino" onclick="location.href='listadoCancerUterino.php'"/>
      </div>
    </td>
  </tr>
</table>
<table width="979" border="0">
  <tr>
    <td width="506" valign="top"><p><span class="Estilo4">Informaci&oacute;n del Profesional</span></p>
      <p><strong>Nombre:</strong>
          <input name="profesional" type="text" id="profesional" value="" size="60"/>
      </p>
      <p><strong>Fecha Atenci&oacute;n:</strong>
          <input name="fechaatencion" type="text" id="fechaatencion" value="" size="12"/>
      </p>
      </td>
    <td width="463" valign="top"><p><span class="Estilo4">Informaci&oacute;n del Beneficiario </span></p>
	  <p><strong> C.U.I.L.:</strong>
          <label>
          <input name="nrcuil" type="text" id="nrcuil" value="" size="11" />
          </label>
          <label>
          <input type="button" name="verCuil" id="verCuil" value="Verificar CUIL" />
          </label>
      </p>
	  <p><strong>N&uacute;mero de Afiliado:</strong>
          <input name="nrafil" type="text" id="nrafil" size="9" readonly="true" value="" style="background:#CCCCCC"/>
      </p>
	  <p><strong>Tipo de Afiliado: </strong>
          <input name="tipoafiliado" type="text" id="tipoafiliado" size="8" readonly="true" style="background:#CCCCCC" value=""/>
          <label>
          <input name="codpar" type="text" id="codpar" size="4" readonly="true" style="visibility:hidden" value=""/>
          <input name="fechanacimiento" type="text" id="fechanacimiento" size="12" readonly="true" style="visibility:hidden" value=""/>
          </label>
      </p>
	  <p><strong>Apellido y Nombre: </strong>
          <input name="nombre" type="text" id="nombre" value="" size="60"/>
      </p>
	  <p>
        <strong>Edad: </strong>
        <input name="edad" type="text" id="edad" value="" size="5" maxlength="5" />
      </p>
	  <p><strong>Telefono: DDN </strong>
          <input name="ddntelefono" type="text" id="ddntelefono" value="" size="5" maxlength="5" />
          <strong>N&uacute;mero </strong>
          <input name="nrotelefono" type="text" id="nrotelefono" value="" size="12" maxlength="10" />
      </p>
	  <p><strong>Antecedentes CCa Cuello Uterino : </strong>
          <select name="antecedentes" id="antecedentes">
            <option title="Seleccione un valor" value="">Seleccione un valor</option>
            <option title="Si" value="1">Si</option>
            <option title="No" value="0">No</option>
          </select>
      </p>
	  <p><strong>Familiar con Antecedente  : </strong>
          <select name="personaantecedente" id="personaantecedente">
            <option title="Seleccione un valor" value="">Seleccione un valor</option>
            <option title="Abuela" value="1">Abuela</option>
            <option title="Madre" value="2">Madre</option>
            <option title="T&iacute;a" value="3">T&iacute;a</option>
            <option title="Hermana" value="4">Hermana</option>
          </select>
      </p>
	  <p><strong>PAP  : </strong>
          <select name="pap" id="pap">
            <option title="Seleccione un valor" value="">Seleccione un valor</option>
            <option title="Si" value="1">Si</option>
            <option title="No" value="0">No</option>
          </select>
      </p>
	  <p><strong>Fecha &Uacute;ltimo PAP :</strong>
          <input name="ultimopap" type="text" id="ultimopap" value="" size="12"/>
      </p>
	  <p><strong>Colposcop&iacute;a  : </strong>
          <select name="colpo" id="colpo">
            <option title="Seleccione un valor" value="">Seleccione un valor</option>
            <option title="Si" value="1">Si</option>
            <option title="No" value="0">No</option>
          </select>
      </p>
	  <p><strong>Fecha &Uacute;ltima Colposcop&iacute;a :</strong>
          <input name="ultimacolpo" type="text" id="ultimacolpo" value="" size="12"/>
      </p>
	  <p><strong>Diagn&oacute;stico           :</strong>
          <textarea name="diagnostico" cols="60" rows="3" id="diagnostico"></textarea>
      </p>
	  <p><strong>Observaciones / Indicaciones :</strong>
          <textarea name="observaciones" cols="60" rows="3" id="observaciones"></textarea>
      </p></td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
      <div align="right">
        <input name="guardar" type="submit" id="guardar" value="Guardar Registro" />
        </div></td>
    </tr>
</table>
</form>
</body>
</html>