<?php 
		require_once("conexion.php");
		class Ventas extends Conexion{

			public function alta($id_cliente,$fecha,$total,$id_empleado){

				$this->sentencia = "INSERT INTO ventas VALUES (NULL,'$id_cliente','$fecha','$total','$id_empleado')";
				$this->ejecutar_sentencia();


			  }
			  public function baja($id){
				$this->sentencia = "DELETE FROM ventas WHERE id=$id";
				$this->ejecutar_sentencia();

			  }
			  public function consulta(){
				$this->sentencia="SELECT * FROM ventas";
				return $this->obtener_sentencia();
		    }
        public function buscar($id){
        $this->sentencia= "SELECT * FROM ventas WHERE id=$id";
        return $this->obtener_sentencia();
        }
				public function modificaciones($id_cliente,$fecha,$total,$id_empleado){
				$this->sentencia = "UPDATE ventas SET id_cliente='$id_cliente',fecha='$fecha',total='$total',id_empleado='$id_empleado', where id='$id'";
				$this->ejecutar_sentencia();

		    }
              public function datosVentas(){
              $this->sentencia = "SELECT total FROM ventas";
              $res = $this->obtener_sentencia(); 
              $datos="";
              while ($fila = $res->fetch_assoc()){
              $datos=$datos.$fila["total"].",";
            }
              $datos=substr($datos,0,strlen($datos)-1);
              echo $datos; 
              }
               public function etiquetasVentas(){
              $this->sentencia = "SELECT id_cliente FROM ventas";
              $res = $this->obtener_sentencia(); 
              $datos="";
              while ($fila = $res->fetch_assoc()){
              $datos.="'".$fila["id_cliente"]."',";
            }
              $datos=substr($datos,0,strlen($datos)-1);
              echo $datos; 
              }
        

    }

 ?>