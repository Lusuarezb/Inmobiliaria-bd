<?php

    require("../conexion.php");

    $query="SELECT * FROM empresa";
    $resultado = mysqli_query($conn, $query)  or die(mysqli_error($conn));
    

?>