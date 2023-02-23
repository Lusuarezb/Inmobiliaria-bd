<?php

    require("../conexion.php");

    $query="SELECT * FROM inmueble";
    $resultado = mysqli_query($conn, $query)  or die(mysqli_error($conn));
    

?>