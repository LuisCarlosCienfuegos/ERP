<section>
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>

    <form action ="" method="post"> 
    Nombre: <input type="text" name="nombre"><br>
    Costo: <input type="text" name="cost"><br>
    Unidad: <input type="text" name="uni"><br>
    Existencia: <input type="text" name="exist"><br>
    Codigo: <input type="text" name="cod"><br>
    Descripcion: <input type="text" name="des"><br>
    Almacen: <input type="text" name="alm"><br>
    Categoria: <input type="text" name="cat"><br>
    <div>
    <input type="submit" name="altaP" value="Ingresar">   
    </div>
    </form>
    <?php 
    }else{
        require_once("productos.php");
        $obj = new Productos();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Nombre: <input type="text" value="<?php echo $a['nombre']; ?>" name="nombre" required><br>
    Costo: <input type="text" value="<?php echo $a['costo']; ?>" name="cost" required><br>
    Unidad: <input type="text" value="<?php echo $a['unidad']; ?>" name="uni" required><br>
    Existencia: <input type="text" value="<?php echo $a['existencia']; ?>" name="exist" required><br>
    Codigo: <input type="text" value="<?php echo $a['codigo']; ?>" name="cod" required><br>
    Descripcion: <input type="text" value="<?php echo $a['descripcion']; ?>" name="des" required><br>
    Almacen: <input type="text" value="<?php echo $a['almacen']; ?>" name="alm" required><br>
    Categoria: <input type="text" value="<?php echo $a['categoria']; ?>" name="cat" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?>">
    <div>
    <input type="submit" name="modificaProd" value="Modificar">   
    </div>
    </form>
	<?php 
    }
	require_once("productos.php");
	$obj = new Productos();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Producto Eliminado');
    windows.location='home.php?s=pro';
    </script>";
    }
	if(isset($_POST["altaP"])){
    $n = $_POST["nombre"];
    $c = $_POST["cost"];
    $u = $_POST["uni"];
    $e = $_POST["exist"];
    $c = $_POST["cod"];
    $d = $_POST["des"];
    $a = $_POST["alm"];
    $c = $_POST["cat"];
    $obj->alta($n,$c,$u,$e,$c,$d,$a,$c);
    echo "<script>
    alert('Producto Registrado');
    windows.location='home.php?s=pro';
    </script>";
    }
    if(isset($_POST["modificaProd"])){
    $n = $_POST["nombre"];
    $c = $_POST["cost"];
    $u = $_POST["uni"];
    $e = $_POST["exist"];
    $c = $_POST["cod"];
    $d = $_POST["des"];
    $a = $_POST["alm"];
    $c = $_POST["cat"];
    $id = $_POST["id"];
    $obj->modificaciones($n,$c,$u,$e,$c,$d,$a,$c,$id);
    echo "<script>
    alert('Producto Modificado');
    windows.location='home.php?s=pro';
    </script>";
    }
	$resultado = $obj->consulta();
 ?>

<table>
	<tr>
		<th>Nombre</th>
		<th>Costo</th>
		<th>Unidad</th>
	    <th>Existencia</th>	
	    <th>Codigo</th>
	    <th>Descripcion</th>
	    <th>Almacen</th>	
	    <th>Categoria</th>
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["costo"]."</td>";
			echo "<td>".$fila["unidad"]."</td>";
			echo "<td>".$fila["existencia"]."</td>";
			echo "<td>".$fila["codigo"]."</td>";
			echo "<td>".$fila["descripcion"]."</td>";
			echo "<td>".$fila["almacen"]."</td>";
			echo "<td>".$fila["categoria"]."</td>";
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_producto']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_producto']; ?>">
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
<?php 
require_once("grafica.php");

 ?>