<section>
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>	
    <form action ="" method="post">	
    Id_Empleado: <input type="text" name="id_empleado"><br>
    Horas: <input type="text" name="horas"><br>
    Pago: <input type="text" name="pago"><br>
    <div>
    <input type="submit" name="altatiemp" value="Ingresar">	
    </div>
    </form>
     <?php 
    }else{
        require_once("tiempo_extra.php");
        $obj = new TiempoE();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id_Empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empleado" required><br>
    Horas: <input type="text" value="<?php echo $a['horas']; ?>" name="horas" required><br>
    Pago: <input type="text" value="<?php echo $a['pago']; ?>" name="pago" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificatiemp" value="Modificar">   
    </div>
    </form>
	<?php 
    }
	require_once("tiempo_extra.php");
	$obj = new TiempoE();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Tiempo Eliminado');
    windows.location='home.php?s=tiemp';
    </script>";
    }
	if(isset($_POST["altatiemp"])){
    $id_em= $_POST["id_empleado"];
    $ho= $_POST["horas"];
    $pa = $_POST["pago"];
    $obj->alta($id_em,$ho,$pa);
    echo "<script>
    alert('Tiempo registrado');
    windows.location='home.php?s=tiemp';
    </script>";
    }
    if(isset($_POST["modificatiemp"])){
    $id_em= $_POST["id_empleado"];
    $ho= $_POST["horas"];
    $pa = $_POST["pago"];
    $id = $_POST["id"];
    $obj->modificaciones($id_em,$ho,$pa,$id);
    echo "<script>
    alert('Tiempo Modificado');
    windows.location='home.php?s=tiemp';
    </script>";
    }
	$resultado = $obj->consulta();

 ?>

<table>
	<tr>
		<th>Id_Empleado</th>
		<th>Horas</th>
		<th>Pago</th>
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_empleado"]."</td>";
			echo "<td>".$fila["horas"]."</td>";
			echo "<td>".$fila["pago"]."</td>";	
			
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_tiempo']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_tiempo']; ?>">
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