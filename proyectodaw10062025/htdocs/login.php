<?php
session_start();
$url="https://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Esta debe ser la url, que sea https, no http, se comprobará después si se está cumpliendo.
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http"; // Comprobar si HTTPS está activado
if($protocolo==="http") {header("Location: $url");} //Obliga a que sea https
?>
<html>
<head>
<style>
*{font-family: 'Inter', sans-serif;}
input{width:100%;background-color:#D9D9D9}
input.enviar{background-color:pink;font-size:24px;height:32px;text-align:center;line-height: 16px; /* Alinea verticalmente el texto (igual a la altura del botón) */} @media screen and (max-width:480px) {input.enviar{font-size:16px}}
.caja {
    border:1px solid black;
    width:60%;
    position: absolute; /* Posicionamiento absoluto para poder usar 'top' */
    top: 40%; /* Coloca el elemento al 40% de la altura de la página */
    left: 50%; /* Centra horizontalmente */
    transform: translate(-50%, -40%); /* Ajusta para centrarlo completamente */
    /* gap:1%; Separación entre items del flex*/
    background-color:white;
}
label{font-size:24px;width:100%}
span{font-size:24px;} @media screen and (max-width:988px) {span{font-size:18px;}} @media screen and (max-width:768px) {span{font-size:16px;}} @media screen and (max-width:768px) {span{font-size:16px;}} @media screen and (max-width:461px) {span{font-size:14px;}}
@media screen and (max-width:800px){label{font-size:18px;}}
@media screen and (max-width:745px){label{font-size:16px;}.caja{width:90%;}}
@media screen and (max-width:605px){label{font-size:14px;}}
.row{margin:0;padding:10px;text-align:center;}
body{ background: radial-gradient(circle,#FF9BE3, rgb(193, 58, 251));
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
<form class="caja" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="formulario">
<div class="row px-4">
<div class="col-8 col-sm-6 "><label>Nombre de usuario</label><input type="text" name="nombreUsuario" id="nombreUsuario" pattern="^\S+$" title="El nombre de usuario no puede contener espacios" required></div>
<div class="col-4 col-sm-6 "><label>Contraseña</label><input type="password" name="contrasena" id="contrasena" required> </div>
<div class="col-8 my-2" style="text-align:right"><span>¿Olvidaste tu contraseña?<br><span><a href='https://proyectodaw.free.nf/registro.php'>¿No tienes cuenta? Crear cuenta</a></span></div>
<div class="col-3 my-4 ms-4" style="text-align:right">
<input type="submit" value="Enviar" class="enviar"></div>
</div>
</form>
<?php
include_once("comprobarConn.php");
if (isset($_POST["nombreUsuario"]) && isset($_POST["contrasena"])) {
    echo print_r($_POST);
    $_POST["nombreUsuario"]=strtolower($_POST["nombreUsuario"]); //Lo convierto en minúsculas por si el usuario ha escrito la primera letra en mayúscula, como ocurre con los móviles.
    $queryUsuario = "SELECT nombre FROM usuario where nombre='{$_POST['nombreUsuario']}'";
    $resultUsuario = $conn->query($queryUsuario);

    if ($resultUsuario->num_rows > 0) {
        while ($row = $resultUsuario->fetch_assoc()) {
            if ($_POST["nombreUsuario"] == $row['nombre']) {
                echo "Usuario correcto<br>";

                $queryContrasena = "SELECT contraseña FROM usuario WHERE nombre = ?";
                $stmtContrasena = $conn->prepare($queryContrasena);
                // Vincular el parámetro (s = string)
                $stmtContrasena->bind_param("s", $_POST["nombreUsuario"]);
                $stmtContrasena->execute();

                $resultContrasena = $stmtContrasena->get_result();

                if ($fila = $resultContrasena->fetch_assoc()) {
                    // Verificar la contraseña
                    if (password_verify($_POST["contrasena"], $fila['contraseña'])) {
                        echo "Contraseña correcta";
                        $_SESSION['nombre']=$_POST['nombreUsuario'];
                        if (isset($_SESSION['invitado'])) unset($_SESSION['invitado']);
                        header("Location: https://proyectodaw.free.nf");
                        exit();
                    } else {
                        echo "Credenciales incorrectas";
                    }
                }

                $stmtContrasena->close(); // Cerrar la consulta de contraseña
                break;
            }
        }
    } else {
        echo "Credenciales incorrectas"; //Usuario incompatible, no me molesto en comparar contraseña
    }

    // Liberar el resultado y cerrar la consulta de nombres
    $resultUsuario->free();
}

// Finalmente, cerrar la conexión
$conn->close();
?>
</body>
</html>

