<?php //mostrarContenido.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$json_array=json_decode($json,true);
$id_escritor=$json_array['id_escritor'];
$get_pagina=($json_array['get_pagina']);
$id_escritor=intval($id_escritor);
$get_pagina = intval($get_pagina); //Necesito que sea numérico
$offset=($get_pagina-1); //No me deja restarlo en la query por alguna razón,  a si que lo meto así
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
//get_pagina coge la primera pagina, segunda, terecera...n-esima y con limit n OFFSET n-1 podemos coger la id de esa pagina de ese escritor
$result = $conn->query("SELECT id_pagina from pagina where id_escritor=$id_escritor LIMIT 1 OFFSET $offset"); //PUEDE DAR ERROR SI OFFSET = NEGATIVO
$contenido_array=[];
if ($result) {
    if ($result->num_rows > 0) {
        // Recorrer los resultados y agregarlos al array
        if ($row = $result->fetch_assoc()) { //Encontró la página adecuada
            $result2 = $conn->query("SELECT 
    modular.id_pagina, 
    contenido.id_contenido, 
    contenido.nombre, 
    contenido.texto, 
    contenido.tipo
FROM modular
INNER JOIN contenido ON modular.id_contenido = contenido.id_contenido WHERE modular.id_pagina = {$row['id_pagina']}");
while ($row2 = $result2->fetch_assoc()) {
    $fila_dato=[];
    $fila_dato['nombre']=$row2['nombre'];
    $fila_dato['texto']=$row2['texto'];
    $fila_dato['tipo']=$row2['tipo'];
    $fila_dato['id_contenido']=$row2['id_contenido'];
$contenido_array[]= $fila_dato;
}

        }
    } else {
        $contenido_array[]="NO EXISTE";
    }
} else {
    // Si la consulta falla
    //$listaBloqueados['error'] = 'Error en la consulta: ' . $conn->error;
}
echo json_encode($contenido_array);
$conn->close();