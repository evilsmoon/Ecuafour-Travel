<?php
    $conn = new mysqli('us-cdbr-east-03.cleardb.com','b447ac7ccdeb89', 'ee57c5c2', 'heroku_6cf9173bed03065'); //direccion ip, passw, bd
    if($conn->connect_error){
        echo $error->$conn->connect_error;
    }


    
?>

