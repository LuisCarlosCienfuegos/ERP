<section>
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>	
  <form action ="" method="post">	
    Id Recurso: <input type="text" name="recurso"><br>
    Id Empleado: <input type="text" name="ide"><br>
    Fecha: <input type="text" name="fecha"><br>
    Razon: <input type="text" name="razon"><br>
    <div>
    <input type="submit" name="altamant" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("mantenimiento.php");
        $obj = new Mantenimiento();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id Recurso: <input type="text" value="<?php echo $a['recurso']; ?>" name="recurso" required><br>
    Id Empleado: <input type="text" value="<?php echo $a['ide']; ?>" name="ide" required><br>
    Fecha: <input type="text" value="<?php echo $a['fecha']; ?>" name="fecha" required><br>
    Razon: <input type="text" value="<?php echo $a['razon']; ?>" name="razon" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificamant" value="Modificar">   
    </div>
    </form>
 
	<?php
	} 
	require_once("mantenimiento.php");
	$obj = new Mantenimiento();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Mantenimiento Eliminado');
    windows.location='home.php?s=mant';
    </script>";
    }
	if(isset($_POST["altamant"])){
    $idr= $_POST["recurso"];
    $ide = $_POST["ide"];
    $f = $_POST["fecha"];
    $r = $_POST["razon"];
    $obj->alta($idr,$ide,$f,$r);
    echo "<script>
    alert('Mantenimiento Registrado');
    windows.location='home.php?s=mant';
    </script>";
    }
    if(isset($_POST["modificamant"])){
    $idr= $_POST["recurso"];
    $ide = $_POST["ide"];
    $f = $_POST["fecha"];
    $r = $_POST["razon"];
    $id = $_POST["idm"];
    $obj->modificaciones($idr,$ide,$f,$r,$id);
    echo "<script>
    alert('Mantenimiento Modificado');
    windows.location='home.php?s=mant';
    </script>";
    }
	$resultado = $obj->consulta();
     
 ?>

<table>
	<tr>
		<th>Id_Recurso</th>
		<th>Id_Empleado</th>
		<th>Fecha</th>
		<th>Razon</th>
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_recurso"]."</td>";
			echo "<td>".$fila["id_empleado"]."</td>";
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["razon"]."</td>";
			
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_mantenimiento']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>
<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_mantenimiento']; ?>">
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