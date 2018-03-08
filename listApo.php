<?php 
session_start();
require 'submenu.php';
require 'funcs/conexion.php';
require 'modal_agregarApod.php';

$where="";
if(!empty($_POST))
{
	$valor = $_POST['campo'];
	if(!empty($valor)){
		$where = "WHERE nombre LIKE '%$valor'";
	}
}
$sql = "SELECT * FROM apoderado $where";
$result= $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="media/font-awesome/css/font-awesome.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#mitabla').DataTable({
				"order": [[1, "asc"]],
				"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros disponibles",
					"infoFiltered": "(filtrada de _MAX_ registros)",
					"loadingRecords": "Cargando...",
					"processing":     "Procesando...",
					"search": "Buscar:",
					"zeroRecords":    "No se encontraron registros coincidentes",
					"paginate": {
						"next":       "Siguiente",
						"previous":   "Anterior"
					},					
				}
			});	
		});	


	</script>

	<style>
	body {
		padding-top: 20px;
		padding-bottom: 20px;
	}
</style>  
</head>
<body>
	<br>
	<br>
	<div class="container ">
		<div class="row">
			<div class="btn-group pull-left">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Agregar padre de familia</button>
			
			</div>
		</div>
		<br>
		<div class="row table-responsive">

			<table class=" table table-striped table-bordered nowrap" cellspacing="0" width="100%" id="mitabla">
				<thead>
					<tr>
						<th>CodApo</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Telefono</th>
						<th>Hijo</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['codapo'];?></td>
						<td><?php echo $row['nombre'];?></td>
						<td><?php echo $row['apellido'];?></td>
						<td><?php echo $row['telefono'];?></td>
						<td><?php echo $row['nomhijo'];?></td>
						<?// span es para poner un icono ?>
						<td><a href="#" id="<?php echo $row['codapo']; ?>" data-toggle="modal" data-target="#dataModificar"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
						<td><a href="#" data-href="eliminar.php?id=<?php echo $row['codapo']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
		
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>

					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Borrar</a>
					</div>
				</div>
			</div>
		</div>
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>


	</div>
</body>
</html>