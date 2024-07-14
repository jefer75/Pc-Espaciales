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
    $sql = $con -> prepare("SELECT productos.*, estados.estado, tipo_producto.tipo_producto FROM productos
    INNER JOIN estados ON estados.id_estado = productos.id_estado
    INNER JOIN tipo_producto ON tipo_producto.id_tipo_pro = productos.id_tipo_pro
    WHERE productos.id_producto='".$_GET['id']."'");
   $sql -> execute();
   $fila = $sql -> fetch ();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
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
            <h5 class="card-title">Ver producto</h5>

            
            <form autocomplete="off" class="row g-3" enctype="multipart/form-data" name="form_actualizar" method="POST">
            <div class="form-group label-floating">
                <img class="img_ver_producto" src="../../<?php echo $fila['imagen']?>" alt="">
            </div>
    
            <div class="form-group label-floating">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" readonly><?php echo$fila['descripcion']?></textarea>
            </div>

            <div class="form-group label-floating">
                <label for="nombre" class="form-label">Nombre de producto</label>
                <input class="form-control" id="nombre" value="<?php echo $fila['nombre_p']; ?>" readonly>
            </div>

            <div class="form-group label-floating">
                <label for="tipo_producto" class="form-label">Tipo de producto</label>
                <input class="form-control" id="tipo_producto" value="<?php echo $fila['tipo_producto']; ?>" readonly>
            </div>

            <div class="form-group label-floating">
                <label for="cantidad" class="form-label">Cantidad disponible</label>
                <input class="form-control" id="cantidad" value="<?php echo $fila['cantidad'] ?>" readonly>
            </div>
            
            
            <div class="form-group label-floating">
                <label for="precio" class="form-label">Precio</label>
                <input class="form-control" id="precio" value="<?php echo number_format($fila['valor'])?>" readonly>
            </div>
            
            
</form>
        </div>
    </div>

    <script src="../../validaciones/validar_actividades.js"></script>
</body>
</html>
