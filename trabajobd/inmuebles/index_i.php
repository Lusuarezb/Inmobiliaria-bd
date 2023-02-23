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

        <title> Inmuebles </title>
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
                <li class="nav-pills">
                    <a class="nav-link active" href="./index_i.php"> Inmuebles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../consultas/index_con.php">Consultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../busquedas/index_b.php">Busquedas</a>
                </li>
            </ul>

            <!-- Formulario insertar inmueble -->
            <div class="container pt-3">
            
            <div class="row">

                <?php
                if(isset($_GET["direccion_i"]) AND (isset($_GET["ciudad_i"]))){
                ?>

                <div class="col-6 px-2">

                    <div class="card text-dark bg-info mb-3" >

                        <div class="card-header">
                            Editar Inmueble
                        </div>

                        <div class="card card-body">
                        
                            <form action="update_i.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for=""> Direccion </label>
                                    <input type="text" name="direccion_i" value='<?=$_GET["direccion_i"];?>' id="direccion_i" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""> Ciudad </label>
                                    <input type="text" name="ciudad_i" value='<?=$_GET["ciudad_i"];?>' id="ciudad_i" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""> Direccion del cementerio mas cercano </label>
                                    <input type="text" name="direccion_cementerio_cercano" value=<?=$_GET["direccion_cementerio_cercano"];?> id="direccion_cementerio_cercano" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> Precio(Por dia) </label>
                                    <input type="text" name="precio_i" value=<?=$_GET["precio_i"];?> id="precio_i" class="form-control">
                                </div>
                                <div  name="taskOption" class="form-group">
                                    <label for="estado_i"> Estado  </label>
                                    <select class="form-control" onchange="cambioTipo(this)" name="estado_i" id="estado_i"> 
                                        <option value="Arrendado"> Arrendado </option>
                                        <option value="Disponible"> Disponible </option>
                                    </select>
                                </div>
                                <div  name="taskOption2" class="form-group">
                                    <label for="tipo_i"> Tipo  </label>
                                    <select class="form-control" onchange="cambioTipo(this)" name="tipo_i" id="tipo_i"> 
                                        <option value="Lote"> Lote </option>
                                        <option value="Apartamento"> Apartamento </option>
                                        <option value="Casa"> Casa </option>
                                        <option value="Apartaestudio"> Apartaestudio </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""> Cantidad de habitaciones </label>
                                    <input type="text" name="cantidad_habitaciones" value=<?=$_GET["cantidad_habitaciones"];?> id="cantidad_habitaciones" class="form-control">
                                </div>
                                <div  name="taskOption3" class="form-group">
                                    <label for="estrato_i"> Estrato </label>
                                    <select class="form-control" onchange="cambioTipo(this)" name="estrato_i" id="estrato_i">
                                        <option value=1> 1 </option>
                                        <option value=2> 2 </option>
                                        <option value=3> 3 </option>
                                        <option value=4> 4 </option>
                                        <option value=5> 5 </option>
                                        <option value=6> 6 </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Guardar">
                                    <a href="./index_i.php" class="btn btn-danger"> Descartar </a>
                                    
                                </div>

                            </form>

                        </div>

                    </div>

                </div>


                <?php
                }
                else{
                ?>

                <div class="col-6 px-2">

                    <div class="card text-dark bg-info mb-3" >

                        <div class="card-header">
                            Añadir Inmueble
                        </div>

                        <div class="card card-body">

                            <form action ="./insert_i.php" method="POST">
                                <div class ="form-group">
                                    <label for="direccion_i"> Direccion </label>
                                    <input type ="text" name ="direccion_i" id ="direccion_i" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="ciudad_i"> Ciudad </label>
                                    <input type ="text" name ="ciudad_i" id = "ciudad_i" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="dir_cem_cercano"> Direccion del cementerio mas cercano </label>
                                    <input type ="text" name ="dir_cem_cercano" id = "dir_cem_cercano" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="precio_i"> Precio(Por dia)  </label>
                                    <input type ="text" name ="precio_i" id = "precio_i" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="estado_i"> Estado </label>
                                    <input type ="text" name ="estado_i" id = "estado_i" class ="form-control" value ="Disponible" readonly>
                                </div>
                                
                                <div  name="taskOption" class="form-group">
                                    <label for="tipo_i"> Tipo  </label>
                                    <select class="form-control" onchange="cambioTipo(this)" name="tipo_i" id="tipo_i"> 
                                        <option value="Lote"> Lote </option>
                                        <option value="Apartamento"> Apartamento </option>
                                        <option value="Casa"> Casa </option>
                                        <option value="Apartaestudio"> Apartaestudio </option>
                                    </select>
                                </div>

                                <div class ="form-group">
                                    <label for="cantidad_habitaciones"> Cantidad de habitaciones </label>
                                    <input type ="text" name ="cantidad_habitaciones" id = "cantidad_habitaciones" class ="form-control">
                                </div>

                                <div  name="taskOption2" class="form-group">
                                    <label for="estrato_i"> Estrato </label>
                                    <select class="form-control" onchange="cambioTipo(this)" name="estrato_i" id="estrato_i">
                                        <option value=1> 1 </option>
                                        <option value=2> 2 </option>
                                        <option value=3> 3 </option>
                                        <option value=4> 4 </option>
                                        <option value=5> 5 </option>
                                        <option value=6> 6 </option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-success" name ="enviar_i" id="enviar_i" value="Enviar">
                                <a href="./index_i.php" class="btn btn-primary" > Limpiar campos </a> 
                            </form>

                        </div>


                    </div>


                </div>
                <?php
                }
                ?>
                <!-- Tabla para mostrar inmuebles -->
                <div class="row">
                
                    <table class="table table-striped">

                        <thead class="thead-dark">
                            <tr>
                                <th> Direccion </th>
                                <th> Ciudad </th>
                                <th> Direccion del cementerio mas cercano </th>
                                <th> Precio </th>
                                <th> Estado </th>
                                <th> Tipo </th>
                                <th> Cantidad de habitaciones </th>
                                <th> Estrato </th>
                                <th> Eliminar </th>
                                <th> Editar </th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <?php 
                            require('select_i.php');
                            if($resultado){
                                foreach ($resultado as $fila){
                            ?>
                            <tr>
                                <td><?=$fila['direccion'];?></td>
                                <td><?=$fila['ciudad'];?></td>
                                <td><?=$fila['direccion_cementerio_cercano'];?></td>
                                <td><?=$fila['precio'];?></td>
                                <td><?=$fila['estado'];?></td>
                                <td><?=$fila['tipo'];?></td>
                                <td><?=$fila['cantidad_habitaciones'];?></td>
                                <td><?=$fila['estrato'];?></td>

                                <td>

                                    <form action="delete_i.php" method="POST">
                                        <input type="text" name="direccion_i" value=<?=$fila['direccion'];?> hidden>
                                        <input type="text" name="ciudad_i" value=<?=$fila['ciudad'];?> hidden>
                                        <button class="btn btn-danger" title="Eliminar"  type="submit">
                                        <i class="fas fa-trash"></i>
                                    </form>

                                </td>

                                <td class="mx-0 pr-2">
                                    <form action="index_i.php" method="GET">

                                        <input type="text" name="direccion_i" value='<?=$fila['direccion'];?>' hidden>
                                        <input type="text" name="ciudad_i" value=<?=$fila['ciudad'];?> hidden>  
                                        <input type="text" name="direccion_cementerio_cercano" value='<?=$fila['direccion_cementerio_cercano'];?>' hidden>
                                        <input type="text" name="precio_i" value='<?=$fila['precio'];?>' hidden>
                                        <input type="text" name="estado_i" value='<?=$fila['estado'];?>' hidden>
                                        <input type="text" name="tipo_i" value='<?=$fila['tipo'];?>' hidden>
                                        <input type="text" name="cantidad_habitaciones" value='<?=$fila['cantidad_habitaciones'];?>' hidden>
                                        <input type="text" name="estrato_i" value='<?=$fila['estrato'];?>' hidden>

                                        <button class="btn btn-primary" title="Editar" type="submit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </form>
                                </td>

                            </tr>
                            <?php                    

                                }
                            }
                                
                            ?>

                        </tbody>

                    </table>

                </div>
            
            </div>

        </div>

    </body>

</html>