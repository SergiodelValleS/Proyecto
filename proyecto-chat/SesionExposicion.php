<?php //Es la parte php ligada a la función onclick de cambio de sesión
session_start();
include "comprobarConn.php";
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$data = json_decode($json, true);
if(!isset($data['nombre'])) {echo json_encode("ESTO NO PUEDE SER");}
else {
    $nombre=$data['nombre'];
    $_SESSION['nombre']=$nombre;
}