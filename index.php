<!DOCTYPE html>
<html>
<head>
<title>O.S.P.I.M. - Intranet Delegaciones</title>
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
		<div class="row" align="center">
			<form class="form-signin mg-btm" id="form_ingreso">
				<h2 class="heading-desc">Intranet Delegaciones</h2>
				<img class="img-responsive" src="images/logo.png" width="378px" height="378px"/>
				<div class="main">
					<h4 style="color: red"><span id="errorIngreso" class="clearfix"></span></h4>
					<div class="input-group">
						<span class="input-group-addon"><i
							class="glyphicon glyphicon-user"></i></span> <input type="text" id="usuario"
							required="required" class="form-control" placeholder="Usuario">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i
							class="glyphicon glyphicon-lock"></i></span> <input
							type="password" class="form-control" required="required" id="pass"
							placeholder="Contrase&ntilde;a">
					</div>
					<div class="row">
						<div class="col-xs-8 col-md-8" style="text-align: left;">
							<label><a href="recupero.php">&iquest;Olvido su contrase&ntilde;a?</a></label>
						</div>
						<div class="col-xs-4 col-md-4 pull-right">
							<button type="submit" id="submit" name="submit" class="btn btn-large btn-success pull-right">Login</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>


<script type="text/javascript">
	$("#form_ingreso").submit(function( event ) {
		$("#submit").prop('disabled', true);
		$('#errorIngreso').html("");
		var usuario = $('#usuario').val();
		var pass = $('#pass').val();
		$.post("verificaID.php", {usuario : usuario, pass: pass}, function(data) {
			if (data == 1) {
				window.location = "menu.php";
			} else {
				$('#errorIngreso').html("Error en usuario y/o contrase&ntilde;a");
				$("#submit").prop('disabled', false);
			}
		});
		return false;
	});
	
</script>

</html>


