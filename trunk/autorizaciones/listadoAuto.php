<?php session_save_path("../sesiones");
session_start();
if($_SESSION['delcod'] == NULL)
	header ("Location: ../logintranet.php?err=2");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listado de Solicitudes</title>
<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
body {
	background-color: #CCCCCC;
}
.Estilo5 {font-family: Papyrus; font-weight: bold; color: #000000; font-size: 24px; }
-->
</style>
</head>

<body>
<table width="1020" border="0">
  
  <tr>
    <td width="92" rowspan="3" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td width="405" rowspan="3" scope="row"><div align="left">
      <p class="Estilo3">Listado de Solicitudes </p>
    </div></td>
    <td width="187" rowspan="3" scope="row"><div align="center"><span class="Estilo5">Tutoriales</span></div></td>
    <td width="132"><strong>Sistema</strong></td>
    <td width="182"><input type="button" name="volver" value="Descargar" onclick="window.open('../tuto/autorizaciones.pdf','Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100)"/></td>
  </tr>
  <tr>
    <td><strong>Escaneo</strong></td>
    <td><input type="button" name="volver2" value="Descargar" onclick="window.open('../tuto/escaneo.pdf','Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100)"/></td>
  </tr>
  <tr>
    <td><strong><strong>Correo Electr&oacute;nico</strong></strong></td>
    <td>
      <input type="button" name="volver22" value="Descargar" onclick="window.open('../tuto/correo.pdf','Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100)"/>
    </td>
  </tr>
</table>
<form id="listadoSoli" name="listadoSoli" method="post" action="nuevaSolicitud.php">
<table width="1020" border="0">
    <tr>
      <th width="499" scope="row"><div align="left"><b><font face="Verdana" size="2">
        <input name="back" type="submit" id="back" value="Nueva Solicitud" />
     </font></b></div>
      <div align="center"></div></th>
      <th width="511" scope="row"><div align="right">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
      </div></th>
    </tr>
</table>
  
<table border="1" width="1020" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="93"><div align="center"><strong><font size="1" face="Verdana">N&uacute;mero</font></strong></div></td>
    <td width="110"><div align="center"><strong><font size="1" face="Verdana">Fecha</font></strong></div></td>
    <td width="183"><div align="center"><strong><font size="1" face="Verdana">Estado</font></strong></div></td>
	<td width="128"><div align="center"><strong><font size="1" face="Verdana">C.U.I.L Beneficiario </font></strong></div></td>
    <td width="353"><div align="center"><strong><font size="1" face="Verdana">Nombre Beneficiario </font></strong></div></td>
	<td width="115"><div align="center"><strong><font size="1" face="Verdana">Tipo</font></strong></div></td>
  </tr>
  <p>
<?php
include ("lib/funciones.php");
include ("../conexion.php");
$delcod = $_SESSION['delcod'];
$sql = "select * from autorizacionprocesada where delcod = $delcod order by nrosolicitud DESC";
$result = mysql_query($sql,$db);
while ($row = mysql_fetch_array($result)) {
	print ("<td width=93><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('infoAuto.php?nrosolicitud=".$row['nrosolicitud']."'))>".$row['nrosolicitud']."</font></div></td>");
	print ("<td width=110><div align=center><font face=Verdana size=1>".invertirFecha($row['fechasolicitud'])."</font></div></td>");
	print ("<td width=183><div align=center><font face=Verdana size=1><b>".estado($row['statusverificacion'],$row['statusautorizacion'])."</b></font></div></td>");
	print ("<td width=128><div align=center><font face=Verdana size=1>".$row['nrcuil']."</font></div></td>");
	print ("<td width=353><div align=center><font face=Verdana size=1>".$row['nombre']."</font></div></td>");
	print ("<td width=115><div align=center><font face=Verdana size=1>".tipo($row['tiposolicitud'])."</font></div></td>");
	print ("</tr>");
}
?>
</p>
</table>
</form>
</body>
</html>
