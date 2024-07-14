<!DOCTYPE html>
<html lang="es">
<head>
	<title>Laptops</title>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Inventario <small>Teclados</small></h1>
			</div>
			<p class="lead">En esta pantalla puedes visualizar las diferentes referencias de teclados que tíenes en tu inventario.</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Nueva</a></li>
					  	<li><a href="#list" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">							
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Codigo</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Cantidad</th>
											<th class="text-center">Precio</th>
											<th class="text-center">Imagen</th>
											<th class="text-center">Estado</th>
											<th class="text-center">Actualizar</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    $con_productos = $con->prepare("SELECT productos.*, estados.estado FROM productos
                                                                    INNER JOIN estados ON estados.id_estado = productos.id_estado
                                                                    Where productos.id_tipo_pro=4 ANd productos.id_estado=1");
                                    $con_productos->execute();
                                    $productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($productos as $fila) {
                                        
                                    ?>
                                    <tr>
											<td><?php echo $fila['id_producto'] ?></td>
											<td><?php echo $fila['nombre_p'] ?></td>
											<td><?php echo $fila['cantidad'] ?></td>
                                            <td><?php echo number_format($fila['valor']) ?></td>
                                            <td><img src="../../<?php echo $fila['imagen'] ?>" alt=""></td>
											<td><?php echo $fila['estado'] ?></td>
											<td><a href="#" class="boton" onclick="window.open
											('../funciones/actualizar_producto.php?id=<?php echo $fila['id_producto'] ?>','','width= 700,height=500, toolbar=NO');void(null);">Actualizar</a>
											</td>
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