<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?php
	$nombre = $_POST["nombre"];
	$email = $_POST["email"];
	$atelefono = $_POST["telefono"];
	$coment = $_POST["coment"];

    $cuerpo = "Formulario enviado por delegación nro: ".$_SESSION['delcod']."\n";
    $cuerpo .= "Nombre: ".$nombre."\n";
    $cuerpo .= "Email: ".$email."\n";
	$cuerpo .= "Telefono: ".$atelefono."\n";
    $cuerpo .= "Comentarios: ".$coment."\n";
	
	$header ='From: '.$email."\r\n".'Reply-To:'.$email."\r\n".'X-Mailer: PHP/'.phpversion();
    //mando el correo...
	$mymail='intranet@ospim.com.ar';
	$subject="Formulario recibido";
    mail($mymail, $subject, utf8_decode($cuerpo), $header);
	
	header("location: envio_consulta.php");
?>
