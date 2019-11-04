<?php 

		require_once("usuario.php");
        $obj = new Usuario();
        $obj->alta("yesenia","yesenia","2637");
        echo "pruebausuario";

        
        require_once("usuario.php");
        $obj = new Usuario();
        $res=$obj->consulta();
      while($fila = $res->fetch_assoc()){
        echo $fila["nombre"];
        echo $fila["password"];
        echo $fila["id_empleado"];
       
  

   }
    
 ?>