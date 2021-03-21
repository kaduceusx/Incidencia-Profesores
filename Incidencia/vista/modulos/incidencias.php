<div class="content-wrapper">
    
  <section class="content-header">

    <h1>
      Administrar incidencias
    </h1>

    

  </section>

  
  <section class="content">

    
    <div class="box">

      <div class="box-header with-border">
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarIncidencia">Agregar incidencia</button>

      </div>


      <!--=====================================
        MOSTRAR INCIDENCIAS
      ======================================-->

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tabla "  style="width:70%">

          <thead>
          
            <tr >
            
              <!-- <th style="width:10px" >#</th> -->
              <th style="width:10px">Id</th>
              <th>Nombre de la incidencia</th>
              <th style="width:200px">Estado actual incidencia</th>
              <th style="width:5px">Acciones</th>

            </tr>

          </thead>


          <tbody>


          <?php

            $item = null;

            $valor = null;

            $incidencias = ControladorIncidencias::ctr_mostrarIncidencias($item, $valor);

            foreach ($incidencias as $key => $value) {


              echo '<tr>

                <td>' . $value["id_incidencia"] .'</td>';

              

                echo '<td>' . $value["incidencia"] .'</td>';

              

                if($value["estado"] !=0){

                  echo '<td><button class="btn btn-success btn-xs btnActivarIncidencia" idIncidencia="'.$value["id_incidencia"].'" estadoIncidencia="0">Abierta</button></td>';

                }else{

                  echo '<td><button class="btn btn-danger btn-xs btnActivarIncidencia" idIncidencia="'.$value["id_incidencia"].'" estadoIncidencia="1">Cerrada</button></td>';

                }

             
                

                echo '<td>
                  
                      <div class="btn-group">

                        <button class="btn btn-warning btn_editarIncidencia" idIncidencia="'.$value["id_incidencia"].'" data-toggle="modal" data-target="#modal_editarIncidencia"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btn_eliminarIncidencia" idIncidencia="'.$value["id_incidencia"]. '" nombreIncidencia="'.$value["incidencia"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR INCIDENCIA
======================================-->

<div id="modal_agregarIncidencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar incidencia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" >

          <div class="box-body">

         


            <!-- ENTRADA PARA SELECCIONAR INCIDENCIA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-warning"></i></span> 
                  
                <textarea class="form-control input-lg" name="nuevoIncidencia" rows="5" cols="10" maxlength="80" placeholder="*Nombre de la incidencia: " required></textarea>


              </div>

            </div>






          </div>
          

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="guardar_incidencia">Guardar incidencia</button>

        </div>

        <?php

          $crearIncidencia = new ControladorIncidencias();
          $crearIncidencia -> ctr_crearIncidencia();

        ?>

      </form>

    </div>

  </div>

</div>





<!--=====================================
MODAL EDITAR INCIDENCIA
======================================-->

<div id="modal_editarIncidencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar incidencia</h4>

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


            <!-- ENTRADA PARA EDITAR INCIDENCIA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-warning"></i></span> 

                <textarea class="form-control input-lg" name="editarIncidencia" id="editarIncidencia" rows="5" cols="10" maxlength="80"></textarea>   

              </div>

            </div>




          </div>
          

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="modificar_incidencia">Modificar incidencia</button>

        </div>

        <?php

          $editarIncidencia = new ControladorIncidencias();
          $editarIncidencia -> ctr_editarIncidencia();

        ?>

      </form>

    </div>

  </div>

</div>



<?php

  $borrarIncidencia = new ControladorIncidencias();
  $borrarIncidencia -> ctr_borrarIncidencia();


?>


