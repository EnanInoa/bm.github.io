<?php
include("../bd/conectar.php");
session_start();

if($_SESSION['tipoUsuario'] != 'administrador')  {
  echo '<script>
  window.history.back();
  </script>';
  // header('Location: ../../login.html');
}


$id = $_SESSION['id_administrador']; 
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
    <title>Administrador | Listado De Estudiantes </title>
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
        <li class="link_usuarios"><a Href="#" class="actual link_usuarios">Usuarios <img src="../iconos/down.svg" alt=""></a><ul class="menu-usuarios">
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
  <h1>Listado de Administradores</h1>
   <div class="contenedor-contenedor">
    <div class="contenedor-tabla">

    <table>
      <thead>
      <tr class="cabeza-tabla">
            <th class="agregar"><a href="agregarAdministrador.php"><img class='icono' src='../iconos/user-plus.svg' alt="agregar usuario" title="agregar usuario"></a></th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>correo</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <!-- <th>Acciones</th> -->
      </tr>
      </thead>
<tbody>

      <?php
      $consulta = "SELECT * FROM administrador";
      $resultado_consulta = mysqli_query($conexion, $consulta);
      
      While($mostrar = mysqli_fetch_assoc($resultado_consulta)) {
        ?>
        <tr>
          <th><a href="editarAdministrador.php?id=<?php echo $mostrar['id_administrador']?>" ><img class='icono' src='../iconos/edit.svg' alt="editar" title="editar"></a> 
          <?php if($mostrar['id_administrador'] !=  $id) { ?> <a class="textoEliminar" href="eliminarAdministrador.php?id_administrador=<?php  echo $mostrar['id_administrador']?>"><img class='icono' src='../iconos/trash.svg' alt="eliminar" title="eliminar"></a><?php } else { echo "<img class='icono off' src='../iconos/trash-off.svg' title='no puedes eliminarte a ti mismo'>";}?></th>
          
          <td><?php echo $mostrar['nomUsuario']?></td>
          <td><?php echo $mostrar['apeUsuario']?></td>
          <td><?php echo $mostrar['telUsuario']?></td>
          <td><?php echo $mostrar['correoUsuario']?></td>
          <td><?php echo $mostrar['usuario']?></td>
          <td><?php echo $mostrar['passUsuario']?></td>
        <!-- td con acciones -->
          
        </tr>
        <?php
}
?>
</tbody>
 </table>
</div>
</div>
 <script src="../js/confirmacion.js"></script>
</body>
</html>
