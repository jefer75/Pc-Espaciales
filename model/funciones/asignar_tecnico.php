<?php
require_once("../../conexion/conexion.php");
$db = new Database();
$con = $db -> conectar();

    $soli_select=$_POST['soli_select'];
    $tecnico= $_POST['tecnico'];

     if (empty($tecnico)) {
        echo '<script>alert("Por favor seleccione el tecnico");</script>';
        echo '<script>window.location="../vendedor/reparaciones.php"</script>';
    } else {
        
            // Inserción de datos en la base de datos
            $insertSQL = $con->prepare("UPDATE solicitudes SET tecnico=$tecnico, id_estado=5 WHERE id_solicitud=$soli_select");
            $insertSQL->execute();

            echo '<script>alert("Actualizacion exitosa");</script>';
            echo '<script>window.location="../vendedor/reparaciones.php"</script>';
        }
    