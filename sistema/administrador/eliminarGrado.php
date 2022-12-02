<?php
 session_start();
 include("../bd/conectar.php");
 
      $idGrado= $_GET["idGrado"];
      $resultado = mysqli_query($conexion, "DELETE FROM grado WHERE   idGrado = '$idGrado'");

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