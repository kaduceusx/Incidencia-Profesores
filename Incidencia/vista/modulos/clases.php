<div class="content-wrapper">
    
  <section class="content-header">

    <h1>
      Administrar clases
    </h1>

    

  </section>

  <section class="content">

    
    <div class="box">

      <div class="box-header with-border">
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarClase">Agregar clase</button>

      </div>


      <!--=====================================
        MOSTRAR CLASE
      ======================================-->

      <div class="box-body">

        <table  class="table table-bordered table-striped dt-responsive tabla " style="width:50%">

          <thead>
          
            <tr  >
            
              <!-- <th style="width:10px" >#</th> -->
              <th >Id</th>
              <th >Nombre de la clase</th>

              <th >Acciones</th>

            </tr>

          </thead>


          <tbody>


          <?php

            $item = null;

            $valor = null;

            $clases = ControladorClases::ctr_mostrarClases($item, $valor);

            foreach ($clases as $key => $value) {


              echo '<tr>

                <td>' . $value["id_clase"] .'</td>';

                echo '<td>' . $value["clase"] .'</td>';


                echo '<td>
                  
                      <div class="btn-group">

                        <button class="btn btn-warning btn_editarClase" idClase="'.$value["id_clase"].'" data-toggle="modal" data-target="#modal_editarClase"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btn_eliminarClase" idClase="'.$value["id_clase"]. '" nombreClase="'.$value["clase"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CLASE
======================================-->

<div id="modal_agregarClase" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar clase</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" >

          <div class="box-body">

             <!-- ENTRADA PARA EL CLASE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoClase" placeholder="*Ingrese nombre de la clase" id="nuevoClase" maxlength="40" required>

              </div>

            </div>


            

          </div>
          

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="guardar_clase">Guardar clase</button>

        </div>

        <?php

          $crearClase = new ControladorClases();
          $crearClase -> ctr_crearClase();

        ?>

      </form>

    </div>

  </div>

</div>





<!--=====================================
MODAL EDITAR CLASE
======================================-->

<div id="modal_editarClase" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar clase</h4>

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


             <!-- ENTRADA PARA LA CLASE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span> 

                <input type="text" class="form-control input-lg" name="editarClase" value="" id="editarClase">

              </div>

            </div>
          
            

            

            

          </div>

        </div>

        
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        
        <div class="modal-footer" >

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="modificar_clase">Modificar clase</button>

        </div>

        <?php

          $editarClase = new ControladorClases();
          $editarClase -> ctr_editarClase();
          

        ?>

      </form>

    </div>

  </div>

</div>



<?php

  $borrarClase = new ControladorClases();
  $borrarClase -> ctr_borrarClase();


?>


