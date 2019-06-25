<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];

$sql = "select * from empresa where delcod = ".$_SESSION['delcod']." and nrcuit = $nrcuit";
$result = mysql_query($sql,$db); 
$rowEmpre = mysql_fetch_assoc($result);
$delcod = $rowEmpre['delcod'];

$anoactual =  date("Y");
$mesacutal = date("m");
	
$anoinicio = $anoactual-5;
$mesinicio = $mesacutal+1;
if($mesinicio == 13) {
	$mesinicio = 1;
	$anoinicio++;
}
$mesfin = $mesacutal;
$ano = $anoinicio;
$anofin = $anoactual;

function encuentroPagos($db) {
	global $nrcuit, $anoinicio, $mesinicio, $anofin, $mesfin, $delcod;
	$sqlPagos = "select anotra, mestra, contra from pagos where nrcuit = $nrcuit and (contra = '381' or contra = '401') and ((anotra > $anoinicio and anotra <= $anofin) or (anotra = $anoinicio and mestra >= $mesinicio))";
	//echo($sqlPagos."<br><br>");
	$resPagos = mysql_query($sqlPagos,$db);
	$CantPagos = mysql_num_rows($resPagos);
	$arrayConc = array();
	if($CantPagos > 0) {
		while ($rowPagos = mysql_fetch_assoc($resPagos)) {
			$id=$rowPagos['anotra'].$rowPagos['mestra'];
			$arrayConc[$id][$rowPagos['contra']] = array('anio' => $rowPagos['anotra'], 'mes' => $rowPagos['mestra']);	
		}
	} 
	$arrayPagos = array();
	foreach($arrayConc as $concepto) {
		if (isset($concepto['401']) && isset($concepto['381'])) {
			$id = $concepto['401']['anio'].$concepto['401']['mes'];
			$arrayPagos[$id] = array('anio' => $concepto['401']['anio'], 'mes' => $concepto['401']['mes']);
		}
	}
	return($arrayPagos);
}

function encuentroJuicios($db) {
	global $nrcuit, $anoinicio, $mesinicio, $anofin, $mesfin, $delcod;
	$sqlJuicios = "select * from juicios j, empresa e where e.delcod = $delcod and e.nrcuit = $nrcuit and e.nrcuit = j.nrcuit and ((j.anojui > $anoinicio and j.anojui <= $anofin) or (j.anojui = $anoinicio and j.mesjui >= $mesinicio))";
	//echo($sqlJuicios."<br><br>");
	$resJuicios = mysql_query($sqlJuicios,$db);
	$canJuicios = mysql_num_rows($resJuicios);
	$arrayJuicios = array();
	if($canJuicios > 0) {
		while ($rowJuicios = mysql_fetch_assoc($resJuicios)) {
			$id=$rowJuicios['anojui'].$rowJuicios['mesjui'];
			$arrayJuicios[$id] = array('anio' => (int)$rowJuicios['anojui'], 'mes' => (int)$rowJuicios['mesjui']);
		}
	}
	return($arrayJuicios);
}

function encuentroAcuerdos($db) {
	global $nrcuit, $anoinicio, $mesinicio, $anofin, $mesfin, $delcod;
	$sqlAcuerdos = "select d.* from detacuer d, empresa e where e.delcod = $delcod and e.nrcuit = $nrcuit and d.nrcuit = e.nrcuit and ((d.anoacu > $anoinicio and d.anoacu <= $anofin) or (d.anoacu = $anoinicio and d.mesacu >= $mesinicio))" ;
	//echo($sqlAcuerdos."<br><br>");
	$resAcuerdos = mysql_query($sqlAcuerdos,$db);
	$canAcuerdos = mysql_num_rows($resAcuerdos);
	$arrayAcuerdos = array();
	if($canAcuerdos > 0) {
		while ($rowAcuerdos = mysql_fetch_assoc($resAcuerdos)) {
			$id=$rowAcuerdos['anoacu'].$rowAcuerdos['mesacu'];
			$arrayAcuerdos[$id] = array('anio' => (int)$rowAcuerdos['anoacu'], 'mes' => (int)$rowAcuerdos['mesacu']);
		}
	} 
	return($arrayAcuerdos);
}

function encuentroDdjj($db) {
	global $nrcuit, $anoinicio, $mesinicio, $anofin, $mesfin, $delcod;
	$sqlDdjj = "select * from cabjur c, empresa e where e.delcod = $delcod and e.nrcuit = $nrcuit and c.nrcuit = e.nrcuit and ((c.anotra > $anoinicio and c.anotra <= $anofin) or (c.anotra = $anoinicio and c.mestra >= $mesinicio))";
	//echo($sqlDdjj."<br><br>");
	$resDdjj = mysql_query($sqlDdjj,$db);
	$canDdjj = mysql_num_rows($resDdjj);
	$arrayDdjj = array();
	if($canDdjj > 0) {
		while ($rowDdjj = mysql_fetch_assoc($resDdjj)) {
			$id=$rowDdjj['anotra'].$rowDdjj['mestra'];
			$arrayDdjj[$id] = array('anio' => (int)$rowDdjj['anotra'], 'mes' => (int)$rowDdjj['mestra']);
		}
	}
	return($arrayDdjj);
}

function encuentroReque($db) {
	global $nrcuit, $anoinicio, $mesinicio, $anofin, $mesfin, $delcod;
	$sqlReque = "select * from requerimientos where nrcuit = $nrcuit and ((anofis > $anoinicio and anofis <= $anofin) or (anofis = $anoinicio and mesfis >= $mesinicio))";
	//echo($sqlReque."<br><br>");
	$resReque = mysql_query($sqlReque,$db);
	$canReque = mysql_num_rows($resReque);
	$arrayReque = array();
	if($canReque > 0) {
		while ($rowReque = mysql_fetch_assoc($resReque)) {
			$id=$rowReque['anofis'].$rowReque['mesfis'];
			$arrayReque[$id] = $rowReque['nroreq'];
		}
	}
	return($arrayReque);
}


$arrayPagos = encuentroPagos($db);
//var_dump($arrayPagos);echo"<br><br>";
$arrayJuicios = encuentroJuicios($db);
//var_dump($arrayJuicios);echo"<br><br>";
$arrayAcuerdos = encuentroAcuerdos($db);
//var_dump($arrayAcuerdos);echo"<br><br>";
$arrayDdjj = encuentroDdjj($db);
//var_dump($arrayDdjj);echo"<br><br>";
$arrayReque = encuentroReque($db);
//var_dump($arrayReque);echo"<br><br>";

function estado($ano, $me) {
	global $cuit, $anoinicio, $mesinicio, $anofin, $mesfin;
	global $arrayPagos, $arrayAcuerdos, $arrayJuicios, $arrayDdjj, $arrayReque;
	//VEO QUE EL MES Y EL AÑO ESTEND DENTRO DE LOS PERIODOS A MOSTRAR
	if ($ano == $anoinicio) {
		if ($me < $mesinicio) {
			$des = "-";
			return($des);
		}
	}
	if ($ano == $anofin) {
		if ($me > $mesfin) {
			$des = "-";
			return($des);
		}
	}
	$idArray = $ano.$me;
	// VEO LOS PERIODOS ABARCADOS POR ACUERDO
	if (array_key_exists($idArray, $arrayPagos)) { 
		$des = "PAGO";
	} else {
		if(array_key_exists($idArray, $arrayAcuerdos)) {
			$des = "ACUER.";
		} else {
			//VEO LOS JUICIOS
			if (array_key_exists($idArray, $arrayJuicios)) {
				$des = "JUICI.";
			} else {
				//VEO LOS REQUE
				if (array_key_exists($idArray, $arrayReque)) {
					$des = "REQUE. ($arrayReque[$idArray])";
				} else {
					// VEO LAS DDJJ REALIZADAS SIN PAGOS
					if(array_key_exists($idArray, $arrayDdjj)) {
						$des = "NO PAGO";
					} else {
						$des = "S.DJ.";
					} //else DDJJ
				} //else REQUE
			} //else JUICIOS
		}//else ACUERDOS
	}
	return $des;
} //function

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
		var a = document.createElement("a");
		a.target = "_blank";
		a.href = dire;
		a.click();
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
										$descri = estado($ano,$mes);
										if ($descri == "PAGO") { ?>
											<td><a href="javascript:mypopup('empresas.sabana.pagos.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
						<?php			}
										if ($descri == "ACUER.") { ?>
											<td><a href="javascript:mypopup('empresas.sabana.acuerdos.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
						<?php			}
										if ($descri == "NO PAGO") { ?>
											<td><a href="javascript:mypopup('empresas.sabana.ddjj.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
						<?php			}
										if (($descri == "JUICI.") || strpos($descri, "REQUE.") !== false || ($descri == "S.DJ.")) { ?>
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
				<table class="table" style="text-align: center">
				  <tr>
				    <td style="width: 33%"><b>*ACUER.</b><br> PERIODO EN ACUERDO</td>
				    <td style="width: 33%"><b>*S. DJ.</b><br> PERIODO SIN DDJJ</td>
				    <td style="width: 33%"><b>*JUICI.</b><br> PERIODO EN JUICIO</td>
				  </tr>
				  <tr>
				  	<td><b>*NO PAGO</b><br> PERIODO NO PAGO CON DDJJ</td>
				    <td><b>*REQUE. (#)</b><br> PERIODO EN FISCALIZACION</td> 
				   	<td><b>*PAGO</b><br> PERIODO PAGO CON DDJJ</td>
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
