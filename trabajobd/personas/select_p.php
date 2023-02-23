<?php

    require("../conexion.php");

    $query="SELECT * FROM persona";
    $resultado = mysqli_query($conn, $query)  or die(mysqli_error($conn));
    

?>