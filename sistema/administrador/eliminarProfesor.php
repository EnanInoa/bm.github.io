<?php
 session_start();
 include("../bd/conectar.php");
 
      $matricula = $_GET["matricula"];
      $resultado = mysqli_query($conexion, "DELETE FROM profesores WHERE   matricula = '$matricula'");

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
