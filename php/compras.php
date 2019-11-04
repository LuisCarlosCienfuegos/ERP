<?php 
require_once("conexion.php");
		class Compras extends Conexion{

			public function alta($id_proveedor,$fecha,$total){

				$this->sentencia ="INSERT INTO compras VALUES (NULL,'$id_proveedor','$fecha','$total')";
				$this->ejecutar_sentencia();
				
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM compras WHERE id_compra=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM compras";
				return $this->obtener_sentencia();	
			}
			public function buscar($id){
				$this->sentencia= "SELECT * FROM compras WHERE id_compra=$id";
				return $this->obtener_sentencia();
			}
			public function modificaciones($id_proveedor,$fecha,$total,$id_compra){
				$this->sentencia = "UPDATE compras SET id_proveedor='$id_proveedor',fecha='$fecha',total='$total' where id_compra='$id'";
				$this->ejecutar_sentencia();
             }
		    public function datosCompras(){
              $this->sentencia = "SELECT fecha FROM compras";
              $res = $this->obtener_sentencia(); 
              $datos="";
              while ($fila = $res->fetch_assoc()){
              $datos=$datos.$fila["fecha"].",";
             }
              $datos=substr($datos,0,strlen($datos)-1);
              echo $datos; 
             }
               public function etiquetasCompras(){
              $this->sentencia = "SELECT id_proveedor FROM compras";
              $res = $this->obtener_sentencia(); 
              $datos="";
              while ($fila = $res->fetch_assoc()){
              $datos.="'".$fila["id_proveedor"]."',";
             }
              $datos=substr($datos,0,strlen($datos)-1);
              echo $datos; 
              }
        
 }
    


 ?>