<?php
   include("../bd/conectar.php");


   $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
     $apellido = $_POST["apellido"];
     $telefono = $_POST["telefono"];
      $correo = $_POST["correo"];
       $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
      $id_grado = $_POST["grado"];


         $actualizar = "UPDATE profesores SET nomUsuario='$nombre', apeUsuario='$apellido', telUsuario='$telefono', correoUsuario='$correo', usuario='$usuario', passUsuario='$clave', id_grado_titular='$id_grado' WHERE matricula='$matricula'";


         $resultado = mysqli_query($conexion, $actualizar);

         if(!$resultado) {
             echo '<script>
                         alert("Error al modificar los datos.");
                         window.history.back();
                         </script>';
         } else {

                 echo '<script>
                         alert("Datos modificados correctamente.");
                         window.history.back();
                         </script>';
         }
?>
