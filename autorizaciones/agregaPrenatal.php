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
<title>Nuevo Registro de Control Prenatal</title>
<link rel="stylesheet" type="text/css" href="css/general.css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="lib/jquery.maskedinput.js" type="text/javascript"></script>
<script src="lib/funcionControl.js" type="text/javascript"></script>
<script src="lib/jquery.blockUI.js" type="text/javascript"></script>
<script src="lib/jquery.maskedinput.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
jQuery(function($){
	$("#nrcuil").mask("99999999999");
	$("#fechaatencion").mask("99-99-9999");
	$("#talla").mask("9.99");
	$("#peso").mask("999.999");
	$("#presion").mask("999/999");
	$("#gestas").mask("9?9");
	$("#vivos").mask("9?9");
	$("#fum").mask("99-99-9999");
	$("#alturauterina").mask("99.99");
	$("#fpp").mask("99-99-9999");
});
 
$(document).ready(function(){
	$("#verCuil").attr('disabled', true);
	$("#guardar").hide();
	$("#vivos").val("");
	$("#vivos").attr('disabled', true);
	$("#vivos").css({"background-color": "#cccccc"});
	$("#abortos").val("");
	$("#abortos").attr('disabled', true);
	$("#abortos").css({"background-color": "#cccccc"});
	$("#cie10 option[value='']").prop('selected',true);
	$("#cie10").attr('disabled', true);
	$("#capitulo option[value='']").prop('selected',true);
	$("#capitulo").attr('disabled', true);
	$("#grupo option[value='']").prop('selected',true);
	$("#grupo").attr('disabled', true);
	$("#categoria option[value='']").prop('selected',true);
	$("#categoria").attr('disabled', true);
	$("#subcategoria option[value='']").prop('selected',true);
	$("#subcategoria").attr('disabled', true);
	$("#diagnostico").val("");
	$("#diagnostico").attr('readonly', true);
	$("#diagnostico").css({"background-color": "#cccccc"});
	$("#subdiagnostico").val("");
	$("#subdiagnostico").attr('readonly', true);
	$("#subdiagnostico").css({"background-color": "#cccccc"});

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
	});

	$("#nrcuil").change(function(){
		$("#guardar").hide();
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
				$("#guardar").hide();
				$("#nrafil").val("");
				$("#tipoafiliado").val("");
				$("#codpar").val("");
				$("#fechanacimiento").val("");
				$("#sexo").val("");
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
					$("#sexo").val(respuesta.sexo);
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
					$("#guardar").show();
				} else {
					$("#guardar").show();
					alert("Beneficiario no empadronado o perteneciente a otra delegacion. Debe completar Apellido y Nombre");
					$("#nrafil").val("");
					$("#tipoafiliado").val("");
					$("#codpar").val("");
					$("#fechanacimiento").val("");
					$("#sexo").val("");
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
			$("#guardar").hide();
			alert("Debe Ingresar un C.U.I.L. para verificar la existencia");
			$("#nrcuil").focus();
		}
	});

	$("#gestas").change(function(){
		var gestas = $(this).val();
		if(gestas=="") {
			$("#vivos").val("");
			$("#vivos").attr('disabled', true);
			$("#vivos").css({"background-color": "#cccccc"});
			$("#abortos").val("");
			$("#abortos").attr('disabled', true);
			$("#abortos").css({"background-color": "#cccccc"});
		} else {
			if(gestas<=0) {
				$("#vivos").val("");
				$("#vivos").attr('disabled', true);
				$("#vivos").css({"background-color": "#cccccc"});
				$("#abortos").val("");
				$("#abortos").attr('disabled', true);
				$("#abortos").css({"background-color": "#cccccc"});
			} else {
				$("#vivos").val("");
				$("#vivos").attr('disabled', false);
				$("#vivos").css({"background-color": "#ffffff"});
			}
		}
	});

	$("#vivos").change(function(){
		var gestas = $("#gestas").val();
		var vivos = $(this).val();
		if(vivos=="") {
			$("#abortos").val("");
			$("#abortos").attr('disabled', true);
			$("#abortos").css({"background-color": "#cccccc"});
		} else {
			if(vivos<0) {
				$("#abortos").val("");
				$("#abortos").attr('disabled', true);
				$("#abortos").css({"background-color": "#cccccc"});
			} else {
				if(vivos>gestas) {
					$("#abortos").val("");
					$("#abortos").attr('disabled', true);
					$("#abortos").css({"background-color": "#cccccc"});
				} else {
					var abortos = gestas-vivos;
					$("#abortos").val(abortos);
					$("#abortos").attr('disabled', false);
					$("#abortos").attr('readonly', true);
					$("#abortos").css({"background-color": "#cccccc"});
				}
			}
		}
	});

	$("#emitediagnostico").change(function(){
		$('#capitulo').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$('#grupo').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$('#categoria').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$('#subcategoria').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		var emitediagnostico = $(this).val();
		if(emitediagnostico=="1") {
			$("#cie10 option[value='']").prop('selected',true);
			$("#cie10").attr('disabled', false);
		}
		else {
			$("#cie10 option[value='']").prop('selected',true);
			$("#cie10").attr('disabled', true);
			$("#capitulo option[value='']").prop('selected',true);
			$("#capitulo").attr('disabled', true);
			$("#grupo option[value='']").prop('selected',true);
			$("#grupo").attr('disabled', true);
			$("#categoria option[value='']").prop('selected',true);
			$("#categoria").attr('disabled', true);
			$("#subcategoria option[value='']").prop('selected',true);
			$("#subcategoria").attr('disabled', true);
			$("#diagnostico").val("");
			$("#diagnostico").attr('readonly', true);
			$("#diagnostico").css({"background-color": "#cccccc"});
			$("#subdiagnostico").val("");
			$("#subdiagnostico").attr('readonly', true);
			$("#subdiagnostico").css({"background-color": "#cccccc"});
		}
	});

	$("#cie10").change(function(){
		$('#capitulo').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$('#grupo').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$('#categoria').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$('#subcategoria').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		var cie10 = $(this).val();
		if(cie10=="1") {
			$("#capitulo option[value='']").prop('selected',true);
			$("#capitulo").attr('disabled', false);
			$("#grupo option[value='']").prop('selected',true);
			$("#grupo").attr('disabled', false);
			$("#categoria option[value='']").prop('selected',true);
			$("#categoria").attr('disabled', false);
			$("#subcategoria option[value='']").prop('selected',true);
			$("#subcategoria").attr('disabled', false);
			$("#diagnostico").val("");
			$("#diagnostico").attr('readonly', true);
			$("#diagnostico").css({"background-color": "#cccccc"});
			$("#subdiagnostico").val("");
			$("#subdiagnostico").attr('readonly', true);
			$("#subdiagnostico").css({"background-color": "#cccccc"});
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "buscaCapitulos.php",
			}).done(function(respuesta){
				$("#capitulo").html(respuesta);
			});
		}
		else {
			$("#capitulo option[value='']").prop('selected',true);
			$("#capitulo").attr('disabled', true);
			$("#grupo option[value='']").prop('selected',true);
			$("#grupo").attr('disabled', true);
			$("#categoria option[value='']").prop('selected',true);
			$("#categoria").attr('disabled', true);
			$("#subcategoria option[value='']").prop('selected',true);
			$("#subcategoria").attr('disabled', true);
			if(cie10=="0") {
				$("#diagnostico").val("");
				$("#diagnostico").attr('readonly', false);
				$("#diagnostico").css({"background-color": "#ffffff"});
				$("#subdiagnostico").val("");
				$("#subdiagnostico").attr('readonly', false);
				$("#subdiagnostico").css({"background-color": "#ffffff"});
			} else {
				$("#diagnostico").val("");
				$("#diagnostico").attr('readonly', true);
				$("#diagnostico").css({"background-color": "#cccccc"});
				$("#subdiagnostico").val("");
				$("#subdiagnostico").attr('readonly', true);
				$("#subdiagnostico").css({"background-color": "#cccccc"});
			}
		}
	});

	$("#capitulo").change(function(){
		$('#categoria').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$('#subcategoria').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$("#grupo option[value='']").prop('selected',true);
		var capitulo = $(this).val();
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "buscaGrupos.php",
			data: {capitulo:capitulo},
		}).done(function(respuesta){
			$("#grupo").html(respuesta);
		});
		$("#categoria option[value='']").prop('selected',true);
		$("#subcategoria option[value='']").prop('selected',true);
		var codcategoria  = "";
		var codscategoria = "";
		$("#diagnostico").val(codcategoria);
		$("#subdiagnostico").val(codscategoria);
	});

	$("#grupo").change(function(){
		$('#subcategoria').find('option').remove().end().append('<option title="Seleccione un valor" value="">Seleccione un valor</option>').val('');
		$("#categoria option[value='']").prop('selected',true);
		var grupo = $(this).val();
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "buscaCategorias.php",
			data: {grupo:grupo},
		}).done(function(respuesta){
			$("#categoria").html(respuesta);
		});
		$("#subcategoria option[value='']").prop('selected',true);
		var codcategoria  = "";
		var codscategoria = "";
		$("#diagnostico").val(codcategoria);
		$("#subdiagnostico").val(codscategoria);
	});

	$("#categoria").change(function(){
		$("#subcategoria option[value='']").prop('selected',true);
		var categoria = $(this).val();
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "buscaSubcategorias.php",
			data: {categoria:categoria},
		}).done(function(respuesta){
			$("#subcategoria").html(respuesta);
		});
		var codcategoria = "";
		if(categoria != "") {
			var descategoria = $("#categoria option:selected").text();
			var separacodigo = $("#categoria option:selected").attr("title").split(' ');
			var titcategoria = separacodigo[1];
			var codcategoria = titcategoria+' - '+descategoria;
		}
		var codscategoria = "";
		$("#diagnostico").val(codcategoria);
		$("#subdiagnostico").val(codscategoria);
	});

	$("#subcategoria").change(function(){
		var codscategoria = "";
		if($(this).val() != "") {
			var desscategoria = $("#subcategoria option:selected").text();
			var separascodigo = $("#subcategoria option:selected").attr("title").split(' ');
			var titscategoria = separascodigo[1];
			var codscategoria = titscategoria+' - '+desscategoria;
		}
		$("#subdiagnostico").val(codscategoria);		
	});
});

function validar(formulario) {
	if (formulario.profesional.value == "") {
		alert("Debe ingresar Apellido y Nombre del Profesional que Realiz� la Atenci�n");
		document.getElementById("profesional").focus();
		return false;
	}
	if (formulario.fechaatencion.value == "") {
		alert("Debe ingresar la Fecha Atenci�n del Beneficiario");
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
	if (formulario.sexo.value == "M") {
		alert("El beneficiario no puede ser un Hombre");
		document.getElementById("nrcuil").focus();
		return false;
	}
	if (formulario.nombre.value == "") {
		alert("Debe ingresar el nombre del Beneficiario");
		document.getElementById("nombre").focus();
		return false;
	}
	if (formulario.edad.value == "") {
		alert("Debe ingresar la Edad del Beneficiario");
		document.getElementById("edad").focus();
		return false;
	} else {
		if (!esEnteroPositivo(formulario.edad.value)){
			alert("El valor ingresado para Edad es incorrecto");
			document.getElementById("edad").focus();
			return false;
		}
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
	if (formulario.controlnro.value == ""){
		alert("Debe ingresar un valor para Control Nro.");
		document.getElementById("controlnro").focus();
		return false;
	} else {
		if (!esEnteroPositivo(formulario.controlnro.value)){
			alert("El valor ingresado para Control Nro. es incorrecto");
			document.getElementById("controlnro").focus();
			return false;
		}
	}
	if (formulario.talla.value == ""){
		alert("Debe ingresar un valor para Talla");
		document.getElementById("talla").focus();
		return false;
	} else {
		if(!isNumberPositivo(formulario.talla.value)){
			alert("El valor ingresado para Talla es incorrecto");
			document.getElementById("talla").focus();
			return false;
		}
	}
	if (formulario.peso.value == ""){
		alert("Debe ingresar un valor para Peso");
		document.getElementById("peso").focus();
		return false;
	} else {
		if (!isNumberPositivo(formulario.peso.value)){
			alert("El valor ingresado para Peso es incorrecto");
			document.getElementById("peso").focus();
			return false;
		}
	}
	if (formulario.presion.value == ""){
		alert("Debe ingresar un valor para Presion");
		document.getElementById("presion").focus();
		return false;
	}
	if (formulario.serologia.value == ""){
		alert("Debe seleccionar un valor para Serolog�a");
		document.getElementById("serologia").focus();
		return false;
	}
	if (formulario.gestas.value != "" && formulario.gestas.value > 0 ) {
		if (!esEnteroPositivo(formulario.gestas.value)){
			alert("El valor ingresado para Gestas es incorrecto");
			document.getElementById("gestas").focus();
			return false;
		}
	}
	if (formulario.gestas.value != "" && formulario.gestas.value > 0 ) {
		if (formulario.vivos.value == "") {
			alert("Debe ingresar un valor para Nacimientos");
			document.getElementById("vivos").focus();
			return false;
		} else {
			if (!esEnteroPositivo(formulario.vivos.value)){
				alert("El valor ingresado para Nacimientos es incorrecto");
				document.getElementById("vivos").focus();
				return false;
			}
		}
	}
	if (formulario.gestas.value != "" && formulario.gestas.value > 0 ) {
		if (formulario.abortos.value == "") {
			alert("No se ha podido calcular el valor para Abortos, verifique Gestas y Nacimientos");
			document.getElementById("gestas").focus();
			return false;
		} else {
			if (!esEnteroPositivo(formulario.abortos.value)){
				alert("El valor calculado para Abortos es incorrecto, verifique Gestas y Nacimientos");
				document.getElementById("gestas").focus();
				return false;
			}
		}
	}
	if (formulario.fum.value == "") {
		alert("Debe ingresar la fecha de la �ltima Menstruaci�n");
		document.getElementById("fum").focus();
		return false;
	} else {
		if (!esFechaValida(formulario.fum.value)) {
			document.getElementById("fum").focus();
			return false;
		}
	}
	if (formulario.edadgestacional.value == ""){
		alert("Debe ingresar un valor para Edad Gestacional");
		document.getElementById("edadgestacional").focus();
		return false;
	} else {
		if (!esEnteroPositivo(formulario.edadgestacional.value)){
			alert("El valor ingresado para Edad Gestacional es incorrecto");
			document.getElementById("edadgestacional").focus();
			return false;
		}
	}
	if (formulario.alturauterina.value == ""){
		alert("Debe ingresar un valor para Altura Uterina");
		document.getElementById("alturauterina").focus();
		return false;
	} else {
		if (!isNumberPositivo(formulario.alturauterina.value)){
			alert("El valor ingresado para Altura Uterina es incorrecto");
			document.getElementById("alturauterina").focus();
			return false;
		}
	}
	if (formulario.fpp.value == "") {
		alert("Debe ingresar la fecha Probable de Parto");
		document.getElementById("fpp").focus();
		return false;
	} else {
		if (!esFechaValida(formulario.fpp.value)) {
			document.getElementById("fpp").focus();
			return false;
		}
	}
	if (formulario.cantidadecografias.value == ""){
		alert("Debe ingresar un valor para Cantidad de Ecografias");
		document.getElementById("cantidadecografias").focus();
		return false;
	} else {
		if (!esEnteroPositivo(formulario.cantidadecografias.value)){
			alert("El valor ingresado para Cantidad de Ecografias es incorrecto");
			document.getElementById("cantidadecografias").focus();
			return false;
		}
	}
	if (formulario.emitediagnostico.options[formulario.emitediagnostico.selectedIndex].value == "") {
		alert("Debe seleccionar si emite o no Diagnostico");
		document.getElementById("emitediagnostico").focus();
		return false;
	}
	if (formulario.emitediagnostico.options[formulario.emitediagnostico.selectedIndex].value == "1") {
		if (formulario.diagnostico.value == "") {
			alert("Debe ingresar un valor en el campo Diagnostico Principal");
			document.getElementById("diagnostico").focus();
			return false;
		}
	}
	$.blockUI({ message: "<h1>Guardando Registro. Aguarde por favor...</h1>" });
	return true;
}
</script>
</head>
<body>
<form id="agregaPrenatal" name="agregaPrenatal" method="POST" action="guardarPrenatal.php" onSubmit="return validar(this)" enctype="multipart/form-data" >
<div align="center">
<table width="979" border="0">
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="style_titulo">Nuevo Registro de Control Prenatal</p>
    </div>
      </td>
    <td width="489"><div align="right">
		<a class="style_boton3" href="#" onClick="location.href='listadoPrenatal.php'">Volver a Programa de Control Prenatal</a>
      </div>
    </td>
  </tr>
</table>
</div>
<div align="center">
<table width="979" border="0">
	<tr>
		<td valign="top">
		  <p align="left"><span class="style_subtitulo">Informaci&oacute;n del Profesional</span></p>
		  <span align="left" class="style_texto_input"><strong>Apellido y Nombre :</strong>
			  <input name="profesional" type="text" id="profesional" value="" size="60" placeholder="Tratamiento, Apellido y Nombre (Ej: Dr. Gonzalez Mario)" class="style_input"/>
		 </span>
		  <span align="left" class="style_texto_input"><strong>Fecha de Atenci&oacute;n :</strong>
			  <input name="fechaatencion" type="text" id="fechaatencion" value="" size="12" placeholder="DD/MM/AAAA" class="style_input"/>
		  </span>
		</td>
	</tr>
</table>
<table width="979" border="0">
	<tr>
		<td valign="top">
		  <p align="left"><span class="style_subtitulo">Informaci&oacute;n del Beneficiario</span></p>
		  <span align="left" class="style_texto_input"><strong>C.U.I.L. :</strong>
			  <input name="nrcuil" type="text" id="nrcuil" value="" size="11" placeholder="Sin guiones" class="style_input"/>
			  <input type="button" name="verCuil" id="verCuil" value="Verificar CUIL" />
		  </span>
		  <span align="left" class="style_texto_input"><strong>N&uacute;mero de Afiliado :</strong>
			  <input name="nrafil" type="text" id="nrafil" size="9" readonly="true" value="" class="style_input_readonly"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Tipo de Afiliado :</strong>
			  <input name="tipoafiliado" type="text" id="tipoafiliado" size="8" readonly="true" value="" class="style_input_readonly"/>
			  <input name="codpar" type="text" id="codpar" size="4" readonly="true" style="visibility:hidden" value=""/>
			  <input name="fechanacimiento" type="text" id="fechanacimiento" size="12" readonly="true" style="visibility:hidden" value=""/>
			  <input name="sexo" type="text" id="sexo" size="2" readonly="true" style="visibility:hidden" value=""/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Apellido y Nombre :</strong>
			  <input name="nombre" type="text" id="nombre" value="" size="60" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Edad :</strong>
			<input name="edad" type="text" id="edad" value="" size="5" maxlength="5" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Tel&eacute;fono o Celular :</strong>
			  <input name="ddntelefono" type="text" id="ddntelefono" value="" size="5" maxlength="5" placeholder="DDN" class="style_input"/>
			  <input name="nrotelefono" type="text" id="nrotelefono" value="" size="12" maxlength="10" placeholder="N�mero" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Control Nro. :</strong>
			<input name="controlnro" type="text" id="controlnro" value="" size="3" maxlength="2" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Talla :</strong>
			<input name="talla" type="text" id="talla" value="" size="4" maxlength="4" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Peso :</strong>
			<input name="peso" type="text" id="peso" value="" size="7" maxlength="7" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Presi&oacute;n Arterial :</strong>
			<input name="presion" type="text" id="presion" value="" size="7" maxlength="7" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Serolog&iacute;a :</strong>
			  <select name="serologia" id="serologia" class="style_input">
				<option title="Seleccione un valor" value="">Seleccione un valor</option>
				<option title="+" value="1">Positivo</option>
				<option title="-" value="0">Negativo</option>
			  </select>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Gestas :</strong>
			<input name="gestas" type="text" id="gestas" value="" size="3" maxlength="2" placeholder="1 a 99" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Nacimientos :</strong>
			<input name="vivos" type="text" id="vivos" value="" size="3" maxlength="2" placeholder="0 a 99" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Abortos :</strong>
			<input name="abortos" type="text" id="abortos" value="" size="3" maxlength="2" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>F.U.M. :</strong>
			  <input name="fum" type="text" id="fum" value="" size="12" placeholder="DD/MM/AAAA" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Edad Gestacional :</strong>
			<input name="edadgestacional" type="text" id="edadgestacional" value="" size="3" maxlength="2" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Altura Uterina :</strong>
			<input name="alturauterina" type="text" id="alturauterina" value="" size="5" maxlength="5" class="style_input"/>
		  </span>
		  <span align="left" class="style_texto_input"><strong>F.P.P. :</strong>
			  <input name="fpp" type="text" id="fpp" value="" size="12" placeholder="DD/MM/AAAA" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Cantidad de Ecograf&iacute;as :</strong>
			<input name="cantidadecografias" type="text" id="cantidadecografias" value="" size="3" maxlength="2" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Enfermedades Relacionadas con el Embarazo :</strong>
		  	<strong>Toxoplasmosis</strong>
			  <input name="toxoplasmosis" type="checkbox" id="toxoplasmosis" value="1" class="style_input"/>
			<strong>Chagas</strong>
			  <input name="chagas" type="checkbox" id="chagas" value="1" class="style_input"/>
			<strong>V.D.R.L.</strong>
			  <input name="vdrl" type="checkbox" id="vdrl" value="1" class="style_input"/>
			<strong>Hepatitis</strong>
			  <input name="hepatitis" type="checkbox" id="hepatitis" value="1" class="style_input"/>
			<strong>H.I.V.</strong>
			  <input name="hiv" type="checkbox" id="hiv" value="1" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Emite Diagn&oacute;stico  :</strong>
			  <select name="emitediagnostico" id="emitediagnostico" class="style_input">
				<option title="Seleccione un valor" value="">Seleccione un valor</option>
				<option title="Si" value="1">Si</option>
				<option title="No" value="0">No</option>
			  </select>
		  </span>
		  <span align="left" class="style_texto_input"><strong>Diagnosticar Seg&uacute;n C&oacute;digos CEI 10? :</strong>
			  <select name="cie10" id="cie10" class="style_input">
				<option title="Seleccione un valor" value="">Seleccione un valor</option>
				<option title="Si" value="1">Si</option>
				<option title="No" value="0">No</option>
			  </select>
		  </span>
		  <p align="left" class="style_texto_input">
			  <select name="capitulo" id="capitulo" class="style_input">
	        	<option title="Seleccione un valor" value="">Seleccione un valor</option>
        	  </select>
		  </p>
		  <p align="left" class="style_texto_input">
		    <select name="grupo" id="grupo" class="style_input">
		      <option title="Seleccione un valor" value="">Seleccione un valor</option>
		      </select>
	      </p>
		  <p align="left" class="style_texto_input">
		    <select name="categoria" id="categoria" class="style_input">
		      <option title="Seleccione un valor" value="">Seleccione un valor</option>
		      </select>
	      </p>
		  <p align="left" class="style_texto_input">
		    <select name="subcategoria" id="subcategoria" class="style_input">
		      <option title="Seleccione un valor" value="">Seleccione un valor</option>
		      </select>
	      </p>
		  <span align="left" class="style_texto_input"><strong>Diagn&oacute;stico Principal :</strong>
			  <p><textarea name="diagnostico" cols="120" rows="3" id="diagnostico" class="style_input"></textarea></p>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Diagn&oacute;stico Secundario :</strong>
			  <p><textarea name="subdiagnostico" cols="120" rows="3" id="subdiagnostico" class="style_input"></textarea></p>
		  </span>
		  <p>
		  </p>
		  <span align="left" class="style_texto_input"><strong>Observaciones / Indicaciones :</strong>
			  <p><textarea name="observaciones" cols="120" rows="3" id="observaciones" class="style_input"></textarea></p>
		  </span>
		</td>
	</tr>
</table>
</div>
<div align="center">
<table>
	<tr>
		<td valign="top">
        	<input name="guardar" type="submit" id="guardar" class="style_boton4" value="Guardar Registro" />
        </td>
    </tr>
</table>
</div>
</form>
</body>
</html>