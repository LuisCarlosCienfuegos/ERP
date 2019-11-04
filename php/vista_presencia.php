<section>
   <?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
    <form action ="" method="post">	
    Id Empleado: <input type="text" name="id_empleado"><br>
    Fecha: <input type="text" name="fecha"><br>
    Hora Entrada: <input type="text" name="hora_entrada"><br>
    Hora Salida: <input type="text" name="hora_salida"><br>
    <div>
    <input type="submit" name="altapres" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("presencia.php");
        $obj = new Presencia();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id_Empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empleado" required><br>
    Fecha: <input type="text" value="<?php echo $a['fecha']; ?>" name="fecha" required><br>
    Hora Entrada: <input type="text" value="<?php echo $a['hora_entrada']; ?>" name="hora_entrada" required><br>
    Hora Salida: <input type="text" value="<?php echo $a['hora_salida']; ?>" name="hora_salida" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificapres" value="Modificar">   
    </div>
    </form>
 
    <?php
    }
    require_once("presencia.php");
    $obj = new Presencia();
    if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
     echo "<script>
    alert('Presencia Eliminada');
    windows.location='home.php?s=pres';
    </script>";
}
    if(isset($_POST["altapres"])){
    $ide= $_POST["id_empleado"];
    $f = $_POST["fecha"];
    $he = $_POST["hora_entrada"];
    $hs = $_POST["hora_salida"];
    $obj->alta($ide,$f,$he,$hs);
    echo "<script>
    alert('Presencia Registrada');
    windows.location='home.php?s=pres';
    </script>";
    }
    if(isset($_POST["modificapres"])){
    $ide= $_POST["id_empleado"];
    $f = $_POST["fecha"];
    $he = $_POST["hora_entrada"];
    $hs = $_POST["horas_salida"];
    $i = $_POST["id"];
    $obj->modificaciones($ide,$f,$he,$hs,$i);
    echo "<script>
    alert('Presencia Modificada');
    windows.location='home.php?s=pres';
    </script>";
    }
    $resultado = $obj->consulta();
     
 ?>

<table>
	<tr>
		<th>Id Empleado</th>
		<th>Fecha</th>
		<th>Hora Entrada</th>
		<th>Hora Salida</th>
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_empleado"]."</td>";
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["hora_entrada"]."</td>";
			echo "<td>".$fila["hora_salida"]."</td>";
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_presencia']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_presencia']; ?>">
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