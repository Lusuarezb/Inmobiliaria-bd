<?php

    require("../conexion.php");

    if (isset($_POST['enviar_e'])){
        $query = "INSERT INTO `empresa`(`nit`, `nombre`, `telefono`, `correo_electronico`, `direccion`) VALUES ('$_POST[nit_e]','$_POST[nombre_e]','$_POST[telefono_e]','$_POST[correo_e]','$_POST[direccion_e]')";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Ocurrio un fallo al ingresar una empresa");
        }

        header ("Location: ./index_e.php");
    }
    

?>