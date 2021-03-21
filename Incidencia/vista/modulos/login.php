

<div class="login-box">

  <!-- <div class="login-logo">
    <img src="vista/img/plantilla/logo_login_geriatry.png" class="img-responsive" style="padding:30px 100px 0px 100px" alt="">
  </div> -->
  
  <div class="login-box-body">
    <p class="login-box-msg">IDENTÍFICATE</p>

    <form method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="fa fa-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>


      <div class="row">
    
        <div class="col-xs-12" >
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="Ingresar">Ingresar</button>
        </div>
       
      </div>

      

    

      <?php
        $login = new ControladorUsuarios();
        $login -> ctr_ingresoUsuario();

      ?>
      
    </form>

    <br>

    <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modal_agregarParte">Agregar parte</button> -->





  
      <!-- <br><br>
      <a href="" data-toggle="modal" data-target="#modal_olvidarContrasena">Has olvidado la contraseña?</a> -->

      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modal_incidencias">Mandar incidencias</button> -->
      <!-- <br><br>
      <a href="" data-toggle="modal" data-target="#modal_incidencias">Mandar incidencias</a> -->
    
   

  </div>

  

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
      
                  $fecha = date("Y-m-d")  ;
      
                  $hora = date("H:i:s");
      
                 
                ?>
                
                <!-- <input id="fecha" class="form-control input-lg"  type="date" name="nuevoFecha" placeholder="Ingrese fecha de la incidencia" required> -->

                <input type="date" class="form-control input-lg" id="nuevoFecha"  name="nuevoFecha" value="<?php echo $fecha ?>" required readonly >

                <!-- <input type="text" class="form-control input-lg" id="nuevoHora"  name="nuevoHora" value="<?php echo $hora ?>" required readonly > -->

              </div>

            </div>



            <!-- ENTRADA PARA AGREGAR PROFESOR -->

            <div class="form-group ">
                
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <select class="form-control input-lg" name="nuevoProfesor">
                    
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

                <select class="form-control input-lg" name="nuevoClase">
                    
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

                <select class="form-control input-lg" name="nuevoIncidencia">
                    
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
                  
                <textarea class="form-control input-lg" name="nuevoObservacion" rows="5" cols="10" maxlength="80" placeholder="*Observaciones: " required></textarea>

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






<!-- -------------------------------------------------------------------------- */
/*                              MODAL INCIDENCIAS                             */
/* -------------------------------------------------------------------------- */-->

<div id="modal_incidencias" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Consúltanos directamente por correo</h4>

        </div>


        

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL TÍTULO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-edit "></i></span> 

                <input type="text" class="form-control input-lg" name="Titulo" placeholder="Ingrese título" maxlength="40" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="Email" placeholder="Ingrese email" maxlength="40"required>

              </div>

            </div>



              <!-- ENTRADA PARA EL TELEFONO -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone-square"></i></span> 

                <!-- <input type="tel" class="form-control input-lg" name="Telefono" placeholder="Ingrese teléfono" maxlength="9" required> -->

                <input class="form-control input-lg" name="Telefono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" placeholder="Ingrese teléfono" maxlength = "9"/>

              </div>

            </div>


              <!-- ENTRADA PARA LA DESCRIPCIÓN -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

                <!-- <input type="text" class="form-control input-lg" name="Email" placeholder="Ingrese email" required> -->

                <textarea class="form-control input-lg" name="Descripcion" rows="5" cols="1"placeholder="Ingrese una breve descripción de su problema" required></textarea>

              </div>

            </div>            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="Incidencias">Incidencias</button>

        </div>

        <?php

          $incidencia = new ControladorUsuarios();
          $incidencia -> ctr_incidencias();

        ?>

      </form>

    </div>

  </div>

</div>

            
<!-- -------------------------------------------------------------------------- */
/*                              MODAL OLVIDO CONTRASEÑA                            */
/* -------------------------------------------------------------------------- */-->
<div id="modal_olvidarContrasena" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- =====================================
        CABEZA DEL MODAL
        ====================================== -->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Se te enviará al correo tus nuevas credenciales</h4>

        </div>

        <!-- =====================================
        CUERPO DEL MODAL
        ====================================== -->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="recuperarEmail" placeholder="Ingrese email" maxlength="40"required>

              </div>

            </div>

            
            <!-- ENTRADA PARA EL NUEVA CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevaContrasena" placeholder="Ingrese nueva contraseña" maxlength="40"required>

              </div>

            </div>


            <!-- ENTRADA PARA EL CONFIRMAR CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="confirmarContrasena" placeholder="Confirme la nueva contraseña" maxlength="40"required>

              </div>

            </div>
           

          </div>

        </div>

        <!-- =====================================
        PIE DEL MODAL
        ====================================== -->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="Recuperar">Recuperar contraseña</button>

        </div>

        <?php

          $recuperarContrasena = new ControladorUsuarios();
          $recuperarContrasena -> ctr_recuperarContrasena();

        ?>

      </form>

    </div>

  </div>
</div>


    
