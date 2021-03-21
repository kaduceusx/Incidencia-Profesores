
<div class="content-wrapper">
    
  <section class="content-header">

    <h1>
      Administrar partes de trabajo
    </h1>

    

  </section>

  
  <section class="content">

    
    <div class="box">

      <div class="box-header with-border">
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarParte">Agregar parte</button>

      </div>


      <!--=====================================
        MOSTRAR PARTES
      ======================================-->

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tabla ">

          <thead>
          
            <tr >
            
              <th style="width:10px" >#</th>
              <th style="width:11%">Fecha</th>
              <th>Profesor</th>
              <th style="width:10px">Clase</th>
              <th>Incidencia</th>
              <th>Observaciones</th>
              <th>Resolucion</th>
              <th style="width:10px">Estado actual</th>
              <th style="width:15%">Acciones</th>

            </tr>

          </thead>


          <tbody>


          <?php

            $item = null;

            $valor = null;

            $partes = ControladorPartes::ctr_mostrarPartes($item, $valor);

            foreach ($partes as $key => $value) {


              echo '<tr>

                <td>' . $value["id"] .'</td>';


                date_default_timezone_set("Europe/Madrid");

                setlocale(LC_ALL, 'spanish');

                //setlocale(LC_ALL, 'es_ES');

                $fecha = $value["fecha"]; //2020-09-08 00:00:00

                $tiempoLocal = strftime("%A, %d de %B del %Y a las %H: %M: %S", strtotime($fecha));





                





                


               
                echo '<td>' .$tiempoLocal . " " . '</td>'; 
              
                echo '<td>' . $value["profesor"] . '</td>' ;

                echo '<td>' . $value["clase"] . '</td>' ;

                echo '<td>' . $value["incidencia"] . '</td>' ;

                echo '<td>' . $value["partes"] . '</td>' ;

                echo '<td>' . $value["resolucion"] . '</td>' ;
                
                //echo mb_convert_encoding(strftime("%A, %d de %B",strtotime($fecha)), 'UTF-8', mb_internal_encoding());


                if($value["estado"] !=0){

                  echo '<td><button class="btn btn-success btn-xs btnActivarParte" idParte="'.$value["id"].'" estadoParte="0">Abierta</button></td>';

                }else{

                  echo '<td><button class="btn btn-danger btn-xs btnActivarParte" idParte="'.$value["id"].'" estadoParte="1">Cerrada</button></td>';

                }

             
                

                echo '<td>
                  
                      <div class="btn-group">

                        <button style="margin:5px" class="btn btn-warning btn_editarParte" idParte="'.$value["id"].'" data-toggle="modal" data-target="#modal_editarParte"><i class="fa fa-pencil"></i></button>

                        <button style="margin:5px" class="btn btn-danger btn_eliminarParte" idParte="'.$value["id"]. '" nombreParte="'.$value["partes"].'"><i class="fa fa-times"></i></button>

                        <button style="margin:5px" class="btn btn-info btn_enviarParte" idParte="'.$value["id"].'" data-toggle="modal" data-target="#modal_enviarParte"><i class="fa fa-envelope-square"></i></button>




                      </div>

                    </td>
    
              </tr>';

            
              
              

            }

          ?>
          
          
          </tbody>
       
        </table>

      </div>
      
    </div>
    

  </section>
 
</div>



<!--=====================================
MODAL AGREGAR PARTE
======================================-->

<div id="modal_agregarParte" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar parte</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" >

          <div class="box-body">



            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group" >
                
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 

                <?php  
                
                  date_default_timezone_set("Europe/Madrid");

                  setlocale(LC_TIME, 'spanish');

                  $fecha = date("Y-m-d");

                  $tiempoLocal = strftime("%A, %d de %B del %Y", strtotime($fecha));
      
                  $hora = date(" H:i:s");

                
                 
                ?>
               

                <input type="date" class="form-control input-lg" id="nuevoFecha"  name="nuevoFecha" value="<?php echo $fecha ?>" readonly required  >

                <input type="text" class="form-control input-lg" id="nuevoLocal"  name="nuevoLocal" value="<?php echo $tiempoLocal . $hora ?>" readonly  required> 

                <input type="hidden" class="form-control input-lg" id="nuevoHora"  name="nuevoHora" value="<?php echo $hora ?>" readonly  required> 

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR PROFESOR -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <select class="form-control input-lg" name="nuevoProfesor" required>
                    
                  <option value="">Selecionar profesor</option>

                  <?php

                    $item = null;

                    $valor = null;

                    $profesores= ControladorProfesores::ctr_mostrarProfesores($item, $valor);

                    
                    foreach ($profesores as $key => $value) {

                      echo '<option value="'.$value["profesor"].'"> '.$value["profesor"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA AGREGAR CLASE -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span> 

                <select class="form-control input-lg" name="nuevoClase" required>
                    
                  <option value="">Selecionar clase</option>

                  <?php

                    $item = null;

                    $valor = null;

                    $clases= ControladorClases::ctr_mostrarClases($item, $valor);

                    
                    foreach ($clases as $key => $value) {

                      echo '<option value="'.$value["clase"].'"> '.$value["clase"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>


           




            <!-- ENTRADA PARA AGREGAR INCIDENCIA -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-warning"></i></span> 

                <select class="form-control input-lg" name="nuevoIncidencia" required>
                    
                  <option value="">Selecionar incidencia</option>

                  <?php

                    $item = null;

                    $valor = null;

                    $incidencias= ControladorIncidencias::ctr_mostrarIncidencias($item, $valor);

                    
                    foreach ($incidencias as $key => $value) {

                      echo '<option value="'.$value["incidencia"].'"> '.$value["incidencia"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>




            <!-- ENTRADA PARA AGREGAR OBSERVACIONES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 
                  
                <textarea class="form-control input-lg" name="nuevoObservacion" rows="5" cols="10" maxlength="80" placeholder="Observaciones: " ></textarea>

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR RESOLUCION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span> 
                  
                <textarea class="form-control input-lg" name="nuevoResolucion" rows="5" cols="10" maxlength="80" placeholder="Resoluciones: " ></textarea>

              </div>

            </div>




          </div>
          

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="guardar_parte">Guardar parte</button>

        </div>

        <?php

          $crearParte = new ControladorPartes();
          $crearParte -> ctr_crearParte();

        ?>

      </form>

    </div>

  </div>

</div>





<!--=====================================
MODAL EDITAR PARTE
======================================-->

<div id="modal_editarParte" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar parte</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" >

          <div class="box-body">


            <!-- ENTRADA PARA EL ID -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span> 

                <input type="text" class="form-control input-lg" name="editarId" value="" id="editarId" readonly>

              </div>

            </div>



            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group" >
                
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 

                <?php
                  
                  date_default_timezone_set("Europe/Madrid");

                  setlocale(LC_TIME, 'spanish');

                ?>

                <input type="date" class="form-control input-lg" id="editarFecha"  name="editarFecha" value=""  required >

                <input type="text" class="form-control input-lg" id="editarHora"  name="editarHora" value=""  >

           
                

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR PROFESOR -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <select class="form-control input-lg" name="editarProfesor">

                  <option value="" id="editarProfesor"></option>

                  <?php

                    $item = null;

                    $valor = null;

                    $profesores= ControladorProfesores::ctr_mostrarProfesores($item, $valor);

                    
                    foreach ($profesores as $key => $value) {

                      echo '<option value="'.$value["profesor"].'"> '.$value["profesor"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA AGREGAR CLASE -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span> 

                <select class="form-control input-lg" name="editarClase">
                    
                <option value="" id="editarClase"></option>

                  <?php

                    $item = null;

                    $valor = null;

                    $clases= ControladorClases::ctr_mostrarClases($item, $valor);

                    
                    foreach ($clases as $key => $value) {

                      echo '<option value="'.$value["clase"].'"> '.$value["clase"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR INCIDENCIA -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-warning"></i></span> 

                <select class="form-control input-lg" name="editarIncidencia">
                    
                <option value="" id="editarIncidencia"></option>

                  <?php

                    $item = null;

                    $valor = null;

                    $incidencias= ControladorIncidencias::ctr_mostrarIncidencias($item, $valor);

                    
                    foreach ($incidencias as $key => $value) {

                      echo '<option value="'.$value["incidencia"].'"> '.$value["incidencia"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>




            <!-- ENTRADA PARA AGREGAR OBSERVACIONES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 
                  
                <textarea class="form-control input-lg" name="editarObservacion" id="editarObservacion" rows="5" cols="10" maxlength="80" ></textarea>

              </div>

            </div>


            <!-- ENTRADA PARA AGREGAR RESOLUCIONES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span> 
                  
                <textarea class="form-control input-lg" name="editarResolucion" id="editarResolucion" rows="5" cols="10" maxlength="80" ></textarea>

              </div>

            </div>




          </div>
          

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="modificar_parte">Modificar parte</button>

        </div>

        <?php

          $editarParte = new ControladorPartes();
          $editarParte -> ctr_editarParte();

        ?>

      </form>

    </div>

  </div>

</div>









<!--=====================================
MODAL ENVIAR PARTE
======================================-->

<div id="modal_enviarParte" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Enviar Parte Por Correo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" >

          <div class="box-body">


            <!-- ENTRADA PARA EL ID -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-id-card"></i></span> 

                <input type="text" class="form-control input-lg" name="enviarId" value="" id="enviarId" readonly>

              </div>

            </div>



            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group" >
                
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 

                <?php
                  
                  date_default_timezone_set("Europe/Madrid");

                  setlocale(LC_TIME, 'spanish');

                ?>

                <input type="date" class="form-control input-lg" id="enviarFecha"  name="enviarFecha" value=""  required >

                <input type="text" class="form-control input-lg" id="enviarHora"  name="enviarHora" value=""  >

           
                

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR PROFESOR -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <select class="form-control input-lg" name="enviarProfesor">

                  <option value="" id="enviarProfesor"></option>

                  <?php

                    $item = null;

                    $valor = null;

                    $profesores= ControladorProfesores::ctr_mostrarProfesores($item, $valor);

                    
                    foreach ($profesores as $key => $value) {

                      echo '<option value="'.$value["profesor"].'"> '.$value["profesor"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR EMAIL PROFESOR -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <select class="form-control input-lg" name="editarEmail">

                  <option value="" id="enviarEmail"></option>

                  <?php

                    $item = null;

                    $valor = null;

                    $profesores= ControladorProfesores::ctr_mostrarProfesores($item, $valor);

                    
                    foreach ($profesores as $key => $value) {

                      echo '<option value="'.$value["email"].'"> '.$value["email"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>





            <!-- ENTRADA PARA AGREGAR CLASE -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span> 

                <select class="form-control input-lg" name="enviarClase">
                    
                <option value="" id="enviarClase"></option>

                  <?php

                    $item = null;

                    $valor = null;

                    $clases= ControladorClases::ctr_mostrarClases($item, $valor);

                    
                    foreach ($clases as $key => $value) {

                      echo '<option value="'.$value["clase"].'"> '.$value["clase"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR INCIDENCIA -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-warning"></i></span> 

                <select class="form-control input-lg" name="enviarIncidencia">
                    
                <option value="" id="enviarIncidencia"></option>

                  <?php

                    $item = null;

                    $valor = null;

                    $incidencias= ControladorIncidencias::ctr_mostrarIncidencias($item, $valor);

                    
                    foreach ($incidencias as $key => $value) {

                      echo '<option value="'.$value["incidencia"].'"> '.$value["incidencia"].'</option>';  
                    
                    }
                  ?>

                </select>

              </div>

            </div>




            <!-- ENTRADA PARA AGREGAR OBSERVACIONES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 
                  
                <textarea class="form-control input-lg" name="enviarObservacion" id="enviarObservacion" rows="5" cols="10" maxlength="80" ></textarea>

              </div>

            </div>


            <!-- ENTRADA PARA AGREGAR RESOLUCIONES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span> 
                  
                <textarea class="form-control input-lg" name="enviarResolucion" id="enviarResolucion" rows="5" cols="10" maxlength="80" ></textarea>

              </div>

            </div>




          </div>
          

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="enviar_parte">Enviar parte</button>

        </div>

        <?php

          $enviarParte = new ControladorPartes();
          $enviarParte -> ctr_enviarParte();

        ?>

      </form>

    </div>

  </div>

</div>



<?php

  $borrarParte = new ControladorPartes();
  $borrarParte -> ctr_borrarParte();


?>


