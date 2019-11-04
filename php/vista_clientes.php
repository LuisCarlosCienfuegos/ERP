<section>
<?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
    <form action ="" method="post"> 
    Nombre: <input type="text" name="nombre"><br>
    Razon Social: <input type="text" name= "rs"><br>
    Correo: <input type="email" name="correo"><br>
    Direccion: <input type="text" name="dir"><br>
    Telefono: <input type="text" name="tel"><br>
    <div>
    <input type="submit" name="altaClie" value="Ingresar">  
    </div>
    </form>
     <?php 
    }else{
        require_once("clientes.php");
        $obj = new Clientes();
        $res = $obj->buscar($_POST["idM"]);
        $a =  $res->fetch_assoc();
    ?>
    <form action ="" method="post">    
    Nombre: <input type="text" value="<?php echo $a['nombre']; ?>" name="nombre" required><br>
    Razon Social: <input type="text" value="<?php echo $a['razonsocial']; ?>" name="rs" required><br>
    Correo: <input type="email" value="<?php echo $a['correo']; ?>" name="correo" required><br>
    Direccion: <input type="text" value="<?php echo $a['direccion']; ?>" name="dir" required><br>
    Telefono: <input type="text" value="<?php echo $a['telefono']; ?>" name="tel" required><br>
    <input type="hidden" name="id" value="<?php echo $_POST["idM"] ?> ">
    <div>
    <input type="submit" name="modificaCli" value="Modificar">   
    </div>
    </form>
 
    <?php
    }
    require_once("clientes.php");
    $obj = new Clientes();
    if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
     echo "<script>
    alert('Cliente Eliminado');
    windows.location='home.php?s=clie';
    </script>";
}
    if(isset($_POST["altaClie"])){
    $n = $_POST["nombre"];
    $rs = $_POST["rs"];
    $c = $_POST["correo"];
    $d = $_POST["dir"];
    $t = $_POST["tel"];
    $obj->alta($n,$rs,$c,$d,$t);
    echo "<script>
    alert('Cliente Registrado');
    windows.location='home.php?s=clie';
    </script>";
    }
    if(isset($_POST["modificaCli"])){
    $n = $_POST["nombre"];
    $rs = $_POST["rs"];
    $c = $_POST["correo"];
    $d = $_POST["dir"];
    $t = $_POST["tel"];
    $id = $_POST["id"];
    $obj->modificaciones($n,$rs,$c,$d,$t,$id);
    echo "<script>
    alert('Cliente Modificado');
    windows.location='home.php?s=clie';
    </script>";
    }
    $resultado = $obj->consulta();
     
 ?>

<table>
    <tr>
        <th>Nombre</th>
        <th>Razon social</th>
        <th>Correo</th>
        <th>Direccion</th>  
        <th>Telefono</th>
    </tr>
    <?php 
        while ($fila =  $resultado->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$fila["nombre"]."</td>";
            echo "<td>".$fila["razonsocial"]."</td>";
            echo "<td>".$fila["correo"]."</td>";
            echo "<td>".$fila["direccion"]."</td>";
            echo "<td>".$fila["telefono"]."</td>";
            
        

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