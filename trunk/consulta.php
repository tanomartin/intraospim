<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Mándanos tus comentarios</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.Estilo3 {	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
}
.Estilo4 {color: #000000}
-->
</style></head>
<body onUnload="logout.php" text="#003300" link="#006060" vlink="#006060">
<form action="enviar.php" method="post"> 
<div align="center">
  <p class="Estilo3 Estilo4">FORMULARIO DE CONSULTA </p>
  <p><img src="logoSolo.JPG" width="195" height="155"></p>
  <p><input name="volvar" value="Volver" type="button" onClick="location.href='menu.php'"></p>
    <table width="1024" border="1">
      <tr>
        <th width="414" scope="row"><div align="right">Nombre y Apellido: </div></th>
        <td width="594"><input type="text" name="nombre" id="nombre" size=70></td>
      </tr>
      <tr>
        <th scope="row"><div align="right">Email:</div></th>
        <td><input type="text" name="email" id="email" size=70></td>
      </tr>
      <tr>
        <th scope="row"><div align="right">Telefono:</div></th>
        <td><input type="text" name="telefono" id="telefono" size=70></td>
      </tr>
      <tr>
        <th scope="row"><div align="right">Consulta:</div></th>
        <td rowspan="2"><textarea name="coment" id="coment" cols=67 rows=10></textarea></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
    </table>
    <table width="1025" border="1">
      <tr>    
        <th scope="row">
            <input name="submit2" type="submit" value="Enviar">
        </th>
      </tr>
    </table>
</div>
</form>
</body>
</html> 