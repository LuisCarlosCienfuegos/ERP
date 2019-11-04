<?php 

		require_once("reemplazos.php");
        $obj = new Reemplazos();
        $obj->alta("5678","3456","2019-09-29","ihjk");
        echo "pruebareemplazos";

        
        require_once("reemplazos.php");
        $obj = new Reemplazos();
        $res=$obj->consulta();
      while($fila = $res->fetch_assoc()){
        echo $fila["id_recurso"];
        echo $fila["id_empleado"];
        echo $fila["fecha"];
        echo $fila["falla"];
  

   }
    
 ?>