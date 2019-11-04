<?php 

require_once("conexion.php");
		class Balance extends Conexion{

			public function alta($fecha_inicio,$fecha_fin,$total){

				$this->sentencia ="INSERT INTO balance VALUES (NULL,'$fecha_inicio','$fecha_fin','$total')";
				$this->ejecutar_sentencia();

		}
		public function baja($id){
			   $this->sentencia = "DELETE FROM balance WHERE id=$id";
			   $this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM balance";
				return $this->obtener_sentencia();
			}
            public function buscar($id){
				$this->sentencia= "SELECT * FROM clientes WHERE id=$id";
				return $this->obtener_sentencia();

				
			}
			public function modificaciones($fecha_inicio,$fecha_fin,$total,$id){
				$this->sentencia = "UPDATE balance SET fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin',total='$total' where id='$id'";
				$this->ejecutar_sentencia();

		
	}
}




 ?>