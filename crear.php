<?php
require_once('../auto_sql/conexion.php');
require_once('../auto_sql/clases/auto.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    $auto = new auto($conexion, $nombre, $edad, $correo);
    $auto->registrarauto();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar auto</title>
    
</head>

<body>
    <h1 class="text-center pt-5">Registrar auto</h1>
    <form method="POST" class="w-50 mx-auto p-5 ">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" placeholder="Edad" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" name="correo" placeholder="Correo" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</body>


</html>