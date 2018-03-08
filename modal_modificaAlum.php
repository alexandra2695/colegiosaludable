<?php

require 'funcs/conexion.php';
$codalum = $_GET['codalum'];
//$codalum=(isset($_GET['codalum'])?  $_GET['codalum']:null);
$sql = "SELECT * FROM alumno WHERE codalum = '$codalum'";
$result = $mysqli->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

?>	


<div class="modal fade" id="dataModificar" tabindex="-1" role="form" action="update.php" method="POST" autocomplete="off" enctype="multipart/form-data">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Modificar Alumno</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="codalum" name="codalum" value="<?php echo $row['codalum']; ?>" />
					<label for="nombre" class="col-sm-2 control-label">Nombre:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>


					<div class="form-group">
						<label for="apellido" class="col-sm-2 control-label">Apellido</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="apellido" placeholder="Apellido" value="<?php echo $row['apellido']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="edad" class="col-sm-2 control-label">Edad</label>
						<div class="col-sm-10">
							<input type="num" class="form-control" id="edad" name="edad" placeholder="Edad" value="<?php echo $row['edad']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="distrito" class="col-sm-2 control-label">Distrito</label>
						<div class="col-sm-10">
							<input type="distrito" class="form-control" id="distrito" name="distrito" placeholder="Distrito" value="<?php echo $row['distrito']; ?>" require>
						</div>
					</div>
					<div class="form-group">
						<label for="grado" class="col-sm-2 control-label">Grado</label>
						<div class="col-sm-10">
							<input type="grado" class="form-control" id="grado" name="grado" placeholder="grado" value="<?php echo $row['grado']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="seccion" class="col-sm-2 control-label">Seccion</label>
						<div class="col-sm-2">
							<select class="form-control" id="seccion" name="seccion">
								<option value="A" <?php if($row['seccion']=='A') echo 'selected'; ?>>A</option>
								<option value="B"<?php if($row['seccion']=='B') echo 'selected'; ?>>B</option>
								<option value="C" <?php if($row['seccion']=='C') echo 'selected'; ?>>C</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="turno" class="col-sm-2 control-label">Turno</label>
						<div class="col-sm-2">
							<select class="form-control" id="turno" name="turno">
								<option value="M"<?php if($row['turno']=='M') echo 'selected'; ?>>M</option>
								<option value="T"<?php if($row['turno']=='T') echo 'selected'; ?>>T</option>
							</select>
						</div>
					</div>
            <!--  <div class="form-group">
                <label for="captcha" class="col-md-3 control-label"></label>
                <div class="g-recaptcha col-md-9" data-sitekey="6Ld9nBcUAAAAAHCWmXzWLIEznhvGu__mScjaoPbo"></div>
            </div>-->
        </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button name= "modificar" id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Guardar</button> 
        </div>

    </div>
</div>
</div>
</div>

<script type="text/javascript">
		$(document).ready(function() {
			$('.delete').click(function(){
				var parent = $(this).parent().attr('codalum');
				var service = $(this).parent().attr('data');
				var dataString = 'codalum='+service;


			});                 
		});    
</script>
