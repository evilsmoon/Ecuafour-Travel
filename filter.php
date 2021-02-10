<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect('us-cdbr-east-03.cleardb.com','b447ac7ccdeb89', 'ee57c5c2', 'heroku_6cf9173bed03065');  
      $output = '';  
      $query = "  
           SELECT * FROM reserva
           WHERE fecha_inicio BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND fecha_fin BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'"; 
           
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                <th width="5%">ID</th>
                <th width="12%">Inicio</th>
                <th width="15%">Fin</th> 
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["id_fecha"] .'</td>   
                          <td>$ '. $row["inicio"] .'</td>  
                          <td>'. $row["fin"] .'</td> 
                          
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>