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
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar Profesores</title>
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
        <form action="ProcesarEditarProfesores.php" method="post">
    <div class= "contenedor-agregar">
      <h2 class="form_titulo">Editar Profesores</h2>

    <?php
      $matricula = $_GET["matricula"];
      $sql = "SELECT * FROM profesores, grado WHERE matricula = '$matricula' AND grado.idGrado = profesores.id_grado_titular";
      $resultado = mysqli_query($conexion, $sql);

// si no existe usuario con esa matricula, vuelve al listado

if(mysqli_num_rows($resultado)==0){
  header('Location: ListadoProfesores.php');
}


      while($mostrar = mysqli_fetch_assoc($resultado)) {
        $idGrado = $mostrar['id_grado_titular'];
    ?>
      <div class="contenedor-campos">
        <label for="matricula">Matricula</label>
    <input type="text" id="matricula" name="matricula" value="<?php echo $mostrar['matricula']?>" readonly>
    </div>

     <div class="contenedor-campos">
       <label for="Nombre">Nombre</label>
    <input type="text" id="Nombre" name="nombre"value="<?php echo $mostrar['nomUsuario']?>" required>
    </div>

    <div class="contenedor-campos">
      <label for="Apellido">Apellido</label>
    <input type="text" id="Apellido" name="apellido"value="<?php echo $mostrar['apeUsuario']?>" required>
    </div>
    <div class="contenedor-campos">
      <label for="Telefono">Telefono</label>
        <input type="text" id="Telefono" name="telefono" value="<?php echo $mostrar['telUsuario']?>" required>
    </div>
    <div class="contenedor-campos">

    <label for="Correo">Correo</label>

        <input type="email" id="Correo" name="correo"value="<?php echo $mostrar['correoUsuario']?>" required>
    </div>
        <div class="contenedor-campos">
          <label for="Usuario">Usuario</label>
        <input type="text" id="Usuario" name="usuario"value="<?php echo $mostrar['usuario']?>"   pattern="[a-zA-Z0-9]{4,20}"    title="su nombre de usuario debe contener al menos 4 caracteres y solo letras o números" required>
      </div>

          <div class="contenedor-campos">
            <label for="Contraseña">Contraseña</label>
        <input type="password" id="Contraseña" name="clave"value="<?php echo $mostrar['passUsuario']?>"  pattern="[a-zA-Z0-9]{4,20}"    title="su contraseña debe contener al menos 4 caracteres y solo letras o números" required>
      </div>

<div class="contenedor-campos">
  <label for="grado">Grado</label>
    <select name="grado" id="grado">
    <option value="" disabled>Titular De Grado</option>
<?php
$consulta = mysqli_query($conexion, "SELECT * FROM grado WHERE idGrado = 0 OR idGrado NOT IN (SELECT id_grado_titular FROM profesores WHERE id_grado_titular != '$idGrado')");
while ($mostrar = mysqli_fetch_assoc($consulta)) {

?>

     <option value="<?php echo $mostrar['idGrado']?>" <?php echo ($idGrado == $mostrar ['idGrado']) ?  "selected" : "";?> ><?php echo $mostrar['nombreGrado']?></option>
<?php
}

?>

    </select>
</div>

    <input type="submit" class="btnes" value="actualizar">
  <?php } ?>
    <p>Para ver el listado actualizado<a href="listadoProfesores.php">Click Aquí</a></p>
  </div>
    </form>
  </main>

</body>
</html>
