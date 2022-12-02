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
   <title>Profesor | Modificar Calificaciones</title>
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
        <li><a href="registroNota.php" class="actual">Registro de Notas</a></li>
        <li><a href="ListadoEstudiantesCurso.php" >Cursos</a></li>

      </ul>
    </nav>
  </header>

  <h1>Registro de notas</h1>
   <main>
        <?php
        $idGrado = $_GET['idGrado'];
        $idMateria = $_GET['idMateria'];
        $matricula = $_GET["matricula"];
            $consulta = mysqli_query($conexion, "SELECT * FROM estudiantes INNER JOIN notas ON estudiantes.matricula = notas.matricula_alumno AND estudiantes.matricula = '$matricula' AND notas.id_materia = '$idMateria'");

// si no existe usuario con esa matricula, vuelve al listado

if(mysqli_num_rows($consulta)==0){
   header('Location:javascript:history.back()');
}

            while($mostrar = mysqli_fetch_assoc($consulta)) {
          ?>
 <form class="" action="procesarModificacion.php" method="get">
   <div class= "contenedor-agregar">

       <div class="contenedor_campos">
       <input type="hidden" class="inputs" name="idMateria" value="<?php echo $idMateria?>">

       <div class="contenedor-campos">
       <label for="matricula">Matricula:</label>
        <input type="text" class="inputs" name="matricula" id="matricula" value="<?php echo $mostrar['matricula'] ?>" readonly>
        </div>

        <div class="contenedor-campos">
        <label for="nombre">Nombre:</label>
        <input type="text" class="inputs" name="nombre" id="nombre" value="<?php  echo $mostrar['nomUsuario'] ?>" readonly>
        </div>

        <div class="contenedor-campos">
        <label for="apellido">Apellido:</label>
        <input type="text" class="inputs" name="apellido" id="apellido" value="<?php  echo $mostrar['apeUsuario']?>" readonly>
        </div>

        <div class="contenedor-campos">
        <label for="periodo1">Periodo 1:</label>
        <input type="text" class="inputs" name="periodo1" id="periodo1" value="<?php echo $mostrar['nota_periodo1']?>">
        </div>

        <div class="contenedor-campos">
        <label for="periodo2">Periodo 2:</label>
        <input type="text" class="inputs" name="periodo2" id="periodo2" value="<?php echo $mostrar['nota_periodo2']?>">
        </div>

        <div class="contenedor-campos">
        <label for="periodo3">Periodo 3:</label>
        <input type="text" class="inputs" name="periodo3" id="periodo3" value="<?php echo $mostrar['nota_periodo3']?>">
        </div>

        </div>
      <div class="botones">
        <input class="btn-agregar" type="submit" value="Agregar">
        <a href="javascript:history.back();">Volver al Registro</a>
      </div>
</div>
    </form>

      <?php } ?>
  </main>
</body>
</html>
