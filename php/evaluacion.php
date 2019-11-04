<?php 
require_once("conexion.php");
		class Evaluacion extends Conexion{

			public function alta($id_empleado,$R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$id_cuestionario){

				$this->sentencia ="INSERT INTO evaluacion VALUES (NULL,'$id_empleado','$R1','$R2','$R3','$R4','$R5','$R6','$R7','$R8','$R9','$R10','$id_cuestionario')";
				$this->ejecutar_sentencia();
				
  
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM evaluacion WHERE id_evaluacion=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM evaluacion";
				return $this->obtener_sentencia();

			}
			public function buscar($id){
				$this->sentencia= "SELECT * FROM evaluacion WHERE id_evaluacion=$id";
				return $this->obtener_sentencia();
			}
			public function modificaciones($id_empleado,$R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$id_cuestionario){
				$this->sentencia = "UPDATE evaluacion SET R1='$R1',R2='$R2',R3='$R3',R4='$R4',R5='$R5', R6='$R6',R7='$R7',R8='$R8',R9='$R9',R10='$R10',id_cuestionario='$id_cuestionario' where id_evaluacion='$id'";
				$this->ejecutar_sentencia();




				
			}

		}


 ?>