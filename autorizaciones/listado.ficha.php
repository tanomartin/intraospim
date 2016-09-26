<?php include ("verificaSesionAutorizaciones.php"); 
include ("lib/funciones.php");
$nrosolicitud = $_GET['nrosolicitud'];
$delcod = $_SESSION['delcod'];
$sql = "select * from autorizacionprocesada where delcod = $delcod and nrosolicitud = $nrosolicitud";
$result = mysql_query($sql,$db);
$row=mysql_fetch_array($result);

if ($delcod >= "4000") { 
	if ($row['nrafil'] != 0) {
		if ($row['codpar'] == 0) {
			$sqlDelega = "select d.nombre as delega from titular t, delega d where t.nrafil = ".$row['nrafil']." and t.delcod = d.delcod";
		} else {
			$sqlDelega = "select d.nombre as delega from familia f, delega d where f.nrafil = ".$row['nrafil']." and f.nrcuil = ".$row['nrcuil']." and f.delcod = d.delcod";
		}
		$resDelega = mysql_query($sqlDelega,$db);
		$rowDelega = mysql_fetch_array($resDelega);
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ficha de Solicitud</title>
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
	
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-ok-sign"></i><br>Ficha de Solicitud</h2>
			<h3><?php echo ($row['nombre']);?></h3>
			<h3>Solicitud Nro. <b><?php echo $nrosolicitud;?></b> del <b><?php echo  invertirFecha($row['fechasolicitud']);?></b> </h3>
			<h3 style="color: <?php echo estadoColor($row['statusverificacion'],$row['statusautorizacion']) ?>"><b><?php echo estado($row['statusverificacion'],$row['statusautorizacion']) ?></b></h3>
			<div class="col-md-8 col-md-offset-2">
				<h4>Informaci&oacute;n del Beneficiario </h4>
			 	<table class="table" style="text-align: center">
			 		<tr>
				        <th style="text-align: center;">N&uacute;mero de Afiliado</th>
				      	<td><?php echo $row['nrafil']?></td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Apellido y Nombre</th>
				      	<td><?php echo $row['nombre']?></td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">C.U.I.L.</th>
				      	<td><?php echo $row['nrcuil']?></td>
			    	</tr>
			    		<?php if ($delcod >= "4000") { ?>
				    		<tr>
					       	 	<th style="text-align: center;">Delegación</th>
					      		<td><?php echo $rowDelega['delega'] ?></td>
				    		</tr>
					   	<?php }?>
					<tr>
				        <th style="text-align: center;">Telefono Fijo</th>
				      	<td><?php echo $row['telefono']?></td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Telefono Móvil</th>
				      	<td><?php echo $row['movil']?></td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Email</th>
				      	<td><?php echo $row['email']?></td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Tipo de Beneficiario</th>
				      	<td> <?php echo tipoBene($row['codpar']) ?></td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Fecha Verficaci&oacute;n</th>
				      	<td> <?php if ($row['fechaverificacion'] != NULL && $row['fechaverificacion'] != "0000-00-00") {
										echo invertirFecha($row['fechaverificacion']);
								  } else {
								  		echo "Pendiente";
								  } 
							?>
						</td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Observacion</th>
				      	<td> <?php echo $row['rechazoverificacion'] ?></td>
			    	</tr>
			    </table>
			 	
			 	<h4>Informaci&oacute;n de la Solicitud </h4>
			 	
			 	<table class="table" style="text-align: center">
			 		<tr>
				        <th style="text-align: center;">Tipo de Solicitud</th>
				      	<td> <?php echo tipo($row['tiposolicitud']) ?></td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Fecha Autorizaci&oacute;n</th>
				      	<td><?php 
				      		if ($row['fechaautorizacion'] != NULL && $row['fechaautorizacion'] != "0000-00-00") {
								echo invertirFecha($row['fechaautorizacion']);
							  } else {
							  		echo "Pendiente";
							  }  ?>
	    				</td>
			    	</tr>
			    	<tr>
				        <th style="text-align: center;">Observacion</th>
				      	<td> <?php echo $row['rechazoautorizacion'] ?></td>
			    	</tr>
			 	</table>
			 	
			 	<a class="nover" href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px; margin-bottom: 20px"  class="glyphicon glyphicon-print"></i></a>
			</div>	
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
		</div>
	</div>
</body>