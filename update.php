<?php

require 'funcs/conexion.php';

$codalum = $_POST['codalum'];
$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$edad = $_POST['edad'];
$distrito=$_POST['distrito'];
$grado=$_POST['grado'];
$seccion=$_POST['seccion'];
$sql= "UPDATE alumno SET nombre='$nombre',apellido='$apellido',edad='$edad',distrito='$distrito',
grado='$grado', seccion='$seccion' WHERE codalum='$codalum'";
$result= $mysqli->query($sql);	
?>
<!DOCTYPE html>
<html>
<!--<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>-->
	
	<body>
		<div class="modal-body">
			
					<?php if($result) { ?>
						<p>REGISTRO MODIFICADO</p>
						<?php } else { ?>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<a href="listAlum.php" class="btn btn-primary">Regresar</a>
					
					<?php } ?>			
			</div>
		
	</body>
</html>	