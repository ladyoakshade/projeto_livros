<?php
if (!isset($_SESSION)) {
    session_start();
}

// Se está autenticado, vai para listar, senão para login
if (isset($_SESSION['id_usuario'])) {
    header("Location: ../paginas/listar.php");
} else {
    header("Location: ../paginas/login.php");
}
exit;
