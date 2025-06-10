<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
    function subirArchivo(idInput) {
    let archivoInput = document.getElementById(idInput);
    let archivo = archivoInput.files[0];

    if (!archivo) {
        alert("Por favor, selecciona un archivo");
        return;
    }

    let formData = new FormData();
    formData.append("archivo", archivo);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            $json_imagen = JSON.parse(this.responseText);
            if(!$json_imagen['error']) {
                let imagen=document.getElementById('imagen');
                imagen.src=$json_imagen['src'];
            }
            else {alert($json_imagen['error']);}
        }
    };

    xhr.send(formData);
    
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
    caja.innerHTML="<input type='file' id='"+idInput+"' accept='image/*'><button onclick='subirArchivo(\"" + idInput + "\")'>Subir Archivo</button>";
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
function consola(id){
console.log(id);
}
</script>
<div style='width:100px;height:100px'>
<img src='prueba.jpg' id='imagen' onmouseover="divEditor(this.id)" style='width:100%;height:100%' > <!--onmouseoverIncluyehijos--->
</div>
</body>
</html><!DOCTYPE html>
