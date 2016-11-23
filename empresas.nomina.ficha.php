<?php include ("verificaSesion.php"); 
$cuil = $_GET['cuil'];
$nrcuit = $_GET['nrcuit'];
$nrafil = $_GET['nrafil'];

$sql = "SELECT t.*, d.nombre as nomdel, e.nombre as empresa, p.nombre as provin, tip.descri as tipdoc, civ.descrip as estcivil, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac, DATE_FORMAT(fecemi,'%d/%m/%Y') as fecemi, DATE_FORMAT(fecing,'%d/%m/%Y') as fecing
FROM titular t, delega d, empresa e, provin p, tipodocu tip, estadocivil civ
WHERE t.nrcuil = '$cuil' and t.delcod = d.delcod and t.nrcuit = e.nrcuit and t.delcod = e.delcod and t.provin = p.codigo and t.tipdoc = tip.codigo and t.estciv = civ.codestciv";
$result = mysql_query($sql,$db);
$row = mysql_fetch_array($result);
$est = "ACTIVO";

if (mysql_num_rows($result) == 0) {
	$sql = "SELECT t.*, d.nombre as nomdel, e.nombre as empresa, p.nombre as provin, tip.descri as tipdoc, civ.descrip as estcivil, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac,  DATE_FORMAT(fecemi,'%d/%m/%Y') as fecemi, DATE_FORMAT(fecing,'%d/%m/%Y') as fecing, DATE_FORMAT(fecbaj,'%d/%m/%Y') as fecbaj
	FROM bajatit t, delega d, empresa e, provin p, tipodocu tip, estadocivil civ
	WHERE t.nrcuil = '$cuil' and t.delcod = d.delcod and t.nrcuit = e.nrcuit and t.delcod = e.delcod and t.provin = p.codigo and t.tipdoc = tip.codigo and  t.estciv = civ.codestciv";
	$result = mysql_query($sql,$db);
	$row = mysql_fetch_array($result);
	$est = "DE BAJA - Desde: ".$row['fecbaj'];
}

$sqlDisca = "SELECT * FROM discapacitados WHERE nrafil = $nrafil and nroord = 0";
$resDisca = mysql_query($sqlDisca,$db);
$canDisca = mysql_num_rows($resDisca);
if ($canDisca == 0) {
	$disca = 'NO';
} else {
	$disca = 'SI';
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ficha Empleado</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	
	<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="include/js/jquery.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script>
	function mypopup(dire) {
	    mywindow = window.open(dire, 'InfoCuenta', 'location=1, width=1080, height=600, top=30, left=40, resizable=1, scrollbars=1');
	}
	</script>
	
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-user"></i><br>Ficha de Empleado</h2>
			<h3><?php echo $row['nombre']?></h3>
			<div class="col-md-8 col-md-offset-2">
				<table class="table" style="text-align: center">
	    			<tr>
				      	<th style="text-align: center;">Nro. Afiliado</th>
				        <td><?php echo  $row['nrafil']?></td>
				    </tr>
	    			<tr>
				      	<th style="text-align: center;">Documento</th>
				        <td><?php echo ($row['tipdoc'].": ".$row['nrodoc']);?></td>
				    </tr>
					<tr>
				      	<th style="text-align: center;">Estado Civil</th>
				        <td><?php echo ($row['estcivil']);?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Domicilio</th>
				        <td><?php echo ($row['domici']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Localidad</th>
				        <td><?php echo ($row['locali']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Provincia</th>
				        <td><?php echo ($row['provin']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">C.P.</th>
				        <td><?php echo ($row['codpos']);?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Fecha Nacimiento </th>
				        <td><?php echo ($row['fecnac']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Edad </th>
				        <td><?php echo ($row['edad']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">CUIL</th>
				        <td><?php
						if ($_SESSION['delcod'] == $row['delcod']) {
							echo("<a href=javascript:void(window.open('empresas.nomina.aportes.php?cuil=".$row['nrcuil']."'))>".$row['nrcuil']."</a>");
						} else {
				 			echo ($row['nrcuil']);
						}
						?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Delegaci&oacute;n</th>
				      <td><?php echo ($row['nomdel']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Empresa</th>
				      <td><?php echo ($row['empresa']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Estado </th>
				      <td><?php echo ($est); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Categoria</th>
				        <td><?php echo ($row['catego']); ?></td>
				    </tr>
				    <tr>
				      <th style="text-align: center;">Fecha de Ingreso </th>
				        <td><?php echo ($row['fecing']); ?></td>
				    </tr>
				     <tr>
				      <th style="text-align: center;">Ultima Emisión Carnet </th>
				        <td><?php echo ($row['fecemi']); ?></td>
				    </tr>
				    <tr>
				     <th style="text-align: center;">Discapacitado</th>
				        <td><?php echo ($disca); ?></td>
				    </tr>
				</table>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<p>*Si el empleado pertenece a su Delegacion. Haciendo click sobre su CUIL se motrar&aacute;n sus aportes individuales </p>
  				<h3>Familiares</h3>
  				<table class="table">
					<tr>
						<th>Nombre y Apellido </th>
						<th>Documento </th>
						<th>Parentesco </th>
						<th>Sexo </th>
						<th>Fec. de Nac.</th>
						<th>Edad</th>
						<th>C.U.I.L. </th>
						<th>Ultima Emisión Carnet</th>
						<th>Discapacitado</th>
					</tr>
  				<?php
				if ($est == "ACTIVO") {
					$sql1 = "select f.*, t.descri as tipdoc, p.descrip as despare, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac, DATE_FORMAT(fecemi,'%d/%m/%Y') as fecemi
								from familia f, tipodocu t, parentesco p
								where f.nrafil = '$nrafil' and f.tipdoc = t.codigo and f.codpar = p.codparent";
					$result1 = mysql_query($sql1,$db); 
				} else {
					$sql1 = "select f.*, t.descri as tipdoc, p.descrip as despare, DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(fecnac)), '%Y')+0 as edad, DATE_FORMAT(fecnac,'%d/%m/%Y') as fecnac, DATE_FORMAT(fecemi,'%d/%m/%Y') as fecemi 
								from bajafam f, tipodocu t, parentesco p 
								where f.nrafil = '$nrafil' and f.tipdoc = t.codigo and f.codpar = p.codparent";
					$result1 = mysql_query($sql1,$db); 
				}
				$cantFami = mysql_num_rows($result1);
				if ($cantFami > 0) { 
					while ($row1=mysql_fetch_array($result1)) { 
						$nroorden = $row1['nroord'];
						$sqlDisca = "SELECT * FROM discapacitados WHERE nrafil = $nrafil and nroord = $nroorden";
						$resDisca = mysql_query($sqlDisca,$db);
						$canDisca = mysql_num_rows($resDisca);
						if ($canDisca == 0) {
							$disca = 'NO';
						} else {
							$disca = 'SI';
						} ?>
					<tr>
					    <td><?php echo $row1['nombre'] ?></td>
						<td><?php echo $row1['tipdoc'].": ".$row1['nrodoc'] ?> </td>
						<td><?php echo $row1['despare'] ?></td>
						<td><?php echo $row1['ssexxo'] ?></td>
						<td><?php echo $row1['fecnac'] ?></td>
						<td><?php echo $row1['edad'] ?></td>
						<td><?php echo $row1['nrcuil'] ?></td>
						<td><?php echo $row1['fecemi'] ?></td>
						<td><?php echo $disca ?></td>
					</tr>
			<?php	}
			} else { ?>
					<tr><td colspan="9" style="text-align: center">No hay familiares informados</td></tr>
			<?php } ?>
				</table>
  				<p><a class="nover" href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px" class="glyphicon glyphicon-print"></i></a></p>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
		</div>
	</div>
</body>