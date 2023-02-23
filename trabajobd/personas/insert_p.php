<?php

    require("../conexion.php");

    if (isset($_POST['enviar_p'])){
        $query = "INSERT INTO `persona`(`cedula`, `nombre`, `celular`, `correo_electronico`, `direccion`) VALUES ('$_POST[cedula_p]','$_POST[nombre_p]','$_POST[telefono_p]','$_POST[correo_p]','$_POST[direccion_p]')";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Ocurrio un fallo al ingresar una persona");
        }

        header ("Location: ./index_p.php");
    }
    

?>