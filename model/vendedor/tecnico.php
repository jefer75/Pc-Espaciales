<!DOCTYPE html>
<html lang="es">
<head>
	<title>Técnicos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../plantilla/css/main.css">
    <link rel="stylesheet" href="../plantilla/css/general.css">
</head>
<body>
<?php
    include 'header.php';
?>		
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Tecnicos</h1>
			</div>
			<p class="lead">En esta pantalla puedes visualizar y registrar los técnicos con los que trabajas.</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
						<li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
						<li><a href="#new" data-toggle="tab">Nueva</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
							<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Cedula</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Apellido</th>
                                            <th class="text-center">Telefono</th>                                            
											<th class="text-center">correo</th>
											<th class="text-center">Estado</th>
											<th class="text-center">Actualizar</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    $con_productos = $con->prepare("SELECT usuarios.*, estados.estado FROM usuarios
                                                                    INNER JOIN estados ON estados.id_estado = usuarios.id_estado
                                                                    Where usuarios.id_tipo_usuario=3");
                                    $con_productos->execute();
                                    $productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($productos as $fila) {
                                        
                                    ?>
                                    <tr>
											<td><?php echo $fila['documento'] ?></td>
											<td><?php echo $fila['nombre'] ?></td>
											<td><?php echo $fila['apellido'] ?></td>
                                            <td><?php echo $fila['telefono'] ?></td>                                            
                                            <td><?php echo $fila['correo'] ?></td>
											<td><?php echo $fila['estado'] ?></td>
											<td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
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
						<div class="tab-pane fade " id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
                                    <form method="POST" enctype="multipart/form-data" action="../funciones/registro_user.php">
											<div class="form-group label-floating">
											  <label class="control-label">Cedula</label>
											  <input class="form-control" type="number" name="documento">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" type="text" name="nombre">
											</div>
									    	<div class="form-group label-floating">
											  <label class="control-label">Apellido</label>
											  <input class="form-control" type="text" name="apellido">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Telefono</label>
											  <input class="form-control" type="number" name="telefono">
											</div>
                                            <div class="form-group label-floating">
											  <label class="control-label">Correo</label>
											  <input class="form-control" type="text" name="correo">
											</div>
										    <div class="text-center">
												<input type="hidden" name="tipo_usuario" value="3">
												<input type="hidden" name="pagina" value="3">
                                                <input type="submit" class="btn btn-info btn-raised btn-sm" name="registrar" value="Registrar">
                                                </div>
									    </form>
									</div>
								</div>
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