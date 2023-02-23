<?php

    require("../conexion.php");
    
    $query = "UPDATE `empresa` SET `nombre`='$_POST[nombre_e]',`telefono`='$_POST[telefono_e]',`correo_electronico`='$_POST[correo_electronico_e]',`direccion`='$_POST[direccion_e]' WHERE nit = '$_POST[nit_e]'";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Ha ocurrido un error al actualizar una empresa");
    }

    header("Location: ./index_e.php");

?>