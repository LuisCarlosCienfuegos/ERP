<?php 

require_once("conexion.php");
		class Clientes extends Conexion{

			public function alta($nombre,$razonsocial,$correo,$direccion,$telefono){

				$this->sentencia ="INSERT INTO clientes VALUES (NULL,'$nombre','$razonsocial','$correo','$direccion','$telefono')";
				$this->ejecutar_sentencia();
				}
		public function baja($id){
			   $this->sentencia = "DELETE FROM clientes WHERE id=$id";
			   $this->ejecutar_sentencia();
				}
		
				public function consulta(){
				$this->sentencia="SELECT * FROM clientes";
				return $this->obtener_sentencia();
				}

			public function buscar($id){
				$this->sentencia= "SELECT * FROM clientes WHERE id=$id";
				return $this->obtener_sentencia();
				}
         public function modificaciones($nombre,$razonsocial,$correo,$direccion,$telefono,$id){
				$this->sentencia = "UPDATE clientes SET nombre='$nombre',razonsocial='$razonsocial',correo='$correo',direccion='$direccion',telefono='$telefono' where id='$id'";
				//echo $this->sentencia;
				$this->ejecutar_sentencia();
				}
		}

 ?>