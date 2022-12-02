<?php
   include("../bd/conectar.php");


    $id = $_GET["id"];
    $grado = $_GET["grado"];

         $actualizar = "UPDATE grado SET nombreGrado='$grado' WHERE idGrado='$id'";


$grado = mysqli_query($conexion, "SELECT * FROM grado WHERE nombreGrado='$grado' AND idGrado !='$id'");

if (mysqli_num_rows($grado) > 0) {
              echo '<script>
                     alert("El nombre de este grado ya está registrado!");
                     window.history.back();
              </script>';
              } else {                    
                      
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
