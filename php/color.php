<?php 
require_once("conexion.php");
		class color extends Conexion{

			public function alta($codigo){

				$this->sentencia ="INSERT INTO color VALUES (NULL,'$codigo')";
				$this->ejecutar_sentencia();
				
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM color WHERE id=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM color";
				return $this->obtener_sentencia();
				
			}
			public function modificaciones($id_compra,$id_proveedor,$fecha,$total){
				$this->sentencia = "UPDATE color SET codigo='$codigo' where id='$id'";
				$this->ejecutar_sentencia();

		}

}

 ?>