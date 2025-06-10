<?php
session_start();
$url="https://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Esta debe ser la url, que sea https, no http, se comprobará después si se está cumpliendo.
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http"; // Comprobar si HTTPS está activado
if($protocolo==="http") {header("Location: $url");} //Obliga a que sea https
if($_SESSION['nombre']=='superadmin'){
include "../comprobarConn.php";
$array_usuarios = [];
$stmt = $conn->query("SELECT nombre,id_usuario FROM usuario WHERE jerarquia='usuario'"); //No uso preparada porque no uso variables externas en la query
while ($row = $stmt->fetch_assoc()) {
    $array_usuarios[$row['id_usuario']] = $row['nombre']; // Usando [] para agregar elementos al array
}
asort($array_usuarios);
$conn->close();
}else{
    header("Location:https://proyectodaw.free.nf");
}
?>
<html>
<head></head>
<body>
<form id='promocion-form' action="promocionar.php" method="POST">
<label for="cars">Convertir a escritor</label>
<select id="usuario" name="usuario">
  <?php
  foreach($array_usuarios as $clave=>$valor){
  echo "<option value='$clave' id='$clave'>$valor</option>";
  }
  ?>
</select>
<input type="submit">
</form>
<script>
document.getElementById("promocion-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita la recarga de la página
    let usuarioElemento=document.getElementById("usuario");
    let nombre=usuarioElemento.options[usuarioElemento.selectedIndex].innerText;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "promocionar.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var usuario = document.getElementById("usuario").value;
    var datos = "usuario=" + encodeURIComponent(usuario) + "&nombre=" + encodeURIComponent(nombre);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText); // Mostrar respuesta
            document.getElementById(usuario).remove();
        }
    };

    xhr.send(datos);
});
</script>

</body>

</html>
