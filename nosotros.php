<?php include_once 'includes/funciones/articulos.php';?>
<?php 
header("Content-Type: text/html;charset=utf-8");
include_once 'includes/templates/header.php'; ?>


<?php
 $sql_empresa = 'SELECT * FROM empresa ORDER BY fecha_modificacion desc LIMIT 1 '; //RESULTADOS QUE TRAE DE LA BASE

 $sentencia_empresa = $pdo->prepare($sql_empresa);
 $sentencia_empresa->execute();
 $resultado_empresa = $sentencia_empresa->fetchAll();

 
?>


<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about d-flex-grow-h-auto mt-5 ">
    <?php
            foreach($resultado_empresa as $empresa):  
        ?>
    <div class="container mt-5" data-aos="fade-up">
      <div class="row mt-5">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
          <div class="about-img">

            <img src="assets/img/<?php echo $empresa['logo'];?>" alt="" width="500" height="350" />
          </div>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>
            Lema
          </h3>
          <p id="lema" name="lema">
            <?php 
            $nombre_empresa = utf8_encode($empresa['lema']);
            echo $nombre_empresa;?>
          </p>
          <h3>
            Misión
          </h3>
          <p id="mision" name="mision">
            <?php 
            $mision_empresa = utf8_encode($empresa['mision']);
            echo $mision_empresa;?>
          </p>


          <h3>
            Visión
          </h3>
          <p id="vision" name="vision">
            <?php 
            $vision_empresa = utf8_encode($empresa['vision']);
            echo $vision_empresa;?>
          </p>
        </div>
      </div>
    </div>
  </section>
  <?php
        endforeach;
        ?>
  <!-- End About Section -->
</main>
<!-- End #main -->



<?php include_once 'includes/templates/footer.php'; ?>