<?php  
 require_once('includes/funciones/db_connection.php');

////////
if(isset($_POST['submit'])):
  $nombre=$_POST['name'];
  $cedula=$_POST['cedula'];
  $phone=$_POST['phone'];
  $direccion=$_POST['direccion'];
  $provincia=$_POST['provincia'];
  $email=$_POST['email'];
  $mensaje=$_POST['msg'];
  ?>


<?php
    //Previene ataques
    try{

    $stmt = $conn->prepare('INSERT INTO contactos (nombre, cedula, correo, telefono, provincia, direccion, mensaje) VALUES(?,?,?,?,?,?,?)');
    $stmt-> bind_param('sssssss',$nombre, $cedula, $email, $phone, $provincia, $direccion, $mensaje);//manejar los datos, formato de los datos cada s es el formato de los datos
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo '<script type="text/javascript">
    alert("Gracias por contactarse con nosotros.");
    window.location.href="index.php";
    </script>';  
    header('Location:index.php?exitoso=1');
    

}catch(\Exception $e){
    echo $e->getMessage();
}
  endif;
  ?>