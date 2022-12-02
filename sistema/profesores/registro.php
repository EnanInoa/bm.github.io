<?php
     session_start();
     include('../bd/conectar.php');

  if($_SESSION['tipoUsuario'] != 'profesor') {
      echo '<script>
      window.history.back();
      </script>';
      // header('Location: ../../login.html');
    }


    $idGrado = $_GET['idGrado'];
                    $idMateria = $_GET['idMateria'];
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
    <title>Profesor | Registro</title>
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
        <li><a href="paginaPrincipal.php" >Inicio</a></li>
        <li><a href="registroNota.php" class="actual">Registro de Notas</a></li>
        <li><a href="ListadoEstudiantesCurso.php" >Cursos</a></li>

      </ul>
    </nav>
  </header>

 <main>
   <h1>Registro De Notas / <?php echo $_GET['nombreGrado']?>/ <?php echo $_GET['nombreMateria']?></h1>
     <div class="contenedor-contenedor">
    <div class="contenedor-tabla">

    <table>
      <thead>
      <tr class="cabeza-tabla">
            <th class="agregar"><a href="agregarNota.php?idGrado=<?php echo $idGrado?>&idMateria=<?php echo $idMateria ?>"><img class='icono' src='../iconos/user-plus.svg' alt="agregar usuario" title="agregar usuario"></a></th>
          <a href="agregarNota.php?idGrado=<?php echo $idGrado?>&idMateria=<?php echo $idMateria ?>">
              </th>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Periodo 1</th>
        <th>Periodo 2</th>
        <th>Periodo 3</th>
        <th>Promedio Final</th>
        <th>Estado</th>
        <!-- <th>Acciones</th> -->
      </tr>
      </thead>
<tbody>
      <?php

            $consulta = mysqli_query($conexion, "SELECT * FROM estudiantes INNER JOIN notas ON estudiantes.matricula = notas.matricula_alumno AND estudiantes.id_grado = '$idGrado' AND notas.id_materia = '$idMateria'");
               while($mostrar = mysqli_fetch_assoc($consulta))  {
   ?>
      <tr>
      <th><a href="modificarNotas.php?idGrado=<?php echo $idGrado?>&idMateria=<?php echo $idMateria?>&matricula=<?php echo $mostrar['matricula']?>" ><img class='icono' src='../iconos/edit.svg' alt="editar" title="editar"></a>
        <td><?php echo $mostrar['matricula'] ?></td>
        <td><?php  echo $mostrar['nomUsuario'] ?></td>
        <td><?php  echo $mostrar['apeUsuario']?></td>
        <td><?php echo $mostrar['nota_periodo1']?></td>
        <td><?php echo $mostrar['nota_periodo2']?></td>
        <td><?php echo $mostrar['nota_periodo3']?></td>
        <td><?php echo $mostrar['nota_final']?></td>
        <td><?php echo $mostrar['estado']?></td>
      </tr>
          <?php } ?>
    </tbody>
 </table>
</div>
</div>
</body>
</html>
