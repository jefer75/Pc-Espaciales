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
<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Inventario <small>Laptops</small></h1>
			</div>
			<p class="lead">En esta pantalla puedes visualizar las diferentes referencias de Laptops que tíenes en tu inventario.</p>
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
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
                                    <form method="POST" enctype="multipart/form-data" action="../funciones/registro_producto.php">
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" type="text" name="nombre_p">
											</div>
									    	<div class="form-group label-floating">
											  <label class="control-label">Cantidad</label>
											  <input class="form-control" type="number" name="cantidad">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Precio</label>
											  <input class="form-control" type="text" name="precio">
											</div>
                                            <div class="form-group label-floating">
											  <select name="tipo_producto" class="form-control">
                                                <option class="form-label">Seleccione el tipo de producto</option>
                                                <?php
                                                    $control = $con->prepare("SELECT * FROM tipo_producto");
                                                    $control->execute();
                                                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value='" . $fila['id_tipo_pro'] . "'>" 
                                                        . $fila['tipo_producto'] . "</option>";
                                                    }
                                                ?>
                                              </select>
											</div>
                                            <div class="form-group label-floating">
											  <label for="img" class="imagen">Seleccione una Imagen</label>
                                              <input type="file" id="img" style="display: none;" name="imagen" required>
											</div>
												<input type="hidden" name="id_page" value="1">
										    <div class="text-center">
                                                <input type="submit" class="btn btn-info btn-raised btn-sm" name="registrar" value="Registrar">
                                                </div>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  	<div class="tab-pane fade" id="list">
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
                                                                    Where productos.id_tipo_pro=1");
                                    $con_productos->execute();
                                    $productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($productos as $fila) {
                                        
                                    ?>
                                    <tr>
											<td><?php echo $fila['id_producto'] ?></td>
											<td><?php echo $fila['nombre_p'] ?></td>
											<td><?php echo $fila['cantidad'] ?></td>
                                            <td><?php echo $fila['valor'] ?></td>
                                            <td><img src="../../<?php echo $fila['imagen'] ?>" alt=""></td>
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
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
include 'footer.php';
?>