
  <?php

if(!isset($_SESSION)) {
header('location: ../login.html');

}


if($_SESSION['tipoUsuario'] == 'administrador') {
  $id=$_SESSION['id_administrador'];
  $consulta = mysqli_query($conexion, "SELECT * FROM administrador WHERE id_administrador = '$id'");

} else {
  
  $matricula=$_SESSION['matricula'];
  
  if($_SESSION['tipoUsuario'] == 'profesor') {
    $consulta = mysqli_query($conexion, "SELECT * FROM profesores, grado WHERE profesores.id_grado_titular = grado.idGrado AND profesores.matricula = '$matricula'");
    
  }

  if($_SESSION['tipoUsuario'] == 'estudiante')  {
    $consulta = mysqli_query($conexion, "SELECT * FROM estudiantes, grado WHERE estudiantes.id_grado = grado.idGrado AND estudiantes.matricula = '$matricula'");
  }


}

 While($mostrar = mysqli_fetch_assoc($consulta)) {
  ?>

  <ul>
  <?php
  if ($_SESSION['tipoUsuario'] == 'administrador') {
    ?>
    <li>ID: <?php echo $mostrar['id_administrador']?></li>

    <?php
  } else {
  ?>
  <li><i class="fa-solid fa-id-card"></i> <?php echo $mostrar['matricula']?></li>
  <?php
  }
  ?>
  <li>Nombre:<?php echo $mostrar['nomUsuario']?></li>
  <li>Apellido:<?php echo $mostrar['apeUsuario']?></li>
  <?php
  if ($_SESSION['tipoUsuario'] != 'administrador') {
    ?>
    
    <li><i class="fa-solid fa-graduation-cap"></i> <?php echo $mostrar['nombreGrado']?></li>

    <?php
  }
  ?>

  <li><i class="fa-solid fa-user"></i> <?php echo $mostrar['usuario']?></li>
  <li><i class="fa-solid fa-unlock"></i> <?php echo $mostrar['passUsuario']?></li>
  <li><i class="fa-solid fa-envelope"></i> <?php echo $mostrar['correoUsuario']?></li>
  <li><i class="fa-solid fa-phone"></i> <?php echo $mostrar['telUsuario']?></li>
</ul>
<?php
}
 ?>
