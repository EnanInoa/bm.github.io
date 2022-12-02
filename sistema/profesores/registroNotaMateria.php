<?php
     session_start();
     include('../bd/conectar.php');

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
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/estilos.css"><link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/e4ab74e3d9.js" crossorigin="anonymous"></script> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profesor | Registro Materia</title>
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
   <h1>Registro De Notas / <?php echo $_GET['nombreGrado']?></h1>
<div class="contenedor-contenedor">
    <div class="contenedor-tabla">
 <table>
      <thead>
        <th>Acciones</th>
        <th>Materia</th>
      </tr>
      </thead>
<tbody>
      <?php
                    $idGrado =  $_GET['idGrado'];
                    $matricula = $_SESSION['matricula'];
                    $consulta = mysqli_query($conexion, "SELECT * FROM materia INNER JOIN profesores ON profesores.matricula = materia.matricula_titular AND profesores.matricula='$matricula'");
               while($mostrar = mysqli_fetch_assoc($consulta))  {
   ?>
      <tr>
        <th>            <a href="registro.php?idGrado=<?php echo $idGrado?>&idMateria=<?php echo $mostrar['id_materia']?>&nombreGrado=<?php echo $_GET['nombreGrado']?>&nombreMateria=<?php echo $mostrar['nombre_materia']?>"><img src="../iconos/eye.svg" alt="Ver Materia" title="Ver Materia"></a> </th>
        <td><?php echo $mostrar['nombre_materia'] ?></td>
      </tr>
          <?php } ?>
     </tbody>
 </table>
</div>
</div>
</body>
</html>
