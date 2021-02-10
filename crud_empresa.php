<?php

// incluye la clase Db
require_once('conexion.php');
 
	class CrudEmpresa{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo empresa
		public function insertar($empresa){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO empresa values(NULL,:logo,:lema,:mision,:vision,:fecha_modificacion)');
			$insert->bindValue('logo',$empresa->getLogo());
			$insert->bindValue('lema',$empresa->getLema());
			$insert->bindValue('mision',$empresa->getMision());
			$insert->bindValue('vision',$empresa->getVision());
			$insert->bindValue('fecha_modificacion',$empresa->getFecha());
			$insert->execute();
 
		}
 
		// método para mostrar todas los empresa
		public function mostrar(){
			$db=Db::conectar();
			$listaEmpresa=[];
			$select=$db->query('SELECT * FROM empresa');
 
			foreach($select->fetchAll() as $empresa){
				$myEmpresa= new Empresa();
				$myEmpresa->setId($empresa['id_empresa']);
				$myEmpresa->setLogo($empresa['logo']);
				$myEmpresa->setLema($empresa['lema']);
				$myEmpresa->setMision($empresa['mision']);
				$myEmpresa->setVision($empresa['vision']);
				$myEmpresa->setFecha($empresa['fecha_modificacion']);
				$listaEmpresa[]=$myEmpresa;
			}
			return $listaEmpresa;
		}
 
		// método para eliminar un registro en empresa, recibe como parámetro el id de la empresa
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM empresa WHERE id_empresa=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
 
		// método para buscar un registro empresa, recibe como parámetro el id de la empresa
		public function obtenerEmpresa($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM empresa WHERE id_empresa=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$empresa=$select->fetch();
			$myEmpresa= new Empresa();
			$myEmpresa->setId($empresa['id_empresa']);
			$myEmpresa->setLogo($empresa['logo']);
			$myEmpresa->setLema($empresa['lema']);
			$myEmpresa->setMision($empresa['mision']);
			$myEmpresa->setVision($empresa['vision']);
			$myEmpresa->setFecha($empresa['fecha_modificacion']);
			return $myEmpresa;
		}
 
		// método para actualizar un registro de la empresa
		public function actualizar($empresa){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE empresa SET logo=:logo, lema=:lema,mision=:mision,vision=:vision,fecha_modificacion=:fecha_modificacion  WHERE id_empresa=:id');
			$actualizar->bindValue('id',$empresa->getId());
			$actualizar->bindValue('logo',$empresa->getLogo());
			$actualizar->bindValue('lema',$empresa->getLema());
			$actualizar->bindValue('mision',$empresa->getMision());
			$actualizar->bindValue('vision',$empresa->getVision());
			$actualizar->bindValue('fecha_modificacion',$empresa->getFecha());
			$actualizar->execute();
		}
	}
?>