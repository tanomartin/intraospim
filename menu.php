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
	color: #000000;
	font-size:20px;
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

<body>

<?php
$sql = "select * from usuarios where delcod = $delcod";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result); 
?>


<h3 align="center" class="Estilo3"><span class="Estilo15"><span class="Estilo5">SISTEMA DE CONSULTA PARA DELEGACIONES</span></span></h3>
<p align="center"><img src="ospimgris.jpg" width="308" height="350" /></p>
<table width="100%" border="0" style="text-align:center">
  <tr>
		<td class="Estilo3">
		<?php 
		if ($_SESSION['aut'] != "pepe") {
			print("Bienvenido ".$row['nombre']); 
		} else {
			print("Se accedio al menú de la Delegación ".$row['nombre']); 
		}
		?>
		</td>
  </tr>
  <tr>
	<td class="Estilo15">
	<?php
	if ($_SESSION['aut'] != "pepe") {
		$fechaActua=substr($row['fechaactualizacion'], 8, 2)."-".substr($row['fechaactualizacion'], 5, 2)."-".substr($row['fechaactualizacion'], 0, 4);
		print("Última actualización: ".$fechaActua." - Último ingreso: ".$row['fecuac']." a las ".$row['horuac']); 
	}
	?></td>
  </tr>
  <tr>
    <td>
    	<span class="Estilo14">| Instructivo de uso </span> - <a href="javascript:void(window.open(&quot;http://www.ospim.com.ar/intranet/tuto/tutorial.pdf&quot;))" target="_top">Descargar</a> |
    	<span class="Estilo14">Preguntas Frecuentes </span> - <a href="javascript:void(window.open(&quot;http://www.ospim.com.ar/intranet/tuto/pregFrec.pdf&quot;))" target="_top">Descargar</a> |  </td>
  </tr>
  <tr>
    <td><a href="javascript:void(window.open('discapacidad/menuDiscapacidad.php'))" class="Estilo16">Formularios e Instructivos para Discapacidad</a></td>
  </tr>
</table>
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top: 10px">
  <tr>
   	<?php if ($tienePrevencion) {?>
   		 <td width="33%"><div align="center"><a href="javascript:void(window.open('autorizaciones/menuPrevencion.php'))" class="Estilo9">Prevenci&oacute;n de la Salud</a></div></td>
    <?php } ?>
    <td><div align="center" class="Estilo9"><a href="buscador.php">Beneficiarios</a> </div></td>
    <td><div align="center" class="Estilo9"><a href="empresas.php">Empresas</a></div></td>
   	<?php if ($estaHabilitado) {?>
   		 <td><div align="center"><a href="javascript:void(window.open('autorizaciones/listadoAuto.php'))" class="Estilo9">Autorizaciones</a></div></td>
    <?php } ?>
  </tr>
</table>

<div align="center">
	<p><input type="button" name="Submit" value="Salir" onclick="location.href='logout.php'"/></p>
 <?php
if ($_SESSION['aut'] != "pepe") { ?>
	<a href='consulta.php'>Envianos tu consulta</a>
<?php	
    $hoy = date("Ymd"); 
	$hora = date("H:i:s"); 
	$sql = "UPDATE usuarios SET fecuac= '$hoy', horuac = '$hora' where delcod = $delcod"; 
	$result = mysql_query($sql,$db);
}
?>
</div>
</body>
</html>



