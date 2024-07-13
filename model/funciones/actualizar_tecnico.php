<?php
require_once("../../conexion/conexion.php");
$db = new Database();
$con = $db -> conectar();

    $soli_select=$_POST['soli_select'];
    $comentario= $_POST['comentario'];
    $estado= $_POST['estado'];
    $precio = $_POST['precio'];

     if (empty($comentario)) {
        echo '<script>alert("Por favor seleccione el tecnico");</script>';
        echo '<script>window.location="../vendedor/reparaciones.php"</script>';
    } else {
        
            // Inserción de datos en la base de datos
            $insertSQL = $con->prepare("UPDATE solicitudes SET comentarios='$comentario', valor_total=$precio, id_estado=$estado WHERE id_solicitud=$soli_select");
            $insertSQL->execute();

            echo '<script>alert("Actualizacion exitosa");</script>';
            echo '<script>window.location="../tecnico/index.php"</script>';
        }
    