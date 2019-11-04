<section>
	<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
  
    <form action ="" method="post">	
    Id_Materia: <input type="text" name="id_materia"><br>
    Cantidad: <input type="text" name="cantidad"><br>
    <div>
    <input type="submit" name="altamatc" value="Ingresar">	
    </div>
    </form>
	<?php 
    }else{
    require_once("materia_compra.php");
    $obj = new Materia_compra();
    $res = $obj->buscar($_POST["idM"]);
    $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id_Materia: <input type="text" value="<?php echo $a['id_materia']; ?>" name="id_materia" required><br>
    Cantidad: <input type="text" value="<?php echo $a['cantidad']; ?>" name="cantidad" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificamatc" value="Modificar">   
    </div>
    </form>
 
    <?php
    }
	require_once("materia_compra.php");
    $obj = new Materia_compra();
    if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
     echo "<script>
    alert('Materia compra Eliminada');
    windows.location='home.php?s=mate';
    </script>";
}
    if(isset($_POST["altamatc"])){
    $i = $_POST["id_materia"];
    $c = $_POST["cantidad"];
    $obj->alta($i,$c);
    echo "<script>
    alert('Materia compra Registrada');
    windows.location='home.php?s=mate';
    </script>";
    }
    if(isset($_POST["modificamatc"])){
    $i = $_POST["id_materia"];
    $c = $_POST["cantidad"];
    $id = $_POST["id"];
    $obj->modificaciones($i,$c,$id);
    echo "<script>
    alert('Materia compra Modificada');
    windows.location='home.php?s=mate';
    </script>";
    }
    $resultado = $obj->consulta();
     
     
 ?>

<table>
	<tr>
		<th>Id_Materia</th>
		<th>Cantidad</th>
		
	   
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_Materia"]."</td>";
			echo "<td>".$fila["Cantidad"]."</td>";
	        
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
    
