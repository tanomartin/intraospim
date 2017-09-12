<script type="text/javascript">
	
function limpiarInputfile(id) {
        var input = $('#' + id);
        var clon = input.clone();  // Creamos un clon del elemento original
        input.replaceWith(clon);   // Y sustituimos el original por el clon
}

function ocultarPresu(){
	for (var i=1; i<=5; i++) {		
		var nombre = "presu"+i;
		limpiarInputfile(nombre);
		document.getElementById(nombre).style.display = "none";
		document.forms.nuevaSolicitud.maximo.value="0";
		document.forms.nuevaSolicitud.minimo.value="0";
	}
}
	
function mostrarPresu(muestra) {
	ocultarPresu();
	document.getElementById("obligatorioPedido").style.visibility = "hidden";
	document.getElementById("obligatorioHistoria").style.visibility = "hidden";
	document.getElementById("presuMaterial").style.display = "none";
	document.getElementById("presuPractica").style.display = "none";
	document.forms.nuevaSolicitud.notaCantidad.value = "";
	document.forms.nuevaSolicitud.tipoSolicitud.selectedIndex = 0;
	if (muestra == 1) {
		document.getElementById("presuMaterial").style.display = "block";
	}
	if (muestra == 2) {
		document.getElementById("presuPractica").style.display = "block";
		document.forms.nuevaSolicitud.maximo.value="3";
		document.forms.nuevaSolicitud.minimo.value="0";
	}
}	

function limpiarFormulario(sCUIT){
	document.forms.nuevaSolicitud.textNroAfil.value="";
	document.forms.nuevaSolicitud.textCodPar.value="";
	document.forms.nuevaSolicitud.textNombre.value="";
	document.forms.nuevaSolicitud.delega.value ="";
	document.getElementById("fecnac").innerHTML ="";
	document.getElementById("edad").innerHTML ="";
	document.getElementById("disca").innerHTML ="";
	document.getElementById("cartel").innerHTML ="";
	verificaCuil(sCUIT);
}

function verificaCuil(sCUIT) {
	var aMult = '5432765432';
    aMult = aMult.split('');
    
    if (sCUIT && sCUIT.length == 11) {
        aCUIT = sCUIT.split('');
        var iResult = 0;
        for(var i = 0; i <= 9; i++) {
            iResult += aCUIT[i] * aMult[i];
        }
        iResult = (iResult % 11);
		if (iResult == 1) iResult = 0;
		if (iResult != 0) iResult = 11 - iResult;
		
        if (iResult == aCUIT[10]) {
			document.forms.nuevaSolicitud.verCuil.disabled=false;	
			return true;	
        } else {
			alert("CUIL INVALIDO");
			document.forms.nuevaSolicitud.verCuil.disabled=true;
			return false;
		}
    } else {
		if (sCUIT  && sCUIT.length != 11) {
			alert("CUIL INVALIDO");
			document.forms.nuevaSolicitud.verCuil.disabled=true;
			return false;	
		} else {
			alert("CUIL INVALIDO");
			document.forms.nuevaSolicitud.verCuil.disabled=true;
			return false;	
    	}
		alert("CUIL INVALIDO");
		document.forms.nuevaSolicitud.verCuil.disabled=true;
		return false;	
	}
}

//TODO: ver porque lo tengo que hacer asi... muy feoooo
function controlPresu(cantidad) {
	if (cantidad == 1) {
		if (document.forms.nuevaSolicitud.presu1.value == ""){
			return false;
		}	
	}
	
	if (cantidad == 2) {
		if (document.forms.nuevaSolicitud.presu1.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu2.value == ""){
			return false;
		}
	}
	
	if (cantidad == 3) {
		if (document.forms.nuevaSolicitud.presu1.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu2.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu3.value == ""){
			return false;
		}
	}
	
	if (cantidad == 4) {
		if (document.forms.nuevaSolicitud.presu1.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu2.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu3.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu4.value == ""){
			return false;
		}
	}
	
	if (cantidad == 5) {
		if (document.forms.nuevaSolicitud.presu1.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu2.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu3.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu4.value == ""){
			return false;
		}
		if (document.forms.nuevaSolicitud.presu5.value == ""){
			return false;
		}
	}
	return true;
}


</script>