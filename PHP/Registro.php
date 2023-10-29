<?php
include("Conexion.php");
if (isset($_POST["Registrar"])) {
    $a = $_POST['no_control'];
    $b = $_POST['nombre'];
    $c = $_POST['apellido_paterno'];
    $d = $_POST['apellido_materno'];
    $e = $_POST['genero'];
    date_default_timezone_set('America/Mexico_City');
    $fecha_entrada = date("Y-m-d H:i:s");
    $regi = "INSERT INTO Alumnos (NO_CONTROL, Nombre, Apellido_Paterno, Apellido_Materno, GENERO, FECHA_ENTRADA)
             VALUES ('$a', '$b', '$c', '$d', '$e', '$fecha_entrada')";
    $query = mysqli_query($conexion, $regi);
    if ($query) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario.";
    }
} elseif (isset($_POST["Consultar"])) {
    $consulta = "SELECT * FROM Alumnos";
    $result = mysqli_query($conexion, $consulta);
    if ($result) {
        echo "<h2>Usuarios Registrados:</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "No. de Control: " . $row['NO_CONTROL'] . "<br>";
            echo "Nombre: " . $row['Nombre'] . "<br>";
            echo "Apellido Paterno: " . $row['Apellido_Paterno'] . "<br>";
            echo "Apellido Materno: " . $row['Apellido_Materno'] . "<br>";
            echo "Género: " . $row['GENERO'] . "<br>";
            echo "Fecha de Entrada: " . $row['FECHA_ENTRADA'] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Error al consultar la base de datos.";
    }
}
?>
