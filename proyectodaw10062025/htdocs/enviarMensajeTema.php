<?php //enviarMensajeTema.php
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente   id_escritor,titulo,texto,usuario_creador
if (isset($data['tema_id'])&& isset($data['texto'])&& isset($data['usuario'])) {
$baneado=false;
$obtenerIdUsuario = $conn->prepare("SELECT id_usuario FROM usuario WHERE nombre = ?");
$obtenerIdUsuario->bind_param("s", $data['usuario']);
$obtenerIdUsuario->execute();
$resultado = $obtenerIdUsuario->get_result();

if ($fila = $resultado->fetch_assoc()) {
    $id_usuario = $fila['id_usuario'];
}
$obtenerIdUsuario->close();
$comprobarBaneado= $conn->query("Select accion from bloqueados where id_bloqueado=$id_usuario order by ID DESC limit 1");
if($comprobarBaneado->num_rows>=1){
    if($fila_baneado=$comprobarBaneado->fetch_assoc()){
        if($fila_baneado['accion']=="bloquear"){
        $baneado=true;
        echo json_encode(["error" => "No puedes escribir mensajes porque estás bloqueado"]);
        } else{
         echo json_encode(["funciona" => "El usuario no está bloqueado"]);
        }
    }
} else {
    echo json_encode(["funciona" => "El usuario no está bloqueado"]);
}
if(!$baneado){
$stmt = $conn->prepare("INSERT INTO mensajeForo (usuario, texto,tema_id,fecha) VALUES (?, ?, ?, ?)");
// Vincular los parámetros (s: string)
$usuario=$data['usuario'];$mensaje=$data['texto'];$id_escritor=$data['tema_id'];$fecha=date('Y-m-d H:i:s');
$stmt->bind_param("ssis", $usuario, $mensaje,$id_escritor,$fecha);
$stmt->execute();
$stmt->close();
$conn->close();
}
}