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
					<p align="justify">El nuevo m�dulo O.C. OSPIM,  sistema de �rdenes de Consulta Online, es una herramienta pensada para atender las necesidades de consulta m�dica ambulatoria de los beneficiarios. Esta herramienta, 
						funcional a trav�s de la Intranet,  posibilitar� a las distintas delegaciones de la O.S.P.I.M. gestionar  la obtenci�n por parte de los beneficiarios de la Orden de Consulta, permitiendo a las mismas implementar distintas estrategias de atenci�n, 
						ya sea de tipo presencial o a distancia. Dichas estrategias podr�n organizarse seg�n los requerimientos y posibilidades operativas de cada delegaci�n, bas�ndose en el concepto de Orden de Consulta electr�nica, a trav�s de la generaci�n de 
						un documento digital (archivo de tipo .PDF) que puede ser impreso para su entrega presencial o remitido por lo distintos canales de comunicaci�n actuales (ej: correo electr�nico y whatsapp).</p>
					<p align="justify">A continuaci�n encontrar�n una serie de video tutoriales que les permitir� obtener una referencia visual e instruir�n sobre las caracter�sticas principales y el uso del m�dulo O.C. OSPIM. 
						Para quienes, luego de introducirse a trav�s de estos video tutoriales, a�n presenten dudas e  inquietudes  acerca del uso y operatividad, el Depto. de Sistemas organizar� oportunamente una serie de videos talleres online a modo de apoyo. 
						Los mismos se organizar�n a trav�s de la plataforma de reuni�n virtual Zoom y en tandas sucesivas de no m�s de seis asistentes y con la intenci�n exclusiva de atender situaciones muy espec�ficas de funcionalidad e implementaci�n. 
						Les solicitamos tener muy en cuenta esta prerrogativa al momento de inscribirse. Para inscribirse en ellos, deber�n enviar un correo electr�nico a la direcci�n intranet@ospim.com.ar con el asunto �Video Taller Online Modulo O.C. OSPIM� 
						identific�ndose con Usuario de Ingreso a la Intranet, Nombre de la Delegaci�n, Nombre del asistente (podr�n presenciar m�s de una persona pero con un �nico canal de conexi�n y un solo participante audio parlante), y una descripci�n breve 
						del motivo por el que se solicita la participaci�n en los video talleres. Su participaci�n le ser� informada a trav�s del mismo medio, indic�ndose d�a y horario del taller programado.</p>
					<div class="col-md-6">
                      	<video width="100%" controls>
                          <source src="files/videos/01-Tutorial cargar ordenes de consulta.mp4" type="video/mp4">
                        </video>
                    </div>	
					<div class="col-md-6">
						<h4>Como generar ordenes de consulta</h4>
						<p align="justify">
        					A la izquierda de la pantalla te dejamos un video explicativo que te muestra, paso a paso, 
        					el procedimiento general para la generaci�n de una orden de consulta. En �l se observa como 
        					utilizando el CUIL el sistema identifica autom�ticamente y en forma directa al beneficiario, 
        					sin importar que se tratase de un titular o un familiar. El sistema permite generar y 
        					administrar hasta cinco ordenes de consulta por beneficiario ( cinco ordenes de consulta por CUIL) 
        					por mes, cuatro de generaci�n directa y libre, y una quinta que requerir� de un proceso de autorizaci�n 
        					atendido por el departamento de Auditoria y Autorizaciones de la O.S.P.I.M. central.
						</p>
					</div>
				</div>
				<div class="row" style="margin: 15px">
					<div class="col-md-6">
						<h4>Como generar una orden de consulta para un beneficiario reci�n nacido</h4>
						<p align="justify">
        					Los hijos reci�n nacidos pueden presentar algunas situaciones particulares como: ausencia de CUIL, 
        					documentaci�n en tr�mite y/o falta de empadronamiento en el registro de beneficiarios de la O.S.P.I.M. 
        					Para cubrir estas carencias se ha formulado una funcionalidad espec�fica para el caso. En este video, 
        					a la derecha de este texto explicativo, se visualiza el procedimiento que te muestra como generar una 
        					orden de consulta para reci�n nacidos, utilizando como datos identificatorios el CUIL del beneficiario 
        					titular (mama, papa o titular a cargo) m�s datos propios del beneficiario reci�n nacido.
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
						<h4>Generaci�n de quinta orden de consulta en el mes para un mismo beneficiario</h4>
						<p align="justify">
        					En este video, a la izquierda de este texto, te mostramos el procedimiento para generar una quinta orden 
        					de consulta en el mes para un mismo beneficiario (quinta orden de consulta para un CUIL). 
        					Esta circunstancia requiere de la intervenci�n del departamento de Auditoria y Autorizaciones de 
        					la O.S.P.I.M. central, solicitud que para ser atendida debe ser acompa�ada de un resumen de historia 
        					cl�nica, la cual ser� provista por la delegaci�n, carg�ndola a trav�s del mismo modulo O.C. OSPIM en 
        					formato de archivo digital, documento tipo PDF (referir a contenido t�cnico dentro de esta misma p�gina 
        					denominado �Impresora PDF. Convertir documentos a PDF compatible con el modulo de Autorizaciones� que 
        					es aplicable tambi�n al caso). La solicitud quedara en suspenso hasta ser atendida, dependiendo, 
        					la generaci�n de la quinta orden de consulta, de la aprobaci�n o rechazo que ser� comunicada por 
        					intermedio del mismo modulo O.C. OSPIM.
        				</p>
					</div>
				</div>
				
				<hr>
				
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