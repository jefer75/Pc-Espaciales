<?php
session_start();
require_once "conexion/conexion.php";
$db = new DataBase();
$con = $db->conectar();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Laptop</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <?php
      include'header.php';
    ?>
    <!-- end header section -->

  </div>


  <!-- fruits section -->

  <section class="fruit_section layout_padding-top">
    <div class="container">
      <h2 class="custom_heading">Laptop</h2>
      <p class="custom_heading-text">
        Estos son algunos de nuestros productos más vendidos.
      </p>
      <?php
        $con_productos = $con->prepare("SELECT * FROM productos Where id_tipo_pro=1 AND id_estado=1");
        $con_productos->execute();
        $productos = $con_productos->fetchAll(PDO::FETCH_ASSOC);
        foreach ($productos as $fila) {
      ?>
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              <?php echo $fila['nombre_p']?>
            </h3>
            <p class="mt-4 mb-5">
              <?php echo $fila['descripcion']?>
            </p>
            <div>
              <a href="model/inicio/login.php" class="custom_dark-btn">
                Comprar Ahora
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
            <img src="<?php echo $fila['imagen']?>" alt="" class="" width="250px" />
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>