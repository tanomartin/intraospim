<?php include ("verificaSesionOrdenes.php");

$OKSerializado = $_POST['regOK'];
$registrosOK = unserialize(urldecode($OKSerializado));

$NOOKSerializado = $_POST['regNOOK'];
$registrosNOOK = unserialize(urldecode($NOOKSerializado));

//var_dump($registrosOK);echo "<br><br><br>";
//var_dump($registrosNOOK);echo "<br><br><br>";
//echo $_POST['archivo']; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Importacion de Solicitudes</title>
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
	<script type="text/javascript" src="../include/js/jquery.blockUI.js" ></script>
	<script type="text/javascript" src="lib/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="lib/funcionControl.js" ></script>
	<script>
    	$(function() {
    		$("#errores")
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
    		});

    		$("#ok")
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
    		});
    	});
    	
    	function validar(formulario) {
        	for (var i=0;i<formulario.elements.length;i++) {
				if (formulario.elements[i].name.indexOf("rhc") !== -1) {
					filisize = formulario.elements[i].files.item(0).size;
					filisize = (filisize / 1024);
					if (filisize > 2048) {
						alert("El resumen de historia clinica no puede superar los 2 MB");
						formulario.elements[i].focus();
						return false;
					}
				}
        	}
        	$.blockUI({ message: "<h1>Guardando Ordenes de Consulta. Aguarde por favor...</h1>" });
    		formulario.importar.disabled = true;
    		return true;
    	}
	</script>
	</head>
<body>
<div class="container">
    		<div class="row" align="center" style="background-color: #f5f5f5;">
    			<?php include_once ("../navbar.php"); ?>
    		<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-modal-window"></i><br>Órdenes de Consulta</h2>
			<h3>Resultado de Importacion de Ordenes de Consulta</h3>	
			<div class="col-md-10 col-md-offset-1">
			<?php if (sizeof($registrosOK) > 0) { ?>
				<form id="gurdarOrdenes" name="gurdarOrdenes" method="post" action="listado.importar.guardar.php" enctype="multipart/form-data" onsubmit="return validar(this)">
					<h4>Registros Correctos para Importar</h4>
    				<table class="tablesorter" id="ok">
    					<thead>
    						<tr>
    						    <th>Nº</th>
    						    <th>Fecha</th>
    							<th>C.U.I.L</th>
    						    <th>Nombre</th>
    						    <th>Fecha VTO</th>
    						    <th>C.U.I.L. Titular</th>
    						    <th>Estado</th>
    						    <th>Archivo</th>
    						</tr>
    					</thead>
    					<tbody>
    				<?php foreach ($registrosOK as $nroordenref => $datos) { 
    					    $arrayRegistro =  explode("|", $datos); ?>
    					    <tr>
								<td><?php echo $nroordenref ?></td>
								<td><?php echo $arrayRegistro[2] ?></td>
								<td><?php echo $arrayRegistro[3] ?></td>
								<td><?php echo $arrayRegistro[4] ?></td>
    							<td><?php echo $arrayRegistro[7] ?></td>
    							<td><?php echo $arrayRegistro[8] ?></td>
    							<td><?php echo $arrayRegistro[9] ?></td>
    					  		<td>
        					  <?php if ($arrayRegistro[9] == 0 ) { ?>
        							<input name="rhc<?php echo $nroordenref?>" id="rhc<?php echo $nroordenref?>" type="file" accept=".pdf" required="required" />
        					  <?php } ?>
        					 	</td>
    				<?php }?>
    					  </tbody>
    					</table>
    					<input name="archivo" id="archivo" type="hidden" value="<?php echo $_POST['archivo'] ?>"/>
    					<input name="regOK" id="regOK" type="hidden" value="<?php echo $_POST['regOK'] ?>"/>
    					<input style="margin-top: 10px" id="importar" class="btn btn-primary" name="importar" type="submit" value="Importar"/>
				</form>
				<?php }?>	
				
				<?php if (sizeof($registrosNOOK) > 0) { ?>
    					<h4>Registros con errores no se importaran</h4>
    					<table class="tablesorter" id="errores">
    						 <thead>
    						  <tr>
    						    <th>Nº</th>
    						    <th>Fecha</th>
    							<th>C.U.I.L</th>
    						    <th>Nombre</th>
    						    <th>Fecha VTO</th>
    						    <th>C.U.I.L. Titular</th>
    						    <th>Error</th>
    						  </tr>
    					  </thead>
    					  <tbody>
    				<?php foreach ($registrosNOOK as $nroordenref => $datos) { 
    				        $registro = explode("|", $datos['registro']); ?>
    						<tr>
								<td><?php echo $nroordenref ?></td>
								<td><?php echo $registro[2] ?></td>
								<td><?php echo $registro[3] ?></td>
								<td><?php echo $registro[4] ?></td>
    							<td><?php echo $registro[7] ?></td>
    							<td><?php echo $registro[8] ?></td>
    							<td><?php echo $datos['resultado'][1] ?></td>
    				<?php }?>
    					  </tbody>
    			<?php }?>
						</table>
				<p><input style="margin-top: 10px" id="cancelar" class="btn btn-danger" name="cancelar" type="button" value="Cancelar" onclick="window.location = 'listado.php'"  /></p>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>