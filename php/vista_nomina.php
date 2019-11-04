<section>
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>	
  <form action ="" method="post">	
    Id_Empleado: <input type="text" name="id_empleado"><br>
    Fecha: <input type="date" name="fecha"><br>
    Monto: <input type="text" name="monto"><br>
    <div>
    <input type="submit" name="altanom" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("nomina.php");
        $obj = new Nomina();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id_Empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empleado" required><br>
    Fecha: <input type="date" value="<?php echo $a['fecha']; ?>" name="fecha" required><br>
    Monto: <input type="text" value="<?php echo $a['monto']; ?>" name="monto" required><br>
   
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificanom" value="Modificar">   
    </div>
    </form>
 
    <?php
    }
    require_once("nomina.php");
    $obj = new Nomina();
    if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
     echo "<script>
    alert('Nomina Eliminada');
    windows.location='home.php?s=nom';
    </script>";
}
    if(isset($_POST["altanom"])){
    $i= $_POST["id_empleado"];
    $f = $_POST["fecha"];
    $m = $_POST["monto"];
    $obj->alta($i,$f,$m);
    echo "<script>
    alert('Nomina Registrada');
    windows.location='home.php?s=nom';
    </script>";
    }
    if(isset($_POST["modificanom"])){
    $i= $_POST["id_empleado"];
    $f = $_POST["fecha"];
    $m = $_POST["monto"];
    $id= $_POST["id_empleado"];
    $obj->modificaciones($i,$f,$m,$id);
    echo "<script>
    alert('Nomina Modificada');
    windows.location='home.php?s=nom';
    </script>";
    }
    $resultado = $obj->consulta();
     
 ?>
<table>
	<tr>
		<th>Id Empleado</th>
		<th>Fecha</th>
		<th>Monto</th>
		
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_empleado"]."</td>";
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["monto"]."</td>";	
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_nomina']; ?>">
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