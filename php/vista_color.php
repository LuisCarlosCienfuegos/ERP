<section>
<form action ="" method="post">	
    Codigo: <input type="text" name="codigo"><br>  
    <div>
    <input type="submit" name="altacol" value="Ingresar">	
    </div>
    
    </form>
	<?php 
	require_once("color.php");
	$obj = new color();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Color Eliminado');
    windows.location='home.php?s=prov';
    </script>";
    }
	if(isset($_POST["altacol"])){
    $cowl= $_POST["color"];
    $obj->alta($cowl);
    echo "<script>
    alert('Color registrado');
    windows.location='home.php?s=prov';
    </script>";
    }
	$resultado = $obj->consulta();
     
 ?>
<table>
	<tr>
		<th>Codigo</th>	
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["codigo"]."</td>";
		
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