<?php
	class Anuncio{
		private $id;
		private $nombre;
		private $descripcion;
		private $img_principal;
		private $max_personas;
		private $dormitorio;
		private $wc;
		private $cocina;
		private $piscina;
		private $wifi;
		private $parqueadero;
		private $tvcable;
		private $hidromasaje;
		private $area_social;
		private $precio_dia;
		private $fecha;

 
		function __construct(){}


		///Nombre del anuncio 
		public function getNombre(){
		return $this->nombre;
		}
 
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
 
			///Descripcion del anuncio
		public function getDescripcion(){
			return $this->descripcion;
		}
 
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}

	///Id del anuncio 
		public function getId(){
			return $this->id;
		}
 
		public function setId($id){
			$this->id = $id;
		}

	///Imagen principal del anuncio 
		public function getImgPrincipal(){
			return $this->img_principal;
		}
 
		public function setImgPrincipal($img_principal){
			$this->img_principal = $img_principal;
		}

	///Imagen maximo de personas 
	public function getMaxPersonas(){
		return $this->max_personas;
	}

	public function setMaxPersonas($max_personas){
		$this->max_personas = $max_personas;
	}

		///Dormitorio 
		public function getDormitorio(){
			return $this->dormitorio;
		}
	
		public function setDormitorio($dormitorio){
			$this->dormitorio = $dormitorio;
		}

			///Baño 
	public function getWc(){
		return $this->wc;
	}

	public function setWc($wc){
		$this->wc = $wc;
	}

		///Cocina 
		public function getCocina(){
			return $this->cocina;
		}
	
		public function setCocina($cocina){
			$this->cocina = $cocina;
		}
			///Piscina
	public function getPiscina(){
		return $this->piscina;
	}

	public function setPiscina($piscina){
		$this->piscina = $piscina;
	}
		///Wifi
		public function getWifi(){
			return $this->wifi;
		}
	
		public function setWifi($wifi){
			$this->wifi = $wifi;
		}

			///Parqueadero
	public function getParqueadero(){
		return $this->parqueadero;
	}

	public function setParqueadero($parqueadero){
		$this->parqueadero = $parqueadero;
	}

		///Tvcable 
		public function getTvcable(){
			return $this->tvcable;
		}
	
		public function setTvcable($tvcable){
			$this->tvcable = $tvcable;
		}
			///Hidromasaje 
	public function getHidromasaje(){
		return $this->hidromasaje;
	}

	public function setHidromasaje($hidromasaje){
		$this->hidromasaje = $hidromasaje;
	}

		///Areasocial 
		public function getAreasocial(){
			return $this->area_social;
		}
	
		public function setAreasocial($area_social){
			$this->area_social = $area_social;
		}

			//Preciodia
	public function getPreciodia(){
		return $this->precio_dia;
	}

	public function setPreciodia($precio_dia){
		$this->precio_dia = $precio_dia;
	}
		///Fecha
		public function getFecha(){
			return $this->fecha;
		}
	
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}

	}

		
	
		
?>