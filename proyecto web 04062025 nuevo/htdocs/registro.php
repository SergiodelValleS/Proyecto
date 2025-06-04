<?php $url="https://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Esta debe ser la url, que sea https, no http, se comprobará después si se está cumpliendo.
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http"; // Comprobar si HTTPS está activado
if($protocolo==="http") {header("Location: $url");} //Obliga a que sea https?>
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
<form class="caja" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="formulario" onsubmit="registrar(event)">
<div class="row px-4">
<div class="col-12"><h1>Crear cuenta</h1></div>
<div class="col-8 col-sm-6 "><label>Nombre de usuario</label><input type="text" name="nombreUsuario" id="nombreUsuario" pattern="^\S+$" title="El nombre de usuario no puede contener espacios" required></div>
<div class="col-4 col-sm-6 "><label>Contraseña</label><input type="password" name="contrasena" id="contrasena" required> </div>
<div class="col-4 col-sm-6 "><label>Correo electrónico</label><input type="text" name="correoElectronico" id="correoUsuario" pattern="^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$" title="El correo electrónico debe ser válido. Ej: micorreo@gmail.com" required> </div>
<div class="col ms-4 pt-2" style="text-align:right;position:relative;"><br>
<input type="submit" value="Enviar" class="enviar" style="width:50%;text-align:center;margin-top:17px;"></div>
</div>
</form>
<script src="registro.js"></script>