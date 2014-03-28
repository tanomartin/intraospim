<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recordatorio Contrase&ntilde;a</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
}
body {
	background-color: #CCCCCC;
}
.Estilo5 {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	color: #000000;
}
.Estilo4 {
	color: #FF0000;
	font-weight: bold;
}
.Estilo6 {font-family: Papyrus; font-weight: bold; color: #000000; }
-->
</style>
</head>

<body>
<h3 align="center" class="Estilo3"><span class="Estilo5">SISTEMA DE CONSULTA PARA DELEGACIONES</span></h3>
<p align="center" class="Estilo3"><img src="ospimgris.jpg" width="308" height="350" /></p>
<p align="center" class="Estilo3"><b><font face="Verdana" size="2">
<input name="back" type="submit" id="back" value="VOLVER" onclick= "location.href='logintranet.php'"/>
</font></b></p>
<form method="post" action="verificadorMail.php">
<table width="100%" border="0">
  <tr>
    <td colspan="2" align="right"><div align="center">
      <p class="Estilo6">RECORDATORIO DE CONTRASE&Ntilde;A</p>
   <?php if (isset($_GET['err'])) {
				$error = $_GET['err'];
				if ($error == 1) {
					print("<p align='center' class='Estilo4'>DATOS INCORRECTOS</p>");
				}
			}
	?>
    </div></td>
    </tr>
  <tr>
    <td width="30%" align="right"><p align="right"><font face="Verdana" size="2"><b>E-mail Registrado:&nbsp;</b></font></p></td>
    <td width="30%">
      <input type="text" name="mail" id="mail" style="background-color: #FFFFFF" size="20" />
   </td>
    </tr>
  <tr>
    <td width="30%" height="30" align="right"><p style="word-spacing: 0; margin-top: 0; margin-bottom: 0" align="right"><b><font face="Verdana" size="2">Usuario</font></td>
    <td width="30%">
      <input  type="text" name="delcod" id="delcod" style="background-color: #FFFFFF" size="20" />
    </td>
    </tr>
  <tr>
    <td height="51" colspan="2" align="center"><input name="back2" type="submit" id="back2" value="ENVIAR" /></td>
    </tr>
</table>

</form>

</body>
</html>
