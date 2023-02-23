<?php

    require("../conexion.php");
    
    $query = "UPDATE `inmueble` SET
    `tipo`='$_POST[tipo_i]',`cantidad_habitaciones`='$_POST[cantidad_habitaciones]',`estrato`='$_POST[estrato_i]',
    `direccion_cementerio_cercano`='$_POST[direccion_cementerio_cercano]',`estado`='$_POST[estado_i]',`precio`='$_POST[precio_i]' 
    WHERE 
    direccion = '$_POST[direccion_i]' AND `ciudad` ='$_POST[ciudad_i]'";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Ha ocurrido un error al actualizar un inmueble");
    }

    header("Location: ./index_i.php");

?>