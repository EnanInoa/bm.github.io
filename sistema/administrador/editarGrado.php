<?php
 session_start();
 include("../bd/conectar.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&amp;display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/e4ab74e3d9.js" crossorigin="anonymous"></script>
    <title>Editar Grado</title>
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
          <li class="link_usuarios"><a Href="#" class="actual link_usuarios">Usuarios</a><ul class="menu-usuarios">
           <li><a href="listadoAdministradores.php" class="actual">Administradores</a></li>
            <li><a href="listadoProfesores.php" >Profesores</a></li>
            <li><a href="listadoEstudiantes.php">Estudiantes</a></li>
          </ul></li>
          <li><a href="listadoMaterias.php">Materias</a></li>
          <li><a href="listadoGrado.php">Grados</a></li>
        </ul>
    </nav>
  </header>

  <main>
  <form action="ProcesarEditarGrado.php" method="get">
    <div class= "contenedor-agregar">
  <h2 class="form_titulo">Editar Grado</h2>
  <div class="contenedor-campos">

    <?php
    $id = $_GET["idGrado"];
      $sql = "SELECT * FROM grado WHERE idGrado = '$id' AND idGrado != 0";
      $resultado = mysqli_query($conexion, $sql);

// si no existe usuario con esa matricula, vuerlve al listado

if(mysqli_num_rows($resultado)==0){
  header('Location: ListadoGrado.php');
}

      while($mostrar = mysqli_fetch_assoc($resultado)) {
    ?>
  </div>
  <div class="contenedor-campos">
    <input type="text" name="id" value="<?php echo $mostrar['idGrado']?>" readonly>
  </div>
    <div class="contenedor-campos">
    <input type="text" name="grado" value="<?php echo $mostrar['nombreGrado']?>">
      </div>
    <input type="submit" value="actualizar">
    <p>Volver al listado<a href="listadoGrado.php">Click Aquí</a></p>
    </div>
      <?php } ?>
      <div>
    </form>
  </main>
</body>
</html>
