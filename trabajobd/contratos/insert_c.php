<?php
 
require("../conexion.php");

$query = "";
if($_POST["radio_c"]==="empresa"){
    $query="INSERT INTO `contrato`(`radicado`, `fecha_realizacion`,`c_persona`,`n_empresa`) 
    VALUES ($_POST[radicado],'$_POST[fecha_realizacion]',NULL ,$_POST[identificacion]);";
    
}
else{
	$query="INSERT INTO `contrato`(`radicado`, `fecha_realizacion`,`c_persona`,`n_empresa`) 
    VALUES ($_POST[radicado],'$_POST[fecha_realizacion]',$_POST[identificacion], NULL);";
}

if(strlen($_POST['lista_exportar']) == 2){
    die("Debe ingresar detalles.");
}


if(isset($_POST['lista_exportar'])){
    
    $lista = json_decode($_POST['lista_exportar'], true);
    $query_lista = "INSERT INTO `detalle`(`duracion`, `r_contrato`, `dir_inmueble`, `ciudad_inmueble`) VALUES ";
    $numItems = count($lista);
    $i = 0;
    foreach ($lista as $e){
        $radicado = intval($_POST['radicado']);
        $duracion = intval($e['duracion']);
        $direccion = $e['direccion'];
        $ciudad = $e['ciudad'];
        $query_lista .= ++$i === $numItems
            ?  "($duracion, $radicado, '$direccion', '$ciudad')"
            : "($duracion, $radicado, '$direccion', '$ciudad'),";
    }

    $query .= $query_lista;
}


if ($conn->multi_query($query)) {
    
    do {
        if ($resultado = $conn->store_result()) {
            var_dump($resultado->fetch_all(MYSQLI_ASSOC));
            $resultado->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

$conn->close();

header("Location: ./index_c.php");



?>
