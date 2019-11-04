	<?php 
		require_once("conexion.php");
		class Proveedores extends Conexion{

			public function alta($nombre,$razonsocial,$correo,$diireccion,$telefono){

				$this->sentencia = "INSERT INTO proveedores VALUES (NULL,'$nombre','$razonsocial','$correo','$diireccion','$telefono')";
				$this->ejecutar_sentencia();
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM proveedores WHERE id=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM proveedores";
				return $this->obtener_sentencia();
		
			}
			public function buscar($id){
				$this->sentencia= "SELECT * FROM proveedores WHERE id=$id";
				return $this->obtener_sentencia();

			}
			public function modificaciones($nombre,$razonsocial,$correo,$diirecion,$telefono,$id){
				$this->sentencia = "UPDATE proveedores SET nombre='$nombre',razonsocial='$razonsocial',correo='$correo', diireccion='$diirecion',telefono='$telefono' where id='$id'";
				$this->ejecutar_sentencia();
            }
        

    }
       
  

 ?>