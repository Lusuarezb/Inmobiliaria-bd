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

    <title> Contratos </title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

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
        <li class="nav-pills">
            <a class="nav-link active" href="./index_c.php">Contratos</a>
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


    <div class="container-fluid mt-3">

      <div class="row">

      <?php
      if(isset($_GET["radicado"])){
        $radicado_editar = $_GET["radicado"];
      ?>

      <div class="col-7 px-2">

        <div class="card text-dark bg-info mb-3">

          <div class="card-header">
              Editar Contrato
          </div>

          <div class="card card-body">

            <form action="./update_c.php" method="POST">
              <div class ="form-group">
                <label for="radicado"> Radicado </label>
                  <input type ="text"  value='<?=$_GET["radicado"];?>' readonly name ="radicado" id ="radicado" class ="form-control">
              </div>

              <div class="form-group">
                <label for=""> Fecha Realizacion </label>
                  <input type="date" value='<?=$_GET["fecha_realizacion"];?>' name="fecha_realizacion" id="fecha_realizacion" class="form-control">
              </div>
              
              <button class="btn btn-primary" title="Guardar contrato" type="submit">
              <i class="fas fa-share-square"> Guardar contrato </i> </button>
              <a href="./index_c.php" class="btn btn-danger"> <i class="fas fa-window-close"></i> Descartar </a>

            </form>

  
              

            <div class="card-title">
              <h1> Detalles </h1>
            </div>
                
        

            
              <!-- tabla editar -->

              <?php $lista_detalles = array(); ?>
              <table class="table table-striped" id ="tabla" nombre ="tabla">

                <thead class="thead-dark">
                  <tr>
                      <th>  Duracion </th>
                      <th>  Dir. inmueble </th>
                      <th>  C. inmueble </th>
                      <th> Editar </th>
                  </tr>
                </thead>
                
                <tbody>
                  
                  <?php 

                  require("../conexion.php");

                  $query="SELECT duracion, dir_inmueble, ciudad_inmueble
                  FROM detalle
                  WHERE r_contrato = '$radicado_editar'";

                  $resultado = mysqli_query($conn, $query)  or die(mysqli_error($conn));

                  if($resultado){
                    foreach ($resultado as $fila){
                      $dir = $fila['dir_inmueble'];
                  ?>
                  <tr>
                    <td><?=$fila['duracion'];?></td>
                    <td><?=$fila['dir_inmueble'];?></td>
                    <td><?=$fila['ciudad_inmueble'];?></td>
        

                    <td>

                      <form action="./index_d.php" method="GET">

                        <input type="text" name="duracion_d" value=<?=$fila['duracion']; ?> hidden>
                        <input type="text" name="dir_inmueble_d" value='<?=$fila['dir_inmueble'];?>' hidden>
                        <input type="text" name="ciudad_inmueble_d" value='<?=$fila['ciudad_inmueble'];?>' hidden>
                        <input type="text" name="radicado_c" value='<?= $_GET['radicado'];?>' hidden>

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


        <?php
        }
        else{
        ?>

        <div class="col-7 px-2">

          <div class="card text-dark bg-info mb-3">

            <div class="card-header">
                Añadir Contrato
            </div>

            <div class="card card-body">

              <form action ="./insert_c.php" method="post">
                <div class ="form-group">
                  <label for="radicado"> Radicado </label>
                    <input type ="text" name ="radicado" id ="radicado" class ="form-control">
                </div>

                <input type="hidden" name ="lista_exportar" id="lista_exportar">

                <div class="form-group">
                  <label for=""> Fecha Realizacion </label>
                    <input type="date" name="fecha_realizacion" id="fecha_realizacion" class="form-control">
                </div>

                <div class="form-group">
                  <label for=""> Tipo de cliente: </label>
                  <div class="form-check">
                    <input class="form-check-input" onclick="cambioCliente(this);" type="radio" name="radio_c" id="radio_c" value="empresa" checked>
                    <label class="form-check-label" for="radio_c">
                      Empresa
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input"  onclick="cambioCliente(this);" type="radio" name="radio_c" id="radio_c" value="persona">
                    <label class="form-check-label" for="radio_c">
                      Persona
                    </label>
                  </div>
                </div>

                <div id="selectPersonas" class="form-group">
                  <label for="exampleFormControlSelect2"> Personas </label>
                  <select name="identificacion" id="identificacion" multiple class="form-control" id="exampleFormControlSelect2">
                      <?php
                      require("../personas/select_p.php");
                      if($resultado){
                          foreach ($resultado as $fila){
                      ?>
                            <option value=<?=$fila['cedula'];?>>   <!-- valor que va a tomar identificacion -->
                            <b>CC:</b> <?=$fila['cedula'];?>
                            <b> - Nombre: </b><?=$fila['nombre'];?>
                            <b> - Correo electronico: </b><?=$fila['correo_electronico'];?>
                            </option>
                      <?php
                          }
                      }
                      else{
                          echo "No se encuentran personas registradas";
                      }
          
                      ?>    
                        
                  </select>
                </div>

                <div id="selectEmpresas"  class="form-group">
                  <label for="exampleFormControlSelect2"> Empresas </label>
                  <select name="identificacion" id="ientificacion"  multiple class="form-control" id="exampleFormControlSelect2">
                      <?php
                      require("../empresas/select_e.php");
                      if($resultado){
                          foreach ($resultado as $fila){
                      ?>
                              <option value=<?=$fila['nit'];?>>
                                <b>Nit:</b> <?=$fila['nit'];?>
                                <b> - Nombre: </b><?=$fila['nombre'];?>
                                <b> - Correo electronico: </b><?=$fila['correo_electronico'];?>
                              </option>
                      <?php
                          }
                      }
                      else{
                          echo "No se encuentran empresas registradas";
                      }
          
                      ?>    
                        
                  </select>
                </div>
                
                <script>
                  $("#selectPersonas").hide();
                  function cambioCliente(myRadio) {
                      
                      
                      if(myRadio.value==="persona"){
                          
                          $("#selectPersonas").show();
                          $("#selectEmpresas").hide();
                      }
                      if(myRadio.value==="empresa"){
                          $("#selectPersonas").hide();
                          $("#selectEmpresas").show();
                      }
                      $("#identificacion").val('');
                  }
                </script>
                
                <div class="card-title">
                  <h1> Detalles </h1>
                </div>

                <div class="col-6 px-2">

                  <button type="button" class="btn btn-success" onclick="agregar_fila()"> Agregar detalle </button>
                  

                  <input type="submit" class="btn btn-success"  name ="enviar_c" id="enviar_c" value ="Agregar contrato">
                  
                </div>
                  
              </form>

              

              <form action ="" method="post">
                <div class ="form-group">
                  <label for="duracion"> Duracion </label>
                  <input type ="text" name ="duracion" id ="duracion"  class ="form-control">
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
                            array_push($lista, $fila['direccion'], $fila['ciudad'], $fila['precio']);

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
                

              </form>
              
              <!-- tabla añadir -->

              <?php $lista_detalles = array(); ?>
              <table class="table table-striped" id ="tabla" nombre ="tabla">
        
                <thead class="thead-dark">
                  <tr>
                      <th>  Duracion </th>
                      <th>  Dir. inmueble </th>
                      <th>  C. inmueble </th>
                      <th> Precio </th>
                      <th> Borrar </th>
                  </tr>
                </thead>
                
                <tbody>
                  

                  <script>
                  function borrar_fila(r) {
                    var i = r.parentNode.parentNode.rowIndex;
                    document.getElementById("tabla").deleteRow(i);
                    lista_exportar.splice(i-1,1);
                    var duracion_aux = lista_precios[i-1][0];
                    var precio_aux = lista_precios[i-1][1];

                    total = total - (duracion_aux * precio_aux);
                    lista_precios.splice(i-1,1);

                    document.getElementById('total_l').innerHTML = total;
                  }
                  </script>

                  <script type="text/javascript">
                    var lista_exportar = [];
                    var lista_precios = [];
                    var lista_detalles = [];
                    var total = 0;

                    function isArrayInArray(arr, item){
                      var item_as_string = JSON.stringify(item);

                      var contains = arr.some(function(ele){
                        return JSON.stringify(ele) === item_as_string;
                      });
                      return contains;
                    }

    
                    function agregar_fila() {
                      
                      var duracion = document.getElementById("duracion");
                      var inmueble = document.getElementById("identificacion_i");
                      var aux = inmueble.value.split(",");
                      var direccion = aux[0];
                      var ciudad = aux[1];
                      var precio = aux[2];
                      total =  total + (duracion.value * precio);

                      detalle = [ciudad, direccion];
                      
                      var item = isArrayInArray(lista_detalles, detalle);
                      if(!item){
                        lista_detalles.push(detalle);

                        lista_exportar.push({
                        duracion: duracion.value,
                        direccion,
                        ciudad
                      });
                      }
                      
                      lista_aux = [duracion.value, precio];

                      lista_precios.push(lista_aux);

                      var table = document.getElementById("tabla");

                      var row = table.insertRow(-1);

                      var cell1 = row.insertCell(0);
                      var cell3 = row.insertCell(1);
                      var cell4 = row.insertCell(2);
                      var cell5 = row.insertCell(3);
                      var cell6 = row.insertCell(4);
                      

                      cell1.innerHTML = duracion.value;
                      cell3.innerHTML = direccion;
                      cell4.innerHTML = ciudad;
                      cell5.innerHTML = precio;
                      cell6.innerHTML = '<button type="button" class="btn btn-danger" onclick="borrar_fila(this)"> <i class="fas fa-bomb"></i> </button>';
                      document.getElementById('total_l').innerHTML = total;
                    }
              
          
                    
                    $('#enviar_c').click( function() {
                      var lista = JSON.stringify(lista_exportar);
                      $('#lista_exportar').val(lista);
                          
                          }
                      );
                  </script>
                  <label name ><strong> Total: </strong></label>
                  <label name = "total_l" id = "total_l"> 0 </label>
                </tbody>
                
              </table>

            </div>

          </div>


        </div>
      

        <?php
        }
        ?>
        
        <!-- Tabla para mostrar contratos -->
        <div class="col-5 px-2">
                    
          <table class="table table-striped">

            <thead class="thead-dark">
              <tr>
                  <th> Radicado </th>
                  <th> Fecha realización</th>
                  <th> Cédula persona </th>
                  <th> NIT empresa</th>
                  <th> Eliminar </th>
                  <th> Editar </th>
              </tr>
            </thead>

            <tbody>
              <?php 
              require('./select_c.php');
              if($resultado){
                  foreach ($resultado as $fila){
              ?>
              <tr>
                  <td><?=$fila['radicado'];?></td>
                  <td><?=$fila['fecha_realizacion'];?></td>
                  <td><?=$fila['c_persona'];?></td>
                  <td><?=$fila['n_empresa'];?></td>

                  <td>

                      <form action="delete_c.php" method="POST">
                          <input type="text" name="radicado" value=<?=$fila['radicado'];?> hidden>
                          <button class="btn btn-danger" title="Eliminar" type="submit">
                          <i class="fas fa-trash"></i>
                      </form>

                  </td>

                  <td class="mx-0 pr-2">
                      <form action="index_c.php" method="GET">
                          
                          <input type="text" name="radicado" value=<?=$fila['radicado'];?> hidden>
                          <input type="date" name="fecha_realizacion" value='<?=$fila['fecha_realizacion'];?>' hidden>
                          <input type="text" name="c_persona" value='<?=$fila['c_persona'];?>' hidden>
                          <input type="text" name="n_empresa" value='<?=$fila['n_empresa'];?>' hidden>

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