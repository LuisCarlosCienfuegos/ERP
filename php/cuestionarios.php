<?php 

	require_once("conexion.php");
		class Cuestionarios extends Conexion{

			public function alta($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10){

				$this->sentencia ="INSERT INTO cuestionarios VALUES (NULL,'$R1','$R2','$R3','$R4','$R5','$R6','$R7','$R8','$R9','$R10')";
				$this->ejecutar_sentencia();
				
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM cuestionarios WHERE id_cuestionario=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM cuestionarios";
				return $this->obtener_sentencia();
			}
			public function buscar($id){
				$this->sentencia= "SELECT * FROM cuestionarios WHERE id_cuestionario=$id";
				return $this->obtener_sentencia();
			}
			public function modificaciones($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10){
				$this->sentencia = "UPDATE cuestionarios SET R1='$R1',R2='$R2',R3='$R3',R4='$R4',R5='$R5',R6='$R6',R7='$R7',R8='$R8', R9='$R9',R10='$R10' where id_cuestionario='$id'";
				$this->ejecutar_sentencia();	




			}

		}



 ?>