<?php //editarLibro.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json_datos = file_get_contents('php://input');
$json_php=json_decode($json_datos,true);
$id_libro=$json_php['id_libro'];
$id_libro = intval($id_libro);
$precio = isset($json_php['precio'])?intval($json_php['precio']):null;
$fecha = isset($json_php['fecha']) ? $json_php['fecha'] : null;
$url_amazon = isset($json_php['url_amazon']) ? $json_php['url_amazon'] : null;
$sinopsis = isset($json_php['sinopsis']) ? $json_php['sinopsis'] : null;
$numero_paginas = isset($json_php['numero_paginas']) ? intval($json_php['numero_paginas']) : null;
$ISBN = isset($json_php['ISBN']) ? $json_php['ISBN'] : null;
$editorial = isset($json_php['editorial']) ? $json_php['editorial'] : null;
$nombre = isset($json_php['nombre']) ? $json_php['nombre'] : null;

$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
//get_pagina coge la primera pagina, segunda, terecera...n-esima y con limit n OFFSET n-1 podemos coger la id de esa pagina de ese escritor
if($precio){
$stmt_precio = $conn->prepare("UPDATE libro SET precio = ? WHERE id_libro = ?");
$stmt_precio->bind_param("ii",$precio, $id_libro); // "s" para texto, "i" para entero
$stmt_precio->execute();
$stmt_precio->close();}

if($fecha){
$stmt_fecha = $conn->prepare("UPDATE libro SET fecha = ? WHERE id_libro = ?");
$stmt_fecha->bind_param("si", $fecha, $id_libro);
$stmt_fecha->execute();
$stmt_fecha->close();}

if($url_amazon){
$stmt_url_amazon = $conn->prepare("UPDATE libro SET url_amazon = ? WHERE id_libro = ?");
$stmt_url_amazon->bind_param("si", $url_amazon, $id_libro);
$stmt_url_amazon->execute();
$stmt_url_amazon->close();}
if($sinopsis){
$stmt_sinopsis = $conn->prepare("UPDATE libro SET sinopsis = ? WHERE id_libro = ?");
$stmt_sinopsis->bind_param("si", $sinopsis, $id_libro);
$stmt_sinopsis->execute();
$stmt_sinopsis->close();}
if($numero_paginas){
$stmt_numero_paginas = $conn->prepare("UPDATE libro SET numero_paginas = ? WHERE id_libro = ?");
$stmt_numero_paginas->bind_param("ii", $numero_paginas, $id_libro);
$stmt_numero_paginas->execute();
$stmt_numero_paginas->close();}
if($ISBN){
$stmt_ISBN = $conn->prepare("UPDATE libro SET ISBN = ? WHERE id_libro = ?");
$stmt_ISBN->bind_param("si", $ISBN, $id_libro);
$stmt_ISBN->execute();
$stmt_ISBN->close();}
if($editorial){
$stmt_editorial = $conn->prepare("UPDATE libro SET editorial = ? WHERE id_libro = ?");
$stmt_editorial->bind_param("si", $editorial, $id_libro);
$stmt_editorial->execute();
$stmt_editorial->close();}
if($nombre){
$stmt_nombre = $conn->prepare("UPDATE libro SET nombre = ? WHERE id_libro = ?");
$stmt_nombre->bind_param("si", $nombre, $id_libro);
$stmt_nombre->execute();
$stmt_nombre->close();}

$conn->close();
