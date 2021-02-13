
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

<section id="specials" class="specials book-a-table mt-5">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-5">
                <h2>Bienvenido</h2>
                <p>Administrador</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#tab-1">Ingresar Anuncio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mostrar.php">Ver Anuncios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3">Ingresar Datos Empresa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mostrar_empresa.php">Ver Información Empresa</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Ingresar Anuncio</h3>
                    <form action='administrar_anuncio.php' method='post'>
                    <div class="form-row">     
                            <div class="col-lg-4 col-md-6 form-group">
                            Nombre Anuncio:
		                    <input type='text' name='nombre' class="form-control">
                            </div>                            
                            <div class="col-lg-4 col-md-6 form-group">
                            Imagen Principal para el Anuncio
                            <input type='text' name='img_principal' class="form-control" >
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
	                        N° máximo de Personas:
			                <input type='number' name='max_personas' class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Dormitorios:
			                <input type='number' name='dormitorio' class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Baños:
			                <input type='number' name='wc' class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Cocinas:
			                <input type='number' name='cocina' class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Piscinas:
			                <input type='number' name='piscina' class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Wi-Fi:
                            <select id="wifi" name="wifi" class="form-control">
                            <option value="0">No</option>      
                            <option value="1">Si</option>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            N° Parqueaderos:
			                <input type='number' name='parqueadero' class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Tv-Cable:
                            <select id="tvcable" name="tvcable" class="form-control">
                            <option value="0">No</option>      
                            <option value="1">Si</option>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Hidromasaje:
                            <select id="hidromasaje" name="hidromasaje" class="form-control">
                            <option value="0">No</option>      
                            <option value="1">Si</option>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Area Social:
                            <select id="areasocial" name="areasocial" class="form-control">
                            <option value="0">No</option>      
                            <option value="1">Si</option>
                            </select>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            Precio día:
                            <input type='number' name='precio_dia' class="form-control">
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                            <label for="comment">Descripción:</label>
                            <textarea class="form-control" rows="5" id="comment" name="descripcion"></textarea>
                            </div>
                            <?php $hoy=  date("Y-m-d");?>
                            
                            <input type='hidden' name='fecha' value='<?php echo $hoy?>'>

	                    	<input type='hidden' name='insertar' value='insertar'>
                     </div>
                     <div class="text-center">
                            <button class="btn btn-success" type="submit">Guardar</button>
                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                            <div class="col-lg-12">
               
                             <h3>Datos de la Empresa</h3>
                    <form action='administrar_empresa.php' method='post'>
                    <div class="form-row">     
                            <div class="col-md-6 form-group">
                            Misión:
                            <textarea class="form-control" rows="5" id="comment" name="mision"></textarea>
                            </div>                            
                            <div class="col-md-6 form-group">
                            Visión:
                            <textarea class="form-control" rows="5" id="comment" name="vision"></textarea>
                            </div>
                            <div class="col-md-6 form-group">
	                        Logo:
			                <input type='text' name='logo' class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                            Lema:
			                <input type='text' name='lema' class="form-control">
                            </div>
                            <?php $hoy=  date("Y-m-d");?>
                            
                            <input type='hidden' name='fecha' value='<?php echo $hoy?>'>

	                    	<input type='hidden' name='insertar' value='insertar'>
                     </div>
                     <div class="text-center">
                            <button  class="btn btn-success"  type="submit">Guardar</button>
                            </div>
                                    </form>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>