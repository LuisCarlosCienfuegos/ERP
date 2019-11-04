<section>
   <?php 
   if (!isset($_POST["idM"])){
       
   
    ?>

    <form action ="" method="post">	
    Id Cliente: <input type="text" name="id_cliente"><br>
    Fecha: <input type="date" name="fecha"><br>
    Total: <input type="text" name="total"><br>
    Id Empleado: <input type="text" name="id_empleado"><br>
    <div>
    <input type="submit" name="altav" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("ventas.php");
        $obj = new Ventas();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id Cliente: <input type="text" value="<?php echo $a['id_cliente']; ?>" name="id_cliente" required><br>
    Fecha: <input type="date" value="<?php echo $a['fecha']; ?>" name="fecha" required><br>
    Total: <input type="text" value="<?php echo $a['total']; ?>" name="total" required><br>
    Id Empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empleado" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificaCli" value="Modificar">   
    </div>
    </form>
	<?php 
    }
	require_once("ventas.php");
	$obj = new Ventas();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Ventas Eliminadas');
    windows.location='home.php?s=prov';
    </script>";
    }
	if(isset($_POST["altav"])){
    $id_c= $_POST["id_cliente"];
    $fec= $_POST["fecha"];
    $tol = $_POST["total"];
    $id_e = $_POST["id_empleado"];
  
    $obj->alta($id_c,$fec,$tol,$id_e);
    echo "<script>
    alert('Ventas Registradas');
    windows.location='home.php?s=prov';
    </script>";
    }
	$resultado = $obj->consulta();
?>

<table>
	<tr>
		<th>Id Cliente</th>
		<th>Fecha</th>
		<th>Total</th>
		<th>Id Empleado</th>
		
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_cliente"]."</td>";
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["total"]."</td>";
		    echo "<td>".$fila["id_empleado"]."</td>";
		    			
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id']; ?>">
    	<input type="image" src="img/eliminar.png">

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
</script>
<?php 
require_once("graficav.php");

 ?>