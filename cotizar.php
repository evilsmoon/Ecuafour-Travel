<?php  
       
include_once 'includes/templates/header.php'; 
           
 ?>


<main id="main">
  <!-- ======= Book A Table Section ======= -->
  <section id="book-a-table" class="book-a-table mt-5">
    <div class="container mt-5">
      <div class="section-title mt-5" name="daterange" role="form" data-aos-delay="100" required>
        <h2>Cotizaciones</h2>
        <p>Llene el siguiente formulario</p>
      </div>

      <form action="validacion.php" class="php-email-form" method="post" role="form" data-aos-delay="100"
        id="datos_cotizar">
        <div class="form-row">
          <div class="col-lg-4 col-md-6 form-group">

            Nombre: <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese su Nombre"
              required />

            <div class="validate"></div>

          </div>
          <div class="col-lg-4 col-md-6 form-group">

            Correo:<input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa tu Correo"
              data-rule="email" data-msg="Porfavor ingresa un correo válido" required />
            <div class="validate"></div>
          </div>

          <div class="content-select">

            <select class="container mt-3 form-group" name="lugar" id="lugar">
              <option value="0">Elija su Localidad</option>
              <option value="Quito">Quito</option>
              <option value="Guayaquil">Guayaquil</option>
              <option value="Cuenca">Cuenca</option>
              <i></i>
            </select>

          </div>
          <div class=" container mt-3 col-md-6 form-group">
            <h2>Extras:</h2>
            <label class=" content-input">
              <input type="checkbox" name="extras[]" id="picina" value="Picina"> Piscina <i></i></label>
            <label class=" content-input">
              <input type="checkbox" name="extras[]" id="parqueadero" value="Parqueadero" /> Parqueadero <i></i></label>
            <label class=" content-input">
              <input type="checkbox" name="extras[]" id="area" value="Area" /> Área Social <i></i></label>

            <div class="validate"></div>
          </div>


          <div class=" container mt-3  col-md-6  form-group">
            <h2> Servicios:</h2>
            <label class=" content-input">
              <input type="checkbox" name="servicios[]" id="tv_cable" value="tv_cable"> TV Cable <i></i></label>
            <label class=" content-input">
              <input type="checkbox" name="servicios[]" id="wifi" value="WIFI">Wifi <i><i></label>
            <label class=" content-input">
              <input type="checkbox" name="servicios[]" id="hidromasaje" value="hidromasaje"> Hidromasaje
              <i></i></label>
            <label class=" content-input">
              <input type="checkbox" name="servicios[]" id="gym" value="gym">Gimnacio <i></i></label>

            <div class="validate"></div>
          </div>



          <div class="text-center">
            <button type="submit" name="submit" id="enviar" value="ENVIAR">Enviar </button>
            <input type="hidden" name="precio" id="precio" value="valor_a_pagar">
          </div>

      </form>

    </div>

  </section>
</main>
<?php 
                    if(isset($_GET['exitoso'])):
                        if($_GET['exitoso']==1):
                            echo '<h3> Registro exitoso </h3>';
                        endif;
                    endif;

                ?>
<!-- End Book A Table Section -->

<?php include_once 'includes/templates/footer.php'; ?>