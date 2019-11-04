<?php 
		require_once("conexion.php");
		class Producto_venta extends Conexion{

			public function alta($id_producto,$cantidad){

				$this->sentencia = "INSERT INTO producto_venta VALUES (NULL,'$id_producto','$cantidad')";
				$this->ejecutar_sentencia();



			}
			public function baja($id){
				$this->sentencia = "DELETE FROM producto_venta WHERE id_venta=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM producto_venta";
				return $this->obtener_sentencia();

				
			}
			public function modificaciones($id_producto,$cantidad,$id_venta){
				$this->sentencia = "UPDATE producto_venta SET id_producto='$id_producto',cantidad='$cantidad' where id_venta='$id'";
				$this->ejecutar_sentencia();

			}

		}


 ?>