<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $Db = "trabajobd1";
    $conn = mysqli_connect($host, $user, $pass, $Db);

    if(!$conn){
        die("Coneccion fallida a la base de datos");
    }


?>