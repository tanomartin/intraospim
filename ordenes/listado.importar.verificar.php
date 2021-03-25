<?php include ("verificaSesionOrdenes.php");
print("<br>");
$archivo = $_FILES['txtImp'];
$archivo_name = $archivo['name'];
$archivo_type = $archivo['type'];

function validarFecha($fecha) {
    $anoarch = substr($fecha,0,4);
    $mesarch = substr($fecha,4,2);
    $diaarch = substr($fecha,6,2);
    return checkdate($mesarch,$diaarch,$anoarch);
}

function calcularDiasVto($fechaOrden, $fechaVto) {
    $anoorden = substr($fechaOrden,0,4);
    $mesorden = substr($fechaOrden,4,2);
    $diaorden = substr($fechaOrden,6,2);
    $fechaOrdenFormato = $anoorden."-".$mesorden."-".$diaorden;
    
    $anovto = substr($fechaVto,0,4);
    $mesvto = substr($fechaVto,4,2);
    $diavto = substr($fechaVto,6,2);
    $fechaVtoFormato = $anovto."-".$mesvto."-".$diavto;
    
    $dias = (strtotime($fechaOrdenFormato)-strtotime($fechaVtoFormato))/86400;
    $dias = abs($dias); 
    $dias = floor($dias);
    return ($dias);
}


function controlarNombreArc($nombre,$type,$db) {
    $ext="text";
    if (strpos($type, $ext) !== false) {
       if (strlen($nombre) == 24) {
            $inicio=substr($nombre,0,2);
            if ($inicio == 'OC') {
                $delcod = substr($nombre,2,4);
                if ($delcod == '2602') {
                    $fechaArc = substr($nombre,6,8);
                    if (validarFecha($fechaArc)) {
                        $sqlControlSubida = "SELECT count(id) as cantidad FROM ordenesconsultarelacional WHERE archivosubida = '$nombre'";
                        $resControlSubida = mysql_query($sqlControlSubida,$db);
                        $rowControlSubida = mysql_fetch_assoc($resControlSubida);
                        if ($rowControlSubida['cantidad'] == 0) {
                            return 0;
                        } else {
                            return array(1,"Error el archivo ya fue utilizado para importar ordenes de consulta.");
                        }                   
                    } else {
                        return array(1,"Error en la fecha de generacion del archivo. Es una fecha invalida");
                   }
                } else {
                    return array(1,"Error en el codigo de delegacion");
                }
            } else {
                return array(1,"Error en el Inicio del nombre. Debe comenzar con 'OC'");
            }
        } else {
            return array(1,"Error en el largo del nombre del archivo");
        }
    } else {
        return array(1,"Error en el tipo de archivo. Debe ser TXT (texto plano)");
    }
}

function verificarCampo($registro,$numReg,$db) {
    $numeroLinea = $numReg+1;
    $regArray = explode('|',$registro);
    if (sizeof($regArray) != 11) {
        return array($numeroLinea, "El registro no contiene la cantidad de campos pedidos");
    }
    
    $nroordenrel = $regArray[0];
    $sqlControlNroRel = "SELECT count(id) as cantidad FROM ordenesconsultarelacional WHERE nroordenrelacional = $nroordenrel";
    $resControlNroRel = mysql_query($sqlControlNroRel,$db);
    $rowControlNroRel = mysql_fetch_assoc($resControlNroRel); 
    if ($rowControlNroRel['cantidad'] != 0) {
        return array($numeroLinea, "La orden de consulta ya fue ingresadas anteriormente");
    }
    
    $codigodel = $regArray[1];
    if ($codigodel != '2602') {
        return array($numeroLinea, "Error en el codigo de delegacion");
    }
    
    $fechaorden = $regArray[2];
    if (!validarFecha($fechaorden)) {
        return array($numeroLinea, "Error en la fecha de la orden de consulta");
    }
    
    $cuilbene = $regArray[3];
    $cuiltitular = $regArray[8];
    $verificarEdad = 0;
    if ($cuilbene != '') {
        $sqlControlAfil = "SELECT count(nrafil) as cantidad FROM titular WHERE nrcuil = '$cuilbene' and delcod = '$codigodel'";
        $resControlAfil = mysql_query($sqlControlAfil,$db);
        $rowControlAfil = mysql_fetch_assoc($resControlAfil); 
        if ($rowControlAfil['cantidad'] == 0) {
            $sqlControlAfil = "SELECT count(nrafil) as cantidad FROM familia WHERE nrcuil = '$cuilbene' and delcod = '$codigodel'";
            $resControlAfil = mysql_query($sqlControlAfil,$db);
            $rowControlAfil = mysql_fetch_assoc($resControlAfil); 
            if ($rowControlAfil['cantidad'] == 0) {
                $sqlControlAfil = "SELECT count(nrafil) as cantidad FROM titular WHERE nrcuil = '$cuiltitular' and delcod = '$codigodel'";
                $resControlAfil = mysql_query($sqlControlAfil,$db);
                $rowControlAfil = mysql_fetch_assoc($resControlAfil); 
                if ($rowControlAfil['cantidad'] == 0) {
                    return array($numeroLinea, "Error en el cuil del beneficiario. El mismo no se encuentra empadronado en la delegacion y el cuil del titular informado tampoco esta empadronado");
                }
                $verificarEdad = 1;
            }
        }
    } else {
        $sqlControlAfil = "SELECT count(nrafil) as cantidad FROM titular WHERE nrcuil = '$cuiltitular' and delcod = '$codigodel'";
        $resControlAfil = mysql_query($sqlControlAfil,$db);
        $rowControlAfil = mysql_fetch_assoc($resControlAfil);
        if ($rowControlAfil['cantidad'] == 0) {
            return array($numeroLinea, "Error en el cuil del titular informado. El mismo no se encuentra empadronado en la delegacion");
        }
        $verificarEdad = 1;
    }
    
    $nombre = $regArray[4];
    if (strlen($nombre) > 100) {
        return array($numeroLinea, "Error en el largo del nombre, supera el max establecido de 100 caracteres");
    }
    
    $sexo = $regArray[5];
    if ($sexo != 'M' && $sexo != 'F') {
        return array($numeroLinea, "Error en el sexo, solo se permite M o F");
    }
    
    $edad = $regArray[6];
    if (is_numeric($edad)) {
        if ($edad < 0 || $edad > 99) {
            return array($numeroLinea, "La edad debe ser un numero entre 0 y 99");
        } else {
            if ($verificarEdad == 1) {
                if ($edad > 1) {
                    return array($numeroLinea, "La edad para un recien nacido debe ser menor a 1");
                }
            }
        }
    } else {
        return array($numeroLinea, "La edad debe ser un numero entre 0 y 99");
    }
    
    $fechavto = $regArray[7];
    if (validarFecha($fechavto)) {
        $dias = calcularDiasVto($fechaorden,$fechavto);
        if ($dias > 31) {
            return array($numeroLinea, "Error en la fecha de vencimiento. La fecha de vencimiento no puede superar los 30 dias de la fecha de la orden");
        }
    } else {
        return array($numeroLinea, "Error en la fecha de vencimiento. Fecha Invalidad");
    }
    
    $autorizado = $regArray[9];
    if ($autorizado !=0 && $autorizado !=1) {
        return array($numeroLinea, "Error en la columna autorizado, valores permitidos 0 y 1");
    }

    $fechaemision = $regArray[10];
    if ($autorizado == 1) {
        if (!validarFecha($fechaemision)) {
           return array($numeroLinea, "Error en la fecha de emision. Fecha Invalidad");
        }
    } else {
        if ($fechaemision != '') {
            return array($numeroLinea, "Error en la fecha de emision. Una orden de consulta con autorizado en 0 no puede debe tener fecha de emision");
        }
    }
    return 0;
}

$nomArcOK = controlarNombreArc($archivo_name,$archivo_type,$db);
if ($nomArcOK == 0) {
    $registrosOK = array();
    $registrosNOOK = array();
    
    $registros = file($archivo['tmp_name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($registros as $numReg => $registro) { 
        $resultado = verificarCampo($registro,$numReg,$db);
        $regArray = explode('|',$registro);
        $nroordenrel = $regArray[0];
        if ($resultado == 0) {
            $registrosOK[$nroordenrel] = $registro;
        } else {
            $registrosNOOK[$nroordenrel] = array('resultado'=>$resultado,'registro'=>$registro);
        }
    }
    
    //var_dump($registrosOK);echo "<br><br><br>";
    //var_dump($registrosNOOK);echo "<br><br><br>";
    
    $registroOKSerializado = serialize($registrosOK);
    $registroOKSerializado = urlencode($registroOKSerializado);
    
    $registroNOOKSerializado = serialize($registrosNOOK);
    $registroNOOKSerializado = urlencode($registroNOOKSerializado); 
} 
?>

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
        <script type="text/javascript">
        	function formSubmit(ok) {
            	if (ok == 0) {
            		$.blockUI({ message: "<h1>Pasando a pantalla de verificacion de cantidades... <br>Esto puede tardar unos minutos.<br> Aguarde por favor</h1>" });
            		document.getElementById("cantidades").submit();
            	}
        	}
        </script>
   </head>
   
 <?php if ($nomArcOK == 0) {  ?>
         <body onload="formSubmit(<?php echo $nomArcOK?>);">
         	<form action="listado.importar.cantidades.php" id="cantidades" method="post"> 
            	<input name="regOK" type="hidden" value="<?php echo $registroOKSerializado ?>"/>
                <input name="regNOOK" type="hidden" value="<?php echo $registroNOOKSerializado ?>"/>
                <input name="archivo" type="hidden" value="<?php echo $archivo_name ?>"/>
            </form> 
         </body>
 <?php } else { ?>
 		 <body>
            <div class="container">
            		<div class="row" align="center" style="background-color: #f5f5f5;">
            			<?php include_once ("../navbar.php"); ?>
            		<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-modal-window"></i><br>Órdenes de Consulta</h2>
        			<h3>Resultado de Importacion de Ordenes de Consulta</h3>	
        			<div class="col-md-10 col-md-offset-1">
        				<h3 style="color: red">Error en el nombre del archivo. No se proceso ningun registro</h3>
        				<h4><?php echo $nomArcOK[1] ?></h4>
        			</div>
        			<div class="col-md-12 panel-footer">
        				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
        				<p>&copy; 2016 O.S.P.I.M.<p>
        			</div>
        		</div>
        	</div>
        </body>
 <?php } ?>
 
 </html>