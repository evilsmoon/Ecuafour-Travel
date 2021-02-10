<?php require_once('includes/funciones/db_connection.php'); ?>

<?php include_once 'includes/templates/header.php' ?>

<?php
 $connect = mysqli_connect("localhost", "root", "", "proyecto_ecuafourtour");    
 try{

  $sql="SELECT id_reserva FROM reserva ORDER BY id_reserva desc LIMIT 1";
  
  $result = mysqli_query($connect, $sql);  
  $result = $result->fetch_assoc();

  
}catch(\Exception $e){
  echo $e->getMessage();
}

$apagar=$_GET['total'];

$estado='pagado';
?>

<section id="book-a-table" class="book-a-table mt-5">
  <div class="container mt-5">
    <div class="section-title mt-5">
      <h2>Reservaciones</h2>
      <p>Completa el pago de tu reserva</p>
    </div>

    <div class="form-row">
      <div class="col-lg-12 text-center">
        <div id="paypal-button-container"></div>
        <input type="hidden" id="reserva_apagar" name="reserva_apagar" value="<?php echo $result['id_reserva'] ?>">
      </div>

      <script
        src="https://www.paypal.com/sdk/js?client-id=AVfReS1nb3LWvxXLTFoYQ_YRTjCd3uZC0cRpftmFSLGhrDPAg6pUE_A8v9_-CAjql3dZ_mU5ZmyGeF4x">
      // Required. Replace SB_CLIENT_ID with your sandbox client ID.
      </script>

      <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          // This function sets up the details of the transaction, including the amount and line item details.
          return actions.order.create({
            purchase_units: [{

              amount: {

                value: '<?php echo $apagar?>',
              },

            }]

          });



        },
        onApprove: function(data, actions) {
          // This function captures the funds from the transaction.
          return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            alert('Transaction completed by ' + details.payer.name.given_name);
          });
        }

      }).render('#paypal-button-container');



      //This function displays Smart Payment Buttons on your web page.
      </script>

      <?php
 try{

 $stmt = $conn->prepare('INSERT INTO reserva (estado) VALUES(?)');
 $stmt-> bind_param('s',$estado);//manejar los datos, formato de los datos cada s es el formato de los datos
 $stmt->execute();
 $stmt->close();
 $conn->close();

}catch(\Exception $e){
 echo $e->getMessage();
}
?>

    </div>
</section>
<!-- End Book A Table Section -->

<?php include_once 'includes/templates/footer.php' ?>