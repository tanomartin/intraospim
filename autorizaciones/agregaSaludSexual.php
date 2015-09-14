<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nuevo Registro de Salud Sexual y Procreaci&oacute;n Responsable</title>
<link rel="stylesheet" type="text/css" href="css/general.css" />
<link rel="stylesheet" type="text/css" href="lib/jquery-ui-1.11.1/jquery-ui.css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="lib/jquery.maskedinput.js" type="text/javascript"></script>
<script src="lib/jquery-ui-1.11.1/jquery-ui.js" type="text/javascript"></script>
<script src="lib/jquery-ui-1.11.1/ui.datepicker-es.js"></script>
<script src="lib/funcionControl.js" type="text/javascript"></script>
<script src="lib/jquery.blockUI.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function($){
	$("#nrcuil").mask("99999999999");
	$("#fechaatencion").mask("99/99/9999");
});
 
$(document).ready(function(){
	$("#verCuil").attr('disabled', true);
	$("#guardar").hide();
	$("#eligemetodo").hide();
	$("#preservativos").prop("checked",false);
	$("#diu").prop("checked",false);
	$("#anticonceptivos").prop("checked",false);
	$("#especificamotivo").hide();
	$("#motivonoentrega").val("");
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
	$("#avisos").dialog({
		autoOpen: false,
		modal: true,
		height: "auto",
		show: {
			effect: "blind",
			duration: 250
		},
		hide: {
			effect: "blind",
			duration: 250
		},
		closeOnEscape:false
	});

	$.datepicker.setDefaults($.datepicker.regional['es']);

	$("#fechaatencion").datepicker({
		firstDay: 1,
		maxDate: "+0d",
		showButtonPanel: true,
		showOn: "button",
		buttonImage: "img/calendar.png",
		buttonImageOnly: true,
		buttonText: "Seleccione la fecha",
		changeMonth: true,
		changeYear: true
    });

	$("#fechaatencion").change(function(){
		var fechacar = $("#fechaatencion").val();
		var fechanac = $("#fechanacimiento").val();
		if(fechanac != "") {
			var array_fechanac = fechanac.split("-");
			var anonac = parseInt(array_fechanac[0]);
			var mesnac = parseInt(array_fechanac[1]);
			var dianac = parseInt(array_fechanac[2]);

			var array_fechacar = fechacar.split("/");
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
    	aMult = aMult.split('');
	    if (cuil && cuil.length == 11) {
			var aCUIL = cuil.split('');
			var iResult = 0;
			for(var i = 0; i <= 9; i++) {
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
				$("#mensajes").empty();
				var mensaje = "C.U.I.L. Invalido";
				var contenidodialogo = "<span style='float:left; margin:0 7px 20px 0;'>"+mensaje+"</span>";
				$("#mensajes").html(contenidodialogo);
				$("#avisos").dialog("open");
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

						var array_fechacar = fechacar.split("/");
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
					$("#mensajes").empty();
					var mensaje = "Beneficiario no empadronado o perteneciente a otra delegacion. Debe completar Apellido y Nombre";
					var contenidodialogo = "<span style='float:left; margin:0 7px 20px 0;'>"+mensaje+"</span>";
					$("#mensajes").html(contenidodialogo);
					$("#avisos").dialog("open");
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
			$("#mensajes").empty();
			var mensaje = "Debe Ingresar un C.U.I.L. para verificar la existencia";
			var contenidodialogo = "<span style='float:left; margin:0 7px 20px 0;'>"+mensaje+"</span>";
			$("#mensajes").html(contenidodialogo);
			$("#avisos").dialog("open");
			$("#nrcuil").focus();
		}
	});

	$("#metodoanticonceptivo").change(function(){
		var metodoanticonceptivo = $(this).val();
		if(metodoanticonceptivo=="") {
			$("#eligemetodo").hide();
			$("#preservativos").prop("checked",false);
			$("#diu").prop("checked",false);
			$("#anticonceptivos").prop("checked",false);
			$("#especificamotivo").hide();
			$("#motivonoentrega").val("");
		} else {
			if(metodoanticonceptivo=="1") {
				$("#eligemetodo").show();
				$("#preservativos").prop("checked",false);
				$("#diu").prop("checked",false);
				$("#anticonceptivos").prop("checked",false);
				$("#especificamotivo").hide();
				$("#motivonoentrega").val("");
			}
			if(metodoanticonceptivo=="0") {
				$("#eligemetodo").hide();
				$("#preservativos").prop("checked",false);
				$("#diu").prop("checked",false);
				$("#anticonceptivos").prop("checked",false);
				$("#especificamotivo").show();
				$("#motivonoentrega").val("");
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
			codcategoria = titcategoria+' - '+descategoria;
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
			codscategoria = titscategoria+' - '+desscategoria;
		}
		$("#subdiagnostico").val(codscategoria);		
	});
});

function validar(formulario) {
	if (formulario.profesional.value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe ingresar Apellido y Nombre del Profesional que Realizó la Atención.</p></div>');
   		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#profesional').focus(); }});
		return false;
	}
	if (formulario.fechaatencion.value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe ingresar la Fecha Atención del Beneficiario.</p></div>');
		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#fechaatencion').focus(); }});
		return false;
	} else {
		if (!FechaValida(formulario.fechaatencion.value)) {
			var cajadialogo = $('<div title="Aviso"><p>La Fecha de Atencion ingresada no es válida.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#fechaatencion').focus(); }});
			return false;
		}
	}
	if (formulario.nrcuil.value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe ingresar un C.U.I.L.</p></div>');
   		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#nrcuil').focus(); }});
		return false;
	}
	if (formulario.nombre.value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe ingresar el nombre del Beneficiario.</p></div>');
   		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#nombre').focus(); }});
		return false;
	}
	if (formulario.edad.value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe ingresar la Edad del Beneficiario.</p></div>');
   		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#edad').focus(); }});
		return false;
	} else {
		if (!esEnteroPositivo(formulario.edad.value)){
			var cajadialogo = $('<div title="Aviso"><p>El valor ingresado para Edad es incorrecto.</p></div>');
   			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#edad').focus(); }});
			return false;
		}
	}
	if (formulario.ddntelefono.value != "") {
		if (!esEnteroPositivo(formulario.ddntelefono.value)) {
			var cajadialogo = $('<div title="Aviso"><p>El codigo de area debe ser numerico.</p></div>');
   			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#ddntelefono').focus(); }});
			return false;
		}
	} else {
		formulario.ddntelefono.value = "0";
	}
	if (formulario.nrotelefono.value != "") {
		if (!esEnteroPositivo(formulario.nrotelefono.value)) {
			var cajadialogo = $('<div title="Aviso"><p>El telefono debe ser numerico.</p></div>');
   			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#nrotelefono').focus(); }});
			return false;
		}
	} else {
		formulario.nrotelefono.value = "0";
	}
	if (formulario.informacion.options[formulario.informacion.selectedIndex].value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe seleccionar si se le brinda o no Informacion.</p></div>');
		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#informacion').focus(); }});
		return false;
	}
	if (formulario.metodoanticonceptivo.options[formulario.metodoanticonceptivo.selectedIndex].value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe seleccionar si se entrega o no Método Anticonceptivo.</p></div>');
		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#metodoanticonceptivo').focus(); }});
		return false;
	}
	if (formulario.metodoanticonceptivo.options[formulario.metodoanticonceptivo.selectedIndex].value == "0") {
		if (formulario.motivonoentrega.value == "") {
			var cajadialogo = $('<div title="Aviso"><p>Debe especificar el motivo por el que no entrega Método Anticonceptivo.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#motivonoentrega').focus(); }});
			return false;
		}
	}
	if (formulario.metodoanticonceptivo.options[formulario.metodoanticonceptivo.selectedIndex].value == "1") {
		if (formulario.preservativos.checked == false && formulario.diu.checked == false && formulario.anticonceptivos.checked == false) {
			var cajadialogo = $('<div title="Aviso"><p>Debe seleccionar cual o cuales Métodos Anticonceptivos fueron entregados.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#preservativos').focus(); }});
			return false;
		}
	}
	if (formulario.emitediagnostico.options[formulario.emitediagnostico.selectedIndex].value == "") {
		var cajadialogo = $('<div title="Aviso"><p>Debe seleccionar si emite o no Diagnostico.</p></div>');
		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#emitediagnostico').focus(); }});
		return false;
	}
	if (formulario.emitediagnostico.options[formulario.emitediagnostico.selectedIndex].value == "1") {
		if (formulario.diagnostico.value == "") {
			var cajadialogo = $('<div title="Aviso"><p>Debe ingresar informacion en el campo Diagnostico Principal.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#diagnostico').focus(); }});
			return false;
		}
	}
	$.blockUI({ message: "<h1>Guardando Registro. Aguarde por favor...</h1>" });
	return true;
}
</script>
</head>
<body>
<form id="agregaSaludSexual" name="agregaSaludSexual" method="post" action="guardarSaludSexual.php" onSubmit="return validar(this)" enctype="multipart/form-data" >
<div align="center">
<table style="width: 979">
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="style_titulo">Nuevo Registro de Salud Sexual y Procreaci&oacute;n Responsable</p>
    </div>
      </td>
    <td width="489"><div align="right">
		<a class="style_boton3" href="#" onClick="location.href='listadoSaludSexual.php'">Volver a Programa de Salud Sexual y Procreación Responsable</a>
      </div>
    </td>
  </tr>
</table>
</div>
<div align="center">
<table style="width: 979">
	<tr>
		<td valign="top">
		  <p align="left"><span class="style_subtitulo">Informaci&oacute;n del Profesional</span></p>
		  <span class="style_texto_input"><strong>Apellido y Nombre :</strong>
			  <input name="profesional" type="text" id="profesional" value="" size="60" placeholder="Tratamiento, Apellido y Nombre (Ej: Dr. Gonzalez Mario)" class="style_input"/>
		 </span>
		  <span class="style_texto_input"><strong>Fecha de Atenci&oacute;n :</strong>
			  <input name="fechaatencion" type="text" id="fechaatencion" value="" size="12" placeholder="DD/MM/AAAA" class="style_input"/>
		  </span>
		</td>
	</tr>
	<tr>
		<td valign="top">
		  <p align="left"><span class="style_subtitulo">Informaci&oacute;n del Beneficiario</span></p>
		  <span class="style_texto_input"><strong>C.U.I.L. :</strong>
			  <input name="nrcuil" type="text" id="nrcuil" value="" size="11" placeholder="Sin guiones" class="style_input"/>
			  <input type="button" name="verCuil" id="verCuil" value="Verificar CUIL" />
		  </span>
		  <span class="style_texto_input"><strong>N&uacute;mero de Afiliado :</strong>
			  <input name="nrafil" type="text" id="nrafil" size="9" readonly="readonly" value="" class="style_input_readonly"/>
		  </span>
		  <span class="style_texto_input"><strong>Tipo de Afiliado :</strong>
			  <input name="tipoafiliado" type="text" id="tipoafiliado" size="8" readonly="readonly" value="" class="style_input_readonly"/>
			  <input name="codpar" type="text" id="codpar" size="4" readonly="readonly" style="visibility:hidden" value=""/>
			  <input name="fechanacimiento" type="text" id="fechanacimiento" size="12" readonly="readonly" style="visibility:hidden" value=""/>
			  <input name="sexo" type="text" id="sexo" size="2" readonly="readonly" style="visibility:hidden" value=""/>
		  </span>
		  <p>
		  </p>
		  <span class="style_texto_input"><strong>Apellido y Nombre :</strong>
			  <input name="nombre" type="text" id="nombre" value="" size="60" class="style_input"/>
		  </span>
		  <span class="style_texto_input"><strong>Edad : </strong>
			<input name="edad" type="text" id="edad" value="" size="5" maxlength="5" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span class="style_texto_input"><strong>Tel&eacute;fono o Celular :</strong>
			  <input name="ddntelefono" type="text" id="ddntelefono" value="" size="5" maxlength="5" placeholder="DDN" class="style_input"/>
			  <input name="nrotelefono" type="text" id="nrotelefono" value="" size="12" maxlength="10" placeholder="Número" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span class="style_texto_input"><strong>Se le Brinda Informaci&oacute;n? :</strong>
			  <select name="informacion" id="informacion" class="style_input">
				<option title="Seleccione un valor" value="">Seleccione un valor</option>
				<option title="Si" value="1">Si</option>
				<option title="No" value="0">No</option>
			  </select>
		  </span>
		  <p>
		  </p>
		  <span class="style_texto_input"><strong>Entrega de M&eacute;todo Anticonceptivo? :</strong>
			  <select name="metodoanticonceptivo" id="metodoanticonceptivo" class="style_input">
				<option title="Seleccione un valor" value="">Seleccione un valor</option>
				<option title="Si" value="1">Si</option>
				<option title="No" value="0">No</option>
			  </select>
		  </span>
		  <span id="eligemetodo" class="style_texto_input">
		  	<strong>Preservativos</strong>
			  <input name="preservativos" type="checkbox" id="preservativos" value="1" class="style_input"/>
			<strong>D.I.U.</strong>
			  <input name="diu" type="checkbox" id="diu" value="1" class="style_input"/>
			<strong>Anticonceptivos</strong>
			  <input name="anticonceptivos" type="checkbox" id="anticonceptivos" value="1" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span id="especificamotivo" class="style_texto_input"><strong>Por Que? :</strong>
			  <input name="motivonoentrega" type="text" id="motivonoentrega" value="" size="120" placeholder="Especificar motivo" class="style_input"/>
		  </span>
		  <p>
		  </p>
		  <span class="style_texto_input"><strong>Emite Diagn&oacute;stico  :</strong>
			  <select name="emitediagnostico" id="emitediagnostico" class="style_input">
				<option title="Seleccione un valor" value="">Seleccione un valor</option>
				<option title="Si" value="1">Si</option>
				<option title="No" value="0">No</option>
			  </select>
		  </span>
		  <span class="style_texto_input"><strong>Diagnosticar Seg&uacute;n C&oacute;digos CEI 10? :</strong>
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
		  <span class="style_texto_input"><strong>Diagn&oacute;stico Principal :</strong>
			  <textarea name="diagnostico" cols="120" rows="3" id="diagnostico" class="style_input"></textarea>
		  </span>
		  <p>
		  </p>
		  <span class="style_texto_input"><strong>Diagn&oacute;stico Secundario :</strong>
			  <textarea name="subdiagnostico" cols="120" rows="3" id="subdiagnostico" class="style_input"></textarea>
		  </span>
		  <p>
		  </p>
		  <span class="style_texto_input"><strong>Observaciones / Indicaciones :</strong>
			  <textarea name="observaciones" cols="120" rows="3" id="observaciones" class="style_input"></textarea>
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
<div id="avisos" title="Aviso">
  <p id="mensajes"></p>
</div>
</body>
</html>