<?php include ("verificaSesion.php");

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

header ("Location: consultas.enviada.php");
?>
