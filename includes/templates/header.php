<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Ecuafour tour</title>
  <meta content="" name="Venta de " />
  <meta content="" name="Venta de " />
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta content="" name="keywords" />
  <!-- Favicons -->

  <link href="assets/recurses/logo_lWD_1.ico" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <!-- Template Main CSS File -->


  <link href="assets/css/login.css" rel="stylesheet" />
  <link href="assets/css/daterangepicker.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/num_count.css" rel="stylesheet" />
  <link href="assets/css/paypal.css" rel="stylesheet" />

  <link href="assets/css/vali.css" rel="stylesheet" />
  <link href="assets/css/cotiza.css" rel="stylesheet" />
  <link href="assets/css/lugar.css" rel="stylesheet" />

  <link rel="stylesheet" href="assets/css/leaflet.css" />

  <script src="assets/js/leaflet.js"></script>
  <script src="assets/js/contador.js"></script>

  <!-- =======================================================
  * Template Name: Restaurantly - v1.1.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Top Bar ======= -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <!--
            <h1 class="logo mr-auto"><a href="index.html">INMOVILIARIA</a></h1>-->
      <a href="index.php" class="logo mr-auto"><img src="assets/recurses/logo.jpeg" alt="" class="img-fluid"> Ecuafour <samp>Tour</samp></a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="nosotros.php">Quienes Somos</a></li>
          <li><a href="anuncios.php">Anuncios</a></li>
          <li><a href="promociones.php">Promociones</a></li>
          <li><a href="contactanos.php">Contáctanos</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="cotizar.php">Cotizar</a></li>
          <li class="book-a-table text-center">
            <a id="sesion" href="#myModal" data-toggle="modal">INICIAR SESIÓN</a>
          </li>
        </ul>
      </nav>
      <!-- .nav-menu -->
    </div>
  </header>
  <!-- End Header -->
  <!-- Modal HTML -->

  <form action="ingresar.php" method="POST">
    <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-login">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-login text-center">ADMINISTRADOR</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="formgroup">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="user" placeholder="Username" required="required"
                  id="user">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="clave" placeholder="Password" required="required"
                  id="clave">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-lg" id="btn-login">Iniciar Sesión</button>
            </div>
            <span id="response">
            </span>

  </form>
  </div>

  </div>
  </div>
  </div>