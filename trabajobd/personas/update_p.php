<?php

    require("../conexion.php");
    
    $query = "UPDATE `persona` SET `nombre`='$_POST[nombre_p]',`celular`='$_POST[telefono_p]',`correo_electronico`='$_POST[correo_electronico_p]',`direccion`='$_POST[direccion_p]' WHERE cedula = '$_POST[cedula_p]'";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Ha ocurrido un error al actualizar una persona");
    }

    header("Location: ./index_p.php");

?>