<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro de Venta</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../plantilla/css/main.css">
    <link rel="stylesheet" href="../plantilla/css/general.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?php
    include 'header.php';
	include '../funciones/gestion_ventas.php';

	$suma_total= $con -> prepare ("SELECT SUM(detalle_venta.valor_neto) AS importe_total FROM detalle_venta WHERE detalle_venta.id_venta=''");
	$suma_total -> execute();
	$fila = $suma_total->fetch();
	$valor_total=$fila['importe_total'];

?>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header-tittles">
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Registrar Venta</h1>
			</div>
			<div class="container-fluid-tittles2">
				<h4 class="text-titles">¿Cliente no registrado?</h4>
				<a href="clientes.php">Registrar cliente</a>
			</div>
        </div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
                                    <form method="POST">
											
											<div class="form-group label-floating">	
												<input type="submit" class="form-control" id="añadir" name="añadir" value="Añadir producto" onclick="opendialog();">
											</div>

											<table id="table">
												<thead>
													<th class="encabezado">Producto</th>
													<th class="encabezado">Cantidad</th>
													<th class="encabezado">Valor Neto</th>
													<th class="encabezado">Acción</th>
												</thead>
												<tbody>
												<?php

													$con_paquetes = $con->prepare("SELECT detalle_venta.*,productos.nombre_p
													FROM detalle_venta
													INNER JOIN productos ON productos.id_producto=detalle_venta.id_producto
													Where detalle_venta.id_venta=0");
													$con_paquetes->execute();
													$paquetes = $con_paquetes->fetchAll(PDO::FETCH_ASSOC);
													foreach ($paquetes as $fila) {  
														$producto=$fila['id_producto'];
														?>
													<tr>
												
													<td><?php echo $fila['nombre_p']?></td>
													<td><?php echo $fila['cantidad']?></td>
													<td><?php echo $fila['valor_neto']?></td>
													<td>
														
														<form method="POST">
															<input type="hidden" name="cantidad_eliminada" value="<?php echo $fila['cantidad']?>">
															<input type="hidden" name="id_eliminado" value="<?php echo $fila['id_producto'] ?>">
															<input type="submit" class="btn" name="eliminar" value="Eliminar">
														</form>
														
													</td>
												</tr>
												<input type="hidden" name="cantidad_eliminada" value="<?php echo $fila['cantidad']?>">
												<input type="hidden" name="valor_total" value="<?php echo $valor_total ?>">
												<?php	
													}													
												?>
												<tr>
													<td></td>
													<td>Valor Total</td>
													<td><?php echo $valor_total ?></td>
													<td></td>
												</tr>
												</tbody>
											</table>
											<div class="text-center">
												<input type="hidden" name="cliente" value="<?php echo $cedula ?>">
												<input type="submit" class="cancelar" name="cancelar" value="Cancelar compra">
												<input type="submit" class="registrar" name="registrar" value="Registrar">
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
		<dialog class="añadir_cont" id="añadir_cont">
            <button id="añadir_close" class="modal_close" onclick="closedialog();">X</button>
			
			<h2>Añadir producto</h2>
			<form method="POST">
				
				<div class="form-group">
					<label for="producto" class="control-label">Producto</label>
					<select name="producto" id="producto" class="form-control">
						<option class="form-control">Seleccione el producto</option>
						<?php
                        $control = $con-> prepare ("SELECT * FROM productos Where cantidad > 0 AND id_estado=1");
                        $control -> execute();
                        while ($fila = $control->fetch(PDO::FETCH_ASSOC))  
                        {
							echo "<option value='" . $fila['id_producto'] . "'>"
							. $fila['nombre_p']." $" .number_format($fila['valor']) . "</option>";
                        }
						?>
                </select>
				</div>
				<div class="form-group">

					<label for="cantidad" class="control-label">Digite la cantidad</label>
					<input type="number" id="cantidad" class="form-control" name="cantidad" value="Cantidad" placeholder="Cantidad">
					<input type="hidden" name="venta" value="<?php echo $identificador?>">
				</div>

				<div class="text-center">
					<input type="submit" name="reg_producto" class="reg_producto" value="Registrar">
				</div>	
			</form>
		</dialog>	
	</section>

    <script>
		const openModal = document.getElementById('añadir');
		const modal = document.getElementById('añadir_cont');
		const closeModal = document.getElementById('añadir_close');

		openModal.addEventListener('click', function(e) {
			e.preventDefault();
			modal.showModal();
		});

		closeModal.addEventListener('click', function(){
			modal.close();
		});
	</script>

<!-- Incluye JS de Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<!-- Inicializar Select2 -->
<script>

</script>
<?php
include 'footer.php';
?>