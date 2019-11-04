<section>
	<?php 
   if (!isset($_POST["idM"])){
       
    ?>
    <form action ="" method="post">	
    Id_Producto: <input type="text" name="id_producto"><br>
    Cantidad: <input type="text" name="cantidad"><br>   
    <div>
    <input type="submit" name="altapvent" value="Ingresar">	
    </div>
    </form>
    <?php 
    }else{
        require_once("producto_venta.php");
        $obj = new Producto_venta();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
     <form action ="" method="post">    
    Id_Producto: <input type="text" value="<?php echo $a['id_producto']; ?>" name="id_producto" required><br>
    Cantidad: <input type="text" value="<?php echo $a['cantidad']; ?>" name="cantidad" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificapvent" value="Modificar">   
    </div>
    </form>
	<?php 
    }
	require_once("producto_venta.php");
    $obj = new Producto_venta();
    if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
     echo "<script>
    alert('Producto venta Eliminado');
    windows.location='home.php?s=prodv';
    </script>";
}
    if(isset($_POST["altapvent"])){
    $idp = $_POST["id_producto"];
    $c = $_POST["cantidad"];
    $obj->alta($idp,$c);
    echo "<script>
    alert('Producto venta Registrado');
    windows.location='home.php?s=prodv';
    </script>";
    }
    if(isset($_POST["modificapvent"])){
    $idp = $_POST["id_producto"];
    $c = $_POST["cantidad"];
    $idv = $_POST["id_venta"];
    $obj->modificaciones($idp,$c,$idv);
    echo "<script>
    alert('Producto venta Modificado');
    windows.location='home.php?s=prodv';
    </script>";
    }
    $resultado = $obj->consulta();
     
 ?>
<table>
	<tr>
		<th>Id Producto</th>
		<th>Cantidad</th>	
		
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_producto"]."</td>";
			echo "<td>".$fila["cantidad"]."</td>";
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_venta']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_venta']; ?>">
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