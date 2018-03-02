<?php include ("verificaSesion.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Beneficiarios</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="viewport"
	content="width=device-width,initial-scale=1,maximum-scale=1" />
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet"
	href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:500,700'
	rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			
			<?php include_once ("navbar.php"); ?>
			
			<h2 class="page-header"><i style="font-size: 50px" class="glyphicon glyphicon-user"></i><br>Beneficiarios</h2>
			<form class="form-signin mg-btm" id="busquedaForm">
				<div class="main">
					<p>Filtro de Busqueda:
						<select name="orden" id="orden">
							<option value="nrafil">Nro. Afiliado</option>
						    <option value="nrodoc">Nro. Documento</option>
						    <option value="nrcuil">C.U.I.L.</option>
						    <option value="nombre">Apellido</option>  
						</select>
					</p>
					<p>Dato de Busqueda: 
						<input type="text" name="condicion" id="condicion" required="required" placeholder="Busqueda"/>
					</p>
					<p><input class="btn btn-primary" type="submit" id="buscar" value="Buscar" /></p>
				</div>
			</form>
			<div class="col-md-10 col-md-offset-1" id="resultado"></div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 O.S.P.I.M.<p>
			</div>
		</div>
	</div>
</body>

<script>

$("#busquedaForm").submit(function() {
	$("#resultado").html("");
	var orden = $("#orden").val();
	var condicion = $("#condicion").val();
	if (condicion != "") {
		$("#resultado").load("beneficiarios.busqueda.php", {orden: orden, condicion: condicion});
	}
	return false;
});


</script>

</html>
