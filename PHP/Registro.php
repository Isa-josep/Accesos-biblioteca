<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../stiles.css">
</head>
<body>
<?php
include("Conexion.php");

if (isset($_POST["Registrar"])) {
    $a = $_POST['no_control'];
    $b = $_POST['nombre'];
    $c = $_POST['apellido_paterno'];
    $d = $_POST['apellido_materno'];
    $e = $_POST['genero'];
    date_default_timezone_set('America/Chihuahua');
    $fecha_entrada = date("Y-m-d H:i:s");
    $regi = "INSERT INTO Alumnos (NO_CONTROL, Nombre, Apellido_Paterno, Apellido_Materno, GENERO, FECHA_ENTRADA)
             VALUES ('$a', '$b', '$c', '$d', '$e', '$fecha_entrada')";
    $query = mysqli_query($conexion, $regi);
    if ($query) {
        header("Location: http://localhost/Gestor%20de%20biblioteca/");
        exit();
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario.";
    }
} elseif (isset($_POST["Consultar"])) {
    $consulta = "SELECT * FROM Alumnos";
    $result = mysqli_query($conexion, $consulta);
    if ($result) {
        $totalHombres = 0;
        $totalMujeres = 0;
        $data = array(); // Almacena los datos para imprimir la tabla
        
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['GENERO'] == "Hombre") {
                $totalHombres++;
            } elseif ($row['GENERO'] == "Mujer") {
                $totalMujeres++;
            }
            $data[] = $row; // Almacena los datos para imprimir la tabla
        }

        // Calcular los porcentajes
        $totalRegistros = count($data);
        $porcentajeHombres = ($totalHombres / $totalRegistros) * 100;
        $porcentajeMujeres = ($totalMujeres / $totalRegistros) * 100;
        echo "<h2>Usuarios Registrados:</h2>";
        // echo "Porcentaje de Hombres: " . number_format($porcentajeHombres, 2) . "%<br>";
        // echo "Porcentaje de Mujeres: " . number_format($porcentajeMujeres, 2) . "%<br>";
        echo "<table>
            <tr>
                <th class='space'>No. de Control:</th>
                <th class='space'>Nombre:</th>
                <th class='space'>Apellido Paterno:</th>
                <th class='space'>Apellido Materno:</th>
                <th class='space'>Género:</th>
                <th class='space'>Fecha de Entrada:</th>
            </tr>";
        
        foreach ($data as $row) {
            echo "<tr>
                <td class='space'>{$row['NO_CONTROL']}</td>
                <td class='space'>{$row['Nombre']}</td>
                <td class='space'>{$row['Apellido_Paterno']}</td>
                <td class='space'>{$row['Apellido_Materno']}</td>
                <td class='space'>{$row['GENERO']}</td>
                <td class='space'>{$row['FECHA_ENTRADA']}</td>
            </tr>";
        }
        echo "</table>";
}
 else {
        echo "Error al consultar la base de datos.";
    }
}
?>

</body>
</html>
