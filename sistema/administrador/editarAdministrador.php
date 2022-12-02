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
    <title>Editar Administradores</title>
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
    <form action="ProcesarEditarAdministrador.php" method="get">
    <div class= "contenedor-agregar">
      <h2 class="form_titulo">Editar Administradores</h2>

    <?php
      $id = $_GET["id"];
      $sql = "SELECT * FROM administrador WHERE id_administrador = '$id'";
      $resultado = mysqli_query($conexion, $sql);


// si no existe usuario con esa matricula, vuerlve al listado
      if(mysqli_num_rows($resultado)==0){
        header('Location: ListadoAdministradores.php');
 }


      while($mostrar = mysqli_fetch_assoc($resultado)) {
    ?>


<input type="hidden" name="id" id="id" value="<?php echo $mostrar['id_administrador']?>">


      <div class="contenedor-campos">
        <label for="nombre">Nombre</label>
      <input type="text" name="nombre" id="nombre" placeholder="Nombre"  value="<?php echo $mostrar['nomUsuario']?>"required>
      </div>

      <div class="contenedor-campos">
      <label for="apellido">Apellido</label>
      <input type="text" name="apellido" id="apellido" placeholder="Apellido"  value="<?php echo $mostrar['apeUsuario']?>"required>
      </div>

      <div class="contenedor-campos">
      <label for="telefono">Telefono</label>
      <input type="text" name="telefono"  id="telefono" placeholder="Telefono" value="<?php echo $mostrar['telUsuario']?>" required>
      </div>

      <div class="contenedor-campos">
      <label for="email">Correo</label>
      <input type="email" name="correo" id="email" placeholder="Correo" value="<?php echo $mostrar['correoUsuario']?>" required>
      </div>

      <div class="contenedor-campos">
      <label for="usuario">Usuario</label>
      <input type="text" name="usuario" id="usuario" placeholder="Usuario"  value="<?php echo $mostrar['usuario']?>" pattern="[a-zA-Z0-9]{4,20}"    title="su nombre de usuario debe contener al menos 4 caracteres y solo letras o números" required>
      </div>

      <div class="contenedor-campos">
      <label for="clave">Contraseña</label>
      <input type="password" name="clave" id="clave" placeholder="Contraseña"  value="<?php echo $mostrar['passUsuario']?>" pattern="[a-zA-Z0-9]{4,20}"    title="su contraseña debe contener al menos 4 caracteres y solo letras o números" required>
      </div>



    <input type="submit" class="btnes" value="actualizar">
    <p>Para ver el listado actualizado<a href="ListadoAdministradores.php">Click Aquí</a></p>
    
      <?php } ?>
    </form>
  </div>
</main>
</body>
</html>
