<?php

require_once('/xampp/htdocs/auto.php/auto_sql/conexion.php');

class auto{
    public $marca, $modelo, $año;
    public $conexion;

    public function __construct($conexion, $marca = null, $modelo = null, $año = null)
    {
        $this->conexion = $conexion;
        $this->$marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
    }

    // Método para registrar un auto
    public function registrarauto()
    {
        $sql = "INSERT INTO auto (marca, modelo, año) VALUES ('$this->marca', $this->modelo, '$this->año')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "auto registrado correctamente";
        } else {
            echo "Error al registrar el auto: " . mysqli_error($this->conexion);
        }
    }

    // Método para mostrar autos
    public static function mostrarautos($conexion)
    {
        $sql = "SELECT * FROM auto";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "ID: " . $fila["id"] . " - marca: " . $fila["marca"] . " - modelo: " . $fila["modelo"] . " - año: " . $fila["año"] . "<br>";
            }
        } else {
            echo "0 resultados";
        }
    }

    // Método para actualizar un auto
    public function actualizarauto($id)
    {
        $sql = "UPDATE auto SET marca='$this->marca', modelo=$this->modelo, año='$this->año' WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "auto actualizado correctamente";
        } else {
            echo "Error al actualizar el auto: " . mysqli_error($this->conexion);
        }
    }

    // Método para eliminar un auto
    public function eliminarauto($id)
    {
        $sql = "DELETE FROM auto WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "auto eliminado correctamente";
        } else {
            echo "Error al eliminar el auto: " . mysqli_error($this->conexion);
        }
    }
}
?>