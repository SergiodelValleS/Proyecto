<?php
include_once("comprobarConn.php");
// Leer el JSON enviado por el cliente
$contenido = file_get_contents("php://input");
$datos = json_decode($contenido, true);

// Obtener los valores del JSON
$usuario = $datos['nuevousuario']['usuario'];
$contrasena = $datos['nuevousuario']['contraseña'];
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
$correo = $datos['nuevousuario']['correo'];

//Obtener IP
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
$IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
else {$IP=$_SERVER['REMOTE_ADDR'];}

$comprobarUsuario = $conn->prepare("SELECT nombre FROM usuario WHERE nombre = ?");

$comprobarUsuario->bind_param("s", $usuario);

$comprobarUsuario->execute();

$resultComprobarUsuario = $comprobarUsuario->get_result();

if ($resultComprobarUsuario ->num_rows > 0) {
    echo json_encode(["mensaje" => "Ese nombre de usuario ya ha sido registrado."]);
} else{
// Preparar la consulta SQL
$fecha_creacion=date('Y-m-d H:i:s');
$sql = "INSERT INTO usuario (nombre, contraseña, correo,IP,fecha_creacion) VALUES ('$usuario', '$contrasena', '$correo','$IP','$fecha_creacion')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["mensaje" => "Registro insertado exitosamente."]);
} else {
    echo json_encode(["mensaje" => "Error: " . $conn->error]);
}
}
$comprobarUsuario->close();
$conn->close();
?>
