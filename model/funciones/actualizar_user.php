<?php
session_start();
require_once "../../conexion/conexion.php";
//include("../../../controller/validar_licencia.php");
$db = new DataBase();
$con = $db->conectar();

$id_venta = $_GET['id'];

$correo = $_SESSION['correo'];
if (!isset($correo)){
	echo '<script>alert("No has iniciado sesion");</script>';
	echo '<script>window.location="../inicio/login.php"</script>';
}

   //empieza la consulta
    $sql = $con -> prepare("SELECT usuarios.*, estados.estado FROM usuarios
    INNER JOIN estados ON estados.id_estado = usuarios.id_estado
    WHERE usuarios.documento='".$_GET['id']."'");
   $sql -> execute();
   $fila = $sql -> fetch ();

   $id_estado=$fila['id_estado'];
   //declaracion de variables de campos en la tabla

   if (isset($_POST['actualizar'])){

    $estado = $_POST['estado'];
    
        $insert= $con -> prepare ("UPDATE usuarios SET id_estado=$estado WHERE documento='".$_GET['id']."'");
        $insert -> execute();
        echo '<script> alert ("Registro actualizado exitosamente");</script>';
        echo '<script> window.close(); </script>';
    
}
        ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Actividad</title>
    <link rel="stylesheet" href="../plantilla/css/main.css">
    <link rel="stylesheet" href="../plantilla/css/general.css">
    <script>
        function centrar() {
            var iz = (screen.width - document.body.clientWidth) / 2;
            var de = (screen.height - document.body.clientHeight) / 3;
            moveTo(iz, de);
        }
    </script>
</head>
<body onload="centrar();">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Actualizar Estado</h5>
            <form method="POST">

            <div class="form-group label-floating">
                <select name="estado" class="form-control">
                <option class="form-label" value="<?php echo$fila['id_estado']?>"><?php echo$fila['estado']?></option>
                <?php
                    $control = $con->prepare("SELECT * FROM estados WHERE id_estado!=$id_estado AND id_estado<=2");
                    $control->execute();
                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $fila['id_estado'] . "'>" 
                        . $fila['estado'] . "</option>";
                    }
                ?>
                </select>
            </div>

            <div class="text-center">
                <input type="submit" class="btn" style="background-color: #2c8ac9; color: white;" name="actualizar" value="Actualizar">
            </div>
</form>
        </div>
    </div>

    <script src="../../validaciones/validar_actividades.js"></script>
</body>
</html>
