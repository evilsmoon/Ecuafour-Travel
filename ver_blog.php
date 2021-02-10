<?php include_once 'includes/templates/header.php'; ?>

<?php
 // $id_anuncio=$_GET['id'];

  $mysqli = new mysqli('localhost', 'root', '', 'proyecto_arrriendos');
 // $query = $mysqli -> query ("SELECT nombre_anuncio,usuario,comentario FROM anuncio,blog WHERE anuncio.id_anuncio='". $id_anuncio."'");
 $query = $mysqli -> query ("SELECT anuncio.nombre_anuncio,usuario,comentario FROM anuncio,blog WHERE anuncio.id_anuncio=blog.id_anuncio");
?>


<!-- ======= Testimonials Section ======= -->
<main id="main">
<section id="testimonials" class="testimonials section-bg mt-5">
    <div class="container mt-5" data-aos="fade-up">
        <div class="section-title mt-5">
            <h2>COMENTARIOS-USUARIOS</h2>
         
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">
        <?php while ($comentarios = mysqli_fetch_array($query)) { ?>
            <div class="testimonial-item">
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?php echo $comentarios['comentario']; ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/user.png" class="testimonial-img" alt="" />
                <h3> <?php echo $comentarios['usuario']; ?></h3>
                
            </div>
        <?php } ?>
        </div>
    </div>

</section>

</main>



<?php include_once 'includes/templates/footer.php'; ?>