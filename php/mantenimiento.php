<?php 
require_once("conexion.php");
		class Mantenimiento extends Conexion{

			public function alta($id_recursos,$id_empleado,$fecha,$razon){

				$this->sentencia ="INSERT INTO mantenimiento VALUES (NULL,'$id_recursos','$id_empleado','$fecha','$razon')";
				$this->ejecutar_sentencia();
				
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM mantenimiento WHERE id_mantenimiento=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM mantenimiento";
				return $this->obtener_sentencia();

		
			}
			
				public function modificaciones($id_empleado,$fecha,$razon,$id_mantenimiento){
				$this->sentencia = "UPDATE mantenimiento SET id_recurso='$id_recurso',id_empleado='$id_empleado',fecha='$fecha',razon='$razon' where id_mantenimiento='$id'";
				$this->ejecutar_sentencia();

			}

		}



	




 ?>