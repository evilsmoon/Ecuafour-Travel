<?php
header("Content-Type: text/html;charset=utf-8");
try {
    $pdo = new PDO('mysql:host=localhost;dbname=proyecto_ecuafourtour', 'root', '');
    //echo 'conectado';
   
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>