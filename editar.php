<?php
require_once('../auto_sql/conexion.php');
require_once('../auto_sql/clases/auto.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el auto actual
    $sql = "SELECT * FROM auto WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $autoData = mysqli_fetch_assoc($resultado);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $marca = $_POST['nombre'];
    $modelo = $_POST['edad'];
    $año = $_POST['año'];

    // Crear instancia y actualizar auto
    $auto = new auto($conexion, $marca, $modelo, $año);
    $auto->actualizarauto($id);

    header("Location: index.php"); // Redirige al índice después de editar
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar auto</title>
    
</head>

<body>
    <h1 class="text-center p-5">Editar auto</h1>
    <form method="POST" class="w-50 mx-auto p-5">
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="hidden" class="form-control" name="id" value="<?php echo $autoData['id']; ?>">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $autoData['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" placeholder="Edad" value="<?php echo $autoData['edad']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="año" class="form-label">año Electronico</label>
            <input type="email" class="form-control" name="año" placeholder="año" value="<?php echo $autoData['año']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>


</html>