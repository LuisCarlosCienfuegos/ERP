<?php 
		require_once("conexion.php");
		class Materiales extends Conexion{

			public function alta($nombre,$cantidad,$costo){

				$this->sentencia = "INSERT INTO materiales VALUES (NULL,'$nombre','$cantidad','$costo')";
				$this->ejecutar_sentencia();


			}
			public function baja($id){
				$this->sentencia = "DELETE FROM materiales WHERE id=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM materiales";
				return $this->obtener_sentencia();


		    }
				public function modificaciones($nombre,$cantidad,$costo){
				$this->sentencia = "UPDATE materiales SET nombre='$nombre',cantidad='$cantidad',costo='$costo', where id='$id'";
				$this->ejecutar_sentencia();

			}
		    public function datosMateriales(){
              $this->sentencia = "SELECT cantidad FROM materiales";
              $res = $this->obtener_sentencia(); 
              $datos="";
              while ($fila = $res->fetch_assoc()){
              $datos=$datos.$fila["cantidad"].",";
             }
              $datos=substr($datos,0,strlen($datos)-1);
              echo $datos; 
             }
               public function etiquetasMateriales(){
              $this->sentencia = "SELECT nombre FROM materiales";
              $res = $this->obtener_sentencia(); 
              $datos="";
              while ($fila = $res->fetch_assoc()){
              $datos.="'".$fila["nombre"]."',";
             }
              $datos=substr($datos,0,strlen($datos)-1);
              echo $datos; 
              }
        
 }
    


 ?>