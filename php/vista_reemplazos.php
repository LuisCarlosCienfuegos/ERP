<section>
	<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
    <form action ="" method="post">	
    Id_recursos: <input type="text" name="id_recursos"><br>
    Id_empleado: <input type="text" name="id_empleado"><br>
    Fecha: <input type="date" name="fecha"><br>
    Falla: <input type="text" name="falla"><br>
    
    <div>
    <input type="submit" name="altareem" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("reemplazos.php");
        $obj = new Reemplazos();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id_recurso: <input type="text" value="<?php echo $a['id_recursos']; ?>" name="id_recursos" required><br>
    Id_empleado: <input type="text" value="<?php echo $a['id_empleado']; ?>" name="id_empleado" required><br>
    Fecha: <input type="date" value="<?php echo $a['fecha']; ?>" name="fecha" required><br>
    Falla: <input type="text" value="<?php echo $a['falla']; ?>" name="falla" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificareem" value="Modificar">   
    </div>
    </form>
 
    <?php
    }
    require_once("reemplazos.php");
    $obj = new Reemplazos();
    if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
     echo "<script>
    alert('Reemplazo Eliminado');
    windows.location='home.php?s=reemp';
    </script>";
}
    if(isset($_POST["altareem"])){
    $ir = $_POST["id_recursos"];
    $ie = $_POST["id_empleado"];
    $fe = $_POST["fecha"];
    $fa = $_POST["falla"];
    $obj->alta($ir,$ie,$fe,$fa);
    echo "<script>
    alert('Reemplazo Registrado');
    windows.location='home.php?s=reemp';
    </script>";
    }
    if(isset($_POST["modificareem"])){
    $ir = $_POST["id_recursos"];
    $ie = $_POST["id_empleado"];
    $fe = $_POST["fecha"];
    $fa = $_POST["falla"];
    $id = $_POST["id_reemplazo"];
    $obj->modificaciones($ir,$ie,$fe,$fa,$id);
    echo "<script>
    alert('Reemplazo Modificado');
    windows.location='home.php?s=reemp';
    </script>";
    }
    $resultado = $obj->consulta();
     
 ?>


<table>
	<tr>
		<th>Id_recursos</th>
		<th>Id_Empleado</th>
		<th>Fecha</th>
		<th>Falla</th>
		
		
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_recurso"]."</td>";
			echo "<td>".$fila["id_empleado"]."</td>";
			echo "<td>".$fila["fecha"]."</td>";
		    echo "<td>".$fila["falla"]."</td>";
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_reemplazo']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_reemplazo']; ?>">
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