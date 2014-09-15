<?php session_save_path("../sesiones");
session_start();
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
$sql = "SELECT * FROM cancermama WHERE delcod = $delcod ORDER BY id DESC";
$result = mysql_query($sql,$db);
$cantidad = mysql_num_rows($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Mama</title>
<style type="text/css" media="print">
.nover {display:none}
</style>
<link rel="stylesheet" href="lib/jquery.tablesorter/themes/theme.blue.css" type="text/css" id="" media="print, projection, screen" />
<link rel="stylesheet" type="text/css" href="css/general.css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="lib/jquery.tablesorter/jquery.tablesorter.js" type="text/javascript"></script>
<script src="lib/jquery.tablesorter/jquery.tablesorter.widgets.js" type="text/javascript"></script>
<script src="/lib/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	$("#listado")
	.tablesorter({
		theme: 'blue', 
		widthFixed: true, 
		widgets: ["zebra", "filter"], 
		headers:{},
		widgetOptions : { 
			filter_cssFilter   : '',
			filter_childRows   : false,
			filter_hideFilters : false,
			filter_ignoreCase  : true,
			filter_searchDelay : 300,
			filter_startsWith  : false,
			filter_hideFilters : false,
		}
	})
	.tablesorterPager({container: $("#paginador")}); 
});
</script>
</head>
<body>
<div align="center">
<table width="1020" border="0">
  <tr>
    <td width="92" scope="row"><div align="center"><span class="Estilo3"><img src="../logoSolo.JPG" width="92" height="81" /></span></div></td>
    <td width="660" scope="row"><div align="left">
      <p class="style_titulo">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Mama</p>
    </div></td>
    <td width="250" scope="row"><div align="right">
	<a class="style_boton3 nover" href="#" onClick="location.href='menuPrevencion.php'">Volver a Programa de Prevención</a>
    </div></td>
  </tr>
</table>
<form id="listadoCancerMama" name="listadoCancerMama" method="post" action="agregaCancerMama.php">
<table width="1020" border="0">
    <tr>
      <td width="510" scope="row"><div align="left">
        <input type="submit" name="nuevoregistro" id="nuevoregistro" class="style_boton4 nover" value="Nuevo Registro" />
      </div></td>
      <td width="510" scope="row"><div align="right">
        <input type="button" name="imprimir" id="imprimir" class="style_boton4 nover" value="Imprimir" onclick="window.print();" />
      </div></td>
    </tr>
</table>
<table class="tablesorter" id="listado">
	<thead>
		<tr align="center">
			<th>Registro</th>
			<th>Profesional</th>
			<th>Fecha</th>
			<th>C.U.I.L Beneficiario</th>
			<th>Nombre Beneficiario</th>
			<th>Tipo Afiliado</th>
		</tr>
	</thead>
	<tbody>
	<?php
	while ($row = mysql_fetch_array($result)) {
		if($row['codpar']==1) {
			$codpar="Titular";
		} else {
			$codpar="Familiar";
		}
	?>
		<tr align="center">
			<td><a id="editaRegistro" title="Click para Editar el Registro" href='modificaCancerMama.php?nrosolicitud=<?php echo $row['id']; ?>'><?php echo $row['id']; ?></a></td>
			<td><?php echo $row['profesional']; ?></td>
			<td><?php echo invertirFecha($row['fechaatencion']); ?></td>
			<td><?php echo $row['nrcuil']; ?></td>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $codpar; ?></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
</form>
<table width="245" border="0">
      <tr>
        <td width="239">
		<div id="paginador" class="pager">
		  <form class="nover">
			<p align="center">
			  <img src="img/first.png" width="16" height="16" class="first"/> <img src="img/prev.png" width="16" height="16" class="prev"/>
			  <input name="text" type="text" class="pagedisplay" style="background:#CCCCCC; text-align:center" size="8" readonly="readonly"/>
		    <img src="img/next.png" width="16" height="16" class="next"/> <img src="img/last.png" width="16" height="16" class="last"/>
		    <select name="select" class="pagesize">
		      <option selected="selected" value="10">10 por pagina</option>
		      <option value="20">20 por pagina</option>
		      <option value="30">30 por pagina</option>
		      <option value="<?php echo $cantidad;?>">Todos</option>
		      </select>
		    </p>
		  </form>
		</div>
	</td>
      </tr>
  </table>
</div>
</body>
</html>
