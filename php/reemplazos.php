<?php 

        require_once("conexion.php");
        class Reemplazos extends Conexion{

            public function alta($id_recurso,$id_empleado,$fecha,$falla){

                $this->sentencia = "INSERT INTO reemplazos VALUES (NULL,'$id_recurso','$id_empleado','$fecha','$falla')";
                $this->ejecutar_sentencia();


            }
            public function baja($id){
                $this->sentencia = "DELETE FROM reemplazos WHERE id_reemplazo=$id";
                $this->ejecutar_sentencia();

            }
            public function consulta(){
                $this->sentencia="SELECT * FROM reemplazos";
                return $this->obtener_sentencia();   
            }
            public function buscar($id){
                $this->sentencia= "SELECT * FROM reemplazos WHERE id_reemplazo=$id";
                return $this->obtener_sentencia();
                }
            public function modificaciones($id_recurso,$id_empleado,$fecha,$falla){
                $this->sentencia = "UPDATE reemplazos SET id_recurso='$id_recurso',id_empleado='$id_empleado',fecha ='$fecha',falla='$falla',where id_reemplazo='$id'";
                $this->ejecutar_sentencia();

            }

        }


 ?>