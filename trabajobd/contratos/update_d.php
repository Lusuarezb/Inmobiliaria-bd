<?php

    require("../conexion.php");
    
    $inmueble = $_POST["identificacion_i"];
    $aux = explode(",", $inmueble);
    $direccion = $aux[0];
    $ciudad = $aux[1];
    
    $query = "UPDATE `detalle` SET `duracion`= '$_POST[duracion_d]', `dir_inmueble` = '$direccion', `ciudad_inmueble` = '$ciudad'
    WHERE r_contrato = '$_POST[radicado_c]' AND dir_inmueble = '$_POST[direccion_old]' AND ciudad_inmueble = '$_POST[ciudad_old]'";

    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Ha ocurrido un error al actualizar un detalle");
    }

    header("Location: ./index_c.php");

?>