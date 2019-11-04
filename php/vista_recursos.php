<section>	
	<?php 
    if (!isset($_POST["idM"])){
       
   
    ?>
    <form action ="" method="post">	
    Nombre: <input type="text" name="nombre"><br>
    Marca: <input type="text" name="marca"><br>
    Descripcion: <input type="text" name="descripcion"><br>
    Existencia: <input type="text" name="existencia"><br>
    Costo: <input type="text" name="costo"><br>
    Id_Empleado: <input type="text" name="id_empleado"><br>
    Area: <input type="text" name="area"><br>
    <div>
    <input type="submit" name="altarec" value="Ingresar">	
    </div>
    </form>
	<?php 
    }else{
        require_once("recursos.php");
        $obj = new Recursos();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
     <form action ="" method="post">    
    Nombre: <input type="text" value="<?php echo $a['nombre']; ?>" name="nombre" required><br>
    Marca: <input type="text" value="<?php echo $a['marca']; ?>" name="marca" required><br>
    Descripcion: <input type="test" value="<?php echo $a['descripcion']; ?>" name="descripcion" required><br>
    Existencia: <input type="text" value="<?php echo $a['existencia']; ?>" name="existencia" required><br>
    Costo: <input type="text" value="<?php echo $a['costo']; ?>" name="costo" required><br>
    Id_Empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empleado" required><br>
    Area: <input type="text" value="<?php echo $a['area']; ?>" name="area" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?>">
    <div>
    <input type="submit" name="modificarec" value="Modificar">   
    </div>
    </form>
 
    <?php
    }
    require_once("recursos.php");
    $obj = new Recursos();
    if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
     echo "<script>
    alert('Recursos Eliminado');
    windows.location='home.php?s=rec';
    </script>";
    }
    if(isset($_POST["altarec"])){
    $n = $_POST["nombre"];
    $m = $_POST["marca"];
    $d = $_POST["descripcion"];
    $e = $_POST["existencia"];
    $c = $_POST["costo"];
    $ie = $_POST["id_empleado"];
    $a = $_POST["area"];
    $obj->alta($n,$m,$d,$e,$c,$ie,$a);
    echo "<script>
    alert('Recurso Registrado');
    windows.location='home.php?s=rec';
    </script>";
    }
    if(isset($_POST["modificarec"])){
    $n = $_POST["nombre"];
    $m = $_POST["marca"];
    $d = $_POST["descripcion"];
    $e = $_POST["existencia"];
    $c = $_POST["costo"];
    $ie = $_POST["id_empleado"];
    $a = $_POST["area"];
    $i = $_POST["id"];
    $obj->modificaciones($n,$m,$d,$e,$c,$ie,$a,$i);
    echo "<script>
    alert('Recurso Modificado');
    windows.location='home.php?s=rec';
    </script>";
    }
    $resultado = $obj->consulta();
     
 ?>

<table>
	<tr>
		<th>Nombre</th>
		<th>Marca</th>
		<th>Descripcion</th>
		<th>Existencia</th>
		<th>Costo</th>
		<th>Id_Empleado</th>
		<th>Area</th>
		
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["marca"]."</td>";
			echo "<td>".$fila["descripcion"]."</td>";
			echo "<td>".$fila["existencia"]."</td>";
		    echo "<td>".$fila["costo"]."</td>";
		    echo "<td>".$fila["id_empleado"]."</td>";
		    echo "<td>".$fila["area"]."</td>";
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id']; ?>">
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