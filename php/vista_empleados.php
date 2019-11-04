<section>
   <?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
   <form action <="" method="post">	
    Nombre: <input type="text" name="nombre"><br>
    Apellido P: <input type="text" name="apellidop"><br>
    Apellido M: <input type="text" name="apellidom"><br>
    Area: <input type="text" name="area"><br>
    Puesto: <input type="text" name="puesto"><br>
    Salario: <input type="text" name="salario"><br>
    Correo: <input type="email" name="correo"><br>
    Direccion: <input type="text" name="direccion"><br>
    Fecha N: <input type="text" name="fechan"><br>
    Curp: <input type="text" name="curp"><br>
    Telefono: <input type="text" name="tel"><br>
    Estado Civil: <input type="text" name="estadocivil"><br>
    Escolaridad: <input type="text" name="escolaridad"><br>
    Codigo Postal: <input type="text" name="codigo"><br>
    <div>
    <input type="submit" name="altaemp" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("empleados.php");
        $obj = new Empleados();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Nombre: <input type="text" value="<?php echo $a['nombre']; ?>" name="nombre" required><br>
    Apellido P: <input type="text" value="<?php echo $a['apellidop']; ?>" name="apellidop" required><br>
    Apellido M: <input type="text" value="<?php echo $a['apellidom']; ?>" name="apellidom" required><br>
    Area: <input type="text" value="<?php echo $a['area']; ?>" name="area" required><br>
    Puesto: <input type="text" value="<?php echo $a['puesto']; ?>" name="puesto" required><br>
    Salario: <input type="text" value="<?php echo $a['salario']; ?>" name="salario" required><br>
    Correo: <input type="email" value="<?php echo $a['correo']; ?>" name="correo" required><br>
    Direccion: <input type="text" value="<?php echo $a['direccion']; ?>" name="direccion" required><br>
    Fecha N: <input type="text" value="<?php echo $a['fechan']; ?>" name="fechan" required><br>
    Curp: <input type="text" value="<?php echo $a['curp']; ?>" name="curp" required><br>
    Telefono: <input type="text" value="<?php echo $a['tel']; ?>" name="tel" required><br>
    Estado Civil: <input type="text" value="<?php echo $a['estadocivil']; ?>" name="estadocivil" required><br>
    Escolaridad: <input type="text" value="<?php echo $a['escolaridad']; ?>" name="escolaridad" required><br>
    Codigo postal: <input type="text" value="<?php echo $a['codigo']; ?>" name="codigo" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificaemp" value="Modificar">   
    </div>
    </form>
 
    <?php
    } 
	require_once("empleados.php");
	$obj = new Empleados();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Empleado Eliminado');
    windows.location='home.php?s=emp';
    </script>";
    }
	if(isset($_POST["altaemp"])){
    $n = $_POST["nombre"];
    $ap = $_POST["apellidom"];
    $am = $_POST["apellidop"];
    $a = $_POST["area"];
    $p = $_POST["puesto"];
    $s = $_POST["salario"];
    $c = $_POST["correo"];
    $d = $_POST["direccion"];
    $f = $_POST["fechan"];
    $cu = $_POST["curp"];
    $t = $_POST["tel"];
    $e = $_POST["estadocivil"];
    $es = $_POST["escolaridad"];
    $cod = $_POST["codigo"];
    $obj->alta($n,$ap,$am,$a,$p,$s,$c,$d,$f,$cu,$t,$e,$es,$cod);
    echo "<script>
    alert('Empleado Registrado');
    windows.location='home.php?s=emp';
    </script>";
    }
    if(isset($_POST["modificaemp"])){
     $n = $_POST["nombre"];
    $ap = $_POST["apellidom"];
    $am = $_POST["apellidop"];
    $a = $_POST["area"];
    $p = $_POST["puesto"];
    $s = $_POST["salario"];
    $c = $_POST["correo"];
    $d = $_POST["direccion"];
    $f = $_POST["fechan"];
    $cu = $_POST["curp"];
    $t = $_POST["tel"];
    $e = $_POST["estadocivil"];
    $es = $_POST["escolaridad"];
    $cod = $_POST["codigo"];
    $id = $_POST["id_empleado"];
    $obj->modificaciones($n,$ap,$am,$a,$p,$s,$c,$d,$f,$cu,$t,$e,$es,$cod,$id);
    echo "<script>
    alert('Empleado Modificado');
    windows.location='home.php?s=emp';
    </script>";
    }
	$resultado = $obj->consulta();
     
 ?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Area</th>
		<th>Puesto</th>
		<th>Salario</th>
		<th>Correo</th>
		<th>Direccion</th>
		<th>Feha Nacimiento</th>
		<th>Curp</th>
		<th>Telefono</th>
		<th>Estado Civil</th>
		<th>Escolaridad</th>
	    <th>Cp</th>
	    
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["apellidop"]."</td>";
			echo "<td>".$fila["apellidom"]."</td>";
			echo "<td>".$fila["area"]."</td>";
			echo "<td>".$fila["puesto"]."</td>";
			echo "<td>".$fila["salario"]."</td>";
			echo "<td>".$fila["correo"]."</td>";
			echo "<td>".$fila["direccion"]."</td>";
			echo "<td>".$fila["fecha_N"]."</td>";
			echo "<td>".$fila["curp"]."</td>";
			echo "<td>".$fila["telefono"]."</td>";
			echo "<td>".$fila["estado_civil"]."</td>";
			echo "<td>".$fila["escolaridad"]."</td>";
			echo "<td>".$fila["cp"]."</td>";
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_empleado']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_empleado']; ?>">
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