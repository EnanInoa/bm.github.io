<?php
include("../bd/conectar.php");



$matricula = $_GET["matricula"];
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$id_grado = $_GET["grado"];
$telefono = $_GET["telefono"];
$correo= $_GET["correo"];
$usuario = $_GET["usuario"];
$clave = $_GET["clave"];




$verificar_usuario = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE matricula='$matricula'");
if(mysqli_num_rows($verificar_usuario)>0){
       echo '<script>
                        alert("La matricula ya está registrada!");
                        window.history.back();
                 </script>';
} else {


$verificar_usuario = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario)>0){
       echo '<script>
                        alert("El usuario ya está registrado!");
                        window.history.back();
                 </script>';
} else {

       $verificar_correo = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE correoUsuario='$correo'");
       if (mysqli_num_rows($verificar_correo) > 0) {
              echo '<script>
              alert("El correo ya está registrado!");
              window.history.back();
              </script>';
       } else {
              
              
              $agregar = mysqli_query($conexion, "INSERT INTO estudiantes(matricula, nomUsuario, apeUsuario, telUsuario, correoUsuario, usuario, passUsuario, id_grado) VALUES ('$matricula','$nombre','$apellido', '$telefono', '$correo','$usuario','$clave', '$id_grado')");
              echo '<script>
              alert("Usuario registrado correctamente.");
              window.history.back();
              </script>';
              mysqli_close($conexion);
       }
  }

}
       ?>
