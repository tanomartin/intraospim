<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
	
$habilitados = array("1002","1102","1103","1106","1107","1108","1109","1701","1702","1703","2603","2604","1301","1302","2001","2501","2602","2101","2102","2103","1401","1402","1402","1501","1601","1110","1202","1901","2201","2301","1802","2401","2402","2701","2801");
$estaHabilitado = false;
for ($i=0; $i < sizeof($habilitados); $i++) {
	if ($habilitados[$i] == $_SESSION['delcod']) {
		$estaHabilitado = true;
		$i = sizeof($habilitados);
	}
}

$prevencion = array("1002","1102","1106","1107","1108","5000","5001");
$tienePrevencion = false;
for ($i=0; $i < sizeof($prevencion); $i++) {
	if ($prevencion[$i] == $_SESSION['delcod']) {
		$tienePrevencion = true;
		$i = sizeof($prevencion);
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>O.S.P.I.M. Men&uacute; principal de consulta para delegaciones</title>
<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
}
body {
	background-color: #CCCCCC;
}
.Estilo9 {font-family: Papyrus; font-size: 24px; }
.Estilo12 {
	font-size: 9px;
	font-weight: bold;
}
.Estilo13 {color: #333333}
.Estilo14 {color: #666666}
.Estilo15 {font-family: Papyrus;
	font-weight: bold;
	color: #000000;
}
.Estilo5 {font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	color: #000000;
}
.Estilo16 {font-size: 18px}
-->
</style>
</head>

<body onUnload="logout.php">

<?php
$sql = "select * from usuarios where delcod = $delcod";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result); 
?>


<h3 align="center" class="Estilo3"><span class="Estilo15"><span class="Estilo5">SISTEMA DE CONSULTA PARA DELEGACIONES</span></span></h3>
<p align="center"><img src="ospimgris.jpg" width="308" height="350" /></p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="33">&nbsp;</td>
    <td width="72%" align="right" class="Estilo3"><div align="center" class="Estilo13">
	<?php
	if ($_SESSION['aut'] != "pepe") {
		$fechaActua=substr($row['fechaactualizacion'], 8, 2)."-".substr($row['fechaactualizacion'], 5, 2)."-".substr($row['fechaactualizacion'], 0, 4);
		print("ÚLTIMA ACTUALIZACIÓN ".$fechaActua); 
	}
	?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td align="right" class="Estilo3"><div align="center"><span class="Estilo14">Instructivo de uso </span> - <a href="javascript:void(window.open(&quot;http://www.ospim.com.ar/intranet/tuto/tutorial.pdf&quot;))" target="_top">Descargar</a></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td align="right" class="Estilo3"><div align="center"> 
      <p><span class="Estilo14">Preguntas Frecuentes </span> - <a href="javascript:void(window.open(&quot;http://www.ospim.com.ar/intranet/tuto/pregFrec.pdf&quot;))" target="_top">Descargar</a></p>
      </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td align="right"><div align="center"><span class="Estilo12"><span class="Estilo13">El instructivo y las Preguntas Frecuentes esta en extension pdf.necesitara el Adobe Reader para poder abrirlo</span> <a href=javascript:void(window.open("http://get.adobe.com/es/reader/")) target="_top">Descargar aqui</a></span> </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="14%" height="33"><p style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p></td>
    <td align="right" class="Estilo3"><p align="center" class="Estilo14"> 
	<?php 
	if ($_SESSION['aut'] != "pepe") {
		print("Bienvenido ".$row['nombre']); 
	} else {
		print("Se accedio al menú de la Delegación ".$row['nombre']); 
	}
	?>
	</p></td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td width="14%">&nbsp;</td>
    <td align="right"><p align="center" class="Estilo15">
	<?php
	if ($_SESSION['aut'] != "pepe") {
		print("Ultimo ingreso registrado el día ".$row['fecuac']." a las ".$row['horuac']); 
	}
	?> </p></td>
    <td width="14%">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td align="right">&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td align="right"><p><div align="center"><a href=javascript:void(window.open("discapacidad/menuDiscapacidad.php")) class="Estilo16">Formularios e Instructivos para Discapacidad</a></div></p></td>
    <td></td>
  </tr>
</table>
<table width="997" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   	<?php if ($tienePrevencion) {?>
   		 <td width="243"><div align="center"><a href=javascript:void(window.open("autorizaciones/menuPrevencion.php")) class="Estilo9">Prevenci&oacute;n de la Salud</a></div></td>
    <?php } ?>
    <td width="273"><div align="center" class="Estilo9"><a href="buscador.php">Beneficiarios</a> </div></td>
    <td width="208"><div align="center" class="Estilo9"><a href="empresas.php">Empresas</a></div></td>
   	<?php if ($estaHabilitado) {?>
   		 <td width="243"><div align="center"><a href=javascript:void(window.open("autorizaciones/listadoAuto.php")) class="Estilo9">Autorizaciones</a></div></td>
    <?php } ?>
  </tr>
</table>

<p align="center" class="Estilo11">
 <?php
if ($_SESSION['aut'] != "pepe") {
	print("<a href='consulta.php'>Envianos tu consulta</a>");
}
?>
<div align="center">  <input type="button" name="Submit" value="Salir" onclick="location.href='logout.php'"/>
  
</div>
  </label>
</body>
</html>

<p>
<?php
if ($_SESSION['aut'] != "pepe") {
	//update de la fecha y la hora
	$hoy = date("Ymd"); 
	$hora = date("H:i:s"); 
	$sql = "UPDATE usuarios SET fecuac= '$hoy', horuac = '$hora' where delcod = $delcod"; 
	$result = mysql_query($sql,$db);
}
?>
</p>

