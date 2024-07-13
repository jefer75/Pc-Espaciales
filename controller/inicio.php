<?php
require_once("../conexion/conexion.php");
$db = new Database();
$con = $db -> conectar();
session_start();

if (isset($_POST["inicio"])) {

    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    if ($correo == "" || $contrasena == ""){
        echo '<script>alert("Complete todos los campos");</script>';
        echo '<script>window.location="../model/inicio/login.php"</script>';
    }
    else{

    $contrasena = htmlentities(addslashes($contrasena));

    $sql = $con->prepare("SELECT * FROM usuarios where correo = '$correo'");
    $sql->execute();
    $fila = $sql->fetch();

    if(gettype($fila) == "array" && password_verify($contrasena, $fila['contrasena'])){

        $_SESSION['correo'] = $fila['correo'];
        $_SESSION['estado'] = $fila['id_estado'];
        $_SESSION['id_tipo_usuario'] = $fila ['id_tipo_usuario'];

        if ($_SESSION['estado'] == 1){

            if ($_SESSION['id_tipo_usuario'] == 1)  {
                header ("Location: ../model/vendedor/index.php");
                exit();
            }    
            else if ($_SESSION['id_tipo_usuario'] == 2) {
                header ("Location: ../model/cliente/index.php");
                exit();
            }
            else if ($_SESSION['id_tipo_usuario'] == 3) {
                header ("Location: ../model/tecnico/index.php");
                exit();
            }
            
        }
        else{
            echo '<script>alert("Usuario inactivo, comuniquese con el vendedor para activarse");</script>';
            echo '<script>window.location="../model/inicio/login.php"</script>';
        }
        }
        else {
            echo '<script>alert("Usuario o contraseña incorrectos");</script>';
            echo '<script>window.location="../model/inicio/login.php"</script>';
        }
    }
}