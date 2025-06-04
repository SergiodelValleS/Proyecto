<?php //index.php de proyecto-chat
session_start();
/*echo "SESSION<br>";
print_r($_SESSION);
echo "<br>SESSION<br>";
//echo $_SESSION['nombre'];*/
$url="https://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Esta debe ser la url, que sea https, no http, se comprobará después si se está cumpliendo.
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http"; // Comprobar si HTTPS está activado
if($protocolo==="http") {header("Location: $url");} //Obliga a que sea https
//Url sin get
$parsed_url = parse_url($url);
$urlNoGet = $parsed_url['scheme'] . "://" . $parsed_url['host'] . $parsed_url['path'];
/*echo "urlNoGet<br>";
echo $urlNoGet;
echo "<br>urlNoGet<br>";*/
//echo $urlNoGet;
//Url sin get
if(!isset($_GET['id_escritor'])){
$_GET['id_escritor']=1;
echo "<script>console.log('no se encontró id_escritor, se estableció su valor a 1')</script>";
}
echo "<script>console.log('Valor de id_escritor: " . $_GET['id_escritor'] . "');</script>";

/*Si para el get id_escritor existe un id_escritor, que funcione el chat, sino, muestra "NO EXISTE UN CHAT"*/
include "comprobarConn.php";
$escritor=[];
$result = $conn->query("Select id_usuario,nombre, jerarquia from usuario where id_usuario = '{$_GET['id_escritor']}' AND jerarquia='escritor'");
if ($result->num_rows > 0) {
    while ($fila = $result->fetch_assoc()) {
$escritor['id']=$fila['id_usuario'];
$escritor['nombre']=$fila['nombre'];
    }
} else {$escritor['nombre']=null;} //Lo pongo null, porque si no existe me da problemas en el js
/*echo "ID Y NOMBRE DEL ESCRITOR<br>";
print_r($escritor);
echo "<br>ID Y NOMBRE DEL ESCRITOR<br>";*/
$conn->close();
//print_r($escritores);
$activarChat=false;
if(in_array($_GET['id_escritor'],$escritor)){
echo "<script>console.log('se encuentra en la lista')</script>";
$activarChat=true;
}else {
    echo "<script>console.log('NO se encuentra en la lista')</script>";
    $activarChat=false;
}

//Comprobar que usuario es superadmin o escritor
if(isset($_SESSION['nombre'])){
    $jerarquia='';
include "comprobarConn.php";
$result2 = $conn->query("Select jerarquia from usuario where nombre = '{$_SESSION['nombre']}'");
if ($result2->num_rows > 0) {
    if ($fila = $result2->fetch_assoc()) {
$jerarquia=$fila['jerarquia'];
    }
}

//echo $jerarquia;

$conn->close();
} else {
    $jerarquia=null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <style>
    *{font-family: 'Inter', sans-serif;}
    #caja-texto{border:1px solid black;}
        .scrollable-div {
          width: 100%; /* Ajusta el ancho según sea necesario */
          height: 150px; /* Altura máxima visible */
          border: 1px solid #ddd; /* Borde opcional */
          overflow-y: auto; /* Agrega una barra de desplazamiento vertical si es necesario */
          padding: 10px; /* Espaciado interno */
          font-family: Arial, sans-serif;
          margin-top:5%;
          padding-top:10px;padding-bottom:10px;
        }
        #usuarioInput{text-align: center;}
        #mensajeUsuario{width:100%;padding-left: 13px;}
        #formulario{margin-top:10px;border:1px solid black;padding:10px;position:relative;}
        #contador{position:absolute;right:10px;}
        #usuarioInput{caret-color: transparent;}
        body{background: radial-gradient(circle,#FF9BE3, rgb(193, 58, 251));}
        /*Para este archivo, comprobar si idéntico de otros estilos de otros archivos*/
        #formulario{background-color:white;}
        #caja-texto{background-color:white;}
        /*Para este archivo, comprobar si idéntico de otros estilos de otros archivos*/

        </style>
</head>
<body>
    <script> /* Para acelerar la exposición, hice cajitas que al hacer click, te cambia la sesión */
    /* alerta personalizado bootstrap, se llama modal*/
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
/* alerta personalizado bootstrap, se llama modal*/
    function cambiarSesion(numero){
        var xhttp = new XMLHttpRequest();
        let datos={};
        if(numero==1) datos={nombre:"superadmin"} //superadmin
        if(numero==2) datos={nombre:"arturoperez"} //escritor
        if(numero==3) datos={nombre:"invitadom1gcedb3"} //invitado
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           location.reload();
       }
    };
    xhttp.open("POST", "SesionExposicion.php", true);
    xhttp.send(JSON.stringify(datos));
}

    </script> 
    <div class='container' id='container'>
    <h1 style="text-align:center" id='rotulo-chat'>CHAT</h1>     <!--Hacer que cargue el nombre del autor, y aparece encima del chat-->
    <div class='scrollable-div' id='caja-texto'>
    </div>
    <?php if($activarChat) {   ////////////////////METER ESTO COMO FUNCIÓN O ALGO PLS
    echo "
    <form id='formulario' onsubmit='enviarConCooldown(event);'>
        <label>Usuario</label><input type='text' id='usuarioInput' readonly> <br><br> 
        <label>  Mensaje: </label><input type='text' id='mensajeUsuario' maxlength='100' required><br><br> 
        <input type='submit'><span id='contador'>100/100 carácteres disponibles</span>
    
    </form>";
    include "comprobarConn.php";
$result = $conn->query("Select nombre from usuario where id_usuario = '{$_GET['id_escritor']}'");
if ($result->num_rows > 0) {
    if ($fila = $result->fetch_assoc()) {
$nombre=$fila['nombre'];
    }
}
echo "<div style='text-align:center'><a href='https://proyectodaw.free.nf/" . $nombre . "/clubdelectura'><h1>Ir al club de lectura del escritor</h1></a></div>";
$conn->close();
}?>
<div id='mostrarNoBaneados'></div>
<div id='mostrarBaneados'></div>
    <script>
if(<?php echo json_encode($activarChat == 1); ?>){
        let cooldown=false; //Impide spam
        cajaTexto=document.getElementById("caja-texto");
        const mensajeUsuario = document.getElementById("mensajeUsuario");
        let lastId=parseInt(-1); //Luego se actualizará a lastId, primero al cargar el chat, y luego con las actualizaciones
        //let nombreUsuario = prompt("Escribe INVITADO para chatear como invitado o LOGIN para chatear registrandote").toUpperCase();
        //while(!(nombreUsuario=="INVITADO"||nombreUsuario=="LOGIN")){
        //    nombreUsuario = prompt("Escribe INVITADO para chatear como invitado o LOGIN para chatear registrandote").toUpperCase();
        //nombreUsuario=nombreUsuario.replace(/\s+/g, ""); // Eliminar todos los espacios
        //if(nombreUsuario=="INVITADO") 
       rotuloChat=document.getElementById('rotulo-chat');
       rotuloChat.innerText="CHAT DE "+<?php echo json_encode(strtoupper($escritor['nombre']));?>;
       nombreUsuario=document.getElementById("usuarioInput");
        //La linea anterior aplica un usuario de nombre aleatorio, si es un invitado
      let miUsuario;
let existeUsuario = <?php echo json_encode(isset($_SESSION['nombre'])); ?>;

if (!existeUsuario) {
    console.log("Pasó por el if");
    miUsuario = "invitado" + (Math.random().toString(36).substr(2, 8));
} else {
    console.log("Pasó por el else");
    miUsuario = <?php if (isset($_SESSION['nombre'])) {echo json_encode($_SESSION['nombre']);} else {echo '""';}?> //Sé que nunca va a pasar por el else pero sino lo hago así, no me va bien el código si uso invitado
}

document.getElementById("usuarioInput").value = miUsuario;

        
        
    let  contador = document.getElementById("contador");
    let activarInsertarUsuario=true; //Pasará a false cuando la función insertarUsuario se active, y como insertarUsuario solo funciona cuando activarInsertarUsuario es true, solo funcionará una vez




     mensajeUsuario.addEventListener("input", function(event) {
    contador.innerText=(100-mensajeUsuario.value.length) + "/100 carácteres disponibles";
    });
    cargarChat();
        
        function activarCooldown(){
            cooldown=true;
            setTimeout(() => {
                cooldown=false;
            }, 3000); // 3000 milisegundos = 3 segundos
        }
        // Escucha cambios en el valor del input con id mensajeUsuario
    
   
        
        
        function enviarConCooldown(event){ //Solo envía si cooldown es false
            if(!cooldown){enviar(event);if(activarInsertarUsuario){insertarUsuario();activarInsertarUsuario=false;};activarCooldown();}
            else{event.preventDefault();mostrarModal("Debes esperar almenos 3s entre mensajes");}
        }
       
       
       
        function enviar(event) {
        // Evitar el envío del formulario   
        event.preventDefault();
        const miMensaje = document.getElementById("mensajeUsuario").value;
        const miJson = {};
        miJson.mensaje=miMensaje;miJson.usuario=miUsuario;miJson.id_escritor = <?php echo json_encode($_GET['id_escritor']);?>;
        //console.log(miJson);
        let xhr = new XMLHttpRequest();
        

        // Configurar la solicitud
        xhr.open("POST", <?php echo json_encode($urlNoGet);?>+"enviar.php", true); // Método POST y URL del recurso
        xhr.send(JSON.stringify(miJson));
        // Manejar la respuesta
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
                    let respuestaJSON=this.responseText;
                    console.log("respuestaJSON de enviar" +respuestaJSON);
                    respuestaJSON=JSON.parse(respuestaJSON);
                    
                    if(!respuestaJSON['error']){
                    console.log("enviado");
                    mensajeUsuario.value="";
                    contador.innerText="100/100 carácteres disponibles";
                    } else{
                        mostrarModal(respuestaJSON['error']);
                    }
                } 
        }; 
        }

        function cargarChat(){
        // Crear una instancia de XMLHttpRequest
        const miJson = {};
        miJson.id_escritor=<?php echo $_GET['id_escritor']?>;
let xhr = new XMLHttpRequest();
console.log("USANDO cargarChat");
// Configurar la solicitud
xhr.open("POST", <?php echo json_encode($urlNoGet);?>+"primerosMensajes.php", true);
console.log("JSON.stringify(miJson) de cargarChat");
console.log(JSON.stringify(miJson));
xhr.send(JSON.stringify(miJson));
// Manejar la respuesta
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) { // 4 significa que la solicitud está completa 200 es el código de estado HTTP para "OK"
            var respuestaJSON=this.responseText;
            console.log("this.responseText de cargarChat");
            console.log(respuestaJSON);
			respuestaJSON=JSON.parse(respuestaJSON);
            if(respuestaJSON['error']) {console.log(respuestaJSON['error']);}  //Si error en comprobarConn.php, devuelve su mensaje, sino, realiza la query y tal
            else {
                        for(let i=0;i<respuestaJSON["contenido"].length;i++){
                        cajaTexto.innerHTML+=respuestaJSON["contenido"][i];}
                    }
                    lastId=parseInt(respuestaJSON['id']);
                    console.log("Cambio efectuado, ahora aparece el chat");
                    cajaTexto.scrollTop = cajaTexto.scrollHeight;
        
        }
        }
        }


function actualizarChat(){
        // Crear una instancia de XMLHttpRequest
let xhr = new XMLHttpRequest();
const miJson = {};
    miJson.id_escritor=<?php echo $_GET['id_escritor']?>;
console.log("USANDO actualizarChat");
// Configurar la solicitud
xhr.open("POST", <?php echo json_encode($urlNoGet);?>+"primerosMensajes.php", true);
xhr.send(JSON.stringify(miJson));
// Manejar la respuesta
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) { // 4 significa que la solicitud está completa 200 es el código de estado HTTP para "OK"
           // console.log("Respuesta exitosa:", xhr.responseText); // Procesar la respuesta
            var respuestaJSON=this.responseText;
			respuestaJSON=JSON.parse(respuestaJSON);
            console.log(respuestaJSON);
            if(respuestaJSON['error']) {console.log(respuestaJSON['error']);}  //Si error en comprobarConn.php, devuelve su mensaje, sino, realiza la query y tal
            else {
                respuestaJSON['id']=parseInt(respuestaJSON['id']);
                    //console.log(respuestaJSON["contenido"]);
                    if(lastId!=respuestaJSON['id']){ //Si la id recibida difiere, actualizar chat
                        //console.log("Id anterior:"+lastId+"id nueva:"+respuestaJSON['id']);
                    lastId=respuestaJSON['id'];
                        cajaTexto.innerHTML+=respuestaJSON["contenido"][respuestaJSON["contenido"].length-1];
                        cajaTexto.scrollTop = cajaTexto.scrollHeight; /*Mostrar ultimas líneas de la caja*/
                        console.log("Cambio efectuado, nuevo mensaje aparece");}
                       
                    
            }
        } 
    }
}

function insertarUsuario(){
    // INSERTARUSUARIO.PHP, agregará al invitado a la lista de usuarios, si no fuese un invitado ya estaría en la lista y no lo agregará
     
        let xhrInsertarUsuario = new XMLHttpRequest();
        jsonUsuario={nombre: miUsuario};
        console.log(jsonUsuario);
        // Configurar la solicitud
        xhrInsertarUsuario.open("POST", <?php echo json_encode($urlNoGet);?>+"insertarInvitado.php", true); // Método POST y URL del recurso
xhrInsertarUsuario.send(JSON.stringify(jsonUsuario));
  console.log("enviado\n"+JSON.stringify(jsonUsuario));
        xhrInsertarUsuario.onreadystatechange = function () {
            if (xhrInsertarUsuario.readyState === 4 && xhrInsertarUsuario.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
                    console.log(xhrInsertarUsuario.responseText);
                    //La session invitado lo inicia insertarInvitado.php
                } else {
                    //console.error("Error en la solicitud:");
                }
            
            
        };
}

// Ejecutar actualizarChat() cada 3 segundos
setInterval(function() {
    actualizarChat(); // Llamada a la función
}, 500); // Intervalo de 100 milisegundos = 0,1 segundos

let contenidoUsuarioNoBaneado=document.getElementById("mostrarNoBaneados");
let contenidoUsuarioBaneado=document.getElementById("mostrarBaneados");
function desbanear(nombreValor,id_desbaneado) {
    let xhrbanear = new XMLHttpRequest();
    let nombre_desbloqueador=null;
    if(existeUsuario) {nombre_desbloqueador=miUsuario;} //Lo hago así para evitar error si no has logueado, aunque el usuario que no sea escritor
    //o superior nunca podrá activar esta función ya que no le aparecerá la función en el onclick
    //console.log("El nombre del bloqueador es "+nombre_bloqueador+" y es del tipo "+typeof(nombre_bloqueador));
    let jsonUsuario = { nombre: nombreValor,id_usuario_desbaneado:id_desbaneado,desbloqueador:nombre_desbloqueador };
    console.log("Datos enviados:", jsonUsuario);

    // Configurar la solicitud PUT
    xhrbanear.open("PUT", <?php echo json_encode($urlNoGet); ?> + "desbanear.php", true);

    // Establecer el encabezado 'Content-Type'
    xhrbanear.setRequestHeader("Content-Type", "application/json");

    // Enviar los datos en formato JSON
    xhrbanear.send(JSON.stringify(jsonUsuario));
    console.log("usada la función banear y enviando:\n" + JSON.stringify(jsonUsuario));
        xhrbanear.onreadystatechange = function () {
            if (xhrbanear.readyState === 4 && xhrbanear.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
                    console.log(this.responseText);
                    mostrarModal("el usuario "+nombreValor+" fue desbloqueado");
                    let elementoBorrar=document.getElementById("tr-"+nombreValor);
                    console.log("eliminando el elemento con la id "+"tr-"+nombreValor);
                    console.log(elementoBorrar);
                    elementoBorrar.setAttribute("onclick","banear('"+nombreValor+"','"+id_desbaneado+"')");
                    let insertarTabla=document.getElementById("mostrarNoBaneados-tabla");
                    console.log(insertarTabla);
                    insertarTabla.appendChild(elementoBorrar); //Lo coloca en la lista adecuada
                } else {
                    //console.error("Error en la solicitud:");
                }
            
            
        };
}

function banear(nombreValor,id_baneado) {
    let xhrbanear = new XMLHttpRequest();
    let nombre_bloqueador=null;
    if(existeUsuario) {nombre_bloqueador=miUsuario;}  //Lo hago así para evitar error si no has logueado, aunque el usuario que no sea escritor
    //o superior nunca podrá activar esta función ya que no le aparecerá la función en el onclick
    
    //console.log("El nombre del bloqueador es "+nombre_bloqueador+" y es del tipo "+typeof(nombre_bloqueador));
    let jsonUsuario = { nombre: nombreValor,id_usuario_baneado:id_baneado,bloqueador:nombre_bloqueador };
    console.log("Datos enviados:", jsonUsuario);

    // Configurar la solicitud PUT
    xhrbanear.open("PUT", <?php echo json_encode($urlNoGet); ?> + "banear.php", true);

    // Establecer el encabezado 'Content-Type'
    xhrbanear.setRequestHeader("Content-Type", "application/json");

    // Enviar los datos en formato JSON
    xhrbanear.send(JSON.stringify(jsonUsuario));
    console.log("usada la función banear y enviando:\n" + JSON.stringify(jsonUsuario));
        xhrbanear.onreadystatechange = function () {
            if (xhrbanear.readyState === 4 && xhrbanear.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
                    console.log(this.responseText);
                    mostrarModal("el usuario "+nombreValor+" fue bloqueado");
                    let elementoBorrar=document.getElementById("tr-"+nombreValor);
                    console.log("eliminando el elemento con la id "+"tr-"+nombreValor);
                    console.log("el elemento a banear es "+elementoBorrar);
                    elementoBorrar.setAttribute("onclick","desbanear('"+nombreValor+"','"+id_baneado+"')");
                    let insertarTabla=document.getElementById("mostrarBaneados-tabla");
                    console.log(insertarTabla);
                    insertarTabla.appendChild(elementoBorrar); //Lo coloca en la lista adecuada
                } else {
                    //console.error("Error en la solicitud:");
                }
            
            
        };
}
if(<?php echo json_encode($jerarquia==='escritor' || $jerarquia==='superadmin');?>){ //Completa la tabla de mostrarBaneados
contenidoUsuarioBaneado.setAttribute("style","text-align:center");
let rotulo=document.createElement("h1");
rotulo.innerText="LISTA DE BANEADOS";
//rotulo.setAttribute("style","text-align:center");
contenidoUsuarioBaneado.appendChild(rotulo);
 let xhrMostrarBaneados = new XMLHttpRequest();
 console.log("HOOOOLA");
    console.log(""+<?php echo json_encode($urlNoGet);?>+'baneados.php');
        xhrMostrarBaneados.open("GET", <?php echo json_encode($urlNoGet);?>+"baneados.php", true); // Método POST y URL del recurso
xhrMostrarBaneados.send();
  //console.log("se mostrarán los usuarios baneados");
        xhrMostrarBaneados.onreadystatechange = function () {
            if (xhrMostrarBaneados.readyState === 4 && xhrMostrarBaneados.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
      //              console.log(this.responseText);
                    console.log("BANEADOS->"+this.responseText);
                    let listaBaneados=JSON.parse(this.responseText);
                    let tablaHTML="<table id='mostrarBaneados-tabla'>";
                    for(let i=0;i<listaBaneados.length;i++){
                        tablaHTML += "<tr onclick='desbanear(\"" + listaBaneados[i].nombre + "\",\""+ listaBaneados[i].id_usuario + "\")' id=tr-"+listaBaneados[i].nombre+">";
                        tablaHTML+="<td style='background-color:white;border:1px solid black'>"+listaBaneados[i].id_usuario+"</td>";
                        tablaHTML+="<td style='background-color:white;border:1px solid black'>"+listaBaneados[i].nombre+"</td>";
                        tablaHTML+="<td style='background-color:white;border:1px solid black'>"+listaBaneados[i].ip+"</td>";
                        tablaHTML+="</tr>";
                    }
                    tablaHTML+="</table>";
                    contenidoUsuarioBaneado.innerHTML+=tablaHTML;
                } else {
                    //console.error("Error en la solicitud:");
                }
            
            
        };
}
if(<?php echo json_encode($jerarquia==='escritor' || $jerarquia==='superadmin');?>){ //Completa la tabla de mostrarNoBaneados

contenidoUsuarioNoBaneado.setAttribute("style","text-align:center");
let rotulo=document.createElement("h1");
rotulo.innerText="USUARIOS NO BLOQUEADOS";
//rotulo.setAttribute("style","text-align:center");
contenidoUsuarioNoBaneado.appendChild(rotulo);
 let xhrMostrarNoBaneados = new XMLHttpRequest();
 console.log("HOOOOLA");
    console.log(""+<?php echo json_encode($urlNoGet);?>+'baneados.php');
        xhrMostrarNoBaneados.open("GET", <?php echo json_encode($urlNoGet);?>+"noBaneados.php", true); // Método GET y URL del recurso
xhrMostrarNoBaneados.send();
  //console.log("se mostrarán los usuarios no baneados");
        xhrMostrarNoBaneados.onreadystatechange = function () {
            if (xhrMostrarNoBaneados.readyState === 4 && xhrMostrarNoBaneados.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
    //                console.log(this.responseText);
                    console.log("NO BANEADOS->"+this.responseText);
                    let listaNoBaneados=JSON.parse(this.responseText);
                    let tablaHTML="<table id='mostrarNoBaneados-tabla'>";
                    for(let i=0;i<listaNoBaneados.length;i++){//listaBaneados[i].id_usuario
                        tablaHTML += "<tr onclick='banear(\"" + listaNoBaneados[i].nombre + "\",\""+ listaNoBaneados[i].id_usuario + "\")' id=tr-"+listaNoBaneados[i].nombre+">";
                        tablaHTML+="<td style='background-color:white;border:1px solid black'>"+listaNoBaneados[i].id_usuario+"</td>";
                        tablaHTML+="<td style='background-color:white;border:1px solid black'>"+listaNoBaneados[i].nombre+"</td>";
                        tablaHTML+="<td style='background-color:white;border:1px solid black'>"+listaNoBaneados[i].ip+"</td>";
                        tablaHTML+="</tr>";
                    }
                    tablaHTML+="</table>";
                    contenidoUsuarioNoBaneado.innerHTML+=tablaHTML;
                } else {
                    //console.error("Error en la solicitud:");
                }
            
            
        };
}
} else {   // CHAT NO ENCONTRADO
    let textoCaja = document.getElementById('caja-texto');

    let rotulo = document.createElement("h1");
    rotulo.innerText="EL CHAT NO EXISTE";
    rotulo.setAttribute("style","text-align:center");
    textoCaja.appendChild(rotulo);
}
</script>
<button onclick='cambiarSesion(1)'>Clicka para ser superadmin</button>
<button onclick='cambiarSesion(2)'>Clicka para ser escritor</button>
<button onclick='cambiarSesion(3)'>Clicka para ser invitado</button>
</body>
</html>