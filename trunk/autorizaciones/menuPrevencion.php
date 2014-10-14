<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Programa Prevencion de la Salud</title>
<link rel="stylesheet" type="text/css" href="css/general.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<div align="center">
<table width="1020" border="0">
  <tr>
    <td width="92" scope="row"><div align="center"><span class="style_titulo"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td width="698" scope="row"><div align="left">
      <p class="style_titulo">Programa Prevenci&oacute;n de la Salud</p>
    </div></td>
    <td width="129" scope="row"><div align="center"><span class="style_tutorial">Tutorial</span></div></td>
    <td width="83" colspan="2"><div align="center">
	<a class="style_boton2" href="#" onClick="window.open('../tuto/prevencion.pdf','Info','resizable=YES, Scrollbars=YES', width=800,height=600, top=150, left=100)">Descargar</a>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1020" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td height="54"><div align="center"><a class="style_boton1" href="listadoCancerMama.php">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Mama</a></div></td>
    <td height="54"><div align="center"><a class="style_boton1 boton2" href="listadoCanceUterino.php">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Cuello Uterino</a></div></td>
  </tr>
  <tr>
    <td height="54"><div align="center"><a class="style_boton1 boton3" href="listadoDiabetes.php">Programa de Prevenci&oacute;n de Diabetes</a></div>
    </td>
    <td height="54"><div align="center"><a class="style_boton1 boton4" href="listadoHipertension.php">Programa de Prevenci&oacute;n de Hipertensi&oacute;n Arterial</a></div></td>
  </tr>
  <tr>
    <td height="54"><div align="center"><a class="style_boton1 boton5" href="listadoMaternoInfantil.php">Plan Materno Infantil</a></div></td>
    <td height="54"><div align="center"><a class="style_boton1 boton6" href="listadoOdontologica.php">Programa de Prevenci&oacute;n Odontol&oacute;gica</a></div></td>
  </tr>
  <tr>
    <td height="54"><div align="center"><a class="style_boton1 boton7" href="listadoPrenatal.php">Programa de Control Prenatal</a></div></td>
    <td height="54"><div align="center"><a class="style_boton1 boton8" href="listadoSaludSexual.php">Programa de Salud Sexual y Procreaci&oacute;n Responsable</a></div></td>
  </tr>
</table>
</div>
</body>
</html>