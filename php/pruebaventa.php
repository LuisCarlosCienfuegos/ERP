<?php 

		require_once("ventas.php");
        $obj = new Ventas();
        $obj->alta("5","2019-09-29","2637","5");
        echo "pruebaventa";

        
        require_once("ventas.php");
        $obj = new Ventas();
        $res=$obj->consulta();
      while($fila = $res->fetch_assoc()){
        echo $fila["id_cliente"];
        echo $fila["fecha"];
        echo $fila["total"];
        echo $fila["id_empleado"];
       
  

   }
    
 ?>