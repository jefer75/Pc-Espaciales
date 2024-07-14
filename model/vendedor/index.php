<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
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
			  <h1 class="text-titles">Administrador</h1>
			</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Tecnicos
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-account"></i>
				</div>
				<?php
				$con_nombre = $con->prepare("SELECT COUNT(*) as total FROM usuarios WHERE id_tipo_usuario = 3");
				$con_nombre->execute();
				$totales = $con_nombre->fetch();
				?>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?php echo $totales['total'] ?></p>
					<small>Contratados</small>
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Clientes
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-alt"></i>
				</div>
				<?php
				$con_nombre = $con->prepare("SELECT COUNT(*) as total FROM usuarios WHERE id_tipo_usuario = 2");
				$con_nombre->execute();
				$totales = $con_nombre->fetch();
				?>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?php echo $totales['total'] ?></p>
					<small>Resgistrados</small>
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Ventas
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-money-box zmdi-hc-fw"></i>
				</div>
				<?php
				$con_nombre = $con->prepare("SELECT COUNT(*) as total FROM ventas");
				$con_nombre->execute();
				$totales = $con_nombre->fetch();
				?>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?php echo $totales['total'] ?></p>
					<small>Realizadas</small>
				</div>
			</article>
			<article class="full-box tile">
				<div class="full-box tile-title text-center text-titles text-uppercase">
					Reparaciones
				</div>
				<div class="full-box tile-icon text-center">
					<i class="zmdi zmdi-male-female"></i>
				</div>
				<?php
				$con_nombre = $con->prepare("SELECT COUNT(*) as total FROM solicitudes WHERE id_estado = 6");
				$con_nombre->execute();
				$totales = $con_nombre->fetch();
				?>
				<div class="full-box tile-number text-titles">
					<p class="full-box"><?php echo $totales['total'] ?></p>
					<small>Realizadas</small>
				</div>
			</article>
		</div>
</section>
<?php
include 'footer.php';
?>