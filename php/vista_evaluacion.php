<section>
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
   <form action ="" method="post">	
    Id_Empleado: <input type="text" name="id_empleado"><br>
    R1: <input type="text" name="r1"><br>
    R2: <input type="text" name="r2"><br>
    R3: <input type="text" name="r3"><br>
    R4: <input type="text" name="r4"><br>
    R5: <input type="text" name="r5"><br>
    R6: <input type="text" name="r6"><br>
    R7: <input type="text" name="r7"><br>
    R8: <input type="text" name="r8"><br>
    R9: <input type="text" name="r9"><br>
    R10: <input type="text" name="r10"><br>
    Id_Cuest: <input type="text" name="id_cuestionario"><br>
    <div>
    <input type="submit" name="altaeval" value="Ingresar">	
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
    Id_Empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empleado" required><br>
    R1: <input type="text" value="<?php echo $a['r1']; ?>" name="r1" required><br>
    R2: <input type="text" value="<?php echo $a['r2']; ?>" name="r2" required><br>
    R3: <input type="text" value="<?php echo $a['r3']; ?>" name="r3" required><br>
    R4: <input type="text" value="<?php echo $a['r4']; ?>" name="r4" required><br>
    R5: <input type="text" value="<?php echo $a['r5']; ?>" name="r5" required><br>
    R6: <input type="text" value="<?php echo $a['r6']; ?>" name="r6" required><br>
    R7: <input type="text" value="<?php echo $a['r7']; ?>" name="r7" required><br>
    R8: <input type="text" value="<?php echo $a['r8']; ?>" name="r8" required><br>
    R9: <input type="text" value="<?php echo $a['r9']; ?>" name="r9" required><br>
    R10: <input type="text" value="<?php echo $a['r10']; ?>" name="r10" required><br>
    Id_Cuest: <input type="text" value="<?php echo $a['id_cuest']; ?>" name="id_cuest" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificaeval" value="Modificar">   
    </div>
    </form>


	<?php
    } 
	require_once("evaluacion.php");
	$obj = new Evaluacion();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Evaluacion Eliminada');
    windows.location='home.php?s=eval';
    </script>";
    }
	if(isset($_POST["altaeval"])){
    $id = $_POST["id_empleado"];
    $r1 = $_POST["r1"];
    $r2 = $_POST["r2"];
    $r3 = $_POST["r3"];
    $r4 = $_POST["r4"];
    $r5 = $_POST["r5"];
    $r6 = $_POST["r6"];
    $r7 = $_POST["r7"];
    $r8 = $_POST["r8"];
    $r9 = $_POST["r9"];
    $r10 = $_POST["r10"];
    $idc = $_POST["id_cuestionario"];
    $obj->alta($id,$r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$idc);
    echo "<script>
    alert('Evaluacion Registrada');
    windows.location='home.php?s=eval';
    </script>";
    }
    if(isset($_POST["modificaeval"])){
     $id = $_POST["id_empleado"];
    $r1 = $_POST["r1"];
    $r2 = $_POST["r2"];
    $r3 = $_POST["r3"];
    $r4 = $_POST["r4"];
    $r5 = $_POST["r5"];
    $r6 = $_POST["r6"];
    $r7 = $_POST["r7"];
    $r8 = $_POST["r8"];
    $r9 = $_POST["r9"];
    $r10 = $_POST["r10"];
    $idc = $_POST["id_cuestionario"];
    $id = $_POST["id"];
    $obj->modificaciones($id,$r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$idc,$id);
    echo "<script>
    alert('Evaluacion Modificada');
    windows.location='home.php?s=eval';
    </script>";
    }
	$resultado = $obj->consulta();
     
 ?>


<table>
	<tr>
		<th>Id_Empleado</th>
		<th>R1</th>
		<th>R2</th>
		<th>R3</th>
		<th>R4</th>
		<th>R5</th>
		<th>R6</th>
		<th>R7</th>
		<th>R8</th>
		<th>R9</th>
		<th>R10</th>
	    <th>Id_Cuestionario</th>
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_empleado"]."</td>";
			echo "<td>".$fila["R1"]."</td>";
			echo "<td>".$fila["R2"]."</td>";
			echo "<td>".$fila["R3"]."</td>";
			echo "<td>".$fila["R4"]."</td>";
			echo "<td>".$fila["R5"]."</td>";
			echo "<td>".$fila["R6"]."</td>";
			echo "<td>".$fila["R7"]."</td>";
			echo "<td>".$fila["R8"]."</td>";
			echo "<td>".$fila["R9"]."</td>";
			echo "<td>".$fila["R10"]."</td>";
			echo "<td>".$fila["id_cuestionario"]."</td>";
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_evaluacion']; ?>">
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