<!DOCTYPE html>
<html lang="es">
<head>
	<title>Reparaciones Finalizadas</title>
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
			  <h1 class="text-titles">Solicitudes <small>Finalizadas</small></h1>
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
                        <th class="text-center">Valor</th>
						<th class="text-center">Observaciones</th>
						<th class="text-center">Estado</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$con_productos = $con->prepare("SELECT solicitudes.*, estados.estado, tipo_solicitud.tipo_solicitud, usuarios.nombre                  
												FROM solicitudes
												INNER JOIN usuarios ON usuarios.documento = solicitudes.tecnico
												INNER JOIN tipo_solicitud ON tipo_solicitud.id_tipo_soli = solicitudes.id_tipo_soli
												INNER JOIN estados ON estados.id_estado = solicitudes.id_estado
												Where solicitudes.id_estado=6 AND solicitudes.tecnico=$cedula");
				$con_productos->execute();
				$productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
				foreach ($productos as $fila) {
					
				?>
				<tr>
						<td class="cuerpoTabla"><?php echo $fila['id_solicitud'] ?></td>
						<td class="cuerpoTabla"><?php echo $fila['fecha_soli'] ?></td>
						<td class="cuerpoTabla"><?php echo $fila['tipo_solicitud'] ?></td>
						<td class="cuerpoTabla"><?php echo $fila['descripcion'] ?></td>
						<td class="cuerpoTabla"><?php echo $fila['nombre'] ?></td>
                        <td class="cuerpoTabla"><?php echo $fila['valor_total'] ?></td>
						<td class="cuerpoTabla"><?php echo $fila['comentarios'] ?></td>
						<td class="cuerpoTabla"><?php echo $fila['estado'] ?></td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			</div>
<?php
include 'footer.php';
?>