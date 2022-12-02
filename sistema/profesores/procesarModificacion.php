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
$actualizar = mysqli_query($conexion, "UPDATE notas SET nota_periodo1='$nota1', nota_periodo2='$nota2', nota_periodo3='$nota3', nota_final='$nf', estado = '$estado' WHERE matricula_alumno='$matricula' AND id_materia='$idMateria'");

if ($actualizar) {
              echo '<script>
                     alert("los datos han sido modificados correctamente.");
                     window.history.back();
                    </script>';
              } else {
                  echo '<script>
                     alert("No se pudieron modificar los datos correctamente.");
                     window.history.back();
                    </script>';
              }
?>
