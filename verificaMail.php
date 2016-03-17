<?php
include ("conexion.php");
$mail = $_POST ['email'];
$delcod = $_POST ['usuario'];
$sql = "select * from usuarios where delcod = '$delcod' and emails = '$mail'";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);
if ($cant == 1) {
	$row=mysql_fetch_array($result);
	$asunto = "Recordatorio de Contraseña del sitio www.ospim.com.ar";
	$mensaje = $row['nombre'].": " . "\r\n";
	$mensaje .= "La contraseña requerida del usuario ".$delcod." es ".$row['claves']." .";
	$cabeceras = "MIME-Version: 1.0" . "\r\n";
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$cabeceras .= "From: O.S.P.I.M. <no-replay@ospim.com.ar>" . "\r\n";
	$cabeceras .= 'Bcc: intranet@ospim.com.ar' . "\r\n";
	mail($mail, $asunto, $mensaje, $cabeceras);
} 
echo $cant;
?>


