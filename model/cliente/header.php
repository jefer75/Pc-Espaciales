<?php
session_start();
require_once "../../conexion/conexion.php";
//include("../../../controller/validar_licencia.php");
$db = new DataBase();
$con = $db->conectar();

$correo = $_SESSION['correo'];
if (!isset($correo)){
	echo '<script>alert("No has iniciado sesion");</script>';
	header("Location: ../inicio/login.php");
}

$con_nombre = $con->prepare("SELECT * FROM usuarios WHERE correo = '$correo'");
$con_nombre->execute();
$nombres = $con_nombre->fetchAll(PDO::FETCH_ASSOC);
foreach ($nombres as $fila) {
    $nombre = $fila['nombre'];
}

if(isset($_POST['sesion']))
{
    session_destroy();

    header('location:../../index.php');
}
?>
<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				PC Especiales <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="../plantilla/assets/img/avatar.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles"><?php echo $nombre?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="#!" class="btn-exit-system">
						<form method="POST">
							<button class="cerrar_sesion" name="sesion">
								<i class="zmdi zmdi-power"></i>
							</button>
						</form>	
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="index.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Inventario <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="laptop.php"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Laptop</a>
						</li>
						<li>
							<a href="pantalla.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Pantallas</a>
						</li>
						<li>
							<a href="cpu.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> CPU</a>
						</li>
						<li>
							<a href="teclado.php"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Teclado</a>
						</li>
						<li>
							<a href="mouse.php"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Mouse</a>
						</li>
						<li>
							<a href="padmouse.php"><i class="zmdi zmdi-font zmdi-hc-fw"></i> PadMouse</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-fw"></i> Gestion <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="ventas.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Ventas</a>
						</li>
						<li>
							<a href="reg_venta.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Registrar venta</a>
						</li>
						<li>
							<a href="reparaciones.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Reparaciones</a>
						</li>
						<li>
							<a href="reg_reparar.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Registrar Reparacion</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="tecnico.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Tecnicos</a>
						</li>
						<li>
							<a href="clientes.php"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Clientes</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>
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