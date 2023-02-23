<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title> Busquedas </title>
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

    <!-- Menu de navegacion -->
    <ul class="nav">
        <li class="nav nav-item">
            <a class="nav-link" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../personas/index_p.php">Personas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../empresas/index_e.php"> Empresas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contratos/index_c.php">Contratos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../inmuebles/index_i.php"> Inmuebles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../consultas/index_con.php">Consultas</a>
        </li>
        <li class="nav-pills">
            <a class="nav-link active" href="./index_b.php">Busquedas</a>
        </li>
    </ul>

    <div class="container">

        <div class="row">

            <div class="card text-white bg-info mb-3" style="width:600px;">

                <div class="card-header">
                    Búsqueda #1
                </div>

                <div class="card card-body text-dark">
                    <form action ="./busqueda1.php" method="post" target="_blank">
                            
                        <p> La siguiente búsqueda encuentra todos los contratos donde la persona de la cédula ingresada
                        ha arrendado el inmueble asociado a los datos ingresados. </p>
                        
                        <label for="cedula_php"> <strong> Persona </strong> </label>
                        <div class ="form-group">
                            <label for="cedula_p"> Cédula: </label>
                            <input type ="text" name ="cedula_p" id = "cedula_p" class ="form-control">
                        </div>
                        <label for="cedula_php"> <strong> Inmueble </strong> </label>
                        <div class ="form-group">
                            <label for="ciudad_i"> Ciudad: </label>
                            <input type ="text" name ="ciudad_i" id = "ciudad_i" class ="form-control">
                        </div>
                        <div class ="form-group">
                            <label for="direccion_i"> Dirección: </label>
                            <input type ="text" name ="direccion_i" id = "direccion_i" class ="form-control">
                        </div>
        
                        <input type="submit" class="btn btn-success"  name ="enviar_c1" id="enviar_c1" value ="Realizar búsqueda">
            
                    </form>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="card text-white bg-info mb-3" style="width:600px;">

                <div class="card-header">
                    Búsqueda #2
                </div>

                <div class="card card-body text-dark">
                    <form action ="./busqueda2.php" method="post" target="_blank">
                            
                        <p> La siguiente búsqueda encuentra el número de días que ha sido arrendado cada inmueble
                            por la empresa asociada al nit ingresado considerando solo contratos realizados
                            entre las fechas ingresadas.
                         </p>
                        
                        <div class ="form-group">
                            <label for="nit"> NIT: </label>
                            <input type ="text" name ="nit" id = "nit" class ="form-control">
                        </div>
                        <div class ="form-group">
                            <label for="fecha_i"> Fecha inicial: </label>
                            <input type ="date" name ="fecha_i" id = "fecha_i" class ="form-control">
                        </div>
                        <div class ="form-group">
                            <label for="fecha_f"> Fecha final: </label>
                            <input type ="date" name ="fecha_f" id = "fecha_f" class ="form-control">
                        </div>
        
                        <input type="submit" class="btn btn-success"  name ="enviar_c1" id="enviar_c1" value ="Realizar búsqueda">
            
                    </form>
                </div>
            </div>

        </div>

    </div>
    
  </body>

</html>