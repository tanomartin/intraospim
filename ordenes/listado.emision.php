<?php include ("verificaSesionOrdenes.php"); 
include ("lib/funciones.php");
require('lib/fpdf/fpdf.php');

$id = $_GET['idconsulta'];
$delcod = $_SESSION['delcod'];
$sqlOrden = "SELECT o.*, DATE_FORMAT(o.fechaorden,'%d/%m/%Y') as fechaorden, DATE_FORMAT(o.fechavto,'%d/%m/%Y') as fechavto,nrcuil
				FROM ordenesconsulta o 
				WHERE delcod = ".$_SESSION['delcod']." and 
				      id = $id and 
					  (autorizada = 1 or autorizada = 3)
				ORDER BY id DESC";
$resOrden = mysql_query($sqlOrden,$db);
$canOrden = mysql_num_rows($resOrden);
if ($canOrden == 0) {
	header("Location: error.php");
	exit(0);
} else {
	$rowOrden = mysql_fetch_assoc($resOrden);
}

try {
	$pdf = new FPDF('P','mm','Letter');
	$pdf->AddPage();
	
	$pdf->Image('../img/logo.png',10,10,-400);
	
	$pdf->SetFont('Arial','B',14);
	$pdf->SetXY(30, 10);
	$pdf->Cell(40,10,'ORDEN DE CONSULTA AMBULATORIA',0,0);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetXY(31, 18);
	$pdf->Cell(40,10,'Esta orden tiene validez hasta el dia '.$rowOrden['fechavto'],0,0);
	
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(115, 10);
	$pdf->Cell(90,10,$_SESSION['nombre'],0,0,'R');
	
	$pdf->SetFont('Arial','B',16);
	$pdf->SetXY(145, 18);
	$pdf->Cell(60,8,'Nº '.str_pad($id,6,0,STR_PAD_LEFT),1,1,'C');
	
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(10, 30);
	$pdf->Cell(50,6,"OBRA SOCIAL",1,1,'C');
	$pdf->SetXY(60, 30);
	$pdf->Cell(50,6,"RNOS 111.001",1,1,'C');
	$pdf->SetXY(110, 30);
	$pdf->Cell(70,6,"LUGAR DE EMISION",1,1,'C');
	$pdf->SetXY(180, 30);
	$pdf->Cell(25,6,"FECHA",1,1,'C');
	
	$pdf->SetFont('Arial','B',9);
	$pdf->SetXY(10, 36);
	$pdf->Cell(100,12,"",1,1,'C');
	$pdf->SetXY(10, 36);
	$pdf->Cell(100,6,"OBRA SOCIAL DEL PERSONAL",0,0,'C');
	$pdf->SetXY(10, 42);
	$pdf->Cell(100,6,"DE LA INDUSTRIA MADERERA",0,0,'C');
	
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(110, 36);
	$pdf->Cell(70,12,$_SESSION['nombre'],1,1,'C');
	$pdf->SetXY(180, 36);
	$pdf->Cell(25,12,$rowOrden['fechaorden'],1,1,'C');
	
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(10, 48);
	$pdf->Cell(80,6,"BENEFICIARIO NUMERO",1,1,'C');
	$pdf->SetXY(90, 48);
	$pdf->Cell(10,6,"EDAD",1,1,'C');
	$pdf->SetXY(100, 48);
	$pdf->Cell(10,6,"SEXO",1,1,'C');
	$pdf->SetXY(110, 48);
	$pdf->Cell(45,6,"FECHA PRESTACION",1,1,'C');
	$pdf->SetXY(155, 48);
	$pdf->Cell(50,6,"ESTABLECIMIENTO",1,1,'C');
	
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(10, 54);
	$pdf->Cell(80,8,$rowOrden['nrafil'],1,1,'C');
	$pdf->SetXY(90, 54);
	$pdf->Cell(10,8,$rowOrden['edad'],1,1,'C');	
	$pdf->SetXY(100, 54);
	$pdf->Cell(10,8,$rowOrden['sexo'],1,1,'C');
	$pdf->SetXY(110, 54);
	$pdf->Cell(45,8,"",1,1);
	$pdf->SetXY(155, 54);
	$pdf->Cell(50,8,"",1,1);
	
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(10, 62);
	$pdf->Cell(100,6,"APELLIDO Y NOMBRE",1,1,'C');
	$pdf->SetXY(110, 62);
	$pdf->Cell(95,6,"DIAGNOSTICO O CIE.10",1,1,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(10, 68);
	$pdf->Cell(100,8,$rowOrden['nombre'],1,1,'C');
	$pdf->SetXY(110, 68);
	$pdf->Cell(95,8,"",1,1,'C');
	
	$pdf->SetFont('Arial','',8);
	$pdf->SetXY(10, 76);
	$pdf->Cell(100,6,"FIRMA DEL BENEFICIARIO",1,1,'C');
	$pdf->SetXY(110, 76);
	$pdf->Cell(95,6,"FIRMA Y SELLO PROFESIONAL",1,1,'C');
	$pdf->SetXY(10, 82);
	$pdf->Cell(100,20,"",1,1);
	$pdf->SetXY(110, 82);
	$pdf->Cell(95,20,"",1,1);
	$pdf->SetXY(10, 102);
	$pdf->Cell(195,6,"FIRMA RESPONSABLE OBRA SOCIAL",1,1,'C');
	$pdf->SetXY(10, 108);
	$pdf->Cell(195,27,"",1,1);
	$pdf->SetFont('Arial','',10);
	$pdf->SetXY(10, 137);
	$pdf->Cell(195,1,"--------------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'C');
	
	$cuilnombre = $rowOrden['nrcuil'];
	if ($cuilnombre == "" ) {
	    $cuilnombre = $rowOrden['nrcuiltitular'];
	}
	
	$docname = "OC-".str_pad($id,6,0,STR_PAD_LEFT)."-".$cuilnombre.".pdf";
	$pdf->Output('D',$docname);
	
	$dbname = "sistem22_intranet";
	$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->beginTransaction();
	
	$fechaemision = date("Y-m-d h:i:s");
	$sqlUpdateOrden = "UPDATE ordenesconsulta SET emitida = 1, fechaestado = '$fechaemision' WHERE id = $id and delcod = $delcod";
	$dbh->exec($sqlUpdateOrden);
	
	$dbh->commit();
} catch (Exception  $e) {
	echo $e->getMessage();
}
?>