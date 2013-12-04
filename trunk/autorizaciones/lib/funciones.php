<?php 
function tipoBene($tipo) {
	if ($tipo == 1) {
		return "Titular";
	}
	if ($tipo > 1) {
		return "Familiar";
	}
	return "-";
}

function estado($veri, $auto) {
	if ($veri == 0 && $auto == 0) {
		return "Solicitada";
	}
	if ($veri == 1 && $auto == 0) {
		return "Verificacion Aprobada";
	}
	if ($veri == 2 && $auto == 0) {
		return "Verificacion Rechazada";
	}
	if ($veri == 1 && $auto == 1) {
		return "Autorizacion Aprobada";
	}
	if ($veri == 1 && $auto == 2) {
		return "Autorizacion Rechazada";
	}
	if ($veri == 2 && $auto == 2) {
		return "Autorizacion Rechazada";
	}
}

function tipo($tipo) {
	if ($tipo == 1) {
		return "Practica";
	}
	if ($tipo == 2) {
		return "Material";
	}
	if ($tipo == 3) {
		return "Medicamento";
	}
}



function invertirFecha($fecha) {
	$dia = substr($fecha,8,2);
	$mes = substr($fecha,5,2);
	$anio = substr($fecha,0,4);
	$fechainv = $dia."/".$mes."/".$anio;
	return($fechainv);
}

function getDia($fecha) {
	$dia = substr($fecha,8,2);
	return($dia);
}

function getMes($fecha) {
	$mes = substr($fecha,5,2);
	return($dia);
}

function getAnio($fecha) {
	$anio = substr($fecha,0,4);
	return($dia);
}

function fechaParaGuardar($fecha) {
	$dia = substr($fecha,0,2);
	$mes = substr($fecha,3,2);
	$anio = substr($fecha,6,4);
	$fechaLista = $anio."-".$mes."-".$dia;
	return($fechaLista);
}
?>
