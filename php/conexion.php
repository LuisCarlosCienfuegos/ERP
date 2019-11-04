<?php 
class Conexion{
  			private $host="localhost";
  			private $usuario="root";
  			private $password="";
  			private $base="erpp";
  			protected $sentencia="";
  			private $conexion;


  			private function abrir_conexion(){
  				 $this->conexion = new mysqli($this->host,$this->usuario,$this->password,$this->base);
  			
  			}
  			
  			private function cerrar_conexion(){
  			
  			 	$this->conexion->close();

  			 
  			 }
  			 //Altas, Bajas y Modificaciones 
  			 public function ejecutar_sentencia(){
  				$this->abrir_conexion();
  				$this->conexion->query($this->sentencia);
  				$this->cerrar_conexion();

 			
  			 }
  			 //Consultas
  			  public function obtener_sentencia(){
  			  	$this->abrir_conexion();
  				$resultado=$this->conexion->query($this->sentencia);
  				return $resultado;
  			 }


}



 ?>