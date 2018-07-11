<?php include ("verificaSesionAutorizaciones.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Programa Prevencion de la Salud</title>
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport"
	content="width=device-width,initial-scale=1,maximum-scale=1" />
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet"
	href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:500,700'
	rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="../include/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="../include/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/style.css"/>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="../menu.php"> <img style="max-width:38px; margin-top: -9px;" src="../images/logo.png" /></a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" >(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="../logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="../empresas.php">Empresas</a></li>
					<li><a href="../beneficiarios.php">Beneficiarios</a></li>
					<?php if ($_SESSION['tienePrevencion']) {?><li><a href="../prevencion/menuPrevencion.php">Prev. Salud</a></li><?php } ?>
					<li><a href="../autorizaciones/listado.php">Autorizaciones</a></li>
					<li><a href="../documentos.php">Inst. y Forms.</a></li>
					<li><a href="../consultas.php">Consultas</a></li>
				</ul>
			</nav>
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-plus"></i><br>Prevención de la Salud</h2>
			<div class="col-md-5 col-md-offset-1">
				 <div align="center" style="margin-bottom: 25px"><a class="style_boton1" href="listadoCancerMama.php">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Mama</a></div>
				 <div align="center" style="margin-bottom: 25px"><a class="style_boton1 boton2" href="listadoCanceUterino.php">Programa de Detecci&oacute;n Precoz del C&aacute;ncer de Cuello Uterino</a></div>
				 <div align="center" style="margin-bottom: 25px"><a class="style_boton1 boton3" href="listadoDiabetes.php">Programa de Prevenci&oacute;n de Diabetes</a></div>
				 <div align="center" style="margin-bottom: 25px"><a class="style_boton1 boton4" href="listadoHipertension.php">Programa de Prevenci&oacute;n de Hipertensi&oacute;n Arterial</a></div>
			</div>
			<div class="col-md-5">
				  <div align="center" style="margin-bottom: 25px"><a class="style_boton1 boton5" href="listadoMaternoInfantil.php">Plan Materno Infantil</a></div>
				  <div align="center" style="margin-bottom: 25px"><a class="style_boton1 boton6" href="listadoOdontologica.php">Programa de Prevenci&oacute;n Odontol&oacute;gica</a></div>
				  <div align="center" style="margin-bottom: 25px"><a class="style_boton1 boton7" href="listadoPrenatal.php">Programa de Control Prenatal</a></div>
				  <div align="center" style="margin-bottom: 25px"><a class="style_boton1 boton8" href="listadoSaludSexual.php">Programa de Salud Sexual y Procreaci&oacute;n Responsable</a></div>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.</p>
			</div>
			
		</div>
	</div>
</body>
</html>