<?php include ("verificaSesionAutorizaciones.php"); 
include ("lib/funciones.php");
$nrosolicitud = $_GET['nrosolicitud'];
$delcod = $_SESSION['delcod'];
$sql = "select * from autorizacionprocesada where delcod = $delcod and nrosolicitud = $nrosolicitud";
$result = mysql_query($sql,$db);
$row=mysql_fetch_array($result);

if ($delcod >= "4000") { 
	if ($row['nrafil'] != 0) {
		if ($row['codpar'] == 0) {
			$sqlDelega = "select d.nombre as delega from titular t, delega d where t.nrafil = ".$row['nrafil']." and t.delcod = d.delcod";
		} else {
			$sqlDelega = "select d.nombre as delega from familia f, delega d where f.nrafil = ".$row['nrafil']." and f.nrcuil = ".$row['nrcuil']." and f.delcod = d.delcod";
		}
		$resDelega = mysql_query($sqlDelega,$db);
		$rowDelega = mysql_fetch_array($resDelega);
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle Solicitud</title>
<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: black;
	font-size: 24px;
}
body {
	background-color: #CCCCCC;
}
.Estilo4 {
	color: #990000;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<table style="width: 739px">
  <tr>
    <td>
    	<div align="left"><p class="Estilo3">Solicitud N&uacute;mero <?php echo $nrosolicitud ?></p></div>
    </td>
    <td>
    	<table style="width: 328; height: 60; border: 1px solid">
	      <tr>
	        <td height="25"><div align="center"><strong>Fecha Solicitud</strong> </div></td>
	        <td><div align="center"><?php echo  invertirFecha($row['fechasolicitud']);?></div></td>
	      </tr>
	      <tr>
	        <td width="107" height="25"><div align="center"><strong>Status</strong> </div></td>
	        <td width="203"><div align="center"><?php echo estado($row['statusverificacion'],$row['statusautorizacion']) ?></div></td>
	      </tr>
    	</table>
     </td>
  </tr>
  <tr>
    <td><h3 class="Estilo4">Informaci&oacute;n del Beneficiario </h3></td>
    <td><h3 class="Estilo4">Informaci&oacute;n Solicitud </h3></td>
  </tr>
  <tr>
    <td>
	    <p><strong>N&uacute;mero de Afiliado:</strong> <?php echo $row['nrafil']?></p>
	    <p><strong>Apellido y Nombre: </strong><?php echo $row['nombre']?></p>
	    <p><strong>C.U.I.L.:</strong> <?php echo $row['nrcuil'] ?></p>
	   	<?php if ($delcod >= "4000") { ?>
	   		<p><strong>Delegación:</strong> <?php echo $rowDelega['delega'] ?></p>
	   	<?php }?>
	   
	    <p><strong>Tel. Fijo:</strong> <?php echo $row['telefono'] ?></p>
	    <p><strong>Tel. Movil:</strong> <?php echo $row['movil'] ?></p>
	    <p><strong>Email:</strong> <?php echo $row['email'] ?></p>
	    
	    <p><strong>Tipo:</strong> <?php echo tipoBene($row['codpar']) ?></p>
	    <p><strong>Fecha Verficaci&oacute;n:</strong>
	      <?php if ($row['fechaverificacion'] != NULL && $row['fechaverificacion'] != "0000-00-00") {
						echo invertirFecha($row['fechaverificacion']);
				  } else {
				  		echo "Pendiente";
				  } 
			?>
	- <?php echo $row['rechazoverificacion'] ?></p></td>
	    <td valign="top"><p><strong>Tipo: </strong><?php echo tipo($row['tiposolicitud']) ?></p>
	      <p><strong>Fecha Autorizaci&oacute;n:</strong>
	          <?php if ($row['fechaautorizacion'] != NULL && $row['fechaautorizacion'] != "0000-00-00") {
						echo invertirFecha($row['fechaautorizacion']);
				  } else {
				  		echo "Pendiente";
				  } 
			?>
	    - <?php echo $row['rechazoautorizacion'] ?></p>
	      <p>&nbsp;</p>
	      <p>
	        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
	      </p>
      </td>
  </tr>
</table>
</body>
</html>