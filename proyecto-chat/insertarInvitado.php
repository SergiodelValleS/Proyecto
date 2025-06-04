<?php //Insertar usuario
session_start();
//crearInvitado.php se activará cuando el usuario invitado intente escribir el primer mensaje, entonces ese usuario, IP y todo eso quedará guardado en la base de datos usuarios.
//Si el usuario no es invitado,ya estará registrado en la base de datos y no funcionará
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$data = json_decode($json, true);
if(!isset($data['nombre'])) {echo json_encode("ESTO NO PUEDE SER");}
else {
    $nombre=$data['nombre'];
    $jsonIP=array();
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])||!empty($_SERVER['REMOTE_ADDR'])){   //Compruebo si puedo sacar la ip con http_X_Forwarded_for o remote_addr
                if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $jsonIP["HTTP_X_FORWARDED_FOR"]=$_SERVER['HTTP_X_FORWARDED_FOR'];
                $jsonIP['origen']="HTTP_X_FORWARDED_FOR";
                $IP=$jsonIP["HTTP_X_FORWARDED_FOR"];}
                else {
                $jsonIP['IP']=$_SERVER['REMOTE_ADDR']; $jsonIP['origen']="REMOTE_ADDR"; $IP=$jsonIP['IP'];
                }
        } else {$jsonIP["origen"]="null";$jsonIP["envio"]="no realizado";}    
    if($jsonIP["origen"]!="null"){
    $fecha_creacion=date('Y-m-d H:i:s');
    $insertarUsuario = "INSERT INTO usuario (nombre, IP,fecha_creacion,jerarquia) SELECT '$nombre', '$IP','$fecha_creacion','invitado' WHERE NOT EXISTS (SELECT 1 FROM usuario WHERE nombre = '$nombre')";
    if($conn -> query($insertarUsuario) === TRUE) {
        $jsonIP["envio"]="realizado";
    } else {
    $jsonIP["envio"]="no realizado por circunstancias de la petición";
    }
    echo json_encode($jsonIP);
    $conn->close();
    }
}
$_SESSION['nombre']=$nombre;
$_SESSION['invitado']="1";