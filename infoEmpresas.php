<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
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

<?
include ("conexion.php");
$sql = "select * from empresa where nrcuit = '$cuit'";
$result = mysql_db_query("uv0471_intranet",$sql,$db); 
$row=mysql_fetch_array($result);
$prov = $row['provle'];

$sql1 = "select * from provin where codigo = '$prov'";
$result1 = mysql_db_query("uv0471_intranet",$sql1,$db); 
$row1=mysql_fetch_array($result1);
?>


<body onUnload="logout.php">
<form id="form1" name="form1">
  <div align="center">
    <table width="546" border="0">
      <tr>
        <th width="56" scope="row"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></th>
       <td width="474"><div align="right" class="Estilo3"><font size="3" face="Verdana">
         <?
 				print ($row['nombre']);
		?>
        </font></div></td>
    </tr>
    </table>
    <table width="548" border="1">
      <tr>
        <th width="167" scope="row"><div align="left">C&oacute;digo Empresa </div></th>
      <td width="365"><?
 						print ($row['empcod']);
					?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Domicilio</div></th>
      <td><?
 						print ($row['domile']);
					?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Localidad</div></th>
      <td><?
 						print ($row['locale']);
					?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Provincia</div></th>
      <td><?
 						print ($row1['nombre']);
					?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">C.P.</div></th>
      <td><?
 						print ($row['copole']);
					?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Tel&eacute;fono</div></th>
      <td><?
 						print ($row['telef1']);
					?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">CUIT</div></th>
      <td><?
 						print ($row['nrcuit']);
					?></td>
    </tr>
      <tr>
        <th scope="row"><div align="left">Fecha Inicio </div></th>
      <td><?
 						print ($row['fecini']);
					?></td>
    </tr>
      <tr>
        <th colspan="2" scope="row"><div align="right">O.S.P.I.M.</div></th>
    </tr>
   </table>
    <table width="549" border="0">
      <tr>
        <th width="270" scope="row">&nbsp;</th>
      <th width="271" scope="row"><div align="right">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
        </div></th>
    </tr>
   </table>
  </div>
</form>
</body>
</html>
