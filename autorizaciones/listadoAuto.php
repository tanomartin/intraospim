<?php session_save_path("../sesiones");
session_start();
if($_SESSION['delcod'] == NULL)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
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
-->
</style>
</head>

<?php
include ("lib/funciones.php");
include ("../conexion.php");
$delcod = $_SESSION['delcod'];
$sql = "select * from autorizacionprocesada where delcod = $delcod order by nrosolicitud DESC";
$result = mysql_db_query("uv0471_intranet",$sql,$db); 
?>

<body>
<table width="1020" border="0">
  <tr>
    <td width="92" rowspan="2" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td colspan="2" rowspan="2" scope="row"><div align="left">
      <p class="Estilo3">Listado de Solicitudes </p>
    </div></td>
    <td height="40" colspan="3"><div align="center"><span class="Estilo3">Tutoriales</span></div></td>
  </tr>
  <tr>
    <td width="190"><div align="center"><strong>Sistema</strong> - <a href="../tuto/autorizaciones.pdf" onClick="window.open(this.href,'Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100);  return false">Descargar</a> </div></td>
    <td width="211"><div align="center"><strong>Escaneo</strong> - <a href="../tuto/escaneo.pdf" onClick="window.open(this.href,'Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100);  return false">Descargar</a> </div></td>
    <td width="213"><div align="center"><strong>Correo Electr&oacute;nico</strong> - <a href="../tuto/correo.pdf" onClick="window.open(this.href,'Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100); return false" >Descargar</a> </div></td>
  </tr>
</table>
<form id="listadoSoli" name="listadoSoli" method="post" action="nuevaSolicitud.php">
<table width="1020" border="0">
    <tr>
      <th width="536" scope="row"><div align="left"><b><font face="Verdana" size="2">
        <input name="back" type="submit" id="back" value="Nueva Solicitud" />
     </font></b></div></th>
      <th width="599" scope="row"><div align="right">
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
while ($row=mysql_fetch_array($result)) {
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
