<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<script src="miJS.js"></script>-->
    <link href="miCSS.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
</head>
<body>
<!--Comprobar width dispositivos-->
<p id="ancho" style='display:none'></p>
<?php include_once "miHeader.php"; 
$superadminBool=false;
if(isset($_SESSION['nombre'])) {
include "comprobarConn.php";
$superadmin=$conn->query("SELECT jerarquia from usuario where nombre='{$_SESSION['nombre']}' AND jerarquia='superadmin'");
if ($superadmin && $superadmin->num_rows > 0) {
    $superadminBool = true;
}
$conn->close();
}?>
<script>

let id_escritor=<?php echo json_encode($id_escritor);?>;
let correo_escritor=<?php echo json_encode($correo_escritor);?>;
console.log("El correo del escritor es "+correo_escritor);
/* Para comprobar el width de los dispositivos*/
function actualizarAncho() {
            let anchoVentana = window.innerWidth;
            document.getElementById("ancho").textContent = "El ancho es " + anchoVentana + " px";
        }

        // Muestra el ancho de la página. Le he puesto display none para que no se vea.
        actualizarAncho();

        // Actualizar cuando se redimensione la ventana
        window.addEventListener("resize", actualizarAncho);
        
/* Para comprobar el width de los dispositivos*/
/*Extrae número, útil para id de ficha y eso, ya que la id de una ficha es ficha-NUMERO y no NUMERO*/
function extraerNumero(str) {
    let resultado = str.match(/\d+/); // Busca uno o más dígitos en el string
    return resultado ? parseInt(resultado[0], 10) : null; // Convierte el número a entero
}
/*Extrae número, útil para id de ficha y eso, ya que la id de una ficha es ficha-NUMERO y no NUMERO*/
/*extrae información antes último guión*/
function antesGuion(str) {
    return str.substring(0, str.lastIndexOf('-'));
}
function editarTextoContenido(id){
    if(antesGuion(id)=="contenido-descripcion" || antesGuion(id)=="contenido-titulo") {
                let texto_cambio=prompt("Indica el texto");
                while((antesGuion(id)=="contenido-titulo" && texto_cambio.length>50)){
                    alert("El número de carácteres no puede ser superior a 50");
                    texto_cambio=prompt("Indica el texto");
                }
                while((antesGuion(id)=="contenido-descripcion" && texto_cambio.length>200)){
                    alert("El número de carácteres no puede ser superior a 200");
                    texto_cambio=prompt("Indica el texto");
                }
                let jsonEnviar={};
                jsonEnviar.texto_cambio=texto_cambio;
                jsonEnviar.id_contenido=extraerNumero(id);
            {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById(id).innerText=texto_cambio;
            }
        };
        xhttp.open("POST", "editarContenido.php"); //POST Y NO UPDATE PORQUE ES MODIFICACION PARCIAL
        xhttp.send(JSON.stringify(jsonEnviar));
        }
    } else {
        alert("ONCLICK EQUIVOCADO");
    }
}
function editarLibro(libroId){
    //precio, fecha, url_amazon, sinopsis, numero_paginas, ISBN, editorial, nombre
let jsonLibro={};
jsonLibro.id_libro = libroId;
jsonLibro.precio = prompt("Precio del libro");
jsonLibro.fecha = prompt("Fecha de publicación (formato dd/mm/YYYY)");
jsonLibro.url_amazon = prompt("URL del libro en Amazon");
while(jsonLibro.url_amazon && jsonLibro.url_amazon.length > 255){ //Si es mayor a 255 y no es nulo, repetir
    jsonLibro.url_amazon = prompt("URL demasiado larga, introduce un link de 255 carácteres o menos");
}
jsonLibro.sinopsis = prompt("Sinopsis del libro");
jsonLibro.numero_paginas = prompt("Número de páginas");
jsonLibro.ISBN = prompt("ISBN del libro");
jsonLibro.editorial = prompt("Editorial del libro");
jsonLibro.nombre = prompt("Nombre del libro");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            
            location.reload();
            }
        };
        xhttp.open("POST", "editarLibro.php", true);
        xhttp.send(JSON.stringify(jsonLibro));
}
function crearLibro(){  //Al clickar el botón con esta función, crea un nuevo libro
//precio, fecha, url_amazon, sinopsis, numero_paginas, ISBN, editorial, nombre
let jsonLibro={};
jsonLibro.id_escritor=id_escritor;
jsonLibro.precio = prompt("Precio del libro");
jsonLibro.fecha = prompt("Fecha de publicación (formato dd/mm/YYYY)");
jsonLibro.url_amazon = prompt("URL del libro en Amazon");
while(jsonLibro.url_amazon && jsonLibro.url_amazon.length > 255){ //Si es mayor a 255 y no es nulo, repetir
    jsonLibro.url_amazon = prompt("URL demasiado larga, introduce un link de 255 carácteres o menos");
}
jsonLibro.sinopsis = prompt("Sinopsis del libro");
jsonLibro.numero_paginas = prompt("Número de páginas");
jsonLibro.ISBN = prompt("ISBN del libro");
jsonLibro.editorial = prompt("Editorial del libro");
jsonLibro.nombre = prompt("Nombre del libro");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            location.reload();
            }
        };
        xhttp.open("POST", "crearLibro.php", true);
        xhttp.send(JSON.stringify(jsonLibro));
}
function editadorFicha(fichaId){
let jsonFicha={};
jsonFicha.id_ficha = fichaId;
jsonFicha.nombre_persona = prompt("Dime el nombre de la persona");
jsonFicha.parrafo_modular_id = null; //Este se modificará en inicio, en la descripción del escritor
jsonFicha.titulo_opcional = prompt("titulo opcional");
jsonFicha.parrafo_titulo_opcional = prompt("parrafo titulo opcional");
jsonFicha.alias = prompt("alias");
jsonFicha.nombre_completo = prompt("nombre completo");
jsonFicha.fecha_nacimiento = prompt("fecha nacimiento formado dd/mm/YYYY");
jsonFicha.nacionalidad = prompt("Nacionalidad");
jsonFicha.obra_notable = prompt("obra notable");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            location.reload();
            }
        };
        xhttp.open("POST", "editarFicha.php", true);
        xhttp.send(JSON.stringify(jsonFicha));
}
/*
antesGuion("hola-mundo-prueba")); // "hola-mundo"
antesGuion("sin-guiones")); // ("sin"))
/*extrae información antes último guión*/
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

//Cambiar imagen con click
function subirArchivo(event,idInput,idImagen) {
    event.stopPropagation(); //Para evitar activar el evento del padre
    let archivoInput = document.getElementById(idInput);
    let imagen=document.getElementById(idImagen);
    let archivo = archivoInput.files[0];
    console.log("ESTE ES EL ARCHIVO QUE VA A formdata"+archivo);
    if (!archivo) {
        alert("Por favor, selecciona un archivo");
        return;
    }

    let formData = new FormData();
    formData.append("archivo", archivo);
    formData.append("id",extraerNumero(idImagen));
    console.log(idImagen);
        if(idInput.includes("archivo-contenido-img")){ //Ruta si la imagen a cambiar se carga en la tabla contenidos
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "subirImagenContenido.php", true);
    console.log("ACTIVANDO SUBIRARCHIVO");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                json_imagen = JSON.parse(this.responseText);
                if(!json_imagen['error']) {
                    imagen.src=json_imagen['src'];
                }
                else {alert(json_imagen['error']);}
            }
        };

        xhr.send(formData); // requiere usar formData para envio de archivos
        } 
        else {
            if(idInput.includes("archivo-ficha-img")){ //Ruta si la imagen a cambiar se carga en la tabla contenidos
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "subirImagenFicha.php", true);
    console.log("ACTIVANDO SUBIRARCHIVO");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                json_imagen = JSON.parse(this.responseText);
                if(!json_imagen['error']) {
                    imagen.src=json_imagen['src'];
                }
                else {alert(json_imagen['error']);}
            }
        };

        xhr.send(formData); // requiere usar formData para envio de archivos
        }
        if(idInput.includes("archivo-libro-img")){ //Ruta si la imagen a cambiar se carga en la tabla contenidos
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "subirImagenLibro.php", true);
    console.log("ACTIVANDO SUBIRARCHIVO");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                json_imagen = JSON.parse(this.responseText);
                if(!json_imagen['error']) {
                    imagen.src=json_imagen['src'];
                }
                else {alert(json_imagen['error']);}
            }
        };

        xhr.send(formData); // requiere usar formData para envio de archivos
        }
        
        }
}
function divEditor(idImagen){
    let imagen=document.getElementById(idImagen);
    if(!document.getElementById("caja"+"-"+idImagen)) //Si no existe la caja, la creas
    {
    let caja = document.createElement("div");
    let cajaCierre = document.createElement("div");
    let rect = imagen.getBoundingClientRect(); // Obtiene la posición real de la imagen
    caja.style.position = "absolute"; // Posición absoluta sobre la imagen
    caja.style.left = rect.left + "px"; // Establece la misma posición X de la imagen
    caja.style.top = rect.top + "px"; // Establece la misma posición Y de la imagen
    caja.style.width = rect.width + "px"; // Ajusta el ancho al mismo que la imagen
    caja.style.background = "rgba(0, 0, 0, 0.5)";
    caja.style.color = "white";
    caja.style.zindex=-1;
    caja.style.zIndex = "1000";
    caja.id=("caja"+"-"+idImagen);
    //Div cierra caja
    cajaCierre.style.width = "20px"; // Hacerlo más visible
    cajaCierre.style.height = "20px";
    cajaCierre.style.backgroundColor = "red";
    cajaCierre.style.position = "absolute";
    cajaCierre.style.top = "0"; // Fijar en la parte superior
    cajaCierre.style.right = "-20px"; // Fijar en la parte derecha
    cajaCierre.style.cursor = "pointer"; // Para que se vea como botón
    cajaCierre.style.display = "flex"; // Centrar contenido
    cajaCierre.style.alignItems = "center";
    cajaCierre.style.justifyContent = "center";
    cajaCierre.innerHTML = "X"; // Texto para el botón
    cajaCierre.onclick = function () {
        caja.remove(); // Cierra el div al hacer clic
    };
    let idInput="archivo-"+imagen.id;
    caja.innerHTML= `<input type='file' id='${idInput}' accept='image/*' style='background-color:white;color:red;'>
<button onclick="subirArchivo(event,'${idInput}', '${idImagen}')">Subir Archivo</button>`; //Tengo que ponerle event para que el stopPropagation funcione
    caja.appendChild(cajaCierre);
    //cajaCierre.onmouseleave = function() {caja.remove();}; no funciona caja.onmouseleave='caja.remove();'
    document.body.appendChild(caja);
    }
}
function borrarDivEditor(idImagen){
if(document.getElementById("caja"+"-"+idImagen)){
    document.getElementById("caja"+"-"+idImagen).remove();
}
}
//Cambiar imagen con click
</script>

    
    <!--background-color:#FF9BE3 es rosa de antes-->
<div id='cajaPrincipal'> <!--En el contexto de tu problema, overflow: hidden; evita el colapso de márgenes al hacer que el contenedor <div> reconozca el margen inferior del <p>, asegurando que el fondo rosa cubra todo el espacio, incluido el margen.-->
<p class='editable' style='display:none'>hola editable</p>
<div id='cajaContenidos'></div>
<script>
//Este script funciona de manera que según el getPagina a usar, se cambia la variable ruta provocando que
//se use un php distinto para cargar los datos, es decir, hacer peticiones distintas según el get de pagina
let xhrMostrarTexto = new XMLHttpRequest();
let get_pagina=parseInt(<?php echo json_encode($_GET['get_pagina']);?>);
console.log("el get de la pagina es"+get_pagina);
 let ruta="";
if(get_pagina==3){
    console.log("Nos encontramos en libro");
    ruta=<?php echo json_encode($urlNoGetNoIndex);?>+"mostrarLibros.php";
    console.log("La ruta a usar es "+ruta);
}else if(get_pagina==2){
    console.log("Estamos en ficha");
    ruta=<?php echo json_encode($urlNoGetNoIndex);?>+"mostrarFicha.php";
    console.log("La ruta a usar es "+ruta);
}else{
    console.log("Estamos en Inicio o es un contenido de alguna página");
    ruta=<?php echo json_encode($urlNoGetNoIndex);?>+"mostrarContenido.php";
    console.log("La ruta a usar es "+ruta);
}
        xhrMostrarTexto.open("POST", ruta, true); // Método POST y URL del recurso
let datosEnviar={};
datosEnviar.id_escritor=id_escritor;
datosEnviar.get_pagina=get_pagina;
xhrMostrarTexto.send(JSON.stringify(datosEnviar));
  //console.log("se mostrarán los usuarios no baneados");
        xhrMostrarTexto.onreadystatechange = function () {
            if (xhrMostrarTexto.readyState === 4 && xhrMostrarTexto.status === 200) { // 4 significa que la solicitud está completa
                  // 200 es el código de estado HTTP para "OK"
                   let cajaContenidos=document.getElementById('cajaContenidos');
                   let contenidos={};let listaLibros={};let listaDatosFicha={};
                   if(get_pagina==1)  
                   {contenidos=JSON.parse(this.responseText);
                   console.log(contenidos);
                   console.log("El tamaño de contenidos es"+contenidos.length);
                   if(contenidos.length==0 || contenidos[0]=="NO EXISTE"){
                   cajaContenidos.innerHTML+="<p>NADA QUE MOSTRAR</p>";}
                   }
                   else if(get_pagina==2){
                       listaDatosFicha=JSON.parse(this.responseText);
                       console.log("Ficha");
                       console.log(listaDatosFicha);
                        console.log("Fin ficha");
                   }if(get_pagina==3){
                       listaLibros=JSON.parse(this.responseText);
                       console.log("El tamaño de libros es"+listaLibros.length);
                   }
                    //Las páginas por defecto tienen elementos de inicio imborrables que siempre tienen
                    //Las mismas características y es contenido que está definido siempre del mismo orden para esa página
                    //Por ejemplo, en inicio, el primer elemento es img, despues parrafo, despues contacto, etc
                    switch(get_pagina){ 
                        case 1: //INICIO
                        console.log("Estamos en INICIO");
                        console.log(contenidos[0]);
                            cajaContenidos.innerHTML+="<div style='display:flex' id='miflex'>"+
                        "<img src='"+contenidos[0].texto+"' style='margin-left:32px;margin-right:47px;width:296px;height:296px;border:1px solid black;' id='contenido-img-"+contenidos[0].id_contenido+"' onmouseover=divEditor('contenido-img-"+contenidos[0].id_contenido+"')>"
                        +"<div style='width:100%;border:1px solid black;margin-right:32px;padding:2px;background-color:white;'>"+"<h1 style='text-align:center' id='contenido-titulo-"+contenidos[1].id_contenido+"' onclick='editarTextoContenido(this.id)'>"+contenidos[1].texto+"</h1>"
                        +"<p style='padding-left:10%;padding-right:10%;text-align:justify;' id='contenido-descripcion-"+contenidos[2].id_contenido+"' onclick='editarTextoContenido(this.id)'>"+contenidos[2].texto+"</p></div>"+
                        "</div>";
                        
                        //Caja contactos
                         cajaContenidos.innerHTML+="<form id='formularioContacto'>"+
                         "<div style='margin-left:32px;margin-top:47px;margin-right:32px;padding-left:5%;padding-right:5%;background-color:white;border:1px solid black;margin-bottom:57px;'>"+
                         "<h1 style='text-decoration: underline;text-align:center'>Contacto</h1>"+
                         "<div class='row'><div class='col-8 col-sm-6 text-align:center d-flex flex-column align-items-center'>"+
                "<label>Nombre y Apellidos</label>"+
               "<input type='text' name='nombreApellido' id='nombreApellido' minLength='1' maxLength='30' title='La longitud deberá ser entre 1 y 50 carácteres, ámbos incluídos' required>"+
               "</div>"+
            "<div class='col-8 col-sm-6 text-align:center d-flex flex-column align-items-center'>"+
                "<label>Correo electrónico</label>"+
               "<input type='email' name='correoElectronico' id='correoElectronico' pattern='^\S+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$' title='El correo electrónico debe ser válido. Ej: micorreo@gmail.com' maxlength='30' required=''>"
+
            "</div>"+"<div class='col-12 text-align:center d-flex flex-column align-items-center'>"+"<label>Mensaje</label>"+
            "<textarea style='width:100%' id='mensaje' maxLength='400' required></textarea>"+
            "</div>"+
            "<div class='col-4 mt-3 mb-2'>"+"<input type='submit'>"+
            "</div>"+
            "<div class='col mt-3 mb-2'>"+"<input type='checkbox' id='terminos' style='margin-right:4px;'><label>He leído los <a href='https://proyectodaw.free.nf/terminos.txt' target='_blank' rel='noopener noreferrer'>Términos y condiciones</a> </label>"+
            "</div>"+
            "</div>"+
            "</form>";
            /*target='_blank' rel='noopener noreferrer' Sirve para abrir el enlace en una nueva pestaña*/
            //SCRIPT FORMULARIO CONTACTO
            function enviarFormulario() {
                            const xhttp = new XMLHttpRequest();
                            let terminos = document.getElementById('terminos').checked;
                            if(!terminos){mostrarModal("debes leer y marcar la casilla de términos y condiciones");}
                            else{
                            datosContacto={};
                            datosContacto.id_escritor=id_escritor;
                            datosContacto.nombre_y_apellidos=document.getElementById('nombreApellido').value;
                            datosContacto.correo_electronico=document.getElementById('correoElectronico').value;
                            datosContacto.mensaje=document.getElementById('mensaje').value;
                            //Borrar los datos del cuestionario
                             xhttp.onreadystatechange = function() {
                                 if (this.readyState == 4 && this.status == 200) {
                                     let respuestaJSON=JSON.parse(this.responseText);
                                     
                                    if(respuestaJSON['error']){
                                         
                                    mostrarModal("Error al enviar la información");
                                     } else if(respuestaJSON['enviado']) {
                                        mostrarModal(respuestaJSON['enviado']);
                                        //Aquí empieza el envío de correo realmente
                                        emailjs.init("zqFRapdOGpkOanaeF"); // Reemplaza con tu Public Key de EmailJS

                                                emailjs.send("service_i7byk2o", "template_isuxu3g", {
                                                    nombreApellido: document.getElementById("nombreApellido").value,
                                                    correoElectronico: document.getElementById("correoElectronico").value,
                                                    mensaje: document.getElementById("mensaje").value,
                                                    from_email: "pinguinolodriguez@gmail.com", // Aquí iría el correo de proyectodaw.free.nf
                                                    to_email: correo_escritor // Aquí el correo del escritor
                                                }).then(response => {
                                                    mostrarModal("El correo se está enviando al escritor");
                                                }).catch(error => {
                                                    console.error("Error al enviar el correo:", error);
                                                });
                                            
                                     }
                                                //Borrar los datos del cuestionario
                                        document.getElementById('nombreApellido').value="";
                                        document.getElementById('correoElectronico').value="";
                                        document.getElementById('mensaje').value="";
                                }
                            };
                            xhttp.open("POST", <?php echo json_encode($urlNoGetNoIndex);?>+"enviarContacto.php",true);
                            xhttp.send(JSON.stringify(datosContacto));
                            
                    }
            }
            
            var formulario = document.getElementById('formularioContacto');

if (formulario) {
    formulario.addEventListener('submit', function(event) {
        event.preventDefault(); // Impide el envío del formulario
        enviarFormulario()
    });
}
                        break;
                        case 2: 
                        /*id_escritor,nombre_persona, parrafo_modular_id,titulo_opcional,parrafo_titulo_opcional,imagen,alias,nombre_completo,fecha_nacimiento,nacionalidad,obras_notables*/
                        /*de alias en adelante, Etiquetas span en negrita llegan por PHP*/  
                        if(listaDatosFicha['error']){mostrarModal("ERROR. NO SE PUDO CARGAR LA FICHA. CONSULTE CON EL SUPERADMINISTRADOR");}
                        else {
                            cajaContenidos.innerHTML = ""; // Limpiar antes de comenzar  
cajaContenidos.innerHTML+="<div id='"+"ficha-"+listaDatosFicha.id_ficha+"' style='padding-bottom:57px;' onclick='editadorFicha("+listaDatosFicha.id_ficha+")'>"+
"<div class='row' style='background-color:rgb(255, 255, 255); margin-left:40px; margin-right:40px;padding-top:14px;padding-right:2%;padding-left:63px;padding-bottom:47px;height:100%;border:1px solid black'>"+
"<div class='col-sm-7 col-12'><h2 style='height:62px;margin:0;'>"+listaDatosFicha.nombre_persona+"</h2><p class='parrafoColumna1' style='margin:0;padding:3px;'>"+listaDatosFicha.parrafo_modular_id+"</p><h2 style='height:62px;margin:0;margin-top:15px;padding:3px;'>"+listaDatosFicha.titulo_opcional+"</h2><p class='parrafoColumna1' style='margin:0;padding:3px;'>"+listaDatosFicha.parrafo_titulo_opcional+"</p></div>"+
"<div class='col-sm col-12' style='border:1px solid rgb(0, 0, 0);'><div class='row' style='height:40%;padding:12px;'><div class='col' style='border:1px solid black;'><img src='"+listaDatosFicha.imagen+"' class='img-fluid' style='width: 100%;height: 100%;max-height: 271px;min-height:223px;' id='ficha-img-"+listaDatosFicha.id_ficha+"' onmouseover=divEditor('ficha-img-"+listaDatosFicha.id_ficha+"')></div></div>"+
"<div class='row' style='height:60%;padding:12px;'><div class='col'><p class='parrafoColumna2' style='margin-top:15px;'>"+listaDatosFicha.alias+"</p><p class='parrafoColumna2'>"+listaDatosFicha.nombre_completo+"</p><p class='parrafoColumna2'>"+listaDatosFicha.fecha_nacimiento+"<p class='parrafoColumna2'>"+listaDatosFicha.nacionalidad+"<p class='parrafoColumna2'>"+listaDatosFicha.obra_notable+"</div></div></div></div>";
/*<span class='negrita'>Alias:"+listaDatosFicha.alias+"</span></p>*/
}
                        break;
                        case 3: //Libros usa la tabla libros,
                        console.log("HOLA");
                        console.log("cosas en listaLibros \n"+listaLibros);
                        console.log("Tamaño de listaLibros"+listaLibros.length);
                           /*
                           'precio' => $row['precio'],
                            'imagen' => $row['imagen'],
                            'sinopsis' => $row['sinopsis'],
                            'nombre' => $row['nombre'],
                            'url_amazon' => $row['url_amazon']
            */
            if(<?php if(isset($_SESSION['nombre'])){echo json_encode(($superadminBool || ($_SESSION['nombre'] == basename(dirname(__FILE__)))));} else echo json_encode(false); ?>) {
            cajaContenidos.innerHTML+="<button onclick='crearLibro()' style='text-align:center;margin-bottom:21px;margin-left: 50%;transform: translate(-50%, -50%);'>Crear nuevo Libro</button>";}
            for(let i=0;i<listaLibros.length;i++){
                            cajaContenidos.innerHTML+="<div class='row mb-4 mx-5' style='height:297px;' id='libro-"+listaLibros[i].id_libro+"' onclick='editarLibro("+listaLibros[i].id_libro+")'>"+
                            "<div class='col px-0 border border-dark' style='height:296px;'>"+ /*Por alguna razón el borde bottom no se ve, lo compenso metiendoselo a la imagen*/
                            "<img src='"+listaLibros[i].imagen+"' class='img-fluid' style='width: 100%; height: 100%;' id='libro-img-"+listaLibros[i].id_libro+"' onmouseover=divEditor('libro-img-"+listaLibros[i].id_libro+"')>"+
                            "</div>"+
                            "<div class='col-9 bg-white border border-dark border-start-0 p-2 d-flex flex-column' style='height:296px;'>"+
                        "<div class='row flex-grow-1 w-100'>"+
                            "<div class='col-12 text-center mb-1 d-flex align-items-center justify-content-center' style='height: 20%;'>"+
                                "<h1>"+listaLibros[i].nombre+"</h1>"+
                            "</div>"+
                            "<div class='col-12 d-flex flex-grow-1 align-items-left px-3' style='height: 70%'>"+
                                "<p style='text-align:justify'>"+ listaLibros[i].sinopsis+"</p>"+
                            "</div>"+
                            "<div class='col-12 text-center' style='height: 10%;'>"+
                                "<a href='"+listaLibros[i].url_amazon+"'>Pulse para comprar</a>"+
                            "</div>"+
                        "</div>"+
"</div>";

                            }
                            
                        break;
                    }
                   console.log(<?php if(isset($_SESSION['nombre'])) echo json_encode($_SESSION['nombre']); ?>);
                    console.log(<?php echo json_encode(basename(dirname(__FILE__))); ?>);
                    console.log("php"+<?php echo json_encode(isset($_SESSION['nombre']) && $_SESSION['nombre'] == basename(dirname(__FILE__))); ?>);
                    console.log("superadminbool"+<?php echo json_encode($superadminBool);?>);
                    
                } else {
                     //cajaContenidos.innerHTML+="<p>NADA QUE METER</p>";
                }
            
            eliminarPrivilegios(<?php if(isset($_SESSION['nombre'])){echo json_encode(!($superadminBool || ($_SESSION['nombre'] == basename(dirname(__FILE__)))));} else echo json_encode(true); ?>);
        };

function eliminarPrivilegios(boolean){ 
    if(boolean){
document.querySelectorAll("[onclick]").forEach(elemento => {
    if (elemento.getAttribute("onclick")) {
        elemento.removeAttribute("onclick");
        console.log("Se eliminó el onclick de:", elemento);
    }
});
document.querySelectorAll("[onmouseover]").forEach(elemento => {
    if (elemento.getAttribute("onmouseover")) {
        elemento.removeAttribute("onmouseover");
        console.log("Se eliminó el onmouseover de:", elemento);
    }
});
}
}
</script>
</div>
<?php include_once "../miFooter.php"; ?>
<script src='editable.js'></script>
</body>
</html>