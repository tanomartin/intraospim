<? session_save_path("../../sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OSPIM :: Ficha de titular</title>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
.Estilo5 {font-family: Papyrus; font-weight: bold; color: #000000; font-size: 24px; }
-->
</style>
</head>

<?
//  CONSULTA SOBRE LA TABLA TITULARES CON EL NUMERO DE AFILIADO PASADO POR URL
include ("../conexion.php");
$nrafil = $_GET['nrafil'];
$sql0 = "SELECT * FROM `titular` WHERE nrafil = '$nrafil' ";
$result0 = mysql_db_query("uv0471_intranet",$sql0,$db); 
$row0 = mysql_fetch_array($result0);
?>


<body onUnload="../../logout.php">
<form id="form1" name="form1" method="post" action="../empleados/empleados.php">
  <div align="center">
  <table width="546" border="0">
    <tr>
      <th width="44" scope="row"><img src="logoSolo.JPG" width="76" height="62" /></th>
        <th width="218" scope="row"><div align="left"></div></th>
        <td width="270"><div align="right"></div></td>
      </tr>
  </table>
  <table width="548" border="1">
    <tr>
      <th scope="row"><div>
        <div align="left">Apellido y Nombre </div>
      </div></th>
      <td><?php 
				echo $row0['nombre'];
	  ?>
	  &nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div>
        <p align="left">Sexo</p>
        </div></th>
      <td><?php 
	  				echo $row0['ssexxo'];
	  ?>
	  &nbsp;</td>
    </tr>
    <tr>
      <th width="202" scope="row"><div align="left">Documento</div></th>
        <td width="330"><?php 				echo $row0['nrodoc']; 
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Domicilio</div></th>
        <td><?php 				echo $row0['domici']; 
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Localidad</div></th>
        <td><?php 				echo $row0['locali'];
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Provincia</div></th>
        <td><?php 				echo $row0['provin'];
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div align="left">C.P.</div></th>
        <td><?php 				echo $row0['codpos'];
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Fecha Nacimiento </div></th>
        <td><?php 				echo $row0['fecnac'];
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div>
        <div align="left">Estado Civil </div>
      </div></th>
      <td><?php 				echo $row0['estciv'];
	  ?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">CUIL</div></th>
        <td><?php 				echo $row0['nrcuil'];
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div>
        <div align="left">Nacionalidad</div>
      </div></th>
      <td><?php 				echo $row0['nacion'];
	  ?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div>
        <div align="left">Nro. Afiliado </div>
      </div></th>
      <td><?php 				echo $row0['nrafil'];
	  ?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Categoria</div></th>
        <td><?php 				echo $row0['catego'];
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div>
        <p align="left">C&oacute;digo de Delegaci&oacute;n </p>
        </div></th>
      <td><?php 				echo $row0['delcod'];
	  ?>&nbsp;</td>
    </tr>
    <tr>
      <th height="28" scope="row"><div>
        <div align="left">C&oacute;digo de Empresa </div>
      </div></th>
      <td><?php 				echo $row0['empcod'];
	  ?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Fecha de ingreso </div></th>
        <td><?php 				echo $row0['fecing'];
		?>&nbsp;</td>
      </tr>
    <tr>
      <th scope="row"><div>
        <div align="left">Fecha de ingreso (empresa) </div>
      </div></th>
      <td><?php 				echo $row0['fecemp'];
	  ?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">En Actividad</div></th>
        <td>&nbsp;</td>
      </tr>
  </table>
  </div>
  <p class="Estilo5">Familiares</p>

<table border="1" width="587" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
<tr>
    <td width="111"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Apellido y nombre </font> </font></strong></div></td>
    <td width="111"><div align="center"><strong><font size="1" face="Verdana">Documento </font></strong></div></td>
	<td width="111"><div align="center"><strong><font size="1" face="Verdana">Parentesco </font></strong></div></td>
	<td width="111"><div align="center"><strong><font size="1" face="Verdana">Sexo </font></strong></div></td>
	<td width="111"><div align="center"><strong><font size="1" face="Verdana">Fecha de Nacimiento </font></strong></div></td>
</tr>
<p>
<?
$sql1 = "select * from familia where nrafil = '$nrafil'";
$result1 = mysql_db_query("uv0471_intranet",$sql1,$db);
while ($row1=mysql_fetch_array($result1)) {
	print ("<td width=111><font face=Verdana size=1>".$row1['nombre']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['tipdoc'].": ".$row1['nrodoc']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['codpar']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['ssexxo']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['fecnac']."</font></td>");
	print ("</tr>");
}
?>
</p>
</table>


<table width="1024" border="0">
  <tr>
    <th width="304" scope="row">&nbsp;</th>
    <th width="707" scope="row">&nbsp;</th>
  </tr>
</table>
<div align="center"> 
  <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
</div>
</form>
</body>
</html>
