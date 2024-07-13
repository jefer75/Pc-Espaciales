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
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Ventas</h1>
			</div>
			<p class="lead">En esta pantalla puedes visualizar las ventas realizadas.</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
                        <li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Codigo</th>
											<th class="text-center">Fecha de Venta</th>
											<th class="text-center">Cliente</th>
                                            <th class="text-center">Valor total</th>                                            
											<th class="text-center">Detalles</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                    $con_ventas = $con->prepare("SELECT ventas.*, usuarios.nombre FROM ventas
                                                                    INNER JOIN usuarios ON usuarios.documento = ventas.cliente
                                                                    Where usuarios.id_tipo_usuario=2");
                                    $con_ventas->execute();
                                    $ventas = $con_ventas->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($ventas as $fila) {
                                        
                                    ?>
                                    <tr>
										<td><?php echo $fila['id_venta'] ?></td>
										<td><?php echo $fila['fecha'] ?></td>
										<td><?php echo $fila['nombre'] ?></td>
										<td><?php echo number_format($fila['valor_total']) ?></td>                                            
										<td><a href="#" class="boton" onclick="window.open
										('../detalles/detalle_ventas.php?id=<?php echo $fila['id_venta'] ?>','','width= 600,height=400, toolbar=NO');void(null);">Detalles</a>
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
		
	</section>

    <script>
		document.addEventListener('DOMContentLoaded', (event) => {
        const modal = document.getElementById('detalles_cont');
        const closeModal = document.getElementById('detalles_close');

        document.querySelectorAll('.detalles').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevenir el comportamiento por defecto del submit
                const id_venta = this.getAttribute('data-id');
                console.log(id_venta);
                modal.showModal();
            });
        });

        closeModal.addEventListener('click', function() {
            modal.close();
        });
    });
	</script>
<?php
include 'footer.php';
?>