<?php

    require("../conexion.php");
    
    $query = "UPDATE `contrato` SET `fecha_realizacion`= '$_POST[fecha_realizacion]' WHERE radicado = '$_POST[radicado]'";

    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Ha ocurrido un error al actualizar un contrato");
    }

    header("Location: ./index_c.php");

?>