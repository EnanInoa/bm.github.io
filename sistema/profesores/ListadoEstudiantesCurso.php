<?php
include("../bd/conectar.php");
session_start();

if($_SESSION['tipoUsuario'] != 'profesor')  {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/e4ab74e3d9.js" crossorigin="anonymous"></script>
    <title>Profesor | Cursos</title>
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
        <li><a  class="actual" href="ListadoEstudiantesCurso.php" >Cursos</a></li>

      </ul>
    </nav>
  </header>
  <main>
  <h1>Listado Cursos</h1>
              <div class="contenedor-contenedor">
    <div class="contenedor-tabla">
 <table>
      <thead>
      <tr class="cabeza-tabla">
        <th>Acciones</th>
                  <th>ID</th>
                  <th>Grado</th>
                  <!-- <th>Acciones</th> -->
                </tr>
                </thead>
<tbody>
                <?php
                $consulta = "SELECT * FROM grado ";
                            $resultado_consulta = mysqli_query($conexion, $consulta);

                            While($mostrar = mysqli_fetch_assoc($resultado_consulta)) {
                ?>

                <tr>
                  <th><?php if($mostrar['idGrado'] !=  0) { ?>  <a href="editarGrado.php?idGrado=<?php echo $mostrar['idGrado']?>"><img class='icono' src='../iconos/edit.svg' alt="editar" title="editar"></a>
                   <?php } ?>
                   <a href="ListadoEstudiantes.php?idGrado=<?php echo $mostrar['idGrado']?>&nombreGrado=<?php echo $mostrar['nombreGrado']?>"><img class='icono' src='../iconos/eye.svg' alt="Ver" title="Ver Curso"></a> </th>
                
                  <td><?php echo $mostrar['idGrado']?></td>
                  <td><?php echo $mostrar['nombreGrado']?></td>
                  <!-- <td> </td>  -->

                </tr>
                <?php
        }
                 ?>
                 </tbody>
 </table>
</div>
</div>
                 <script src="../js/confirmacion.js"></script>
    </main>
    </body>
</html>
