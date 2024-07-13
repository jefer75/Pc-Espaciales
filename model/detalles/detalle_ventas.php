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
?>

<!DOCTYPE html>
<html lang="en">
    <script>
        function centrar() {
            iz=(screen.width-document.body.clientWidth) / 2;
            de=(screen.height-document.body.clientHeight) / 3;
            moveTo(iz,de);
        }
    </script>
<head>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Articulos Adquiridos</title>
<link rel="stylesheet" href="../plantilla/css/main.css">
<link rel="stylesheet" href="../plantilla/css/general.css">
</head>

<body onload="centrar();">

<main id="main" class="main">

<div class="container">

        <div class="card-body">

              <h3 class="card-title">Productos Adquiridos</h3>   
                  <table class="table table-hover text-center">
                    <thead>
                        <th class="encabezado">Codigo de Producto</th>
                        <th class="encabezado">Nombre de Producto</th>
                        <th class="encabezado">Cantidad</th>
                        <th class="encabezado">Valor Unitario</th>
                        <th class="encabezado">valor_neto</th>
                    </thead>
                    <tbody>
                        <?php
                        $con_productos = $con->prepare("SELECT detalle_venta.*, productos.nombre_p, productos.valor 
                                                        FROM detalle_venta
                                                        INNER JOIN productos ON productos.id_producto = detalle_venta.id_producto
                                                        Where detalle_venta.id_venta=$id_venta");
                        $con_productos->execute();
                        $productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($productos as $fila) {
                            
                        ?>
                        <tr>
                        <td><?php echo $fila['id_producto'] ?></td>
                        <td><?php echo $fila['nombre_p'] ?></td>
                        <td><?php echo $fila['cantidad'] ?></td>
                        <td><?php echo $fila['valor'] ?></td>
                        <td><?php echo $fila['valor_neto'] ?></td>
                        </tr>
                        <?php
                            }
                            $con_venta = $con->prepare("SELECT * FROM ventas Where id_venta=$id_venta");
                            $con_venta->execute();
                            $fila = $con_venta->fetch();
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Valor Total</td>
                            <td><?php echo $fila['valor_total']?></td>
                        </tr>
                    </tbody>
                </table>
        </div>
      </div>
    </div>
    </main>
</body>
</html>