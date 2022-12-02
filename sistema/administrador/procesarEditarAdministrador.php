<?php
   include("../bd/conectar.php");

   $id=$_GET["id"];
    $nombre=$_GET["nombre"];
     $apellido=$_GET["apellido"];
     $telefono=$_GET["telefono"];
      $correo=$_GET["correo"];
       $usuario=$_GET["usuario"];
        $clave=$_GET["clave"];


       


        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM administrador WHERE usuario='$usuario'  AND id_administrador !='$id'");
if(mysqli_num_rows($verificar_usuario)>0){
       echo '<script>
                        alert("El usuario ya está registrado!");
                        window.history.back();
                 </script>';
} else {

       $verificar_correo = mysqli_query($conexion, "SELECT * FROM administrador WHERE correoUsuario='$correo'  AND id_administrador !='$id'");
       if (mysqli_num_rows($verificar_correo) > 0) {
              echo '<script>
              alert("El correo ya está registrado!");
              window.history.back();
              </script>';
       } else {

         $actualizar = "UPDATE administrador SET nomUsuario='$nombre', apeUsuario='$apellido', telUsuario='$telefono', correoUsuario='$correo', usuario='$usuario', passUsuario='$clave' WHERE id_administrador='$id'";


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
