<?php include ("verificaSesionOrdenes.php");
print("<br>");
$archivo_name = $_POST['archivo'];
$OKSerializado = $_POST['regOK'];
$registrosOK = unserialize(urldecode($OKSerializado));

$NOOKSerializado = $_POST['regNOOK'];
$registrosNOOK = unserialize(urldecode($NOOKSerializado));

//var_dump($registrosOK);echo "<br><br><br>";
//var_dump($registrosNOOK);echo "<br><br><br>";

$arrayCantidades = array();
foreach ($registrosOK as $registro) {
    $arrayRegistro = explode('|', $registro);
    $delcod = $arrayRegistro[1];
    $fecha = $arrayRegistro[2];
    $mes = substr($fecha, 4, 2);
    $anio = substr($fecha, 0, 4);
    $cuil = $arrayRegistro[3];
    if ($cuil == '') {
        $cuil = $arrayRegistro[8];
    }
    $primerDia = date('Y-m-d', mktime(0,0,0, $mes, 1, $anio));
    $sqlConsultaCantidad = "SELECT count(id) as cantidad FROM ordenesconsulta WHERE nrcuil = $cuil and delcod = $delcod and fechaorden >= '$primerDia' and autorizada != 2";
    $resConsultaCantidad = mysql_query($sqlConsultaCantidad,$db);
    $rowConsultaCantidad = mysql_fetch_assoc($resConsultaCantidad);
    $arrayCantidades[$cuil][$anio.$mes] = $rowConsultaCantidad['cantidad'];
}

//echo "<br><br>";

foreach ($registrosOK as $nroordenref => $registro) {
    $arrayRegistro = explode('|', $registro);
    $mes = substr($fecha, 4, 2);
    $anio = substr($fecha, 0, 4);
    $cuil = $arrayRegistro[3];
    $autorizado = $arrayRegistro[9];
    if ($cuil == '') {
        $cuil = $arrayRegistro[8];
    }
    
    //echo $cuil."<br>";
    
    if ($arrayCantidades[$cuil][$anio.$mes] > 4) {
        unset($registrosOK[$nroordenref]);
        $registrosNOOK[$nroordenref] = array('resultado'=> array('3','Supero la cantidad permitida por mes para el mismo cuil'), 'registro'=>$registro);
    } else {
        if ($arrayCantidades[$cuil][$anio.$mes] == 4 and $autorizado == 1) {
            unset($registrosOK[$nroordenref]);
            $registrosNOOK[$nroordenref] = array('resultado'=> array('3','Error. Esta es la 5 orden de conulta para este cuil, debe tener autorizacion de OSPIM central'), 'registro'=>$registro);
        }
        if ($arrayCantidades[$cuil][$anio.$mes] < 4 || ($arrayCantidades[$cuil][$anio.$mes] == 4 and $autorizado == 0)) {
            $arrayCantidades[$cuil][$anio.$mes] += 1;
        } else {
            unset($registrosOK[$nroordenref]);
            $registrosNOOK[$nroordenref] = array('resultado'=> array('3','Error. Esta es la 5 orden de conulta para este cuil, debe tener autorizacion de OSPIM central'), 'registro'=>$registro);            
        }
    }
}

//var_dump($registrosOK);echo "<br><br><br>";
//var_dump($registrosNOOK);echo "<br><br><br>";

$registroOKSerializado = serialize($registrosOK);
$registroOKSerializado = urlencode($registroOKSerializado);

$registroNOOKSerializado = serialize($registrosNOOK);
$registroNOOKSerializado = urlencode($registroNOOKSerializado);  ?>

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
        	$.blockUI({ message: "<h1>Pasando a pantalla de Resultados... <br>Esto puede tardar unos minutos.<br> Aguarde por favor</h1>" });
        	function formSubmit() {
        		document.getElementById("resultados").submit();
        	}
        </script>
   </head>
   <body onload="formSubmit();">
         <form action="listado.importar.resultados.php" id="resultados" method="post"> 
            <input name="regOK" type="hidden" value="<?php echo $registroOKSerializado ?>"/>
            <input name="regNOOK" type="hidden" value="<?php echo $registroNOOKSerializado ?>"/>
            <input name="archivo" type="hidden" value="<?php echo $archivo_name ?>"/>
          </form> 
   </body>
</html>