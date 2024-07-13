<!DOCTYPE html>
<html lang="es">
<head>
	<title>Perfil</title>
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
    <div class="perfil_info">
        <div class="datos">
            <div class="container-fluid">
                <div class="page-header">
                    <h1 class="text-titles">Actualizar Datos</h1>
                </div>
            </div>

            <h5>En esta sección podra modificar sus datos de contacto, ademas de inicio de sesión.</h5>

            <br>
            <h4>N° Documento</h4>
            <h5><?php echo $fila['documento'];?></h5>
            <br>
            <h4>Nombres</h4>
            <h5><?php echo $fila['nombre'];?></h5>
            <br>
            <h4>Apellidos</h4>
            <h5><?php echo $fila['apellido'];?></h5>
        </div>
    </div>
    <div class="actualizar">
        <form action="../funciones/update_user.php" method="$_POST">
            <label class="label_actualizar" for="correo">Correo electrónico</label>
            <input type="email" class="information" id="correo" name="correo" value="<?php echo $fila['correo'];?>">
            
            <label class="label_actualizar" for="telefono">Telefono</label>
            <input type="number" class="information" id="contraseña" name="telefono" value="<?php echo $fila['telefono'];?>">
            
            <h4>Cambiar contraseña</h4>
            
            <label class="label_actualizar" for="contraseña">Contraseña</label>
            <input type="password" class="information" id="contraseña" name="contrasena" placeholder="Digite la nueva contraseña">
            
            <label class="label_actualizar" for="contraseña">Confirme la contraseña</label>
            <input type="password" class="information" id="contraseña" name="contrasena" placeholder="Digite la nueva contraseña">

            <input type="hidden" name="page" value="3">
            <br>
            <input type="submit" name="actualizar" class="enviar" value="Actualizar">
        </form>
    </div>
	
<?php
include 'footer.php';
?>