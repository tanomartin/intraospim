<?php 
function tipoBene($tipo) {
	if ($tipo == 0) {
		return "Titular";
	}
	if ($tipo > 0) {
		return "Familiar";
	}
	return "-";
}
?>
