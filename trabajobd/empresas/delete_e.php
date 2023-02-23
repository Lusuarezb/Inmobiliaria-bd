<?php

    require("../conexion.php");

    if(isset($_POST[nit_e])){

        $query = "DELETE FROM `empresa` WHERE nit = '$_POST[nit_e]'";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Ha ocurrido un error al eliminar una empresa");
        }

        header("Location: ./index_e.php");

    }
        


?>