<?php

    require("../conexion.php");

    if (isset($_POST['enviar_i'])){
        $query = "INSERT INTO `inmueble`(`direccion`, `ciudad`, `tipo`, `cantidad_habitaciones`, `estrato`, `direccion_cementerio_cercano`, `estado`, `precio`) VALUES ('$_POST[direccion_i]','$_POST[ciudad_i]','$_POST[tipo_i]','$_POST[cantidad_habitaciones]','$_POST[estrato_i]','$_POST[dir_cem_cercano]','$_POST[estado_i]','$_POST[precio_i]')";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Ocurrio un fallo al ingresar un inmueble");
        }

        header ("Location: ./index_i.php");
    }
    

?>