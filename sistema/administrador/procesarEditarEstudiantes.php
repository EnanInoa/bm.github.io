<?php
   include("../bd/conectar.php");


   $matricula = $_GET["matricula"];
    $nombre = $_GET["nombre"];
     $apellido = $_GET["apellido"];
     $id_grado = $_GET["grado"];
     $telefono = $_GET["telefono"];
      $correo = $_GET["correo"];
       $usuario = $_GET["usuario"];
        $clave = $_GET["clave"];




              
        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE usuario='$usuario' AND matricula !='$matricula'");
        if(mysqli_num_rows($verificar_usuario)>0){
               echo '<script>
                                alert("El usuario ya está registrado!");
                                window.history.back();
                         </script>';
        } else {
        
               $verificar_correo = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE correoUsuario='$correo' AND matricula !='$matricula'");
               if (mysqli_num_rows($verificar_correo) > 0) {
                      echo '<script>
                      alert("El correo ya está registrado!");
                      window.history.back();
                      </script>';
               } else {
                      
                      

         $actualizar = "UPDATE estudiantes SET nomUsuario='$nombre', apeUsuario='$apellido', id_grado='$id_grado', telUsuario='$telefono', correoUsuario='$correo', usuario='$usuario', passUsuario='$clave' WHERE matricula='$matricula'"; 


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
      }
   }
     
?>
