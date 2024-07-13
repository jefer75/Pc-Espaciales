<?php
require_once("../../conexion/conexion.php");
$db = new Database();
$con = $db -> conectar();

if (isset($_POST['registrar']))
   {

    $fecha_actual=date('Y-m-d');
    $tipo_solicitud= $_POST['tipo_solicitud'];
    $cliente= $_POST['cliente'];
    $descripcion= $_POST['descripcion'];
    $estado= 4;

     if (empty($tipo_solicitud) || empty($cliente) || empty($descripcion)) {
        echo '<script>alert("Por favor llene todos los campos");</script>';
        echo '<script>window.location="../vendedor/tecnico.php"</script>';
    } else {
        
            // Inserción de datos en la base de datos
            $insertSQL = $con->prepare("INSERT INTO solicitudes (fecha_soli, cliente, id_tipo_soli, descripcion, valor_total, tecnico, id_estado) 
                                       VALUES ('$fecha_actual', $cliente, $tipo_solicitud, '$descripcion', '', '', $estado)");
            $insertSQL->execute();

            echo '<script>alert("REGISTRO EXITOSO");</script>';
            echo '<script>window.location="../vendedor/reparaciones.php"</script>';
        }
    }
