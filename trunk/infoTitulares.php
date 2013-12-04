<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Informacion Titulares</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
body {
	background-color: #CCCCCC;
}
.Estilo4 {
	font-size: 10px;
	font-weight: bold;
}
.Estilo5 {font-family: Papyrus; font-weight: bold; color: #000000; font-size: 24px; }
.Estilo6 {font-size: 11px; font-weight: bold; }
-->
</style>
</head>

<?
include ("conexion.php");
$sql = "select * from titular where nrcuil = '$cuil'";
$result = mysql_db_query("uv0471_intranet",$sql,$db); 
$row=mysql_fetch_array($result);
$prov = $row['provin'];
$emp = $row['empcod'];
$del = $row['delcod'];
$est = "ACTIVO";

if (mysql_num_rows($result) == 0) {
	$sql = "select * from bajatit where nrcuil = '$cuil'";
	$result = mysql_db_query("uv0471_intranet",$sql,$db); 
	$row=mysql_fetch_array($result);
	$prov = $row['provin'];
	$emp = $row['empcod'];
	$del = $row['delcod'];
	$est = "DE BAJA - Desde: ".$row['fecbaj'];
}

$sql2 = "select * from delega where delcod = '$del'";
$result2 = mysql_db_query("uv0471_intranet",$sql2,$db); 
$row2 = mysql_fetch_array($result2);
$nomdel = $row2['nombre'];

$sql0 = "select * from empresa where delcod = '$del' and empcod = '$emp'";
$result0 = mysql_db_query("uv0471_intranet",$sql0,$db); 
$row0 = mysql_fetch_array($result0);

$sql4 = "select * from provin where codigo = '$prov'";
$result4 = mysql_db_query("uv0471_intranet",$sql4,$db); 
$row4=mysql_fetch_array($result4);
?>


<body onUnload="logout.php">
<form id="form1" name="form1" method="post" action="titulares.php">
  <div align="center">
  <table width="546" border="0">
    <tr>
      <th width="44" scope="row"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></th>
        <th scope="row"><div align="right"><font size="3" face="Papyrus">
          <?
 					print ("Afiliado Nro: ".$row['nrafil']." - ".$row['nombre']);
		?>
        </font></div></th>
      </tr>
  </table>
  <table width="548" border="1">
    <tr>
      <th width="167" scope="row"><div align="left">Documento</div></th>
        <td width="365"><?
		$des=$row['tipdoc'];
		$sql2 = "select * from tipodocu where codigo = '$des'";
		$result2 = mysql_db_query("uv0471_intranet",$sql2,$db); 
		$row2 = mysql_fetch_array($result2);
 		print ($row2['descri']);
		print (": ");
		print ($row['nrodoc']);
		?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Domicilio</div></th>
        <td><?
 						print ($row['domici']);
					?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Localidad</div></th>
        <td><?
 						print ($row['locali']);
					?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Provincia</div></th>
        <td><?
 						print ($row4['nombre']);
					?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">C.P.</div></th>
        <td><?
 						print ($row['codpos']);
					?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Fecha Nacimiento </div></th>
        <td><?
 						print ($row['fecnac']);
					?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">CUIL</div></th>
        <td><?
		if ($_SESSION['delcod'] == "$del") {
			print("<a href=javascript:void(window.open('aporteIndividual.php?cuil=".$row['nrcuil']."'))>".$row['nrcuil']."</a>");
		} else {
 			print ($row['nrcuil']);
		}
					?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Delegaci&oacute;n</div></th>
      <td><? print ($nomdel); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Empresa</div></th>
      <td><? print ($row0['nombre']); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Estado </div></th>
      <td><? print ($est); ?></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Categoria</div></th>
        <td><?
 						print ($row['catego']);
					?></td>
      </tr>
    <tr>
      <th scope="row"><div align="left">Feche de ingreso </div></th>
        <td><?
 						print ($row['fecing']);
					?></td>
      </tr>
  </table>
  <p class="Estilo6">*Si el empleado pertenece a su Delegacion. Haciendo click sobre su CUIL se motrar&aacute;n sus aportes individuales </p>
  </div>
  <p class="Estilo5">Familiares</p>

<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
<tr>
    <td width="329"><div align="center"><strong><font size="1" face="Verdana">Nombre y Apellido </font></strong></div>      <div align="center"></div></td>
    <td width="177"><div align="center"><strong><font size="1" face="Verdana">Documento </font></strong></div></td>
	<td width="156"><div align="center"><strong><font size="1" face="Verdana">Parentesco </font></strong></div></td>
	<td width="157"><div align="center"><strong><font size="1" face="Verdana">Sexo </font></strong></div></td>
	<td width="174"><div align="center"><strong><font size="1" face="Verdana">Fecha de Nacimiento </font></strong></div></td>
	<td width="174"><div align="center"><strong><font size="1" face="Verdana">C.U.I.L. </font></strong></div></td>
</tr>
<p>
<?
if ($est == "ACTIVO") {
$sql1 = "select * from familia where nrafil = '$nrafil'";
$result1 = mysql_db_query("uv0471_intranet",$sql1,$db); 
} else {
$sql1 = "select * from bajafam where nrafil = '$nrafil'";
$result1 = mysql_db_query("uv0471_intranet",$sql1,$db); 
}


while ($row1=mysql_fetch_array($result1)) {
	$des1=$row1['tipdoc'];
	$sql3 = "select * from tipodocu where codigo = '$des1'";
	$result3 = mysql_db_query("uv0471_intranet",$sql3,$db); 
	$row3 = mysql_fetch_array($result3);

	if ($row1['codpar'] == 4 ) {
		$despare="Madre";
	}
	if ($row1['codpar'] == 5 ) {
		$despare="Padre";
	}
	if ($row1['codpar'] == 6 ) {
		$despare="Conyuge";
	}
	if ($row1['codpar'] == 7 ) {
		$despare="Concubino";
	}
	if ($row1['codpar'] == 8 ||  $row1['codpar'] == 9) {
		$despare="A cargo";
	}
	if ($row1['codpar'] >= 10 ) {
		$despare="Hijo";
	}

	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['nombre']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row3['descri'].": ".$row1['nrodoc']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$despare."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['ssexxo']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['fecnac']."</font></td>");
	print ("<td width=111><div align=center><font face=Verdana size=1>".$row1['nrcuil']."</font></td>");
	print ("</tr>");
}
?>
</p>
</table>


<table width="1024" border="0">
  <tr>
    <th width="304" scope="row"><div align="left" class="Estilo4"></div></th>
    <th width="707" scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
</form>
</body>
</html>
