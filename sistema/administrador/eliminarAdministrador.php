<?php
 session_start();
 include("../bd/conectar.php");

      $id= $_GET["id_administrador"];
      $resultado = mysqli_query($conexion, "DELETE FROM administrador WHERE  id_administrador = '$id'");

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
