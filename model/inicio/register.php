<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../plantilla/css/main.css">
</head>
<body class="cover" style="background-image: url(../../img/fondos/login.jpeg);">
    
	<form method="POST" action="../funciones/registro_user.php" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Registrate</p>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">Cedula</label>
		  <input class="form-control" id="UserId" type="number" name="documento">
		  <p class="help-block">Escribe tu número de documento</p>
		</div>
        <div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">Nombres</label>
		  <input class="form-control" id="UserName" type="text" name="nombre">
		  <p class="help-block">Escribe tu nombre</p>
		</div>
        <div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">Apellido</label>
		  <input class="form-control" id="UserLastName" type="text" name="apellido">
		  <p class="help-block">Escribe tu apellido</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">Teléfono</label>
		  <input class="form-control" id="UserEmail" type="number" name="telefono">
		  <p class="help-block">Escribe tu telefono</p>
		</div>
        <div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">E-mail</label>
		  <input class="form-control" id="UserEmail" type="email" name="correo">
		  <p class="help-block">Escribe tú E-mail</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input class="form-control" id="UserPass" type="password" name="contrasena">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="hidden" name="tipo_usuario" value="2">
			<input type="hidden" name="pagina" value="1">
			<input type="submit" name="registrar" value="Registrar" class="btn btn-raised btn-danger">
        </div>
        <a style="color: white; text-decoration: none;" href="login.php">Iniciar Sesion</a>
	</form>
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>