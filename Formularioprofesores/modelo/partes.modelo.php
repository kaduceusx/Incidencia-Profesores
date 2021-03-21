<?php

//require("conexion_partes.php");

class ModeloPartes{


    /* -------------------------------------------------------------------------- */
    /*                              MOSTRAR PARTES                              */
    /* -------------------------------------------------------------------------- */
    static public function mdl_mostrarPartes($tabla, $item, $valor){

        require ("conexion.php");

        if($item != null){

            //$sql="SELECT * FROM $tabla WHERE $item = :$item";

            $sql = "SELECT pa.id, pa.fecha, p.profesor as id_profesor, c.clase as id_clase,  i.incidencia as id_incidencia, pa.partes, pa.resolucion, pa.estado
            FROM  partes pa
              LEFT JOIN profesores p ON p.id_profesor = pa.id_profesor
              LEFT JOIN clases c ON c.id_clase = pa.id_clase
              LEFT JOIN incidencias i ON i.id_incidencia = pa.id_incidencia
           
           
           WHERE pa.$item= :$item";

            $stmt = $conexion -> prepare($sql);

            $stmt -> bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $sql = "(SELECT pa.id, pa.fecha, p.profesor, c.clase,  i.incidencia, pa.partes, pa.resolucion, pa.estado
            FROM   partes pa
              LEFT JOIN profesores p ON p.id_profesor = pa.id_profesor
              LEFT JOIN clases c ON c.id_clase = pa.id_clase
              LEFT JOIN incidencias i ON i.id_incidencia = pa.id_incidencia
           );";

           /*$sql = "(SELECT pa.id, pa.fecha, p.profesor, c.clase, pa.id_profesor, i.incidencia, pa.partes, pa.estado
            FROM   partes pa
              LEFT JOIN profesores p ON p.id_profesor = pa.id_profesor
              LEFT JOIN clases c ON c.id_clase = pa.id_clase
              LEFT JOIN incidencias i ON i.id_incidencia = pa.id_incidencia
           );";*/  //no se porque en la select puse pa.id_profesor, parece que sobra y funciona.

           

            $stmt = $conexion -> prepare($sql);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        

        $stmt -> close(); //deberia bastar con el return...

        $stmt = null;

    }

    




    /* -------------------------------------------------------------------------- */
    /*                              CREAR PARTES                                */
    /* -------------------------------------------------------------------------- */
    static public function mdl_ingresarParte($tabla, $datos){

        require ("conexion.php");

        $sql = "INSERT INTO partes(fecha, partes, id_clase, id_profesor, id_incidencia)
        
        VALUES (:fecha, :partes, 
          (SELECT id_clase FROM clases WHERE clase = :nombre_clase), 
          (SELECT id_profesor FROM profesores WHERE profesor = :nombre_profesor), 
          (SELECT id_incidencia FROM incidencias WHERE incidencia = :nombre_incidencia)
                
        )";

        $stmt = $conexion -> prepare($sql);

 
        $stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt -> bindParam(":partes", $datos["partes"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre_clase", $datos["nombre_clase"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre_profesor", $datos["nombre_profesor"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre_incidencia", $datos["nombre_incidencia"], PDO::PARAM_STR);
    
    
     
       

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

       


    }






}