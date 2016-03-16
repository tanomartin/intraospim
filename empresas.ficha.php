<?php include ("verificaSesion.php");

$cuit = $_GET['nrcuit'];
$sql = "select e.*, p.nombre as provin from empresa e, provin p where e.nrcuit = '$cuit' and e.provle = p.codigo";
$result = mysql_query($sql,$db);
$row=mysql_fetch_array($result);
?>

<!DOCTYPE html>
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

<body>
<form id="form1" name="form1">
  <div align="center">
    <table style="width: 546px">
      <tr>
        <td width="474"><div align="right" class="Estilo3"><font size="3" face="Verdana"> <?php print ($row['nombre']);?> </font></div></td>
    </tr>
    </table>
    <table style="width: 546px; border: 1px solid">
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
    <table style="width: 549px">
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
