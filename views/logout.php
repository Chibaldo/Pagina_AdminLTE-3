<?php
    require_once("../config/conexion.php");
    session_destroy();
    header("Location: " . Conectar::ruta() . "../pagina/views/login.php");
    exit();

?>
