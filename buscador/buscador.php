<? session_save_path("../sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OSPIM :: Buscador de beneficiarios</title>
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



<body onUnload="../logout.php">
<form ACTION="results.php" METHOD=POST name="form1" id="form1"> 
<table width="1025" border="0">
  <tr>
    <td scope="row"><div align="center"><span class="Estilo3"><img src="logoSolo.JPG" width="76" height="62" /></span></div></td>
    <td colspan="2" scope="row"><div align="left">
      <p class="Estilo3">BUSCADOR DE BENEFICIARIOS </p>
    </div></td>
    <td width="519"><div align="right" class="Estilo3"><font size="2" face="Papyrus">     
    </font></div></td>
  </tr>
  <tr>
    <td colspan="4" scope="row"><div align="right" class="Estilo4">O.S.P.I.M.</div></td>
  </tr>
  <tr>
    <td width="90"><strong>Seleccione  la condici&oacute;n: </strong></td>
    <td width="138"><select name="orden" id="orden">
        <option value="nombre" >Apellido</option>
        <option value="nrodoc">Nro. Documento</option>
        <option value="nrcuil">C.U.I.L.</option>
        <option value="nrafil">Nro. Afiliado</option>
    </select></td>
    <td width="260"><label><b><font face="Verdana" size="2">
      </font></b>
        <input type="text" name="condicion" />
        <b><font face="Verdana" size="2">
        <input name="back2" type="submit" id="back2" value="BUSCAR" />
    </font></b></label></td>
    <td scope="row"><div align="right"><a href="../menu.php">Volver a men&uacute; principal </a></div></td>
  </tr>
</table>
</form>


</body>
</html>
