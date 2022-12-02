<?php
session_start();



// $_SESSION['tipoUsuario'] = NULL;
// $_SESSION['usuario'] = NULL;
// $_SESSION['clave'] = NULL;

session_destroy();

header('Location: ../login.html');
?>