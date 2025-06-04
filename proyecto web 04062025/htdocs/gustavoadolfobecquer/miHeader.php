
<?php
$url="https://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Esta debe ser la url, que sea https, no http, se comprobará después si se está cumpliendo.
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http"; // Comprobar si HTTPS está activado
if($protocolo==="http") {header("Location: $url");} //Obliga a que sea https
if (basename($_SERVER['PHP_SELF']) == 'miHeader.php') {
    echo "<script>alert('ERROR. Redirigiendo a página principal');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit;
    /*Uso dos scripts js y no 1 y después php con su Header('Location: index.php') porque no puedo combinar echo "<script>alert('ERROR. Redirigiendo a página principal');</script>"; y el Location*/
}


$path = parse_url($url, PHP_URL_PATH);
$nombreUsuario=basename(dirname(__FILE__));//$nombreUsuario= basename(dirname($path)); en versiones anteriores
//Url sin get
$parsed_url = parse_url($url);
$urlNoGetNoIndex = $parsed_url['scheme'] . "://" . $parsed_url['host']."/".$nombreUsuario."/";
//echo $urlNoGetNoIndex; Parecido a $urlNoGet de chat, pero difiere porque proyecto-chat no tiene un index en la url, y este sí
include "comprobarConn.php";
$id_escritor=null;
$result = $conn->query("Select id_usuario from usuario where nombre = '$nombreUsuario'");
if ($result->num_rows > 0) {
    if ($fila = $result->fetch_assoc()) {
$id_escritor=$fila['id_usuario'];
    }
}
$conn->close();
if(!isset($_GET['get_pagina'])) {$_GET['get_pagina']=1;}
function indice(){
    global $id_escritor;
    global $nombreUsuario;
    global $urlNoGetNoIndex;
    /*echo "<div class='col centrar'>";
    echo "<p class='pHeader' id='marcar_1'><a href='index?get_pagina=1'>Inicio</a></p></div>";

    echo "<div class='col centrar'><p class='pHeader' id='marcar_2'><a href='https://proyectodaw.free.nf/$nombreUsuario/index?get_pagina=2'>Biografía</a></p></div>";

    echo "<div class='col centrar'><p class='pHeader'>";
    echo "<a href='https://proyectodaw.free.nf/proyecto-chat/?id_escritor=$id_escritor'>Chat</a>";
    echo "</p></div>";

    echo "<div class='col centrar'><p class='pHeader' id='marcar_3'><a href='https://proyectodaw.free.nf/$nombreUsuario/index?get_pagina=3'>Libros</a></p></div>";

    echo "<div class='col centrar'><p class='pHeader' id='marcar_foro'><a href='clubdelectura?foro=YES'>Club de Lectura</a></p></div>";*/
include "comprobarConn.php";
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente
$result = $conn->query("SELECT titulo from pagina where id_escritor=$id_escritor");
if ($result) {
    if ($result->num_rows > 0) {
        $contador=1;
        // Recorrer los resultados y agregarlos al array
        while ($row = $result->fetch_assoc()) {
            //echo $contador;
            if($contador<2){
                
            echo "<div class='col centrar'>";
            echo "<p class='pHeader' id='marcar_$contador'><a href='$urlNoGetNoIndex"."index?get_pagina=$contador'>{$row['titulo']}</a></p></div>";
            //Necesito usar $urlNoGetNoIndex y luego poner el index porque si estoy desde el foro, el foro no tiene index, y me lo cargaría.
            $contador++;
            }
            else {if($contador==3){
                echo "<div class='col centrar'><p class='pHeader'>";
                echo "<a href='https://proyectodaw.free.nf/proyecto-chat/?id_escritor=$id_escritor'>Chat</a>";
                echo "</p></div>";
                echo "<div class='col centrar'>";
            echo "<p class='pHeader' id='marcar_$contador'><a href='$urlNoGetNoIndex"."index?get_pagina=$contador'>{$row['titulo']}</a></p></div>";
                $contador++;
            } else {
                echo "<div class='col centrar'>";
            echo "<p class='pHeader' id='marcar_$contador'><a href='$urlNoGetNoIndex"."index?get_pagina=$contador'>{$row['titulo']}</a></p></div>";
            $contador++;
                

            }
            }
        } 
        echo "<div class='col centrar'>";
        $rutaClubDeLectura=$urlNoGetNoIndex."clubdelectura";
        echo "<p class='pHeader' id='marcar_$contador'><a href='$rutaClubDeLectura'>Club de Lectura</a></p></div>";    } else {
        //$listaBloqueados['error'] = 'Lista vacía';
    }
} else {
    // Si la consulta falla
    //$listaBloqueados['error'] = 'Error en la consulta: ' . $conn->error;
}

$conn->close();
    }
?>
<div class="contenedorHeader">
    <div class="logoDiv centrar" style='width:12.5%'>aqui el logo</div>
    <div class="row m-0 centrar" style='width:87.5%'>
        <?php indice();?>
        <script>
        if(!<?php echo json_encode(isset($_GET['foro']));?>){
        let paraSubrayar = document.getElementById(<?php echo json_encode('marcar_'.$_GET['get_pagina']);?>);
        console.log(paraSubrayar.innerText);
        paraSubrayar.classList.add('subrayado');
        } else {
            document.getElementById('marcar_foro').classList.add('subrayado');
        }
        </script>
    </div>
</div>
