<?php 

		require_once("empleados.php");
        $obj = new empleados();
        $obj->alta("yesenia","aguilar","del rio","informatica","gjggjj","25000","yeseina122aguilar@gmail.com","santiaguito","2019-09-11","AURY980210MMCGXS03","7221046066","soltera","ubhhjj","50900");
        echo "pruebaempleados";

        
        require_once("empleados.php");
        $obj = new empleados();
        $res=$obj->consulta();
      while($fila = $res->fetch_assoc()){
        echo $fila["nombre"];
        echo $fila["apellidop"];
        echo $fila["apellidom"];
        echo $fila["area"];
        echo $fila["puesto"];
        echo $fila["salario"];
        echo $fila["correo"];
        echo $fila["direccion"];
        echo $fila["fecha_N"];
        echo $fila["curp"];
        echo $fila["telefono"];
        echo $fila["estado_civil"];
        echo $fila["escolaridad"];
        echo $fila["cp"];
    

   }
    
 ?>