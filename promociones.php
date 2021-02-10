<?php include_once 'includes/funciones/articulos.php';?>
<?php 
header("Content-Type: text/html;charset=utf-8");
include_once 'includes/templates/header.php'; ?>


<?php
 $sql_promociones = 'SELECT anuncio.id_anuncio, anuncio.img_principal, anuncio.nombre_anuncio,anuncio.max_personas,anuncio.dormitorio,anuncio.piscina,anuncio.hidromasaje,promocion.descripcion_promocion,anuncio.precio_dia,promocion.precio_oferta,promocion.caducidad FROM anuncio,promocion WHERE anuncio.id_anuncio=promocion.id_anuncio'; //RESULTADOS QUE TRAE DE LA BASE

 $sentencia_promociones = $pdo->prepare($sql_promociones);
 $sentencia_promociones->execute();
 $resultado_promociones = $sentencia_promociones->fetchAll();

?>

<main id="main">

  <!-- ======= Events Section ======= -->
  <section id="events" class="events mt-5">
    <div class="container mt-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Promociones</h2>
        <p>Los mejores planes para viajar </p>
      </div>

      <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">
        <?php
            foreach($resultado_promociones as $promocion):  
        ?>
        <a href="reserva_promo.php?res=<?php
            echo $promocion['id_anuncio'];?>&precio=<?php echo $promocion['precio_oferta']?>">
          <div class="row event-item">
            <div class="col-lg-4" class="redimension">
              <img src="assets/anuncio/<?php echo $promocion['img_principal'];?>"
                class="img-fluid img-responsive redimension" alt="" />
            </div>

            <div class="col-lg-8 pt-4 pt-lg-0 content">
              <h3><?php
               $nombre_promocion = utf8_encode($promocion['nombre_anuncio']);
               echo $nombre_promocion;?></h3>
              <div class="price">

                <p>Antes: <span><?php echo $promocion['precio_dia'] . " ";?>$</span></p>
                <p>Ahora: <span><?php echo $promocion['precio_oferta']. " ";?>$</span></p>
              </div>
              <p class="font-italic">
                <?php 
                $desc_promocion = utf8_encode($promocion['descripcion_promocion']);
                echo $desc_promocion;?>
              </p>
              <ul>
                <li>
                  <i class="icofont-check-circled"></i> <?php echo "Dormitorio: " . $promocion['dormitorio'];?>
                </li>
                <li>
                  <i class="icofont-check-circled"></i> <?php 
                echo "Piscina: ";
                if($promocion['piscina']==0){
                  echo "No";
                }else{
                  echo $promocion['piscina'];
                }
              
                ?>
                </li>
                <li>
                  <i class="icofont-check-circled"></i> <?php echo "Hidromasaje: ";
               if($promocion['hidromasaje']==1){
                echo "Si";
              }else{
                echo "No";
              };?>
                </li>
              </ul>
              <p style=”text-align: justify;”>
                <?php echo "Valido Hasta: " . $promocion['caducidad'];?>
              </p>

            </div>

          </div>
        </a>
        <?php
        endforeach;
        ?>
      </div>
    </div>

  </section>
  <!-- End Events Section -->

</main>
<!-- End #main -->

<?php include_once 'includes/templates/footer.php'; ?>


