<?php session_save_path("../sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: ../logintranet.php?err=2");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle Solicitud</title>
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
.Estilo4 {
	color: #990000;
	font-weight: bold;
}
-->
</style>
</head>

<?php
include ("lib/funciones.php");
include ("../conexion.php");
$nrosolicitud = $_GET['nrosolicitud'];
$delcod = $_SESSION['delcod'];
$sql = "select * from autorizacionprocesada where delcod = $delcod and nrosolicitud = $nrosolicitud";
$result = mysql_query($sql,$db); 
$row=mysql_fetch_array($result)
?>

<body>
<table width="739" border="0">
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">Solicitud N&uacute;mero <?php echo $nrosolicitud ?></p>
    </div></td>
    <td width="328"><table width="328" height="60" border="2">
      <tr>
        <td height="25"><div align="center"><strong>Fecha Solicitud</strong> </div></td>
        <td><div align="center"><?php echo  invertirFecha($row['fechasolicitud']);?></div></td>
      </tr>
      <tr>
        <td width="107" height="25"><div align="center"><strong>Status</strong> </div></td>
        <td width="203"><div align="center"><?php echo estado($row['statusverificacion'],$row['statusautorizacion']) ?></div></td>
      </tr>
    </table>
      <div align="right"></div></td>
  </tr>
</table>
<table width="739" border="0">
  <tr>
    <td width="365" height="50"><h3 class="Estilo4">Informaci&oacute;n del Beneficiario </h3></td>
    <td width="364"><h3 class="Estilo4">Informaci&oacute;n Solicitud </h3></td>
  </tr>
  <tr>
    <td><p><strong>N&uacute;mero de Afiliado:</strong> <?php echo $row['nrafil']?></p>
      <p><strong>Apellido y Nombre: </strong><?php echo $row['nombre']?></p>
    <p><strong>C.U.I.L.:</strong> <?php echo $row['nrcuil'] ?></p>
    <p><strong>Tipo:</strong> <?php echo tipoBene($row['codpar']) ?></p>
    <p><strong>Fecha Verficaci&oacute;n:</strong>
      <?php if ($row['fechaverificacion'] != NULL) {
					echo invertirFecha($row['fechaverificacion']);
			  } else {
			  		echo "Pendiente";
			  } 
		?>
- <?php echo $row['rechazoverificacion'] ?></p></td>
    <td valign="top"><p><strong>Tipo: </strong><?php echo tipo($row['tiposolicitud']) ?></p>
      <p><strong>Fecha Autorizaci&oacute;n:</strong>
          <?php if ($row['fechaautorizacion'] != NULL) {
					echo invertirFecha($row['fechaautorizacion']);
			  } else {
			  		echo "Pendiente";
			  } 
		?>
    - <?php echo $row['rechazoautorizacion'] ?></p>
      <p>&nbsp;</p>
      <p>
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
      </p></td>
  </tr>
</table>
</body>
</html>