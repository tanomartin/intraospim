<?php 
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Nuevo Registro Prevenci&oacute;n de Diabetes</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="../include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="css/general.css" />
	
	<link rel="stylesheet" href="lib/jquery-ui-1.11.1/jquery-ui.css" />

	<script type="text/javascript" src="../include/js/jquery-2.2.0.min.js" ></script>
	<script type="text/javascript" src="../include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../include/js/jquery.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script> 

	<script type="text/javascript" src="lib/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="lib/jquery-ui-1.11.1/jquery-ui.js"></script>
	<script type="text/javascript" src="lib/jquery-ui-1.11.1/ui.datepicker-es.js"></script>
	<script type="text/javascript" src="lib/funcionControl.js"></script>
	<script type="text/javascript" src="lib/jquery.blockUI.js" ></script>

	<script type="text/javascript">
	jQuery(function($){
		$("#nrcuil").mask("99999999999");
		$("#fechaatencion").mask("99/99/9999");
		$("#talla").mask("9.99");
		$("#peso").mask("999.999");
		$("#perimetrocefalico").mask("99.99");
	});
	 
	$(document).ready(function(){
		$("#verCuil").attr('disabled', true);
		$("#guardar").hide();
		$("#vacunasfaltantes option[value='']").prop('selected',true);
		$("#vacunasfaltantes").attr('disabled', true);
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
	
		$("#vacunasaldia").change(function(){
			var vacunasaldia = $(this).val();
			if(vacunasaldia=="0") {
				$("#vacunasfaltantes").val("");
				$("#vacunasfaltantes").attr('disabled', false);
			}
			else {
				$("#vacunasfaltantes").val("");
				$("#vacunasfaltantes").attr('disabled', true);
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
		if (formulario.controlnro.value == ""){
			var cajadialogo = $('<div title="Aviso"><p>Debe ingresar un valor para Control Nro.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#controlnro').focus(); }});
			return false;
		} else {
			if (!esEnteroPositivo(formulario.controlnro.value)){
				var cajadialogo = $('<div title="Aviso"><p>El valor ingresado para Control Nro. es incorrecto.</p></div>');
				cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#controlnro').focus(); }});
				return false;
			}
		}
		if (formulario.talla.value == ""){
			var cajadialogo = $('<div title="Aviso"><p>Debe ingresar un valor para Talla.</p></div>');
	   		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#talla').focus(); }});
			return false;
		} else {
			if(!isNumberPositivo(formulario.talla.value)){
				var cajadialogo = $('<div title="Aviso"><p>El valor ingresado para Talla es incorrecto.</p></div>');
	   			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#talla').focus(); }});
				return false;
			}
		}
		if (formulario.peso.value == ""){
			var cajadialogo = $('<div title="Aviso"><p>Debe ingresar un valor para Peso.</p></div>');
	   		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#peso').focus(); }});
			return false;
		} else {
			if (!isNumberPositivo(formulario.peso.value)){
				var cajadialogo = $('<div title="Aviso"><p>El valor ingresado para Peso es incorrecto.</p></div>');
		   		cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#peso').focus(); }});
				return false;
			}
		}
		if (formulario.perimetrocefalico.value == ""){
			var cajadialogo = $('<div title="Aviso"><p>Debe ingresar un valor para Perímetro Cefálico.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#perimetrocefalico').focus(); }});
			return false;
		} else {
			if (!isNumberPositivo(formulario.perimetrocefalico.value)){
				var cajadialogo = $('<div title="Aviso"><p>El valor ingresado para Perímetro Cefálico es incorrecto.</p></div>');
				cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#perimetrocefalico').focus(); }});
				return false;
			}
		}
		if (formulario.vacunasaldia.options[formulario.vacunasaldia.selectedIndex].value == "") {
			var cajadialogo = $('<div title="Aviso"><p>Debe seleccionar si tiene o no las Vacunas Al Dia.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#vacunasaldia').focus(); }});
			return false;
		}
		if (formulario.vacunasaldia.options[formulario.vacunasaldia.selectedIndex].value == "0") {
			if (formulario.vacunasfaltantes.value == "") {
				var cajadialogo = $('<div title="Aviso"><p>Debe ingresar un detalle de las Vacunas Faltantes.</p></div>');
				cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#vacunasfaltantes').focus(); }});
				return false;
			}
		}
		if (formulario.lactanciamaterna.options[formulario.lactanciamaterna.selectedIndex].value == "") {
			var cajadialogo = $('<div title="Aviso"><p>Debe seleccionar si tiene o no Lactancia Materna.</p></div>');
			cajadialogo.dialog({modal: true, height: "auto", show: {effect: "blind",duration: 250}, hide: {effect: "blind",duration: 250}, closeOnEscape:false, close: function(event, ui) { $('#lactanciamaterna').focus(); }});
			return false;
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
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="../menu.php"> <img style="max-width:38px; margin-top: -9px;" src="../images/logo.png" /></a>
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
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-plus"></i><br>Prevención de la Salud</h2>
			<h3>Plan Materno Infantil</h3>
			
			<div class="col-md-10 col-md-offset-1">
				<div>
					<a class="nover" href="listadoMaternoInfantil.php"><i title="volver" style="font-size: 40px; float: left;"  class="glyphicon glyphicon-arrow-left"></i></a>
					<h3 class="page-title" style="float: right;">Nuevo Registro</h3>
				</div>

				<form id="agregaMaternoInfantil" name="agregaMaternoInfantil" method="post" action="guardarMaternoInfantil.php" onSubmit="return validar(this)" enctype="multipart/form-data" >
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
								  <input name="verCuil" type="button" id="verCuil" value="Verificar CUIL"/>
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
							  <span class="style_texto_input"><strong>Edad :</strong>
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
							  <span class="style_texto_input"><strong>Control Nro.:</strong>
								<input name="controlnro" type="text" id="controlnro" value="" size="3" maxlength="2" class="style_input"/>
							  </span>
							  <p>
							  </p>
							  <span class="style_texto_input"><strong>Talla :</strong>
								<input name="talla" type="text" id="talla" value="" size="4" maxlength="4" class="style_input"/>
							  </span>
							  <span class="style_texto_input"><strong>Peso :</strong>
								<input name="peso" type="text" id="peso" value="" size="7" maxlength="7" class="style_input"/>
							  </span>
							  <span class="style_texto_input"><strong>P.C. :</strong>
								<input name="perimetrocefalico" type="text" id="perimetrocefalico" value="" size="5" maxlength="5" class="style_input"/>
							  </span>
							  <span class="style_texto_input"><strong>FEI :</strong>
								  <select name="estudiofei" id="estudiofei" class="style_input">
									<option title="Seleccione un valor" value="">Seleccione un valor</option>
									<option title="+" value="1">Positivo</option>
									<option title="-" value="0">Negativo</option>
								  </select>
							  </span>
							 <span class="style_texto_input"><strong>OeA :</strong>
								  <select name="otoemisionesacusticas" id="otoemisionesacusticas" class="style_input">
									<option title="Seleccione un valor" value="">Seleccione un valor</option>
									<option title="Pasa el Examen" value="1">Pasa el Examen</option>
									<option title="No pasa el Examen" value="0">No pasa el Examen</option>
									<option title="Exceso de Ruido" value="2">Exceso de Ruido</option>
								  </select>
							  </span>
							  <p>
							  </p>
							  <span class="style_texto_input"><strong>F.O. :</strong>
								  <select name="fondodeojo" id="fondodeojo" class="style_input">
									<option title="Seleccione un valor" value="">Seleccione un valor</option>
									<option title="Si" value="1">Si</option>
									<option title="No" value="0">No</option>
								  </select>
							  </span>
							  <span class="style_texto_input"><strong>Ecograf&iacute;a de Cadera :</strong>
								  <select name="ecocadera" id="ecocadera" class="style_input">
									<option title="Seleccione un valor" value="">Seleccione un valor</option>
									<option title="Si" value="1">Si</option>
									<option title="No" value="0">No</option>
								  </select>
							  </span>
							  <p>
							  </p>
							  <span class="style_texto_input"><strong>Vacunas al D&iacute;a :</strong>
								  <select name="vacunasaldia" id="vacunasaldia" class="style_input">
									<option title="Seleccione un valor" value="">Seleccione un valor</option>
									<option title="Si" value="1">Si</option>
									<option title="No" value="0">No</option>
								  </select>
								  <input name="vacunasfaltantes" type="text" id="vacunasfaltantes" value="" size="95" placeholder="Vacunas Faltantes" class="style_input"/>
							  </span>
							  <p>
							  </p>
							  <span class="style_texto_input"><strong>Lactancia Materna :</strong>
								  <select name="lactanciamaterna" id="lactanciamaterna" class="style_input">
									<option title="Seleccione un valor" value="">Seleccione un valor</option>
									<option title="Si" value="1">Si</option>
									<option title="No" value="0">No</option>
								  </select>
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
					<input name="guardar" type="submit" id="guardar" class="style_boton4" value="Guardar Registro" />
				</form>
				<div id="avisos" title="Aviso"><p id="mensajes"></p></div>
			</div>
			<div class="col-md-12 panel-footer" style="margin-top: 15px">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
		  	</div>
		</div>
	</div>
</body>
</html>