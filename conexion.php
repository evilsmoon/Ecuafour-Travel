<?php
	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion= new PDO('mysql:host=us-cdbr-east-03.cleardb.comt;dbname=heroku_6cf9173bed03065','b447ac7ccdeb89','ee57c5c2',$pdo_options);
			return self::$conexion;
		}		
	} 
?>

