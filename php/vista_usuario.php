<section>
	<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
    <form action ="" method="post">	
    Nombre: <input type="text" name="nombre"><br>
    Password: <input type="text" name="password"><br>
    Id_empleado: <input type="text" name="id_empleado"><br>
    <div>
    <input type="submit" name="altausu" value="Ingresar">	
    </div>
    </form>
     <?php 
    }else{
        require_once("clientes.php");
        $obj = new Clientes();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Nombre: <input type="text" value="<?php echo $a['nombre']; ?>" name="nombre" required><br>
    Psssword: <input type="text" value="<?php echo $a['password']; ?>" name="password" required><br>
    Id_empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empeado" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificausu" value="Modificar">   
    </div>
    </form>
	<?php
	} 
	require_once("usuario.php");
	$obj = new Usuario();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Usuario Eliminado');
    windows.location='home.php?s=usua';
    </script>";
    }
	if(isset($_POST["altausu"])){
    $n= $_POST["nombre"];
    $pass= $_POST["password"];
    $id_emp= $_POST["id_empleado"];
    $obj->alta($n,$pass,$id_emp);
    echo "<script>
    alert('Usuario Registrado');
    windows.location='home.php?s=usua';
    </script>";
    }
    if(isset($_POST["modificausu"])){
    $n= $_POST["nombre"];
    $pass= $_POST["password"];
    $id_emp= $_POST["id_empleado"];
    $id = $_POST["id"];
    $obj->modificaciones($n,$pass,$id_emp,$id);
    echo "<script>
    alert('Usuario Modificado');
    windows.location='home.php?s=usua';
    </script>";
    }
	$resultado = $obj->consulta();
     
 ?>

<table>
	<tr>
		<th>Nombre</th>
		<th>Password</th>
		<th>Id_Empleado</th>
	
		
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["password"]."</td>";
			echo "<td>".$fila["id_empleado"]."</td>";

?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_usuario']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id']; ?>">
        <input type="image" src="img/modificar.jpg">

    </form>

</td>


<?php
			echo "</tr>";
		}
	 ?>

</table>
</section>
<script type="text/javascript">
	function confirmar(){
	var algo = confirm("Esta seguro de eliminar?");
	return algo;
	}
	function confirmarM(){
    var algo = confirm("Esta seguro de modificar?");
    return algo;
    }
</script>