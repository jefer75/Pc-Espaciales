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

  <title>Tropiko</title>

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
      include 'header.php';
    ?>
    <!-- end header section -->

  </div>



  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Registrate
      </h2>
      <div class="row">
        <div class="col-md-8 mr-auto">
          <form action="model/funciones/registro_user.php" method="post">
            <div class="contact_form-container">
              <div>
                <div>
                  <input type="number" placeholder="N° Documento" min="7" name="documento">
                </div>
                <div>
                  <input type="text" placeholder="Nombres" name="nombre">
                </div>
                <div>
                  <input type="text" placeholder="Apellidos" name="apellido">
                </div>
                <div>
                  <input type="number" placeholder="Telefono" min="10" name="telefono">
                </div>
                <div>
                  <input type="email" placeholder="Correo" name="correo">
                </div>
                <div>
                  <input type="password" placeholder="Contraseña" name="contrasena">
                </div>
                <div class="mt-5">
                  <input type="hidden" name="pagina" value="0">
                  <button type="submit" name="registrar">
                    Registrarse
                  </button>
                </div>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <?php
    include 'footer.php';
  ?>