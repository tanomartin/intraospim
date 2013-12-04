<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Confimaci&oacute;n de envio</title>

<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.Estilo4 {font-family: Papyrus; font-weight: bold; color: #000000; }
-->
</style>
</head>

<body onUnload="logout.php">
<form id="form1" name="form1" method="post" action="menu.php">
<p align="center" class="Estilo4">SISTEMA DE CONSULTA PARA DELEGACIONES</p>
<p align="center"><img src="logoSolo.JPG" width="307" height="250" /></p>
<div align="center">
  <p><span class="Estilo4">Su consulta ha sido enviada con exito.  </span></p>
</div>
</form>
</body>
</html>
