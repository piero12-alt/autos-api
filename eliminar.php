<?php
require_once('../auto_sql/conexion.php');
require_once('../auto_sql/clases/auto.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crear instancia y eliminar auto
    $auto = new auto($conexion);
    $auto->eliminarauto($id);

    header("Location: index.php"); // Redirige al índice después de eliminar
}
?>