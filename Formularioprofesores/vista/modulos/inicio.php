
  <div class="content-wrapper" style="margin:10px">
<!--=====================================
MODAL AGREGAR PARTE
======================================-->
<div class="wrapper">

  <h1 >
    Crear partes de trabajo
  </h1>

  
  <form role="form" method="post" enctype="multipart/form-data">

    <!--=====================================
    CABEZA DEL MODAL
    ======================================-->

    <div class="modal-header" style="background:#e46727; color:white"">

      <h3 class="modal-title" >Agregar parte</h3>

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

              //setlocale(LC_ALL, "spanish");

              //setlocale(LC_ALL, 'Italian_Italy.1250'); 


              $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
              $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                
              //echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
              

              $fecha = date("Y-m-d");

              //$tiempoLocal = strftime("%A, %d de %B del %Y", strtotime($fecha));

              $hora = date(" H:i:s");

              
            ?>
            

            <input type="date" class="form-control input-lg" id="nuevoFecha"  name="nuevoFecha" value="<?php echo $fecha ?>" required readonly >

            <input type="text" class="form-control input-lg" id="nuevoLocal"  name="nuevoLocal" value="<?php echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') . " a las " . $hora; ?>" readonly  required>

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
              
            <textarea class="form-control input-lg" name="nuevoObservacion" rows="5" cols="10" maxlength="80" placeholder="*Observaciones: " required></textarea>

          </div>

        </div>




      </div>
      

    </div>
    <!--=====================================
    PIE DEL MODAL
    ======================================-->

    <div class="modal-footer">

      <button type="submit" class="btn btn-primary" name="guardar_parte" style="background:#e46727; color:white">Guardar parte</button>

    </div>

    <?php

      $crearParte = new ControladorPartes();
      $crearParte -> ctr_crearParte();

    ?>

  </form>
  
  </div>
  
 
  
  
  

  
  
  
    
  

 
  
</div>
