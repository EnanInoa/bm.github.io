<?php 
include("bd/conectar.php");
// session_set_cookie_params(60*60*12);
session_start();


/* ================================================================================= 
obtener datos del login
================================================================================= */
$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
$clave = mysqli_real_escape_string($conexion,$_POST['clave']);





/* ================================================================================= 
funcion que busca un las tablas de la base de datos y envia a una pagina, 
dependiendo de la tabla y el tipo de usuario indicado en el parametro
================================================================================= */

function verificar($tabla, $tipoUsuario) {

  global $conexion, $usuario, $clave;

    $consulta = mysqli_query($conexion,"SELECT * FROM $tabla WHERE usuario='$usuario' AND passUsuario='$clave'");
    // $mysqli_consulta = mysqli_query($conexion, $consulta);
    $verifica_consulta = mysqli_num_rows($consulta);

    if ($verifica_consulta > 0) 
    {
      $_SESSION['tipoUsuario'] =  $tipoUsuario;
      // variable_sesion();
 while ($info_usuario = mysqli_fetch_assoc($consulta)) {

   $_SESSION['nomUsuario'] = $info_usuario['nomUsuario'];
   $_SESSION['apeUsuario'] = $info_usuario['apeUsuario'];
   $_SESSION['telUsuario'] = $info_usuario['telUsuario'];
   $_SESSION['correoUsuario'] = $info_usuario['correoUsuario'];
   $_SESSION['usuario'] = $info_usuario['usuario'];
   $_SESSION['passUsuario'] = $info_usuario['passUsuario'];
   
   /* ================================================================================= 
   como el admin no tiene matricula se le aplica el id que tiene en la base de datos
   ================================================================================= */ 
   if ($tipoUsuario == 'administrador') {
     $_SESSION['id_administrador'] = $info_usuario['id_administrador'];
    } else {
      $_SESSION['matricula'] = $info_usuario['matricula'];
    }
    
  }

      header("Location: $tabla/paginaPrincipal.php");
    }

}  

/* ==================================================================================================
mientras la consulta devuelva 0 filas, llamar la funcion "verificar" con los parametros del usuario

si no encuentra ningu dato en la bd, imprime mensaje de error en la verificacion

break, para que no se repita el bucle indefinidamente
=====================================================================================================*/
while ($verifica_consulta == 0) {

  verificar('administrador', 'administrador');
      verificar('profesores', 'profesor');
          verificar('estudiantes', 'estudiante');
              
      echo '<script>
        alert("error en la verificación, revise sus datos e inténtelo de nuevo.");
        window.history.back();
        </script>';

  break;
}

mysqli_close($conexion);
?>

