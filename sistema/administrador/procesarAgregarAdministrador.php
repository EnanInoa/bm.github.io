<?php
include("../bd/conectar.php");




$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$telefono = $_GET["telefono"];
$correo= $_GET["correo"];
$usuario = $_GET["usuario"];
$clave = $_GET["clave"];

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM administrador WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario)>0){
       echo '<script>
                        alert("El usuario ya está registrado!");
                        window.history.back();
                 </script>';
} else {

       $verificar_correo = mysqli_query($conexion, "SELECT * FROM administrador WHERE correoUsuario='$correo'");
       if (mysqli_num_rows($verificar_correo) > 0) {
              echo '<script>
              alert("El correo ya está registrado!");
              window.history.back();
              </script>';
       } else {
              $agregar = mysqli_query($conexion, "INSERT INTO administrador( nomUsuario, apeUsuario, telUsuario, correoUsuario, usuario, passUsuario) VALUES ('$nombre','$apellido', '$telefono', '$correo','$usuario','$clave')");
              echo '<script>
              alert("Usuario registrado correctamente.");
              window.history.back();
              </script>';
       }
}
mysqli_close($conexion);
       ?>
