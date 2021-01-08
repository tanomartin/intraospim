<?php include ("verificaSesionOrdenes.php"); 
include_once ("lib/funciones.php");
$sqlOrden = "SELECT o.*, DATE_FORMAT(o.fechaorden,'%d/%m/%Y') as fechaorden, 
						 DATE_FORMAT(o.fechaestado,'%d/%m/%Y %h:%i:%s') as fechaestado,
                         ordenesconsultarelacional.nroordenrelacional as relacional
				FROM ordenesconsulta o
                LEFT JOIN ordenesconsultarelacional on ordenesconsultarelacional.id = o.id
				WHERE delcod = ".$_SESSION['delcod']."
				ORDER BY id DESC";
$resOrden = mysql_query($sqlOrden,$db);
$canOrden = mysql_num_rows($resOrden);  ?>

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
	$("#ordenes")
	.tablesorter({
		theme: 'blue', 
		widthFixed: true, 
		headers:{5:{sorter:false, filter:false}},
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

function emitir(id, hrefa) {
	hrefa.style.display = "none";
	var iconemitidaid = "icon"+id;
	document.getElementById(iconemitidaid).style.display = "";
	window.location = "listado.emision.php?idconsulta="+id;
}

</script>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<?php include_once ("../navbar.php"); ?>
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-modal-window"></i><br>Órdenes de Consulta</h2>
			<div class="col-md-10 col-md-offset-1">
			    <h3>Ordenes de Consulta Listado Completo</h3>
				<form>
					<table class="tablesorter" id="ordenes">
					  <thead>
						  <tr>
						    <th>Nº</th>
						    <th>Fecha</th>
							<th>C.U.I.L</th>
						    <th>Nombre</th>
						    <th>Fecha VTO</th>
						    <th>C.U.I.L. Titular</th>
						    <th>Info</th>
						  </tr>
					  </thead>
					  <tbody>
					<?php
					if ($canOrden > 0) { 
						while ($rowOrden = mysql_fetch_array($resOrden)) { ?>
							<tr>
								<td><?php echo $rowOrden['id'];
										  if ($rowOrden['relacional'] != NULL ) { echo " (".$rowOrden['relacional'].")"; } ?></td>
								<td><?php echo $rowOrden['fechaorden'] ?></td>
								<td><?php echo $rowOrden['nrcuil'] ?></td>
								<td><?php echo $rowOrden['nombre'] ?></td>
								<td><?php echo $rowOrden['fechavto'] ?>
								<td><?php echo $rowOrden['nrcuiltitular'] ?>
								<td align="center">
								<?php if ($rowOrden['autorizada'] == 1 && $rowOrden['emitida'] == 0) { ?>
										<i style="font-size: 25px; display: none" class="glyphicon glyphicon-info-sign" title="EMITIDA" id="icon<?php echo $rowOrden['id']?>"></i>
								     <?php  if ($_SESSION['delcod'] != '2602') { ?>
        										<a onclick="emitir('<?php echo $rowOrden['id']?>', this)">
        											<i style="font-size: 25px; cursor: pointer " class="glyphicon glyphicon-download" title="DESCARGAR"></i>
        										</a>
    							      <?php } ?>
								<?php } else {
										  if ($rowOrden['emitida'] == 1) { ?>
											 <i style="font-size: 25px" class="glyphicon glyphicon-info-sign" title="EMITIDA (<?php echo $rowOrden['fechaestado'] ?>)"></i>
								    <?php } else { 
											   if ($rowOrden['autorizada'] == 0) { ?>
											  	   <i style="font-size: 25px" class="glyphicon glyphicon-time" title="ESPERANDO AUTORIZACION"></i>
										 <?php } else {
											  	   if ($rowOrden['autorizada'] == 2) { ?> 
														<i style="font-size: 25px; color: red" class="glyphicon glyphicon-remove-sign"  title="RECHAZADA (<?php echo $rowOrden['fechaestado'] ?>)"></i>
											 <?php } else {
											            if ($rowOrden['autorizada'] == 3 && $_SESSION['delcod'] != '2602') { ?>
											  				<i style="font-size: 25px; display: none" class="glyphicon glyphicon-info-sign" title="EMITIDA" id="icon<?php echo $rowOrden['id']?>"></i>
											  				<a onclick="emitir('<?php echo $rowOrden['id']?>', this)"> 
											  					<i style="font-size: 25px; color: green; cursor: pointer" class="glyphicon glyphicon-download" title="APROBADA (<?php echo $rowOrden['fechaestado'] ?>) - DESCARGAR"></i>
											  				</a>
											  	  <?php }
											  	        if ($rowOrden['autorizada'] == 3 && $_SESSION['delcod'] == '2602') { ?>
											  				<i style="font-size: 25px;  color: green;" class="glyphicon glyphicon-info-sign" title="APROBADA PERMISO DE EMISION" id="icon<?php echo $rowOrden['id']?>"></i>
											  	 <?php  }
											 	   }
										  	   }
								    	  }							  
									  } ?>
								</td>
							</tr>	
						<?php } 
					} else { ?>
						<tr><td colspan="6" style="text-align: center;">No Existen Órdenes de Consulta</td></tr>
			  <?php } ?>
					  </tbody>
					</table>
				</form>
				<table style="width: 245; border: 0">
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
						      	<option value="<?php echo $canOrden;?>">Todos</option>
						      </select>
						    </p>
						   </form>	
						</div>
						</td>
				    </tr>
			     </table>			  
			</div>		
			<div class="col-md-12 panel-footer">
				<i style="font-size: 15px;" class="glyphicon glyphicon-info-sign"></i> EMITIDA -
				<i style="font-size: 15px;" class="glyphicon glyphicon-time"></i> ESPERANDO AUTORIZACION -
				<i style="font-size: 15px; color:red" class="glyphicon glyphicon-remove-sign"></i> RECHAZADA -
				<?php if ($_SESSION['delcod'] != '2602') { ?>
						<i style="font-size: 15px; color: green;" class="glyphicon glyphicon-download"></i> APROBADA DESCARGAR -
						<i style="font-size: 15px; color: blue;" class="glyphicon glyphicon-download"></i> DESCARGAR
				<?php } else { ?>
						<i style="font-size: 15px; color: green;" class="glyphicon glyphicon-info-sign"></i> APROBADA PERMISO DE EMISION
				<?php } ?>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>