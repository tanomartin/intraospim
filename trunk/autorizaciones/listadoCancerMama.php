<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Mama</title>
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

<body>
<table width="1020" border="0">
  
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td width="740" scope="row"><div align="left">
      <p class="Estilo3">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Mama</p>
    </div></td>
    <td width="174" scope="row"><div align="left">
      <p class="Estilo3">
        <input type="button" name="volver" value="Volver a Programa de Prevención" onclick="location.href='menuPrevencion.php'"/>
      </p>
    </div></td>
  </tr>
</table>
<form id="listadoCancerMama" name="listadoCancerMama" method="post" action="agregaCancerMama.php">
<table width="1020" border="0">
    <tr>
      <th width="499" scope="row"><div align="left"><b><font face="Verdana" size="2">
        <input name="back" type="submit" id="back" value="Nuevo Registro" />
     </font></b></div>
      <div align="center"></div></th>
      <th width="511" scope="row"><div align="right">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
      </div></th>
    </tr>
</table>
  
<table border="1" width="1020" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="93"><div align="center"><strong><font size="1" face="Verdana">Registro</font></strong></div></td>
    <td width="110"><div align="center"><strong><font size="1" face="Verdana">Profesional</font></strong></div></td>
    <td width="183"><div align="center"><strong><font size="1" face="Verdana">Fecha</font></strong></div></td>
	<td width="128"><div align="center"><strong><font size="1" face="Verdana">C.U.I.L Beneficiario </font></strong></div></td>
    <td width="353"><div align="center"><strong><font size="1" face="Verdana">Nombre Beneficiario </font></strong></div></td>
	<td width="115"><div align="center"><strong><font size="1" face="Verdana">Tipo Afiliado</font></strong></div></td>
  </tr>
  <p>
<?php
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
$sql = "SELECT * FROM cancermama WHERE delcod = $delcod ORDER BY id DESC";
$result = mysql_query($sql,$db);
while ($row = mysql_fetch_array($result)) {
	if($row['codpar']==1) {
		$codpar="Titular";
	} else {
		$codpar="Familiar";
	}
	print ("<td width=93><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('modificaCancerMama.php?nrosolicitud=".$row['id']."'))>".$row['id']."</font></div></td>");
	print ("<td width=110><div align=center><font face=Verdana size=1>".$row['profesional']."</font></div></td>");
	print ("<td width=183><div align=center><font face=Verdana size=1><b>".invertirFecha($row['fechaatencion'])."</b></font></div></td>");
	print ("<td width=128><div align=center><font face=Verdana size=1>".$row['nrcuil']."</font></div></td>");
	print ("<td width=353><div align=center><font face=Verdana size=1>".$row['nombre']."</font></div></td>");
	print ("<td width=115><div align=center><font face=Verdana size=1>".$codpar."</font></div></td>");
	print ("</tr>");
}
?>
</p>
</table>
</form>
</body>
</html>
