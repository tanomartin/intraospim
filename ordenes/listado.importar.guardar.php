<?php include ("verificaSesionOrdenes.php");
include ("lib/funciones.php");
include ("lib/funcionesCarga.php");

$OKSerializado = $_POST['regOK'];
$registrosOK = unserialize(urldecode($OKSerializado));
$archivoSubida = $_POST['archivo'];
$arrayDatos = array();
foreach ($registrosOK as $nrordenref => $registro) {
    $arrayRegistro = explode("|", $registro);
    $delcod = $arrayRegistro[1];
    $fechaOrden = $arrayRegistro[2];
    $cuil = $arrayRegistro[3];
    $cuilTitu = $arrayRegistro[8];
    
    $sqlTitular = "SELECT nrafil, nrodoc FROM titular WHERE delcod = $delcod and nrcuil = '$cuil'";
    //echo $sqlTitular."<br>";
    $resTitular = mysql_query($sqlTitular,$db);
    $numTitular = mysql_num_rows($resTitular);
   
    $nroafil = '';
    $codPar = -1;
    $nrodoc = 0;
    if ($numTitular == 0) {
        $sqlFamiliar = "SELECT nrafil, nrodoc, codpar FROM familia WHERE delcod = $delcod and nrcuil = '$cuil'";
       // echo $sqlFamiliar."<br>";
        $resFamiliar = mysql_query($sqlFamiliar,$db);
        $numFamiliar = mysql_num_rows($resFamiliar);
        if ($numFamiliar == 0) {
            $sqlTitularRC = "SELECT nrafil, nrodoc FROM titular WHERE delcod = $delcod and nrcuil = '$cuilTitu'";
            //echo $sqlTitularRC."<br>";
            $resTitularRC = mysql_query($sqlTitularRC,$db);
            $rowTitularRC = mysql_fetch_assoc($resTitularRC); 
            $nroafil = $rowTitularRC['nrafil'];
            $codPar = -1;
            $nrodoc = 0;
        } else {
            $rowFamiliar = mysql_fetch_assoc($resFamiliar);
            $nroafil = $rowFamiliar['nrafil'];
            $codPar = $rowFamiliar['codpar'];
            $nrodoc = $rowFamiliar['nrodoc'];
        }
    } else {
        $rowTitular = mysql_fetch_assoc($resTitular); 
        $nroafil = $rowTitular['nrafil'];
        $codPar = 0;
        $nrodoc = $rowTitular['nrodoc'];
    }

    $nombre = $arrayRegistro[4];
    $sexo = $arrayRegistro[5];
    $edad = $arrayRegistro[6];
    $fechaVto = $arrayRegistro[7];
    
    $autorizada = $arrayRegistro[9];
    $fechaemision = $arrayRegistro[10];
    if ($autorizada == 1) {
        $sqlInsert = "INSERT INTO ordenesconsulta VALUE (DEFAULT,'$delcod','$fechaOrden','$cuil','$nroafil','$codPar','$nombre','$nrodoc','$sexo','$edad','$fechaVto','$cuilTitu',$autorizada,0,$autorizada,$fechaemision)";
    } else {
        $sqlInsert = "INSERT INTO ordenesconsulta VALUE (DEFAULT,'$delcod','$fechaOrden','$cuil','$nroafil','$codPar','$nombre','$nrodoc','$sexo','$edad','$fechaVto','$cuilTitu',$autorizada,0,$autorizada,NULL)";
    }

    $arrayDatos[$nrordenref] = array('sqlInsert' => $sqlInsert, 'autorizado' => $autorizada);
}

try {
    $dbname = "sistem22_intranet";
    $dbh = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->beginTransaction();
    
    $sqlControlSubida = "SELECT count(id) as cantidad FROM ordenesconsultarelacional WHERE archivosubida = '$archivoSubida'";
   // echo $sqlControlSubida."<br><br>";
    $resControlSubida = mysql_query($sqlControlSubida,$db);
    $rowControlSubida = mysql_fetch_assoc($resControlSubida);
    if ($rowControlSubida['cantidad'] != 0) {
        throw new PDOException('Archivo de imporatacion ya utilizado. No se realizara ninguna importacion', 1 );
    }
    
    
    foreach ($arrayDatos as $nrordenref => $datos) {
        $dbh->exec($datos['sqlInsert']);
        //echo $datos['sqlInsert']."<br>";
        $ultimo_id = $dbh->lastInsertId();
        
        if ($datos['autorizado'] == 0) {
            $nombreBuscador = "rhc".$nrordenref;
            if (isset($_FILES[$nombreBuscador])) {
                $archivo_hc = $_FILES[$nombreBuscador]["tmp_name"];
                $tamano_archivo_hc = $_FILES[$nombreBuscador]["size"];
                $hc = fopen($archivo_hc,"rb");
                $contenido_hc = fread($hc,$tamano_archivo_hc);
                $contenido_hc = addslashes($contenido_hc);
                
                $sqlInsertOrdenHC = "INSERT INTO ordenesconsultadoc VALUE($ultimo_id,'$contenido_hc')";
               // echo $sqlInsertOrdenHC."<br>";
                $dbh->exec($sqlInsertOrdenHC);
            } else {
                throw new PDOException('Archivo de hisotoria clinica no encontrado. No se realizara ninguna importacion', 1 );
            }
        }
        
        $hoy = date("Y-m-d H:i:s");
        $sqlInsertOrdenRef = "INSERT INTO ordenesconsultarelacional VALUE($ultimo_id,$nrordenref,'$archivoSubida','$hoy')";
        //echo $sqlInsertOrdenRef."<br>";
        $dbh->exec($sqlInsertOrdenRef);
    }
    
    $dbh->commit();
    header("Location: listado.php");

} catch (PDOException $e) {
    echo $e->getMessage();
    $dbh->rollback();
    exit(-1);
}

?>