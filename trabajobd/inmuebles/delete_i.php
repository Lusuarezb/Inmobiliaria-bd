<?php

    require("../conexion.php");

    if(null !== $_POST['direccion_i'] AND null !== $_POST['ciudad_i']){

        $query1 = "DELETE FROM `contrato`
        WHERE radicado in (
        SELECT r_contrato
        FROM detalle
        WHERE dir_inmueble = '$_POST[direccion_i]' AND ciudad_inmueble = '$_POST[ciudad_i]')";

        $query2 = "DELETE FROM `inmueble` WHERE direccion = '$_POST[direccion_i]' AND ciudad = '$_POST[ciudad_i]'";

        $resultado1 = mysqli_query($conn, $query1);
        
        if(!$resultado1){
            die("Ha ocurrido un error al eliminar un contrato");
        }

        $resultado2 = mysqli_query($conn, $query2);
        if(!$resultado2){
            die("Ha ocurrido un error al eliminar un inmueble");
        }

        header("Location: ./index_i.php");

    }
        


?>