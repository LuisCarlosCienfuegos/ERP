<?php 
require_once("conexion.php");
    class TiempoE extends Conexion{

      public function alta($id_empleado,$horas,$pago){

        $this->sentencia ="INSERT INTO tiempo_extra VALUES (NULL,'$id_empleado','horas','$pago')";
        $this->ejecutar_sentencia();
        
  
      }
      public function baja($id){
        $this->sentencia = "DELETE FROM tiempo_extra WHERE id_tiempo=$id";
        $this->ejecutar_sentencia();

      }
      public function consulta(){
        $this->sentencia="SELECT * FROM tiempo_extra";
        return $this->obtener_sentencia();

      }
      public function modificaciones($id_empleado,$horas,$pago){
        $this->sentencia = "UPDATE tiempo_extra SET id_empleado='$id_empleado',horas='$horas',pago='$pago' where id_tiempo='$id'";
        $this->ejecutar_sentencia();




        
      }

    }


 ?>