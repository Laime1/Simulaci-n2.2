<?php
$conexion = new mysqli("localhost", "root", "", "login");

$rutaArchivo = "pdfs/pdf_6576120501325.pdf";
$nombreArchivo = "antonio";
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$sql = "INSERT INTO documentos (nombre, ruta_archivo) VALUES ('$nombreArchivo', '$rutaArchivo')";

if ($conexion->query($sql) === TRUE) {
    echo 'PDF almacenado correctamente en el servidor y registrado en la base de datos';
} else {
    echo 'Error al almacenar el PDF en la base de datos: ' . $conexion->error;
}

$conexion->close();
