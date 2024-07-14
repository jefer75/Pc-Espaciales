<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro Reparación</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../plantilla/css/main.css">
    <link rel="stylesheet" href="../plantilla/css/general.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<?php
    include 'header.php';
?>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Registrar Reparacion</h1>
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
                                    <form method="POST" enctype="multipart/form-data" action="../funciones/registro_solicitud.php">
                                        <div class="form-group label-floating">
											  <select name="tipo_solicitud" class="form-control">
                                                <option class="form-label">Seleccione el tipo de reparacion</option>
                                                <?php
                                                    $control = $con->prepare("SELECT * FROM tipo_solicitud");
                                                    $control->execute();
                                                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value='" . $fila['id_tipo_soli'] . "'>" 
                                                        . $fila['tipo_solicitud'] . "</option>";
                                                    }
                                                ?>
                                              </select>
											</div>
                                            <div class="form-group label-floating">
                                                <select class="form-control" name="cliente" id="clienteSelect" required>
                                                    <option value="">Seleccione el cliente</option>
                                                    <?php
                                                    $control = $con->prepare("SELECT * FROM usuarios WHERE id_tipo_usuario=2");
                                                    $control->execute();
                                                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value='" . $fila['documento'] . "'>" . $fila['nombre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
											</div>											
									    	<div class="form-group label-floating">
											  <label class="control-label">Descripcion</label>
											  <input class="form-control" type="text" name="descripcion">
											</div>
											<div class="text-center">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye JS de Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<!-- Inicializar Select2 -->
<script>
    $(document).ready(function() {
        $('#clienteSelect').select2({
            placeholder: 'Seleccione un cliente',
            allowClear: true
        });
    });
</script>
<?php
include 'footer.php';
?>