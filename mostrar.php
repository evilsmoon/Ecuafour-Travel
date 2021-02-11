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
require_once('crud_anuncio.php');
require_once('anuncio.php');
$crud=new CrudAnuncio();
$anuncio= new Anuncio();
//obtiene todos los libros con el método mostrar de la clase crud
$listaAnuncios=$crud->mostrar();
?>

<section id="specials" class="specials mt-5 table-responsive">
  <div class="col-lg-12 mt-5">
    <div class="container table-responsive ">

      <table class="table " style="color: white ;">
        <thead>
          <td>Nombre</td>
          <td>Descripción</td>
          <td>Imagen Principal</td>
          <td>Máximo de Personas</td>
          <td>Dormitorio</td>
          <td>Baño</td>
          <td>Cocina</td>
          <td>Piscina</td>
          <td>Wi-Fi</td>
          <td>Parqueadero</td>
          <td>Tv-Cable</td>
          <td>Hidromasaje</td>
          <td>Area Social</td>
          <td>Precio día</td>
          <td>Fecha</td>
          <td>Actualizar</td>
          <td>Eliminar</td>
        </thead>
        <tbody>
          <?php foreach ($listaAnuncios as $anuncio) {?>
          <tr>
            <td><?php 
				$anuncio_cod = utf8_encode($anuncio->getNombre() );
				echo $anuncio_cod;?></td>
            <td><?php 
				$anuncio_cod = utf8_encode($anuncio->getDescripcion() );
				echo $anuncio_cod; ?></td>
            <td><?php echo $anuncio->getImgPrincipal()?> </td>
            <td><?php echo $anuncio->getMaxPersonas()?> </td>
            <td><?php echo $anuncio->getDormitorio()?> </td>
            <td><?php echo $anuncio->getWc()?> </td>
            <td><?php echo $anuncio->getCocina()?> </td>
            <td><?php echo $anuncio->getPiscina()?> </td>
            <td><?php echo $anuncio->getWifi()?> </td>
            <td><?php echo $anuncio->getParqueadero()?> </td>
            <td><?php echo $anuncio->getTvcable()?> </td>
            <td><?php echo $anuncio->getHidromasaje()?> </td>
            <td><?php echo $anuncio->getAreasocial()?> </td>
            <td><?php echo $anuncio->getPreciodia()?> </td>
            <td><?php echo $anuncio->getFecha()?> </td>
            <td><a href="actualizar.php?id=<?php echo $anuncio->getId()?>&accion=a">Actualizar</a> </td>
            <td><a href="administrar_anuncio.php?id=<?php echo $anuncio->getId()?>&accion=e">Eliminar</a> </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
    <a href="admin.php">Volver</a>
  </div>
</section>
<?php include_once 'includes/templates/footer.php'; ?>