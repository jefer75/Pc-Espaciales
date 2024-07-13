<?php
require_once("../../conexion/conexion.php");
$db = new Database();
$con = $db -> conectar();

function manejarPage($page) {
    switch ($page) {
        case 1:
            echo '<script>window.location="login.php"</script>';
            break;
        case 2:
            echo '<script>window.location="../vendedor/clientes.php"</script>';
            break;
        case 3:
            echo '<script>window.location="../vendedor/tecnico.php"</script>';
            break;
    }
}
function Enviar_contraseña($correo, $nombre, $contrasena, $page) {
    $destino = "$correo";
            $titulo = "Usuario registrado en PC Espaciales";
            $msj = "Hola $nombre,

            Su correo de ingreso es $correo.
            La contraseña de su usario es: $contrasena.
    
            Recuerde que para iniciar sesion debe ser con correo y contraseña, ademas se recomienda cambiar la contraseña en el primer inicio de sesion";
            $tucorreo = "From:david.carrasco@cun.edu.co";

            if (mail($destino, $titulo, $msj, $tucorreo)) {
                echo '<script> alert ("Notificacion enviada al correo digitado");</script>';
                manejarPage($page);
}
}


if (isset($_POST['registrar']))
   {

    $cedula= $_POST['documento'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $telefono= $_POST['telefono'];
    $correo= $_POST['correo'];
    $estado= 1;
    $tipo_user=$_POST['tipo_usuario'];
    $page = $_POST['pagina'];

    if ($page == 1){
        $contrasena= $_POST['contrasena'];
    }else if ($page == 2){
        $digitos = "sakur02ue859y2u389rhdewirh102385y1285013289";
        $longitud = 10;
        $contrasena = substr(str_shuffle($digitos), 0, $longitud);
    }else if($page== 3) {
        $digitos = "sakur02ue859y2u389rhdewirh102385y1285013289";
        $longitud = 10;
        $contrasena = substr(str_shuffle($digitos), 0, $longitud);
    }

     $sql= $con -> prepare ("SELECT * FROM usuarios WHERE documento='$cedula' or correo = '$correo'");
     $sql -> execute();
     $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);

     if ($fila){
        echo '<script>alert ("El documento o el correo que digitaste ya se encuentra registrado");</script>';
        manejarPage($page);
    }

     else if (empty($cedula) || empty($nombre) || empty($apellido) || empty($telefono) || empty($contrasena) || empty($correo)) {
        echo '<script>alert("Por favor llene todos los campos");</script>';
        manejarPage($page);
    } else {
        
        $sql = $con->prepare("SELECT * FROM usuarios WHERE documento = $cedula OR correo = '$correo'");
        $fila = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($fila) {
            echo '<script>alert("DOCUMENTO O CORREO YA EXISTE");</script>';
            manejarPage($page);
        } else {
            // Hash de la contraseña
            $pass_cifrado = password_hash($contrasena, PASSWORD_DEFAULT, array("cost" => 12));

            // Inserción de datos en la base de datos
            $insertSQL = $con->prepare("INSERT INTO usuarios (documento, nombre, apellido, telefono, correo, contrasena, id_estado, id_tipo_usuario) VALUES ($cedula, '$nombre', '$apellido', $telefono, '$correo', '$pass_cifrado', $estado, $tipo_user)");
            $insertSQL->execute();

            Enviar_contraseña($correo, $nombre, $contrasena, $page);
            manejarPage($page);
        }
    }
}