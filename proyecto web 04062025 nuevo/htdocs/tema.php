<?php
session_start();
//print_r($_SESSION);
if(!isset($_GET['id_escritor'])&&!isset($_GET['id_tema'])){ //Si no existe alguno de los dos, error
    echo "<script>alert('FALTA ALGÚN/OS GET la página no se cargará') </script>";
    echo "pagina sin cargar";
    exit();
}
$_GET['id_tema']=htmlspecialchars($_GET['id_tema']);
//echo "<pre>";print_r($_GET);echo "</pre>";
include "comprobarConn.php";
$escritores=[];
$result = $conn->query("Select id_usuario, jerarquia from usuario where id_usuario = '{$_GET['id_escritor']}' AND jerarquia='escritor'");
if ($result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
$escritores[]=$fila['id_usuario'];
    }
}
$conn->close();
$activarChat=false;
if(isset($_GET['id_escritor'])){
if(in_array($_GET['id_escritor'],$escritores)){
echo "<script>console.log('se encuentra en la lista')</script>";
$activarChat=true;
}else {
    echo "<script>console.log('NO se encuentra en la lista')</script>";
    $activarChat=false;
}
}


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <style>
    *{font-family: 'Inter', sans-serif;}
        a{
        text-decoration: none !important;
        }
        a:link {
        color: blue !important;
        }

        /* visited link */
        a:visited {
        //color: green !important;
        }

        /* mouse over link */
        a:hover {
        color: pink! important;
        }

        /* selected link */
        a:active {
        //color: yellow !important;
        }
        .container{
            margin-top:5%;
        }
        .caja-texto {
          width: 100%; /* Ajusta el ancho según sea necesario */
          border: 1px solid #ddd; /* Borde opcional */
          font-family: Arial, sans-serif;
          margin-top:10px;
          border:1px solid black;
        }
        .usuario-datos{
            padding:10px;
            background-color:#d9d9d9;
            text-align:center;
        }
        .usuario-mensaje{
background-color:rgb(250,250,250);
padding:10px;
        }
        
        #usuarioInput{text-align: center;}
        #mensajeUsuarioForo{width:100%;padding-left: 13px;height:150px;}
        
        #contador{position:absolute;right:10px;}
        #formulario{
            margin-top:10px;border:1px solid black;padding:10px;position:relative;
            background-color:white;
            }
        .cajaPrincipalTema{background: radial-gradient(circle,#FF9BE3, rgb(193, 58, 251));
    overflow:hidden;}
        </style>
</head>
<body>
<script>
function mostrarModal(mensaje) {
    // ✅ Eliminamos cualquier modal previo antes de agregar uno nuevo
    let modalExistente = document.getElementById('miModal');
    if (modalExistente) {
        modalExistente.remove();
    }

    // ✅ Creación del modal con Bootstrap
    let modalHTML = `
        <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Mensaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                ${mensaje} <!-- ✅ Mensaje dinámico -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
    `;

    // ✅ Agregamos el modal al `body`
    let modalElemento = document.createElement('div');
    modalElemento.innerHTML = modalHTML;
    document.body.appendChild(modalElemento);

    // ✅ Mostramos el modal con Bootstrap 5
    let miModal = new bootstrap.Modal(document.getElementById('miModal'));
    miModal.show();
}
</script>
<div class='cajaPrincipalTema'>
    <div class="container">
                    <?php include "comprobarConn.php";
                    $url="https://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Esta debe ser la url, que sea https, no http, se comprobará después si se está cumpliendo.
                    //Url sin get
                    $parsed_url = parse_url($url);
                    $urlNoGet = $parsed_url['scheme'] . "://" . $parsed_url['host'] . $parsed_url['path'];
                    $urlSinFichero=dirname($urlNoGet);
                    //url sin get
                    $resultEscritor=$conn->query("select nombre from usuario where id_usuario='{$_GET['id_escritor']}' AND jerarquia='escritor'");
                    //echo $urlSinFichero;
                    if($resultEscritor->num_rows==0) {echo "<script>alert('no se obtuvo un id_escritor válido. No es posible encontrar el club de lectura del escritor, escribir mensaje en el foro no estará disponible.');</script>";}
                    else if ($resultEscritor->num_rows==1){
                         if($fila=$resultEscritor->fetch_assoc()){
                        echo "<h1 style='text-align:center'><a href='$urlSinFichero"."/{$fila['nombre']}/clubdelectura'>Regresar a club de lectura</a></h1>";}
                        }
                    $titulo=null;
                    $stmt = $conn->prepare("SELECT titulo FROM temas WHERE id_tema = ?");
                    $stmt->bind_param("s", $_GET['id_tema']);
                    $stmt->execute();
                    $resultTitulo = $stmt->get_result();
                    $existeTema=false;
                    if ($resultTitulo->num_rows > 0) {
                        if ($fila = $resultTitulo->fetch_assoc()) {
                            $titulo=$fila['titulo'];
                            $existeTema=true;
                        }
                    }
                    if($existeTema){
                    echo "<h1 style='text-align:center;border-bottom:1px solid black;border-top:1px solid black;padding-bottom:3px;background-color:white;'>".$titulo."</h1>";
                    $stmt2 = $conn->prepare("SELECT usuario, fecha, texto, tema_id FROM mensajeForo WHERE tema_id = ? order by fecha ASC");
                    $stmt2->bind_param("s", $_GET['id_tema']);
                    $stmt2->execute();
                    $result = $stmt2->get_result();
                    
                    if($result->num_rows==0){
                        echo "<div class='caja-texto'>este tema no tiene mensajes aún</div>";
                    }else if($result->num_rows>0){
                        while($fila=$result->fetch_assoc()){
                            $fila['texto']=htmlspecialchars($fila['texto']);
                            $fila['usuario']=htmlspecialchars($fila['usuario']);
                            $stmt_rango = $conn->prepare("SELECT jerarquia from usuario where nombre=?");
                            $stmt_rango->bind_param("s", $fila['usuario']);
                            $stmt_rango->execute();
                            $rango=""; //Inicializo el código
                            $rango_get_result = $stmt_rango->get_result();
                            if($fila_rango=$rango_get_result->fetch_assoc()){
                                $rango=$fila_rango['jerarquia'];
                            }
                            echo "<div class='caja-texto'>";
                            //Formateo fecha, en la base de datos sale primero año, luego mes, luego día, y no queremos eso
                            $fecha_original = $fila['fecha']; // Formato YYYY-MM-DD
                            $fecha_formateada = date("d-m-Y H:i:s", strtotime($fecha_original));
                             //Formateo fecha, en la base de datos sale primero año, luego mes, luego día, y no queremos eso
                            echo "<div class='usuario-datos'><h1>{$fila['usuario']}</h1><h1>$rango</h1><h1> $fecha_formateada</h1>
                            </div>"; //cierre usuario-datos
                            echo "<div class='usuario-mensaje'><p>{$fila['texto']}</p></div>";//cierre usuario-mensaje
                            echo "</div>"; //cierre caja-texto
                        }
                    }
                    } else{
                        echo "<script> mostrarModal('No se encontró el tema, redirigiendo a la página principal');setTimeout(() => {
  location.href='https://www.proyectodaw.free.nf';
}, 3000);</script>";
                       
                    }
                    if($activarChat && $existeTema) {
                        echo "<form id='formulario' onsubmit='enviarMensajeTema(event);'>
                            <label>Usuario</label><input type='text' id='usuarioInput' readonly> <br><br> 
                            <label>  Mensaje: </label><textarea id='mensajeUsuarioForo' maxlength='400' required></textarea><br><br> 
                            <input type='submit' id='enviar'><span id='contador'>400/400 carácteres disponibles</span>
                        </textarea>";
                     }
                     
                    
                    ?>
        
            
        

        <!-- Borrador de como debe verse
        <div class="caja-texto">
            <div class="usuario-datos">
                    <h1>Nombre de usuario</h1><h1>Rango</h1><h1>Fecha del mensaje</h1>
            </div>
            <div class="usuario-mensaje">
            a
            </div>
        </div>
        "<form id='formulario'>
                            <label>Usuario</label><input type='text' id='usuarioInput' readonly> <br><br> 
                            <label>  Mensaje: </label><input type='text' id='mensajeUsuario' maxlength='100' required><br><br> 
                            <input type='submit'><span id='contador'>100/100 carácteres disponibles</span>
                        </textarea>"
        -->
    </div>
</div>
    <script>
    let miUsuario;
let existeUsuario = <?php echo json_encode(isset($_SESSION['nombre'])); ?>;
let enviar=document.getElementById('enviar');
if (!existeUsuario || <?php echo json_encode(isset($_SESSION['invitado'])); ?>) {
    if(!existeUsuario){
miUsuario = <?php if (isset($_SESSION['nombre'])) {echo json_encode($_SESSION['nombre']);} else {echo '""';}?> //Sé que nunca va a pasar por el else pero sino lo hago así, no me va bien el código si uso invitado    console.log("!existeUsuario");
    mensajeUsuarioForo.innerText="No puedes escribir en el tema si no estás registrado";
    mensajeUsuarioForo.disabled=true;
    enviar.disabled=true;
    } else {
    
    //miUsuario = "invitado" + (Math.random().toString(36).substr(2, 8));
    miUsuario=<?php if (isset($_SESSION['nombre'])) {echo json_encode($_SESSION['nombre']);} else {echo '""';}?>;
    console.log("!existeUsuario");
    mensajeUsuarioForo.innerText="No puedes escribir en el tema si eres un invitado";
    mensajeUsuarioForo.disabled=true;
    enviar.disabled=true;
    }
} else {
    console.log("Pasó por el else");
    miUsuario = <?php if (isset($_SESSION['nombre'])) {echo json_encode($_SESSION['nombre']);} else {echo '""';}?> //Sé que nunca va a pasar por el else pero sino lo hago así, no me va bien el código si uso invitado
}

document.getElementById("usuarioInput").value = miUsuario;
 let  contador = document.getElementById("contador");
  mensajeUsuarioForo.addEventListener("input", function(event) {
    contador.innerText=(400-mensajeUsuarioForo.value.length) + "/400 carácteres disponibles";
    });

    function enviarMensajeTema(event) {
        // Evitar el envío del formulario   //id_mensaje,fecha,tema_id,texto,usuario
        event.preventDefault();
        const miMensaje = document.getElementById("mensajeUsuarioForo").value;
        const miJson = {};
        miJson.texto=miMensaje;miJson.usuario=miUsuario;miJson.tema_id=<?php echo json_encode($_GET['id_tema']);?>;
        //console.log(miJson);
        let xhr = new XMLHttpRequest();
        

        // Configurar la solicitud
        xhr.open("POST", "https://proyectodaw.free.nf/"+"enviarMensajeTema.php", true); // Método POST y URL del recurso
        xhr.send(JSON.stringify(miJson));console.log(JSON.stringify(miJson));
        // Manejar la respuesta
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
                    let respuestaJSON = this.responseText;
                    console.log(respuestaJSON);
                    respuestaJSON=JSON.parse(respuestaJSON);
                    if(!respuestaJSON['error']){
                        mostrarModal("Tu mensaje ha sido enviado. Se actualizará la página.");
                        setTimeout(() => {location.reload();}, 5000);
                    } else {mostrarModal(respuestaJSON['error']);}
                    
                    
                } else {
                    //console.error("Error en la solicitud:");
                }
            
            
        }; 
        }
    </script>
</body>
</html>