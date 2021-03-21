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

            $sql = "SELECT pa.id, pa.fecha, p.profesor as id_profesor, p.email as email, c.clase as id_clase,  i.incidencia as id_incidencia, pa.partes, pa.resolucion, pa.estado
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

            $sql = "(SELECT pa.id, pa.fecha, p.profesor, p.email, c.clase,  i.incidencia, pa.partes, pa.resolucion, pa.estado
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

        $sql = "INSERT INTO partes(fecha, partes, resolucion, id_clase, id_profesor, id_incidencia)
        
        VALUES (:fecha, :partes, :resolucion,
          (SELECT id_clase FROM clases WHERE clase = :nombre_clase), 
          (SELECT id_profesor FROM profesores WHERE profesor = :nombre_profesor), 
          (SELECT id_incidencia FROM incidencias WHERE incidencia = :nombre_incidencia)
                
        )";

        $stmt = $conexion -> prepare($sql);

 
        $stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt -> bindParam(":partes", $datos["partes"], PDO::PARAM_STR);
        $stmt -> bindParam(":resolucion", $datos["resolucion"], PDO::PARAM_STR);
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


    /* -------------------------------------------------------------------------- */
    /*                               EDITAR PARTES                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_editarParte($tabla, $datos){

        require ("conexion.php");

        $sql = "UPDATE $tabla SET fecha = :fecha, partes = :parte, resolucion = :resolucion,
        id_clase = (SELECT id_clase FROM clases WHERE clase = :nombre_clase), 
        id_profesor = (SELECT id_profesor FROM profesores WHERE profesor = :nombre_profesor), 
        id_incidencia= (SELECT id_incidencia FROM incidencias WHERE incidencia = :nombre_incidencia)
        WHERE id = :id";

        $stmt = $conexion->prepare($sql);


        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre_profesor", $datos["profesor"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre_clase", $datos["clase"], PDO::PARAM_STR);
        $stmt -> bindParam(":nombre_incidencia", $datos["incidencia"], PDO::PARAM_STR);
        $stmt -> bindParam(":parte", $datos["parte"], PDO::PARAM_STR);
        $stmt -> bindParam(":resolucion", $datos["resolucion"], PDO::PARAM_STR);
    



        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

    }



    /* -------------------------------------------------------------------------- */
    /*                             ACTUALIZAR PARTE                             */
    /* -------------------------------------------------------------------------- */

    static public function mdl_actualizarParte($tabla, $item1, $valor1, $item2, $valor2){

        require ("conexion.php");

        $stmt = $conexion->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

        
        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;


    }


    /* -------------------------------------------------------------------------- */
    /*                               BORRAR PARTES                              */
    /* -------------------------------------------------------------------------- */

    static public function mdl_borrarParte($tabla, $datos){

        require ("conexion.php");

        $sql = "DELETE FROM $tabla where id= :id";

        $stmt = $conexion -> prepare($sql);

        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";
        }


        $stmt -> close(); 

        $stmt = null;

    }



}