<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../plantilla/css/main.css">
    <link rel="stylesheet" href="../plantilla/css/general.css">
	<link rel="stylesheet" href="../plantilla/css/modal.css">
</head>
<body>
<?php
    include 'header.php';
?>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Solicitudes <small>Pendientes</small></h1>
			</div>
		</div>
			<div class="table-responsive">
			<table class="table table-hover text-center">
				<thead>
					<tr>                                        
						<th class="text-center">Codigo</th>
						<th class="text-center">Fecha de solicitud</th>
						<th class="text-center">Tipo de solicitud</th>
						<th class="text-center">Descripcion</th>
						<th class="text-center">Cliente</th>
						<th class="text-center">Estado</th>
						<th class="text-center">Detalles</th> 
					</tr>
				</thead>
				<tbody>
				<?php
				$con_productos = $con->prepare("SELECT solicitudes.*, estados.estado, tipo_solicitud.tipo_solicitud, usuarios.nombre, usuarios.apellido
												FROM solicitudes
												INNER JOIN usuarios ON usuarios.documento = solicitudes.cliente
												INNER JOIN tipo_solicitud ON tipo_solicitud.id_tipo_soli = solicitudes.id_tipo_soli
												INNER JOIN estados ON estados.id_estado = solicitudes.id_estado
												Where solicitudes.id_estado=5 AND solicitudes.tecnico=$cedula");
				$con_productos->execute();
				$productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
				foreach ($productos as $fila) {
					
				?>
				<tr>
						<td><?php echo $fila['id_solicitud'] ?></td>
						<td><?php echo $fila['fecha_soli'] ?></td>
						<td><?php echo $fila['tipo_solicitud'] ?></td>
						<td><?php echo $fila['descripcion'] ?></td>
						<td><?php echo $fila['nombre']." ".$fila['apellido'] ?></td>
						<td><?php echo $fila['estado'] ?></td>
						<td>
							<form method="POST">
								<button type="button" class="btn btn-primary abrirModal" data-id="<?php echo $fila['id_solicitud']; ?>">
									Gestion
								</button>
							</form>
						</td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			</div>
			<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="POST" id="modalForm" action="../funciones/actualizar_tecnico.php">
                <select style="display:none" name="estado" id="tecnicoSelect_<?php echo $fila['id_solicitud'] ?>" required>
                    <option value="6">Seleccione el Tecnico</option>
                    
                </select>
				<h2>Finalizar reparación</h2>
				
				<br>
				<input type="text" name="comentario" placeholder="Observaciones">
				<br>
				<br>
				<input type="number" name="precio" placeholder="valor de la reparacion">
                <br>
				<input type="hidden" name="soli_select" id="soli_select" value="">
                <button type="submit" class="btn btn-success">Finalizar</button>
            </form>
        </div>
    </div>
    <script>
        // JavaScript for handling modal
        document.addEventListener('DOMContentLoaded', (event) => {
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            var soliSelectInput = document.getElementById("soli_select");

            document.querySelectorAll('.abrirModal').forEach(button => {
                button.addEventListener('click', function() {
                    var soliId = this.getAttribute('data-id');
                    soliSelectInput.value = soliId;
                    modal.style.display = "block";
                });
            });

            span.addEventListener('click', function() {
                modal.style.display = "none";
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
<?php
include 'footer.php';
?>