<?php
    $conn = new mysqli('localhost','root', '', 'proyecto_ecuafourtour'); //direccion ip, passw, bd
    if($conn->connect_error){
        echo $error->$conn->connect_error;
    }


    
?>