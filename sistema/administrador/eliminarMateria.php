<?php
 session_start();
 include("../bd/conectar.php");
 
      $id_materia = $_GET["id_materia"];
      $resultado = mysqli_query($conexion, "DELETE FROM materia WHERE   id_materia = '$id_materia'");

        if($resultado) {
       echo'<script>
            alert("El registro se ha eliminado correctamente.");
            window.history.back();
            </script>';
    } else {
      echo '<script>
            alert("No se pudo eliminar el registro.");
            window.history.back();
            </script>';
    }
    ?>
