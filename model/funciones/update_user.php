<?php
if (isset($_POST['actualizar'])){
function manejarPage($page) {
    switch ($page) {
        case 1:
            echo '<script>window.location="../vendedor/perfil.php"</script>';
            break;
        case 2:
            echo '<script>window.location="../cliente/perfil.php"</script>';
            break;
        case 3:
            echo '<script>window.location="../tecnico/perfil.php"</script>';
            break;
    }
}

$correo=$_POST['correo'];
$telefono= $_POST['telefono'];
$page = $_POST['page'];

$sql= $con -> prepare ("SELECT * FROM usuarios WHERE correo = '$correo'");
     $sql -> execute();
     $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);

     if ($fila){
        echo '<script>alert ("El correo que digitaste ya se encuentra registrado");</script>';
        manejarPage($page);
    }
    else {

        $insertSQL = $con->prepare("UPDATE usuarios SET correo='$correo', telefono=$telefono WHERE correo ='$correo'");
        $insertSQL->execute();
            


        if($_POST['contrasena']=="" AND $_POST['new_contrasena']==""){
        manejarPage($page);

        } else if ($_POST['contrasena'] != $_POST['new_contrasena']){
                echo '<script>alert("Las contraseñas no coinciden");</script>';
                manejarPage($page);
            } else {
                
                $contrasena=$_POST['contrasena'];
                $new_contrasena= $_POST['new_contrasena'];
                $pass_cifrado = password_hash($contrasena, PASSWORD_DEFAULT, array("cost" => 12));
                
                // Inserción de datos en la base de datos
                $insertSQL = $con->prepare("UPDATE usuarios SET correo='$correo', telefono=$telefono, contrasena='$pass_cifrado' WHERE correo ='$correo'");
                $insertSQL->execute();
                
            }
            echo '<script>alert("Actualizacion exitosa");</script>';
            manejarPage($page);
        }
    }
?>