<?php include ("verificaSesion.php"); 

$delcod = $_SESSION['delcod'];
$sql = "SELECT * FROM autorizacionemail WHERE delcod = $delcod";
$result = mysql_query($sql,$db);
$row = mysql_fetch_assoc($result);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:500,700' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<?php include_once ("navbar.php"); ?>
			
			<h2 class="page-header">
				<i style="font-size: 50px" class="glyphicon glyphicon-tasks"></i><br>CORONAVIRUS CONTENIDO
			</h2>
			
			<div class="row" style="margin: 15px">
				
				<div class="row" style="margin: 15px">
        			<h3>Impresora PDF. Convertir documentos a PDF compatible con el modulo de Autorizaciones</h3>
        			<div class="col-md-6">
        				<p align="justify">
        					En las circunstancias actuales mucha de la documentaci�n que es exigible por el modulo de Solicitudes de Autorizaci�n, 
        					que utilizan a trav�s de la intranet todas las delegaciones de O.S.P.I.M., es recepcionada a trav�s de canales
        					digitales no convencionales (correo electr�nico, whatsapp,etc.) y en consecuencia no son tratados con las 
        					herramientas cl�sicas utilizadas antes de declararse la emergencia sanitaria. Esto ha obligado a las distintas 
        					delegaciones a implementar m�todos para convertir la documentaci�n a formato PDF desde los distintos formatos 
        					originales en que son recepcionados, situaci�n esta �ltima, que ha provocado la circulaci�n de documentos con 
        					diferentes motores PDF que no respetan el standard respectivo y que, consecuentemente, no son compatibles con 
        					el Modulo de Autorizaciones en O.S.P.I.M. central. Para salvar esta situaci�n, que genera demoras y rechazos en 
        					la atenci�n de la solicitud de autorizaci�n, les acercamos una soluci�n de muy simple implementaci�n y uso, que 
        					respeta los standares necesarios.
        				</p>
        				<p align="justify">
        					A la derecha de la pantalla te dejamos un video explicativo que te muestra, paso a paso, como instalar, configurar y utilizar el programa.
        				</p>
        				<p align="justify">
        					A continuaci�n dejamos el link para descargar el instalador del programa.
        				</p>
        				<p align="center">
        					<a href="files/instructivos/autorizaciones/dopdf-7.exe" class="btn btn-primary btn-sm"><i style="font-size: 10px"  class="glyphicon glyphicon-arrow-down"></i> Programa</a>
        				</p>
    				</div>
    				<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/doPDF.mp4" type="video/mp4">
                        </video>
                    </div>	
    			</div>
				
				<hr>
				
				
				<div class="row" style="margin: 15px">
        			<h3>Eliminaci�n de correos electr�nicos en web mail (���IMPORTANTE!!!)</h3>
        			<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/eliminamail.mp4" type="video/mp4">
                        </video>
                    </div>	
        			<div class="col-md-6">
        				<p align="justify">
        					Con el objetivo de optimizar y controlar el tr�fico digital que las actuales circunstancias est�n generando, 
                            en relaci�n al volumen de uso de dispositivos electr�nicos y herramientas de comunicaciones, 
                            estamos recomendando que se le preste especial atenci�n a los tiempos muertos que se generan en las conexiones 
                            establecidas en la modalidad de trabajo a distancia y especialmente en el uso de los correos electr�nicos v�a web mail.<br>
                            Si est�s trabajando y en alg�n momento atendes otra tarea, no dejes tu conexi�n abierta, cerrala tal cual como te aconsejamos 
                            oportunamente hasta que retomes tu trabajo; esto es posible de hacer sin inconvenientes tantas veces como lo requieras. <br>
                            Adem�s, toma como regla, eliminar los mensajes de correo electr�nico que consideres ya atendidos y  que no te sirvan para 
                            continuar desarrollando una tarea posterior; esto cuenta tanto para los emails nuevos que estas recibiendo, 
                            como para aquellos que ya tenias almacenados con anterioridad. <br>
                            De esta forma estamos colaborando con mantener operativa nuestra propia infraestructura de acceso remoto y 
                            la red global de comunicaciones de �ndole nacional, y optimizamos el uso de los recursos digitales. <br>
                            Gracias por atender este consejo.
        				</p>
        				<p align="justify">
        					A la izquierda de la pantalla te dejamos un video explicativo que te muestra, paso a paso, como eliminar los correos electr�nicos a trav�s del web mail.
        				</p>
    				</div>
    			</div>
				
				<hr>
				
				<div class="row" style="margin: 15px">
    				<h3 style="margin-top: -4px">Uso del correo electr�nico a trav�s de web mail</h3>
        			<div class="col-md-6">
        				<p align="justify">
        					A continuaci�n usted encontrara la informaci�n para poder acceder a su correo electr�nico de autorizaciones a trav�s de web mail. 
        					Usted debe ingresar al siguiente link <a href="http://www.ospim.com.ar/webmail" target="_blank">www.ospim.com.ar/webmail.</a> 
        					Han sido reiniciadas todas las contrase�as para centralizar su uso exclusivamente a traves de webmail.<br> 
    						A continuacion los datos para su acceso.
    					</p>
    					<div class="panel panel-default">
    						<div class="panel-body">
            					<h4 style="margin-top: -4px">Su informaci�n de acceso es la siguiente</h4>
            					<b>Direcci�n de correo electr�nico: <font color="blue"><?php echo $row['email'] ?></font></b><br>
            					<b>Contrase�a: <font color="blue"><?php echo $row['clave'] ?></font></b>
        					</div>
        				</div>
        				<p align="justify">
        					A la derecha de la pantalla encontrar� un video explicativo que muestra como acceder al correo electr�nico
        					a trav�s del web mail paso a paso
        				</p>
        				
        			</div>
        			<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/webmail.mp4" type="video/mp4">
                        </video>
                    </div>	
                 </div>														  
			</div>
			
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>
</html>