<?php

    require("../conexion.php");

    $query="SELECT * FROM inmueble WHERE estado = 'Disponible'";
    $resultado = mysqli_query($conn, $query)  or die(mysqli_error($conn));
    

?>