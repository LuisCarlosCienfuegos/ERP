<section>
	<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>

    <form action ="" method="post">	
    Fecha_Inicio: <input type="text" name="fecha_inicio"><br>
    Fecha_Fin: <input type="text" name="fecha_fin"><br>
    Total: <input type="text" name="total"><br>
    <div>
    <input type="submit" name="altabal" value="Ingresar">	
    </div>  
    </form>
     <?php 
    }else{
        require_once("balance.php");
        $obj = new Balance();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Fecha_Inicio: <input type="text" value="<?php echo $a['fecha_inicio']; ?>" name="fecha_inicio" required><br>
    Fecha_Fin: <input type="text" value="<?php echo $a['fecha_fin']; ?>" name="fecha_fin" required><br>
    Total: <input type="text" value="<?php echo $a['total']; ?>" name="total" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificabal" value="Modificar">   
    </div>
    </form>
	<?php 
	}
	require_once("balance.php");
	$obj = new Balance();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Balance Eliminado');
    windows.location='home.php?s=bal';
    </script>";
    }
	if(isset($_POST["altabal"])){
    $fi = $_POST["fecha_inicio"];
    $ff = $_POST["fecha_fin"];
    $t = $_POST["total"];
    $obj->alta($fi,$ff,$t);
    echo "<script>
    alert('Balance Registrado');
    windows.location='home.php?s=bal';
    </script>";
    }
    if(isset($_POST["modificabal"])){
    $fi = $_POST["fecha_inicio"];
    $ff = $_POST["fecha_fin"];
    $t = $_POST["total"];
    $i = $_POST["id"];
    $obj->modificaciones($fi,$ff,$t,$i);
    echo "<script>
    alert('Balance Modificado');
    windows.location='home.php?s=bal';
    </script>";
    }
	$resultado = $obj->consulta();
     

 ?>

<table>
	<tr>
		<th>Fecha_inicio</th>
		<th>Fecha_fin</th>
		<th>Total</th>
	    
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["fecha_inicio"]."</td>";
			echo "<td>".$fila["fecha_fin"]."</td>";
			echo "<td>".$fila["total"]."</td>";
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