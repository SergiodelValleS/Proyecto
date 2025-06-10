<?php //editarFicha.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json_datos = file_get_contents('php://input');
$json_php=json_decode($json_datos,true);
echo json_encode($json_php);
$id_ficha=$json_php['id_ficha'];
$id_ficha = intval($id_ficha);
$nombre_persona = isset($json_php['nombre_persona']) ? $json_php['nombre_persona'] : null;
$titulo_opcional = isset($json_php['titulo_opcional']) ? $json_php['titulo_opcional'] : null;
$parrafo_titulo_opcional = isset($json_php['parrafo_titulo_opcional']) ? $json_php['parrafo_titulo_opcional'] : null;
$alias = isset($json_php['alias']) ? $json_php['alias'] : null;
$nombre_completo = isset($json_php['nombre_completo']) ? $json_php['nombre_completo'] : null;
$fecha_nacimiento = isset($json_php['fecha_nacimiento']) ? $json_php['fecha_nacimiento'] : null;
$nacionalidad = isset($json_php['nacionalidad']) ? $json_php['nacionalidad'] : null;
$obra_notable = isset($json_php['obra_notable']) ? $json_php['obra_notable'] : null;

$conn->set_charset("utf8");
if (isset($nombre_persona)) {
    $stmt_nombre_persona = $conn->prepare("UPDATE ficha SET nombre_persona = ? WHERE id_ficha = ?");
    $stmt_nombre_persona->bind_param("si", $nombre_persona, $id_ficha);
    $stmt_nombre_persona->execute();
    $stmt_nombre_persona->close();
}

if (isset($titulo_opcional)) {
    $stmt_titulo_opcional = $conn->prepare("UPDATE ficha SET titulo_opcional = ? WHERE id_ficha = ?");
    $stmt_titulo_opcional->bind_param("si", $titulo_opcional, $id_ficha);
    $stmt_titulo_opcional->execute();
    $stmt_titulo_opcional->close();
}

if (isset($parrafo_titulo_opcional)) {
    $stmt_parrafo_titulo_opcional = $conn->prepare("UPDATE ficha SET parrafo_titulo_opcional = ? WHERE id_ficha = ?");
    $stmt_parrafo_titulo_opcional->bind_param("si", $parrafo_titulo_opcional, $id_ficha);
    $stmt_parrafo_titulo_opcional->execute();
    $stmt_parrafo_titulo_opcional->close();
}

if (isset($alias)) {
    $stmt_alias = $conn->prepare("UPDATE ficha SET alias = ? WHERE id_ficha = ?");
    $stmt_alias->bind_param("si", $alias, $id_ficha);
    $stmt_alias->execute();
    $stmt_alias->close();
} else {
    $stmt_alias = $conn->prepare("UPDATE ficha SET alias = NULL WHERE id_ficha = ?");
    $stmt_alias->bind_param("i", $id_ficha);
    $stmt_alias->execute();
    $stmt_alias->close();
}

if (isset($nombre_completo)) {
    $stmt_nombre_completo = $conn->prepare("UPDATE ficha SET nombre_completo = ? WHERE id_ficha = ?");
    $stmt_nombre_completo->bind_param("si", $nombre_completo, $id_ficha);
    $stmt_nombre_completo->execute();
    $stmt_nombre_completo->close();
} else {
    $stmt_nombre_completo = $conn->prepare("UPDATE ficha SET nombre_completo = NULL WHERE id_ficha = ?");
    $stmt_nombre_completo->bind_param("i", $id_ficha);
    $stmt_nombre_completo->execute();
    $stmt_nombre_completo->close();
}

if (isset($fecha_nacimiento)) {
    $stmt_fecha_nacimiento = $conn->prepare("UPDATE ficha SET fecha_nacimiento = ? WHERE id_ficha = ?");
    $stmt_fecha_nacimiento->bind_param("si", $fecha_nacimiento, $id_ficha);
    $stmt_fecha_nacimiento->execute();
    $stmt_fecha_nacimiento->close();
}

if (isset($nacionalidad)) {
    $stmt_nacionalidad = $conn->prepare("UPDATE ficha SET nacionalidad = ? WHERE id_ficha = ?");
    $stmt_nacionalidad->bind_param("si", $nacionalidad, $id_ficha);
    $stmt_nacionalidad->execute();
    $stmt_nacionalidad->close();
}

if (isset($obra_notable)) {
    $stmt_obra_notable = $conn->prepare("UPDATE ficha SET obra_notable = ? WHERE id_ficha = ?");
    $stmt_obra_notable->bind_param("si", $obra_notable, $id_ficha);
    $stmt_obra_notable->execute();
    $stmt_obra_notable->close();
} else {
    $stmt_obra_notable = $conn->prepare("UPDATE ficha SET obra_notable = NULL WHERE id_ficha = ?");
    $stmt_obra_notable->bind_param("i", $id_ficha);
    $stmt_obra_notable->execute();
    $stmt_obra_notable->close();
}

$conn->close();
