<?php //mostrarFicha.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$json_array=json_decode($json,true);
$id_escritor=$json_array['id_escritor'];
$id_escritor=intval($id_escritor);
$get_pagina=$json_array['get_pagina'];
$get_pagina=intval($get_pagina);
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
//id_escritor,nombre_persona, parrafo_nombre,titulo_opcional,parrafo_titulo_opcional,imagen,alias,nombre_completo,fecha_nacimiento,nacionalidad,obras_notables*/
$stmt = $conn->prepare("SELECT id_ficha,nombre_persona, parrafo_modular_id, titulo_opcional, parrafo_titulo_opcional, imagen,alias,nombre_completo,fecha_nacimiento,nacionalidad,obra_notable FROM ficha WHERE id_escritor = ?");
$stmt->bind_param("i", $id_escritor);
$stmt->execute();
$result = $stmt->get_result();
$contenido_array=[];
if ($result && $result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $queryModular= $conn->query("SELECT texto from contenido where id_contenido={$row['parrafo_modular_id']}");
        if ($queryModular->num_rows > 0) {
            if($fila=$queryModular->fetch_assoc()){
                $row['parrafo_modular_id']=$fila['texto'];
            }
        } else { $row['parrafo_modular_id']="NO ENCONTRADO EL PÁRRAFO";}
        $contenido_array = [
            'parrafo_modular_id' => $row['parrafo_modular_id'],
            'id_ficha' => $row['id_ficha'],
            'nombre_persona' => $row['nombre_persona'],
            'titulo_opcional' => $row['titulo_opcional'],
            'parrafo_titulo_opcional' => $row['parrafo_titulo_opcional'],
            'imagen' => $row['imagen'],
            'alias' => "<span class='negrita'>Alias:</span>".$row['alias'],
            'nombre_completo' => "<span class='negrita'>Nombre completo:</span>".$row['nombre_completo'],
            'fecha_nacimiento' => "<span class='negrita'>Fecha de nacimiento:</span>".$row['fecha_nacimiento'],
            'nacionalidad' => "<span class='negrita'>nacionalidad:</span>".$row['nacionalidad'],
            'obra_notable' => "<span class='negrita'>Obras notables:</span>".$row['obra_notable'],
        ];
        if($row['alias']==null){
            $contenido_array['alias']='';
        }
        if($row['nombre_completo']==null){
            $contenido_array['nombre_completo']='';
        }
        if($row['fecha_nacimiento']==null){
            $contenido_array['fecha_nacimiento']='';
        }
        if($row['nacionalidad']==null){
            $contenido_array['nacionalidad']='';
        }
        if($row['obra_notable']==null){
            $contenido_array['obra_notable']='';
        }
    }
} else {
    $contenido_array = ['error' => 'No se encontró la ficha'];
}
echo json_encode($contenido_array);
$stmt->close();
$conn->close();