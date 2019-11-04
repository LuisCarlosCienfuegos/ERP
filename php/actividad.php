<?php 

require_once("conexion.php");
		class actividad extends Conexion{

			public function alta($id_usuario,$fecha,$movimiento){

				$this->sentencia ="INSERT INTO actividad VALUES (NULL,'$id_usuario','$fecha','$movimiento')";
				$this->ejecutar_sentencia();

			}
			public function baja($id){
				$this->sentencia = "DELETE FROM actividad WHERE id_actividad=$id";
				$this->ejecutar_sentencia();
			}	

	        public function consulta(){
				$this->sentencia="SELECT * FROM actividad";
				return $this->obtener_sentencia();
            }
			public function buscar($id){
				$this->sentencia= "SELECT * FROM actividad WHERE id_actividad=$id";
				return $this->obtener_sentencia();	
			}
			public function modificaciones($id_usuario,$fecha,$movimiento,$id_actividad){
				$this->sentencia= "UPDATE actividad SET id_usuario='$id_usuario', fecha='$fecha', 
				movimiento='$movimiento' where id_actividad='$id'";
				$this->ejecutar_sentencia();


		}


}


 ?>