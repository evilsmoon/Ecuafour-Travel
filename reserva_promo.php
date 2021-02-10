<?php  
 
 $id_anuncio_res=$_GET['res'];
 $connect = mysqli_connect("localhost", "root", "", "proyecto_ecuafourtour");     
 try{

  $sql="SELECT * FROM reserva WHERE id_anuncio='".$id_anuncio_res."'";

  $result = mysqli_query($connect, $sql);  

}catch(\Exception $e){
  echo $e->getMessage();
}

$fechas_reserv=array();
while ($fech_reserv=$result->fetch_assoc()) {
 $fechas_reserv[]=$fech_reserv;
}

       
include_once 'includes/templates/header.php'; 
           
 ?>

<!-- ======= Scripts  ======= -->

<!-- ======= End Scripts  ======= -->


<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table mt-5">
  <div class="container mt-5">
    <div class="section-title mt-5">
      <h2>Promociones Reservas</h2>
      <p>Llene el siguiente formulario para procesar su reserva</p>
    </div>

    <form action="envio_reserva.php" method="post" role="form" class="php-email-form" data-aos-delay="100"
      id="form_envio">
      <div class="form-row">
        <div class="col-lg-4 col-md-6 form-group">
          Nombre: <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese su Nombre"
            required />
          <div class="validate"></div>

        </div>
        <div class="col-lg-4 col-md-6 form-group">
          Correo:<input type="email" class="form-control" name="email" id="email_val" placeholder="Ingresa tu Correo"
            data-rule="email" data-msg="Porfavor ingresa un correo válido" required />
          <div class="validate"></div>
        </div>
        <div class="col-lg-4 col-md-6 form-group">
          Cédula:<input type="text" class="form-control" name="cedula" id="cedula" placeholder="Ingresa tu Cédula"
            data-rule="minlen:10" data-msg="Porfavor ingresa 10 numeros" required />
          <div class="validate"></div>
        </div>
        <div class="col-lg-4 col-md-6 form-group">
          Teléfono:<input type="tel" class="form-control" name="phone" id="phone" placeholder="0999999999"
            pattern="[0-9]{10}" data-rule="minlen:9" data-msg="No dejes vacío el campo" required />
          <div class="validate"></div>
        </div>
        <div class="col-lg-4 col-md-6 form-group">
          Fecha:<input type="text" name="daterange" class="form-control" id="fecha" required />
          <input type="hidden" id="fecha_inicio" name="fecha_inicio">
          <input type="hidden" id="fecha_fin" name="fecha_fin">
          <input type="hidden" id="n_dias" name="n_dias">
          <div class="validate"></div>
        </div>

        <div class="col-lg-4 col-md-6 form-group">
          # Adultos<input type="number" class="form-control" name="adulto" id="adulto" placeholder="Número de Adultos"
            data-rule="minlen:1" data-msg="Porfavor ingresa al menos 1 letras" required />
          <div class="validate"></div>
        </div>
        <div class="col-lg-4 col-md-6 form-group">
          # Niños<input type="number" class="form-control" name="nino" id="nino" placeholder="Número de Niños"
            data-rule="minlen:1" data-msg="Porfavor ingresa al menos 1 letras" required />
          <div class="validate"></div>
        </div>
      </div>
      <?php
           $id_anuncio=$_GET['res'];
           $precio_dias=$_GET['precio'];
      ?>
      <input type="hidden" id="id_anuncio" name="id_anuncio" value="<?php echo $id_anuncio?>">
      <input type="hidden" id="precio_dia" name="precio_dia" value="<?php echo $precio_dias?>">


      <div class="text-center">
        <button type="submit" name="submit" id="btn_reserva_envio">Enviar </button>
      </div>
    </form>
  </div>
</section>
<!-- End Book A Table Section -->
<script>
$(function() {
  var inicio = moment();

  $('input[name="daterange"]').daterangepicker({
      locale: {
        format: 'YYYY-MM-DD'
      },
      opens: 'left',
      startDate: inicio,
      minDate: inicio,
      autoApply: true


    },
    function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
        'YYYY-MM-DD'));


      var fech_inicio = start.format('YYYY-MM-DD');
      var fech_fin = end.format('YYYY-MM-DD');
      $('#fecha_inicio').val(fech_inicio);
      $('#fecha_fin').val(fech_fin);
      var dias = end.diff(start, 'days');
      $('#n_dias').val(dias);

      ///////FILTRO///////
      /*
      $('#filter').click(function() {
        var from_date = start.format('YYYY-MM-DD');
        var to_date = end.format('YYYY-MM-DD');
        if (from_date != '' && to_date != '') {
          $.ajax({
            url: "filter.php",
            method: "POST",
            data: {
              from_date: from_date,
              to_date: to_date
            },
            success: function(data) {
              $('#order_table').html(data);
            }
          });
        } else {
          alert("Please Select Date");
        }
      });
      ///////END FILTRO///////
      */
      //////
    });
});
</script>
<?php include_once 'includes/templates/footer.php'; ?>