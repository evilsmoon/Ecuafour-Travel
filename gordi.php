<?php  
 $connect = mysqli_connect("localhost", "root", "", "proyecto_ecuafourtour");  
 $query = "SELECT * FROM amor ORDER BY id_fecha desc";  
 $result = mysqli_query($connect, $query); 
 
 $connect = mysqli_connect("localhost", "root", "", "proyecto_ecuafourtour");  
 $output = '';  
 $query = "  
 SELECT * FROM amor WHERE id_anuncio=2 ORDER BY fin DESC LIMIT 1";  
      
 $result = mysqli_query($connect, $query);  
 
 $row = mysqli_fetch_array($result);
 $gordix2=$row["fin"];
       echo $gordix2;       
       

include_once 'includes/templates/header.php'; 

           
 ?>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<link href="assets/css/daterangepicker.css" rel="stylesheet" />




<section id="book-a-table" class="book-a-table mt-5">
  <div class="container mt-5">
    <div class="section-title mt-5">
      <h2>Reservaciones</h2>
      <p>Llene el siguiente formulario para procesar su reserva</p>
    </div>

    <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos-delay="50">

      <div class="col-lg-4 col-md-6 form-group">
        <input type="text" name="daterange" class="form-control" />
        <input type="hidden" value="<?php echo $gordix2?>" id="gordix2">
      </div>


      <div class="mb-3">
        <div class="loading">Cargando</div>
        <div class="error-message"></div>
        <div class="sent-message">
          Your booking request was sent. We will call back or send an Email to confirm your reservation.
          Thank you!
        </div>
      </div>
      <div class="text-center">
        <button type="submit">Book a Table</button>
      </div>
    </form>
  </div>
</section>



<script>
var inicio = $("#gordix2").val();
$(function() {
  $('input[name="daterange"]').daterangepicker({
    locale: {
      format: 'YYYY-MM-DD'
    },
    opens: 'left',
    startDate: inicio,
    minDate: inicio,
    autoApply: true
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
      'YYYY-MM-DD'));
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