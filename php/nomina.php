<?php 
require_once("conexion.php");
    class Nomina extends Conexion{

      public function alta($id_empleado,$id_fecha,$monto){

        $this->sentencia ="INSERT INTO nomina VALUES (NULL,'$id_empleado','$id_fecha','$monto')";
        $this->ejecutar_sentencia();
        
  
      }
      public function baja($id){
        $this->sentencia = "DELETE FROM nomina WHERE id_nomina=$id";
        $this->ejecutar_sentencia();

      }
      public function consulta(){
        $this->sentencia="SELECT * FROM nomina";
        return $this->obtener_sentencia();

      }
      public function buscar($id){
        $this->sentencia= "SELECT * FROM clientes WHERE id_nomina=$id";
        return $this->obtener_sentencia();
        }
      public function modificaciones($id_empleado,$id_fecha,$monto,$id_nomina){
        $this->sentencia = "UPDATE nomina SET id_empleado='$id_empleado',id_fecha='$id_fecha',monto='$monto' where id_nomina='$id'";
        $this->ejecutar_sentencia();




        
      }

    }


 ?>