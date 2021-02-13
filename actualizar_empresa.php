<?php

//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if (!isset($_SESSION['administracion'])) {

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

$crud = new CrudEmpresa();
$empresa = new Empresa();
//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
$empresa = $crud->obtenerEmpresa($_GET['id']);
?>

<section id="specials" class=" container specials book-a-table mt-5">
    <div class="col-lg-12 mt-5">
        <h3>Actualizar Datos Empresa</h3>

        <form action='administrar_empresa.php' method='post'>
            <div class="form-row">
                <input type='hidden' name='id' value='<?php echo $empresa->getId() ?>'>
                <div class="col-md-6 form-group">

                    Misión:
                    <textarea class="form-control" rows="5" id="comment" name="mision"><?php echo $empresa->getMision() ?></textarea>
                </div>
                <div class="col-md-6 form-group">
                    Visión:
                    <textarea class="form-control" rows="5" id="comment" name="vision"><?php echo $empresa->getVision() ?></textarea>
                </div>
                <div class="col-md-6 form-group">
                    Logo:
                    <input type='text' name='logo' class="form-control" value='<?php echo $empresa->getLogo() ?>'>
                </div>
                <div class="col-md-6 form-group">
                    Lema:
                    <input type='text' name='lema' class="form-control" value='<?php echo $empresa->getLema() ?>'>
                </div>
                <?php $hoy =  date("Y-m-d"); ?>

                <input type='hidden' name='fecha' value='<?php echo $hoy ?>'>

                <input type='hidden' name='actualizar' value'actualizar'>
            </div>
            <div class="text-center">
                <button class="btn btn-success" type="submit">Guardar</button>
                <br>
                <br>
                <a href="admin.php">Volver</a>
            </div>
        </form>

    </div>
    </div>
</section>
<?php include_once 'includes/templates/footer.php'; ?>