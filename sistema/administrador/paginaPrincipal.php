<?php 
include("../bd/conectar.php");
session_start();

if($_SESSION['tipoUsuario'] != 'administrador') {
  echo '<script>
  window.history.back();
  </script>';
  // header('Location: ../../login.html');
}


function consulta($tabla) {
 
global $conexion, $consulta;

  $consulta = mysqli_query($conexion,"SELECT * FROM $tabla");

}

consulta('administrador');
  $cantidad_admins = mysqli_num_rows($consulta);

  consulta('profesores');
  $cantidad_profes = mysqli_num_rows($consulta);

  consulta('estudiantes');
    $cantidad_estudiantes = mysqli_num_rows($consulta);
 
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/e4ab74e3d9.js" crossorigin="anonymous"></script>
    <title>Administrador | Inicio</title>
</head>
<body>
     <header>
    <div class= "contenedor_usuario">
     <input type="checkbox" id="perfil">
     <label for="perfil"><img src="../iconos/usuario.svg" alt="Cuenta"></label>
   <ul class="menu-perfil">
   <li><a href="verPerfil.php">Ver Perfil</a></li>
   <li><a href="../cerrarSesion.php"><img src="../iconos/power.svg" alt="Cerrar Sesion" title="Cerrar Sesión">Cerrar Sesión</a></li>
   </ul>
   <div class="info-usuario">
     <p><?php echo $_SESSION['nomUsuario']?></p>
     <p><?php echo $_SESSION['tipoUsuario']?></p>
     </div>
   </div>
 </div>
 <nav class="nav-menu">
 <input type="checkbox" id="checkbox-menu">
 <label for="checkbox-menu" class="icono-menu"><img src="../iconos/menu.svg" alt=""></label>
  <ul>
        <li><a href="paginaPrincipal.php" class="actual">Inicio</a></li>
        <li class="link_usuarios"><a Href="#" class="link_usuarios">Usuarios<img src="../iconos/down.svg" alt=""></a><ul class="menu-usuarios">
         <li><a href="listadoAdministradores.php" >Administradores</a></li>
          <li><a href="listadoProfesores.php" >Profesores</a></li>
          <li><a href="listadoEstudiantes.php">Estudiantes</a></li>
        </ul></li>
        <li><a href="listadoMaterias.php">Materias</a></li>
        <li><a href="listadoGrado.php">Grados</a></li>
      </ul>
  </nav>
</header>
<main class="paginaPrincipal">
<section class="usuarios">
<div class="cantidad_usuarios">
    <div><h2>Administradores</h2></div>
    <div><i class="bi bi-person-fill"></i></div>
    <p><?php echo $cantidad_admins?></p>
    <!-- <p><//?php echo cantidad_usuarios('administrador') ?></p> -->
</div>
<div class="cantidad_usuarios">
    <div><h2>Profesores</h2></div>
    <div><i class="fa-solid fa-chalkboard-user"></i></div>
    <p><?php echo $cantidad_profes?></p>
</div>
<div class="cantidad_usuarios">
    <div><h2>Estudiantes</h2></div>
    <div><i class="fa-sharp fa-solid fa-graduation-cap"></i></div>
    <p><?php echo $cantidad_estudiantes?></p>
</div>

</section>
</main>
   <?php 
   include("../footer.php");
   ?>
</body>
</html>