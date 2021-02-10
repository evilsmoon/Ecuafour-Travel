<?php
header("Content-Type: text/html;charset=utf-8");
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['administracion'])) 
{
    
    header('Location: login_admin.php'); 
    
    exit();
}

?>

<?php include_once 'includes/templates/header.php'; ?>
<script>
$(function() {
  'use strict';

  $('#sesion').attr("href", "logout.php");
  $('#sesion').text("Cerrar Sesión");
  $('#sesion').attr("data-toggle", "");

});
</script>

<?php
//incluye la clase Libro y CrudLibro
require_once('crud_empresa.php');
require_once('empresa.php');
$crud= new CrudEmpresa();
$empresa= new Empresa();
//obtiene todos los libros con el método mostrar de la clase crud
$listaEmpresa=$crud->mostrar();
?>

<section id="specials" class="specials mt-5 table-responsive">
  <div class="col-lg-12 mt-5">
    <div class="table-responsive">

      <table class="table table-bordered" style="color: white ;">
        <thead>
          <td>Logo</td>
          <td>Lema</td>
          <td>Misión</td>
          <td>Visión</td>
          <td>Fecha Modificación</td>
          <td>Actualizar</td>
          <td>Eliminar</td>
        </thead>
        <tbody>
          <?php foreach ($listaEmpresa as $empresa) {?>
          <tr>
            <td><?php echo $empresa->getLogo() ?></td>
            <td><?php 
						$empresa_cod = utf8_encode($empresa->getLema());
						echo $empresa_cod;?></td>
            <td><?php 
						$empresa_cod = utf8_encode($empresa->getMision());
						echo $empresa_cod;?> </td>
            <td><?php 
						$empresa_cod = utf8_encode($empresa->getVision());
						echo $empresa_cod;?> </td>
            <td><?php echo $empresa->getFecha()?> </td>
            <td><a href="actualizar_empresa.php?id=<?php echo $empresa->getId()?>&accion=a">Actualizar</a> </td>
            <td><a href="administrar_empresa.php?id=<?php echo $empresa->getId()?>&accion=e">Eliminar</a> </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
    <a href="admin.php">Volver</a>
  </div>
</section>
<?php include_once 'includes/templates/footer.php'; ?>