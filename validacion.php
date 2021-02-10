<?php
  require_once('includes/funciones/db_connection.php');?>
<?php 

    if(isset($_POST['submit'])):
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $lugar=$_POST['lugar'];
        $extras=$_POST['extras'];
        $servicios=$_POST['servicios'];
        $fecha_registro=date('Y-m-d');
       
        include_once 'includes/funciones/funciones.php';
       $preferencias=datos_json($extras, $servicios);
       $fecha_registro=date('Y-m-d');
        try{
           
          
            $stmt= $conn->prepare( 'INSERT INTO cotizaciones(nombre, correo, lugar, preferencias, fecha_registro) VALUES (?,?,?,?,?)');
            $stmt->bind_param('sssss',$nombre, $correo, $lugar,$preferencias, $fecha_registro);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header('Location:index.php?exitoso=1');
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    endif;  
?>