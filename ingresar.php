<?php

$usuario=$_POST['user'];
$clave=$_POST['clave'];
      try{
                        
        require_once('includes/funciones/db_connection.php');
        $sql="SELECT * FROM administrador WHERE usuario='".$usuario."'";
        $resultados=$conn->query($sql);
                        

     }catch(\Exception $e){
         echo $e->getMessage();
    }
        $usuarios_base=array();
        while ($usuarios=$resultados->fetch_assoc()) {
         $usuarios_base[]=$usuarios;
     }
                                  
    ?>
<?php
    if (count($usuarios_base)==0) {
        echo'<script type="text/javascript">
        alert("CREDENCIALES INCORRECTAS");
        window.location.href="index.php";
        </script>';

    }
    foreach ($usuarios_base as $admin){
        
        
        if ($usuario==$admin['usuario'] && $clave==$admin['clave']  ) {
            session_start();
            $_SESSION["administracion"]= $usuario;
            header("Location: admin.php"); 

        }else{
            echo'<script type="text/javascript">
        alert("CREDENCIALES INCORRECTAS");
        window.location.href="index.php";
        </script>';

        }


    }
        
    ?>