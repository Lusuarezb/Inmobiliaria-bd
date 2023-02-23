<?php

    require("../conexion.php");

    $query="SELECT duracion, dir_inmueble, ciudad_inmueble
    FROM detalle
    WHERE r_contrato = 'radicado'";
    
    $resultado = mysqli_query($conn, $query)  or die(mysqli_error($conn));
    

?>