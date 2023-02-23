<?php

    require("../conexion.php");

    if(isset($_POST[cedula_p])){

        $query = "DELETE FROM `persona` WHERE cedula = '$_POST[cedula_p]'";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Ha ocurrido un error al eliminar una persona");
        }

        header("Location: ./index_p.php");

    }
        


?>