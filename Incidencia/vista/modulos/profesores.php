<div class="content-wrapper">
    
  <section class="content-header">

    <h1>
      Administrar profesores
    </h1>

    

  </section>

  
  <section class="content">

    
    <div class="box">

      <div class="box-header with-border">
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarProfesor">Agregar profesor</button>

      </div>


      <!--=====================================
        MOSTRAR PROFESORS
      ======================================-->

      <div class="box-body">

        <table  class="table table-bordered table-striped dt-responsive tabla ">

          <thead>
          
            <tr >
            
              <!-- <th style="width:10px" >#</th> -->
              <th >Id</th>
              <th >Nombre</th>
              <!-- <th >Apellidos</th> -->
             
        
              <th >Email</th>
            
        
              <th >Acciones</th>

            </tr>

          </thead>


          <tbody>


          <?php

            $item = null;

            $valor = null;

            $profesores = ControladorProfesores::ctr_mostrarProfesores($item, $valor);

            foreach ($profesores as $key => $value) {


              echo '<tr>

                <td>' . $value["id_profesor"] .'</td>';

              
                //<td>' . $value["apellidos"] .'</td>
                echo '<td>' . $value["profesor"] .'</td> 

                


               

                <td>' . $value["email"] .'</td>';

             
                

                echo '<td>
                  
                      <div class="btn-group">

                        <button class="btn btn-warning btn_editarProfesor" idProfesor="'.$value["id_profesor"].'" data-toggle="modal" data-target="#modal_editarProfesor"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btn_eliminarProfesor" idProfesor="'.$value["id_profesor"]. '" nombreProfesor="'.$value["profesor"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR PROFESOR
======================================-->

<div id="modal_agregarProfesor" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar profesor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" >

          <div class="box-body">

             <!-- ENTRADA PARA EL PROFESOR -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoProfesor" placeholder="*Ingrese profesor" id="nuevoProfesor" maxlength="40" required>

              </div>

            </div>


             <!-- ENTRADA PARA LOS APELLIDOS -->
            
             <!-- <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoApellidos" name="nuevoApellidos" placeholder="*Ingrese apellidos" maxlength="20" required>

              </div>

            </div> -->

          


            <!-- ENTRADA PARA LOS EMAIL -->

            <div class="form-group" >
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span> 

                <input type="email" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail" placeholder="*Ingrese email" maxlength="40" required>

              </div>

            </div>

          </div>
          

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="guardar_profesor">Guardar profesor</button>

        </div>

        <?php

          $crearProfesor = new ControladorProfesores();
          $crearProfesor -> ctr_crearProfesor();

        ?>

      </form>

    </div>

  </div>

</div>





<!--=====================================
MODAL EDITAR PROFESOR
======================================-->

<div id="modal_editarProfesor" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar profesor</h4>

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


             <!-- ENTRADA PARA EL PROFESOR -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarProfesor" value="" id="editarProfesor">

              </div>

            </div>
          
            


            <!-- ENTRADA PARA LOS APELLIDOS -->
            
            <!-- <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 

                <input type="text" class="form-control input-lg" id="editarApellidos" name="editarApellidos" value="" >

              </div>

            </div> -->
            

           



            <!-- ENTRADA PARA LOS EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span> 

                <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" >

              </div>

            </div>
  
            

            

          </div>

        </div>

        
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        
        <div class="modal-footer" >

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="modificar_profesor">Modificar profesor</button>

        </div>

        <?php

          $editarProfesor = new ControladorProfesores();
          $editarProfesor -> ctr_editarProfesor();
          

        ?>

      </form>

    </div>

  </div>

</div>



<?php

  $borrarProfesor = new ControladorProfesores();
  $borrarProfesor -> ctr_borrarProfesor();


?>


