<?php 
include ("verificaSesionAutorizaciones.php");
include ("lib/funciones.php");
$delcod = $_SESSION['delcod'];
$sql = "SELECT * FROM odontologica WHERE delcod = $delcod ORDER BY id DESC";
$result = mysql_query($sql,$db);
$cantidad = mysql_num_rows($result);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Programa de Prevenci&oacute;n de Diabetes</title>
	
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
	
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="../include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="css/general.css" />
	
	<script type="text/javascript" src="../include/js/jquery-2.2.0.min.js" ></script>
	<script type="text/javascript" src="../include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../include/js/jquery.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="../include/js/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script> 

	<script type="text/javascript">
	$(document).ready(function(){
		$("#listado")
		.tablesorter({
			theme: 'blue', 
			widthFixed: true, 
			widgets: ["zebra", "filter"], 
			headers:{6:{sorter:false, filter:false}},
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
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="../menu.php"> <img style="max-width:38px; margin-top: -9px;" src="../images/logo.png" /></a>
				</div>
				<div class="nav navbar-no teop-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" >(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="../logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="../empresas.php">Empresas</a></li>
					<li><a href="../beneficiarios.php">Beneficiarios</a></li>
					<?php if ($_SESSION['tienePrevencion']) {?><li><a href="../prevencion/menuPrevencion.php">Prev. Salud</a></li><?php } ?>
					<?php if ($_SESSION['tieneAutorizacion']) {?><li><a href="../autorizaciones/listado.php">Autorizaciones</a></li><?php } ?>
					<li><a href="../documentos.php">Inst. y Forms.</a></li>
					<li><a href="../consultas.php">Consultas</a></li>
				</ul>
			</nav>
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-plus"></i><br>Prevención de la Salud</h2>
			<h3>Programa de Prevenci&oacute;n Odontol&oacute;gica</h3>
			
			<div class="col-md-10 col-md-offset-1">
				<div>
					<input style="float: left;" type="button" name="nuevoregistro" id="nuevoregistro" onclick="location.href='agregaOdontologica.php'" class="style_boton4 nover" value="Nuevo Registro" />
					<div style="float: right;"><a class="nover" href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px; margin-bottom: 20px"  class="glyphicon glyphicon-print"></i></a></div>
				</div>

				<table class="tablesorter" id="listado">
					<thead>
						<tr align="center">
							<th>Registro</th>
							<th>Profesional</th>
							<th>Fecha</th>
							<th>C.U.I.L Beneficiario</th>
							<th>Nombre Beneficiario</th>
							<th>Tipo Afiliado</th>
							<th></th>
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
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['profesional']; ?></td>
							<td><?php echo invertirFecha($row['fechaatencion']); ?></td>
							<td><?php echo $row['nrcuil']; ?></td>
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $codpar; ?></td>
							<td><a href='#'><i title="Editar" class="glyphicon glyphicon-pencil"></i></a></td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
				<table style="width: 245px">
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
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
		  	</div>
		</div>
	</div>
</body>
</html>
