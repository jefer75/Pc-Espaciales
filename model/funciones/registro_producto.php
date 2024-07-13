<?php
require_once "../../conexion/conexion.php";
$db = new DataBase();
$con = $db->conectar();

function manejarPage($page) {
    switch ($page) {
        case 1:
            echo '<script>window.location="../vendedor/laptop.php"</script>';
            break;
        case 2:
            echo '<script>window.location="../vendedor/pantalla.php"</script>';
            break;
        case 3:
            echo '<script>window.location="../vendedor/cpu.php"</script>';
            break;
        case 4:
            echo '<script>window.location="../vendedor/teclado.php"</script>';
            break;
        case 5:
            echo '<script>window.location="../vendedor/mouse.php"</script>';
            break;
        case 6:
            echo '<script>window.location="../vendedor/padmouse.php"</script>';
            break;
    }
}

if (!empty($_POST['registrar'])){

    $nombre_p = $_POST['nombre_p'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo_producto'];
    $page = $_POST['id_page'];

    $imagen=$_FILES['imagen']['tmp_name'];
    $nombre=$_FILES['imagen']['name'];
    $formato=strtolower(pathinfo($nombre,PATHINFO_EXTENSION));
    $peso=$_FILES['imagen']['size'];
    
    if ($nombre_p=="" || $cantidad=="" || $precio=="" || $tipo=="" || $imagen=="") {
        
        echo '<script>alert ("Por favor llene todos los campos");</script>';
        manejarPage($page);
        
    } else {
        
        $carpeta="img/registradas/productos/";

        if ($formato=="jpg" || $formato=="jpeg" || $formato=="png") {
        
            $insertSQL = $con->prepare("INSERT INTO productos(nombre_p, cantidad, valor, imagen, id_estado, id_tipo_pro) VALUES('$nombre_p', $cantidad, $precio, '', 1, $tipo)");
            $insertSQL -> execute();
    
            $sql= $con -> prepare ("SELECT * FROM productos WHERE imagen=''");
            $sql -> execute();
            $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);
            foreach($fila as $fila){
                $id_registrado=$fila['id_producto'];
            }
    
            $direccion=$carpeta.$id_registrado.".".$formato;
    
            $insertSQL = $con->prepare("UPDATE productos SET imagen='$direccion' WHERE id_producto = $id_registrado");
            $insertSQL -> execute();
    
            $ruta="../../".$carpeta.$id_registrado.".".$formato;

            if (move_uploaded_file($imagen,$ruta)) {
                echo '<script>alert ("La imagen ha sido guardada exitosamente");</script>';
                manejarPage($page);
            } else {
                echo '<script>alert ("Error al guardar la imagen en el almacenamiento");</script>';
                manejarPage($page);
            }
        } else {
            echo '<script>alert ("El formato del archivo no corresponde");</script>';
            manejarPage($page);
        }

    }

 }
