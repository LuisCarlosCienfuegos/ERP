<?php 

require_once("conexion.php");
		class Materia_compra extends Conexion{

			public function alta($id_Materia,$cantidad){

				$this->sentencia ="INSERT INTO materia_compra VALUES (NULL,'$id_Materia','$cantidad')";
				$this->ejecutar_sentencia();
				
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM materia_compra WHERE id_Compra=$id";
				$this->ejecutar_sentencia();
			}	

	        public function consulta(){
				$this->sentencia="SELECT * FROM materia_compra";
				return $this->obtener_sentencia();
			}
			public function buscar($id){
				$this->sentencia= "SELECT * FROM materi_compra WHERE id_Compra=$id";
				return $this->obtener_sentencia();
				}
			public function modificaciones($id_Materia,$cantidad,$id_Compra){ 
				$this->sentencia = "UPDATE  SET id_Materia='$id_Materia',cantidad='$cantidad' 
				where id_Compra='$id'";
				$this->ejecutar_sentencia();



    }
}



 ?>