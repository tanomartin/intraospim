<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
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
<table width="1020" border="0" style="margin-bottom: 10px">
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
  
<table border="1" width="1020" style="border-color: #D08C35; font-family: Verdana, Geneva, sans-serif; font-size: 11px; text-align: center;" cellpadding="2" cellspacing="0">
  <tr>
    <th>N&uacute;mero</th>
    <th>Fecha</th>
    <th>Estado</th>
	<th>C.U.I.L Beneficiario </th>
    <th>Nombre Beneficiario </th>
	<th>Tipo</th>
  </tr>
<?php
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
$sql = "select * from autorizacionprocesada where delcod = $delcod order by nrosolicitud DESC";
$result = mysql_query($sql,$db);
while ($row = mysql_fetch_array($result)) { ?>
	<tr>
		<td><a href="javascript:void(window.open('infoAuto.php?nrosolicitud=<?php echo $row['nrosolicitud'] ?>'))"><?php echo $row['nrosolicitud'] ?></a></td>
		<td><?php echo invertirFecha($row['fechasolicitud']) ?></td>
		<td><b><?php echo estado($row['statusverificacion'],$row['statusautorizacion']) ?></b></td>
		<td><?php echo $row['nrcuil'] ?></td>
		<td><?php echo $row['nombre'] ?></td>
		<td><?php echo tipo($row['tiposolicitud']) ?></td>
	</tr>
<?php } ?>
</table>
</form>
</body>
</html>
