<?php
 $usuario=$_POST['usuario'];
 $mensaje=$_POST['comentario'];
 $anuncio=$_POST['lugar'];

 $conn = new mysqli('localhost','root', '', 'proyecto_ecuafourtour'); //direccion ip, passw, bd
 if($conn->connect_error){
     echo $error->$conn->connect_error;
 }

 try{
    $stmt=$conn->prepare('INSERT INTO  blog (id_anuncio,usuario,comentario) VALUES (?,?,?)');
    $stmt->bind_param('sss',$anuncio,$usuario,$mensaje);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo '<script type="text/javascript">
    alert("Gracias por tu comentario..!! Nos ayudas a mejorar.");
    window.location.href="index.php";
    </script>';    

}catch(\Exception $e){
    echo $e->getMessage();
}

?>