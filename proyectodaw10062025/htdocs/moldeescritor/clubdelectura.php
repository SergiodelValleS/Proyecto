<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de lectura</title>
    <!--<script src="miJS.js"></script>-->
    <link href="miCSS.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include_once "miHeader.php"; ?>
    <?php include "comprobarConn.php"?>
<div id='cajaPrincipal'>
<div class="container" style='text-align:center'>
                    <?php 
                    if(isset($_SESSION['nombre'])&&!isset($_SESSION['invitado'])){   //Activa el botón de crear tema solo si se es usuario jerarquia usuario o superior
    echo "<button onclick='crearTema(this)' style='text-align:center;'>Crear nuevo tema</button>";
    $_POST['url']=$url;
}
                    $result = $conn->query("SELECT id_tema,fecha,titulo,texto,usuario_creador from temas where id_escritor=$id_escritor order by fecha DESC");
if ($result->num_rows > 0) {
    $numero_mensajes=0; //Inicializo
    while ($fila = $result->fetch_assoc()) {
        $result_mensajes = $conn->query("SELECT COUNT(*) as totalMensajes FROM mensajeForo where tema_id={$fila['id_tema']}");
        if($fila_mensajes = $result_mensajes->fetch_assoc()){
            $numero_mensajes=$fila_mensajes['totalMensajes'];
        }
        $fila['titulo']=htmlspecialchars($fila['titulo']);
        $fila['usuario_creador']=htmlspecialchars($fila['usuario_creador']);
        echo "<div class='caja-texto'>"; echo "<div class='usuario-datos'>";
        echo "<h1>{$fila['titulo']}</h1>";
        echo "<h2>Tema creado por el usuario {$fila['usuario_creador']}</h2>";
        $fechaDate=DateTime::createFromFormat('Y-m-d H:i:s', $fila['fecha']);
        $fila['fecha'] =  $fechaDate->format('d-m-Y');
        echo "<div class='row'><div class='col'><a href='https://proyectodaw.free.nf/tema.php"."?id_escritor=$id_escritor&id_tema={$fila['id_tema']}'".">Visitar tema</a></div><div class='col'>{$fila['fecha']} $numero_mensajes MENSAJES</div>";
        echo "</div></div></div>";
    }
} else {
    echo "<p style='background-color:white'>No hay resultados encontrados.</p>";
}


/* Cerrar conexión*/
$conn->close();
?>
</div>
</div>
<script>
if (<?php echo json_encode((isset($_SESSION['nombre']))&&(!isset($_SESSION['invitado'])));?>) {
console.log(<?php if(isset($_SESSION['nombre'])) {echo json_encode("valor de session nombre {$_SESSION['nombre']}");} else echo json_encode(""); ?>);//Sé que solo puede darse una condición pero o hago esto o no funciona el script
console.log(<?php if(isset($_SESSION['invitado'])) {echo json_encode("Es un invitado");} else echo json_encode("No es invitado"); ?>);//Sé que solo puede darse una condición pero o hago esto o no funciona el script
}
function crearTema(elemento){  //Genera la cajita que permite crear un tema. Además, borra el elemento.
let cajaTema=document.createElement('form');
cajaTema.action="https://proyectodaw.free.nf/enviarTema.php";cajaTema.method='POST';
 cajaTema.innerHTML = `
            <label for='titulo'>Título</label>
                <input type='text' id='titulo' name='titulo' required><br>
                <label for='mensajeUsuarioForo'>Texto</label><br>
                <textarea id="mensajeUsuarioForo" name="texto" maxlength="400" required></textarea><br>
                <button type='submit'>Enviar</button>`;
 cajaTema.innerHTML+= "<input type='hidden' name='url' value='<?php echo $url; ?>'>";
cajaTema.innerHTML += "<input type='hidden' name='usuario' value='<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>';>";
cajaTema.innerHTML+="<input type='hidden' name='id_escritor' value=<?php echo $id_escritor; ?>>";
let principal=document.getElementsByClassName('container')[0];
principal.prepend(cajaTema); //Prepend es como appendChild pero el nuevo hijo se vuelve el primer hijo y no el último
elemento.remove();
} //Aunque se vea mal,  funciona
</script>
<?php include_once "../miFooter.php"; ?>
</body>
</html>