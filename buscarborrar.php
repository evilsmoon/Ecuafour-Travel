<!-- Bootstrap core CSS -->
<link href="buscar/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="buscar/simple-sidebar.css" rel="stylesheet">


<?php
header("Content-Type: text/html;charset=utf-8");
ob_start();
?>
<?php include_once 'includes/funciones/articulos.php';?>
<!------------------------------------->
<!-- CONTROL DE ARTICULOS POR PAGINA--->
<!------------------------------------->
<?php
include_once 'includes/templates/header.php'; 
   
    //LLamar a todos los articulos
    $sql = 'SELECT * FROM anuncio';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();
   // var_dump($resultado);

   //Articulo por pagina
   $articulos_x_pag =10;

   //Contar articulos de la db
   $total_art_db=$sentencia->rowCount();

   //echo $total_art_db;
   $paginas = $total_art_db/10;
$paginas = ceil($paginas);
   //echo $paginas;
?>

<main id="main">
  <!-- ======= Anuncios ======= -->
  <section id="why-us" class="why-us mt-5">
    <div class="container mt-5 " data-aos="fade-up">
      <div class="section-title ">
        <h2>DEPARTAMENTOS</h2>
        <p>Encuentra el departamento de tus sueños</p>
      </div>


      <!-- ======= DEEE AQUIIII ======= -->

      <div class="pos-f-t">

        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
        <div class="collapse " id="navbarToggleExternalContent">
          <div class="bg-dark p-4">

            <ul class="nav nav-tabs">

              <form method="post">

                <li class="nav-item dropdown">

                </li>

                <div class="container">
                  <div class="row">
                    <div class="col-sm">
                      <label class="form-check-label ">Nombre a buscar</label>
                      <input type="text" placeholder="Nombre..." name="nombre_anuncio" id="nombre_anuncio" />
                    </div>

                    <div class="col-sm">
                      <label class="form-check-label">Servicios</label>
                      <select class="form-control" name="servicios" id="servicios">
                        <option value="">Servicios</option>
                        <option value="p">Piscina</option>
                        <option value="h">Hidromasaje</option>
                        <option value="e">Parqueadero</option>
                      </select>
                    </div>

                    <div class="col-sm">
                      <label class="form-check-label">Por precio</label>
                      <select class="form-control" name="precio" id="precio">
                        <option value="">Precio</option>
                        <option value="precio1">1 a 20</option>
                        <option value="precio2">20 a 30</option>
                        <option value="precio3">30 a 40</option>
                      </select>
                    </div>

                    <div class="col-sm">
                      <label class="form-check-label">Lugar</label>
                      <select class="form-control" name="lugar" id="lugar">
                        <option value="">Lugar</option>
                        <option value="norte">Norte</option>
                        <option value="centro">Centro</option>
                        <option value="costa">Costa</option>
                        <option value="valles">Valles</option>
                      </select>
                    </div>


                    <div class="col-sm">
                      <button class="btn btn-primary" name="buscar" type="submit">Buscar</button>
                    </div>
                  </div>
                </div>
              </form>

              </li>

          </div>
        </div>
      </div>


      <!--Codigo implementado-->
      <?php
$where="";
$where_nombre = "";
$where_piscina1 = "";
$where_hidro = "";
$where_parq = "";
$where_precio1="";
$where_precio2="";
$where_precio3="";
$where_ubicacion1="";
$where_ubicacion2="";
$where_ubicacion3="";
$where_ubicacion4="";
$where_join1="";
//$nombre_anuncio= $_POST['nombre_anuncio'];
//$servicios= $_POST['servicios'];
    if (isset($_POST['buscar'])){
        if (strlen($_POST['nombre_anuncio'])>=2)
            $where_nombre ="WHERE `nombre_anuncio` like '%".$_POST['nombre_anuncio']."%'";
        else
            $where_nombre = "WHERE 1 ";
        $where_piscina1 =$where_hidro = $where_parq = "";

        if (($_POST['servicios'])!=""){
            if ($_POST['servicios']=='p')
                $where_piscina1 = "AND `piscina`= '1'";
            if ($_POST['servicios']=='h')
                $where_hidro = "AND `hidromasaje`= '1'";
            if ($_POST['servicios']=='e')
                $where_parq = "AND `parqueadero`= '1'";
        }


        if(($_POST['precio'])!=""){
          if($_POST['precio']=='precio1')
          $where_precio1= "AND `precio_dia`>'10' AND `precio_dia` <'20' ";
          if($_POST['precio']=='precio2')
          $where_precio2= "AND `precio_dia`>='20' AND `precio_dia` <='30'";
          if($_POST['precio']=='precio3')
          $where_precio3= "AND `precio_dia`>='30' AND `precio_dia` <='40'";
        }


        if (($_POST['lugar'])!=""){
          $where_join1=" AND ubicacion.id_anuncio=anuncio.id_anuncio";
          if ($_POST['lugar']=='norte')
              $where_ubicacion1 = "AND `sector`= 'norte'";
          if ($_POST['lugar']=='centro')
              $where_ubicacion2 = "AND `sector`= 'centro'";
          if ($_POST['lugar']=='costa')
              $where_ubicacion3 = "AND `sector`= 'costa'";
          if ($_POST['lugar']=='valles')
              $where_ubicacion4 = "AND `sector`= 'valle'";
      }



    }
?>

      <?php  
 $connect = mysqli_connect("localhost", "root", "", "proyecto_ecuafourtour");  
 $query = "SELECT * FROM anuncio_img ORDER BY id_imagen asc";  
 $result = mysqli_query($connect, $query);  
 ?>




      <!--Fin codigo implementado-->

      <!-- ======= ACAAAAAAA ======= -->


      <!--Paginacion-->
      <?php
            if(!$_GET){ //Si no exite metodo get, redirigo al index pag1
             
                header('Location:anuncios.php?pagina=1');
            }
            if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
              header('Location:anuncios.php?pagina=1');
            }

            //Contar cuantos debo traer 
            $iniciar = ($_GET['pagina']-1)*$articulos_x_pag;
            //echo $iniciar;
            //no se pone el signo de pregunta (:iniciar - ?)por que la varaible no viene de string 
            //iniciar: placeholder
            
            
            //======= DEEE AQUIIII ======= -->
            $sql_articulos = 'SELECT * FROM `anuncio`,`ubicacion` '.$where_nombre . $where_piscina1 . $where_hidro. $where_parq. $where_precio1. $where_precio2. $where_precio3. $where_ubicacion1. $where_ubicacion2. $where_ubicacion3. $where_ubicacion4. $where_join1. ' LIMIT :iniciar,:narticulos  '; //RESULTADOS QUE TRAE DE LA BASE
            echo $sql_articulos;
            //ACAAAAAAAA
          
            
            $sentencia_articulos = $pdo->prepare($sql_articulos);
            $sentencia_articulos-> bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
            $sentencia_articulos-> bindParam(':narticulos', $articulos_x_pag, PDO::PARAM_INT);
            $sentencia_articulos->execute();

            $resultado_articulos = $sentencia_articulos->fetchAll();

            ///// IMAGENES SECUNDARIAS //////
              
            $sql_articulos2 = 'SELECT * FROM anuncio_img'; //RESULTADOS QUE TRAE DE LA BASE
            $sentencia_articulos2 = $pdo->prepare($sql_articulos2);

            $sentencia_articulos2-> bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
            $sentencia_articulos2-> bindParam(':narticulos', $articulos_x_pag, PDO::PARAM_INT);
            
            $sentencia_articulos2->execute();

            $resultado_articulos2 = $sentencia_articulos2->fetchAll();

            $cont=0;
            $cont1=0;
            ///// UBICACION ///////
            
            $sql_ubicacion = 'SELECT anuncio.id_anuncio, ubicacion.longitud,ubicacion.latitud, ubicacion.sector FROM anuncio,ubicacion WHERE anuncio.id_anuncio=ubicacion.id_anuncio'; //RESULTADOS QUE TRAE DE LA BASE

            $sentencia_ubicacion = $pdo->prepare($sql_ubicacion);
            $sentencia_ubicacion-> bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
            $sentencia_ubicacion-> bindParam(':narticulos', $articulos_x_pag, PDO::PARAM_INT);
            $sentencia_ubicacion->execute();
            $resultado_ubicacion = $sentencia_ubicacion->fetchAll();

      ?>


      <!-- ======= Articulo ? ======= -->

      <?php
            foreach($resultado_articulos as $articulo):  
             
        ?>

      <div class="row my-2">
        <div class="col-lg-6 ">

          <a href="reserva.php?res=<?php
            echo $articulo['id_anuncio'];?>&precio=<?php echo $articulo['precio_dia']?>">

            <div class="box" id="box-1" data-aos="zoom-in" data-aos-delay="20">

              <span><?php
              $nombre_anuncio = utf8_encode($articulo['nombre_anuncio']);
              echo $nombre_anuncio;?></span>

              <p>

                <?php 
             
                $descripcion = utf8_encode($articulo['descripcion']);
                echo $descripcion;?>
              </p>
              <h5>Ambientes</h5>
              <p class="icofont-people">
                <?php echo "Máximo de Personas: " . $articulo['max_personas'];?>
              </p>
              <p class="icofont-bed mt-1">
                <?php echo "Dormitorio: " . $articulo['dormitorio'];?>
              </p>
              <p class="icofont-water-drop mt-1">
                <?php 
                echo "Baño: " . $articulo['wc'];?>
              </p>
              <p class="icofont-chicken mt-1"">
              <?php echo "Cocina: " . $articulo['cocina'];?>
              </p>
              <p class=" icofont-wind-waves mt-1"">
                <?php 
                echo "Piscina: ";
                if($articulo['piscina']==0){
                  echo "No";
                }else{
                  echo $articulo['piscina'];
                }
              
                ?>
              </p>

              <h5 class="mt-3 ">Servicios</h5>
              <p class="icofont-wifi ">
                <?php echo "Wifi: "; 
                if($articulo['wifi']==1){
                  echo "Si";
                }else{
                  echo "No";
                }
                
               ;?>
              </p>
              <p class="icofont-car mt-1"">
              <?php echo "Parqueadero: " . $articulo['parqueadero'];?>
              </p>
              <p class=" icofont-brand-mytv mt-1"">
                <?php echo "TV Cable: ";
                if($articulo['tvcable']==1){
                  echo "Si";
                }else{
                  echo "No";
                };?>
              </p>
              <p class="icofont-hour-glass mt-1"">
              <?php echo "Hidromasaje: ";
               if($articulo['hidromasaje']==1){
                echo "Si";
              }else{
                echo "No";
              };?>
              </p>
              <p class=" icofont-beverage mt-1"">
                <?php 
                echo "Area_Social: ";
                if($articulo['area_social']==1){
                  echo "Si";
                }else{
                  echo "No";
                }
        ?>
              </p>
              <p class="icofont-hour-glass mt-1"">
              <?php echo "Precio x Día: " . $articulo['precio_dia'] . " Dólares";?>
              </p>


              <h5 class=" mt-3 ">Ubicación</h5>
              <?php
                   $cont1=$cont1+1;
              ?>
              <?php
              
            foreach($resultado_ubicacion as $ubicacion):
              if($ubicacion['id_anuncio'] == $cont1){
                 ?>
        
              <p style=" text-align:center">
                <div id="<?php echo $cont1 ?>" style=" height: 140px;   class=" mt-3"></div>
              </p>
              <script>
              var long = "<?php echo $ubicacion['longitud']?>";
              var lat = "<?php echo $ubicacion['latitud']?>";

              var mymap = L.map("<?php echo $cont1?>").setView(["<?php echo $ubicacion['longitud']?>",
                "<?php echo $ubicacion['latitud']?>"
              ], 14);

              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(mymap);

              L.marker(["<?php echo $ubicacion['longitud']?>", "<?php echo $ubicacion['latitud']?>"]).addTo(mymap)
                .bindPopup('Nos encontramos Aquí....')
                .openPopup();

              var circle = L.circle(["<?php echo $ubicacion['longitud']?>", "<?php echo $ubicacion['latitud']?>"], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 20
              }).addTo(mymap);
              </script>

              <?php
              }
                    endforeach;
                      ?>
              <p>
                <h2 class="icofont-hand-right text-right mt-4"> Reserva Aquí Ya</h2>
              </p>
            </div>

          </a>
        </div>

        <!-- Imagenes -->

        <div class="box2 col-lg-6" data-aos-delay="20">
          <div id="box2-1" data-aos-delay="20" class="redimension">
            <p>
              <span> Galeria de Fotos </span>
            </p>

            <a href=" assets/anuncio/<?php echo $articulo['img_principal'];?>" class="venobox img-responsive "
              data-gall="gallery-item<?php  echo $articulo['id_anuncio'];?>">
              <img src="assets/anuncio/<?php echo $articulo['img_principal'];?>" alt=""
                class="img-fluid img-responsive mt-5" />
            </a>
            <?php
            foreach($resultado_articulos2 as $articulo2):
              if($articulo2['id_anuncio'] == $articulo['id_anuncio']){
        
                 ?>
            <a href="assets/anuncio/<?php echo $articulo2['nombre_img'];?>" class="venobox img-responsive "
              data-gall="gallery-item<?php echo $articulo['id_anuncio'];?>">
            </a>
            <?php
                  }
                endforeach;
                  ?>


          </div>

        </div>

      </div>


      <?php
                    endforeach;
                      ?>

      <div class=" row mt-5" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <nav aria-label=" Page navigation example" class="text-center">
            <ul class="pagination">
              <li class="page-item 
                          <?php echo $_GET['pagina']<=1 ? 'disabled': '' ?>">
                <a class="page-link" href="anuncios.php?pagina=<?php echo $_GET['pagina']-1 ?>">
                  Anterior
                </a>
              </li>


              <?php for($i=0;$i<$paginas;$i++):  ?>

              <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                <a class="page-link" href="anuncios.php?pagina=<?php echo $i+1?>">
                  <?php echo $i+1 ?>
                </a>
              </li>

              <?php endfor; ?>

              <li class=" page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled': '' ?>">
                <a class="page-link" href="anuncios.php?pagina=<?php echo $_GET['pagina']+1 ?>">
                  Siguiente
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>



    </div>
    <!-- Fin del Div-->
    </div>
  </section>
  <!-- End Why Us Section -->
</main>
<!-- End #main -->



<?php include_once 'includes/templates/footer.php'; ?>
<?php
ob_end_flush();

?>