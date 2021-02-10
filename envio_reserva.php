<?php  
 require_once('includes/funciones/db_connection.php');
 $id_anuncio_res=$_POST['id_anuncio'];
 $fecha_inicio_res=$_POST['fecha_inicio'];
 $fecha_fin_res=$_POST['fecha_fin'];
 $connect = mysqli_connect('us-cdbr-east-03.cleardb.com','b447ac7ccdeb89', 'ee57c5c2', 'heroku_6cf9173bed03065');    
 $connect2 = mysqli_connect('us-cdbr-east-03.cleardb.com','b447ac7ccdeb89', 'ee57c5c2', 'heroku_6cf9173bed03065');  
   
 try{

  ///Cambiar a reserva//// 
  $sql="SELECT * FROM reserva WHERE id_anuncio= '" .$id_anuncio_res . "' AND  (fecha_inicio >= '". $fecha_inicio_res . "' AND fecha_fin<='" . $fecha_fin_res ."') ORDER BY fecha_fin desc";

  $result = mysqli_query($connect, $sql);  

  ///
  $sql2="SELECT max_personas FROM anuncio WHERE id_anuncio= '" .$id_anuncio_res . "'";
  $result2 = mysqli_query($connect2, $sql2);  

}catch(\Exception $e){
  echo $e->getMessage();
}
 
$adulto_max=$_POST['adulto'];
$nino_max=$_POST['nino'];
$total_person=number_format($adulto_max)+number_format($nino_max);

$result2_max = $result2->fetch_assoc();
 ?>

<?php
  ///////////////////

if($result->fetch_assoc() != NULL){
  $validacion = FALSE;
  echo "<script type='text/javascript'>";
  echo "setTimeout(function(){ window.history.back(-1)}, 2000);";
  echo "alert('Seleccione otra fecha, por favor');";
  echo "</script>";
}else{
  $validacion = TRUE;
}

if($total_person>$result2_max['max_personas']){
  $validacion1 = FALSE;
echo "<script type='text/javascript'>";
echo "setTimeout(function(){ window.history.back(-1)}, 2000);";
echo "alert('El número máximo de personas debe ser: ".$result2_max['max_personas']."');";
echo "</script>";
}else{
  $validacion1 = TRUE;
}

////////
if(isset($_POST['submit']) && $validacion==TRUE && $validacion1==TRUE):
  $nombre=$_POST['nombre'];
  $email=$_POST['email'];
  $cedula=$_POST['cedula'];
  $phone=$_POST['phone'];
  $fecha_inicio=$_POST['fecha_inicio'];
  $fecha_fin=$_POST['fecha_fin'];
  $adulto=$_POST['adulto'];
  $nino=$_POST['nino'];
  $id_anuncio=$_POST['id_anuncio'];
  $precio_dias=$_POST['precio_dia'];
  $n_dias=$_POST['n_dias'];

  $total=number_format($precio_dias, 2)*number_format($n_dias);
  
  ?>


<?php
    //Previene ataques 
    try{

    $stmt = $conn->prepare('INSERT INTO reserva (id_anuncio, nombre, cedula, telefono, correo, fecha_inicio, fecha_fin, n_adultos,n_ninos,total_pago) VALUES(?,?,?,?,?,?,?,?,?,?)');
    $stmt-> bind_param('ssssssssss',$id_anuncio,$nombre, $cedula, $phone, $email, $fecha_inicio, $fecha_fin,$adulto,$nino,$total);//manejar los datos, formato de los datos cada s es el formato de los datos
    $stmt->execute();
    $stmt->close();
    $conn->close();
    $total_pago=strval($total);
    
    header("Location:paypal.php?total=".$total_pago."");
   
    echo "alert('".$result2_max['max_personas']."');";

    

}catch(\Exception $e){
    echo $e->getMessage();
}
  endif;
  ?>