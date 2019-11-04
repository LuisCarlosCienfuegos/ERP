<?php 

require_once("conexion.php");
		class Presencia extends Conexion{

			public function alta($id_empleado,$fecha,$hora_entrada,$hora_salida){

				$this->sentencia ="INSERT INTO presencia VALUES (NULL,'$id_empleado','$fecha','$hora_entrada','$hora_salida')";
				$this->ejecutar_sentencia();
				echo $this->sentencia;
			}
		
      public function baja($id){
        $this->sentencia = "DELETE FROM presencia WHERE id_presencia=$id";
        $this->ejecutar_sentencia();

      }
      public function consulta(){
        $this->sentencia="SELECT * FROM presencia";
        return $this->obtener_sentencia();

      }
      public function buscar($id){
        $this->sentencia= "SELECT * FROM presencia WHERE id_presencia=$id";
        return $this->obtener_sentencia();
      }
      public function modificaciones($id_empleado,$fecha,$hora_entrada,$hora_salida,$id_presencia){
        $this->sentencia = "UPDATE nomina SET id_empleado='$id_empleado',fecha='$fecha', hora_entrada='$hora_entrada',hora_salida='$hora_salida' where id_presencia='$id'";
        $this->ejecutar_sentencia();




        
      }

    }








 ?>