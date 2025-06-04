<?php //enviarContacto.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$json_array=json_decode($json,true);
$id_escritor=$json_array['id_escritor'];
$id_escritor=intval($id_escritor);
$nombre_y_apellidos=$json_array['nombre_y_apellidos'];
$correo_electronico=$json_array['correo_electronico'];
$mensaje=$json_array['mensaje'];
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
//id_escritor,nombre_y_apellidos,correo_electronico,mensaje
$stmt = $conn->prepare("INSERT INTO contacto (id_escritor, nombre_y_apellidos, correo_electronico, mensaje)
VALUES (?,?,?,?)");
$stmt->bind_param("isss", $id_escritor, $nombre_y_apellidos, $correo_electronico, $mensaje);
$stmt->execute();
$contenido_array=[];
if ($stmt->affected_rows > 0) {
    $contenido_array["enviado"]="La información se envió correctamente";
} else {
    $contenido_array['error']='No se pudo añadir los datos de contacto';
}
echo json_encode($contenido_array);
$stmt->close();
$conn->close();