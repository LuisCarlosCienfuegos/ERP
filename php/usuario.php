<?php 
require_once("conexion.php");
    class Usuario extends Conexion{

      public function alta($nombre,$password,$id_empleado){

        $this->sentencia ="INSERT INTO usuario VALUES (NULL,'$nombre','$password','$id_empleado')";
        $this->ejecutar_sentencia();
        
  
      }
      public function baja($id){
        $this->sentencia = "DELETE FROM usuario WHERE id_usuario=$id";
        $this->ejecutar_sentencia();

      }
      public function consulta(){
        $this->sentencia="SELECT * FROM usuario";
        return $this->obtener_sentencia();

      }
      public function buscar($id){
        $this->sentencia= "SELECT * FROM usuario WHERE id_usuario=$id";
        return $this->obtener_sentencia();
      }
      public function modificaciones($nombre,$password,$id_empleado){
        $this->sentencia = "UPDATE usuario SET nombre='$nombre',password='$password',id_empleado='$id_empleado' where id_usuario='$id'";
        $this->ejecutar_sentencia();




        
      }

    }


 ?>