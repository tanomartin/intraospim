<?php include ("verificaSesionOrdenes.php");

$delcod = $_SESSION['delcod'];
$fechaOrden = date("Y-m-d");
$cuil = "'".$_POST['textCuil']."'";
$nroafil = $_POST['textNroAfil'];
$codPar = $_POST['codPar'];
$nombre = strtoupper($_POST['textNombre']);
$nrodoc = $_POST['textNroDoc'];
$sexo = $_POST['sexo'];
$fechaVto = date("Y-m-d",strtotime($fechaOrden."+ 1 month")); 
$edad = $_POST['edad'];
$cuilTitu = "NULL";

if(isset($_POST['nrcuilTitu'])) {
	$cuilTitu = "'".$_POST['nrcuilTitu']."'";
	$nroafil = $_POST['textNroAfilTitu'];
	$nrodoc = "";
	$sexo = $_POST['sexoRecNac'];
	$edad = $_POST['edadRecNac'];
}



$primerDia = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
$sqlConsultaCanMes = "SELECT id,nrcuil FROM ordenesconsulta WHERE nrcuil = $cuil and nrafil = '$nroafil' and fechaorden >= '$primerDia' and autorizada != 2";
$resConsultaCanMes = mysql_query($sqlConsultaCanMes,$db);
$canConsultaCanMes = mysql_num_rows($resConsultaCanMes);
if ($canConsultaCanMes > 4) {
	header("Location: listado.error.php?error=2&cuil=$cuil");
} else {
    $sqlInsertOrden = "INSERT INTO ordenesconsulta VALUE (DEFAULT,'$delcod','$fechaOrden',$cuil,'$nroafil','$codPar','$nombre','$nrodoc','$sexo','$edad','$fechaVto',$cuilTitu,0,0,0,NULL)";
	if ($canConsultaCanMes != 4) {
		try {
			$dbname = "sistem22_intranet";
			$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbh->beginTransaction();
			
			$sqlInsertOrden = "INSERT INTO ordenesconsulta VALUE (DEFAULT,'$delcod','$fechaOrden',$cuil,'$nroafil','$codPar','$nombre','$nrodoc','$sexo','$edad','$fechaVto',$cuilTitu,1,0,0,NULL)";
			
			$dbh->exec($sqlInsertOrden);
			$dbh->commit();
	       	header("Location: listado.php");
		} catch (PDOException $e) {
			echo $e->getMessage();
			$dbh->rollback();
			exit(-1);
		}
	}
} 
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

function validar(formulario) {
	if (formulario.rhc.value == ""){
		alert("El resumen de historia clinica es obligatoria");
		return false;
	} else {
		var file = (formulario.rhc.files.item(0).size / 1024);
		if (file > 2048) {
			alert("El resumen de historia clinica no puede superar los 2 MB");
			return false;
		}
	}
	formulario.generar.disabled = true;
	$.blockUI({ message: "<h1>Generando Orden de Consulta. Aguarde por favor...</h1>" });
	return true;
}

</script>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<?php include_once ("../navbar.php"); ?>
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-modal-window"></i><br>Órdenes de Consulta</h2>
			<h4 style="color:brown">Se superaron las 4 consultas libres permitidas para cuil "<?php echo $cuil?>" en el mes<br>
								    Completar la siguiente información para genera la 5ta (NOTA: última consulta libre permitida)</h4>
			<form id="nuevaSolicitudHistoria" name="nuevaSolicitudHistoria" method="post" action="listado.nueva.guardar.hc.php" onsubmit="return validar(this)" enctype="multipart/form-data" style="margin: 30px">	
				<h4>Resumen de Historia Clinica</h4>
				<input style="display: none" readonly="readonly" type="text" value="<?php echo $sqlInsertOrden?>" size="150" name="insert" id="insert"/>
				<p><input name="rhc" id="rhc" type="file" accept=".pdf"/></p>
				<input style="margin-top: 10px" id="generar" class="btn btn-primary" name="generar" type="submit" value="Generar Órden de Consulta"  />
			</form>
			<h4>La Orden de consulta se generará pero no se podrá emitir hasta que se autorize desde el sector de Auditoría Médica Central</h4>
			<div class="col-md-12 panel-footer">
				<?php  print ("ÚLTIMA ACTUALIZACIÓN - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>	
		
