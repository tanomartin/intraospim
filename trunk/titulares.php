<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Titulares</title>
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

<?php
include ("conexion.php");
$empcod = $_GET['empcod'];
$delcod = $_SESSION['delcod'];
$sql1 = "select * from empresa where delcod = $delcod and empcod = '$empcod'";
$result1 = mysql_query($sql1,$db); 
$row1 = mysql_fetch_array($result1);
$nrocuit = $row1['nrcuit'];


$sql = "select * from titular where delcod = $delcod and empcod = '$empcod' order by '$orden'";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
?>


<body>
<form id="form1" name="form1" method="post" action="titulares.php?empcod=<?php echo $row1["empcod"]; ?>">
<table width="1025" border="0">
  <tr>
    <td scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">NOMINA DE TITULARES </p>
    </div></td>
    <td width="635"><div align="right" class="Estilo3"><font size="2" face="Papyrus">
      <?php print ($row1['nombre']);?>
    </font></div></td>
  </tr>
  
  <tr>
    <td width="79"><strong>Seleccione el orden: </strong></td>
    <td width="93"><select name="orden" id="orden">
        <option value="nrafil" selected="selected">N&ordm; Afiliado</option>
        <option value="nombre">Nombre</option>
        <option value="nrcuil">C.U.I.L.</option>
        <option value="nrodoc">N&ordm; Doc.</option>
    </select></td>
    <td width="200"><label><b><font face="Verdana" size="2">
      <input name="back2" type="submit" id="back2" value="LISTAR" />
    </font></b> </label></td>
    <td scope="row"><div align="right"><span class="Estilo4">O.S.P.I.M.</span></div></td>
  </tr>
</table>
</form>

<table width="1026" border="0">
    <tr>
      <th width="536" scope="row"><div align="left"><b><font face="Verdana" size="2">
        <input name="volvar" value="Volver" type="button" onclick="location.href='empresas.php'" />
     </font></b></div></th>
      <th width="480" scope="row"><div align="right">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
      </div></th>
    </tr>
</table>

<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="116"><div align="center"><strong><font size="1" face="Verdana">N&uacute;mero Afiliado </font></strong></div></td>
    <td width="220"><div align="center"><strong><font size="1" face="Verdana">Apellido, Nombre </font></strong></div></td>
    <td width="145"><div align="center"><strong><font size="1" face="Verdana">CUIL </font></strong></div></td>
    <td width="208"><div align="center"><strong><font size="1" face="Verdana">Documento (Tipo - N&uacute;mero) </font></strong></div></td>
    <td width="118"><div align="center"><strong><font size="1" face="Verdana">+ Informacion </font></strong></div></td>
	<td width="180"><div align="center"><strong><font size="1" face="Verdana">Aportes Individuales </font></strong></div>	  <div align="center"></div></td>
  </tr>
<?php
while ($row=mysql_fetch_array($result)) {
	$des=$row['tipdoc'];
	$sql2 = "select * from tipodocu where codigo = '$des'";
	$result2 = mysql_query($sql2,$db); 
	$row2 = mysql_fetch_array($result2);
	
	print ("<td width=124><div align=center><font face=Verdana size=1>".$row['nrafil']."</font></div></td>");
	print ("<td width=187><font face=Verdana size=1><b>".$row['nombre']."</b></font></td>");
	print ("<td width=170><div align=center><font face=Verdana size=1>".$row['nrcuil']."</font></div></td>");
	print ("<td width=208><div align=center><font face=Verdana size=1>".$row2['descri']."-".$row['nrodoc']."</font></div></td>");
	print ("<td width=118><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('infoTitulares.php?cuil=".$row['nrcuil']."&nrafil=".$row['nrafil']."&empcod=".$empcod."'))>".FICHA."</font></div></td>");
	print ("<td width=180><div align=center><font face=Verdana size=1><a href=javascript:void(window.open('aporteIndividual.php?cuil=".$row['nrcuil']."'))>".APORTES."</font></div></td>");
	print ("</tr>");
}
?>
</table>
</body>
</html>
