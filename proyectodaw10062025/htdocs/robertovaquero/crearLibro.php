<?php //crearLibro.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json_datos = file_get_contents('php://input');
$json_php=json_decode($json_datos,true);
$id_escritor=intval($json_php['id_escritor']);
$respuesta=[];
//id_escritor,precio,imagen,fecha,url_amazon,sinopsis,numero_paginas,ISBN,editorial,nombre
$precio = isset($json_php['precio']) ? intval($json_php['precio']) : $respuesta['error'][] = "precio vacío";
$fecha = isset($json_php['fecha']) ? $json_php['fecha'] : $respuesta['error'][] = "fecha vacía";
$url_amazon = isset($json_php['url_amazon']) ? $json_php['url_amazon'] : $respuesta['error'][] = "url_amazon vacía";
$sinopsis = isset($json_php['sinopsis']) ? $json_php['sinopsis'] : $respuesta['error'][] = "sinopsis vacía";
$imagen = "nodisponible.jpg"; //No entra en prompt, por eso se define como nodisponible.jpg
$numero_paginas = isset($json_php['numero_paginas']) ? intval($json_php['numero_paginas']) : $respuesta['error'][] = "numero_paginas vacío";
$ISBN = isset($json_php['ISBN']) ? $json_php['ISBN'] : $respuesta['error'][] = "ISBN vacío";
$editorial = isset($json_php['editorial']) ? $json_php['editorial'] : $respuesta['error'][] = "editorial vacía";
$nombre = isset($json_php['nombre']) ? $json_php['nombre'] : $respuesta['error'][] = "nombre vacío";
if (empty($respuesta['error'])) {
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
//get_pagina coge la primera pagina, segunda, terecera...n-esima y con limit n OFFSET n-1 podemos coger la id de esa pagina de ese escritor
$stmt = $conn->prepare("INSERT INTO libro (id_escritor,precio,imagen,fecha,url_amazon,sinopsis,numero_paginas,ISBN,editorial,nombre) values (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("iissssisss", $id_escritor,$precio,$imagen,$fecha,$url_amazon,$sinopsis,$numero_paginas,$ISBN,$editorial,$nombre); // "s" para texto, "i" para entero
$stmt->execute();
$stmt->close();
$conn->close();
echo json_encode($respuesta);
}
else{
    echo json_encode($respuesta);
}
