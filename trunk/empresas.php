<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Empresas</title>
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
	color: #666666;
	font-weight: bold;
}
-->
</style>
</head>

<?
include ("conexion.php");
$sql = "select * from empresa where delcod = $delcod order by '$orden'";
$result = mysql_db_query("uv0471_intranet",$sql,$db); 
?>


<body onUnload="logout.php">
<form id="form1" name="form1" method="post" action="empresas.php">
<table width="1142" border="0">
  <tr>
    <td scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">EMPRESAS</p>
    </div></td>
    <td width="752">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" scope="row"><div align="right" class="Estilo4">O.S.P.I.M.</div></td>
  </tr>
  <tr>
    <td width="79"><strong>Seleccione el orden: </strong></td>
    <td width="93"><select name="orden" id="orden">
        <option value="empcod" selected="selected">C&oacute;digo</option>
        <option value="nombre">Nombre</option>
        <option value="nrcuit">C.U.I.T.</option>
		<option value="copole">Cod. Pos.</option>
    </select></td>
    <td width="200"><label><b><font face="Verdana" size="2">
      <input name="back2" type="submit" id="back2" value="LISTAR" />
    </font></b> </label></td>
    <td scope="row">&nbsp;</td>
  </tr>
</table>

</form>
<form id="form2" name="form2" method="post" action="menu.php">
<table width="1145" border="0">
    <tr>
      <th width="536" scope="row"><div align="left"><b><font face="Verdana" size="2">
        <input name="back" type="submit" id="back" value="VOLVER" />
     </font></b></div></th>
      <th width="599" scope="row"><div align="right">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
      </div></th>
    </tr>
  </table>
</form>

<table border="1" width="1145" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="111"><div align="center"><strong><font size="1" face="Verdana">C&oacute;digo</font></strong></div></td>
    <td width="333"><div align="center"><strong><font size="1" face="Verdana">Raz&oacute;n Social </font></strong></div></td>
    <td width="220"><div align="center"><strong><font size="1" face="Verdana">CUIT</font></strong></div></td>
	<td width="120"><div align="center"><strong><font size="1" face="Verdana">Cod. Pos.</font></strong></div></td>
    <td width="120"><div align="center"><strong><font size="1" face="Verdana">+ Informacion </font></strong></div></td>
	<td width="120"><div align="center"><strong><font size="1" face="Verdana">Estado de Cuenta </font></strong></div></td>
	<td width="120"><div align="center"><strong><font size="1" face="Verdana">Listado de Titulares </font></strong></div></td>
  </tr>
  <p>
<?
while ($row=mysql_fetch_array($result)) {
print ("<td width=111><font face=Verdana size=1>".$row['empcod']."</font></td>");
print ("<td width=333><font face=Verdana size=1><b>".$row['nombre']."</b></font></div></td>");
print ("<td width=220><div align=center><font face=Verdana size=1>".$row['nrcuit']."</font></td>");
print ("<td width=120><div align=center><font face=Verdana size=1>".$row['copole']."</font></td>");
print ("<td width=120><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('infoEmpresas.php?cuit=".$row['nrcuit']."'))>".FICHA."</font></div></td>");
print ("<td width=120><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('cuenta.php?empcod=".$row['empcod']."'))>".CUENTA."</font></div></td>");
print ("<td width=120><div align=center><font face=Verdana size=1><a href=titulares.php?empcod=".$row['empcod'].">".TITULARES."</font></div></td>");
print ("</tr>");
}
?>
</p>
</table>
</form>
</body>
</html>
