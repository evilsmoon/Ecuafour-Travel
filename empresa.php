<?php
	class Empresa{
		private $id;
		private $logo;
		private $lema;
		private $mision;
		private $vision;
		private $fecha;

 
		function __construct(){}


		///Logo
		public function getLogo(){
		return $this->logo;
		}
 
		public function setLogo($logo){
			$this->logo = $logo;
		}
 
			///Lema
		public function getLema(){
			return $this->lema;
		}
    
		public function setLema($lema){
			$this->lema = $lema;
		}

	///Id 
		public function getId(){
			return $this->id;
		}
 
		public function setId($id){
			$this->id = $id;
		}

	///Mision
		public function getMision(){
			return $this->mision;
		}
 
		public function setMision($mision){
			$this->mision = $mision;
		}

	///Vision 
	public function getVision(){
		return $this->vision;
	}

	public function setVision($vision){
		$this->vision = $vision;
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