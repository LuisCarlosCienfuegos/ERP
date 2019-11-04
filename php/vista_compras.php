<section>
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>	
	<form action ="" method="post">	
    Id_Proveedor: <input type="text" name="id_proveedor"><br>
    Fecha: <input type="date" name="fecha"><br>
    Total: <input type="text" name="total"><br>
    <div>
    <input type="submit" name="altaComp" value="Ingresar">	
    </div> 
    </form>
     <?php 
    }else{
        require_once("compras.php");
        $obj = new Compras();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Id_Proveedor: <input type="text" value="<?php echo $a['id_proveedor']; ?>" name="id_proveedor" required><br>
    Fecha: <input type="date" value="<?php echo $a['fecha']; ?>" name="fecha" required><br>
    Total: <input type="text" value="<?php echo $a['total']; ?>" name="total" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificaComp" value="Modificar">   
    </div>
    </form>
	<?php
    }
	require_once("compras.php");
	$obj = new Compras();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Compra Eliminada');
    windows.location='home.php?s=comp';
    </script>";
    }
	if(isset($_POST["altaComp"])){
    $id = $_POST["id_proveedor"];
    $f = $_POST["fecha"];
    $t = $_POST["total"];
    $obj->alta($id,$f,$t);
    echo "<script>
    alert('Compra Registrada');
    windows.location='home.php?s=comp';
    </script>";
    }
    if(isset($_POST["modificaComp"])){
    $id = $_POST["id_proveedor"];
    $f = $_POST["fecha"];
    $t = $_POST["total"];
    $id = $_POST["id"];
    $obj->modificaciones($id,$f,$t,$id);
    echo "<script>
    alert('Compra Modificada');
    windows.location='home.php?s=comp';
    </script>";
    }

	$resultado = $obj->consulta();
     
 ?>

<table>
	<tr>
		<th>Id_proveedor</th>
		<th>Fecha</th>
		<th>Total</th>
	    
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["id_proveedor"]."</td>";
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["total"]."</td>";
			?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id_compra']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>
</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id_compra']; ?>">
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
//para mandar a llamar las graficas
require_once("graficac.php");

 ?>