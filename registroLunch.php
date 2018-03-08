
<?php 

require 'submenu.php';
require 'funcs/conexion.php';
require 'funcs/funcsForo.php';

$sql = "SELECT * FROM docente ";

$result= $mysqli->query($sql);
$row = $result->fetch_assoc();
$errors = array();


if(!empty($_POST))
{
	$titulo = $mysqli->real_escape_string($_POST['titulo']);
	$autor = $mysqli->real_escape_string($_POST['autor']);  
	$tema = $mysqli->real_escape_string($_POST['tema']);    
	$descrip = $mysqli->real_escape_string($_POST['descrip']);    
	$urlImg = $mysqli->real_escape_string($_POST['urlImg']);    

	if(count($errors) == 0)
	{

		$registroForo = registraForo($titulo,$autor,$tema,$descrip,$urlImg);    

	} 
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	
</head>

<body>
	<br>
	<br>
	<br>
	<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
		<fieldset class="scheduler-border" style="width:90%;
		margin: 0 auto; /* Or auto */
		padding:0 10px; /* To give a bit of padding on the left and right */
		border-bottom:none;
		border: #0489B1 3px solid;
		">
		<br>
		<div class="form-group">
			<label for="titulo" class="col-sm-2 control-label">Titulo</label>
			<div class="col-sm-10">
				<input type="text" class="form-control"  name="titulo" placeholder="Titulo de publicación" value="<?php if(isset($titulo)) echo $titulo; ?>" required>
			</div>
		</div>

		<div class="form-group">
			<label for="autor" class="col-sm-2 control-label">Autor</label>
			<div class="col-sm-10">
				<select class="form-control" id="autor" name="autor">
					<option value="0" selected="selected"><?php echo $row['coddoc'];?></option>
					
					<?php
					while ($valores =mysqli_fetch_array($result)) {
						echo '<option value='.$valores['coddoc'].'>'.$valores['nombre'].'</option>';
					}
					?>

				</select>
			</div>
		</div>

		
		<div class="form-group">
			<label for="tema" class="col-sm-3 control-label">Tema </label>
			<div class="col-sm-9">
				<select class="form-control" id="tema" name="tema">
					<option value="Lonchera Saludable">Lonchera saludable</option>
					<option value="Comunicados">Comunicados</option>
					<option value="Aseo personal">Aseo personal</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="texto" class="col-sm-3 control-label">Descripcion</label>
			<textarea class="form-control" id="descrip" name="descrip" rows="5" cols="80"></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="archivo" class="col-sm-2 control-label">Archivo</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="archivo" name="archivo">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a href="menu.php" class="btn btn-default">Regresar</a>
			<button name= "registrar" id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
		</div>
	</div>
</fieldset>
</form>

						
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>