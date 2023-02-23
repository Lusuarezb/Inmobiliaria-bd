<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title> Consulta1 </title>
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

    <table class="table border-rounded">
        <thead class="thead ">
            <tr>
                <th> Cedula </th>
                <th> Nombre </th>
            </tr>
        </thead>

        <tbody>
            <?php 

                require("../conexion.php");

                $query = "SELECT cedula, nombre
                FROM persona
                WHERE cedula in(SELECT c_persona
                                FROM contrato
                                WHERE radicado in (SELECT r_contrato
                                                    FROM (SELECT r_contrato, COUNT(*) AS Num
                                                    FROM detalle 
                                                    WHERE (duracion >= 30) 
                                                    GROUP BY r_contrato) as t1 
                                                    NATURAL JOIN  
                                                    (SELECT r_contrato, COUNT(*) AS Num
                                                    FROM detalle 
                                                    GROUP BY r_contrato) as t2  
                                                  )
                                GROUP BY c_persona
                                HAVING COUNT(*) >= 2
                                )";

                $resultado = mysqli_query($conn, $query);

                if(!$resultado){
                    echo "Ha ocurrido un errro al realizar la consulta";
                }
                else{
                    foreach ($resultado as $e){ ?>
                        <tr>
                            <td><?=$e['cedula'];?></td>
                            <td><?=$e['nombre'];?></td>
                        </tr>

                    <?php   
                    }
                }
            ?>
        </tbody>

</html>