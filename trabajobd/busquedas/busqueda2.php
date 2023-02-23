<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title> Busqueda 2 </title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <?php 

        require("../conexion.php");

        $nit = $_POST['nit'];
        $fecha_i = $_POST['fecha_i'];
        $fecha_f = $_POST['fecha_f'];

        $query_e = "SELECT nit FROM `empresa` WHERE nit = $nit";
    
        $query_c = "SELECT dir_inmueble, ciudad_inmueble, SUM(duracion) AS dias
        FROM detalle
        WHERE r_contrato in (SELECT radicado
                                FROM contrato
                                WHERE (n_empresa = $nit AND fecha_realizacion > '$fecha_i' AND fecha_realizacion < '$fecha_f')
                            )
        GROUP BY dir_inmueble, ciudad_inmueble";

        $resultado_e = mysqli_query($conn, $query_e);
        $resultado_c = mysqli_query($conn, $query_c);

        if(mysqli_num_rows($resultado_e) == 0){
            die("La empresa no existe.");
        }
        if(mysqli_num_rows($resultado_c) == 0){
            die("No registra contratos.");
        }
        else{ ?>

            <table class="table border-rounded">
                <thead class="thead ">
                    <tr>
                        <th> Dirección </th>
                        <th> Ciudad </th>
                        <th> Días </th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        
                        foreach ($resultado_c as $e){ ?>
                            <tr>
                                <td><?=$e['dir_inmueble'];?></td>
                                <td><?=$e['ciudad_inmueble'];?></td>
                                <td><?=$e['dias'];?></td>
                            </tr>

                        <?php   
                        } 

                        ?>
                </tbody>
            </table>



        <?php
        } ?>

    
</html>