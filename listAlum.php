<?php 
session_start();
require 'submenu.php';
require 'funcs/conexion.php';
require 'modal_agregarAlum.php';
require 'modal_modificaAlum.php';

$where="";
if(!empty($_POST))
{
	$valor = $_POST['campo'];
	if(!empty($valor)){
		$where = "WHERE nombre LIKE '%$valor'" ;
	}
}
$sql = "SELECT * FROM alumno where estado=1 $where ";
$resulta= $mysqli->query($sql);
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
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Nuevo Alumno</button>
			
			</div>
		</div>
		<br>
		<div class="row table-responsive">

			<table class=" table table-striped table-bordered nowrap" cellspacing="0" width="100%" id="mitabla">
				<thead>
					<tr>
						<th>CodAlum</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Grado</th>
						<th>Seccion</th>
						<th>Turno</th>
						<th>Apoderado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php while($row = $resulta->fetch_array(MYSQLI_ASSOC)) { ?>
					<tr>
						<td><?php echo $row['codalum'];?></td>
						<td><?php echo $row['nombre'];?></td>
						<td><?php echo $row['apellido'];?></td>
						<td><?php echo $row['grado'];?></td>
						<td><?php echo $row['seccion'];?></td>
						<td><?php echo $row['turno'];?></td>
						<td><?php echo $row['apoderado'];?></td>
						<?// span es para poner un icono ?>
						<td><a href="#" id="<?php echo $row['codalum']; ?>" data-toggle="modal" data-target="#dataModificar"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
						<td><a href="#" data-href="eliminarAlum.php?codalum=<?php echo $row['codalum']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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


		$('#reportes').change(function () {
			var opval = $(this).val();
			if (opval == "TDD") {
				$('#TDD_Modal').modal("show");
			}
			else if (opval == "MCP") {
				$('#MCP_Modal').modal("show");
			}
		});
		$(function () {
			$('#consultarTDD').on('click', function () {
				var fecha_inicio = $('#fecha_inicio').val();
				var fecha_fin = $('#fecha_fin').val();
				var html = '';
				$('#datosidd').html(html);
				console.log(fecha_inicio, fecha_fin);
				if (fecha_inicio != '' && fecha_fin != '') {
					$.ajax({
						url: '/ordentrabajo/api/ordentrabajo_para_tdd/',
						type: 'POST',
						data: {
							fecha_inicio: fecha_inicio,
							fecha_fin: fecha_fin
						}, dataType: 'json',
						success: function (json) {
							var data = json.data;
							console.log(data);
							var count = Object.keys(data).length;
							html = '<table class="table table-condensed f-10" style="text-align: center;"><tr>';
							html += '<th>Orden Trabajo</th>';
							html += '<th>Estado<br/>Trabajo</th>';
							html += '<th>Fecha<br/>Orden</th>';
							html += '<th>Fecha<br/>Prometida</th>';
							html += '<th>Fecha<br/>Listo</th>';
							html += '<th>Días<br/>Promesa</th>';
							html += '<th>Días<br/>Vencidos</th>';
							html += '<th>Monto<br/>Total</th>';
							html += '<th>Valor Total<br/>(Sin IGV)</th>';
							html += '<th>TDD</th>';
							html += '</tr>';
							html += '<tbody>';
							var ult = data[data.length - 1];
							console.log(data.pop())
							$.each(data, function (k, v) {
								html += '<tr>';
								html += '<td>' + v.codigo_ot + '</td>';
								html += '<td>' + v.estado_trabajo + '</td>';
								html += '<td>' + v.fecha_orden + '</td>';
								html += '<td>' + v.fecha_prometida + '</td>';
								html += '<td>' + v.fecha_listo + '</td>';
								html += '<td>' + v.dias_promesa + '</td>';
								html += '<td>' + v.dias_vencido + '</td>';
								html += '<td>' + v.monto_total + '</td>';
								html += '<td>' + v.valor_total + '</td>';
								html += '<td>' + v.TDD + '</td>';
								html += '</tr>';
							});
							html += '</tbody></table>';
							html += '<div>TOTAL: ' + ult.total + ' Días-Dollar</div>';
							$('#datostdd').html(html);
						},
						error: function (xhr, status) {
							console.log('ERROR:', xhr, status);
						}
					});
				} else {
					console.log('No se ingresó fechas');
				}
			});
		});
		</script>


	</div>
</body>
</html>