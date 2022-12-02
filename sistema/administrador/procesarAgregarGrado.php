<?php
include("../bd/conectar.php");


$nombre = $_GET["grado"];




$grado = mysqli_query($conexion, "SELECT * FROM grado WHERE nombreGrado='$nombre'");

if (mysqli_num_rows($grado) > 0) {
              echo '<script>
                     alert("El nombre de este grado ya está registrado!");
                     window.history.back();
              </script>';
}else{

  $agregar = "INSERT INTO grado(nombreGrado) VALUES ('$nombre')";

  $resultado = mysqli_query($conexion, $agregar);

       if(!$resultado){
       echo '<script>
       alert("Error al registrarse.");
        window.history.();
        </script>';
      }else{
         echo '<script>
         alert("Usuario registrado correctamente.");
          window.history.back();
         </script>';
         mysqli_close($conexion);
              }
}
   ?>
