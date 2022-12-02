<?php 
   include("../bd/conectar.php");


    $id = $_GET["id"];
    $materia = $_GET["materia"];
$matricula = $_GET["matricula"];


$verificar_materia = mysqli_query($conexion, "SELECT * FROM materia WHERE nombre_materia='$materia' AND id_materia !='$id'");

if(mysqli_num_rows($verificar_materia)>0){
    echo '<script>
    alert("El nombre de este grado ya está registrado!");
    window.history.back();
    </script>';
} else {    
    
    
    $actualizar = "UPDATE materia SET nombre_materia='$materia', matricula_titular = '$matricula' WHERE id_materia='$id'";
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
?>