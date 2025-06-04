<?php //editarContenido.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json_datos = file_get_contents('php://input');
$json_php=json_decode($json_datos,true);
echo json_encode($json_php);
$id_contenido=$json_php['id_contenido'];
$id_contenido = intval($id_contenido);
$texto_cambio = $conn->real_escape_string($json_php['texto_cambio']); // Evita inyección SQL
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
//get_pagina coge la primera pagina, segunda, terecera...n-esima y con limit n OFFSET n-1 podemos coger la id de esa pagina de ese escritor
$stmt = $conn->prepare("UPDATE contenido SET texto = ? WHERE id_contenido = ?");
$stmt->bind_param("si", $texto_cambio, $id_contenido); // "s" para texto, "i" para entero

$contenido_array = [];

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode("PASO POR AQUÍ");
    }
} else {
    //$contenido_array[]="NO EXISTE";
}

$stmt->close();
$conn->close();
