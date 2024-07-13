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
    $sql = $con -> prepare("SELECT productos.*, estados.estado FROM productos
    INNER JOIN estados ON estados.id_estado = productos.id_estado
    WHERE productos.id_producto='".$_GET['id']."'");
   $sql -> execute();
   $fila = $sql -> fetch ();

   $id_producto=$fila['id_producto'];
   $direccion_ant=$fila['imagen'];
   $direccion_antigua="../../".$direccion_ant;
   $id_estado=$fila['id_estado'];
   //declaracion de variables de campos en la tabla

   if (isset($_POST['actualizar'])){

    $nombre_p = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $estado = $_POST['estado'];
    
    if($nombre_p!="" && $cantidad!="" && $precio!="" && $estado!=""){

    $imagen=$_FILES['imagen']['tmp_name'];
    $nombre=$_FILES['imagen']['name'];
    $formato=strtolower(pathinfo($nombre,PATHINFO_EXTENSION));
    $peso=$_FILES['imagen']['size'];
    $carpeta="img/registradas/productos/";

    
    if ($imagen!="") {
      
      if ($formato=="jpg" || $formato=="jpeg" || $formato=="png") {
      
        try {
          unlink($direccion_antigua);
        } catch (\Throwable $th) {
          //throw $th;
        }

        $direccion=$carpeta.$id_producto.".".$formato;
        $ruta="../../".$carpeta.$id_producto.".".$formato;

        $insert= $con -> prepare ("UPDATE productos SET nombre_p='$nombre_p', cantidad='$cantidad', valor=$precio, id_estado='$estado', imagen='$direccion' WHERE id_producto = $id_producto");
        $insert -> execute();
        
        if (move_uploaded_file($imagen,$ruta)) {
            echo '<script> alert ("Registro actualizado exitosamente");</script>';
            echo '<script>window.close()</script>';
        } else {
          echo '<script>alert ("Error al guardar la imagen en el almacenamiento");</script>';
        }

       } else {
           echo '<script>alert ("El formato del archivo no corresponde");</script>';
       }

    } else {
      $insert= $con -> prepare ("UPDATE productos SET nombre_p='$nombre_p', cantidad=$cantidad, valor=$precio, id_estado=$estado WHERE id_producto='".$_GET['id']."'");
        $insert -> execute();
        echo '<script> alert ("Registro actualizado exitosamente");</script>';
        echo '<script> window.close(); </script>';
    }
    }else{
        echo '<script> alert ("Existen campos vacios");</script>';
        echo '<script> window.close(); </script>';
    }
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
            <h5 class="card-title">Actualizar Actividad</h5>
            <form autocomplete="off" class="row g-3" enctype="multipart/form-data" name="form_actualizar" method="POST">
    
            <div class="form-group label-floating">
                <label for="nombreInput" class="form-label">Nombre de producto</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre_p']; ?>" placeholder="Nombre de actividad">
                <div id="error_nombre" class="invalid-feedback" style="display: none;">
                    El nombre debe contener entre 1 y 20 letras.
                </div>
            </div>

            <div class="form-group label-floating">
                <label for="descripcionInput" class="form-label">Cantidad</label>
                <input class="form-control" type="text" name="cantidad" id="descripcionInput" value="<?php echo $fila['cantidad'] ?>" placeholder="Descripción del paquete">
                <div id="error_descripcion" class="invalid-feedback" style="display: none;">
                    La descripción debe tener entre 10 y 80 caracteres y no puede contener más de un espacio consecutivo.
                </div>
            </div>

            <div class="form-group label-floating">
                <label for="descripcionInput" class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" id="descripcionInput" value="<?php echo$fila['valor']?>" placeholder="Descripción del paquete">
                <div id="error_descripcion" class="invalid-feedback" style="display: none;">
                    La descripción debe tener entre 10 y 80 caracteres y no puede contener más de un espacio consecutivo.
                </div>
            </div>

            <div class="form-group label-floating">
                <label for="imagenInput" class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
            </div>

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
