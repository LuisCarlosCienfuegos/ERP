<section>
   <?php 
   if (!isset($_POST["idM"])){
       
   
    ?>	
   <form action <="" method="post">	
    Nombre: <input type="text" name="nombre"><br>
    Cantidad: <input type="text" name="cantidad"><br>
    Costo: <input type="text" name="costo"><br>
   <div>
    <input type="submit" name="altamat" value="Ingresar">  
    </div>
    </form>
     <?php 
    }else{
        require_once("materiales.php");
        $obj = new Materiales();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
     <form action ="" method="post">    
    Nombre: <input type="text" value="<?php echo $a['nombre']; ?>" name="nombre" required><br>
    Cantidad: <input type="text" value="<?php echo $a['cantidad']; ?>" name="cantidad" required><br>
    Costo: <input type="text" value="<?php echo $a['costo']; ?>" name="costo" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificamat" value="Modificar">   
    </div>
    </form>
 
	<?php 
}
	require_once("materiales.php");
	$obj = new Materiales();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Materiales Eliminado');
    windows.location='home.php?s=mat';
    </script>";
    }
	if(isset($_POST["altamat"])){
    $n = $_POST["nombre"];
    $cant = $_POST["cantidad"];
    $cost = $_POST["costo"];
    $obj->alta($n,$cant,$cost);
    echo "<script>
    alert('Material Registrado');
    windows.location='home.php?s=mat';
    </script>";
    }
	if(isset($_POST["modificaCli"])){
    $n = $_POST["nombre"];
    $cant = $_POST["cantidad"];
    $cost = $_POST["costo"];
    $id = $_POST["id"];
    $obj->modificaciones($n,$cant,$c,$cost,$id);
    echo "<script>
    alert('Material Modificado');
    windows.location='home.php?s=mat';
    </script>";
    }
    $resultado = $obj->consulta();
     
 ?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Cantidad</th>
		<th>Costo</th>
	   
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["cantidad"]."</td>";
			echo "<td>".$fila["costo"]."</td>";
			
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
<?php 
require_once("graficam.php");

 ?>