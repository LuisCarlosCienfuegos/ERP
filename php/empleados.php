<?php 
require_once("conexion.php");
		class Empleados extends Conexion{

			public function alta($nombre,$apellidop,$apellidom,$area,$puesto,$salario,$correo,$direccion,$fecha_N,$curp,$telefono,$estado_civil,$escolaridad,$cp){

				$this->sentencia ="INSERT INTO empleados VALUES (NULL,'$nombre','$apellidop','$apellidom','$area','$puesto','$salario','$correo','$direccion','$fecha_N','$curp','$telefono','$estado_civil','$escolaridad','$cp')";
				$this->ejecutar_sentencia();
				
			}
			public function baja($id){
				$this->sentencia = "DELETE FROM empleados WHERE id_empleado=$id";
				$this->ejecutar_sentencia();

			}
			public function consulta(){
				$this->sentencia="SELECT * FROM empleados";
				return $this->obtener_sentencia();

				
			}
			public function buscar($id){
				$this->sentencia= "SELECT * FROM empleados WHERE id_empleado=$id";
				return $this->obtener_sentencia();
			}
   				public function modificaciones($nombre,$apellidop,$apellidom,$area,$puesto,$salario,$correo,$direccion,$fecha_N,$curp,$telefono,$estado_civil,$escolaridad,$cp,$id_empleado){
				$this->sentencia = "UPDATE empleados SET nombre='$nombre',apellidop='$apellidop',apellidom='$apellidom',area='$area',puesto='$puesto',salario='$salario',correo='$correo',direccion='$direccion',fecha_N='$fecha_N',curp='$curp',telefono='$telefono',estado_civil='$estado_civil',escolaridad='$escolaridad',cp='$cp', where id_empleado='$id'";
				$this->ejecutar_sentencia();



		}

		}


 ?>