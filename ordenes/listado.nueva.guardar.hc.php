<?php include ("verificaSesionOrdenes.php");
$delcod = $_SESSION['delcod'];
echo $delcod."<br>";

var_dump($_POST); echo "<br>";
var_dump($_FILES);

try {
	$dbname = "sistem22_intranet";
	$dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->beginTransaction();
	
	$sqlInsertOrden = $_POST['insert'];
	$dbh->exec($sqlInsertOrden);
	$ultimo_id = $dbh->lastInsertId();
	
	$archivo_hc = $_FILES["rhc"]["tmp_name"];
	$tamano_archivo_hc = $_FILES["rhc"]["size"];
	$hc = fopen($archivo_hc,"rb");
	$contenido_hc = fread($hc,$tamano_archivo_hc);
	$contenido_hc = addslashes($contenido_hc);
	
	$sqlInsertOrdenHC = "INSERT INTO ordenesconsultadoc VALUE($ultimo_id,'$contenido_hc')";
	$dbh->exec($sqlInsertOrdenHC);
	
	$dbh->commit();
	header("Location: listado.php");
} catch (PDOException $e) {
	echo $e->getMessage();
	$dbh->rollback();
	exit(-1);
}
?>