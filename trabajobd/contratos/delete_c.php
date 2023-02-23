<?php

    require("../conexion.php");

    if(isset($_POST['radicado'])){

        $query = "DELETE FROM `contrato` WHERE radicado = '$_POST[radicado]'";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Ha ocurrido un error al eliminar un contrato");
        }

        header("Location: ./index_c.php");

    }
        


?>