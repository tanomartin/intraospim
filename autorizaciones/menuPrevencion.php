<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Programa Prevencion de la Salud</title>
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
.Estilo11 {font-size: 18px; font-weight: bold; }
-->
</style>
</head>

<body>
<table width="1020" border="0">
  
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td width="571" scope="row"><div align="left">
      <p class="Estilo3">Programa Prevencion de la Salud</p>
    </div></td>
    <td width="256" scope="row"><div align="center"><span class="Estilo5">Tutorial</span></div></td>
    <td width="83" colspan="2"><div align="center">
      <input type="button" name="volver2" value="Descargar" onclick="window.open('../tuto/escaneo.pdf','Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100)"/>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1020" border="1" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="502" class="Estilo5"><div align="center" class="Estilo11"><a href="listadoCancerMama.php">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Mama</a></div></td>
    <td width="502" class="Estilo5"><div align="center" class="Estilo11"><a href="listadoCanceUterino.php">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Cuello Uterino</a></div></td>
  </tr>
  <tr>
    <td class="Estilo5"><div align="center" class="Estilo11"><a href="listadoDiabetes.php">Programa de Prevenci&oacute;n de Diabetes</a></div></td>
    <td class="Estilo5"><div align="center" class="Estilo11"><a href="listadoHipertension.php">Programa de Prevenci&oacute;n de Hipertensi&oacute;n Arterial</a></div></td>
  </tr>
  <tr>
    <td class="Estilo5"><div align="center" class="Estilo11"><a href="listadoMaternoInfantil.php">Plan Materno Infantil</a></div></td>
    <td class="Estilo5"><div align="center" class="Estilo11"><a href="listadoOdontologica.php">Programa de Prevenci&oacute;n Odontol&oacute;gica</a></div></td>
  </tr>
  <tr>
    <td class="Estilo5"><div align="center" class="Estilo11"><a href="listadoPrenatal.php">Programa de Control Prenatal</a></div></td>
    <td class="Estilo5"><div align="center" class="Estilo11"><a href="listadoSaludSexual.php">Programa de Salud Sexual y Procreaci&oacute;n Responsable</a></div></td>
  </tr>
</table>
</body>
</html>
