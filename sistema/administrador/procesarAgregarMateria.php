<?php
include("../bd/conectar.php");


$id = $_GET["id"];
    $nombre = $_GET["materia"];
$matricula = $_GET["matricula"];

$verificar_materia = mysqli_query($conexion, "SELECT * FROM materia WHERE nombre_materia='$nombre'");

if(mysqli_num_rows($verificar_materia)>0){
       echo '<script>
                        alert("La materia ya esta registrada!");
                        window.history.back();
                 </script>';

}else{

  $agregar = mysqli_query($conexion, "INSERT INTO materia(nombre_materia, matricula_titular) VALUES ('$nombre', '$matricula')");

       if(!$agregar){
       echo '<script>
       alert("Error al registrar la Materia.");
        window.history.();
        </script>';
      }else{
         echo '<script>
         alert("Materia registrada correctamente.");
          window.history.back();
         </script>';
         mysqli_close($conexion);
              }
}
   ?>
