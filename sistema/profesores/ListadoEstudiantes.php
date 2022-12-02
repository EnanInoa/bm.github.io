<?php
     session_start();
     include('../bd/conectar.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/estilos.css"><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/e4ab74e3d9.js" crossorigin="anonymous"></script> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profesor | Registro De Estudiantes</title>
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
     <h1>Listado de Estudiantes / <?php echo $_GET['nombreGrado']?></h1>
     <div class="contenedor-contenedor">
    <div class="contenedor-tabla">

    <table>
      <thead>
      <tr class="cabeza-tabla">

          <th>Acciones</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Matricula</th>
          <th>Grado</th>
          <th>Telefono</th>
          <th>Correo</th>
        </tr>
       </thead>
<tbody>

      <?php
      $idGrado = $_GET['idGrado'];
      $consulta = "SELECT * FROM estudiantes, grado WHERE  grado.idGrado = estudiantes.id_grado AND grado.idGrado = '$idGrado' ";
                  $resultado_consulta = mysqli_query($conexion, $consulta);

                  While($mostrar = mysqli_fetch_assoc($resultado_consulta)) {
      ?>
        <tr>
           <th> <?php if($mostrar['idGrado'] !=  0) { ?><a href="notas2.php?idGrado=<?php echo $idGrado?>&matricula=<?php echo $mostrar['matricula']?>"><img class='icono' src='../iconos/eye.svg' alt="Ver" title="Ver Nota"></a> <?php } else { echo "<img class='icono off' src='../iconos/eye-off.svg' title='Este estudiante no se encuentra en ningun curso todavía, por lo que no tiene calificaciones'>";}?></th>
          <td><?php echo $mostrar['nomUsuario']?></td>
          <td><?php echo $mostrar['apeUsuario']?></td>
          <td><?php echo $mostrar['matricula']?></td>
          <td><?php echo $mostrar['nombreGrado']?></td>
          <td><?php echo $mostrar['telUsuario']?></td>
          <td><?php echo $mostrar['correoUsuario']?></td>
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
