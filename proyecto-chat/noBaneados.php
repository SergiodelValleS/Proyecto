<?php //noBaneados.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
$listaBloqueados=array();
/*Para mostrar también los usuarios que no están en la tabla bloqueados, debes cambiar el INNER JOIN por un LEFT JOIN. Esto asegurará que todos los usuarios aparezcan, incluso aquellos que no tienen un registro en bloqueados.
SELECT usuario.id_usuario, usuario.nombre, usuario.ip, bloqueados.accion
FROM usuario
LEFT JOIN (
    SELECT id_bloqueado, id_bloqueador, accion
    FROM bloqueados 
    WHERE id IN (SELECT MAX(id) FROM bloqueados GROUP BY id_bloqueado)
) AS bloqueados ON usuario.id_usuario = bloqueados.id_bloqueado;

Esto hace que si el usuario no sale en la tabla bloqueados pero si en usuarios, accion = "null". Si la última acción a ese usuario fue una u otra, aparece en columna accion
*/
$result = $conn->query("SELECT usuario.id_usuario, usuario.nombre, usuario.ip, bloqueados.accion
FROM usuario
LEFT JOIN (
    SELECT id_bloqueado, id_bloqueador, accion
    FROM bloqueados 
    WHERE id IN (SELECT MAX(id) FROM bloqueados GROUP BY id_bloqueado)
) AS bloqueados ON usuario.id_usuario = bloqueados.id_bloqueado;");
if ($result) {
    if ($result->num_rows > 0) {
        // Recorrer los resultados y agregarlos al array
        while ($row = $result->fetch_assoc()) {
            if($row['accion']=='desbloquear' || $row['accion']==null){
            $listaBloqueados[] = [
                'id_usuario' => $row['id_usuario'],
                'nombre' => $row['nombre'],
                'ip' => $row['ip']
            ];
        }}
    } else {
        $listaBloqueados['error'] = 'Lista vacía';
    } 
}else {
    // Si la consulta falla
    $listaBloqueados['error'] = 'Error en la consulta: ' . $conn->error;
}

$conn->close();

// Enviar la respuesta en formato JSON
echo json_encode($listaBloqueados);
?>
