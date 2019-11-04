<?php 

require_once("conexion.php");
		class Productos extends Conexion{

			public function alta($nombre,$costo,$unidad,$existencia,$codigo,$descripcion,$almacen,$categoria){

				$this->sentencia ="INSERT INTO productos VALUES (NULL,'$nombre','$costo','$unidad','$existencia','$codigo','$descripcion','$almacen','$categoria')";
				$this->ejecutar_sentencia();
			
        	}
  			public function baja($id){
        		$this->sentencia = "DELETE FROM productos WHERE id_producto=$id";
        		$this->ejecutar_sentencia();
            }
     	 	public function consulta(){
        		$this->sentencia="SELECT * FROM productos";
        		return $this->obtener_sentencia();

     		}
        public function buscar($id){
                $this->sentencia= "SELECT * FROM productos WHERE id_producto=$id";
                return $this->obtener_sentencia();       
        }
     		public function modificaciones($nombre,$costo,$unidad,$existencia,$codigo,$descripcion,$almacen,$categoria,$id_producto){
        		$this->sentencia = "UPDATE productos SET nombre='$nombre',costo='$costo',unidad='$unidad', existencia='$existencia',codigo='$codigo', descripcion='$descripcion', almacen ='$almacen', categoria='$categoria' where id_producto='$id'";
        		$this->ejecutar_sentencia();   
        }
        public function datosProducto(){
              $this->sentencia = "SELECT existencia FROM productos";
              $res = $this->obtener_sentencia(); 
              $datos="";
              while ($fila = $res->fetch_assoc()){
              $datos=$datos.$fila["existencia"].",";
            }
              $datos=substr($datos,0,strlen($datos)-1);
              echo $datos; 
              }
               public function etiquetasProducto(){
              $this->sentencia = "SELECT nombre FROM productos";
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