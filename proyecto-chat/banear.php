<?php //banear.php
// Incluye la conexión a la base de datos
include "comprobarConn.php";
header("Content-Type: application/json; charset=utf-8");

// Extraer datos enviados en la solicitud
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Configurar codificación de caracteres para manejar caracteres especiales
$conn->set_charset("utf8");

// Validar si se recibió el nombre en el JSON
if (isset($data['nombre'])&&isset($data['bloqueador'])&&isset($data['id_usuario_baneado'])) {
    // Preparar la consulta SQL //INSERT INTO usuarios (nombre, edad, correo) VALUES ('Juan Pérez', 30, 'juan@example.com');
    $stmt_id_bloqueador=$conn->query("Select id_usuario from usuario where nombre='{$data['bloqueador']}'");
    $id_bloqueador=null; //inicializo
    if($fila=$stmt_id_bloqueador->fetch_assoc()){
         $id_bloqueador=intval($fila['id_usuario']);
    }
    $data['id_usuario_baneado']=intval($data['id_usuario_baneado']);
    $fecha=date("Y-m-d");$accion = "bloquear";
    $stmt = $conn->prepare("INSERT INTO bloqueados (id_bloqueador,id_bloqueado,fecha,accion) VALUES (?, ?, ?,?)");
    $stmt->bind_param("iiss", $id_bloqueador,$data['id_usuario_baneado'],$fecha,$accion); 

    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        echo json_encode(["mensaje" => "Usuario bloqueado", "nombre" => $usuario]);
    } else {
        echo json_encode(["error" => "Error al ejecutar la acción"]);
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    // Respuesta en caso de que no se envíe el nombre
    echo json_encode(["error" => "No se recibieron todos los parámetros"]);
    $conn->close();
}
