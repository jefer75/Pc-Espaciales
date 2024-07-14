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

  <title>PC Espaciales</title>

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
  <div class="hero_area">
    <!-- header section strats -->
    <?php
      include'header.php';
    ?>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Bienvenido a <br />
                            PC Espaciales
                          </h1>
                          <p>
                            Te damos la bienvendia a nuestro sitio web oficial, en el podras encontrar más informacion relacionada al mundo de la tecnología y la diversion, por lo que es de suma importancia para nosotros complacer tus necesidades, por ello contamos con una amplia gama de productos según tu necesidad.
                          </p>
                          <div class="d-flex">
                            <a href="productos.php" class="text-uppercase custom_orange-btn mr-3">
                              Ver articulos
                            </a>
                            <a href="contactanos.php" class="text-uppercase custom_dark-btn">
                              Contactanos
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="img/contenido/carrusel1.jpg" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Bienvenido a <br />
                            PC Espaciales
                          </h1>
                          <p>
                            Te damos la bienvendia a nuestro sitio web oficial, en el podras encontrar más informacion relacionada al mundo de la tecnología y la diversion, por lo que es de suma importancia para nosotros complacer tus necesidades, por ello contamos con una amplia gama de productos según tu necesidad.
                          </p>
                          <div class="d-flex">
                            <a href="productos.php" class="text-uppercase custom_orange-btn mr-3">
                              Ver articulos
                            </a>
                            <a href="contactanos.php" class="text-uppercase custom_dark-btn">
                              Contactanos
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="img/contenido/carrusel2.jpg" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Bienvenido a <br />
                            PC Espaciales
                          </h1>
                          <p>
                            Te damos la bienvendia a nuestro sitio web oficial, en el podras encontrar más informacion relacionada al mundo de la tecnología y la diversion, por lo que es de suma importancia para nosotros complacer tus necesidades, por ello contamos con una amplia gama de productos según tu necesidad.
                          </p>
                          <div class="d-flex">
                            <a href="productos.php" class="text-uppercase custom_orange-btn mr-3">
                              Ver articulos
                            </a>
                            <a href="contactanos.php" class="text-uppercase custom_dark-btn">
                              Contactanos
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="img/contenido/carrusel3.jpg" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>

  <!-- service section -->

  <section class="service_section layout_padding ">
    <div class="container">
      <h2 class="custom_heading">Nuestros servicios</h2>
      <p class="custom_heading-text">
        Estos son los servicios que te podemos ofrecer
      </p>
      <div class=" layout_padding2">
        <div class="card-deck">
          <div class="card">
            <img class="card-img-top" src="img/contenido/servicios1.jpg" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Computadores portatiles</h5>
              <p class="card-text">
                Este es uno de nuestros servicios principales, en el cual te podremos ofrecer variedad de opciones que se ajusten a tu presupuesto y a tu necesidad, teniendo en cuenta que solo manejamos equipos de la mejor calidad del mercado, por lo que vas a tener asegurado el correcto funcionamiento de tu equipo por un largo tiempo. 
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="img/contenido/servicios2.jpg" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Arma tu computador</h5>
              <p class="card-text">
                Esta es una de las opciones mas apetecibles para el publico, ya que no solo ofrecemos computadores portatiles, sino tambien ofrecemos la opcion de armar tu propio PC segun tu presupuesto y segun lo que requieras, por ello majenamos diferentes opciones para cada una de las partes que conforman tu computador, desde la pantalla hasta el PadMouse.
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="img/contenido/servicios3.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Reparacion</h5>
              <p class="card-text">
                Entenedmos que tu necesidad no solo puede ser adquirir un equipo, sino tambien hacerle mantenimiento o reparacion en caso de ser necesario, por ello te ofrecemos la posibilidad de repara tu equipo o hacerle mantenimiento preventivo y correctivo, entendiendo que es de suma importancia para alargar la vida util del equipo
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="" class="custom_dark-btn">
          Saber más
        </a>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- fruits section -->

  <section class="fruit_section">
    <div class="container">
      <h2 class="custom_heading">Algunos de nuestros productos</h2>
      <p class="custom_heading-text">
        Acontinuacion te mostramos algunos de nuestros productos
      </p>

      <?php
        $con_productos = $con->prepare("SELECT * FROM productos Where id_tipo_pro<=5 AND id_estado=1");
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
                Comprar ahora
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

  <!-- end fruits section -->

  <!-- tasty section -->
  <section class="tasty_section">
    <div class="container_fluid">
      <h2>
        ¿Que estas esperando?
      </h2>
    </div>
  </section>

  <!-- end tasty section -->

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
  <?php
    include 'footer.php';
  ?>

  