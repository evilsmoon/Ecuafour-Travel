<?php
header("Content-Type: text/html;charset=utf-8");
try {
    $pdo = new PDO('mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_6cf9173bed03065', 'b447ac7ccdeb89', 'ee57c5c2');
    //echo 'conectado';
   
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>   