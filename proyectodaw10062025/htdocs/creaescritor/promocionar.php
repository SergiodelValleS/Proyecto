<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
include "../comprobarConn.php";
$stmt = $conn->prepare("UPDATE usuario SET jerarquia = 'escritor' WHERE id_usuario = ?");
$stmt->bind_param("i", $_POST['usuario']); // 's' para string, 'i' para int
$stmt->execute();
$stmt->close();
$url_pagina1="https://proyectodaw.free.nf/".$_POST['nombre']."/index";
$stmt_pagina1=$conn->query("INSERT INTO pagina (titulo,url,id_escritor) values ('Escritor','$url_pagina1',{$_POST['usuario']})");
$id_pagina1=$conn->insert_id; /*Necesario para tabla modular*/
$url_pagina2="https://proyectodaw.free.nf/".$_POST['nombre']."/index?get_pagina=2";
$stmt_pagina2=$conn->query("INSERT INTO pagina (titulo,url,id_escritor) values ('Biografía','$url_pagina2',{$_POST['usuario']})");
$id_pagina2=$conn->insert_id;/*Necesario para tabla modular*/
$url_pagina3="https://proyectodaw.free.nf/".$_POST['nombre']."/index?get_pagina=3";
$stmt_pagina3=$conn->query("INSERT INTO pagina (titulo,url,id_escritor) values ('Libros','$url_pagina3',{$_POST['usuario']})");
//$id_pagina3=$conn->insert_id; /*No es necesario*/
$stmt_contenido_imagen_user = $conn->query("INSERT INTO contenido (nombre, texto, tipo) VALUES ('imagen_" . $_POST['nombre'] . "', 'nodisponible.jpg', 'img')");
$id_contenido_imagen_user=$conn->insert_id; /*Necesario para la tabla modular*/
$stmt_contenido_titulo_user = $conn->query("INSERT INTO contenido (nombre, texto, tipo) VALUES ('titulo_" . $_POST['nombre'] . "', 'titulo de prueba', 'titulo')");
$id_contenido_titulo_user=$conn->insert_id; /*Necesario para la tabla modular*/
$stmt_contenido_texto_user = $conn->query("INSERT INTO contenido (nombre, texto, tipo) VALUES ('texto_" . $_POST['nombre'] . "', 'parrafo de prueba', 'parrafo')");
$id_contenido_texto_user=$conn->insert_id; /*Necesario para la tabla ficha y para tabla modular*/
$stmt_modular1=$conn->query("INSERT INTO modular (id_pagina,id_contenido) VALUES ($id_pagina1,$id_contenido_imagen_user)");
$stmt_modular2=$conn->query("INSERT INTO modular (id_pagina,id_contenido) VALUES ($id_pagina1,$id_contenido_titulo_user)");
$stmt_modular3=$conn->query("INSERT INTO modular (id_pagina,id_contenido) VALUES ($id_pagina1,$id_contenido_texto_user)");
$stmt_modular4=$conn->query("INSERT INTO modular (id_pagina,id_contenido) VALUES ($id_pagina2,$id_contenido_texto_user)");
$stmt_ficha=$conn->query("INSERT INTO ficha (id_escritor,nombre_persona,parrafo_modular_id,titulo_opcional,parrafo_titulo_opcional,imagen,alias,nombre_completo,fecha_nacimiento,nacionalidad) VALUES ({$_POST['usuario']},'{$_POST['nombre']}',$id_contenido_texto_user,'titulo opcional','párrafo titulo opcional','nodisponible.jpg','alias','nombre completo del escritor','01/01/2000','nacionalidad')");
echo json_encode("El usuario con id ".$_POST['usuario']." y nombre ". $_POST['nombre']." es ahora es un escritor");
function copiarCarpeta($origen, $destino) {
    // Verificar si la carpeta de destino existe, si no, crearla
    if (!is_dir($destino)) {
        mkdir($destino, 0777, true);
    }

    // Obtener los archivos y carpetas dentro de la carpeta origen
    $archivos = scandir($origen);

    foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
            $rutaOrigen = $origen . DIRECTORY_SEPARATOR . $archivo;
            $rutaDestino = $destino . DIRECTORY_SEPARATOR . $archivo;

            if (is_dir($rutaOrigen)) {
                // Si es una carpeta, hacer una copia recursiva
                copiarCarpeta($rutaOrigen, $rutaDestino);
            } else {
                // Si es un archivo, copiarlo
                copy($rutaOrigen, $rutaDestino);
            }
        }
    }
}
$origen = "../moldeescritor";
$destino = "../".$_POST['nombre'];
copiarCarpeta($origen, $destino);
}
?>
