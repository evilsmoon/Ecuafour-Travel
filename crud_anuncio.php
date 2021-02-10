<?php

// incluye la clase Db
require_once('conexion.php');
 
	class CrudAnuncio{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo anuncio
		public function insertar($anuncio){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO anuncio values(NULL,:nombre,:descripcion,:img_principal,:max_personas,:dormitorio,:wc,:cocina,:piscina,:wifi,:parqueadero,:tvcable,:hidromasaje,:area_social,:precio_dia,:fecha)');
			$insert->bindValue('nombre',$anuncio->getNombre());
			$insert->bindValue('descripcion',$anuncio->getDescripcion());
			$insert->bindValue('img_principal',$anuncio->getImgPrincipal());
			$insert->bindValue('max_personas',$anuncio->getMaxPersonas());
			$insert->bindValue('dormitorio',$anuncio->getDormitorio());
			$insert->bindValue('wc',$anuncio->getWc());
			$insert->bindValue('cocina',$anuncio->getCocina());
			$insert->bindValue('piscina',$anuncio->getPiscina());
			$insert->bindValue('wifi',$anuncio->getWifi());
			$insert->bindValue('parqueadero',$anuncio->getParqueadero());
			$insert->bindValue('tvcable',$anuncio->getTvcable());
			$insert->bindValue('hidromasaje',$anuncio->getHidromasaje());
			$insert->bindValue('area_social',$anuncio->getAreasocial());
			$insert->bindValue('precio_dia',$anuncio->getPreciodia());
			$insert->bindValue('fecha',$anuncio->getFecha());
			$insert->execute();
 
		}
 
		// método para mostrar todos los anuncios
		public function mostrar(){
			$db=Db::conectar();
			$listaAnuncio=[];
			$select=$db->query('SELECT * FROM anuncio');
 
			foreach($select->fetchAll() as $anuncio){
				$myAnuncio= new Anuncio();
				$myAnuncio->setId($anuncio['id_anuncio']);
				$myAnuncio->setNombre($anuncio['nombre_anuncio']);
				$myAnuncio->setDescripcion($anuncio['descripcion']);
				$myAnuncio->setImgPrincipal($anuncio['img_principal']);
				$myAnuncio->setMaxPersonas($anuncio['max_personas']);
				$myAnuncio->setDormitorio($anuncio['dormitorio']);
				$myAnuncio->setWc($anuncio['wc']);
				$myAnuncio->setCocina($anuncio['cocina']);
				$myAnuncio->setPiscina($anuncio['piscina']);
				$myAnuncio->setWifi($anuncio['wifi']);
				$myAnuncio->setParqueadero($anuncio['parqueadero']);
				$myAnuncio->setTvcable($anuncio['tvcable']);
				$myAnuncio->setHidromasaje($anuncio['hidromasaje']);
				$myAnuncio->setAreasocial($anuncio['area_social']);
				$myAnuncio->setPreciodia($anuncio['precio_dia']);
				$myAnuncio->setFecha($anuncio['fecha']);
				$listaAnuncio[]=$myAnuncio;
			}
			return $listaAnuncio;
		}
 
		// método para eliminar un libro, recibe como parámetro el id del anuncio
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM anuncio WHERE id_anuncio=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
 
		// método para buscar un libro, recibe como parámetro el id del anuncio
		public function obtenerAnuncio($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM anuncio WHERE id_anuncio=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$anuncio=$select->fetch();
			$myAnuncio= new Anuncio();
			$myAnuncio->setId($anuncio['id_anuncio']);
			$myAnuncio->setNombre($anuncio['nombre_anuncio']);
			$myAnuncio->setDescripcion($anuncio['descripcion']);
			$myAnuncio->setImgPrincipal($anuncio['img_principal']);
			$myAnuncio->setMaxPersonas($anuncio['max_personas']);
			$myAnuncio->setDormitorio($anuncio['dormitorio']);
			$myAnuncio->setWc($anuncio['wc']);
			$myAnuncio->setCocina($anuncio['cocina']);
			$myAnuncio->setPiscina($anuncio['piscina']);
			$myAnuncio->setWifi($anuncio['wifi']);
			$myAnuncio->setParqueadero($anuncio['parqueadero']);
			$myAnuncio->setTvcable($anuncio['tvcable']);
			$myAnuncio->setHidromasaje($anuncio['hidromasaje']);
			$myAnuncio->setAreasocial($anuncio['area_social']);
			$myAnuncio->setPreciodia($anuncio['precio_dia']);
			$myAnuncio->setFecha($anuncio['fecha']);
			return $myAnuncio;
		}
 
		// método para actualizar un anuncio, recibe como parámetro el anuncio
		public function actualizar($anuncio){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE anuncio SET nombre_anuncio=:nombre, descripcion=:descripcion,img_principal=:img_principal,max_personas=:max_personas,dormitorio=:dormitorio,wc=:wc,cocina=:cocina,piscina=:piscina,wifi=:wifi,parqueadero=:parqueadero,tvcable=:tvcable,hidromasaje=:hidromasaje,area_social=:area_social,precio_dia=:precio_dia,fecha=:fecha  WHERE id_anuncio=:id');
			$actualizar->bindValue('id',$anuncio->getId());
			$actualizar->bindValue('nombre',$anuncio->getNombre());
			$actualizar->bindValue('descripcion',$anuncio->getDescripcion());
			$actualizar->bindValue('img_principal',$anuncio->getImgPrincipal());
			$actualizar->bindValue('max_personas',$anuncio->getMaxPersonas());
			$actualizar->bindValue('dormitorio',$anuncio->getDormitorio());
			$actualizar->bindValue('wc',$anuncio->getWc());
			$actualizar->bindValue('cocina',$anuncio->getCocina());
			$actualizar->bindValue('piscina',$anuncio->getPiscina());
			$actualizar->bindValue('wifi',$anuncio->getWifi());
			$actualizar->bindValue('parqueadero',$anuncio->getParqueadero());
			$actualizar->bindValue('tvcable',$anuncio->getTvcable());
			$actualizar->bindValue('hidromasaje',$anuncio->getHidromasaje());
			$actualizar->bindValue('area_social',$anuncio->getAreasocial());
			$actualizar->bindValue('precio_dia',$anuncio->getPreciodia());
			$actualizar->bindValue('fecha',$anuncio->getFecha());
			$actualizar->execute();
		}
	}
?>