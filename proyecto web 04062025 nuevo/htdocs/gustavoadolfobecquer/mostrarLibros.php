<?php //mostrarLibro.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$json_array=json_decode($json,true);
$id_escritor=$json_array['id_escritor'];
$id_escritor=intval($id_escritor);
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
//get_pagina coge la primera pagina, segunda, terecera...n-esima y con limit n OFFSET n-1 podemos coger la id de esa pagina de ese escritor
$stmt = $conn->prepare("SELECT id_libro,precio, imagen, sinopsis, nombre, url_amazon FROM libro WHERE id_escritor = ?");
$stmt->bind_param("i", $id_escritor);
$stmt->execute();
$result = $stmt->get_result();
$contenido_array=[];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contenido_array[] = [
            'precio' => $row['precio'],
            'imagen' => $row['imagen'],
            'sinopsis' => $row['sinopsis'],
            'nombre' => $row['nombre'],
            'url_amazon' => $row['url_amazon'],
            'id_libro' => $row['id_libro']
        ];
    }
} else {
    $contenido_array[] = ['mensaje' => 'No hay libros disponibles'];
}
echo json_encode($contenido_array);
$stmt->close();
$conn->close();