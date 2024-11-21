<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'bd_auto';


$conexion = mysqli_connect($host, $username, $password, $database);


if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

?>