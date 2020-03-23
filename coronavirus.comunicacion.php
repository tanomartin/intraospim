<?php include ("verificaSesion.php"); ?>

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
				<i style="font-size: 50px" class="glyphicon glyphicon-info-sign"></i><br>CORONAVIRUS COMUNICACIONES
			</h2>
		
			<div class="row" style="margin: 15px">
    			<div class="col-md-12">
    				<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h2 class="panel-title">
								<b>Comunicado 1 - 23/03/2020</b>
							</h2>
        				</div>
        				<div class="panel-body" style="text-align: justify;">
                            Ante la Emergencia Sanitaria declarada por el Gobierno Nacional, y respondiendo a las solicitudes emitidas por el Secretario General de la U.S.I.M.R.A. y el Presidente de la O.S.P.I.M., 
                            ha sido desarrollado e implementado un canal de Comunicación Institucional, inicialmente a través de la Intranet de la O.S.P.I.M., en concordancia con las necesidades relacionadas al 
                            cuidado de la salud y el esfuerzo en la lucha contra la propagación del COVID19, con el objeto de agilizar y centralizar las intercomunicaciones generadas entre los Sindicatos, las Delegaciones, 
                            el Secretariado Nacional de la U.S.I.M.R.A. y el Consejo Directivo de la O.S.P.I.M.<br>
                            En el mencionado canal, además, se ofrecerán contenidos de índole técnico-informativo con la intención de 
                            facilitar el desempeño de las tareas administrativas en su modalidad home oficce, en relación a la atención de los afiliados y beneficiarios de manera no presencial.<br>
                            La mejor manera de ayudar ante esta crisis es cumpliendo con la cuarentena establecida por el Gobierno Nacional, y observando la prerrogativa de quedarnos en casa.<br>
                            Quedémonos en casa, cuidémonos entre todos!!!<br><br>
                            
                            <p style="text-align: right; margin: 15px"><b>Depto. de Sistemas<br>U.S.I.M.R.A./O.S.P.I.M.</b></p>
                        </div>
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