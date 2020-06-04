<?php $maquina = $_SERVER['SERVER_NAME'];
if(strcmp("localhost",$maquina)!=0) {
	$rootPath = "//".$_SERVER['HTTP_HOST']."/intranet";
} else {
	$rootPath = "//".$_SERVER['HTTP_HOST']."/intraospim";
} ?>

<nav class="navbar navbar-default navbar-static-top" style="min-height: 65px">
	<div class="navbar-header" style="margin-left: 10px; margin-top: 7px">
		<a class="navbar-brand" href="<?php echo $rootPath ?>/menu.php"> <img style="max-width: 70px; margin-top: -20px;" src="<?php echo $rootPath?>/img/logo.png"></a>
	</div>
	<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
		<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" ><br>(U.A. <?php echo $_SESSION['fecacc'] ?>)</font> </a>
		<a style="margin: 11px 10px 0 0"  href="<?php echo $rootPath ?>/logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
	</div>
	<ul class="nav navbar-nav navbar-left" style="margin-top: 5px">
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">CONSULTAS <b class="caret"></b></a>
			<ul class="dropdown-menu" style="text-align: center">
				<li><a href="<?php echo $rootPath ?>/empresas.php">Empresas</a></li>
				<li><a href="<?php echo $rootPath ?>/beneficiarios.php">Beneficiarios</a></li>
			</ul>
		</li>

		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">PROCESOS <b class="caret"></b></a>
			<ul class="dropdown-menu" style="text-align: center">
				<li><a href="<?php echo $rootPath ?>/autorizaciones/listado.php">Autorizaciones</a></li>
				<li><a href="<?php echo $rootPath ?>/ordenes/listado.php">Órdenes de Consulta</a></li>
				<?php if ($_SESSION['tienePrevencion']) {?><li><a href="<?php echo $rootPath ?>/prevencion/menuPrevencion.php">Prevención Salud</a></li><?php } ?>
			</ul>
		</li>
		
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">DOCUMENTOS <b class="caret"></b></a>
			<ul class="dropdown-menu" style="text-align: center">
				<li><a href="<?php echo $rootPath ?>/documentos.php">Documentos y Formularios</a></li>
				<li><a href="<?php echo $rootPath ?>/instructivos.php">Instructivos</a></li>
			</ul>
		<li><a href="<?php echo $rootPath ?>/coronavirus.php">CORONAVIRUS</a></li>
		<li><a href="<?php echo $rootPath ?>/consultas.php">CONTACTO</a></li>
	</ul>
</nav>