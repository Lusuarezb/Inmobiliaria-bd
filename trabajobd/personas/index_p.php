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

        <title> Personas </title>
    </head>
    <body>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        

        <!-- Menu de navegacion -->
        <ul class="nav">
            <li class="nav nav-item">
                <a class="nav-link" href="../index.php">Inicio</a>
            </li>
            <li class="nav nav-pills">
                <a class="nav-link active" href="./index_p.php">Personas</a>
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
            <li class="nav-item">
                <a class="nav-link" href="../busquedas/index_b.php">Busquedas</a>
            </li>
        </ul>
        
        <!-- Formulario insertar persona -->
        <div class="container mt-3">
        
            <div class="row">

                <?php
                if(isset($_GET["cedula_p"])){
                ?>

                <div class="col-6 px-2">

                    <div class="card text-dark bg-info mb-3">

                        <div class="card-header">
                            Editar Persona
                        </div>

                        <div class="card card-body">
                        
                            <form action="update_p.php" class="form-group" method="post">
                                <div class="form-group">
                                    <label for=""> Cedula </label>
                                    <input type="text" name="cedula_p" value='<?=$_GET["cedula_p"];?>' id="cedula_p" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""> Nombre </label>
                                    <input type="text" name="nombre_p" value='<?=$_GET["nombre_p"];?>' id="nombre_p" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> Celular </label>
                                    <input type="text" name="telefono_p" value=<?=$_GET["telefono_p"];?> id="telefono_p" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> Correo electronico </label>
                                    <input type="text" name="correo_electronico_p" value=<?=$_GET["correo_electronico_p"];?> id="correo_electronico_p" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> Direccion </label>
                                    <input type="text" name="direccion_p" value=<?=$_GET["direccion_p"];?> id="direccion_p" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Guardar">
                                    <a href="./index_p.php" class="btn btn-danger"> Descartar </a>
                                    
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

                    <div class="card text-dark bg-info mb-3">

                        <div class="card-header">
                            Añadir Persona
                        </div>

                        <div class="card card-body">

                            <form action ="./insert_p.php" class="form-group" method="post">
                                <div class ="form-group">
                                    <label for="ceedula_php"> Cedula </label>
                                    <input type ="text" name ="cedula_p" id = "cedula_p" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="nombre_p"> Nombre </label>
                                    <input type ="text" name ="nombre_p" id ="nombre_p" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="telefono_p"> Celular </label>
                                    <input type ="text" name ="telefono_p" id = "telefono_p" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="correo_p"> Correo electronico </label>
                                    <input type ="text" name ="correo_p" id = "correo_p" class ="form-control">
                                </div>
                                <div class ="form-group">
                                    <label for="direccion_p"> Direccion </label>
                                    <input type ="text" name ="direccion_p" id = "direccion_p" class ="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" name = "enviar_p" id ="enviar_p" value="Enviar">
                                    <a href="./index_p.php" class="btn btn-primary"> Limpiar campos </a>
                                </div> 

                            </form>

                        </div>


                    </div>


                </div>
                <?php
                }
                ?>
                
                <!-- Tabla para mostrar personas -->
                <div class="col-6 px-2">
                
                    <table class="table table-striped">

                        <thead class="thead-dark">
                            <tr>
                                <th> Cedula </th>
                                <th> Nombre </th>
                                <th> Celular </th>
                                <th> Correo electronico </th>
                                <th> Direccion </th>
                                <th> Eliminar </th>
                                <th> Editar </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            require('select_p.php');
                            if($resultado){
                                foreach ($resultado as $fila){
                            ?>
                            <tr>
                                <td><?=$fila['cedula'];?></td>
                                <td><?=$fila['nombre'];?></td>
                                <td><?=$fila['celular'];?></td>
                                <td><?=$fila['correo_electronico'];?></td>
                                <td><?=$fila['direccion'];?></td>

                                <td>

                                    <form action="delete_p.php" method="POST">
                                        <input type="text" name="cedula_p" value=<?=$fila['cedula'];?> hidden>
                                        <button class="btn btn-danger" title="Eliminar" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </form>

                                </td>

                                <td class="mx-0 pr-2">
                                    <form action="index_p.php" method="GET">
                                        
                                        <input type="text" name="cedula_p" value=<?=$fila['cedula'];?> hidden>
                                        <input type="text" name="nombre_p" value='<?=$fila['nombre'];?>' hidden>
                                        <input type="text" name="telefono_p" value='<?=$fila['celular'];?>' hidden>
                                        <input type="text" name="correo_electronico_p" value='<?=$fila['correo_electronico'];?>' hidden>
                                        <input type="text" name="direccion_p" value='<?=$fila['direccion'];?>' hidden>

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