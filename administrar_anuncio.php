<?php
//incluye la clase Anuncio y CrudAnuncio
require_once('crud_anuncio.php');
require_once('anuncio.php');
 
$crud= new CrudAnuncio();
$anuncio= new Anuncio();
 
	// si el elemento insertar no viene nulo llama al crud e inserta un anuncio
	if (isset($_POST['insertar'])) {
		$anuncio->setNombre($_POST['nombre']);
		$anuncio->setDescripcion($_POST['descripcion']);
		$anuncio->setImgPrincipal($_POST['img_principal']);
		$anuncio->setMaxPersonas($_POST['max_personas']);
		$anuncio->setDormitorio($_POST['dormitorio']);
		$anuncio->setWc($_POST['wc']);
		$anuncio->setCocina($_POST['cocina']);
		$anuncio->setPiscina($_POST['piscina']);
		$anuncio->setWifi($_POST['wifi']);
		$anuncio->setParqueadero($_POST['parqueadero']);
		$anuncio->setTvcable($_POST['tvcable']);
		$anuncio->setHidromasaje($_POST['hidromasaje']);
		$anuncio->setAreasocial($_POST['areasocial']);
		$anuncio->setPreciodia($_POST['precio_dia']);
		$anuncio->setFecha($_POST['fecha']);

		//llama a la función insertar definida en el crud
		$crud->insertar($anuncio);
		header('Location: mostrar.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el anuncio
	}elseif(isset($_POST['actualizar'])){
		$anuncio->setId($_POST['id']);
		$anuncio->setNombre($_POST['nombre']);
		$anuncio->setDescripcion($_POST['descripcion']);
		$anuncio->setImgPrincipal($_POST['img_principal']);
		$anuncio->setMaxPersonas($_POST['max_personas']);
		$anuncio->setDormitorio($_POST['dormitorio']);
		$anuncio->setWc($_POST['wc']);
		$anuncio->setCocina($_POST['cocina']);
		$anuncio->setPiscina($_POST['piscina']);
		$anuncio->setWifi($_POST['wifi']);
		$anuncio->setParqueadero($_POST['parqueadero']);
		$anuncio->setTvcable($_POST['tvcable']);
		$anuncio->setHidromasaje($_POST['hidromasaje']);
		$anuncio->setAreasocial($_POST['areasocial']);
		$anuncio->setPreciodia($_POST['precio_dia']);
		$anuncio->setFecha($_POST['fecha']);
		
		$crud->actualizar($anuncio);
		header('Location: admin.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un anuncio
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		header('Location: admin.php');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
?>