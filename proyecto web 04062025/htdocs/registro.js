function registrar(event){
    event.preventDefault();
    // Obtener valores de los campos de entrada
    var mi_usuario = document.getElementById('nombreUsuario').value.toLowerCase();
    var contrasena = document.getElementById('contrasena').value;
    var correo = document.getElementById('correoUsuario').value;

    // Crear el JSON con la estructura especificada
    var datos = {
        nuevousuario: {
            usuario: mi_usuario,
            contraseña: contrasena,
            correo: correo
        }
    };

    // Crear objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open('POST', 'insertar.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Manejar la respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = JSON.parse(xhr.responseText);
            alert(respuesta.mensaje);
            if(respuesta.mensaje==="Registro insertado exitosamente."){
                location.href="login.php";
            }
        }
    };

    // Enviar la solicitud con el JSON
    xhr.send(JSON.stringify(datos));
}
function registrar(event){
    event.preventDefault();
    // Obtener valores de los campos de entrada
    var mi_usuario = document.getElementById('nombreUsuario').value;
    var contrasena = document.getElementById('contrasena').value;
    var correo = document.getElementById('correoUsuario').value;

    // Crear el JSON con la estructura especificada
    var datos = {
        nuevousuario: {
            usuario: mi_usuario,
            contraseña: contrasena,
            correo: correo
        }
    };

    // Crear objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open('POST', 'insertar.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Manejar la respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = JSON.parse(xhr.responseText);
            alert(respuesta.mensaje);
            if(respuesta.mensaje==="Registro insertado exitosamente."){
                location.href="login.php";
            }
        }
    };

    // Enviar la solicitud con el JSON
    xhr.send(JSON.stringify(datos));
}
