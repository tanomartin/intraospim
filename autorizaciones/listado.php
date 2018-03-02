<?php include ("verificaSesionAutorizaciones.php"); 
include_once ("lib/funciones.php");
$sql = "SELECT * FROM autorizacionprocesada WHERE delcod = ".$_SESSION['delcod']." ORDER BY nrosolicitud DESC";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Listado de Solicitudes</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="../include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="../css/style.css">
	
	<script type="text/javascript" src="../include/js/jquery-2.2.0.min.js" ></script>
	<script type="text/javascript" src="../include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../include/js/jquery.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script> 
	<script type="text/javascript" src="../include/js/jquery.blockUI.js" ></script>

<script>
$(function() {
	$("#solicitudes")
	.tablesorter({
		theme: 'blue', 
		widthFixed: true, 
		headers:{6:{sorter:false, filter:false}},
		widgets: ["zebra", "filter"], 
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
<style type="text/css" media="print">
.nover {display:none}
</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top" style="min-height: 65px">
				<div class="navbar-header" style="margin-left: 10px; margin-top: 7px">
					<a class="navbar-brand" href="../menu.php"> <img style="max-width:38px; margin-top: -9px;" src="../images/logo.png"></a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" ><br>(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="../logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left" style="margin-top: 5px">
					<li><a href="../empresas.php">Empresas</a></li>
					<li><a href="../beneficiarios.php">Beneficiarios</a></li>
					<?php if ($_SESSION['tienePrevencion']) {?><li><a href="../prevencion/menuPrevencion.php">Prev. Salud</a></li><?php } ?>
					<?php if ($_SESSION['tieneAutorizacion']) {?><li><a href="../autorizaciones/listado.php">Autorizaciones</a></li><?php } ?>
					<li><a href="../documentos.php">Docu. y Forms.</a></li>
					<li><a href="../consultas.php">Consultas</a></li>
					<li><a href="../instructivos.php">Instructivos</a></li>
				</ul>
			</nav>
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-ok-sign"></i><br>Autorizaciones</h2>
			
			<div class="col-md-10 col-md-offset-1">
				<div>
					<input style="float: left" class="btn btn-primary nover" type="button" value="Nueva Solicitud" onclick="location.href='listado.nueva.php'" />
					<a href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px; margin-bottom: 20px; float: right;"  class="glyphicon glyphicon-print nover"></i></a>
				</div>
			  
				<table class="tablesorter" id="solicitudes">
				  <thead>
					  <tr>
					    <th>N&uacute;mero</th>
					    <th>Fecha</th>
					    <th class="filter-select" data-placeholder="Seleccione Estado">Estado</th>
						<th>C.U.I.L</th>
					    <th>Nombre</th>
						<th class="filter-select" data-placeholder="Seleccione Tipo">Tipo</th>
						<th>Detalle</th>
					  </tr>
				  </thead>
				  <tbody>
				<?php
				if ($cant > 0) { 
					while ($row = mysql_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['nrosolicitud'] ?></td>
							<td><?php echo invertirFecha($row['fechasolicitud']) ?></td>
							<td><b><?php echo estado($row['statusverificacion'],$row['statusautorizacion']) ?></b></td>
							<td><?php echo $row['nrcuil'] ?></td>
							<td><?php echo $row['nombre'] ?></td>
							<td><?php echo tipo($row['tiposolicitud']) ?></td>
							<td align="center"><a class="nover" target="_blank" href="listado.ficha.php?nrosolicitud=<?php echo $row['nrosolicitud'] ?>"><i style="font-size: 25px"  class="glyphicon glyphicon-info-sign"></i></a></td>
						</tr>	
					<?php } 
				} else { ?>
					<tr><td colspan="6" style="text-align: center;">No Existen autorizaciones</td></tr>
		  <?php } ?>
				  </tbody>
				</table>
				<table style="width: 245; border: 0" class="nover">
			      <tr>
			        <td width="239">
					<div id="paginador" class="pager">
					  <form>
						<p align="center">
						  <span class="glyphicon glyphicon-fast-backward first" aria-hidden="true"></span>
					      <span class="glyphicon glyphicon-backward prev" aria-hidden="true"></span>
						  <input name="text" type="text" class="pagedisplay" style="background:#CCCCCC; text-align:center" size="14" readonly="readonly"/>
					      <span class="glyphicon glyphicon-forward next" aria-hidden="true"></span>
					      <span class="glyphicon glyphicon-fast-forward last" aria-hidden="true"></span>
					      <select name="select" class="pagesize form-control">
					      	<option selected="selected" value="10">10 por pagina</option>
					      	<option value="20">20 por pagina</option>
					      	<option value="30">30 por pagina</option>
					      	<option value="<?php echo $cant;?>">Todos</option>
					      </select>
					    </p>
					 </form>	
					</div>
					</td>
			      </tr>
			  </table>			  
			</div>		
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>
