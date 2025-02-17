<!DOCTYPE html>
<html lang="es">
<head>
	<title>Reparaciones</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../plantilla/css/main.css">
    <link rel="stylesheet" href="../plantilla/css/general.css">
    <style>
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}
.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
    </style>
</head>
<body>
<?php
    include 'header.php';
?>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Reparaciones</h1>
			</div>
			<p class="lead">En esta pantalla puedes visualizar las reparaciones realizadas y en proceso.</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Finalizada</a></li>
					  	<li><a href="#list" data-toggle="tab">En proceso</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
							<table class="table table-hover text-center">
                                <thead>
                                    <tr>                                        
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Fecha de solicitud</th>
                                        <th class="text-center">Tipo de solicitud</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Tecnico</th>
                                        <th class="text-center">Valor Total</th>
                                        <th class="text-center">Obeservacion</th> 
                                        <th class="text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $con_productos = $con->prepare("SELECT solicitudes.*, estados.estado, tipo_solicitud.tipo_solicitud, usuarios.nombre, usuarios.apellido
                                                                FROM solicitudes
                                                                INNER JOIN usuarios ON usuarios.documento = solicitudes.tecnico
                                                                INNER JOIN tipo_solicitud ON tipo_solicitud.id_tipo_soli = solicitudes.id_tipo_soli
                                                                INNER JOIN estados ON estados.id_estado = solicitudes.id_estado
                                                                Where solicitudes.id_estado=6 AND solicitudes.cliente=$cedula order by solicitudes.id_solicitud");
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
                                        <td><?php echo number_format($fila['valor_total']) ?></td>
                                        <td><?php echo $fila['comentarios'] ?></td>
                                        <td><?php echo $fila['estado'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
							</div>
						</div>
					  	<div class="tab-pane fade" id="list">
							<div class="table-responsive">
							<table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Fecha de solicitud</th>
                                        <th class="text-center">Tipo de solicitud</th>
                                        <th class="text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $con_productos = $con->prepare("SELECT solicitudes.*, estados.estado, tipo_solicitud.tipo_solicitud, usuarios.nombre FROM solicitudes
                                                                INNER JOIN estados ON estados.id_estado = solicitudes.id_estado
                                                                INNER JOIN tipo_solicitud ON tipo_solicitud.id_tipo_soli = solicitudes.id_tipo_soli
                                                                INNER JOIN usuarios ON usuarios.documento = solicitudes.tecnico
                                                                Where solicitudes.id_estado!=6 AND solicitudes.cliente = $cedula ORDER BY solicitudes.id_estado");
                                $con_productos->execute();
                                $productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($productos as $fila) {
                                    
                                ?>
                                <tr>
                                    <td><?php echo $fila['id_solicitud'] ?></td>
                                    <td><?php echo $fila['fecha_soli'] ?></td>
                                    <td><?php echo $fila['tipo_solicitud'] ?></td>

                                    <td><?php echo $fila['estado'] ?></td>

                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
								<ul class="pagination pagination-sm">
								  	<li class="disabled"><a href="#!">«</a></li>
								  	<li class="active"><a href="#!">1</a></li>
								  	<li><a href="#!">2</a></li>
								  	<li><a href="#!">3</a></li>
								  	<li><a href="#!">4</a></li>
								  	<li><a href="#!">5</a></li>
								  	<li><a href="#!">»</a></li>
								</ul>
							</div>
					  	</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include 'footer.php';
?>