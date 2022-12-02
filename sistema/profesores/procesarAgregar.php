<?php
   include("../bd/conectar.php");

    // $idGrado = $_GET['idGrado'];
    $idMateria = $_GET['idMateria'];
    $matricula = $_GET["matricula"];
    $nota1 = $_GET["periodo1"];
    $nota2 = $_GET["periodo2"];
    $nota3 = $_GET["periodo3"];


    $nf = round(($nota1 + $nota2 + $nota3)/3);
    if($nf >= 60){
     $estado = "Aprobado";
    }else{
      $estado ="Reprobado";
    }

$agregar = mysqli_query($conexion, "INSERT INTO notas(id_materia, matricula_alumno, nota_periodo1, nota_periodo2, nota_periodo3, nota_final, estado)  VALUES ('$idMateria', '$matricula', '$nota1', '$nota2', '$nota3', '$nf', '$estado')");

if ($agregar) {
              echo '<script>
                     alert("los datos han sido agregados correctamente.");
                     window.history.back();
                    </script>';
              } else {
                  echo '<script>
                     alert("No se pudieron agregar los datos correctamente.");
                     window.history.back();
                    </script>';
              }
?>
