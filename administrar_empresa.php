<?php
//incluye la clase Empresa y CrudEmpresa
require_once('crud_empresa.php');
require_once('empresa.php');
 
$crud= new CrudEmpresa();
$empresa= new Empresa();
 
	// si el elemento insertar no viene nulo llama al crud e inserta un anuncio
	if (isset($_POST['insertar'])) {
		$empresa->setLogo($_POST['logo']);
		$empresa->setLema($_POST['lema']);
		$empresa->setMision($_POST['mision']);
		$empresa->setVision($_POST['vision']);
		$empresa->setFecha($_POST['fecha']);

		//llama a la función insertar definida en el crud
		$crud->insertar($empresa);
		header('Location: mostrar_empresa.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza empresa
	}elseif(isset($_POST['actualizar'])){
        $empresa->setId($_POST['id']);
		$empresa->setLogo($_POST['logo']);
		$empresa->setLema($_POST['lema']);
		$empresa->setMision($_POST['mision']);
		$empresa->setVision($_POST['vision']);
		$empresa->setFecha($_POST['fecha']);
		
		$crud->actualizar($empresa);
		header('Location: admin.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un registro de empresa
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		header('Location: admin.php');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar_empresa.php');
	}
?>