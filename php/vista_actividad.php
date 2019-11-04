<section>	
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
    <form action ="" method="post">	
    Id_usuario: <input type="text" name="id_usuario"><br>
    Fecha: <input type="date" name="fecha"><br>
    Movimiento: <input type="text" name="movimiento"><br>
    <div>
    <input type="submit" name="altaA" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("actividad.php");
        $obj = new actividad();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id_usuario: <input type="text" value="<?php echo $a['id_usuario']; ?>" name="id_usuario" required><br>
    Fecha: <input type="date" value="<?php echo $a['fecha']; ?>" name="fecha" required><br>
    Movimiento: <input type="text" value="<?php echo $a['movimiento']; ?>" name="movimiento" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificaAct" value="Modificar">   
    </div>
    </form>

    <?php
    }
	require_once("actividad.php");
	$obj = new actividad();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Actividad Eliminada');
    windows.location='home.php?s=act';
    </script>";
    }
	if(isset($_POST["altaA"])){
    $i= $_POST["id_usuario"];
    $f = $_POST["fecha"];
    $m = $_POST["movimiento"];
    $obj->alta($i,$f,$m);
    echo "<script>
    alert('Actividad Registrada');
    windows.location='home.php?s=act';
    </script>";
    }
    if(isset($_POST["modificaAct"])){
    $i = $_POST["id_usuario"];
    $f = $_POST["fecha"];
    $m = $_POST["movimiento"];
    $id = $_POST["id"];
    $obj->modificaciones($i,$f,$m,$id);
    echo "<script>
    alert('Actividad Modificada');
    windows.location='home.php?s=act';
    </script>";
    }
	$resultado = $obj->consulta();
     
 ?>

<table>
	<tr>
		<th>Id_Usuario</th>
		<th>Fecha</th>
		<th>Movimiento</th>
	   
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_usuario"]."</td>";
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["movimiento"]."</td>";
			
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_actividad']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_actividad']; ?>">
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