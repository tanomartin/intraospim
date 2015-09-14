<?php session_save_path("sesiones");
session_start();
include ("verificaSesion.php");
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

<?php
if (isset($_POST['orden'])) {
	$orden = $_POST['orden'];
} else {
	$orden = "delcod";
}
$sql = "select * from empresa where delcod = $delcod order by $orden";
$result = mysql_query($sql,$db); 
?>


<body>
<form id="form1" name="form1" method="post" action="empresas.php">
<table width="1142" border="0" style="margin-bottom: 10px">
  <tr>
    <td scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">EMPRESAS</p>
    </div></td>
    <td width="593"><div align="right"><span class="Estilo4">O.S.P.I.M.</span></div></td>
  </tr>
  <tr>
    <td width="142"><strong>Seleccione el orden: </strong></td>
    <td width="93"><select name="orden" id="orden">
		<option value="nrcuit">C.U.I.T.</option>       
	    <option value="nombre">Nombre</option>
		<option value="copole">Cod. Pos.</option>
    </select></td>
    <td width="296">
      <input name="back2" type="submit" id="back2" value="LISTAR" />    </td>
    <td scope="row"><div align="right">
      <input name="volvar" value="Volver" type="button" onclick="location.href='menu.php'" />
    </div></td>
  </tr>
</table>

<table border="1" width="1145" style="border-color: #D08C35; font-size: 11px; font-family: Verdana, Geneva, sans-serif; text-align: center;" cellpadding="2" cellspacing="0">
  <tr>
  	<th>CUIT</th>
    <th>Raz&oacute;n Social </th> 
	<th>Cod. Pos.</th>
    <th>+ Informacion </th>
	<th>Estado de Cuenta </th>
	<th>Listado de Titulares </th>
  </tr>

<?php
while ($row=mysql_fetch_array($result)) { ?>
	<tr>
		<td><?php echo $row['nrcuit'] ?></td>
		<td><b><?php echo $row['nombre'] ?></b></td>
		<td><?php echo $row['copole'] ?></td>
		<td><a href="javascript:void(window.open('infoEmpresas.php?cuit=<?php echo $row['nrcuit'] ?>'))"><?php echo FICHA ?></a></td>
		<td><a href="javascript:void(window.open('cuenta.php?cuit=<?php echo $row['nrcuit'] ?>'))"><?php echo CUENTA ?></a></td>
		<td><a href="titulares.php?cuit=<?php echo $row['nrcuit'] ?>"><?php echo TITULARES ?></a></td>
	</tr>
<?php }
?>

</table>
</form>
</body>
</html>
