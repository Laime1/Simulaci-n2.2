<?php
// tu_servidor.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdfData = $_POST['pdfData'];

    //
    $pdfFileName = 'pdfs/' . uniqid('pdf_') . '.pdf';
    file_put_contents($pdfFileName, $pdfData);


    $nombreArchivo = basename($pdfFileName);
    $rutaArchivo = $pdfFileName;

    $conexion = new mysqli("localhost", "root", "", "login");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    $nombreArchivo = $conexion->real_escape_string($nombreArchivo);
    $rutaArchivo = $conexion->real_escape_string($rutaArchivo);

    $sql = "INSERT INTO documentos (nombre, ruta_archivo) VALUES ('$nombreArchivo', '$rutaArchivo')";

    if ($conexion->query($sql) === TRUE) {
        $respuesta = array('mensaje' => 'PDF almacenado correctamente en el servidor y registrado en la base de datos');
    } else {
        $respuesta = array('mensaje' => 'Error al almacenar el PDF en la base de datos: ' . $conexion->error);
    }

    echo json_encode($respuesta);

    $conexion->close();
} else {
    http_response_code(405);
    echo 'Método no permitido';
}
?>
