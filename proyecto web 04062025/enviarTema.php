<?php //enviarTema.php
include "comprobarConn.php";
$json = file_get_contents('php://input');
$conn->set_charset("utf8"); // Permite que se muestre ñ y tildes correctamente   id_escritor,titulo,texto,usuario_creador
if (isset($_POST['usuario'])&& isset($_POST['titulo'])&&isset($_POST['texto'])&& isset($_POST['id_escritor'])) {
$stmt = $conn->prepare("INSERT INTO temas (id_escritor, titulo,texto,usuario_creador,fecha) VALUES (?, ?, ?, ?,?)"); 
// Vincular los parámetros (s: string)
$usuario=$_POST['usuario'];$titulo=$_POST['titulo'];$texto=$_POST['texto'];$id_escritor=$_POST['id_escritor'];$fecha=date('Y-m-d H:i:s');
$stmt->bind_param("issss", $id_escritor,$titulo, $texto,$usuario,$fecha);
$stmt->execute();
$id_tema = $stmt->insert_id;
$stmt->close();

$stmt_primerMensajeTema = $conn->prepare("INSERT INTO mensajeForo (fecha,tema_id,texto,usuario) VALUES (?, ?, ?, ?)"); 
// Vincular los parámetros (s: string)
$stmt_primerMensajeTema->bind_param("siss", $fecha, $id_tema,$texto,$usuario);
$stmt_primerMensajeTema->execute();
$stmt_primerMensajeTema->close();
$conn->close();
}
header("Location:{$_POST['url']}");