<?php

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
	$crud= new CrudAnuncio();
	$anuncio=new Anuncio();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$anuncio=$crud->obtenerAnuncio($_GET['id']);
?>

<section id="specials" class="specials book-a-table mt-5">
<div class="col-lg-12 mt-5">
                                    <h3>Actualizar Anuncio</h3>
				
                    <form action='administrar_anuncio.php' method='post'>
                    <div class="form-row">     
					<input type='hidden' name='id' value='<?php echo $anuncio->getId()?>'>
                            <div class="col-lg-4 col-md-6 form-group">
                            Nombre Anuncio:
		                    <input type='text' name='nombre' class="form-control" value='<?php echo $anuncio->getNombre()?>'>
                            </div>                            
                            <div class="col-lg-4 col-md-6 form-group">
                            Imagen Principal para el Anuncio
                            <input type='text' name='img_principal' class="form-control" value='<?php echo $anuncio->getImgPrincipal()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
	                        N° máximo de Personas:
			                <input type='number' name='max_personas' class="form-control" value='<?php echo $anuncio->getMaxPersonas()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Dormitorios:
			                <input type='number' name='dormitorio' class="form-control" value='<?php echo $anuncio->getDormitorio()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Baños:
			                <input type='number' name='wc' class="form-control" value='<?php echo $anuncio->getWc()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Cocinas:
			                <input type='number' name='cocina' class="form-control" value='<?php echo $anuncio->getCocina()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Piscinas:
			                <input type='number' name='piscina' class="form-control" value='<?php echo $anuncio->getPiscina()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Wi-Fi:
                            <select id="wifi" name="wifi" class="form-control">
                            <?php if ($anuncio->getWifi()==1) {
								echo "<option value='1'>Si</option>";
								echo "<option value='0'>No</option>";
							}else{
								echo "<option value='0'>No</option>";
								echo "<option value='1'>Si</option>";
							} ?>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Parqueaderos:
			                <input type='number' name='parqueadero' class="form-control" value='<?php echo $anuncio->getParqueadero()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Tv-Cable:
                            <select id="tvcable" name="tvcable" class="form-control">
                            <?php if ($anuncio->getTvcable()==1) {
								echo "<option value='1'>Si</option>";
								echo "<option value='0'>No</option>";
							}else{
								echo "<option value='0'>No</option>";
								echo "<option value='1'>Si</option>";
							} ?>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Hidromasaje:
                            <select id="hidromasaje" name="hidromasaje" class="form-control">
                            <?php if ($anuncio->getHidromasaje()==1) {
								echo "<option value='1'>Si</option>";
								echo "<option value='0'>No</option>";
							}else{
								echo "<option value='0'>No</option>";
								echo "<option value='1'>Si</option>";
							} ?>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Area Social:
                            <select id="areasocial" name="areasocial" class="form-control">
							<?php if ($anuncio->getAreasocial()==1) {
								echo "<option value='1'>Si</option>";
								echo "<option value='0'>No</option>";
							}else{
								echo "<option value='0'>No</option>";
								echo "<option value='1'>Si</option>";
							} ?>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Precio día:
                            <input type='number' name='precio_dia' class="form-control" value='<?php echo $anuncio->getPreciodia()?>'>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            <label for="comment">Descripción:</label>
                            <textarea class="form-control" rows="5" id="comment" name="descripcion"><?php echo $anuncio->getDescripcion()?></textarea>
                            </div>
                            <?php $hoy=  date("Y-m-d");?>
                            
                            <input type='hidden' name='fecha' value='<?php echo $hoy?>'>

	                    	<input type='hidden' name='actualizar' value'actualizar'>
                     </div>
                     <div class="text-center">
					 <input type='submit' value='Guardar'>
							<br>
							<br>
							<a href="admin.php">Volver</a>
                            </div>
                                    </form>

                                </div>
					</div>
    </section>
								<?php include_once 'includes/templates/footer.php'; ?>
