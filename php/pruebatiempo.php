<?php 

		require_once("tiempo_extra.php");
        $obj = new TiempoE();
        $obj->alta("5","3:00","2637");
        echo "pruebatiempo";

        
        require_once("tiempo_extra.php");
        $obj = new TiempoE();
        $res=$obj->consulta();
      while($fila = $res->fetch_assoc()){
        echo $fila["id_empleado"];
        echo $fila["horas"];
        echo $fila["pago"];
       
  

   }
    
 ?>