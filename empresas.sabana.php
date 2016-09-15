<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];

$sql = "select * from empresa where delcod = ".$_SESSION['delcod']." and nrcuit = $nrcuit";
$result = mysql_query($sql,$db); 
$rowEmpre = mysql_fetch_assoc($result);
$delcod = $rowEmpre['delcod'];

function estado($ano, $me, $db) {
	global $delcod, $nrcuit;
	$sql1 = "select * from pagos where delcod = $delcod and nrcuit = $nrcuit and anotra = $ano and mestra = $me";
	$result1 = mysql_query($sql1,$db);
	$row1 = mysql_fetch_array($result1);
	if($row1!=null) {
		$des = "PAGO";
	} else { $sql6 = "select * from juicios j, empresa e where e.delcod = $delcod and e.nrcuit = $nrcuit and j.nrcuit = e.nrcuit and j.anojui = $ano and j.mesjui = $me" ;
	$result6 = mysql_query($sql6,$db);
	$row6 = mysql_fetch_array($result6);
	if ($row6 != null) {
		$des = "JUICI.";
	} else {
		$sql2 = "select d.* from detacuer d, empresa e where e.delcod = $delcod and e.nrcuit = $nrcuit and d.nrcuit = e.nrcuit and d.anoacu = $ano and d.mesacu = $me" ;
		$result2 = mysql_query($sql2,$db);
		$row2 = mysql_fetch_array($result2);
		if($row2!=null) {
			$des = "ACUER.";
		} else {
			$sql9 = "select * from cabjur c, empresa e where e.delcod = $delcod and e.nrcuit = $nrcuit and c.nrcuit = e.nrcuit and c.anotra = $ano and c.mestra = $me" ;
			$result9 = mysql_query($sql9,$db);
			$row9 = mysql_fetch_array($result9);
			if($row9!=null) {
				$des = "NO PAGO";
			} else {
				$des = "S.DJ.";
			}
		}
	}
	}
	return $des;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Estado de Cuenta</title>
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
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-list-alt"></i><br>Estado de Cuenta</h2>
			<div class="col-md-10 col-md-offset-1">
				<div>
					<h3 class="page-title" style="float: right;"><?php print ($rowEmpre['nombre']);?></h3>
				</div>
				<table class="table table-bordered" style="text-align: center; font-size: 12px">
				  <thead>
					  <tr>
					  	<th width="4%"></th>
					    <th width="8%">Enero</th>
					    <th width="8%">Febrero</th>
					    <th width="8%">Marzo</th>
					    <th width="8%">Abril</th>
					    <th width="8%">Mayo</th>
					    <th width="8%">Junio</th>
					    <th width="8%">Julio</th>
					    <th width="8%">Agosto</th>
					    <th width="8%">Setiembre</th>
					    <th width="8%">Octubre</th>
					    <th width="8%">Noviembre</th>
					    <th width="8%">Diciembre</th>
					  </tr>
				  </thead>
				  <tbody>
					<?php
					$anoactual =  date("Y");
					$mesacutal = date("m");
					
					$anoinicio = $anoactual-10;
					$mesinicio = $mesacutal+1;
					if($mesinicio == 13) { 
						$mesinicio = 1; 
						$anoinicio++; 
					}
					$mesfin = $mesacutal;
					$ano = $anoinicio;
					$anofin = $anoactual;
					
						while($ano<=$anofin) { ?>
						  <tr>
						    <td> <div align="left"><strong><?php echo $ano; ?></strong></div></td>
						<?php
							for($mes = 1; $mes < 13; $mes++) { 
								if ($ano == $anoinicio && $mes < $mesinicio) { ?>
									<td>-</td>
						<?php	} else {
									if ($ano == $anofin && $mes > $mesfin) { ?>
										<td>-</td>
						<?php		} else {
										$descri = estado($ano,$mes,$db);
										if ($descri == "PAGO") { ?>
											<td><a href="javascript:mypopup('empresas.sabana.pagos.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
						<?php			}
										if ($descri == "ACUER.") { ?>
											<td><a href="javascript:mypopup('empresas.sabana.acuerdos.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
						<?php			}
										if ($descri == "NO PAGO") { ?>
											<td><a href="javascript:mypopup('empresas.sabana.ddjj.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
						<?php			}
										if (($descri == "JUICI.")|| ($descri == "S.DJ.")) { ?>
											<td><?php echo $descri ?></td>
						<?php			}
									}
								}
							}
							$ano++; ?>
							 </tr>
					<?php } ?>
					</tbody>
				</table>
				<table class="table">
				  <tr>
				    <td><div align="left"><b>*ACUER.</b> = PERIODO EN ACUERDO </div></td>
				    <td><div align="center"><b>*S. DJ.</b>= PERIODO SIN DDJJ </div></td>
				    <td><div align="right"><b>*NO PAGO</b> = PERIODO NO PAGO CON DDJJ</div></td>
				  </tr>
				  <tr>
				    <td><div align="left"><b>*JUICI.</b> = PERIODO EN JUICIO</div></td>
				    <td><div align="center"><b>*PAGO</b> = PERIODO PAGO CON DDJJ</div></td>
				    <td></td>
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
</html>
