<?php //Baneados.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
$listaBloqueados=array();
/*Mostrar usuarios bloqueados (muestra el último registro de cada usuario en la lista sobre si está bloqueado o no)
SELECT usuario.id_usuario, usuario.nombre,usuario.ip, bloqueados.accion
FROM usuario
INNER JOIN (
    SELECT id_bloqueado, id_bloqueador, accion
    FROM bloqueados 
    WHERE id IN (SELECT MAX(id) FROM bloqueados GROUP BY id_bloqueado)
) AS bloqueados ON usuario.id_usuario = bloqueados.id_bloqueado
*/
$result = $conn->query("SELECT usuario.id_usuario, usuario.nombre,usuario.ip, bloqueados.accion
FROM usuario
INNER JOIN (
    SELECT id_bloqueado, id_bloqueador, accion
    FROM bloqueados 
    WHERE id IN (SELECT MAX(id) FROM bloqueados GROUP BY id_bloqueado)
) AS bloqueados ON usuario.id_usuario = bloqueados.id_bloqueado");
if ($result) {
    if ($result->num_rows > 0) {
        // Recorrer los resultados y agregarlos al array
        while ($row = $result->fetch_assoc()) {
            if($row['accion']=='bloquear'){
            $listaBloqueados[] = [
                'id_usuario' => $row['id_usuario'],
                'nombre' => $row['nombre'],
                'ip' => $row['ip']
            ];
            }
        }
    } else {
        $listaBloqueados['error'] = 'Lista vacía';
    }
} else {
    // Si la consulta falla
    $listaBloqueados['error'] = 'Error en la consulta: ' . $conn->error;
}

$conn->close();

// Enviar la respuesta en formato JSON
echo json_encode($listaBloqueados);
?>
