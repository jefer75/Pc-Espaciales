<?php
session_start();
require_once "../../conexion/conexion.php";
//include("../../../controller/validar_licencia.php");
$db = new DataBase();
$con = $db->conectar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th class="text-center">Codigo</th>
                    <th class="text-center">Fecha de solicitud</th>
                    <th class="text-center">Tipo de solicitud</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con_productos = $con->prepare("SELECT solicitudes.*, estados.estado, tipo_solicitud.tipo_solicitud, usuarios.nombre FROM solicitudes
                                                INNER JOIN estados ON estados.id_estado = solicitudes.id_estado
                                                INNER JOIN tipo_solicitud ON tipo_solicitud.id_tipo_soli = solicitudes.id_tipo_soli
                                                INNER JOIN usuarios ON usuarios.documento = solicitudes.cliente
                                                WHERE solicitudes.id_estado=4 ORDER BY solicitudes.fecha_soli");
                $con_productos->execute();
                $productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
                foreach ($productos as $fila) {
                ?>
                <tr>
                    <td><?php echo $fila['id_solicitud'] ?></td>
                    <td><?php echo $fila['fecha_soli'] ?></td>
                    <td><?php echo $fila['tipo_solicitud'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['estado'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary abrirModal" data-id="<?php echo $fila['id_solicitud']; ?>">Asignar</button>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="POST" id="modalForm" action="../funciones/asignar_tecnico.php">
                <select class="form-control" name="tecnico" id="tecnicoSelect_<?php echo $fila['id_solicitud'] ?>" required>
                    <option value="">Seleccione</option>
                    <?php
                        $queryTecnicos = $con->prepare("SELECT * FROM usuarios WHERE id_tipo_usuario=3");
                        $queryTecnicos->execute();
                        while ($filaTecnico = $queryTecnicos->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $filaTecnico['documento'] . "'>" . $filaTecnico['nombre'] . "</option>";
                    }
                    ?>
                </select>
                <input type="text" name="soli_select" id="soli_select" value="">
                <p>¿Está seguro de que desea asignar esta solicitud?</p>
                <button type="submit" class="btn btn-success">Asignar</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript for handling modal
        document.addEventListener('DOMContentLoaded', (event) => {
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            var soliSelectInput = document.getElementById("soli_select");

            document.querySelectorAll('.abrirModal').forEach(button => {
                button.addEventListener('click', function() {
                    var soliId = this.getAttribute('data-id');
                    soliSelectInput.value = soliId;
                    modal.style.display = "block";
                });
            });

            span.addEventListener('click', function() {
                modal.style.display = "none";
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
