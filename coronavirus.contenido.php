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
					<h3>Modulo de Ordenes de Consulta</h3>
					<p align="justify">El nuevo módulo O.C. OSPIM,  sistema de Órdenes de Consulta Online, es una herramienta pensada para atender las necesidades de consulta médica ambulatoria de los beneficiarios. Esta herramienta, 
						funcional a través de la Intranet,  posibilitará a las distintas delegaciones de la O.S.P.I.M. gestionar  la obtención por parte de los beneficiarios de la Orden de Consulta, permitiendo a las mismas implementar distintas estrategias de atención, 
						ya sea de tipo presencial o a distancia. Dichas estrategias podrán organizarse según los requerimientos y posibilidades operativas de cada delegación, basándose en el concepto de Orden de Consulta electrónica, a través de la generación de 
						un documento digital (archivo de tipo .PDF) que puede ser impreso para su entrega presencial o remitido por lo distintos canales de comunicación actuales (ej: correo electrónico y whatsapp).</p>
					<p align="justify">A continuación encontrarán una serie de video tutoriales que les permitirá obtener una referencia visual e instruirán sobre las características principales y el uso del módulo O.C. OSPIM. 
						Para quienes, luego de introducirse a través de estos video tutoriales, aún presenten dudas e  inquietudes  acerca del uso y operatividad, el Depto. de Sistemas organizará oportunamente una serie de videos talleres online a modo de apoyo. 
						Los mismos se organizarán a través de la plataforma de reunión virtual Zoom y en tandas sucesivas de no más de seis asistentes y con la intención exclusiva de atender situaciones muy específicas de funcionalidad e implementación. 
						Les solicitamos tener muy en cuenta esta prerrogativa al momento de inscribirse. Para inscribirse en ellos, deberán enviar un correo electrónico a la dirección intranet@ospim.com.ar con el asunto “Video Taller Online Modulo O.C. OSPIM” 
						identificándose con Usuario de Ingreso a la Intranet, Nombre de la Delegación, Nombre del asistente (podrán presenciar más de una persona pero con un único canal de conexión y un solo participante audio parlante), y una descripción breve 
						del motivo por el que se solicita la participación en los video talleres. Su participación le será informada a través del mismo medio, indicándose día y horario del taller programado.</p>
					<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/01-Tutorial cargar ordenes de consulta.mp4" type="video/mp4">
                        </video>
                    </div>	
					<div class="col-md-6">
						<h4>Como generar ordenes de consulta</h4>
						<p align="justify">
        					A la izquierda de la pantalla te dejamos un video explicativo que te muestra, paso a paso, 
        					el procedimiento general para la generación de una orden de consulta. En él se observa como 
        					utilizando el CUIL el sistema identifica automáticamente y en forma directa al beneficiario, 
        					sin importar que se tratase de un titular o un familiar. El sistema permite generar y 
        					administrar hasta cinco ordenes de consulta por beneficiario ( cinco ordenes de consulta por CUIL) 
        					por mes, cuatro de generación directa y libre, y una quinta que requerirá de un proceso de autorización 
        					atendido por el departamento de Auditoria y Autorizaciones de la O.S.P.I.M. central.
						</p>
					</div>
				</div>
				<div class="row" style="margin: 15px">
					<div class="col-md-6">
						<h4>Como generar una orden de consulta para un beneficiario recién nacido</h4>
						<p align="justify">
        					Los hijos recién nacidos pueden presentar algunas situaciones particulares como: ausencia de CUIL, 
        					documentación en trámite y/o falta de empadronamiento en el registro de beneficiarios de la O.S.P.I.M. 
        					Para cubrir estas carencias se ha formulado una funcionalidad específica para el caso. En este video, 
        					a la derecha de este texto explicativo, se visualiza el procedimiento que te muestra como generar una 
        					orden de consulta para recién nacidos, utilizando como datos identificatorios el CUIL del beneficiario 
        					titular (mama, papa o titular a cargo) más datos propios del beneficiario recién nacido.
        				</p>
					</div>
					<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/02-Tutorial beneficiario recien nacido.mp4" type="video/mp4">
                        </video>
                    </div>	
				</div>
				<div class="row" style="margin: 15px">	
					<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/03-Tutorial 5ta orden de consulta.mp4" type="video/mp4">
                        </video>
                    </div>	
					<div class="col-md-6">
						<h4>Generación de quinta orden de consulta en el mes para un mismo beneficiario</h4>
						<p align="justify">
        					En este video, a la izquierda de este texto, te mostramos el procedimiento para generar una quinta orden 
        					de consulta en el mes para un mismo beneficiario (quinta orden de consulta para un CUIL). 
        					Esta circunstancia requiere de la intervención del departamento de Auditoria y Autorizaciones de 
        					la O.S.P.I.M. central, solicitud que para ser atendida debe ser acompañada de un resumen de historia 
        					clínica, la cual será provista por la delegación, cargándola a través del mismo modulo O.C. OSPIM en 
        					formato de archivo digital, documento tipo PDF (referir a contenido técnico dentro de esta misma página 
        					denominado “Impresora PDF. Convertir documentos a PDF compatible con el modulo de Autorizaciones” que 
        					es aplicable también al caso). La solicitud quedara en suspenso hasta ser atendida, dependiendo, 
        					la generación de la quinta orden de consulta, de la aprobación o rechazo que será comunicada por 
        					intermedio del mismo modulo O.C. OSPIM.
        				</p>
					</div>
				</div>
				
				<hr>
				
				<div class="row" style="margin: 15px">
        			<h3>Impresora PDF. Convertir documentos a PDF compatible con el modulo de Autorizaciones</h3>
        			<div class="col-md-6">
        				<p align="justify">
        					En las circunstancias actuales mucha de la documentación que es exigible por el modulo de Solicitudes de Autorización, 
        					que utilizan a través de la intranet todas las delegaciones de O.S.P.I.M., es recepcionada a través de canales
        					digitales no convencionales (correo electrónico, whatsapp,etc.) y en consecuencia no son tratados con las 
        					herramientas clásicas utilizadas antes de declararse la emergencia sanitaria. Esto ha obligado a las distintas 
        					delegaciones a implementar métodos para convertir la documentación a formato PDF desde los distintos formatos 
        					originales en que son recepcionados, situación esta última, que ha provocado la circulación de documentos con 
        					diferentes motores PDF que no respetan el standard respectivo y que, consecuentemente, no son compatibles con 
        					el Modulo de Autorizaciones en O.S.P.I.M. central. Para salvar esta situación, que genera demoras y rechazos en 
        					la atención de la solicitud de autorización, les acercamos una solución de muy simple implementación y uso, que 
        					respeta los standares necesarios.
        				</p>
        				<p align="justify">
        					A la derecha de la pantalla te dejamos un video explicativo que te muestra, paso a paso, como instalar, configurar y utilizar el programa.
        				</p>
        				<p align="justify">
        					A continuación dejamos el link para descargar el instalador del programa.
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
        			<h3>Eliminación de correos electrónicos en web mail (¡¡¡IMPORTANTE!!!)</h3>
        			<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/eliminamail.mp4" type="video/mp4">
                        </video>
                    </div>	
        			<div class="col-md-6">
        				<p align="justify">
        					Con el objetivo de optimizar y controlar el tráfico digital que las actuales circunstancias están generando, 
                            en relación al volumen de uso de dispositivos electrónicos y herramientas de comunicaciones, 
                            estamos recomendando que se le preste especial atención a los tiempos muertos que se generan en las conexiones 
                            establecidas en la modalidad de trabajo a distancia y especialmente en el uso de los correos electrónicos vía web mail.<br>
                            Si estás trabajando y en algún momento atendes otra tarea, no dejes tu conexión abierta, cerrala tal cual como te aconsejamos 
                            oportunamente hasta que retomes tu trabajo; esto es posible de hacer sin inconvenientes tantas veces como lo requieras. <br>
                            Además, toma como regla, eliminar los mensajes de correo electrónico que consideres ya atendidos y  que no te sirvan para 
                            continuar desarrollando una tarea posterior; esto cuenta tanto para los emails nuevos que estas recibiendo, 
                            como para aquellos que ya tenias almacenados con anterioridad. <br>
                            De esta forma estamos colaborando con mantener operativa nuestra propia infraestructura de acceso remoto y 
                            la red global de comunicaciones de índole nacional, y optimizamos el uso de los recursos digitales. <br>
                            Gracias por atender este consejo.
        				</p>
        				<p align="justify">
        					A la izquierda de la pantalla te dejamos un video explicativo que te muestra, paso a paso, como eliminar los correos electrónicos a través del web mail.
        				</p>
    				</div>
    			</div>
				
				<hr>
				
				<div class="row" style="margin: 15px">
    				<h3 style="margin-top: -4px">Uso del correo electrónico a través de web mail</h3>
        			<div class="col-md-6">
        				<p align="justify">
        					A continuación usted encontrara la información para poder acceder a su correo electrónico de autorizaciones a través de web mail. 
        					Usted debe ingresar al siguiente link <a href="http://www.ospim.com.ar/webmail" target="_blank">www.ospim.com.ar/webmail.</a> 
        					Han sido reiniciadas todas las contraseñas para centralizar su uso exclusivamente a traves de webmail.<br> 
    						A continuacion los datos para su acceso.
    					</p>
    					<div class="panel panel-default">
    						<div class="panel-body">
            					<h4 style="margin-top: -4px">Su información de acceso es la siguiente</h4>
            					<b>Dirección de correo electrónico: <font color="blue"><?php echo $row['email'] ?></font></b><br>
            					<b>Contraseña: <font color="blue"><?php echo $row['clave'] ?></font></b>
        					</div>
        				</div>
        				<p align="justify">
        					A la derecha de la pantalla encontrará un video explicativo que muestra como acceder al correo electrónico
        					a través del web mail paso a paso
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