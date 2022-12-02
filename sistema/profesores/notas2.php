
<?php
     include('../bd/conectar.php');
     session_start();

 // $_SESSION['matricula']

if($_SESSION['tipoUsuario'] != 'profesor') {
  echo '<script>
  window.history.back();
  </script>';
  // header('Location: ../../login.html');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Estudiante | Principal </title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/e4ab74e3d9.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilos.css">
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
  <nav class="nav-menu">
  <input type="checkbox" id="checkbox-menu">
 <label for="checkbox-menu" class="icono-menu"><img src="../iconos/menu.svg" alt=""></label>
    <ul>
        <li><a href="paginaPrincipal.php" >Inicio</a></li>
        <li><a href="registroNota.php">Registro de Notas</a></li>
        <li><a href="ListadoEstudiantesCurso.php" >Cursos</a></li>

    </ul>
  </nav>
  </header>

   <main>
     <?php
     // $matricula = $_SESSION['matricula'];
   $matricula = $_GET['matricula'];
     $consulta = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE estudiantes.matricula ='$matricula'" );

  while($mostrar = mysqli_fetch_assoc($consulta)) {

      ?>
  <!-- <h1>Record de notas</h1> -->
  <h1><?php echo "(".$mostrar['matricula'].")"." ". $mostrar['nomUsuario']." ". $mostrar['apeUsuario']?></h1>
  <?php
  }
  ?>
     <div class="contenedor-contenedor">
    <div class="contenedor-tabla">

    <table class="no-accion">
      <thead>
      <tr class="cabeza-tabla">
                  <th>Materia</th>
                  <th>periodo 1</th>
                  <th>periodo 2</th>
                  <th>periodo 3</th>
                    <th>Promedio final</th>
                    <th>Estado</th>
                </tr>
                     </thead>
<tbody>
  <?php
     $consulta = mysqli_query($conexion, "SELECT * FROM estudiantes INNER JOIN notas ON notas.matricula_alumno=estudiantes.matricula AND estudiantes.matricula ='$matricula' INNER JOIN materia ON materia.id_materia=notas.id_materia" );
            while($mostrar = mysqli_fetch_assoc($consulta)) {

   ?>

                <tr>
                  <td><?php echo $mostrar['nombre_materia'] ?></td>
                  <td><?php echo $mostrar['nota_periodo1'] ?></td>
                  <td><?php echo $mostrar['nota_periodo2'] ?></td>
                  <td><?php echo $mostrar['nota_periodo3'] ?></td>
                  <td><?php echo $mostrar['nota_final'] ?></td>
                  <td><?php echo $mostrar['estado'] ?></td>

                   </tr>
<?php
}
?>
                  </tbody>
 </table>
</div>
</div>
</main>
</body>
</html>
