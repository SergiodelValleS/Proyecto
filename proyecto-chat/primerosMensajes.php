<?php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$id_escritor=$data['id_escritor'];
$stmt = $conn->prepare("SELECT usuario, texto, hora, id, id_escritor FROM mensajeChat where id_escritor = ? ORDER BY id DESC LIMIT ?");
$limit = 5;
$stmt->bind_param("ii", $id_escritor, $limit); // Vincular parámetros (en este caso, un entero)
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron filas
if ($result->num_rows > 0) {
    $mensajes = ["contenido" => []]; // Inicializar el arreglo

    // Recorrer las filas y construir el arreglo de mensajes
    while ($fila = $result->fetch_assoc()) {
        $mensajes["contenido"][] = htmlspecialchars(date('H:i:s',strtotime($fila['hora']))) . " <b>" . htmlspecialchars($fila['usuario']) . " | </b>  " . htmlspecialchars($fila['texto'])."<br>";
    }

    // Preparar la consulta para obtener la última ID
    $lastId = $conn->prepare("SELECT MAX(id) as ultimaId FROM mensajeChat");

    // Ejecutar la consulta preparada
    $lastId->execute();

    // Obtener el resultado
    $result2 = $lastId->get_result();
    if ($filaId =  $result2->fetch_assoc()) {
    $mensajes["id"] = htmlspecialchars($filaId['ultimaId']); // Asignar la última ID al arreglo
    }

    // Cerrar la declaración
    $lastId->close();

    // Invertir el contenido para que el último comentario quede abajo
    $mensajes["contenido"] = array_reverse($mensajes["contenido"]);

    // Codificar el arreglo en formato JSON
    echo json_encode($mensajes);
}

// Cerrar la declaración y conexión
$stmt->close();
$conn->close();
?>
