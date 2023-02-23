<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
    para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
    para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title> Editar detalle </title>
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

    <div class="container mt-3">

        <div class ="col-6 px-2">

            <div class="card text-dark bg-info mb-3">

                <div class="card-header">
                    Editar detalle
                </div>

                <div class="card card-body">

                    <form action="./update_d.php" method="POST">

                        <div class="form-group">
                            <input type="text" value='<?=$_GET["radicado_c"];?>' name="radicado_c" id="radicado_c" class="form-control" hidden>
                        </div>

                        <div class="form-group">
                            <input type="text" value='<?=$_GET["ciudad_inmueble_d"];?>' name="ciudad_old" id="ciudad_old" class="form-control" hidden>
                        </div>

                        <div class="form-group">
                            <input type="text" value='<?=$_GET["dir_inmueble_d"];?>' name="direccion_old" id="direccion_old" class="form-control" hidden>
                        </div>

                        <div class="form-group">
                            <label for=""> Duracion </label>
                            <input type="text" value='<?=$_GET["duracion_d"];?>' name="duracion_d" id="duracion_d" class="form-control">
                        </div>

                        <div id="selectInmuebles" class="form-group">
                            <label for="exampleFormControlSelect2"> Inmuebles </label>
                            <select name="identificacion_i" id="identificacion_i" multiple class="form-control" id="exampleFormControlSelect2">
                                <?php
                                require("./select_ic.php");

                                if($resultado){
                                    foreach ($resultado as $fila){
                                ?>
                                        <?php
                                        $lista = array();  
                                        array_push($lista, $fila['direccion'], $fila['ciudad']);

                                        $string = implode(',', $lista);

                                        ?>
                                        <option value=<?= $string ;?>>   <!-- valor que va a tomar identificacion_i -->
                                        <b>Direccion:</b> <?=$fila['direccion'];?>
                                        <b> - Ciudad: </b><?=$fila['ciudad'];?>
                                        </option>
                                
                                <?php
                                    }
                                }
                                else{
                                    echo "No se encuentran inmuebles registrados";
                                }
                                ?>    
                                    
                            </select>
                        </div>
                        
                        <button class="btn btn-primary" title="Guardar contrato" type="submit">
                        <i class="fas fa-share-square"></i>  Guardar detalle </button>

                    </form>

                </div>
                
            </div>

        </div>
    
    </div>




   </body>

</html>