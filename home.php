<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<header>
		ERP
		
	</header>
	<nav>
		<ul><!--Listas desordenas--->
			<!--Li Elementos de lista--->
			<!--a Enlaces--->
			<a href = "?s=prov"><li>Proveedor</li></a>
			<a href = "?s=clie"><li>Clientes</li></a>
			<a href = "?s=pro"><li>Productos</li></a>
			<a href = "?s=act"><li>Actividad</li></a>
			<a href = "?s=bal"><li>Balance</li></a>
			<a href = "?s=comp"><li>Compras</li></a>
			<a href = "?s=cuest"><li>Cuestionarios</li></a>
			<a href = "?s=emp"><li>Empleados</li></a>
			<a href = "?s=eval"><li>Evaluacion</li></a>
			<a href = "?s=mant"><li>Mantenimiento</li></a>
            <a href = "?s=mat"><li>Material</li></a>
            <a href = "?s=mate"><li>Materia compra</li></a>
            <a href = "?s=nom"><li>Nomina</li></a>
            <a href = "?s=pres"><li>Presencia</li></a>
            <a href = "?s=rec"><li>Recursos</li></a>
            <a href = "?s=reemp"><li>Reemplazos</li></a>
	        <a href = "?s=tiemp"><li>Tiempo</li></a>
            <a href = "?s=vent"><li>Ventas</li></a>
            <a href = "?s=usua"><li>Usuario</li></a>
            <a href = "?s=prodv"><li>Producto Venta</li></a>
            
			
		</ul>
		
	</nav>
	<?php 
    if (isset($_GET["s"])) {
    	$seccion = $_GET["s"];
    		switch ($seccion){
    		case 'prov':
    		require_once("php/vista_proveedor.php");
    			# code...
    			break;
    	    case 'clie':
    			require_once("php/vista_clientes.php");
    			# code...
    			break;
    		case 'pro':
    			require_once("php/vista_productos.php");
    			# code...
    			break;
    		case 'act':
    			require_once("php/vista_actividad.php");
    			# code...
    			break;
    		case 'bal':
    			require_once("php/vista_balance.php");
    			# code...
    			break;
    		case 'comp':
    			require_once("php/vista_compras.php");
    			# code...
    			break;
    		case 'cuest':
    			require_once("php/vista_cuestionarios.php");
    			# code...
    			break;
    		case 'emp':
    			require_once("php/vista_empleados.php");
    			# code...
    			break;
    		case 'eval':
    			require_once("php/vista_evaluacion.php");
    			# code...
    			break;
            case 'mant':
                require_once("php/vista_mantenimiento.php");
                # code...
                break;
            case 'mat':
                require_once("php/vista_materiales.php");
                # code...
                break;
            case 'mate':
                require_once("php/vista_materiacompra.php");
                # code...
                break;
            case 'nom':
                require_once("php/vista_nomina.php");
                # code...
                break;
             case 'pres':
                require_once("php/vista_presencia.php");
                # code...
                break;
             case 'rec':
                require_once("php/vista_recursos.php");
                # code...
                break;
            case 'reemp':
                require_once("php/vista_reemplazos.php");
                # code...
                break;
            case 'tiemp':
                require_once("php/vista_tiempo.php");
                # code...
                break;
            case 'vent':
                require_once("php/vista_ventas.php");
                # code...
                break;
            case 'usua':
                require_once("php/vista_usuario.php");
                # code...
                break;
            case 'prodv':
                require_once("php/vista_productoventa.php");
                # code...
                break;
        
    		}
    
    }

	 ?>
</body>
</html>