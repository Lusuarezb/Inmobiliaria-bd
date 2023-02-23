<?php

    require("../conexion.php");

    $query="SELECT * FROM contrato";
    $resultado = mysqli_query($conn, $query)  or die(mysqli_error($conn));
    

?>