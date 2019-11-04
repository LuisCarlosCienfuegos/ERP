<?php 

		require_once("recursos.php");
        $obj = new Recursos();
        $obj->alta("ytyuio","fgh","rtyu","ihjk","2500","25","fhhhf");
        echo "pruebarecursos";

        
        require_once("recursos.php");
        $obj = new Recursos();
        $res=$obj->consulta();
      while($fila = $res->fetch_assoc()){
        echo $fila["nombre"];
        echo $fila["marca"];
        echo $fila["descripcion"];
        echo $fila["existencia"];
        echo $fila["costo"];
        echo $fila["id_empleado"];
        echo $fila["area"];
        

   }
    
 ?>