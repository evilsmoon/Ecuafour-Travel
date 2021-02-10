<?php include_once 'includes/templates/header.php'; ?>

<?php
 
  $mysqli = new mysqli('us-cdbr-east-03.cleardb.com','b447ac7ccdeb89', 'ee57c5c2', 'heroku_6cf9173bed03065');
  $query = $mysqli -> query ("SELECT id_anuncio,nombre_anuncio FROM anuncio");
?>


<link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<section id="book-a-table" class="book-a-table mt-5">
  <div class="container mt-5" data-aos="fade-up">
    <div class="section-title mt-5">
      <h2>Comentarios-Opiniones</h2>
      <p>Cuéntanos</p>
    </div>

    <form action="ingresar_blog.php" method="post" data-aos-delay="100">
      <div class="form-row">
        <div>
          Lugar:
          <select name="lugar" id="lugar" class="selectpicker show-tick" data-live-search="true"
            data-none-results-text="No se encontraron resultados">
            <?php
                            while ($valores = mysqli_fetch_array($query)) {
                                $nombre = utf8_encode($valores['nombre_anuncio']);                          
                                echo '<option value="'.$valores['id_anuncio'].'">'.$nombre.'</option>';
                              }
                        ?>
          </select>
        </div>
      </div>
      <div class="form-row mt-4">
        <div>
          Nombre:
          <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Nombre" data-rule="minlen:4"
            data-msg="Por favor, llene este campo" />
          <div class="validate"></div>
        </div>
      </div>
      <div class="form-group mt-4">
        Comentario:
        <textarea class="form-control" name="comentario" rows="5" placeholder="Comentario"></textarea>
        <div class="validate"></div>
      </div>
      <div class="text-center">
        <button type="submit">Enviar</button>
      </div>
    </form>
  </div>

</section>

<?php include_once 'includes/templates/footer.php'; ?>