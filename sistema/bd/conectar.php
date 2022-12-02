<?php 
// para que no muestre errores
error_reporting(E_NOTICE ^ E_WARNING ^ E_ALL);

// (servidor, nombre de usuario, contraseña vacia, nombre bd)
$conexion = mysqli_connect("localhost", "root", "", "bm");

$conexion -> set_charset("utf8");

// verifica conexion a bd
if (!$conexion) {
     echo '<script>
    alert("no se pudo conectar a la base de datos.");
    window.history.back();
    </script>';
    // echo "no se pudo conectar a la base de datos";
} 
?>