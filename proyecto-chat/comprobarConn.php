<?php 
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$baseDeDatos = "if0_38647403_prueba";
// Crear conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $baseDeDatos);
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
// Verificar conexión
if ($conn->connect_error) {
    $mensajes["error"]="No se pudo establecer conexion";
    echo json_encode($mensajes);
    exit(); // Detenemos la ejecución si no hay conexión
}

?>