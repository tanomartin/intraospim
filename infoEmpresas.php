<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Info. Empresa</title>
<style type="text/css">
<!--
.Estilo3 {	font-family: Verdana;
	font-weight: bold;
	color: #000000;
	font-size: 24px;
}
body {
	background-color: #CCCCCC;
}
-->
</style>
</head>

<?php
$cuit = $_GET['cuit'];
$sql = "select e.*, p.nombre as provin from empresa e, provin p where e.nrcuit = '$cuit' and e.provle = p.codigo";
$result = mysql_query($sql,$db); 
$row=mysql_fetch_array($result);
?>


<body>
<form id="form1" name="form1">
  <div align="center">
    <table width="546" border="0">
      <tr>
        <th width="56" scope="row"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></th>
      	<td width="474"><div align="right" class="Estilo3"><font size="3" face="Verdana"> <?php print ($row['nombre']);?> </font></div></td>
    </tr>
    </table>
    <table width="548" border="1">
       <tr>
        <th scope="row"><div align="left">CUIT</div></th>
      <td><?php print ($row['nrcuit']);?></td>
    </tr>
	  <tr>
        <th scope="row"><div align="left">Domicilio</div></th>
     	<td><?php print ($row['domile']);?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Localidad</div></th>
      	<td><?php print ($row['locale']);?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Provincia</div></th>
		<td><?php print ($row['provin']);?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">C.P.</div></th>
      <td><?php print ($row['copole']);?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Tel&eacute;fono</div></th>
      <td><?php print ($row['telef1']);?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Fecha Inicio </div></th>
      <td><?php print ($row['fecini']);?></td>
    </tr>
   </table>
    <table width="549" border="0">
      <tr>
        <th width="270" scope="row"><div align="left">O.S.P.I.M.</div></th>
      	<th width="271" scope="row"><div align="right">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
        </div></th>
    </tr>
   </table>
  </div>
</form>
</body>
</html>
