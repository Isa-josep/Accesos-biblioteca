<?php
include 'conexion.php';

// Obtén el número de control y otros datos enviados desde el formulario
$noControl = $_POST["no_control"];
$nuevoNombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
$nuevoPaterno = isset($_POST["apellido_paterno"]) ? $_POST["apellido_paterno"] : '';
$nuevoMaterno = isset($_POST["apellido_materno"]) ? $_POST["apellido_materno"] : '';
$nuevoGenero = isset($_POST["genero"]) ? $_POST["genero"] : '';

// Construye la consulta SQL teniendo en cuenta los valores proporcionados
$sql = "UPDATE Alumnos SET ";
$sql .= $nuevoNombre !== '' ? "nombre = '$nuevoNombre', " : "";
$sql .= $nuevoPaterno !== '' ? "apellido_paterno = '$nuevoPaterno', " : "";
$sql .= $nuevoMaterno !== '' ? "apellido_materno = '$nuevoMaterno', " : "";
$sql .= $nuevoGenero !== '' ? "genero = '$nuevoGenero' " : "";

// Elimina la coma final si la consulta tiene más de un campo para actualizar
$sql = rtrim($sql, ', ');

$sql .= " WHERE no_control = $noControl";

if (mysqli_query($conexion, $sql)) {
    // La actualización fue exitosa
    echo "Datos actualizados correctamente";

    // Redirige de vuelta a index.html después de 2 segundos
    header("refresh:1;url=../index.html");
} else {
    // Error en la actualización
    echo "Error al actualizar datos: " . mysqli_error($conexion);
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
